<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
<section class="vh-100">
  <div class="container py-2 h-75">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="img/logoin.jfif"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form action="adminlogin.php" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0 text">
                     
                      <img src="img/logo/m1.png" width="100" height="auto">
                   
                      </span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Admin Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="email" name="uemail" class="form-control form-control-lg" />
                    <label class="form-label" for="ueamil">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="upassword" class="form-control form-control-lg" />
                    <label class="form-label" for="upassword">Password</label>
                  </div>

                  <div class="d-grid gap-2  mb-4">
                    <button class="btn btn-outline-info" type="submit" name="login">Log In</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>

