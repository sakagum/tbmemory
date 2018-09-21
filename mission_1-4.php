<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 </head>
	<body>
		<form method="post"action="mission_1-4.php">
		<input type = "text"name="comment" value="コメント"><br>
		<input type="submit"value="送信"><br>
		</form>
		
			<?php
			 if(isset($_POST['comment'])){
			 echo "「ご入力ありがとうございます。<br />";
			 echo date("Y年m月d日H時i分")."に". $_POST['comment']. "を受け取りました。」";}
			 
			
			 
			?>


	</body>
</html>


