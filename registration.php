<?php  include "include/db.php";
            include "include/header.php"; 
?>


    <!-- Navigation -->
    
    <?php  include "include/nav.php"; ?>
    
<?php
$error = "";
if( isset($_POST['submit']) ) {

     if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']))  {
         $error = "copmlete fields";
         goto error;
     }
    
    
    $username = trim($_POST['username']);
    $email        = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    $username = mysqli_real_escape_string($conn,$username);
    $email        = mysqli_real_escape_string($conn,$email);
    $password = mysqli_real_escape_string($conn,$password);
    
    $password = password_hash($password,PASSWORD_DEFAULT);
    
    
   $check_query = "select username , user_email from users ; ";
   $results = mysqli_query($conn,$check_query);
    while($result = mysqli_fetch_array($results)){
        if($result['username'] == $username){
            $error = "username already exists";
            goto error;
            break;
        } elseif ( $result['user_email'] == $email){
            $error = "email already exists";
            goto error;
            break;
        }
    }

    $query = "insert into users(username,user_email,user_password,user_role) values('$username','$email','$password','user');";
    mysqli_query($conn,$query);
}

?>
 
    <!-- Page Content -->
    <?php error: ?>
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1 class="text-center">Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       <?php
                        if(isset($error)){
                            echo   $error == true ? "<div class='form-control alert-danger'> $error </div>" : "" ;}
                        ?>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
