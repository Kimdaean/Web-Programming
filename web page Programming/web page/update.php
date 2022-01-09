<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location: login.php");
    }
    $con = mysqli_connect('localhost','root','','users_db');
    if (isset($_POST['submit'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];
   $sql = "UPDATE users SET pass='$password' WHERE name='$username'";
   if (mysqli_query($con, $sql)) {
    header("Location: login.php");
}
}
?>  
<html>
<head>
   <title></title>
</head>
<body style="text-align:center; ">
   <form method="post" action="update.php">
   <table border="2" align="center">
       <tr>
           <th colspan="2" align="center"> Update </th>
        </tr>
            <td width="100"> NAME </td>
            <td> <input type="text" name="username" > </td>
       </tr>
       <tr>
            <td width="100"> Password </td>
            <td> <input type="password" name="password" > </td>
       </tr>
       <tr>
            <td colspan="2" align="center"> <input type="submit" name="submit" value="Change" > </td>
       </tr>
   </table>
   <form>
</body>
</html>