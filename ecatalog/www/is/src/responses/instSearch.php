<?php
      header('Content-Type: text/plain; charset=windows-1251');      
      include("../evisnyk.php");
      $str = trim($_GET["stext"]);
	  $str=strdecode($str);

	  $q="SELECT * FROM institutions WHERE title LIKE '%".$str."%' ORDER BY title";
//	  echo $q;
      $result12 = ExecuteQuery($q);
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
        echo" в базі даних.<br>";
        if($num_rows>0 && $num_rows < 51)
        { print("<select name='IDinst'>");
           while ($line = mysql_fetch_array($result12, MYSQL_ASSOC))
           { $instTitle=$line["title"];
             $IDinst=$line["ID"];
             print("<option value='$IDinst' ");
             if($IDinst==112) print(" selected ");
             print(">$instTitle</option>");
           }
           mysql_free_result($result12);
           print("</select>");
         }else echo "Конкретизуйте умови пошуку";
  
?>
