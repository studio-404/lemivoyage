<?php 
class Internationalsupport extends Controller
{
	public function __construct()
	{
		
	}

	public function index($lang = '', $readSupportIdx = '')
	{
		/* DATABASE */
		$db_langs = new Database("language", array(
			"method"=>"select"
		));
		
		$db_socials = new Database("modules", array(
			"method"=>"selectModuleByType", 
			"type"=>"social"
		));

		$db_internationalsupport = new Database("modules", array(
				"method"=>"selectModuleByType", 
				"type"=>"internationalsupport", 
				"from"=>0, 
				"num"=>10
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
		$db_footer = new Database("modules", array(
			"method"=>"selectById", 
			"idx"=>18,
			"lang"=>$_SESSION['LANG']
		));

		/* HEDARE */
		$header = $this->model('_header');
		$header->public = Config::PUBLIC_FOLDER; 
		$header->lang = $_SESSION["LANG"]; 
		

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

		if($readSupportIdx){
			/* international support */
			$miniinternationalsupport = $this->model('_miniinternationalsupport');
			$miniinternationalsupport->data = $db_internationalsupport->getter();
			$header->pagedata = $db_internationalsupport; 
			
			$db_selectById = new Database("modules", array(
				"method"=>"selectById", 
				"type"=>"internationalsupport", 
				"idx"=>$readSupportIdx, 
				"lang"=>$_SESSION['LANG']
			));
			
			if(count($db_selectById->getter())){
				/* view */
				$this->view('internationalsupport/read', [
					"header"=>array(
						"website"=>Config::WEBSITE,
						"public"=>Config::PUBLIC_FOLDER
					),
					"headerModule"=>$header->index(), 
					"pageData"=>$db_pagedata->getter(), 
					"moduleData"=>$db_selectById->getter(), 
					"miniinternationalsupport"=>$miniinternationalsupport->index(), 
					"headertop"=>$headertop->index(), 
					"footer"=>$footer->index() 
				]);
			}else{
				require_once("app/functions/redirect.php");
				functions\redirect::url(Config::WEBSITE);
			}
		}else{
			$header->pagedata = $db_pagedata; 
			/* international support */
			$internationalsupport = $this->model('_internationalsupport');
			$internationalsupport->data = $db_internationalsupport->getter();
		
			/* view */
			$this->view('internationalsupport/index', [
				"header"=>array(
					"website"=>Config::WEBSITE,
					"public"=>Config::PUBLIC_FOLDER
				),
				"headerModule"=>$header->index(), 
				"pageData"=>$db_pagedata->getter(), 
				"internationalsupport"=>$internationalsupport->index(), 
				"headertop"=>$headertop->index(), 
				"footer"=>$footer->index() 
			]);
		}
	}
}