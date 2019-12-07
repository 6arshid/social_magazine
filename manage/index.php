<?php require "../header.php";


if(isset($_POST['submit_admin'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    get_admin_data($db,$username,$password);
}
?>






<div class="card">
    <div id="content-body">
        <div class="p-3 p-md-5">
            <p><small class="text-muted">برای ورود نام کاربری و کلمه عبور خود را وارد کنید</small></p>
            <form role="form" method="post" action="" autocomplete="off">

                <?php
                //check for any errors
                if(isset($error)){
                    foreach($error as $error){
                        echo '<p class="bg-danger">'.$error.'</p>';
                    }
                }

                if(isset($_GET['action'])){

                    //check the action
                    switch ($_GET['action']) {
                        case 'active':
                            echo "<h2 class='bg-success'>اکانت شما با موفقت فعال شد .</h2>";
                            break;
                        case 'reset':
                            echo "<h2 class='bg-success'>لطفا ایمیل خود را بررسی کنید ، لینک برای شما ارسال شد .</h2>";
                            break;
                        case 'resetAccount':
                            echo "<h2 class='bg-success'>پسورد شما عوض شد می توانید وارد شوید .</h2>";
                            break;
                    }

                }


                ?>

                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control input-lg" placeholder="نام کاربری را وارد کنید" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1">
                </div>

                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="کلمه عبور خود را وارد کنید" tabindex="3">
                </div>

                <div class="col-xs-9 col-sm-9 col-md-9">
                    <a href='reset.php'>کلمه عبور خود را فراموش کرده اید ؟</a>
                </div>

                <hr>
                <input type="submit" name="submit_admin" value="ورود" class="btn btn-primary btn-block btn-block" tabindex="5">
                <br>
            </form>
        </div>
    </div>
</div>





