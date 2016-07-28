<?php
  $str = $_GET["stext"];
  include("../../is/src/evisnyk.php");
  $link = my_db_connect();
  if(!empty($link))
  {
      my_db_select();
      $result12 = mysql_query("SELECT * FROM institutions WHERE title LIKE '%".$str."%' ORDER BY title");
      $num_rows = mysql_num_rows($result12);
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
      if($num_rows>0)
      { print("<select name='IDinst' style=' width:250px;'>");
         while ($line = mysql_fetch_array($result12, MYSQL_ASSOC))
         {  $instTitle=$line["title"];
            $IDinst=$line["ID"];
            print("<option value='$IDinst' ");
            if($IDinst==112) print(" selected ");
            print(">$instTitle</option>");
         }
         mysql_free_result($result12);
         print("</select>");
      }else echo "Конкретизуйте умови пошуку";
  }
?>
