<?php
include("dashheader.php");
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">
           <?php 
            date_default_timezone_set("Asia/Kathmandu");  
            $h = date('G');

            if($h>=5 && $h<=11)
            {
                echo ("Good Morning Student!");
            }
            else if($h>=12 && $h<=15)
            {
                echo ("Good Afternoon Student!");
            }
            else
            {
                echo ("Good Evening Student!");
            }
            ?>   
        </h1>  
      </div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h5 class="h5">
      Your Previous Tests </h5>
          </div>
      <div class="table-responsive">
      <table class="table table-success table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">MCQ TEST NAME</th>
              <th scope="col">Total Questions</th>
              <th scope="col">Total Attempts</th>
              <th scope="col">Total Score</th>
              <th scope="col">Date & Time</th>
            </tr>
          </thead>
          <?php
                
                $conn=new mysqli("localhost","root","","mcqbes");
                if($conn->connect_error)
                {
                    die("Connection Error");
                }
                $sql="SELECT * FROM exam WHERE userid='$userid' ";
                $result=$conn->query($sql);
                $i=1;
                
                foreach($result as $row)
                {
                    echo("<tbody>");
                    echo"<tr>";
                    echo("<td>".$i++."</td><td>".$row['entrance_name']."</td><td>".$row['totalquestion']."</td>");
                    echo("<td>".$row['attempts']."</td><td>".$row['marks']."</td><td>".$row['examdate']."</td>");
                   
                    echo "
                    </tr>
                    </tbody>
                    ";
                }
                ?>    
        </table>
      </div>
      

    <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2021–2022 MCQBES</p>
    <ul class="list-inline">
    <li class="list-inline-item"><a href="privacy.php">Privacy</a></li>
      <li class="list-inline-item"><a href="termofuse.php">Terms</a></li>
      <li class="list-inline-item"><a href="feedback.php">Support</a></li>
    </ul>
  </footer>
    </main>
 

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>