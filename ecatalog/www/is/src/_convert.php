<?php
  include("db_functions.php");
//  $query="SELECT adviser_id, IDdep, IDsubdep, cathedra, faculty FROM adviser";
//  $query="SELECT adviser_id, CONCAT(name1, ' ', name2, ' ', name3) AS fullname FROM adviser";
//  $query="SELECT aspirant_id, CONCAT(name1, ' ', name2, ' ', name3) AS fullname FROM aspirant";
  $query="SELECT DISTINCT a.aspirant_id, d.ID FROM aspirant a, department d WHERE d.faculty_id=a.faculty_id GROUP BY a.aspirant_id";

  $result=ExecuteQuery($query);
  while($line= mysql_fetch_array($result, MYSQL_ASSOC))
  {
/*
 $cathedra=$line["cathedra"];
    $faculty=$line["faculty"];
	$ID=$line["adviser_id"];	
	$query2="SELECT IDdep FROM converter_faculty2IDdep WHERE faculty='$faculty' ";
	$result2=ExecuteQuery($query2);
	$query3="SELECT IDsubdep FROM converter_cathedra2IDsubdep WHERE cathedra='$cathedra' ";
	$result3=ExecuteQuery($query3);
	$IDdep=0;
	if($line2= mysql_fetch_array($result2, MYSQL_ASSOC))
    { $IDdep=$line2["IDdep"];	 
	}
        $IDsubdep=0;
	if($line3= mysql_fetch_array($result3, MYSQL_ASSOC))
    { $IDsubdep=$line3["IDsubdep"];	 
	}	
	mysql_free_result($result2);
    mysql_free_result($result3);
    print("<br> $ID - $IDdep - $IDsubdep");
	
	$fieldValues=array("IDdep"=>$IDdep ,"IDsubdep"=>$IDsubdep );
	$keyValues=array("adviser_id"=>$ID);
	sqlUpdateQuery("adviser", $fieldValues, $keyValues);
*/
//        $name=$line["fullname"];
        $name=$line["ID"];
	$ID=$line["aspirant_id"];
	
//	$fieldValues=array("name"=>$name);
	$fieldValues=array("IDdep"=>$name);
	$keyValues=array("aspirant_id"=>$ID);
//	sqlUpdateQuery("adviser", $fieldValues, $keyValues);
	sqlUpdateQuery("aspirant", $fieldValues, $keyValues);


  }
  mysql_free_result($result); 
?>