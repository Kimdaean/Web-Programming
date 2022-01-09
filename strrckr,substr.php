<!DOCTYPE html>
<html>
<body>
<?php
$x="www.example.com/public_html/index.php";
$y=strrchr($x,"/");
$z=substr($y,1);
echo $z;
?>
</body>
</html>
