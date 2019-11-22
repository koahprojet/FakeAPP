<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];

   var_dump($user_check);
   
   $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   //add for me
   $count = mysqli_num_rows($ses_sql);
   
   $login_session = $row['username'];

   if($count == 1) {
    
    header("location: welcome.php");
    }else {
        if(!isset($_SESSION['login_user'])){
            header("location:login.php");
            die();
    }
  }
   
   
?>