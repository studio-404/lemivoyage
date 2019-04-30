<?php 
class _footer
{
	public $data;

	public function index()
	{
		require_once("app/functions/l.php");
		require_once("app/functions/strip_output.php");  
		require_once("app/functions/string.php");  
		$l = new functions\l(); 		
		$currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$out = "<footer>";
		$out .= "<section class=\"newsletterSocial\">\n";
		$out .= "<section class=\"center\">\n";
		$out .= "<section class=\"subscribe\">\n";
		$out .= sprintf(
			"<label>%s</label>\n",
			$l->translate("subscribenewsletter")
		);
		$out .= "<input type=\"text\" name=\"newsletterEmail\" id=\"newsletterEmail\" value=\"\" />\n";
		$_SESSION["newsletterToken"] = functions\string::random(15);
		$out .= sprintf(
			"<button class=\"subscribeToNewsletter\" data-token=\"%s\" data-boxtitle=\"%s\"><i class=\"fa fa-envelope\" aria-hidden=\"true\"></i></button>\n",
			$_SESSION["newsletterToken"],
			$l->translate("subscribenewsletter")
		);
		$out .= "</section>\n";
		
		$out .= str_replace("<ul>", "<ul class=\"socialNet\">", $this->data['socialNetworksModule']);

		$out .= "</section>\n";
		$out .= "</section>\n";
		$out .= "<section class=\"footerNavigation\">\n";
		$out .= "<section class=\"center\">\n";

		$out .= "<section class=\"row\">\n";

		$out .= "<section class=\"col-lg-4 item\">\n";
		$out .= sprintf(
			"<h3>%s</h3>\n",
			$l->translate("help")
		);
		
		$out .= "<ul>\n";
		foreach ($this->data['footerHelpNav'] as $value) {
			$url = Config::WEBSITE.strip_output::index($_SESSION['LANG'])."/".strip_output::index($value['slug']);
			if($value["redirect"]!=""){
				$url = $value["redirect"];
			}
			$out .= sprintf(
				"<li>\n<a href=\"%s\">%s</a></li>\n",
				$url, 
				strip_output::index($value['title'])
			);

		}
		$out .= "</ul>\n";
		

		$out .= "</section>\n";

		$db_contactinfo = new Database("modules", array(
			"method"=>"selectContactData", 
			"lang"=>$_SESSION["LANG"]
		));
		$fetchContactInfo = $db_contactinfo->getter();
		$out .= "<section class=\"col-lg-4 item\">\n";
		$out .= sprintf("<h3>%s</h3>", $l->translate("contactinfo"));

		$out .= "<ul>";
		foreach($fetchContactInfo as $value) {
			$out .= sprintf(
				"<li><i class=\"%s\" aria-hidden=\"true\"></i> <span style=\"margin-left:15px; font-size:18px; font-family:'BPGNinoMedium';\">%s</span></li>\n",
				htmlentities($value['classname']),
				strip_tags($value['description'])
			);
		}
		$out .= "</ul>";

		$out .= "</section>\n";

		// $out .= "<section class=\"col-lg-4 item\">\n";
		// $out .= sprintf(
		// 	"<h3>%s</h3>\n",
		// 	$l->translate("myaccount")
		// );
		// $out .= "<ul>\n";
		// if(!isset($_SESSION[Config::SESSION_PREFIX."web_username"])){
		// 	$out .= sprintf(
		// 		"<li><a href=\"#\"  class=\"signIn\" data-boxtitle=\"%s\">%s</a></li>\n",
		// 		$l->translate("signin"),
		// 		$l->translate("signin")
		// 	);
		// 	$out .= sprintf(
		// 		"<li><a href=\"#\" class=\"createAccount\" data-boxtitle=\"%s\">%s</a></li>\n",
		// 		$l->translate("createnewaccount"),
		// 		$l->translate("createnewaccount")
		// 	);
		// }else{
		// 	$out .= sprintf(
		// 		"<li><a href=\"?view=purchases\">Purchases</a></li>\n"
		// 	);
		// 	$out .= sprintf(
		// 		"<li><a href=\"?view=favourites\">Favourites</a></li>\n"
		// 	);
		// 	$out .= sprintf(
		// 		"<li><a href=\"?view=profile\">Profile</a></li>\n"
		// 	);
		// 	$out .= sprintf(
		// 		"<li><a href=\"?view=changepassword\">Change Password</a></li>\n"
		// 	);
		// 	$out .= sprintf(
		// 		"<li><a href=\"#\" class=\"myaccount-signout\">Sign Out</a></li>\n"
		// 	);
		// }
		// $out .= "</ul>\n";
		// $out .= "</section>\n";


		$out .= "<section class=\"col-lg-4 item\">\n";
		$out .= "<ul style=\"margin-top:10px\">\n";
		// $out .= "<li><span><i class=\"fa fa-paypal\" aria-hidden=\"true\"></i> PayPal</span></li>\n";
		// $out .= "<li><span><i class=\"fa fa-cc-mastercard\" aria-hidden=\"true\"></i> MC&amp;Visa</span></li>\n";
		$out .= "<li><img src=\"/public/img/logo.svg?v=2\" alt=\"logo\" width=\"140\" class=\"greyscale\" align=\"right\" /></li>\n";
		$out .= "</ul>\n";
		$out .= "</section>\n";

		$out .= "</section>\n";



		$out .= "<section class=\"claerer\"></section>\n";
		$out .= "<section class=\"copyright\">&copy; 2017 Lemi Voyage - Developed By <a href=\"http://ww.404.ge\" target=\"_blank\">Studio 404</a></section>\n";
		$out .= "</section>\n";
		$out .= "</section>\n";
		$out .= "</footer>\n";

		
		$out .= "</body>\n";
		$out .= "</html>\n";
		
		

		return $out;
	}
}