<?php 
  header('Content-Type: text/plain; charset=windows-1251');
  $file = "http://ecatalog.univ.kiev.ua/catalog/trial.php";
  if(!readfile($file)) echo "";
?>