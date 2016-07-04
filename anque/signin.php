<?php
include 'connection.php';
$error="";
session_start();
if ($_REQUEST["username"]){
  $login = "select *
      from user 
      where username = '".$_REQUEST["username"]."';";
  $result = mysql_query($login,$connect);
  $req = mysql_fetch_assoc($result);
  if($req['password'] and $req['password']==$_REQUEST['password']){
    $_SESSION['username']=$_REQUEST['username'];
    header('Location:home.php');
  } else {
    $error = "Invalid Username or password";
    header('Location:signin.php');
  }
} else {
 if (isset($_SESSION['username'])) {
   header('Location:home.php');
 } else {
   include 'header_login.php';
?>
<div class="span4 box">
  <div class="content-wrap">
    <h2>Sign In</h2>
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

    <div class="btn-group" role="group" aria-label="">
      <input type="submit" class="btn btn-success" value="Sign In">
    </div>
    </form>
  </div>
</div>
<?php
  include 'footer_login.php';
}
}
?>
