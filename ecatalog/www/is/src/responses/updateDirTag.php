<?php

include("../evisnyk.php");
//$location="../../../../doc";
$location="../../../doc";
$internaldir=trim($HTTP_GET_VARS["dir"]);
$dir = $location."/".$internaldir;
$i=0;
// Open a known directory, and proceed to read its contents
if(is_dir($dir)) 
{ if($dh = opendir($dir)) 
  {  $ind=0;
?>  
<table width="250" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#666666" style="color:#FFFF99">
    <td width="50">
    <img src="img/dir_up.png" onclick="javascript: updateTag('work_dir','src/responses/updateDirTag.php','dir=<?php echo  $internaldir."/.."; ?>');" />
    <form name="removeDir_0" action="src/responses/DirCmd.php" target="_self" method="post">
    <input type="hidden" value="<? echo $dir; ?>" name="path" />
    <input type="hidden" value="rmdir" name="cmd" />  
    <img src="img/b_drop.png"  onclick="javascript: removeDir_0.submit();" />
    </form>   
    </td>
    <td width="200">
    <form name="makeDir" action="src/responses/DirCmd.php" target="_self" method="post">
    <input type="text" value="" name="path" />
    <input type="hidden" value="mkdir" name="cmd" />  
    <img src="img/dir_mk.png"  onclick="javascript: makeDir.path.value='<?php echo  $dir."/";?>'+makeDir.path.value; makeDir.submit();" />
    </form>    
    </td>
  </tr>
<?   while (($file[$i] = readdir($dh)) !== false) 
     {  
	    if($file[$i]!= "." && $file[$i]!= "..")
		{$ind++;	
?><tr valign='top' 
      onmouseover="this.style.backgroundColor='#CCCCCC';"  
      onmouseout="this.style.backgroundColor='<? if($ind % 2) echo "#999999"; else echo "#AAAAAA"; ?>';" 
      bgcolor="<? if($ind % 2) echo "#999999"; else echo "#AAAAAA"; ?>"> 	 
     <td width="50" align="left">
<?      if(filetype($dir."/".$file[$i]) == "dir")
	    { echo "<img src='img/dir.png'>";
?>
    <form name="removeDir_<? echo $i;?>" action="src/responses/DirCmd.php" target="_self" method="post">
    <input type="hidden" value="<? echo $dir."/".$file[$i]; ?>" name="path" />
    <input type="hidden" value="rmdir" name="cmd" />  
    <img src="img/b_drop.png"  onclick="javascript: removeDir_<? echo $i;?>.submit();" />
    </form>   
<?		 
        }else
		{
?>
    <form name="removeFile_<? echo $i;?>" action="src/responses/DirCmd.php" target="_self" method="post">
    <input type="hidden" value="<? echo $dir."/".$file[$i]; ?>" name="path" />
    <input type="hidden" value="unlink" name="cmd" />  
    <img src="img/b_drop.png"  onclick="javascript: removeFile_<? echo $i;?>.submit();" />
    </form>   
<?    
        }
?>		
    </td>
     <td width="200"  align="left"><a href="javascript: updateTag('work_dir','src/responses/updateDirTag.php','dir=<?php echo  $internaldir."/".$file[$i]; ?>'); " onMouseOver="window.status='';return true;"><? echo $file[$i]; ?> </a>		
     </td>
   </tr>  
<?      }  
	    $i++;
     }
?>
  <tr>
    <td>
    </td>
    <td>
    </td>
  </tr>
</table>  
<?   closedir($dh);
  }
} else echo "can't open $dir";


?>
