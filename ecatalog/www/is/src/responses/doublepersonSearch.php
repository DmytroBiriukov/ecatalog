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
	  
	  echo "<tr><td colspan=2 style='color:black;'>";
echo "���������� ������<br> �������� <strong>$num_rows</strong> �����";
        $m=$num_rows%100;
        if($m>4 && $m<20)
        { echo "� ������";
        }else
        { if($m>19) $m=$m%10;
          if($m==1) echo "� �����";
          else if($m<5) echo "� ������";
             else echo "� ������";
        }
        echo " � ��� </td></tr>";
	  echo"<tr><td class='title_colomn'> ������ ������� </td><td>  ";
      
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
		 
		 
         
        print("</select>");
		echo "</td></tr>"; 
		echo"<tr><td class='title_colomn' > ������ ���� </td><td>   ";
		mysql_free_result($result12);
		$result12 = mysql_query("SELECT * FROM personality WHERE name LIKE '%".$str."%' ORDER BY name");
		echo "<table>";
         while ($line = mysql_fetch_array($result12, MYSQL_ASSOC))
         {  $name=$line["name"];
            $IDperson=$line["ID"];
			$scideg=$line["scideg"];
	        $scipos=$line["scipos"];	
	        $position=$line["position"];	
			
			echo "<tr><td style='color:black; font-size:10px;'><input name='IDperson_double[]' type='checkbox' value='$IDperson' />";	
        	if($scipos!="") echo $scipos." ";
    	    echo $name;
            if($scideg!="") echo ", ".$scideg;
	        if($position!="") echo ", ".$position;
			echo "</td></tr>";			
         }		
		echo "</table>";		
		echo "</td></tr>";
		mysql_free_result($result12);
		
		echo "<tr><td colspan=2 align=right> <div id='del_doubled_personality_submit'><a href='javascript:document.del_doubled_personality.submit(); 
window.location.reload(location.href);' onMouseOver='window.status=\'\';return true;'>�������� ����</a></div> </td> </tr>";

      }else echo "<span style='color:black; font-size:10px;'> ������������� ����� ������</span>";
  }
?>
