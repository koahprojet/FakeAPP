<?php
   include("config.php");
   //include("session.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

      $sql = "SELECT id, username FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";

      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        $success = "user exist in DB";
        // session_register("myusername");
        $_SESSION['login_user'] = $myusername;
         
        header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ECE PORTAL</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div id="portal" class="container">
            <div class="text-center logo">
                <img src="logo.png" width="150" height="150" alt="">
            </div>
            <div style = "font-size:11px; color:green; margin-top:10px"><?php echo $success; ?></div>
            <div class="row">
                <div class="col-sm-8 offset-sm-2 form-login">
                    <h1 class="display-4">Portail captif ECE</h1>
                    <div class="info-form">
                        <form action="" id="contactForm" role="form" method="POST">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Login</label>
                            <input type="text" class="form-control" name="username" id="login" aria-describedby="emailHelp" placeholder="Enter login">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                          </div>
                          <div class="text-center">
                              <input type="submit" class="btn btn-valider" value="Valider">
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        </div>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="script.js"></script>  
    </body>
</html>
