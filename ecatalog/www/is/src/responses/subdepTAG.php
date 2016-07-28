<? header('Content-Type: text/html; charset=windows-1251');
  include("../evisnyk.php");
  $depID = $_GET["IDdep"];
  $stat= $_GET["stat"];

  if($stat)
  {
?>
           <tr>
           <td bgcolor="#FFFF99">кафедра</td>
           <td> <select size='1' name='IDsubdep' id='IDsubdep'>
<?
  ListSubDeps($depID);
?>
           </select></td>
           </tr>
<?
  }
?>
