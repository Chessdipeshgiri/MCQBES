<form action="register.php" method="post" onsubmit="validate()">
<div class="container p-4">
    <h1 class="security-title">
      Join Now — It’s Free & Easy!
    </h1>
    
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
           <input type="text" name="username" class="form-control" required>
          </div>
      </div>
  
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label" required>Email</label>
        <div class="col-sm-10">
          <input type="email" name="email" class="form-control" >
        </div>
    </div>
  
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label" required>Password</label>
        <div class="col-sm-10">
          <input type="password" name="password" id="password" class="form-control" >
        </div>
      </div>

    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label" required> Confirm Password</label>
        <div class="col-sm-10">
        <input type="password" name="cpassword" id="cpassword" class="form-control" >
        </div>
    </div>

    
    
        <div class="d-grid gap-2 col-6 mx-auto p-4" >
        <button class="btn btn-outline-info" type="submit" name="register">Register</button>
        </div>
        

</div>
</form>
<script>
  function validate(){
  var password=document.getElementById("password");
  var cpassword=document.getElementById("cpassword");
  if(password.value.length<8)
{
alert("Password Length must be greater than 8 letters");
}
  if(password != cpassword){
    alert("Password must match with Confirm Password");
  }
  if(password.value=="password"){
    alert("Choose a Suitable Password");
  }
}
</script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>