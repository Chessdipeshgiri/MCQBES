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

      
      <h2>Entrance</h2>
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
                    <button id='".$row['eid']."' class='btnUpdate btn btn-info'>Update</button>                      
                    <button id='".$row['eid']."' class='btnDelete btn btn-danger'>Delete</button>
                    </td>
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


 <!-- Scripting Code for Inserting Question Starts  -->
 <script>
        $(document).ready(function(){
           
        
            $('#newQuestion').click(function(){
               $("#testmdl").modal("show");
            });
            $('#questionInsert').click(function(e){
                e.preventDefault();
                var name=$('#name').val();
                var totalquestion=$('#totalquestion').val();
                var passmarks=$('#passmarks').val();
                var description=$('#description').val();
               
                
                $.ajax({
                    url: "phpFiles/insertEntrance.php", 
                    type:'POST',
                    data:{name:name,totalquestion:totalquestion,passmarks:passmarks,description:description},
                    success: function(result){
                        alert(result);
                        location.reload();
                    }
                    });
                    

            });
            /*Book Insertion Finished*/

            

            /*Book Delete Started*/
            $('.btnDelete').click(function(){
                var eid=this.id;         
                $('#hidden_id').val(eid);
                $("#deletemdl").modal("show");
             
            });

            $('#questionDelete').click(function(e){
                e.preventDefault();
                
                var eid=$('#hidden_id').val();
                alert(eid);      
                $.ajax({
                    url: "phpFiles/deleteEntrance.php", 
                    type:'POST',
                    data:{eid:eid},
                    success: function(result){
                        alert(result);
                        
                        location.reload();
                    }
                    });
                    

            });
            /* Book DeleteFinished */            
          /*Book Update Started*/
          $('.btnUpdate').click(function(){
                var eid=this.id;
                               
                $.ajax({
                    url: "phpFiles/editEntrance.php", 
                    type:'POST',
                    data:{eid:eid},
                    success: function(result){
                        var jData=JSON.parse(result);
                        
                      
                      $('#uptname').val(jData[0].name);
                      $('#upttotalquestion').val(jData[0].totalquestion);
                        $('#uptpassmarks').val(jData[0].passmarks);
                        $('#uptdescription').val(jData[0].description);
                        $('#hidden_id').val(eid);
                        $("#updatemdl").modal("show");
                    }
                    });
            });

            $('#questionUpdate').click(function(e){
                e.preventDefault();
                var name=$('#uptname').val();
                var totalquestion=$('#upttotalquestion').val();
                var passmarks=$('#uptpassmarks').val();
                var description=$('#uptdescription').val();
                var eid=$('#hidden_id').val();
                
               
                $.ajax({
                    url: "phpFiles/updateEntrance.php", 
                    type:'POST',
                    data:{eid:eid,name:name,totalquestion:totalquestion,passmarks:passmarks,description:description},
                    success: function(result){
                        alert(result);
                        location.reload();
                    }
                    });
                    

            });
            /* Book Update Finished */  
            

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
                <h5 class="modal-title">Insert New Entrance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <form action="entrance.php" method="post">
                <div class="form-group">
                        <label>
                            Name
                        </label>
                        <input type="text" class="form-control" placeholder="Enter  Entrance Name" id="name" autocomplete="off">
                    </div> <br>
                    <div class="form-group">
                        <label>
                            Total question
                        </label>
                        <input type="number" class="form-control" placeholder="Enter  Total No Of Questions" id="totalquestion" autocomplete="off">
                    </div> <br>
                    <div class="form-group">
                        <label>
                            Pass Marks
                        </label>
                        <input type="number" class="form-control" placeholder="Enter Pass Marks" id="passmarks" autocomplete="off">
                    </div> <br>
                    <div class="form-group">
                        <label>
                            Description
                        </label>
                        <textarea class="form-control"   id="description" name="description"style="height: 40px" placeholder="Enter description For the entrance"></textarea>
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
                    <h5 class="modal-title">Update Entrance </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div><br>

                    <div class="modal-body">        
                    <form action="phpFiles/updateEntrance.php" method="post">
                    <div class="form-group">
                        <label>
                           Name
                        </label>
                        <input type="text" class="form-control"  id='uptname' autocomplete="off">
                    </div> <br>

                    <div class="form-group">
                        <label>Total Question</label>
                        <input type="number" class="form-control" id="upttotalquestion" autocomplete="off">
                    </div> <br>   
                    <div class="form-group">
                        <label>Pass Marks</label>
                        <input type="number" class="form-control" id="uptpassmarks" autocomplete="off">
                    </div> <br>
                    <div class="form-group">
                        <label>
                            Description
                        </label>
                        <textarea class="form-control"   id="uptdescription" style="height: 40px"></textarea>
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
    