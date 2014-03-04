<?php

namespace library\content;

require_once realpath(__DIR__ . '/../../twitter-api-php/TwitterAPIExchange.php');

class Message {

	private $message = null;
  
	public function __construct() {
		$twitter = new \TwitterAPIExchange(\library\Config::$oauth_settings);
		$url = 'https://api.twitter.com/1.1/search/tweets.json';
		$requestMethod = 'GET';
		$getfield = '?q=#motivation&result_type=recent';

		$quoteObj = null;
		
		try {
			$result = json_decode($twitter->setGetfield($getfield)
			             ->buildOauth($url, $requestMethod)
			             ->performRequest());
			$statuses = $result->statuses;
			$i = array_rand($statuses);

			$quoteObj = $statuses[$i];
			while (isset($quoteObj->retweeted_status)) {
			    $quoteObj = $quoteObj->retweeted_status;
			}
		} catch (Exception $e) {
		 	error_log($e->getMessage());
		}
	
		$this->message = $quoteObj;
	}

	public function getMessageObj() {
		return $this->message;
	}

	public function getText($_formatted = false) {
		if ($_formatted) {
			return self::linkify($this->message->text);
		} else {
			return $this->message->text;
		}
	}

	public function getTweetURL() {
		return "https://twitter.com/{$this->message->user->screen_name}/status/{$this->message->id}";
	}

	public function getUsername() {
		return $this->message->user->name;
	}

	public function getUsernameURL() {
		return "https://twitter.com/{$this->message->user->screen_name}";
	}


	/*
		Utilities
	 */
	public static function linkify($_string) {
		$string = preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" target=\"_blank\">$3</a>", $_string);
	    $string = preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\" target=\"_blank\">$3</a>", $string);
	    $string = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\" target=\"_blank\">$2@$3</a>", $string);
	    return $string;
	}
}

?>