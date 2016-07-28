<?

$result0000=ExecuteQuery("SELECT issue, year, topress, topressdate, description_ua, description_en  FROM volume WHERE IDvolume=".$IDvolume." ");
if( mysql_num_rows($result0000) > 0 )
{
 if($line = mysql_fetch_array($result0000, MYSQL_ASSOC))
	{
	  $issue=$line["issue"];
      $year=$line["year"]; 	   	
	  $topress=$line["topress"];
      $topressdate=$line["topressdate"]; 		    
	  $description_ua=$line["description_ua"];
	  $description_en=$line["description_en"];	  
	}
}
mysql_free_result ($result0000);
?>

<table width="400" border="0" style="font-size:10;" >
<tr>
  <td class="title_colomn">рік</td>
  <td width="350">
              <p id="year"><?php if($year!="") echo $year; else echo "немає даних";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('year', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $IDvolume; ?> & keyfield=IDvolume & field=year & tab=volume ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>
           <tr>
              <td class="title_colomn">випуск</td>
              <td width="350">
              <p id="issue"><?php if($issue!="") echo $issue; else echo "немає даних";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('issue', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $IDvolume; ?> & keyfield=IDvolume & field=issue & tab=volume ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>
           <tr>
              <td class="title_colomn">рішення редакційної коллегії "до друку"</td>
              <td width="350">
              <p id="topress"><?php if($topress=='1') echo "так"; else echo "ні";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceCollectionEditor('topress', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $IDvolume; ?> & keyfield=IDvolume & field=topress & tab=volume',
              {collection: [['1','так'],['0','ні']], value: 'ні', ajaxOptions: {method: 'post'}, okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>                   
              </td>
           </tr>  
           
          <?php if($topress=='1') 
		        {
		  ?>	  
             
           <tr>
              <td class="title_colomn">дата "до друку" (рік-місяць-день)</td>
              <td width="350">
              <p id="topressdate"><?php if($topressdate!="") echo $topressdate; else echo "немає даних";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('topressdate', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $IDvolume; ?> & keyfield=IDvolume & field=topressdate & tab=volume ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>   
            
          <?php
		        }
		  ?>              

    <td class="title_colomn">Файл (повністю весь <br> номер в pdf)  


<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/series/v_'.$IDvolume.'.pdf';
if (file_exists($filename)) 
{
?>
<a href="../doc/series/v_<? echo $IDvolume; ?>.pdf" target="_blank">файл внесено<img src="img/pdf_button.png"  width="15" height="15" /></a> 
<?
   
} /*else echo $filename;*/
?>    


</td>
    <td>
<form name="uploadform0" action="src/uploadfile.php" method="post" enctype="multipart/form-data" target="_blank"> 
           <input type="hidden" name="n_file_name" value="<?php echo "v_".$IDvolume; ?>" />
           <input type="hidden" name="subdir" value="series" />
 <input type="file" name="uploaded_file" onChange=" document.uploadform0.submit_button.disabled=''; " />       
 <input type="submit" name="submit_button" id="submit_button" value="Завантажити" disabled="disabled"/> 
</form>     
    </td>

  </tr>   
  <tr>
    <td class="title_colomn"><a href="../volume.php?ID=<? echo $IDvolume; ?>" target='_blank'>HTML файл для НБУВ</a></td>
    <td> 
    </td>
  </tr>   
  <tr>
    <td class="title_colomn">Oписання номера (українською мовою)</td>
    <td width="350">
              <p id="description_ua"><?php if( $description_ua!="") echo  $description_ua; else echo "немає даних";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('description_ua', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $IDvolume; ?> & keyfield=IDvolume & field=description_ua & tab=volume ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
    </td>
  </tr>
  <tr>
      <td class="title_colomn">Oписання номера (англійською мовою)</td>
      <td width="350">
              <p id="description_en"><?php if( $description_en!="") echo $description_en; else echo "немає даних";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('description_en', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $IDvolume; ?> & keyfield=IDvolume & field=description_en & tab=volume ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
      </td>
  </tr>

            
</table> 


<?

$result001=ExecuteQuery("SELECT title, tmp_author, ID FROM paper WHERE IDvolume=".$IDvolume." AND IDsection=0 ORDER BY pageFirst, tmp_pages");
if( mysql_num_rows($result001) > 0 )
{
?>
 Статті поза розділами (треба внеси в розділи)
 <table style='margin:10px; width:100%;'> 
<?php 
 while($line001 = mysql_fetch_array($result001, MYSQL_ASSOC))
 { $IDpaper=$line001["ID"];
?>
   <tr><td colspan="2" align="left" class="title_colomn">
<?php

    tmpPaperReference($IDpaper);
 
?>             
    </td></tr>      

   <tr><td class="title_colomn">перемістити в розділ</td><td>    
   <form name="move_paper_<?php echo $IDpaper; ?>" method="post" action="src/dataManipulation.php">
           <input type="hidden" name="tab" value="paper">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $IDpaper; ?>" />
           <select name="IDsection">
<?php             
   sectionList($IDvolume);           
?>           
           </select>          
           <input type="hidden" name="action" value="UPDATE"> 
     [<img src='img/b_tblimport.png' onclick="javascript:document.move_paper_<?php echo $IDpaper; ?>.submit();" alt="помістити в розділ" /> 
      <a href="javascript:document.move_paper_<?php echo $IDpaper; ?>.submit();" onMouseOver="window.status='';return true;"> перемістити в розділ </a>     
     ]
   </form>     
   </td></tr> 
<?   
 }
 echo "</table>";
}
?>



<table style="margin:10px; " width="100%">
<?php

$result01=ExecuteQuery("SELECT s.title AS stitle, s.ID AS sID FROM section s WHERE s.IDcollection=".$ID." ORDER BY s.ID");
while($line01 = mysql_fetch_array($result01, MYSQL_ASSOC))
{ $section=$line01["stitle"];
  $IDsection=$line01["sID"];
?>  
    <tr><td class="title_row" colspan="3">
<?
    echo $section;
?>
  <form name="add_paper_<?php echo $IDsection; ?>" method="post" action="src/dataManipulation.php" target="_self">
           <input type="hidden" name="tab" value="paper">
           <input type="hidden" name="IDsection" value="<?php echo $IDsection; ?>">
           <input type="hidden" name="IDvolume" value="<?php echo $IDvolume; ?>">                      
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="">    
           <input type="hidden" name="action" value="INSERT">    
    
    
  <div id="add_paper_<?php echo $IDsection; ?>_submit"> 
  [ <img src='img/pict_show.gif' onclick="javascript:document.add_paper_<?php echo $IDsection; ?>.submit();" /> 
    <a href="javascript:document.add_paper_<?php echo $IDsection; ?>.submit();" onMouseOver="window.status='';return true;"> додати статтю в розділ </a>   
  ] 
  </div>
  </form>  
    </td></tr>      
    
<?php
    $result=ExecuteQuery("SELECT p.ID, p.title AS ptitle, p.title_ru AS ptitle_ru, p.title_en AS ptitle_en, p.tmp_author, p.tmp_pages,  p.abstract_ua, p.abstract_en, p.abstract_ru, p.udk, p.pageFirst, p.pageLast, p.keyWords_ua, p.keyWords_en, p.keyWords_ru, p.lang, p.file_ext FROM paper p WHERE p.IDvolume=".$IDvolume." AND p.IDsection=".$IDsection." ORDER BY p.ID");
	
	while($line = mysql_fetch_array($result, MYSQL_ASSOC))
	{
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
      $IDpaper=$line["ID"];  
	  $tmp_pages=$line["tmp_pages"];
	  $file_ext=$line["file_ext"];

?>
    <tr><td colspan="3"></td></tr> 
    <tr><td width="16px">&nbsp;</td>
    <td width="16px" bgcolor="#CCCCCC">
    <a href="edt_paper.php?IDpaper=<?php echo $IDpaper; ?>" target="_blank"><img src='img/b_tblimport.png' title="редагувати статтю" /></a>
    &nbsp;
        <form name="del_paper_<?php echo $IDpaper; ?>" method="post" action="src/dataManipulation.php">
           <input type="hidden" name="tab" value="paper">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $IDpaper; ?>" />
           <input type="hidden" name="action" value="DELETE"> 
           <a href="javascript: if(window.confirm('Ви дійсно бажаєте видалити статтю?') ) document.del_paper_<?php echo $IDpaper; ?>.submit();"
onMouseOver="window.status='';return true;"><img src='img/b_drop.png' title="видалити статтю" />  </a>           
         
     </form>  
     </td> 
     <td align="left" class="title_colomn">
    
        

<?php

   formPaperReference($IDpaper);
 
?>      

    </td>
    </tr> 
    <tr> <td colspan=3> </td></tr>

<?	
   }
}  
?> 
</table>