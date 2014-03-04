<?php

require_once 'inc/library/twitter-api-php/TwitterAPIExchange.php';

$settings = array(
    'oauth_access_token' => '550379307-tca6KamBeEhBJcMpJXLdkfPX0dkFd7KlluWRnRfL',
    'oauth_access_token_secret' => 't9d14DJsbKeYm6GWmw6YNrCWjqfj1AdFsY1i5XkzitXZV',
    'consumer_key' => 'OVDCE7CLqKHPVOAIVTNwQ',
    'consumer_secret' => 'kzKWmE6SSWNwlmhMi1dRGPcHmef2pUs91bu7qgPts',
);
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$getfield = '?q=#motivational&result_type=recent';

$twitter = new TwitterAPIExchange($settings);

$result = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest());
$statuses = $result->statuses;
$i = array_rand($statuses);
// print_r($statuses[$i]);

?>