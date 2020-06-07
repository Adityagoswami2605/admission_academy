<html>
<title>Questions</title>
<head>
 <link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
 <script>
  window.history.forward(); 
        function noBack() { 
        	window.alert("hgugiug");
            window.history.forward(); 
        }
  </script> 
 
</head>

<body>

<?php
session_start();
include_once 'dbConnection.php';
$email=$_SESSION['email']; 

if(@$_GET['q']== 'quiz' && @$_GET['step']== 21) {

$eid=@$_GET['eid'];
$_SESSION["eid"]=$eid;
$sn=@$_GET['n'];
$total=@$_GET['t'];
$_SESSION["total"]=$total;


$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
echo '<div  id=response style= " font-family:  sans-serif; text-align:right; position:absolute; width:100%; top:25px;right:66; color:orange; font-size:25px "></div>';
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
echo'<input type="radio"  name="ans" value="'.$optionid.'">&nbsp;'.$option.'<br /><br />';
}
if($sn==$total)
{
echo'<br><button style=" background:red;" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;End Test</button></form></div>';
}
else
{
	echo'<br><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
}


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
	// if($sn == 1)
	// 	{
	// 	   $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error');
	// 	}
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
	// if($sn == 1)
	// 	{
	// 	   $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
	// 	}
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



<script type="text/javascript">
  var refreshIntervalId=setInterval(function()
	{
      var xmlhttp=new XMLHttpRequest();
	  xmlhttp.open("GET","response.php",false)

      xmlhttp.send(null);

      	 
      	 document.getElementById("response").innerHTML=xmlhttp.responseText;
     

      <?php 
      $duration=$_SESSION["duration"];
      ?>
      var timeleft="<?php echo $duration?>";
      setTimeout(function()
      {
      	
      	clearInterval(refreshIntervalId);
      	<?php
         $eid=$_SESSION["eid"];
         $total=$_SESSION["total"];
        
      	?>
      	window.open("account.php?q=result&eid=<?php echo $eid?>","_self","");
      },((timeleft*60))*1000);




	},1000);

</script>




</body>
</html>