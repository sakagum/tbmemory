<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 </head>
	<body>
		<form method="post"action="mission_1-6.php">
		<input type = "text"name="comment" ><br>
		<input type="submit"value="送信"><br>
		</form>
		
			<?php
			  
			 if(isset($_POST['comment']) && $_POST['comment']){
			 $comment=$_POST['comment'];
				
				$filename = 'mission_1-6.txt';
				$fp = fopen($filename,'a');
				fwrite($fp, $comment. "\n");
				fclose($fp);}
				
			 
			?>
	</body>
</html>
