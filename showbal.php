<?php
session_start();
$errorpass=false;

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
 {
    header("location:register2.php");
	exit();
 }

    $ckpass=$_POST['pass'];
	$n=$_SESSION['email'];
	// echo $n;
	?>

	<?php
	$con=mysqli_connect("localhost","root","","banking",);
	// $query="select * from per_info";
	$query = "SELECT * FROM `per_info` WHERE `email`='$n' AND `password`='$ckpass';";
	$res=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res)>0)
   {
    $name1=$row['name'];
    $mob1=$row['mobile'];
    $query1 = "SELECT * FROM `acc_info` WHERE `name`='$name1' AND `mobile`='$mob1';";
    ?>
		
	<?php
	
		
        $_SESSION['name']=$name1;
		$_SESSION['email']=$n;
    //     // $query="select * from per_info";
    
    $res1=mysqli_query($con,$query1);
    $row1=mysqli_fetch_array($res1);
    if($row1==1)
    {
    $bal=$row1['balance'];
    echo $bal;
    }
	?>	
<?php

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A C BANK</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./register.css">
</head>
<body>
<div class="head">
    <div class="head1">
    <img class="img" src="./AC-Cars copy.png" alt="">
    <h1 class="h1">A C BANK</h1>
    </div>
    <div class="head2">
    <a href="./index1.html"><button class="btn">Home</button></a>
    <a href="./transtatus.php"><button class="btn1">Transections</button></a>
    <a href="./logout.php"><button class="btn1">LOG OUT</button></a>
    <a href="./register.php"><button class="btn2">Create Account</button></a>
    </div>
</div>


<div class="main01">
<?php    
if(mysqli_num_rows($res)>0)
{
?>        
<h1 align="center" style="margin-top: 20px;">Welcome <?php echo $row['name'];?></h1>
<h1 align="center" style="margin-top: 20px;">Your Balance Rs. <?php echo $row1['balance'];?></h1>


		
</div>
<?php
}
else {
    $errorpass="Password is not Correct";
}
?>
<?php
if($errorpass){
    echo '<h1 class="he1">'.$errorpass.'</h1>';
}
?>



<div class="end">
    <div class="con">
        <h3><u>Contact Us</u></h3>
        <h4>Email:<a href="mailto:">aman2310chandra@gmail.com</a></h4>
        <h4>Contact no.:<a href="tel:+">8765432100</a></h4>
        <h5>Made by <a href="">Aman Chandra</a> </h5>
        </div>
</div>

</body>
</html>






