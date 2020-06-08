<?php
 session_start();

 $from_time1=date("Y-m-d H:i:s",time());
 $to_time1=$_SESSION["end_time"];

 $timefirst=strtotime($from_time1);
 $timesecond=strtotime($to_time1);


$dur=$_SESSION["dur"]; 
$timedifference=$timesecond-$timefirst;
$dur=$dur-1;
if($timedifference<=0){
    echo "Time's Up!!  Your test is submitting...";
   
   
}
else if($timedifference<=60)
{
    echo "<b>"."Hurry up!! only few seconds left : " . gmdate("H:i:s",$timedifference)."<b>"; 
  
}
else{
    echo "<b>"."Time Left : " . gmdate("H:i:s",$timedifference)."<b>";
}

 
$session["timedifference"]=$timedifference;
$_SESSION["dur"]=$dur;

?>
