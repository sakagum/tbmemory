<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 </head>
  <body>

	<?php

	 $comment=$_POST['comment'];
	 $name=$_POST['name'];
	 $date=date("Y/m/d H:i:s");
	 $filename = "mission_2-1.txt";
	 $data=file_get_contents($filename);
	 $file=file($filename);
	 
//コメント
 	  if(!empty($comment) && $name){		//$commentと$nameが空でなければ作動
		$cnt=count($file);			//$contensの内容をカウントする
		$cnt++;					//１からカウントする
		$con=$cnt. "<>". $name. "<>". $comment. "<>". $date. "\n";
		$fp=fopen($filename,'a');
		fwrite($fp,$con);
		fclose($fp);}				//$fpを閉じる


//削除
			$del=$_POST['delete'];
			if(!empty($del)){				//$delが空でなければ作動
			 $fpw=fopen($filename,"w");			//ファイルをwで開く
			 $str=str_replace($file[$del-1],"削除されました<>",$file);	//特定の文字を書き換える
			 foreach($str as $value){
			//$strをループする
			if($value=="削除されました<>"){		//削除の文字に書き換えられてるものならば実行
			fwrite($fpw,$value."\n");}else{			//改行する
			fwrite($fpw,$value);}}				//$valueの中身を書き込む
			 fclose($fpw);} 				//ファイルを閉じる

//編集
				$ed=$_POST['edit'];
				if(isset($ed)){					//$edが数字であれば作動
				$sep=explode("<>",$file[$ed-1]);		//指定した行数だけ区切る
				$st=rtrim($file[$ed-1]);		//文末の改行の消去
				 if(!($st=="削除されました<>")){	//削除されたコメントでない場合作動
				 $hi=$ed;
				 $na=$sep[1];	//名前を取り出す
				 $co=$sep[2];	//コメントを取り出す
				}}	
				
					if($_POST['hidd']){			//もしhiddが送信されたら
					$hide=$_POST['hidd'];
					$con=$hide. "<>". $name. "<>". $comment. "<>". $date. "\n";
					$re=str_replace($file[$hide-1],$con,$file);//編集したい行を書き換える
					$fpw=fopen($filename,"w");		//ファイルをwで開く
					 foreach($re as $val){			//$reをループする
					 fwrite($fpw, $val);}	
					 fclose($fpw);
					unset($hi);}				//編集要因を消す

	?>

<form method="post"action="mission_2-4.php">	
名前:<input type = "text" name="name"size=10 value="<?php echo $na; ?>"><br>
コメント:<input type = "text" name="comment" value="<?php echo $co; ?>"><br>
<input type="hidden" name="hidd" value="<?php echo $hi; ?>">
<input type="submit"value="送信"><br>
</form>


<form method="post"action="mission_2-4.php">
削除対象番号:<input type="text" name="delete"size=5><br>
<input type="submit"value="削除"><br>
</form>

<form method="post"action="mission_2-4.php">
編集対象番号:<input type="text" name="edit"size=5 ><br>
<input type="submit"value="編集"><br>
</form>

<?php
//ブラウザに表示
	 $data=explode("<>", $data);
	 foreach($data as $val){
	 echo nl2br($val);}
?>

  </body>
</html>
