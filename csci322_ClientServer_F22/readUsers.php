<?php
// oneUser.php ... creates an object via assignment and 
// and encodes as JSON, and writes to users.txt
require('user.php');
session_start();
 
$_SESSION['firstName']= $_POST['firstName'];
$_SESSION['lastName'] = $_POST['lastName'];  
$_SESSION['email']    = $_POST['email'];
$_SESSION['password'] = $_POST['password'];

@$fp = fopen("/home/adamaa/public_html/csci322/csci322_ClientServer_F22/users.txt",'rb');
if (!$fp)
{
	echo "<p>UNABLE TO OPEN FILE<p>";
	exit;
}
$count=0;
while (!feof($fp))
{
    $temp = fgets($fp, 999);
	//echo $temp."<br>";  // testing purposes only ... show me what was just read from the file
	$s1 = new User();
    $s1->fillFromJSON($temp);
	$all[$count]=$s1;
	$count += 1;
   // echo "from two.php ". $s1->name."<p>";
}
fclose($fp);
//check to see if same username/pass exisit, if so, don't rewrite to file ->echo welcome back, else say thanks for signing up
$b = true;
foreach ($all as $s){

	if($s->email == $_SESSION['email'] && $s->password == $_SESSION['password'])
	{
		header("location: https://compsci04.snc.edu/~adamaa/csci322/csci322_ClientServer_F22/Book.php");
		$b = false;
	}
	
}	
if($b){
	header("location: https://compsci04.snc.edu/~adamaa/csci322/csci322_ClientServer_F22/login2.php");
}
?>
