<?php
session_start();
if(!isset($_SESSION['adminlist']))
{
    header("Location:adminlogin.php");
}
$row=$_SESSION['adminlist'];
if(isset($_POST['logout']))
{
    session_destroy();
    header("Location:index.php");  
}
?>

<html>
  <head>
    <title>Admin  Dashboard </title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="admin.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-light sticky-top  flex-md-nowrap p-0 shadow" style="background-color: #e3f2fd;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="admin.php">
    MCQBES
  </a>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="admin.php" method="post">
        <input class="btn " type="submit" value="Logout" name="logout">
      </form>
    </div>
  </div>
  
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="admin.php">
              <spanOption ather="home"></span>
              View Questions
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="entrance.php">
              <span data-feather="home"></span>
              View Entrances
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="userfeedback.php">
              <span data-feather="file"></span>
              User Feedback
            </a>
          </li>
        </ul>
      </div>
    </nav>