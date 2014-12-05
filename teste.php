<?php
// include required files form Facebook SDK // added in v4.0.5 

require_once( 'Facebook/FacebookHttpable.php' );
require_once( 'Facebook/FacebookCurl.php' );
require_once( 'Facebook/FacebookCurlHttpClient.php'); 

// added in v4.0.0 require_once( 'Facebook/FacebookSession.php');
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );

require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/

FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php'

        );
require_once( 'Facebook/FacebookRequestException.php' );

require_once( 'Facebook/FacebookOtherException.php' );

require_once( 'Facebook/FacebookAuthorizationException.php' );

require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/

GraphSessionInfo.php' ); // added in v4.0.5 use Facebook\FacebookHttpable; 

use Facebook\FacebookCurl;
use Facebook\FacebookCurlHttpClient; 

// added in v4.0.0

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo; // init app with app id and secret 

FacebookSession::setDefaultApplication('xxx', 'yyy'); // get app access_token 

$session = FacebookSession::newAppSession(); // make request to Facebook 
$request = new FacebookRequest($session, 'GET', '/318251298186105');
$response = $request->execute(); // get response as array 
$content  = $response->getGraphObject()->asArray(); // output html 
?> 
<h1><?= $content['name'] ?> (<?= $content['id'] ?>)</h1> 
<p><img src="http://graph.facebook.com/<?= $content['id'] ?>/picture?width=180&height=180" />
</p> <p>About: <?= $content['about'] ?></p> 
<p>Bio: <?= $content['bio'] ?></p> 
<p>Band Members: <?= $content['band_members']?></p> 
<p>Genre: <?= $content['genre'] ?></p>
