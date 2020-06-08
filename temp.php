<?php
 session_start();

 $from_time2=date("Y-m-d H:i:s",time());
 $to_time2=$_SESSION["end_timer"];
 
 $timefirst1=strtotime($from_time2);
 $timesecond1=strtotime($to_time2);


 
$timedifference1=$timesecond1-$timefirst1;
if($timedifference1<=0)
{
    echo "<b>"."Starting in : " . gmdate("H:i:s",0)."<b>";
}
else
{
    echo "<b>"."Starting in : " . gmdate("H:i:s",$timedifference1)."<b>";
}
    

?>