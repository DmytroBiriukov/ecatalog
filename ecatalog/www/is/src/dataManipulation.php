<?php
include("evisnyk.php");
global $HTTP_POST_VARS;

$action=trim($HTTP_POST_VARS['action']);
$keyvalue=trim($HTTP_POST_VARS['key_value']);
$keyfield=trim($HTTP_POST_VARS['key_field']);
$tab=trim($HTTP_POST_VARS['tab']);
$keyValues=array($keyfield => $keyvalue);
$fieldValues=array();

foreach( $HTTP_POST_VARS as $key => $value)
{
  if ($key != 'action' && $key != 'key_value' && $key != 'key_field' && $key != 'tab' && $key != 'submit_button' && substr_count($key, "_search") == 0)
  {   $fieldValues[$key]=$value;
  }
}

//displayVARS();
// print_r($fieldValues);

if($action == 'INSERT')
{
  sqlInsertQuery($tab, $fieldValues);
}else
if($action == 'UPDATE')
{
 sqlUpdateQuery($tab, $fieldValues, $keyValues);
}
else
if($action == 'DELETE')
{
sqlDeleteQuery($tab, $keyValues);
// displayVARS();
}
?>
<script language="javascript">
<!-- 
history.go(-1);
-->
</script> 