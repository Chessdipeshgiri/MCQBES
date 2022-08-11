<?php
session_start();
if(!isset($_SESSION['registration']))
{
    header("Location:login.php");
}
$row=$_SESSION['registration'];
$userid=$row['userid'];

if(isset($_POST['logout']))
{
    session_destroy();
    header("Location:login.php");   
}
?>

<html>
  <head>
    <title> Dashboard </title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="admin.css" rel="stylesheet">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-light sticky-top  flex-md-nowrap p-0 shadow" style="background-color: #e3f2fd;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="dashboard.php">
    MCQBES
  </a>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="dashboard.php" method="post">
        <input class="btn " type="submit" value="Logout" name="logout">
      </form>
    </div>
  </div>
  
</header>
<!-- header ends-->
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="dashboard.php">
                <span data-feather="home"></span>
              <?php echo(" $row[username] "); ?>
            </a> 
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="test.php">
                <span data-feather="home"></span>
               Available Tests
              </a>
            </li>
             
            <li class="nav-item">
              <a class="nav-link active" href="feedback.php">
                <span data-feather="file"></span>
              Enter Your Feedback
              </a>
            </li> 
        </ul>  
      </div>
    </nav>