  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a href="index.html" class="navbar-brand"><img src="img/white-wandw3.png" height="80px" style="margin-top: -10px"></a>
	
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
           <a href=""  class="nav-link" data-toggle="modal" data-target="#modalLoginForm" id="loginbtn">Login</a>
			</li>
        </ul>
      </div>
    </div>
  </nav>
  
  
<form action="">
<!--Login Modal -->
		<div class="modal fade" id="modalLoginForm"  role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	<div id="alert1" data-dismiss="alert"></div>
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
		
		
		
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email  <i class="fas fa-envelope prefix grey-text"></i></label>
          <input type="email" id="defaultForm-email" class="form-control validate" name="email" >
		</div>

        <div class="md-form mb-4">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password  <i class="fas fa-lock prefix grey-text"></i></label>
          <input type="password" id="defaultForm-pass" class="form-control validate" name="password" ">
             </div>

      </div>
	 
      <div class="modal-footer d-flex justify-content-center">
	  <input class="btn btn-success" type="button" onclick="userL()" value="Login">
        
      </div>
	 
    </div>
  </div>
</div>
</div> 
</form>

<div id="navLabel" style="background: blue; height: 9px"></div>
<div id="alert2" style="" data-dismiss="alert"></div>


<script type="text/javascript"> 

function userL(){
var userEmail = document.getElementById("defaultForm-email").value;
var userPassword = document.getElementById("defaultForm-pass").value;

    //document.location.href='index.php?email='+userEmail'&&password='+userPassword;
	//window.location.replace("https://www.tutorialrepublic.com/");
	
<?php 
/*
require_once('database.php');

 if(isset($_POST['email']) && isset($_POST['password'])) {
 // $email = $_POST['email'];
 //$password = $_POST['password'];
  global $db;
  
   // $password = sha1($email . $password);
    $query = '
        SELECT * FROM user
        WHERE email= :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
	
    if($valid){ 
	?>
	
	document.getElementById("alert2").style="margin-top: 60px";
 document.getElementById("alert2").className="alert alert-success alert-dismissible fade show";
 document.getElementById("alert2").innerHTML="Welcome Admin ! ";
$("#modalLoginForm").modal('hide');
var loginLink = document.getElementById("loginbtn");
loginLink.style.display="none";
	
	<?php } 
	else{ 
	
	 ?>
	 document.getElementById("alert1").className="alert alert-danger alert-dismissible fade show";
	 document.getElementById("alert1").innerHTML="wrong Email / Password";
	 $("#modalLoginForm").modal('show');
	  <?php  
	  }
  }	  
	
*/	?>


}

function placeLabel(){
  var height= document.getElementById("navbarResponsive").offsetHeight;
  //window.alert(height);
  document.getElementById("navLabel").style.marginTop=height + 'px';
}
</script>