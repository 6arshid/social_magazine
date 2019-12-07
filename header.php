<?php
require "core.php";
$get_post_home = get_data_index($db);
$get_post_home2 = get_data_index2($db);
$get_slider_active = get_slider_active($db);
$get_slider = get_slider($db);


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
            header('Location: index.php?#newpost');
            exit;

        } else {
            $error[] = 'Wrong username or password or your account has not been activated.';
        }
    }else{
        $error[] = 'Usernames are required to be Alphanumeric, and between 3-16 characters long';
    }



}//end if submit

//if form has been submitted process it
if(isset($_POST['submit_join'])){

    if (!isset($_POST['username'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['email'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['password'])) $error[] = "Please fill out all fields";

    $username = $_POST['username'];

    //very basic validation
    if(!$user->isValidUsername($username)){
        $error[] = 'Usernames must be at least 3 Alphanumeric characters';
    } else {
        $stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
        $stmt->execute(array(':username' => $username));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row['username'])){
            $error[] = 'Username provided is already in use.';
        }

    }

    if(strlen($_POST['password']) < 3){
        $error[] = 'Password is too short.';
    }

    if(strlen($_POST['passwordConfirm']) < 3){
        $error[] = 'Confirm password is too short.';
    }

    if($_POST['password'] != $_POST['passwordConfirm']){
        $error[] = 'Passwords do not match.';
    }

    //email validation
    $email = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error[] = 'Please enter a valid email address';
    } else {
        $stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
        $stmt->execute(array(':email' => $email));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($row['email'])){
            $error[] = 'Email provided is already in use.';
        }

    }


    //if no errors have been created carry on
    if(!isset($error)){

        //hash the password
        $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

        //create the activasion code
        $activasion = md5(uniqid(rand(),true));

        try {

            //insert into database with a prepared statement
            $stmt = $db->prepare('INSERT INTO members (username,password,email,active) VALUES (:username, :password, :email, :active)');
            $stmt->execute(array(
                ':username' => $username,
                ':password' => $hashedpassword,
                ':email' => $email,
                ':active' => $activasion
            ));
            $id = $db->lastInsertId('memberID');

            //send email
            $to = $_POST['email'];
            $subject = "Registration Confirmation";
            $body = "<p>Thank you for registering at demo site.</p>
			<p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
			<p>Regards Site Admin</p>";

            $mail = new Mail();
            $mail->setFrom(SITEEMAIL);
            $mail->addAddress($to);
            $mail->subject($subject);
            $mail->body($body);
            $mail->send();

            //redirect to index page
            header('Location: index.php?action=joined');
            exit;

            //else catch the exception and show the error.
        } catch(PDOException $e) {
            $error[] = $e->getMessage();
        }

    }

}
if(isset($_POST['btn_news_line'])){
    echo "ok";die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="last" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?= constant("DIR"); ?>css/app.v2.css" type="text/css" />
    <link rel="stylesheet" href="<?= constant("DIR"); ?>css/font.css" type="text/css" cache="false" />


    <!--[if lt IE 9]> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/html5.js" cache="false"></script> <script src="js/ie/fix.js" cache="false"></script> <![endif]-->
</head>

<body>
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