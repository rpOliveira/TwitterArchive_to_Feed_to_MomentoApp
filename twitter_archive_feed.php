<?php

$server = 'YOUR SERVER URL HERE';


$script_name = 'twitter_archive_feed.php';
$statuses_url = $server . 'old_tweets.js';

$fetch_json = file_get_contents($statuses_url);
$return = json_decode($fetch_json);
$output = "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>
           <rss version=\"2.0\">
           <channel>
           <title>Old tweets</title>
           <link>$server/twitter_archive_feed.php</link>
           <description>$list_name</description>";

foreach ($return as $line){
          
    $item_date = substr($line->created_at,0,3) . ", ".  substr($line->created_at,8,2) . " " . substr($line->created_at,4,3) . " " . substr($line->created_at,26,4) . " " . substr($line->created_at,11,8) . " +0100";

    $text = utf8_decode($line->text); 

    $output .= "<item><title><![CDATA[".$line->user->screen_name.": ".$text."]]></title>
                <pubDate>$item_date</pubDate>
                <link>".htmlentities("https://twitter.com/".$line->user->screen_name."/statuses/".$line->id_str)."</link>
                <description><![CDATA[".$text."]]></description>
                </item>";
}

    $output .= "</channel></rss>";
    header("Content-Type: application/rss+xml");
    echo $output;
?>
