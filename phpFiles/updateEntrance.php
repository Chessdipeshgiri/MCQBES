<?php

                $name = $_POST['name'];
                $totalquestion = $_POST['totalquestion'];
                $passmarks = $_POST['passmarks'];
                $description=trim($_POST['description']);
                $eid=$_POST['eid'];

               $conn=new mysqli("localhost","root","","mcqbes");
                if($conn->connect_error)
                 {
                 die("Connection Error");
                }

                $sql="UPDATE entrance
                SET name='$name',totalquestion='$totalquestion',passmarks='$passmarks',description='$description'
                WHERE eid='$eid'
                ";
                
                $result =$conn->query($sql);
                
                if ($result) {
                    echo ("Entrance Updated Successfully");
                } else {
                    echo("Error");
                }          
?>