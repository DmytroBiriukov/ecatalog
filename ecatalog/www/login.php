<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>���� > ����������� ������� ���������� ������ �����������</title>
<style type="text/css">
<!--
.style1 {color: #333333}
body {
	margin-top: 40px;
}
-->
</style>
</head>
<body>
<!--
  <center> 
<p> ������ �����������!</p>
<p> � ������ � �������� ���������� ������� ��������� �������� ������ ��� ����������� ����� �� ���������� ��������. </p>
<p> ������� ��������� �� ��������� ����������. </p>
<p> ������� ������ ��������� </p>
  </center>
-->
 <form name="login_form" id="login_form" action="is/usrlgn.php?STATE=1" method=post>
  <table cellspacing=5 cellpadding=0 border=0 width="365" align="center" style="font-size:10; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFCC; background-image:url(css/img/logon_bgd.jpg); background-repeat:no-repeat;">
  <tr height="50"><td colspan="3">&nbsp; 
                        </td>
    
  </tr>
                      <tr>
                        <td class="title_colomn" > ����: </td>
                        <td  class="cdata_colomn">
                        <input type="text" name="uIP" id="uIP" value="" maxlength=31 size=25>                      
                        </td>
                        <td width="180">
                        </td>
                      </tr>
                      <tr>
                        <td class="title_colomn" >������:</td>
                        <td  class="cdata_colomn">
                          <input type="password" maxlength=20 size=25 name="upwd"> 
                        
                         </td>
                                                 <td width="180">
                                                 <input type="submit" value="�����" />
                        </td>

                      </tr>
  <tr height="10"><td width="59"></td>
  <td >&nbsp; </td>
                        <td width="180">
                        </td>
  
  </tr>  
  <tr><td colspan="3" <span class="style1"><p>���� ������ ��� ��������� ��� ������������, ����'������ ��� �� ��������!</p>
  <span class="style1"><p>
<? require('is/src/Browser.php');
$browser = new Browser();
if( $browser->getBrowser() != Browser::BROWSER_FIREFOX || (  $browser->getBrowser() != Browser::BROWSER_FIREFOX && $browser->getVersion() < 2 ) ) 
{
?>
	<p> ��� �������� ������ ������� �������������� ������� <a style="border-bottom:none;" href="http://www.getfirefox.com" target="_blank">
		<img style="border:none;vertical-align:middle;" src="is/img/firefox-22.png" alt="get firefox" /></a>
<a target="_blank" href="http://www.getfirefox.com">Firefox</a> �������� ����.
    </p>
<?
}

?>
  </p>
  <p>���� IP ������: <?php echo getenv("REMOTE_ADDR"); ?> &nbsp;&nbsp;  
  </p>
  </span>
  
  
  </td>
  </tr>                      
  </table>
 </form>
  
 <p> <strong><em>�����!</em></strong><br>
 <em>��� ������� ����� ���������</em>, ���� �����, �������� ������, �������������� ��� ����� �����: <br>
 "��������", "��������", "������", "�.�.�.", "����.�.�.", "�.�.�.", "��������", "�������", "����. ���.". 
 </p>
<p>
</p>
 
<!--<p> <strong><em>�����!</em> ��� ���������: </strong><br>
<ul>
<li> �������� ���������� ����㳿 (������� ����������� ������� �� �������� "���������� ������"); 
</li>
<li> �������� ������������ ������, �������, ����������� ������� �� ��������� � ������ ������, ��� ����� ��������� �� ������� ����������� ������� (�������� "������ ����������") ������� ������ �������� ������ -  ��� ��� �������� ������, ������� � ������ ��� �������������� �������� $</em>, ���������, ��� �������  $\int_{0}^\infty \frac{sin x}{x}dx=\frac{\pi}{2}$ �� ���-������� ���� ������������ 
<table bgcolor="#FFFF99"> <tr><td><img src='http://www.forkosh.dreamhost.com/mimetex.cgi?\int_{0}^\infty \frac{sin x}{x}dx=\frac{\pi}{2}'>.</td></tr></table>
</li>
</ul>
</p>

-->
</body>
</html>
