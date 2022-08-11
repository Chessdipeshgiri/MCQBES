<?php
include("dashheader.php");
if(isset($_POST['submit']))
{
    
    $examid=$_SESSION['examid'];
    $entrance_name=$_SESSION['entrance_name'];
    $conn=new mysqli("localhost","root","","mcqbes");
  if($conn->connect_error!=0)
  {
    die("Connection Error");
  }
    $query1="SELECT SUM(score) AS total  FROM result WHERE examid='$examid' AND score=1";
    $results=$conn->query($query1);
    if($results)
    {
        foreach($results as $rows)
        {
          $totalmarks=$rows['total'];
        }
    }
    $query="SELECT COUNT(rid) AS attempts FROM result WHERE examid='$examid'";
    $attempts=$conn->query($query);
    if($attempts)
    {
        foreach($attempts as $row2)
        {
          $totalattempts=$row2['attempts'];
        }
    }

    $query2="UPDATE `exam` SET `marks`='$totalmarks',`attempts`='$totalattempts' WHERE examid='$examid'";
    $result2=$conn->query($query2);
    header("Location:summary.php");

}
?>


<main class="col-md-14 ms-sm-auto col-lg-10 px-md-20">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">
         Multiple Choice Question TEST 
        </h1>  
</div>
    <form action="#" method="post" onsubmit="check()">
        <?php
        if(!isset($_SESSION['question']))
        {
            header("Location:test.php");
        }
            $result=$_SESSION['question'];
            
           foreach ($result as $row)
            {
                
                echo("<h3>".$row['question']."</h3>");
                echo("<h4><input class='radio' type='radio' name='o".$row['question']."' id='".$row['id']."'  value='".$row['option1']."'>   " .$row['option1']."<br> </h4>");
                echo("<h4><input class='radio' type='radio' name='o".$row['question']."' id='".$row['id']."'  value='" .$row['option2']."'> "  .$row['option2']."<br> </h4>");
                echo("<h4><input class='radio' type='radio' name='o".$row['question']."' id='".$row['id']."'  value='" .$row['option3']."'>  "  .$row['option3']."<br> </h4>");
                echo("<h4><input class='radio' type='radio' name='o".$row['question']."' id='".$row['id']."'  value='" .$row['option4']."'>  "  .$row['option4']."<br> </h4>");
                echo("<input type='hidden' id='hidden_id' name='hidden_id' value='" .$row['id']."'>");
                
                
                echo("<hr> <br>");   
            }
            
        ?>
        <button type="submit" class="btn btn-outline-success" name="submit">Submit</button>      
    </form>           
</main>
 
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script>
$('document').ready(function()
{  
    $(".radio").click(function()
    {
        var id=this.id;
        var useranswers=this.value;   
        $.ajax
        ({
            url: "phpFiles/result.php", 
            type:'POST',
            data:{id:id,useranswers:useranswers},
            success: function(result)
            {
            
            }
        });
    });
});  

</script>   
</body>
</html>

