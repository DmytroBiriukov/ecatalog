<?php
session_start();
// Unset all of the session variables.
$_SESSION = array();
// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}
// Finally, destroy the session.
session_destroy();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Електронний каталог періодичних видань Київського університету</title>


<link href="../css/style.css" type="text/css" rel="STYLESHEET">
<style type="text/css">
<!--
.style1 {color: #333333}
body {
	margin-top: 40px;
}
-->
</style>
</head>
<script language="javascript">
<!--

window.open('../login.htm');
window.close();
-->
</script>
<body>

 <form name="login_form" id="login_form" action="usrlgn.php?STATE=1" method=post>
  <table cellspacing=5 cellpadding=0 border=0 width="365" align="center" style="font-size:10; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFCC; background-image:url(../css/img/logon_bgd.jpg); background-repeat:no-repeat;">
  <tr height="50"><td colspan="3">&nbsp; 
                        </td>
    
  </tr>
                      <tr>
                        <td class="title_colomn" > логін: </td>
                        <td  class="cdata_colomn">
                        <input type="text" name="uIP" id="uIP" value="" maxlength=31 size=25>                      
                        </td>
                        <td width="180">
                        </td>
                      </tr>
                      <tr>
                        <td class="title_colomn" >пароль:</td>
                        <td  class="cdata_colomn">
                          <input type="password" maxlength=20 size=25 name="upwd"> 
                        
                         </td>
                                                 <td width="180">
                                                 <input type="submit" value="Увійти" />
                        </td>

                      </tr>
  <tr height="10"><td width="59"></td>
  <td >&nbsp; </td>
                        <td width="180">
                        </td>
  
  </tr>  
  <tr><td colspan="3" <span class="style1"><p>Якщо пароль був втрачений або розголошений, обов'язково про це повідомте!</p>
  <span class="style1"><p>
<? require('src/Browser.php');
$browser = new Browser();
if( $browser->getBrowser() != Browser::BROWSER_FIREFOX || (  $browser->getBrowser() != Browser::BROWSER_FIREFOX && $browser->getVersion() < 2 ) ) 
{
?>
	<p> Для коректної роботи системи використовуйте броузер <a style="border-bottom:none;" href="http://www.getfirefox.com" target="_blank">
		<img style="border:none;vertical-align:middle;" src="img/firefox-22.png" alt="get firefox" /></a>
<a target="_blank" href="http://www.getfirefox.com">Firefox</a> останньої версії.
    </p>
<?
}

?>
  </p>
  <p>Ваша IP адреса: <?php echo getenv("REMOTE_ADDR"); ?> &nbsp;&nbsp;  
  </p>
  </span>
  
  
  </td>
  </tr>                      
  </table>
 </form>
  
 <p> <strong><em>Увага!</em></strong><br>
 <em>При внесенні нових персоналій</em>, будь ласка, вказуйте посаду, використовуючи такі назви посад: <br>
 "завідувач", "професор", "доцент", "с.н.с.", "пров.н.с.", "м.н.с.", "асистент", "аспірант", "пров. інж.". 
 </p>
<p>
</p>
 
<!--<p> <strong><em>Увага!</em> Нові можливості: </strong><br>
<ul>
<li> внесення редакційної колегії (сторінка редагування видання на закладці "Редакційна колегія"); 
</li>
<li> внесення математичних формул, індексів, спеціальних символів та позначень в резюме статей, для цього необхідно на сторінці редагування видання (закладка "Технічні особливості") вказати формат внесення резюме -  ТеХ для внесення формул, формули в форматі ТеХ відокремлюються символом $</em>, наприклад, при введенні  $\int_{0}^\infty \frac{sin x}{x}dx=\frac{\pi}{2}$ на веб-сторінці буде відображатись 
<table bgcolor="#FFFF99"> <tr><td><img src='http://www.forkosh.dreamhost.com/mimetex.cgi?\int_{0}^\infty \frac{sin x}{x}dx=\frac{\pi}{2}'>.</td></tr></table>
</li>
</ul>
</p>
-->
</body>
</html>

