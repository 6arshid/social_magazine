<?php
require "core.php";
$name = $_GET['name'];
checker($name);
if(isset($_POST['search'])){
    $search = "search.php?tag=".htmlspecialchars($_POST['search']);
    header("Location: $search");
}
$show_search = search($db,$name);
?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <title><?=  $name; ?><?=  $search; ?></title>
    <meta name="description" content="Responsive, Bootstrap, BS4">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="assets/css/site.min.css">
</head>

<body>
<div class="offset-md-2 col-md-8 offset-md-2">
    <div class="navbar navbar-expand-lg"><a href="index.php" class="navbar-brand"><svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><g class="loading-spin" style="transform-origin: 256px 256px"><path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"></path></g></svg> <span class="hidden-folded d-inline l-s-n-1x">Basik</span></a><div class="collapse navbar-collapse order-2 order-lg-1" id="navbarToggler"><ul class="navbar-nav mt-lg-0 mx-0 mx-lg-2"><li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li><li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">New</a><div class="dropdown-menu mt-3" role="menu"><a class="dropdown-item">Action </a><a class="dropdown-item">Another action </a><a class="dropdown-item">Something else here</a><div class="dropdown-divider"></div><a class="dropdown-item">Separated link</a></div></li></ul><form class="input-group m-2 my-lg-0"><div class="input-group-prepend"><button type="button" class="btn no-shadow no-bg px-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button></div><span class="twitter-typeahead" style="position: relative; display: inline-block;"><input type="text" class="form-control no-border no-shadow no-bg typeahead tt-hint" data-api="../assets/api/menu.json" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: rgba(0, 0, 0, 0) none repeat scroll 0px 0px;" readonly="" autocomplete="off" spellcheck="false" tabindex="-1" dir="ltr"><input type="text" class="form-control no-border no-shadow no-bg typeahead tt-input" placeholder="Search components..." data-api="../assets/api/menu.json" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;"></pre><div class="dropdown-menu mt-3" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;"><div class="tt-dataset tt-dataset-42"></div></div></span></form></div><ul class="nav navbar-menu order-1 order-lg-2"><li class="nav-item d-none d-sm-block"><a class="nav-link px-2" data-toggle="fullscreen"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a></li><li class="nav-item dropdown"><a class="nav-link px-2" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-08ECBBFA4C"></path></svg></a><div class="dropdown-menu dropdown-menu-center mt-3 w animate fadeIn"><div class="setting px-3"><div class="mb-2 text-muted"><strong>Setting:</strong></div><div class="mb-3" id="settingLayout"><label class="ui-check ui-check-rounded my-1 d-block"><input type="checkbox" name="stickyHeader"> <i></i> <small>Sticky header</small></label><label class="ui-check ui-check-rounded my-1 d-block"><input type="checkbox" name="stickyAside"> <i></i> <small>Sticky aside</small></label><label class="ui-check ui-check-rounded my-1 d-block"><input type="checkbox" name="foldedAside"> <i></i> <small>Folded Aside</small></label><label class="ui-check ui-check-rounded my-1 d-block"><input type="checkbox" name="hideAside"> <i></i> <small>Hide Aside</small></label></div><div class="mb-2 text-muted"><strong>Color:</strong></div><div class="mb-2"><label class="radio radio-inline ui-check ui-check-md"><input type="radio" name="bg" value=""> <i></i></label><label class="radio radio-inline ui-check ui-check-color ui-check-md"><input type="radio" name="bg" value="bg-dark"> <i class="bg-dark"></i></label></div><div class="mb-2 text-muted"><strong>Layouts:</strong></div><div class="mb-3"><a href="dashboard.html" class="btn btn-xs btn-white no-ajax mb-1">Default</a> <a href="layout.a.html@bg" class="btn btn-xs btn-primary no-ajax mb-1">A</a> <a href="layout.b.html@bg" class="btn btn-xs btn-info no-ajax mb-1">B</a> <a href="layout.c.html@bg" class="btn btn-xs btn-success no-ajax mb-1">C</a></div><div class="mb-2 text-muted"><strong>Apps:</strong></div><div><a href="dashboard.html" class="btn btn-sm btn-white no-ajax mb-1">Dashboard</a> <a href="music.html@bg" class="btn btn-sm btn-white no-ajax mb-1">Music</a> <a href="video.html@bg" class="btn btn-sm btn-white no-ajax mb-1">Video</a></div></div></div></li><li class="nav-item dropdown"><a class="nav-link px-2 mr-lg-2" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg> <span class="badge badge-pill badge-up bg-primary">6</span></a><div class="dropdown-menu dropdown-menu-right mt-3 w-md animate fadeIn p-0"><div class="scrollable hover" style="max-height: 250px"><div class="list list-row"><div class="list-item" data-id="14"><div><a href="#"><span class="w-32 avatar gd-warning">B</span></a></div><div class="flex"><div class="item-feed h-2x">Do you know which are the popular ones? Leave a comment and get to know more from professional developers</div></div></div><div class="list-item" data-id="2"><div><a href="#"><span class="w-32 avatar gd-primary"><img src="../assets/img/a2.jpg" alt="."></span></a></div><div class="flex"><div class="item-feed h-2x">Can data lead us to making the best possible decisions?</div></div></div><div class="list-item" data-id="5"><div><a href="#"><span class="w-32 avatar gd-warning"><img src="../assets/img/a5.jpg" alt="."></span></a></div><div class="flex"><div class="item-feed h-2x">Learn how to use <a href="#">Google Analytics</a> to discover vital information about your readers.</div></div></div><div class="list-item" data-id="9"><div><a href="#"><span class="w-32 avatar gd-info"><img src="../assets/img/a9.jpg" alt="."></span></a></div><div class="flex"><div class="item-feed h-2x">Added to <a href="#">@TUT</a> team</div></div></div><div class="list-item" data-id="19"><div><a href="#"><span class="w-32 avatar gd-warning">T</span></a></div><div class="flex"><div class="item-feed h-2x">We help companies deliver reliable and beautiful <a href="#">@IOSapps</a></div></div></div><div class="list-item" data-id="6"><div><a href="#"><span class="w-32 avatar gd-danger"><img src="../assets/img/a6.jpg" alt="."></span></a></div><div class="flex"><div class="item-feed h-2x">Just saw this on the <a href="#">@eBay</a> dashboard, dude is an absolute unit.</div></div></div></div></div><div class="d-flex px-3 py-2 b-t"><div class="flex"><span>6 Notifications</span></div><a href="page.setting.html">See all <i class="fa fa-angle-right text-muted"></i></a></div></div></li><li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link d-flex align-items-center px-2 text-color"><span class="avatar w-24" style="margin: -2px"><img src="../assets/img/a2.jpg" alt="..."></span></a><div class="dropdown-menu dropdown-menu-right w mt-3 animate fadeIn"><a class="dropdown-item" href="page.profile.html"><span>Jacqueline Reid</span> </a><a class="dropdown-item" href="page.price.html"><span class="badge bg-success text-uppercase">Upgrade</span> <span>to Pro</span></a><div class="dropdown-divider"></div><a class="dropdown-item" href="page.profile.html"><span>Profile</span> </a><a class="dropdown-item d-flex" href="page.invoice.html"><span class="flex">Invoice</span> <span><b class="badge badge-pill gd-warning">5</b></span> </a><a class="dropdown-item" href="page.faq.html">Need help?</a><div class="dropdown-divider"></div><a class="dropdown-item" href="page.setting.html"><span>Account Settings</span> </a><a class="dropdown-item" href="signin.1.html">Sign out</a></div></li><li class="nav-item d-lg-none"><a href="#" class="nav-link px-2" data-toggle="collapse" data-toggle-class="" data-target="#navbarToggler"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></a></li><li class="nav-item d-lg-none"><a class="nav-link px-1" data-toggle="modal" data-target="#aside"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a></li></ul></div>

</div>
<div class="offset-md-2 col-md-8 offset-md-2">
    <h3>Eni News Search</h3>
    <div class="card-columns" style="direction: rtl;text-align: right">


        <?php
foreach ($show_search as $row_post){
?>
    <div class='card'>
        <div class='media media-2x1'><a class='media-content' style='background-image:url(images/image-<?= $row_post['imaage']; ?>.jpg)'><strong class='text-fade'>تصویر</strong></a></div>
        <div class='card-body'>
            <h5 class='card-title'><a href='show.php?id=<?= $row_post['id']; ?>' target='_blank'><?= $row_post['title']; ?></a> </h5>
            <p class='card-text'><?= $row_post['description']; ?></p>
            <?php
            if(!empty($row_post['tags'])){
                $x = explode(",",$row_post['tags']);

                foreach ($x as $tagsx){
                    echo "<a href=\"search.php?name=$tagsx\"  class=\"btn w-sm mb-1 btn-success\" style='margin-left: 4px'>$tagsx</a>";

                }
            }

            ?>
            <p class='card-text'><small class='text-muted'> <?php echo   time_elapsed_string($row_post['dtime']);?></small></p>
        </div>
    </div>
        <?php
}
        ?>




    </div>





</div>
<script src="assets/js/site.min.js"></script>
</body>

</html>