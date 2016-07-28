<?
 $IDcollection=$HTTP_GET_VARS['ID'];
 include ("src/evisnyk.php");
 $result2=ExecuteQuery("SELECT * FROM volume WHERE ID=".$IDcollection." AND operated='Y' ORDER BY year DESC, issue DESC");
 $year0="";
 $firttime=1;

 while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
 {  $IDvolume=$line2["IDvolume"];
    if( mysql_num_rows(ExecuteQuery("SELECT DISTINCT ID FROM paper WHERE IDvolume=".$IDvolume." ")) > 0 )
	{ $issue=$line2["issue"];
      $year=$line2["year"];
	  $topress=$line2["topress"];
	  $topressdate=$line2["topressdate"];	
	  if( $year !=  $year0) 
	  { if($year0 != "") echo " </ul> </div> <br/>";
	    $year0= $year;  
?>   
       <img 
       <? if($firttime==1) echo "src='../css/img/minus.gif'";
	      else echo "src='../css/img/plus.gif'"; 
	   ?>	
       
        id="img_year_<? echo $year; ?>" onClick=" toggleExpanded ('<? echo $year; ?>');" />
       <b><? echo $year; ?></b>
       <div id='content_year_<? echo $year; ?>' 
       <? if($firttime==1) $firttime=0;
	      else echo "style=' display:none;' "; 
	   ?>	  
		  >
         <ul>      
<?	
      }

?>
              <li>
<?	  $dir_path="http://ecatalog.univ.kiev.ua/virt/";
	  $filename = $_SERVER['DOCUMENT_ROOT'].'/doc/series/v_'.$IDvolume.'.pdf';
	  if (file_exists($filename)) 
	  {
?>
		<a href="<? echo $dir_path; ?>series/v_<? echo $IDvolume; ?>.pdf" target="_blank"><img src="../css/img/pdf_button.png"  width="15" height="15" border="0" title="файл з повнотекстовим змістом"/></a> 
<?
   
	  } else 
	  { if($topress == 1) echo "<img src='../css/img/issue_publicated.png' >"; else
        if($topress == 0) echo "<img src='../css/img/issue_hidden.png' >"; else 
        echo "<img src='../css/img/issue_available.png' >"; 	  
	  }
?>     
<a href="javascript: updateTag( 'collection_body','vol/v_<? echo $IDvolume; ?>.htm','');" onMouseOver="window.status='';return true;">
   <? echo $issue; ?></a>   
               </li>
<?php 
    }
  }
?>     
 </ul></div> 