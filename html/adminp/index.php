<?php 
	session_start();
    error_reporting(0);

    if(isset($_POST['login'])) {
		include_once("./inc/connect.php");
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
 
        $username = stripslashes($username);
        $password = stripslashes($password);
       
        $username = mysqli_real_escape_string($db, $username);
        $password = mysqli_real_escape_string($db, $password);
 
        $password = md5($password);
 
        $sql = "SELECT * FROM tbl_users WHERE username='$username' LIMIT 1";
        $query = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($query);
        $id = $row['id'];
        $db_password = $row['password'];
 
        if($password == $db_password) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            header("Location: secret.php");
        } else {
            echo "<div class='well container' style='text-align:center;color:red;font-size:28pt;'>Incorrect login details.</div>";
        }
 
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>

        <link rel="stylesheet" type="text/css" href="./css/signin.css">

        <link rel="stylesheet" type="text/css" href="./css/index.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
<body>

    <div class="container">
        <div class="well">

        <form class="form-signin" method="post">
            <h2 class="form-signin-heading">Please login</h2>
                <form action="login.php" method="post" enctype="multipart/form-data">
                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                    <input class="form-control" placeholder="Password" name="password" type="password">
                    <input class="btn btn-lg btn-primary btn-block" name="login" type="submit" value="Login"><br>
                </form>
        </form>
        </div>
    </div>
  </body>
</html>