<?php
include("dashheader.php");
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">
           BCA(TU)
        </h1>  
      </div>
      <div class="row d-flex justify-content"> 
   
     <?php
     if(isset($_POST['bca']))
     {
      $conn=new mysqli("localhost","root","","mcqbes");
      if($conn->connect_errno!=0){
        echo("Database Connectivity Error");
      }

      $sql="SELECT * FROM `test`  WHERE eid=1 ORDER BY RAND() LIMIT 10 ;";
    $result=$conn->query($sql);
    foreach ($result as $bca)
    {
        echo("<br>".$bca['question']."<br>");
        echo("<br>".$bca['option1']."<br>");
        echo("<br>".$bca['option2']."<br>");
        echo("<br>".$bca['option3']."<br>");
        echo("<br>".$bca['option4']."<br>");
    }
        
    }
     ?>
      </div>
    </main>
   
  </div>
  
</div>

<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2021–2022 MCQBES</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="privacy.php">Privacy</a></li>
      <li class="list-inline-item"><a href="termofuse.php">Terms</a></li>
      <li class="list-inline-item"><a href="feedback.php">Support</a></li>
    </ul>
  </footer>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>