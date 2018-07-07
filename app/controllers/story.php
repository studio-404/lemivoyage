<?php 
class Story extends Controller
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

		$idx = (isset($_SESSION["URL"][2])) ? $_SESSION["URL"][2] : 0;
		$db_products = new Database("products", array(
			"method"=>"selectById", 
			"idx"=>$idx,
			"lang"=>$_SESSION['LANG']
		));
		$getStory = $db_products->getter();

		$db_footer = new Database("modules", array(
			"method"=>"selectById", 
			"idx"=>18,
			"lang"=>$_SESSION['LANG']
		));

		$photos = new Database("photos",array(
		   "method"=>"selectByParent", 
		   "idx"=>(int)$getStory["idx"],  
		   "lang"=>$_SESSION['LANG'],  
		   "type"=>"products"
		));
		if($photos->getter()){
		   $pic = $photos->getter();
		   $image = sprintf(
		      "%s%s/image/loadimage?f=%s%s&w=670&h=521",
		      Config::WEBSITE,
		      $_SESSION['LANG'],
		      Config::WEBSITE_,
		      $pic[0]['path']
		   );
		   $imageSrc = sprintf(
		      "%s%s",
		      Config::WEBSITE_,
		      $pic[0]['path']
		   );
		}else{
		   $image = "/public/filemanager/noimage.png";
		}

		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		/* HEDARE */
		$header = $this->model('_header');
		$header->public = Config::PUBLIC_FOLDER; 
		$header->lang = $_SESSION["LANG"]; 
		$header->pagedata = $db_pagedata; 
		$header->story = $getStory; 
		$header->imageSrc = $imageSrc; 

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
		$this->view('story/index', [
			"header"=>array(
				"website"=>Config::WEBSITE,
				"public"=>Config::PUBLIC_FOLDER
			),
			"headerModule"=>$header->index(), 
			"headertop"=>$headertop->index(), 
			"pageData"=>$db_pagedata->getter(), 
			"actual_link"=>$actual_link, 
			"story"=>$getStory, 
			"image"=>$image, 
			"allimage"=>$pic, 
			"footer"=>$footer->index() 
		]);
	}
}