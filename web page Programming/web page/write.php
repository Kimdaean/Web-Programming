<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<h1>글쓰기</h1>
<form action="insert.php" method="POST"  enctype="multipart/form-data">
	<p>
		<label for="name">제목:</label>
		<input type="text" id="name" name="name">
	</p>
	<p>
		<label for="message">메시지:</label>
	</p>
	<input type="message" id="message" name="message" style="width:300px;height:200px;">.<br>
	<br><input type="submit" value="글쓰기"><br>
       <br> File :
        <input type="file" name="image"> 
</form>
</body>
</html>