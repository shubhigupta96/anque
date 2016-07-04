<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:index.php');
}
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- http://dev.w3.org/html5/markup/meta.name.html -->
  <meta name="application-name" content="ANQUE" />
  
  <!-- Speaking of Google, don't forget to set your site up:
       http://google.com/webmasters -->
  <meta name="google-site-verification" content="" />
  
  <!--  Mobile Viewport Fix
	j.mp/mobileviewport & davidbcalhoun.com/2010/viewport-metatag
	device-width: Occupy full width of the screen in its current orientation
	initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
	user-scalable = yes allows the user to zoom in -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ANQUE</title>
  <link rel="shortcut icon" type="image/png" href="./images/favicon.png"/>
  
  <!-- All JavaScript at the bottom, except for Modernizr which enables 
       HTML5 elements & feature detects -->
  <script src="./js/modernizr.custom.js"></script>   
  
  <!-- include stylesheets -->
  
<script src="./js/jquery.js" type="text/javascript"></script>
<script src="./js/calendar.js" type="text/javascript"></script>
<script src="./js/web2py.js" type="text/javascript"></script>
<link href="./css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="./css/bootstrap/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="./css/bootstrap/bootstrap-overrides.css" rel="stylesheet" type="text/css" />
<link href="./css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
<link href="./css/lib/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="./css/layout.css" rel="stylesheet" type="text/css" />
<link href="./css/compiled/signin.css" rel="stylesheet" type="text/css" />

<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>
  <!-- navbar -->
  <div class="navbar navbar-inverse">
    <div class="navbar-inner">
      <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    
      <a class="brand" href="./index.php">ANQUE</a>
      <ul class="nav navbar-nav pull-right">
        <li><a href="./home.php">Home</a></li>
        <li><a href="./follow.php">Follow People</a></li>
        <li><a href="./following.php">Following</a></li>
        <li><a href="./follower.php">Followers</a></li>
        <li><a href="./ask_question.php">Ask Question</a></li>
        <li><a href="./question_asked.php">Question Asked</a></li>
        <li><a href="./question_answered.php">Question Answered</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['username']  ?>
          </a>
          <ul class="dropdown-menu">
            <li><a href="./profile.php">Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="./logout.php">Sign Out</a></li>
          </ul>
        </li>
	      </ul>
    </div>
  </div>
   <!-- end navbar -->
   
   <!-- sidebar -->
   <div id="sidebar-nav">
    <center><h3>FEEDS</h3></center><br/>
    <center><h4>Popular Topics</h4></center>
     <ul id="dashboard-menu">
     <?php
       $q = "select topic.topic_id,count(*),topic_name from choose,topic where 
           topic.topic_id=choose.topic_id group by topic_name order by count(*) DESC limit 2;";
       $r = mysql_query($q, $connect);
       while($a=mysql_fetch_assoc($r))
       {
     ?>
       <li> 	
         <a href="./show_topic.php?topic_id=<?php echo $a['topic_id'] ?>">
           <i class="icon-edit"></i>
           <?php echo "<span>".$a['topic_name']." followed by ".$a["count(*)"]."</span>"; ?>
         </a>
       </li>
     <?php
       }
     ?> 
       <li>
         <a class="dropdown-toggle" href="#">
           <i class="icon-group"></i>
           <span>Developers</span>
           <i class="icon-chevron-down"></i>
         </a>
         <ul class="submenu">
           <li><a href='#'>Shubhi Gupta</a></li>
         </ul>
       </li>
     </ul>
  </div>
  <!-- end sidebar -->
  <div >

  <!-- main container -->
  <div class="content">
    <div class="row-fluid" text-align:'center'>
      <br/>
      <br/>
      <br/>
