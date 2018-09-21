<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 </head>
  <body>

	<?php

	$comment=$_POST['comment'];
	$name=$_POST['name'];
	$pas=$_POST["pass"];

	 $date=date("Y/m/d H:i:s");
	 $filename = "mission_2-5_sakakibara.txt";
	 $data=file_get_contents($filename);
	 $file=file($filename);
	 $filep=file($filename);

//コメント
if(empty($_POST["hidd"])){
 	  if(!empty($comment) && $name && $pas){		//$commentと$nameが空でなければ作動
		$cnt=count($file);			//$contensの内容をカウントする
		$cnt++;					//１からカウントする
		$con=$cnt. "<>". $name. "<>". $comment. "<>". $date."<>".$pas."<>"."\n";
		$fp=fopen($filename,'a');
		fwrite($fp,$con);
		fclose($fp);				//$fpを閉じる
	}
}

//削除

$pd=$_POST["pasd"];
if(!empty($pd)){
foreach($filep as $val){
$p=explode("<>",$val);
if($p[4]==$pd){

			$del=$_POST['delete'];
			if(!empty($del)){		//$delが空でなければ作動
			$fp=fopen($filename,"w");	//ファイルをｗで開く
			 foreach($file as $val){	//$fileをループさせる
			 $b=explode("<>",$val);		
			  if($b[0]==$del){		//指定された番号の場合作動
			  fwrite($fp,"削除"."\n");}	//削除と書き込む
			  else{				//そうでなければ
			 fwrite($fp,$val);}}		//そのまま書き込む
			fclose($fp);}			//ファイルを閉じる
}}}
//編集

$pe=$_POST["pase"];
if(!empty($pe)){
foreach($filep as $val){
$p=explode("<>",$val);
if($p[4]==$pe){

				$ed=$_POST['edit'];
				if(isset($ed)){			//$edが数字であれば作動
				 foreach($file as $val){		//$fileをループさせる
				 $b=explode("<>",$val);		
				  if($b[0]==$ed){			
				  $hi=$ed;			//編集モードに切り替え
				  $na=$b[1];			//名前を取り出す
				  $co=$b[2];}			//コメントを取り出す
				}}

				if($_POST['hidd']){			//もしhiddが送信されたら
				$hide=$_POST['hidd'];
				$con=$hide. "<>". $name. "<>". $comment. "<>". $date."<>".$pas."<>". "\n";
				$fp=fopen($filename,"w");	//ファイルをｗで開く
				 foreach($file as $val){	//$fileをループさせる
				 $b=explode("<>",$val);		
				  if($b[0]==$hide){		//指定された番号の場合作動
				  fwrite($fp,$con);}
				  else{				//そうでなければ
				 fwrite($fp,$val);}}		//そのまま書き込む
				fclose($fp);
				unset($hi);}				//編集要因を消す
}}}
	?>

<form method="post"action="mission_2-5.php">	
名前:<input type = "text" name="name"size=10 value="<?php echo $na; ?>"><br>
コメント:<input type = "text" name="comment" value="<?php echo $co; ?>"><br>
パスワードを決める:<input type="text" name="pass"><br>
<input type="text" name="hidd" value="<?php echo $hi; ?>">
<input type="submit"value="送信"><br><br>
</form>


<form method="post"action="mission_2-5.php">
削除対象番号:<input type="text" name="delete"size=5><br>
パスワードの確認:<input type="text" name="pasd" ><br>
<input type="submit"value="削除"><br><br>
</form>


<form method="post"action="mission_2-5.php">
編集対象番号:<input type="text" name="edit"size=5 ><br>
パスワードの確認:<input type="text" name="pase"><br>
<input type="submit"value="編集"><br><br>
</form>

<?php
//ブラウザに表示

$fp=fopen($filename,"r");
 while(!feof($fp)){
 $fi=fgets($fp);
 $ex=explode("<>",$fi);
 $come=($ex[0].$ex[1].$ex[2].$ex[3].$ex[5]);
 echo nl2br($come);}
?>

  </body>
</html>