<?php
session_start();
$error="";
if (isset($_SESSION['username'])) {
  header('location:home.php');
} else{
include 'connection.php';
include 'header_login.php';
if ($_REQUEST["username"] and $_REQUEST["password"] and $_REQUEST["repassword"]) {
  if($_REQUEST["password"]==$_REQUEST["repassword"]) {
   $signup = "insert into user values('".$_REQUEST["username"]."','".$_REQUEST["password"]."');";
   $result = mysql_query($signup, $connect);
   $_SESSION['username']=$_REQUEST['username'];
   header('location:home.php'); 
  } else {
    $error = "Password does not match";
  }
}
?>
<div class="span4 box">
  <div class="content-wrap">
    <h2>Sign Up</h2>
    <br/>
    <h4>
      <?php
        echo $error;
      ?>
    </h4>
    <br/>

    <form  method="post">
    <div class="input-group">
      <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group">
      <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
    </div>
    
    <div class="input-group">
      <input type="password" name="repassword" class="form-control" placeholder="Re-Password" aria-describedby="basic-addon1">
    </div>
			
    <div class="btn-group" role="group" aria-label="">
      <input type="submit" class="btn btn-success" value="Sign Up">
    </div>
    </form>
  </div>
</div>
<?php
include 'footer_login.php';
}
?>
