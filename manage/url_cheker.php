<?php
require "../core.php";

$show_url = get_urls_for_check($db);

?>

<?php
if(isset($_POST['btn_replace'])){
    $find = $_POST['find'];
    $replace = $_POST['replace'];
    $result = select_content_html($db);
foreach ($result as $row_result){

        $x = str_replace($row_result['source'],$find,$replace);
        $new_url = $x.$row_result['source'];

    insert_html_content($db,$new_url,$row_result['id']);
}
}
?>
<link rel="stylesheet" href="<?= constant("DIR"); ?>assets/css/site.min.css">
<div class="container rtl">
    <form method="POST">
    <div class="row">
        <div class="col">
            <br>
            <h1>بررسی لینک ها</h1>



            <p>Element</p>
            <div class="list list-row block">


                <?php
                foreach ($show_url as $row_urls){

                ?>


                <div class="list-item" data-id="<?= $row_urls['rss_ID']; ?>">
                    <div>
                        <label class="ui-check m-0">
                            <input type="checkbox" name="id" value="20"> <i></i></label>
                    </div>
                    <div><a data-toggle="modal" data-target="#myModal-<?= $row_urls['rss_ID']; ?>"><span class="gd-warning"><?= $row_urls['title']; ?></span></a></div>
                    <div class="flex">
                        <div class="item-feed h-2x"><a data-toggle="modal" data-target="#myModal-<?= $row_urls['rss_ID']; ?>"></a> <?= $row_urls['title_user']; ?></div>
                    </div>
                </div>

                    <!-- Modal -->
                    <div id="myModal-<?= $row_urls['rss_ID']; ?>" class="modal bg-dark fade show" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>

                                    <form method="POST">
                                        find : <input type="text" name="find" class="form-control">
                                        <br>
                                        replace : <input type="text" name="replace" class="form-control">
                                        <br>
                                        <input type="submit" name="btn_replace" value="تغییر لینک ها" class="btn btn-danger">
                                    </form>

                                        <?php
                                      $get_urls_by_cat = get_urls_by_cat($db,$row_urls['rss_ID']);
                                      foreach ($get_urls_by_cat as $row_urls){
                                          echo $row_urls['source'] ."<br>";
                                      }
                                        ?>



                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>


        </div>

    </div>
    </form>
</div>
<script src="../assets/js/site.min.js"></script>
