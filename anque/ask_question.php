<?php
include 'header_main.php';
if ($_REQUEST["question"] and $_REQUEST["topics"]){
  $question = "insert into question(que,username) values('".$_REQUEST["question"]."','".$_SESSION["username"]."');";
  $result = mysql_query($question, $connect);

  $query = "select question_id from question where que='".$_REQUEST["question"]."'and username='".$_SESSION["username"]."'ORDER BY question_id DESC LIMIT 1;";
  $result = mysql_query($query, $connect);
  $a=mysql_fetch_assoc($result);
  $question_id = $a['question_id'];
  
  foreach ($_REQUEST['topics'] as $topic_id)
  {
    $query = "insert into que_topic values('".$question_id."','".$topic_id."');";
    $result = mysql_query($query, $connect);
  }
}
?>
<div class="span2">
</div>
<div class="span8" style="margin:10px;padding:10px 30px 10px 30px;text-align:center" >
  <h3 style="text-align:center">Ask Question</h3>
  <br/>
  <div class="row">
    <form method="post">
    <div class="input-group">
      <textarea name="question" class="form-control" aria-describedby="basic-addon1" rows="6">Question</textarea>
    </div>
   
    <div class="input-group">
      <select name="topics[]" multiple class=form-control>
        <?php
            $q = "select * from topic;";
	    $r = mysql_query($q, $connect);
	    while($a=mysql_fetch_assoc($r))
	      { 
		echo "<option value=".$a['topic_id'].">".$a['topic_name']."</option>";
	      }
        ?>
      </select>
    </div>
    <br/>   
    <div class="btn-group" role="group" aria-label="">
      <input type="submit" class="btn btn-success" value="Ask">
    </div>
    </form>
  </div>
</div>
<?php
include 'footer_main.php';
?>
