<?php
include("admindash.php");
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> <?php 
        
        
        date_default_timezone_set("Asia/Kathmandu");  
        $h = date('G');

        if($h>=5 && $h<=11)
        {
            echo ("Good Morning Admin!");
        }
        else if($h>=12 && $h<=15)
        {
            echo ("Good Afternoon Admin!");
        }
        else
        {
            echo ("Good Evening Admin!");
        }
     
        
        ?> 
        
      </h1>
        
      </div>

      
      <h2>Questions</h2>
      <div class="row d-flex justify-content-end"> 
        <div class="col-3 d-flex justify-content-end">
            <button id="newQuestion" class="btn btn-success">New</button>
        </div>   
    </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Question</th>
              <th scope="col">Option1</th>
              <th scope="col">Option2</th>
              <th scope="col">Option3</th>
              <th scope="col">Option4</th>
              <th scope="col">Answer</th>
              <th scope="col">Entrance Type</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <?php
                
                $conn=new mysqli("localhost","root","","mcqbes");
                if($conn->connect_error)
                {
                    die("Connection Error");
                }
                $sql="Select * from test";
                $result=$conn->query($sql);
                $i=1;
                
                foreach($result as $row)
                {
                    echo("<tbody>");
                    echo"<tr>";
                    echo("<td>".$i++."</td><td>".$row['question']."</td><td>".$row['option1']."</td>");
                    echo("<td>".$row['option2']."</td><td>".$row['option3']."</td><td>".$row['option4']."</td><td>".$row['answer']."</td><td>"
                    .$row['eid']."</td>");
                   
                    echo "
                    <td>
                    <button id='".$row['id']."'class='btnUpdate btn btn-info'>Update</button>                      
                    <button id='".$row['id']."'class='btnDelete btn btn-danger'>Delete</button>
                    </td>
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


<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>


 <!-- Scripting Code for Inserting Question Starts  -->
 <script>
        $(document).ready(function(){
           
        
            $('#newQuestion').click(function(){
               $("#testmdl").modal("show");
            });
            $('#questionInsert').click(function(e){
                e.preventDefault();
                var question=$('#question').val();
                var option1=$('#option1').val();
                var option2=$('#option2').val();
                var option3 =$('#option3').val();
                var option4 =$('#option4').val();
                var answer =$('#answer').val();
                var eid =$('#entrance').val();
               
                
                $.ajax({
                    url: "phpFiles/insertQuestion.php", 
                    type:'POST',
                    data:{question:question,option1:option1,option2:option2,option3:option3,option4:option4,answer:answer,eid:eid},
                    success: function(result){
                        alert(result);
                        location.reload();
                    }
                    });
                    

            });
            /*Book Insertion Finished*/

            /*Book Update Started*/
            $('.btnUpdate').click(function(){
                var id=this.id;
                $.ajax({
                    url: "phpFiles/edit.php", 
                    type:'POST',
                    data:{id:id},
                    success: function(result){
                        var jData=JSON.parse(result);
                        
                      //  alert();
                      $('#uptquestion').val(jData[0].question);
                      $('#uptoption1').val(jData[0].option1);
                        $('#uptoption2').val(jData[0].option2);
                        $('#uptoption3').val(jData[0].option3);
                        $('#uptoption4').val(jData[0].option4);
                        $('#uptanswer').val(jData[0].answer);
                        $('#uptentrance').val(jData[0].eid);
                        $('#hidden_id').val(id);
                        $("#updatemdl").modal("show");
                    }
                    });
                
                
            });

            $('#questionUpdate').click(function(e){
                e.preventDefault();
                var question=$('#uptquestion').val();
                var option1=$('#uptoption1').val();
                var option2=$('#uptoption2').val();
                var option3 =$('#uptoption3').val();
                var option4 =$('#uptoption4').val();
                var answer =$('#uptanswer').val();
                var eid =$('#uptentrance').val();
                var id=$('#hidden_id').val(); 
                $.ajax({
                    url: "phpFiles/updatequestion.php", 
                    type:'POST',
                    data:{id:id,question:question,option1:option1,option2:option2,option3:option3,option4:option4,answer:answer,eid:eid},
                    success: function(result){
                        alert(result);
                        location.reload();
                    }
                    });
                    

            });
            /* Book Update Finished */

            /*Book Delete Started*/
            $('.btnDelete').click(function(){
                var id=this.id;         
                $('#hidden_id').val(id);
                $("#deletemdl").modal("show");
             
            });

            $('#questionDelete').click(function(e){
                e.preventDefault();
                
                var id=$('#hidden_id').val();     
                $.ajax({
                    url: "phpFiles/deletequestion.php", 
                    type:'POST',
                    data:{id:id},
                    success: function(result){
                        alert(result);
                        location.reload();
                    }
                    });
            });
            /* Book DeleteFinished */          
        });
        
    </script>
    <!-- Scripting Code for Inserting Question Details Ends  -->
    
</body>
</html>

    <!-- Modal for inserting Question Begins-->
    
    <div class="modal fade" tabindex="-1" id="testmdl">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert New Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <form action="entry.php" method="post">
                <div class="form-group">
                        <label for="Entrance">Select Entrance</label>
                        <select name="entrance" id="entrance">
                          <?php
                          $conn= new mysqli("localhost","root","","mcqbes");
                          if($conn->connect_errno!=0)
                          {
                            die("Connection Error!");
                          }
                          $sql="SELECT * FROM entrance";
                          $result=$conn->query($sql);
                          foreach($result as $row)
                          {
                            echo("
                            <option value=".$row['eid'].">".$row['name']."</option>
                            ");
                          }
                          ?>
                          
                        </select>
                    </div> <br>
                    <div class="form-group">
                        <label>
                            Question
                        </label>
                        <textarea class="form-control"   id="question" style="height: 40px" placeholder="Enter Question"></textarea>
                    </div> <br> 
                    <div class="form-group">
                        <label>
                            Option 1
                        </label>
                        <textarea class="form-control"   id="option1" style="height: 40px" placeholder="Enter Option1"></textarea>
                    </div> <br>
                    <div class="form-group">
                        <label>
                            Option 2
                        </label>
                        <textarea class="form-control"   id="option2" style="height: 40px" placeholder="Enter Option2"></textarea>
                    </div> <br>
                    <div class="form-group">
                        <label>
                            Option 3
                        </label>
                        <textarea class="form-control"   id="option3" style="height: 40px" placeholder="Enter Option3"></textarea>
                    </div> <br>
                    <div class="form-group">
                        <label>
                         Option 4
                        </label>
                        <textarea class="form-control"   id="option4" style="height: 40px" placeholder="Enter Option4"></textarea>
                    </div> <br>
                    <div class="form-group">
                        <label>
                         Correct Answer
                        </label>
                        <textarea class="form-control"   id="answer" style="height: 40px" placeholder="Enter Answer"></textarea>
                    </div> <br>
                
                    <button type="submit"id="questionInsert" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
            
            </div>
        </div>
    </div>
    <!-- Modal for Inserting Book Ends-->


      <!-- Modal for Udating Book Starts-->
      <div class="modal fade" tabindex="-1" id="updatemdl">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Question </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div><br>

                    <div class="modal-body">        
                    <form action="phpFiles/updatequestion.php" method="post">
                    <div class="form-group">
                        <label for="Entrance">Select Entrance</label>
                        <select name="entrance" id="uptentrance">
                          <?php
                          $conn= new mysqli("localhost","root","","mcqbes");
                          if($conn->connect_errno!=0)
                          {
                            die("Connection Error!");
                          }
                          $sql="SELECT * FROM entrance";
                          $result=$conn->query($sql);
                          foreach($result as $row)
                          {
                            echo("<option value=".$row['eid'].">".$row['name']."</option>");
                          }
                          ?>
                          
                        </select>
                    </div> <br>
                    <div class="form-group">
                      
                        <label>
                            Question
                        </label>
                        <textarea class="form-control"   id="uptquestion" style="height: 40px"></textarea>
                    </div> <br>

                    <div class="form-group">
                        <label>Option 1</label>
                        <textarea class="form-control"   id="uptoption1" style="height: 40px"></textarea>
                    </div> <br>   
                    <div class="form-group">
                        <label>Option 2</label>
                        <textarea class="form-control"   id="uptoption2" style="height: 40px"></textarea>
                    </div> <br>
                                        <div class="form-group">
                        <label>Option 3</label>
                        <textarea class="form-control"   id="uptoption3" style="height: 40px"></textarea>
                    </div> <br>
                    <div class="form-group">
                        <label>Option 4</label>
                        <textarea class="form-control"   id="uptoption4" style="height: 40px"></textarea>
                    </div> <br>
                    <div class="form-group">
                        <label>Correct Answer</label>
                        <textarea class="form-control"   id="uptanswer" style="height: 40px"></textarea>
                    </div> <br>
                    <input type="hidden" name="hidden_id" id="hidden_id">
                        <button type="submit" class="btn btn-primary" id="questionUpdate">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for Udating Book Ends-->


    
    <!-- Modal for Deleting Book Starts-->
    <div class="modal fade" tabindex="-1" id="deletemdl">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <img src="cross.jpg" width="auto" height="100 px" >
                    </div>
                    <h4 class="modal-title w-100">Are you sure?</h4>
                
                </div>

                    <div class="modal-body ">
                    <form  method="post">  
                    <p>Do you really want to delete these records? This process cannot be undone.</p>      
                   
                    
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <button type="submit" class="btn btn-secondary" id="cancel">Cancel</button>
                    <button type="submit" class="btn btn-danger" id="questionDelete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    
    <!-- Modal for Deleting Book Ends-->