<?php
if ($HTTP_GET_VARS["par"] == 1)
{
?>
<tr><td  class="title_row"> дата "до друку" (рік-місяць-день)</td></tr>
<tr><td> <input type="text" name="topressdate" value="<?php  echo "20".date('y')."-mm-dd";  ?>"> </td>
</tr>             
<?php
} 
?>