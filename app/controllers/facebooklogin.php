<?
class Facebooklogin extends Controller
{
	public function __construct()
	{ 
	}

	public function index()
	{
		try{
			require_once 'app/functions/redirect.php';
			require_once('app/_plugins/php-graph-sdk-5.x/src/Facebook/autoload.php'); 
			require_once 'app/functions/string.php';
	        $fb = new Facebook\Facebook([
	            'app_id' => '682856188581004', // Replace {app-id} with your app id
				'app_secret' => 'e54b2128db665f011760d561d37fca6a',
				'default_graph_version' => 'v2.2'
	        ]);

	        $helper = $fb->getRedirectLoginHelper();

	        try {
	          $accessToken = $helper->getAccessToken();
	        } catch(Facebook\Exceptions\FacebookResponseException $e) {
	          echo 'Graph returned an error: ' . $e->getMessage();
	          exit;
	        } catch(Facebook\Exceptions\FacebookSDKException $e) {
	          echo 'Facebook SDK returned an error: ' . $e->getMessage();
	          exit;
	        }

	        if (!isset($accessToken)) {
	          if ($helper->getError()) {
	            header('HTTP/1.0 401 Unauthorized');
	            echo "Error: " . $helper->getError() . "\n";
	            echo "Error Code: " . $helper->getErrorCode() . "\n";
	            echo "Error Reason: " . $helper->getErrorReason() . "\n";
	            echo "Error Description: " . $helper->getErrorDescription() . "\n";
	          } else {
	            header('HTTP/1.0 400 Bad Request');
	            echo 'Bad request';
	          }
	          exit;
	        }

	        $_SESSION['fb_access_token'] = (string) $accessToken;
	        
	        try {
	          $response = $fb->get('/me?fields=birthday,name,email,gender', $accessToken);
	          
	        } catch(Facebook\Exceptions\FacebookResponseException $e) {
	          echo 'Graph returned an error: ' . $e->getMessage();
	          exit;
	        } catch(Facebook\Exceptions\FacebookSDKException $e) {
	          echo 'Facebook SDK returned an error: ' . $e->getMessage();
	          exit;
	        }

	        $user = json_decode($response->getGraphUser(), true);
	        $email_random = functions\string::random(10); // random
			$name = explode(" ",$user["name"]);
			$gender = ($user["gender"]=="male") ? 1 : 2;
	        
			$check_user_exists = new Database("user", array(
				"method"=>"check_user_exists", 
				"username"=>$user["email"]
			));
			if(!$check_user_exists->getter()){
				$user_insert = new Database("user", array(
					"method"=>"insert", 
					"username"=>$user["email"], 
					"password"=>md5(time()), 
					"firstname"=>$name[0], 
					"lastname"=>$name[1], 
					"dob"=>date("Y-m-d"), 
					"gender"=>$gender, 
					"email_confirm"=>1, 
					"country"=>0, 
					"city"=>0, 
					"phone"=>'', 
					"email_random"=>$email_random, 
					"postcode"=>''
				));
				if($user_insert->getter()){
					$_SESSION[Config::SESSION_PREFIX."web_username"] = $user["email"];
				}
			}else{
				$db_user = new Database("user", array(
					"method"=>"emailConfirm2",
					"email"=>$user["email"]
				));

				$_SESSION[Config::SESSION_PREFIX."web_username"] = $user["email"];
			}		

			functions\redirect::url(Config::WEBSITE.$_SESSION["LANG"]."/myaccount/?view=profile");	

		}catch(Exception $e){
			echo $e;
		}
		
	}

}