<?php
if(isset($_POST['login']))
{
    $email=$_POST['uemail'];
    $password=$_POST['upassword'];

    $conn=new mysqli("localhost","root","","mcqbes");
    if($conn->connect_errno!=0){
        echo("Database Connectivity Error");
    }
    $sql="SELECT * FROM registration WHERE  email='$email'AND password='$password' AND usertype='student'";
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
      session_start();
      $row=$result->fetch_assoc();
      $_SESSION['registration']=$row;
       header("Location:dashboard.php");
    }
    else{
     echo("
      <script> alert(' Wrong Email Or Password');</script>");
      
    }

}
// html file is completed in lheader.php and lform.php
    include("Header&Footer/lheader.php");
    include("Login/lform.php");
  ?>
