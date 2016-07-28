<?php
  include("../../is/src/evisnyk.php");
  $str = $_GET["inst"];
  if($str<2)
  {
?>

           <tr><td  class="title_colomn">посада</td>
               <td><input type="text" name="position" size="35" value=""></td>
               </tr>    
           <tr>
           

<?php
  }
  if($str==0)
  {
    $link = my_db_connect();
    if(!empty($link))
    {
?>
           <tr>
           <td bgcolor="#FFFF99">підрозділ КНУ</th>
           <td> <select size='1' name='IDdep' id='IDdep' onchange="subdeps();" style=' width:250px;'>>
<?
      ListDeps(112);
?>
           </select></td>
           </tr>
<?
    }
  }
  if($str==1)
  {
?>
            <tr> 
            <td bgcolor="#FFFF99">  пошук установи </td>
               <td> 
              <input type="text"  size="30" name="inst_search" id="inst_search" onKeyUp="quickSearch('inst_search','inst_searchResult',4,'src/instSearch.php' );" />             
			  <div id="inst_searchResult" class="cdata_colomn">
              <em>введіть частину назви (не менше 5 букв)</em>
              </div>                              
              </td>              
           </tr>            
<?
  }
?>