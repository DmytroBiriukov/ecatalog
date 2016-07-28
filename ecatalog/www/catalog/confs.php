<?php 
  header('Content-Type: text/plain; charset=windows-1251');  include("../is/src/evisnyk.php"); 



 $result1=ExecuteQuery("SELECT ch.*, c.ID AS IDconference, c.title AS ctitle, c.title_ru AS ctitle_ru, c.title_en AS ctitle_en, c.description, c.type, c.established, c.frequency, c.url, c.responsible, c.address, c.phone, c.fax, c.email, c.IDdep, dep.title AS depTitle FROM confhold ch, conference c, department dep WHERE ch.IDconf=c.ID AND c.IDdep=dep.ID ORDER BY dep.idx, c.ID, ch.year DESC");
 $dep=0;
 $c=0;
?>
<img src="img/departments.png" border="0" usemap="#Map" width="629" height="245"/>
<map name="Map" id="Map">
  <area shape="rect" coords="327,193,473,219" href="#CapLetter_subject_1" />
  <area shape="rect" coords="474,166,619,192" href="#CapLetter_subject_23" />
  <area shape="rect" coords="327,167,473,193" href="#CapLetter_subject_22" />
  <area shape="rect" coords="180,193,325,219" href="#CapLetter_subject_1" />
  <area shape="rect" coords="327,110,473,136" href="#CapLetter_subject_11" />
  <area shape="rect" coords="326,83,472,109" href="#CapLetter_subject_5" />
  <area shape="rect" coords="32,109,178,135" href="#CapLetter_subject_19" />
  <area shape="rect" coords="473,83,618,109" href="#CapLetter_subject_10" />
  <area shape="rect" coords="474,109,619,135" href="#CapLetter_subject_12" />
  <area shape="rect" coords="32,82,178,108" href="#CapLetter_subject_6" />
  <area shape="rect" coords="32,135,178,161" href="#CapLetter_subject_15"/>
  <area shape="rect" coords="180,110,325,136" href="#CapLetter_subject_13" />
  <area shape="rect" coords="327,136,473,162" href="#CapLetter_subject_14" />
  <area shape="rect" coords="180,83,325,109" href="#CapLetter_subject_9" />
  <area shape="rect" coords="32,165,178,191" href="#CapLetter_subject_7" />
  <area shape="rect" coords="180,136,325,162" href="#CapLetter_subject_17" />
  <area shape="rect" coords="475,136,620,162" href="#CapLetter_subject_16" />
  <area shape="rect" coords="180,167,325,193" href="#CapLetter_subject_8" />
<area shape="rect" coords="326,56,471,82" href="#CapLetter_subject_2" />
<area shape="rect" coords="472,56,619,82" href="#CapLetter_subject_4" />
</map>
<?
  while( $line = mysql_fetch_array($result1, MYSQL_ASSOC))
  { if( $dep !=  $line["IDdep"]) 
	{ $dep=$line["IDdep"]; 
	  print("<p class='cap_letter'><a name='CapLetter_subject_".$line["IDdep"]."'></a>".$line['depTitle']."<a href='#top' > <img src='is/img/up.gif' border=0/> </a>  </p>"); 	
	}
    if($c!=$line["IDconference"]) 
	{ $c=$line["IDconference"];
	  echo "<h2>".$line['ctitle']."</h2>";	
	  echo "<div class='paperInfo'><p>".$line['description']."</p>"; 
      echo "<p><span class='paperInfoItems'>Статус (міжнар./всеукр./студ.):</span> ".$line['type']."</p>"; 
	  echo "<p><span class='paperInfoItems'>Започаткована (рік):</span> ".$line['established']."</p>"; 
	  echo "<p><span class='paperInfoItems'>Періодичність:</span> ".$line['frequency']."</p>"; 
 	  echo "<p><span class='paperInfoItems'>Контактна особа:</span> ".$line['responsible']."</p>"; 
	  echo "<p><span class='paperInfoItems'>Адреса для листування:</span> ".$line['address'].", тел.: ".$line['phone'].", факс: ".$line['fax'].", <a href='mailto:".$line['email']."'>е-пошта</a>, <a href='".$line['url']."'>веб-сторінка</a></p></div>"; 			
	}
	
	echo "";    
?>	
	<div class="paperInfo">
    <table>

             <tr>
               <th> <img src="http://evisnyk.unicyb.kiev.ua/doc/img/conf_cv_<? echo $line['ID']; ?>.jpg" title="<? echo $line["subTitle"]; ?>" width="133" height="191">
               </td>
               <td> <h3><a href='http://evisnyk.unicyb.kiev.ua/conf/conf.php?ID=<? echo $line["ID"]; ?>'><? echo $line["subTitle"]; ?></a></h3>              
	                <p>Рік: <? echo $line['year'];?></p>
   	                <p>Місце проведення: <? echo $line['city'];?></p>
<?  
  $curyear=date("Y")."-01-01";
  if( $curyear < $line["regdate"] )
  {
 echo "<p>Дата початку регістрації учасників: ".$line["regdate"]."</p><p>Дата подачі доповідей: ".$line["submitdate"]."</p><p> Завершення подачі доповідей: ".$line["deadline"]."</p><p> Початок конференції: ".$line["startdate"]."</p><p> Завершення конференції: ".$line["findate"]."</p>"; 
  }
 
 
?>                    
               </td>
             </tr>
    </table>
    </div>
<?	
    
  
  }	
  mysql_free_result($result1);
?>