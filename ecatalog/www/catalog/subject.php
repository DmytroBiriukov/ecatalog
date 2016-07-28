<?php 
  header('Content-Type: text/plain; charset=windows-1251');
  include("../is/src/evisnyk.php"); 
  $query="SELECT c.ID, c.title, c.url, c.ISSN, c.description, 'collection' AS type, s.title AS science, s.ID AS sfID, c.datatab FROM collection c, scifield s, collection2scifield cs WHERE c.IDinst=112 AND cs.IDsciField=s.ID AND cs.IDcollection=c.ID  ORDER BY science, title";
  $result11 = ExecuteQuery($query);
  $science="";
?>
<img src="img/scibranches.png" border="0" usemap="#Map"/>
<map name="Map" id="Map">
  <area shape="rect" coords="327,110,473,136" href="#CapLetter_subject_16" />
  <area shape="rect" coords="328,83,474,109" href="#CapLetter_subject_3" />
  <area shape="rect" coords="32,109,178,135" href="#CapLetter_subject_23" />
  <area shape="rect" coords="473,83,618,109" href="#CapLetter_subject_11" />
  <area shape="rect" coords="474,109,619,135" href="#CapLetter_subject_4" />
  <area shape="rect" coords="32,82,178,108" href="#CapLetter_subject_7" />
  <area shape="rect" coords="32,135,178,161" href="#CapLetter_subject_22"/>
  <area shape="rect" coords="180,110,325,136" href="#CapLetter_subject_19" />
  <area shape="rect" coords="327,136,473,162" href="#CapLetter_subject_1" />
  <area shape="rect" coords="180,83,325,109" href="#CapLetter_subject_13" />
  <area shape="rect" coords="32,162,178,188" href="#CapLetter_subject_9" />
  <area shape="rect" coords="180,136,325,162" href="#CapLetter_subject_10" />
  <area shape="rect" coords="475,136,620,162" href="#CapLetter_subject_2" />
  <area shape="rect" coords="180,164,325,190" href="#CapLetter_subject_12" />
<area shape="rect" coords="180,56,325,82" href="#CapLetter_subject_27" />
<area shape="rect" coords="31,55,178,81" href="#CapLetter_subject_8" />
</map>
<?
  while( $line = mysql_fetch_array($result11, MYSQL_ASSOC))
  { $title=$line['title'];
  
	if( $line['science'] !=   $science) 
	{   $science=$line['science']; 
		print("<p class='cap_letter'><a name='CapLetter_subject_".$line["sfID"]."'></a>". $science." &nbsp; науки <a href='#top' > <img src='is/img/up.gif' border=0/> </a>  </p>"); 
	
	}
   
    if($line["url"] !="")   echo "<h2><a href='http://".$line["url"]."'> $title </a></h2>";
    else
    echo "<h2><a href='catalog/journal.php?ID=".$line["ID"]."'>".$title."</a></h2>";
  }	
?>