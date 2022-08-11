<?php
include("dashheader.php");
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">
          Until Next time!
        </h1>  
      </div>
      
      
      
      

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading">Your Result</h2>
    <p class="lead">
        <?php
        $conn=new mysqli("localhost","root","","mcqbes");
        if($conn->connect_error!=0)
        {
            die("Connection Error");
        }
        $query="SELECT * FROM exam ORDER BY examid DESC LIMIT 1 ";
        $results=$conn->query($query);
       foreach($results as $row){
        echo(" Test Name : ".$row['entrance_name']."<br>");
        echo(" Total Questions : 10 <br>");
        echo(" Total Attempts: ".$row['attempts']."<br>");
        echo(" Total Marks: ".$row['marks']."<br>");
       
       }
       unset($_SESSION['question']);
       unset($_SESSION['examid']);
       unset($_SESSION['entrance_name']);
       header("Refresh: 45; URL=test.php");
        ?>
    </p>
  </div>
  <div class="col-md-5">
       <img src="img/card/card.jpg" height="250" width="auto" >

      </div>
</div>

<hr class="featurette-divider">   
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