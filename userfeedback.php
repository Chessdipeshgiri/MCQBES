<?php
include("admindash.php");
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> <?php 
            echo ("Admin Let's Look at feedback from Students");?> 
      </h1>
        
      </div>

      
      <h2>Feedbacks</h2>
     
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">From</th>
              <th scope="col">Feedback</th>
            </tr>
          </thead>
          <?php
                
                $conn=new mysqli("localhost","root","","mcqbes");
                if($conn->connect_error)
                {
                    die("Connection Error");
                }
                $sql="Select * from feedback";
                $result=$conn->query($sql);
                $i=1;
                
                foreach($result as $row)
                {
                    echo("<tbody>");
                    echo"<tr>";
                    echo("<td>".$i++."</td><td>".$row['username']."</td><td>".$row['userfeedback']."</td>");
                    
                    echo "
                    
                    </tr>
                    </tbody>
                    ";
                }
                ?>    
        </table>
      </div>
    </main>
  </div>
</div>



</body>
</html>

    
 