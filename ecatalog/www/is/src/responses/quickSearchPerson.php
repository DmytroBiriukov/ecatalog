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
         <td style='color:black; font-size:10px;'>���������� ������<br> �������� <strong><? echo $num_rows."</strong> �����";
        $m=$num_rows%100;
        if($m>4 && $m<20)
        { echo "� ������";
        }else
        { if($m>19) $m=$m%10;
          if($m==1) echo "� �����";
          else if($m<5) echo "� ������";
             else echo "� ������";
        }
        echo" � ��� �����.<br>";?>
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
	   echo "<span style='color:black; font-size:10px;'> ������������� ����� ������</span>";
?>