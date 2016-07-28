<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Електронний каталог періодичних видань Київського університету</title>
<link href="css/style.css" type="text/css" rel="STYLESHEET">
<script type="text/javascript" src="is/src/lib/tab.js"></script>
<script type="text/javascript" src="is/src/lib/prototype.js" ></script>
<script type="text/javascript" src="is/src/lib/scriptaculous.js"></script>
<style type="text/css">
<!--
body {
	margin-left: 4px;
	margin-top: 0px;
	margin-right: 20px;
	margin-bottom: 0px;
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size:10px;
	background-color: #887D75;
}
-->
</style>
</head>

<body onLoad="myonLoad()">

<table width="982" border="0" cellpadding="0" cellspacing="0" bgcolor="#FEFEFE">
  <tr>
    <td><table width="982" height="64" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td><img src="is/img/top_01.jpg" height="64" width="492"></td>
           <td background="is/img/top_02.jpg" class="header_links">
               <img src="is/img/top_02.jpg" height="1" width="490">
               <a href="http://www.univ.kiev.ua" target="_blank">
               Київський національний університет ім.Тараса Шевченка</a>&nbsp;|&nbsp;<br>
               <a href="http://science.univ.kiev.ua" target="_blank">
               Наукова частина</a>&nbsp;|&nbsp;
               <a href="http://library.univ.kiev.ua/ukr/title4.php3" target="_blank">
               Наукова бібліотека ім. М.Максимовича</a>&nbsp;|&nbsp;<br>
               <a href="http://vpc.univ.kiev.ua" target="_blank">
               Видавничо-поліграфічний центр</a>&nbsp;|&nbsp;<br>
<!--               
               <a href="http://scicon.univ.kiev.ua" target="_blank">
               Науково-консультаційний центр</a>  
-->
              
           </td>
         </tr>
        </table>  
    </td>
  </tr>
<tr>
<td>


<table border="0" cellpadding="0" cellspacing="0" width="100%" background="is/img/bg.png">
<tr>
<td width="200" valign="top">
  <div id="login_menu">
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top"> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>
    <tr>  
      <td width="32" background="is/img/bg_left.gif"><img src="is/img/bg_left.gif" alt="" width="32" height="1"></td>
      <td width="148" class="left_header">Редагування контенту
    </tr>  
    
    <tr> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16"></td>
    </tr>

    </table>
  </div>
  </td>
  <td valign="top" style="color: #FFFFCC;">
  
  


  
  
  
  <div id="login_body" style="font-size:10; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFCC;">
  <center>
<p>Для входу в закриту частину інформаційної системи Вам необхідно ввести login та пароль. </p>
<p>Якщо пароль був втрачений або розголошений, повідомте адміністратору.</p>

<table>
<tr>
<?php
  include("is/src/evisnyk.php");
  $R=getenv("REMOTE_ADDR");
  $result=ExecuteQuery("SELECT * FROM users WHERE IP='".$R."'");
  if(mysql_num_rows($result)>0)
  {  
?>  
<td>

 <form name="login_form1" id="login_form1" action="is/usrlgn.php?STATE=1" method=post>
  <table cellspacing=5 cellpadding=0 border=0 width="450" >
                      <tr>
                        <td class="title_colomn" > ім'я користувача: &nbsp; </td>
                        <td>
<?php
  if(mysql_num_rows($result)==1) 
  { $editorpage=1;
    $line=mysql_fetch_array($result, MYSQL_ASSOC);
    $uName=$line['username'];
	$uId=$line['ID'];
	if($uName!="") echo $uName; else echo "<em>немає даних</em>"; 
?>
<input type="hidden" name="uID" value="<?php echo $uId;?>">
<?php	
  } else
  {  
?>
  <select name="uID" >
<?php 
  while($line=mysql_fetch_array($result, MYSQL_ASSOC))
  {  $uName=$line['username'];
     $uId=$line['ID'];
     echo "<option value=$uId > $uName </option>";  
  }  
?>
  
  </select>
<?  
  }
?>						                  
                        </td>
                      </tr>
                      <tr>
                        <td class="title_colomn" >пароль:&nbsp;</td>
                        <td>
                          <input type="password" maxlength=50 size=8 name="upwd"> 
                        <div id="login_submit"><a href="javascript:document.login_form1.submit();" onMouseOver="window.status='';return true;">Увійти</a></div>
                         </td>
                      </tr>
                      <tr>
                      <td class="title_colomn" > IP адреса:&nbsp; </td>
                      <td style="color:#FFFFCC; font-size:10px; font-family:Verdana, Arial, Helvetica, sans-serif">
					  <?php echo $R; ?>
                          <input type="hidden" name="uIP" value="<?php echo $R; ?>">                      
                      </td>
                      
                      </tr>                    
              </table>
          </form>

</td>
</tr>
<?php  
  }
  
  else
  {  
?> 
<tr>
<td>
 <form name="login_form" id="login_form" action="is/usrlgn.php?STATE=1" method=post>
  <table cellspacing=5 cellpadding=0 border=0 width="450" >
                      <tr>
                        <td class="title_colomn" > login: &nbsp; </td>
                        <td  class="cdata_colomn">
                        <input type="text" name="uIP" id="uIP" value="">                      
                        </td>
                      </tr>
                      <tr>
                        <td class="title_colomn" >пароль:&nbsp;</td>
                        <td  class="cdata_colomn">
                          <input type="password" maxlength=50 size=8 name="upwd"> 
                        <div id="login_submit"><a href="javascript:document.login_form.submit();" onMouseOver="window.status='';return true;">Увійти</a></div>
                         </td>
                      </tr>
  </table>
 </form>
</td>
<?php  
  }  
?> 
</tr>
</table> 
</center>
<!--<p> <strong><em>Увага!</em> Нові можливості: </strong><br>
<ul>
<li> внесення редакційної коллегії (сторінка редагування видання на закладці "Редакційна коллегія"); 
</li>
<li> внесення математичних формул, індексів, спеціальних символів та позначень в резюме статей, для цього необхідно на сторінці редагування видання (закладка "Технічні особливості") вказати формат внесення резюме -  ТеХ для внесення формул, формули в форматі ТеХ відокремлюються символом $</em>, наприклад, при введенні  $\int_{0}^\infty \frac{sin x}{x}dx=\frac{\pi}{2}$ на веб-сторінці буде відображатись 
<table bgcolor="#FFFF99"> <tr><td><img src='http://www.forkosh.dreamhost.com/mimetex.cgi?\int_{0}^\infty \frac{sin x}{x}dx=\frac{\pi}{2}'>.</td></tr></table>
</li>
</ul>
</p>-->

<? require('is/src/Browser.php');
$browser = new Browser();
if( $browser->getBrowser() != Browser::BROWSER_FIREFOX || (  $browser->getBrowser() != Browser::BROWSER_FIREFOX && $browser->getVersion() < 2 ) ) 
{
?>
	<p> Для коректної роботи системи використовуйте броузер <a style="border-bottom:none;" href="http://www.getfirefox.com" target="_blank">
		<img style="border:none;vertical-align:middle;" src="is/img/firefox-22.png" alt="get firefox" /></a>
<a target="_blank" href="http://www.getfirefox.com">Firefox</a> останньої версії.
    </p>
<?
}

?>

  </div>

  </td>
  <td valign="top">
  <div id="login_right">
		<table width="180" border="0" cellpadding="0" cellspacing="0" align="right">
        <tr> 
          <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16"></td>
        </tr>
     
     <tr>
          <td width="10"><img src="is/img/spacer.gif" alt="" width="10" height="20"></td>
          <td class="left_header">Національні установи</td>
        </tr>
        <tr> 
          <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16"></td>
        </tr>
		<tr valign="top"> 
          <td width="10"><img src="is/img/spacer.gif" alt="" width="10" height="20"></td>
          <td width="160">
      
     <a class="footer_links" href="http://www.mon.gov.ua" target="_blank">Міністерство освіти і науки України</a><br>
<a class="footer_links" href="http://www.nas.gov.ua" target="_blank">Національна академія наук України</a><br>
<a class="footer_links" href="http://nbuv.gov.ua" target="_blank">Національна бібліотека України ім. В.І.Вернадського</a><br>
      
      
    </td>

        </tr>        
        <tr> 
          <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16"></td>
        </tr>
        <tr>
          <td width="10"><img src="is/img/spacer.gif" alt="" width="10" height="20"></td>
          <td class="left_header">Міжнародні системи електронних публікацій</td>
        </tr>
        <tr> 
          <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16"></td>
        </tr>
		<tr valign="top"> 
          <td width="10"><img src="is/img/spacer.gif" alt="" width="10" height="20"></td>
          <td width="160">
      
      <a class="footer_links"href="http://www.springerlink.com
" target="_blank">Springer-Verlag GmbH</a><br>
      <a class="footer_links" href="http://www.sciencedirect.com" target="_blank">Elsevier B.V.</a><br>
      <a class="footer_links" href="http://www.blackwell-synergy.com" target="_blank">Wiley-Blackwell</a><br>  
      <a class="footer_links" href="http://www.maikonline.com" target="_blank">Издательство Наука</a><br>           
      <a class="footer_links" href="http://ieeexplore.ieee.org"  target="_blank">IEEE</a><br>
      <a class="footer_links" href="http://www.hindawi.com/"  target="_blank">Hindawi Publishing Corp.</a>
      
      
    </td>

        </tr>
     
      </table>  
  </div>
  </td>   
</tr>
</table>


    </td>
  </tr>
  <tr><td background="is/img/bg_bottom.gif"><img src="is/img/bg_bottom.gif" width="694" height="30" align="bottom"> </td>
  </tr>
  <tr>
    <td align="right" class="footer_links"> 
     Ваша IP адреса: <?php echo $R; ?> &nbsp;&nbsp;   
    </td> 
  </tr>
</table>
</body>
</html>
