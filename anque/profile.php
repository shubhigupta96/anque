<?php
include 'header_main.php';
?>
<div class="span2">
</div>
<div class="span8" style="margin:10px;padding:10px 30px 10px 30px" >
  <div class="panel panel-default">
    <!-- Table -->
    <table class="table">
      <tbody>
        
        <tr>
	  <td style="text-align:left">Name</td>
          <?php
	    echo "<td style='text-align:left'>".$_SESSION['username']."</td>";
	  ?>
        </tr>
        
	<tr>
	  <td style="text-align:left">Question Asked</td>
          <?php
             $q = "select count(*) from question where username='".$_SESSION['username']."';"; 
             $r = mysql_query($q, $connect);
             $a=mysql_fetch_assoc($r);
	     echo "<td style='text-align:left'>".$a['count(*)']."</td>";
	  ?>
        </tr>
        
	<tr>
	  <td style="text-align:left">Question Answerd</td>
          <?php
             $q = "select count(*) from ans where username='".$_SESSION['username']."';"; 
             $r = mysql_query($q, $connect);
             $a=mysql_fetch_assoc($r);
	     echo "<td style='text-align:left'>".$a['count(*)']."</td>";
	  ?>
        </tr>
        
	<tr>
	  <td style="text-align:left">Following</td>
          <?php
             $q = "select count(*) from follow where follower='".$_SESSION['username']."';"; 
             $r = mysql_query($q, $connect);
             $a=mysql_fetch_assoc($r);
	     echo "<td style='text-align:left'>".$a['count(*)']."</td>";
	  ?>
        </tr>
	
        <tr>
	  <td style="text-align:left">Followed By</td>
          <?php
             $q = "select count(*) from follow where following='".$_SESSION['username']."';"; 
             $r = mysql_query($q, $connect);
             $a=mysql_fetch_assoc($r);
	     echo "<td style='text-align:left'>".$a['count(*)']."</td>";
	  ?>
        </tr>
        
	<tr>
	  <td style="text-align:left">Topics Followed</td>
          <?php
             $q = "select count(*) from choose where username='".$_SESSION['username']."';"; 
             $r = mysql_query($q, $connect);
             $a=mysql_fetch_assoc($r);
	     echo "<td style='text-align:left'>".$a['count(*)']."</td>";
	  ?>
        </tr>

      </tbody>
    </table>
  </div>
</div>
<?php
include 'footer_main.php';
?>
