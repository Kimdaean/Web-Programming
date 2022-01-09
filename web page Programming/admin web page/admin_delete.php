<?php
session_start();
if (isset($_SESSION['admin_login'])) {
	$id = $_GET['id'];
	$con = mysqli_connect('localhost','root','','users_db');
	if(mysqli_query($con, "DELETE FROM users WHERE id = '$id'")) {
		header("Location: admin_users.php");
	} else {
		header("Location: admin_login.php");
	}
} else {
	header("Location: admin_login.php");
}
    $conn = mysqli_connect('localhost', 'root', '', 'users_comment');
    $user_delnum = $_POST['delnum'];
    $sqldel= "DELETE FROM msg_board WHERE number = $user_delnum";
    mysqli_query($conn,$sqldel);
    $sql= "SELECT * FROM msg_board";
    $result = mysqli_query($conn,$sql);
    $list = '';
    while($row = mysqli_fetch_array($result)) {
        $list = $list."<li>{$row['number']}:<a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>"; 
    }
    echo $list;
    mysqli_close($conn);
?>