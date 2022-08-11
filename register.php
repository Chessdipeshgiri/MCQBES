<?php
if(isset($_POST['register']))
{ 
    $conn= new mysqli("localhost","root","","mcqbes");
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    
    if($conn->connect_errno!=0)
    {
       die("Connection Error"); 
    }

    $sql="INSERT INTO registration(username, email, password, cpassword) VALUES ('$username','$email','$password','$cpassword)";

$result=$conn->query($sql);
    if($result)
    {
header("Location:login.php");
    } 
    else {
        echo('<script>Please Use a Differnet username or Email </script>');
    }
}



include("Header&Footer/head.php");
include("Register/registerform.php");
?>
   