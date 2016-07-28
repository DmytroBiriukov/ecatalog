<?php
session_start();
$state=$HTTP_GET_VARS['STATE'];
include("src/evisnyk.php");


if($state==1)
{// logined first time 
  session_register("aID","aUser","aPassword","aUserGroup","aTime","aIP","aUserDep","registered");
  $aPassword=$HTTP_POST_VARS['upwd'];
  if(substr_count($_SERVER['HTTP_REFERER'], "login.php") == 1 )
  { $aIP=$HTTP_POST_VARS['uIP'];
    $uID=$HTTP_POST_VARS['uID'];
	$query="SELECT * FROM users WHERE userpwd='".$aPassword."' AND IP='".$aIP."' AND ID=".$uID." ";
//	echo $query;
  }else
  { 
//	echo $query;	
    $aLogin=$HTTP_POST_VARS['uIP'];
    $query="SELECT * FROM users WHERE userpwd='".$aPassword."' AND userlgn='".$aLogin."' ";
  }
  
  $localtime = localtime();
  $aTime=$localtime[2].":".$localtime[1];
  
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
  }
}else
 if($state==2)
{// already logined user
/*  displayVARS();
  echo "aID=".$aID;
  echo "SESSION[aID]=".$_SESSION['aID'];
  */
  $aID=$_SESSION['aID'];
  $query="SELECT * FROM users WHERE ID=".$aID." ";
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
}
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
  <tr>
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
  if($aID >0)
  {
	switch($aUserGroup)
	{ case 2: include("tab/usr_contenteditor.php");  break;
	  case 1: include("tab/usr_admin.php"); break;
//	  case 4: include("tab/usr_sb.php"); break;
	  default: ;
	}
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
