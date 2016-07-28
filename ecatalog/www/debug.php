<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
<meta content="Вісник Київського університету, наукові статті, наукові видання, автореферат дисертація, реферат, завантажити" name=Keywords>
<meta content="Електронний каталог періодичних видань Київського університету" name=Description>
<title>Електронний каталог періодичних видань Київського університету</title>
<link type="text/css" rel="STYLESHEET" href="http://ecatalog.univ.kiev.ua/css/new.css" >
<link type="image/x-icon" rel="shortcut icon" href="http://ecatalog.univ.kiev.ua/css/img/logo3.ico">
<script type="text/javascript" src="http://ecatalog.univ.kiev.ua/src/script.js"></script>
</head>
<body>
<div id="header"></div>
<div id="subheader">
<div id="indexlinkline">&gt;<h1>Київський національний університет імені Тараса Шевченка</h1> \ <a href="http://library.univ.kiev.ua/">Наукова бібліотека ім. М.Максимовича</a>
	</div>
</div>
<div id="catalog_cover">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td valign="top">
  <div class="catalog_menu" id="catalog_left">
      <h3>Структура каталогу</h3>   	  
      <ul id="leftnav">
<li><a href="javascript: updateTag( 'catalog_body', 'catalog/title.php', '');" style="text-decoration:underline;">
      &gt;&nbsp;за назвою видання</a> 
</li>	  
<li>
<a href="javascript: updateTag('catalog_body', 'catalog/subject.php', '');" style="text-decoration:underline;">
      &gt;&nbsp;за напрямком досліджень</a>
</li>

	   <li><a>Соціогуманітарні науки</a>
	  	 <ul>
<?php 
//  header('Content-Type: text/html; charset=utf-8');
  include("is/src/evisnyk.php");

		 ShownJournalCollectionList('h', 1);
?>
		 </ul>			
	   </li>
	   <li><a>Природничі науки</a>
         <ul>
<?php
		 ShownJournalCollectionList('n', 1);
?>            
         </ul>		
	   </li>
      </ul>
	  <br><br><br>	  <br><br><br>	  <br><br><br>
<h3 class="no_border"><a href="javascript: updateTag('catalog_body', 'catalog/search.php', '');">Пошук</a></h3>
<h3 class="no_border"><a href="javascript: updateTag('catalog_body', 'catalog/books.php', '');">Монографії</a></h3>
<h3 class="no_border"><a href="javascript: updateTag('catalog_body', 'catalog/confs.php', '');">Конференції</a></h3>


  </div>
  </td>
  <td valign="top" >
  
  <div id="catalog_body">
   <h2>Шановні відвідувачі!</h2>
   <p> Інформаційна система "Електронний каталог періодичних видань Університету" створена з метою надання науковому співтовариству зручних сучасних засобів пошуку та доступу до електронних версій наукових журналів та збірників, які засновані Київським національним університетом імені Тараса Шевченка. 
   </p> 
   <p> <strong>Для перегляду номерів наукового видання</strong>, оберіть видання в меню "Структура каталогу", або зі списків видань "за напрямком досліджень" та "за назвою видання".
   </p>
   <p> На сьогодні база даних містить інформацію про більше ніж 5500 статей з різних галузей наук і поступово поповнюється. Також через веб-сторінки видань можна отримати номери видань в електронному виді.    
   </p>   
   <p> Наступна діаграма характеризує розподіл статей по галузям наук.    
   </p>    
   <img src="img/paperBySciField.png" width="610" height="327"/>  
   <p> Пошук по базі даних дозволяє отримати інформацію про статті, сформувати бібліографічне посилання (згідно ДСТУ ГОСТ 7.1:2006 або ГОСТ 7.1—84).
   </p> 
   <div id="catalog_body_part">
   </div>    
  </div>

  
  </td>
  <td valign="top">

  <div class="catalog_menu" id="catalog_right">
<!--
  <h3>Національні установи</h3>
  <ul><li><a href="http://www.mon.gov.ua" target="_blank">Міністерство освіти і науки України</a></li>
	  <li><a href="http://www.nas.gov.ua" target="_blank">Національна академія наук України</a></li>
	  <li><a href="http://nbuv.gov.ua" target="_blank">Національна бібліотека України ім. В.І.Вернадського</a></li>
	  <li><a href="http://vak.org.ua" target="_blank">Вища Атестаційна комісія України </a></li>
  </ul>
  <h3><a href="http://www.univ.kiev.ua/" target="_blank">Київський національний університет імені Тараса Шевченка</a></h3>
  <ul><li><a href="http://science.univ.kiev.ua/" target="_blank">Науково-дослідна частина</a></li>
	  <li><a href="http://library.univ.kiev.ua/ukr/title4.php3" target="_blank">Наукова бібліотека ім. М.Максимовича</a></li>
	  <li><a href="http://vpc.univ.kiev.ua/" target="_blank" >Видавничо-поліграфічний центр</a></li>
	  <li><a href="http://scicon.univ.kiev.ua/index.php" target="_blank">Науково-консультаційний центр</a></li>
	  <li><a href="http://icc.univ.kiev.ua/" target="_blank">Інформаційно-обчислювальний центр</a></li>
  </ul>
-->
  <h3>Міжнародні системи електронних публікацій</h3>
  <ul><li><a href="http://www.springerlink.com" target="_blank">Springer-Verlag GmbH</a></li>
	  <li><a href="http://www.sciencedirect.com" target="_blank">Elsevier B.V.</a></li>
	  <li><a href="http://www.blackwell-synergy.com" target="_blank">Wiley-Blackwell</a></li>
	  <li><a href="http://www.maikonline.com" target="_blank">Издательство Наука</a></li>
	  <li><a href="http://www.palgrave-journals.com/"  target="_blank">Palgrave - Macmillan</a></li>
	  <li><a href="http://www.mitpressjournals.org/?cookieSet=1"  target="_blank">MIT Press</a></li>
	  <li><a href="http://ieeexplore.ieee.org"  target="_blank">IEEE</a></li>
	  <li><a href="http://iopscience.iop.org/"  target="_blank">IOP Publishing</a></li>
	  <li><a href="http://www.hindawi.com/"  target="_blank">Hindawi Publishing Corp.</a></li>
	  <li><a href="http://oare.oaresciences.org/"  target="_blank">OARE</a></li>
  </ul>
  <h3 class="no_border"><a href="javascript: updateTag('catalog_body', 'catalog/trial.php', '');">Вільний доступ до повнотекстових ресурсів</a></h3>
  </div>       


  </td>   
</tr>
</table>





</div>
  </td>   
</tr>
</table>
	<div id="footer">
      &copy; 2008 - <SCRIPT language=JavaScript type=text/javascript>document.write((new Date()).getFullYear());</SCRIPT>
      <a href="http://www.univ.kiev.ua" target="_blank">Київський національний університет імені Тараса Шевченка</A>
| <A  href="mailto:evisnyk@univ.kiev.ua"><img title="розробник" src="http://ecatalog.univ.kiev.ua/img/dev.png"/></A>
	</div>
</div>
</body>
</html>