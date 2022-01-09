<!DOCTYPE html>
<?php
	session_start();
	$con = mysqli_connect('localhost','root','','users_db');
	if(isset($_POST['submit'])) {
		$adminname = $_POST['name'];
		$adminpass = $_POST['pass'];
		$one = mysqli_query($con,"SELECT name, pass FROM admin WHERE name = '$adminname' AND pass = '$adminpass'");
		if (mysqli_num_rows($one) > 0) {
			$_SESSION['admin_login'] = $adminname;
			header("Location: admin_users.php");
		} else {
			header("Location: admin_login.php");
		}
		mysqli_close($con);
	}
	echo "<img src = 'https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2FMjAyMDA5MTZfMjY2%2FMDAxNjAwMjQ2MzQ5Mjc3.ObtY7vHNYBWM3Qe7ByfGasU9f7tQxh_Dkb1MUnUbrLIg.rEOYF9RPi-CU3BEj_iwqRZifTP5fDPsUzc0E263_9Ukg.JPEG.futurepluss%2Fp6kIo01N_400x400.jpg&type=sc960_832' width='200' height='200'>";
?>
<html>
<head></head>
<body style="text-align:center; ">
    <h1>한성대학교 글 나눔 관리자 페이지</h1>
	<form action="admin_login.php" method="POST" width="500" height="250">
		<table border="2" align="center">
			<tr><th colspan="2">Admin Login</th></tr>
			<tr><td>Admin Name</td><td><input type="text" name="name" size="40"></td></tr>
			<tr><td>Admin Pass</td><td><input type="password" name="pass" size="40"></td></tr>
			<tr align="center"><td colspan="2"><input type="submit" name="submit" value="Admin Login" style="width:120pt;height:20pt;"></td></tr>
		</table>
	</form>
</body>