<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 </head>
  <body>

<?php

//�Q�Ɓ@www.iimc.kyoto-u.ac.jp/ja/services/whs/support/make_con/php_db.html

//�T�[�o�ڑ� 3-1
$dsn = '�f�[�^�x�[�X��';
$user = '���[�U�[��';
$password = '�p�X���[�h';
$pdo = new PDO($dsn,$user,$password);

//�e�[�u���̍쐬�@3-2
$sql = "CREATE TABLE tbtest" 
." (" 
."id INT," 
."name char(32)," 
."comment TEXT" 
.");";
$stmt = $pdo->query($sql);

//tbtest�\�\�\���Ă̍�� 3-3
$sql = 'SHOW TABLES'; //��������
$result = $pdo -> query($sql); 
 foreach ($result as $row){ echo $row[0]; 
 echo '<br>';
}
echo "<hr>";

//tbtest�̉��̃S�b�`���S�`��������� 3-4
$sql = 'SHOW CREATE TABLE tbtest';
$result = $pdo->query($sql);
var_dump($result);
foreach ($result as $row){
 print_r($row);
}
echo "<hr>";

//3-5
$sql = $pdo -> prepare("INSERT INTO tbtest (id,name,comment) VALUES ('1',:name,:comment)");
//INSERT�͏��̒ǉ�
$sql -> bindParam(':name',$name,PDO::PARAM_STR);
$sql -> bindParam(':comment',$comment,PDO::PARAM_STR);
$name='Tom';
$comment='Hey';
$sql -> execute();

//�R�����g�\�� 3-6
$sql = 'SELECT *FROM tbtest';
$results = $pdo->query($sql);
foreach ($results as $row ){
echo $row['id'].',';
echo $row['name'].',';
echo $row['comment'].'<br>';
}

//$id�͏��������鐔���@3-7
$id = 2;
$nm = "Mike";
$kome = "Howdy";
$sql = "update tbtest set name='$nm' , comment='$kome' where id =$id";
$result = $pdo->query($sql);

//$id�͏��������@3-8
$id=2;
$sql="delete from tbtest where id=$id";
$result=$pdo->query($sql);

?>


  </body>
</html>