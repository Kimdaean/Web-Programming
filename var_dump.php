<!DOCTYPE html>
<html>
<body>
<?php
$x=rand();
echo $x."<br>";
if($x%4==0){
	var_dump($x%4==0);
}elseif($x%7==0){
	var_dump($x%7==0);
}else{
	var_dump($x%4==0 or $x%7==0);
}
?>
</body>
</html>
