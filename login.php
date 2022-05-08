<?php
include('connexion.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM login WHERE User = '$myusername' and Pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style1.css">
	<link rel="stylesheet" href="style1.css">
	<title>Login Page</title>
	

</head>
<body background="a.jpg">
<div class="main">
  <div class="form">
<p class="sign" align="center">Sign in </p>
    <form class="form1" method="POST">
       <input class="un" type="text" name="username" id="username" placeholder="Enter Username">
	 <input class="pass" type="password" name="password" id="password" placeholder="Enter Password">
      <input class="submit" type="submit">
    </form>
  </div>
</div>
</body>
</html>
