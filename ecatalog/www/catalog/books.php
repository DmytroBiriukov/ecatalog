<?php 
  header('Content-Type: text/plain; charset=windows-1251');
  include("../is/src/evisnyk.php"); 
  $query="SELECT DISTINCT sf.title AS sftitle, sf.ID AS IDsciField FROM book b, scifield sf WHERE b.IDsciField=sf.ID ORDER BY sf.title, b.ID ";
  $result = ExecuteQuery($query);
  $num_rows = mysql_num_rows($result);
  if($num_rows>0)
  {
?>
<img src="img/scibranches_books.png" border="0" usemap="#Map"/>
<map name="Map" id="Map">
  <area shape="rect" coords="327,110,473,136" href="#BooksciField_16" />
  <area shape="rect" coords="328,83,474,109" href="#BooksciField_3" />
  <area shape="rect" coords="32,109,178,135" href="#BooksciField_23" />
  <area shape="rect" coords="473,83,618,109" href="#BooksciField_11" />
  <area shape="rect" coords="474,109,619,135" href="#BooksciField_4" />
  <area shape="rect" coords="32,82,178,108" href="#BooksciField_7" />
  <area shape="rect" coords="32,135,178,161" href="#BooksciField_22"/>
  <area shape="rect" coords="180,110,325,136" href="#BooksciField_19" />
  <area shape="rect" coords="327,136,473,162" href="#BooksciField_1" />
  <area shape="rect" coords="180,83,325,109" href="#BooksciField_13" />
  <area shape="rect" coords="32,162,178,188" href="#BooksciField_9" />
  <area shape="rect" coords="180,136,325,162" href="#BooksciField_10" />
  <area shape="rect" coords="475,136,620,162" href="#BooksciField_2" />
  <area shape="rect" coords="180,164,325,190" href="#BooksciField_12" />
<area shape="rect" coords="180,56,325,82" href="#BooksciField_27" />
<area shape="rect" coords="31,55,178,81" href="#CapLetter_subject_8" />
</map>   
<?
  }
  mysql_free_result($result);
  $query="SELECT b.*, sf.title AS sftitle FROM book b, scifield sf WHERE b.IDscifield=sf.ID ORDER BY sf.title, b.ID ";
  $result =  ExecuteQuery($query);
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
?> <p class='cap_letter'>   
   <a name="BooksciField_<? echo $line['IDsciField'];?>"></a>
  <? echo $line['sftitle']; ?>&nbsp;науки 
   <a href='#top' > <img src='is/img/up.gif' border=0/></a>
   </p>

<?	     
	   }
       
?>  <div class="paperInfo">
    <table>

             <tr>
               <th>
               <img src="http://evisnyk.unicyb.kiev.ua/doc/books/img/<? echo $line['ID']; ?>.jpg" title="<? echo $line['ref']; ?>">
               </td>
               <td>              
                 <h2><? echo $line['title_ua']; ?></h2>              
				 <? if($line['type'] == "multivolume")
					{?><h3><? echo $line['volume_title']; ?></h3><?
					}

    $result2 = mysql_query("SELECT p.* FROM personality p, bookAuthor ba WHERE ba.IDperson=p.ID AND IDbook=$IDbook ORDER BY ba.ID");
    $ii=0;
    while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
    { 
	  $IDperson=$line2["ID"];
      $name=$line2["name"];
	  $scideg=$line2["scideg"];
	  $scipos=$line2["scipos"];	
	  $position=$line2["position"];	
	  $IDinst=$line2["IDinst"];	
	  if($ii) echo ", ";
	  $pRef=personality($IDperson);
	  echo $pRef['HTML'];
	  /*
?>
<a href="#" title="<?	  
	  if($scipos!="") echo $scipos." ";
      echo $name;
      if($scideg!="") echo ", ".$scideg;
	  if($position!="") echo ", ".$position;	
	  if($IDinst!=112 && $IDinst!='') { echo ", "; printTitle("institutions", $IDinst);}
	  if($IDinst==112) echo ", КНУ";
?>"><?  echo LFF($name); ?></a>
<?      */
	  $ii++;
              }
?>

				<p><? echo $line['abstract_ua']; ?></p>
               </td>
             </tr>
             <tr>
               <th>
               ISBN
               </th>
               <td>              
<? echo $line['isbn']; 
?>
               </td>
             </tr>  
<? if($line['udc']!="")
   { 
?>                
             <tr>
               <th>
               УДК
               </th>
               <td>              
<? echo $line['udc']; 
?>
               </td>
             </tr>  
<? } 
?>             
             <tr>
               <th>
               рік видання
               </th>
               <td>              
<? echo $line['year']; 
?>
               </td>
             </tr>                                     
             <tr>
               <th>
               кількість сторінок
               </th>
               <td>              
<? echo $line['pageCount']; 
?>
               </td>
             </tr> 
<? if($line['info'] != "")
{ 
?>
             <tr>
               <th>
                              </th>
               <td>              
<? echo $line['info']; 
?>
               </td>
             </tr>

<?
}
?>                        
 </table>         
 </div>            
<?  
   }
}
?>