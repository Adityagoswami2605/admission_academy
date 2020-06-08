<html>

<head>
<title>Terms And Conditions</title>
<link rel="shortcut icon" type="image/x-icon" href="image/favicon.png"/>
 <link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
 <script type="text/javascript"> 
 window.history.forward(); 
        function noBack() { 
        	
            window.history.forward(); 
        }
</script>
</head>
<body>
<?php
session_start();
include_once 'dbConnection.php';


//t&c timer
$timer=2;
$_SESSION["timer"]=$timer;
$_SESSION["start_timer"]=date("Y-m-d H:i:s");
$end_timer=date('Y-m-d H:i:s',strtotime('+'.$timer.'minutes', strtotime($_SESSION["start_timer"])));
$starttimer=$_SESSION["start_timer"];
$_SESSION["end_timer"]=$end_timer;



if(@$_GET['q']== 'quiz' && @$_GET['step']== 200 ) {
$eid=@$_GET['eid'];
$_SESSION["eid"]=$eid;
$n=@$_GET['n'];
$total=@$_GET['t'];
$_SESSION["total"]=$total;
$email=$_SESSION["email"];
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
<div  id="response" style= " font-family:  sans-serif; text-align:right; position:absolute; width:100%; top:66px;right:66; color:orange; font-size:25px "></div>
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
	          12.&nbsp;<b>Donot use browser back button once you have started the test. It will automatically submit the test and you may be disqualified.</b><br>
              13.&nbsp;<b>Attempting the test</b> means you have accepted all the terms and conditions of this test.<br>
              13.&nbsp;The test will be opened shortly.

	          </p>
	          <div style="height:60px; width:100%; display:flex;align-items:center;justify-content:center"><p style="color:orange;font-size:20px;"><b><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;ALL THE BEST !!!!</b>
              </p></div>
	      </div><div  id= "temp" style="font-family:  sans-serif; width:100%; display:flex;align-items:center;justify-content:center; color:orange; font-size:25px" ></div>';
}
?>

<script type="text/javascript">
  var refreshIntervalId=setInterval(function()
	{
      var xmlhttp=new XMLHttpRequest();
	  xmlhttp.open("GET","temp.php",false)

      xmlhttp.send(null);

      	 
         document.getElementById("response").innerHTML=xmlhttp.responseText;
         document.getElementById("temp").innerHTML=xmlhttp.responseText;
     

      setTimeout(function()
      {
      	
      	clearInterval(refreshIntervalId);
      	<?php
         $eid=$_SESSION["eid"];
         $total=$_SESSION["total"];
      	?>
      	 window.open("question.php?q=quiz&step=21&eid=<?php echo $eid?>&n=1&t=<?php echo $total?>","_self","");
      },((2*60)-1)*1000);




	},1000);

</script>

</body>
</html>