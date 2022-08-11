<?php
if(isset($_POST['update']))
{
    $email=$_POST['uemail'];
    $old=$_POST['oldpassword'];
    $new=$_POST['newpassword'];

   
    $conn=new mysqli("localhost","root","","mcqbes");
    if($conn->connect_errno!=0){
        echo("Database Connectivity Error");
    }
    
    $sql="UPDATE registration SET password='$new' WHERE email='$email' AND cpassword='$old'AND usertype='student'";
    $result=$conn->query($sql);
    if($result)
    {
        echo("<h1>Password Changed</h1>");
    }else{
       
        echo
        ("
            <script>
            alert('Please provide proper Information'); 
            </script>'
         ");
        
    }
}

include("Header&Footer/lheader.php");
include("Update/updateform.php");
?>