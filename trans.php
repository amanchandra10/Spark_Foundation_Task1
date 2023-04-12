<?php
$login=false;
$showerror= false;
$incorrect= false;
$incorrectd=false;
$a="";
$insufficient=false;
$bals="";
session_start();
$emai=$_SESSION['email'];
$bal="";
date_default_timezone_set('Asia/kolkata');
$date = date("Y-m-d H:i:s");
// echo $date;
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
 {
    header("location:register2.php");
	exit();
 }
if ($_SERVER["REQUEST_METHOD"]== "POST")
 {
    

        $n=$_POST['name'];
        // echo $n;
        $g=$_POST ['mob'];
        // echo $g;
        $e=$_POST['tpass'];
        // echo $e;
        $a=$_POST['amou'];
        // echo 'hello';


        ?>

        <?php
        $con=mysqli_connect("localhost","root","","banking",);
        // $query="select * from per_info";
        $query = "SELECT * FROM `per_info` WHERE `password`='$e'AND`email`='$emai';";
        
        $res=mysqli_query($con,$query);
        $num=mysqli_num_rows($res);
        $row=mysqli_fetch_assoc($res);
        if ($num==1) {
            
        

        $names=$row['name'];
        $mobs=$row['mobile'];
    }
    else {
        $incorrect= 'Password is not correct ';
    }
    if ($num==1) {
        $query1 = "SELECT * FROM `acc_info` WHERE `name`='$names'AND`mobile`='$mobs';";

        $res1=mysqli_query($con,$query1);
        $num1=mysqli_num_rows($res1);
        $row1=mysqli_fetch_assoc($res1);
        
            
        

        $bals=$row1['balance'];

        // $mobs=$row['mobile'];
    }
        $query2 = "SELECT * FROM `acc_info` WHERE `name`='$n'AND`mobile`='$g';";
        
        $res2=mysqli_query($con,$query2);
        $num2=mysqli_num_rows($res2);
        $row2=mysqli_fetch_assoc($res2);
    if ($num2==1) {
            
        
        $balr=$row2['balance'];
    }
    else {
        $incorrectd= 'Payment detail is invalid';
    }
        ?>

        
       <?php
    $insufficient=false;   
    if ($a>$bals && $bals>0) {

        $insufficient="Insufficient Balance";
    } 
    
     
    if($num==1 && $num1==1 && $num2==1 && $incorrect==false && $incorrectd==false && $insufficient==false )
    {
        //update the balance
        $bals1=$bals-$a;
        $balr1=$balr+$a;
        $query3="UPDATE `acc_info` SET `balance` = '$bals1', `date` = NOW() WHERE `acc_info`.`mobile` = '$mobs';";
        $ress1=mysqli_query($con,$query3);
        $query4="UPDATE `acc_info` SET `balance` = '$balr1', `date` = NOW() WHERE `acc_info`.`mobile` = '$g';";
        $ress2=mysqli_query($con,$query4);

        //transection detail entery
        $status="Success";
        $con=mysqli_connect("localhost","root","","banking",);
        $query5="INSERT INTO `trans` (`form`, `To`, `rs`, `status`, `date`) VALUES ('$names', '$n', '$a', '$status', NOW());";
        mysqli_query($con,$query5);

        $_SESSION['loggedin']=true;    
        $_SESSION['name']=$names;
        $_SESSION['mob']=$mobs;


            
            
            


            
        ?>

        <?php
    }
    }

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
    



<h1 class="he"><?php if ($_SERVER["REQUEST_METHOD"]== "POST" && $num==1 && $num2==1 && $insufficient==false  )
 {  echo '₹',$a,'✅';}?></h1>
 <h1 class="he"><?php if ($_SERVER["REQUEST_METHOD"]== "POST" && $num==1 && $num2==1 && $insufficient==false )
 {  echo 'Payment Successful ';}?></h1>
<h1 class="he"><?php if ($_SERVER["REQUEST_METHOD"]== "POST" && $num==1 && $num2==1 && $insufficient==false)
 { echo 'Another ','';}?>Money Transfer</h1>
<?php
   

   
   if($incorrect){
    echo '<h1 class="he1">'.$incorrect.'</h1>';
    }
   if($insufficient==true ){
        echo '<h1 class="he1">'.$insufficient.'</h1>';
    }
   if($incorrectd){
    echo '<h1 class="he1">'.$incorrectd.'</h1>';
    } 
   if($showerror && $num==1){
    echo '<h1 class="he1">'.$showerror.'</h1>';
    }  

?>
<div class="main">
<form  action="./trans.php" method="post" class="form11">

<div class="n marg">
<labal for="acc" id="a">Name:</labal><br>
<input type="text" class="p" placeholder="Aman Chandra" name="name"/><br>
</div>

<div class="n marg">
    <labal for="mob" id="a">Mobile no.:</labal><br>
    <input type="number" class="p" name="mob"/><br>
    </div>

    <div class="n marg">
    <labal for="mob" id="a">Amount Rs:</labal><br>
    <input type="number" class="p" name="amou"/><br>
    </div>    
    


<div class="n marg">
    <labal for="rs" id="a">Password</labal><br>
    <input type="password" class="p" name="tpass"/><br>
    </div>

<div class="bu marg">
<button name="submit" value="submit" class="button cii ci s11">Send Money</button>
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











