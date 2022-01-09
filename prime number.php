<!DOCTYPE html>
<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  num: <input type="text" name="number">
  <input type="submit">
</form>
<?php
  function isPrime($x) {
    if($x==2 or $x==3) {
      return 1;
    }
      if($x%2==0 or $x%3==0) {
      return 0;
    }
    else {
      return 1;
    }
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = htmlspecialchars($_REQUEST['number']);
    echo isPrime($x);
  }
?>
</body>
</html>
