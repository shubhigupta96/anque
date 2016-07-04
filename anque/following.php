<?php
include 'header_main.php';
if ($_REQUEST["username"]){
  $unfollow = "delete from follow where follower='".$_SESSION["username"]."' and following='".$_REQUEST["username"]."';";
  $result = mysql_query($unfollow, $connect);
}
?>
<div class="span2">
</div>
<div class="span8" style="margin:10px;padding:10px 30px 10px 30px" >
  <div class="panel panel-default">
    <!-- Table -->
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Followers</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
       <?php
         $q = "select username from user"; 
         $r = mysql_query($q, $connect);
         $i = 1;
         while($a=mysql_fetch_assoc($r))
         {
           if ($a['username'] != $_SESSION['username']) {
             $qq = "select count(*) from follow where follower='".$_SESSION['username']."' and following='".$a['username']."';";
             $rr = mysql_query($qq, $connect);
             $aa = mysql_fetch_assoc($rr);
             if ($aa['count(*)'] != 0){
               echo "<tr>";
               echo "<td>".$i."</td>";
               $i = $i + 1;
               echo "<td>".$a['username']."</td>";
               $qq = "select count(*) from follow where following='".$a['username']."';";
               $rr = mysql_query($qq, $connect);
               $aa = mysql_fetch_assoc($rr);
               echo "<td>".$aa['count(*)']."</td>";
               echo "<td>";
               echo "<form method='post'>";
               echo "<input type='hidden' name='username' value='".$a['username']."' >";
               echo "<input type='submit' class='btn btn-info' value='Unfollow'>";
               echo "</form>";
               echo "</td>";
               echo "</tr>";
             }
           }
         }
       ?>
        <tr>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php
include 'footer_main.php';
?>
