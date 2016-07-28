<html>
<body>
<?php
// $IDcontenteditor=$HTTP_POST_VARS['IDcontenteditor'];
 $IDcontenteditor=$HTTP_GET_VARS['IDcontenteditor'];
 include ("evisnyk.php");
 $result=ExecuteQuery("SELECT * FROM users WHERE ID= $IDcontenteditor ");
 $num_rows = mysql_num_rows($result);
 if($num_rows==1)
 {
   if($line = mysql_fetch_array($result, MYSQL_ASSOC))
  { 
?>  
     <table>
             <tr>
               <td class="title_colomn">ПІБ</td>
               <td> <? echo $line['username']; ?>
               </td>
             </tr>
             
                       
             <tr>
               <td class="title_colomn">e-mail</td>
               <td> <? echo $line['email']; ?>
               </td>
             </tr>
             <tr>
               <td  class="title_colomn">контактний телефон (основний)</td>
               <td> <? echo $line['telephone']; ?>
               </td>
             </tr>
             <tr>
               <td  class="title_colomn">контактний телефон (direct)</td>
               <td> <? echo $line['dirphone']; ?>
               </td>
             </tr>
             <tr>
               <td  class="title_colomn">mob</td>
               <td> <? echo $line['mobile']; ?>
               </td>
             </tr>            
             <tr>
               <td  class="title_colomn">факультет</td>
               <td> <em> <? printTitle("department", $line['IDdep']); ?> 
                    </em>
               </td>
             </tr>
     </table>
<?  
   }
 }  
?>
</body>
</html>
