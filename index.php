<?php
ob_start();
session_start();
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
                if( isset($_GET['page']) ) {
                    
                    $start = ($_GET['page']-1)*5 ;
                    
                }else{
                    
                    $start = 0 ;
                }
                
                   $query_count = "SELECT * FROM posts ;";
                   $count = mysqli_query($conn,$query_count);
                   $posts_count = mysqli_num_rows($count);
                    $pag_num = ceil($posts_count/5);
                
                    $query = "SELECT * FROM posts limit $start , 5 ;";
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
                                            by <a href="author.php?author=<?= $author ?> "><?php echo $author ;?></a>
                                        </p>
                                        <p><span class="glyphicon glyphicon-time"></span> Posted on<?php echo $date;?></p>
                                        <hr>
                                        <img class="img-responsive" src="images/<?php echo $img; ?>" alt="">
                                        <hr>
                                        <p><?php echo $cotent;?></p>
                                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                                        <hr>
                                       
                                   <?php }
                                //mysqli_close($conn);
                ?>
               
               <?php
                
                         if( isset($_GET['page']) ) {

                                $page = $_GET['page'] ;

                            }else{

                                $page = 1 ;
                            }
                ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="index.php?page=<?php if($page != 1 && isset($page)){ echo $page-1; }else{echo 1;} ?>">&larr; Older</a>
                    </li>
                    <?php

                    for($i = 1; $i <= $pag_num; $i++){
                        
                        if($i == $page){
                            
                        echo "<span
                                        style='background-color: #286090;
                                        color: white;
                                        border: 1px solid #2e6da4;
                                        padding: 4px;
                                        margin: 0 5px;
                                        text-align:center;' ><a style='text-decoration:none;color:white' href='index.php?page=$i'>$i</a></span>";
                              }else{
                            
                            echo "<span
                                        style='background-color: white;
                                        color: black;
                                        border: 1px solid #2e6da4;
                                        padding: 4px;
                                        margin: 0 5px;
                                        text-align:center;' ><a style='text-decoration:none;color:black' href='index.php?page=$i'>$i</a></span>";
                        }
                    }
                    
                    ?>
                    <li class="next">
                        <a href="index.php?page=<?php if($page < $pag_num ){ echo $page+1 ; }else{echo $pag_num ; } ?>">Newer &rarr;</a>
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
     