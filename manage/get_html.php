<?php require "../core.php"; ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);use peterkahl\KeywordGenerator\KeywordGenerator; ?>
  <title>افزودن منبع جدید</title>

    <link rel="stylesheet" href="<?= constant("DIR"); ?>assets/css/site.min.css">
    <div class="container" style="direction: ltr;text-align: left">
        <br>
        <a href="dashboard.php" class="btn btn-dark btn-block">بازگشت به داشبورد</a>
        <br>
 <?php

    $kwObj = new KeywordGenerator;


    $id = $_GET['id'];
    $query = $db->prepare("SELECT * FROM rss_reader WHERE rss_ID = '$id'");
    $query->execute();
    $show = $query->fetch();


    $url =$show['source'];


    $html = file_get_html($url);
    $links = array();
    foreach ($html->find($show['start_html_url']) as $a) {
        $links[] = $a->href;
        echo  "New url : " . $show['starter'].$a->href."<br>";
       
        $myurl = $show['starter'].$a->href;
      $cheker =  check_dublicate($db,$myurl,'fa',$show['rss_ID'],$show['start_html'],$show['end_html'],$show['start_html_title'],$show['end_html_title'],$_SESSION['memberID']);

    }




