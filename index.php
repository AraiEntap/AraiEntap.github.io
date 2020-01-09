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
    $response = $fb->get('/465753250754909', '{EAAKrLPnY8FcBANc7ZBMzdedTCFu4ZCFh93IaCUwziZBVZB4NuUEwxOXTR8vIHJXK0uqpOVZCrfsapY1TlVcdls0yLUlzuhdhYPa2hHcG07eErb2VBS5xIxUSLXyZBAAzZBJI1AJZCWVjGqDRKrbxleYfYS521TjTpag1NvAb0kpyuNSsOZAeZClRnOTmd0eWrn79vhh08ZCEecMRKeo55qqZCzOGeubh4cRTUHGh7AeV6g7sQpp3vdJywGohpvG4A0uBPE4ZD}');

} catch (\Facebook\Exceptions\FacebookResponseException $e) {
    // Returns Graph API errors when they occur
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
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