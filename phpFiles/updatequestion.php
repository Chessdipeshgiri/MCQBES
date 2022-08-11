<?php

   
                $question = $_POST['question'];
                $option1 = $_POST['option1'];
                $option2 = $_POST['option2'];
                $option3 = $_POST['option3'];
                $option4 = $_POST['option4'];
                $answer = $_POST['answer'];
                $eid = $_POST['eid'];
                $id=$_POST['id'];
                
               $conn=new mysqli("localhost","root","","mcqbes");
                if($conn->connect_error)
                 {
                 die("Connection Error");
                }
           
                
                $sql="UPDATE test
                SET question='$question',option1='$option1',
                option2='$option2',option3='$option3',option4='$option4',answer='$answer',eid='$eid'
                WHERE id='$id'
                ";
                
           

                $result =$conn->query($sql);
                
                if ($result) {
                    echo ("Question Updated Successfully");
                } else {
                    echo("Error");
                }
            
                
           
?>

