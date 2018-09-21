<?php
$filename = 'mission_1-2_sakakibara.txt';
$fp = fopen($filename,'w');
fwrite($fp, 'hello');
fclose($fp)
?>
