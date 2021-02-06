<?php ob_start();
require_once("include/db.php");
require_once("include/header.php");
require_once("include/functions.php");
?>

    <!-- Navigation -->
    <?php
         require_once("include/nav.php");
    ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
               <?php include("include/thispost.php"); ?>
                <hr>

                <!-- Blog Comments -->
                <?php 
                addcomment();
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form" >
                       <div class="form-group">
                            <input type="text" name="author" placeholder="enter your name" class="form-control"/>
                        </div>
                        <div class="form-group">
                           <input type="text" name="email" placeholder="enter your email" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="addComment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

               <?php  showComments();  ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php
                require_once("include/sidebar.php");
                ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php
require_once("include/footer.php");
?>
     
