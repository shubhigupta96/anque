<?php
include 'header_main.php';
if ($_REQUEST["follow"]){
  $q = "select * from choose where topic_id='".$_REQUEST["follow"]."' and username='".$_SESSION["username"]."';";
  $r = mysql_query($q, $connect);
  $a=mysql_fetch_assoc($r);
  if (!$a['topic_id'])
  {
  $follow = "insert into choose values('".$_REQUEST["follow"]."','".$_SESSION["username"]."');";
  $result = mysql_query($follow, $connect);
  }
}
else if ($_REQUEST["unfollow"]){
  $unfollow = "delete from choose where topic_id=".$_REQUEST["unfollow"]." and username='".$_SESSION["username"]."';";
  $result = mysql_query($unfollow, $connect);
}
?>
<div class="span2">
</div>
<div class="span8" style="margin:10px;padding:10px 30px 10px 30px" >
  <h3 style="text-align:center">Your Interest</h3>
  <br/>
  <div class="row">
  <?php
    $q = "select topic_name,topic.topic_id from choose, topic where choose.topic_id=topic.topic_id and username='".$_SESSION['username']."';";
    $r = mysql_query($q, $connect);
    while($a=mysql_fetch_assoc($r))
    {
  ?>
    <div class="span3">
      <a href="./show_topic.php?topic_id=<?php echo $a['topic_id'] ?>" class="thumbnail">
      <?php  echo "<img src='img/".$a['topic_name'].".png' alt=''>"; ?>
      </a>
      <center>
        <?php echo $a['topic_name']; ?>
        <br/>
        <form method="post">
          <input type="hidden" name="unfollow" value="<?php echo $a['topic_id']; ?>">
          <input type="submit" class="btn btn-info" value="Unfollow">
        </form>
      </center>
    </div>
  <?php
    }
  ?>
  </div>
  <br/>
  <br/>
  <h3 style="text-align:center">Other Topics</h3>
  <br/>
  <div class="row">

  <?php
    $q = "select * from topic where topic_id not in 
        (select topic.topic_id from choose, topic where choose.topic_id=topic.topic_id and username='".$_SESSION['username']."');";
    $r = mysql_query($q, $connect);
    while($a=mysql_fetch_assoc($r))
    {
  ?>
    <div class="span3">
      <a href="./show_topic.php?topic_id=<?php echo $a['topic_id'] ?>" class="thumbnail">
      <?php  echo "<img src='img/".$a['topic_name'].".png' alt=''>"; ?>
      </a>
      <center>
        <?php echo $a['topic_name']; ?>
        <br/>
        <form method="post">
          <input type="hidden" name="follow" value="<?php echo $a['topic_id']; ?>">
          <input type="submit" class="btn btn-success" value="Follow">
        </form>
      </center>
    </div>
  <?php
    }
  ?>
  </div>
</div>
<?php
include 'footer_main.php';
?>
