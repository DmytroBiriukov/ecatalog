<?php
 session_start();
 $aUser=$HTTP_SESSION_VARS["aUser"];
 $aPassword=$HTTP_SESSION_VARS["aPassword"];
 $aIP=$HTTP_SESSION_VARS["aIP"];
 $aID=$HTTP_SESSION_VARS["aID"];
 $aUserGroup=$HTTP_SESSION_VARS["aUserGroup"];
 
 if($aUserGroup==2)
{ 
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>
</title>
<link href="../css/style.css" type="text/css" rel="STYLESHEET">
<script type="text/javascript" src="src/lib/tab.js"></script>
<script type="text/javascript" src="src/lib/prototype.js" ></script>
<script type="text/javascript" src="src/lib/scriptaculous.js"></script>
<script type="text/javascript" src="src/responses.js"></script>
</head>


<body onLoad="myonLoad()">
<script type="text/javascript">
  var ol_textfont = "Courier New, Courier";
</script>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<script language="JavaScript" src="src/lib/overlib421/overlib.js"></script>

<?php
$IDpaper=$_GET["IDpaper"];
include("src/evisnyk.php");



if($line = mysql_fetch_array( ExecuteQuery("SELECT * FROM paper WHERE ID=".$IDpaper ) , MYSQL_ASSOC) )
{
  $IDvolume=$line["IDvolume"];
  $title=$line["title"];
  $title_en=$line["title_en"];	  
  $title_ru=$line["title_ru"];	  	  
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
?>
<table bgcolor="#FFFFFF">
    <tr><td colspan="3" align="left" class="title_colomn">
<?php  
   formPaperReference($IDpaper);
?>         
        </td>
    </tr> 
    <tr><td colspan="3" >&nbsp;</td>
    </tr>     
    
    
    <tr><td width="40"><td class="title_colomn" width="100">


<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/papers/'.$IDpaper.'.pdf';
if (file_exists($filename)) 
{
?>
<a href="../doc/papers/<? echo $IDpaper; ?>.pdf" target="_blank">���� ������� <img src="img/pdf_button.png"  width="15" height="15" /></a> 
<br>
��� ������ ����������� ����� ���� � ������� ���
<?
   
} else echo "���� (������)";
?>

</td>
        <td>
<form name="uploadform" action="src/ftransfer.php" method="post" enctype="multipart/form-data" target="_blank"> 
           <input type="hidden" name="n_file_name" value="<?php echo $IDpaper; ?>" />
           <input type="hidden" name="subdir" value="papers" />
 <input type="file" name="paper_file" onChange=" document.uploadform.submit_button.disabled=''; " />       
 <input type="submit" name="submit_button" id="submit_button" value="����������� ������" disabled="disabled"/> 
</form>  
<span style="font-size:10px; background-color:#FFFF66">��� IP:&nbsp;<? $R=getenv("REMOTE_ADDR"); $userIP=explode(".", $R); echo $R;?></span>
        </td>
    </tr>
  
    
    <tr><td width="40"><td class="title_colomn" width="100">���������� � �����</td><td>    
   <form name="move_paper" method="post" action="src/dataManipulation.php">
   <table><tr><td>
           <input type="hidden" name="tab" value="paper">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $IDpaper; ?>" />
           <select name="IDsection">
<?php             
   sectionList($IDvolume);           
?>           
           </select>          
           <input type="hidden" name="action" value="UPDATE"> 
           </td>
           <td>
           <div class="submitButton"><a class="ub_dark" href="javascript:document.move_paper.submit();" onMouseOver="window.status='';return true;">����������</a> 
           </div>  
           </td>
           </tr>                             
   </table>        
   </form>     
       </td>
   </tr>  
    <tr><td colspan="3" >&nbsp;</td>
    </tr>            
   <tr><td width="40"></td><td class="title_colomn"> ����� (������) <br/> <em>����'���� � ���� �����</em> </td> <td style="font-size:10px; color:#FFCC33">
	<? 
	
/*
**************************************************************
*/	

//	$result2=ExecuteQuery("SELECT p.* FROM orgdep.personality p, paperAuthor pa  WHERE p.ID=pa.IDperson AND pa.IDpaper=".$IDpaper." ORDER BY pa.IDpaper");  
	$result2=ExecuteQuery("SELECT p.* FROM personality p, paperAuthor pa  WHERE p.ID=pa.IDperson AND pa.IDpaper=".$IDpaper." ORDER BY pa.IDpaper");  
	
	
	$ii=0;
	while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
    { $IDperson=$line2["ID"];
      $name=$line2["name"];
	  $scideg=$line2["scideg"];
	  $scipos=$line2["scipos"];	
	  $position=$line2["position"];	
?>	  
         <form name="del_author_paper_<?php echo $IDpaper."_".$IDperson; ?>" method="post" action="src/delAuthorPaper.php">
           <input type="hidden" name="tab" value="paperAuthor">
           <input type="hidden" name="IDpaper" value="<?php echo $IDpaper; ?>" />
           <input type="hidden" name="IDperson" value="<?php echo $IDperson; ?>" />           
           <input type="hidden" name="action" value="DELETE"> 
      <img src='img/b_drop.png' onClick="javascript: if(window.confirm('�� ����� ������ ������� ����� ������?') )document.del_author_paper_<?php echo $IDpaper."_".$IDperson; ?>.submit();" title="������� ������" />  
<?php	  
	  

	  
	  print("<a href='edt_person.php?ID=$IDperson'");
?>    onMouseOver="return overlib(
<?	  
echo "'";
	  if($scipos!="") echo $scipos." ";
      echo $name;
      if($scideg!="") echo ", ".$scideg;
	  if($position!="") echo ", ".$position;	
	  if($IDinst!=112 && $IDinst!='') 
	  { echo ", "; 
	  
//	  printTitle("orgdep.institutions",	  $IDinst);
  	    printTitle("institutions",	  $IDinst);

	  }
	  if($IDinst==112) echo ", ���";
echo "'";
?>	  ,TEXTFONT,'Verdana, Arial');" onMouseOut="return nd();" class='footer_links'><?    echo LFF($name) ?> </a>


<? 	  
	  
	  $ii++;
?>
	  </form> 
<?          
    }
?>    
  
     

    </td></tr>    
    
        <tr><td width="40"></td><td style="font-size:10px; background-color:#FFFF99;"> �������� ������ <br> (�� ����� 4 �������) </td> 
        <td style="font-size:10px;">
              <input type="text"  size="30" name="authorSearch_<?php echo $IDpaper; ?>" id="authorSearch_<?php echo $IDpaper; ?>" onKeyUp="quickSearch('authorSearch_<?php echo $IDpaper; ?>','authorSearch_<?php echo $IDpaper; ?>_Result', 3, 'src/responses/personSearch.php');" /> 
                
                  <form name="authorSearch_<?php echo $IDpaper; ?>_form" method="post" action="src/dataManipulation.php" target="_self">
           			<input type="hidden" name="tab" value="paperAuthor">
		            <input type="hidden" name="key_field" value="ID">
         		    <input type="hidden" name="key_value" value="">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="IDpaper" value="<?php echo $IDpaper; ?>">                                                          
                   <div id="authorSearch_<?php echo $IDpaper; ?>_Result">
                   </div>                                     
                   </form>               
       </td>              
       </tr>    
    
    <tr><td colspan="3" >&nbsp;</td>
    </tr>  
    <form name="paper_data" method="post" action="src/dataManipulation.php" target="_self">    
    <tr><td colspan="3" align="right">
            <div class="submitButton"><a class="ub_dark" href="javascript:document.paper_data.submit();" onMouseOver="window.status='';return true;">������ ����</a> 
           </div>        
    </td>
    </tr>     
    
    
   
    <tr><td width="40"></td><td class="title_colomn"> ����� (���������� �����)</td> <td >
<input name="title" size="85" value="<?php if(trim($title)!="") echo addslashes($title); ?>"/>
    </td></tr>
    
    <tr><td width="40"></td><td class="title_colomn"> ����� (���������� �����)</td> <td >
<input name="title_en" size="85" value="<?php if(trim($title_en)!="") echo addslashes($title_en); ?>"/>
    </td></tr>    
    
    <tr><td width="40"></td><td class="title_colomn"> ����� (��������� �����)</td> <td >
<input name="title_ru" size="85" value="<?php if(trim($title_ru)!="") echo addslashes($title_ru); ?>"/>
    </td></tr>    
    
    <tr><td width="40"></td><td class="title_colomn"> ��� </td> 
        <td >
          
            <input name="udk" size="50" value="<?php if(trim($udk!="")) echo $udk; ?>" />
        <br>
        <span style="font-size:10px; background-color:#FFFF66">���� �����, ������� ����� ������������� ���, ���������, "523.85" ������ "��� 523.85".</span></td>
    </tr>    
    <tr><td width="40"></td><td class="title_colomn">����</td> 
        <td >
   <select name="lang" size="1">
     <option <? if($lang=="���.") echo " selected "; ?> value="���." >���.</option>
     <option <? if($lang=="���.") echo " selected "; ?> value="���." >���.</option>
     <option <? if($lang=="����.") echo " selected "; ?> value="����." >����.</option>
     <option <? if($lang=="��.") echo " selected "; ?> value="��.">��.</option>
     <option <? if($lang=="��.") echo " selected "; ?> value="��." >��.</option>
     <option <? if($lang=="���.") echo " selected "; ?> value="���." >���.</option>
   </select>
      </td>
    </tr>  
    <tr><td width="40"></td><td class="title_colomn"> 
            ������ (���������� �����)
            </td> 
            <td >
           <TEXTAREA name="abstract_ua" title="" ROWS="3" COLS="50"><?php if(trim($abstract_ua)!="") echo addslashes($abstract_ua); ?></TEXTAREA>   
            </td>
    </tr> 
    <tr><td width="40"></td><td class="title_colomn"> 
           ������ (���������� �����) 
        </td> 
        <td >
           <TEXTAREA name="abstract_en" title="" ROWS="3" COLS="50"><?php if(trim($abstract_en)!="") echo addslashes($abstract_en); ?></TEXTAREA>    
        </td>
    </tr>     
    <tr><td width="40"></td><td class="title_colomn"> 
           ������ (��������� �����) 
        </td> 
        <td >  
           <TEXTAREA name="abstract_ru" title="" ROWS="3" COLS="50"><?php if(trim($abstract_ru)!="") echo addslashes($abstract_ru); ?></TEXTAREA>
        </td>
    </tr>      
    <tr><td width="40"></td><td class="title_colomn"> ������ ����� (���������� �����)</td> <td >
    <textarea name="keyWords_ua" cols="50" rows="2"><? if(trim($keyWords_ua)!="") echo $keyWords_ua; ?></textarea>	
    <br>
    <span style="font-size:10px; background-color:#FFFF66">���� �����, <b>��</b> ������� " <b>������ �����:</b> ������ ��������, ������ ������.", ����� ������� ����� ��� ������ �����, ���������, "������ ��������, ������ ������.".</span>
    </td></tr> 
    <tr><td width="40"></td><td class="title_colomn"> ������ ����� (���������� �����) </td> <td >
    <textarea name="keyWords_en" cols="50" rows="2"><? if(trim($keyWords_en)!="") echo $keyWords_en; ?></textarea>
    </td></tr>     
    <tr><td width="40"></td><td class="title_colomn"> ������ ����� (��������� �����) </td> 
    <td >
    <textarea name="keyWords_ru" cols="50" rows="2"><? if(trim($keyWords_ru)!="") echo $keyWords_ru; ?></textarea>
    </td>
    </tr>           
    <tr><td width="40"></td><td class="title_colomn"> ������� </td> <td>
<input name="pageFirst" size="3"  maxlength="5"  value="<?php if($pageFirst!="") echo $pageFirst; ?>"/> &nbsp; &mdash; &nbsp; 
<input name="pageLast" size="3" maxlength="5" value="<?php if($pageLast!="") echo $pageLast; ?>"/>
    </td></tr> 
    </tr>           
    <tr><td colspan="3" align="right">           
           			<input type="hidden" name="tab" value="paper">
		            <input type="hidden" name="key_field" value="ID">
         		    <input type="hidden" name="key_value" value="<?php echo $IDpaper; ?>">                      
		            <input type="hidden" name="action" value="UPDATE">            
           <div class="submitButton"><a class="ub_dark" href="javascript:document.paper_data.submit();" onMouseOver="window.status='';return true;">������ ����</a> 
           </div>     
        </td>
    </tr>       
</form>    
</table>
<?
}
?>



</body>
</HTML>
<?
}
?>