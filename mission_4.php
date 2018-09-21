<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 </head>
  <body>


<?php

//サーバ接続
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);

//テーブルの作成
$sql = "CREATE TABLE sae" 
." (" 
."id INT," 
."name char(32)," 
."comment TEXT," 
."da DATETIME," 
."pass TEXT" 
.");";
$stmt = $pdo->query($sql);


/*$sql = "DROP TABLE IF EXISTS sae";
$pdo -> exec($sql);
*/

//tbtest―――っての作る
$sql = 'SHOW TABLES'; //情報を見る
$result = $pdo -> query($sql); 
 foreach ($result as $row){ echo $row[0]; 
 echo '<br>';
}
echo "<hr>";

//tbtestの情報
$sql = 'SHOW CREATE TABLE sae';
$result = $pdo->query($sql);
foreach ($result as $row){
 print_r($row);
}
echo "<hr>";

//データベース内カウント
$sql = "SELECT COUNT(*) FROM sae WHERE id";
$count = (int)$pdo->query($sql)->fetchColumn();
var_dump($count); 


//コメントの追加 datetimeがあるから、何も書き入れられない
if(!empty($_POST["name"]) && $_POST["comment"] && $_POST["pass"]){
if(empty($_POST["hidd"])){
	$sql = $pdo -> prepare("INSERT INTO sae (id,name,comment,da,pass) VALUES (:id,:name,:comment,:da,:pass)");
//INSERTは情報の追加
	$sql -> bindParam(':id',$id,PDO::PARAM_STR);	//前者のパラメータに後者の変数を入れる　STRは文字列という意味
	$sql -> bindParam(':name',$name,PDO::PARAM_STR);
	$sql -> bindParam(':comment',$comment,PDO::PARAM_STR);
$da=new Datetime();
	$sql -> bindValue(':da',$da->format('Y-m-d H:i:s'),PDO::PARAM_STR);
	$sql -> bindParam(':pass',$pass,PDO::PARAM_STR);

		$id=($count)+1 ;
		$name=$_POST["name"];
		$comment=$_POST["comment"];
		$pass=$_POST["pass"];
		$sql -> execute();	//prepareを実行　データベースに上の結果を入れている
var_dump($pass);
}}

//削除

if(!empty($_POST["pasd"])){
$sql = 'SELECT *FROM sae';
$results = $pdo->query($sql);
 foreach($results as $val){	//データベース内をループさせる
if($_POST["pasd"] == $val["pass"]){


$del=$_POST["delete"];
	if(!empty($del)){
	$sql = "UPDATE sae SET id=$del , name='' , comment='削除しました' WHERE id = $del";
	$result=$pdo->query($sql);
}}}}

//$sql="delete from tbtest where comment='削除しました'";
//$result=$pdo->query($sql);

//編集
				$ed=$_POST['edit'];
				if(isset($ed)){			//$edが数字であれば作動
$sql = 'SELECT *FROM sae';
$results = $pdo->query($sql);
				 foreach($results as $val){	//データベース内をループさせる
				 if(!($val['comment']=='削除しました')){
				  if($val['id']==$ed){			
				  $hi=$ed;			//編集モードに切り替え
				  $na=$val['name'];			//名前を取り出す
				  $co=$val['comment'];}			//コメントを取り出す
				}}}

				$hide=$_POST['hidd'];
				if(!empty($_POST['hidd'])){			//もしhiddが送信されたら
				$name=$_POST['name'];
				$comment=$_POST['comment'];
  	$sql = "UPDATE sae SET id='$hide' , name='$name' , comment='$comment' WHERE id = '$hide'";
	$result=$pdo->query($sql);

				unset($hi);}				//編集要因を消す

?>



<form method="post"action="mission_4.php">	
名前:<input type = "text" name="name"size=10 value="<?php echo $na; ?>"><br>
コメント:<input type = "text" name="comment" value="<?php echo $co; ?>"><br>
パスワードを決める:<input type="text" name="pass"><br>
	<input type="hidden" name="hidd" value="<?php echo $hi; ?>">
	<input type="submit"value="送信"><br><br>
</form>

<form method="post"action="mission_4.php">
削除対象番号:<input type="text" name="delete"size=5><br>
パスワードの確認:<input type="text" name="pasd" ><br>
	<input type="submit"value="削除"><br><br>
</form>

<form method="post"action="mission_4.php">
編集対象番号:<input type="text" name="edit"size=5 ><br>
パスワードの確認:<input type="text" name="pase"><br>
	<input type="submit"value="編集"><br><br>
</form>
<?php
//コメントの表示
$sql = 'SELECT *FROM sae';
$results = $pdo->query($sql);
foreach ($results as $row ){
echo $row['id'].' ';
echo $row['name'].' ';
echo $row['comment'].' ';
echo $row['da'].'<br>';

}
?>
  </body>
</html>