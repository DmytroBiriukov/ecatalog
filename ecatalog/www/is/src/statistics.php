<html xmlns="http://www.w3.org/1999/xhtml" >

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Електронний каталог періодичних видань Київського університету</title>
<link href="../../css/style.css" type="text/css" rel="STYLESHEET">
<script type="text/javascript" src="lib/tab.js"></script>
<script type="text/javascript" src="lib/prototype.js" ></script>
<script type="text/javascript" src="lib/scriptaculous.js"></script>
<script type="text/javascript" src="responses.js"></script>
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

<table style="font-size:10px;">
<tr>
<td  valign="top">


<table style="font-size:10px;">
<?php
 include("evisnyk.php");

  $query6="SELECT u.ID, u.username, d.title FROM users u, department d WHERE u.IDdep=d.ID AND d.IDinst=112 AND u.usergrp>1 AND u.usergrp=2 ORDER BY d.idx";
  $result6=ExecuteQuery($query6);
  $depTitle0="";
  $ind=0;  
  while($line6= mysql_fetch_array($result6, MYSQL_ASSOC))
  { $IDuser=$line6["ID"];
    $username=$line6["username"];
	$depTitle=$line6["title"];
	if($depTitle0 != $depTitle) 
	{ $depTitle0=$depTitle;
	  print("<tr> <td style=\" background:#CCCCCC \" colspan=3> <em> $depTitle </em></td></tr>");
	  $ind=0;
	}
	

  print("<tr align='left' valign='top' onmouseover=\"this.style.backgroundColor='#FFFF99';\" onmouseout=\"this.style.backgroundColor='#FFFF");
  if($ind % 2) echo "CC';\" "; else echo "FF';\" ";
  print(" bgcolor=#FFFF");
  if($ind % 2) echo "CC>"; else echo "FF>";
  $ind++;
?> 
  <td>

<!--   <form name="open_contentEditor_<? echo $IDuser; ?>" method="post" action="src/contenteditor.php" target="_blank">
   <input type="hidden" name="ID" value="<? echo $IDuser; ?>">
   <div onclick="document.form.open_contentEditor_<? echo $IDuser; ?>.submit();">
   </div>  
   </form> 
-->   

  <a class="footer_links" href="contenteditor.php? IDcontenteditor=<? echo $IDuser; ?>" target="_blank" ><? echo $username; ?></a>
   
   
  </td><td valign='top'>
<?  
	
	$result61=ExecuteQuery("SELECT c.ID AS ID, c.title AS title, datatab FROM user2collection uc, collection c WHERE uc.IDcollection=c.ID AND uc.IDuser =".$IDuser." " );
	$paperNum=0;
	$authorNum=0;
	
	while($line61= mysql_fetch_array($result61, MYSQL_ASSOC))
    { $ID=$line61["ID"];
	  $tab=$line61["datatab"];
	  $title=$line61["title"];	  
	  print("<a href='../colljourn.php?tab=$tab & ID=$ID' target='_blank' class='footer_links'>$title</a><br>");	
      
	  $result62=ExecuteQuery("SELECT ID FROM paper WHERE IDvolume IN (SELECT IDvolume FROM volume WHERE (datatab='".$tab."' AND ID=".$ID." ) ) ");	  
      $paperNum += mysql_num_rows($result62);  
	  mysql_free_result($result62);	
	  
      $result64=ExecuteQuery("SELECT IDperson FROM paperAuthor WHERE IDpaper IN (SELECT ID FROM paper WHERE IDvolume IN (SELECT IDvolume FROM volume WHERE (datatab='".$tab."' AND ID=".$ID." ) ) ) ");
	  $authorNum += mysql_num_rows($result64);
	  mysql_free_result($result64);	
	  
//	  print("$paperNum,  $authorNum <br>");	  
	}
	
    mysql_free_result($result61);	
	
    $personalityNum=0;
    $result63=ExecuteQuery("SELECT ID FROM personality WHERE insBy = ".$IDuser." ");
	//echo "SELECT ID FROM personality WHERE insBy = ".$IDuser." ";
	$personalityNum = mysql_num_rows($result63);
    mysql_free_result($result63);	

	
		
			
	print("</td><td> внесено статей - $paperNum  внесено персоналій авторів $personalityNum  -   привязано авторів - $authorNum ");
	
/*
	$result62=ExecuteQuery("(SELECT c.ID AS ID, c.title AS title, 'collection' AS tab FROM user2collection uc, collection c WHERE uc.IDcollection=c.ID AND uc.IDuser =".$IDuser.") UNION  (SELECT c.ID AS ID, c.title AS title, 'journal' AS tab FROM user2journal uc, journal c WHERE uc.IDjournal=c.ID AND uc.IDuser =".$IDuser.")" );
	while($line62= mysql_fetch_array($result62, MYSQL_ASSOC))
    { $ID=$line62["ID"];
	  $tab=$line62["tab"];
	  $title=$line62["title"];	  
	  print("<a href='colljourn.php?tab=$tab & ID=$ID' target='_blank' class='footer_links'>$title</a> <br>");	
	}
	
    mysql_free_result($result62);		
*/	
	
	print("</td></tr>");
  }
  mysql_free_result($result6);
?>
</table>


</td>
</tr>
</table>

</body>
</html>