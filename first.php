<html>
<title>Terms And Conditions</title>
<head>
 <link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript"> 
        window.history.forward(); 
        function noBack() { 
        	window.alert("hgugiug");
            window.history.forward(); 
        }



      
         // function radioclick(radiovalue,qid)
         // {
         //    var xmlhttp=new XMLHttpRequest();
         //    xmlhttp.onreadystatechange=function(){
         //    	if(xmlhttp.readyState == 4 && xmlhttp.status==400)
         //    	{

         //    	}
         //    };
         //    xmlhttp.open("GET","question.php?qid="+qid+"&value1="+radiovalue+" ",true);
         //    xmlhttp.send(null);
            
         // }


    //      window.addEventListener("hashchange", function (e) {  
    //     var result = DevExpress.ui.dialog.confirm("You will be Loged out.");  
    //                 result.done(function (dialogResult) {  
    //                     if (dialogResult) {  
    //                         Application.app.navigate("");  
    //                     }  
    //                 });  
    // }) ; 






    </script> 
   



</head>
<body >





<?php
session_start();
include_once 'dbConnection.php';
$duration="";
$email=$_SESSION["email"];
$eid=$_SESSION["eid"];
$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid'");
while($row=mysqli_fetch_array($q) )
{
  $duration=$row["time"];
}
$_SESSION["duration"]=$duration;
$_SESSION["start_time"]=date("Y-m-d H:i:s");

$end_time=date('Y-m-d H:i:s',strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));
$start=$_SESSION["start_time"];
$_SESSION["end_time"]=$end_time;

$q=mysqli_query($con,"INSERT INTO timer VALUES('$start','$end_time')")or die('Error137');





if(@$_GET['q']== 'quiz' && @$_GET['step']== 200 ) {
$eid=@$_GET['eid'];
$n=@$_GET['n'];
$total=@$_GET['t'];
$email=$_SESSION["email"];

$q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error');
$q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid'");
while($row=mysqli_fetch_array($q) )
{
  $marks=$row["sahi"];
  $wrong=$row["wrong"];
  $time=$row["time"];
}
$max=$total*$marks;
if($wrong==0)
{
	$str="There will be <b>no negative</b> marks for wrong answer";
}
else
{
	$str="There will be <b>$wrong</b> negative marks for each wrong answer";
}
echo '<div class="panel" id="t&c" >
	      <div class="modal-header" style="text-align:center;">
	        <h4 class="modal-title" ><span style="color:orange;">Terms & Conditions</span></h4>
	      </div>
	      
	      <div class="modal-body">
	        <p style="color:#202020; font-size:16px">
	          1.&nbsp;&nbsp; <b>Read This carefully.</b><br>
	          2.&nbsp; &nbsp;There are total <b> '.$total.'</b> questions.<br>
	          3.&nbsp; &nbsp;There will be <b>'.$marks.'</b> marks for each question.<br>
	          4.&nbsp; &nbsp;'.$str.'.<br>
	          5.&nbsp; &nbsp;Total marks will be <b>'.$max.'</b>.<br>
	          6.&nbsp;&nbsp; You will be given <b>'.$time.'</b> minutes to complete this test.<br>
	          7.&nbsp;&nbsp; <b>You cannot switch questions during the test. Moving onto next question will automatically submit the previous answer.</b><br>
	          8.&nbsp;&nbsp; <b>Once you have submitted the answer then you cannot change the answer. So submit the answer once you are fully sure.<br>
</b>          9.&nbsp;&nbsp; Once you have started the test then you cannot leave the test until the last question.<br>
	          10.&nbsp;You can see your result once the test got over.<br>
	          11.&nbsp;You have to complete this exam with in the time limit.<br>
	          12.&nbsp;<b>You cannot use browser back button once you have started the test. It will automatically submit the test and you may be disqualified.</b><br>
              13.&nbsp;Clicking on <b>go</b> means you have accepted all the terms and conditions of this test.


	          </p>
	          <div style="height:60px; width:100%; display:flex;align-items:center;justify-content:center"><p style="color:orange;font-size:20px;"><b><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;ALL THE BEST!!!!</b>
              </p></div>
	      </div><div style=" width:100%; display:flex;align-items:center;justify-content:center">
	      <a href="first.php?q=quiz&step=21&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1"  style="margin:0px;background:orange><button style= "margin:0px;background:#f5b016;" ><b>Go</b>&emsp;<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> </button></a></div>
      </div>';
}


if(@$_GET['q']== 'quiz' && @$_GET['step']== 21 ) {
$eid=@$_GET['eid'];
$n=@$_GET['n'];
$t=@$_GET['t'];
$email=$_SESSION["email"];


	
	header("location:blank.php?q=quiz&step=21&eid=$eid&n=1&t=$t");



}
?>


</body>
</html>