<?php
session_start();
date_default_timezone_set('Asia/Tokyo');

require_once 'php-graph-sdk-master/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '{751159612076119}',           //Replace {your-app-id} with your app ID
    'app_secret' => '{6e0e64f37b4edbbbb3d7681efb97b9bb}',   //Replace {your-app-secret} with your app secret
    'default_graph_version' => 'v5.0',
]);

$helper = $fb->getRedirectLoginHelper();

try {
    $access_token = $helper->getAccessToken();
    $res = $fb->get( '/me', $access_token);

} catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo $e->getMessage();
    exit();

} catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo $e->getMessage();
    exit();
}

var_dump($res->getDecodedBody());