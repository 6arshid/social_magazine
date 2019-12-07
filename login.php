<?php require "header.php";


//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: index.php'); exit(); }

//process login form if submitted
if(isset($_POST['submit'])){

    if (!isset($_POST['username'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['password'])) $error[] = "Please fill out all fields";

    $username = $_POST['username'];
    if ( $user->isValidUsername($username)){
        if (!isset($_POST['password'])){
            $error[] = 'A password must be entered';
        }
        $password = $_POST['password'];

        if($user->login($username,$password)){
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit;

        } else {
            $error[] = 'Wrong username or password or your account has not been activated.';
        }
    }else{
        $error[] = 'Usernames are required to be Alphanumeric, and between 3-16 characters long';
    }



}//end if submit

//define page title
$title = 'Login';

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
                <input type="submit" name="submit" value="ورود" class="btn btn-primary btn-block btn-block" tabindex="5">
                <br>
            </form>
        </div>
    </div>
</div>





