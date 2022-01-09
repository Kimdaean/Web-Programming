<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['admin_login'])) {
		header("Location: admin_login.php");
	}
	$con = mysqli_connect('localhost','root','','users_db');
	$all = mysqli_query($con, "SELECT * FROM users");
?>
<html>
<head></head>
<body>
	<h1> 관리자 페이지 </h1>
	<table border="2">
		<tr><th>id</th><th>name</th><th>password</th><th>E-mail</th><th>Delete?</th></tr>
		<?php
			while ($one = mysqli_fetch_array($all)) {
				echo "<tr>";
					echo "<td>".$one['id']."</td>";
					echo "<td>".$one['name']."</td>";
					echo "<td>".$one['pass']."</td>";
					echo "<td>".$one['email']."</td>";
					echo "<td><a href='admin_delete.php?id=".$one['id']."'>delete</a></td>";
				echo "</tr>";
			}
		?>
	</table>
<h1>게시판</h1>
<h2>글 목록</h2>
<ul>
<?php
    $conn_users = mysqli_connect('localhost', 'root', '', 'users_db');
    $sql_users = "SELECT * FROM users";
    $result_users = mysqli_query($conn_users,$sql_users);
    $conn_comment = mysqli_connect('localhost', 'root', '', 'users_comment');
    $sql_comment = "SELECT * FROM msg_board";
    $result_comment = mysqli_query($conn_comment,$sql_comment);
    $list_comment = '';
    while($row_comment = mysqli_fetch_array($result_comment)) {
        $list_comment = $list_comment."<li>{$row_comment['number']}:<a href=\"view.php?number={$row_comment['number']}\">{$row_comment['name']}</a></li>"; 
    }
    echo $list_comment;
?>
</ul>
<hr>
<p><a href="write.php">글쓰기</a></p>
<hr>
<h2>글 검색</h2>
<form action="search.php" method="POST">
    <h3>검색할 키워드를 입력하세요.</h3>
    <p>
        <label for="searh">키워드:</label>
        <input type="text" if="search" name="skey">
    </p>
    <input type="submit" value="검색">
</form>
<hr>
<h2>글 삭제</h2>
<form action="admin_delete_comment.php" method="POST">
    <h3>삭제할 메시지 번호를 입력하세요.</h3>
    <p>
        <label for="msgdel">번호:</label>
        <input type="text" if="msgdel" name="delnum">
    </p>
    <input type="submit" value="삭제"><br> 
    <hr>   
    <a href="admin_logout.php"><b>로그아웃</b></a><br>
    <a href="admin_update.php"><b>회원 비밀번호 바꾸기</b></a>
</body>
</html>
	