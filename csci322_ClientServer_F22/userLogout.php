<?php
//BASED ON BVMP LAB 8 LOGOUT.php
// logout.php

  session_start();
 
 unset($_SESSION['email']);
 unset($_SESSION['password']);
 unset($_SESSION['firstName']);
 session_destroy();
?>
<html>
<head>
<title> Logout </title>
<style>
    body{
        background-image: url('img/cuter.jpg');
        background-size: 100%;
    }
</style>
</head>
<body>
<h1><span style="color:#F2FAFD"> Log out page</h1>
<?php 
  if (empty($_SESSION['email']) && empty($_SESSION['password']))
  {
    echo '<span style="color:#F2FAFD"> Logged out.<br/>';
  }
  else
  {
    // if they weren't logged in but came to this page somehow
    echo '<span style="color:#F2FAFD"> You were not logged in, and so have not been logged out.'; 
  }
?> 
<a href="intropage.html"><span style="color:#0074CC"><br> Back to Home</a>
</body>
</html>
