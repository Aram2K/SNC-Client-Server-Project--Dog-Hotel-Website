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
<?php
// This file will read a file with dated stored using JSON


session_start();
require('event.php');

@$fp = fopen("/home/adamaa/public_html/csci322/csci322_ClientServer_F22/theEvents.txt",'rb');

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
	$s1 = new Event();
    $s1->fillFromJSON($temp);
	$all[$count]=$s1;
	$count += 1;
   // echo "from two.php ". $s1->name."<p>";
}
fclose($fp);
?>

<form   name="dropDownform" action="readSeatingChart.php"  method="POST">
	<b><h1>Days of the Week</b></h1> <p><p>
	Use the drop down list to select a day. Click the <b>next button</b> to see the available rooms for that date.
	<p><p>
	<?php
  		echo '<p><select name= "dropDown" show="theShows">';
		foreach ($all as $s) { //grabbing from $all we made above

			echo '<option>'.$s->title."   ".$s->theDate."  ".'</option>'."\n";
		}
		echo '</select>';

	?>
	<p>
	<input type = "submit" value="Next" />
	<p>

</form>

<form name="homeClick" action="Book.php" method="POST">
					<input type = "submit" value="back" />
</form>
</body
</html>
