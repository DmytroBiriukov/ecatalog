<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Конференції :: розгляд доповіді</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/conf.css" type="text/css" media="screen,projection" />
</head>
<body>
<?php
if(isset($_SESSION['aUserGroup']) && $_SESSION['aUserGroup']==3)
{ $srcPath="http://evisnyk.unicyb.kiev.ua/is/src/";
  include("../is/src/evisnyk.php");
  
  
  $IDreport=$_GET["IDreport"];
  
  if($line = mysql_fetch_array( ExecuteQuery("SELECT tp.* FROM tmp_report tp WHERE tp.ID=".$IDreport." ") , MYSQL_ASSOC) )
  {
  $IDconfhold=$line["IDsource"];
  $title=$line["title"];
  $title_en=$line["title_en"];	  
  $title_ru=$line["title_ru"];	  	  
//  $tmp_author=$line["tmp_author"];
  $udk=$line["udk"];  
  $lang=$line["lang"];
  $IDsection=$line["IDsection"];
	  
  $abstract_ua=$line["abstract_ua"]; 
  $abstract_en=$line["abstract_en"]; 
  $abstract_ru=$line["abstract_ru"]; 	   

  $keyWords_ua=$line["keyWords_ua"]; 
  $keyWords_en=$line["keyWords_en"]; 
  $keyWords_ru=$line["keyWords_ru"]; 
  $file_ext=$line["file_ext"];
	   
?>    
<script type="text/javascript" src="http://ecatalog.univ.kiev.ua/src/script.js"></script>
<script>
var srcPath='http://evisnyk.unicyb.kiev.ua/is/src/';

function institution(instVar)
{ updateTag('institution_Result', srcPath+'responses/institution.php', 'inst=' + instVar);
  updateTag('subdepTAG',  srcPath+'responses/subdepTAG.php','IDdep=0&stat=0');
}

function subdeps()
{  updateTag('subdepTAG', srcPath+'responses/subdepTAG.php', 'IDdep='+document.ins_personality.IDdep.value+'&stat=1' );
}

function quickSearch(search_text, search_textResult, min_symb, url)
{   if($F(search_text).length > min_symb)
    { 
	   updateTag( search_textResult, url, 'stext=' + $F(search_text));		
    }	
}
</script>
	<div id="wrapper1">
	
			<div id="wrapper2">
			
					<div id="header">
					
					<h1><a href="#"></a> </h1>
			
					<ul id="nav">     
									<li><a href="/conf/edt_conf.php?ID=<?php echo $IDconfhold; ?>">ПОВЕРНУТИСЬ</a></li>  
                    				<li><a href="#sidebar">МЕНЮ РЕДАГУВАННЯ КОНТЕНТУ</a></li>           
									<li><a href="/conf/login.php">[ВИЙТИ]</a></li> 
                                    <li><a href="#rules" onClick="toggleExpand('l_4')">ПРИВИЛА КОРИСТУВАННЯ</a></li>                                     
			
					</ul>
					
					</div>
					
					<div id="container">
					
					<p class="description">Редагування надісланої заявки <br>
<?php  
  echo $title;
?>         
				    </p>
<div id="sidebar">
															
											
											<h2>Редагування контенту</h2>		
											<ul>													
									<li><a href="#authors">Вказані автори</a></li>	                                    								
									<li><a href="#report">Інформація про доповідь</a></li>	                                    
									<li><a href="#uploadfile">Надісланий файл</a></li>
									<li><a href="#move2section">Перемістити в секцію</a></li> 												
									<li><a href="#personality" onClick="toggleExpand('l_0')">Внести нову персоналію</a></li>                                    
									<li><a href="#institution" onClick="toggleExpand('l_1')">Внести нову установу</a></li>                                                             
                                    <li><a href="#rules" onClick="toggleExpand('l_4')">Правила користування</a></li>                                        
											</ul>
											
					
					</div>
					
					<div id="content">
					
							<ol class="subnav">							                                 					
									<li><a href="#authors">Автори</a></li>	
									<li><a href="#report">Доповідь</a></li>	                                								                                    								
					        </ol>
					
                    
                    
                    
                    
                    
                    
                            
				
							<h2 style="padding:20px 0 0 0;"><a href="#">Доповідь</a></h2>  
    <h3><a <a href="#" id="authors">Вказані автори</a></h3>
      <ul>
	<? 

	$result20=ExecuteQuery("SELECT p.* FROM tmp_personality p, tmp_reportAuthor pa  WHERE p.ID=pa.IDperson AND pa.IDpaper=".$IDreport." ORDER BY pa.IDperson");  	
	$ii=0;
	while($line2 = mysql_fetch_array($result20, MYSQL_ASSOC))
    { 
      $name=$line2["name"];
	  $scideg=$line2["scideg"];
	  $scipos=$line2["scipos"];	
	  $position=$line2["position"];	
	  $inst=$line2["inst"];	
	  $dep=$line2["dep"];	
	  $subdep=$line2["subdep"];	

      $IDperson=$line2["IDperson"];	
	  $ID_tmp_person=$line2["ID"];
	  
	  if($IDperson!="" && $IDperson!=0)
	  { $pRef=personality($IDperson);
	    //print_r($pRef);
	    echo "<li>".$pRef["HTML"]." порівняйте з ";	  
		
	  } else
	  {  echo "<li>нова персоналія повинна бути внесена в базу даних, або знайдена при більш ретельному пошуку:&nbsp;";	
?>		  
<table>    
   <tr>
      <tr><td width="40"></td>
              <td bgcolor="#FFFF99">Підв'язати автора з бази даних <br> введіть частину ПІБ (не менше 4 символів) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="authorSearch_<?php echo $ID_tmp_person; ?>" id="authorSearch_<?php echo $ID_tmp_person; ?>" 
              onKeyUp="quickSearch('authorSearch_<?php echo $ID_tmp_person; ?>','authorSearch_<?php echo $ID_tmp_person; ?>_Result', 3, 'src/personSearch.php');" /> 
                
                  <form name="add_author" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           			<input type="hidden" name="tab" value="tmp_personality">   
 					<input type="hidden" name="key_field" value="ID">                                         
         		    <input type="hidden" name="key_value" value="<?php echo $ID_tmp_person; ?>">                      
		            <input type="hidden" name="action" value="UPDATE">                   
                   <div id="authorSearch_<?php echo $ID_tmp_person; ?>_Result">
                   </div>                                              
                   </form>               
              </td>              
           </tr> 
      
</table>
<?     }
       echo " надісланими даними: ".$scipos." ".$name.", ".$scideg.", ".$position.", ".$inst.", ".$dep.", ".$subdep."</li>";	
	  



	  $ii++;	  
	}  
?>	 
      </ul> 
                            
                            <h3><a href="#" id="report">Інформація про доповідь</a></h3>
                            
								<img id="il_2" src="img/down.gif"><a id="al_2" onClick="toggleExpand('l_2')">показати</a>
	<div id="l_2" style="display:none; ">
                              
<!--    <h3><a href="#">Назва</a></h3>-->
<table>    
    <tr><td colspan="3" >&nbsp;</td>
    </tr>  
    <form name="paper_data" method="post" action="<? echo $srcPath."dataManipulation.php";?>" target="_self">    
    <tr><td colspan="3" align="right">
            <div class="submitButton"><a class="ub_dark" href="javascript:document.paper_data.submit();" onMouseOver="window.status='';return true;">Внести зміни</a> 
           </div>        
    </td>
    </tr>     
   
    
   
    <tr><td width="40"></td><td class="title_colomn"> назва (українською мовою)</td> <td >
<input name="title" size="85" value="<?php if(trim($title)!="") echo addslashes($title); ?>"/>
    </td></tr>
    
    <tr><td width="40"></td><td class="title_colomn"> назва (англійською мовою)</td> <td >
<input name="title_en" size="85" value="<?php if(trim($title_en)!="") echo addslashes($title_en); ?>"/>
    </td></tr>    
    
    <tr><td width="40"></td><td class="title_colomn"> назва (російською мовою)</td> <td >
<input name="title_ru" size="85" value="<?php if(trim($title_ru)!="") echo addslashes($title_ru); ?>"/>
    </td></tr>    
    
    <tr><td width="40"></td><td class="title_colomn"> УДК </td> 
        <td >
          
            <input name="udk" size="50" value="<?php if(trim($udk!="")) echo $udk; ?>" />
        <br>
        <span style="font-size:10px; background-color:#FFFF66">Будь ласка, вносить тільки безпосередньо УДК, наприклад, "523.85" замість "УДК 523.85".</span></td>
    </tr>    
    <tr><td width="40"></td><td class="title_colomn">мова</td> 
        <td >
   <select name="lang" size="1">
     <option <? if($lang=="укр.") echo " selected "; ?> value="укр." >укр.</option>
     <option <? if($lang=="рос.") echo " selected "; ?> value="рос." >рос.</option>
     <option <? if($lang=="англ.") echo " selected "; ?> value="англ." >англ.</option>
     <option <? if($lang=="нім.") echo " selected "; ?> value="нім.">нім.</option>
     <option <? if($lang=="фр.") echo " selected "; ?> value="фр." >фр.</option>
     <option <? if($lang=="ісп.") echo " selected "; ?> value="ісп." >ісп.</option>
   </select>
      </td>
    </tr>  
    <tr><td width="40"></td><td class="title_colomn">секція</td> 
        <td >    
               <select name="IDsection" style=" width:250px;">
<?php             

   $result4=ExecuteQuery("SELECT title, ID FROM confsection WHERE IDconf=".$IDconfhold." ORDER BY ID ");
   while($line4 = mysql_fetch_array($result4, MYSQL_ASSOC))
   {  $sec_title=$line4['title'];
      $sec_ID=$line4["ID"];    
?>	   
                <option id="IDsection" value="<? echo $sec_ID;?>"  <? if($sec_ID==$IDsection) echo " selected "; ?> ><? echo $sec_title;?></option>
<?php	  
   }              
?>           
           </select> 
      </td>
    </tr>     
    <tr><td width="40"></td><td class="title_colomn"> 
            резюме (українською мовою)
            </td> 
            <td >
           <TEXTAREA name="abstract_ua" title="" ROWS="3" COLS="50"><?php if(trim($abstract_ua)!="") echo addslashes($abstract_ua); ?></TEXTAREA>   
            </td>
    </tr> 
    <tr><td width="40"></td><td class="title_colomn"> 
           резюме (англійською мовою) 
        </td> 
        <td >
           <TEXTAREA name="abstract_en" title="" ROWS="3" COLS="50"><?php if(trim($abstract_en)!="") echo addslashes($abstract_en); ?></TEXTAREA>    
        </td>
    </tr>     
    <tr><td width="40"></td><td class="title_colomn"> 
           резюме (російською мовою) 
        </td> 
        <td >  
           <TEXTAREA name="abstract_ru" title="" ROWS="3" COLS="50"><?php if(trim($abstract_ru)!="") echo addslashes($abstract_ru); ?></TEXTAREA>
        </td>
    </tr>      
    <tr><td width="40"></td><td class="title_colomn"> ключові слова (українською мовою)</td> <td >
    <textarea name="keyWords_ua" cols="50" rows="2"><? if(trim($keyWords_ua)!="") echo $keyWords_ua; ?></textarea>	
    <br>
    <span style="font-size:10px; background-color:#FFFF66">Будь ласка, <b>не</b> вносьте " <b>Ключові слова:</b> простір Соболева, простір Банаха.", треба вносити тільки самі ключові слова, наприклад, "простір Соболева, простір Банаха.".</span>
    </td></tr> 
    <tr><td width="40"></td><td class="title_colomn"> ключові слова (англійською мовою) </td> <td >
    <textarea name="keyWords_en" cols="50" rows="2"><? if(trim($keyWords_en)!="") echo $keyWords_en; ?></textarea>
    </td></tr>     
    <tr><td width="40"></td><td class="title_colomn"> ключові слова (російською мовою) </td> 
    <td >
    <textarea name="keyWords_ru" cols="50" rows="2"><? if(trim($keyWords_ru)!="") echo $keyWords_ru; ?></textarea>
    </td>
    </tr>           
    <tr>           
    <tr><td colspan="3" align="right">           
           			<input type="hidden" name="tab" value="tmp_report">
		            <input type="hidden" name="key_field" value="ID">
         		    <input type="hidden" name="key_value" value="<?php echo $IDreport; ?>">                      
		            <input type="hidden" name="action" value="UPDATE">            
           <div class="submitButton"><a class="ub_dark" href="javascript:document.paper_data.submit();" onMouseOver="window.status='';return true;">Внести зміни</a> 
           </div>     
        </td>
    </tr>       
</form>    
</table>
</div>


							<h3><a href="#" id="uploadfile">Надісланий файл</a></h3>
   
<table>    
    <tr><td width="40"><img src="img/<? echo substr($file_ext, 1); ?>.png"/><td width="100">
<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/appforms/conf/'.$IDreport.$file_ext;
//echo $filename;
if (file_exists($filename)) 
{
?>
<a href="../doc/appforms/conf/<? echo $IDreport.$file_ext; ?>" target="_blank">файл внесено <img src="img/pdf_button.png"  width="15" height="15" /></a> 
<br>
можете відредагувати та завантажити змінений файл
<?  
} else echo "файл (доповідь)";
?>
</td>
        <td>
<form name="uploadform0" action="src/ftransfer.php" method="post" enctype="multipart/form-data" target="_blank"> 
           <input type="hidden" name="n_file_name" value="<?php echo $IDreport; ?>" />
           <input type="hidden" name="subdir" value="appforms/conf" />
 <input type="file" name="paper_file" onChange=" document.uploadform0.submit_button.disabled=''; " />       
 <input type="submit" name="submit_button" id="submit_button" value="Завантажити доповідь" disabled="disabled"/> 
</form>  
        </td>
    </tr>
</table>
  


							<h3><a href="#" id="personality">Внести нову персоналію</a></h3>
								<img id="il_0" src="img/down.gif"><a id="al_0" onClick="toggleExpand('l_0')">показати</a>
	<div id="l_0" style="display:none; ">
    
           <form name="ins_personality" method="post" action="<? echo $srcPath."dataManipulation.php";?>" target="_self">
           <input type="hidden" name="tab" value="personality">
           <input type="hidden" name="insBy" value="<? echo $_SESSION['aID'];?>">           
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="">                      
           <input type="hidden" name="action" value="INSERT">    
			   <table>  
               <tr><td>ПІБ</td>
               <td><input type="text" name="name" size="35" value=""></td>
               </tr>
<tr><td>ПІБ (англійською мовою)</td>
               <td><input type="text" name="name_en" size="35" value=""></td>
               </tr>
<tr><td>ПІБ (російською мовою)</td>
               <td><input type="text" name="name_ru" size="35" value=""></td>
               </tr>                              
               <tr><td>Вчене звання</td>
               <td>
               <select name="scipos" size="1" style=' width:100px;'>>
               <?php ListSciPos(); 
               ?>               
               </select>              
               </td>
               </tr>               
               <tr><td>Науковий ступінь</td>
               <td>
               <select name="scideg" size="1" style=' width:100px;'>>
               <?php ListSciDeg(); 
               ?>               
               </select>                                           
               </tr>  
               <tr><td colspan="2">Місце роботи</td>
                        
               <tr>
           <td colspan="2"> Викладач, співробітник, докторант або аспірант КНУ: &nbsp;<br>

           <label> <input type='radio' name='IDinst' id="IDinst" onclick="institution(0);" value="112"> так </label>
           <label> <input type='radio' name='IDinst' id="IDinst" onclick="institution(1);" value="0"> ні </label>
           <label> <input type='radio' name='IDinst' id="IDinst" onclick="institution(2);" value="0"> тимчасово не працює </label>
           </td>
           </tr>
           <tr><td colspan="2">
           <div id="institution_Result"></div>
           <div id="subdepTAG"></div>
           </td>    
           </tr>
               
        
                <td colspan="2" align="right">                     
					<input type="submit" class="ub_dark" value="Внести дані"/>
                </td>
              </tr>                                          
               </table>     
               </form>    
	</div>
					
							<h3><a href="#" id="institution">Внести нову установу</a></h3>
								<img id="il_1" src="img/down.gif"><a id="al_1" onClick="toggleExpand('l_1')">показати</a>
	<div id="l_1" style="display:none; ">
							
           <form name="ins_institution" method="post" action="<? echo $srcPath."dataManipulation.php";?>" target="_self">
           <input type="hidden" name="tab" value="institutions">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="">                      
           <input type="hidden" name="action" value="INSERT">    
			   <table>  
               <tr><td>назва</td>
               <td><input type="text" name="title" size="35" value=""></td>
               </tr>
               <tr><td>тип</td>
               <td>

              <label> <input type='radio' name="type" value="edu" checked>
              освітня/науково-дослідна</label>
              <label> <input type='radio' name="type" value="gov">державна</label>
              <label> <input type='radio' name="type" value="com">комерційна</label>

               </td>
               </tr>               
               <tr>
        
                <td colspan="2" align="right">                     
					<input type="submit" class="ub_dark" value="Внести дані"/>
                </td>
              </tr>                                          
               </table>     
               </form>    
	</div>

							<h2><a href="#" id="rules">Правила користування</a></h2>
								<img id="il_4" src="img/down.gif"><a id="al_4" onClick="toggleExpand('l_4')">показати</a>

<div id="l_4" style="display:none; ">										
							<h3>Будь ласка, притримуйтесь вказаних правил.</h3>
										
							<blockquote>
										
							<p>Представлені правила користування системою для редакторів контенту.</p>
			
										
							</blockquote>
</div>


					</div>
					
					
					
					
			  </div>
			
			</div>
			
			

<?
  } 
}
else
{
?>
    <p>Аутентифікація для доступу <strong> не була успішною !</strong>
    </p>
<?php
}
?>
	<div id="footer">
      <p>&copy;2008&ndash;<script type=text/javascript>document.write((new Date()).getFullYear());</script>
         <a href="#top"> Київський національний університет імені Тараса Шевченка </a>
         &nbsp;|&nbsp;<a href="mailto:birjukov@unicyb.kiev.ua"><img src="img/dev.png" title="розробник" border=0/></a>
	  </p>		
	</div>
	
	</div>    
</body>
</html>