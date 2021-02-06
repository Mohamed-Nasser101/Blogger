 <div class="col-md-4">
 
               
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                
                <!-- Blog login Well -->
                <div class="well">
                  
                   <?php if(!isset($_SESSION['username'])){ ?>
                   
                    <h4>Blog Login</h4>
                    <form action="include/login.php" method="post">
                      
                       <div class="form-group">
                              <input type="text" name="username" placeholder="username"class="form-control">
                        </div>
                        <div class="input-group">
                              <input type="password" name="password" placeholder="password" class="form-control">
                                        <span class="input-group-btn">
                                                <input class="btn btn-primary" type="submit" name="login" value="submit" />
                                       </span>
                        </div>
                        <div class="form-group"><a href="forgot.php"> forgot password</a></div>


                    </form>
                    <?php }else{ ?>
                                   
                                    <h4><?= $_SESSION['username']; ?></h4>
                                    <a class="btn btn-primary" href="admin/includes/logout.php">Logout</a>
                     <?php }?>
                    <!-- /.input-group -->
                </div>
                

                <!-- Blog Categories Well -->
                
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                               
                    <?php
                                        $query = "SELECT * FROM categories;";
                                        $rows = mysqli_query($conn,$query);
                                        
                                        $tags = [];
                                        while($row = mysqli_fetch_assoc($rows)){
                                            $tags[] = $row['cat_tittle'];
                                        }
                                /*$tags = implode(" ",$tags);  // convert all tags combination array to string 
                                $tags = explode(" ",$tags);  // reconvert it to get every tag alone
                                $tags = array_unique($tags);  //remove dublicate tage*/
                                foreach($tags as $tag){  //show tags
                                
                                            echo "<li><a href='category.php?cat=$tag'>$tag</a></li>";
                                }
                                       // mysqli_close();
                    ?>

                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>