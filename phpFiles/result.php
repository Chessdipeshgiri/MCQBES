<?php
session_start();
$examid=$_SESSION['examid'];
$id=$_POST['id'];
$useranswers = $_POST['useranswers'];
$row=$_SESSION['registration'];
$userid=$row['userid'];


      $conn=new mysqli("localhost","root","","mcqbes");
       if($conn->connect_error)
            {
              die("Connection Error");
            }
        $sql="SELECT * FROM test WHERE id='$id'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        if($row['answer']==$useranswers)
        {
            $score=1;
        }
        else{
            $score=0;
        }
        
        $test="SELECT * FROM result WHERE examid='$examid' AND id='$id'";
        $query=$conn->query($test);
        if($query->num_rows>0){
            $test="UPDATE  result SET score='$score' WHERE examid='$examid' AND id='$id'";
        $query=$conn->query($test);
        }
        else{
            $test="INSERT INTO result( examid, id, score) 
            VALUES ('$examid','$id','$score')";
        $query=$conn->query($test);
        }
?>