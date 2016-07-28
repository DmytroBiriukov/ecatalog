<?php

// Library
//$dest_path=$_SERVER['DOCUMENT_ROOT']."/virt/papers/";
// Unicyb
$dest_path=$_SERVER['DOCUMENT_ROOT']."/doc/papers/";
$loc_path="http://evisnyk.unicyb.kiev.ua/is/paper.php";

include("is/src/evisnyk.php");
$result8=ExecuteQuery("SELECT ID FROM paper ORDER BY ID");
while($line8 = mysql_fetch_array($result8, MYSQL_ASSOC))
{ $iii=$line8["ID"];
  $file = $loc_path."?ID=".$iii." ";
  $aFileName=$dest_path.$iii.".htm"; 
  if (!file_exists($aFileName)) 
  {

  ob_start();     
  if(!readfile($file)) echo "<p>$iii - failed</p>";
  else
  { 
    if (!$aFile = fopen($aFileName, 'w')) 
    { echo "<p>Cannot open file ($aFileName)</p>";
      exit;
    } else
    { fwrite($aFile, ob_get_contents());
    }
	fclose($aFile); 
  }	
  ob_end_clean();  
  
  }
} 