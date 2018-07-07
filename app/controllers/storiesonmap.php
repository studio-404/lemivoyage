<?php 
class Storiesonmap extends Controller
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

		$db_regions = new Database("georgia", array(
			"method"=>"select", 
			"cid"=>0,
			"lang"=>$_SESSION['LANG'], 
			"itemPerPage"=>15
		));

		$db_products = new Database("products", array(
			"method"=>"selectStories", 
			"itemPerPage"=>200,
			"pid"=>19, 
			"lang"=>$_SESSION['LANG']
		));

		$db_countregions = new Database("products", array(
            "method"=>"countRegions"
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


		/* header top */
		$headertop = $this->model('_top');
		$headertop->data["socialNetworksModule"] = $social->index();
		$headertop->data["languagesModule"] = $languages->index();
		$headertop->data["navigationModule"] = $navigation->index();

		/*footer */
		$footer = $this->model('_footer');
		$footer->data = $db_footer->getter(); 

		/* view */
		$this->view('storiesonmap/index', [
			"header"=>array(
				"website"=>Config::WEBSITE,
				"public"=>Config::PUBLIC_FOLDER
			),
			"headerModule"=>$header->index(), 
			"headertop"=>$headertop->index(), 
			"regions"=>$db_regions->getter(), 
			"countregions"=>$db_countregions->getter(),
			"products"=>$db_products->getter(), 
			"pageData"=>$db_pagedata->getter(), 
			"footer"=>$footer->index() 
		]);
	}
}