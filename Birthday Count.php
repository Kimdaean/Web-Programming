<!DOCTYPE html>
<html>
<body>
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		Birthday Month Date : <input type="text" name="birthday" size="10" /> <br />
		<input type="submit" name="submit" value="Print" />
</form>
<?php
$birthday = $_POST["birthday"]; //생일을 'September 03'처럼 문자로 입력받도록 하였습니다.
$d1=strtotime("$birthday");
$d2=ceil(($d1-time())/60/60/24);
echo "There are " . $d2 ." days until ". $birthday;
?>
</body>
</html>
