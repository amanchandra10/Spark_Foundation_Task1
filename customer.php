<?php
$showerror=false;
 ?>

<?php
$con=mysqli_connect("localhost","root","","banking",);
        // $query="select * from per_info";
$query = "SELECT * FROM `per_info`;
";
$res=mysqli_query($con,$query);
        $num=mysqli_num_rows($res);
?>
<?php

$showerror="No Customers";



?>

<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./register.css">
    <link rel="stylesheet" href="./table.css">
    
</head>
<body>
<div class="head">
    <div class="head1">
    <img class="img" src="./AC-Cars copy.png" alt="">
    <h1 class="h1">A C BANK</h1>
    </div>
    <div class="head2">
    <a href="./index1.html"><button class="btn">Home</button></a>
    <button class="btn">Contact</button>
    <a href="./register2.php"><button class="btn1">LOGIN</button></a>
    <a href="./register.php"><button class="btn2">Create Account</button></a>
    </div>
</div>    
    



<h1 class="he">Customers</h1>
<?php

   if($num==0){
    echo '<h1 class="he1">'.$showerror.'</h1>';
     }

?>
<div class="main01" style="margin-top: 1rem;">
<!-- <h1 align="center">Table</h1> -->
<table border="2" align="center" class="table"  >
<tr>
     <th>Name</th>
	 <th>Gender</th>
	 <th>Email</th>
	 <th>Mobile</th>
	 <th>Address</th>
	 <th>City</th>
	 <th>State</th>
	 <th>Country</th>

	 
</tr>
<?php
while($row=mysqli_fetch_array($res))
{
?>
<tr>
    
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['gender'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['mobile'];?></td>
	<td><?php echo $row['address'];?></td>
	<td><?php echo $row['city'];?></td>
	<td><?php echo $row['state'];?></td>
	<td><?php echo $row['country'];?></td>
	
</tr>
<?php
}
?>
</table>

</div>

<div class="end">
    <div class="con">
        <h3><u>Contact Us</u></h3>
        <h4>Email:<a href="mailto:">aman2310chandra@gmail.com</a></h4>
        <h4>Contact no.:<a href="tel:+">8765432100</a></h4>
        <h4 class="my1">Made by <a class="my" href="">Aman Chandra</a> </h4>
        </div>
</div>


</body>
</html>












