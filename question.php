<?php
session_start();
$qid=$_GET["qid"];
$value1=$_GET["value1"];

echo $qid ;
echo $value1;


$_SESSION["answer"][$qid]=$value1;






?>






