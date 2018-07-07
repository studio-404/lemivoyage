<?php 
class Booking extends Controller
{
	public function __construct()
	{
		require_once("app/functions/request.php"); 
		if(!functions\request::index("POST", "bookid"))
		{
			require_once 'app/functions/redirect.php';
			functions\redirect::url(Config::WEBSITE.$_SESSION["LANG"]."/home");
		}
	}

	public function index()
	{
		require_once 'app/functions/request.php';
		
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

		$db_footerHelpNav = new Database("page", array(
			"method"=>"selecteByCid", 
			"cid"=>5, 
			"lang"=>$_SESSION['LANG']
		));

		$s = (isset($_SESSION["URL"][1])) ? $_SESSION["URL"][1] : Config::MAIN_CLASS;
		$db_pagedata = new Database("page", array(
			"method"=>"selecteBySlug", 
			"slug"=>$s,
			"lang"=>$_SESSION['LANG'], 
			"all"=>true
		));

		$db_selectbooked = new Database("products", array(
				"method"=>"selectById",
				"idx"=>(int)functions\request::index("POST", "bookid"), 
				"lang"=>$_SESSION['LANG']
		));	
		$booked = $db_selectbooked->getter();

		$db_photos = new Database("photos", array(
			"method"=>"selectByParent", 
			"idx"=>$booked["idx"],
			"type"=>"products",
			"lang"=>$_SESSION["LANG"]
		));

		/* HEDARE */
		$header = $this->model('_header');
		$header->public = Config::PUBLIC_FOLDER; 
		$header->lang = $_SESSION["LANG"]; 
		$header->pagedata = $db_pagedata; 

		/* LANGUAGES */
		$languages = $this->model('_lang'); 
		$languages->langs = $db_langs->getter();

		/* NAVIGATION */
		$navigation = $this->model('_navigation');
		$navigation->data = $db_navigation->getter();


		/* SOCIAL */
		$social = $this->model('_social');
		$social->networks = $db_socials->getter();  

		/* header top */
		$headertop = $this->model('_top');
		$headertop->data["socialNetworksModule"] = $social->index();
		$headertop->data["languagesModule"] = $languages->index();
		$headertop->data["navigationModule"] = $navigation->index();

		/*footer */
		$footer = $this->model('_footer');
		$footer->data["socialNetworksModule"] = $social->index();
		$footer->data["footerHelpNav"] = $db_footerHelpNav->getter();

		/* view */
		$this->view('payout/index', [
			"header"=>array(
				"website"=>Config::WEBSITE,
				"public"=>Config::PUBLIC_FOLDER
			),
			"headerModule"=>$header->index(), 
			"headertop"=>$headertop->index(), 
			"pageData"=>$db_pagedata->getter(), 
			"selectbooked"=>$booked, 
			"photos"=>$db_photos->getter(), 
			"footer"=>$footer->index() 
		]);
	}
}