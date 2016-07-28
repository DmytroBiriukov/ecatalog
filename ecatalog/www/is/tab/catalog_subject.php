<?php
//include("db_functions.php");
$link = my_db_connect();

?>
<img src="is/img/scibranches.jpg" border="0" usemap="#Map"/>
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
<?php
/*
?>
<p class="catalog_chapter">Каталог за напрямком досліджень</p>
<p class="cap_letter_bar">
<?php
if(!empty($link))
{ my_db_select();
?>
  <table width="600">
    <tr>
      <td align='center' style="color: #FFFF99" width="50%">Гуманітарні науки
      </td>
      <td align='center'  style="color: #FFFF99" width="50%">Природничі науки
      </td>
    </tr>
    <tr>
      <td>
          <table width="100%">
  <?php
  $query="SELECT title,ID FROM scifield WHERE operated=1 AND nh='h' ORDER BY title";
  $result11 = mysql_query($query); 
  $ind=0;
  while( $line = mysql_fetch_array($result11, MYSQL_ASSOC))
  { if(!($ind%2)) echo "<tr onmouseover='this.style.background=#6D3636;' onmouseout='this.style.background=#887D67;'  >";
    echo "<td width='50%' align='center'><a href='#CapLetter_subject_".$line['ID']."' >".$line['title']."</a></td>";
    if(($ind%2)) echo "</tr>";
	$ind++;
  }	
  mysql_free_result ($result11);
  ?>
            </table>
         </td>
         <td>
             <table width="100%">  
  <?php
  $query="SELECT title,ID FROM scifield WHERE operated=1 AND nh='n' ORDER BY title";
  $result11 = mysql_query($query);
  $ind=0;
  while( $line = mysql_fetch_array($result11, MYSQL_ASSOC))
  {if(!($ind%2)) echo "<tr onmouseover='this.style.background=#6D3636;' onmouseout='this.style.background=#887D67;'>";

    echo "<td width='50%' align='center'><a href='#CapLetter_subject_".$line['ID']."' >".$line['title']."</a></td>";
	if(($ind%2)) echo "</tr>";
	$ind++;
  }	
  mysql_free_result ($result11);  
?>  
               </table>
           </td>
        </tr>
     </table>    
<?php
}



?>
</p>
<?php

*/

if(!empty($link))
{ my_db_select();

  $query="SELECT c.ID, c.title, c.url, c.ISSN, c.description, 'collection' AS type, s.title AS science, s.ID AS sfID, c.datatab FROM collection c, scifield s, collection2scifield cs WHERE c.IDinst=112 AND cs.IDsciField=s.ID AND cs.IDcollection=c.ID  ORDER BY science, title";
  $result11 = mysql_query($query);
  $science="";

  while( $line = mysql_fetch_array($result11, MYSQL_ASSOC))
  { $title=$line['title'];
  
	if( $line['science'] !=   $science) 
	{   $science=$line['science']; 
		print("<p class='cap_letter'><a name='CapLetter_subject_".$line["sfID"]."'></a>". $science." &nbsp; науки <a href='#top' > <img src='is/img/up.gif' border=0/> </a>  </p>"); 
	
	}
   
    echo "<p class = 'journalInfo'>";
    if($line["url"] !="")   echo "<a href='http://".$line["url"]."'> $title </a></p>";
    else
    echo "<a href='is/colljourn.php?tab=".$line["datatab"]." & ID=".$line["ID"]."'>".$title."</a></p>";
//    echo "<a href='c_".$line["ID"]."/'>".$title."</a></p>";
//    ShowCollJournInfo($line["ID"], $title, $line["ISSN"], $line["datatab"], $line["description"] , $line["url"]);	
  }	
  mysql_free_result ($result11);
}
?>