
</div>



<div class="s-footer">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                تی نیوز | جستجوگر هوشمند خبر. تمامی حقوق محفوظ است. ۱۳۹۰ - ۱۳۹۷ ©
            </div>
            <div class="col-md-6">
                تی نیوز | جستجوگر هوشمند خبر. تمامی حقوق محفوظ است. ۱۳۹۰ - ۱۳۹۷ ©
            </div>


        </div>
        <div class="row" style="padding-top: 40px">
            <div class="col-md-6">
                برنامه نویس : آقای آخر
            </div>



        </div>
    </div>
</div>



<!--footer-->


<div id="modal-login" class="modal bg-dark" data-backdrop="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-body rtl">
                <img src="assets/img/logo.png" class="align-content-center">
                <form role="form" method="post" action="" autocomplete="off">

                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control input-lg" placeholder="نام کاربری" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="کلمه عبور" tabindex="3">
                    </div>

                    <div class="col-xs-9 col-sm-9 col-md-9">
                        <a href='reset.php'>کله عبور خود را فراموش کرده اید ؟</a>
                    </div>

                    <hr>
                    <input type="submit" name="submit" value="ورود" class="btn btn-success btn-block btn-block" tabindex="5">
                    <br>
                </form>
                <br>
                <a href="join.php" class="btn btn-primary btn-block" >عضویت</a>
            </div>

        </div>
    </div>
</div>
<div id="modal-join" class="modal bg-dark fade" data-backdrop="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-body rtl">
                <div class="p-4 text-center">
                    <?php
                    //check if already logged in move to home page
                    if( $user->is_logged_in() ){echo "ok you login";}else{


                    ?>
                    <form role="form" method="post" action="account.php" autocomplete="off">


                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control input-lg" placeholder="نام کاربری" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="آدرس ایمیل" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>" tabindex="2">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="کلمه عبور" tabindex="3">
                        </div>
                        <div class="form-group">
                            <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="کلمه عبور را دوباره وارد کنید" tabindex="4">
                        </div>

                        <input type="submit" name="submit_join" value="عضویت" class="btn btn-primary btn-block " tabindex="5">
                    </form>
                    <?php
                    }
                    ?>
                </div>

            </div>

        </div>
    </div>
</div>



<script src="assets/js/site.min.js"></script>
</body>

</html>