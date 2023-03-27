
<?php
// one.php ... creates an object via assignment and 
// and encodes as JSON, and writes to students.txt
require('event.php');
$fp = fopen("/home/mcvebm/public_html/csci322/forClientServer/theEvents.txt", 'ab');
if (!$fp) { echo "<b> could not open file<p>"; exit; }

$eventOne = new Event();
$eventOne->title = "The Greatest Show on Earth";
$eventOne->theDate = "12-25-2023";
$eventOne->seatFile = "greatestShow1225.txt";
$json = json_encode($eventOne);
fwrite ($fp, $json, strlen($json));
fwrite($fp, "\n", 1);


//echo $json;
$eventOne->title = "Sing-a-long with Rudolph";
$eventOne->theDate = "12-24-2023";
$eventOne->seatFile = "rudolph1224.txt";
$json = json_encode($eventOne);
fwrite ($fp, $json, strlen($json));
fwrite($fp, "\n", 1);
// echo $json;

fclose($fp);

?>
