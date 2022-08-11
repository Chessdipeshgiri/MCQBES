<?php

$conn=new mysqli("localhost","root","","mcqbes");
  if($conn->connect_error!=0)
  {
    die("Connection Error");
  }
    $query1="SELECT SUM(score) AS total  FROM result WHERE examid=13 AND score=1";
    $result=$conn->query($query1);
    if($result)
    {
      foreach($result as $row)
      {
        $totalscore=$row['total'];
        echo($totalscore."<br>");
      }
    }

    $query2="SELECT COUNT(id) AS totalquestion FROM result  WHERE examid=13";
    $result2=$conn->query($query2);
    if($result2)
    {
      foreach($result2 as $row)
      {
        echo($row['totalquestion']);
      }  
    }
    


    
?>