<?php
require "../core.php";


if(isset($_SESSION['adminX'])){
    ?>
    <title>افزودن منبع جدید</title>

    <link rel="stylesheet" href="<?= constant("DIR"); ?>assets/css/site.min.css">
    <div class="container rtl">
        <?php
        if(isset($_POST['btn'])){

            $sys = 'Html';
            $query = $db->prepare("INSERT INTO rss_reader (title,title_user,source,starter,start_html_title,end_html_title,start_html,end_html,memberID,lang,sys,start_html_url) VALUES (:title,:title_user,:source,:starter,:start_html_title,:end_html_title,:start_html,:end_html,:memberID,:lang,:sys,:start_html_url)");
            $query->bindparam(":title",$_POST['title']);
            $query->bindparam(":title_user",$_POST['title_user']);
            $query->bindparam(":lang",$_POST['lang']);
            $query->bindparam(":source",$_POST['source']);
            $query->bindparam(":starter",$_POST['starter']);
            $query->bindparam(":start_html_title",$_POST['start_html_title']);
            $query->bindparam(":end_html_title",$_POST['end_html_title']);
            $query->bindparam(":start_html",$_POST['start_html']);
            $query->bindparam(":end_html",$_POST['end_html']);
            $query->bindparam(":memberID",$_SESSION['memberID']);
            $query->bindparam(":sys",$sys);
            $query->bindparam(":start_html_url",$_POST['start_html_url']);

            $cheker = $query->execute();
            if(isset($cheker)){
                echo "<div class='alert alert-success'>منبع با موفقیت اضافه شد.</div>";
            }else{
                echo "<div class='alert alert-success'>مشکلی پیش آمده !
Please try again.</div>";
            }
        } ?>

        <div class="card">
            <div class="card-header"><strong>افزودن منبع جدید</strong></div>
            <div class="card-body"><section class="hbox container">
                    <form method="POST">
                        <div class="row">
                            <div class="col">
                                <h4>عنوان برای مدیر  :</h4> <input type="text" class="form-control" name="title"><br>
                                <h4>عنوان برای کاربر  :</h4> <input type="text" class="form-control" name="title_user"><br>
                                <h4>زبان منبع :</h4><small>برای نمونه fa</small> <input type="text" class="form-control" name="lang"><br>
                                <h4>آدرس صفحه مورد نظر :</h4><input type="url" class="form-control" name="source"><br>
                                <h4>شروع گرفتن Html برای لینک ها</h4>
                                <code>a[class="links"]</code><textarea class="form-control" name="start_html_url"></textarea><br>
                            </div>
                            <div class="col">
                                <h4>شروع گرفتن Html برای عنوان</h4>
                                <code>div class="content"</code>
                                <textarea class="form-control" name="start_html_title"></textarea><br>
                                <h4> پایان گرفتن Html برای عنوان</h4><textarea class="form-control" name="end_html_title"></textarea><br>
                                <h4>شروع گرفتن Html برای محتوا</h4>
                                <code>div class="content"</code>
                                <textarea class="form-control" name="start_html"></textarea><br>
                                <h4> پایان گرفتن Html برای محتوا</h4><textarea class="form-control" name="end_html"></textarea><br>

                            </div>

                        </div>

                        <h4>شروع کننده لینک ها</h4>
                        <input type="url" name="starter" class="form-control">
                        <h4>پیش نمایش لینک ها</h4>  <br>
                        <br>
                        <?php
                        if(isset($_POST['btn_change_url'])){
                            foreach ($_SESSION['links'] as $row_session  => $value){
                                echo $_POST['start_url'] .$key .$value ."<br>";

                            }

                        }

                        if(isset($_POST['submit_live'])){
                            $url =   $_POST['source'];
                            $html = file_get_html($url);
                            $links = array();
                            foreach ($html->find($_POST['start_html_url']) as $a) {
                                $links[] = $a->href;
                                echo $a->href . "<br>";


                            }
                            $_SESSION['links'] = $links;

                            echo "<hr><br>
                                    <input type='text' name='start_url' class='form-control' placeholder='آدرس اول لینک را وارد کنید'> 
                                    <input type='submit' name='btn_change_url' class='btn-success btn btn-block'> 
                               <hr> ";

                        }
                        ?>
                        <input type="submit" name="submit_live" class="btn btn-info btn-block" value="پیش نمایش لینک ها">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <input type="submit" class="btn btn-dark btn-block" value="ذخیره" name="btn">


                    </form>


                </section></div>  </div>
    </div>
<?php       }else{ ?>
    Please <a href='<?= constant("DIR"); ?>/login.php'>Login</a>
<?php }
?>

</div>