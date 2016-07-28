<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  
   require("is/src/evisnyk.php");	
   $IDvolume=$HTTP_GET_VARS['ID'];
   $result0=ExecuteQuery(" SELECT v.issue, v.year, c.title AS ctitle
                           FROM volume v, collection c 
                           WHERE c.ID=v.ID AND v.IDvolume=".$IDvolume."
						  ");
   $line0=  mysql_fetch_array($result0, MYSQL_ASSOC);					  
   $result=ExecuteQuery(" SELECT p.ID, p.title, p.abstract_ua, p.pageFirst, p.pageLast, v.issue, v.year, c.title AS ctitle
                           FROM volume v, paper p, collection c 
                           WHERE c.ID=v.ID AND p.IDvolume=$IDvolume AND p.IDvolume=v.IDvolume ORDER BY p.pageFirst
                         ");		 
?>
</head>
<style>
.title_row
{ background-color: #999999; 
  color:#FFFFFF;
  font-size:10px;
  font-family:Verdana, Arial, Helvetica, sans-serif;
  padding: 4px;
}

.footer_links 
{ font-family: Verdana, Helvetica;
  font-size: 10px;
  color: #666666;
  text-decoration: none;
}
.footer_links :hover 
{ font-family: Verdana, Helvetica;
  font-size: 10px;
  color: #3399CC;
  text-decoration: none;
}

footer_links_underlined
{ font-family: Verdana, Helvetica;
  font-size: 10px;
  color: #666666;
  text-decoration: none;
  style=text-decoration:underline;
}

</style>
<body>

  
    <table style="font-size:10px">
    <tr class="title_row">
    <td colspan="3">
    <? echo "<strong>".$line0['ctitle']."</strong> <em>".$line0['year']."</em> ".$line0['issue']; ?>
<?php
$filename = "doc/series/v_".$IDvolume.".pdf";
if (file_exists($filename)) 
{
?> <br>
<a style="border:0;" href="http://ecatalog.univ.kiev.ua/virt/series/v_<? echo $IDvolume; ?>.pdf" target="_blank">
<img src="http://ecatalog.univ.kiev.ua/img/pdf.png" title="файл з повнотекстовим змістом" />
</a>
<? 
} 
?>
    </td>
    </tr>
<?   
    mysql_free_result($result0); 
    $ind=0; 
    while($line=  mysql_fetch_array($result, MYSQL_ASSOC)   )
    { 
      print("<tr align='left' valign='top' ");
      print(" onmouseover=\"this.style.backgroundColor='#FFFF99';\" onmouseout=\"this.style.backgroundColor='#FFFF");
      if($ind % 2) echo "CC';\" "; else echo "FF';\" ";
      print(" bgcolor=#FFFF");
      if($ind % 2) echo "CC>"; else echo "FF>";

      $IDpaper=$line['ID'];
?>
<td width=40>
<?
$filename = "doc/papers/".$IDpaper.".pdf";
if (file_exists($filename)) 
{
?> 
<a style="border:0;" href="http://ecatalog.univ.kiev.ua/virt/papers/<? echo $IDpaper; ?>.pdf" target="_blank">
<img src="http://ecatalog.univ.kiev.ua/img/pdf.png" title="файл з повнотекстовим змістом" />
</a>
<? 
}
?>
</td>
<?




      $result1=ExecuteQuery(" SELECT a.name
                              FROM personality a, paperAuthor ac  
                              WHERE ac.IDperson=a.ID AND ac.IDpaper=".$line['ID']." ORDER BY ac.ID                        
                            ");
      print("<td><em>");
	  $i=0;
      while($line1=  mysql_fetch_array($result1, MYSQL_ASSOC) )
      { if($i) echo ",";
	    echo LFF($line1['name']);
	    $i++;
      }
      print("</em><br>");
      print("<a href='http://ecatalog.univ.kiev.ua/papers/".$IDpaper.".htm'>".$line['title']."</a></td><td> C.".$line['pageFirst']."-".$line['pageLast'].".</td>"); 
      print("</tr>");
      $ind++;
      mysql_free_result($result1);
    }
    mysql_free_result($result);
?>
    </table>
</body>
</html>