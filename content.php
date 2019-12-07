<?php
require "header.php";

$id = $_GET['id'];
$show_content = get_data($db,$id);
?>

<title>
    <?=  $show_content['title']; ?>
</title>

<body class="not-mobile iframe ">


<nav class="navbar navbar-default navbar-fixed-top">

    <div class="container-fluid">
        <div class="col-md-offset-2 col-md-8 col-md-offset-2">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" style="width:500px">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><i class="fa fa-plus-square-o"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome Guest <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Join</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Manage Content</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Setting</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </div>
</nav>






<span id="close-iframe">
    <a class="fa fa-times" href="/redirect?id=ef47142360345&amp;sourcedomain=yjc.ir&amp;url=www.yjc.ir/fa/news/7101305/%d8%b9%d8%b1%d8%b6%d9%87-%db%b3%db%b2-%d9%87%d8%b2%d8%a7%d8%b1-%d8%aa%d9%86-%d9%86%d9%81%d8%aa%d8%a7%db%8c-%d8%b3%d9%86%da%af%db%8c%d9%86-%d9%be%d8%a7%d9%84%d8%a7%db%8c%d8%b4-%d9%86%d9%81%d8%aa-%d9%84%d8%a7%d9%88%d8%a7%d9%86&amp;timestamp=1570874952"></a>
</span>








ssss
<!---->
<!--<section id="content">-->
<!--    <div class="row m-n">-->
<!--        <div class="col-md-offset-2 col-md-8 col-md-offset-2">-->
<!--            <section class="panel">-->
<!---->
<!--                <div class="panel-body">-->
<!--                    <div class="clearfix m-b"> <small class="text-muted pull-right">--><?php //echo   time_elapsed_string($row_post2['dtime']);?><!--</small>-->
<!--                        <a href="#" class="thumb-sm pull-left m-r"> <img src="--><?//= get_gravatar('01.mrlast@gmail.com');?><!--" class="img-circle"> </a>-->
<!--                        <div class="clear"> <a href="#"><strong>--><?//=  $show_content['title']; ?><!--</strong></a> <small class="block text-muted">San Francisco, USA</small> </div>-->
<!--                    </div>-->
<!--                    <p> --><?//=  $show_content['description']; ?><!--  --><?//=  $show_content['content']; ?><!--<br>-->
<!--                        <br>-->
<!--                        --><?php
//                        if(!empty($show_content['hashtags'])){
//                            $x = explode(",",$show_content['hashtags']);
//                            foreach ($x as $tagsx){
//                                echo "<a href=\"search.php?name=$tagsx\" style='padding: 2px'><span class=\"badge badge-secondary text-uppercase\">$tagsx</span></a>";
//                            }
//                        }
//                        ?>
<!--                        <br>-->
<!--                        <br>-->
<!--                        <a href="--><?//= $show_content['source']; ?><!--" class="btn btn-success btn-block" target="_blank">Show Source</a>-->
<!--                    </p>-->
<!---->
<!--                    <small class=""> <a href="#"><i class="fa fa-comment-o"></i> Comments (25)</a> </small> </div>-->
<!--                <footer class="panel-footer pos-rlt"> <span class="arrow top"></span>-->
<!--                    <form class="pull-out">-->
<!--                        <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> </form>-->
<!--                </footer>-->
<!--            </section>-->
<!---->
<!--            <section class="panel">-->
<!--                <header class="panel-heading bg-success">-->
<!--                    <ul class="nav nav-tabs nav-justified text-uc">-->
<!--                        <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>-->
<!--                        <li class=""><a href="#comment" data-toggle="tab">Comment</a></li>-->
<!--                        <li class=""><a href="#recent" data-toggle="tab">Recent</a></li>-->
<!--                    </ul>-->
<!--                </header>-->
<!--                <div class="panel-body">-->
<!--                    <div class="tab-content">-->
<!--                        <div class="tab-pane active" id="popular">-->
<!--                            --><?php
//                            foreach ($get_post_home as $row_post) {
//                                ?>
<!--                                <article class="media">-->
<!--                                    <a class="pull-left thumb m-t-xs"> <img src="images/image---><?//=  $row_post['image']; ?><!--.jpg"> </a>-->
<!--                                    <div class="media-body"><a href="content.php?id=--><?//= $row_post['id']; ?><!--" class="font-semibold">--><?//= $row_post['title']; ?><!--</a>-->
<!--                                        <div class="text-xs block m-t-xs"><i class="fa fa-thumbs-up"></i> 1,141 likes-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </article>-->
<!--                                --><?php
//                            }
//                            ?>
<!--                            <div class="line line-dashed"></div>-->
<!---->
<!--                        </div>-->
<!--                        <div class="tab-pane" id="comment">-->
<!--                            <article class="media">-->
<!--                                <a class="pull-left thumb-sm m-t-xs"> <img src="images/avatar.jpg" class="img-circle"> </a>-->
<!--                                <div class="media-body"> <a href="#" class="font-semibold">consecteter adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet</a>-->
<!--                                    <div class="text-xs block m-t-xs"><i class="fa fa-clock-o"></i> 10 minutes ago</div>-->
<!--                                </div>-->
<!--                            </article>-->
<!--                            <div class="line line-dashed"></div>-->
<!--                            <article class="media m-t-none">-->
<!--                                <a class="pull-left thumb-sm m-t-xs"> <img src="images/avatar_default.jpg" class="img-circle"> </a>-->
<!--                                <div class="media-body"> <a href="#" class="font-semibold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a</a>-->
<!--                                    <div class="text-xs block m-t-xs"><i class="fa fa-clock-o"></i> 1 hour ago</div>-->
<!--                                </div>-->
<!--                            </article>-->
<!--                            <div class="line line-dashed"></div>-->
<!--                            <article class="media m-t-none">-->
<!--                                <a class="pull-left thumb-sm m-t-xs"> <img src="images/avatar_default.jpg" class="img-circle"> </a>-->
<!--                                <div class="media-body"> <a href="#" class="font-semibold">Sed diam nonummy nibh euismod tincidunt ut</a>-->
<!--                                    <div class="text-xs block m-t-xs"><i class="fa fa-clock-o"></i> 2 hours ago</div>-->
<!--                                </div>-->
<!--                            </article>-->
<!--                        </div>-->
<!--                        <div class="tab-pane" id="recent">-->
<!--                            <p class="text-center m-t-sm"><i class="fa fa-spinner fa fa-spin fa fa-2x"></i></p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </section>   </div></div>-->
<!---->
<!---->
<!---->
<!--</section>-->



<?php

$url = $show_content['source'];

// make sure we have a valid URL and not file path
if (!preg_match("`https?\://`i", $url)) {
    die('Not a URL');
}

// make the HTTP request to the requested URL
$content = file_get_contents($url);

// parse all links and forms actions and redirect back to this script
$content = preg_replace("/some-smart-regex-here/i", "$1 or $2 smart replaces",$content);
echo "ddddddddddddddddddddddddddddddddddddddd".$content;

?>


















<script src="assets/js/site.min.js"></script>
