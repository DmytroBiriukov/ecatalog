<?php
 $ID=$_POST['ID'];
 $STATE=$_POST['STATE'];
 
 include ("../is/src/evisnyk.php");
 
 $result1=ExecuteQuery("SELECT ch.subTitle, c.title AS ctitle, ch.IDconf FROM confhold ch, conference c WHERE ch.IDconf=c.ID AND ch.ID=$ID ");
 $num_rows = mysql_num_rows($result1);
 if($num_rows)
 {
  if($line1 = mysql_fetch_array($result1, MYSQL_ASSOC))
  { $title=$line1["ctitle"];
    $IDconf=$line1["IDconf"];
  } 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Електронний каталог конференцій Київського університету</title>
<link href="http://ecatalog.univ.kiev.ua/css/new.css" type="text/css" rel="STYLESHEET">
<link  type="image/x-icon" rel="shortcut icon" href="css/img/logo3.ico">
<script type="text/javascript" src="src/script.js"></script>
<script language="javascript">
<!--
function CheckAppForm(state)
{
 var message = "";
 var m2;
 var i=0;
 switch(state)
 { case 1:  if ( (document.appform.paper_title_ua.value.length==0) || (document.appform.paper_title_en.value.length==0) || (document.appform.paper_author_cnt.value.length==0) 
             || (document.appform.paper_lang.value.length==0) || (document.appform.paper_abstract_ua.value.length==0) || (document.appform.paper_abstract_en.value.length==0) ) 
			 message="Заповніть обов\'язкові поля, які відмічені червоними * "; break;
/*   case 2:  for(i=0;i< document.appform.paper_author_cnt.value;i++) 
            { if(document.appform.authorSearch[i].value.length==0) message="Заповніть обов\'язкові поля, які відмічені червоними * "; 
			}
			break;
*/ case 4: for(i=0;i< document.appform.paper_author_cnt.value;i++)
           { //var e=document.getElementByName["edt_author_name_"+IntToStr(i)];
		     //if(e.value.length>0) message=message+e.value;   
			 /*
			 if(document.appform.edt_author_name_1.value.length==0 || document.appform.edt_author_name_en_1.value.length==0 || document.appform.edt_author_name_ru.value.length==0
			 || document.appform.edt_author_scipos_1.value.length==0 || document.appform.edt_author_scideg_1.value.length==0
			 || document.appform.edt_author_position_1.value.length==0 || document.appform.edt_author_inst_1.value.length==0 
			 ) message="Заповніть обов\'язкові поля, які відмічені червоними * "; 
			 */
//			 m2=m2+ " - "+document.appform.elements[16+document.appform.paper_author_cnt.value+13*i].value;
			 //m2=m2+ " - "+document.appform.elements["edt_author_name_"+i].value;
		   }
		   //alert(m2);
		      break;	
		   //       
		   		
   default: break;
 }
// alert(" a cnt="+document.appform.paper_author_cnt.value);
 if(message.length > 0) alert( message ); else document.appform.submit();
 
}

// -->
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
  <div class="catalog_menu" id="catalog_left">
      <h2>Заповнення електронної форми</h2>
      <p> <? if($STATE<7) echo "Крок ".$STATE." / 6"; else echo " завершено "; ?></p> 
      <table cellspacing="2">
        <tr>
      <? for($i=1;$i<7;$i++)
	     { if($i == $STATE)
		   echo "<td width='7' height='10' bgcolor='#66FF00' style='font-size:10px; color:#999999' ><img src='../css/img/step.png'/></td>";
		   else
		   echo "<td width='7' height='10' bgcolor='#CCCCCC' style='font-size:10px; color:#CCCCCC' ><img src='../css/img/step_o.png'/></td>";
		 }
      ?>
        </tr>
      </table>    
<? if($STATE < 6)
   {  
?>     <div id="catalog_search"> 
       <a class="ub_dark" href="javascript: CheckAppForm(<?php echo $STATE; ?>);">&nbsp;&nbsp;&nbsp;   Продовжити   &nbsp;&nbsp;&nbsp;</a> <br><br>
       <a class="ub_light" href="javascript:document.appform.reset();">Очистити форму</a><br><br>
       </div>
<?   if($STATE ==1 )
     {  
?>
    <p><span style="color:#FF0000; font-size:12px ">Символом * відмічені поля, які є обов'язковими для заповнення</span></p>
    <p><span style="color:#666666; font-size:12px ">Двома ** відмічені поля, заповненя яких залежить від правил подання матеріалів в наукове видання</span></p>
<?   } 
	} 
?>    
</td>
<td>
  <div id="collection_body"> 
  <form name="appform" action="appform.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="ID" value="<?php echo $ID; ?>">  
<!-------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------->
  <? if( $STATE == 1)
  {
  ?>
  <input type="hidden" name="STATE" value="2"> 
  <table>
      <tr>
      <td class="title_colomn"> назва доповіді (українською мовою) <span style="color:#FF0000; font-size:16px ">*</span> </td>
      <td > <input type="text" size="85" name="paper_title_ua"> </td>
      </tr>
      <tr>
      <td class="title_colomn"> назва доповіді (англійською мовою) <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td > <input type="text" size="85" name="paper_title_en"> </td>
      </tr>
      <tr>
      <td class="title_colomn"> назва доповіді (російською мовою) <span style="color:#666666; font-size:16px ">**</span> </td>
      <td > <input type="text" size="85"  name="paper_title_ru"> </td>
      </tr>            
      <tr>
      <td colspan="2">
      <table>
      <tr>
      <td class="title_colomn"> кількість співавторів <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td > 
        <select name="paper_author_cnt"> 
          <option value="1"> 1 </option> 
          <option value="2"> 2 </option>           
          <option value="3"> 3 </option> 
          <option value="4"> 4 </option>           
          <option value="5"> 5 </option> 
          <option value="6"> 6 </option>                     
        </select> 
      </td>
      <td class="title_colomn"> мова, якою написана доповідь <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td > 
  
  <select name="paper_lang" size="1">
     <option selected value="укр." >укр.</option>
     <option value="рос." >рос.</option>
     <option  value="англ." >англ.</option>
     <option  value="нім.">нім.</option>
     <option  value="фр." >фр.</option>
     <option  value="ісп." >ісп.</option>
   </select>
      </td>  
      <td class="title_colomn"> кількість посилань на використані джерела  <span style="color:#666666; font-size:16px ">**</span></td>
      <td > <input type="text" size="2" maxlength="2" name="paper_refsCount"> </td>   
      </tr>      
      </table>
      </td>
      </tr>
      
      <tr>
      <td class="title_colomn"> УДК  <span style="color:#666666; font-size:16px ">**</span></td>
      <td > <input type="text" size="50"  name="paper_udk"> </td>  
      </tr>  
      <tr>
      <td class="title_colomn"> тип доповіді <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td > 
        <select name="paper_type"> 
          <option value="пленарна"> пленарна </option> 
          <option value="секційна"> секційна </option>           
          <option value="стендова"> стендова </option> 
        </select> 
      </td>  
       </tr>  
      <tr>   
<?
  $result=ExecuteQuery("SELECT title, ID FROM confsection WHERE IDconf =".$ID." ORDER BY ID");  
  $n=mysql_num_rows($result);
  if($n>1)
  {
?>
      <td class="title_colomn"> секція <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td > 
  <select name="paper_section" style="width:350px;"> 
<?  
  while($line = mysql_fetch_array($result, MYSQL_ASSOC)) echo "<option value='".$line["ID"]."'>".$line["title"]."</option>  ";
?>  
  </select>
        </td>  
      
<?
  }
?> 
      </tr>      
      <tr>
      <td class="title_colomn"> резюме (українською мовою) <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td> <textarea ROWS="3" COLS="50" name="paper_abstract_ua"> </textarea> </td>    
      </tr>
      <tr>
      <td class="title_colomn"> резюме (англійською мовою) <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td > <textarea ROWS="3" COLS="50"  name="paper_abstract_en"> </textarea> </td>    
      </tr>
      <tr>
      <td class="title_colomn"> резюме (російською мовою)  <span style="color:#666666; font-size:16px ">**</span></td>
      <td > <textarea ROWS="3" COLS="50"  name="paper_abstract_ru"> </textarea> </td>    
      </tr>

      <tr>
      <td class="title_colomn"> ключові слова (українською мовою)  <span style="color:#666666; font-size:16px ">**</span></td>
      <td > <textarea ROWS="1" COLS="50"  name="paper_keyWords_ua"> </textarea> </td>    
      </tr>
      <tr>
      <td class="title_colomn"> ключові слова (англійською мовою) <span style="color:#666666; font-size:16px ">**</span></td>
      <td > <textarea ROWS="1" COLS="50"  name="paper_keyWords_en"> </textarea> </td>    
      </tr>
      <tr>
      <td class="title_colomn"> ключові слова (російською мовою) <span style="color:#666666; font-size:16px ">**</span></td>
      <td > <textarea ROWS="1" COLS="50"  name="paper_keyWords_ru"> </textarea> </td>    
      </tr>

  </table>
<!-------------------------------------------------------------------------------------------------------------------

--------------------------------------------------------------------------------------------------------------------->
  <? 
  }else
  if( $STATE == 2)
  { 
  ?>  
  <input type="hidden" name="STATE" value="3">          
  <input type="hidden" name="paper_title_ua" value="<?php echo $paper_title_ua=$HTTP_POST_VARS["paper_title_ua"]; ?>">
  <input type="hidden" name="paper_title_en" value="<?php echo $paper_title_en=$HTTP_POST_VARS["paper_title_en"]; ?>">
  <input type="hidden" name="paper_title_ru" value="<?php echo $paper_title_ru=$HTTP_POST_VARS["paper_title_ru"]; ?>"> 
  <input type="hidden" name="paper_udk" value="<?php echo $paper_udk=$HTTP_POST_VARS["paper_udk"]; ?>">    
  <input type="hidden" name="paper_lang" value="<?php echo $paper_lang=$HTTP_POST_VARS["paper_lang"]; ?>">      
  <input type="hidden" name="paper_refsCount" value="<?php echo $paper_refsCount=$HTTP_POST_VARS["paper_refsCount"]; ?>">      
  <input type="hidden" name="paper_section" value="<?php echo $paper_section=$HTTP_POST_VARS["paper_section"]; ?>">  
    <input type="hidden" name="paper_type" value="<?php echo $paper_type=$HTTP_POST_VARS["paper_type"]; ?>">  
  <input type="hidden" name="paper_abstract_ua" value="<?php echo $paper_abstract_ua=$HTTP_POST_VARS["paper_abstract_ua"]; ?>">
  <input type="hidden" name="paper_abstract_en" value="<?php echo $paper_abstract_en=$HTTP_POST_VARS["paper_abstract_en"]; ?>">
  <input type="hidden" name="paper_abstract_ru" value="<?php echo $paper_abstract_ru=$HTTP_POST_VARS["paper_abstract_ru"]; ?>">
  <input type="hidden" name="paper_author_cnt" value="<?php echo $paper_author_cnt=$HTTP_POST_VARS["paper_author_cnt"]; ?>">    
  <input type="hidden" name="paper_keyWords_ua" value="<?php echo $paper_keyWords_ua=$HTTP_POST_VARS["paper_keyWords_ua"]; ?>">
  <input type="hidden" name="paper_keyWords_en" value="<?php echo $paper_keyWords_en=$HTTP_POST_VARS["paper_keyWords_en"]; ?>">
  <input type="hidden" name="paper_keyWords_ru" value="<?php echo $paper_keyWords_ru=$HTTP_POST_VARS["paper_keyWords_ru"]; ?>">
  
  
  <table>
      <tr>
      <td class="title_row" colspan="2"> Введіть початок <? if($paper_author_cnt>1) echo "прізвищя кожного з авторів"; else echo "прізвищя автора"; ?>
      <br> для здійснення пошуку в базі даних       
      </td>
      </tr>
      <tr>
      <td colspan="2">&nbsp;  </td>
      </tr>        
<?
    for($i=0;$i < $paper_author_cnt; $i++)
    {
?>
      <tr>
      <td class="title_colomn"> <? echo ($i+1); ?> </td>
      <td  valign="top"> 
      <input type="text"  size="30" name="authorSearch[]"/> 
      </td>
      </tr>
<?	
    }
?>
  </table> 
<!-------------------------------------------------------------------------------------------------------------------

---------------------------------------------------------------------------------------------------------------------> 
<?
  }else
  if( $STATE == 3)
  { $authorSearch=$HTTP_POST_VARS["authorSearch"];
?>        
  <input type="hidden" name="STATE" value="4">          
  <input type="hidden" name="paper_title_ua" value="<?php echo $paper_title_ua=$HTTP_POST_VARS["paper_title_ua"]; ?>">
  <input type="hidden" name="paper_title_en" value="<?php echo $paper_title_en=$HTTP_POST_VARS["paper_title_en"]; ?>">
  <input type="hidden" name="paper_title_ru" value="<?php echo $paper_title_ru=$HTTP_POST_VARS["paper_title_ru"]; ?>"> 
  <input type="hidden" name="paper_udk" value="<?php echo $paper_udk=$HTTP_POST_VARS["paper_udk"]; ?>">    
  <input type="hidden" name="paper_lang" value="<?php echo $paper_lang=$HTTP_POST_VARS["paper_lang"]; ?>">      
  <input type="hidden" name="paper_refsCount" value="<?php echo $paper_refsCount=$HTTP_POST_VARS["paper_refsCount"]; ?>">        
  <input type="hidden" name="paper_section" value="<?php echo $paper_section=$HTTP_POST_VARS["paper_section"]; ?>"> 
      <input type="hidden" name="paper_type" value="<?php echo $paper_type=$HTTP_POST_VARS["paper_type"]; ?>">   
  <input type="hidden" name="paper_abstract_ua" value="<?php echo $paper_abstract_ua=$HTTP_POST_VARS["paper_abstract_ua"]; ?>">
  <input type="hidden" name="paper_abstract_en" value="<?php echo $paper_abstract_en=$HTTP_POST_VARS["paper_abstract_en"]; ?>">
  <input type="hidden" name="paper_abstract_ru" value="<?php echo $paper_abstract_ru=$HTTP_POST_VARS["paper_abstract_ru"]; ?>">
  <input type="hidden" name="paper_author_cnt" value="<?php echo $paper_author_cnt=$HTTP_POST_VARS["paper_author_cnt"]; ?>">    
  <input type="hidden" name="paper_keyWords_ua" value="<?php echo $paper_keyWords_ua=$HTTP_POST_VARS["paper_keyWords_ua"]; ?>">
  <input type="hidden" name="paper_keyWords_en" value="<?php echo $paper_keyWords_en=$HTTP_POST_VARS["paper_keyWords_en"]; ?>">
  <input type="hidden" name="paper_keyWords_ru" value="<?php echo $paper_keyWords_ru=$HTTP_POST_VARS["paper_keyWords_ru"]; ?>">
  
  
  <table>
      <tr>
      <td class="title_row"> Інформація про автор<? if($paper_author_cnt>1) echo "ів"; else echo "а"; ?> доповіді</td>
      </tr>
      <tr>
      <td>&nbsp;  </td>
      </tr>        
<?

  $link = my_db_connect();
  if(!empty($link))
  {
    my_db_select();  
    for($i=0; $i < $paper_author_cnt; $i++)
    { $str = $authorSearch[$i];
?>	
     <tr>
     <td>
<?	
	  if($str != "")
	  {  $result12 = mysql_query("SELECT * FROM personality WHERE name LIKE '".$str."%' ORDER BY name");
         $num_rows = mysql_num_rows($result12);		 
	  } else $num_rows = 0;
	
      echo "<span class='cdata_colomn'>Результати пошуку <em><strong>".$str."</strong></em>  <br> Знайдено <strong>$num_rows</strong> схожи";
      $m=$num_rows%100;
      if($m>4 && $m<20)
      { echo "х записів";
      }else
      { if($m>19) $m=$m%10;
          if($m==1) echo "й запис";
          else if($m<5) echo "х записи";
             else echo "х записів";
      }
      echo" в базі даних:</span><br>";
      
	  if($num_rows>0)
	  { $ii=0;
        print("<table width='500'>");     
	    while ($line = mysql_fetch_array($result12, MYSQL_ASSOC))
        {  $name=$line["name"];
           $IDperson=$line["ID"];
		   $scideg=$line["scideg"];
	       $scipos=$line["scipos"];	
	       $position=$line["position"];	
		   
           print("<tr><td class='cdata_colomn'><label><input type='radio' name='authorID_".$i."' value='".$IDperson."' id='authorID_".$i."_".$ii."' />");			
           if($scipos!="") echo $scipos." ";
    	   echo $name;
           if($scideg!="") echo ", ".$scideg;
	       if($position!="") echo ", ".$position;
           print("</label></td></tr>");
		   $ii++;
        }//end of -while-
    	print("<tr><td class='cdata_colomn'><label><input type='radio' name='authorID_".$i."' value='0' id='authorID_".$i."_".$ii."' checked /> <em>інший</em> </label></td></tr>");
        print("</table>");	
		mysql_free_result($result12);  	
      }//end of -if($num_rows>0)-
	  else
	  {
?>
  <input type="hidden" name="authorID_<?php echo $i; ?>" value="0" />
<?  
	  }
      
?>	
  
  
  
    </td>
    </tr>
  <tr>
    <td  valign="top"> 
    <div id="personInfTag_<?php echo $i; ?>">
    </div>      
    </td>
  </tr>  
<?	  
    }//end of -for-		  
  }//end of -if-	
?>
  </table>
<!-------------------------------------------------------------------------------------------------------------------

---------------------------------------------------------------------------------------------------------------------> 
<?
  }else
  if($STATE == 4)
  {  
?>
  <input type="hidden" name="STATE" value="5">
  <input type="hidden" name="paper_title_ua" value="<?php echo $paper_title_ua=$HTTP_POST_VARS["paper_title_ua"]; ?>">
  <input type="hidden" name="paper_title_en" value="<?php echo $paper_title_en=$HTTP_POST_VARS["paper_title_en"]; ?>">
  <input type="hidden" name="paper_title_ru" value="<?php echo $paper_title_ru=$HTTP_POST_VARS["paper_title_ru"]; ?>"> 
  <input type="hidden" name="paper_udk" value="<?php echo $paper_udk=$HTTP_POST_VARS["paper_udk"]; ?>">    
  <input type="hidden" name="paper_lang" value="<?php echo $paper_lang=$HTTP_POST_VARS["paper_lang"]; ?>">      
  <input type="hidden" name="paper_refsCount" value="<?php echo $paper_refsCount=$HTTP_POST_VARS["paper_refsCount"]; ?>">        
  <input type="hidden" name="paper_section" value="<?php echo $paper_section=$HTTP_POST_VARS["paper_section"]; ?>">
      <input type="hidden" name="paper_type" value="<?php echo $paper_type=$HTTP_POST_VARS["paper_type"]; ?>">    
  <input type="hidden" name="paper_abstract_ua" value="<?php echo $paper_abstract_ua=$HTTP_POST_VARS["paper_abstract_ua"]; ?>">
  <input type="hidden" name="paper_abstract_en" value="<?php echo $paper_abstract_en=$HTTP_POST_VARS["paper_abstract_en"]; ?>">
  <input type="hidden" name="paper_abstract_ru" value="<?php echo $paper_abstract_ru=$HTTP_POST_VARS["paper_abstract_ru"]; ?>">
  <input type="hidden" name="paper_author_cnt" value="<?php echo $paper_author_cnt=$HTTP_POST_VARS["paper_author_cnt"]; ?>">  
  <input type="hidden" name="paper_keyWords_ua" value="<?php echo $paper_keyWords_ua=$HTTP_POST_VARS["paper_keyWords_ua"]; ?>">
  <input type="hidden" name="paper_keyWords_en" value="<?php echo $paper_keyWords_en=$HTTP_POST_VARS["paper_keyWords_en"]; ?>">
  <input type="hidden" name="paper_keyWords_ru" value="<?php echo $paper_keyWords_ru=$HTTP_POST_VARS["paper_keyWords_ru"]; ?>">
  
      
  <table width="450">
      <tr>
      <td class="title_row" colspan="2"> Інформація про автор<? if($paper_author_cnt>1) echo "ів"; else echo "а"; ?> доповіді</td>
      </tr>
      <tr>
      <td colspan="2"> </td>
      </tr>

<?

  $link = my_db_connect();
  if(!empty($link))
  {
    my_db_select();  
    for($i=0; $i < $paper_author_cnt; $i++)
    { $IDPerson=$HTTP_POST_VARS["authorID_$i"];
	  $paper_author_cur=$i;
?>	
      <tr>
      <td class="title_colomn" colspan="2"> внести (відредагувати) дані </td>
      </tr>
<?
     if($IDPerson != 0) $result14 = mysql_query("SELECT * FROM personality WHERE ID=$IDPerson");
     $author_name="";
	 $author_IDinst=0;
	 $author_IDdep=0;
	 $author_IDsubdep=0;
	 $author_inst="";
	 $author_dep="";
	 $author_subdep="";
     $author_scideg="";
	 $author_scipos="";
	 $author_position="";
     
	 if($IDPerson != 0 && $line = mysql_fetch_array($result14, MYSQL_ASSOC))
	 { 
     $author_name=$line["name"];
     $author_name_en=$line["name_en"];
     $author_name_ru=$line["name_ru"];	 	 
	 $author_IDinst=$line["IDinst"];
	 $author_IDdep=$line["IDdep"];	 
	 $author_IDsubdep=$line["IDsubdep"];	 	 
     $author_scideg=$line["scideg"];
	 $author_scipos=$line["scipos"];	
	 $author_position=$line["position"];	
	 $author_inst=getTitle("institutions",  $author_IDinst);
	 if($author_IDinst == 112)
	 { $author_dep=getTitle("department",  $author_IDdep);
	   $author_subdep=getTitle("subdep",  $author_IDsubdep);
	 } 
	 }
?>      
      
  <input type="hidden" name="authorID_<? echo $paper_author_cur; ?>"     value="<? echo  $IDPerson; ?>">  
  <input type="hidden" name="author_name_<? echo $paper_author_cur; ?>"   value="<? echo $author_name; ?>">    
  <input type="hidden" name="author_inst_<? echo $paper_author_cur; ?>"   value="<? echo $author_inst; ?>"> 
  <input type="hidden" name="author_dep_<? echo $paper_author_cur; ?>"    value="<? echo $author_dep; ?>">
  <input type="hidden" name="author_subdep_<? echo $paper_author_cur; ?>" value="<? echo $author_subdep; ?>">  
  <input type="hidden" name="author_IDinst_<? echo $paper_author_cur; ?>"   value="<? echo $author_IDinst; ?>"> 
  <input type="hidden" name="author_IDdep_<? echo $paper_author_cur; ?>"    value="<? echo $author_IDdep; ?>">
  <input type="hidden" name="author_IDsubdep_<? echo $paper_author_cur; ?>" value="<? echo $author_IDsubdep; ?>">    
  <input type="hidden" name="author_position_<? echo $paper_author_cur; ?>" value="<? echo $author_position; ?>">
  <input type="hidden" name="author_scipos_<? echo $paper_author_cur; ?>" value="<? echo $author_scipos; ?>">  
  <input type="hidden" name="author_scideg_<? echo $paper_author_cur; ?>" value="<? echo $author_scideg; ?>">
    
<tr>
<td class="title_colomn"> ПІБ (українською мовою)</td>
<td>
  <input type="text" name="edt_author_name_<? echo $paper_author_cur; ?>"   value="<? echo $author_name; ?>" size="45">  
</td>
</tr>

<tr>
<td class="title_colomn"> ПІБ (англійською мовою)</td>
<td>
  <input type="text" name="edt_author_name_en_<? echo $paper_author_cur; ?>"   value="<? echo $author_name_en; ?>" size="45">  
</td>
</tr>

<tr>
<td class="title_colomn"> ПІБ (російською мовою)</td>
<td>
  <input type="text" name="edt_author_name_ru_<? echo $paper_author_cur; ?>"   value="<? echo $author_name_ru; ?>" size="45">  
</td>
</tr>


<tr>
<td class="title_colomn"> вчене звання</td>
<td>  
<? if($author_scipos!="")
   {
?>
  <input type="text" name="edt_author_scipos_<? echo $paper_author_cur; ?>" value="<? echo $author_scipos; ?>" size="15">
<? }else
   {
?>  
  <select name="edt_author_scipos_<? echo $paper_author_cur; ?>" size="1">
               <option name='scipos' value=''>немає</option><option name='scipos' value='проф.'>професор</option><option name='scipos' value='доц.'>доцент</option><option name='scipos' value='с.н.с'>старший наук. співробітник</option>               
               </select>  
<? }
?>               
</td>
</tr>
<tr>
<td class="title_colomn"> науковий ступінь</td>
<td> 
<? if($author_scideg!="")
   {
?>
  <input type="text" name="edt_author_scideg_<? echo $paper_author_cur; ?>" value="<? echo $author_scideg; ?>" size="15">
<? }else
   {
?>   
                 <select name="edt_author_scideg_<? echo $paper_author_cur; ?>" size="1">
               <option name='scideg' value=''>немає</option><option name='scideg' value='д.б.н.'>д.б.н.</option><option name='scideg' value='к.б.н.'>к.б.н.</option><option name='scideg' value='д.військ.н.'>д.військ.н.</option><option name='scideg' value='к.військ.н.'>к.військ.н.</option><option name='scideg' value='д.геогр.н.'>д.геогр.н.</option><option name='scideg' value='к.геогр.н.'>к.геогр.н.</option><option name='scideg' value='д.геол.н.'>д.геол.н.</option><option name='scideg' value='к.геол.н.'>к.геол.н.</option><option name='scideg' value='д.е.н.'>д.е.н.</option><option name='scideg' value='к.е.н.'>к.е.н.</option><option name='scideg' value='д.і.н.'>д.і.н.</option><option name='scideg' value='к.і.н.'>к.і.н.</option><option name='scideg' value='д.пед.н.'>д.пед.н.</option><option name='scideg' value='к.пед.н.'>к.пед.н.</option><option name='scideg' value='д.політ.н.'>д.політ.н.</option><option name='scideg' value='к.політ.н.'>к.політ.н.</option><option name='scideg' value='д.психол.н.'>д.психол.н.</option><option name='scideg' value='к.психол.н.'>к.психол.н.</option><option name='scideg' value='д.соц.н.'>д.соц.н.</option><option name='scideg' value='к.соц.н.'>к.соц.н.</option><option name='scideg' value='д.т.н.'>д.т.н.</option><option name='scideg' value='к.т.н.'>к.т.н.</option><option name='scideg' value='д.ф.-м.н.'>д.ф.-м.н.</option><option name='scideg' value='к.ф.-м.н.'>к.ф.-м.н.</option><option name='scideg' value='д.філол.н.'>д.філол.н.</option><option name='scideg' value='к.філол.н.'>к.філол.н.</option><option name='scideg' value='д.філос.н.'>д.філос.н.</option><option name='scideg' value='к.філос.н.'>к.філос.н.</option><option name='scideg' value='д.х.н.'>д.х.н.</option><option name='scideg' value='к.х.н.'>к.х.н.</option><option name='scideg' value='д.ю.н.'>д.ю.н.</option><option name='scideg' value='к.ю.н.'>к.ю.н.</option>               
               </select> 
<? }
?>   
</td>
</tr>
<tr>
<td class="title_colomn"> установа</td>
<td>  
  <input type="text" name="edt_author_inst_<? echo $paper_author_cur; ?>" value="<? echo $author_inst; ?>" size="45">
</td>
</tr>
<? if($author_IDinst == 112 || $IDPerson == 0)
   {
?>
<tr>
<td class="title_colomn"> підрозділ</td>
<td> 
  <input type="text" name="edt_author_dep_<? echo $paper_author_cur; ?>" value="<? echo $author_dep; ?>" size="45">
</td>
</tr>
<tr>
<td class="title_colomn"> кафедра</td>
<td> 
  <input type="text" name="edt_author_subdep_<? echo $paper_author_cur; ?>" value="<? echo $author_subdep; ?>" size="45">
</td>
</tr>
<? 
   }
?>
<tr>
<td class="title_colomn"> посада</td>
<td> 
  <input type="text" name="edt_author_position_<? echo $paper_author_cur; ?>" value="<? echo $author_position; ?>" size="15">
</td>
</tr>

<tr>
<td colspan="2" class="title_row">
<input name="acceptance_<? echo $paper_author_cur; ?>" type="checkbox" value="" checked > Я надаю згоду на відтворення данної статті в електронній формі для:
</td>
</tr>
<tr>
<td colspan="2" class="cdata_colomn">
<ul>
<li> включення до інформаційної системи „Електронний каталог конференцій Університету” та відповідної бази даних;</li>
<li> використання при виконанні пошуку інформації, підготовці аналітичних і статистичних звітів Київського національного університету імені Тараса Шевченка;</li>
<li> відкриття доступу до електронної версії публікації в комп’ютерній мережі Університету з відповідним чином облаштованих робочих місць. </li>
</ul>
</td>
</tr>
<!-- 
<tr>
<td colspan="2" class="title_row"> <a href="makeApp.php" target="_blank"> Сформувати заяву </a>
</td>
</tr>
-->
<tr>
<td colspan="2" class="title_row">
<input name="correspondent_<? echo $paper_author_cur; ?>" type="checkbox" value="" > Показувати мою контактну інформацію на веб-сторінках інформаційної системи „Електронний каталог конференцій Університету” 
</td>
</tr>

<tr>
<td class="title_colomn"> телефон</td>
<td> 
  <input type="text" name="edt_phone_<? echo $paper_author_cur; ?>" value="" size="20">
</td>
</tr>
<tr>
<td class="title_colomn"> е-пошта</td>
<td> 
  <input type="text" name="edt_email_<? echo $paper_author_cur; ?>" value="" size="20">
</td>
</tr>


<tr>
<td colspan="2" class="cdata_colomn"> &nbsp; &nbsp;

</td>
</tr> 
 
           

<?	
    }
?>
</table>  
<?	
  }	
  
?>  
<!-------------------------------------------------------------------------------------------------------------------

--------------------------------------------------------------------------------------------------------------------->   
<?  
  }else
  if($STATE == 5)
  {   
?>  

  <input type="hidden" name="STATE" value="6">
<?php  
 $paper_title_ua=$HTTP_POST_VARS["paper_title_ua"]; 
$paper_title_en=$HTTP_POST_VARS["paper_title_en"]; $paper_title_ru=$HTTP_POST_VARS["paper_title_ru"]; $paper_udk=$HTTP_POST_VARS["paper_udk"]; $paper_lang=$HTTP_POST_VARS["paper_lang"]; $paper_refsCount=$HTTP_POST_VARS["paper_refsCount"]; $paper_section=$HTTP_POST_VARS["paper_section"]; $paper_abstract_ua=$HTTP_POST_VARS["paper_abstract_ua"]; $paper_abstract_en=$HTTP_POST_VARS["paper_abstract_en"];  $paper_abstract_ru=$HTTP_POST_VARS["paper_abstract_ru"]; $paper_author_cnt=$HTTP_POST_VARS["paper_author_cnt"]; $paper_keyWords_ua=$HTTP_POST_VARS["paper_keyWords_ua"]; $paper_keyWords_en=$HTTP_POST_VARS["paper_keyWords_en"]; $paper_keyWords_ru=$HTTP_POST_VARS["paper_keyWords_ru"]; 
    
	$fieldValues1=array("title"=> addslashes($paper_title_ua), "title_en" => addslashes($paper_title_en), "title_ru" => addslashes($paper_title_ru), "udk" => $paper_udk, "IDsection" => $paper_section, "type" => $paper_type, "IDsource" => $ID, "abstract_ua" => $paper_abstract_ua, "abstract_en" => $paper_abstract_en, "abstract_ru" => $paper_abstract_ru, "keyWords_ua" => $paper_keyWords_ua, "keyWords_en" => $paper_keyWords_en, "keyWords_ru" => $paper_keyWords_ru, "lang" => $paper_lang , "refsCount" => $paper_refsCount );

//	print_r($fieldValues1);
	
	$IDtmp_paper=sqlInsertQuery("tmp_report", $fieldValues1);
	
//	echo "<h1>".$IDtmp_paper."</h1>";
	
	

?>
  <input type="hidden" name="paper_tmp_ID" value="<?php echo $IDtmp_paper; ?>" >
<?	
		
    for($i=0; $i < $paper_author_cnt; $i++)
	{ 
	  $paper_author_cur=$i;
?>	
  <input type="hidden" name="authorID_<? echo $paper_author_cur; ?>"     value="<? echo $author_ID=$HTTP_POST_VARS["authorID_". $paper_author_cur]; ?>">  
  <input type="hidden" name="author_name_<? echo $paper_author_cur; ?>"   value="<? echo $author_name=$HTTP_POST_VARS["author_name_". $paper_author_cur]; ?>">     
  <input type="hidden" name="author_name_en_<? echo $paper_author_cur; ?>"   value="<? echo $author_name_en=$HTTP_POST_VARS["author_name_en_". $paper_author_cur]; ?>">    
  <input type="hidden" name="author_name_ru_<? echo $paper_author_cur; ?>"   value="<? echo $author_name_ru=$HTTP_POST_VARS["author_name_ru_". $paper_author_cur]; ?>"> 
  
     
  <input type="hidden" name="author_inst_<? echo $paper_author_cur; ?>"   value="<? echo $author_inst=$HTTP_POST_VARS["author_inst_". $paper_author_cur]; ?>"> 
  <input type="hidden" name="author_dep_<? echo $paper_author_cur; ?>"    value="<? echo $author_dep=$HTTP_POST_VARS["$author_dep_". $paper_author_cur]; ?>">
  <input type="hidden" name="author_subdep_<? echo $paper_author_cur; ?>" value="<? echo $author_subdep=$HTTP_POST_VARS["author_subdep_". $paper_author_cur]; ?>">  
  <input type="hidden" name="author_IDinst_<? echo $paper_author_cur; ?>"   value="<? echo $author_IDinst=$HTTP_POST_VARS["author_IDinst_". $paper_author_cur]; ?>"> 
  <input type="hidden" name="author_IDdep_<? echo $paper_author_cur; ?>"    value="<? echo $author_IDdep=$HTTP_POST_VARS["author_IDdep_". $paper_author_cur]; ?>">
  <input type="hidden" name="author_IDsubdep_<? echo $paper_author_cur; ?>" value="<? echo $author_IDsubdep=$HTTP_POST_VARS["author_IDsubdep_". $paper_author_cur]; ?>">  
  <input type="hidden" name="author_position_<? echo $paper_author_cur; ?>" value="<? echo $author_position=$HTTP_POST_VARS["author_position_". $paper_author_cur]; ?>">
  <input type="hidden" name="author_scipos_<? echo $paper_author_cur; ?>" value="<? echo $author_scipos=$HTTP_POST_VARS["author_scipos_". $paper_author_cur]; ?>">  
  <input type="hidden" name="author_scideg_<? echo $paper_author_cur; ?>" value="<? echo $author_scideg=$HTTP_POST_VARS["author_scideg_". $paper_author_cur]; ?>">	
    
 
  <input type="hidden" name="edt_author_name_<? echo $paper_author_cur; ?>"   value="<? echo $edt_author_name=$HTTP_POST_VARS["edt_author_name_". $paper_author_cur]; ?>">    
  <input type="hidden" name="edt_author_name_en_<? echo $paper_author_cur; ?>"   value="<? echo $edt_author_name_en=$HTTP_POST_VARS["edt_author_name_en_". $paper_author_cur]; ?>">    
  <input type="hidden" name="edt_author_name_ru_<? echo $paper_author_cur; ?>"   value="<? echo $edt_author_name_ru=$HTTP_POST_VARS["edt_author_name_ru_". $paper_author_cur]; ?>">    


  <input type="hidden" name="edt_author_inst_<? echo $paper_author_cur; ?>"   value="<? echo $edt_author_inst=$HTTP_POST_VARS["edt_author_inst_". $paper_author_cur]; ?>"> 
  <input type="hidden" name="edt_author_dep_<? echo $paper_author_cur; ?>"    value="<? echo $edt_author_dep=$HTTP_POST_VARS["edt_author_dep_". $paper_author_cur]; ?>">
  <input type="hidden" name="edt_author_subdep_<? echo $paper_author_cur; ?>" value="<? echo $edt_author_subdep=$HTTP_POST_VARS["edt_author_subdep_". $paper_author_cur]; ?>">  
  <input type="hidden" name="edt_author_position_<? echo $paper_author_cur; ?>" value="<? echo $edt_author_position=$HTTP_POST_VARS["edt_author_position_". $paper_author_cur]; ?>">
  <input type="hidden" name="edt_author_scipos_<? echo $paper_author_cur; ?>" value="<? echo $edt_author_scipos=$HTTP_POST_VARS["edt_author_scipos_". $paper_author_cur]; ?>">  
  <input type="hidden" name="edt_author_scideg_<? echo $paper_author_cur; ?>" value="<? echo $edt_author_scideg=$HTTP_POST_VARS["edt_author_scideg_". $paper_author_cur]; ?>">	    
<?
  $corrected='no';
  if($edt_author_name != $author_name)  $corrected='yes';
  if($edt_author_name_en != $author_name_en)  $corrected='yes';
  if($edt_author_name_ru != $author_name_ru)  $corrected='yes';    
  if($edt_author_inst != $author_inst)  $corrected='yes';
  if($edt_author_dep != $author_dep)  $corrected='yes';
  if($edt_author_subdep != $author_subdep)  $corrected='yes';
  if($edt_author_position != $author_position)  $corrected='yes';
  if($edt_author_scipos != $author_scipos)  $corrected='yes';
  if($edt_author_scideg != $author_scideg)  $corrected='yes';
  
              
    $fieldValues2=array("IDperson" => $author_ID, "name"=> $edt_author_name, "scipos" => $edt_author_scipos, "scideg" => $edt_author_scideg, "position" => $edt_author_position, "inst"=> $edt_author_inst, "dep" => $edt_author_dep, "subdep" => $edt_author_subdep, "IDinst"=> $author_IDinst, "IDdep" => $author_IDdep, "IDsubdep" => $author_IDsubdep, "name_en" => $edt_author_name_en, "name_ru" => $edt_author_name_ru, "corrected" => $corrected );
    
	$IDtmp_personality=sqlInsertQuery("tmp_personality", $fieldValues2);
	$fieldValues3=array("IDperson" => $IDtmp_personality, "IDpaper" => $IDtmp_paper, "correspond" => $correspondent, "availability"=> $acceptance);
	sqlInsertQuery("tmp_reportAuthor", $fieldValues3); 
}
?>	

  <table>
      <td class="title_colomn"> файл (стаття)</td>
      <td > <input type="file" name="paper_file" onChange=" document.appform.submit_button.disabled=''; " />       
      </td>          
      </tr>
      <tr>
      <td  colspan="2" align="right"> <input type="submit" name="submit_button" id="submit_button" value="Завантажити статтю" disabled="disabled"/> </td>
      </tr>
  </table>
<? 
  }else
  if($STATE == 6)
  { $IDtmp_paper=$HTTP_POST_VARS['paper_tmp_ID'];
    $source=$_FILES['paper_file']['tmp_name'] ;
    $file_ext   = substr($_FILES['paper_file']['name'], strripos($_FILES['paper_file']['name'], '.'));
//   $base_root="/var/ftp/www/data.virtualhosts/evisnyk.unicyb.kiev.ua/doc/"; 
    $base_root=$_SERVER['DOCUMENT_ROOT']."/doc/appforms/conf/";
    $dest= $base_root.$IDtmp_paper.$file_ext; 


    if($IDtmp_paper>-1)
    {
?>
        <h1>Дякуємо за подану заявку</h1> 
        <p>Ваша заявка має реєстраційний номер <? echo $IDtmp_paper;?>.</p>
<?	
        if(copy($source, $dest)) 
        { 
          ?> <p>Заявка разом з <a href="../doc/appforms/conf/<? echo $IDtmp_paper.$file_ext; ?>">доповіддю</a>передані на сервер і будуть розглянуті.</p>
          <?
	 
      	 $fieldValues4=array("file_ext"=>$file_ext);
     	 $keyValues4=array("ID"=>$IDtmp_paper);
	     sqlUpdateQuery("tmp_report",  $fieldValues4, $keyValues4);
        }else
        { 
?>         <p>Помилка при передачі файлу на сервер. 
           </p>
<?
        }
     }else
	 {
?>	 	
        <h1>Помилка реєстрації заявки</h1> 	
<?   }		
  }
?>
  
  </form>
  </div>
     
  </td>   
</tr>
</table>
	<div id="footer">
      &copy; 2008 - <SCRIPT language=JavaScript type=text/javascript>document.write((new Date()).getFullYear());</SCRIPT>
      <a href="http://www.univ.kiev.ua" target="_blank">Київський національний університет імені Тараса Шевченка</A>
| <A  href="mailto:evisnyk@univ.kiev.ua"><img title="розробник" src="http://ecatalog.univ.kiev.ua/img/dev.png"/></A>
	</div>
</div>

</body>
</html>
<?php
}
?>