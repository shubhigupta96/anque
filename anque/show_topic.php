<?php
include 'header_main.php';
?>
<div class="span2">
</div>
<div class="span8" style="margin:10px;padding:10px 30px 10px 30px;text-align:center" >
  <?php
    if($_REQUEST['topic_id'])
    {
      $qq = "select * from topic where topic_id='".$_REQUEST['topic_id']."';";
      $rr = mysql_query($qq, $connect);
      $aa = mysql_fetch_assoc($rr);
      echo "<h3 style='text-align:center'>".$aa['topic_name']."</h3>";
  ?>
  <br/>
  <br/>
  <!-- Table -->
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Questions</th>
        <th>Total Answers</th>
      </tr>
    </thead>
    <tbody>
      <?php
         $q = "select * from que_topic,question where topic_id='".$_REQUEST['topic_id']."' and que_id=question_id;"; 
         $r = mysql_query($q, $connect);
         $i = 1;
         while($a=mysql_fetch_assoc($r))
         {
           echo "<tr>";
           echo "<td>".$i."</td>";
           $i = $i + 1;
           echo "<td><a href='show_question.php?que_id=".$a['question_id']."'>".$a['que']."</a></td>";
           $qq = "select count(*) from ans where que_id='".$a['question_id']."';";
           $rr = mysql_query($qq, $connect);
           $aa = mysql_fetch_assoc($rr);
           echo "<td>".$aa['count(*)']."</td>";
           echo "</tr>";
         }
       ?>
    </tbody>
  </table>
  <br/>
  <?php
    }
  ?>
</div>
<?php
include 'footer_main.php';
?>
