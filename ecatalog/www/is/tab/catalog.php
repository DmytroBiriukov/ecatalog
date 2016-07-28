<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />

</head>

<body>

<?php
include("db_functions.php");
$link = my_db_connect();
?>

<p class="catalog_chapter"><a name='catalog_chapter'>Каталог за напрямом досліджень</a></p>
<p class="cap_letter_bar">
<a href='#CapLetter_1' >Гуманітарні науки</a> | 
<a href='#CapLetter_2' >Природничі науки</a>  
</p>
<?php
if(!empty($link))
{ my_db_select();
  $query="(SELECT c.ID, c.title, c.ISSN, c.description, 'collection' AS type, s.nh FROM collection c, scifield s WHERE c.IDinst=112 AND c.IDsciField=s.ID ORDER BY s.nh, c.title) UNION (SELECT c.ID, c.title, c.ISSN, c.description, 'journal' AS type, s.nh FROM journal c, scifield s WHERE c.IDinst=112 AND c.IDsciField=s.ID ORDER BY s.nh, c.title) ORDER BY nh, title";
  $result = mysql_query($query);
  $NH="n";
  print("<p class='cap_letter'><a name='CapLetter_1'>Гуманітарні науки</a> &nbsp; <a href='#catalog_chapter' > ^ </a> </p>"); 
  while( $line = mysql_fetch_array($result, MYSQL_ASSOC))
  { $title=$line['title'];
	if( $line['nh'] == $NH) 
	{ print("<p class='cap_letter'><a name='CapLetter_2'>Природничі науки</a> &nbsp; <a href='#catalog_chapter' > ^ </a> </p>"); 
	  $NH="";
	}
	print("<br> ".$line['ID']." - ".$title." - ".$line['type']. " ");
// ShowCollJournInfo($line["ID"], $title, $line["ISSN"], $line["type"], $line["description"]);	
  }	
}
?>

<?
$str="http://unicyb.kiev.ua/~birjukov/scicon/is/usrlgn.php";
$n=strlen($str);
echo "<br>".$str." ={ ";
for($i=0;$i<$n;$i++)
{ 
echo ord($str[$i])." , ";
}
?>
<p class="catalog_chapter">Каталог за галуззю наук</p>
<?php
//include("db_functions.php");
//$link = my_db_connect();
if(!empty($link))
{ my_db_select();
  $query="(SELECT c.ID, c.title, c.ISSN, c.description, 'collection' AS type, s.title AS science FROM collection c, scifield s, collection2scifield cs WHERE c.IDinst=112 AND cs.IDsciField=s.ID AND cs.IDcollection=c.ID) UNION (SELECT c.ID, c.title, c.ISSN, c.description, 'journal' AS type, s.title AS science FROM journal c, scifield s, journal2scifield cs  WHERE c.IDinst=112 AND cs.IDsciField=s.ID AND cs.IDjournal=c.ID) ORDER BY science, title";
  $result = mysql_query($query);
  $science="";
  print("<br>Гуманітарні науки<br>");
  while( $line = mysql_fetch_array($result, MYSQL_ASSOC))
  { $title=$line['title'];
  
	if( $line['science'] !=   $science) {   $science=$line['science']; print("<br>".$science."<br>");}
	print("<br> ".$line['ID']." - ".$title." - ".$line['type']. " ");
  }	
}
?>


</body>
</html>
