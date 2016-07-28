<?php
include("../evisnyk.php");
$IDvolume = $HTTP_GET_VARS["IDvolume"];

$result=ExecuteQuery("SELECT p.ID, p.title AS ptitle, s.title AS stitle, p.tmp_author,  p.abstract_ua, p.abstract_en, p.udk, p.pageFirst, p.pageLast, s.ID AS sID FROM paper p, section s WHERE p.IDvolume=".$IDvolume." AND p.IDsection=s.ID ORDER BY p.IDsection");
$section0="";
?>
<table>
<?
while($line = mysql_fetch_array($result, MYSQL_ASSOC))
{ $section=$line["stitle"];
  $IDsection=$line["sID"];
  $title=$line["ptitle"];
  $tmp_author=$line["tmp_author"];
  $udk=$line["udk"];  
  $abstract_ua=$line["abstract_ua"]; 
  $abstract_en=$line["abstract_en"];  
  $pageFirst=$line["pageFirst"];  
  $pageLast=$line["pageLast"];  
  $ID=$line["ID"];  
       
  if($section0 != $section)
  { $section0=$section;
  ?>
    <tr><td colspan="2"> <br /> </td></tr>
    <tr><td class="title_row" colspan="2">
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
    
    
  <div id="add_paper_<?php echo $IDsection; ?>_submit"><a href="javascript:document.add_paper_<?php echo $IDsection; ?>.submit();" onMouseOver="window.status='';return true;"> [додати статтю в розділ] </a></div>
  </form>  
    </td></tr>
    <?
  }
  ?>
    <tr><td colspan="2"></td></tr> 
    <tr><td class="title_colomn"> автор (автори) <br/> <em>допоміжне поле</em> </td> <td style="font-size:10px; color:#FFFFCC;">
	<? echo $tmp_author; ?>    
    </td></tr>

    <tr><td class="title_colomn"> автор (автори) </td> <td style="font-size:10px; color:#FFFFCC;">
	<? 
	$result2=ExecuteQuery("SELECT p.* FROM personality p, paperAuthor pa  WHERE p.ID=pa.IDperson AND pa.IDpaper=".$ID." ORDER BY pa.IDpaper");  
	$ii=0;
	while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
    { $IDperson=$line2["ID"];
      $name=$line2["name"];
	  $scideg=$line2["scideg"];
	  $scipos=$line2["scipos"];	
	  $position=$line2["position"];	
	  if($ii) echo ", ";
	  print("<a href='edt_person.php?ID=$IDperson'>");
	  if($scipos!="") echo $scipos." ";
      echo "<strong>".$name."</strong>";
      if($scideg!="") echo ", ".$scideg;
	  if($position!="") echo ", ".$position;
	  print("</a>");
	  $ii++;
    }
	
	?>    
    </td></tr>    
    
        <tr><td style="font-size:10px; background-color:#FFFF99;"> пошукати автора <br> (не менше 4 символів) </td> 
        <td style="font-size:10px; color:#FFFFCC;">
              <input type="text"  size="30" name="authorSearch_<?php echo $ID; ?>" id="authorSearch_<?php echo $ID; ?>" onKeyUp="quickSearch('authorSearch_<?php echo $ID; ?>','authorSearch_<?php echo $ID; ?>_Result', 3, 'src/responses/personSearch.php');" /> 
                
                  <form name="authorSearch_<?php echo $ID; ?>_form" method="post" action="src/dataManipulation.php" target="_self">
           			<input type="hidden" name="tab" value="paperAuthor">
		            <input type="hidden" name="key_field" value="ID">
         		    <input type="hidden" name="key_value" value="">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="IDpaper" value="<?php echo $ID; ?>">                                                          
                   <div id="authorSearch_<?php echo $ID; ?>_Result">
                   </div>                                     
                   </form>               
       </td>              
       </tr>    
    
    
    
    
    <tr><td class="title_colomn"> назва </td> <td style="font-size:10px; color:#FFFFCC;">
    <p id="title_<?php echo $ID; ?>"> <?php if($title!="") echo $title; else echo "немає даних";?> </p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('title_<?php echo $ID; ?>', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=title & tab=paper ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
    </td></tr>
    <tr><td class="title_colomn"> УДК </td> <td style="font-size:10px; color:#FFFFCC;">
    <p id="udk_<?php echo $ID; ?>"> <?php if($udk!="") echo $udk; else echo "немає даних";?> </p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('udk_<?php echo $ID; ?>', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=udk & tab=paper ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>    
    </td></tr>    
    <tr><td class="title_colomn"> резюме </td> <td style="font-size:10px; color:#FFFFCC;">
	
    
    <p id="abstract_ua_<?php echo $ID; ?>"> <?php if($abstract_ua!="") echo $abstract_ua; else echo "немає даних";?> </p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('abstract_ua_<?php echo $ID; ?>', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=abstract_ua & tab=paper ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>  
    </td></tr> 
    <tr><td class="title_colomn"> резюме (англійською мовою) </td> <td style="font-size:10px; color:#FFFFCC;">
	    <p id="abstract_en_<?php echo $ID; ?>"> <?php if($abstract_en!="") echo $abstract_en; else echo "немає даних";?> </p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('abstract_en_<?php echo $ID; ?>', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=abstract_en & tab=paper ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script> 
    
    </td></tr>     
    <tr><td class="title_colomn"> сторінки (початок) </td> <td style="font-size:10px; color:#FFFFCC;">

        <p id="pFirst_<?php echo $ID; ?>"> <?php if($pageFirst!="") echo $pageFirst; else echo "немає даних";?> </p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('pFirst_<?php echo $ID; ?>', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=pageFirst & tab=paper ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script> 
    
    </td></tr> 
    <tr><td class="title_colomn"> сторінки (кінець) </td> <td style="font-size:10px; color:#FFFFCC;">
	        <p id="pLast_<?php echo $ID; ?>"> <?php if($pageLast!="") echo $pageLast; else echo "немає даних";?> </p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('pLast_<?php echo $ID; ?>', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=pageLast & tab=paper ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script> 
    
    
    </td></tr>   
   <?
}

?>
