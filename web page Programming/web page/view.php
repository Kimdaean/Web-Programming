<?php
$conn = mysqli_connect('localhost', 'root', '', 'users_comment');
$view_num = $_GET['number'];
$sql= "SELECT * FROM msg_board WHERE number = $view_num";
$result = mysqli_query($conn,$sql);
$con = mysqli_connect("localhost","root","","my_db") or die(mysqli_connect_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<h1>게시판</h1>
<h2>글 내용</h2>
<?php
if($row = mysqli_fetch_array($result)) {
?>
<h3>글번호: <?= $row['number'] ?>  / 제목: <?= $row['name'] ?> </h3>
<div>
<?= $row['message'] ?><br>
<br>
</div>
<?php } ?>
<?php   
    $con = mysqli_connect("localhost","root","","my_db") or die(mysqli_connect_error());
    if(isset($_POST['submit'])) {
       if(empty($_FILES['image']['name'])) {
          echo "<h2>Please select an image.</h2>";
       } else {
          $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
          $image_name = addslashes($_FILES['image']['name']);
          $image_size = getimagesize($_FILES['image']['tmp_name']);
          if($image_size == FALSE) {
             echo "<h2>That's not an image.</h2>";
             } else {
             $sql = "INSERT INTO images VALUES (NULL,'$image_name','$image_data')" ;
             if ( !mysqli_query($con,$sql) ) {
                 echo "Problem in uploading image !." . mysqli_error($con);
             } else {
                echo "<h2> Newly uploaded Image : $image_name </h2>";
               echo "<img width='250' height='200' src='get.php?name=$image_name'>";
            }
         }
      }
   }
   ?>
<p><a href='content.php'>메인화면으로 이동하기</a></p>
</body>
</html>