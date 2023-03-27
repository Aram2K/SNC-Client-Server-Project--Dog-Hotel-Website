<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Dog Hotel</title>
    <style>
        body{
            background-image: url('img/pups.png');
            background-size: 100%;
        }

        .booking .button {
            width: 25%;
            float: left;
            padding: 20px;
            border: 2px solid red;
            text-align: center;
            background-color: lightgray;
            font-weight : bold ;
        }
        .button:hover {
            background-color: dodgerblue;
            transition: 0.1s;
        }
        .logout{
            float: right;
            width: 5%;
        }
    </style>
</head>
<body>

<a href='userLogout.php'><button  class='logout'> Logout  </button> <a/>

<?php
    session_start();

    if($_SESSION['newUser'] == false){
        echo '<b><span style="color:#4D3627"> Welcome back </b> <span style="color:#4D3627">'.$_SESSION['email'].' <br />';
    }
    else{
        echo '<b> You have created an account as: </b>'.$_SESSION['email'].' <br /> <br />';
    }
?>
<p>
<div class="booking">
    <a href="readEvents.php">
        <button type="button" class="button">Book a room</button>
    </a>    
</div>
<div class="booking">
    <a href="viewRes.php">
        <button type="button" class="button">My rooms</button>
    </a>
</div>
<div class="booking">
    <a href="AlterreadEvents.php">
        <button type="button" class="button">Change my room</button>
    </a>
</div>
<div class="booking">
    <a href="CancelreadEvents.php">
        <button type="button" class="button">Cancel room</button>
    </a>
    <p>
</div>
</form>

</body>
</html>