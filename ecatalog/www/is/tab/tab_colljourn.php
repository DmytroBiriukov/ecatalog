<table border="0" cellpadding="0" cellspacing="0" width="100%" background="css/img/bg_white.png">
<?php
  $query2="SELECT c.ID, c.title FROM collection c, user2collection u2c WHERE u2c.IDuser=$aID  AND c.ID=u2c.IDcollection AND c.datatab='collection' ORDER BY c.title";
  $result2=ExecuteQuery($query2);
  if(mysql_num_rows($result2))
  {
?>
<tr>
  <td width="200" valign="top">
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top"> 
      <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>
    <tr>  
      <td width="32" background="img/bg_left.gif"><img src="img/bg_left.gif" alt="" width="32" height="1"></td>
      <td width="148" class="left_header">
      Збірники   <br>  <br>
      </td>
      </tr>
  </table>
  </td>
  <td valign="top" style="color: #FFFFCC; font-size:10;">
    <br>
<table>  
<?php  
  while($line2= mysql_fetch_array($result2, MYSQL_ASSOC))
  { $IDcollection=$line2["ID"];
    $title=$line2["title"];
    print("<tr> <td> <a href='edt_colljourn.php?tab=collection&&ID=$IDcollection'>$title</td></tr>");
  }
  mysql_free_result($result2);
?>
</table>
  </td>
</tr>
<?php
}


  $query3="SELECT c.ID, c.title FROM collection c, user2collection u2c WHERE u2c.IDuser=$aID  AND c.ID=u2c.IDcollection AND c.datatab='journal' ORDER BY c.title";
  $result3=ExecuteQuery($query3);
  if(mysql_num_rows($result3))
  {
?>
<tr>
   <td width="200" valign="top" >
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top"> 
      <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>
    <tr>  
      <td width="32" background="img/bg_left.gif"><img src="img/bg_left.gif" alt="" width="32" height="1"></td>
      <td width="148" class="left_header">
      Журнали   <br>  <br>
      </td>
      </tr>
  </table>   
  </td>
  <td valign="top" style="color: #FFFFCC; font-size:10;">
  <br>
<table>
<?php  
  while($line3= mysql_fetch_array($result3, MYSQL_ASSOC))
  { $IDjournal=$line3["ID"];
    $title=$line3["title"];
    print("<tr> <td> <a href='edt_colljourn.php?tab=journal&&ID=$IDjournal'>$title</td></tr>");
  }
  mysql_free_result($result3);
?>
</table>
</td>
</tr>
<?php
}

  $query4="SELECT tp.ID, tp.title, tp.IDsource, tp.file_ext
            FROM tmp_paper tp WHERE tp.IDsource IN (SELECT c.ID FROM collection c, user2collection u2c WHERE u2c.IDuser=$aID  AND c.ID=u2c.IDcollection) 
			ORDER BY tp.ID ";
  $result4=ExecuteQuery($query4);
  if(mysql_num_rows($result4))
  {
?>
<tr>
  <td width="200" valign="top">
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top"> 
      <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>
    <tr>  
      <td width="32" background="img/bg_left.gif"><img src="img/bg_left.gif" alt="" width="32" height="1"></td>
      <td width="148" class="left_header" style="color:#CC0000">
      Надійшли заяви <br>на подачу статті <br>  
      </td>
      </tr>
  </table>
  </td>
  <td valign="top" style="color: #FFFFCC; font-size:10;">
    <br>
<table>  
<?php  
  while($line4= mysql_fetch_array($result4, MYSQL_ASSOC))
  { 
    $title=$line4["title"];
    $IDsource=$line4["IDsource"];		
    $ID=$line4["ID"];	
	$file_ext=$line4["file_ext"];	
	
    $query5="SELECT ta.name, ta.ID  FROM tmp_personality ta, tmp_paperAuthor pa WHERE pa.IDperson = ta.ID AND pa.IDpaper =".$ID." ";
	$result5=ExecuteQuery($query5);	
    print("<tr> <td  style='font-size:10px'>");
	while($line5= mysql_fetch_array($result5, MYSQL_ASSOC))
	{ echo $name=$line5["name"]." ";
	}
	print(" <a href='../../doc/appforms/".$ID.$file_ext."' target='_blank'>".$title."</a></td></tr>");
  }
  mysql_free_result($result4);
?>
</table>
  </td>
</tr>
<?php
}
?>
</table>
