<?php

if(isset($_POST['feedback']))
{
  $conn = new mysqli("localhost","root","","mcqbes");
  $feed=trim($_POST['description']);
  $username=$_POST['username'];

  
  if($conn->connect_errno!=0)
  {
    die("Connection Error");
  }

  $sql="INSERT INTO feedback (username,userfeedback) VALUES('$username','$feed')";
  $result=$conn->query($sql);
  if($result)
  {
    echo("<script>
    alert('Success, Thank you for your suggestion');
    </script>
    ");
  }
  
  else{
    echo("<script>
    alert('Error');
    </script>
    ");
  }
}
include("dashheader.php");
?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">
           Feedback Form
        </h1>  
      </div>
      <div id="countText">Total words: 0</div> <br>
      <div class="row d-flex justify-content"> 
        <form action="feedback.php" method="post">
        <div class="form-floating">
          <textarea class="form-control"   id="description" name="description"style="height: 400px"></textarea>
          <label for="description">Please Enter Your Feedback in less than 200 words Or Report a Bug</label>
         <input type="hidden" name="username" id="username" value="<?php echo($row['username']);?>">
        </div>
        <br>
      
        <button type="submit" class="btn btn-outline-success" name="feedback">Submit</button>
        </form>
      </div>
    </main>
    <footer class="my-5 pt-4text-muted text-center text-small">
    <p class="mb-1">&copy; 2021–2022 MCQBES</p>
    <ul class="list-inline">
    <li class="list-inline-item"><a href="privacy.php">Privacy</a></li>
      <li class="list-inline-item"><a href="termofuse.php">Terms</a></li>
      <li class="list-inline-item"><a href="feedback.php">Support</a></li>
    </ul>
  </footer>
  </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script>
  const textArea = document.getElementById('description');
textArea.addEventListener('input', () => {
    var textLn =  textArea.value;
    document.getElementById('countText').innerHTML='Total words: '+getWordCount(textLn);
});

function getWordCount(str) {
     return str.trim().split(/\s+/).length;
}
</script>
</body>
</html>