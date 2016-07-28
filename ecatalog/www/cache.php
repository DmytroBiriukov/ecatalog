<?php

include("is/src/evisnyk.php");
//$dir_path="http://evisnyk.unicyb.kiev.ua/doc/";
// Library's server directory 
$dir_path="http://ecatalog.univ.kiev.ua/virt/";

/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   What 2 generate
 colection index + search | general  | editorials  | volume index   |        volumes     |
   1						  0				0				1					1 		 |	19
   1						  0				0				0					0		 |	16	
   0						  0				0				1					1		 |	3
   1						  1				1				1					1		 |  31   
 
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$mode=31;

// case (1) retreaving IDcollection from GET
//$IDcollection=$_GET["ID"];

// case (2) making constant array of IDcollection
//$IDcollections=array(98, 105, 131 );
//$IDcollections=array(104, 105, 108, 109, 110, 111, 112, 119, 121, 123, 129, 130, 131, 132, 134, 194, 212, 219, 6, 7, 8, 82, 83, 84, 85, 87, 88, 9, 90, 91, 92, 93, 94, 96, 98, 99);
$IDcollections=array(212, 112);

// case (3) taking all IDcollection from DB
/*
$IDcollections=array();
$i=0;
$result0=ExecuteQuery("SELECT ID FROM collection WHERE IDinst=112");
while($line0 = mysql_fetch_array($result0, MYSQL_ASSOC))
{ if($line0['ID']<124 || ($line0['ID'] > 128 && $line0['ID'] < 133) || $line0['ID']==194 || $line0['ID']==212)
  { $IDcollections[$i]=$line0['ID'];
    $i++;  
  }
}

*/
foreach($IDcollections as $IDcollection)
{ 
  $dirPath=$_SERVER['DOCUMENT_ROOT'].'/doc/c_'.$IDcollection;
 // mkdir( $dirPath, '0777' );
  $resultc=ExecuteQuery("SELECT * FROM collection WHERE ID=$IDcollection");
  while($cline = mysql_fetch_array($resultc, MYSQL_ASSOC))
  { $title=$cline['title'];
    $title_ru=$cline['title_ru'];
    $title_en=$cline['title_en'];
    $short_title=$cline["shortTitle"];
    $description=$cline["description"];
    $ISSN=$cline["ISSN"];
    $tab=$cline["datatab"];
    $IDedsBoard=$cline["IDedsBoard"];		
    $specDateFrom=$cline["specDateFrom"];
  }
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   
   Generating collection index file
   
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
  ob_start();  
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Електронний каталог періодичних видань Київського університету</title>
<link href="../css/new.css" type="text/css" rel="STYLESHEET">
<link  type="image/x-icon" rel="shortcut icon" href="../css/img/logo3.ico">
<meta content="<? echo $title; ?>, <? echo $short_title;?>, <? echo $title_ru; ?>, <? echo $title_en; ?>, наукові статті, наукові видання, автореферат, дисертація, реферат, завантажити" name=Keywords>
<meta content="Електронний каталог періодичних видань Київського університету імені Тараса Шевченка. <? echo $description; ?>, " name=Description>
<script type="text/javascript" src="../src/script.js"></script>
</head>
<body onLoad="updateTag( 'collection_body', 'general.htm', ''); updateTag('volumes', 'vol/index.htm', '');
updateTag('counter_part', '../src/counter.php?ref='+document.referrer+'&&IDcollection=<? echo $IDcollection; ?>', ''); ">
<div id="header" style="background:url(../img/h_<? echo $IDcollection; ?>.gif) no-repeat; height:125px;"></div>
<div id="subheader">
    <div id="linkline">&gt;<a href="../">Каталог</a> \ <h1><? echo $title; ?></h1>
	</div>
	<div id="fontsizing"> 
               <a href="javascript: fontDecrease('textpart');"><img src="../css/img/font_smaller.png" title="зменшити" width="25" height="30" border="0" onMouseOver="this.src='../css/img/font_smaller.jpg';" onMouseOut="this.src='../css/img/font_smaller.png';"></a>                             			  
               <a href="javascript: fontReset('textpart');"><img src="../css/img/font_reset.png" title="розмір шрифта" width="25" height="30" border="0" onMouseOver="this.src='../css/img/font_reset.jpg';" onMouseOut="this.src='../css/img/font_reset.png';"></a>               
               <a href="javascript: fontIncrease('textpart');"><img src="../css/img/font_larger.png" title="збільшити" width="25" height="30" border="0" onMouseOver="this.src='../css/img/font_larger.jpg';" onMouseOut="this.src='../css/img/font_larger.png';"></a>
	</div>			   
</div>
<div id="collection_cover">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top">
  <div id="collection_menu"> 
<img id="c_description" src="../css/img/collection-description-off.gif" onMouseOver="this.src='../css/img/collection-description-ovr.gif'" onMouseOut="this.src='../css/img/collection-description-off.gif'" onClick="this.src='../css/img/collection-description-on.gif'; updateTag( 'collection_body', 'general.htm', '');" style="cursor:pointer;"/>
<img id="c_edsboard" src="../css/img/collection-edsboard-off.gif" onMouseOver="this.src='../css/img/collection-edsboard-ovr.gif'" onMouseOut="this.src='../css/img/collection-edsboard-off.gif'" onClick="this.src='../css/img/collection-edsboard-on.gif'; updateTag('collection_body', 'editorial.htm', '');" style="cursor:pointer;"/>
<img id="c_search" src="../css/img/collection-search-off.gif" onMouseOver="this.src='../css/img/collection-search-ovr.gif'" onMouseOut="this.src='../css/img/collection-search-off.gif'" onClick="this.src='../css/img/collection-search-on.gif'; updateTag('collection_body', 'search.htm', '');" style="cursor:pointer;"/>
<img id="c_volumes" src="../css/img/collection-volumes-off.gif" onMouseOver="this.src='../css/img/collection-volumes-ovr.gif'" onMouseOut="this.src='../css/img/collection-volumes-off.gif'" 
onClick="this.src='../css/img/collection-volumes-on.gif'; updateTag( 'volumes', 'vol/index.htm', '');" style="cursor:pointer"/>
<div id="volumes">
</div>
<!--
<form name="appform" action="http://evisnyk.unicyb.kiev.ua/is/appform.php" method="post" target="_blank"><input name="STATE" value="1" type="hidden"/><input name="ID" value="<? echo $IDcollection; ?>" type="hidden"/><input name="tab" value="collection" type="hidden"/></form>
<img id="c_appform" src="../css/img/collection-appform-off.gif" onMouseOver="this.src='../css/img/collection-appform-ovr.gif'" onMouseOut="this.src='../css/img/collection-appform-off.gif'" onClick="this.src='../css/img/collection-appform-on.gif'; document.appform.submit();" style="cursor:pointer;"/>
<a href="http://ecatalog.univ.kiev.ua/c_<? echo $IDcollection; ?>/visnyk_template.doc" target="_blank" >
 <img border=0 id="c_rules" src="../css/img/collection-rules-off.gif" onMouseOver="this.src='../css/img/collection-rules-ovr.gif'" onMouseOut="this.src='../css/img/collection-rules-off.gif'" onClick="this.src='../css/img/collection-rules-on.gif';" style="cursor:pointer;"/>
</a>
<a href="http://vpc.univ.kiev.ua/" target="_blank" >
 <img border=0 id="c_publisher" src="../css/img/collection-publisher-off.gif" onMouseOver="this.src='../css/img/collection-publisher-ovr.gif'" onMouseOut="this.src='../css/img/collection-publisher-off.gif'" onClick="this.src='../css/img/collection-publisher-on.gif';" style="cursor:pointer;"/>
</a>
-->
  </div><!-- end catalog menu left-->
  </td>
  <td valign="top">
  <div id="collection_body"></div> 
  </td>   
</tr>
</table>  
  <div id="footer">
      &copy; 2008 - <SCRIPT language=JavaScript type=text/javascript>document.write((new Date()).getFullYear());</SCRIPT>
      <a href="http://www.univ.kiev.ua" target="_blank">Київський національний університет імені Тараса Шевченка</A>
| <A  href="mailto:evisnyk@univ.kiev.ua"><img title="розробник" src="../img/dev.png"/></A>
	</div>
</div><!-- end catalog cover-->
<div id="counter_part"></div>
</body>
</html>
<?
  $aFileName=$dirPath."/index.htm";
  $aFile=fopen($aFileName, "w");
  fwrite($aFile, ob_get_contents());
  fclose($aFile); 
  ob_end_clean();
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   
   Generating search file
   
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
  ob_start();  
?>
<div id="catalog_search">
<form id="sbform" name="sbform" action="javascript: updateTag('searchresult','../src/search.php?within=no&author='+document.sbform.st1.value+'&title='+document.sbform.st2.value+'&abstract='+document.sbform.st3.value+'&lc='+document.sbform.lc_0.checked,''); "  method="get">
    <table>
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
            <a class="ub_dark" href="javascript:document.sbform.submit();" onMouseOver="window.status='';return true;">Знайти публікації</a> 
            <a class="ub_light" href="javascript:document.sbform.reset();">Змінити параметри</a><br>&nbsp; 
            </div>                     
                </td>
      </tr>          
    </table>
    <input name="within" value="no" type="hidden">
</form>					      
</div>
<div id="searchresult">
</div> 
<?php  
  $aFileName=$dirPath."/search.htm";
  $aFile=fopen($aFileName, "w");
  fwrite($aFile, ob_get_contents());
  fclose($aFile); 
  ob_end_clean();
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   
   Generating general file
   
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
  ob_start();  
?>
<img src="../img/cv_<? echo $IDcollection; ?>.jpg" class="cvimg"/> 
<h1><? echo $title;?></h1>
<p>ISSN <? echo $ISSN;?></p>
<p><? echo $description;?></p>  
<?  
  $aFileName=$dirPath."/general.htm";
  $aFile=fopen($aFileName, "w");
  fwrite($aFile, ob_get_contents());
  fclose($aFile); 
  ob_end_clean();
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   
   Generating editorial file
   
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
  ob_start();  

if($IDedsBoard != '' && $IDedsBoard != 0)
{ $result3=ExecuteQuery("SELECT ebc.position AS edtPosition, p.name, p.scideg, p.scipos, ebc.ID FROM edsBoardContent ebc, personality p WHERE ebc.IDedsBoard=$IDedsBoard AND ebc.IDperson = p.ID ORDER BY ebc.ID");
  $result30=ExecuteQuery("SELECT address, ph1, ph2, fax FROM edsBoard WHERE ID=$IDedsBoard");
  if($line30 = mysql_fetch_array($result30, MYSQL_ASSOC))
  { $address=$line30['address']; $ph1=$line30['ph1']; $ph2=$line30['ph2']; $fax=$line30['fax'];
  }

  $IDeditors=array();
  $IDchief_editor=0;
  $IDordinary_editor=array();
  $chief_editor="";
  $execute_editor="";
  $secretary="";
  $techsecretary="";
  $deputy="";
  //'head','deputy','exec','secretary','techsecretary'
  while($line = mysql_fetch_array($result3, MYSQL_ASSOC))
  { switch($line['edtPosition'])
    { case "head": $chief_editor=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDchief_editor=$line['ID']; break;
	  case "deputy": $deputy=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDdeputy_editor=$line['ID']; break;
	  case "exec": $execute_editor=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDexecute_editor=$line['ID']; break;
	  case "secretary": $secretary=$line['name']; $IDsecretary_editor=$line['ID']; break;
	  case "techsecretary": $techsecretary=$line['name']; $IDtechsecretary_editor=$line['ID']; break;
	  default : $IDeditors[]=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDordinary_editor[]=$line['ID']; break;
    } 
  }
  mysql_free_result($result3);  
?>   
<h2>Pедакційна колегія</h2>  
<div class="paperInfo">
<p><span class="paperInfoItems">Головний редактор &#8212 </span> <?php if($chief_editor!="") echo $chief_editor; else echo "<em>немає даних</em>";  
			  ?></p>
<p><span class="paperInfoItems">Заступник головного редактора &#8212 </span>              
 			  <?php if($deputy!="") echo $deputy; else echo "<em>немає даних</em>"; 
			  ?></p>                          
<p><span class="paperInfoItems">Відповідальний редактор &#8212 </span><?php 
		      if($execute_editor!="") echo $execute_editor; else echo "<em>немає даних</em>"; 
    		  ?></p>
<p><span class="paperInfoItems">Члени редакційної колегії : </span>
   		  <?php 
			  $n=count($IDeditors);
			  if($n>0) 
			  { for($i=0; $i<$n; $i++)
			    { if($i) echo ", "; 
				  echo $IDeditors[$i]; 
				}
			  }	else echo "<em>немає даних</em>";   
			  ?>       
</p>
<p><span class="paperInfoItems">Вчений секретар &#8212 </span>                     
<?php if($secretary!="") echo $secretary; else echo "<em>немає даних</em>"; 
			  ?>  
                  </p>           
<p><span class="paperInfoItems">Технічний секретар &#8212 </span>                                            
			  <?php if($techsecretary!="") echo $techsecretary; else echo "<em>немає даних</em>"; 
			  ?>  
                  </p>            
<p><span class="paperInfoItems">Адреса редакційної колегії &#8212 </span>                                                          
			 <? echo $address; if($ph1!='') echo ". Тел.".$ph1; if($ph2!='') echo ", ".$ph2; if($fax1!='') echo ". Факс ".$fax; ?> 
		  </p>
</div>       
   
<?
} else
{ 
?> 
<div id="failure"> <h1>Не внесені дані про редакційну колегію</h1></div>
<?
}
?>             
<?php  
  $aFileName=$dirPath."/editorial.htm";
  $aFile=fopen($aFileName, "w");
  fwrite($aFile, ob_get_contents());
  fclose($aFile); 
  ob_end_clean();  
}//end of cycle foreach collection
?>
