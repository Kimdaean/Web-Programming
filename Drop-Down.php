<!DOCTYPE html>
<html>
<body>
<form action="" method="post">
  <select name="time[]">
    <option value="Asia/Seoul">Seoul</option>
    <option value="America/New_York">London</option>
    <option value="Europe/Paris">Paris</option>
  </select>
  <input type="submit" name="submit" value="Submit" />
</form>
  <?php
if(isset($_POST['submit'])) {
  if(!empty($_POST['time'])) {
    foreach ($_POST['time'] as $selected) {
      date_default_timezone_set("$selected");
      echo "The time is " . date("h:i:sa");
    }
}
}
?>
</body>
</html>
