<html>
<head>
<title> View your Reservations </title>
<style>
    body{
        background-image: url('img/a.jpg');
        background-size: 80%;
    }
</style>
</head>
<body>
<?php
session_start();
require('seatingChart.php');
require('event.php');

    echo 'View reservations for '.$_SESSION['email'].' <br />';
    echo "<p>";
    @$fp = fopen("/home/adamaa/public_html/csci322/csci322_ClientServer_F22/theEvents.txt",'rb');

    if (!$fp)
    {
	    echo "<p>UNABLE TO OPEN FILE 1<p>";
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

    $count = 0;
    $overallCount = 0;
    $rt = [ 'A' => "Shared room"
                , 'B' => "Single room"
                , 'C' => "Double room"
                , 'D' => "Deluxe room"];
    foreach ($all as $s) {
        @$fp = fopen("/home/adamaa/public_html/csci322/csci322_ClientServer_F22/rooms/".$s->title.".txt", 'rb');
        if(!$fp){
            echo "<p>UNABLE TO OPEN FILE 2<p>";
		    exit;
        }

        // Only one seating chart per file ... no loop needed 
		$temp = fgets($fp, 3000);
		$s1 = new SeatingChart();
		$s1->fillFromJSON($temp);  //in file seatChart.php
	    fclose($fp);

        echo "<br> Your seats for ".$s->title.": <br>";
        foreach($s1->seats as $x){
            if($x->guest == $_SESSION['email']){
                $seat = $rt[$x->table].' '.$x->seatNumber;
                echo $seat."<br>";
                $count++;
            }
        }

        if($count == 0){
            echo "none. <br>";
        }
        $count = 0; //reset var for next event
    }

?>

<form name="returnClick" action="Book.php" method="POST">
                    <input type = "submit" value="Back to User Dashboard" />
</form>

</body>
</html>