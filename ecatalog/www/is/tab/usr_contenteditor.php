<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Including Content Editor User Desktop
[begin]
---------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------->    
<tr>
  <td class="header-links">
       &nbsp; &gt; Стартова 
</td>
</tr>

<tr>
<td>
      <div id="navcontainer">
		<ul id="navlist">
			<li><a href="#" class="current">Наукові видання</a></li>
			<li><a href="#">Персоналії</a></li>            
			<li><a href="#">Власні дані редактора контенту</a></li>
   			<li><a href="#">(?) Як користуватися </a></li>            
		</ul>
	  </div>
</td>
</tr>


<tr>
  <td>



<div id="content">
<!-- TAB1 ---------------------------------->
<div class="opentab" id="tab1">          
<?php
include("tab/tab_colljourn.php");
?>
</div>
<!-- TAB2 ---------------------------------->
<div class="tab" id="tab2" width="750">
<?php include("tab/tab_personalities.php");
?>
</div>
<!-- TAB3 ---------------------------------->
<div class="tab" id="tab3" width="750">

<table width="400" border="0" style="font-size:10;">
<tr>
  <td class="title_colomn">ПІБ</td>
  <td width="350">
              <p id="username"><?php if($aUser!="") echo $aUser; else echo "немає даних";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('username', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $aID; ?> & keyfield=ID & field=username & tab=users ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>
           <tr>
              <td class="title_colomn">Робочий тел.</td>
              <td width="350">
              <p id="telephone"><?php if($aTelephone!="") echo $aTelephone; else echo "немає даних";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('telephone', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $aID; ?> & keyfield=ID & field=telephone & tab=users ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>

           <tr>
              <td class="title_colomn">Прямий номер</td>
              <td width="350">
              <p id="dirphone"><?php if($aDirphone!="") echo $aDirphone; else echo "немає даних";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('dirphone', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $aID; ?> & keyfield=ID & field=dirphone & tab=users ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>

            <tr>
              <td class="title_colomn">e-пошта </td>
              <td width="350">
              <p id="email"> <?php if($aEmail!="") echo $aEmail; else echo "немає даних";?> </p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('email', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $aID; ?> & keyfield=ID & field=email & tab=users ', {okText:"Редагувати", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "Відмінити"});
              </script>
              </td>
            </tr>         
            
</table> 

</div>

<!-- TAB4 ---------------------------------->
<div class="tab" id="tab4">        
<blockquote>
<p>
<em>Перед початком роботи !</em><br>
Для коректної роботи системи використовуйте нові версії веб-браузеру (програми для перегляду веб-сторінок), рекомендую: <a href="http://en-us.www.mozilla.com/en-US/firefox/all.html" target="_blank" class="footer_links_underlined"> FireFox </a> безкоштовний та швидкий броузер.<br> 
</p>
<p>
<em>На початку роботи з сайтом  </em> перевірте (внесіть):<br>
1) на закладці "Власні дані редактора контенту" всі необхідні контактні дані;<br>
2) на закладці "Наукові видання" виберіть відповідне видання для редагування і перейдіть на сторінку редагування видання<br>
а) на закладці "Загальна інформація та редагування номерів" (сторінка редагування видання) перевірте (внесіть):<br>
- назву, скорочену назву, ISSN, опис Вашого наукового видання,<br>
- додайте всі розділи, що були присутні у всіх випусках (якщо у виданні немає розділів - внесіть один "загальний" розділ без назви, просто натиснувши на "Внести новий розділ").<br>
б) на закладці "Редакційна коллегія" (сторінка редагування видання) внесіть дані про склад редакційної коллегії вибираючі голову, членів коллегії та секретаря з бази даних (якщо якісь персоналії відсутні в базі даних - їх треба внести з закладки "Персоналії" на стартовій сторінці)<br>
в) на закладці "Технічні особливості" (сторінка редагування видання) вкажіть формат внесення резюме: простий текст або ТеХ (для внесення математичних формул, індексів, тощо)<br> 
<strong>Увага! </strong><em>Формули в форматі ТеХ відокремлюються символом $</em>, наприклад, при введенні  $\int_{0}^\infty \frac{sin x}{x}dx=\frac{\pi}{2}$ на веб-сторінці буде відображатись <img src='http://www.forkosh.dreamhost.com/mimetex.cgi?\int_{0}^\infty \frac{sin x}{x}dx=\frac{\pi}{2}'>, або $H_{2}O$ - 
<img src='http://www.forkosh.dreamhost.com/mimetex.cgi?H_{2}O'>.  
</p>
<p>
<em>При внесенні даних по статтям</em> порядок внесення інформації такий:<br>
1) На закладці "Загальна інформація та редагування номерів" (права частина) внести новий номер (вказати рік, номер випуску, дату прийняття до друку), якщо цей номер досі не внесено; <br>
2) На закладці "Загальна інформація та редагування номерів" (права частина) перейти до редагування окремого номера (випуску); <br>
3) Вносити статті до розділів (автори прив’язуються з БД після їх пошуку - треба ввести не менше 4 символів, після чого програма запропанує перелік персоналій, в ПІБ яких міститься введена для пошуку підстрока).<br>
</p>
<p>
<em>При внесенні нових персоналій</em> порядок внесення інформації такий:<br>
- вказуйте посаду, використовуючі такі назви посад: "завідувач", "професор", "доцент", "с.н.с.", "пров.н.с.", "м.н.с.", "асистент", "аспірант", "пров. інж.". <br>
</p>

<p>
<em>Питання, пропозиції, зауваження і побажання</em> приймаються <br>
1)  <a href="mailto: evisnyk@univ.kiev.ua"  class="footer_links_underlined"> е-поштою </a> <br>
2) за телефоном 521 3371 (внутрішній: 6371) 
</p>
<p style="text-align:right">
<br>
Бірюков Дмитро Сергійович
</p>
</blockquote>
</div>
</div>
<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Including Content Editor User Desktop
[end]
---------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------> 
