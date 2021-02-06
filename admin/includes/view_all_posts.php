   <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Tag</th>
                                        <th>Comments</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    
                                    if(isset($_POST['delete'])){
                                        $delete_id = $_POST['id'];
                                        $query_del = "delete from posts where post_id = '$delete_id';";
                                        $m = mysqli_query($conn,$query_del);
                                    }
                                    
                                    $query = "SELECT * FROM posts join categories on( cat_id = post_category_id);";
                                    $rows = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($rows)){
                                        $id = $row['post_id'];
                                        $title = $row['post_title'];
                                        $author = $row['post_author'];
                                        $date = $row['post_date'];
                                        $cat = $row['cat_tittle'];
                                        $image = $row['post_image'];
                                        $tag = $row['post_tag'];
                                        $status = $row['post_status'];
                                        $comment = $row['post_comment_count'];
                                        
                                            echo "<tr>";
                                                    echo  "<th>$id</th>";
                                                    echo  "<th>$author </th>";
                                                    echo  "<th><a href='../post.php?id=$id'>$title</a> </th>";
                                                    echo  "<th>$cat </th>";
                                                    echo  "<th>$status </th>";
                                                    echo  "<th><img class='img-responsive' src='../images/$image' </th>";
                                                    echo  "<th>$tag</th>";
                                                    echo  "<th>$comment </th>";
                                                    echo  "<th>$date </th>";
                                                    echo "<th><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Delete</button></th>";
                                                    echo  "<th> <form action='editpost.php' method='post'>
                                                                            <input type='submit' value='Edit' name='edit' class='btn btn-primary'/>
                                                                            <input type='hidden' value='$id' name='id'/>
                                                                        </form
                                                              </th>";
                                          echo  " </tr>";
                                        }
                                    
                                       // mysqli_close();
                                    ?>
                                </tbody>
                            </table>
                            
                            <!-- Trigger the modal with a button -->
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog modal-sm">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title text-danger">Delete</h4>
                                  </div>
                                  <div class="modal-body">
                                    <h4>Sure you want to Delete ?</h4>
                                  </div>
                                  <div class="modal-footer">
                                   <form action='' method='post' style='display:inline-block'>
                                                    <input type='submit'  value='Delete' name='delete' class='btn btn-danger'/>
                                                    <input type='hidden' value='<?php echo $id; ?>' name='id'/>
                                    </form>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                           