<?php 
           ob_start();  //to buffer the header add send reuest one time
           include("includes/header.php"); 
           include_once("../include/db.php");
           include_once("../include/functions.php");
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
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        <div class="col-lg-6">
                           <?php  insert();  delete(); ?>
                           
                            <form action="" method="post" id="form">
                                <div class="form-group">
                                    <input type="text" name="cat_title" class="form-control" placeholder="add category or update">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="add Category" class="btn btn-primary">
                                </div>
                            </form>
                            
                            
                            <?php  update(); ?>
                            

                        </div>
                        <div class="col-lg-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php addCategories();  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
      <?php include("includes/footer.php"); ?>