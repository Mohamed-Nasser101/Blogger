 <?php 
                if(isset($_GET['id'])){
                    
                    $id = $_GET['id'];
                    $query = "SELECT * FROM posts where post_id = '$id' ;";
                    $posts = mysqli_query($conn,$query);
                    if(mysqli_num_rows($posts) == 0) die ;
                     $post = mysqli_fetch_assoc($posts);
                                       $title = $post['post_title'];
                                       $date = $post['post_date'];
                                       $cotent = $post['post_content'];
                                       $author = $post['post_author'];
                                       $img = $post['post_image'];
                                       $content = substr($post['post_content'],0,200);
                                    
                } else die;
                ?>
                <!-- Title -->
                <h1><?php echo $title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span><?php echo $date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo $img; ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $content; ?></p>
