<?php  include "include/db.php"; ?>
<?php  include "include/header.php"; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === "POST"  &&  isset($_POST['email'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    /*$stmt = mysqli_prepare($conn,"SELECT user_email FROM users WHERE user_email = ? ;");
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);
    echo  mysqli_stmt_num_rows($stmt);*/
    $r = mysqli_query($conn,"select user_email from users where user_email = '$email' ; ");
    if (mysqli_num_rows($r) == 0){
        echo "emial doesnot exist";
    }else{
        $token = bin2hex(openssl_random_pseudo_bytes(50));
        mysqli_query($conn,"update users set token = '$token' where user_email = '$email' ; ");
    }

}
?>

<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">




                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "include/footer.php";?>

</div> <!-- /.container -->

