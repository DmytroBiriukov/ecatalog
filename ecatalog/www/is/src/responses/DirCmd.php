<?php

include("../evisnyk.php");

function SureRemoveDir($dir, $DeleteMe) {
    if(!$dh = @opendir($dir)) return;
    while (false !== ($obj = readdir($dh))) {
        if($obj=='.' || $obj=='..') continue;
        if (!@unlink($dir.'/'.$obj)) SureRemoveDir($dir.'/'.$obj, true);
    }

    closedir($dh);
    if ($DeleteMe){
        @rmdir($dir);
    }
}



$cmd=trim($HTTP_POST_VARS["cmd"]);
$path = trim($HTTP_POST_VARS["path"]);
displayVARS();
switch($cmd)
{ case 'rmdir': if(is_dir($path))  SureRemoveDir($path, true); break; 
  case 'mkdir': if(!is_dir($path)) mkdir($path, 0700); break;
  case 'unlink': unlink($path); break;
  default :  break;
}
?>  
<script language="javascript">
<!-- 
history.go(-1);
-->
</script> 
