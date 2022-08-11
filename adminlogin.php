<?php
if(isset($_POST['login']))
{
    $email=$_POST['uemail'];
    $password=$_POST['upassword'];
    
    $conn=new mysqli("localhost","root","","admin");
    if($conn->connect_errno!=0){
        echo("Database Connectivity Error");
    }
    $sql="SELECT * FROM adminlist WHERE  email='$email'AND password='$password' " ;
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
      session_start();
      $row=$result->fetch_assoc();
      $_SESSION['adminlist']=$row;
       header("Location:admin.php");
    }
    else{
      header("Location:adminlogin.php");
    }
}
    include("Login/adminform.php");
  ?>

 
