<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Including Editorial Board Tab
[begin]
---------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------> 
<?php

if($IDedsBoard != '')
{ $result=ExecuteQuery("SELECT ebc.position AS edtPosition, p.name, p.scideg, p.scipos, ebc.ID FROM edsBoardContent ebc, personality p WHERE ebc.IDedsBoard=$IDedsBoard AND ebc.IDperson = p.ID ORDER BY ebc.ID");

  $IDeditors=array();
  $IDchief_editor=0;
  $IDordinary_editor=array();
  $chief_editor="";
  $execute_editor="";
  $secretary="";
  $techsecretary="";
  $deputy="";
  //'head','deputy','exec','secretary','techsecretary'
  while($line = mysql_fetch_array($result, MYSQL_ASSOC))
  { switch($line['edtPosition'])
    { case "head": $chief_editor=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDchief_editor=$line['ID']; break;
	  case "deputy": $deputy=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDdeputy_editor=$line['ID']; break;
	  case "exec": $execute_editor=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDexecute_editor=$line['ID']; break;
	  case "secretary": $secretary=$line['name']; $IDsecretary_editor=$line['ID']; break;
	  case "techsecretary": $techsecretary=$line['name']; $IDtechsecretary_editor=$line['ID']; break;
	  default : $IDeditors[]=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDordinary_editor[]=$line['ID']; break;
    } 
  }
  mysql_free_result($result);
  
?>   
         <table style="font-size:10px;" width="500">
           <tr>
              <td class="title_colomn">Головний редактор
              </td>
              <td>                         
			  <?php 
			   if($chief_editor!="")
			   {  
?>
     <form name="del_edt_<?php echo $IDchief_editor; ?>" method="post" action="src/dataManipulation.php">
           <input type="hidden" name="tab" value="edsBoardContent">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $IDchief_editor; ?>" />
           <input type="hidden" name="action" value="DELETE"> 
     <img src='img/b_drop.png' onclick="javascript:document.del_edt_<?php echo $IDchief_editor; ?>.submit();" alt="відкріпити редактора" />
     <!--<a href="javascript: document.del_edt_<?php echo $IDchief_editor; ?>.submit();" onMouseOver="window.status='';return true;"> відкріпити редактора </a>  
     ]-->     
     </form>
<?			     echo $chief_editor;
			   } else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <?php 
		      if($chief_editor=="")  
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Пошук в базі даних <br> введіть частину ПІБ (не менше 4 символів) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="chiefEdtSearch" id="chiefEdtSearch" onKeyUp="quickSearch('chiefEdtSearch','chiefEdtSearchResult', 3, 'src/responses/personSearch.php');" /> 
                
                  <form name="add_chiefEdt" method="post" action="src/dataManipulation.php">
           			<input type="hidden" name="tab" value="edsBoardContent">                     
         		    <input type="hidden" name="IDedsBoard" value="<?php echo $IDedsBoard; ?>">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="head">                    
                   <div id="chiefEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?>             


			<tr>
              <td class="title_colomn">Заступник головного редактора
              </td>
              <td>                         
			  <?php if($deputy!="")
			  { 
			  
			  
?>
     <form name="del_edt_<?php echo $IDdeputy_editor; ?>" method="post" action="src/dataManipulation.php">
           <input type="hidden" name="tab" value="edsBoardContent">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $IDdeputy_editor;  ?>" />
           <input type="hidden" name="action" value="DELETE"> 
     <img src='img/b_drop.png' onclick="javascript:document.del_edt_<?php echo $IDdeputy_editor; ?>.submit();" alt="відкріпити редактора" onmouseover="window.status='відкріпити редактора';return true;" />    
	 <? echo $deputy;?>
     </form>
<?				  
			  

			  }
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <?php 
		      if($deputy=="")  
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Пошук в базі даних <br> введіть частину ПІБ (не менше 4 символів) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="deputyEdtSearch" id="deputyEdtSearch" onKeyUp="quickSearch('deputyEdtSearch','deputyEdtSearchResult', 3, 'src/responses/personSearch.php');" /> 
                
                  <form name="add_deputyEdt" method="post" action="src/dataManipulation.php">
           			<input type="hidden" name="tab" value="edsBoardContent">                     
         		    <input type="hidden" name="IDedsBoard" value="<?php echo $IDedsBoard; ?>">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="deputy">                    
                   <div id="deputyEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?>           


           <tr>
              <td class="title_colomn">Відповідальний редактор
              </td>
              <td>                         
		   <?php 
		      if($execute_editor!="")
			  {
?>
     <form name="del_edt_<?php echo $IDexecute_editor; ?>" method="post" action="src/dataManipulation.php">
           <input type="hidden" name="tab" value="edsBoardContent">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $IDexecute_editor;  ?>" />
           <input type="hidden" name="action" value="DELETE"> 
     <img src='img/b_drop.png' onclick="javascript:document.del_edt_<?php echo $IDexecute_editor; ?>.submit();" alt="відкріпити редактора" onmouseover="window.status='відкріпити редактора';return true;" />    
	 <? echo $execute_editor; ?>
     </form>
<?			  
			  
			    
			  } 
			  else echo "<em>немає даних</em>";
		   ?>
              </td>
           </tr> 
           <?php 
		      if($execute_editor=="")  
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Пошук в базі даних <br> введіть частину ПІБ (не менше 4 символів) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="executeEdtSearch" id="executeEdtSearch" onKeyUp="quickSearch('executeEdtSearch','executeEdtSearchResult', 3, 'src/responses/personSearch.php');" /> 
                
                  <form name="add_executeEdt" method="post" action="src/dataManipulation.php">
           			<input type="hidden" name="tab" value="edsBoardContent">                     
         		    <input type="hidden" name="IDedsBoard" value="<?php echo $IDedsBoard; ?>">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="exec">                    
                   <div id="executeEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?> 
              
              
           <tr>
              <td class="title_colomn">Члени редакційної колегії
              </td>
              <td>                         
			<?php 
			  $n=count($IDeditors);
			  if($n>0) 
			  { for($i=0; $i<$n; $i++ ) 
			    { 
?>
     <form name="del_edt_<?php echo $IDordinary_editor[$i]; ?>" method="post" action="src/dataManipulation.php">
           <input type="hidden" name="tab" value="edsBoardContent">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="<?php echo $IDordinary_editor[$i];  ?>" />
           <input type="hidden" name="action" value="DELETE"> 
     <img src='img/b_drop.png' onclick="javascript:document.del_edt_<?php echo $IDordinary_editor[$i]; ?>.submit();" alt="відкріпити редактора" onmouseover="window.status='відкріпити редактора';return true;" />    
	 <? echo $IDeditors[$i]; ?>
     </form>
<?			  
			    } 
			  } 
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <?php 
		      if($n>-1)   
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Знайти та додати члена <br> редакційної колегії <br>(введіть частину ПІБ) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="memberEdtSearch" id="memberEdtSearch" onKeyUp="quickSearch('memberEdtSearch','memberEdtSearchResult', 3, 'src/responses/personSearch.php');" /> 
                
                  <form name="add_memberEdt" method="post" action="src/dataManipulation.php">
           			<input type="hidden" name="tab" value="edsBoardContent">                     
         		    <input type="hidden" name="IDedsBoard" value="<?php echo $IDedsBoard; ?>">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="member">                    
                   <div id="memberEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?>  


            



           <tr>
              <td class="title_colomn">Вчений секретар
              </td>
              <td>                         
			  <?php if($secretary!="") echo $secretary; 
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <?php 
		      if($secretary=="")  
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Пошук в базі даних <br> введіть частину ПІБ (не менше 4 символів) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="secretaryEdtSearch" id="secretaryEdtSearch" onKeyUp="quickSearch('secretaryEdtSearch','secretaryEdtSearchResult', 3, 'src/responses/personSearch.php');" /> 
                
                  <form name="add_secretaryEdt" method="post" action="src/dataManipulation.php">
           			<input type="hidden" name="tab" value="edsBoardContent">                     
         		    <input type="hidden" name="IDedsBoard" value="<?php echo $IDedsBoard; ?>">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="secretary">                    
                   <div id="secretaryEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?> 

           <tr>
              <td class="title_colomn">Технічний секретар
              </td>
              <td>                         
			  <?php if($techsecretary!="") echo $techsecretary; 
			  else echo "<em>немає даних</em>";
			  ?>
              </td>
           </tr> 
           <?php 
		      if($techsecretary=="")  
			  {
		   ?>	  
           <tr>
              <td bgcolor="#FFFF99">  Пошук в базі даних <br> введіть частину ПІБ (не менше 4 символів) 
              </td>
              <td bgcolor="#CCCCCC"> 
              <input type="text"  size="30" name="techsecretaryEdtSearch" id="techsecretaryEdtSearch" onKeyUp="quickSearch('techsecretaryEdtSearch','techsecretaryEdtSearchResult', 3, 'src/responses/personSearch.php');" /> 
                
                  <form name="add_techsecretaryEdt" method="post" action="src/dataManipulation.php">
           			<input type="hidden" name="tab" value="edsBoardContent">                     
         		    <input type="hidden" name="IDedsBoard" value="<?php echo $IDedsBoard; ?>">                      
		            <input type="hidden" name="action" value="INSERT"> 
                    <input type="hidden" name="position" value="techsecretary">                    
                   <div id="techsecretaryEdtSearchResult">
                   </div>                                            
                   </form>               
              </td>              
           </tr>               
              
			  <?
			  }
			  ?> 


          </table>
          
<?
} else
{ 
?> 

<p>  немає редакційної колегії 
<!--
   <form name="newEdsBoard" method="post" action="src/dataManipulation.php">
   <input type="hidden" name="tab" value="edsBoardContent">
		            <input type="hidden" name="key_field" value="ID">
         		    <input type="hidden" name="key_value" value="<?php echo $IDedsBoard; ?>">                      
		            <input type="hidden" name="action" value="UPDATE"> 
                    <input type="hidden" name="position" value="2">                    
                   <div id="chiefEdtSearchResult">
                   </div> 
	          <div id="add_chiefEdt_submit"><a href="javascript:document.add_chiefEdt.submit();" onMouseOver="window.status='';return true;">Створити нову редакційну колегію</a></div>                                      
                   </form>    
                   
                    -->
   </p>
 
<?
}
?>             
<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Including Editorial Board Tab
[end]
---------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------> 