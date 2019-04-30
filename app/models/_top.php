<?php 
class _top
{
	public  $data;

	public function index()
	{
		require_once("app/functions/l.php"); 
		require_once("app/functions/strip_output.php"); 
		require_once("app/functions/language_output_name.php"); 

		$language_output_name = new functions\language_output_name();
		$outputName = $language_output_name->index();

		$l = new functions\l();
		$currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$db_phone = new Database("modules", array(
			"method"=>"selectById", 
			"idx"=>74,
			"lang"=>$_SESSION["LANG"]
		));
		$phone = $db_phone->getter();


		$out = "<header>\n";
		$out .= "<section class=\"top\">\n";
		$out .= "<section class=\"left\"> \n";
		if(isset($phone["description"])):
			$out .= sprintf(
				"<a href=\"tel:%s\" class=\"roboto transitions\">\n",
				strip_tags(str_replace(" ", "", $phone["description"])) 
			);
			$out .= sprintf(
				"<i class=\"fa fa-phone transitions\" aria-hidden=\"true\"></i> %s\n",
				strip_tags($phone["description"])
			);
			$out .= "</a>\n";
		endif;
		$out .= "</section>\n";
		$out .= "<section class=\"right\">\n";
		$out .= "<ul>\n";
		
		// Languages Start

		$out .= "<li>\n";
		$out .= "<a href=\"#\" class=\"transitions language\" data-opened=\"false\">\n";
		// $out .= sprintf("<span>%s</span> <i class=\"fa fa-language\" aria-hidden=\"true\"></i>\n", $outputName["name"]);
		$out .= sprintf("<span>%s</span> <img src=\"/public/img/%s.jpg\" alt=\"\" style=\"width: 20px;margin: -4px 0 0 0;\">\n", $outputName["name"], $_SESSION["LANG"]);
		$out .= "</a>\n";
		$out .= sprintf(
			"<input type=\"hidden\" name=\"lang\" id=\"lang\" value=\"%s\" />\n",
			$_SESSION["LANG"]
		);
		$out .= "<ul class=\"choose-languages\">\n";
		$out .= $this->data["languagesModule"];
		$out .= "</ul>\n";
		$out .= "</li>\n";
		
		// languages End

		// $out .= "<li>\n";
		// $out .= sprintf(
		// 	"<a href=\"#\" class=\"transitions favourites\" data-boxtitle=\"%s\">\n",
		// 	$l->translate("message")
		// );
		// $out .= "<i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i>\n";
		// $out .= "</a>\n";
		// $out .= "</li>\n";
		
		// $out .= "<li>\n";
		// $out .= sprintf(
		// 	"<a href=\"#\" class=\"transitions mycart\" data-boxtitle=\"%s\">\n",
		// 	$l->translate("message")
		// );
		// $out .= "<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i>\n";
		// $out .= "</a>\n";
		// $out .= "</li>\n";
		
		$out .= "<li>\n";
		$out .= sprintf(
			"<a href=\"#\" class=\"transitions searchPopUp\" data-boxtitle=\"%s\">\n",
			$l->translate("search")
		);
		$out .= "<i class=\"fa fa-search\" aria-hidden=\"true\"></i>\n";
		$out .= "</a>\n";
		$out .= "</li>\n";
		$out .= "</ul>\n";
		$out .= "</section>\n";
		$out .= "</section>\n";
		$out .= "<section class=\"clearer\"></section>\n";
		$out .= "<section class=\"navigation\">\n";
		$out .= "<section class=\"logo\">\n";
		$out .= sprintf(
			"<a href=\"%s%s/%s\"><img src=\"%simg/logo.svg?v=2\" alt=\"\" /></a>\n",
			Config::WEBSITE,
			$_SESSION["LANG"],
			Config::MAIN_CLASS, 
			Config::PUBLIC_FOLDER
		);
		$out .= "</section>\n";
		$out .= "<section class=\"right\">\n";
		
		$out .= "<nav>\n";
		$out .= $this->data["navigationModule"]; 
		$out .= "</nav>\n";

		$out .= "<section class=\"socialNetworks\">\n";
		$out .= $this->data["socialNetworksModule"];
		$out .= "</section>\n";

		// if(!isset($_SESSION[Config::SESSION_PREFIX."web_username"])){
		// 	$out .= sprintf(
		// 		"<section class=\"signIn transitions\" data-boxtitle=\"%s\">%s</section>\n",
		// 		$l->translate("signin"),
		// 		$l->translate("signin")
		// 	);
		// }else{
		// 	$out .= sprintf(
		// 		"<section class=\"myPage transitions\" onclick=\"goto('%s')\">%s</section>\n",
		// 		Config::WEBSITE.$_SESSION["LANG"]."/myaccount/?view=profile", 
		// 		$l->translate("mypage")
		// 	);
		// }
		$out .= "</section>\n";
		$out .= "</section>\n";
		$out .= "</header>\n";
		
		return $out;
	}
}