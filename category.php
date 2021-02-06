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
                if(isset($_GET['cat'])){
                    $cat = $_GET['cat'];
                    $query = "SELECT * FROM posts join categories on(cat_id = post_category_id) where post_category_id = 
                                        (SELECT cat_id FROM categories WHERE cat_tittle = '$cat') ;";
                    $posts = mysqli_query($conn,$query);
                           while($post = mysqli_fetch_assoc($posts)){
                                       $id = $post['post_id'];
                                       $title = $post['post_title'];
                                       $date = $post['post_date'];
                                       $cotent = $post['post_content'];
                                       $author = $post['post_author'];
                                       $img = $post['post_image'];
                    ?>
                                       
                                        <h2>
                                            <a href="post.php?id=<?php echo $id; ?>" ><?php echo $title;?></a>
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
                } if( mysqli_num_rows($posts) == 0){
                    echo '<h2>No Posts To Show !!!</h2>';
                }
                                //mysqli_close($conn);
                ?>
               

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

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
     