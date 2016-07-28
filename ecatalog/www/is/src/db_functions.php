<?php

define("host", "localhost");
define("user", "root");
define("pwd", "4698259");
//define("pwd", "");
define("database", "scicon");

function my_db_connect()
{
    $r = mysql_connect(host,user,pwd);
    if(preg_match('/^5\./',mysql_get_server_info($r)))
    mysql_query('SET SESSION sql_mode=0');
    mysql_query("SET NAMES cp1251") or die("Invalid query: ".mysql_error());
//    mysql_query("SET NAMES utf8") or die("Invalid query: ".mysql_error());
    return $r;
}

function my_db_select()
{
  mysql_select_db(database);
}

function sqlUpdateQuery($tableName, $fieldValues, $keyValues)
{
   $link = my_db_connect();
   if(!empty($link))
   {  $aSQL="UPDATE $tableName SET ";
      $i=0;
      foreach($fieldValues as $fieldName => $aValue)
      {
       if($i>0) $aSQL.="', ";       $aSQL.=$fieldName."='".$aValue;   $i++;
      }
      $aSQL.="' WHERE ";
      $i=0;
      foreach($keyValues as $fieldName => $aValue)
      {
       if($i>0) $aSQL.="' AND ";  $aSQL.=$fieldName."='".addslashes($aValue);   $i++;
      }
      $aSQL.="'";
      if(!empty($link))
      {
        if(mysql_select_db(database,$link) == True)
       {
        $aQResult= mysql_query($aSQL, $link);
        if($aQResult == True)
        {
          $aResult=mysql_insert_id($link);
        }
           }
      }
  }
}


function sqlDeleteQuery($tableName, $keyValues)
{
   $link = my_db_connect();
   if(!empty($link))
   {  $aSQL="DELETE FROM $tableName WHERE ";
      $i=0;
      foreach($keyValues as $fieldName => $aValue)
      {
       if($i>0) $aSQL.="' AND ";  $aSQL.=$fieldName."='".addslashes($aValue);   $i++;
      }
      $aSQL.="'";
      if(!empty($link))
      {
        if(mysql_select_db(database,$link) == True)
       {
        $aQResult= mysql_query($aSQL, $link);
        if($aQResult == True)
        {
          $aResult=mysql_insert_id($link);
        }
           }
      }
  }
}

function getFieldValue($tabName, $fldName, $IDVal, &$fldVal)
{ $link = my_db_connect();
   if(!empty($link))
   {  my_db_select();
      $query =  "SELECT $fldName FROM $tabName WHERE ID=".$IDVal;
          $result = mysql_query($query);
          if($line = mysql_fetch_array($result, MYSQL_ASSOC))
          { $fldVal=$line[$fldName];
          }
      mysql_free_result($result);

   } else echo "<br>Íå ìîæå ï³äºäíàòèñÿ äî áàçè äàíèõ";
}

// $fieldValues - array
function sqlInsertQuery($tableName, $fieldValues)
{
   $aSQL="INSERT INTO $tableName (";
   $i=0;
   foreach($fieldValues as $fieldName => $aValue)
   {

     if($i>0) $aSQL.=",";       $aSQL.=$fieldName;   $i++;
   }
   $aSQL.=") VALUES('";
   $i=0;
   foreach($fieldValues as $fieldName => $aValue)
   {

     if($i>0) $aSQL.="','";     $aSQL.=addslashes($aValue);         $i++;
   }
   $aSQL.="')";
   //echo $aSQL;

   $link = my_db_connect();
   if(!empty($link))
   {
      if(mysql_select_db(database,$link) == True)
     {
        $aQResult= mysql_query($aSQL, $link);
        if($aQResult == True)
        {
          $aResult=mysql_insert_id($link);

        }
        else
        {
          $aResult=-1;
        }
     }
     else
     {
        $aResult=-2;
     }
  }
  else
  {
    $aResult=-3;
  }
return $aResult;
}

function displayVARS()
{
 global $HTTP_GET_VARS;
 global $HTTP_POST_VARS;
 print("<br> GET variables are <br>");
 print_r($HTTP_GET_VARS);
 print("<br> POST variables are <br>");
 print_r($HTTP_POST_VARS);
}
// $name contens name of POST variable
// $fields should be an array with field names coresponding to fields of value and text areas
// $fields=array("value" =>  , "text"=>  )
function ShowList($name, $result, $fields)
{
  print("<select name='$name' size='1'>");
  if($result)
  while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
  {
    $valuefld=$line[$fields['value']];
    $textfld=$line[$fields['text']];
    print("<option value='$valuefld'>$textfld</option>");
  }
  print("</select>");
  mysql_free_result($result);
}

function ExecuteQuery($query)
{  $link = my_db_connect();
   if(!empty($link))
   { mysql_select_db(database);
     $result = mysql_query($query);
   }//else echo "empty link";
   return $result;
}

function getField($field, $result)
{
  if($result)
  { $line = mysql_fetch_array($result, MYSQL_ASSOC);
    $valuefld=$line[$field];
  }
  mysql_free_result($result);
  return $valuefld;
}

function getFields($field, $result)
{
  if($result)
  { $line = mysql_fetch_array($result, MYSQL_ASSOC);
    foreach($field as $key => $value)
    { $field[$key]=$line[$key];
    }
    mysql_free_result($result);
    return 1;
  } else return 0;

}

function strdecode($str)
{ $rstr = @iconv("UTF-8","windows-1251",$str);
  if ($rstr == false) {return $str;} else {return $rstr;}
}

function printTitle($tabName, $IDval)
{  $link = my_db_connect();
   if(!empty($link))
   {
      mysql_select_db(database);
      $query =  "SELECT title FROM $tabName WHERE ID='$IDval'";
          $result = mysql_query($query);
          if($line = mysql_fetch_array($result, MYSQL_ASSOC))
          { $title=$line['title'];
            echo $title;
          }
      mysql_free_result($result);
   }
}

function getRowTitle($tabName, $IDval)
{  $link = my_db_connect();
   if(!empty($link))
   {
      mysql_select_db(database);
      $query =  "SELECT title FROM $tabName WHERE ID='$IDval'";
          $result = mysql_query($query);
          if($line = mysql_fetch_array($result, MYSQL_ASSOC))
          { $title=$line['title'];
            
          }
      mysql_free_result($result);
   }
   return $title;
}

?>