<?php 
class _header
{
	public $public;
	public $lang;
	public $pagedata;
	public $imageSrc;
	public $product;

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

		if(isset($this->product)){
			$title = strip_tags($this->product['title']);
			$description = strip_tags($this->product['short_description']);
		}

		$out = "<!DOCTYPE html>\n";
		$out .= "<html>\n";
		$out .= "<head>\n";
		$out .= "<meta charset=\"utf-8\">\n";
		$out .= "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
				
		$out .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\n";
		$out .= "<meta name=\"format-detection\" content=\"telephone=no\"/>\n";
		$out .= sprintf("<title>%s - Lemi Voyage</title>\n", strip_tags($title));
		
		$actual_link = "http://".$_SERVER["HTTP_HOST"].htmlentities($_SERVER["REQUEST_URI"]);
		$out .= "<meta property=\"fb:app_id\" content=\"682856188581004\" />\n";
		$out .= "<meta property=\"og:title\" content=\"".strip_tags($title)."\" />\n";
		$out .= "<meta property=\"og:type\" content=\"website\" />\n";
		$out .= "<meta property=\"og:url\" content=\"".$actual_link."\"/>\n";
		
		if(isset($this->imageSrc)){
			$image = $this->imageSrc;
		}else{
			$image = $this->public."img/lemivoyage.jpg";
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
		$out .= "<meta property=\"og:site_name\" content=\"Lemi Voyage\" />\n";
		$out .= "<meta property=\"og:description\" content=\"".htmlentities($description)."\"/>\n";


		$out .= sprintf(
			"<link rel=\"icon\" type=\"image/ico\" href=\"%simg/favicon.png\" />\n", 
			$this->public
		);
		
		$out .= sprintf(
			"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/bootstrap.min.css\" />\n", 
			$this->public
		);

		$out .= sprintf(
			"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/bootstrap-select.min.css\" />\n", 
			$this->public
		);

		$out .= sprintf(
			"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/bootstrap-datepicker.css\" />\n", 
			$this->public
		);

		$out .= sprintf(
			"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/font-awesome.css\" />\n", 
			$this->public
		);

		$out .= sprintf(
			"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/owl.carousel.min.css\" />\n", 
			$this->public
		);

		$out .= sprintf(
			"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/bootstrap-slider.min.css\" />\n", 
			$this->public
		);

		$out .= sprintf(
			"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/style.css?time=%s\" />\n", 
			$this->public,
			time()
		);

		// if(isset($_SESSION['LANG']) && $_SESSION['LANG']=="ge"){
		// 	$out .= sprintf(
		// 		"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/ge.css\" />\n", 
		// 		$this->public
		// 	);   
		// }

		$out .= sprintf(
			"<script src=\"%sjs/web/jquery-3.2.1.min.js\" charset=\"utf-8\"></script>\n", 
			$this->public
		);

		$out .= sprintf(
			"<script src=\"%sjs/web/bootstrap.min.js\" charset=\"utf-8\"></script>\n", 
			$this->public
		);

		$out .= sprintf(
			"<script src=\"%sjs/web/bootstrap-select.min.js\" charset=\"utf-8\"></script>\n", 
			$this->public
		);

		$out .= sprintf(
			"<script src=\"%sjs/web/bootstrap-datepicker.js\" charset=\"utf-8\"></script>\n", 
			$this->public
		);

		$out .= sprintf(
			"<script src=\"%sjs/web/owl.carousel.min.js\" charset=\"utf-8\"></script>\n", 
			$this->public
		);

		$out .= sprintf(
			"<script src=\"%sjs/web/bootstrap-slider.min.js\" charset=\"utf-8\"></script>\n", 
			$this->public
		);

		$out .= sprintf(
			"<script src=\"%sjs/web/scripts.js?t=%s\" charset=\"utf-8\"></script>\n", 
			$this->public,
			time()
		);
		
		$out .= "<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-109223448-1\"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-109223448-1');
</script>\n";
		$out .= "</head>\n";
		$out .= "<body>\n";
		$out .= "<div class=\"modal fade\" tabindex=\"-1\" role=\"dialog\">\n";
		$out .= "<div class=\"modal-dialog\" role=\"document\" style=\"width: 340px;\">\n";
		$out .= "<div class=\"modal-content\">\n";
		$out .= "<div class=\"modal-header\">\n";
		$out .= "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\n";
		$out .= "<h4 class=\"modal-title theTitle\">&nbsp;</h4>\n";
		$out .= "</div>\n";
		$out .= "<div class=\"modal-body theMessage\">\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		// $out .= "<div style=\"width:250px; left:calc(50% - 125px); position: absolute; z-index:10000; line-height:40px; font-size: 16px; text-align:center; color: white; font-family: 'BPGNinoMedium';\">Website Is Under Development</div>\n";

		
		
		return $out;
	}
}