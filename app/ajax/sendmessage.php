<?php 
class sendmessage
{
	public $out; 

	public function __construct()
	{

	}
	
	public function index(){
		require_once 'app/core/Config.php';
		require_once 'app/functions/request.php';
		require_once 'app/functions/l.php';
		require_once 'app/functions/sendEmail.php';

		$l = new functions\l();

		$this->out = array(
			"Error" => array(
				"Code"=>1, 
				"Text"=>"მოხდა შეცდომა !",
				"Details"=>"!"
			)
		);

		$lang = functions\request::index("POST","lang");
		$serialize = functions\request::index("POST","serialize");
		
		parse_str($serialize, $values);


		if(
			empty($values["firstname"]) && 
			empty($values["email"]) &&
			empty($values["subject"]) && 
			empty($values["massage"]) 
		){
			$error = 1;
			$Success = 0;
  			$errorText = $l->translate("errorallfieldsrequire", $lang);
		}else if (!filter_var($values["email"], FILTER_VALIDATE_EMAIL)) {
			$error = 1;
			$Success = 0;
  			$errorText = $l->translate("erroremail", $lang);
		}else{
				$email = str_replace("%40", "@", $values["email"]);
				$error = 0;
				$Success = 1;
	  			$errorText = $l->translate("errornull", $lang);

	  			$Database = new Database('comments', array(
					'method'=>'insert', 
					'commentId'=>1, 
					'firstname'=>$values["firstname"], 
					'organization'=>$values["subject"],
					'email'=>$values["email"],
					'comment'=>$values["message"],
					'lang'=>$lang
				));

				
	  			// $args = array(
	  			// 	"sendTo"=>cONFIG::RECIEVER_EMAIL,
	  			// 	"subject"=>Config::NAME,
	  			// 	"body"=>$body
	  			// );
	  			// $sendEmail = new functions\sendEmail();
	  			// $sendEmail->index($args);
		}

		$this->out = array(
			"Error" => array(
				"Code"=>$error, 
				"Text"=>$errorText,
				"Details"=>""
			),
			"Success"=>array(
				"Code"=>$Success, 
				"Text"=>$errorText,
				"Details"=>""
			)
		);

		return $this->out;
	}
}