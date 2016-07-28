<?php
 session_start();
 $aUser=$HTTP_SESSION_VARS["aUser"];
 $aPassword=$HTTP_SESSION_VARS["aPassword"];
 $aIP=$HTTP_SESSION_VARS["aIP"];
 $aID=$HTTP_SESSION_VARS["aID"];
 $aUserGroup=$HTTP_SESSION_VARS["aUserGroup"];
 $IDvolume=$HTTP_GET_VARS['IDvolume'];
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
  
 
<?php
 include ("src/evisnyk.php");
 $query0=" SELECT * FROM volume WHERE IDvolume=".$IDvolume." AND datatab='$tab' AND ID IN (SELECT IDcollection FROM user2collection WHERE IDuser=".$aID." ) ";
 $result0=ExecuteQuery($query0);
 $num_rows0 = mysql_num_rows($result0);
 
if($num_rows0 == 1)
{ 
 
 while($line0 = mysql_fetch_array($result0, MYSQL_ASSOC))
 {
    $tab=$line0['datatab']; 
    $ID=$line0['ID']; 	
    $year=$line0['year']; 	
    $issue=$line0['issue']; 	
 }
 
 $query1="SELECT * FROM $tab WHERE ID=$ID "; 
 $result1=ExecuteQuery($query1);
  
 $num_rows = mysql_num_rows($result1);

 if($num_rows==1)
 {
  while($line1 = mysql_fetch_array($result1, MYSQL_ASSOC))
  { $title=$line1["title"];
    $short_title=$line1["shortTitle"];
	$description=$line1["description"];
	$ISSN=$line1["ISSN"];
	if($tab == "collection") $ISBN=$line1["ISBN"];
	$IDedsBoard=$line1["IDedsBoard"];		
	$specDateFrom=$line1["specDateFrom"];
  }
 }else
 {
  $title="journal-title";
  $short_title="short-journal-title";
  $description="description";
  $ISSN="ISSN";
  $ISBN="ISBN";
  $IDedsBoard="IDedsBoard";		
  $specDateFrom="specDateFrom";  
 }
?>  
  <tr>
    <td class="header-links">
       &nbsp; &gt; <a href="usrlgn.php?STATE=2" class="header_links">Стартова</a> 
              \ <a href="edt_colljourn.php?tab=<?php echo $tab; ?>&&ID=<?php echo $ID; ?>" class="header_links"><?php echo $short_title; ?></a>

       \ <?php echo $year; ?> \ <?php echo $issue; ?>
    </td>
  </tr>
  
  
  <tr>
    <td>
<div id="navcontainer">
  <ul id="navlist">
	<li><a href="#" class="current">Редагувати номер</a></li>
	<li><a href="#">Внести нову персоналію</a></li>        
	<li><a href="#">Внести нову установу</a></li>                
  </ul>
</div>
<div id="content">
<!-- TAB1 ---------------------------------->
<div class="opentab" id="tab1">     

<?php 
   include("tab/tab_editVolume.php");
?>
</div>
<!-- TAB2 ---------------------------------->
<div class="tab" id="tab2">     

<?php 
   include("tab/tab_addperson.php");
?>
</div>





<!-- TAB3 ---------------------------------->
<div class="tab" id="tab3">     

<?php 
   include("tab/tab_addinstitution.php");
?>

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
    Порушення прав доступу для редагування видання
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
