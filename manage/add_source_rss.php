<?php
require "../core.php";


        if(isset($_SESSION['adminX'])){
            ?>
            <title>افزودن منبع جدید</title>

            <link rel="stylesheet" href="<?= constant("DIR"); ?>assets/css/site.min.css">
            <div class="container rtl">
<?php
            if(isset($_POST['btn'])){
                $sys = 'Rss';
                $query = $db->prepare("INSERT INTO rss_reader (title,title_user,source,start_html,end_html,memberID,lang,sys) VALUES (:title,:title_user,:source,:start_html,:end_html,:memberID,:lang,:sys)");
                $query->bindparam(":title",$_POST['title']);
                $query->bindparam(":title_user",$_POST['title_user']);
                $query->bindparam(":lang",$_POST['lang']);
                $query->bindparam(":source",$_POST['source']);
                $query->bindparam(":start_html",$_POST['start_html']);
                $query->bindparam(":end_html",$_POST['end_html']);
                $query->bindparam(":memberID",$_SESSION['memberID']);
                $query->bindparam(":sys",$sys);
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
                            <h4>عنوان برای مدیر  :</h4> <input type="text" class="form-control" name="title"><br>
                            <h4>عنوان برای کاربر  :</h4> <input type="text" class="form-control" name="title_user"><br>
                            <h4>زبان منبع :</h4><small>برای نمونه fa</small> <input type="text" class="form-control" name="lang"><br>
                            <h4>آدرس Rss :</h4><input type="url" class="form-control" name="source"><br>
                            <h4>شروع گرفتن Html</h4><textarea class="form-control" name="start_html"></textarea><br>
                            <h4>پایان گرفتن Html</h4><textarea class="form-control" name="end_html"></textarea><br>

                            <input type="submit" class="btn btn-dark btn-block" value="ذخیره" name="btn">
                        </form>
                    </section></div>  </div>
            </div>
        <?php       }else{ ?>
           Please <a href='<?= constant("DIR"); ?>/login.php'>Login</a>
       <?php }
        ?>

</div>