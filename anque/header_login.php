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
<link href="./css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="./css/bootstrap/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="./css/bootstrap/bootstrap-overrides.css" rel="stylesheet" type="text/css" />
<link href="./css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
<link href="./css/lib/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="./css/layout.css" rel="stylesheet" type="text/css" />
<link href="./css/compiled/signin.css" rel="stylesheet" type="text/css" />

  
<style>
.login-bg {
  background: url("./img/background.jpg") no-repeat center center fixed;
  filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="./img/background.jpg", sizingMethod='scale');
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; 
}

body{
    background-repeat: no-repeat;
}
</style >
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body class="login-bg">
  <div>
    <div class="flash"></div>
      <div class="row-fluid login-wrapper">
        <a href="https://twitter.com/">
          <img class="logo" src="./img/quora.png">
        </a>

