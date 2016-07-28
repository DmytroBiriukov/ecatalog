<?php
include("../evisnyk.php");
$IDvolume = $HTTP_GET_VARS["IDvolume"];
$result0=ExecuteQuery("SELECT description_ua, description_en, datatab, issue, year, ID FROM volume WHERE IDvolume=".$IDvolume." ");

if($line0 = mysql_fetch_array($result0, MYSQL_ASSOC))
{ $description_ua=$line0['description_ua'];
  $description_en=$line0['description_en'];  
  $datatab=$line0['datatab'];
  $year=$line0['year'];
  $issue=$line0['issue'];  
  $IDcolljourn=$line0['ID'];
  
  echo "<p style='font-size:10px; color:#333333;'>".$description_ua."</p>";
  echo "<p style='font-size:10px; color:#333333;'>".$description_en."</p>";  
  
  $result1=ExecuteQuery("SELECT abstractFormat FROM collection WHERE ID=".$IDcolljourn." ");
  if($line1 = mysql_fetch_array($result1, MYSQL_ASSOC))  $abstractFormat=$line1['abstractFormat'];  
  mysql_free_result($result1);
  //echo "SELECT abstractFormat FROM $datatab WHERE ID=".$IDcolljourn." ";
//  echo $abstractFormat;
  
}

$result=ExecuteQuery("SELECT p.*, s.title AS stitle FROM paper p, section s WHERE p.IDvolume=".$IDvolume." AND p.IDsection=s.ID ORDER BY p.pageFirst, p.IDsection ");
// p.ID, p.title AS ptitle, p.title_en AS ptitle_en, s.title AS stitle, p.tmp_author,  p.abstract_ua, p.abstract_en, p.udk, p.pageFirst, p.pageLast
$section0="";
?>

<p style=" font-size:12px; color:#333333;"><strong><? echo $year;?> .- <? echo $issue; ?> </strong></p>

<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/series/v_'.$IDvolume.'.pdf';
if (file_exists($filename)) 
{
?>
   <a style="border:0;" href="../doc/series/v_<? echo $IDvolume; ?>.pdf" target="_blank">  <img src="img/pdf_button.png" title="файл з повнотекстовим змістом" /> </a>
<?
   
} 
?>



<table class="tdata">
<?
$ind=0;
while($line = mysql_fetch_array($result, MYSQL_ASSOC))
{ $section=$line["stitle"];
  $title=$line["title"];
  $title_en=$line["title_en"];  
  $tmp_author=$line["tmp_author"];
  $udk=$line["udk"];  
  $abstract_ua=$line["abstract_ua"]; 
  $keyWords_ua=$line["keyWords_ua"];   
 
  $abstract_en=$line["abstract_en"];  
  $keyWords_en=$line["keyWords_en"]; 
  $abstract_ru=$line["abstract_ru"];  
  $keyWords_ru=$line["keyWords_ru"];      
  $pageFirst=$line["pageFirst"];  
  $pageLast=$line["pageLast"]; 
  $ID=$line["ID"];   

  if($section0 != $section)
  { $section0=$section;
    $ind=0;
  ?>
    <tr><td colspan="2"> <a href='#top' > <img src='../css/img/up.gif' border=0/> </a> <? echo $section;  ?> </td></tr>     
    <tr> 
          <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="600" height="16"></td>
    </tr>
  <?
  }
  $result2=ExecuteQuery("SELECT p.* FROM personality p, paperAuthor pa  WHERE p.ID=pa.IDperson AND pa.IDpaper=".$ID." ORDER BY pa.IDpaper");  
  $ii=0;
  $n=mysql_num_rows($result2); 
  ?>   
  
  
              
  
   
  <tr align='left' valign='top' onmouseover="this.style.backgroundColor='#FFFF99';" 
  onmouseout="this.style.backgroundColor='#<?  if($ind % 2) echo "FFFFFF"; else echo "FFFFCC";?>';" 
  bgcolor='#<? if($ind % 2) echo "FFFFFF"; else echo "FFFFCC"; $ind++;?>'> 
  <td colspan=2>  
  <table class="tdata">
  <tr>
  <td colspan=2>
  
<?
	if($n>0)
	{
	while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
    { $IDperson=$line2["ID"];
      $name=$line2["name"];
	  $scideg=$line2["scideg"];
	  $scipos=$line2["scipos"];	
	  $position=$line2["position"];	
	  $IDinst=$line2["inst"];	
	  $IDdep=$line2["IDdep"];	
	  $IDsubdep=$line2["IDsubdep"];		  
	  if($ii) echo ", ";
?>
<a href="javascript:void(0);" onMouseOver="return overlib(
<?	  
echo "'";
	  if($scipos!="") echo $scipos." ";
      echo $name;
      if($scideg!="") echo ", ".$scideg;
	  if($position!="") echo ", ".$position;	
	  if($IDinst!=112 && $IDinst!='') { echo ", "; printTitle("institutions", $IDinst);}
	  if($IDinst==112) echo ", КНУ";
	  if($IDdep!=0 && $IDdep!='') { echo ", "; printTitle("department", $IDdep);}else echo $IDdep;	  
	  if($IDsubdep!=0 && $IDsubdep!='') { echo ", "; printTitle("subdep", $IDsubdep);}  else echo $IDdep;
echo "'";
?>	  ,TEXTFONT,'Verdana, Arial');" onMouseOut="return nd();" class='footer_links'><?    echo LFF($name) ?> </a>


<?      
	  $ii++;
    }
	}else
	{ echo $tmp_author;
	}
	
	?>    
      </td>
  </tr>     
   
<!--------------------------------------------------------------
-->  
  <tr>
      <td width="700">
<?php


$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/papers/'.$ID.'.pdf';
if (file_exists($filename)) 
{
?>
   <a style="border:0;" href="http://evisnyk.unicyb.kiev.ua/doc/papers/<? echo $ID; ?>.pdf" target="_blank">  <img src="img/pdf_button.png" title="файл з повнотекстовим змістом" /> </a>
<?  
} 
?>  
<img src='img/plus.gif' id="img_paper_<? echo $ID; ?>" onClick=" togglePaperExpanded ('<? echo $ID; ?>');" />
  
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($title, 0); 
	   } else echo $title; 
?>    
      </td>
      <td width="80" align="right">
      <? if($pageFirst!=0) echo "C. ".$pageFirst; ?><? if($pageLast!=0) echo  " - ".$pageLast."."; else echo "."; ?>
      </td>
</tr>
<tr>
<td colspan="2">
<div id="content_paper_<? echo $ID;?>" style="display:none">
<!-- 
-->
<table style="text-align:justify">
<? if($udk != "")
   {
?>       
<tr><td class="title_colomn"> УДК </td> <td style="font-size:10px; color: #333333;  background:#FFFFCC;"><? echo $udk; ?></td></tr>    
<? }
   if($abstract_ua != "")
   {
?> 
    <tr><td class="title_colomn"> анотація </td> 
    <td style="font-size:10px; color: #333333; background:#FFFFCC;">    
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($abstract_ua, 0); 
	   } else echo $abstract_ua; 
?> 
    </td>
    </tr> 
<? }
   if($keyWords_ua != "")
   {
?> 
    
    <tr><td class="title_colomn"> ключові слова </td> <td style="font-size:10px; color: #333333;  background:#FFFFCC;">
<?  echo $keyWords_ua; 
?> 	 
    </td></tr>    
<? }
   if($title_en != "")
   {
?>      
    <tr><td class="title_colomn"> title </td> <td style="font-size:10px; color: #333333;  background:#FFFFCC;">
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($title_en, 0); 
	   } else //echo strtoupper($title_en); 
	   echo $title_en; 
?>   
    </td></tr> 
<? }
   if($abstract_en != "")
   {
?> 
    
    <tr><td class="title_colomn"> abstract </td> <td style="font-size:10px; color: #333333;  background:#FFFFCC;">
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($abstract_en, 0); 
	   } else echo $abstract_en; 
?> 	 
    </td></tr>    
<? }
   if($keyWords_en != "")
   {
?> 
    
    <tr><td class="title_colomn"> keywords </td> <td style="font-size:10px; color: #333333;  background:#FFFFCC;">
<?  echo $keyWords_en; 
?> 	 
    </td></tr>    
<? }
  if($title_ru != "")
   {
?>      
    <tr><td class="title_colomn"> название </td> <td style="font-size:10px; color: #333333;  background:#FFFFCC;">
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($title_ru, 0); 
	   } else //echo strtoupper($title_en); 
	   echo $title_ru; 
?>   
    </td></tr> 
<? }
   if($abstract_ru != "")
   {
?> 
    
    <tr><td class="title_colomn"> аннотация </td> <td style="font-size:10px; color: #333333;  background:#FFFFCC;">
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($abstract_ru, 0); 
	   } else echo $abstract_ru; 
?> 	 
    </td></tr>    
<? }
   if($keyWords_ru != "")
   {
?> 
    
    <tr><td class="title_colomn"> ключевые слова </td> <td style="font-size:10px; color: #333333;  background:#FFFFCC;">
<?  echo $keyWords_ru; 
?> 	 
    </td></tr>    
<? }
?> 
  
    
    
    
</table>
</div>

</td>
</tr>  
  
  </table>
  </td>
  </tr>
  <tr> <td colspan=2>&nbsp;  </td> </tr>
<?  
   
}

?>
