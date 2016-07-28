<?php
header('Content-Type: text/plain; charset=windows-1251');
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

<style>
.paperInfo
{ text-align:justify; 
  font-size:10px; 
  color: #333333;  
  background:#FFFFCC;
}
.paperInfoItems
{ font-size:10px;
  font-style:italic;
  width: 100px;
  border:1px; border:#FF9933; 
  background: #FFCC66;
}
.paperTitle
{ font-size:12px;
  text-transform:capitalize;
}
</style>

<table class="tdata">
<?
$ind=0;


while($line = mysql_fetch_array($result, MYSQL_ASSOC))
{ $section=$line["stitle"];
  $title=array('укр.'=>$line["title"], 'англ.'=>$line["title_en"], 'рос.'=>$line["title_ru"]);
  $abstract=array('укр.'=>$line["abstract_ua"], 'англ.'=>$line["abstract_en"], 'рос.'=>$line["abstract_ru"]);
  $keyWords=array('укр.'=>$line["keyWords_ua"], 'англ.'=>$line["keyWords_en"], 'рос.'=>$line["keyWords_ru"]);    
  $tmp_author=$line["tmp_author"];
  $udk=$line["udk"];  
  $pageFirst=$line["pageFirst"];  
  $pageLast=$line["pageLast"]; 
  $ID=$line["ID"];   
  $lang=$line["lang"];   

  $T_titles=array('укр.'=>'Назва.&nbsp;','англ.'=>'Title.&nbsp;','рос.'=>'Название.&nbsp;');	
  $A_titles=array('укр.'=>'Анотація.&nbsp;','англ.'=>'Abstract.&nbsp;','рос.'=>'Аннотация.&nbsp;');	
  $K_titles=array('укр.'=>'Ключові слова:&nbsp;','англ.'=>'Key words:&nbsp;','рос.'=>'Ключевые слова:&nbsp;');	
  $U_titles=array('укр.'=>'УДК&nbsp;&nbsp;','англ.'=>'UDC&nbsp;&nbsp;','рос.'=>'УДК&nbsp;&nbsp;');	


  if($section0 != $section)
  { $section0=$section;
    $ind=0;
  ?>
    <tr><td colspan="2"> <a href='#top' > <img src='../css/img/up.gif' border=0/> </a> <? echo $section;  ?> </td></tr>     

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
	  $IDinst=$line2["IDinst"];	
	  $IDdep=$line2["IDdep"];	
	  $IDsubdep=$line2["IDsubdep"];		  
	  if($ii) echo ", ";
?>

<a class="footer_links" onmouseover="this.style.cursor='pointer';" 
title="<?php 


	  if($scipos!="") echo $scipos." ";
      echo $name;
      if(trim($scideg)!="") echo ", ".$scideg;  
	  
	  if($IDinst==112)
	  { echo ", КНУ";
	    if($IDdep) { echo ", "; printTitle("department", $IDdep);}
		if(trim($position) != "") echo ", ".$position;	
	    if($IDsubdep) 
		{ //echo " ".getTitle("subdep", $IDsubdep);
		echo " "; printTitle("subdep", $IDsubdep);
		}

	  }else
	  { if(trim($position) != "") echo ", ".$position;	    	 
	    if($IDinst) {echo ", "; printTitle("institutions", $IDinst);}
	  }
	 
?>"><?php  echo LFF($name); ?></a>
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
	   { echo parseFormula($title[$lang], 0); 
	   } else echo $title[$lang]; 
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
<table class="paperInfo">
<? if($udk != "")
   {
?>       
    <tr><td> <p><span class="paperInfoItems"> <? echo $U_titles[$lang]; ?> </span> <? echo $udk; ?></p></td></tr>    
<? }
   if($abstract[$lang] != "")
   {
?> 
    <tr><td> <p><span class="paperInfoItems"> <? echo $A_titles[$lang]; ?> </span> 
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($abstract[$lang], 0); 
	   } else echo $abstract[$lang]; 
?>  </p>
    </td>
    </tr> 
<? }
   if($keyWords[$lang] != "")
   {
?>     
    <tr><td><p><span class="paperInfoItems"> <? echo $K_titles[$lang]; ?> </span> <?  echo $keyWords[$lang]; ?></p></td></tr>    
<? }

   $langs=array('укр.','рос.','англ.');
   
   foreach ($langs as $k=>$l)
   { 
   if($lang != $l){ 

   if($title[$l] != "")
   {
?>      
    <tr><td><p><span class="paperInfoItems"><? echo $T_titles[$l]; ?> </span>
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($title[$l], 0); 
	   } else //echo strtoupper($title_en); 
	   echo $title[$l]; 
?>   
    </p></td></tr> 
<? }
   if($abstract[$l] != "")
   {
?> 
    
    <tr><td><p><span class="paperInfoItems"><? echo $A_titles[$l]; ?></span>
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($abstract[$l], 0); 
	   } else echo $abstract[$l]; 
?> 	 
    </p></td></tr>    
<? }
   if($keyWords[$l] != "")
   {
?> 
    
    <tr><td><p><span class="paperInfoItems"><? echo $K_titles[$l]; ?></span> 
<?  echo $keyWords[$l]; 
?> 	 
    </p></td></tr>    
<? }

     }
  }	 
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
