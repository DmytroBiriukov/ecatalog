<?php
include("evisnyk.php");

$keyvalue=trim($HTTP_GET_VARS['keyvalue']);
$keyfield=trim($HTTP_GET_VARS['keyfield']);
$field=trim($HTTP_GET_VARS['field']);
$value= trim($HTTP_POST_VARS['value']); // stripslashes();
$tab=trim($HTTP_GET_VARS['tab']);
/*
$fieldValues=array($field => strdecode($value));
$keyValues=array($keyfield => strdecode($keyvalue));
*/
$fieldValues=array($field => $value);
$keyValues=array($keyfield => $keyvalue);

sqlUpdateQuery($tab, $fieldValues, $keyValues);

//echo strdecode($value);
echo $value;
?>