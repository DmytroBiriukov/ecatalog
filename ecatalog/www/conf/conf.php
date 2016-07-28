<?php
 $ID=$_GET['ID'];  
 include ("../is/src/evisnyk.php");
 $result1=ExecuteQuery("SELECT ch.*, c.title AS ctitle, c.title_ru AS ctitle_ru, c.title_en AS ctitle_en, c.description, c.type, c.established, c.frequency, c.url, c.responsible, c.address, c.phone, c.fax, c.email FROM confhold ch, conference c WHERE ch.IDconf=c.ID AND ch.ID=$ID ");
 $num_rows = mysql_num_rows($result1);
 if($num_rows)
 {
  if($line1 = mysql_fetch_array($result1, MYSQL_ASSOC))
  { $title=$line1["ctitle"];
    $IDconf=$line1["IDconf"];
	$short_title=$line1["subTitle"];
	$title_ru=$line1["ctitle_ru"];
	$title_en=$line1["ctitle_en"];	
	$description=$line1["description"];	
	$type=$line1["type"];
	$year=$line1["year"];
	$regdate=$line1["regdate"];
	$submitdate=$line1["submitdate"];
	$deadline=$line1["deadline"];
	$startdate=$line1["startdate"];
	$findate=$line1["findate"];
  } 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Електронний каталог конференцій Київського університету</title>
<meta content="<? echo $title; ?>, <? echo $short_title;?>, <? echo $title_ru; ?>, <? echo $title_en; ?>, наукова конференція, автореферат, дисертація, реферат, завантажити" name=Keywords>
<meta content="Електронний каталог конференцій Київського університету імені Тараса Шевченка. <? echo $description; ?>, " name=Description>
<link href="http://ecatalog.univ.kiev.ua/css/new.css" type="text/css" rel="STYLESHEET">
<link type="image/x-icon" rel="shortcut icon" href="http://ecatalog.univ.kiev.ua/css/img/logo3.ico">
<script type="text/javascript" src="http://ecatalog.univ.kiev.ua/src/script.js"></script>
<script language="javascript">
function hideAll()
{ for(var i=1; i <= 7; i++) 
  {	var e = document.getElementById("tab_"+i);
    e.style.display = 'none';
  }
}
function showTab(n)
{ var e = document.getElementById("tab_"+n);
  e.style.display = 'block';
}
function hideAllshowTab(n)
{ hideAll(); showTab(n);
}
</script>
</head>

<body>
<div id="header"></div>
<div id="subheader">
<div id="indexlinkline">&gt; <a href="http://evisnyk.unicyb.kiev.ua/conf/">Конференції</a> \ <h1><?php echo $title; ?></h1>
	</div>
</div>
<div id="collection_cover">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top">
  <div id="collection_menu"> 
     <div class="menuitem"><a onClick="hideAllshowTab(1);">Опис&nbsp;</a></div>
     <div class="menuitem"><a onClick="hideAllshowTab(2);">Організаційний&nbsp;комітет</a></div>
     <div class="menuitem"><a onClick="hideAllshowTab(3);">Пошук</a></div>
     <div class="menuitem"><a onClick="hideAllshowTab(4);">Секції</a></div>	 
     <div class="menuitem"><a onClick="hideAllshowTab(5);">Доповіді</a></div>	
	 <div class="menuitem"><a onClick="hideAllshowTab(6);">Місце&nbsp;проведення</a></div>	     
     <div class="menuitem"><a onClick="hideAllshowTab(7);">Умови&nbsp;участі</a></div>	  
<?  $curdate="20".date("y-m-d");
    if( $curdate >= $regdate &&  $curdate < $deadline)
	{
?>      <form name="appform" action="appform.php" method="post">
  			<input type="hidden" name="STATE" value="1">
			<input type="hidden" name="ID" value="<?php echo $ID; ?>">
		</form>  
        
        <div class="menuitem"><a onClick="document.appform.submit();">Зареєструватися</a></div>
<?
    }
	//echo $curdate." >=".$regdate." && ".$curdate." < ".$deadline;
?>	        
  </div><!-- end catalog menu left-->
  </td>   
  <td>
<div id="collection_body">
<div id="tab_1"><div class="volumeInfo">

<img src="http://evisnyk.unicyb.kiev.ua/doc/img/conf_cv_<? echo $line1['ID']; ?>.jpg" title="<? echo $line1["subTitle"]; ?>" width="133" height="191" class="cvimg"/> 

<? echo "<h1>".$title."</h1>"; ?>
<? echo "<h2>".$short_title."</h2>"; ?>
<div class='paperInfo'>
<p><?  echo $line1['description'];?></p>
<p><span class='paperInfoItems'>Рік:</span> <? echo $line1['year'];?></p>
<p><span class='paperInfoItems'>Місце проведення:</span> <? echo $line1['city'];?></p>
<p><span class='paperInfoItems'>Статус (міжнар./всеукр./студ.):</span> <? echo $line1['type']; ?></p> 
<?	  echo "<p><span class='paperInfoItems'>Започаткована (рік):</span> ".$line1['established']."</p>"; 
	  echo "<p><span class='paperInfoItems'>Періодичність:</span> ".$line1['frequency']."</p>"; 
 	  echo "<p><span class='paperInfoItems'>Відповідальна особа:</span> ".$line1['responsible']."</p>"; 
	  echo "<p><span class='paperInfoItems'>Адреса для листування:</span> ".$line1['address'].", тел.: ".$line1['phone'].", факс: ".$line1['fax'].", <a href='mailto:".$line1['email']."'>е-пошта</a>, <a href='".$line1['url']."'>веб-сторінка</a></p></div>"; 	
?>

<?    echo "<p>Дата початку регістрації учасників: ".$line1["regdate"]."</p><p>Дата подачі доповідей: ".$line1["submitdate"]."</p><p> Завершення подачі доповідей: ".$line1["deadline"]."</p><p> Початок конференції: ".$line1["startdate"]."</p><p> Завершення конференції: ".$line1["findate"]."</p>";  ?>

	</div>
</div>
<!-- Org commity
-->
<div id="tab_2" style="display:none;">
<h2 style="padding:20px 0 0 0;">Організаційний комітет</h2>                           

<?php

  $result5=ExecuteQuery("SELECT ebc.position AS edtPosition, p.name, p.scideg, p.scipos, ebc.ID FROM conforgcom ebc, personality p WHERE ebc.IDconf=".$ID." AND ebc.IDperson = p.ID ORDER BY ebc.position");

// general members
  $generalMembers=array();
  $generalMembers_ID=array();
// local members
  $localMembers=array();
  $localMembers_ID=array();  
  //'head', 'deputy', 'generalmem', 'localmem', 'secretary', 'techsecretary'
  $IDchief_editor=0;
  $chief_editor="";
  $execute_editor="";
  $secretary="";
  $techsecretary="";
  $deputy="";
  
  while($line = mysql_fetch_array($result5, MYSQL_ASSOC))
  { switch($line['edtPosition'])
    { case "head": $chief_editor=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDchief_editor=$line['ID']; break;
	  case "deputy": $deputy=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDdeputy_editor=$line['ID']; break;
	  case "localmem": $localMembers[]=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $localMembers_ID[]=$line['ID']; break;	  
	  case "secretary": $secretary=$line['name']; $IDsecretary_editor=$line['ID']; break;
	  case "techsecretary": $techsecretary=$line['name']; $IDtechsecretary_editor=$line['ID']; break;
	  default : $generalMembers[]=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $generalMembers_ID[]=$line['ID']; break;
    } 
  }
  mysql_free_result($result5);
  
?>   
         <table width="500">
           <tr>
              <th>Голова
              </th>
              <td>                         
			  <?php 
			   if($chief_editor!="")
			   { echo $chief_editor;
			   } else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
		   <tr>
              <th>Заступник голови
              </th>
              <td>                         
			  <?php if($deputy!="")
			  { echo $deputy;
			  }
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <tr>
              <th>Члени організаційного комітету 
              </th>
              <td>                         
			<?php 
			  $n=count($generalMembers);
			  if($n>0) 
			  { for($i=0; $i<$n; $i++ ) 
			    { echo $generalMembers[$i]; 
			    } 
			  } 
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <tr>
              <th>Члени локального орг. комітету 
              </th>
              <td>                         
			<?php 
			  $n=count($localMembers);
			  if($n>0) 
			  { for($i=0; $i<$n; $i++ ) 
			    { echo $localMembers[$i]; 
			    } 
			  } 
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <tr>
              <th>Вчений секретар
              </th>
              <td>                         
			  <?php if($secretary!="") echo $secretary; 
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <tr>
              <th>Технічний секретар
              </th>
              <td>                         
			  <?php if($techsecretary!="") echo $techsecretary; 
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
       </table>         

</div>
<!-- Search
-->
<div id="tab_3" style="display:none;">
<h2 style="padding:20px 0 0 0;">Пошук публікацій</h2>                           
<div id="catalog_search">
<form id="sbform" name="sbform" enctype="application/x-www-form-urlencoded" action="javascript: updateTag('searchresult','../is/src/responses/updateSearchTag.php?within=no&author='+encodeURIComponent(document.sbform.st1.value)+'&title='+encodeURIComponent(document.sbform.st2.value)+'&abstract='+encodeURIComponent(document.sbform.st3.value)+'&lc='+document.sbform.lc_0.checked,''); "  method="get">

	<table>
    <tbody>
      <tr>
          <td class="title_colomn">за автором </td>
          <td><input id="st1" name="author" type="text">
          </td>
      </tr>
      <tr>
          <td class="title_colomn">за назвою </td>
          <td><input id="st2" name="title" type="text">                    
          </td>
      </tr>
      <tr>
          <td class="title_colomn">за словами в анотації</td>
          <td><input id="st3" name="abstract" type="text">
          </td>
      </tr>
      <tr>
                <td class="title_colomn">логічна зв'язка</td>
                <td class="tdata">
                  <label>
                    <input name="lc" value="AND" id="lc_0" type="radio">
                    логічне "і"</label>
                  
                  <label>
                    <input name="lc" value="OR" id="lc_1" checked="checked" type="radio">
                    логічне "або"</label>
                </td>
              </tr>              
              <tr>
                <td colspan="2" align="right"> 
                                                        <div class="submitButton">&nbsp;
            <a class="ub_dark" href="javascript:document.sbform.submit();" onMouseOver="window.status='';return true;">Знайти публікації</a> &nbsp; &nbsp; 
            <a class="ub_light" href="javascript:document.sbform.reset();">Змінити параметри</a><br>&nbsp; 
        		                       </div>
                </td>
      </tr>          
    </tbody>
    </table>
    <input name="within" value="no" type="hidden">
</form>					      
</div>
<div id="searchresult">
</div> 
</div>

<div id="tab_4" style="display:none;">
<h2 style="padding:20px 0 0 0;">Секції</h2>                           
<ol>							
<?php
   $result4=ExecuteQuery("SELECT title, ID FROM confsection WHERE IDconf=".$ID." ORDER BY ID ");
   while($line4 = mysql_fetch_array($result4, MYSQL_ASSOC))
   {  $sec_title=$line4['title'];
      $sec_ID=$line4["ID"];    
?>	   
    <li>
<? if($sec_title!='') echo $sec_title; else echo "<em>без назви</em>"; ?>
   </li>      
<?php	  
   }
?>


   
</ol> 
</div>

<div id="tab_5" style="display:none;">
<h2 style="padding:20px 0 0 0;">Доповіді</h2> 
    <table>
<?php

$result6=ExecuteQuery("SELECT s.title AS stitle, s.ID AS sID FROM confsection s WHERE s.IDconf=".$ID." ORDER BY s.ID");
while($line01 = mysql_fetch_array($result6, MYSQL_ASSOC))
{ $section=$line01["stitle"];
  $IDsection=$line01["sID"];
?>  
    <tr><td colspan=3><a href='#top' > <img src='img/up.gif' border=0/> </a> <? echo $section;  ?></td></tr>
<?    
    $query7="SELECT p.ID, p.title AS ptitle, p.title_ru AS ptitle_ru, p.title_en AS ptitle_en, p.tmp_author, p.abstract_ua, p.abstract_en, p.abstract_ru, p.udk, p.pageFirst, p.pageLast, p.keyWords_ua, p.keyWords_en, p.keyWords_ru, p.lang, p.file_ext FROM confreport p WHERE p.IDconfhold=".$ID." AND p.IDsection=".$IDsection." ORDER BY p.ID";
//	echo $query7;
    $result7=ExecuteQuery($query7);
	$ind=0;
	while($line = mysql_fetch_array($result7, MYSQL_ASSOC))
	{
      $IDreport=$line["ID"];  
	  $ind++;
	  $title=$line["ptitle"];
	  $title_en=$line["ptitle_en"];	  
	  $title_ru=$line["ptitle_ru"];	  	  
      $tmp_author=$line["tmp_author"];
      $udk=$line["udk"];  
	  $lang=$line["lang"];
	  
      $abstract_ua=$line["abstract_ua"]; 
      $abstract_en=$line["abstract_en"]; 
      $abstract_ru=$line["abstract_ru"]; 	   

      $keyWords_ua=$line["keyWords_ua"]; 
      $keyWords_en=$line["keyWords_en"]; 
      $keyWords_ru=$line["keyWords_ru"]; 
	  
      $pageFirst=$line["pageFirst"];  
      $pageLast=$line["pageLast"];  
	  $file_ext=$line["file_ext"];

?>
<tr align='left' valign='top' onMouseOver="this.style.backgroundColor='#FFFF99';" 
  onmouseout="this.style.backgroundColor='#<?  if($ind % 2) echo "FFFFFF"; else echo "FFFFCC";?>';" 
  bgcolor='#<? if($ind % 2) echo "FFFFFF"; else echo "FFFFCC"; $ind++;?>'>
    <td>
<?php 
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/reports/'.$IDreport.'.'.$file_ext;
if (file_exists($filename)) 
{?><a href="../doc/reports/<? echo $IDreport."'.'".$file_ext; ?>" target="_blank">файл внесено<img src="img/<? echo $file_ext; ?>.png"  width="25" height="25" /></a> 
<? 
} 	
?>
</td><td><?	echo $title; ?> </td>
<td> <?	echo $pageFirst."-".$pageLast; ?> </td>
    
    </tr>
<?	
   } 
}  
?> 
</table>
</div>

<div id="tab_6" style="display:none;">
6
</div>

<div id="tab_7" style="display:none;">
7
</div>


</div>     
  </td>   
</tr>
</table>
	<div id="footer">
      <p>&copy;2009&ndash;<script type=text/javascript>document.write((new Date()).getFullYear());</script>
         <a href="#top"> Київський національний університет імені Тараса Шевченка </a>
         &nbsp;|&nbsp;<a href="mailto:birjukov@unicyb.kiev.ua"><img src="http://ecatalog.univ.kiev.ua/img/dev.png" title="розробник" border=0/></a>
	  </p>		
	</div>
</div>

</body>
</html>
<?php
}
?>