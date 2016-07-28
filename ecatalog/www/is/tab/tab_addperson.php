<? header('Content-Type: text/html; charset=windows-1251');
?>
<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Including Add Personality Tab
[begin]
---------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------> 
           <form name="ins_personality" method="post" action="src/dataManipulation.php" target="_self">
           <input type="hidden" name="tab" value="personality">
           <input type="hidden" name="insBy" value="<? echo $_SESSION['aID'];?>">           
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="">                      
           <input type="hidden" name="action" value="INSERT">    
			   <table style="font-size:10px; background-color: #887D75; vertical-align:top;">  
               <tr><td  class="title_colomn">ПІБ</td>
               <td><input type="text" name="name" size="35" value=""></td>
               </tr>
<tr><td  class="title_colomn">ПІБ (англійською мовою)</td>
               <td><input type="text" name="name_en" size="35" value=""></td>
               </tr>
<tr><td  class="title_colomn">ПІБ (російською мовою)</td>
               <td><input type="text" name="name_ru" size="35" value=""></td>
               </tr>                              
               <tr><td  class="title_colomn">Вчене звання</td>
               <td>
               <select name="scipos" size="1">
               <?php ListSciPos(); 
               ?>               
               </select>              
               </td>
               </tr>               
               <tr><td  class="title_colomn">Науковий ступінь</td>
               <td>
               <select name="scideg" size="1">
               <?php ListSciDeg(); 
               ?>               
               </select>                                           
               </tr>  
               <tr class="title_row"><td colspan="2">Місце роботи</td>
                        
               <tr>
           <td style="background-color:#FFFFCC;" colspan="2"> Викладач, співробітник, докторант або аспірант КНУ: &nbsp;<br>

           <label> <input type='radio' name='IDinst' id="IDinst" onclick="institution(0);" value="112"> так </label>
           <label> <input type='radio' name='IDinst' id="IDinst" onclick="institution(1);" value="0"> ні </label>
           <label> <input type='radio' name='IDinst' id="IDinst" onclick="institution(2);" value="0"> тимчасово не працює </label>
           </td>
           </tr>
           <tr><td colspan="2">
           <div id="institution_Result"></div>
           <div id="subdepTAG"></div>
           </td>    
           </tr>
               
        
                <td colspan="2" align="right">                     
					<div id="ins_personality_submit"><a href="javascript:document.ins_personality.submit();" onMouseOver="window.status='';return true;">Внести дані</a></div>
                </td>
              </tr>                                          
               </table>     
               </form>    

<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Including Add Personality Tab
[end]
---------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------> 
