<!DOCTYPE html>
<html>
<body>
  <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    Start Month date : <input type="text" name="start_month_date" size="10" /> <br />
    Span : <input type="text" name="span" size="3" /> <br />
    <input type="submit" name="submit" value="Print" />
</form>
<?php
$start_month_date = $_POST["start_month_date"]; //시작일을 'September 07'처럼 문자로 입력받도록 하였습니다.
$span = $_POST["span"];
$startdate=strtotime($start_month_date);
$enddate=strtotime("+$span weeks", $startdate);
while ($startdate < $enddate) {
  echo date("M d", $startdate) . "<br>";
  $startdate = strtotime("+1 week", $startdate);
}
?>
</body>
</html>
<!DOCTYPE html>
<html>
<body>
