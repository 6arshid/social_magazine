<?php
// in the name of god
ob_start();
session_start();
// in the name of god
require __DIR__ . '/vendor/autoload.php';

//set timezone
date_default_timezone_set('Europe/Copenhagen');

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','today');


//application address
define('DIR','http://localhost/');
define('SITEEMAIL','noreply@last.today');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
define('DB_DRIVER', 'mysql');
define('DB_PREFIX', 'em_');

try {

    //create PDO connection
    $db = new PDO("mysql:host=".DBHOST.";charset=utf8mb4;dbname=".DBNAME, DBUSER, DBPASS);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Suggested to comment on production websites
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch(PDOException $e) {
    //show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}



//include the user class, pass in the database connection
include('vendor/user.php');
include('vendor/phpmailer/mail.php');
include('vendor/KeywordGenerator.php');
include('vendor/simple_html_dom.php');

$user = new User($db);
use peterkahl\KeywordGenerator\KeywordGenerator;
$kwObj = new KeywordGenerator;




// If account is public you can query Instagram without auth
$instagram = new \InstagramScraper\Instagram();

function redirect($url){
    header("Location: $url");
}
function checker($id){
    htmlspecialchars($id);
}

function get_admin_data($db,$username,$password){


    try {
       $sql = $db->query("SELECT * FROM members WHERE username = '$username' AND password= '$password' AND Xadmin = 1");
       $sql->execute();
       $show = $sql->fetch();
       if(!empty($show)){
           $_SESSION['adminX'] = $show['username'];
            redirect("dashboard.php");
       }else{
           echo "problemlxxxx";
       }
    }
    catch (exception $e) {
       echo "problem";
    }
    finally {

    }
}
function curl_page($url,$data='',$ref_url='',$login=false,$proxy=false,$proxystatus=false){


    $ch = curl_init();
    if($login == 'true') {
        $fp = fopen("cookie.txt", "w");
        fclose($fp);
        curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    }
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
    curl_setopt($ch, CURLOPT_TIMEOUT, 500);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    if ($proxystatus == 'true') {
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
    }
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $ref_url = (empty($ref_url)) ? $url : $ref_url;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $ref_url);
    if(!empty($data)){
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $return = curl_exec ($ch);
    curl_close ($ch);
    return $return;

}

function insert_html_content($db,$source,$id){
    $query = $db->query("UPDATE `content` SET  source = '$source' WHERE id = '$id'");
    $check =$query->execute();
    if(isset($check)){
        echo "ok";
    }else{
        echo "prob";
    }
}
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
function get_slider_active($db) {
    $sql = "SELECT * FROM content WHERE special = 1 ORDER BY id DESC  LIMIT 1";
    $query = $db->query($sql);
    $query->execute();
    $show = $query->fetch();
    return $show;
}
function get_slider($db) {
    $sql = "SELECT * FROM content WHERE special = 1 ORDER BY id DESC  LIMIT 10 OFFSET 1";
    $query = $db->query($sql);
    $query->execute();
    $show = $query->fetchall();
    return $show;
}
function get_urls_for_check($db) {
    $sql = "SELECT DISTINCT rss_reader.rss_ID,rss_reader.title_user,rss_reader.title, content.rss_ID FROM rss_reader INNER JOIN content on rss_reader.rss_ID = content.rss_ID";
    $query = $db->query($sql);
    $query->execute();
    $show = $query->fetchAll();
    return $show;
}
function get_urls_by_cat($db,$id) {
    $sql = "SELECT DISTINCT * FROM content WHERE rss_ID = '$id'";
    $query = $db->query($sql);
    $query->execute();
    $show = $query->fetchAll();
    return $show;
}
function select_content_html($db) {
    $sql = "SELECT * FROM content;";
    $query = $db->query($sql);
    $query->execute();
    $show = $query->fetchAll();
    return $show;
}
function get_data_index($db) {
    $sql = "SELECT * FROM content ORDER BY id DESC  LIMIT 27";
    $query = $db->query($sql);
    $query->execute();
    $show = $query->fetchall();
    return $show;
}
function get_data_index2($db) {
    $sql = "SELECT * FROM content ORDER BY id DESC  LIMIT 20 offset 27";
    $query = $db->query($sql);
    $query->execute();
    $show = $query->fetchall();
    return $show;
}
function search($db,$name) {
    $sql = "SELECT * FROM content WHERE tags LIKE '%$name%' ORDER BY id DESC";
    $query = $db->query($sql);
    $query->execute();
    $show = $query->fetchall();
    return $show;
}
function get_data($db,$id) {
    $sql = "SELECT * FROM content WHERE id = '$id'";
    try {
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $data = $row;
            return $data;
        }
        $stmt = null;
    }
    catch (PDOException $e) {
        print $e->getMessage();
    }
}

function update_data($db,$id,$like,$name) {
    $sql = "UPDATE `content` SET `$name` = '$like' WHERE id = '$id'";
    try {
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $data = $row;
            return $data;
        }
        $stmt = null;
    }
    catch (PDOException $e) {
        print $e->getMessage();
    }
}
function add_comment($db,$comment,$comment_user,$content_id) {
    $dtime =  date("Y-m-d h:i:sa");

   $sql = $db->prepare("INSERT INTO `comment` (`user_id`,`comment`,`content_id`,`dtime`) VALUES (:user_id,:comment,:content_id,:dtime)");
    $sql->BindParam(":user_id",$comment_user);
    $sql->BindParam(":comment",$comment);
    $sql->BindParam(":dtime",$dtime);
    $sql->BindParam(":content_id",$content_id);

   $sql->execute();
}
function get_comment($db,$id) {
    $sql = "SELECT * FROM comment WHERE content_id = '$id' ORDER BY comment_id DESC";
    try {
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();
        while ($row = $stmt->fetchAll()) {
            $data = $row;
            return $data;
        }
        $stmt = null;
    }
    catch (PDOException $e) {
        print $e->getMessage();
    }
}
function get_comment_userinfo($db,$username) {
$sql = $db->query("SELECT * FROM members
INNER JOIN comment
ON comment.user_id=members.memberID
WHERE comment.user_id='$username'");

$sql->execute();
$row = $sql->fetch();
        return $row;

}
function check_dublicate($db,$url,$lang,$rss_ID,$start_html,$end_html,$start_html_title,$end_html_title,$memberID){
    $check_duplicate_url = $db->query("SELECT source FROM content WHERE source = '$url'");
    $check_duplicate_url->execute();
    $show_dublicate_url = $check_duplicate_url->fetch();
    if(empty($show_dublicate_url))
    {

        $_SESSION['xurl'] = $url;

        $curl  = curl_page($_SESSION['xurl']);
        $url3  = file_get_html($_SESSION['xurl']);

        $html = new DOMDocument();
        @$html->loadHTML($url3);
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


        preg_match("'<". $start_html_title .">(.*?)<\/". $end_html_title .">'si", $curl, $title);
        preg_match("'<". $start_html .">(.*?)<\/". $end_html .">'si", $curl, $match);

        $sss = 'x';

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
        $str   = $match[1].$title[1];
        $kwObj = new KeywordGenerator;

        $kwObj->lang = 'en';
        $hashtag = $kwObj->generateKW($str);
        $dtime =  date("Y-m-d h:i:sa");

       $query = $db->prepare("INSERT INTO `content` (title,description,source,lang,content,hashtags,image,dtime,memberID,rss_ID) VALUES (:title,:description,:source,:lang,:content,:hashtags,:image,:dtime,:memberID,:rss_ID)");
       $query->bindParam(":title",$title[1] );
       $query->bindParam(":description",$meta_og_description);
       $query->bindParam(":source",$_SESSION['xurl']);
       $query->bindParam(":lang",$lang);
       $query->bindParam(":content",$match[1]);
       $query->bindParam(":hashtags",$hashtag);
       $query->bindParam(":image",$rnd);
       $query->bindParam(":dtime",$dtime);
       $query->bindParam(":memberID",$memberID);
       $query->bindParam(":rss_ID",$rss_ID);
       $checker = $query->execute();
       if(isset($checker)){
           echo "<div class='alert alert-success'>با موفقیت اضافه شد</div>";

       }

    }else{
        echo "<div class='alert alert-danger'>قبلا اضافه شده</div>";
    }
}
function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

//$html = "";
////URL of your XML feed by user, playlist or channel ID
//$feed  = "https://www.youtube.com/feeds/videos.xml?channel_id=UCU6JLYuerEUb7VrDd4zLihg";
////Load feed xml file
//$xml = simplexml_load_file($feed);
////display 6 feed entries, use more or less as desired
//for($i = 0; $i < 6; $i++) {
//    //define our feed nodes
//    $published = $xml->entry[$i]->published;
//    //optional, shorten the date
//    $shortDate = date("m/d/Y", strtotime($published));
//    $title = $xml->entry[$i]->title;
//    $id = $xml->entry[$i]->id;
//    //strip unwanted characters from ID
//    $id = str_replace ("yt:video:", "", $id);
//    $author = $xml->entry[$i]->author->name;
//    $uri = $xml->entry[$i]->author->uri;
//    //put nodes into html tags & embedded youTube player.
//    $html .= "<div class='col-sm-6 col-md-4'>
//<h4><a href='$uri'>$title</a></h4>
//<iframe src='http://www.youtube.com/embed/$id' allowfullscreen>
//</iframe><br>
//<small>Published: $shortDate &nbsp; By: $author></small>
//</div><hr>";
//}
////output everything to html
//echo $html;




