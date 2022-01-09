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

   if (empty($_POST['username'])) {
       echo "<script> alert('Please enter your name!')</script>";
   }
   if (empty($_POST['password'])) {
        echo "<script> alert('Please enter your password!')</script>";
   }

   $query = "SELECT name, pass FROM users WHERE name='$username' AND pass='$password' ";
   $result = mysqli_query($conn,$query);
   if ( mysqli_num_rows($result) > 0 ) {
       $_SESSION['login']=$username;
       header("Location: content.php");
   } else {
       echo "Wrong username or password !";
   }

mysqli_close($conn);
}
echo "<img src = 'https://search.pstatic.net/common/?src=http%3A%2F%2Fpost.phinf.naver.net%2FMjAyMTA2MTBfNjQg%2FMDAxNjIzMzA5MTA1NDEw.UCwtsFKh1A-KXGIFCi2os5Hg-tH6kKATG0avA-mDIAMg.Re8nTFpcpopCiRW1Y2y3R-I_4SCMWqcMNTF-WoQg59cg.PNG%2FI8P47frALoqxofhTm--sC9esr_ro.jpg&type=sc960_832' width='200' height='200'>";
?>
<html>
<head>
   <title> Login Page </title>
</head>
<body style="text-align:center; ">
    <h1>한성대학교 글 나눔</h1>
   <form method="post" action="login.php">
   <table border="2" align="center" width="500" height="250">
       <tr>
           <th colspan="2" align="center"> Login </th>
        </tr>
            <td width="100"> 이름 </td>
            <td> <input type="text" name="username" size="40" > </td>
       </tr>
       <tr>
            <td width="100"> 비밀번호 </td>
            <td> <input type="password" name="password" size="40" > </td>
       </tr>
       <tr>
            <td colspan="2" align="center"> <input type="submit" name="submit" value="Login" style="width:120pt;height:20pt;"> </td>
       </tr>
   </table>
   <form>
    <h2> 아직 가입 안하셨나요? <a href="registration.php"> 등록하기 </a></h2>
</body>
</html>