<?php 
           session_start();
           include("includes/header.php"); 
           include_once("../include/db.php");
?>

    <div id="wrapper">

        <!-- Navigation -->
        
 <?php 
        include("includes/nav.php"); ?>
        <?php?>

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
                        <div class="col-lg-6">
                        
                                        <?php include_once("includes/view_all_posts.php"); ?>
                        
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
      <?php include("includes/footer.php"); ?>