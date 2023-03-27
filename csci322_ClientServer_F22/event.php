<?php
// This file contains the definition of class User
class Event
{
	public $title;
	public $theDate;
	public $seatFile;

	public function fillFromJSON($json)
	{
		$obj = json_decode($json);          // array
		$AAobj = json_decode($json, true);  // associative array
		// this just verifies the content ... goal is to send back to
		// php script that needs name or password or ...
		/*
		foreach ($obj  as  $value)
		{	
				echo  $value . "<br>";
		}
		echo "<p>=============<p>";
		*/
		$this->title = $obj->title; // should assign all data to the implicit parameter!
		//$this = $obj;
		$this->theDate = $obj->theDate;
		$this->seatFile = $obj->seatFile;
	}

};

?>
