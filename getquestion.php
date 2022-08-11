<?php
    if(isset($_POST['Start']))
        {
            $eid=$_POST['eid'];
            $entrance_name=$_POST['entrance_name'];
            $userid=$_POST['userid'];
            
 
            $conn=new mysqli("localhost","root","","mcqbes");
            if($conn->connect_error!=0)
            {
                die("Connection Error");
            }
            $sql="SELECT * FROM `test`  WHERE eid='$eid' ORDER BY RAND() LIMIT 10 ;";
            $result=$conn->query($sql);

            $res=array();
            while($row=$result->fetch_assoc())
            {
                array_push($res,$row);
            }

            // if start is pressed a new examid is made in database
            $query1="INSERT INTO `exam`(`eid`, `userid`,`entrance_name`) VALUES ('$eid','$userid','$entrance_name')";
            $result1=$conn->query($query1);

            $query2="SELECT * FROM exam ORDER BY examid DESC LIMIT 1 ";
            $result2=$conn->query($query2);
            $e=$result2->fetch_assoc();
            $examid=$e['examid'];


            session_start();
            $_SESSION['question']=$res;
            $_SESSION['examid']=$examid;
            $_SESSION['entrance_name']=$entrance_name;
           

            header("Location:teststart.php"); 
        }
?>