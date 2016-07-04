<?php
include 'header_main.php';
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
          <th>Questions</th>
          <th>Total Like</th>
        </tr>
      </thead>
      <tbody>
       <?php
         $q = "select * from ans where username='".$_SESSION['username']."'"; 
         $r = mysql_query($q, $connect);
         $i = 1;
         while($a=mysql_fetch_assoc($r))
         {
           echo "<tr>";
           echo "<td>".$i."</td>";
           $i = $i + 1;
           $qq = "select * from question where question_id='".$a['que_id']."';";
           $rr = mysql_query($qq, $connect);
           $aa = mysql_fetch_assoc($rr);

	   echo "<td><a href='show_question.php?que_id=".$aa['question_id']."'>".$aa['que']."</a></td>";
           $qq = "select count(*) from user_ans_like where ans_id='".$a['ans_id']."';";
           $rr = mysql_query($qq, $connect);
           $aa = mysql_fetch_assoc($rr);
           echo "<td>".$aa['count(*)']."</td>";
           echo "</tr>";
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
