<?php 
  header('Content-Type: text/plain; charset=windows-1251');
  include("../is/src/evisnyk.php"); 
  $query="SELECT ID, title, ISSN, description, url, datatab FROM collection WHERE IDinst=112 ORDER BY title";
  $result11 = ExecuteQuery($query);
?>

<div id="catalog_title" >
<h2>Каталог за назвою видання</h2>
<div id="cap_letter_bar">
<?
$ABC=    array('А','Б','В','Г','ґ','Д','Е','Є','Ж','З',
               'И','І','Ї','Й','К','Л','М','Н','О','П','Р',
               'С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ю','Я');
$ABC_inc=array(1,0,1,1,0,0,1,0,1,1,
               0,1,0,0,1,1,1,1,1,1,1,
               1,1,1,1,0,0,0,1,0,0,0);
for($i=0; $i<32; $i++)
{  if($i && $i%22) echo " | ";
   if(!($i%22)) echo "<br>";
   if($ABC_inc[$i]) echo "<a href='#CapLetter_title_".$i."'>".$ABC[$i]."</a>";
   else echo $ABC[$i];
}
?>
</div>
<?php
  $CapLetter=""; 
  while( $line = mysql_fetch_array($result11, MYSQL_ASSOC))
  { $title=$line['title'];
    $Captitle=substr($line['title'], 0, 2);
	if( $Captitle != $CapLetter)
	{ $CapLetter=$Captitle;
	  $curLetter=0;
	  while($CapLetter!=$ABC[$curLetter])
	  {$curLetter++;
	  }
	  print("<p class='cap_letter'><a name='CapLetter_title_".$curLetter."'></a>". $CapLetter." &nbsp; <a href='#top' > <img src='is/img/up.gif' border=0/> </a> </p>"); 
	}
	
    
    if($line["url"] !="")   echo "<h2><a href='http://".$line["url"]."'> $title </a></h2>";
    else
    echo "<h2><a href='catalog/journal.php?ID=".$line["ID"]."'>".$title."</a></h2>";
  }	
?>