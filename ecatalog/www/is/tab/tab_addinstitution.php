<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Including Add  Tab
[begin]
---------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------> 
           <form name="ins_institution" method="post" action="src/dataManipulation.php" target="_self">
           <input type="hidden" name="tab" value="institutions">
           <input type="hidden" name="key_field" value="ID">
           <input type="hidden" name="key_value" value="">                      
           <input type="hidden" name="action" value="INSERT">    
			   <table style="font-size:10px; background-color: #887D75; vertical-align:top;">  
               <tr><td  class="title_colomn">�����</td>
               <td><input type="text" name="title" size="35" value=""></td>
               </tr>
               <tr><td  class="title_colomn">���</td>
               <td>

              <label> <input type='radio' name="type" value="edu" checked>
              ������/�������-�������</label>
              <label> <input type='radio' name="type" value="gov">��������</label>
              <label> <input type='radio' name="type" value="com">����������</label>

               </td>
               </tr>               
               <tr>
        
                <td colspan="2" align="right">                     
					<div id="ins_institution_submit"><a href="javascript:document.ins_institution.submit();" onMouseOver="window.status='';return true;">������ ���</a></div>
                </td>
              </tr>                                          
               </table>     
               </form>    

<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Including Add Tab
[end]
---------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------> 
