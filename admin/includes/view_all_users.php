   <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Password</th>
                                        <th>firstname</th>
                                        <th>email</th>
                                        <th>Image</th>
                                        <th>role</th>
                                        <th>randsalt</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    
                                    if(isset($_GET['delete'])){
                                        $delete_id = $_GET['delete'];
                                        $del_query = "delete from users where user_id = $delete_id ;" ;
                                        mysqli_query($conn,$del_query);
                                    }
                                    
                                    if(isset($_POST['delete'])){
                                        $delete_id = $_POST['id'];
                                        $query_del = "delete from posts where post_id = '$delete_id';";
                                        $m = mysqli_query($conn,$query_del);
                                    }
                                    
                                    $query = "SELECT * FROM users;";
                                    $rows = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($rows)){
                                        $id = $row['user_id'];
                                        $name = $row['username'];
                                        $pass = $row['user_password'];
                                        $firstname = $row['user_firstname'];
                                        $email = $row['user_email'];
                                        $image = $row['user_image'];
                                        $role = $row['user_role'];
                                        $randsalt = $row['randsalt'];
                                        
                                            echo "<tr>";
                                                    echo  "<th>$id</th>";
                                                    echo  "<th>$name </th>";
                                                    echo  "<th style='max-width:100px;overflow:auto'>$pass</a> </th>";
                                                    echo  "<th>$firstname </th>";
                                                    echo  "<th>$email </th>";
                                                    echo  "<th><img class='img-responsive' src='../images/$image' </th>";
                                                    echo  "<th>$role</th>";
                                                    echo  "<th>$randsalt </th>";
//                                                    echo  "<th><a onClick=\" javascript: return confirm('sure you wanna delete!!') \" href='users.php?delete=$id'>delete</a></th>";
                                                    echo "<th><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#Modal-del'>Delete</button></th>";
                                          echo  " </tr>";
                                        }
                                    
                                       // mysqli_close();
                                    ?>
                                </tbody>
                            </table>
                            
                            
                            <!-- Trigger the modal with a button -->
                            <!-- Modal -->
                            <div id="Modal-del" class="modal fade" role="dialog">
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
                                   <a class="btn btn-danger" href='users.php?delete=<?php echo $id; ?> '>delete</a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                           