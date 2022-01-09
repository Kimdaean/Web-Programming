<!DOCTYPE html>
<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'users_db');

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];
   $email = $_POST['email'];

   if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
       echo "<script> alert('Please enter all required field!')</script>";
   } else {
       $query = "SELECT * FROM users WHERE name='$username' OR email='$email' ";
       $result = mysqli_query($conn,$query);
       if (mysqli_num_rows($result) > 0) {
           header("Location: registration.php?MSG=Username:$username or E-mail:$email is already exist, please use another one!");
            } else {
                $query = "INSERT INTO users (name, pass, email) VALUES ('$username','$password','$email')";
                if (mysqli_query($conn,$query)) {
                    $_SESSION['login']=$username;
                    header("Location: content.php");
                }
            }
        }
        }

mysqli_close($conn);

?>
<html>
<head>
   <title> Registration Page </title>
</head>
<body style="text-align:center; ">
<?php
if(isset($_GET['MSG'])) {
    echo $_GET['MSG'];
}
?>
<?php
    echo "<img src = 'https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2FMjAyMTAxMzBfOTkg%2FMDAxNjEyMDE3NDM1ODMy.WEvgRMOW7AIRnKKsH6MupeuLyLpdhFHFHYgXFCumiu8g.wx1UpMText8lmpH57BH90K1p4opiYIKEZncxoMi_IRog.PNG.minyeong1781%2F%25BB%25F3%25BB%25F3%25BA%25CE%25B1%25E2_3.png&type=sc960_832' width='200' height='200'>";
?>
   <form method="post" action="registration.php">
   <table border="2" align="center" bordercolor="red"  width="500" height="250">
       <tr>
           <th colspan="2" align="center"> 등록하기 </th>
        </tr>
            <td width="100"> 이름 </td>
            <td> <input type="text" name="username" size="40" > </td>
       </tr>
       <tr>
            <td width="100"> 비밀번호 </td>
            <td> <input type="password" name="password" size="40" > </td>
       </tr>
       <tr>
            <td width="100"> 이메일 </td>
            <td> <input type="text" name="email" size="40" > </td>
       </tr>
       <tr>
            <td colspan="2" align="center"> <input type="submit" name="submit" value="Regist" style="width:120pt;height:20pt;" > </td>
       </tr>
   </table>
   <form>
    <h1>글 나눔에서의 다양한 이야기!!</h1>
    <h3>다양한 학생들과 다양한 이야기를 나누세요!!</h3>
    <a href="login.php"><b>로그인 화면으로 돌아가기</b></a>
</body>
</html>