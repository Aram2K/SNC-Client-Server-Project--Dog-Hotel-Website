<?php
// This file contains the definition of class User
class User
{
	public $firstName;
	public $lastName;
	public $email;
	public $password;

	public function fillFromJSON($json)
	{
		//$obj = new Student();
		$obj = json_decode($json);          // array
		$AAobj = json_decode($json, true);  // associative array
		// this just verifies the content ... goal is to send back to
		// php script that needs name or password or ...
		/*foreach ($obj  as  $value)
		{	
				echo  $value . "<br>";
		}
		echo "<p>=============<p>";
		*/
		$this->firstName = $obj->firstName; // should assign all data to the implicit parameter!
		$this->lastName = $obj->lastName;
		$this->email = $obj->email;
		$this->password = $obj->password;
		//$this = $obj;
	}


};

?>
