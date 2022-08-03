
<!DOCTYPE html>
<html >
<head>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link rel="stylesheet" href="css/shop-homepage.css">




</head>
<body background="img/33cc52695e7d623bf1f6ca5c6c2e3f90.jpg" align="center" width="500px"style="padding: 0px; background-size: 100%; background-repeat: no-repeat; background-position: center; background-size: cover">

  

<nav class="navbar  navbar-expand-lg navbarfixed-top navbar-dark bg-primary">
<a href="Bootstrap Index.php" class="navbar-brand">  <img src="img/images.jfif" height="100px"> </a>


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-nav" >
  <span class="navbar-toggler-icon"></span>


</button>
<div class="collapse navbar-collapse" id="menu-nav">

  <ul class="navbar-nav">
  <li class="nav-item"><a href="Bootstrap Index.php" class="nav-link " href="#"> <i class="fas fa-home" style="color: white";></i>
    <!--<i class="material-icons"> home</i> !-->  Home </a></li>

  


  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="CourseToggle"
     role="button" data-toggle="dropdown"> <i class="fas fa-music" style="color: white";></i>Imusica Products</a>
<div class="dropdown-menu" aria-labelledby="CourseToggle">
  <ol class="dropdown-item" href="#" style="color: yellow">
       <li><a class="dropdown-item" href="Bootstrap Index.php">Catagory</a></li>
      
    <ul type="square">
      <li> <a class="dropdown-item" href="jazz.php">Jazz </a></li>
      <li><a class="dropdown-item" href="pop.php"> POP </a></li>
    </ul><li><a class="dropdown-item" href="acc.php">Accessories</a> </li>
      <ol type="A">
     
    </ol>
    <li><a class="dropdown-item" href="newitem.php">New items</a></li>
    <li><a class="dropdown-item" href="sale.php">Sale </a></li>
    </ol >
  </div>
</li>


  <li class="nav-item"><a href="about us.php" class="nav-link" href="#"> <i class="fas fa-address-card" style="color: white";></i>About us</a></li>
  <li class="nav-item"><a href="contact.php" class="nav-link" href="#"> <i class="fas fa-phone" style="color: white";></i>Contact</a></li>


</ul>

  <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <?php
                       if(isset($_SESSION['user'])){
                     $welcome = 'Welcome!!!'.$_SESSION['user']; ?> 
                            <!--<a class="nav-link" href="logout.php">Logout</a>-->
                          
                <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#"  id="CourseToggle"
     role="button" data-toggle="dropdown"> <i class="fas fa-music" style="color: white";></i><?php echo $welcome;?></a>
<div class="dropdown-menu" aria-labelledby="CourseToggle">
  <ul class="dropdown-item" href="#" style="color: yellow">
    <li><a class="dropdown-item" href="index4.php">Order History</a></li>
       <li><a class="dropdown-item" href="index4.php">Shopping Cart</a></li>
        <li><a class="dropdown-item" href="logout.php">Logout</a></li></ul>
<?php }

else{

?>

            <a class="nav-link" data-toggle="modal"data-target="#modalLoginForm" id="loginbtn" href="#">Login</a>
            <li class="nav-item">
            <a class="nav-link"  data-toggle="modal"data-target="#modalLoginForm2" id="regisbtn" href="#">Register</a>
          
          <?php } ?>

</li>


      
    </ul>
</div>

</nav>

<form action="Bootstrap Index.php" method="POST" style="border:1px solid #ccc; margin-top: -17px"> 

<div class="modal fade" id="modalLoginForm" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times; </span>
        </button>
      </div>

      <div class="modal-body mx-3">
        <div class="md-form mb-4">
          <div class="input-group">
          <div class="input-group-prepend">
  <span class="input-group-text" ><i class="far fa-envelope"></i></span>
</div>
          <input type="email" id="defaultForm-email" name="email" class="form-control validate">
        </div>
          <label data-error=" wrong" data-success="right" for="defaultForm-email">Email Address</label>
        </div>
      
  <div class="md-form mb-4">
          <div class="input-group">
          <div class="input-group-prepend">
  <span class="input-group-text" ><i class="far fa-key"></i></span>
</div>
          <input type="password" id="defaultForm-pass" name="password" class="form-control validate">
        </div>
          <label data-error=" wrong" data-success="right" for="defaultForm-pass">Password</label>
        </div>
<div id="alert1" data-dismiss="alert"></div>

  
    
</div>

      <div class="modal-footer d-flex justify-content-center">

        <button class="btn btn-success" onclick="userLogin()">Login</button>

      </div>

    </div>
  </div>
</div>
</form>

<!-- try offsetHeight -->
  <!--  <script>
      // ajaxValidate
      function ajaxValidate(inputEmail){
        if (inputEmail == "") {
              document.getElementById("ajaxUsername").innerHTML = "";
              return;
          } else { 
              if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp = new XMLHttpRequest();
              } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("ajaxUsername").innerHTML = this.responseText;
                  }
              };
              xmlhttp.open("GET","getUser.php?q=" + inputEmail, true);
              xmlhttp.send();
          }
      }     
    </script>-->


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="border:1px solid #ccc; margin-top: -17px">
  <div class="modal fade" id="modalLoginForm2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label id="email"><b>Email</b></label>
    <input type="text" class="form-control" value="<?php echo $email; ?>" onblur="ajaxValidate(this.value)" placeholder="Enter Email" name="email" required> <span id="ajaxUsername"></span>
    <span class="help-block"><?php echo $email_err; ?></span>

    <label id="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required class="form-control" value="<?php echo $password; ?>">
    <span class=""><?php echo $password_err; ?></span>

    <label id="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Repeat Password" name="confirm_password" required class="form-control" value="<?php echo $confirm_password; ?>">
      <span class=""><?php echo $confirm_password_err; ?></span>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" onclick="userLogin()"class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</div>
</div>
</div>
</form>













<div id="alert2" style="margin-top" data-dismiss="alert"></div>
<!--
<script>
  
  function userLogin()
  {
    var userEmail = document.getElementById("defaultForm-email").value;
    var userPassword = document.getElementById("defaultForm-pass").value;

    if(userEmail !="admin@admin" && userPassword !="123")
    {
      document.getElementById("alert1").className="alert alert-danger alert-dismissible fade show";
      document.getElementById("alert1").innerHTML="wrong Email or password"
    }
else{
  document.getElementById("alert2").className="alert alert-success alert-dismissible fade show";
      document.getElementById("alert2").innerHTML="welcome admin"
      $("#modalLoginForm").modal('hide');
      $("#modalLoginForm2").modal('hide');
      var loginLink= document.getElementById("loginbtn");
      var regLink= document.getElementById("registbtn");
      loginLink.style.display="none";
      regLink.style.display="none";
}

  }


  function placeLabel(){
    var height=document.getElementById("mynav").offsetHeight;

    document.getElementById("navLabel").style.marginTop=height + 'px';
  }

</script>
-->

<div style="background: #0D649E; height:40px; margin-top:30px;" ><h2 style="color: #E4C252"> Imusica Online Music Store 


<form class="form-inline" action="/action_page.php" style="margin:auto;float: right;">
  <div class="input-group" >
  <input type="text" class="form-control" placeholder="Search" name="search2">
  <div class="input-group-append">
  <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
</div>
</div>
</form>
</h2>


