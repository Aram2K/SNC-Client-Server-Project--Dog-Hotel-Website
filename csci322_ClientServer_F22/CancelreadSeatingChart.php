<?php
// This file will read a file with dated stored using JSON

session_start();
require('seatingChart.php');

$f = explode(' ', $_POST['canceldropDown'], 2);
$_SESSION['canceldropDownfile']= $f[0].'.txt';
$_SESSION['day']= $f[0];


@$fp = fopen("/home/adamaa/public_html/csci322/csci322_ClientServer_F22/rooms/".$_SESSION['canceldropDownfile'],'rb');
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
<form   id="seatCancelation" name="cancelSeats[]" action="makeCancelledSeatingChart.php"  method="POST">
    <?php //***left off here...html php grab seating chart above, below display checkboxes of seats user has in form, open up to new page */

            $row =0;
            $rt = [ 'A' => "Shared room"
                  , 'B' => "Single room"
                  , 'C' => "Double room"
                  , 'D' => "Deluxe room"];

            foreach ($s1->seats as $x){
                if($x->guest == $_SESSION['email']){
                    $rowTemp = $rt[$x->table]." ".$x->seatNumber; //use for name of cb...want to be able to see what seat is checked
                    echo $rowTemp."<input type='checkbox' name='cancelSeats[]' value='$rowTemp'>";
                    echo "<p>";
                    $row++; //use to keep track if seats for user to delete

                }

            } 
            if($row == 0){
                echo "no rooms to cancel. go back to user dashboard.<p>";
                echo '<a href="Book.php"> <button type="button" class="button">Back to User Dashboard</button></a>';
            }

            echo "<p>";
    ?>
    <input type = "submit" value="Cancel Seats" />
</form>
<form name="homeClick" action="CancelreadEvents.php" method="POST">
					<input type = "submit" value="back" />
</form>
</html>
