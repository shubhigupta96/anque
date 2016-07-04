<?php
include 'header_main.php';
if ($_REQUEST["answer"])
{
  $qq = "select * from ans where que_id='".$_REQUEST['que_id']."' and username='".$_SESSION['username']."';";
  $rr = mysql_query($qq, $connect);
  $aa=mysql_fetch_assoc($rr);
  if ($aa['que_id'])
  {
  $answer = "update ans set ans='".$_REQUEST['answer']."' where username='".$_SESSION["username"]."' and que_id='".$_REQUEST['que_id'].";";
  }
  else
  {
  $answer = "insert into ans(que_id,ans,username) values('".$_REQUEST["que_id"]."','".$_REQUEST['answer']."','".$_SESSION["username"]."');";
  }
  $result = mysql_query($answer, $connect);
}
if ($_REQUEST["like"])
{
  $like = "insert into user_ans_like values('".$_SESSION["username"]."','".$_REQUEST["answer_id"]."');";
  $result = mysql_query($like, $connect);
}
if ($_REQUEST["unlike"])
{
  $unlike = "delete from user_ans_like where username='".$_SESSION["username"]."' and ans_id='".$_REQUEST["answer_id"]."';";
  $result = mysql_query($unlike, $connect);
}
?>
<div class="span2">
</div>
<div class="span8" style="margin:10px;padding:10px 30px 10px 30px;text-align:center" >
  <?php
    if($_REQUEST['que_id'])
    {
      $qq = "select * from question where question_id='".$_REQUEST['que_id']."';";
      $rr = mysql_query($qq, $connect);
      $aa = mysql_fetch_assoc($rr);
      echo "<h3 style='text-align:center'>".$aa['que']."</h3>";
  ?>
  <br/>
  <br/>
  <!-- Table -->
  <table class="table">
    <tbody>
  <?php
      $qq = "select ans,ans.ans_id as ans_id from ans left join user_ans_like on user_ans_like.ans_id = ans.ans_id where que_id=".$_REQUEST['que_id']." group by ans.ans_id order by count(*) DESC;";
      $rr = mysql_query($qq, $connect);
      while($aa=mysql_fetch_assoc($rr))
      {
        echo "<tr>";
        $qqq = "select count(*) from user_ans_like where ans_id='".$aa['ans_id']."' ;";
        $rrr = mysql_query($qqq, $connect);
        $aaa = mysql_fetch_assoc($rrr);
        echo "<td style='text-align:center'>";
        echo "Likes : ".$aaa['count(*)'];
        echo "<br/>";
        $qqq = "select * from user_ans_like where ans_id='".$aa['ans_id']."' and username='".$_SESSION['username']."' ;";
        $rrr = mysql_query($qqq, $connect);
        $aaa = mysql_fetch_assoc($rrr);
  ?>
        <form  method='post'>
        <div class="input-group">
          <input type="hidden" name="que_id" class="form-control" aria-describedby="basic-addon1" value="<?php echo $_REQUEST['que_id']?>">
        </div>
        <div class="input-group">
          <input type="hidden" name="answer_id" class="form-control" aria-describedby="basic-addon1" value="<?php echo $aa['ans_id']?>">
        </div>
        <div class='btn-group' role='group' aria-label=''>
       <?php
        if ($aaa['ans_id'])
          echo "<input type='submit' name='unlike' class='btn btn-info' value='UnLike'>";
        else 
          echo "<input type='submit' name='like' class='btn btn-success' value='Like'>";
        echo "</div>";
        echo "</form>";
        echo "</td>";
        
        if ($aa['username'] == $_SESSION['username'])
        {
    ?>
    <td style='text-align:center'>
    <form method="post">
    <div class="input-group">
      <textarea name="answer" class="form-control" aria-describedby="basic-addon1" rows="6">Answer</textarea>
    </div>
    <div class="input-group">
      <input type="hidden" name="que_id" class="form-control" aria-describedby="basic-addon1" value="<?php echo $_REQUEST['que_id']?>">
    </div>
    <br/>   
    <div class="btn-group" role="group" aria-label="">
      <input type="submit" class="btn btn-success" value="Update">
    </div>
    </form>
    </td>
    <?php
        }
        else
        {
          echo "<td style='text-align:center'>".$aa['ans']."</td>";
        }
        echo "</tr>";
      }


  ?>
    </tbody>
  </table>
  <br/>
  <?php
      $qq = "select * from ans where que_id='".$_REQUEST['que_id']."' and username='".$_SESSION['username']."';";
      $rr = mysql_query($qq, $connect);
      $aa=mysql_fetch_assoc($rr);
      if(! $aa['que_id'])
      {
  ?>
  <div class="row">
    <form method="post">
    <div class="input-group">
      <textarea name="answer" class="form-control" aria-describedby="basic-addon1" rows="6">Answer</textarea>
    </div>
    <div class="input-group">
      <input type="hidden" name="que_id" class="form-control" aria-describedby="basic-addon1" value="<?php echo $_REQUEST['que_id']?>">
    </div>
    <br/>   
    <div class="btn-group" role="group" aria-label="">
      <input type="submit" class="btn btn-success" value="Answer">
    </div>
    </form>
  </div>
  <?php
      }
    }
  ?>
</div>
<?php
include 'footer_main.php';
?>
