<?php include("includes/header.php");        
           include_once("../include/db.php");
?>

    <div id="wrapper">

        <!-- Navigation -->
        
 <?php include("includes/nav.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                    <div class="col-lg-12">
                       <?php
                        if(isset($_POST['submit'])){
                         /*   foreach($_POST as $key => $val){
                                if(empty($val) || is_null($val) || !isset($val)){
                                    echo "can't add incomplete data";
                                    break;
                                    die();
                                }
                            }*/
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];
                                        $password = password_hash($password,PASSWORD_DEFAULT);
                                        $firstname = $_POST['firstname'];
                                        $lastname = $_POST['lastname'];
                                        $email = $_POST['email'];
                                        //$image = $_FILES['image'];
                                       // $image_tname = $_FILES['image']['tmp_name'];                         
                                        $role = $_POST['role'];
                            
                                   // move_uploaded_file($image_tname,"../images/$image");
                            
                                    $query = "INSERT INTO users(`username`,`user_password`,`user_firstname`,`user_lastname`,`user_email`,`user_role`) VALUES('$username','$password','$firstname','$lastname','$email','$role');";
                            
                                    mysqli_query($conn,$query);
                        };
                        
                                                    
                        
                        ?>
                        <form method="post" action="" enctype="multipart/form-data">
                           <div class="form-group">
                               <input type="text" name="username" placeholder="Add Username" class="form-control">
                           </div>
                           <div class="form-group">
                               <input type="text" name="password" placeholder="Add Password" class="form-control">
                           </div>
                           <div class="form-group">
                               <input type="text" name="firstname" placeholder="Add Firstname" class="form-control">
                           </div>
                           <div class="form-group">
                               <input type="text" name="lastname" placeholder="Add Lastname" class="form-control">
                           </div>
                           <div class="form-group">
                               <input type="email" name="email" placeholder="Add Email" class="form-control">
                           </div>
<!--
                           <div class="form-group">
                              <label for="post_image">User Image</label>
                               <input type="file" name="image" class="form-control">
                           </div>
-->
                           <div class="form-group">
                           <select name="role">
                             <option value='admin'>admin</option>
                             <option value='user'>user</option>
                              </select>
                           </div>
                           
                           <div class="form-group">
                               <input type="submit" name="submit" value="Add User" class="btn btn-primary">
                           </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
      <?php include("includes/footer.php"); ?>