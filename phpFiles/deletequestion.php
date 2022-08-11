<?php
                $id=$_POST['id'];                
               $conn=new mysqli("localhost","root","","mcqbes");
                if($conn->connect_error)
                 {
                 die("Connection Error");
                }               
                $sql="DELETE FROM test WHERE id='$id'";
                $result =$conn->query($sql);
                if ($result) {
                    echo ("Question Deleted Successfully");
                } else {
                    echo("Error");
                }         
?>