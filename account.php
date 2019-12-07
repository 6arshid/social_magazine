<?php
require "core.php";
if(isset($_POST['btn'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $source = $_POST['url'];
    $tags = $_POST['tags'];
    if(empty($source)){
        echo "enter title";
        die();
    }
    $url = curl_page($source);
    $html = new DOMDocument();
    @$html->loadHTML($url);
    $meta_og_img = null;
//Get all meta tags and loop through them.
    foreach($html->getElementsByTagName('meta') as $meta) {
//If the property attribute of the meta tag is og:image
        if($meta->getAttribute('property')=='og:image'){
//Assign the value from content attribute to $meta_og_img
            $meta_og_img = $meta->getAttribute('content');
        }
        if($meta->getAttribute('property')=='og:title'){
//Assign the value from content attribute to $meta_og_img
            $meta_og_title = $meta->getAttribute('content');
        }
        if($meta->getAttribute('property')=='og:description'){
//Assign the value from content attribute to $meta_og_img
            $meta_og_description = $meta->getAttribute('content');
        }
    }
// Remote image URL
    $url =$meta_og_img;

// Image path
    $rnd = RAND();
    $img = 'images/image-' .$rnd .'.jpg';

// Save image
    $ch = curl_init($url);
    $fp = fopen($img, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    $dtime =  date("Y-m-d h:i:sa");
    $query = $db->prepare("INSERT INTO `content` (org_title,title,content,source,image,description,tags,user,dtime) VALUES (:org_title,:title,:content,:source,:image,:description,:tags,:user,:dtime)");
    $query->bindParam(":org_title",$meta_og_title);
    $query->bindParam(":title",$title);
    $query->bindParam(":content",$content);
    $query->bindParam(":source",$source);
    $query->bindParam(":image",$rnd);
    $query->bindParam(":description",$meta_og_description);
    $query->bindParam(":tags",$tags);
    $query->bindParam(":user",$_SESSION['username']);
    $query->bindParam(":dtime",$dtime);
    $checker = $query->execute();
    if(isset($checker)){
       $flash = "<div class=\"alert alert-success\" role=\"alert\">
 با موفقیت اضافه شد .
</div>";
    }else{
        echo "<div class=\"alert alert-secondary\" role=\"alert\">
مشکل ! </div>";
    }
}

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = 'Dashboard';

require "bootstrap/header.php";

?>



	    <div class="col-md-12">

				<h2>سلام  <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?> , وقت بخیر &hearts;</h2>
				<p><a href='logout.php' class="uibutton large confirm">خروچ</a></p>
				<hr>


<?php
if(isset($flash)){
    echo $flash;
}
?>
            <form method="POST">
                <label>عنوان : </label>
                <input type="text" class="form-control" name="title" placeholder="عنوان را اینجا وارد کنید">
                <label>آدرس منبع :</label>
                <input type="url" class="form-control" name="url" placeholder="مثال https://www.instagram.com/p/ByQ7c0rgc9D">
                <label>نقد خود :</label>
                <textarea name="content" class="form-control" placeholder="نقد خود را اینجا وراد کنید"></textarea><br>

                    <label for="tags">تگ  :</label><br>
                    <input  type="text"  data-role="tagsinput" placeholder="مانند سیاست تلخ"  class="form-control" name="tags" /><br>
                <input type="submit" name="btn" value="انتشار" class="btn btn-success btn-block"><br>
                <br>

                <br>

            </form>
		</div>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script src='https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.1/js/bootstrapValidator.min.js'></script>




<?php 
?>
