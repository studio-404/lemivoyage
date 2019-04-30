<?php

class bookSubmit 
{
	public $out; 

	public function index(){
		require_once 'app/core/Config.php';
		require_once 'app/functions/request.php';
		require_once 'app/functions/string.php';
		require_once 'app/functions/send.php';
		require_once 'app/functions/l.php';

		$l = new functions\l();
		$lang = functions\request::index("POST","lang");

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
				"<strong>Firstname Lastname</strong>: %s %s<br />", 
				$firstname,
				$lastname
			);
			
			$body .= sprintf(
				"<strong>Phone</strong>: %s<br />", 
				$phone
			);

			$body .= sprintf(
				"<strong>Email</strong>: %s<br />", 
				$email
			);

			$body .= sprintf(
				"<strong>Date Arrival</strong>: %s<br />", 
				$dateArrival
			);

			$body .= sprintf(
				"<strong>Adults</strong>: %s<br />", 
				$adults
			);	

			$body .= sprintf(
				"<strong>Children From 4 - 12</strong>: %s<br />", 
				$childsAgesList
			);	

			$body .= sprintf(
				"<strong>Tour Link</strong>: <a href=\"https://lemivoyage.com/en/view/the-tour/?id=%s\">Visit booked tour</a><br />", 
				$bookid
			);

			$body2 = sprintf(
				"<strong>We will contact you as soon as possible..</strong>"
			);			

			$send->index(array(
				"sendTo"=>array(Config::RECIEVER_EMAIL, $email), 
				"subject"=>"Booking",
				"body"=>$body
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