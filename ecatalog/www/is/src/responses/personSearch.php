<?php      header('Content-Type: text/html; charset=windows-1251');
  $str = $_GET["stext"];
  require("../evisnyk.php");
  $str=strdecode($str);
  $link = my_db_connect();
  if(!empty($link))
  {
      my_db_select();
      $result12 = mysql_query("SELECT * FROM personality WHERE name LIKE '%".$str."%' ORDER BY name");
      $num_rows = mysql_num_rows($result12);
	  if($num_rows>0)
      {
	  
	  echo "<span style='color:black; font-size:10px;'>Результати пошуку<br> Знайдено <strong>$num_rows</strong> схожи";
      $m=$num_rows%100;
      if($m>4 && $m<20)
      { echo "х записів";
      }else
      { if($m>19) $m=$m%10;
        if($m==1) echo "й запис";
        else if($m<5) echo "х записи";
             else echo "х записів";
      }
      echo" в базі даних:</span><br>";
      
       print("<select name='IDperson'>");
         while ($line = mysql_fetch_array($result12, MYSQL_ASSOC))
         {  $name=$line["name"];
            $IDperson=$line["ID"];
			$scideg=$line["scideg"];
	        $scipos=$line["scipos"];	
	        $position=$line["position"];	
            print("<option value='$IDperson' >");			
        	if($scipos!="") echo $scipos." ";
    	    echo $name;
            if($scideg!="") echo ", ".$scideg;
	        if($position!="") echo ", ".$position;
            print("</option>");
         }
         mysql_free_result($result12);
         print("</select>");
		   echo "<br>   <input type=submit name='submit_button' value='Внести дані' /> ";

      }else echo "Конкретизуйте умови пошуку";
  }
?>
