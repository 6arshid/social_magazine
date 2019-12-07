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
<br>






<div class="row">
<div class="col-md-3">
    <button class="btn btn-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rss mx-2"><path d="M4 11a9 9 0 0 1 9 9"></path><path d="M4 4a16 16 0 0 1 16 16"></path><circle cx="5" cy="19" r="1"></circle></svg>            <line x1="12" y1="5" x2="12" y2="19"></line>
        <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg> <span class="mx-1"><a href="add_source_rss.php">اضافه کردن Rss جدید</a> </span></button>
</div>
<div class="col-md-3">
    <button class="btn btn-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code mx-2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>            <line x1="12" y1="5" x2="12" y2="19"></line>
        <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg> <span class="mx-1"><a href="add_source_html.php">اضافه کردن از طریق html</a> </span></button>
</div>
<div class="col-md-3">

</div>
<div class="col-md-3">

</div>

<hr>

</div>





<?php }else{
    redirect("../index.php");
    die();
}?>
    </div>

