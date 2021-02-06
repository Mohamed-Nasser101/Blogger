<?php

function insert(){
                    if(isset($_POST['submit']) && !empty($_POST['cat_title']) ) {
                                global $conn;
                                $cat = $_POST['cat_title'];
                                $query = "insert into categories(cat_tittle) values('$cat');";
                                mysqli_query($conn,$query);
                                header("location:Categories.php");  //to refresh page  
                            }
                                
};

function delete(){
                            if(isset($_GET['delete'])) {
                                global $conn;
                                $id = $_GET['delete'];
                                $query = "delete from categories where cat_id = '$id';";
                                mysqli_query($conn,$query);
                                header("location:Categories.php");  //to refresh page
                            }
                                
};

function update(){
                                global $conn;
                                
                              if(isset($_GET['update'])) {
                                $id_update = $_GET['update']; 
                                $value = $_GET['value']
                                        ?>
                                
                             <form action="" method="post" id="form">
                                <div class="form-group">
                                    <input type="text" value="<?php echo $value; ?>" name="cat_title" class="form-control" placeholder="add category or update" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update" value="update Category" class="btn btn-primary">
                                </div>
                            </form>
                            
                          <?php  } 
                            
                             if(isset($_POST['update']) && !empty($_POST['cat_title']) ) {
                                $cat_title = $_POST['cat_title'];
                                $query = "update categories set cat_tittle = '$cat_title'  where cat_id = '$id_update' ;";
                                mysqli_query($conn,$query);
                                header("location:Categories.php");  //to refresh page
                            }
    
};


function addCategories(){
                                        global $conn;
                                         $query = "SELECT * FROM categories;";
                                        $rows = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($rows)){
                                            $id = $row['cat_id'];
                                            $title = $row['cat_tittle'];
                                            echo "<tr>";
                                                  echo  "<th>$id</th>";
                                                  echo  "<th>$title 
                                                  <a href='Categories.php?delete=$id ' class='btn btn-primary col-lg-2' style='float:right;margin-left:10px'>delete</a>
                                                  <a href='Categories.php?update=$id&value=$title ' class='btn btn-primary col-lg-2' style='float:right;margin-left:10px'>update</a>
                                                  </th>";
                                          echo  " </tr>";
                                        }

                                       // mysqli_close();
}
function addcomment(){
                                        global $conn;
                                        if(isset($_POST['addComment'])){
                                        $post_id =$_GET['id'];
                                        $author = $_POST['author'];
                                        $email = $_POST['email'];
                                        $content = $_POST['content'];
                                        //$date = date("Y-m-d h:i:s");
                                        $status = "suspended";
                                        if(empty($author) || empty($email) || empty($content) ){
                                            echo "complete fields first";
                                        }else{

                                        $query = "INSERT INTO `comments` (comment_post_id,`comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES ($post_id, '$author', '$email', '$content', '$status', NOW());";
                                        $r= mysqli_query($conn,$query);             
                                        }
                                    }
}

function showComments(){
                        global $conn;
                        $post_id =$_GET['id'];
                        $query = "select * from comments where comment_post_id = $post_id and comment_status = 'approved'; ";
                        $result = mysqli_query($conn,$query);
                        while($comment = mysqli_fetch_array($result)){ ?>

                        <!-- Comment -->
                        <div class="media">
                        <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment['comment_author'] ; ?>
                        <small><?php echo $comment['comment_date'] ; ?></small>
                        </h4>
                        <?php echo $comment['comment_content'] ; ?>
                        </div>
                        </div>

                        <?php }
}

function checkLogin(){
    if(!isset($_SESSION['username'])){
        header("Location: localhost/cms");
    }
}







