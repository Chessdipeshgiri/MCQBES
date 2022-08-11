<?php
                $conn= new mysqli("localhost","root","","mcqbes");
                if($conn->connect_error)
                 {
                 die("Connection Error");
                }
                $name= $_POST['name'];
                $totalquestion = $_POST['totalquestion'];
                $passmarks = $_POST['passmarks'];
                $description=trim($_POST['description']);
                
                $sql="INSERT INTO `entrance`(`name`, `totalquestion`, `passmarks`,`description`) 
                VALUES ('$name','$totalquestion','$passmarks','$description')";
               

                $result =$conn->query($sql);
                if ($result) {
                    echo "Entrance inserted successfully";
                } else {
                    die(mysqli_error($conn));
                }
                
           
?>