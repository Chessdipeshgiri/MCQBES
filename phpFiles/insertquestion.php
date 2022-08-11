<?php
                $conn= new mysqli("localhost","root","","mcqbes");
                if($conn->connect_error)
                 {
                 die("Connection Error");
                }
                $question = $_POST['question'];
                $option1 = $_POST['option1'];
                $option2 = $_POST['option2'];
                $option3 = $_POST['option3'];
                $option4 = $_POST['option4'];
                $answer = $_POST['answer'];
                $eid = $_POST['eid'];
                
            
                $sql="INSERT INTO `test`( `question`, `option1`, `option2`, `option3`, `option4`,`answer`, `eid`) 
                VALUES ('$question','$option1','$option2','$option3','$option4','$answer','$eid')";
               

                $result =$conn->query($sql);
                if ($result) {
                    echo "Question inserted successfully";
                } else {
                    die(mysqli_error($conn));
                }
                