<?php
 session_start();
 $aUser=$HTTP_SESSION_VARS["aUser"];
 $aPassword=$HTTP_SESSION_VARS["aPassword"];
 $aIP=$HTTP_SESSION_VARS["aIP"];
 $aID=$HTTP_SESSION_VARS["aID"];
 $aUserGroup=$HTTP_SESSION_VARS["aUserGroup"];

 $ID=$HTTP_GET_VARS['ID'];

 include ("src/evisnyk.php");
	
 $field=array("name"=>"","name_en"=>"","name_ru"=>"","scipos"=>"","scideg"=>"", "IDinst" =>"","position"=>"","IDdep"=>"",  "IDsubdep" =>"");
 getFields(&$field, ExecuteQuery( "SELECT * FROM personality WHERE ID=$ID"));

 $name=$field["name"];
 $name_en=$field["name_en"];
 $name_ru=$field["name_ru"];  
 $scPos=$field["scipos"];
 $scDeg=$field["scideg"];
 $inst=$field["IDinst"];
 $pos=$field["position"];
 $depID=$field["IDdep"];
 $subdepID=$field["IDsubdep"];		
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Електронний каталог періодичних видань Київського університету</title>
<link href="../css/style.css" type="text/css" rel="STYLESHEET">
<script type="text/javascript" src="src/lib/tab.js"></script>
<script type="text/javascript" src="src/lib/prototype.js" ></script>
<script type="text/javascript" src="src/lib/scriptaculous.js"></script>
<script type="text/javascript" src="src/responses.js"></script>
<style type="text/css">
<!--
body {
	margin-left: 4px;
	margin-top: 0px;
	margin-right: 20px;
	margin-bottom: 0px;
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size:10px;
	background-color: #887D75;
}
-->
</style>
</head>



<body onLoad="myonLoad()">


<table width="982" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" >

  
<?php
  if($aID >0)
  {
?>   
  <tr>
    <td><table class="headerTable" width="982" height="64" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td  width="550"></td>
           <td class="tdata" valign="top">
            Користувач &nbsp; &gt; &nbsp;<?php echo $aUser;?> 
            <br> [<a href="logout.php" class="header_link">вийти</a>]            
           </td>
         </tr>
        </table>  
    </td>
  </tr>  
  <tr>
    <td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10; color:#FFFFCC;" background="img/top_04.jpg"
  height="20" width="982">
        &gt; <a href="usrlgn.php?STATE=2" class="header_links">Стартова</a> 
       \ Редагування даних про персоналію :&nbsp; &nbsp; <?php echo $name; ?>
    </td>
  </tr>
  <tr>
    <td>

          <table border="0" style="font-size:10px;">
            <tr>
              <td class="title_colomn" width="200">ПІБ</td>
              <td width="350"  bgcolor="#9999CC">
              <p id="name"><?php echo $name;?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('name', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=name & tab=personality', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>
<tr>
              <td class="title_colomn" width="200">ПІБ (англійською мовою)</td>
              <td width="350"  bgcolor="#9999CC">
              <p id="name_en"><?php if( $name_en!="") echo $name_en; else echo "немає даних";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('name_en', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=name_en & tab=personality', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>
<<tr>
              <td class="title_colomn" width="200">ПІБ (російською мовою)</td>
              <td width="350"  bgcolor="#9999CC">
              <p id="name_ru"><?php if( $name_ru!="") echo $name_ru; else echo "немає даних";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('name_ru', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=name_ru & tab=personality', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>                      
            <tr>
              <td class="title_colomn">вчене звання</td>
              <td width="350"  bgcolor="#9999CC">
              <p id="scPos"> <?php if($scPos!="") echo $scPos; else echo "немає даних"; ?> </p>
              <script type="text/javascript">
              new Ajax.InPlaceCollectionEditor('scPos', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=scipos & tab=personality',
              {collection: [<?php printSCPos(); ?>], value: '<?php echo $scPos; ?>', ajaxOptions: {method: 'post'}, okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>
            <tr>
              <td class="title_colomn">вчений ступінь </td>
              <td width="350"  bgcolor="#9999CC">
              <p id="scDeg"> <?php if($scDeg!="") echo $scDeg; else echo "немає даних"; ?></td>
              <script type="text/javascript">
              new Ajax.InPlaceCollectionEditor('scDeg', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=scideg & tab=personality',
              {collection: [<?php printSCDegs(); ?>], value: '<?php echo $scDeg; ?>', ajaxOptions: {method: 'post'}, okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>
           <tr>
           <tr>
              <td class="title_colomn">місце роботи
              </td>
              <td width="450">            
              <p id="institution"><?php 
			  
			  if($inst!="")
			  { if( $inst==0 || $inst==112) 
			        { echo "Київський національний університет імені Тараса Шевченка<br>"; 
					  printTitle("department", $depID);
					  if($subdepID!='') { echo "<br>кафедра ";  printTitle("subdep", $subdepID);}
					} else printTitle("institutions", $inst);
			 } else echo "немає даних";		
			 ?>
             </p>		  
              </td>
           </tr>
           <tr>
              <td class="title_colomn">посада</td>
              <td  width="550"  bgcolor="#9999CC">
              <p id="position"><?php if($pos!="") echo $pos; else echo "немає даних"; ?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('position', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $ID; ?> & keyfield=ID & field=position & tab=personality', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
           </tr>       
<tr><td colspan="2">&nbsp; </td>
</tr>
<tr style="font-size:10px; color:#999999; background-color:#FFFF99"><td></td><td> Змінити дані про місце роботи</td>
</tr>
           <tr>
              <td width="200" style="font-size:10px; color:#999999; background-color:#FFFF99">  
              установа 
              </td>
              <td width="450" bgcolor="#9999FF">  Пошук в базі даних (введіть частину назви не менше 5 літер) 
           <form name="upd_personality_inst" method="post" action="src/dataManipulation.php" target="_self">
           <input type="hidden" name="tab" value="personality">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $ID; ?>">                      
           <input type="hidden" name="action" value="UPDATE"> 
           <input type="text"  size="30" name="inst_search" id="inst_search" onKeyUp="quickSearch('inst_search','inst_searchResult',4,'src/responses/instSearch.php' );" />             
			  <div id="inst_searchResult">
              </div>                              
	          <div id="upd_personality_inst_submit"><a href="javascript:document.upd_personality_inst.submit();" onMouseOver="window.status='';return true;">Внести дані</a></div>
                </td>
              </tr>

              </form>
              </td>              
           </tr>    

<?php if( $inst==0 || $inst==112) 
	  {
?>
           <tr>
              <td style="font-size:10px; color:#999999; background-color:#FFFF99">  
              підрозділ
              </td>
              <td width="450"  bgcolor="#9999FF">   
           <form name="upd_personality_dep" method="post" action="src/dataManipulation.php" target="_self">
           <input type="hidden" name="tab" value="personality">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $ID; ?>">                      
           <input type="hidden" name="action" value="UPDATE"> 
		   <select size='1' name='IDdep' id='IDdep' >
<?
      ListDeps(112);
?>
           </select>

           <div id="upd_personality_dep_submit"><a href="javascript:document.upd_personality_dep.submit();" onMouseOver="window.status='';return true;">Внести дані</a></div>
                </td>
              </tr>
           </form>
              </td>              
           </tr> 
           

           <tr>
              <td width="150" style="font-size:10px; color:#999999; background-color:#FFFF99">  
              кафедра (відділ)
              </td>
              <td width="450"  bgcolor="#9999FF">   
           <form name="upd_personality_subdep" method="post" action="src/dataManipulation.php" target="_self">
           <input type="hidden" name="tab" value="personality">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $ID; ?>">                      
           <input type="hidden" name="action" value="UPDATE"> 
		   <select size='1' name='IDsubdep' id='IDsubdep' >
<?
      ListSubDeps($depID);
?>
           </select>

           <div id="upd_personality_subdep_submit"><a href="javascript:document.upd_personality_subdep.submit();" onMouseOver="window.status='';return true;">Внести дані</a></div>
                </td>
              </tr>
           </form>
              </td>              
           </tr>            
<? } ?>   
          </table>
 
 
    </td>
  </tr>
<?php  
  }
  else
  {
?>
  <tr valign="top"  height="20">
    <td valign="top" style="background-color:#FFCCCC; font-size:16px;">
    <center><br><br>
    Аутентифікація для доступу <strong> не була успішною !</strong>
    <br>
    <br><a href="../" class="footer_links"> повернутись</a>
    <br>
    <br>
    </center>
    
    </td>
  </tr>                 
<?php
  }
?>
  <tr><td background="img/bg_bottom.gif"><img src="img/bg_bottom.gif" width="694" height="30" align="bottom"> </td>
  </tr>
  <tr>
    <td align="right" class="footer_links">  
  
    </td> 
  </tr>
</table>
</body>
</html>
      
