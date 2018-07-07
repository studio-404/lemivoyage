<?php 
class Whatwedo extends Controller
{
	public function __construct()
	{
		
	}

	public function index($name = '')
	{
		/* DATABASE */
		$db_langs = new Database("language", array(
			"method"=>"select"
		));
		
		$db_socials = new Database("modules", array(
			"method"=>"selectModuleByType", 
			"type"=>"social"
		));

		$db_navigation = new Database("page", array(
			"method"=>"select", 
			"cid"=>0, 
			"nav_type"=>0,
			"lang"=>$_SESSION['LANG'],
			"status"=>0 
		));

		$s = (isset($_SESSION["URL"][1])) ? $_SESSION["URL"][1] : Config::MAIN_CLASS;
		$db_pagedata = new Database("page", array(
			"method"=>"selecteBySlug", 
			"slug"=>$s,
			"lang"=>$_SESSION['LANG'], 
			"all"=>true
		));

		$db_eulinks = new Database("modules", array(
			"method"=>"selectModuleByType", 
			"type"=>"eu",
			"from"=>0, 
			"num"=>10
		));

		$db_reports = new Database("modules", array(
			"method"=>"selectModuleByType", 
			"type"=>"reports",
			"from"=>0, 
			"num"=>2
		));

		$db_publicationss = new Database("modules", array(
			"method"=>"selectModuleByType", 
			"type"=>"publications",
			"from"=>0, 
			"num"=>2
		));

		$db_usefulllinks = new Database("modules", array(
			"method"=>"selectModuleByType", 
			"type"=>"usefulllink",
			"from"=>0, 
			"num"=>15
		));

		$db_news = new Database("modules", array(
			"method"=>"selectModuleByType", 
			"type"=>"news",
			"from"=>0, 
			"num"=>2
		));

		$db_footer = new Database("modules", array(
			"method"=>"selectById", 
			"idx"=>18,
			"lang"=>$_SESSION['LANG']
		));


		// echo "<pre>";
		// print_r($db_reports->getter()); 
		// echo "</pre>";

		/* HEDARE */
		$header = $this->model('_header');
		$header->public = Config::PUBLIC_FOLDER; 
		$header->lang = $_SESSION["LANG"]; 
		$header->pagedata = $db_pagedata; 

		/* SOCIAL */
		$social = $this->model('_social');
		$social->networks = $db_socials->getter(); 

		/* LANGUAGES */
		$languages = $this->model('_lang'); 
		$languages->langs = $db_langs->getter();

		/* NAVIGATION */
		$navigation = $this->model('_navigation');
		$navigation->data = $db_navigation->getter();

		/* EU Important Links */
		$euLinks = $this->model('_eulinks');
		$euLinks->data = $db_eulinks->getter(); 

		/* Reports */
		$reports = $this->model('_reports');
		$reports->data = $db_reports->getter(); 

		/* publications */
		$publications = $this->model('_publications');
		$publications->data = $db_publicationss->getter(); 

		/* usefull links */
		$usefulllink = $this->model('_usefulllink');
		$usefulllink->data = $db_usefulllinks->getter(); 

		/*news */
		$news = $this->model('_news');
		$news->data = $db_news->getter(); 

		/* header top */
		$headertop = $this->model('_top');
		$headertop->data["socialNetworksModule"] = $social->index();
		$headertop->data["languagesModule"] = $languages->index();
		$headertop->data["navigationModule"] = $navigation->index();

		/*footer */
		$footer = $this->model('_footer');
		$footer->data = $db_footer->getter(); 

		/* view */
		$this->view('whatwedo/index', [
			"header"=>array(
				"website"=>Config::WEBSITE,
				"public"=>Config::PUBLIC_FOLDER
			),
			"headerModule"=>$header->index(), 
			"headertop"=>$headertop->index(), 
			"pageData"=>$db_pagedata->getter(), 
			"euLinks"=>$euLinks->index(), 
			"reports"=>$reports->index(), 
			"publications"=>$publications->index(), 
			"usefulllink"=>$usefulllink->index(), 
			"news"=>$news->index(), 
			"footer"=>$footer->index() 
		]);
	}
} 