<?php
 session_start();
 $aUser=$HTTP_SESSION_VARS["aUser"];
 $aPassword=$HTTP_SESSION_VARS["aPassword"];
 $aIP=$HTTP_SESSION_VARS["aIP"];
 $aID=$HTTP_SESSION_VARS["aID"];
 $aUserGroup=$HTTP_SESSION_VARS["aUserGroup"];

 $ID=$HTTP_GET_VARS['ID'];
 $tab=$HTTP_GET_VARS['tab']; 
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Електронний каталог періодичних видань Київського університету</title>
<link href="css/style.css" type="text/css" rel="STYLESHEET">
<script type="text/javascript" src="src/lib/tab.js"></script>
<script type="text/javascript" src="src/lib/prototype.js" ></script>
<script type="text/javascript" src="src/lib/scriptaculous.js"></script>
<script type="text/javascript" src="src/responses.js"></script>
</head>
<body onLoad="myonLoad()">

<table width="982" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" >
  <tr valign="top">
    <td><table class="headerTable" width="982" height="38" border="0" cellspacing="0" cellpadding="0">
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
  
<? 
 include ("src/evisnyk.php");
  
 $query1="SELECT * FROM collection WHERE ID=$ID AND ID IN (SELECT IDcollection FROM user2collection WHERE IDuser=$aID ) "; 
 
 $result1=ExecuteQuery($query1);
  
 $num_rows = mysql_num_rows($result1);

 if($num_rows==1)
 {
  if($line1 = mysql_fetch_array($result1, MYSQL_ASSOC))
  { $title=$line1["title"];
    $short_title=$line1["shortTitle"];
	$description=$line1["description"];
	$ISSN=$line1["ISSN"];
	if($tab == "collection") $ISBN=$line1["ISBN"];
	$IDedsBoard=$line1["IDedsBoard"];		
	$specDateFrom=$line1["specDateFrom"];
	$abstractFormat=$line1["abstractFormat"];
	$frequency=$line1['frequency'];
	$established=$line1['established'];
	$registred=$line1['registred'];
	$registredVAK=$line1['registredVAK'];	
  }
?>  <tr>
    <td class="header-links">
       &nbsp; &gt; <a href="usrlgn.php?STATE=2" class="header_links">Стартова</a> 
       \ <?php echo $short_title; ?>
    </td>
  </tr>
  <tr>
    <td>
        <div id="navcontainer">
		<ul id="navlist">
			<li><a href="#" class="current">Загальна інформація та редагування номерів</a></li>
            <li><a href="#">Редакційна колегія</a></li> 
            <li><a href="#">Технічні особливості</a></li>  
		</ul>
	  </div>
<div id="content">
<!-- TAB1 -- Загальна інформація -------------------------------->
<div class="opentab" id="tab1">          
<?php 
   include("tab/tab_colljourn_general.php");
?>
</div>  

<!-- TAB3 -- Редакційна колегія -------------------------------->
<div class="tab" id="tab3">          
<?php 
 include("tab/tab_edsBoard.php");      
?>
</div>
<!-- 
	 TAB4 -- Технічні особливості 
-->
<div class="tab" id="tab4">          
<table width="600" border="0" style="font-size:10px;">
  <tr>
     <td class="title_colomn">Формат внесення резюме</td>
     <td width="500">
     
     <p id="abstractFormat"><?php if($abstractFormat=="tex") echo "резюме в форматі ТеХ"; else echo "простий текст";?></p>
     <script type="text/javascript">	 
new Ajax.InPlaceCollectionEditor('abstractFormat', 'src/inDBPlaceEdit.php?keyvalue=<? echo $ID;?> & keyfield=ID & field=abstractFormat & tab=collection ',{collection: [['plainText','простий текст'],['tex','резюме в форматі ТеХ']], value: 'простий текст', ajaxOptions: {method: 'post'}, okText:"Внести зміни", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "відмінити"});     
     </script>
     </td>
  </tr>
</table> 
</div>     
 
</div>

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
    Порушення прав доступу на сторінку редагування видання!
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
<!--        
    <a class="footer_links" href="edssoftware.htm">
    Програмні продукти для редагування публікацій</a>&nbsp;|&nbsp;
    <a class="footer_links" href="pressservices.htm">
    Послуги друкування</a>&nbsp;|&nbsp;
    <a class="footer_links" href="is/contacts.php">
    Коллектив розробників системи</a> &nbsp;&nbsp;<br>
    <a class="footer_links" href="scisoftware.htm">
    Програмні продукти для проведення науково-дослідної роботи</a>&nbsp; &nbsp;
    -->
    </td> 
  </tr>
</table>
</body>
</html>