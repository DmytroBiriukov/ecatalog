<?php 
//  header('Content-Type: text/plain; charset=windows-1251');
 $ID=$HTTP_POST_VARS['ID'];
 $STATE=$HTTP_POST_VARS['STATE'];
   
 include ("src/evisnyk.php");
 
 

 $result1=ExecuteQuery("SELECT * FROM collection WHERE ID=$ID ");
 
 $num_rows = mysql_num_rows($result1);

 if($num_rows)
 {
  if($line1 = mysql_fetch_array($result1, MYSQL_ASSOC))
  { $title=$line1["title"];
	$IDedsBoard=$line1["IDedsBoard"];		
	$datatab=$line1["datatab"];
  } 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Електронний каталог періодичних видань Київського університету</title>
<link href="../css/style.css" type="text/css" rel="STYLESHEET">
<link  type="image/x-icon" rel="shortcut icon" href="../css/img/logo.ico">
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

<table class="coverTable" width="982" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top">
      <table class="headerTable" width="982" border="0" cellpadding="0" cellspacing="0" >
         <tr>
           <td width="520">
           </td>
           <td class="footer_links" valign="top" align="right">       
               <a href="http://www.univ.kiev.ua" target="_blank" class="footer_links">
               Київський національний університет ім.Тараса Шевченка</a><!--&nbsp;|&nbsp;
               <a href="http://science.univ.kiev.ua" target="_blank" class="footer_links">
               Наукова частина</a>--><br>
               <a href="http://library.univ.kiev.ua/ukr/title4.php3" target="_blank" class="footer_links">
               Наукова бібліотека ім. М.Максимовича</a><!--&nbsp;|&nbsp;
               <a href="http://vpc.univ.kiev.ua" target="_blank" class="footer_links">
               Видавничо-поліграфічний центр</a>      -->     
           </td>
         </tr>
        </table>      
    </td>
  </tr>
  <tr>
    <td class="headerLine">
    &gt; <a href="http://ecatalog.univ.kiev.ua/" class="header_links">Каталог</a> \ <?php echo $title; ?>
    </td>
  </tr>
  <tr>
    <td>


<table class="contentTable" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr valign="top"> 
      <td colspan="3"><img src="img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>
<tr>
<td width="200" valign="top">
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr>  
      <td width="32" ></td>
      <td width="148" class="left_header">Заповнення електронної форми</td>
    </tr>  
    <tr>  
      <td width="32" ></td>
      <td width="148" style="font-size:10px;" > 
      <br>
       <? if($STATE<7) echo "Крок ".$STATE." / 6"; else echo " завершено "; ?> 
      <table cellspacing="2" cellpadding="2" >
        <tr>
      <? for($i=1;$i<7;$i++)
	     { if($i == $STATE)
		   echo "<td width='7' height='10' bgcolor='#66FF00' style='font-size:10px; color:#999999' ><img src='../css/img/step.png'/></td>";
		   else
		   /*
		   if($i > $STATE)
		   echo "<td width='7' height='10' bgcolor='#FFFFFF' style='font-size:10px; color:#FFFFFF' >&nbsp;</td>";
		   else
		   if($i < $STATE)
		   */
		   echo "<td width='7' height='10' bgcolor='#CCCCCC' style='font-size:10px; color:#CCCCCC' ><img src='../css/img/step_o.png'/></td>";
		 }
      ?>
        </tr>
      </table>
      
      
      </td>
    </tr>
    
    <tr>  
      <td width="32" ></td>
      <td width="148">  
      <br>      
     <?   if($STATE < 7)
  {  ?>


            <a class="ub_dark" href="javascript: CheckAppForm(<?php echo $STATE; ?>);">&nbsp;&nbsp;  Продовжити &nbsp;&nbsp;&nbsp;   </a> <br><br>
            
            
            <a class="ub_light" href="javascript:document.appform.reset();">Очистити форму</a><br>&nbsp; 
           <?   if($STATE ==1 )//||$STATE==4 )
  {  ?>
<br><br>         
    <span style="color:#FF0000; font-size:12px ">Символом * відмічені поля, які є обов'язковими для заповнення</span>
<br><br>         
    <span style="color:#666666; font-size:12px ">Двома ** відмічені поля, заповненя яких залежить від правил подання матеріалів в наукове видання</span>    
    <? } 
	} ?>    
      </td>
    </tr>
    
    

  </table>
</td>
<td width="610" valign="top" style="color: #FFFFCC; ">
  <div id="colljourn_body" style="font-size:10; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFCC; background-color:#9999cc">
  
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
      <td class="title_colomn"> назва статті (українською мовою) <span style="color:#FF0000; font-size:16px ">*</span> </td>
      <td class="cdata_colomn"> <input type="text" size="85" name="paper_title_ua"> </td>
      </tr>
      <tr>
      <td class="title_colomn"> назва статті (англійською мовою) <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td class="cdata_colomn"> <input type="text" size="85" name="paper_title_en"> </td>
      </tr>
      <tr>
      <td class="title_colomn"> назва статті (російською мовою) <span style="color:#666666; font-size:16px ">**</span> </td>
      <td class="cdata_colomn"> <input type="text" size="85"  name="paper_title_ru"> </td>
      </tr>            
      <tr>
      <td colspan="2">
      <table>
      <tr>
      <td class="title_colomn"> кількість співавторів <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td class="cdata_colomn"> 
        <select name="paper_author_cnt"> 
          <option value="1"> 1 </option> 
          <option value="2"> 2 </option>           
          <option value="3"> 3 </option> 
          <option value="4"> 4 </option>           
          <option value="5"> 5 </option> 
          <option value="6"> 6 </option>                     
        </select> 
      </td>
      <td class="title_colomn"> мова, якою написана стаття <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td class="cdata_colomn"> 
  
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
      <td class="cdata_colomn"> <input type="text" size="2" maxlength="2" name="paper_refsCount"> </td>   
      </tr>      
      </table>
      </td>
      </tr>
      
      <tr>
      <td class="title_colomn"> УДК  <span style="color:#666666; font-size:16px ">**</span></td>
      <td class="cdata_colomn"> <input type="text" size="50"  name="paper_udk"> </td>  
      </tr>      
      
<?
  $result=ExecuteQuery("SELECT title, ID FROM section WHERE IDcollection =".$ID." ORDER BY ID");  
  $n=mysql_num_rows($result);
  if($n>1)
  {
?><tr>
      <td class="title_colomn"> розділ <span style="color:#666666; font-size:16px ">*</span></td>
      <td class="cdata_colomn"> 
  <select name="paper_section"> 
<?  
  while($line = mysql_fetch_array($result, MYSQL_ASSOC)) echo "<option value='".$line["ID"]."'>".$line["title"]."</option>  ";
?>  
  </select>
        </td>  
      </tr>  
<?
  }
?>        

      <tr>
      <td class="title_colomn"> резюме (українською мовою) <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td class="cdata_colomn"> <textarea ROWS="3" COLS="50" name="paper_abstract_ua"> </textarea> </td>    
      </tr>
      <tr>
      <td class="title_colomn"> резюме (англійською мовою) <span style="color:#FF0000; font-size:16px ">*</span></td>
      <td class="cdata_colomn"> <textarea ROWS="3" COLS="50"  name="paper_abstract_en"> </textarea> </td>    
      </tr>
      <tr>
      <td class="title_colomn"> резюме (російською мовою)  <span style="color:#666666; font-size:16px ">**</span></td>
      <td class="cdata_colomn"> <textarea ROWS="3" COLS="50"  name="paper_abstract_ru"> </textarea> </td>    
      </tr>

      <tr>
      <td class="title_colomn"> ключові слова (українською мовою)  <span style="color:#666666; font-size:16px ">**</span></td>
      <td class="cdata_colomn"> <textarea ROWS="1" COLS="50"  name="paper_keyWords_ua"> </textarea> </td>    
      </tr>
      <tr>
      <td class="title_colomn"> ключові слова (англійською мовою) <span style="color:#666666; font-size:16px ">**</span></td>
      <td class="cdata_colomn"> <textarea ROWS="1" COLS="50"  name="paper_keyWords_en"> </textarea> </td>    
      </tr>
      <tr>
      <td class="title_colomn"> ключові слова (російською мовою) <span style="color:#666666; font-size:16px ">**</span></td>
      <td class="cdata_colomn"> <textarea ROWS="1" COLS="50"  name="paper_keyWords_ru"> </textarea> </td>    
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
      <td class="cdata_colomn" valign="top"> 
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
  <input type="hidden" name="paper_abstract_ua" value="<?php echo $paper_abstract_ua=$HTTP_POST_VARS["paper_abstract_ua"]; ?>">
  <input type="hidden" name="paper_abstract_en" value="<?php echo $paper_abstract_en=$HTTP_POST_VARS["paper_abstract_en"]; ?>">
  <input type="hidden" name="paper_abstract_ru" value="<?php echo $paper_abstract_ru=$HTTP_POST_VARS["paper_abstract_ru"]; ?>">
  <input type="hidden" name="paper_author_cnt" value="<?php echo $paper_author_cnt=$HTTP_POST_VARS["paper_author_cnt"]; ?>">    
  <input type="hidden" name="paper_keyWords_ua" value="<?php echo $paper_keyWords_ua=$HTTP_POST_VARS["paper_keyWords_ua"]; ?>">
  <input type="hidden" name="paper_keyWords_en" value="<?php echo $paper_keyWords_en=$HTTP_POST_VARS["paper_keyWords_en"]; ?>">
  <input type="hidden" name="paper_keyWords_ru" value="<?php echo $paper_keyWords_ru=$HTTP_POST_VARS["paper_keyWords_ru"]; ?>">
  
  
  <table>
      <tr>
      <td class="title_row"> Інформація про автор<? if($paper_author_cnt>1) echo "ів"; else echo "а"; ?> статті</td>
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
    <td class="cdata_colomn" valign="top"> 
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
  <input type="hidden" name="paper_abstract_ua" value="<?php echo $paper_abstract_ua=$HTTP_POST_VARS["paper_abstract_ua"]; ?>">
  <input type="hidden" name="paper_abstract_en" value="<?php echo $paper_abstract_en=$HTTP_POST_VARS["paper_abstract_en"]; ?>">
  <input type="hidden" name="paper_abstract_ru" value="<?php echo $paper_abstract_ru=$HTTP_POST_VARS["paper_abstract_ru"]; ?>">
  <input type="hidden" name="paper_author_cnt" value="<?php echo $paper_author_cnt=$HTTP_POST_VARS["paper_author_cnt"]; ?>">  
  <input type="hidden" name="paper_keyWords_ua" value="<?php echo $paper_keyWords_ua=$HTTP_POST_VARS["paper_keyWords_ua"]; ?>">
  <input type="hidden" name="paper_keyWords_en" value="<?php echo $paper_keyWords_en=$HTTP_POST_VARS["paper_keyWords_en"]; ?>">
  <input type="hidden" name="paper_keyWords_ru" value="<?php echo $paper_keyWords_ru=$HTTP_POST_VARS["paper_keyWords_ru"]; ?>">
  
      
  <table width="450">
      <tr>
      <td class="title_row" colspan="2"> Інформація про автор<? if($paper_author_cnt>1) echo "ів"; else echo "а"; ?> статті</td>
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
<li> включення до інформаційної системи „Електронний каталог періодичних видань Університету” та відповідної бази даних;</li>
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
<input name="correspondent_<? echo $paper_author_cur; ?>" type="checkbox" value="" > Показувати мою контактну інформацію на веб-сторінках інформаційної системи „Електронний каталог періодичних видань Університету” 
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
   
<center>Ваша інформація внесена в базу даних. <br> 
Для Вас автоматично згенеровані заяви.</center>

  <input type="hidden" name="STATE" value="6">
  <input type="hidden" name="paper_title_ua" value="<?php echo $paper_title_ua=$HTTP_POST_VARS["paper_title_ua"]; ?>">
  <input type="hidden" name="paper_title_en" value="<?php echo $paper_title_en=$HTTP_POST_VARS["paper_title_en"]; ?>">
  <input type="hidden" name="paper_title_ru" value="<?php echo $paper_title_ru=$HTTP_POST_VARS["paper_title_ru"]; ?>">  
  <input type="hidden" name="paper_udk" value="<?php echo $paper_udk=$HTTP_POST_VARS["paper_udk"]; ?>">    
  <input type="hidden" name="paper_lang" value="<?php echo $paper_lang=$HTTP_POST_VARS["paper_lang"]; ?>">      
  <input type="hidden" name="paper_refsCount" value="<?php echo $paper_refsCount=$HTTP_POST_VARS["paper_refsCount"]; ?>">        
  <input type="hidden" name="paper_section" value="<?php echo $paper_section=$HTTP_POST_VARS["paper_section"]; ?>">  
  <input type="hidden" name="paper_abstract_ua" value="<?php echo $paper_abstract_ua=$HTTP_POST_VARS["paper_abstract_ua"]; ?>">
  <input type="hidden" name="paper_abstract_en" value="<?php echo $paper_abstract_en=$HTTP_POST_VARS["paper_abstract_en"]; ?>">
  <input type="hidden" name="paper_abstract_ru" value="<?php echo $paper_abstract_ru=$HTTP_POST_VARS["paper_abstract_ru"]; ?>">
  <input type="hidden" name="paper_author_cnt" value="<?php echo $paper_author_cnt=$HTTP_POST_VARS["paper_author_cnt"]; ?>">  
  <input type="hidden" name="paper_keyWords_ua" value="<?php echo $paper_keyWords_ua=$HTTP_POST_VARS["paper_keyWords_ua"]; ?>">
  <input type="hidden" name="paper_keyWords_en" value="<?php echo $paper_keyWords_en=$HTTP_POST_VARS["paper_keyWords_en"]; ?>">
  <input type="hidden" name="paper_keyWords_ru" value="<?php echo $paper_keyWords_ru=$HTTP_POST_VARS["paper_keyWords_ru"]; ?>">
       
<?  


    $fieldValues1=array("title"=> $paper_title_ua, "title_en" => $paper_title_en, "title_ru" => $paper_title_ru, "udk" => $paper_udk, "IDsection" => $paper_section, "datatab" => $datatab, "IDsource" => $ID, "abstract_ua" => $paper_abstract_ua, "abstract_en" => $paper_abstract_en, "abstract_ru" => $paper_abstract_ru, "keyWords_ua" => $paper_keyWords_ua, "keyWords_en" => $paper_keyWords_en, "keyWords_ru" => $paper_keyWords_ru, "lang" => $paper_lang , "refsCount" => $paper_refsCount );
    
	$IDtmp_paper=sqlInsertQuery("tmp_paper", $fieldValues1);

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
?>
<table bgcolor="#FFFFFF" style="text-align:justify; font-size:10px;">
<tr>
<td width="400"> &nbsp;   &nbsp;
</td>
<td>
Головному редактору <br>Наукового
<? if($datatab == 'collection') echo ' збірника '; else echo ' журналу '; printTitle("collection", $ID); ?> <br>
 
</td>
</tr>
<tr><td colspan="2">&nbsp;  </td></tr>
<tr><td colspan="2"><center>З А Я В А</center></td></tr>
<tr><td colspan="2">&nbsp;  </td></tr>
<tr>
<td colspan="2">&nbsp;   &nbsp;Я  <? echo $edt_author_name; ?> прошу прийняти статтю «<? echo $paper_title_ua; ?>» для опублікування в науковому
<? if($datatab == 'collection') echo ' збірнику '; else echo ' журналі '; printTitle("collection", $ID); ?> .
</td>
</tr>
<?	
     $acceptance='no';
     if( isset( $HTTP_POST_VARS["acceptance_". $paper_author_cur] ) )
	 { $acceptance='yes';
?>
<tr>
<td colspan="2">&nbsp;   &nbsp;Надаю згоду на відтворення данної статті в електронній формі для:
</td>
</tr>
<tr>
<td colspan="2">
- включення до інформаційної системи „Електронний каталог періодичних видань Університету” та відповідної бази даних;</br>
- використання при виконанні пошуку інформації, підготовці аналітичних і статистичних звітів Київського національного університету імені Тараса Шевченка;</br>
- відкриття доступу до електронної версії публікації в комп’ютерній мережі Університету з відповідним чином облаштованих робочих місць. </br>
</td>
</tr>
<?	   	   
	 }
	 $correspondent='no';
     if(isset($HTTP_POST_VARS["correspondent"."_". $paper_author_cur]))
	 { $correspondent='yes';
	 
	 }
	 
	
	$fieldValues3=array("IDperson" => $IDtmp_personality, "IDpaper" => $IDtmp_paper, "correspond" => $correspondent, "availability"=> $acceptance);
	sqlInsertQuery("tmp_paperAuthor", $fieldValues3); 
	 
	 
?>

<tr>
<td>дата<br> <? echo date("Y.m.d"); ?>
</td>
<td>підпис
</td>
</tr>
<tr><td colspan="2">&nbsp;  </td></tr>
<tr><td colspan="2">&nbsp;  </td></tr>
</table>

<?
	}

   
?>   
<!-------------------------------------------------------------------------------------------------------------------

---------------------------------------------------------------------------------------------------------------------> 
<?   
  }else
  if($STATE == 6)
  { 
?>  
  <input type="hidden" name="STATE" value="7">
  <input type="hidden" name="paper_tmp_ID" value="<?php echo $IDtmp_paper=$HTTP_POST_VARS['paper_tmp_ID']; ?>" >
  <table>
      <td class="title_colomn"> файл (стаття)</td>
      <td class="cdata_colomn"> <input type="file" name="paper_file" onChange=" document.appform.submit_button.disabled=''; " />       
      </td>          
      </tr>
      <tr>
      <td class="cdata_colomn" colspan="2" align="right"> <input type="submit" name="submit_button" id="submit_button" value="Завантажити статтю" disabled="disabled"/> </td>
      </tr>
  </table>
<? 
  }else
  if($STATE == 7)
  { $IDtmp_paper=$HTTP_POST_VARS['paper_tmp_ID'];
    $source=$_FILES['paper_file']['tmp_name'] ;
    $file_ext   = substr($_FILES['paper_file']['name'], strripos($_FILES['paper_file']['name'], '.'));
//   $base_root="/var/ftp/www/data.virtualhosts/evisnyk.unicyb.kiev.ua/doc/"; 
    $base_root=$_SERVER['DOCUMENT_ROOT']."/doc/appforms/";
    $dest= $base_root.$IDtmp_paper.$file_ext; 
    if(copy($source, $dest)) 
    { 
     ?> <p>Дякуємо за подану заявку. Ваша 
     <a href="../doc/appforms/<? echo $IDtmp_paper.$file_ext; ?>">стаття </a>
        передана на сервер і буде розглянута. 
        </p>
     <?
	 
	 $fieldValues4=array("file_ext"=>$file_ext);
	 $keyValues4=array("ID"=>$IDtmp_paper);
	 sqlUpdateQuery("tmp_paper",  $fieldValues4, $keyValues4);
    }else
    { 
?>       <p>Помилка при передачі файлу на сервер. 
         </p>
<?
    }
  }
  
/*
 $_SERVER['SCRIPT_FILENAME']
 $_SERVER['SCRIPT_NAME']
 $_SERVER['DOCUMENT_ROOT']
 $file_basename = substr($source, 0, strripos($source, '.')); 
*/
?>
  
  </form>
  </div>

</td>
<td width="172" valign="top">  </td>   
</tr>
</table>


  </td>
  </tr>
  <tr><td background="img/bg_bottom.gif"><img src="img/bg_bottom.gif" width="694" height="30" align="bottom"> </td>
  </tr>
  <tr>
    <td align="right" class="footer_links">      

    </td> 
  </tr>
</table>

</body>
</html>
<?php
}
?>