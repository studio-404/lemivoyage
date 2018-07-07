<?php 
class Search extends Controller
{
	public function __construct()
	{

	}

	public function index($lang, $keyword = "")
	{
		$keyword = strip_tags($keyword);
		$search = str_replace(
			"-",
			" ",
			$keyword
		); 

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
		$db_search = new Database("searchBy", array(
			"method"=>"select", 
			"word"=>$search,
			"lang"=>$_SESSION['LANG']
		));
		$db_footer = new Database("modules", array(
			"method"=>"selectById", 
			"idx"=>18,
			"lang"=>$_SESSION['LANG']
		));

		
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

		/* header top */
		$headertop = $this->model('_top');
		$headertop->data["socialNetworksModule"] = $social->index();
		$headertop->data["languagesModule"] = $languages->index();
		$headertop->data["navigationModule"] = $navigation->index();
		$headertop->data["searchText"] = $search;

		/*footer */
		$footer = $this->model('_footer');
		$footer->data = $db_footer->getter(); 
	
		/* view */
		$this->view('search/index', [
			"header"=>array(
				"website"=>Config::WEBSITE,
				"public"=>Config::PUBLIC_FOLDER
			),
			"headerModule"=>$header->index(), 
			"pageData"=>$db_pagedata->getter(), 
			"searchText"=>$search, 
			"searchResults"=>$db_search, 
			"headertop"=>$headertop->index(), 
			"footer"=>$footer->index() 
		]);
	}
}