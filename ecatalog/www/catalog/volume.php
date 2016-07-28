<?php 
  header('Content-Type: text/plain; charset=windows-1251');
 $IDvolume=$_GET['ID'];
 include("../is/src/evisnyk.php");
 
 $result9=ExecuteQuery("SELECT description_ua, description_en, datatab, issue, year, ID FROM volume WHERE IDvolume=".$IDvolume." ");

 if(mysql_num_rows($result9) > 0 )
 { $line9 = mysql_fetch_array($result9, MYSQL_ASSOC);
   $description_ua=$line9['description_ua'];
   $description_en=$line9['description_en'];  
   $datatab=$line9['datatab'];
   $year=$line9['year'];
   $issue=$line9['issue']; 
   $IDcolljourn= $line9['ID']; 
 
   $result3=ExecuteQuery("SELECT abstractFormat, title FROM collection WHERE ID=".$IDcolljourn." ");
   if($line3 = mysql_fetch_array($result3, MYSQL_ASSOC))
   { $ctitle=$line3['title'];  
     $abstractFormat=$line3['abstractFormat'];
   } 
   mysql_free_result($result3);    
?>             
     <h2><? echo $ctitle.".&#8212 ".$year.".&#8212 ".$issue; ?></h2>
     <div class="volumeInfo">	
     <p><? echo $description_ua;?></p>
     <p><? echo $description_en;?></p>
     </div>
<?      
 }  
 mysql_free_result($result9);

 $result=ExecuteQuery("SELECT p.*, s.title AS stitle FROM paper p, section s WHERE p.IDvolume=".$IDvolume." AND p.IDsection=s.ID ORDER BY p.pageFirst, p.IDsection ");
 $section0="";


   $filename = $_SERVER['DOCUMENT_ROOT'].'/doc/v_'.$IDvolume.'.pdf';
   if (file_exists($filename)) 
   {
?>
   <a style="border:0;" href="http://ecatalog.univ.kiev.ua/virt/series/v_<? echo $IDvolume; ?>.pdf" target="_blank">  <img src="../css/img/pdf_button.png" title="файл з повнотекстовим змістом" /> </a>
<?
   } 
   
   
?>   

<table>
<?
$ind=0;
while($line = mysql_fetch_array($result, MYSQL_ASSOC))
{ $section=$line["stitle"];
  $title=array('укр.'=>$line["title"], 'англ.'=>$line["title_en"], 'рос.'=>$line["title_ru"]);
  $abstract=array('укр.'=>$line["abstract_ua"], 'англ.'=>$line["abstract_en"], 'рос.'=>$line["abstract_ru"]);
  $keyWords=array('укр.'=>$line["keyWords_ua"], 'англ.'=>$line["keyWords_en"], 'рос.'=>$line["keyWords_ru"]); 
  
  
  $ID=$line["ID"];
  $pRef=paperReference($line["ID"]);
  $ref=$pRef["ref"];
  $link_ref=$pRef["link_ref"];
  $f_author=$pRef["f_author"];
  $authors=$pRef["authors"];
  $ext_authors=$pRef["ext_authors"];
  $ptitle=$pRef["title"];
  $link_authors=$pRef["link_authors"];
  $all_authors= $pRef["all_authors"];
  
  $colljourntitle=$pRef["journal"];
  $pages=$pRef["pages"];
  $IDcolljourn=$pRef["IDcollection"]; 
  $tab=$pRef["cTab"];
  $ISSN=$pRef["cISSN"];
  $issue=$pRef["cIssue"];
  $IDvolume=$pRef["cIDVolume"]; 
  $year=$pRef["cYear"];  
  $abstractFormat=$pRef["abstractFormat"];
  
  
     
  $tmp_author=$line["tmp_author"];
  $udk=$line["udk"];  
  $pageFirst=$line["pageFirst"];  
  $pageLast=$line["pageLast"]; 
     
  $lang=$line["lang"];   

  $T_titles=array('укр.'=>'Назва.&nbsp;','англ.'=>'Title.&nbsp;','рос.'=>'Название.&nbsp;');	
  $A_titles=array('укр.'=>'Анотація.&nbsp;','англ.'=>'Abstract.&nbsp;','рос.'=>'Аннотация.&nbsp;');	
  $K_titles=array('укр.'=>'Ключові слова:&nbsp;','англ.'=>'Key words:&nbsp;','рос.'=>'Ключевые слова:&nbsp;');	
  $U_titles=array('укр.'=>'УДК&nbsp;&nbsp;','англ.'=>'UDC&nbsp;&nbsp;','рос.'=>'УДК&nbsp;&nbsp;');	


  if($section0 != $section)
  { $section0=$section;
  ?>
    <tr><td colspan="2"> <a href='#top' > <img src='http://ecatalog.univ.kiev.ua/css/img/up.gif' border=0/> </a> <? echo $section;  ?> </td></tr>     
    <tr> 
          <td colspan="2"><img src="http://ecatalog.univ.kiev.ua/css/img/left_nav_line.gif" alt="" width="600" height="16"></td>
    </tr>
  <?
  }
  ?>   
  
  <tr align='left' valign='top' onMouseOver="this.style.backgroundColor='#FFFF99';" 
  onmouseout="this.style.backgroundColor='#<?  if($ind % 2) echo "FFFFFF"; else echo "FFFFCC";?>';" 
  bgcolor='#<? if($ind % 2) echo "FFFFFF"; else echo "FFFFCC";?>'> 
  <td colspan=2> 
   
  <table class="paperInfo">
  <tr>
  <td colspan=2><p>
  
<? echo $link_authors;
?>    </p>
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
   <a style="border:0;" href="http://ecatalog.univ.kiev.ua/virt/papers/<? echo $ID; ?>.pdf" target="_blank">  <img src="http://ecatalog.univ.kiev.ua/img/pdf.png" title="файл з повнотекстовим змістом" /> </a>
<?  
} 
?>  
<img src='http://ecatalog.univ.kiev.ua/css/img/plus.gif' id="img_paper_<? echo $ID; ?>" onClick=" togglePaperExpanded ('<? echo $ID; ?>');" />
       <span class="paperTitle">
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($title[$lang], 0); 
	   } else echo $title[$lang]; 
?>     </span>      
      </td>
      <td width="80" align="right"><p><? echo $pages; ?></p>
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
     if($lang != $l)
     { 

   if($title[$l] != "")
   {
?>      
    <tr><td><p><span class="paperInfoItems"><? echo $T_titles[$l]; ?> </span>
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($title[$l], 0); 
	   } else echo $title[$l]; 
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
     <tr><td colspan="2"> <p><span class="paperInfoItems">Бібліографічне посилання [<?php echo $pRef["GOST"];?>]:&nbsp; </span><?php echo  $link_ref; ?></p>
         </td>
     </tr>  
</table>
</div>

</td>
</tr>
</table>
</td>
</tr>
<? 
  $ind++;
}
?>
</table>