<?php
//include("db_functions.php");
$link = my_db_connect();
?>

<p class="catalog_chapter">Каталог за назвою видання</p>
<center>
<span class="cap_letter_bar">
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
   if($ABC_inc[$i]) echo "<a href='#CapLetter_title_".$i."' class='cap_letter_bar'>".$ABC[$i]."</a>";
   else echo $ABC[$i];
}
?>
</span>
</center>
<?php
if(!empty($link))
{ my_db_select();
  $query="SELECT ID, title, ISSN, description, url, datatab FROM collection WHERE IDinst=112 ORDER BY title";
  $result11 = mysql_query($query);
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
	
    echo "<p class = 'journalInfo'>";
    if($line["url"] !="")   echo "<a href='http://".$line["url"]."'> $title </a></p>";
    else
   echo "<a href='is/colljourn.php?tab=".$line["datatab"]." & ID=".$line["ID"]."'>".$title."</a></p>";
//    echo "<a href='c_".$line["ID"]."/'>".$title."</a></p>";	
//    ShowCollJournInfo($line["ID"], $title, $line["ISSN"], $line["datatab"], $line["description"], $line["url"]);
  }	
  mysql_free_result ($result11);  
}
?>