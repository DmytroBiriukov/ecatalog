<?php
$link = my_db_connect();

if(!empty($link))
{ my_db_select();
  $query="SELECT DISTINCT sf.title AS sftitle, sf.ID AS IDsciField FROM book b, scifield sf WHERE b.IDsciField=sf.ID ORDER BY sf.title, b.ID ";
// evisnyk.book   evisnyk.bookAuthor  bsr.personality   
  
  $result = mysql_query($query);
  $num_rows = mysql_num_rows($result);
  if($num_rows>0)
  {
?>
<p class="catalog_chapter">   <a name="news"></a>Нові монографії &nbsp; <a href='#top' > <img src='is/img/up.gif' border=0/></a>
<br>З напрямків дослідження:<br>
<?
     while($line = mysql_fetch_array($result, MYSQL_ASSOC))
	 { 
	   echo "&nbsp;&nbsp; <a href='#BooksciField_".$line['IDsciField']."' >".$line['sftitle']."</a> <br> ";
	 }
?>
</p>    
<?
  }
  $query="SELECT b.*, sf.title AS sftitle FROM book b, scifield sf WHERE b.IDscifield=sf.ID ORDER BY sf.title, b.ID ";
  $result = mysql_query($query);
  $num_rows = mysql_num_rows($result);
  if($num_rows>0)
  {
    $IDsciField=0;
    while($line = mysql_fetch_array($result, MYSQL_ASSOC))
   {   $IDbook=$line['ID']; 
       //echo $line['IDsciField'];
   /**/
       if($IDsciField != $line['IDsciField']) 
	   { $IDsciField = $line['IDsciField'];
?> <p class="catalog_chapter">   
   <a name="BooksciField_<? echo $line['IDsciField'];?>"></a>
  <? echo $line['sftitle']; ?>&nbsp;науки 
   <a href='#top' > <img src='is/img/up.gif' border=0/></a>
   </p>

<?	     
	   }
       $result2 = mysql_query("SELECT p.* FROM personality p, bookAuthor ba WHERE ba.IDperson=p.ID AND IDbook=$IDbook ORDER BY ba.ID");
?>  <table>
             <tr>
               <td class="title_colomn">
               автор<? if(mysql_num_rows($result2)>1) echo "и"; ?>
               </td>
               <td class='header_links'> 
<? 
  $ii=0;
               while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
              { 
			  $IDperson=$line2["ID"];
      $name=$line2["name"];
	  $scideg=$line2["scideg"];
	  $scipos=$line2["scipos"];	
	  $position=$line2["position"];	
	  $IDinst=$line2["inst"];	
	  if($ii) echo ", ";
?>
<a href="javascript:void(0);" onMouseOver="return overlib(
<?	  
echo "'";
	  if($scipos!="") echo $scipos." ";
      echo $name;
      if($scideg!="") echo ", ".$scideg;
	  if($position!="") echo ", ".$position;	
	  if($IDinst!=112 && $IDinst!='') { echo ", "; printTitle("institutions", $IDinst);}
	  if($IDinst==112) echo ", КНУ";
echo "'";
?>	  ,TEXTFONT,'Verdana, Arial');" onMouseOut="return nd();" class='header_links'><?    echo LFF($name) ?> </a>


<?      
	  $ii++;
              }
?>

               </td>
             </tr>
             <tr>
               <td class="title_colomn">
               назва
               </td>
               <td class = 'journalInfo'  style="color:#FFFFFF">              
<? echo $line['title_ua']; 
?>
               </td>
             </tr>
<? if($line['type'] == "multivolume")
{ 
?>
             <tr>
               <td class="title_colomn">
                              </td>
               <td class = 'journalInfo'  style="color:#FFFFFF">              
<? echo $line['volume_title']; 
?>
               </td>
             </tr>

<?
}
?>             
             <tr>
               <td class="title_colomn">
               <img src="is/img/books/<? echo $line['ID']; ?>.jpg" title="<? echo $line['ref']; ?>">
               </td>
               <td class = 'journalInfo'  style="color:#FFFFFF; text-align:justify; ">              
<? echo $line['abstract_ua']; 
?>
               </td>
             </tr>
             <tr>
               <td class="title_colomn">
               ISBN
               </td>
               <td class = 'journalInfo'  style="color:#FFFFFF">              
<? echo $line['isbn']; 
?>
               </td>
             </tr>  
<? if($line['udc']!="")
   { 
?>                
             <tr>
               <td class="title_colomn">
               УДК
               </td>
               <td class = 'journalInfo'  style="color:#FFFFFF">              
<? echo $line['udc']; 
?>
               </td>
             </tr>  
<? } 
?>             
             <tr>
               <td class="title_colomn">
               рік видання
               </td>
               <td class = 'journalInfo'  style="color:#FFFFFF">              
<? echo $line['year']; 
?>
               </td>
             </tr>                                     
             <tr>
               <td class="title_colomn">
               кількість сторінок
               </td>
               <td class = 'journalInfo'  style="color:#FFFFFF">              
<? echo $line['pageCount']; 
?>
               </td>
             </tr> 
<? if($line['info'] != "")
{ 
?>
             <tr>
               <td class="title_colomn">
                              </td>
               <td class = 'journalInfo'  style="color:#FFFFFF">              
<? echo $line['info']; 
?>
               </td>
             </tr>

<?
}
?>                        
<tr>
  <td colspan=2>&nbsp;  </td>
</tr>    
 </table>                     
<?  
   }
?>
     
<?
}
}
?>


