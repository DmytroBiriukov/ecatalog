<?php 
//  header('Content-Type: text/plain; charset=windows-1251');
include ("db_functions.php");

function formPaperReference($IDpaper)
{  
    $result2=ExecuteQuery("SELECT p.* FROM personality p, paperAuthor pa  WHERE p.ID=pa.IDperson AND pa.IDpaper=".$IDpaper." ORDER BY pa.IDpaper");  
	$ii=0;
	$authorNum=mysql_num_rows($result2);
	
	//echo "[$authorNum]";
	
	while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
    { $IDperson=$line2["ID"];
      $name=$line2["name"];
	  if($ii) echo ", ";
//	  print("<a href='edt_person.php?ID=$IDperson'>");
      echo LFF($name);
//	  print("</a>");
	  $ii++;
    }
	
	mysql_free_result ($result2);
	
	$result=ExecuteQuery("SELECT p.title AS ptitle, p.udk, p.pageFirst, p.pageLast, v.issue AS vtitle, v.year AS vyear FROM paper p, volume v WHERE p.ID=".$IDpaper." AND v.IDvolume=p.IDvolume");
	
	while($line = mysql_fetch_array($result, MYSQL_ASSOC))
	{
	  $title=$line["ptitle"];
      $udk=$line["udk"];  
      $pageFirst=$line["pageFirst"];  
      $pageLast=$line["pageLast"]; 
      $vtitle=$line["vtitle"]; 	   
      $year=$line["vyear"]; 	   	  
	  echo " $title //  .-$year.-$vtitle.- C.$pageFirst-$pageLast." ; 
	}
	
	mysql_free_result ($result);

}

function tmpPaperReference($IDpaper)
{  	$result=ExecuteQuery("SELECT p.title AS ptitle, p.tmp_author, p.tmp_pages, v.issue AS vtitle, v.year AS vyear FROM paper p, volume v WHERE p.ID=".$IDpaper." AND v.IDvolume=p.IDvolume");	
	while($line = mysql_fetch_array($result, MYSQL_ASSOC))
	{ $title=$line["ptitle"];
      $tmp_pages=$line["tmp_pages"];  
      $tmp_author=$line["tmp_author"]; 
      $vtitle=$line["vtitle"]; 	   
      $year=$line["vyear"]; 	   	  
	  echo "[$tmp_author] $title //  .-$year.-$vtitle.- $tmp_pages." ; 
	}	
	mysql_free_result ($result);
}

function ShownJournalCollectionList($nh, $operated)
{		 $query="SELECT title, ID FROM scifield WHERE nh='".$nh."' AND operated=".$operated." ORDER BY title";
		 $result=ExecuteQuery($query);	 
		 
  	     $base_root=$_SERVER['DOCUMENT_ROOT']."/doc/series/";
		 
		 while( $line = mysql_fetch_array($result, MYSQL_ASSOC))
		 {
		   print("<li><a href=\"\">".$line['title']." науки</a>");
		   $query2="SELECT c.url as url, c.title as title, c.datatab as type, c.ID as ID FROM collection c, collection2scifield s WHERE c.ID=s.IDcollection AND  s.IDsciField=".$line['ID']." AND IDinst=112  ORDER BY title";
		   $result2=ExecuteQuery($query2);
		   if(mysql_num_rows($result2)>0)
		   { 
		     print("<ul>"); 
		     while( $line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
		     { 
			   if($line2['url']!="")
			   print("<li><a href=\"http://".$line2['url']."\"><em>".$line2['title']);
			   else
			   print("<li><a href=\"catalog/journal.php?ID=".$line2['ID']."\"><em>".$line2['title']);
			   print("</em></a></li>");			 
			 }
		     print("</ul>");
		   }
		   print("</li>");
		   mysql_free_result ($result2);	 
		 }
		 mysql_free_result ($result);
}

function VerifyUser($aIP, $aPassword)
{  $query="SELECT ID FROM users WHERE userpwd='".$aPassword."' AND IP='".$aIP."' ";
   $result=ExecuteQuery($query);	 
   if( $line = mysql_fetch_array($result, MYSQL_ASSOC))
   return $line['ID'];
   else 
   return 0;  
}

function LFF($name)
{  $namer=explode(" ", $name); 
   if(count($namer) == 3)
   { 
    $resname=$namer[0]." ".substr($namer[1], 0, 2).".".substr($namer[2], 0, 2).".";
   }else $resname=$name;
   return $resname;
}

function FFL($name)
{  $namer=explode(" ", $name); 
   if(count($namer) > 1)
   { 
    $resname=substr($namer[1], 0, 2).".".substr($namer[2], 0, 2).". ".$namer[0];
   }else $resname=$name;
   return $resname;
}

function ListDeps($inst)
{
   $link = my_db_connect();
   if(!empty($link))
   {
      mysql_select_db(database);
      $query = "SELECT * FROM department WHERE IDinst=$inst ORDER BY idx";
      $result = mysql_query($query);
      $num_rows = mysql_num_rows($result);
      if($num_rows>0)
      {
          while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
          {
            $fld1=$line["ID"];
            $fld2=$line["title"];
            print("<option name='IDdep' value='$fld1'>$fld2</option>");
          }
      }
      mysql_free_result($result);
   }
  
}

function ListSubDeps($depID)
{
   $link = my_db_connect();
   if(!empty($link))
   {
      mysql_select_db(database);
          $query = "SELECT * FROM subdep WHERE ID IN (SELECT IDsubdep FROM depbelonging WHERE IDdep='$depID')";
      $result = mysql_query($query);
      $num_rows = mysql_num_rows($result);
      if($num_rows>0)
      {
          while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
          {
            $fld1=$line["ID"];
            $fld2=$line["title"];
            print("<option value='$fld1'>$fld2</option>");
          }
            print("<option value=0><em>інше</em></option>");
      }
      mysql_free_result($result);
   }
}


function ListSciPos()
{ $link = my_db_connect();
   if(!empty($link))
   {
      mysql_select_db(database);
      $query = "SELECT * FROM degree WHERE scp=1 ORDER BY idx";
      $result = mysql_query($query);
      $num_rows = mysql_num_rows($result);
      if($num_rows>0)
      {
          while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
          {
            $fld1=$line["title"];
            $fld2=$line["name"];
            print("<option name='scipos' value='$fld1'>$fld2</option>");
          }
      }
      mysql_free_result($result);
   }
}

function ListSciDeg()
{  $link = my_db_connect();
   if(!empty($link))
   {
      mysql_select_db(database);  
      $query = "SELECT abr FROM scifield ORDER BY title";    
	  $result = mysql_query($query);
      $num_rows = mysql_num_rows($result);
      if($num_rows>0)
      {   print("<option name='scideg' value=''>немає</option>");
          while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
          {
    	      $valuefld=$line["abr"];
              $fld1="д.".$valuefld.".н.";
              $fld2="к.".$valuefld.".н.";
			  if($valuefld!="")
			  { print("<option name='scideg' value='$fld1'>$fld1</option>");
                print("<option name='scideg' value='$fld2'>$fld2</option>");			  
			  }
          }
      }
      mysql_free_result($result);
   }
}   


  function printSCDegs()
  {
    $i=0;
    if($result=ExecuteQuery("SELECT abr FROM scifield ORDER BY title"))
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    { if($i!=0)  echo ",";
      $valuefld=$line["abr"];
      echo "'д.".$valuefld.".н.',";
      echo "'к.".$valuefld.".н.'";
      $i++;
    }
    mysql_free_result($result);
  }
  
  function printSCPos()
  { $i=0;
    if($result=ExecuteQuery("SELECT title FROM degree WHERE scp=1 ORDER BY idx"))
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
    { if($i!=0)  echo ",";
      $valuefld=$line["title"];
      echo "'".$valuefld."'";
      $i++;
    }
    mysql_free_result($result);    
  }

function parseFormula($text, $isuppercase)
{ //$text=stripslashes($text);
  while( $text != $text=str_replace("\\\\", "\\", $text) ){;}
  $parts=explode("$", $text);
  $i=0;
//  $cgipath="<img src='../cgi-bin/mimetex.cgi?";
//  $cgipath="<img src='http://www.scicon.univ.kiev.ua/cgi-bin/mimetex.cgi?";
  $cgipath="<img src='http://www.forkosh.dreamhost.com/mimetex.cgi?";
  $text="";
  foreach($parts as $part)
  { if($i % 2) 
    $text=$text.$cgipath.$part."' alt='' border=0 >";
    else if($isuppercase) $text=$text.strtoupper($part); 
	     else $text=$text.$part;
    $i++;
  }
  return $text;
}

function sectionList($volume)
{ $result=ExecuteQuery("SELECT title, ID FROM section WHERE IDcollection = (SELECT ID FROM volume WHERE IDvolume=".$volume." AND datatab='collection' ) ORDER BY ID"); 
  while($line = mysql_fetch_array($result, MYSQL_ASSOC))
  { echo "<option value='".$line["ID"]."'>".$line["title"]."</option>  ";
  }
}


function personality($ID)
{   $pRef=array("LFF"=>"", "FFL"=>"", "name"=>"", "affiliation"=>"", "scideg_name"=>"",  	 
			 "exists"=>"no", "HTML"=>""); 
    $result1=ExecuteQuery("SELECT p.* FROM personality p  WHERE p.ID=".$ID." ");  
    if($line1 = mysql_fetch_array($result1, MYSQL_ASSOC))	
    {
	  $pRef["exists"]="yes";
	  $pRef["name"]=$line1["name"];
	  $pRef["LFF"]=LFF($line1["name"]);
	  $pRef["FFL"]=FFL($line1["name"]);	  

	  $scideg=$line1["scideg"];
	  $scipos=$line1["scipos"];	
	  $position=$line1["position"];	
	  $IDinst=$line1["IDinst"];	
	  $IDdep=$line1["IDdep"];	
	  $IDsubdep=$line1["IDsubdep"];	
  
	  $pRef["HTML"]="<a title=\"";	  
	  
	  if($scipos!="") $pRef["scideg_name"].=$scipos." ";
      $pRef["scideg_name"].=$pRef["name"];
      $pRef["HTML"].= $pRef["scideg_name"];
      if(trim($scideg)!="") $pRef["HTML"].=", ".$scideg;  
	  
	  if($IDinst==112)
	  { $pRef["affiliation"].="КНУ";
	    if($IDdep) { $pRef["affiliation"].=", "; $pRef["affiliation"].=getRowTitle("department", $IDdep);}
		if(trim($position) != "") $pRef["affiliation"].=", ".$position;	
	    if($IDsubdep) { $pRef["affiliation"].=", "; $pRef["affiliation"].=getRowTitle("subdep", $IDsubdep);}
	  }else
	  { if(trim($position) != "") $pRef["affiliation"].=", $position";	    	 
	    if($IDinst) {$pRef["affiliation"].=", "; $pRef["affiliation"].=getRowTitle("institutions", $IDinst);}
	  }
	  $pRef["HTML"].=", ".$pRef["affiliation"];
	  $pRef["HTML"].="\">";
	  $pRef["HTML"].=$pRef["LFF"];
	  $pRef["HTML"].="</a>";
    }
	return $pRef;
}


function paperReference($ID)
{ $pRef=array("f_author"=>"", "authors"=>"", "link_authors"=>"", "all_authors"=>"", "ext_authors"=>"",
			 "ref"=>"", "link_ref"=>"","title"=>"", "GOST"=>"", "pages"=>"", "lang"=>"", "file_exists"=>"no",
             "IDcollection"=>"", "journal"=>"", "abstractFormat"=>"", "cISSN"=>"", "cTab"=>"",
			 "cIssue"=>"", "cIDVolume"=>"", "cYear"=>"",			 
			 "exists"=>"no", "HTML"=>""); 
			   
  $query=" SELECT p.*, v.issue, v.year, v.ID AS IDcolljourn, v.datatab, v.IDvolume FROM paper p, volume v WHERE  v.IDvolume=p.IDvolume AND p.ID=".$ID." "; 
  $result=ExecuteQuery($query);	
  if($line = mysql_fetch_array($result, MYSQL_ASSOC))
  { $pRef["exists"]="yes";
    $IDcolljourn=$line["IDcolljourn"];  
	$pRef["IDcollection"]=$IDcolljourn;

    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/doc/papers/'.$ID.'.pdf')) $pRef["file_exists"]='yes';			 
   
    $query0=" SELECT title, ISSN, abstractFormat, datatab FROM collection WHERE ID=".$IDcolljourn." "; 
    $result0=ExecuteQuery($query0);	
    if($line0 = mysql_fetch_array($result0, MYSQL_ASSOC))
    { $colljourntitle=$line0["title"];
      $pRef["journal"]=$colljourntitle;
      $ISSN=$line0["ISSN"];
	  $abstractFormat=$line0["abstractFormat"];
	  $tab=$line0["datatab"];
      $pRef["cISSN"]= $ISSN;      
	  $pRef["cTab"]= $tab;
      $pRef["abstractFormat"]= $abstractFormat;		  
    }
    $issue=$line["issue"];
    $year=$line["year"];  
    $IDvolume=$line["IDvolume"];
    
    $tmp_author=$line["tmp_author"];
    $udk=$line["udk"];  
    $pageFirst=$line["pageFirst"];  
    $pageLast=$line["pageLast"]; 
    $lang=$line["lang"];   	  

    $pRef["cIssue"]= $issue;
    $pRef["cYear"]= $year;	
    $pRef["cIDVolume"]= $IDvolume;

    $pRef["lang"]= $lang; 
    $title=array('укр.'=>$line["title"], 'англ.'=>$line["title_en"], 'рос.'=>$line["title_ru"]);
    $abstract=array('укр.'=>$line["abstract_ua"], 'англ.'=>$line["abstract_en"], 'рос.'=>$line["abstract_ru"]);
    $keyWords=array('укр.'=>$line["keyWords_ua"], 'англ.'=>$line["keyWords_en"], 'рос.'=>$line["keyWords_ru"]);    
    $udk=$line["udk"];  
	 
  
    $authors="";
    $f_author="";
    $all_authors="";
	$ext_authors="";
    $link_authors="";

    $pages="";
    switch($lang)
    { case 'англ.': $pages="P. "; break;
	  default: $pages="C. "; break;
    }
    $pages.=$pageFirst;
    if($pageLast!=0 && $pageLast!='') $pages.=" &#8212; $pageLast.";
	$pRef["pages"]=$pages;
  
    $ii=0;
    $result1=ExecuteQuery("SELECT p.* FROM personality p, paperAuthor pa  WHERE p.ID=pa.IDperson AND pa.IDpaper=".$ID." ");  
    if(mysql_num_rows($result1)>0)
    {
	while($line1 = mysql_fetch_array($result1, MYSQL_ASSOC))
    { $name=$line1["name"];
	  if($ii) 
	  { $authors.=", ";
	    $all_authors.=", ";
		$link_authors.=", ";
		$ext_authors.=", ";
	  } else $f_author=LFF($name);
	  
	  $authors.=LFF($name);
	  $all_authors.=FFL($name);	 
	  $ext_authors.=$name; 
  
	  $scideg=$line1["scideg"];
	  $scipos=$line1["scipos"];	
	  $position=$line1["position"];	
	  $IDinst=$line1["IDinst"];	
	  $IDdep=$line1["IDdep"];	
	  $IDsubdep=$line1["IDsubdep"];	
  
	  $link_authors.="<a title=\"";	  
	  if($scipos!="") $link_authors.=$scipos." ";
      $link_authors.=$name;
      if(trim($scideg)!="") $link_authors.=", ".$scideg;  
	  
	  if($IDinst==112)
	  { $link_authors.=", КНУ";
	    if($IDdep) { $link_authors.=", "; $link_authors.=getRowTitle("department", $IDdep);}
		if(trim($position) != "") $link_authors.=", ".$position;	
	    if($IDsubdep) { $link_authors.=", "; $link_authors.=getRowTitle("subdep", $IDsubdep);}
	  }else
	  { if(trim($position) != "") $link_authors.=", $position";	    	 
	    if($IDinst) {$link_authors.=", "; $link_authors.=getRowTitle("institutions", $IDinst);}
	  }
	  $link_authors.="\">";
	  $link_authors.=LFF($name); 
	  $link_authors.="</a>";
	  $ii++;
    }
      $ref=$f_author." ".$title[$lang]." / ".$all_authors." // ".$colljourntitle.".&#8212; ".$year.".&#8212; ".$issue.".&#8212; ".$pages." ";
	  $link_ref=$f_author." <a href='http://ecatalog.univ.kiev.ua/papers/".$ID.".htm'>".$title[$lang]."</a> / ".$all_authors." // <a href='http://ecatalog.univ.kiev.ua/c_".$IDcolljourn."/'>".$colljourntitle."</a>.&#8212; ".$year.".&#8212; ".$issue.".&#8212; ".$pages." ";	  
	  $pRef["GOST"]="ДСТУ ГОСТ 7.1:2006";
    } else
    { $link_authors=$tmp_author;
	  $pRef["GOST"]="ГОСТ 7.1—84";
      $ref=$tmp_author." ".$title[$lang]." // ".$colljourntitle.".&#8212; ".$year.".&#8212; ".$issue.".&#8212; ".$pages." ";
	  $link_ref=$tmp_author." <a href='http://ecatalog.univ.kiev.ua/papers/".$ID.".htm'>".$title[$lang]."</a> // <a href='http://ecatalog.univ.kiev.ua/c_".$IDcolljourn."/'>".$colljourntitle."</a>.&#8212; ".$year.".&#8212; ".$issue.".&#8212; ".$pages." ";		  
    }	 

    $pRef["ref"]=$ref;
    $pRef["f_author"]=$f_author;
    $pRef["authors"]=$authors;
    $pRef["ext_authors"]=$ext_authors;	
    $pRef["title"]=$line["title"];
    $pRef["link_authors"]=$link_authors;
    $pRef["link_ref"]=$link_ref;	
    $pRef["all_authors"]=$all_authors;
	
	
    $T_titles=array('укр.'=>'Назва.&nbsp;','англ.'=>'Title.&nbsp;','рос.'=>'Название.&nbsp;');	
    $A_titles=array('укр.'=>'Анотація.&nbsp;','англ.'=>'Abstract.&nbsp;','рос.'=>'Аннотация.&nbsp;');	
    $K_titles=array('укр.'=>'Ключові слова:&nbsp;','англ.'=>'Key words:&nbsp;','рос.'=>'Ключевые слова:&nbsp;');	
    $U_titles=array('укр.'=>'УДК&nbsp;&nbsp;','англ.'=>'UDC&nbsp;&nbsp;','рос.'=>'УДК&nbsp;&nbsp;');	
	
	$pRef["HTML"]="<table class=\'paperInfo\'><tr><td td colspan=2>".$pRef["link_authors"]."</td></tr>"; 	
	$pRef["HTML"].="<tr><td class=\'paperTitle\' width=700>".$pRef["title"]."</td><td width=80 align=\'right\'>".$pages."</td></tr>";
    if ($pRef["file_exists"]=='yes') $pRef["HTML"].="<tr><td colspan=2><a href=\'http://ecatalog.univ.kiev.ua/virt/papers/".$ID.".pdf\' target=\'_blank\'><img src=\'http://ecatalog.univ.kiev.ua/img/pdf.png\' title=\'файл з повнотекстовим змістом\' /></a></td></tr>";	
	if($udk != "") $pRef["HTML"].="<tr><td colspan=2><p><span class=\'paperInfoItems\'>".$U_titles[$lang]."</span>".$udk."</p></td></tr>";    
    if($abstract[$lang] != "") $pRef["HTML"].="<tr><td colspan=2><p><span class=\'paperInfoItems\'>".$A_titles[$lang]."</span>"; 
    if($abstractFormat == "tex") $pRef["HTML"].=parseFormula($abstract[$lang], 0); else $pRef["HTML"].=$abstract[$lang]; 
    $pRef["HTML"].="</p></td></tr>"; 
    if($keyWords[$lang] != "") $pRef["HTML"].="<tr><td colspan=2><p><span class=\'paperInfoItems\'>".$K_titles[$lang]."</span>".$keyWords[$lang]."</p></td></tr>";    
    $langs=array('укр.','рос.','англ.'); 
    foreach ($langs as $k=>$l)
      if($lang != $l)
	  {  if($title[$l] != "")
         {  $pRef["HTML"].="<tr><td colspan=2><p><span class=\'paperInfoItems\'>".$T_titles[$l]."</span>";
            if($abstractFormat == "tex") $pRef["HTML"].=parseFormula($title[$l], 0); else $pRef["HTML"].=$title[$l]; 
			$pRef["HTML"].="</p></td></tr>"; 
         }
         if($abstract[$l] != "")
         {  $pRef["HTML"].="<tr><td colspan=2><p><span class=\'paperInfoItems\'>".$A_titles[$l]."</span>";
		    if($abstractFormat == "tex") $pRef["HTML"].=parseFormula($abstract[$l], 0); else $pRef["HTML"].=$abstract[$l];
			$pRef["HTML"].="</p></td></tr>"; 
         }
         if($keyWords[$l] != "")  $pRef["HTML"].="<tr><td colspan=2><p><span class=\'paperInfoItems\'>".$K_titles[$l]."</span>".$keyWords[$l]."</p></td></tr>";    
     }
	 $pRef["HTML"].="<tr><td colspan=2><p><span class=\'paperInfoItems\'>Бібліографічне посилання [".$pRef["GOST"]."]:&nbsp;</span>".$link_ref."</p></td></tr></table>"; 
	 
  }
  return $pRef;
}  

function getTitle($tabName, $IDval)
{  $link = my_db_connect();
   $title="";
   if(!empty($link))
   {
      mysql_select_db(database);
      $query =  "SELECT title FROM $tabName WHERE ID='$IDval'";
          $result = mysql_query($query);
          if($line = mysql_fetch_array($result, MYSQL_ASSOC))
          { $title=$line['title'];

          }
      mysql_free_result($result);
   }
   return $title;
}

?>