<?
 $ID=$HTTP_GET_VARS['ID'];
 include ("src/evisnyk.php");
 
 $pRef=paperReference($ID);
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

if($pRef["exists"]=="yes")
{ 
?>  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Електронний каталог періодичних видань Київського університету</title>
<meta name="keywords" content="<?php echo $ext_authors; ?>, <?php echo $ptitle; ?>, <?php echo $colljourntitle; ?>">
<meta name="description" content="стаття в ІС Електронний каталог періодичних видань Київського університету, опублікована в науковому виданні <?php echo $colljourntitle; ?>, посилання - <?php echo $ref; ?>">
<link type="image/x-icon" rel="shortcut icon" href="http://ecatalog.univ.kiev.ua/css/img/logo3.ico">
<link href="http://ecatalog.univ.kiev.ua/css/new.css" type="text/css" rel="STYLESHEET">
<script type="text/javascript" src="http://ecatalog.univ.kiev.ua/src/script.js"></script>
</head>
<body>
<div id="header" style="background:url(../img/h_<? echo $IDcolljourn; ?>.gif) no-repeat; height:125px;"></div>
<div id="subheader">
    <div id="linkline">&gt;<a href="../">Каталог</a> \ <h1><a href="http://ecatalog.univ.kiev.ua/c_<? echo $IDcolljourn; ?>/"><?php echo $colljourntitle;   ?></a></h1>
	</div>
	<div id="fontsizing"> 
               <a href="javascript: fontDecrease('textpart');"><img src="../css/img/font_smaller.png" title="зменшити" width="25" height="30" border="0" onMouseOver="this.src='../css/img/font_smaller.jpg';" onMouseOut="this.src='../css/img/font_smaller.png';"></a>                             			  
               <a href="javascript: fontReset('textpart');"><img src="../css/img/font_reset.png" title="розмір шрифта" width="25" height="30" border="0" onMouseOver="this.src='../css/img/font_reset.jpg';" onMouseOut="this.src='../css/img/font_reset.png';"></a>               
               <a href="javascript: fontIncrease('textpart');"><img src="../css/img/font_larger.png" title="збільшити" width="25" height="30" border="0" onMouseOver="this.src='../css/img/font_larger.jpg';" onMouseOut="this.src='../css/img/font_larger.png';" onClick="document.linkColor='#FFFFFF'; "></a>
	</div>			   
</div>
<div id="collection_cover"><!-- Journal + Paper block-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top">
  <div id="collection_menu"> 
  <h1><? echo $colljourntitle; ?></h1><p>
    
     <?php if($tab == "collection") echo "науковий збірник "; else echo "науковий журнал";
	 
       echo "</p><p>ISSN $ISSN</p>";
	   echo "<p>$year.- $issue</p>";
     ?>

<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/series/v_'.$IDvolume.'.pdf';
if (file_exists($filename)) 
{
?>
   <p><a style="border:0;" href="http://ecatalog.univ.kiev.ua/virt/series/v_<? echo $IDvolume; ?>.pdf" target="_blank">  
   <img src="http://ecatalog.univ.kiev.ua/img/pdf.png" title="файл з повнотекстовим змістом" /> </a></p>
<?  
} 
?>    
  </div><!-- end catalog menu left-->
  </td>
  <td valign="top">
  <div id="collection_body">
  
  <table class="paperInfo"><!-- Paper block-->
    <tr><td td colspan="2"> 
<?      
echo $link_authors;
?>       
    </td></tr> 
     <tr>
        <td class="paperTitle" width="700"> 
<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/papers/'.$ID.'.pdf';
if (file_exists($filename)) 
{
?>
   <a style="border:0;" href="http://ecatalog.univ.kiev.ua/virt/papers/<? echo $ID; ?>.pdf" target="_blank">  <img src="http://ecatalog.univ.kiev.ua/img/pdf.png" title="файл з повнотекстовим змістом" /> </a>
<?  
} 
  $query=" SELECT p.* FROM paper p WHERE p.ID=".$ID." "; 
  $result=ExecuteQuery($query);	
  if($line = mysql_fetch_array($result, MYSQL_ASSOC))
  {
    $title=array('укр.'=>$line["title"], 'англ.'=>$line["title_en"], 'рос.'=>$line["title_ru"]);
    $abstract=array('укр.'=>$line["abstract_ua"], 'англ.'=>$line["abstract_en"], 'рос.'=>$line["abstract_ru"]);
    $keyWords=array('укр.'=>$line["keyWords_ua"], 'англ.'=>$line["keyWords_en"], 'рос.'=>$line["keyWords_ru"]);    
    $udk=$line["udk"];  
    $pageFirst=$line["pageFirst"];  
    $pageLast=$line["pageLast"]; 
    $lang=$line["lang"];   
  }
  

  $T_titles=array('укр.'=>'Назва.&nbsp;','англ.'=>'Title.&nbsp;','рос.'=>'Название.&nbsp;');	
  $A_titles=array('укр.'=>'Анотація.&nbsp;','англ.'=>'Abstract.&nbsp;','рос.'=>'Аннотация.&nbsp;');	
  $K_titles=array('укр.'=>'Ключові слова:&nbsp;','англ.'=>'Key words:&nbsp;','рос.'=>'Ключевые слова:&nbsp;');	
  $U_titles=array('укр.'=>'УДК&nbsp;&nbsp;','англ.'=>'UDC&nbsp;&nbsp;','рос.'=>'УДК&nbsp;&nbsp;');	  

?>      
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($title[$lang], 0); 
	   } else echo mb_strtoupper($title[$lang],'UTF8'); 
?>    
      </td>
      <td width="80" align="right">
      <? echo $pages; ?>
      </td>
    </tr>
<? if($udk != "")
   {
?>       
    <tr><td td colspan="2"> <p><span class="paperInfoItems"> <? echo $U_titles[$lang]; ?> </span> <? echo $udk; ?></p></td></tr>    
<? }
   if($abstract[$lang] != "")
   {
?> 
    <tr><td td colspan="2">  <p><span class="paperInfoItems"> <? echo $A_titles[$lang]; ?> </span> 
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
    <tr><td td colspan="2"> <p><span class="paperInfoItems"> <? echo $K_titles[$lang]; ?> </span> <?  echo $keyWords[$lang]; ?></p></td></tr>    
<? }

   $langs=array('укр.','рос.','англ.');
   
   foreach ($langs as $k=>$l)
   { 
   if($lang != $l){ 

   if($title[$l] != "")
   {
?>      
    <tr><td td colspan="2"><p><span class="paperInfoItems"><? echo $T_titles[$l]; ?> </span>
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
    
    <tr><td td colspan="2"><p><span class="paperInfoItems"><? echo $A_titles[$l]; ?></span>
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($abstract[$l], 0); 
	   } else echo $abstract[$l]; 
?> 	 
    </p></td></tr>    
<? }
   if($keyWords[$l] != "")
   {
?> 
    
    <tr><td td colspan="2"> <p><span class="paperInfoItems"><? echo $K_titles[$l]; ?></span> 
<?  echo $keyWords[$l]; 
?> 	 
    </p></td></tr>    
<? }

     }
  }	 
?> 
<tr><td colspan="2"> <p><span class="paperInfoItems">Бібліографічне посилання [<?php echo $pRef["GOST"];?>]:&nbsp; </span><?php echo   $link_ref; ?></p>
</td>
</tr> 
    
</table> <!-- Paper block-->
  </div>      
      </td>
    </tr>    
</table> <!-- Journal + Paper block-->

</div>
<?php
} else
{
?>  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Електронний каталог періодичних видань Київського університету</title>
<link type="image/x-icon" rel="shortcut icon" href="http://ecatalog.univ.kiev.ua/css/img/logo3.ico">
<link href="http://ecatalog.univ.kiev.ua/css/new.css" type="text/css" rel="STYLESHEET">
</head>
<body>
    <div id="failure">
    <h1>Невірно вказаний ідентифікатор статті</h1>
    <p><a href="http://ecatalog.univ.kiev.ua/"> Перейти в каталог</a>
    </p>
    </div>  
<?php
}
?>
  <div id="footer">
      &copy; 2008 - <SCRIPT language=JavaScript type=text/javascript>document.write((new Date()).getFullYear());</SCRIPT>
      <a href="http://www.univ.kiev.ua" target="_blank">Київський національний університет імені Тараса Шевченка</A>
| <A  href="mailto:evisnyk@univ.kiev.ua"><img title="розробник" src="../img/dev.png"/></A>
	</div>
</div><!-- end catalog cover-->
</body>
</html>