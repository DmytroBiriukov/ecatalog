<?php 
  header('Content-Type: text/plain; charset=windows-1251');
?>
<div id="catalog_search">    
<form id="sbform" name="sbform" action="javascript: updateTag('searchresult','/ecatalog/is/src/responses/updateSearchTag.php','within=yes&ID=<? echo $_GET['ID'];?>&author='+document.sbform.st1.value+'&title='+document.sbform.st2.value+'&abstract='+document.sbform.st3.value+'&lc='+document.sbform.lc_0.checked); " method="post">
            <table>
              <tr>
                <th>�� ������� </th>
                <td><input id="st1" name="author" type="text">
                </td>
              </tr>
              <tr>
                <th>�� ������ </th>
                <td><input id="st2" name="title" type="text">                    
                </td>
              </tr>
              <tr>
                <th>�� ������� � ��������</th>
                <td><input id="st3" name="abstract" type="text">
                </td>
              </tr>
              <tr>
                <th>������ ��'����</th>
                <td>
                  <label>
                    <input type="radio" name="lc" value="AND" id="lc_0">
                    ������ "�"</label>
                  
                  <label>
                    <input type="radio" name="lc" value="OR" id="lc_1" checked>
                    ������ "���"</label>
                </td>
              </tr>              
              <tr>
                <td colspan="2" align="right"> 
                            <div class="submitButton">&nbsp;
                            <a class="ub_dark" href="javascript:document.sbform.submit();" onMouseOver="window.status='';return true;">������ ���������</a> 
            <a class="ub_light" href="javascript:document.sbform.reset();">������ ���������</a><br>&nbsp; 
            </div>                     
                </td>
              </tr>
              
              </table>
                   <input type="hidden" name="within" value="yes" />
</form>					                     
</div> 
<div id="searchresult">
</div>   