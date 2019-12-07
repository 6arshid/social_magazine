<?php
require "header.php";


?>
<title>last.today</title>

<section id="content">
    <div class="row m-n">
        <div class="col-md-offset-2 col-md-8 col-md-offset-2">

            <section class="panel">
                <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                        <li><a href="#profile" data-toggle="tab">Profile</a></li>
                        <li><a href="#messages" data-toggle="tab">Messages</a></li>
                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home"><section class="comment-list block">
                                <!-- share form -->
                                <article class="comment-item media" id="comment-form">
                                    <a class="pull-left thumb-sm avatar"><img src="<?= get_gravatar('01.mrlast@gmail.com');?>" class="img-circle"></a>
                                    <section class="media-body">
                                        <form action="" class="m-b-none" method="POST">
                                            <section class="panel"> <form> <textarea class="form-control no-border" rows="5" placeholder="What are you doing..."></textarea> </form> <footer class="panel-footer bg-light lter"> <button class="btn btn-info pull-right btn-sm">POST</button> <ul class="nav nav-pills nav-sm"> <li><a href="#"><i class="fa fa-camera"></i></a></li> <li><a href="#"><i class="fa fa-video-camera"></i></a></li> </ul> </footer> </section>  </form>
                                    </section>
                                </article>
                                <hr>
                                <?php
                                foreach ($get_post_home as $row_post){
                                ?>
                                <article id="comment-id-1" class="comment-item">
                                    <a class="pull-left thumb-sm avatar"> <img src="<?= get_gravatar('01.mrlast@gmail.com');?>" class="img-circle"> </a> <span class="arrow left"></span>
                                    <section class="comment-body panel">
                                        <header class="panel-heading"> <a href='content.php?id=<?= $row_post['id']; ?>' target='_blank'><?= $row_post['title']; ?></a>
                                            <label class="label bg-info m-l-xs">Editor</label> <span class="text-muted m-l-sm pull-right"> <i class="fa fa-clock-o"></i> <?php echo   time_elapsed_string($row_post['dtime']);?> </span> </header>
                                        <div class="panel-body">
                                            <div><?php
                                                echo mb_substr($row_post['description'],0,399, "utf-8");
                                                ?></div>
                                            <div class="comment-action m-t-sm">
                                                <a href="#" data-toggle="class" class="btn btn-white btn-xs active"> <i class="fa fa-star-o text-muted text"></i> <i class="fa fa-star text-danger text-active"></i> Like </a>
                                                <a href="#comment-form" class="btn btn-white btn-xs"> <i class="fa fa-mail-reply text-muted"></i> Reply </a>
                                            </div>
                                        </div>
                                    </section>
                                </article>
                                    <?php
                                }
                                ?>



                            </section></div>
                        <div class="tab-pane" id="profile"><ul class="list-group"> <li class="list-group-item"> <p>Wellcome <a href="#" class="text-info">@Drew Wllon</a> and play this web application template, have fun1 </p> <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small> </li> <li class="list-group-item"> <p>Morbi nec <a href="#" class="text-info">@Jonathan George</a> nunc condimentum ipsum dolor sit amet, consectetur</p> <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 hour ago</small> </li> <li class="list-group-item"> <p><a href="#" class="text-info">@Josh Long</a> Vestibulum ullamcorper sodales nisi nec adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis</p> <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 hours ago</small> </li> </ul></div>
                        <div class="tab-pane" id="messages"><section class="panel no-borders hbox"> <aside> <div class="pos-rlt"> <span class="arrow right hidden-xs"></span> <div class="panel-body"> <div class="clearfix m-b"> <small class="text-muted pull-right">2 days ago</small> <a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a> <div class="clear"> <a href="#"><strong>Jonathan Omish</strong></a> <small class="block text-muted">San Francisco, USA</small> </div> </div> <p> Flat design is more popular today. Google, Microsoft, Apple... </p> <small class=""> <a href="#"><i class="fa fa-share"></i> Share (10)</a> </small> </div> <footer class="panel-footer"> <form class="pull-out b-t"> <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form> </footer> </div> </aside> <aside class="bg-primary clearfix lter r-r text-right v-middle"> <div class="wrapper h3 font-thin"> 7 things you need to know about the flat design </div> </aside> </section>
                            <section class="panel no-borders hbox"> <aside> <div class="pos-rlt"> <span class="arrow right hidden-xs"></span> <div class="panel-body"> <div class="clearfix m-b"> <small class="text-muted pull-right">2 days ago</small> <a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a> <div class="clear"> <a href="#"><strong>Jonathan Omish</strong></a> <small class="block text-muted">San Francisco, USA</small> </div> </div> <p> Flat design is more popular today. Google, Microsoft, Apple... </p> <small class=""> <a href="#"><i class="fa fa-share"></i> Share (10)</a> </small> </div> <footer class="panel-footer"> <form class="pull-out b-t"> <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form> </footer> </div> </aside> <aside class="bg-primary clearfix lter r-r text-right v-middle"> <div class="wrapper h3 font-thin"> 7 things you need to know about the flat design </div> </aside> </section>
                            <section class="panel no-borders hbox"> <aside> <div class="pos-rlt"> <span class="arrow right hidden-xs"></span> <div class="panel-body"> <div class="clearfix m-b"> <small class="text-muted pull-right">2 days ago</small> <a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a> <div class="clear"> <a href="#"><strong>Jonathan Omish</strong></a> <small class="block text-muted">San Francisco, USA</small> </div> </div> <p> Flat design is more popular today. Google, Microsoft, Apple... </p> <small class=""> <a href="#"><i class="fa fa-share"></i> Share (10)</a> </small> </div> <footer class="panel-footer"> <form class="pull-out b-t"> <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form> </footer> </div> </aside> <aside class="bg-primary clearfix lter r-r text-right v-middle"> <div class="wrapper h3 font-thin"> 7 things you need to know about the flat design </div> </aside> </section>
                            <section class="panel no-borders hbox"> <aside> <div class="pos-rlt"> <span class="arrow right hidden-xs"></span> <div class="panel-body"> <div class="clearfix m-b"> <small class="text-muted pull-right">2 days ago</small> <a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a> <div class="clear"> <a href="#"><strong>Jonathan Omish</strong></a> <small class="block text-muted">San Francisco, USA</small> </div> </div> <p> Flat design is more popular today. Google, Microsoft, Apple... </p> <small class=""> <a href="#"><i class="fa fa-share"></i> Share (10)</a> </small> </div> <footer class="panel-footer"> <form class="pull-out b-t"> <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form> </footer> </div> </aside> <aside class="bg-primary clearfix lter r-r text-right v-middle"> <div class="wrapper h3 font-thin"> 7 things you need to know about the flat design </div> </aside> </section>
                            <section class="panel no-borders hbox"> <aside> <div class="pos-rlt"> <span class="arrow right hidden-xs"></span> <div class="panel-body"> <div class="clearfix m-b"> <small class="text-muted pull-right">2 days ago</small> <a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a> <div class="clear"> <a href="#"><strong>Jonathan Omish</strong></a> <small class="block text-muted">San Francisco, USA</small> </div> </div> <p> Flat design is more popular today. Google, Microsoft, Apple... </p> <small class=""> <a href="#"><i class="fa fa-share"></i> Share (10)</a> </small> </div> <footer class="panel-footer"> <form class="pull-out b-t"> <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form> </footer> </div> </aside> <aside class="bg-primary clearfix lter r-r text-right v-middle"> <div class="wrapper h3 font-thin"> 7 things you need to know about the flat design </div> </aside> </section>
                            <section class="panel no-borders hbox"> <aside> <div class="pos-rlt"> <span class="arrow right hidden-xs"></span> <div class="panel-body"> <div class="clearfix m-b"> <small class="text-muted pull-right">2 days ago</small> <a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a> <div class="clear"> <a href="#"><strong>Jonathan Omish</strong></a> <small class="block text-muted">San Francisco, USA</small> </div> </div> <p> Flat design is more popular today. Google, Microsoft, Apple... </p> <small class=""> <a href="#"><i class="fa fa-share"></i> Share (10)</a> </small> </div> <footer class="panel-footer"> <form class="pull-out b-t"> <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form> </footer> </div> </aside> <aside class="bg-primary clearfix lter r-r text-right v-middle"> <div class="wrapper h3 font-thin"> 7 things you need to know about the flat design </div> </aside> </section>
                            <section class="panel no-borders hbox"> <aside> <div class="pos-rlt"> <span class="arrow right hidden-xs"></span> <div class="panel-body"> <div class="clearfix m-b"> <small class="text-muted pull-right">2 days ago</small> <a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a> <div class="clear"> <a href="#"><strong>Jonathan Omish</strong></a> <small class="block text-muted">San Francisco, USA</small> </div> </div> <p> Flat design is more popular today. Google, Microsoft, Apple... </p> <small class=""> <a href="#"><i class="fa fa-share"></i> Share (10)</a> </small> </div> <footer class="panel-footer"> <form class="pull-out b-t"> <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form> </footer> </div> </aside> <aside class="bg-primary clearfix lter r-r text-right v-middle"> <div class="wrapper h3 font-thin"> 7 things you need to know about the flat design </div> </aside> </section>
                            <section class="panel no-borders hbox"> <aside> <div class="pos-rlt"> <span class="arrow right hidden-xs"></span> <div class="panel-body"> <div class="clearfix m-b"> <small class="text-muted pull-right">2 days ago</small> <a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a> <div class="clear"> <a href="#"><strong>Jonathan Omish</strong></a> <small class="block text-muted">San Francisco, USA</small> </div> </div> <p> Flat design is more popular today. Google, Microsoft, Apple... </p> <small class=""> <a href="#"><i class="fa fa-share"></i> Share (10)</a> </small> </div> <footer class="panel-footer"> <form class="pull-out b-t"> <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form> </footer> </div> </aside> <aside class="bg-primary clearfix lter r-r text-right v-middle"> <div class="wrapper h3 font-thin"> 7 things you need to know about the flat design </div> </aside> </section>
                            <section class="panel no-borders hbox"> <aside> <div class="pos-rlt"> <span class="arrow right hidden-xs"></span> <div class="panel-body"> <div class="clearfix m-b"> <small class="text-muted pull-right">2 days ago</small> <a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a> <div class="clear"> <a href="#"><strong>Jonathan Omish</strong></a> <small class="block text-muted">San Francisco, USA</small> </div> </div> <p> Flat design is more popular today. Google, Microsoft, Apple... </p> <small class=""> <a href="#"><i class="fa fa-share"></i> Share (10)</a> </small> </div> <footer class="panel-footer"> <form class="pull-out b-t"> <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form> </footer> </div> </aside> <aside class="bg-primary clearfix lter r-r text-right v-middle"> <div class="wrapper h3 font-thin"> 7 things you need to know about the flat design </div> </aside> </section>
                            <section class="panel no-borders hbox"> <aside> <div class="pos-rlt"> <span class="arrow right hidden-xs"></span> <div class="panel-body"> <div class="clearfix m-b"> <small class="text-muted pull-right">2 days ago</small> <a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a> <div class="clear"> <a href="#"><strong>Jonathan Omish</strong></a> <small class="block text-muted">San Francisco, USA</small> </div> </div> <p> Flat design is more popular today. Google, Microsoft, Apple... </p> <small class=""> <a href="#"><i class="fa fa-share"></i> Share (10)</a> </small> </div> <footer class="panel-footer"> <form class="pull-out b-t"> <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form> </footer> </div> </aside> <aside class="bg-primary clearfix lter r-r text-right v-middle"> <div class="wrapper h3 font-thin"> 7 things you need to know about the flat design </div> </aside> </section>
                            <section class="panel no-borders hbox"> <aside> <div class="pos-rlt"> <span class="arrow right hidden-xs"></span> <div class="panel-body"> <div class="clearfix m-b"> <small class="text-muted pull-right">2 days ago</small> <a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a> <div class="clear"> <a href="#"><strong>Jonathan Omish</strong></a> <small class="block text-muted">San Francisco, USA</small> </div> </div> <p> Flat design is more popular today. Google, Microsoft, Apple... </p> <small class=""> <a href="#"><i class="fa fa-share"></i> Share (10)</a> </small> </div> <footer class="panel-footer"> <form class="pull-out b-t"> <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form> </footer> </div> </aside> <aside class="bg-primary clearfix lter r-r text-right v-middle"> <div class="wrapper h3 font-thin"> 7 things you need to know about the flat design </div> </aside> </section>

                        </div>
                        <div class="tab-pane" id="settings"><iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/52718968&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<!-- footer -->
<footer id="footer">
    <div class="text-center padder clearfix">
        <p> <small>Mobile first web app framework base on Bootstrap<br>&copy; 2013</small> </p>
    </div>
</footer>
<!-- / footer -->
<script src="js/app.v2.js"></script>
<!-- Bootstrap -->
<!-- app -->
</body>

</html>