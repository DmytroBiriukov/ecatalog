<?php 
//  header('Content-Type: text/plain; charset=windows-1251');
  $IDcollection=$_GET['ID'];
  include("../is/src/evisnyk.php");
  $resultc=ExecuteQuery("SELECT * FROM collection WHERE ID=$IDcollection");
  if($cline = mysql_fetch_array($resultc, MYSQL_ASSOC))
  { $title=$cline['title'];
    $title_ru=$cline['title_ru'];
    $title_en=$cline['title_en'];
    $short_title=$cline["shortTitle"];
    $description=$cline["description"];
	$description_en=$cline["description_en"];
	$description_ru=$cline["description_ru"];
    $ISSN=$cline["ISSN"];
	$ISSNonline=$cline["ISSNonline"];
	$format_type=$cline["format"];
    $tab=$cline["datatab"];
    $IDedsBoard=$cline["IDedsBoard"];		
  }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Електронний каталог періодичних видань Київського університету</title>
<meta content="<? echo stripslashes($title); ?>, <? echo stripslashes($short_title);?>, <? echo stripslashes($title_ru); ?>, <? echo stripslashes($title_en); ?>, наукові статті, наукові видання, автореферат, дисертація, реферат, завантажити" name=Keywords>
<meta content="Електронний каталог періодичних видань Київського університету імені Тараса Шевченка. <? echo stripslashes($description); echo stripslashes($description_en); echo stripslashes($description_ru); ?>. " name=Description>
<link href="http://ecatalog.univ.kiev.ua/css/new.css" type="text/css" rel="STYLESHEET">
<link type="image/x-icon" rel="shortcut icon" href="http://ecatalog.univ.kiev.ua/css/img/logo3.ico">
<script type="text/javascript" src="http://ecatalog.univ.kiev.ua/src/script.js"></script>
</head>
<body onLoad="updateTag('volumes', '/ecatalog/catalog/journal/volumes.php','ID=<? echo $IDcollection;?>');">
<div id="header" style="background:url(http://ecatalog.univ.kiev.ua/img/h_<? echo $IDcollection; ?>.gif) no-repeat; height:125px;"></div>
<div id="subheader">
    <div id="linkline">&gt;<a href="http://ecatalog.univ.kiev.ua/">Каталог</a> \ <h1><? echo $title; ?></h1>
	</div>
	<div id="fontsizing"> 
               <a href="javascript: fontDecrease('textpart');"><img src="http://ecatalog.univ.kiev.ua/css/img/font_smaller.png" title="зменшити" width="25" height="30" border="0" onMouseOver="this.src='http://ecatalog.univ.kiev.ua//css/img/font_smaller.jpg';" onMouseOut="this.src='http://ecatalog.univ.kiev.ua/css/img/font_smaller.png';"></a>                             			  
               <a href="javascript: fontReset('textpart');"><img src="http://ecatalog.univ.kiev.ua/css/img/font_reset.png" title="розмір шрифта" width="25" height="30" border="0" onMouseOver="this.src='http://ecatalog.univ.kiev.ua//css/img/font_reset.jpg';" onMouseOut="this.src='http://ecatalog.univ.kiev.ua/css/img/font_reset.png';"></a>               
               <a href="javascript: fontIncrease('textpart');"><img src="http://ecatalog.univ.kiev.ua/css/img/font_larger.png" title="збільшити" width="25" height="30" border="0" onMouseOver="this.src='http://ecatalog.univ.kiev.ua//css/img/font_larger.jpg';" onMouseOut="this.src='http://ecatalog.univ.kiev.ua/css/img/font_larger.png';"></a>
	</div>			   
</div>
<div id="collection_cover">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top">
<img src="http://ecatalog.univ.kiev.ua/img/space.gif" width="196" height="7" border="0"/>
  <div id="collection_menu"> 
     <div class="menuitem"><a href="javascript: updateTag( 'collection_body', '/ecatalog/catalog/journal/general.php','ID=<? echo $IDcollection;?>');">Опис&nbsp;видання</a></div>
     <div class="menuitem"><a href="javascript: updateTag( 'collection_body', '/ecatalog/catalog/journal/editorial.php','ID=<? echo $IDedsBoard;?>');">Редакційна&nbsp;коллегія</a></div>
     <div class="menuitem"><a href="javascript: updateTag( 'collection_body', '/ecatalog/catalog/journal/search.php','ID=<? echo $IDcollection;?>');">Пошук</a></div>
     <div class="menuitem"><a>Випуски</a></div>	 
     <div id="volumes">
     </div>
<form name="appform" action="http://scicon.univ.kiev.ua/ecatalog/is/appform.php" method="post" target="_blank"><input name="STATE" value="1" type="hidden"/><input name="ID" value="<? echo $IDcollection; ?>" type="hidden"/><input name="tab" value="collection" type="hidden"/></form>
     <div class="menuitem"><a href="javascript: document.appform.submit();" >Подати&nbsp;статтю</a></div>	 
     <div class="menuitem"><a href="http://ecatalog.univ.kiev.ua/c_<? echo $IDcollection; ?>/visnyk_template.doc" target="_blank">Правила&nbsp;оформлення&nbsp;статей</a></div>	 
     <div class="menuitem"><a href="http://vpc.univ.kiev.ua/" target="_blank">Веб-сторінка&nbsp;видавництва</a></div>	 
     <div class="menuitem"><a href="http://ecatalog.univ.kiev.ua/c_<? echo $IDcollection; ?>/assign_.pdf" target="_blank">Умови&nbsp;підписки</a></div>	 	 
  </div><!-- end catalog menu left-->
  </td>
  <td valign="top">
  <div id="collection_body">
  <img src="http://ecatalog.univ.kiev.ua/img/cv_<? echo $IDcollection; ?>.jpg" class="cvimg"/> 
<h1><? echo $title;?></h1>
<? switch ($format_type)
   {case 'both': echo "<p><strong>ISSN</strong> ".$ISSN."(print)</p><p><strong>ISSN</strong> ".$ISSNonline."(online)</p>"; break;
    case 'print': echo "<p><strong>ISSN</strong> ".$ISSN."(print)</p>"; break;
	case 'online': echo "<p><strong>ISSN</strong> ".$ISSNonline."(online)</p>"; break;
   }
   if($description!="") echo "<p>".$description."</p>";
   if($description_en!="") echo "<p>".$description_en."</p>";
   if($description_ru!="") echo "<p>".$description_ru."</p>";
   
   $result2=ExecuteQuery("SELECT sf.title FROM collection2scifield csf, scifield sf WHERE csf.IDcollection=$IDcollection AND sf.ID=csf.IDsciField");
?> <p><strong>Галузь наук:</strong> 
<? $iii=0;
   while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
   { if($iii) echo ", "; echo $line2['title']; $iii++;
   }   
   echo ".";
?> </p>
<?
   $result3=ExecuteQuery("SELECT DISTINCT c.ID, c.title FROM collection c, collection2scifield csf WHERE csf.IDcollection=c.ID  AND csf.IDsciField IN (SELECT IDsciField FROM collection2scifield WHERE IDcollection=$IDcollection)  AND c.IDinst=112");
?>   
   <p><strong>Схожі за напрямком досліджень видання:</strong> 
<? $iii=0;
   while($line3 = mysql_fetch_array($result3, MYSQL_ASSOC))
   { if($iii) echo ", "; echo "<a href='http://www.ecatalog.univ.kiev.ua/c_".$line3['ID']."/'>".$line3['title']."</a>"; $iii++;
   }   
   echo ".";
?> </p>
  
  </div> 
  </td>   
</tr>
</table>  
	<div id="footer">
      &copy; 2008 - <SCRIPT language=JavaScript type=text/javascript>document.write((new Date()).getFullYear());</SCRIPT>
      <a href="http://www.univ.kiev.ua" target="_blank">Київський національний університет імені Тараса Шевченка</A>
| <A  href="mailto:evisnyk@univ.kiev.ua"><img title="розробник" src="http://ecatalog.univ.kiev.ua/img/dev.png"/></A>
	</div>
</div><!-- end catalog cover-->
<div id="counter_part"></div>
</body>
</html>