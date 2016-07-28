<?php
  $str = $_GET["stext"];
  $tab = $_GET["tab"];  
  require("../evisnyk.php");
 // echo $str;
  if( $tab != 'journal') $tab='collection';
 // echo $tab;
  
  $link = my_db_connect();
  if(!empty($link))
  {
      my_db_select();
      $result13 = mysql_query("SELECT ID, title FROM ".$tab." WHERE title LIKE '%".$str."%' AND IDinst=112 ORDER BY title");
	  $num_rows = mysql_num_rows($result13);
	  if($num_rows>0)
      {
	  
	  echo "Результати пошуку<br> Знайдено <strong>$num_rows</strong> схожи";
      $m=$num_rows%100;
      if($m>4 && $m<20)
      { echo "х записів";
      }else
      { if($m>19) $m=$m%10;
        if($m==1) echo "й запис";
        else if($m<5) echo "х записи";
             else echo "х записів";
      }
      echo" в базі <br>";
      
       print("<select name='ID'>");
         while ($line = mysql_fetch_array($result13, MYSQL_ASSOC))
         {  $title=$line["title"];
            $ID=$line["ID"];
            print("<option value='$ID' >$title</option>");
         }
         mysql_free_result($result13);
         print("</select>");
      }else echo "Конкретизуйте умови пошуку";
  }
  
?>
