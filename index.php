<?php 
session_start();
require_once __DIR__ . '/Facebook/autoload.php';

$fb = new \Facebook\Facebook([
  'app_id' => '1145321875517395',
  'app_secret' => '2ecf70ed6ffb20481a5f5cc8920bab53',
  'default_graph_version' => 'v2.8',
]);

   $permissions = ['user_birthday']; // optional
   $helper = $fb->getRedirectLoginHelper();
   $accessToken = $helper->getAccessToken();
   
if (isset($accessToken)) {
	
 		$url = "https://graph.facebook.com/v2.8/me?fields=birthday&access_token={$accessToken}";
		$headers = array("Content-type: application/json");
		
			 
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 curl_setopt($ch, CURLOPT_URL, $url);
	         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		 curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		 curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3"); 
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		   
		 $st=curl_exec($ch); 
		 $result=json_decode($st,TRUE);
		 echo "<pre>";
		 var_dump($result);
		 echo "</pre>";
		 // echo "<center>";
		 // echo "<h2>Birthday : ".$result['birthday']."</h2>";
		 // echo "</center>";
		 
		 
		 
		

} else {

	$loginUrl = $helper->getLoginUrl('http://ahsdok.net/ATNSTUDIO/', $permissions);
	echo '<a href="' . $loginUrl . '">Login with Facebook</a>';
}
	