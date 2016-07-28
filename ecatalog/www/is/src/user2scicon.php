<?php
   require("db_functions.php");
   $userList=$HTTP_POST_VARS['userList'];
   $collectionList=$HTTP_POST_VARS['sciconList'];
   foreach($userList as $IDuser)
   { 
     foreach($collectionList as  $IDcollection)
     {  $fieldValues1=array("IDuser"=> $IDuser, "IDsc" => $IDcollection);
//	    print_r( $fieldValues1);
        sqlInsertQuery("user2scicon", $fieldValues1);
     }
   }

?>
<script language="javascript">
<!-- 
window.close();
-->
</script>
