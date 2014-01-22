<?php 
$filename = 'temporalfile.txt';
$count = file(TEMPLATEPATH . '/temporalfile.txt'); 
$fp = fopen(TEMPLATEPATH . "/temporalfile.txt", "w");
fputs ($fp, "this is my datos 1");
fclose ($fp);

 ?>
