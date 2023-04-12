<?php
// date_default_timezone_set('Asia/kolkata');
// function dt(){
//     date_default_timezone_set('Asia/kolkata');
//     $mysqltime = date ('Y/m/d H:i:s');
//     echo $mysqltime;
// }
// $dt = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
// $cu=  $dt->format('d/m/Y, g:i:s');
// dt();


$n=$_POST['name'];
echo $n;
$g=$_POST ['a'];
echo $g;
$e=$_POST['email'];
echo $e;
$p=$_POST['password'];
echo $p;
$m=$_POST['mob'];
echo $m;
$a=$_POST['address'];
echo $a;
$c=$_POST['city'];
echo $c;
$st=$_POST['State'];
echo $st;
$coun=$_POST['Country'];
echo $coun;

date_default_timezone_set('Asia/kolkata');
$date = date("Y-m-d H:i:s");
echo $date;
$con=mysqli_connect("localhost","root","","banking");
echo "connected";
$query="INSERT INTO per_info(name,gender,email,password,mobile,address,city,state,country,date) VALUES('$n','$g','$e','$p','$m','$a','$c','$st','$coun','$date')";
mysqli_query($con,$query);
echo "Data Inserted";
header("location:register1.php");//


?>