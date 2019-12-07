<?php
/*
(c)2013 Lonnie Waugh ( blog.oneduality.com )
License: Dowhateveryouwantwithit
Disclaimer:

I'm not responsible for anything if you use this, period! .. you're on your own buddy!

This code is PURELY for educational purposes only and is not intended for actual use. If you use it then you risk getting your account deleted by Twitter!

Again, this code is STRICTLY for educational purposes to show the power of the Simple HTML Dom class.

Requirements:

1. http://simplehtmldom.sourceforge.net/
2. I dunno? :) it was written and tested under PHP 5.2 and will probably run fine on 5.3 and 5.4, you tell me =)

Usage:

Simple, just include the file, I called mine "tweets.php" and then do something like this

$tweet = new tweets();
$tweet->twit = "SOME TWITTER USERNAME";
$tweet->count = 2;
$tweets = $tweet->get_feed();

Note:

The number of tweets returned is 20, it won't go higher than that.. the count variable specifies how many you want UP to 20 ..

Return values:

An array containing:

1. avatar ( this is the twit's avatar photo, the larger one )
2. timestamp ( raw timestamp so you can format it anyway you want )
3. time ( formatted time string, just a convenience )
4. text ( the tweet text with all html tags stripped out )

*/
include("vendor/simple_html_dom.php");

class tweets {

	var $twit;
	var $count = 20;

	function get_feed() {
		if (! trim($this->twit) ) {
			print "You didn't specify the twit you want tweets from!\n";
			return false;
		}
		$dom = file_get_html('http://twitter.com/' . $this->twit);
		$avatar = $dom->find('a[class=profile-picture]',0);
		$tweets['avatar'] = $avatar->href;

		$i = 0;
		foreach($dom->find('div[class=content]') as $tweet) {
			if ($i >= $this->count) {
				return $tweets;
			}

			$time = $tweet->find('span[class=_timestamp]',0);
			$html = $tweet->find('p[class=tweet-text]',0);
			$text = $this->decode_entities(strip_tags($html));

			$tweets['tweets'][$i]['timestamp'] = $time->attr['data-time'];
			$tweets['tweets'][$i]['time'] = date('Y-m-d h:i:s a', $time->attr['data-time']);
			$tweets['tweets'][$i]['text'] = $text;
			$i++;
		}
		return $tweets;
	}

	function decode_entities($text) {
		$text= html_entity_decode($text,ENT_QUOTES,"ISO-8859-1"); #NOTE: UTF-8 does not work!
		$text= preg_replace('/&#(\d+);/me',"chr(\\1)",$text); #decimal notation
		$text= preg_replace('/&#x([a-f0-9]+);/mei',"chr(0x\\1)",$text);  #hex notation
		return $text;
	}
}
?>