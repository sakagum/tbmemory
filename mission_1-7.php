<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 </head>
	<body>
		<form method="post"action="mission_1-7.php">
		<input type = "text"name="comment" ><br>
		<input type="submit"value="送信"><br>
		</form>
		
			<?php
			  
			 if(isset($_POST['comment']) && $_POST['comment']){
			 $comment=$_POST['comment'];
				
				$filename = 'mission_1-6_sakakibara.txt';
				$fp = fopen($filename,'a');
				fwrite($fp, $comment. "\n");
				fclose($fp);}
				
					$file=fopen("mission_1-6_sakakibara.txt", "r");
					if($file){
					 while($line = fgets($file)){
					 $line = nl2br($line); 
					 echo $line;
					 }
					}
					fclose($file);

			?>
				
	</body>
</html>
