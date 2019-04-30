<?php

class bookSubmit 
{
	public $out; 
	public $user_ip; 
	public $user_os; 
	public $user_browser; 

	public function index(){
		require_once 'app/core/Config.php';
		require_once 'app/functions/request.php';
		require_once 'app/functions/string.php';
		require_once 'app/functions/send.php';
		require_once 'app/functions/server.php'; 
		require_once 'app/functions/l.php';

		$l = new functions\l();
		$lang = functions\request::index("POST","lang");

		$server = new functions\server();
		$this->user_ip = $server->ip();
		$this->user_os = $server->os();
		$this->user_browser = $server->browser();

		$this->out = array(
			"Error" => array(
				"Code"=>1, 
				"Text"=>$l->translate("error", $lang),
				"Title"=>$l->translate("message", $lang),
				"Details"=>"!"
			)
		);

		
		$firstname = functions\request::index("POST","firstname");
		$lastname = functions\request::index("POST","lastname");
		$phone = functions\request::index("POST","phone");
		$email = functions\request::index("POST","email");
		$dateArrival = functions\request::index("POST","dateArrival");
		$adults = functions\request::index("POST","adults");
		$childsAgesList = functions\request::index("POST","childsAgesList");
		$booktoken = functions\request::index("POST","booktoken");
		$bookid = functions\request::index("POST","bookid");

		$random = functions\string::random(25);

		
		if(
			(!isset($lang) || empty($lang)) || 
			(!isset($firstname) || empty($firstname)) || 
			(!isset($lastname) || empty($lastname)) || 
			(!isset($phone) || empty($phone)) || 
			(!isset($email) || empty($email)) || 
			(!isset($dateArrival) || empty($dateArrival)) || 
			(!isset($adults) || empty($adults)) || 
			(!isset($bookid) || empty($bookid)) || 
			(!isset($booktoken) || empty($booktoken)) 
		){
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>$l->translate("errorallfieldsrequire", $lang),
					"Title"=>$l->translate("message", $lang),
					"Details"=>""
				)
			);		
		}else if(!isset($_SESSION["token"]) || $_SESSION["token"]!=$booktoken){
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>$l->translate("error", $lang),
					"Title"=>$l->translate("message", $lang),
					"Details"=>""
				)
			);
		}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>$l->translate("erroremail", $lang),
					"Title"=>$l->translate("message", $lang),
					"Details"=>""
				)
			);
		}else{
			$send = new functions\send(); 
			$body = sprintf(
				"<strong>%s %s</strong>: %s %s<br />", 
				ucfirst($l->translate("firstname", $lang)),
				ucfirst($l->translate("lastname", $lang)),
				$firstname,
				$lastname
			);
			
			$body .= sprintf(
				"<strong>%s</strong>: %s<br />", 
				ucfirst($l->translate("phone", $lang)),
				$phone
			);

			$body .= sprintf(
				"<strong>%s</strong>: %s<br />", 
				ucfirst($l->translate("email", $lang)),
				$email
			);

			$body .= sprintf(
				"<strong>%s</strong>: %s<br />", 
				ucfirst($l->translate("arrival", $lang)),
				$dateArrival
			);

			$body .= sprintf(
				"<strong>%s</strong>: %s<br />", 
				ucfirst($l->translate("adults", $lang)),
				$adults
			);	

			$body .= sprintf(
				"<strong>%s</strong>: %s<br />", 
				ucfirst($l->translate("children", $lang)),
				$childsAgesList
			);	

			$body .= sprintf(
				"<a href=\"https://lemivoyage.com/en/view/the-tour/?id=%s\">%s</a><br />", 
				$bookid,
				ucfirst($l->translate("visitbookedtour", $lang))
			);			

			$send->index(array(
				"sendTo"=>array(Config::RECIEVER_EMAIL, $email), 
				"subject"=>"Booking",
				"body"=>$body
			));

			$payments = new Database("payments", array(
				"method"=>"insert", 
				"ip_address"=>$this->user_ip,
				"os"=>$this->user_os,
				"browser"=>$this->user_browser,
				"tbc_trans_id"=>"",
				"tour_id"=>$bookid,
				"firstname"=>$firstname,
				"lastname"=>$lastname,
				"phone"=>$phone,
				"email"=>$email,
				"checkinCheckout"=>$dateArrival,
				"tour_services"=>"",
				"adults"=>$adults,
				"children"=>"",
				"children_ages"=>$childsAgesList,
				"total_price"=>0,
				"payment_status"=>1,
				"status"=>0
			));



			$this->out = array(
				"Error" => array(
					"Code"=>0, 
					"Text"=>$l->translate("errornull", $lang),
					"Title"=>$l->translate("message", $lang),
					"Details"=>""
				)
			);	
		}

		return $this->out;
	}

}
?>