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
    $user_skey = $_POST['skey'];
    $sql= "SELECT * FROM msg_board WHERE message LIKE '$user_skey%'";
    $result = mysqli_query($conn,$sql);
    $list = '';
    while($row = mysqli_fetch_array($result)) {
        $list = $list."<li>{$row['number']}:<a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>"; 
    }
    echo $list;
    mysqli_close($conn);
?>
</ul>
</body>
</html>