<?php
header('Content-Type: text/plain; charset=windows-1251');

include("../evisnyk.php");

$isempty=true;

$author=$_GET["author"];
$title=$_GET["title"];
$abstract=$_GET["abstract"];

if(strlen( $author ) >= 3) 
{ $aauthor = " tmp_author LIKE '%".implode("%' AND tmp_author LIKE '%", explode(" ", $author))."%' ";
  $isempty=false;
} else $aauthor="";
if(strlen( $title)>= 4)
{ $atitle = " p.title LIKE '%".implode("%' AND p.title LIKE '%", explode(" ", $title))."%' ";
  $isempty=false;
} else $atitle="";
if(strlen( $abstract ) >= 4) 
{ $aabstract =" abstract_ua LIKE '%".implode("%' AND abstract_ua LIKE '%", explode(" ", $abstract))."%' ";
  $isempty=false;
} else $aabstract="";
if ($HTTP_GET_VARS["lc"] == "true") $lc=" AND "; else $lc = " OR ";

$within = $HTTP_GET_VARS["within"];
$image_path="http://evisnyk.unicyb.kiev.ua/css/img/";

$query=" ";
$first=0;
$ID=0;
$tab=0;
 
if($atitle!="")
{ if($first == 0) { $first++; $query=$query." AND ( ".$atitle;}
  else $query=$query.$lc.$atitle;
  
  
}
if($aabstract!="") 
{ if($first == 0) { $first++; $query=$query." AND ( ".$aabstract;}
  else $query=$query.$lc.$aabstract;
}
if($aauthor!="") 
{ if($first == 0) { $first++; $query=$query." AND ( ".$aauthor;}
  else $query=$query.$lc.$aauthor;
}

if($first != 0) $query=$query." )";




if($query!="" && !$isempty) 
{
 
if($within == 'yes')
{ $ID = $HTTP_GET_VARS["ID"];
  $query=" SELECT p.*, v.issue, v.year, c.title AS collectionTitle, c.ID AS collectionID  FROM paper p, volume v, collection c WHERE p.IDvolume IN (SELECT IDvolume FROM volume WHERE ID=".$ID.") AND v.IDvolume=p.IDvolume AND c.ID=".$ID."  ".$query;  
}else
{ $query=" SELECT p.*, v.issue, v.year, v.ID AS IDcolljourn, v.datatab, c.title AS collectionTitle, c.ID AS collectionID FROM paper p, volume v, collection c WHERE  v.IDvolume=p.IDvolume AND v.ID=c.ID ".$query; 
}
//echo $query;




/*$link = my_db_connect();
if(!empty($link))
{ if(my_db_select() == True)
  {$result= mysql_query($query, $link);*/ 
    $result= ExecuteQuery($query);
    $num_rows=mysql_num_rows($result) ;

if($num_rows> 0 && $num_rows<280)
{ 
  echo "<p>Знайдено <strong>$num_rows</strong> стат";
      $m=$num_rows%100;
      if($m>4 && $m<=20)
      { echo "тей.";
      }else
      { if($m>20) $m=$m%10;
        if($m==1) echo "тю.";
        else if($m<5) echo "ті.";
             else echo "ей.";
      }
echo "</p>";
  $n_p_page=7;
 
  echo "<div id='navcontainer'><ul id='navlist'>";
  for($i=1; $i<= ($num_rows / $n_p_page)+1; $i++)
  {    echo "<li><a href='#' ";  //document.navlist.item
       if($i==1) echo " class='current' ";
       echo " onClick='onTabClick(this);'>".$i."</a></li>"; 
  }	
  echo "</ul></div> <div id='content'>";

  $ind=0;
  $i=1;
  while($line = mysql_fetch_array($result, MYSQL_ASSOC))
  {

    if($ind % $n_p_page == 0)
    { if($ind!=0) echo "</table></div>";	 
      echo "<div "; 
	  if($i!=1) echo " class='tab' ";
	  echo "<table>"; 
	  $i++;    
    }	

   
    $ID=$line["ID"];  
    $issue=$line["issue"];
    $year=$line["year"];
  
    $title=array('укр.'=>$line["title"], 'англ.'=>$line["title_en"], 'рос.'=>$line["title_ru"]);
    $abstract=array('укр.'=>$line["abstract_ua"], 'англ.'=>$line["abstract_en"], 'рос.'=>$line["abstract_ru"]);
    $keyWords=array('укр.'=>$line["keyWords_ua"], 'англ.'=>$line["keyWords_en"], 'рос.'=>$line["keyWords_ru"]);    
    $udk=$line["udk"];  
    $pageFirst=$line["pageFirst"];  
    $pageLast=$line["pageLast"]; 
    $lang=$line["lang"];   

  $collectionID=$line["collectionID"];  

  $T_titles=array('укр.'=>'Назва.&nbsp;','англ.'=>'Title.&nbsp;','рос.'=>'Название.&nbsp;');	
  $A_titles=array('укр.'=>'Анотація.&nbsp;','англ.'=>'Abstract.&nbsp;','рос.'=>'Аннотация.&nbsp;');	
  $K_titles=array('укр.'=>'Ключові слова:&nbsp;','англ.'=>'Key words:&nbsp;','рос.'=>'Ключевые слова:&nbsp;');	
  $U_titles=array('укр.'=>'УДК&nbsp;&nbsp;','англ.'=>'UDC&nbsp;&nbsp;','рос.'=>'УДК&nbsp;&nbsp;');	  
  
  
  $pRef=paperReference($ID);
  $ref=$pRef["ref"];
  $link_ref=$pRef["link_ref"]; 
  $link_authors=$pRef["link_authors"];
  $abstractFormat=$pRef["abstractFormat"];  
      
  ?>
  
  <tr align='left' valign='top' onMouseOver="this.style.backgroundColor='#FFFF99';" 
  onmouseout="this.style.backgroundColor='#<?  if($ind % 2) echo "FFFFFF"; else echo "FFFFCC";?>';" 
  bgcolor='#<? if($ind % 2) echo "FFFFFF"; else echo "FFFFCC";?>'> 
  <td colspan=2> 
   
  <table>
  <tr>
  <td colspan=2><p>
  
<? echo $link_authors;
?> </p>   
      </td>
  </tr>     
  <tr width="700">
      <td colspan="2">
<?php
$filename = $_SERVER['DOCUMENT_ROOT'].'/doc/papers/'.$ID.'.pdf';
if (file_exists($filename)) 
{
?>
   <a style="border:0;" href="http://ecatalog.univ.kiev.ua/virt/papers/<? echo $ID; ?>.pdf" target="_blank">  <img src="<? echo $image_path;?>pdf_button.png" title="файл з повнотекстовим змістом" /> </a>
<?  
} 
?>  
<img src='<? echo $image_path;?>plus.gif' id="img_paper_<? echo $ID; ?>" onClick=" togglePaperExpanded ('<? echo $ID; ?>');" />
<span class="paperTitle">  
<?     
if($abstractFormat == "tex") 
	   { echo parseFormula($title[$lang], 0); 
	   } else echo $title[$lang]; 
?>  </span>  
      </td>
    </tr>
<tr>
<td colspan="2">
<div id="content_paper_<? echo $ID;?>" style="display:none">


<table class="paperInfo">
<? if($udk != "")
   {
?>       
    <tr><td td colspan="2"> <p><span class="paperInfoItems"> <? echo $U_titles[$lang]; ?> </span> <? echo $udk; ?></p></td></tr>    
<? }
   if($abstract[$lang] != "")
   {
?> 
    <tr><td td colspan="2">  <p><span class="paperInfoItems"> <? echo $A_titles[$lang]; ?> </span> 
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($abstract[$lang], 0); 
	   } else echo $abstract[$lang]; 
?>  </p>
    </td>
    </tr> 
<? }
   if($keyWords[$lang] != "")
   {
?>     
    <tr><td td colspan="2"> <p><span class="paperInfoItems"> <? echo $K_titles[$lang]; ?> </span> <?  echo $keyWords[$lang]; ?></p></td></tr>    
<? }

   $langs=array('укр.','рос.','англ.');
   
   foreach ($langs as $k=>$l)
   { 
   if($lang != $l){ 

   if($title[$l] != "")
   {
?>      
    <tr><td td colspan="2"><p><span class="paperInfoItems"><? echo $T_titles[$l]; ?> </span>
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($title[$l], 0); 
	   } else echo $title[$l]; 
?>   
    </p></td></tr> 
<? }
   if($abstract[$l] != "")
   {
?> 
    
    <tr><td td colspan="2"><p><span class="paperInfoItems"><? echo $A_titles[$l]; ?></span>
<?     if($abstractFormat == "tex") 
	   { echo parseFormula($abstract[$l], 0); 
	   } else echo $abstract[$l]; 
?> 	 
    </p></td></tr>    
<? }
   if($keyWords[$l] != "")
   {
?> 
    
    <tr><td td colspan="2"> <p><span class="paperInfoItems"><? echo $K_titles[$l]; ?></span> 
<?  echo $keyWords[$l]; 
?> 	 
    </p></td></tr>    
<? }

     }
  }	 
?> 
     <tr><td colspan="2"> <p><span class="paperInfoItems">Бібліографічне посилання [<?php echo $pRef["GOST"];?>]:&nbsp; </span><?php echo  $link_ref; ?></p>
         </td>
     </tr>  
</table>
</div>

</td>
</tr>
</table>
</td>
</tr>
<? 
  $ind++;
}
  echo "</table></div></div>";	
} else
{ if($num_rows == 0)
  {
?>
В базі даних немає публікацій, що відповідають заданим параметрам пошуку. <br>Змініть параметри пошуку та спробуйте знову. 
<?
   }else
   {
?>
Кількість знайдених статей, що відповідають заданим параметрам пошуку, занбто велика (<? echo $num_rows;?>). Конкретизуйте умови пошуку. 
<?   
   }
}

}else
{
?>
Не вказано параметрів для пошукового запиту, або введені значення параметрів дуже короткі! <br> Для пошуку за прізвищем автора введіть не менше 3 символів, пошуку за словом з назви та анотації - не менше 4 символів. 
<?
}


/* 
  }
 
  else
  {
?>
<div id="failure">Вибачте, через переналаштування серверу, тимчасово відсутнє підключення до бази даних.</div> 
<?  
  }
}else
{
?>
<div id="failure">Вибачте, через переналаштування серверу, тимчасово відсутнє підключення до бази даних.</div> 
<?
}
*/	
?>
