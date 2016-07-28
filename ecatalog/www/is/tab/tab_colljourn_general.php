<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Including General Information Tab
[begin]
---------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------> 
<table width="900" border="0" style="font-size:10px;">
<tr>
<td valign="top">
<table width="550" border="0" style="font-size:10px;" >

  <tr valign="top">
     <td class="title_colomn">Повна назва</td>
     <td width="500">
     <p id="title"><?php if($title!="") echo $title; else echo "немає даних";?></p>
     <script type="text/javascript">
              new Ajax.InPlaceEditor('title', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=title & tab=collection ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>
     </td>
  </tr>
  <tr>
     <td class="title_colomn">Скорочена назва</td>
     <td>
     <p id="short_title"><?php if($short_title!="") echo $short_title; else echo "немає даних";?></p>
     <script type="text/javascript">
              new Ajax.InPlaceEditor('short_title', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=shortTitle & tab=collection ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>
     </td>
  </tr>
  
  <tr>
  
    <td class="title_colomn">Сканована обкладинка 

<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/img/cv_'.$ID.'.jpg';
if (file_exists($filename)) 
{
?>
<a href="../doc/img/cv_<? echo $ID; ?>.jpg" target="_blank">файл внесено<img src="img/pic.jpg"  width="25" height="25" /></a> 
<?
   
} /*else echo $filename;*/
?>

</td>
    <td>
<form name="uploadform0" action="src/uploadfile.php" method="post" enctype="multipart/form-data" target="_blank"> 
           <input type="hidden" name="n_file_name" value="<?php echo "cv_".$ID; ?>" />
           <input type="hidden" name="subdir" value="img" />
 <input type="file" name="uploaded_file" onChange=" document.uploadform0.submit_button.disabled=''; " />       
 <input type="submit" name="submit_button" id="submit_button" value="Завантажити" disabled="disabled"/> 
</form>     
    </td>
  </tr>    
  
  <tr>
     <td class="title_colomn">ISSN </td>
     <td>
     <p id="ISSN"> <?php if($ISSN!="") echo $ISSN; else echo "немає даних";?> </p>
     <script type="text/javascript"> new Ajax.InPlaceEditor('ISSN', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=ISSN & tab=collection ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>
     </td>
  </tr>  
  <tr>
     <td class="title_colomn">Періодичність </td>
     <td>
     <p id="frequency"> <?php if($frequency!="") echo $frequency; else echo "немає даних";?> </p>

     <script type="text/javascript">	 
new Ajax.InPlaceCollectionEditor('frequency', 'src/inDBPlaceEdit.php?keyvalue=<? echo $ID;?> & keyfield=ID & field=frequency & tab=collection',{collection: [['щорічне','щорічне'],['двічі на рік','двічі на рік'],['щоквартальне','щоквартальне'],['6 разів на рік','6 разів на рік'],['щомісячне','щомісячне'],['інша періодичність','інша періодичність']], value: 'інша періодичність', ajaxOptions: {method: 'post'}, okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "відмінити"});     
     </script>
     </td>
  </tr>    
  <tr>
     <td class="title_colomn">Рік заснування </td>
     <td>
     <p id="established"> <?php if($established!="") echo $established; else echo "немає даних";?> </p>

     <script type="text/javascript"> new Ajax.InPlaceEditor('established', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=established & tab=collection ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>

     </td>
  </tr>  
  
  <tr>
     <td class="title_colomn">Свідоцтво про державну реєстрацію </td>
     <td>
     <p id="registred"> <?php if($registred!="") echo $registred; else echo "_ №__ від __";?> </p>

     <script type="text/javascript"> new Ajax.InPlaceEditor('registred', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=registred & tab=collection ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>

     </td>
  </tr>  
  <tr>
  
    <td class="title_colomn">Сканована фотокопія 

<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/img/sv_'.$ID.'.jpg';
if (file_exists($filename)) 
{
?>
<a href="../doc/img/sv_<? echo $ID; ?>.jpg" target="_blank">файл внесено<img src="img/pic.jpg"  width="25" height="25" /></a> 
<?
   
} /*else echo $filename;*/
?>
</td>
    <td>
<form name="uploadform1" action="src/uploadfile.php" method="post" enctype="multipart/form-data" target="_blank"> 
           <input type="hidden" name="n_file_name" value="<?php echo "sv_".$ID; ?>" />
           <input type="hidden" name="subdir" value="img" />
 <input type="file" name="uploaded_file" onChange=" document.uploadform1.submit_button.disabled=''; " />       
 <input type="submit" name="submit_button" id="submit_button" value="Завантажити" disabled="disabled"/> 
</form>     
    </td>
  </tr>  
  
  <tr>
     <td class="title_colomn">Наказ ВАК України про фахову реєстрацію</td>
     <td>
     <p id="registredVAK"> <?php if($registredVAK!="") echo $registredVAK; else echo "№__ від __";?> </p>

     <script type="text/javascript"> new Ajax.InPlaceEditor('registredVAK', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=registredVAK & tab=collection ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>

     </td>
  </tr>        
         
<!--
              <script type="text/javascript">
              new Ajax.InPlaceCollectionEditor('ISSN', 'src/responses/inDBPlaceEdit.php?keyvalue= $ID & keyfield=IDper & field=d & tab=defen',{collection: [['4','daad'],['2','fgdgdg']], value: 'dfgdg', ajaxOptions: {method: 'post'}, okText:"", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "?"});
              </script>     
-->                       

   <tr>
      <td class="title_colomn">Розділи збірника</td>
      <td>
<?php

   $result4=ExecuteQuery("SELECT title, ID FROM section WHERE IDcollection=".$ID." ORDER BY ID ");
   $section_no=1;
   print("<table>");
   while($line4 = mysql_fetch_array($result4, MYSQL_ASSOC))
   {  $sec_title=$line4['title'];
      $sec_ID=$line4["ID"];
     
	  
?>	   
     <tr class="cdata_colomn" style="color:#333333"><td><? echo $section_no."."; ?></td>
<? /*
?>     
      <form name="del_section_<?php echo $sec_ID; ?>" method="post" action="src/dataManipulation.php">
           <input type="hidden" name="tab" value="section">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $sec_ID; ?>" />
           <input type="hidden" name="action" value="DELETE"> 
     <td><img src='img/b_drop.png' onclick="javascript:document.del_section_<?php echo $sec_ID; ?>.submit();" /></td>
     </form>
<? */
?>     
     <td><p id='section_<? echo $section_no; ?>'> <? if($sec_title!='') echo $sec_title; else echo "<em>без назви</em>"; ?></p> 
	 <script type="text/javascript"> new Ajax.InPlaceEditor('section_<? echo $section_no; ?>', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $sec_ID; ?> & keyfield=ID & field=title & tab=section', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>
     </td></tr>	  
     
<?php	  

	  $section_no++;
   }
   print("</table>");
?>
      </td>
   </tr>   
   <tr>
      <td class="title_row" colspan="2">
      
 <form name="add_section" method="post" action="src/dataManipulation.php" target="_self">
           <input type="hidden" name="tab" value="section">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="" />
           <input type="hidden" name="IDcollection" value="<?php echo $ID; ?>">                      
           <input type="hidden" name="action" value="INSERT">  
           
           <input type="text" name="title"/>  
                        <div id="add_section_submit"><a href="javascript:document.add_section.submit();" onMouseOver="window.status='';return true;">Ввести новий розділ</a></div>
</form>
      </td>
   </tr>   
   

   <tr>
      <td class="title_colomn">Опис</td>
      <td>
      <p id="description"><?php if($description!="") echo $description; else echo "немає даних";?></p>
      <script type="text/javascript"> new Ajax.InPlaceEditor('description', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=description & tab=collection ', {okText:"Внести зміни", savingText: "<img src='../img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
      </script>
      </td>
   </tr>
</table> 

</td>
<!-- right side
-->  
<td width="350" valign="top" bordercolor="#999999" style="border:1px;">
<!-- новий номер
-->  
<div id="new_volume">
		<table width="180" border="0" cellpadding="0" cellspacing="0" align="left">         
        <tr> 
          <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="180" height="16"></td>
        </tr>
        <tr>
          <td width="10"><img src="img/spacer.gif" alt="" width="10" height="20"></td>
          <td class="left_header">Новий номер</td>
        </tr>
        <tr> 
          <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="180" height="16"></td>
        </tr>
		<tr valign="top"> 
          <td width="10"><img src="img/spacer.gif" alt="" width="10" height="20"></td>
          <td width="160">
      <form name="add_journcollVolume" method="post" action="src/dataManipulation.php" target="_self">
           <input type="hidden" name="tab" value="volume">
           <input type="hidden" name="datatab" value="<?php echo $tab; ?>">           
           <input type="hidden" name="key_field" value="IDvolume">
           <input type="hidden" name="key_value" value="">    
           <input type="hidden" name="ID" value=" <?php echo $ID; ?> ">
           <input type="hidden" name="action" value="INSERT">  

           <table width="160">
             <tr><td class="title_row">рік</td></tr>
             <tr><td><input type="text" name="year" value="<?php  echo "20".date('y');  ?>"/> </td></tr>
             <tr><td  class="title_row">випуск</td></tr><tr><td><input type="text" name="issue" value="Вип. хх"></td></tr>
             <tr><td  class="title_row">рішення редакційної коллегії "до друку"</td></tr>
             <tr><td style="font-size:10px;"> 
                 <label>
                   <input type="radio" name="topress" value="1" id="RadioGroup1_0" onClick="  updateTag('topressTag','src/responses/topressDateTag.php','par=1'); ">
                   так</label>
                 
                 <label>
                   <input type="radio" name="topress" value="0" id="RadioGroup1_1" checked onClick=" updateTag('topressTag','src/responses/topressDateTag.php','par=0'); ">
                   ні</label>                           
             </td></tr>             
             <tr><td><table>
             <div id="topressTag">
             </div> 
             </table>
             </td>
             </tr>               
             <tr>
                  <td  align=right>
  					<div id="add_journcollVolume_submit"><a href="javascript:document.add_journcollVolume.submit();" onMouseOver="window.status='';return true;">Внести дані</a></div>
                 </td>
             <td valign="top">
             </td>
          </tr>
        </table>
     </form> 
     </td>
     </tr>
    </table>  
</div>
<!-- редагування номерів
-->  
<div id="edit_volumes">
  <table border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top"> 
      <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="180" height="16" align="top">
      </td>
    </tr>  
    <tr valign="top"> 
      <td colspan="2" class="left_header"> Редагувати номер </td>   
    </tr>       
    <tr valign="top"> 
      <td colspan="2"><img src="img/left_nav_line.gif" alt="" width="180" height="16" align="top">
<?php 

  $result2=ExecuteQuery("SELECT * FROM volume WHERE ID=".$ID." AND datatab='".$tab."' ORDER BY year DESC, issue DESC");
  $year0="";
  while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
  { $IDvolume=$line2["IDvolume"];
    $issue=$line2["issue"];
    $year=$line2["year"];
	$description=$line2["description_ua"];
	$topress=$line2["topress"];
	$topressdate=$line2["topressdate"];	
	if( $year !=  $year0) 
	{ $year0= $year;
?>    </td>
    </tr>
    <tr>  
      <td width="32" background="img/bg_left.gif"><img src="img/bg_left.gif" alt="" width="32" height="1"></td>
      <td width="318" class="left_header"><? echo $year; ?>
    </tr>  
    <tr>  
      <td width="32" background="img/bg_left.gif"><img src="img/bg_left.gif" alt="" width="32" height="1"></td>
      <td width="318" class="left_header">     
<?	
     }
?>

      <!--
      <a class="footer_links" href="javascript: updateTag('coljourn_edt_volume','src/responses/updateEditVolumeTag.php','IDvolume=<? echo $IDvolume; ?>'); "><?php echo $issue; ?></a>   
      -->
<?
  
  
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/series/v_'.$IDvolume.'.pdf';
if (file_exists($filename)) 
{
?>
<a href="../doc/series/v_<? echo $IDvolume; ?>.pdf" target="_blank"><img src="img/pdf_button.png"  width="15" height="15" /></a> 
<?
   
} else 
{
if($topress == 1) echo "<img src='img/issue_publicated.png' >"; else
  if($topress == 0) echo "<img src='img/issue_hidden.png' >"; else 
  echo "<img src='img/issue_available.png' >"; 
}

?>    
      <a class="footer_links" href=" edt_volume.php?IDvolume=<? echo $IDvolume; ?>&tab=<? echo $tab;?>" target="_self"><?php echo $issue; ?></a> &nbsp; &nbsp;
      

<?php 
}
?>
        </td>
      </tr>
    </table>
</div>
   </td>
  </tr>
</table>
<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Including General Information Tab
[end]
---------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------> 