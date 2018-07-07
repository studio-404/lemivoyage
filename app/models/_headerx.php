<?php 
class _header
{
	public $public;
	public $lang;
	public $pagedata;
	public $imageSrc;
	public $story;

	public function index(){ 

		$getter = $this->pagedata->getter(); 
		if(isset($getter['title'])){
			$title = strip_tags($getter['title']);
			$description = strip_tags($getter['description']);
		}else if(isset($getter[0]['title'])){
			$title = strip_tags($getter[0]['title']); 
			$description = strip_tags($getter[0]['description']);
		}else{
			$title = "";
			$description = "";
		}

		if(isset($this->story)){
			$title = strip_tags($this->story['name']);
			$description = strip_tags($this->story['about']);
		}

		$out = "<!DOCTYPE html>\n";
		$out .= "<html>\n";
		$out .= "<head>\n";
		$out .= "<meta charset=\"utf-8\">\n";
		$out .= "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
		
		$out .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\n";
		$out .= "<meta name=\"format-detection\" content=\"telephone=no\"/>\n";
		$out .= sprintf("<title>%s - Shuki movida</title>\n", strip_tags($title));
		
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$out .= "<meta property=\"fb:app_id\" content=\"1051471441646775\" />\n";
		$out .= "<meta property=\"og:title\" content=\"".strip_tags($title)."\" />\n";
		$out .= "<meta property=\"og:type\" content=\"website\" />\n";
		$out .= "<meta property=\"og:url\" content=\"".$actual_link."\"/>\n";
		
		if(isset($this->imageSrc)){
			$image = $this->imageSrc;
		}else{
			$image = $this->public."img/share.jpg";
		}
		$out .= sprintf(
			"<meta property=\"og:image\" content=\"%s\" />\n", 
			$image
		);
		$out .= sprintf(
			"<link rel=\"image_src\" type=\"image/jpeg\" href=\"%s\" />\n", 
			$image
		);


		$out .= "<meta property=\"og:image:width\" content=\"600\" />\n";
		$out .= "<meta property=\"og:image:height\" content=\"315\" />\n";
		$out .= "<meta property=\"og:site_name\" content=\"Shuqi movida\" />\n";
		$out .= "<meta property=\"og:description\" content=\"".$description."\"/>\n";

		$out .= sprintf(
			"<link rel=\"icon\" type=\"image/ico\" href=\"%simg/favicon.ico\" />\n", 
			$this->public
		);

		// $out .= sprintf(
		// 	"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/reset.css\" />\n", 
		// 	$this->public
		// );

		// $out .= sprintf(
		// 	"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/font-en.css\" />\n", 
		// 	$this->public
		// );

		// $out .= sprintf(
		// 	"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/owl.carousel.css\" />\n", 
		// 	$this->public
		// );

		// $out .= sprintf(
		// 	"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/owl.theme.css\" />\n", 
		// 	$this->public
		// );

		// $out .= sprintf(
		// 	"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/owl.transitions.css\" />\n", 
		// 	$this->public
		// );

		// $out .= sprintf(
		// 	"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/jquery-ui.min.css\" />\n", 
		// 	$this->public
		// );

		// $out .= sprintf(
		// 	"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/jquery-ui.theme.min.css\" />\n", 
		// 	$this->public
		// );

		// $out .= sprintf(
		// 	"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/leaflet.css\" />\n", 
		// 	$this->public
		// );

		// $out .= sprintf(
		// 	"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/layout.css?time=%s\" />\n", 
		// 	$this->public,
		// 	time()
		// );

		// $out .= sprintf(
		// 	"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/mobile.css\" />\n", 
		// 	$this->public
		// );
		
		$out .= sprintf(
			"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/production.css\" />\n", 
			$this->public
		);

		if(isset($_SESSION['LANG']) && $_SESSION['LANG']=="ge"){
			$out .= sprintf(
				"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/ge.css\" />\n", 
				$this->public
			);
		}
		
		$out .= "</head>\n";
		$out .= "</body>\n";
		$out .= "<div id=\"fb-root\"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1051471441646775\";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>";
		return $out;
	}
}