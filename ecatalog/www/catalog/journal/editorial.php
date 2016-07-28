<?php 
  header('Content-Type: text/plain; charset=windows-1251');
  $IDedsBoard=$_GET["ID"];
  include("../../is/src/evisnyk.php");
  if($IDedsBoard != '' && $IDedsBoard != 0)
  { $result3=ExecuteQuery("SELECT ebc.position AS edtPosition, p.name, p.scideg, p.scipos, ebc.ID FROM edsBoardContent ebc, personality p WHERE ebc.IDedsBoard=".$IDedsBoard." AND ebc.IDperson = p.ID ORDER BY ebc.ID");
    $result30=ExecuteQuery("SELECT address, ph1, ph2, fax FROM edsBoard WHERE ID=".$IDedsBoard." ");
    if($line30 = mysql_fetch_array($result30, MYSQL_ASSOC))
    { $address=$line30['address']; $ph1=$line30['ph1']; $ph2=$line30['ph2']; $fax=$line30['fax'];
    }

  $IDeditors=array();
  $IDchief_editor=0;
  $IDordinary_editor=array();
  $chief_editor="";
  $execute_editor="";
  $secretary="";
  $techsecretary="";
  $deputy="";
  //'head','deputy','exec','secretary','techsecretary'
  while($line = mysql_fetch_array($result3, MYSQL_ASSOC))
  { switch($line['edtPosition'])
    { case "head": $chief_editor=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDchief_editor=$line['ID']; break;
	  case "deputy": $deputy=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDdeputy_editor=$line['ID']; break;
	  case "exec": $execute_editor=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDexecute_editor=$line['ID']; break;
	  case "secretary": $secretary=$line['name']; $IDsecretary_editor=$line['ID']; break;
	  case "techsecretary": $techsecretary=$line['name']; $IDtechsecretary_editor=$line['ID']; break;
	  default : $IDeditors[]=$line['name'].", ".$line['scideg'].", ".$line['scipos']; $IDordinary_editor[]=$line['ID']; break;
    } 
  }
  mysql_free_result($result3);  
?>   
<h2>Pедакційна колегія</h2>  
<div class="paperInfo">
<p><span class="paperInfoItems">Головний редактор &#8212 </span> <?php if($chief_editor!="") echo $chief_editor; else echo "<em>немає даних</em>";  
			  ?></p>
<p><span class="paperInfoItems">Заступник головного редактора &#8212 </span>              
 			  <?php if($deputy!="") echo $deputy; else echo "<em>немає даних</em>"; 
			  ?></p>                          
<p><span class="paperInfoItems">Відповідальний редактор &#8212 </span><?php 
		      if($execute_editor!="") echo $execute_editor; else echo "<em>немає даних</em>"; 
    		  ?></p>
<p><span class="paperInfoItems">Члени редакційної колегії : </span>
   		  <?php 
			  $n=count($IDeditors);
			  if($n>0) 
			  { for($i=0; $i<$n; $i++)
			    { if($i) echo ", "; 
				  echo $IDeditors[$i]; 
				}
			  }	else echo "<em>немає даних</em>";   
			  ?>       
</p>
<p><span class="paperInfoItems">Вчений секретар &#8212 </span>                     
<?php if($secretary!="") echo $secretary; else echo "<em>немає даних</em>"; 
			  ?>  
                  </p>           
<p><span class="paperInfoItems">Технічний секретар &#8212 </span>                                            
			  <?php if($techsecretary!="") echo $techsecretary; else echo "<em>немає даних</em>"; 
			  ?>  
                  </p>            
<p><span class="paperInfoItems">Адреса редакційної колегії &#8212 </span>                                                          
			 <? echo $address; if($ph1!='') echo ". Тел.".$ph1; if($ph2!='') echo ", ".$ph2; if($fax1!='') echo ". Факс ".$fax; ?> 
		  </p>
</div>       
   
<?
} else
{ 
?> 
<div id="failure"> <h1>Не внесені дані про редакційну колегію</h1></div>
<?
}
?>             
