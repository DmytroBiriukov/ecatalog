<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Конференції :: Панель адміністратора</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/conf.css" type="text/css" media="screen,projection" />
<link type="image/x-icon" rel="shortcut icon" href="img/conf.ico">
</head>
<body>
<?

if(isset($_SESSION['aUserGroup']) && $_SESSION['aUserGroup']==3)
{   $srcPath="http://evisnyk.unicyb.kiev.ua/is/src/";
    include("../is/src/evisnyk.php");
    $ID=$_GET['ID']; 
    $result0=ExecuteQuery("SELECT * FROM confhold WHERE ID=".$ID." ");
    if($line0 = mysql_fetch_array($result0, MYSQL_ASSOC))
    {  $title=$line0['subTitle'];
       $year=$line0['year'];	
       $city=$line0['city'];		   
       $ISBN=$line0['ISBN'];	
	   $regdate=$line0['regdate'];	
	   $submitdate=$line0['submitdate'];	
	   $deadline=$line0['deadline'];	
	   $startdate=$line0['startdate'];	
	   $findate=$line0['findate'];	   	   	      
	}   	   
?>    
<script type="text/javascript" src="../is/src/lib/prototype.js" ></script>
<script type="text/javascript" src="../is/src/lib/scriptaculous.js" ></script>
<script language="javascript">
<!--
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
function toggleExpand (tname) 
{ var e1 = document.getElementById("i"+tname);
  var e2 = document.getElementById("a"+tname);
  var e = document.getElementById(tname);
  if(e.style.display == 'none')
  { e1.src="img/up.gif";  
    e2.innerHTML="&nbsp;згорнути";
    e.style.display ='';
  }else
  { e1.src="img/down.gif";  
    e2.innerHTML="&nbsp;показати";
    e.style.display = 'none';
  }	 
}
function quickSearch(search_text, search_textResult, min_symb, url)
{   if($F(search_text).length > min_symb)
    {  var params = 'stext=' + $F(search_text);
	   var ajax   = new Ajax.Updater( {success: search_textResult}, url,									
                                       {method: 'get',
                                        parameters: params,
                                        onFailure: 'reportError', evalScripts: true}
                                     );		
    }	
}
-->
</script>
	<div id="wrapper1">
	
			<div id="wrapper2">
			
					<div id="header">
					<h1><a href="#"></a> </h1>
					<ul id="nav">     
									<li><a href="/conf/edt.php">ПОВЕРНУТИСЬ</a></li>  
                    				<li><a href="#sidebar">МЕНЮ РЕДАГУВАННЯ КОНТЕНТУ</a></li>           
									<li><a href="/conf/login.php">[ВИЙТИ]</a></li>  
                                    <li><a href="#rules" onClick="hideAll(); toggleExpand('l_6');">ПРАВИЛА КОРИСТУВАННЯ</a></li>                                     
					</ul>
					</div>
					<div id="container">
					<p class="description">Редагування даних про проведення конференції <br>					
					      <? echo $title; ?>
                    </p>
<div id="sidebar">
											<h2>Редагування контенту</h2>
											<ul id="navlist1">
									<li><a href="#general" onClick="hideAll(); toggleExpand('l_1');">Загальні дані</a></li>
									<li><a href="#addconfsections" onClick="hideAll(); toggleExpand('l_2');">Секції</a></li> 													
									<li><a href="#orgcom" onClick="hideAll(); toggleExpand('l_3');">Організаційний комітет</a></li>									
									<li><a href="#addconfreport" onClick="hideAll(); toggleExpand('l_4');">Доповіді</a></li>
                                    <li><a href="#submits" onClick="hideAll(); toggleExpand('l_5');" style="color:#FF3333; font-weight:bolder;">Надіслані доповіді</a></li>
									<li><a href="#rules" onClick="hideAll(); toggleExpand('l_6');">Правила користування</a></li>                                     
 										    </ul>				
					</div>
					<div id="content">					
							<ol class="subnav">
									<li><a href="#general" onClick="hideAll(); toggleExpand('l_1');">Загальні дані</a></li>
									<li><a href="#addconfsections" onClick="hideAll(); toggleExpand('l_2');">Секції</a></li> 													
									<li><a href="#orgcom" onClick="hideAll(); toggleExpand('l_3');">Орг. комітет</a></li>									
									<li><a href="#addconfreport" onClick="hideAll(); toggleExpand('l_4');">Доповіді</a></li>
                                    <li><a href="#submits" onClick="hideAll(); toggleExpand('l_5');" style="color:#FF3333; font-weight:bolder;">Надіслані доповіді</a></li>                                    						
					        </ol>
					
							<h2 style="padding:20px 0 0 0;"><a href="#" id="general">Загальні дані</a></h2>
                            	<p>Ви можете редагувати загальні дані про конференцію: 
                                </p>
								<img id="il_1" src="img/down.gif"><a id="al_1" onClick="toggleExpand('l_1')">показати</a>
	<div id="l_1" style="display:none; ">														
<table width="550" border="0">

  <tr valign="top">
     <td>Назва наукової конференції (семінару)</td>
     <td width="500">
     <p id="title"><?php if($title!="") echo $title; else echo "немає даних";?></p>
     <script type="text/javascript">
              new Ajax.InPlaceEditor('title', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=subTitle & tab=confhold', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>
     </td>
  </tr>
  <tr>  
    <td class="title_colomn">Сканована обкладинка 
<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/img/conf_cv_'.$ID.'.jpg';
if (file_exists($filename)) 
{
?>
<a href="../doc/img/conf_cv_<? echo $ID; ?>.jpg" target="_blank">файл внесено<img src="img/pic.jpg"  width="25" height="25" /></a> 
<? 
} 

?>

</td>
    <td>
    
<form name="uploadform0" action="src/ftransfer.php" method="post" enctype="multipart/form-data" target="_blank"> 
           <input type="hidden" name="n_file_name" value="<?php echo "conf_cv_".$ID; ?>" />
           <input type="hidden" name="subdir" value="img" />
 <input type="file" name="paper_file" onChange=" document.uploadform0.submit_button.disabled=''; " />       
 <input type="submit" name="submit_button" id="submit_button" value="Завантажити" disabled="disabled"/> 
</form> 

    </td>
  </tr>    
  
  <tr>
     <td class="title_colomn">ISBN </td>
     <td>
     <p id="ISBN"> <?php if($ISBN!="") echo $ISBN; else echo "немає даних";?> </p>
     <script type="text/javascript"> new Ajax.InPlaceEditor('ISBN', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=ISBN & tab=confhold ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>
     </td>
  </tr>  




  <tr>
     <td>Рік </td>
     <td>
     <p id="year"> <?php if($year!="") echo $year; else echo "немає даних";?> </p>

     <script type="text/javascript"> new Ajax.InPlaceEditor('year', 'src/inDBPlaceEdit.php?keyvalue=<? echo $ID;?> & keyfield=ID & field=year & tab=confhold',{okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});     
     </script>
     </td>
  </tr>    
  <tr>
     <td>Місто проведення</td>
     <td>
     <p id="city"> <?php if($city!="") echo $city; else echo "немає даних";?> </p>

     <script type="text/javascript"> new Ajax.InPlaceEditor('city', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=city & tab=confhold ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>

     </td>
  </tr>  
  
 <tr>
    <td> Дата початку регістрації
    </td> 
    <td> 
     <p id="regdate"> <?php if($regdate!="") echo $regdate; else echo "20рр-мм-дд";?> </p>

     <script type="text/javascript"> new Ajax.InPlaceEditor('regdate', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=regdate & tab=confhold ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>    
    </td>
  </tr>  
  <tr>
    <td> Дата підтвердження участі
    </td> 
    <td> 
     <p id="submitdate"> <?php if($submitdate!="") echo $submitdate; else echo "20рр-мм-дд";?> </p>

     <script type="text/javascript"> new Ajax.InPlaceEditor('submitdate', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=submitdate & tab=confhold ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>     
    </td>
  </tr>  
  <tr>
    <td> Дата завершення подачі доповідей
    </td> 
    <td> 
     <p id="deadline"> <?php if($deadline!="") echo $deadline; else echo "20рр-мм-дд";?> </p>

     <script type="text/javascript"> new Ajax.InPlaceEditor('deadline', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=deadline & tab=confhold ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>     
    </td>
  </tr>  
  <tr>
    <td> Дата початку
    </td> 
    <td> 
     <p id="startdate"> <?php if($startdate!="") echo $startdate; else echo "20рр-мм-дд";?> </p>

     <script type="text/javascript"> new Ajax.InPlaceEditor('startdate', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=startdate & tab=confhold ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>      
    </td>
  </tr>  
  <tr>
    <td> Дата закінчення
    </td> 
    <td> 
     <p id="findate"> <?php if($findate!="") echo $findate; else echo "20рр-мм-дд";?> </p>

     <script type="text/javascript"> new Ajax.InPlaceEditor('findate', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=findate & tab=confhold ', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>      
    </td>
  </tr>  
  
  
</table>
</div>

							<h2><a href="#" id="addconfsections">Секції</a></a></h2>  
								<img id="il_2" src="img/down.gif"><a id="al_2" onClick="toggleExpand('l_2')">показати</a>
<div id="l_2" style="display:none; ">										
<table>							
<?php

   $result4=ExecuteQuery("SELECT title, ID FROM confsection WHERE IDconf=".$ID." ORDER BY ID ");
   $section_no=1;
   while($line4 = mysql_fetch_array($result4, MYSQL_ASSOC))
   {  $sec_title=$line4['title'];
      $sec_ID=$line4["ID"];    
?>	   
     <tr class="cdata_colomn" style="color:#333333"><td><? echo $section_no."."; ?></td>
     
      <form name="del_section_<?php echo $sec_ID; ?>" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           <input type="hidden" name="tab" value="confsection">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $sec_ID; ?>" />
           <input type="hidden" name="action" value="DELETE"> 
     <td><img src='img/b_drop.png' onclick="javascript:document.del_section_<?php echo $sec_ID; ?>.submit();" /></td>
     </form>
     
     <td><p id='section_<? echo $section_no; ?>'> <? if($sec_title!='') echo $sec_title; else echo "<em>без назви</em>"; ?></p> 
	 <script type="text/javascript"> new Ajax.InPlaceEditor('section_<? echo $section_no; ?>', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $sec_ID; ?> & keyfield=ID & field=title & tab=confsection', {okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
     </script>
     </td></tr>	  
     
<?php	  

	  $section_no++;
   }
?>

   <tr>
      <td colspan="2">
      
 <form name="add_section" method="post" action="<? echo $srcPath."dataManipulation.php";?>" target="_self">
           <input type="hidden" name="tab" value="confsection">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="" />
           <input type="hidden" name="IDconf" value="<?php echo $ID; ?>">                      
           <input type="hidden" name="action" value="INSERT">  
           
           <input type="text" name="title"/>  
                        <div id="add_section_submit"><a href="javascript:document.add_section.submit();" onMouseOver="window.status='';return true;">Ввести нову секцію</a></div>
</form>
      </td>
   </tr>    
</table> 

</div>								
								
								
                                
							<h2 style="padding:20px 0 0 0;"><a href="#" id="orgcom">Організаційний комітет</a></h2>                           
								<img id="il_3" src="img/down.gif"><a id="al_3" onClick="toggleExpand('l_3')">показати</a>
	<div id="l_3" style="display:none; ">		
<?php

  $result5=ExecuteQuery("SELECT ebc.position AS edtPosition, p.name, p.scideg, p.scipos, ebc.ID FROM conforgcom ebc, personality p WHERE ebc.IDconf=".$ID." AND ebc.IDperson = p.ID ORDER BY ebc.position");

// general members
  $generalMembers=array();
  $generalMembers_ID=array();
// local members
  $localMembers=array();
  $localMembers_ID=array();  
  //'head', 'deputy', 'generalmem', 'localmem', 'secretary', 'techsecretary'
  $IDchief_editor=0;
  $chief_editor="";
  $execute_editor="";
  $secretary="";
  $techsecretary="";
  $deputy="";
  
  while($line = mysql_fetch_array($result5, MYSQL_ASSOC))
  { switch($line['edtPosition'])
    { case "head": $chief_editor=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDchief_editor=$line['ID']; break;
	  case "deputy": $deputy=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDdeputy_editor=$line['ID']; break;
	  case "localmem": $localMembers[]=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $localMembers_ID[]=$line['ID']; break;	  
	  case "secretary": $secretary=$line['name']; $IDsecretary_editor=$line['ID']; break;
	  case "techsecretary": $techsecretary=$line['name']; $IDtechsecretary_editor=$line['ID']; break;
	  default : $generalMembers[]=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $generalMembers_ID[]=$line['ID']; break;
    } 
  }
  mysql_free_result($result5);
  
?>   
         <table width="500">
           <tr>
              <td>Голова
              </td>
              <td>                         
			  <?php 
			   if($chief_editor!="")
			   {  
?>
     <form name="del_edt_<?php echo $IDchief_editor; ?>" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           <input type="hidden" name="tab" value="conforgcom">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $IDchief_editor; ?>" />
           <input type="hidden" name="action" value="DELETE"> 
     <img src='img/b_drop.png' onclick="javascript:document.del_edt_<?php echo $IDchief_editor; ?>.submit();" alt="відкріпити" />   
     </form>
<?			     echo $chief_editor;
			   } else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <?php 
		      if($chief_editor=="")  
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Пошук в базі даних <br> введіть частину ПІБ (не менше 4 символів) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="chiefEdtSearch" id="chiefEdtSearch" onKeyUp="quickSearch('chiefEdtSearch','chiefEdtSearchResult', 3, 'src/personSearch.php');" /> 
                
                  <form name="add_chiefEdt" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           			<input type="hidden" name="tab" value="conforgcom">                     
         		    <input type="hidden" name="IDconf" value="<?php echo $ID; ?>">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="head">                    
                   <div id="chiefEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?>             


			<tr>
              <td class="title_colomn">Заступник голови
              </td>
              <td>                         
			  <?php if($deputy!="")
			  { 
			  
			  
?>
     <form name="del_edt_<?php echo $IDdeputy_editor; ?>" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
 		   <input type="hidden" name="tab" value="conforgcom">                              		
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $IDdeputy_editor;  ?>" />
           <input type="hidden" name="action" value="DELETE"> 
     <img src='img/b_drop.png' onclick="javascript:document.del_edt_<?php echo $IDdeputy_editor; ?>.submit();" alt="відкріпити редактора" onmouseover="window.status='відкріпити редактора';return true;" />    
	 <? echo $deputy;?>
     </form>
<?				  
			  

			  }
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <?php 
		      if($deputy=="")  
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Пошук в базі даних <br> введіть частину ПІБ (не менше 4 символів) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="deputyEdtSearch" id="deputyEdtSearch" onKeyUp="quickSearch('deputyEdtSearch','deputyEdtSearchResult', 3, 'src/personSearch.php');" /> 
                
                  <form name="add_deputyEdt" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           			<input type="hidden" name="tab" value="conforgcom">                     
         		    <input type="hidden" name="IDconf" value="<?php echo $ID; ?>">                                         
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="deputy">                    
                   <div id="deputyEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?>           


           <tr>
              <td class="title_colomn">Члени організаційного комітету 
              </td>
              <td>                         
			<?php 
			  $n=count($generalMembers);
			  if($n>0) 
			  { for($i=0; $i<$n; $i++ ) 
			    { 
?>
     <form name="del_edt_<?php echo $generalMembers_ID[$i]; ?>" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           <input type="hidden" name="tab" value="conforgcom">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $generalMembers_ID[$i];  ?>" />
           <input type="hidden" name="action" value="DELETE"> 
     <img src='img/b_drop.png' onclick="javascript:document.del_edt_<?php echo $generalMembers_ID[$i]; ?>.submit();" alt="відкріпити" onmouseover="window.status='відкріпити';return true;" />    
	 <? echo $generalMembers[$i]; ?>
     </form>
<?			  
			    } 
			  } 
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <?php 
		      if($n>-1)   
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Знайти та додати (введіть частину ПІБ) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="memberEdtSearch" id="memberEdtSearch" onKeyUp="quickSearch('memberEdtSearch','memberEdtSearchResult', 3, 'src/personSearch.php');" /> 
                
                  <form name="add_memberEdt" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           			<input type="hidden" name="tab" value="conforgcom">                     
         		    <input type="hidden" name="IDconf" value="<?php echo $ID; ?>">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="generalmem">                    
                   <div id="memberEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?>  

           <tr>
              <td class="title_colomn">Члени локального орг. комітету 
              </td>
              <td>                         
			<?php 
			  $n=count($localMembers);
			  if($n>0) 
			  { for($i=0; $i<$n; $i++ ) 
			    { 
?>
     <form name="del_edt_l<?php echo $localMembers_ID[$i]; ?>" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           <input type="hidden" name="tab" value="conforgcom">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $localMembers_ID[$i];  ?>" />
           <input type="hidden" name="action" value="DELETE"> 
     <img src='img/b_drop.png' onclick="javascript:document.del_edt_l<?php echo $glocalMembers_ID[$i]; ?>.submit();" alt="відкріпити" onmouseover="window.status='відкріпити';return true;" />    
	 <? echo $localMembers[$i]; ?>
     </form>
<?			  
			    } 
			  } 
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <?php 
		      if($n>-1)   
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Знайти та додати (введіть частину ПІБ) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="lmemberEdtSearch" id="lmemberEdtSearch" onKeyUp="quickSearch('lmemberEdtSearch','lmemberEdtSearchResult', 3, 'src/personSearch.php');" /> 
                
                  <form name="add_memberEdt" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           			<input type="hidden" name="tab" value="conforgcom">                     
         		    <input type="hidden" name="IDconf" value="<?php echo $ID; ?>">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="localmem">                    
                   <div id="lmemberEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?>  
            



           <tr>
              <td class="title_colomn">Вчений секретар
              </td>
              <td>                         
			  <?php if($secretary!="") echo $secretary; 
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <?php 
		      if($secretary=="")  
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Пошук в базі даних <br> введіть частину ПІБ (не менше 4 символів) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="secretaryEdtSearch" id="secretaryEdtSearch" onKeyUp="quickSearch('secretaryEdtSearch','secretaryEdtSearchResult', 3, 'src/personSearch.php');" /> 
                
                  <form name="add_secretaryEdt" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           			<input type="hidden" name="tab" value="conforgcom">                     
         		    <input type="hidden" name="IDconf" value="<?php echo $ID; ?>">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="secretary">                    
                   <div id="secretaryEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?> 

           <tr>
              <td class="title_colomn">Технічний секретар
              </td>
              <td>                         
			  <?php if($techsecretary!="") echo $techsecretary; 
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <?php 
		      if($techsecretary=="")  
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Пошук в базі даних <br> введіть частину ПІБ (не менше 4 символів) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="techsecretaryEdtSearch" id="techsecretaryEdtSearch" onKeyUp="quickSearch('techsecretaryEdtSearch','techsecretaryEdtSearchResult', 3, 'src/personSearch.php');" /> 
                
                  <form name="add_techsecretaryEdt" method="post" action="<? echo $srcPath."dataManipulation.php";?>">
           			<input type="hidden" name="tab" value="conforgcom">                     
         		    <input type="hidden" name="IDconf" value="<?php echo $ID; ?>">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="techsecretary">                    
                   <div id="techsecretaryEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?> 
          </table>         
</div>							
							<h2><a href="#" id="addconfreport">Доповіді</a></h2>
                            
								<img id="il_4" src="img/down.gif"><a id="al_4" onClick="toggleExpand('l_4')">показати</a>
<div id="l_4" style="display:none; ">										   
    
    <ul style="list-style:none;">
<?php

$result6=ExecuteQuery("SELECT s.title AS stitle, s.ID AS sID FROM confsection s WHERE s.IDconf=".$ID." ORDER BY s.ID");
while($line01 = mysql_fetch_array($result6, MYSQL_ASSOC))
{ $section=$line01["stitle"];
  $IDsection=$line01["sID"];
?>  
    <li>
           <form name="add_paper_<?php echo $IDsection; ?>" method="post" action="<? echo $srcPath."dataManipulation.php";?>" target="_self" style="display:inline;" >
           <input type="hidden" name="tab" value="confreport">
           <input type="hidden" name="IDsection" value="<?php echo $IDsection; ?>">
           <input type="hidden" name="IDconfhold" value="<?php echo $ID; ?>">                      
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="">    
           <input type="hidden" name="action" value="INSERT">      
  <div id="add_paper_<?php echo $IDsection; ?>_submit" style="display:inline;"> 
  <img src='img/pict_show.gif' onclick="javascript:document.add_paper_<?php echo $IDsection; ?>.submit();" title="додати доповідь в секцію" /> 
  </div>
           </form>  
<?php
    echo $section."<ul>";
    $query7="SELECT p.ID, p.title AS ptitle, p.title_ru AS ptitle_ru, p.title_en AS ptitle_en, p.tmp_author, p.tmp_pages,  p.abstract_ua, p.abstract_en, p.abstract_ru, p.udk, p.pageFirst, p.pageLast, p.keyWords_ua, p.keyWords_en, p.keyWords_ru, p.lang, p.file_ext FROM confreport p WHERE p.IDconfhold=".$ID." AND p.IDsection=".$IDsection." ORDER BY p.ID";
    $result7=ExecuteQuery($query7);
	while($line = mysql_fetch_array($result7, MYSQL_ASSOC))
	{
      $IDreport=$line["ID"];  
	  
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

	  $tmp_pages=$line["tmp_pages"];
	  $file_ext=$line["file_ext"];

?>
    <li>
    <a href="edt_confreport.php?IDreport=<?php echo $IDreport;  ; ?>" target="_self"><img src='img/b_tblimport.png' title="редагувати доповідь" style="display:inline;" /></a>
        <form name="del_paper_<?php echo $IDreport; ?>" method="post" action="<? echo $srcPath."dataManipulation.php";?>" style="display:inline;">
           <input type="hidden" name="tab" value="confreport">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $IDreport; ?>" />
           <input type="hidden" name="action" value="DELETE"> 
           <a href="javascript: if(window.confirm('Ви дійсно бажаєте видалити доповідь?') ) document.del_paper_<?php echo $IDreport; ?>.submit();"
onMouseOver="window.status='';return true;"><img src='img/b_drop.png' title="видалити доповідь" style="display:inline;" />  </a>                   
     </form>  
<?php echo "$title-$pageFirst-$pageLast"; ?>      
    </li>
<?	
   }
   echo "</ul></li>";   
}  
?> 
</ul>
    
    
    
</div>                        
                        
					        <h2><a href="#" id="submits">Надіслані доповіді</a></h2>
							    <img id="il_5" src="img/down.gif"><a id="al_5" onClick="toggleExpand('l_5')">показати</a>

<div id="l_5" style="display:none; ">	                    

<?php
  $query4="SELECT tp.ID, tp.title, tp.IDsource, tp.file_ext FROM tmp_report tp WHERE tp.IDsource=".$ID." ORDER BY tp.ID ";
  $result4=ExecuteQuery($query4);
  if(mysql_num_rows($result4))
  { echo "<ul>";
    while($line4= mysql_fetch_array($result4, MYSQL_ASSOC))
    { 
    $title=$line4["title"];
    $IDsource=$line4["IDsource"];		
    $IDtmp_report=$line4["ID"];	
	$file_ext=$line4["file_ext"];	
	
    $query5="SELECT ta.name, ta.ID  FROM tmp_personality ta, tmp_reportAuthor pa WHERE pa.IDperson = ta.ID AND pa.IDpaper =".$IDtmp_report." ";
	$result5=ExecuteQuery($query5);	
    echo "<li><a href='sbm_confreport.php?IDreport=".$IDtmp_report." ' target='_self'><img src='img/b_props.png' title='розглянути доповідь' style='display:inline;' /></a>";
	while($line5= mysql_fetch_array($result5, MYSQL_ASSOC))
	{ echo $name=$line5["name"]." ";
	}
	print(" <a href='../../doc/appforms/conf/".$IDtmp_report.$file_ext."' target='_blank'>".$title."</a></li>");
	}
	echo "</ul>";
  }
  mysql_free_result($result4);
?>
</table>



</div>
                    
						 <h2><a href="#" id="rules">Правила користування</a></h2>
						 <img id="il_6" src="img/down.gif"><a id="al_6" onClick="toggleExpand('l_6')">показати</a>
						 <div id="l_6" style="display:none; ">										
							<h3>Будь ласка, притримуйтесь вказаних правил.</h3>
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
    <p>Аутентифікація для доступу <strong> не була успішною !</strong>
    </p>
<?php
}
?>
	<div id="footer">
      <p>&copy;2008&ndash;<script type=text/javascript>document.write((new Date()).getFullYear());</script>
         <a href="#top"> Київський національний університет імені Тараса Шевченка </a>
         &nbsp;|&nbsp;<a href="mailto:birjukov@unicyb.kiev.ua"><img src="img/dev.png" title="розробник" border=0/></a>
		 <br>шаблон дизайну&nbsp;<a href="http://www.sixshootermedia.com">Six Shooter Media</a>
	  </p>		
	</div>
	
	</div>	
</body>
</html>