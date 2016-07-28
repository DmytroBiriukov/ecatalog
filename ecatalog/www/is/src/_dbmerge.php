<?php
  include("press.php");
  echo "hello";
  $link = my_db_connect();
  $query="SELECT d.ID AS IDdep, sd.ID AS IDsubdep FROM department d, subdep sd ORDER BY d.ID, sd.ID";
  if(!empty($link))
   { mysql_select_db(database);
     $result = mysql_query($query);
   } 
   $i=0;
  while($line= mysql_fetch_array($result, MYSQL_ASSOC))
  { $IDdep=$line["IDdep"];
    $IDsubdep=$line["IDsubdep"];
    $query1="SELECT p.ID, p.name FROM person p WHERE p.IDinst=112 AND p.IDdep=$IDdep AND p.IDsubdep=$IDsubdep";
    $result1=mysql_query($query1);
    $query2="SELECT p.adviser_id AS ID, p.name FROM adviser p WHERE p.IDdep=$IDdep AND p.IDsubdep=$IDsubdep";
    $result2=mysql_query($query2);
    while($line1= mysql_fetch_array($result1, MYSQL_ASSOC))
    { $IDper=$line1["ID"];
      $namePer=$line1["name"];
      while($line2= mysql_fetch_array($result2, MYSQL_ASSOC))
      { $IDadv=$line2["ID"];
        $nameAdv=$line2["name"];
        if($nameAdv == $namePer  || LFF($nameAdv) == LFF($namePer))  
//		 if($nameAdv == $namePer ) // 86
//		if( !($nameAdv == $namePer ) && (LFF($nameAdv) == LFF($namePer)))
		{ $i++;
		  print("<br>$i person.[$IDper] $namePer  ==   $nameAdv  adviser.[$IDadv]  on ($IDdep - $IDsubdep) ");   
/*
		  $fieldValues=array("export"=>"n");
    	  $keyValues=array("adviser_id"=>$IDadv);
    	  sqlUpdateQuery("adviser", $fieldValues, $keyValues);
*/		 echo ".";
		}  
      }
    }
   mysql_free_result($result1);
   mysql_free_result($result2);
  }	
  mysql_free_result($result);
	
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
 
?>
