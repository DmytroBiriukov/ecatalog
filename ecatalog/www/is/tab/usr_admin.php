<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Admin Desktop
[begin]
---------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------> 
<tr>
  <td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10; color:#FFFFCC;" background="img/top_04.jpg"
  height="20" width="982">      
       &nbsp; &gt; Стартова  &nbsp; | &nbsp; 
<a href="src/statistics.php" target="_blank" >Статистика внесення в базу даних</a>  
&nbsp; | &nbsp;  
<a href="../phpfm" target="_blank" >Робоча директорія</a>  
</td>
</tr>
<tr>
  <td>

<!-- 
 <img src="../cgi-bin/mimetex.cgi?k_i=\sum\limits_{j=1}^n{a_{ij}}" alt="" border=0 align=middle>
 
 <img src="http://www.forkosh.dreamhost.com/mimetex.cgi?k_i=\sum\limits_{j=1}^n{a_{ij}}" alt="" border=0 align=middle> <br>
-->

<div id="navcontainer2">
  <ul id="navlist">
	<li><a href="#" class="current">Відкрити доступ до збірників та журналів</a></li>
	<li><a href="#">Новий редактор контенту</a></li>            
	<li><a href="#">Наукові видання та конференції</a></li>  
	<li><a href="#">Конференції</a></li>      
   	<li><a href="#">Директорія</a></li>      
	<li><a href="#">УДК</a></li>                     
  </ul>
</div>
<div id="content">
<!-- TAB1 ---------------------------------->
<div class="opentab" id="tab1">     

<a href="#access_edt_journ">Відкрити доступ до збірників та журналів</a> &nbsp;|&nbsp;
<a href="#access_edt_conf">Відкрити доступ до конференцій</a> &nbsp;|&nbsp;
<a href="#access_edt_scicon">Відкрити доступ до спеціалізованих вчених рад</a> 

<h3 id="access_edt_journ">Відкрити доступ до збірників та журналів</h3>

<form id="form1" name="form1" method="post" target="_blank" action="src/user2colljourn.php">
<table style="font-size:10px;">
<tr>
<td colspan="3">
<input name="submitButton" type="submit" value="Внести дані" />
</td>
</tr>
<tr style="background:#666666; color:#FFFFFF; font-style:oblique;">
<td>Редактор контенту</td>
<td>Наукові періодичні видання</td>
</tr>
<tr>
<td  valign="top">
<table style="font-size:10px;">
<?php
  $query1="SELECT u.ID, u.username, d.title FROM users u, department d WHERE u.IDdep=d.ID AND d.IDinst=112 AND u.usergrp=2 ORDER BY d.idx";
  $result1=ExecuteQuery($query1);
  $depTitle0="";
  while($line1= mysql_fetch_array($result1, MYSQL_ASSOC))
  { $IDuser=$line1["ID"];
    $username=$line1["username"];
	$depTitle=$line1["title"];
	if($depTitle0 != $depTitle) 
	{ $depTitle0=$depTitle;
	  print("<tr> <td style=\" background:#CCCCCC \"> <em> $depTitle </em></td></tr>");
	}
	
    print("<tr> <td> <input type='checkbox' name='userList[]' value='$IDuser' >$username</td></tr>");
  }
  mysql_free_result($result1);
?>
</table>
</td>
<td valign="top">
<table style="font-size:10px;">
<?php
  $query2="SELECT c.ID, c.title, sf.title as sftitle FROM collection c, collection2scifield c2sf, scifield sf WHERE c.IDinst=112  AND sf.ID=c2sf.IDsciField AND c2sf.IDcollection=c.ID ORDER BY sf.title";
  $result2=ExecuteQuery($query2);
  $sciField0="";
  while($line2= mysql_fetch_array($result2, MYSQL_ASSOC))
  { $IDcollection=$line2["ID"];
    $title=$line2["title"];
	$sciField=$line2["sftitle"];
	if($sciField0 != $sciField) 
	{ $sciField0=$sciField;
	  print("<tr> <td style=\" background:#CCCCCC \"> <em> $sciField </em></td></tr>");
	}
    print("<tr> <td> <input type='checkbox' name='collectionList[]' value='$IDcollection' >$title</td></tr>");
  }
  mysql_free_result($result2);
?>
</table>
</td>
</tr>
</table>
</form>



<h3 id="access_edt_conf">Відкрити доступ до конференцій</h3>
<a href="#top"><img src="img/up.gif" border="0">вгору</a>
<form id="form11" name="form11" method="post" target="_blank" action="src/user2conf.php">
<table style="font-size:10px;">
<tr>
<td colspan="3">
<input name="submitButton" type="submit" value="Внести дані" />
</td>
</tr>
<tr style="background:#666666; color:#FFFFFF; font-style:oblique;">
<td>Редактор контенту</td>
<td>Конференції</td>
</tr>
<tr>
<td  valign="top">
<table style="font-size:10px;">
<?php
  $query11="SELECT u.ID, u.username, d.title FROM users u, department d WHERE u.IDdep=d.ID AND d.IDinst=112 AND u.usergrp=3 ORDER BY d.idx";
  $result11=ExecuteQuery($query11);
  $depTitle0="";
  while($line1= mysql_fetch_array($result11, MYSQL_ASSOC))
  { $IDuser=$line1["ID"];
    $username=$line1["username"];
	$depTitle=$line1["title"];
	if($depTitle0 != $depTitle) 
	{ $depTitle0=$depTitle;
	  print("<tr> <td style=\" background:#CCCCCC \"> <em> $depTitle </em></td></tr>");
	}
	
    print("<tr> <td> <input type='checkbox' name='userList[]' value='$IDuser' >$username</td></tr>");
  }
  mysql_free_result($result11);
?>
</table>
</td>
<td valign="top">
<table style="font-size:10px;">
<?php
  $query12="SELECT c.ID, c.title, c.type, d.title AS sftitle FROM conference c, department d  WHERE d.IDinst=112  AND d.ID=c.IDdep ORDER BY d.idx";
  $result12=ExecuteQuery($query12);
  $depTitle0="";
  while($line2= mysql_fetch_array($result12, MYSQL_ASSOC))
  { $IDconf=$line2["ID"];
    $title=$line2["title"];
    $type=$line2["type"];	
	$depTitle=$line2["sftitle"];
	if($depTitle0 != $depTitle) 
	{ $depTitle0=$depTitle;
	  print("<tr> <td style=\" background:#CCCCCC \"> <em> $depTitle </em></td></tr>");
	}
    print("<tr> <td> <input type='checkbox' name='confList[]' value='$IDconf' >$title (<em>$type</em>)</td></tr>");
  }
  mysql_free_result($result12);
?>
</table>
</td>
</tr>
</table>
</form>



<h3 id="access_edt_scicon">Відкрити доступ до спеціалізованих вчених рад</h3> 
<a href="#top"><img src="img/up.gif" border="0">вгору</a>
<form id="form12" name="form12" method="post" target="_blank" action="src/user2scicon.php">
<table style="font-size:10px;">
<tr>
<td colspan="3">
<input name="submitButton" type="submit" value="Внести дані" />
</td>
</tr>
<tr style="background:#666666; color:#FFFFFF; font-style:oblique;">
<td>Редактор контенту</td>
<td>Спеціалізовані вчені ради</td>
</tr>
<tr>
<td  valign="top">
<table style="font-size:10px;">
<?php
  $query11="SELECT u.ID, u.username, d.title FROM users u, department d WHERE u.IDdep=d.ID AND d.IDinst=112 AND u.usergrp=4 ORDER BY d.idx";
  $result11=ExecuteQuery($query11);
  $depTitle0="";
  while($line1= mysql_fetch_array($result11, MYSQL_ASSOC))
  { $IDuser=$line1["ID"];
    $username=$line1["username"];
	$depTitle=$line1["title"];
	if($depTitle0 != $depTitle) 
	{ $depTitle0=$depTitle;
	  print("<tr> <td style=\" background:#CCCCCC \"> <em> $depTitle </em></td></tr>");
	}
	
    print("<tr> <td> <input type='checkbox' name='userList[]' value='$IDuser' >$username</td></tr>");
  }
  mysql_free_result($result11);
?>
</table>
</td>
<td valign="top">
<table style="font-size:10px;">
<?php
  $curdate="20".date("y-m-d");
  $query12="SELECT sc.ID, sc.code, sc.credate, sc.findate, d.title FROM scicons sc, department d  WHERE d.IDinst=112  AND d.ID=sc.IDdep ORDER BY d.idx, sc.findate";
  $result12=ExecuteQuery($query12);
  $depTitle0="";
  while($line2= mysql_fetch_array($result12, MYSQL_ASSOC))
  { $IDsc=$line2["ID"];
    $sc=$line2["code"];
    $depTitle=$line2["title"];
    $cd=$line2["credate"];	
	$fd=$line2["findate"];
	
	if($depTitle0 != $depTitle) 
	{ $depTitle0=$depTitle;
	  print("<tr> <td style=\" background:#CCCCCC \"> <em> $depTitle </em></td></tr>");
	}
	if($curdate<$fd)
    print("<tr> <td> <input type='checkbox' name='sciconList[]' value='$IDsc' >$sc (<em>$cd-$fd</em>)</td></tr>");
	else
	print("<tr> <td> <input type='checkbox' name='sciconList[]' value='$IDsc' >$sc (<span style='color:red;'><em>$cd-$fd</em></span>)</td></tr>");
  }
  mysql_free_result($result12);
?>
</table>
</td>
</tr>
</table>
</form>




</div>

<!-- TAB2 ---------------------------------->
<div class="tab" id="tab2">
<p>Новий редактор контенту
</p>
    <form name="add_contentEditor" method="post" action="src/dataManipulation.php">
           <input type="hidden" name="tab" value="users">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="">                      
           <input type="hidden" name="action" value="INSERT">  



           <table>
             <tr>
               <td class="title_colomn">ПІБ</td>
               <td>
               <!-- <input type="text"  name="address" value="" size="50">
               -->
               <input type="text" name="username"/>               
               </td>
             </tr>
             <tr>
               <td  class="title_colomn">login</td>
               <td><input type="text" name="userlgn" size="15" value=""></td>
             </tr>
             <tr>
               <td  class="title_colomn">password</td>
               <td><input type="text" name="userpwd" size="15" value=""></td>
             </tr>             
             <tr>
               <td  class="title_colomn">user group</td>
               <td> 
                    <select name="usergrp">
			<option name='usergrp' value='2'>періодика</option>
			<option name='usergrp' value='3'>конференції</option>
			<option name='usergrp' value='1'>вчені ради</option>
			<option name='usergrp' value='4'>секретарі вчених рад</option>
		    </select>             
	       </td>
             </tr>
             <tr>
               <td class="title_colomn">e-mail</td>
               <td><input type="text" name="email" size="15" value=""></td>
             </tr>
             <tr>
               <td  class="title_colomn">контактний телефон (основний)</td>
               <td><input type="text" name="telephone" size="15" value=""></td>
             </tr>
             <tr>
               <td  class="title_colomn">контактний телефон (direct)</td>
               <td><input type="text" name="dirphone" size="15" value=""></td>
             </tr>
             <tr>
               <td  class="title_colomn">mob</td>
               <td><input type="text" name="mobile" size="15" value=""></td>
             </tr>            
             <tr>
               <td  class="title_colomn">факультет</td>
               <td>
               <select name="IDdep" size="1">
               <?php ListDeps(112); 
               ?>
               </select>
                           </td>
             </tr>
             <tr>
                  <td  align=right colspan=2>
                        <input type=submit size='70' value='Внести в базу даних' name=submit_button>
                  </td>
            </tr>
           </table>
    </form>  
  










</div>

<!----  Наукові видання -------------------------------->
<div class="tab" id="tab3">

<table style="font-size:10px;">
 <tr>
    <td class="title_row"> Нова редакційна коллегія 
    </td>
 </tr>
 <tr>          
    <td>        
    <form name="add_edsBoard" method="post" action="dataManipulation.php">
           <input type="hidden" name="tab" value="edsBoard">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="">                      
           <input type="hidden" name="action" value="INSERT">           
<!-- <input type="hidden" name="action" value="UPDATE">           
-->           
           <table style="font-size:10px;">
  <tr><td class="title_colomn"> Виберіть </td>
      <td colspan=2>
      <label><input type="radio" name="tab" id="tab" value="journal"  /> журнал</label>
      <label><input type="radio" name="tab" id="tab" value="collection" checked="checked"  />збірник</label>
      </td>
  </tr>
  <tr><td class="title_colomn">Пошук</td>
  <td colspan="2"> <input name="journcoll_search2" id="journcoll_search2" type="text" onKeyUp="quickSearchJournal('journcoll_search2', 'journcoll_searchResult2','tab', 4, 'src/responses/journcollSearch.php'); " /> 
  <div id="journcoll_searchResult2">
  <em>введіть не менше 4 символів</em>
  </div>
  </td>
  </tr>           
             <tr>
               <td class="title_colomn">адреса</td>
               <td>
               <!-- <input type="text"  name="address" value="" size="50">
               -->
               <textarea name="address" cols="32" rows="3"></textarea>               
               </td>
             </tr>
             <tr>
               <td  class="title_colomn">дата початку роботи (рік, місяць, день)</td>
               <td><input type="text" name="started" size="15" value="200y.mm.dd"></td>
             </tr>
             <tr>
               <td class="title_colomn">дата закінчення роботи (рік, місяць, день)</td>
               <td><input type="text" name="finished" size="15" value="0000.00.00"></td>
             </tr>
             <tr>
               <td  class="title_colomn">контактний телефон (основний)</td>
               <td><input type="text" name="ph1" size="15" value=""></td>
             </tr>
             <tr>
               <td  class="title_colomn">контактний телефон (2)</td>
               <td><input type="text" name="ph2" size="15" value=""></td>
             </tr>
             <tr>
               <td  class="title_colomn">факс</td>
               <td><input type="text" name="fax" size="15" value=""></td>
             </tr>            
             <tr>
               <td  class="title_colomn">факультет</td>
               <td>
               <select name="IDdep" size="1">
               <?php ListDeps(112); 
               ?>
               </select>
                           </td>
             </tr>
             <tr>
                  <td  align=right colspan=2>
                        <input type=submit size='70' value='Внести в базу даних' name=submit_button>
                        </td>
            </tr>
           </table>
    </form>
    </td>
  </tr>
 <tr>
    <td class="title_row"> Внесення даних з XML файлу 
    </td>
 </tr>
 <tr>          
    <td>        
  <form name="parseIssueForm" enctype="multipart/form-data" action="src/parseIssue4db.php" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
  <table width="550" style="font-size:10px;">
  <tr><td class="title_colomn"> Виберіть </td>
      <td colspan=2>
      <label><input type="radio" name="tab" id="tab" value="journal"  /> журнал</label>
      <label><input type="radio" name="tab" id="tab" value="collection" checked="checked"  />збірник</label>
      </td>
  </tr>
  <tr><td class="title_colomn">Пошук</td>
  <td colspan="2"> <input name="journcoll_search" id="journcoll_search" type="text" onKeyUp="quickSearchJournal('journcoll_search', 'journcoll_searchResult','tab', 4, 'src/responses/journcollSearch.php'); " /> 
  <div id="journcoll_searchResult">
  <em>введіть не менше 4 символів</em>
  </div>
  </td>
  </tr>
  
  
  <tr><td colspan=3 class="title_colomn">XML файл з змістом номера: </td></tr>
  <tr>
  <td width="150" class="title_colomn">Виберіть файл:</td>
  <td width="200"><input type="file" name="xmlfile" /></td>
  <td width="200"><input type="submit" value="Завантажити дані" /></td>
  </tr>
  </table>
  </form>


    
    
    </td>
 </tr>

</table>
 

</div>


<!----  Конференції -------------------------------->
<div class="tab" id="tab4">

<!--
---------------------------------------------------------------------------------------------------------------------------------->              
<table style="font-size:10px;" width="500">
 <tr>
    <td class="title_row"> Додати нову конференцію
    </td>
 </tr>
 <tr>          
    <td>  						
<!--
---------------------------------------------------------------------------------------------------------------------------------->
<form name="conf_add" method="post" action="src/dataManipulation.php" target="_self">
  <input type="hidden" name="tab" value="conference">
  <input type="hidden" name="key_field" value="ID">
  <input type="hidden" name="key_value" value="">                      
  <input type="hidden" name="action" value="INSERT">     
<table>
  <tr>
    <td class="title_colomn"> Назва
    </td>
    <td> <input type="text" name="title" size="66" value="">
    </td>
  </tr>
  <tr>
    <td class="title_colomn"> Скорочена назва
    </td>
    <td> <input type="text" name="shortTitle" size="35" value="">
    </td>
  </tr>  
  <tr>
    <td class="title_colomn"> Тип
    </td>
    <td> 
    <select name="type">
      <option value="міжнародна">міжнародна</option>
      <option value="всеукраїнська">всеукраїнська</option>
      <option value="молодих вчених">молодих вчених</option>
    </select>
    </td>
  </tr>
  <tr>
    <td class="title_colomn"> Періодичність
    </td>
    <td>
    <select name="frequency">
      <option value="щорічна">щорічна</option>
      <option value="двічі на рік">двічі на рік</option>
      <option value="непостійна">непостійна</option>
    </select> 
    </td>
  </tr>
  <tr>
    <td class="title_colomn"> Започаткована
    </td> 
    <td> <input type="text" name="established" size="4" value="">
    </td>
  </tr>  
  <tr>
    <td class="title_colomn"> Факультет/інститут, що проводить
    </td>
    <td>
    <select name="IDdep">
<?php    
	  $query1 = "SELECT * FROM department WHERE IDinst=112 ORDER BY idx";           
      if( $num_rows = mysql_num_rows( $result1 = mysql_query($query1) ) )
        while ($line1 = mysql_fetch_array($result1, MYSQL_ASSOC))
           echo "<option name='IDdep' value='".$line1["ID"]."'>".$line1["title"]."</option>";
      mysql_free_result($result1);
?>    
    </select> 
    </td>
  </tr>
  <tr>
    <td class="title_colomn"> Інформація
    </td>
    <td>  <textarea name="description" ROWS="3" COLS="50"></textarea>   
    </td>
  </tr>
  <tr>
    <td class="title_colomn"> Формат анотацій 
    </td>
    <td>
    <select name="abstractFormat">
      <option value="plainText">простий текст</option>
      <option value="tex">ТеХ</option>
    </select> 
    </td>
  </tr>  
  <tr>
    <td class="title_colomn"> Веб-сайт
    </td>
    <td> <input type="text" name="url" size="35" value="">
    </td>
  </tr>
  <tr>
    <td class="title_colomn"> Відповідальна особа
    </td>
    <td> <input type="text" name="responsible" size="35" value="">
    </td>
  </tr>
  <tr>
    <td class="title_colomn"> Адреса
    </td>
    <td>  <textarea name="address" ROWS="3" COLS="50"></textarea>   
    </td>
  </tr> 
  <tr>
    <td class="title_colomn"> Телефон
    </td>
    <td> <input type="text" name="phone" size="7" value="">
    </td>
  </tr>
  <tr>
    <td class="title_colomn"> Факс
    </td>
    <td> <input type="text" name="fax" size="7" value="">
    </td>
  </tr> 
  <tr>
    <td class="title_colomn"> е-пошта
    </td>
    <td> <input type="text" name="email" size="35" value="">
    </td>
  </tr>
             <tr>
                  <td  align=right colspan=2>
                        <input type=submit size='70' value='Внести в базу даних' name=submit_button>
                        </td>
            </tr>
</table>
</form>
<!--
---------------------------------------------------------------------------------------------------------------------------------->

<!--
---------------------------------------------------------------------------------------------------------------------------------->
							<p>Конференції в базі даних</p>   
<?php
$query="SELECT * FROM conference";
$fields=array("ID","title","type","frequency","established","description","abstractFormat","url","responsible","address","phone","fax","email");

if( mysql_num_rows($result=ExecuteQuery($query)) )
{ echo "<table style='font-size:10px;'>";
  echo "<tr style='background:#666666; color:#FFFFFF; font-style:oblique;'>";
  foreach($fields as $field)
  { echo "<td>$field</td>";
  }
  echo "</tr>";
/**/   
  while($line = mysql_fetch_array($result, MYSQL_ASSOC))
  {  echo "<tr>";
     $i=1;
     foreach($fields as $field)
     { echo "<td";
	   if($i % 2) echo " bgcolor=#CCCCFF";
	   echo ">".$line[$field]."</td>";
	   $i++;
     }
     echo "</tr>";		
  }
 
  echo "</table>";
} else
echo "<p class='error'>Error while connecting to DB!</p>";
?>





</div>


<!----  Директорія -------------------------------->
<div class="tab" id="tab5">

<a class="footer_links" href="javascript: updateTag('work_dir','src/responses/updateDirTag.php','dir='); " onMouseOver="window.status='';return true;">
<!--<a class="footer_links" href="javascript:updateTag('work_dir','src/responses/updateVolumeTag.php','IDVolume=58'); " onMouseOver="window.status='';return true;">-->
Робоча директорія	  
</a>  
<div id="work_dir">
</div>
</div>



<div class="tab" id="tab6">

<?php
/**/
/*$link = mysql_connect("localhost", "root", "");
mysql_select_db("bsr");*/

$query1 = "SELECT * FROM bsr.CRML1";
$result1 = mysql_query ($query1);
if(mysql_num_rows( $result1 )>0)
{ while($line1=mysql_fetch_array($result1, MYSQL_ASSOC))
  { 
    echo $line1["udc"]." - ".$line1["title_ru"]."<br>";  
	$query2="SELECT * FROM bsr.CRML2 WHERE IDCRML1=".$line1["ID"]." ";
    $result2=mysql_query ($query2); 
    if(mysql_num_rows( $result2)>0)
    { while($line2=mysql_fetch_array($result2, MYSQL_ASSOC))
      {
		 echo "&nbsp;&nbsp;&nbsp;&nbsp;".$line2["udc"]." - ".$line2["title_ru"]."<br>";		
		 $query3="SELECT * FROM bsr.CRML3 WHERE IDCRML2=".$line2["ID"]." ";
		 $result3=mysql_query ($query3); 
	     if(mysql_num_rows( $result3)>0)
	     { while($line3=mysql_fetch_array($result3, MYSQL_ASSOC))
    	   {	   
		      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$line3["udc"]." - ".$line3["title_ru"]."<br>";
			  
		 	  $query4="SELECT * FROM bsr.CRML4 WHERE IDCRML3=".$line3["ID"]." ";
	  		  $result4=mysql_query ($query4); 
	          if(mysql_num_rows( $result4)>0)
	          { while($line4=mysql_fetch_array($result4, MYSQL_ASSOC))
    	        {	   
		         echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$line4["udc"]." - ".$line4["title_ru"]."<br>";
		        }
		      }  
	          mysql_free_result( $result4); 			  
			  
		   }
		 }  
	     mysql_free_result( $result3); 		     
	  }
	}  
    mysql_free_result( $result2); 	
  }
}
mysql_free_result( $result1); 

?>

</div>




</div>
<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Admin Desktop
[end]
---------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------> 
