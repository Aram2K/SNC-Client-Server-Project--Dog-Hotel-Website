<?php
// This file will read a file with dated stored using JSON

session_start();
require('seatingChart.php');

$f = explode(' ', $_POST['dropDown'], 2);
$_SESSION['dropDownfile']= $f[0].'.txt';


@$fp = fopen("/home/adamaa/public_html/csci322/csci322_ClientServer_F22/rooms/".$_SESSION['dropDownfile'],'rb');
if (!$fp)
{	
	echo "<p>UNABLE TO OPEN FILE<p>";
	exit;
}
// Only one seating chart per file ... no loop needed 
    $temp = fgets($fp, 3000);
	//echo $temp."<br>";  // testing purposes only ... show me what was just read from the file
	$s1 = new SeatingChart();
    $s1->fillFromJSON($temp);  //in file seatChart.php
 
fclose($fp);

?>

<html>
<head>
<style>
    body{
        background-image: url('img/a.jpg');
        background-size: 80%;
    }
</style>
</head>
<body>
<h1>See the availabale rooms</h1> <p><p>
<form  id="seatSelection" name="seats[]" action="login.php"  method="POST">
	<?php
	$rt = array("Shared room", "Single room", "Double room", "Deluxe room");
	$row = 0;
		//echo "FROM readSeatingChart.php <p>";
		echo $s1->name.":"."<p>"; //displaying day name
			foreach ($s1->seats as $x){

				if($x->guest == "none") //seat empty, allow user to select
				{
					if($x->seatNumber == 1){
						echo "<br>".$rt[$row]."</br>";
						$row++;
					}
					echo $x->seatNumber."<input type='checkbox' id='myCheck' name='seats[]' value='1' disabled"." <br>" ; //making an array of cbs?

				}
				else{ //seat not avail, no cb
					if($x->seatNumber == 1){
						echo "<br>".$rt[$row]."</br>";
						$row++;
					}
					echo $x->seatNumber." X ";
				}
				
				//echo $x->table.$x->seatNumber. " ". $x->guest."<br>";

			} 
			echo "<br>";
			echo "<br>";
			echo "<br>";

	?>	
	<input type = "submit" value="Login" />
	<a href="signup.php">
       <button type="button" class="button">Sign up</button>
    </a>
	<p>
	<a href="readEventsguest.php">
       <button type="button" class="button">Back</button>
    </a>

</form>
</body>
</html>

