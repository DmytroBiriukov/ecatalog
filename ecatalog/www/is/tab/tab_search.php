<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="200" valign="top">
  <div id="search_menu">
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16"></td>
    </tr>
    <tr>  
      <td width="32">&nbsp;</td>
      <td width="148" class="left_header" onmouseover="this.style.color='#6699FF';" onmouseout="this.style.color='#666666';" onClick="new Effect.Fade(document.all.search_advanced); new Effect.Fade(document.all.searchresult); new Effect.Appear(document.all.search_basic);"> 
      <p>Базовий пошук</p>              
    </tr>
    <tr valign="top"> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>    
    <tr>  
      <td width="32">&nbsp;</td>
      <td width="148" class="left_header" onmouseover="this.style.color='#6699FF';" onmouseout="this.style.color='#666666';" onClick="new Effect.Fade(document.all.search_basic); new Effect.Fade(document.all.searchresult); new Effect.Appear(document.all.search_advanced);">
      <p>Розширений пошук</p>       
      </td>
    </tr>
    <tr valign="top"> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>    
    </table>
  </div>
  </td>
  <td valign="top" style="color: #FFFFCC;">
 
  <div id="search_basic">
       
<form id="sbform" name="sbform" action="javascript: updateTag('searchresult','http://evisnyk.unicyb.kiev.ua/is/src/responses/updateSearchTag.php','within=no&author='+document.sbform.st1.value+'&title='+document.sbform.st2.value+'&abstract='+document.sbform.st3.value+'&lc='+document.sbform.lc_0.checked); " method="post">
            <table>
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
                <td class="cdata_colomn">
                  <label>
                    <input type="radio" name="lc" value="AND" id="lc_0">
                    логічне "і"</label>
                  
                  <label>
                    <input type="radio" name="lc" value="OR" id="lc_1" checked>
                    логічне "або"</label>
                </td>
              </tr>              
              <tr>
                <td colspan="2" align="right"> 
                            <div class="submitButton">&nbsp;
                            <a class="ub_dark" href="javascript:document.sbform.submit();" onMouseOver="window.status='';return true;">Знайти публікації</a> 
            <a class="ub_light" href="javascript:document.sbform.reset();">Змінити параметри</a><br>&nbsp; 
            </div>                     
                </td>
              </tr>
              
              </table>
                   <input type="hidden" name="within" value="no" />
				</form>					      
    
               
  </div>
  
  <div id="search_advanced" style=" display: none;"> 
  </div>
  
  
  <div id="searchresult" style=" display: none;">
  </div>   
  

  </td>
  <td valign="top" width="180" >
  <div id="search_right">
  </div>
  </td>   
</tr>
</table>