<html>
<head>
<title>Cancelation Confirmation</title>
<style>
    body{
        background-image: url('img/gr.jpg');
        background-size: 100%;
    }
</style>
</head>
<body>
    <?php
        session_start();
        require('seatingChart.php');
        $show = "/home/adamaa/public_html/csci322/csci322_ClientServer_F22/rooms/".$_SESSION['canceldropDownfile'];
        @$fp = fopen($show, 'r+');
       
        if (!$fp) //verify file opened
	    {
		    echo "<p>UNABLE TO OPEN FILE<p>";
		    exit;
	    }      

	    // grab the seating chart for that show
		$temp = fgets($fp, 3000);
		$s1 = new SeatingChart();
		$s1->fillFromJSON($temp);  //in file seatChart.php

        fclose($fp); //close file for reading

        $curSeat;
        $row =0;
        $rt = [ 'A' => "Shared room"
                , 'B' => "Single room"
                , 'C' => "Double room"
                , 'D' => "Deluxe room"];

        if(!empty($_POST['cancelSeats'])){
            // Loop to grab each seat selected
            //for each seat, concat table/seat #, seat if match seat, if so update user at that seat
            echo "For ".$_SESSION['day']." you have removed these rooms: "."<br>";
            foreach($_POST['cancelSeats'] as $seat){ 
                echo $seat."</br>";
                foreach ($s1->seats as $x){
                    $curSeat = $rt[$x->table]." ".$x->seatNumber; 
                    if($curSeat == $seat){
                        $x->guest = "none";
                    }
                }
            }

            //open event for writing and drop s1 object in...based on BMVP lab 8 -->JSON encode
            //reopen file for wiritng....truncate existing contnet, rewrite
            @$fp = fopen($show, 'w+'); 
            $json = json_encode($s1);
            fwrite ($fp, $json, strlen($json));
            fwrite($fp, "\n", 1);
            fclose($fp); //close file for reading


            //redisplay seating chart for user
            echo "<p>";
            @$fp = fopen($show, 'rb');

            $temp = fgets($fp, 3000);
		    $s1 = new SeatingChart();
		    $s1->fillFromJSON($temp);  //in file seatChart.php
	
	        fclose($fp);

            $rt = array("Shared room", "Single room", "Double room", "Deluxe room");
	        $row = 0;
            
            foreach ($s1->seats as $x){


				if($x->guest == "none") //seat empty, allow user to select
				{
					if($x->seatNumber == 1){
						echo "<br>".$rt[$row]."<br/>";
						$row++;
					}
            		$rowTemp = $x->table.$x->seatNumber; //use for name of cb...want to be able to see what seat is checked
					echo $x->seatNumber." [ ] " ; //making an array of cbs?

            	}
            	else{ //seat not avail
					if($x->seatNumber == 1){
						echo "<br>".$rt[$row]."</br>";
						$row++;
					}
            		echo $x->seatNumber." X ";
            	}
                    
            } 

        }    
        else{
            echo "No seats removed."; //go back button
        }

    ?>

<form name="returnClick" action="Book.php" method="POST">
                    <input type = "submit" value="Back to User Dashboard" />
</form>

<form name="returnClick" action="CancelreadEvents.php" method="POST">
                    <input type = "submit" value="Cancel more" />
</form>
</body>
</html>

