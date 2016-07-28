<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Електронний каталог періодичних видань Київського університету</title>
<link href="../css/style.css" type="text/css" rel="STYLESHEET">
<link  type="image/x-icon" rel="shortcut icon" href="../css/img/logo.ico">
<script type="text/javascript" src="src/lib/prototype.js" ></script>
<script type="text/javascript" src="src/lib/scriptaculous.js"></script>
<script type="text/javascript" src="src/responses.js"></script>
<script type="text/javascript" src="src/lib/overlib421/overlib.js"></script>
</head>
<script language="javascript">
<!--
function toggleExpanded (year) 
{ var e1 = document.getElementById("img_year_"+year);   //.getElementsByTagName("LI");
  var e2 = document.getElementById("content_year_"+year);   //.getElementsByTagName("LI");
  if(e2.style.display == 'none')
  { e1.src="img/minus.gif";  
    e2.style.display ='';
  }else
  { e1.src="img/plus.gif";  
    e2.style.display = 'none';
  }	 
}

function togglePaperExpanded (paperID) 
{ var e1 = document.getElementById("img_paper_"+paperID);   //.getElementsByTagName("LI");
  var e2 = document.getElementById("content_paper_"+paperID);   //.getElementsByTagName("LI");
  if(e2.style.display == 'none')
  { e1.src="img/minus.gif";  
    e2.style.display ='';
  }else
  { e1.src="img/plus.gif";  
    e2.style.display = 'none';
  }	 
}
-->
</script> 
<body>
<script type="text/javascript">
  var ol_textfont = "Courier New, Courier";
</script>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<?php
 $ID=$HTTP_GET_VARS['ID'];
 require ("src/evisnyk.php");
 $result1=ExecuteQuery("SELECT * FROM collection WHERE ID=$ID ");
 
 $num_rows = mysql_num_rows($result1);

 if($num_rows)
 {
  if($line1 = mysql_fetch_array($result1, MYSQL_ASSOC))
  { $title=$line1["title"];
    $titlecolljourn=$title;
    $short_title=$line1["shortTitle"];
	$description=$line1["description"];
	$ISSN=$line1["ISSN"];
	$tab=$line1["datatab"];
	$IDedsBoard=$line1["IDedsBoard"];		
	$specDateFrom=$line1["specDateFrom"];
  }
?>  
        <form name="appform" action="appform.php" method="post">
  			<input type="hidden" name="STATE" value="1">
			<input type="hidden" name="ID" value="<?php echo $ID; ?>">
			<input type="hidden" name="tab" value="<?php echo $tab; ?>">  
		</form>
<table class="coverTable" width="982" border="0" cellpadding="0" cellspacing="0" align="center">         
  <tr valign="top">
    <td valign="top">

<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/img/h_'.$ID.'.gif';
if (file_exists($filename)) 
{
?>
      <table width="982" height="125" border="0" cellpadding="0" cellspacing="0" style="background-image: url('http://evisnyk.unicyb.kiev.ua/doc/img/h_<? echo $ID; ?>.gif'); background-repeat:no-repeat;" > 
<?
   
} else
{
?>  
      <table class="headerTable" width="982" border="0" cellpadding="0" cellspacing="0" >
<?
}
?>
         <tr>
           <td width="520">
           </td>
           <td class="footer_links" valign="top" align="right">       
          
           </td>
         </tr>
        </table>      
    </td>
  </tr>
  <tr>
    <td class="headerLine">
    &gt; <a href="../" class="header_links">Каталог</a> \ <?php echo $title; ?>
    </td>
  </tr>
  <tr>
    <td>


<table border="0" cellpadding="0" cellspacing="0" width="100%" background="css/img/series_bgd.gif">
<tr>
<td width="185" valign="top">
  <div id="colljourn_menu">
  
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top">
    <td colspan="2" width="185">
<!--
Опис видання
onClick="this.src='css/img/collection-description-on.gif'; var ajax=new Ajax.Updater( {success: 'colljourn_body'}, 'general.htm', {method: 'get', parameters: '', onFailure: 'reportError', evalScripts: true});"
-->    
    <img id="c_description" src="css/img/collection-description-off.gif" onMouseOver="this.src='css/img/collection-description-ovr.gif'" onMouseOut="this.src='css/img/collection-description-off.gif'" onClick="new Effect.Fade(document.all.searchresult); new Effect.Fade(document.all.coljourn_volume); new Effect.Fade(document.all.edtorialboard); new Effect.Fade(document.all.searchwithin); new Effect.Fade(document.all.coljourn_volume); new Effect.Appear(document.all.colljourn_general);"/>
<!--
Редакційна колегія
onClick="this.src='css/img/collection-edsboard-on.gif'; var ajax=new Ajax.Updater( {success: 'colljourn_body'}, 'editorial.htm', {method: 'get', parameters: '', onFailure: 'reportError', evalScripts: true});"
-->    
<img id="c_edsboard" src="css/img/collection-edsboard-off.gif" onMouseOver="this.src='css/img/collection-edsboard-ovr.gif'" onMouseOut="this.src='css/img/collection-edsboard-off.gif'" onClick="new Effect.Fade(document.all.searchresult);  new Effect.Fade(document.all.colljourn_general); new Effect.Fade(document.all.searchwithin);  new Effect.Fade(document.all.coljourn_volume); new Effect.Appear(document.all.edtorialboard);"/>
<!--
Пошук
onClick="this.src='css/img/collection-search-on.gif'; var ajax=new Ajax.Updater( {success: 'colljourn_body'}, 'search.htm', {method: 'get', parameters: '', onFailure: 'reportError', evalScripts: true});"
-->
<img id="c_search" src="css/img/collection-search-off.gif" onMouseOver="this.src='css/img/collection-search-ovr.gif'" onMouseOut="this.src='css/img/collection-search-off.gif'" onClick="new Effect.Fade(document.all.searchresult);  new Effect.Fade(document.all.colljourn_general); new Effect.Fade(document.all.edtorialboard); new Effect.Fade(document.all.coljourn_volume); new Effect.Appear(document.all.searchwithin);"/>
<!-- 
Випуски
onClick="this.src='css/img/collection-volumes-on.gif'; var ajax=new Ajax.Updater( {success: 'colljourn_body'}, 'vol/index.htm', {method: 'get', parameters: '', onFailure: 'reportError', evalScripts: true});" -->
<img id="c_volumes" src="css/img/collection-volumes-off.gif" onMouseOver="this.src='css/img/collection-volumes-ovr.gif'" onMouseOut="this.src='css/img/collection-volumes-off.gif'" />

<div id="volumes"> 
 <table>   
    
<?php 
  $result2=ExecuteQuery("SELECT * FROM volume WHERE ID=".$ID." AND datatab='".$tab."' ORDER BY year DESC, issue DESC");
  $year0="";
  $firttime=1;
  while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
  { $IDvolume=$line2["IDvolume"];
    if( mysql_num_rows(ExecuteQuery("SELECT DISTINCT ID FROM paper WHERE IDvolume=".$IDvolume." ")) > 0 )
	{ $issue=$line2["issue"];
      $year=$line2["year"];
//	$description_ua=$line2["description_ua"];
	  $topress=$line2["topress"];
	  $topressdate=$line2["topressdate"];	
	  if( $year !=  $year0) 
	  { if($year0 != "") echo " </ul> </div></td></tr>";
	    $year0= $year;  
?>   
    <tr height="20">  
      <td class="left_header">      
       <img 
       <? if($firttime==1) echo "src='img/minus.gif'";
	      else echo "src='img/plus.gif'"; 
	   ?>	
       
        id="img_year_<? echo $year; ?>" onClick=" toggleExpanded ('<? echo $year; ?>');" />
       <b><? echo $year; ?></b>
       <div id='content_year_<? echo $year; ?>' 
       <? if($firttime==1) $firttime=0;
	      else echo "style=' display:none;' "; 
	   ?>	  
		  >
         <ul style='margin-top: 0px;'>      
<?	
      }

?>
              <li style='font-weight: normal; list-style:none; cursor: pointer'>
<?	  
	  $filename = $_SERVER['DOCUMENT_ROOT'].'/doc/series/v_'.$IDvolume.'.pdf';
	  if (file_exists($filename)) 
	  {
?>
		<a href="../doc/series/v_<? echo $IDvolume; ?>.pdf" target="_blank"><img src="img/pdf_button.png"  width="15" height="15" border="0" title="файл з повнотекстовим змістом"/></a> 
<?
   
	  } else 
	  { if($topress == 1) echo "<img src='img/issue_publicated.png' >"; else
        if($topress == 0) echo "<img src='img/issue_hidden.png' >"; else 
        echo "<img src='img/issue_available.png' >"; 	  
	  }
?>          
      <a class="footer_links" onClick="javascript: new Effect.Fade(document.all.searchresult); new Effect.Fade(document.all.colljourn_general); new Effect.Fade(document.all.edtorialboard); new Effect.Fade(document.all.searchwithin); updateTag('coljourn_volume','src/responses/updateVolumeTag.php','IDvolume=<? echo $IDvolume; ?>'); " onMouseOver="this.style.color='#6699FF'; window.status='';" onMouseOut="this.style.color='#666666';">
	  <?php echo $issue;  $l=strlen($issue)%10; while($l>0) { echo "&nbsp;"; $l--;}  ?></a>               
              </li>
<?php 
   }
}
?>     
 </table>    
</div>
<img id="c_appform" src="css/img/collection-appform-off.gif" onMouseOver="this.src='css/img/collection-appform-ovr.gif'" onMouseOut="this.src='css/img/collection-appform-off.gif'" onClick="this.src='css/img/collection-appform-on.gif'; document.appform.submit();"/>
<a href="../" target="_blank" >
 <img border=0 id="c_rules" src="css/img/collection-rules-off.gif" onMouseOver="this.src='css/img/collection-rules-ovr.gif'" onMouseOut="this.src='css/img/collection-rules-off.gif'" onClick="this.src='css/img/collection-rules-on.gif';"/>
</a>
<a href="../" target="_blank" >
 <img border=0 id="c_publisher" src="css/img/collection-publisher-off.gif" onMouseOver="this.src='css/img/collection-publisher-ovr.gif'" onMouseOut="this.src='css/img/collection-publisher-off.gif'" onClick="this.src='css/img/collection-publisher-on.gif';"/>
</a>
    </td>
    </tr>









    </table>
  </div>
  </td>
  <td valign="top">
   
  <div id="colljourn_body">

  <div id="colljourn_general">
  <table>
  <tr>
    <td align="center" valign="top">
<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/img/cv_'.$ID.'.jpg';
if (file_exists($filename)) 
{
?>
<img src="../doc/img/cv_<? echo $ID; ?>.jpg" width="115" height="155" /> 
<? 
}
?>    
    </td>
    <td style="text-align:justify; font-size:9px">           
     <?php 
       echo "<p class='journalTitle'>$title</p><p>ISSN $ISSN </p><p>$description</p>";
     ?>
        
    </td>
  </tr>
  </table>   
  </div>      
<!--
     Тут буде представлена редакційна колегія!
-->
    <div id="edtorialboard" style=" display: none;">
<?php

if($IDedsBoard != '' && $IDedsBoard != 0)
{ $result3=ExecuteQuery("SELECT ebc.position AS edtPosition, p.name, p.scideg, p.scipos, ebc.ID FROM edsBoardContent ebc, personality p WHERE ebc.IDedsBoard=$IDedsBoard AND ebc.IDperson = p.ID ORDER BY ebc.ID");

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
         <table style="font-size:10px;" width="500">
           <tr>
              <td class="title_colomn">Головний редактор
              </td>
              <td>                         
			  <?php if($chief_editor!="") echo $chief_editor; else echo "<em>немає даних</em>";  
			  ?>
              </td>
           </tr> 
           <tr>
              <td class="title_colomn">Члени редакційної колегії
              </td>
              <td>                         
	   		  <?php 
			  $n=count($IDeditors);
			  if($n>0) 
			  { for($i=0; $i<$n; $i++) echo $IDeditors[$i]."<br>"; 
			  }	else echo "<em>немає даних</em>";   
			  ?>
              </td>
           </tr> 
           <tr>
              <td class="title_colomn">Відповідальний редактор
              </td>
              <td>                         
		      <?php 
		      if($execute_editor!="") echo $execute_editor; else echo "<em>немає даних</em>"; 
    		  ?>
              </td>
           </tr> 
    	   <tr>
              <td class="title_colomn">Заступник головного редактора
              </td>
              <td>                         
			  <?php if($deputy!="") echo $deputy; else echo "<em>немає даних</em>"; 
			  ?>
              </td>
           </tr> 
           <tr>
              <td class="title_colomn">Вчений секретар
              </td>
              <td>                         
			  <?php if($secretary!="") echo $secretary; else echo "<em>немає даних</em>"; 
			  ?>
              </td>
           </tr> 
           <tr>
              <td class="title_colomn">Технічний секретар
              </td>
              <td>                         
			  <?php if($techsecretary!="") echo $techsecretary; else echo "<em>немає даних</em>"; 
			  ?>
              </td>
           </tr> 
          </table>          
<?
} else
{ 
?> 
<p>  не внесені дані про редакційну колегію 
</p>
<?
}
?>             

    </div>  <!--style=" display: none;"-->
<!--
     Тут будуть можливості пошуку в межах даного видання!
-->
    <div id="searchwithin" style=" display: none;">
 
  
  
  <div id="search_basic">
       
<form id="sbform" name="sbform" action="javascript: updateTag('searchresult','src/responses/updateSearchTag.php','ID=<? echo $ID; ?>&tab=<? echo $tab;?>&within=yes&author='+document.sbform.st1.value+'&title='+document.sbform.st2.value+'&abstract='+document.sbform.st3.value+'&lc='+document.sbform.lc_0.checked); " method="post">
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
                    <input type="radio" name="lc" value="AND" id="lc_0">
                    логічне "і"</label>
                  
                  <label>
                    <input type="radio" name="lc" value="OR" id="lc_1" checked>
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
                   <input type="hidden" name="within" value="no" />
				</form>					      
    
               
  </div>
  
  
  
    </div> 
 
    <div id="searchresult" style=" display: none;">
    </div> 
 
    <div id="coljourn_volume" style=" display: none;">
    </div> 
    
  </div>
  
  </td>  
</tr>
</table>


  </td>
  </tr>
<?php
} else
{
?>
  <tr valign="top"  height="20">
    <td valign="top" style="background-color:#FFCCCC; font-size:16px;">
    <center><br><br>
    Аутентифікація для доступу <strong> не була успішною !</strong>
    <br>
    <br><a href="../" class="footer_links"> повернутись</a>
    <br>
    <br>
    </center>
    
    </td>
  </tr>                 
<?php
}
?>
  
  <tr>
    <td class="footer" align="center">
    <span class="footer_links"> 
      &copy; 2008 - <SCRIPT language=JavaScript type=text/javascript>document.write((new Date()).getFullYear());</SCRIPT>
      <a href="http://www.univ.kiev.ua" target="_blank" class="footer_links">Київський національний університет імені Тараса Шевченка</A>
|
      <A  href="http://unicyb.kiev.ua/~birjukov" class="footer_links" target="_blank">розробник</A> 
      </span>
    </td>
  </tr>
</table>
</body>
</html>
