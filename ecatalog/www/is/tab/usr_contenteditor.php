<!-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
--- Including Content Editor User Desktop
[begin]
---------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------->    
<tr>
  <td class="header-links">
       &nbsp; &gt; �������� 
</td>
</tr>

<tr>
<td>
      <div id="navcontainer">
		<ul id="navlist">
			<li><a href="#" class="current">������ �������</a></li>
			<li><a href="#">�������볿</a></li>            
			<li><a href="#">����� ��� ��������� ��������</a></li>
   			<li><a href="#">(?) �� ������������� </a></li>            
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
  <td class="title_colomn">ϲ�</td>
  <td width="350">
              <p id="username"><?php if($aUser!="") echo $aUser; else echo "���� �����";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('username', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $aID; ?> & keyfield=ID & field=username & tab=users ', {okText:"����������", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "³������"});
              </script>
              </td>
            </tr>
           <tr>
              <td class="title_colomn">������� ���.</td>
              <td width="350">
              <p id="telephone"><?php if($aTelephone!="") echo $aTelephone; else echo "���� �����";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('telephone', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $aID; ?> & keyfield=ID & field=telephone & tab=users ', {okText:"����������", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "³������"});
              </script>
              </td>
            </tr>

           <tr>
              <td class="title_colomn">������ �����</td>
              <td width="350">
              <p id="dirphone"><?php if($aDirphone!="") echo $aDirphone; else echo "���� �����";?></p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('dirphone', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $aID; ?> & keyfield=ID & field=dirphone & tab=users ', {okText:"����������", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "³������"});
              </script>
              </td>
            </tr>

            <tr>
              <td class="title_colomn">e-����� </td>
              <td width="350">
              <p id="email"> <?php if($aEmail!="") echo $aEmail; else echo "���� �����";?> </p>
              <script type="text/javascript">
              new Ajax.InPlaceEditor('email', 'src/inDBPlaceEdit.php?keyvalue=<?php echo $aID; ?> & keyfield=ID & field=email & tab=users ', {okText:"����������", savingText: "<img src='img/loading.gif'>", cancelLink: true, cancelText: "³������"});
              </script>
              </td>
            </tr>         
            
</table> 

</div>

<!-- TAB4 ---------------------------------->
<div class="tab" id="tab4">        
<blockquote>
<p>
<em>����� �������� ������ !</em><br>
��� �������� ������ ������� �������������� ��� ���� ���-�������� (�������� ��� ��������� ���-�������), ����������: <a href="http://en-us.www.mozilla.com/en-US/firefox/all.html" target="_blank" class="footer_links_underlined"> FireFox </a> ������������ �� ������� �������.<br> 
</p>
<p>
<em>�� ������� ������ � ������  </em> �������� (������):<br>
1) �� �������� "����� ��� ��������� ��������" �� �������� �������� ���;<br>
2) �� �������� "������ �������" ������� �������� ������� ��� ����������� � �������� �� ������� ����������� �������<br>
�) �� �������� "�������� ���������� �� ����������� ������" (������� ����������� �������) �������� (������):<br>
- �����, ��������� �����, ISSN, ���� ������ ��������� �������,<br>
- ������� �� ������, �� ���� ������� � ��� �������� (���� � ������ ���� ������ - ������ ���� "���������" ����� ��� �����, ������ ���������� �� "������ ����� �����").<br>
�) �� �������� "���������� �������" (������� ����������� �������) ������ ��� ��� ����� ���������� �����㳿 ��������� ������, ����� �����㳿 �� ��������� � ���� ����� (���� ���� �������볿 ������ � ��� ����� - �� ����� ������ � �������� "�������볿" �� �������� �������)<br>
�) �� �������� "������ ����������" (������� ����������� �������) ������ ������ �������� ������: ������� ����� ��� ��� (��� �������� ������������ ������, �������, ����)<br> 
<strong>�����! </strong><em>������� � ������ ��� �������������� �������� $</em>, ���������, ��� �������  $\int_{0}^\infty \frac{sin x}{x}dx=\frac{\pi}{2}$ �� ���-������� ���� ������������ <img src='http://www.forkosh.dreamhost.com/mimetex.cgi?\int_{0}^\infty \frac{sin x}{x}dx=\frac{\pi}{2}'>, ��� $H_{2}O$ - 
<img src='http://www.forkosh.dreamhost.com/mimetex.cgi?H_{2}O'>.  
</p>
<p>
<em>��� ������� ����� �� �������</em> ������� �������� ���������� �����:<br>
1) �� �������� "�������� ���������� �� ����������� ������" (����� �������) ������ ����� ����� (������� ��, ����� �������, ���� ��������� �� �����), ���� ��� ����� ��� �� �������; <br>
2) �� �������� "�������� ���������� �� ����������� ������" (����� �������) ������� �� ����������� �������� ������ (�������); <br>
3) ������� ����� �� ������ (������ ������������ � �� ���� �� ������ - ����� ������ �� ����� 4 �������, ���� ���� �������� ��������� ������ ���������, � ϲ� ���� �������� ������� ��� ������ ��������).<br>
</p>
<p>
<em>��� ������� ����� ���������</em> ������� �������� ���������� �����:<br>
- �������� ������, �������������� ��� ����� �����: "��������", "��������", "������", "�.�.�.", "����.�.�.", "�.�.�.", "��������", "�������", "����. ���.". <br>
</p>

<p>
<em>�������, ����������, ���������� � ���������</em> ����������� <br>
1)  <a href="mailto: evisnyk@univ.kiev.ua"  class="footer_links_underlined"> �-������ </a> <br>
2) �� ��������� 521 3371 (��������: 6371) 
</p>
<p style="text-align:right">
<br>
������� ������ ���������
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
