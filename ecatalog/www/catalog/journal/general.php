<?php 
  header('Content-Type: text/plain; charset=windows-1251');
  include("../../is/src/evisnyk.php");
  $resultc=ExecuteQuery("SELECT title, ISSN, ISSNonline, format, description, description_en, description_ru FROM collection WHERE ID=".$_GET['ID']." ");
  if($cline = mysql_fetch_array($resultc, MYSQL_ASSOC))
  { 
?>
<img src="http://ecatalog.univ.kiev.ua/img/cv_<? echo $_GET['ID']; ?>.jpg" class="cvimg"/> 
<h1><? echo $cline['title'];?></h1>
<? switch ($cline['format'])
   {case 'both': echo "<p><strong>ISSN</strong> ".$cline['ISSN']."(print)</p><p><strong>ISSN</strong> ".$cline['ISSNonline']."(online)</p>"; break;
    case 'print': echo "<p><strong>ISSN</strong> ".$cline['ISSN']."(print)</p>"; break;
	case 'online': echo "<p><strong>ISSN</strong> ".$cline['ISSNonline']."(online)</p>"; break;
   }
   if($cline['description']!="") echo "<p>".$cline['description']."</p>";
   if($cline['description_en']!="") echo "<p>".$cline['description_en']."</p>";
   if($cline['description_ru']!="") echo "<p>".$cline['description_ru']."</p>";
   
   
   $result2=ExecuteQuery("SELECT sf.title FROM collection2scifield csf, scifield sf WHERE csf.IDcollection=".$_GET['ID']." AND sf.ID=csf.IDsciField");
?> <p><strong>Галузь наук:</strong> 
<? $iii=0;
   while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
   { if($iii) echo ", "; echo $line2['title']; $iii++;
   }   
   echo ".";
?> </p>
<?
   $result3=ExecuteQuery("SELECT DISTINCT c.ID, c.title FROM collection c, collection2scifield csf WHERE csf.IDcollection=c.ID  AND csf.IDsciField IN (SELECT IDsciField FROM collection2scifield WHERE IDcollection=".$_GET['ID'].") AND c.IDinst=112");
?>   
   <p><strong>Схожі за напрямком досліджень видання:</strong> 
<? $iii=0;
   while($line3 = mysql_fetch_array($result3, MYSQL_ASSOC))
   { if($iii) echo ", "; echo "<a href='http://www.ecatalog.univ.kiev.ua/c_".$line3['ID']."/'>".$line3['title']."</a>"; $iii++;
   }   
   echo ".";
?> </p>
<?   
    
  }
?>

