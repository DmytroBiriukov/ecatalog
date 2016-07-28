<?php
  include("../../is/src/evisnyk.php");
  $depID = $_GET["IDdep"];
  $stat= $_GET["stat"];

  if($stat)
  {
?>
           <tr>
           <td bgcolor="#FFFF99">кафедра</td>
           <td> <select size='1' name='IDsubdep' id='IDsubdep' style=' width:250px;'>>
<?
  ListSubDeps($depID);
?>
           </select></td>
           </tr>
<?
  }
?>
