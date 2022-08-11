<?php
include("dashheader.php");
?>

<main class="col-md-14 ms-sm-auto col-lg-10 px-md-20">
        <?php
            $eid=$_POST['eid'];
            
            $conn=new mysqli("localhost","root","","mcqbes");
            if($conn->connect_error!=0)
            {
                die("Connection Error");
            }
            $sql="SELECT * FROM entrance WHERE eid='$eid'";
            $result=$conn->query($sql);
             
        foreach($result as $row)
            {    
                echo("<br> <br>
                    <div class='col-sm-17 col-md-10 col-lg-9'>
                        <div class='card  mb-5 rounded shadow'>
                             <div class='card-header bg-light'>
                              <h5 class='card-title text-center text'>".$row['name']."</h5>
                            </div>
                            <div class='card-body'>
                              <h5>Multiple Choice Question Description</h5>
                                <h5>Total Questions(Every time the question will be Random): ".$row['totalquestion']."</h5>
                                <h5>Pass Marks: ".$row['passmarks']."</h5>
                                <h5>Description: ".$row['description']."</h5>                                  
                            </div>
                            <div class='card-footer text-right'>
                              <form method='post' action='getquestion.php'>
                                         
                                <input type='hidden' value='".$row['eid']."' name='eid'>
                                <input type='hidden' value='".$row['name']."' name='entrance_name'>
                                <input type='hidden' value='".$userid."' name='userid'>
                                <input type='submit' class='btn btn-outline-dark' name='Start' value='Start'/>
                              </form>
                            </div>
                        </div>
                    </div>
                ");
            }
        ?>    
    </main>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>