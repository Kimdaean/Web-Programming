<!DOCTYPE html>
<html>
<body>
<?php
$midterm= array( "Kim"=>"98","Lee"=>"34","Park"=>"55","Nam"=>"82","Choi"=>"77","Zhin"=>"68","Bae"=>"57","Yang"=>"49","Jung"=>"37","Koo"=>"28" );
foreach ($midterm as $x => $x_value) {
	echo "Student".$x."'s score is"."$x_value";
	echo "<br>";
}
?>
</body>
</html>
