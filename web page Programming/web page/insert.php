<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-sclae=1.0">
    <title>insert</title>
</head>
<body>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'users_comment');
$user_name=$_POST['name'];
$user_msg=$_POST['message'];
$sql = "INSERT INTO msg_board (name,message) VALUES ('$user_name','$user_msg')";
$result = mysqli_query($conn,$sql);  
    $con = mysqli_connect("localhost","root","","my_db") or die(mysqli_connect_error());
    $olds = mysqli_query($con, "SELECT * FROM images");
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
mysqli_close($conn);
print"<hr/><a href='content.php'>메인화면으로 이동하기</a>"
?>