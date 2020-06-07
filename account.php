<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Profile</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

 
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 <!--alert message-->
<script>



</script>        



<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Admission Academy</span></div>
<div class="col-md-4 col-md-offset-2">
 <?php
 include_once 'dbConnection.php';
session_start();
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];
$email=$_SESSION['email'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php?q=1" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>
</div>
</div></div>
<div class="bg">

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Status</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="account.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
		
		</ul>
            <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter tag ">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Search</button>
      </form>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">

<!--home start-->
<?php if(@$_GET['q']==1) {
$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
  $_SESSION["total"]=$total;
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
  $_SESSION["eid"]=$eid;
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$s=0;
while($marks=mysqli_fetch_array($q12))
{
	$s=$marks['score'];
}
$percent=($s/$total)*100;
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="first.php?q=quiz&step=200&eid='.$eid.'&n=1&t='.$total.'&x=1" class="pull-right btn sub1"  style="margin:0px;background:orange"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else if($percent<40)
{
	echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="#"  data-toggle="modal" data-target="#attempted" class="pull-right btn sub1" style="margin:0px;background:red; color:white;"><span aria-hidden="true"></span><span class="title1"><b>Attempted</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';

}?>





<!--home closed-->

<!--quiz start-->

<?php

//result display
if(@$_GET['q']== 'result' && @$_GET['eid']) 
{
$eid=@$_GET['eid'];
$total=$_SESSION["total"];
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
echo  '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$r=$row['sahi'];
$w=$total-$r;
echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$total.'</td></tr>
      <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
	  <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
	  <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
}

$percent=round(($s/$total)*100,2);
echo '<tr style="color:#990000"><td>Percentage&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$percent.'</td></tr>';
if($percent<40)
{
	echo '<tr style="color:#bdb1b4"><td>Status&nbsp;<span class="glyphicon glyphicon-certificate" aria-hidden="true"></span></td><td>NOT QUALIFIED</td></tr>';

	echo '<tr style="color:#073d1b"><td>As you can see your percentage, You have got poor marks but you can attempt this test again. We hope you will clear this test. All the very best  !!!&nbsp;</td><td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';

	echo '<tr style="color:#073d1b"><td>You can contact us for further information. We will be happy to answer your queries.</td><td><b><a href="#" data-toggle="modal" data-target="#contactusfailed" class="pull-right btn sub1" style="margin:0px;background:#99cc32"> <span class="title1"><b>Contact us</b></span></a></b></td></tr>';
}
else
{
	echo '<tr style="color:green"><td>Status&nbsp;<span class="glyphicon glyphicon-certificate" aria-hidden="true"></span></td><td>QUALIFIED</td></tr>';

	echo '<tr style="color:#147805"><td>Congratulations !!!. Your are selected and You are going to get a Scholarship. For further details you can contact us.&nbsp;</td><td><b><a href="#" data-toggle="modal" data-target="#contactus" class="pull-right btn sub1" style="margin:0px;background:#99cc32"> <span class="title1"><b>Contact us</b></span></a></b></td></tr>';

}
echo '</table></div>';
}
?>
<!--quiz end-->
<?php
//history start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM history WHERE email='$email'  ORDER BY date DESC " )or die('Error197');
echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>S.N.</b></td><td><b>Quiz</b></td><td><b>Total Question</b></td><td><b>Percentage</b></td><td><b>Status</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$eid=$row['eid'];
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
$q23=mysqli_query($con,"SELECT title,total FROM quiz WHERE  eid='$eid' " )or die('Error208');
while($row=mysqli_fetch_array($q23) )
{
$title=$row['title'];
$total=$row['total'];
}
$c++;
$percent=($s/$total)*100;
if($percent<40)
{
	echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$percent.'</td><td style="color:red;"><b>Not Qualified</b></td></tr>';
}
else
echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$percent.'</td><td style="color:green;"><b>Qualified</b></td></tr>';
}
echo'</table></div>';
}

//ranking start
if(@$_GET['q']== 3) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['name'];
$gender=$row['gender'];
$college=$row['college'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td>';
}
echo '</table></div></div>';}
?>


<!-- attempted -->
<div class="modal fade title1" id="attempted">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Thankyou</span></h4>
      </div>
	  <div class="modal-body">
	  	 <p style="color:#202020; font-family:'typo' ;font-size:16px"> Congratulations !!! You have compeleted your test. Now You are eligible for the scholarship. We will contact you soon.<br>
         You can email us on :  <a href="mailto:admissionacademy7@gmail.com" style="color:#000000">  admissionacademy7@gmail.com</a><br><br>
		For further details:<br>
          Counsellor : &nbsp;Ms. Aanchal Goswami<br>
          &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;+91 9717185571<br><br>
          Counsellor : &nbsp;Mr. Nikhil<br>
          &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;+91 9990740498<br><br>
          Admission Manager : &nbsp;Ms. Simran kaur<br>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;+91 9717136871<br><br>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<!-- contactus notqualified -->

<div class="modal fade title1" id="contactusfailed">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Never Loose Hope</span></h4>
      </div>
	  <div class="modal-body">
	  	 <p style="color:#202020; font-family:'typo' ;font-size:16px"> We know you can do better. We are here to help you with all the details you want.<br>
         You can email us on :  <a href="mailto:admissionacademy7@gmail.com" style="color:#000000">  admissionacademy7@gmail.com</a><br><br>
		For further details:<br>
          Counsellor : &nbsp;Ms. Aanchal Goswami<br>
          &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;+91 9717185571<br><br>
          Counsellor : &nbsp;Mr. Nikhil<br>
          &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;+91 9990740498<br><br>
          Admission Manager : &nbsp;Ms. Simran kaur<br>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;+91 9717136871<br><br>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

 <!-- contactus qualified-->
<div class="modal fade title1" id="contactus">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Thankyou</span></h4>
      </div>
	  <div class="modal-body">
	  	 <p style="color:#202020; font-family:'typo' ;font-size:16px"> Congratulations !!! You have compeleted your test. Now You are eligible for the scholarship. We will contact you soon.<br>
         You can email us on :  <a href="mailto:admissionacademy7@gmail.com" style="color:#000000">  admissionacademy7@gmail.com</a><br><br>
		For further details:<br>
          Counsellor : &nbsp;Ms. Aanchal Goswami<br>
          &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;+91 9717185571<br><br>
          Counsellor : &nbsp;Mr. Nikhil<br>
          &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;+91 9990740498<br><br>
          Admission Manager : &nbsp;Ms. Simran kaur<br>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;+91 9717136871<br><br>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>



</div></div></div></div>
</body>
</html>

