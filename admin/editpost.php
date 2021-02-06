<?php 
            session_start();
            include("includes/header.php");        
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
                        if(isset($_POST['edit'])){$id_update = $_POST['id'];}
                        
                      if(empty($id_update) || is_null($id_update) || !isset($id_update)) {  // because id get unset when sending the form again
                         $id_update =  $_SESSION['id_upate'];  }else{
                          $_SESSION['id_upate'] = $id_update;
                      }
                        
                        if(isset($_POST['editnow'])){
                            
                         /*   foreach($_POST as $key => $val){
                                if(empty($val) || is_null($val) || !isset($val)){
                                    echo "can't add incomplete data";
                                    break;
                                    die();
                                }
                            }*/
                                        $title = $_POST['title'];
                                        $author = $_POST['author'];
                                        $cat = $_POST['cat_id'];
                                        $image = $_FILES['image']['name'];
                                        $image_tname = $_FILES['image']['tmp_name'];                         
                                        $tag = $_POST['tags'];
                                        $status = $_POST['status'];
                                        $content = $_POST['content'];
                                        $comment_count = 4;
                            
                                         move_uploaded_file($image_tname,"../images/$image");
                            
                                                $query = "UPDATE  posts SET
                                                `post_category_id`='$cat',
                                                `post_title`='$title',
                                                `post_author`='$author',
                                                `post_date`=now(),
                                                `post_image`='$image',
                                                `post_content`='$content',
                                                `post_tag`='$tag',
                                                `post_comment_count`= $comment_count ,
                                                `post_status`='$status'
                                                 WHERE post_id = $id_update ; ";
                            
                                                $m= mysqli_query($conn,$query);
                        };
                        
                                                    
                        
                        ?>
                        <form method="post" action="" enctype="multipart/form-data">
                           <div class="form-group">
                               <input type="text" name="title" placeholder="Post Title" class="form-control">
                           </div>
                           <div class="form-group">
                               <select name="cat_id">
                                 <?php
                                  $query = "select * from categories;";
                                  $cats = mysqli_query($conn,$query);
                                  while($cat = mysqli_fetch_assoc($cats)){
                                      echo "<option value=' {$cat['cat_id'] }'>{$cat['cat_tittle']}</option>";
                                  }
                                  ?> 
                              </select>
                           </div>
                           <div class="form-group">
                               <input type="text" name="author" placeholder="Author" class="form-control">
                           </div>
                           <div class="form-group">
                               <select name="status" class="form-control" style="max-width:120px">
                                  <option value="published">Published</option>
                                  <option value="draft">Draft</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="post_image">Post Image</label>
                               <input type="file" name="image" class="form-control">
                           </div>
                           <div class="form-group">
                               <input type="text" name="tags" placeholder="Post Tags" class="form-control">
                           </div>
                           <div class="form-group">
                               <textarea  id="editor" name="content" placeholder="Post Content" class="form-control" cols="30" rows="10"></textarea>
                           </div>
                           <div class="form-group">
                               <input type="submit" name="editnow" value="Edit Post" class="btn btn-primary">
                           </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
      <?php include("includes/footer.php"); ?>