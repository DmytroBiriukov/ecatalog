<table border="0" cellpadding="0" cellspacing="0" width="100%" >
<tr>
<td width="185" valign="top">
  <div id="catalog_menu">
  <table width="180" border="0" cellpadding="0" cellspacing="0" align="left">
    <tr valign="top"> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>
    <tr>  
      <td width="8">
      </td>
      <td width="172" class="left_header">Структура каталогу
    </tr>      
    <tr> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16"></td>
    </tr>

    <tr>  
      <td width="8">
      </td>
      <td width="172" class="left_header" onmouseover="this.style.color='#6699FF';" onmouseout="this.style.color='#666666';" 
onClick="new Effect.Fade(document.all.catalog_subject); new Effect.Fade(document.all.new_books); new Effect.Appear(document.all.catalog_title);">за назвою видання<br> <br>      </td>        
    </tr>
    <tr>  
      <td width="8">
      </td>
      <td width="172" class="left_header" onmouseover="this.style.color='#6699FF';" onmouseout="this.style.color='#666666';" 
onClick="new Effect.Fade(document.all.catalog_title); new Effect.Fade(document.all.new_books); new Effect.Appear(document.all.catalog_subject);">за напрямком досліджень  
       
      <ul id="leftnav">
	   <li><a>Соціогуманітарні науки</a>
	  	 <ul>
<?php
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
      </td>
    </tr> 

    <tr valign="top"> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>    
    <tr>  
      <td width="8">
      </td>
      <td width="172"  >
      <a class="left_header" onmouseover="this.style.color='#6699FF';" onmouseout="this.style.color='#666666';" 
onClick="new Effect.Fade(document.all.catalog_title); new Effect.Fade(document.all.catalog_subject); new Effect.Appear(document.all.new_books);">Нові монографії</a>
      </td>
    </tr>   

<!--    
    <tr valign="top"> 
      <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16" align="top">
    </tr>    
    <tr>  
      <td width="8">
      </td>
      <td width="172"  >
      <a class="left_header" onmouseover="this.style.color='#6699FF';" onmouseout="this.style.color='#666666';" 
onClick="new Effect.Fade(document.all.catalog_title); new Effect.Fade(document.all.catalog_subject); new Effect.Appear(document.all.new_books);">Конференції</a>
      </td>
    </tr>   
--> 
   
    </table>
  </div>
  </td>
  <td valign="top" >
  <div id="catalog_body">
  <p> Інформаційна система "Електронний каталог періодичних видань" надає науковому співтовариству зручні сучасні засоби пошуку та доступу до електронних версій наукових журналів та збірників, що видаються Київським національним університетом імені Тараса Шевченка. 
  </p> 
<div id="catalog_title" style=" display: none;">
<!-- style=" display: none;"
-->
  <?php 
  include("is/tab/catalog_title.php");
  ?>
</div>

<div id="catalog_subject" >
  <?php 
  include("is/tab/catalog_subject.php");
  ?>
</div>

<style>
.chapter_title
{ font-size=16pt;
  color=red;
}
</style>

<div id="new_books" style=" display: none;">
  <?php 
  include("is/tab/books.php");
  ?>
</div>


  </div>
  </td>
  <td valign="top">
  <div id="catalog_right">
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
            <table>
<tr><td><a class="footer_links" href="http://www.mon.gov.ua" target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >Міністерство освіти і науки України</a></td></tr>
<tr><td><a class="footer_links" href="http://www.nas.gov.ua" target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >Національна академія наук України</a></td></tr>
<tr><td><a class="footer_links" href="http://nbuv.gov.ua" target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >Національна бібліотека України ім. В.І.Вернадського</a></td></tr>
<tr><td><a class="footer_links" href="http://vak.org.ua" target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >Вища Атестаційна комісія України </a></td></tr>
		   </table>
         </td>
       </tr>


        <tr> 
          <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16"></td>
        </tr>
        <tr>
          <td width="10"><img src="is/img/spacer.gif" alt="" width="10" height="20"></td>
          <td class="left_header">
          
<a class="footer_links" href="http://www.univ.kiev.ua" target="_blank" class="footer_links" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >
Київський національний університет імені Тараса Шевченка</a>
          
          </td>
        </tr>
        <tr> 
          <td colspan="2"><img src="is/img/left_nav_line.gif" alt="" width="180" height="16"></td>
        </tr>
		<tr valign="top"> 
          <td width="10"><img src="is/img/spacer.gif" alt="" width="10" height="20"></td>
          <td width="160">
           <table>
<tr><td><a href="http://science.univ.kiev.ua" target="_blank" class="footer_links" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >
Науково-дослідна частина</a></td></tr>
<tr><td><a href="http://library.univ.kiev.ua/ukr/title4.php3" target="_blank" class="footer_links" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >
Наукова бібліотека ім. М.Максимовича</a></td></tr>
<!--<tr><td><a href="http://vpc.univ.kiev.ua" target="_blank" class="footer_links" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >
Видавничо-поліграфічний центр</a> </td></tr>-->
		   </table>          
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
			<table>
<tr><td><a class="footer_links"href="http://www.springerlink.com
" target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';">Springer-Verlag GmbH</a></td></tr>
<tr><td><a class="footer_links" href="http://www.sciencedirect.com" target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >Elsevier B.V.</a></td></tr>
<tr><td><a class="footer_links" href="http://www.blackwell-synergy.com" target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >Wiley-Blackwell</a></td></tr>
<tr><td><a class="footer_links" href="http://www.maikonline.com" target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >Издательство Наука</a></td></tr>
<tr><td><a class="footer_links" href="http://www.palgrave-journals.com/"  target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >Palgrave - Macmillan</a></td></tr>    
 
<tr><td><a class="footer_links" href="http://www.mitpressjournals.org/?cookieSet=1"  target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >MIT Press</a></td></tr>          
      
      
<tr><td><a class="footer_links" href="http://ieeexplore.ieee.org"  target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >IEEE</a></td></tr>
<tr><td><a class="footer_links" href="http://iopscience.iop.org/"  target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >IOP Publishing</a></td></tr>
<tr><td><a class="footer_links" href="http://www.hindawi.com/"  target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >Hindawi Publishing Corp.</a></td></tr>
<tr><td><a class="footer_links" href="http://oare.oaresciences.org/"  target="_blank" onMouseOver="this.style.color='#6699FF'; window.status='';"
      onMouseOut="this.style.color='#666666';" >OARE</a></td></tr>
			</table>         
          </td>
        </tr>


     
      </table>  
  </div>
  </td>   
</tr>
</table>