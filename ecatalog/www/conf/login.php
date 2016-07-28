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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Конференції :: Панель адміністратора</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/conf.css" type="text/css" media="screen,projection" />
<link type="image/x-icon" rel="shortcut icon" href="img/conf.ico">
</head>
 
<body>


<div id="wrapper1">
			<div id="wrapper2">			
					<div id="header">
					<h1><a href="#"></a> </h1>

					</div>				
					<div id="container">	<p class="description">Вхід в систему </p>								
<div id="sidebar">					
											<h2>Електронний каталог конференцій</h2>											
                                            <p class="news"> 					       Метою даного проекту є автоматизація діяльності університетських конференцій, генерація веб-сторінок, регістрація учасників конференцій через спільний веб-сервіс, накопичення і обробка інформації про склад і  активність  учасників конференцій. </p>
<!--											<h2>Корисні посилання</h2>											
											<ul>
													<li><a href="http://ecatalog.univ.kiev.ua/">Електронний каталог періодичних видань</a></li>													
													<li><a href="mailto:evisnyk@univ.kiev.ua">написати розробнику</a></li>
											</ul>-->
					</div>
					<div id="content">

<!--
---------------------------------------------------------------------------------------------------------------------------------->              
<p>Для входу в закриту частину інформаційної системи Вам необхідно ввести login та пароль. </p>
<p>Якщо пароль був втрачений або розголошений, повідомте адміністратору.</p>

  <form name="login_form1" id="login_form1" action="edt.php" method=post>
  <table width="450" >
                      <tr>
                        <th> ім'я користувача: &nbsp; </th>
                        <td>
					      <input type="text" maxlength=50 size=8 name="ulgn">             
                        </td>
                      </tr>
                      <tr>
                        <th>пароль:&nbsp;</th>
                        <td>
                          <input type="password" maxlength=50 size=8 name="upwd"> 
                        </td>
                      </tr> 
                      <tr>
                         <td colspan="2" style="text-align:right">
                          <input type="submit" class="ub_dark" value="Увійти"/>                         
                         </td>
                      </tr>                 
          </table>
          </form>
					
					
					</div>
	
			  </div>			
	</div>
	<div id="footer">
      <p>&copy;2009&ndash;<script type=text/javascript>document.write((new Date()).getFullYear());</script>
         <a href="#top"> Київський національний університет імені Тараса Шевченка </a>
         &nbsp;|&nbsp;<a href="mailto:birjukov@unicyb.kiev.ua"><img src="img/dev.png" title="розробник" border=0/></a>		 
	  </p>		
	</div>
	
	</div>
</body>
</html>
