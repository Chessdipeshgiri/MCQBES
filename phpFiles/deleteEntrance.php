<?php
                $eid=$_POST['eid'];                
               $conn=new mysqli("localhost","root","","mcqbes");
                if($conn->connect_error)
                 {
                 die("Connection Error");
                }               
                $sql="DELETE FROM entrance WHERE eid='$eid'";
                $result =$conn->query($sql);
                if ($result) {
                    echo ("Entrance Deleted Successfully");
                } else {
                    echo("Error");
                }         
?>