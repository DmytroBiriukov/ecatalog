<?php
include("evisnyk.php");
global $HTTP_POST_VARS;

$action=trim($HTTP_POST_VARS['action']);
$IDperson=trim($HTTP_POST_VARS['IDperson']);
$IDpaper=trim($HTTP_POST_VARS['IDpaper']);
$tab=trim($HTTP_POST_VARS['tab']);

if($action == 'INSERT')
{
//  sqlInsertQuery($tab, $fieldValues);
}else
if($action == 'UPDATE')
{
// sqlUpdateQuery($tab, $fieldValues, $keyValues);
}
else
if($action == 'DELETE')
{ 
  ExecuteQuery("DELETE FROM $tab WHERE IDperson=$IDperson AND IDpaper=$IDpaper");

// displayVARS();
// echo "DELETE FROM $tab WHERE IDperson=$IDperson AND IDpaper=$IDpaper";
}
?>
<script language="javascript">
<!--  
history.go(-1);
-->
</script> 