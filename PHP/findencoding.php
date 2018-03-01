<?php
  foreach(mb_list_encodings() as $chr){
    echo mb_convert_encoding($str, 'UTF-8', $chr)." : ".$chr."<br />";   
  } 
?>
