    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                
                                <?php
                                        $query = "SELECT * FROM categories;";
                                        $rows = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($rows)){
                                        $cat = $row['cat_tittle'];

                                        isset($_GET['cat']) ? $current_cat = $_GET['cat'] :  $current_cat = null ;

                                        if($cat == $current_cat){

                                        echo "<li class='active' ><a href='category.php?cat=$cat'>$cat</a></li>";

                                        } else {

                                        echo "<li><a href='category.php?cat=$cat'>$cat</a></li>";
                                        }
                                        }
                                        // mysqli_close();
                                ?>
                        <?php if (isset($_SESSION['username'])): ?>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <?php endif; ?>
                    <li <?= basename($_SERVER['PHP_SELF'],".php") == "contact" ? "class='active' " : "" ?>>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li <?= basename($_SERVER['PHP_SELF'],".php") == "registration" ? "class='active' " : "" ?>>
                        <a href="registration.php">Register</a>
                    </li>
<!--
                    <li>
                        <a href="#">Contact</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
