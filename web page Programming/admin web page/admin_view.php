<?php
$conn = mysqli_connect('localhost', 'root', '', 'users_comment');
$view_num = $_GET['number'];
$sql= "SELECT * FROM msg_board WHERE number = $view_num";
$result = mysqli_query($conn,$sql);
$con = mysqli_connect("localhost","root","","my_db") or die(mysqli_connect_error());
$olds = mysqli_query($con, "SELECT * FROM images");
$all = mysqli_query($con, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-sclae=1.0">
</head>
<body>
<h1>게시판</h1>
<h2>글 내용</h2>
<?php
if($row = mysqli_fetch_array($result)) {
?>
<h3>글번호: <?= $row['number'] ?>  / 제목: <?= $row['name'] ?> </h3>
<div>
<?= $row['message'] ?>
</div>
<?php } ?>
<?php
while ( $one = mysqli_fetch_array($olds) ) {
      echo "<img src='data:image/jpeg;base64," . base64_encode($one['data']) . "' width=250 height=200 />" ;
      echo "<td><a href='admin_delete.php?id=".$one['id']."'>delete</a></td>";
   }
   mysqli_close($con);
?>
<p><a href='admin_users.php'>메인화면으로 이동하기</a></p>
</body>
</html>