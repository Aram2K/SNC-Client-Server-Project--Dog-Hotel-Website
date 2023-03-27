<?php
// This file contains the definition of class Student
class SeatingChart
{
	public $name;
	public $seats;

	public function fillFromJSON($json)
	{
		//$obj = new Student();
		$obj = json_decode($json);          // array

		// TESTING ONLY
		/*echo "TESTING FROM seatChart.php and json_decode <P>";
		foreach ($obj  as  $value)
		{
			if (is_array($value) )
			{
				//echo "array of courses<br>";
				foreach ($value as $x)
					echo $x->table."  ".$x->seatNumber."  " .$x->guest."<br>";
			}
			else	
				echo  $value . "<br>";
		}
		echo "<p>=============<p>";
		*/
		// END OF TESTING ONLY
		$this->name = $obj->name; // should assign all data to the implicit parameter!
		$this->seats = $obj->seats;
	}
};
class Seat
{
	public $table;
	public $seatNumber;
	public $guest;
};
?>
