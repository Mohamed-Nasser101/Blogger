<?php
     require_once("db.php");
     session_start();

// if(isset($_SESSION['role']) && $_SESSION['role'] == "admin" && ) {  header("Location: ../admin"); }

if(isset($_POST['login'])){
    
   $username = $_POST['username'];
   $password = $_POST['password'];
   
    $username = mysqli_real_escape_string($conn,htmlspecialchars($username));
    $password =  mysqli_real_escape_string($conn,htmlspecialchars($password));
    
    $query = "SELECT username, user_password,user_role FROM users
                    WHERE username = '$username' ; " ; //AND user_password = '$password' 
     
    $users = mysqli_query($conn,$query);
    
    
       if(mysqli_num_rows($users) <1) {
        
        echo "sorry you aren't registered here.";
        exit();
            }
    
         $user = mysqli_fetch_assoc($users);
         $role  = $user['user_role'];
         $db_password = $user['user_password'];
        $verification = password_verify($password,$db_password);
        
    if($role == "admin" && $verification == true ) {
        
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        
        header("Location: ../admin");
    } 
    
    if($role == "user" && $verification == true ){ echo "hello user"; }
  
}