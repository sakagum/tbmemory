<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 </head>
 <body>
  <form method="post"action="mission_1-5.php">
  <input type = "text"name="comment" value="コメント"><br>
  <input type="submit"value="送信"><br>
  </form>
  
   <?php
    if(isset($_POST['comment']) && $_POST['comment']){
    $comment=$_POST['comment'];

    $filename = 'mission_1-5_sakakibara.txt';
    $fp = fopen($filename,'w');
    if($comment=="犬"){
    fwrite($fp, $comment);
    $comment="(∪＾ω＾)";}
    else {
    fwrite($fp, $comment);
    fclose($fp);}
    
    echo "「ご入力ありがとうございます。<br />";
    echo date("Y年m月d日H時i分")."に". $comment. "を受け取りました。」";
    }
    
    
   ?>
 </body>
</html>