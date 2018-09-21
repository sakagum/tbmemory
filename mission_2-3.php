<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 </head>
  <body>
   <form method="post"action="mission_2-3.php">	
   名前:<input type = "text" name="name"size=10><br>
   コメント:<input type = "text" name="comment"><br>
   <input type="submit"value="送信"><br>
   </form>
<form method="post"action="mission_2-3.php">
   削除対象番号:<input type="text" name="delete"size=5><br>
   <input type="submit"value="削除"><br>
   </form>

	<?php

	 $comment=$_POST['comment'];
	 $name=$_POST['name'];
	 $date=date("Y/m/d H:i:s");
	 $filename = "mission_2-1_sakakibara.txt";
	 $data=file_get_contents($filename);
	 
//コメントの投稿
 	  if(!empty($comment) && $name){		//$commentと$nameが空でなければ作動
		$fp=fopen($filename,'a');
		$contents=file("mission_2-1_sakakibara.txt");
		$cnt=count($contents);			//$contensの内容を5カウントする
		$cnt++;					//１からカウントする
		fwrite($fp, $cnt. "<>". $name. "<>". $comment. "<>". $date. "\n");
		fclose($fp);}				//$fpを閉じる

//削除
			$del=$_POST['delete'];
			$file=file($filename);
			if(!empty($del)){				//$delが空でなければ作動
			 $fpw=fopen($filename,"w");			//ファイルをwで開く
			 $str=str_replace($file[$del-1],'---削除されました---',$file);	//特定の文字を書き換える
			 foreach($str as $value){			//$strをループする
			if($value=="---削除されました---"){		//削除の文字に書き換えられてるものならば実行
			fwrite($fpw,$value."\n");}else{			//改行する
			fwrite($fpw,$value);}}				//$valueの中身を書き込む
			 fclose($fpw);} 				//ファイルを閉じる

//ブラウザに表示
	 $data=explode("<>", $data);
	 foreach($data as $val){
	 echo nl2br($val);}

	?>

  </body>
</html>