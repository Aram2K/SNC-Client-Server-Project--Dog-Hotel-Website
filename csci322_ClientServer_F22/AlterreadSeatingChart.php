<?php
// This file will read a file with dated stored using JSON

session_start();
require('seatingChart.php');

$f = explode(' ', $_POST['alterdropDown'], 2);
$_SESSION['alterdropDownfile']= $f[0].'.txt';
$_SESSION['day']= $f[0];


@$fp = fopen("/home/adamaa/public_html/csci322/csci322_ClientServer_F22/rooms/".$_SESSION['alterdropDownfile'],'rb');
if (!$fp)
{	
	echo "<p>UNABLE TO OPEN FILE<p>";
	exit;
}
echo "Showing your reserved seats for ".$f[0].": <br/>";
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
        background-image: url('img/gr.jpg');
        background-size: 100%;
    }
</style>
</head>
<form   id="seatAlteration" name="alterSeats[]" action="makeAlteredSeatingChart.php"  method="POST">
    <?php //***left off here...html php grab seating chart above, below display checkboxes of seats user has in form, open up to new page */

            $row =0;
            $count =0;
            $rt = array("Shared room", "Single room", "Double room", "Deluxe room");

            foreach ($s1->seats as $x){
                if($x->guest == $_SESSION['email']){

                    if($x->seatNumber == 1){
						echo "<br>".$rt[$row]."<br/>";
						$row++;
					}

                    $rowTemp = $x->table.$x->seatNumber; //use for name of cb...want to be able to see what seat is checked
                    echo $rowTemp."<input type='checkbox' name='alterSeats[]' value=$rowTemp checked ";
                    echo "<p>";
                    $count++; //use to keep track if seats for user to delete

                }
                else if($x->guest == "none") //seat empty, allow user to select
                {
                    if($x->seatNumber == 1){
						echo "<br>".$rt[$row]."<br/>";
						$row++;
					}
                    $rowTemp = $x->table.$x->seatNumber; //use for name of cb...want to be able to see what seat is checked
                    echo $x->seatNumber."<input type='checkbox' name='alterSeats[]' value='$rowTemp' "."<br>" ; //making an array of cbs?
                }
                else{ //seat taken don't allow click
                    if($x->seatNumber == 1){
						echo "<br>".$rt[$row]."<br/>";
						$row++;
					}
                    echo $x->seatNumber." X ";
                }

            } 
            if($count == 0){
                echo "no rooms to alter. go back to user dashboard.<p>";
            }

            echo "<p>";
    ?>
    <input type = "submit" value="Confirm Seats" />
</form>
<form name="homeClick" action="AlterreadEvents.php" method="POST">
					<input type = "submit" value="back" />
</form>
</html>
