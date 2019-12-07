<?php
require "../core.php";
use peterkahl\KeywordGenerator\KeywordGenerator;
;


if(isset($_SESSION['adminX'])){

    ?>

    <title>افزودن منبع جدید</title>

    <link rel="stylesheet" href="<?= constant("DIR"); ?>assets/css/site.min.css">
    <div class="container rtl">
        <br>
        <a href="dashboard.php" class="btn btn-dark btn-block">Block to dashboard</a>
        <br>
    <?php

$kwObj = new KeywordGenerator;


$id= $_GET['id'];
$rss = 'Rss';
$query = $db->prepare("SELECT * FROM rss_reader WHERE rss_ID = '$id' AND sys='$rss'");
$query->execute();
$show = $query->fetch();



$rss = simplexml_load_file($show['source']);



echo '<h2>'. $rss->channel->title . '</h2>';

foreach ($rss->channel->item as $item) {



    $check_duplicate_url = $db->query("SELECT source FROM content WHERE source = '$item->link'");
    $check_duplicate_url->execute();
    $show_dublicate_url = $check_duplicate_url->fetch();
    if(empty($show_dublicate_url))
    {




        $url = curl_page($item->link);
        $url_file = file_get_contents($item->link);
        $html = new DOMDocument();
        @$html->loadHTML($url);
        $meta_og_img = null;
        foreach($html->getElementsByTagName('meta') as $meta) {
            if($meta->getAttribute('property')=='og:image'){
                $meta_og_img = $meta->getAttribute('content');
            }
            if($meta->getAttribute('property')=='og:title'){
                $meta_og_title = $meta->getAttribute('content');
            }
            if($meta->getAttribute('property')=='og:description'){
                $meta_og_description = $meta->getAttribute('content');
            }
        }



        preg_match("'<div class=\"body\">(.*?)<\/". $show['end_html'] .">'si", $url_file, $match);
        $url =$meta_og_img;
        $rnd = RAND();
        $img = '../images/image-' .$rnd .'.jpg';
        $ch = curl_init($url);
        $fp = fopen($img, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
        $str   = $item->description.$item->title.$item->title;
        $match = "";
        $kwObj->lang = 'en';
        $hashtag = $kwObj->generateKW($str);
        $dtime =  date("Y-m-d h:i:sa");
        $query = $db->prepare("INSERT INTO `content` (title,description,source,lang,content,hashtags,image,dtime,memberID,rss_ID) VALUES (:title,:description,:source,:lang,:content,:hashtags,:image,:dtime,:memberID,:rss_ID)");
        $query->bindParam(":title",$item->title );
        $query->bindParam(":description",$item->description);
        $query->bindParam(":source",$item->link);
        $query->bindParam(":lang",$show['lang']);
        $query->bindParam(":content",$match);
        $query->bindParam(":hashtags",$hashtag);
        $query->bindParam(":image",$rnd);
        $query->bindParam(":dtime",$dtime);
        $query->bindParam(":memberID",$_SESSION['memberID']);
        $query->bindParam(":rss_ID",$show['rss_ID']);
        $checker = $query->execute();

    }

}
}