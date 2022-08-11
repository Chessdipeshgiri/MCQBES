<?php
include("dashheader.php");
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Choose an Entrance </h1>
        
      </div>

      <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Five Tips to Ace Your Multiple Choice Exams. <span class="text-muted">Let's Start Shall We?.</span></h2>
        <p class="lead">
        1. Read the questions carefully. <br>
        2. Answer the question without looking at the options <br>
        3. Eliminate the incorrect options<br>
        4. Answer all the questions<br>
        5. Manage your time <br>
        </p>
      </div>
      <div class="col-md-5">
       <img src="img/card/card.jpg" height="250" >

      </div>
    </div>
       <br>

      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Total Questions</th>
              <th scope="col">Pass Marks</th>
              <th scope="col">Description</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <?php
                
                $conn=new mysqli("localhost","root","","mcqbes");
                if($conn->connect_error)
                {
                    die("Connection Error");
                }
                $sql="Select * from entrance";
                $result=$conn->query($sql);
                $i=1;
                
                foreach($result as $row)
                {
                    echo("<tbody>");
                    echo"<tr>";
                    echo("<td>".$i++."</td><td>".$row['name']."</td><td>".$row['totalquestion']."</td><td>".$row['passmarks']."</td><td>".$row['description']."</td>");
                    echo("
                    <td>
                    <form action='testlist.php' method='post'>
                    <button type='submit' class='btnStart btn btn-outline-success' name='btnStart'>Start</button>
                    <input type='hidden' value='".$row['eid']."' name='eid'>                    
                    </td>
                    </form>
                    </tr>
                    </tbody>
                    ");
                }
                ?>    
        </table>
      </div>
    </main>
  </div>
</div>
  

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>

          
                    
            