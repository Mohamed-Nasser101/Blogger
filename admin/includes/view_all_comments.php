   <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Comment ID</th>
                                        <th>Author</th>
                                        <th>Post Title</th>
                                        <th>Email</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Delete</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    
                                    if(isset($_POST['delete'])){
                                        $delete_id = $_POST['id'];
                                        $query_del = "delete from comments where comment_id = '$delete_id';";
                                        $m = mysqli_query($conn,$query_del);
                                    }
                                    
                                    if(isset($_POST['action'])){
                                        $action = $_POST['action'];
                                        $action_id = $_POST['id'];
                                        if($action == "approve") { $newstatus = "approved";  } else {$newstatus = "suspended" ; }
                                        $query_act = "update comments set comment_status = '$newstatus' where comment_id = $action_id ; " ;
                                        mysqli_query($conn,$query_act);
                                    }
                                    
                                    
                                    $query = "SELECT * FROM comments join posts on( comment_post_id = post_id);";
                                    $rows = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($rows)){
                                        $id = $row['comment_id'];
                                        $post_id = $row['post_id'];
                                        $post = $row['post_title'];
                                        $author = $row['comment_author'];
                                        $date = $row['comment_date'];
                                        $status = $row['comment_status'];
                                       $email = $row['comment_email'];
                                        $content = $row['comment_content'];
                                        
                                        if($status == "approved") {$action = "suspend"; } else{ $action = "approve" ;}
                                        
                                            echo "<tr>";
                                                    echo  "<th>$id</th>";
                                                    echo  "<th>$author </th>";
                                                    echo  "<th><a href='../post.php?id=$post_id'>$post</a></th>";
                                                    echo  "<th>$email </th>";
                                                    echo  "<th>$content </th>";
                                                    echo  "<th>$status </th>";
                                                    echo  "<th>$date </th>";
                                                    echo  "<th> <form action='' method='post'>
                                                                            <input type='submit' value='Delete' name='delete' class='btn btn-primary'/>
                                                                            <input type='hidden' value='$id' name='id' />
                                                                        </form
                                                              </th>";
                                                    echo  "<th> <form action='' method='post'>
                                                                            <input type='submit' value='$action' name='action' class='btn btn-primary'/>
                                                                            <input type='hidden' value='$id' name='id'/>
                                                                        </form
                                                              </th>";
                                          echo  " </tr>";
                                        }
                                    
                                       // mysqli_close();
                                    ?>
                                </tbody>
                            </table>
                           