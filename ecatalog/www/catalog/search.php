<?php 
  header('Content-Type: text/plain; charset=windows-1251');
?>
<div id="catalog_search">
<form id="sbform" name="sbform" enctype="application/x-www-form-urlencoded" action="javascript: updateTag('searchresult','/ecatalog/is/src/responses/updateSearchTag.php?within=no&author='+encodeURIComponent(document.sbform.st1.value)+'&title='+encodeURIComponent(document.sbform.st2.value)+'&abstract='+encodeURIComponent(document.sbform.st3.value)+'&lc='+document.sbform.lc_0.checked,''); "  method="get">

	<table>
    <tbody>
      <tr>
          <td class="title_colomn">за автором </td>
          <td><input id="st1" name="author" type="text">
          </td>
      </tr>
      <tr>
          <td class="title_colomn">за назвою </td>
          <td><input id="st2" name="title" type="text">                    
          </td>
      </tr>
      <tr>
          <td class="title_colomn">за словами в анотації</td>
          <td><input id="st3" name="abstract" type="text">
          </td>
      </tr>
      <tr>
                <td class="title_colomn">логічна зв'язка</td>
                <td class="tdata">
                  <label>
                    <input name="lc" value="AND" id="lc_0" type="radio">
                    логічне "і"</label>
                  
                  <label>
                    <input name="lc" value="OR" id="lc_1" checked="checked" type="radio">
                    логічне "або"</label>
                </td>
              </tr>              
              <tr>
                <td colspan="2" align="right"> 
                                                        <div class="submitButton">&nbsp;
            <a class="ub_dark" href="javascript:document.sbform.submit();" onMouseOver="window.status='';return true;">Знайти публікації</a> &nbsp; &nbsp; 
            <a class="ub_light" href="javascript:document.sbform.reset();">Змінити параметри</a><br>&nbsp; 
        		                       </div>
                </td>
      </tr>          
    </tbody>
    </table>
    <input name="within" value="no" type="hidden">
</form>					      
</div>
<div id="searchresult">
</div> 
