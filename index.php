<?php

/*
 *  INCLUIR ARQUIVOS DA BIBLIOTECA
 */
require_once './lib/src/Facebook/FacebookSession.php';
require_once './lib/src/Facebook/FacebookRequest.php';
require_once './lib/src/Facebook/FacebookResponse.php';
require_once './lib/src/Facebook/FacebookSDKException.php';
require_once './lib/src/Facebook/FacebookRequestException.php';
require_once './lib/src/Facebook/FacebookRedirectLoginHelper.php';
require_once './lib/src/Facebook/FacebookAuthorizationException.php';
require_once './lib/src/Facebook/GraphObject.php';
require_once './lib/src/Facebook/GraphUser.php';
require_once './lib/src/Facebook/GraphSessionInfo.php';
require_once './lib/src/Facebook/Entities/AccessToken.php';
require_once './lib/src/Facebook/HttpClients/FacebookCurl.php';
require_once './lib/src/Facebook/HttpClients/FacebookHttpable.php';
require_once './lib/src/Facebook/HttpClients/FacebookCurlHttpClient.php';


/*
 * USAR NAMESPACES
 */

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookCurl;

/*
 * CÓDIGO
 */

/*
 * 1. Iniciar SESSION
 */

session_start();

/*
 * verificar se o usuário quer sair
 */
if(isset($_REQUEST['logout'])){
    unset($_SESSION['fb_token']);
}

/*
 * 2. Usar APP ID, APP SECRET e redirecionar url
 */
$app_id = '744390368974551';
$app_secret = '1cc13f289d46f1400260fb036ffcb3fd';
$redirect_url = 'http://php-agic.rhcloud.com/';

/*
 * 3. Inicializar APPLICATION, criar HELPER OBJECT e pegar FACEBOOK SESSION
 */
FacebookSession::setDefaultApplication($app_id, $app_secret);
$helper = new FacebookRedirectLoginHelper($redirect_url);
$sess = $helper->getSessionFromRedirect();
/*
 * Verifica se FACEBOOK SESSION existe
 */

if (isset($_SESSION['fb_token'])) {
    $sess = new FacebookSession($_SESSION['fb_token']);
}
/*
 * Sair
 */

$logout = 'http://php-agic.rhcloud.com/index.php?logout=true';

/*
 * 4. Se facebook SESSION existir
 */
if (isset($sess)) {
    /*
     * armazenar o TOKEN na PHP SESSION
     */
    $_SESSION['fb_token'] = $sess->getToken();    
    
    
    /*
     * criar REQUEST OBJECT, executar e capturar RESPONSE
     */
    $request = new FacebookRequest($sess, 'GET', '/351338968253034/feed');
    /*
     * de RESPONSE pegar GRAPH OBJECT
     */
    $response = $request->execute();
    $graph = $response->getGraphObject()->asArray();
    /*
     * use os metodos do GRAPH OBJECT para pegar detalhes do usuário
     */
    
    
    
    
    echo '<pre>';
    print_r($graph);
   echo '</pre>';
    
   
} else {
    /*
     * senão mostre login
     */
    echo '<a href="' . $helper->getLoginUrl(array('email','publish_actions')) . '" >Entrar com o facebook</a>';
}
