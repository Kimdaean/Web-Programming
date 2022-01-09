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
<h2>글 검색</h2>
<ul>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'users_comment');
    $user_delnum = $_POST['delnum'];
    $sqldel= "DELETE FROM msg_board WHERE number = $user_delnum";
    mysqli_query($conn,$sqldel);
    $sql= "SELECT * FROM msg_board";
    $result = mysqli_query($conn,$sql);
    $list = '';
?>
</ul>
<p>
    <?php
        echo $user_delnum.'번째 글이 삭제되었습니다.';
    ?>
</p>
<p><a href='admin_users.php'>메인화면으로 이동하기</a></p>
</body>
</html>