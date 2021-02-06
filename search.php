<?php
require_once("include/db.php");
require_once("include/header.php");
?>

    <!-- Navigation -->
    <?php
         require_once("include/nav.php");
    ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                     if(isset($_POST['search'])){
                         
                         $search = $_POST['search'];
                         $query = "SELECT * FROM posts WHERE post_tag LIKE '%$search%' " ;
                         $results = mysqli_query($conn,$query);
                         $count = mysqli_num_rows($results);
                         if($count == 0){echo "<h2>No Result</h2>" ;}
                         else{
                             while($post = mysqli_fetch_assoc($results)){
                                       $title = $post['post_title'];
                                       $date = $post['post_date'];
                                       $cotent = $post['post_content'];
                                       $author = $post['post_author'];
                                       $img = $post['post_image'];
                         
                           
                    ?>
                                       
                                        <h2>
                                            <a href="#"><?php echo $title;?></a>
                                        </h2>
                                        <p class="lead">
                                            by <a href="index.php"><?php echo $author ;?></a>
                                        </p>
                                        <p><span class="glyphicon glyphicon-time"></span> Posted on<?php echo $date;?></p>
                                        <hr>
                                        <img class="img-responsive" src="images/<?php echo $img; ?>" alt="">
                                        <hr>
                                        <p><?php echo $cotent;?></p>
                                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                                        <hr>
                                       
                                   <?php }
                                    }
                               }
                                //mysqli_close($conn);
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php
                require_once("include/sidebar.php");
                ?>

        </div>
        <!-- /.row -->

        <hr>
<?php
require_once("include/footer.php");
?>
     