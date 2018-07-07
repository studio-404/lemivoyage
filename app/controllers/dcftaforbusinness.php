<?php 
class Dcftaforbusinness extends Controller
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
			"num"=>3
		));

		$s = (isset($_SESSION["URL"][1])) ? $_SESSION["URL"][1] : Config::MAIN_CLASS;
		$db_pagedata = new Database("page", array(
			"method"=>"selecteBySlug", 
			"slug"=>$s,
			"lang"=>$_SESSION['LANG'], 
			"all"=>true
		));
		$pageData = $db_pagedata->getter();

		$s2 = (isset($_SESSION["URL"][2])) ? $_SESSION["URL"][2] : Config::MAIN_CLASS;
		$db_pagedata2 = new Database("page", array(
			"method"=>"selecteBySlug", 
			"slug"=>$s2,
			"lang"=>$_SESSION['LANG'], 
			"all"=>true
		));
		$pageData2 = $db_pagedata2->getter();

		if(!count($pageData2) || !isset($_SESSION["URL"][2])){
			require_once("app/functions/redirect.php");
			functions\redirect::url(Config::WEBSITE);
		}

		$db_footer = new Database("modules", array(
			"method"=>"selectById", 
			"idx"=>18,
			"lang"=>$_SESSION['LANG']
		));

		/* HEDARE */
		$header = $this->model('_header');
		$header->public = Config::PUBLIC_FOLDER; 
		$header->lang = $_SESSION["LANG"]; 
		$header->pagedata = $db_pagedata2; 

		/* SOCIAL */
		$social = $this->model('_social');
		$social->networks = $db_socials->getter(); 

		/* LANGUAGES */
		$languages = $this->model('_lang'); 
		$languages->langs = $db_langs->getter();

		/* NAVIGATION */
		$navigation = $this->model('_navigation');
		$navigation->data = $db_navigation->getter();

		/*Left navigation*/
		$db_leftnavigation = new Database("page", array(
			"method"=>"selecteByCid", 
			"cid"=>$pageData['idx'],
			"lang"=>$_SESSION['LANG'] 
		));
		/* LEFT NAVIGATION */
		$leftnav = $this->model('_leftnav');
		$leftnav->data = $db_leftnavigation->getter();

		/* publications */
		$publications = $this->model('_publications2');
		$publications->data = $db_publicationss->getter(); 

		/* usefull links */
		$usefulllink = $this->model('_usefulllink2');
		$usefulllink->data = $db_usefulllinks->getter(); 

		/* header top */
		$headertop = $this->model('_top');
		$headertop->data["socialNetworksModule"] = $social->index();
		$headertop->data["languagesModule"] = $languages->index();
		$headertop->data["navigationModule"] = $navigation->index();

		/*footer */
		$footer = $this->model('_footer');
		$footer->data = $db_footer->getter(); 

	
		/* view */
		$this->view('dcftaforbusinness/index', [
			"header"=>array(
				"website"=>Config::WEBSITE,
				"public"=>Config::PUBLIC_FOLDER
			),
			"headerModule"=>$header->index(),  
			"headertop"=>$headertop->index(), 
			"pageData"=>$pageData, 
			"pageData2"=>$pageData2, 
			"leftnav"=>$leftnav->index(), 
			"publications"=>$publications->index(), 
			"usefulllink"=>$usefulllink->index(), 
			"footer"=>$footer->index() 
		]);
	}
}