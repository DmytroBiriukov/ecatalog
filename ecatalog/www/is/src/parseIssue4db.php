<?php
include("evisnyk.php");

  $tab_colljourn = $_POST["tab"];  
  $ID_colljourn = $_POST["ID"];    
  if( $tab != 'journal') $tab='collection';

echo "<br>".$tab." ID=".$ID."<br>";


function readDatabase($filename) {
    // read the xml database
    $data = implode("",file($filename));
    $parser = xml_parser_create();
    xml_parser_set_option($parser,XML_OPTION_CASE_FOLDING,0);
    xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1);
    xml_parse_into_struct($parser,$data,$values,$tags);
    xml_parser_free($parser);
    $issues=array();
    // loop through the structures
    foreach ($tags as $key=>$val) 
	{
        if ($key == "issue") 
		{   $issueRanges = $val;
            // each contiguous pair of array entries are the 
            // lower and upper range for each issue definition
            for ($i=0; $i < count($issueRanges); $i+=2) 
			{   $offset = $issueRanges[$i] + 1;
                $len = $issueRanges[$i + 1] - $offset;
                $issues[] = parseIssue(array_slice($values, $offset, $len));
            }
        } else 
		  if($key == "content")
		  { $issue_contRanges = $val;
            // each contiguous pair of array entries are the 
            // lower and upper range for each issue definition
            for ($i=0; $i < count($issue_contRanges); $i+=2) 
			{   $offset = $issue_contRanges[$i] + 1;
                $len = $issue_contRanges[$i + 1] - $offset;
                $contents[] = parseIssueContent(array_slice($values, $offset, $len));
            }
		    
		  }  
		  else continue;
        
    }
    return $issues;
}

function parseIssue($issueValues) 
{ 
  global $tab_colljourn;  
  global $ID_colljourn;    

  for($i=0;$i<4;$i++) 
 { $issue[$issueValues[$i]['tag']]=$issueValues[$i]['value'];
 
 }
//  print_r($issue);
  echo "<table><tr><td class='left_title'> Випуск </td><td>".$issue['volume']."</td></tr>";
  echo "<tr><td class='left_title'> Рік </td><td>".$issue['year']."</td></tr>";  
  echo "<tr><td class='left_title'> Опис </td><td>".$issue['description_ua']."</td></tr>";  
  echo "<tr><td class='left_title'> Опис </td><td>".$issue['description_en']."</td></tr></table>";    
  echo "<br>";  
  
  return $issue;
}


function parseIssueContent($contentValues) 
{

  global $tab_colljourn;  
  global $ID_colljourn;    

    $section=-1;
	$section_titles=array();
    $article=-1;
	
    $content=array();
    for ($i=0; $i < count($contentValues); $i++)
    { 
	   if($contentValues[$i]["tag"] == "section" && $contentValues[$i]["type"] == "open" )
	   { $article=-1;
	     $section++;
	   } else
	     if($contentValues[$i]["tag"] == "article" && $contentValues[$i]["type"] == "open")
		 { $article++;		   
		 } else
		   if($contentValues[$i]["tag"] == "section_title" )//&& $contentValues[$i]["type"] == "cdata")
		   { $section_titles[$section]['title']=$contentValues[$i]['value'];      
		   } else  
//		    if($contentValues[$i]["type"] == "cdata")
		   { $content[$section][$article][ $contentValues[$i]['tag'] ]=$contentValues[$i]['value'];      	   
		   } //else continue;
	}
	
//	echo "<br> section=".$section;
//	echo "<br> article=".$article;

    for($k=0; $k <= $section ; $k++)
	{  
	
	   $query="SELECT ID FROM section WHERE title = '".trim($section_titles[$k]['title'])."' " ;
	   $result=ExecuteQuery($query);
	   if(mysql_num_rows($result) == 0 ) 
	   { $query="SELECT ID FROM section WHERE title LIKE '%".trim($section_titles[$k]['title'])."%'";
	      //echo $query; 
	     $result=ExecuteQuery($query);
	   }
	   if ($line = mysql_fetch_array($result, MYSQL_ASSOC))
         {  //echo $query; 
		    $section_titles[$k]['ID']=$line["ID"];
		 }
	
	echo "<table><tr><td class='left_title'> Розділ </td><td>".$section_titles[$k]['title']."</td></tr></table><br>";
	
	   foreach ($content[$k] as $val )
	   { 
	     echo "<table><tr><td class='left_title'> Назва </td><td>".$val['title']."</td></tr>";
         echo "<tr><td class='left_title'> Автори </td><td>".$val['author']."</td></tr>";  
         echo "<tr><td class='left_title'> УДК </td><td>".$val['udk']."</td></tr>";  
         echo "<tr><td class='left_title'> Резюме </td><td>".$val['abstract_ua']."</td></tr>";    
		 echo "<tr><td class='left_title'> Резюме </td><td>".$val['abstract_en']."</td></tr></table><br>";   
		 // "IDsection" => $section_titles[$k]['ID'] ,
		 // 
	   } 
	} 

    return $content;
}

//printf ($HTTP_POST_FILES['userfile']['tmp_name']);
//echo $HTTP_POST_VARS['userfile'];


if( $_FILES['xmlfile']['tmp_name'] )
{  $filepath=$_FILES['xmlfile']['tmp_name'];
   $db = readDatabase($filepath);
} else echo "file was not uploaded !";



?>

