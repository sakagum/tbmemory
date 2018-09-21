<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 </head>
  <body>

<?php

//参照　www.iimc.kyoto-u.ac.jp/ja/services/whs/support/make_con/php_db.html

//サーバ接続 3-1
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);

//テーブルの作成　3-2
$sql = "CREATE TABLE tbtest" 
." (" 
."id INT," 
."name char(32)," 
."comment TEXT" 
.");";
$stmt = $pdo->query($sql);

//tbtest―――っての作る 3-3
$sql = 'SHOW TABLES'; //情報を見る
$result = $pdo -> query($sql); 
 foreach ($result as $row){ echo $row[0]; 
 echo '<br>';
}
echo "<hr>";

//tbtestの下のゴッチャゴチャしたやつ 3-4
$sql = 'SHOW CREATE TABLE tbtest';
$result = $pdo->query($sql);
var_dump($result);
foreach ($result as $row){
 print_r($row);
}
echo "<hr>";

//3-5
$sql = $pdo -> prepare("INSERT INTO tbtest (id,name,comment) VALUES ('1',:name,:comment)");
//INSERTは情報の追加
$sql -> bindParam(':name',$name,PDO::PARAM_STR);
$sql -> bindParam(':comment',$comment,PDO::PARAM_STR);
$name='Tom';
$comment='Hey';
$sql -> execute();

//コメント表示 3-6
$sql = 'SELECT *FROM tbtest';
$results = $pdo->query($sql);
foreach ($results as $row ){
echo $row['id'].',';
echo $row['name'].',';
echo $row['comment'].'<br>';
}

//$idは書き換える数字　3-7
$id = 2;
$nm = "Mike";
$kome = "Howdy";
$sql = "update tbtest set name='$nm' , comment='$kome' where id =$id";
$result = $pdo->query($sql);

//$idは消す数字　3-8
$id=2;
$sql="delete from tbtest where id=$id";
$result=$pdo->query($sql);

?>


  </body>
</html>