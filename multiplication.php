<!DOCTYPE html>
<html>
<body>
<?php
$x=0;
while ($x<=9) {
	if ($x++) {
		echo "<br>";
	}
	for($y=1;$y<=9;$y++) {
	echo $x."X".$y."=".$x*$y. "  ";
}
}
?>
</body>
</html>
