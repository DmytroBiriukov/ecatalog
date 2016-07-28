<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
session_start();
include("../is/src/evisnyk.php");

if(isset($_SESSION['aID']))
{
  $aID=$_SESSION['aID'];
  $query="SELECT * FROM users WHERE ID=".$aID." AND usergrp=3";
  $result=ExecuteQuery($query);	 
  if( $line = mysql_fetch_array($result, MYSQL_ASSOC))
  { 
    $aEmail= $line['email'];
	$aTelephone=$line['telephone'];
	$aDirphone=$line['dirphone'];	
    $aUser=$line['username'];  
    $aUserGroup=$line['usergrp'];  	
    $aUserDep=$line['IDdep'];  	
	$aID=$line['ID'];  	
	$aIP=$line['IP']; 
  } 
}else
{// logined first time 
  $localtime = localtime();
  $aTime=$localtime[2].":".$localtime[1];
  $aP=$HTTP_POST_VARS['upwd'];
  $aU=$HTTP_POST_VARS['ulgn'];
  $query="SELECT * FROM users WHERE userpwd='".$aP."' AND userlgn='".$aU."' AND usergrp=3"; 
  $result=ExecuteQuery($query);	 
  if( $line = mysql_fetch_array($result, MYSQL_ASSOC) )
  { 
	session_register("aID","aUser","aPassword","aUserGroup","aTime","aIP","aUserDep","registered");
    $aPassword=$aP;
    $aUser=$aU;
    $aEmail= $line['email'];
	$aTelephone=$line['telephone'];
	$aDirphone=$line['dirphone'];	
    $aUser=$line['username'];  
    $aUserGroup=$line['usergrp'];  	
    $aUserDep=$line['IDdep'];  	
	$aID=$line['ID'];  	
  }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Конференції :: Панель адміністратора</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/conf.css" type="text/css" media="screen,projection" />
<link type="image/x-icon" rel="shortcut icon" href="http://ecatalog.univ.kiev.ua/css/img/logo3.ico">
</head>
<body>
<?php
  if($aUserGroup == 3)
  { 
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
					<h1><a href="#"></a></h1>			
					<ul id="nav">     
                    				<li><a href="#sidebar">[РЕДАГУВАННЯ КОНТЕНТУ]</a></li>           
									<li><a href="/conf/login.php">[ВИЙТИ]</a></li>  			
					</ul>					
					</div>					
					<div id="container">					
					<p class="description">Стартова сторінка редактора контенту </p>				
<div id="sidebar">
											<h2>Редагування контенту</h2>
											<ul id="navlist1">
									<li><a href="#conflist" onClick="hideAll();toggleExpand('l_1');">Список конференцій</a></li>
									<li><a href="#confhold" onClick="hideAll();toggleExpand('l_2');">Проведення конференції</a></li>
									<li><a href="#personality" onClick="hideAll();toggleExpand('l_3');">Внести нову персоналію</a></li>
									<li><a href="#institution" onClick="hideAll();toggleExpand('l_4');">Внести нову установу</a></li> 
                                    <li><a href="#rules" onClick="hideAll();toggleExpand('l_5');">Правила користування</a></li> 
											</ul>
											
					
					</div>
					
					<div id="content">
					
							<ol class="subnav">
									<li><a href="#conflist" onClick="hideAll();toggleExpand('l_1');">Список конференцій</a></li>
									<li><a href="#confhold" onClick="hideAll();toggleExpand('l_2');">Проведення конференції</a></li>
									<li><a href="#personality" onClick="hideAll();toggleExpand('l_3');">Персоналії</a></li>                                    
									<li><a href="#institution" onClick="hideAll();toggleExpand('l_4');">Установи</a></li>                                     						
					        </ol>
					
							<h2 style="padding:20px 0 0 0;"><a href="#" id="conflist">Список конференцій</a></h2>
                            	<p>Ви можете редагувати матеріали з наступних конференцій: 
                                </p>
								<img id="il_1" src="img/down.gif"><a id="al_1" onClick="toggleExpand('l_1')">показати</a>
	<div id="l_1" style="display:none; ">									
                                <ul>
<?php    
	  $query1 = "SELECT c.ID, c.title, c.type, ch.ID AS IDch, ch.subTitle, ch.year FROM conference c, confhold ch WHERE c.ID IN (SELECT IDconf FROM user2conference WHERE IDuser=".$aID.") AND ch.IDconf=c.ID ORDER BY c.ID";           
	  $confT0="";
	  
      if( $num_rows = mysql_num_rows( $result0 = mysql_query($query1) ) )
      { echo "<ol>";
	    while ($line1 = mysql_fetch_array($result0, MYSQL_ASSOC))
		{  if($confT0 != $line1['title'])
		   { if($confT0!="") echo "</ul></li>";
		     $confT0=$line1['title'];
		     echo "<li>".$confT0."<ul>";
		   }
           echo "<li><em>".$line1['year']."</em>&nbsp;-&nbsp;<a href='edt_conf.php?ID=".$line1['IDch']."'>".addslashes($line1["subTitle"])."</a></li>";
		}
		echo "</ul></li></ol>";
	  }	else echo "порожній список";   
      mysql_free_result($result0);
?>                
                				</ul>
							</div>                                
							<h2 style="padding:20px 0 0 0;"><a href="#" id="confhold">Проведення конференції</a></h2>                           
								<img id="il_2" src="img/down.gif"><a id="al_2" onClick="toggleExpand('l_2')">показати</a>
	<div id="l_2" style="display:none; ">								

<form name="confhold_add" method="post" action="../is/src/dataManipulation.php" target="_self">
  <input type="hidden" name="tab" value="confhold">
  <input type="hidden" name="key_field" value="ID">
  <input type="hidden" name="key_value" value="">                      
  <input type="hidden" name="action" value="INSERT">     
<table bordercolor="#CCCCCC" bgcolor="#FFFF99">
  <tr>
    <td> Конференція
    </td>
    <td>
    <select name="IDconf" style=" width:250px;">
<?php    
	  $query1 = "SELECT c.ID, c.title FROM conference c WHERE ID IN (SELECT IDconf FROM user2conference WHERE IDuser=".$aID.") ORDER BY c.title";           
      if( $num_rows = mysql_num_rows( $result1 = mysql_query($query1) ) )
        while ($line1 = mysql_fetch_array($result1, MYSQL_ASSOC))
           echo "<option name='IDconf' value='".$line1["ID"]."'>".addslashes($line1["title"])."</option>";
      mysql_free_result($result1);
?>    
    </select> 
    </td>
  </tr>
  <tr>
    <td> Назва
    </td>
    <td> <input type="text" name="subTitle" size="63" value="">
    </td>
  </tr>
  <tr>
    <td> Рік
    </td> 
    <td> <input name="year" type="text" value="" size="4" maxlength="4">
    </td>
  </tr>  
  <tr>
    <td> Місто
    </td> 
    <td> <input type="text" name="city" size="63" value="">
    </td>
  </tr>  
  <tr>
    <td> ISBN
    </td> 
    <td> <input name="ISBN" type="text" value="" size="31" maxlength="31">
    </td>
  </tr>  
<!-- regdate  	 submitdate  	 deadline  	 startdate  	  
-->
  <tr>
    <td> Дата початку регістрації
    </td> 
    <td> <input name="regdate" type="text" value="20хх-мм-дд" size="10" maxlength="10">
    </td>
  </tr>  
  <tr>
    <td> Дата підтвердження участі
    </td> 
    <td> <input name="submitdate" type="text" value="20хх-мм-дд" size="10" maxlength="10">
    </td>
  </tr>  
  <tr>
    <td> Дата завершення подачі доповідей
    </td> 
    <td> <input name="deadline" type="text" value="20хх-мм-дд" size="10" maxlength="10">
    </td>
  </tr>  
  <tr>
    <td> Дата початку
    </td> 
    <td> <input name="startdate" type="text" value="20хх-мм-дд" size="10" maxlength="10">
    </td>
  </tr>  
  <tr>
    <td> Дата закінчення
    </td> 
    <td> <input name="findate" type="text" value="20хх-мм-дд" size="10" maxlength="10">
    </td>
  </tr>  

  <tr>
    <td colspan="2">
           <input type="submit" class="ub_dark" value="Внести дані" />
    </td>
    <td> 
    </td>
  </tr>
</table>
</form>
							</div>							
							<h2><a href="#" id="personality">Персоналії</a></h2>
								<img id="il_3" src="img/down.gif"><a id="al_3" onClick="toggleExpand('l_3')">показати</a>
	<div id="l_3" style="display:none; ">								
           <form name="ins_personality" method="post" action="../is/src/dataManipulation.php" target="_self">
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
							<h2><a href="#" id="institution">Установи</a></h2>
							<img id="il_4" src="img/down.gif"><a id="al_4" onClick="toggleExpand('l_4')">показати</a>
	<div id="l_4" style="display:none; ">								
           <form name="ins_institution" method="post" action="../is/src/dataManipulation.php" target="_self">
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
						<h3>Будь ласка, притримуйтесь вказаних правил.</h3>
						<img id="il_5" src="img/down.gif"><a id="al_5" onClick="toggleExpand('l_5')">показати</a>
						<div id="l_5" style="display:none; ">											
							<blockquote>
							<p>Представлені правила користування системою для редакторів контенту.</p>
			
										
							</blockquote>
						</div>
					</div>
			  </div>
			</div>
<?php  
  }
  else
  {
?>
    <div id="failure"> <h1>Аутентифікація не була успішною!</h1><a href="/conf/login.php" class="footer_links"> повернутись</a>
	</div>
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