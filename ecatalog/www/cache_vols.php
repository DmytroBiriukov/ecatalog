<?php
include("is/src/evisnyk.php");
$result8=ExecuteQuery("SELECT IDvolume, ID FROM volume ORDER BY IDvolume");
while($line8 = mysql_fetch_array($result8, MYSQL_ASSOC))
{ $iii=$line8["IDvolume"];
  $c=$line8["ID"];
  if(!readfile("http://ecatalog.univ.kiev.ua/cache_volume.php?IDvolume=".$iii."&&ID=".$c." ")) echo "<p>Error on readfile from ecatalog</p>";   
  echo "<p>c_$c/vol/v_$iii is done </p>";
} 
echo "<p>Done succesfully</p>";