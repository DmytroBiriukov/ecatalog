<?php

include("is/src/evisnyk.php");
//$dir_path="http://evisnyk.unicyb.kiev.ua/doc/";
// Library's server directory 
$dir_path="http://ecatalog.univ.kiev.ua/virt/";

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  Fill tmp_author fields by authors' information   
  
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$query10="SELECT ID FROM paper WHERE  tmp_author =''";
$result10=ExecuteQuery($query10);
while($line10 = mysql_fetch_array($result10, MYSQL_ASSOC))
{ $IDpaper=$line10["ID"];
  $query20="SELECT p.name FROM personality p, paperAuthor pa  WHERE p.ID=pa.IDperson AND pa.IDpaper=".$IDpaper." ORDER BY pa.IDpaper"; 
  $result20=ExecuteQuery($query20);
  if(mysql_num_rows($result20) > 0)
  { $name=array();
    while($line20 = mysql_fetch_array($result20, MYSQL_ASSOC))
    {
	  $name[]=LFF($line20["name"]);	
	}    
	$authors=implode(", ",$name);
	echo $IDpaper." - ".$authors."<br>";
	$tableName="paper";
	$fieldValues=array("tmp_author"=>$authors);
	$keyValues=array("ID"=>$IDpaper);
	sqlUpdateQuery($tableName, $fieldValues, $keyValues);
  } 
  mysql_free_result($result20); 
}
mysql_free_result($result10);

?>