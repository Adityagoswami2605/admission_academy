<html>
<title>Questions</title>
<head>
 <link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>


<!-- <script type="text/javascript">
var TimeLimit = new Date('<?php echo date('r', $_SESSION['key']) ?>');
</script>
<script type="text/javascript">
function countdownto() {
  var date = Math.round((TimeLimit-new Date())/1000);
  var hours = Math.floor(date/3600);
  date = date - (hours*3600);
  var mins = Math.floor(date/60);
  date = date - (mins*60);
  var secs = date;
  if (hours<10) hours = '0'+hours;
  if (mins<10) mins = '0'+mins;
  if (secs<10) secs = '0'+secs;
  document.body.innerHTML = hours+':'+mins+':'+secs;
  setTimeout("countdownto()",1000);
  }

countdownto();
</script>
 -->

<script>
var seconds = 40;
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>







</head>

<body>
<span id="countdown" class="timer"></span>


<div class="container">
     <h1 class="title">Stopwatch</h1>
     <h1 id="timerLabel">00:00:00</h1>
     <input type="button" value="START" class="myButton" onclick="start()" id="startBtn">
     <input type="button" value="STOP" class="myButton" onclick="stop()">
     <input type="button" value="RESET" class="myButton" onclick="reset()">
   </div>
   <script src="timer2.js">
   	
 



   </script>


<?php
include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];

if(@$_GET['q']== 'quiz' && @$_GET['step']== 21) {

$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
echo '<div class="panel" style="margin:5%">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];
echo '<b>Question &nbsp;'.$sn.'&nbsp;::<br />'.$qns.'</b><br /><br />';
}
$q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
echo '<form action="blank.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
<br />';

while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
echo'<input type="radio" name="ans" value="'.$optionid.'">'.$option.'<br /><br />';
}
echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
//header("location:dash.php?q=4&step=2&eid=$id&n=$total");
}


// update quiz

if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$ans=$_POST['ans'];
$qid=@$_GET['qid'];
$q=mysqli_query($con,"SELECT * FROM answer WHERE qid='$qid' " );
while($row=mysqli_fetch_array($q) )
{
   $ansid=$row['ansid'];
}
if($ans == $ansid)
{
	$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " );
	while($row=mysqli_fetch_array($q) )
		{
		   $sahi=$row['sahi'];
		}
	if($sn == 1)
		{
		   $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error');
		}
	$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' ")or die('Error115');

	while($row=mysqli_fetch_array($q) )
		{
			$s=$row['score'];
			$r=$row['sahi'];
		}
	$r++;
	$s=$s+$sahi;
	$q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('Error124');

} 
else
{
	$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid' " )or die('Error129');

	while($row=mysqli_fetch_array($q) )
		{
		   $wrong=$row['wrong'];
		}
	if($sn == 1)
		{
		   $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
		}
	$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error139');
	while($row=mysqli_fetch_array($q) )
		{
			$s=$row['score'];
			$w=$row['wrong'];
		}
	$w++;
	$s=$s-$wrong;
	$q=mysqli_query($con,"UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'")or die('Error147');
}



if($sn != $total)
{
	$sn++;
	header("location:blank.php?q=quiz&step=21&eid=$eid&n=$sn&t=$total")or die('Error152');
}
else if( $_SESSION['key']!='sunny7785068889')
{
	$q=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
	while($row=mysqli_fetch_array($q) )
	{
	   $s=$row['score'];
	}

	$q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
	$rowcount=mysqli_num_rows($q);

	if($rowcount == 0)
	{
	   $q2=mysqli_query($con,"INSERT INTO rank VALUES('$email','$s',NOW())")or die('Error165');
	}
	else
	{
	   while($row=mysqli_fetch_array($q) )
		{
		   $sun=$row['score'];
		}

		$sun=$s+$sun;
		$q=mysqli_query($con,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');

	}

	header("location:account.php?q=result&eid=$eid");
}
else
{
header("location:account.php?q=result&eid=$eid");
}
}




?>
</body>
</html>