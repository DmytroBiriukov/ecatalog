<table border="0" cellpadding="0" cellspacing="0" width="100%" background="css/img/bg_white.png">
<tr>
  <td width="200" valign="top">
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top"> 
      <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>
    <tr>  
      <td width="32" background="img/bg_left.gif"><img src="img/bg_left.gif" alt="" width="32" height="1"></td>
      <td width="148" class="left_header">
      Пошук в базі даних   <br>  <br>
      </td>
      </tr>
  </table>
  </td>
  <td valign="top" style="color: #FFFFCC; font-size:10;">
  <form method="get">
  <table width=500>
  <tr>
  <td class="title_colomn">Введіть частину ПІБ (не менше 4 символів)</td>
  <td>
  <input type="text" name="personality_search" id="personality_search" 
  onKeyUp=" quickSearch('personality_search','personality_searchResult',4, 'src/responses/quickSearchPerson.php'); " />
  </td>
  </tr>
  <tr>
  <td colspan="2" class="cdata_colomn">   
  <div id="personality_searchResult">
  </div>
  </td>
  </tr>
  </table>
  </form> 
  </td>
</tr>

<tr>
  <td width="200" valign="top">
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top"> 
      <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>
    <tr>  
      <td width="32" background="img/bg_left.gif"><img src="img/bg_left.gif" alt="" width="32" height="1"></td>
      <td width="148" class="left_header">
      Внести нову <br>персоналію   <br>
      </td>
      </tr>
  </table>
  </td>
  <td valign="top" style="color: #FFFFCC; font-size:10;">
<?php include("tab_addperson.php");
?>
  </td>
</tr>



<tr>
  <td width="200" valign="top">
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top"> 
      <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>
    <tr>  
      <td width="32" background="img/bg_left.gif"><img src="img/bg_left.gif" alt="" width="32" height="1"></td>
      <td width="148" class="left_header">
      Прибрати дублі   <br>
      </td>
      </tr>
  </table>
  </td>
  <td valign="top" style="color: #FFFFCC; font-size:10;">
<?php include("tab_deletedoubles.php");
?>
  </td>
</tr>




<tr>
  <td width="200" valign="top">
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top"> 
      <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>
    <tr>  
      <td width="32" background="img/bg_left.gif"><img src="img/bg_left.gif" alt="" width="32" height="1"></td>
      <td width="148" class="left_header">
      Викладачі та співробітники (по кафедрах)  <br>  <br>
      </td>
      </tr>
  </table>
  </td>
  <td valign="top" style="color: #FFFFCC; font-size:10;">

<?php
  $query2="(SELECT p.ID, p.name, sd.title as sdtitle, p.scideg, p.scipos, p.position FROM personality p, depbelonging b, subdep sd WHERE p.IDdep=$aUserDep AND sd.ID=b.IDsubdep AND b.IDdep=$aUserDep AND p.IDsubdep=b.IDsubdep ORDER BY sdtitle, name)";
// UNION 
  $query3="(SELECT p.adviser_id AS ID, p.name, sd.title as sdtitle, p.scideg, p.scideg, p.scipos, p.work1 AS position FROM adviser p, depbelonging b, subdep sd WHERE p.IDdep=$aUserDep AND sd.ID=b.IDsubdep AND b.IDdep=$aUserDep AND p.IDsubdep=b.IDsubdep AND p.export<>'n' ORDER BY sdtitle, name)";
// AS comb_table ORDER BY title, name";
  $query4="SELECT p.ID, p.name, p.scideg, p.scipos, p.position FROM personality p WHERE p.IDdep=$aUserDep AND (p.IDsubdep=0 OR p.IDsubdep=NULL) ORDER BY name";

// select aspirants from IDdep
 

  $result2=ExecuteQuery($query2);
  if(mysql_num_rows($result2))
  {
?>

<table>
<?php  
  $subdepTitle0=""; 
  while($line2= mysql_fetch_array($result2, MYSQL_ASSOC))
  { $IDperson=$line2["ID"];
    $name=$line2["name"];
	$scideg=$line2["scideg"];
	$scipos=$line2["scipos"];	
	$position=$line2["position"];	
	$subdepTitle=$line2["sdtitle"];
	if($subdepTitle0 != $subdepTitle) 
	{ $subdepTitle0=$subdepTitle;
	  print("<tr> <td class='title_row'> $subdepTitle </td></tr>");
	}
    print("<tr> <td> <a href='edt_person.php?ID=$IDperson'>");
	if($scipos!="") echo $scipos." ";
//    echo "<strong>".$name."</strong>";
	    echo "<strong>".$name."</strong>";
    if($scideg!="") echo ", ".$scideg;
	if($position!="") echo ", ".$position;
	print("</a></td></tr>");
  }
  mysql_free_result($result2);
?>
</table>

</td>
</tr>
<tr>



<?php
}
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
      <td width="148" class="left_header">
      інші викладачі та співробітники   <br>  <br>
      </td>
      </tr>
  </table>
  </td>
  <td valign="top" style="color: #FFFFCC; font-size:10;">
  <br>
<table>

<?php  

  while($line4= mysql_fetch_array($result4, MYSQL_ASSOC))
  { $IDperson=$line4["ID"];
    $name=$line4["name"];
	$scideg=$line4["scideg"];
	$scipos=$line4["scipos"];	
	$position=$line4["position"];	
    print("<tr> <td> <a href='edt_person.php?ID=$IDperson'>");
	if($scipos!="") echo $scipos." ";
    echo "<strong>".$name."</strong>";
    if($scideg!="") echo ", ".$scideg;
	if($position!="") echo ", ".$position;
	print("</a></td></tr>");
  }
  mysql_free_result($result4);

?>

</table>
</td>
</tr>
<?php
}

  $query5="SELECT ID, name, position FROM personality WHERE IDdep=".$aUserDep." AND position='асп. каф.' ORDER BY name";
  $result5=ExecuteQuery($query5);

  if(mysql_num_rows($result5))
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
      Аспіранти   <br>  <br>
      </td>
      </tr>
  </table>
  </td>
  <td valign="top" style="color: #FFFFCC; font-size:10;">
  <br>
<table>
<?php  
  while($line5= mysql_fetch_array($result5, MYSQL_ASSOC))
  { $IDperson=$line5["ID"];
    $name=$line5["name"];
	$position=$line5["position"];	
    print("<tr> <td> <a href='edt_person.php?ID=$IDperson'>");
    echo "<strong>".$name."</strong>";
	if($position!="") echo ", ".$position;
	print("</a></td></tr>");
  }
  mysql_free_result($result5);

?>

</table>
</td>
</tr>
<?php
} 

?>
</table>