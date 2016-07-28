<table border="0" cellpadding="0" cellspacing="0" width="100%" >
<tr>
<td width="200" valign="top">
  <div id="alerts_menu">
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top"> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>
    <tr>  
      <td width="32">&nbsp;</td>
      <td width="148" class="left_header" onmouseover="this.style.color='#6699FF';" onmouseout="this.style.color='#666666';" onClick="new Effect.Fade(document.all.alerts_manage); new Effect.Appear(document.all.alerts_register);"> 
      <p>Замовити розсилку</p>              
    </tr>
    <tr valign="top"> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>    
    <tr>  
      <td width="32">&nbsp;</td>
      <td width="148" class="left_header" onmouseover="this.style.color='#6699FF';" onmouseout="this.style.color='#666666';" onClick="new Effect.Fade(document.all.alerts_register); new Effect.Appear(document.all.alerts_manage);">
      <p>Змінити розсилку</p>       
      </td>
    </tr>
    <tr valign="top"> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>    
    </table>
  </div>
  </td>
  <td valign="top" style="color: #FFFFCC;">
  <div id="alerts_body" style="font-size:10; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFCC;">
  <p>Розсилка повідомлень про нові надходження ...
  </p> 
  
  <div id="alerts_register"  style=" display: none;">
    <p>
			<form action="" id="alert_register_form" name="alert_register_form" method="post">
            <table>
              <tr>
                <td class="title_colomn">адреса e-пошти</td>
                <td><input id="footer_search_textbox1" name="email" type="text">
                </td>
              </tr>
              <tr>
                <td colspan="2" align="right">                     
					<div id="alert_register_submit"><a href="javascript:document.alert_register_form.submit();" onMouseOver="window.status='';return true;">Зареєструватись</a></div>
                </td>
              </tr>
              </table>
			</form>					  
    </p>            
  </div>
  
  <div id="alerts_manage" style=" display: none;">
  
      <p>
			<form action="" id="alert_manage_form" name="alert_manage_form" method="post">
            <table>
              <tr>
                <td class="title_colomn">адреса e-пошти</td>
                <td><input id="footer_search_textbox1" name="login" type="text">
                </td>
              </tr>
              <tr>
                <td class="title_colomn">пароль</td>
                <td><input id="footer_search_textbox2" name="passwd" type="password">                    
                </td>
              </tr>
              <tr>
                <td colspan="2" align="right">                     
					<div id="alert_manage_submit"><a href="javascript:document.alert_manage_form.submit();" onMouseOver="window.status='';return true;">Увійти</a></div>
                </td>
              </tr>
              </table>
			</form>					  
    </p>            
  
  </div>
    </div>
  </td>
  <td valign="top">
  <div id="alerts_right">
  </div>
  </td>   
</tr>
</table>