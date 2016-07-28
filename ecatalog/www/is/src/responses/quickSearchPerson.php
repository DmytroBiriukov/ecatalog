<?php
      header('Content-Type: text/plain; charset=windows-1251');      
      include("../evisnyk.php");
      $str = trim($_GET["stext"]);
	  $str=strdecode($str);
	 
      $res_num=25;       
      $query="(SELECT p.ID, p.name, p.scideg, p.scipos, p.position FROM personality p WHERE p.name LIKE '%".$str."%' ORDER BY name)";
      $result = ExecuteQuery($query);
      $num_rows = mysql_num_rows($result);
      if($num_rows>0 && $num_rows<$res_num)
      {  echo " <br>";
?>
<table>	  
	  <tr>
         <td style='color:black; font-size:10px;'>Результати пошуку<br> Знайдено <strong><? echo $num_rows."</strong> схожи";
        $m=$num_rows%100;
        if($m>4 && $m<20)
        { echo "х записів";
        }else
        { if($m>19) $m=$m%10;
          if($m==1) echo "й запис";
          else if($m<5) echo "х записи";
             else echo "х записів";
        }
        echo" в базі даних.<br>";?>
         </td>
      </tr>
<?php 
  while($line= mysql_fetch_array($result, MYSQL_ASSOC))
  { $IDperson=$line["ID"];
    $name=$line["name"];
	$scideg=$line["scideg"];
	$scipos=$line["scipos"];	
	$position=$line["position"];	
    print("<tr> <td> <a href='edt_person.php?ID=$IDperson'>");
	if($scipos!="") echo $scipos." ";
    echo "<strong>".$name."</strong>";
    if($scideg!="") echo ", ".$scideg;
	if($position!="") echo ", ".$position;
	print("</a></td></tr>");
  }
  mysql_free_result($result);
?>
</table>
<?php
       } else
	   echo "<span style='color:black; font-size:10px;'> Конкретизуйте умови пошуку</span>";
?>