<!DOCTYPE html>
<html >
<head>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link rel="stylesheet" href="css/shop-homepage.css">




</head>
<body background="img/showcase.jpg" align="center" width="500px"style="padding: 0px; background-size: 100%; background-repeat: no-repeat; background-position: center; background-size: cover">

  

<nav class="navbar  navbar-expand-lg navbarfixed-top navbar-dark bg-primary">
<a href="Bootstrap Index.html" class="navbar-brand">  <img src="img/images.jfif" height="100px"> </a>


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-nav" >
  <span class="navbar-toggler-icon"></span>


</button>
<div class="collapse navbar-collapse" id="menu-nav">

  <ul class="navbar-nav">
  <li class="nav-item"><a href="Bootstrap Index.html" class="nav-link " href="#"> <i class="fas fa-home" style="color: white";></i>
    <!--<i class="material-icons"> home</i> !-->  Home </a></li>

  


  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="CourseToggle"
     role="button" data-toggle="dropdown"> <i class="fas fa-music" style="color: white";></i>Imusica Products</a>
<div class="dropdown-menu" aria-labelledby="CourseToggle">
  <ol class="dropdown-item" href="#" style="color: yellow">
       <li><a class="dropdown-item" href="#">Catagory</a></li>
      
    <ul type="square">
      <li> <a class="dropdown-item" href="#">Jazz </a></li>
      <li><a class="dropdown-item" href="#"> POP </a></li>
    </ul><li><a class="dropdown-item" href="#">Accessories</a> </li>
      <ol type="A">
      <li> <a class="dropdown-item" href="#">Headsets</a> </li>
      <li> <a class="dropdown-item" href="#">Zipsters</a></li>
    </ol>
    <li><a class="dropdown-item" href="#">New items</a></li>
    <li><a class="dropdown-item" href="sale.html">Sale </a></li>
    </ol >
  </div>
</li>


  <li class="nav-item"><a href="about us.php" class="nav-link" href="#"> <i class="fas fa-address-card" style="color: white";></i>About us</a></li>
  <li class="nav-item"><a href="contact.php" class="nav-link" href="#"> <i class="fas fa-phone" style="color: white";></i>Contact</a></li>


</ul>

  <ul class="navbar-nav ml-auto">
<li class="nav-item ">
      <?php 
        if (!empty($welcome))
        {
          echo $welcome;
      ?>
        <a class="nav-link"  data-toggle="modal" data-target="#modalLoginForm" id="loginbtn" href="#">Logout</a>
      <?php
        }
        else{
      ?>
            <a class="nav-link"  data-toggle="modal" data-target="#modalLoginForm" id="loginbtn" href="#">Login</a>
      
          </li>
           <li role="separator" class="divider"></li>
            <li class="nav-item">
            <a class="nav-link"  data-toggle="modal"data-target="#modalLoginForm2" id="regisbtn" href="#">Register</a>
            <?php
        }
      ?>
          </li>
      
    </ul>
</div>

</nav>

