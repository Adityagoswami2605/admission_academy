<html>
<title>questions</title>
<head>
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
if(@$_GET['q']== 'quiz' && @$_GET['step']== 21 ) {
    $eid=@$_GET['eid'];
    $n=@$_GET['n'];
    $t=@$_GET['t'];
    $email=$_SESSION["email"];
    $duration="";
    $q=mysqli_query($con,"SELECT * FROM quiz WHERE eid='$eid'");
    while($row=mysqli_fetch_array($q) )
    {
    $duration=$row["time"];
    }
    $duration=$duration;
    $dur=$duration; 
    $dur=$dur*60;
    $_SESSION["dur"]=$dur;
    $_SESSION["duration"]=$duration;
    $_SESSION["start_time"]=date("Y-m-d H:i:s");
    $end_time=date('Y-m-d H:i:s',strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));
    $start=$_SESSION["start_time"];
    $_SESSION["end_time"]=$end_time;


         $q=mysqli_query($con,"DELETE FROM `history` WHERE eid='$eid' AND email='$email' " )or die('Error184');
         $q=mysqli_query($con,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error');
  
        
        ?>
        <script>
        window.open("blank.php?q=quiz&step=21&eid=<?php echo $eid?>&n=1&t=<?php echo $t?>","_self","");
        </script>
        <?php
        
}

?>
</body>
</html>





