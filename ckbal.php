<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
 {
    header("location:register2.php");
	exit();
 }
	$n=$_SESSION['email'];
	// echo $n;
	?>

	<?php
	$con=mysqli_connect("localhost","root","","banking",);
	// $query="select * from per_info";
	$query = "SELECT * FROM `per_info` WHERE `email`='$n';";
	$res=mysqli_query($con,$query);
    ?>
		
	<?php
	if(mysqli_num_rows($res)>0)
		{
		$row=mysqli_fetch_assoc($res);
        $name1=$row['name'];
        $_SESSION['name']=$name1;
		$_SESSION['email']=$n;
        
            
        
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
<h1 align="center" style="margin-top: 20px;">Welcome <?php echo $row['name'];?></h1>

<form  action="./showbal.php" method="post" class="form111">

<div class="n marg">
    <labal for="rs" id="a">Password</labal><br>
    <input type="password" class="p" name="pass"/><br>
    </div>

<div class="bu marg">
<button name="submit" value="submit" class="button cii ci s11">Check balance</button>
</div>

</form>
		
</div>




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






