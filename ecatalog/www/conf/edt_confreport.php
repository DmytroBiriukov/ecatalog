<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Конференції :: редагування доповіді</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/conf.css" type="text/css" media="screen,projection" />
</head>
<body>
<?php
if(isset($_SESSION['aUserGroup']) && $_SESSION['aUserGroup']==3)
{ $srcPath="http://evisnyk.unicyb.kiev.ua/is/src/";
  include("../is/src/evisnyk.php");
  $IDreport=$_GET["IDreport"];
  if($line = mysql_fetch_array( ExecuteQuery("SELECT * FROM confreport WHERE ID=".$IDreport ) , MYSQL_ASSOC) )
  {
  $IDconfhold=$line["IDconfhold"];
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
<script type="text/javascript" src="http://ecatalog.univ.kiev.ua/src/script.js"></script>
<script language="javascript">
var srcPath='http://evisnyk.unicyb.kiev.ua/is/src/responses/';
function institution(instVar)
{ updateTag('institution_Result', srcPath+'institution.php', 'inst=' + instVar);
  updateTag('subdepTAG',  srcPath+'subdepTAG.php','IDdep=0&stat=0');
}
function subdeps()
{ updateTag('subdepTAG', srcPath+'subdepTAG.php', 'IDdep='+document.ins_personality.IDdep.value+'&stat=1' );
}
function quickSearch(search_text, search_textResult, min_symb, url)
{ if($F(search_text).length > min_symb)
	updateTag( search_textResult, url, 'stext=' + $F(search_text));		
}
function hideAll()
{ var tabs = document.getElementById('navlist1').getElementsByTagName('li');
  for(var i=1; i <= tabs.length; i++) 
  {	var e1 = document.getElementById("il_"+i);
    var e2 = document.getElementById("al_"+i);
    var e = document.getElementById("l_"+i);
	e1.src="img/down.gif";  
    e2.innerHTML="&nbsp;показати";
    e.style.display = 'none';
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
                                    <li><a href="#rules" onClick="hideAll();toggleExpand('l_7');">ПРАВИЛА КОРИСТУВАННЯ</a></li>                                      			
					</ul>
					</div>
					<div id="container">
					<p class="description">Редагування доповіді <br>				
<?php  
  echo $title;
?>     				</p>    
<div id="sidebar">
											<h2>Редагування контенту</h2>
											<ul id="navlist1">																
									<li><a href="#authors" onClick="hideAll();toggleExpand('l_1');">Автори</a></li>	                                    								
									<li><a href="#report" onClick="hideAll();toggleExpand('l_2');">Доповідь</a></li>	                
									<li><a href="#uploadfile" onClick="hideAll();toggleExpand('l_3');">Завантажити файл</a></li>
									<li><a href="#move2section" onClick="hideAll();toggleExpand('l_4');">Перемістити в секцію</a></li>    
									<li><a href="#personality" onClick="hideAll();toggleExpand('l_5');">Внести нову персоналію</a></li>
									<li><a href="#institution" onClick="hideAll();toggleExpand('l_6');">Внести нову установу</a></li> 
                                    <li><a href="#rules" onClick="hideAll();toggleExpand('l_7');">Правила користування</a></li> 									                                                     											
											</ul>
					</div>
					<div id="content">
							<ol class="subnav">							                                 					
									<li><a href="#authors">Автори</a></li>	
									<li><a href="#report">Доповідь</a></li>	  
									<li><a href="#uploadfile" onClick="hideAll();toggleExpand('l_3');">Завантажити файл</a></li>
									<li><a href="#move2section" onClick="hideAll();toggleExpand('l_4');">Перемістити в секцію</a></li>    
					        </ol>
							<h2 style="padding:20px 0 0 0;"><a href="#" id="authors">Автори</a></h2>    
							
    <h3><a href="#">Підв'язати авторів</a></h3>
    
<table>    
   <tr><td width="40"></td><td> автор (автори) <br/> <em>прив'язані з бази даних</em> </td> <td style="font-size:10px; color:#FFCC33">
	<? 

//	$result2=ExecuteQuery("SELECT p.* FROM orgdep.personality p, paperAuthor pa  WHERE p.ID=pa.IDperson AND pa.IDpaper=".$IDpaper." ORDER BY pa.IDpaper");  
	$result2=ExecuteQuery("SELECT p.* FROM personality p, confreportAuthor pa  WHERE p.ID=pa.IDperson AND pa.IDreport=".$IDreport." ORDER BY pa.IDreport");  
	
	
	$ii=0;
	while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
    { $IDperson=$line2["ID"];
      $name=$line2["name"];
	  $scideg=$line2["scideg"];
	  $scipos=$line2["scipos"];	
	  $position=$line2["position"];	
?>	  
         <form name="del_author_paper_<?php echo $IDreport."_".$IDperson; ?>" method="post" action="src/delAuthorPaper.php">
           <input type="hidden" name="tab" value="confreportAuthor">
           <input type="hidden" name="IDreport" value="<?php echo $IDreport; ?>" />
           <input type="hidden" name="IDperson" value="<?php echo $IDperson; ?>" />           
           <input type="hidden" name="action" value="DELETE"> 
      <img src='img/b_drop.png' onClick="javascript: if(window.confirm('Ви дійсно бажаєте відєднати цього автора?') )document.del_author_paper_<?php echo $IDreport."_".$IDperson; ?>.submit();" title="відєднати автора" /><a href='edt_person.php?ID=<?php echo $IDperson; ?>' title="<?php	  
 
	  if($scipos!="") echo $scipos." ";
      echo $name;
      if($scideg!="") echo ", ".$scideg;
	  if($position!="") echo ", ".$position;	
	  if($IDinst!=112 && $IDinst!='') 
	  { echo ", "; 
	  
  	    printTitle("institutions",	  $IDinst);

	  }
	  if($IDinst==112) echo ", КНУ";

?>"><?    echo LFF($name) ?> </a>

<? 	  
	  
	  $ii++;
?>
	  </form> 
<?          
    }
?>    
    </td></tr>    
      <tr><td width="40"></td>
              <td bgcolor="#FFFF99">  Пошук в базі даних <br> введіть частину ПІБ (не менше 4 символів) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="authorSearch_<?php echo $IDreport; ?>" id="authorSearch_<?php echo $IDreport; ?>" 
              onKeyUp="quickSearch('authorSearch_<?php echo $IDreport; ?>','authorSearch_<?php echo $IDreport; ?>_Result', 3, 'src/personSearch.php');" /> 
                
                  <form name="add_author" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           			<input type="hidden" name="tab" value="confreportAuthor">                     
         		    <input type="hidden" name="IDreport" value="<?php echo $IDreport; ?>">                      
		            <input type="hidden" name="action" value="INSERT">                   
                   <div id="authorSearch_<?php echo $IDreport; ?>_Result">
                   </div>                                              
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


							<h2 style="padding:20px 0 0 0;"><a href="#" id="report">Доповідь</a></h2>  
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
    <tr><td width="40"></td><td class="title_colomn"> сторінки </td> <td>
<input name="pageFirst" size="3"  maxlength="5"  value="<?php if($pageFirst!="") echo $pageFirst; ?>"/> &nbsp; &mdash; &nbsp; 
<input name="pageLast" size="3" maxlength="5" value="<?php if($pageLast!="") echo $pageLast; ?>"/>
    </td></tr> 
    </tr>           
    <tr><td colspan="3" align="right">           
           			<input type="hidden" name="tab" value="confreport">
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

							<h2 style="padding:20px 0 0 0;"><a href="#" id="uploadfile">Завантажити файл</a></h2>
   
<table>    
    <tr><td width="40"><img src="img/pdf.png"/><td width="100">
<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/reports/'.$IDreport.'.pdf';
if (file_exists($filename)) 
{
?>
<a href="../doc/reports/<? echo $IDreport; ?>.pdf" target="_blank">файл внесено <img src="img/pdf_button.png"  width="15" height="15" /></a> 
<br>
але можете завантажити новий файл і замінити цей
<?  
} else echo "файл (доповідь)";
?>
</td>
        <td>
<form name="uploadform0" action="src/ftransfer.php" method="post" enctype="multipart/form-data" target="_blank"> 
           <input type="hidden" name="n_file_name" value="<?php echo $IDreport; ?>" />
           <input type="hidden" name="subdir" value="reports" />
 <input type="file" name="paper_file" onChange=" document.uploadform0.submit_button.disabled=''; " />       
 <input type="submit" name="submit_button" id="submit_button" value="Завантажити доповідь" disabled="disabled"/> 
</form>  
        </td>
    </tr>
    <tr><td width="40"><img src="img/doc.png"/><td width="100">
<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/reports/'.$IDreport.'.doc';
if (file_exists($filename)) 
{
?>
<a href="../doc/reports/<? echo $IDreport; ?>.doc" target="_blank">файл внесено <img src="img/pdf_button.png"  width="15" height="15" /></a> 
<br>
але можете завантажити новий файл і замінити цей
<?  
} else echo "файл (доповідь)";
?>
</td>
        <td>
<form name="uploadform1" action="src/ftransfer.php" method="post" enctype="multipart/form-data" target="_blank"> 
           <input type="hidden" name="n_file_name" value="<?php echo $IDreport; ?>" />
           <input type="hidden" name="subdir" value="reports" />
 <input type="file" name="paper_file" onChange=" document.uploadform1.submit_button.disabled=''; " />       
 <input type="submit" name="submit_button" id="submit_button" value="Завантажити доповідь" disabled="disabled"/> 
</form>  
        </td>
    </tr>
    <tr><td width="40"><img src="img/tex.png"/><td width="100">
<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/reports/'.$IDreport.'.tex';
if (file_exists($filename)) 
{
?>
<a href="../doc/reports/<? echo $IDreport; ?>.tex" target="_blank">файл внесено <img src="img/pdf_button.png"  width="15" height="15" /></a> 
<br>
але можете завантажити новий файл і замінити цей
<?  
} else echo "файл (доповідь)";
?>
</td>
        <td>
<form name="uploadform2" action="src/ftransfer.php" method="post" enctype="multipart/form-data" target="_blank"> 
           <input type="hidden" name="n_file_name" value="<?php echo $IDreport; ?>" />
           <input type="hidden" name="subdir" value="reports" />
 <input type="file" name="paper_file" onChange=" document.uploadform2.submit_button.disabled=''; " />       
 <input type="submit" name="submit_button" id="submit_button" value="Завантажити доповідь" disabled="disabled"/> 
</form>  
        </td>
    </tr>        
</table>
  
							<h2 style="padding:20px 0 0 0;"><a href="#" id="move2section">Перемістити в секцію</a></h2>  
  
<table>    
    <tr><td width="40"><td class="title_colomn" width="100">перемістити в секцію</td><td>    
   <form name="move_paper" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
   <table><tr><td>
           <input type="hidden" name="tab" value="confreport">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $IDreport; ?>" />
           <select name="IDsection" style="width:200px;">
<?php             

   $result4=ExecuteQuery("SELECT title, ID FROM confsection WHERE IDconf=".$IDconfhold." ORDER BY ID ");
   while($line4 = mysql_fetch_array($result4, MYSQL_ASSOC))
   {  $sec_title=$line4['title'];
      $sec_ID=$line4["ID"];    
?>	   
                <option id="IDsection" value="<? echo $sec_ID;?>"><? echo $sec_title;?></option>
<?php	  
   }              
?>           
           </select>          
           <input type="hidden" name="action" value="UPDATE"> 
           </td>
           <td>
           <div class="submitButton"><a class="ub_dark" href="javascript:document.move_paper.submit();" onMouseOver="window.status='';return true;">Перемістити</a> 
           </div>  
           </td>
           </tr>                             
   </table>        
   </form>     
       </td>
   </tr>  
    <tr><td colspan="3" >&nbsp;</td>
    </tr>             
    
 
 </table>



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