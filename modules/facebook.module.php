<?php
	declare(strict_types = 1);

	require_once __DIR__ . '/../vendor/autoload.php';

	session_start();

	Class Login_with_facebook{
		private $fb;
		public $accessToken;
		public $me;
		public $loginURL;

		public function __construct(string $appId, string $appSecret, string $graphVersion = 'v2.10'){
			$this->fb = new Facebook\Facebook([
				'app_id' => $appId,
				'app_secret' => $appSecret,
				'default_graph_version' => $graphVersion
			]);
		}
		public function getLoginURL(string $callbackURL, array|string $permissions = []){
			$helper = $this->fb->getRedirectLoginHelper();
			$permissions = (is_string($permissions)) ? explode(' ', $permissions) : $permissions;
			$this->loginURL = $helper->getLoginUrl($callbackURL, $permissions);
			return $this->loginURL;
		}
		public function getAccessToken(){
			$helper = $this->fb->getRedirectLoginHelper();
			$_SESSION['FBRLH_state'] = $_GET['state'];

			try{
				$this->accessToken = $helper->getAccessToken();
			} catch(Facebook\Exception\ResponseException | Facebook\Exception\SDKException | Facebook\Exceptions\FacebookResponseException $e){
				return false;
			}

			return ($this->accessToken) ? $this->accessToken : false;
		}
		public function getMe(string|array $fields = ''){
			$fields = (is_string($fields)) ? $fields : implode(',', $fields);
			try {
        		$response = $this->fb->get('/me?fields='.$fields, $this->accessToken->getValue());
		    } catch(Facebook\Exceptions\FacebookResponseException | Facebook\Exceptions\FacebookSDKException $e) {
		        return false;
		    }
		    $this->me = $response->getGraphUser()->asArray();
		    return $this->me;
		}
		static public function identity(){
			if(!isset($_SESSION['authentication']['status'])){
				return false;
			} elseif ($_SESSION['authentication']['status'] === 'unregister') {
				return 'unregister';
			} elseif ($_SESSION['authentication']['status'] === 'registered') {
				return 'registered';
			} else {
				return false;
			}
		}
	}
?>
