<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 </head>
  <body>
   <form method="post"action="mission_2-1.php">
   名前:<input type = "text" name="name"size=10><br>
   コメント:<input type = "text" name="comment"><br>
   <input type="submit"value="送信"><br>
   </form>

	<?php

	 $comment=$_POST['comment'];
	 $name=$_POST['name'];
	 $date=date("Y/m/d H:i:s");
	 $filename = "mission_2-1_sakakibara.txt";
	 
	 
	 

 	  if(!empty($comment) && $name){
	  $fp=fopen($filename,'a');
	  $contents=file("mission_2-1_sakakibara.txt");
	  $cnt=count($contents);
	  $cnt++;
	  fwrite($fp, $cnt. '<>'. $name. '<>'. $comment. '<>'. $date. "\n");
	  fclose($fp);}

	   $file=fopen("mission_2-1_sakakibara.txt", "r");
	   if($file){
	   while($line = fgets($file)){
	   $line = nl2br($line); 

	   echo $line;
	   }}

	?>

  </body>
</html>