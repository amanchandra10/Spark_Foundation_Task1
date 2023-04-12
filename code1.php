<?php

$n=$_POST['name'];
echo $n;
$g=$_POST ['acc'];
echo $g;
$e=$_POST['mob'];
echo $e;
$p=$_POST['branch'];
echo $p;
$m=$_POST['type'];
echo $m;
$a=$_POST['rs'];
echo $a;
// $c=$_POST[''];
// echo $c;
// $st=$_POST['State'];
// echo $st;
// $coun=$_POST['Country'];
// echo $coun;

date_default_timezone_set('Asia/kolkata');
$date = date("Y-m-d H:i:s");
echo $date;
$con=mysqli_connect("localhost","root","","banking");
echo "connected";
$query="INSERT INTO acc_info(name,account_no,mobile,branch,account_type,balance,date) VALUES('$n','$g','$e','$p','$m','$a','$date')";
mysqli_query($con,$query);
echo "Data Inserted";
header("location:register2.php");


?>