<?php 
class _navigation
{
	public $data;

	public function index(){
		require_once("app/functions/strip_output.php");
		$out = "<ul>\n";
		$out .= "<li class=\"mobileLanguageChange\">\n";
		$out .= "<a href=\"#\" class=\"closeNavigation\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></a>\n";
		$out .= "</li>\n";
		if(count($this->data)){
			foreach($this->data as $value) {
				$subNavigation = new Database('page', array(
					"method"=>"select", 
					"cid"=>(int)$value['idx'], 
					"nav_type"=>0, 
					"lang"=>strip_output::index($value['lang']), 
					"status"=>0
				));
				$active = (isset($_SESSION["URL"][1]) && $_SESSION["URL"][1]==$value['slug']) ? " active" : "";
				if(!isset($_SESSION["URL"][1]) && $value['slug']=="home"){
					$active = "active";
				}
				if($subNavigation->getter()){				
					
					if(isset($value['redirect']) && $value['redirect']!=""){
						$out .= sprintf(
							"<li class=\"hasSub\">\n<a href=\"%s\" class=\"slide%s\"><span>%s</span></a>\n",
							$value['redirect'], 
							strip_output::index($active), 
							strip_output::index($value['title'])
						);
					}else{
						$out .= sprintf(
							"<li class=\"hasSub\">\n<a href=\"%s%s/%s\" class=\"slide%s\"><span>%s</span></a>\n",
							Config::WEBSITE,
							strip_output::index($_SESSION['LANG']),
							strip_output::index($value['slug']), 
							strip_output::index($active), 
							strip_output::index($value['title'])
						);
					}

					$out .= "<ul>\n";

					foreach ($subNavigation->getter() as $val) {
						if(isset($val['redirect']) && $val['redirect']!=""){
							$out .= sprintf(
								"<li><a href=\"%s\"><span>%s</span></a></li>\n",
								$val['redirect'], 
								strip_output::index($val['title'])  
							);	
						}else{
							$out .= sprintf(
								"<li><a href=\"%s%s/%s\"><span>%s</span></a></li>\n",
								Config::WEBSITE,
								strip_output::index($_SESSION['LANG']),
								$val['slug'], 
								strip_output::index($val['title'])  
							);	
						}
					}
					$out .= "</ul>\n";

					$out .= "</li>\n";
				}else{
					if(isset($value['redirect']) && $value['redirect']!=""){
						//$value['redirect']
						$active = (isset($_SESSION["URL"][1]) && ($_SESSION["URL"][1]=="stories-on-map" || $_SESSION["URL"][1]=="stories" || $_SESSION["URL"][1]=="story")) ? " active" : "";
						$out .= sprintf(
							"<li><a href=\"%s\" class=\"header_menu_link %s %s\"><span>%s</span></a></li>\n",
							strip_output::index($value['redirect']), 
							strip_output::index($value['cssclass']), 
							strip_output::index($active), 
							strip_output::index($value['title'])
						);
					}else{
						$out .= sprintf(
							"<li><a href=\"%s%s/%s\" class=\"header_menu_link %s %s\"><span>%s</span></a></li>\n",
							Config::WEBSITE,
							strip_output::index($_SESSION['LANG']),
							strip_output::index($value['slug']), 
							strip_output::index($value['cssclass']), 
							strip_output::index($active), 
							strip_output::index($value['title'])
						);	
					}
				}
				
			}				
		}			
		$out .= "</ul>\n";
		
		return $out;
	}
}