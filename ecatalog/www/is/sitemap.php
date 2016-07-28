<?php
  include("src/evisnyk.php");
  $result=ExecuteQuery("SELECT ID FROM paper");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?><urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">";
  $curDate="20".date('y-m-d');
  while($line = mysql_fetch_array($result, MYSQL_ASSOC))
  { echo "<url><loc>http://ecatalog.univ.kiev.ua/papers/".$line["ID"].".htm</loc> <lastmod>".$curDate."</lastmod></url>";
  }
  echo "</urlset>
";    
?>