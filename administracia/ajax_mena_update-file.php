<?php


 $file = file("mena_import.txt");
  $output = $file[0];
  unset($file[0]);
  file_put_contents("mena_import.txt", $file);
  return $output;


?>