<!DOCTYPE html>
<html>
<head>
    <title>
        My Name
    </title>
</head>

<body>
<h1>Get My Name from Facebook</h1>

<?php

require_once __DIR__ . '/vendor/autoload.php';

$fb = new \Facebook\Facebook([
    'app_id' => '{751159612076119}',           //Replace {your-app-id} with your app ID
    'app_secret' => '{6e0e64f37b4edbbbb3d7681efb97b9bb}',   //Replace {your-app-secret} with your app secret
    'graph_api_version' => 'v5.0',
]);


try {

// Get your UserNode object, replace {access-token} with your token
    $response = $fb->get('/465753250754909', '{EAAKrLPnY8FcBAELTggnF0rOuCwY26IyCRRoGxFseuqZBRRwjeD5wsw0ijpjtCPZA4Llwou6iZCZCM9ATWMwZBEfpoH4eRO7unOh2W6QV1MAKLcnETE1GQPZAVbZB8NI6M612FNxEBagZAuslBCz1svnPEWGZClEUCsEn1ZBC63wqznsHrs9ZCl3FFnZCB9TwX4Aazdu4ZC6cG9xexJgZDZD}');

} catch(\Facebook\Exceptions\FacebookResponseException $e) {
    // Returns Graph API errors when they occur
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
    // Returns SDK errors when validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

$me = $response->getGraphUser();

//All that is returned in the response
echo 'All the data returned from the Facebook server: ' . $me;

//Print out my name
echo 'My name is ' . $me->getName();

?>

</body>
</html>