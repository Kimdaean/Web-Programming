<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-sclae=1.0">
</head>
<body>
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
    <a href="logout.php"><b>로그아웃</b></a><br>
    <a href="update.php"><b>비밀번호 바꾸기</b></a>
</body>
</html>