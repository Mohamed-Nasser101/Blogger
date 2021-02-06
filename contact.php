<?php  include "include/db.php";
            include "include/header.php"; 
?>


    <!-- Navigation -->
    
    <?php  include "include/nav.php"; ?>
    
<?php
$error = false;
if( isset($_POST['submit']) ) {

    
    $subject = $_POST['subject'];
    $email        = $_POST['email'];
    $content = $_POST['body'];
    $to = "mohamednasser.dob95@gmail.com";
    $subject = mysqli_real_escape_string($conn,$subject);
    $subject = wordwrap($subject,70);
    $email    = mysqli_real_escape_string($conn,$email);
    $content = mysqli_real_escape_string($conn,$content);
    //$header = "From: ".$email."\n\r" ;
         
         mail( $to, $subject, $content) ;
}
?>
 
    <!-- Page Content -->
                            
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1 class="text-center">Contanct</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                         <div class="form-group">
                            <label for="subject" class="sr-only">subject</label>
                            <input type="text" name="subject" id="key" class="form-control" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                        <textarea class="form-control" name="body" cols="50" rows="10" required ></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
