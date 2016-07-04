<?php
session_start();
if (isset($_SESSION['username'])) {
  header('location:home.php');
} else {
include 'header_login.php';
?>
<div class="span4 box" style="height:100px">
  <div class="content-wrap">
    <div class="span6">
      <div class="btn-group" role="group" aria-label="">
        <a type="button" class="btn btn-success" href="./signin.php">Sign In</a>
      </div>
    </div>
    <div class="span5">		
      <div class="btn-group" role="group" aria-label="">
        <a type="button" class="btn btn-success" href="./signup.php">Sign Up</a>
      </div>
    </div>
  </div>
</div>
<?php
include 'footer_login.php';
}
?>
