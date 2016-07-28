<?php
   require("db_functions.php");

   $IDperson=$HTTP_POST_VARS['IDperson'];
   $IDperson_double=$HTTP_POST_VARS['IDperson_double'];   
   
   foreach($IDperson_double as $IDperson_double_item)
   { 
   
     if($IDperson != $IDperson_double_item)
	 {

     $keyValues['IDperson']=$IDperson_double_item;
     $fieldValues['IDperson']=$IDperson;
     
	 sqlUpdateQuery("paperAuthor", $fieldValues, $keyValues);
     sqlUpdateQuery("bookAuthor", $fieldValues, $keyValues); 
     sqlUpdateQuery("confreportAuthor", $fieldValues, $keyValues);
		 
	 $keyValues2Del['ID']=$IDperson_double_item;
	 sqlDeleteQuery('personality', $keyValues2Del); 
	 
	 $keyValues1['IDop1']=$IDperson_double_item;
     $fieldValues1['IDop1']=$IDperson;     
	 sqlUpdateQuery("defen", $fieldValues1, $keyValues1);
	 $keyValues2['IDop2']=$IDperson_double_item;
     $fieldValues2['IDop2']=$IDperson;     
	 sqlUpdateQuery("defen", $fieldValues1, $keyValues1);
	 $keyValues3['IDop3']=$IDperson_double_item;
     $fieldValues3['IDop3']=$IDperson;     
	 sqlUpdateQuery("defen", $fieldValues1, $keyValues1);	 
	 
	 
	 
	 }
	// echo "<br> Update TABLE $tab SET IDperson = $IDperson WHERE IDperson= $IDperson_double_item ";
   }
   
   /*
   
   $collectionList=$HTTP_POST_VARS['collectionList'];
   $journalList=$HTTP_POST_VARS["journalList"];
   
   
   foreach($userList as $IDuser)
   { 
     foreach($collectionList as  $IDcollection)
     {  $fieldValues1=array("IDuser"=> $IDuser, "IDcollection" => $IDcollection);
//	    print_r( $fieldValues1);
        sqlInsertQuery("user2collection", $fieldValues1);
     }
     foreach($journalList as  $IDjournal)
     {  $fieldValues2=array("IDuser"=> $IDuser, "IDjournal" => $IDjournal);
//	 	print_r( $fieldValues2);
        sqlInsertQuery("user2journal", $fieldValues2);
     }
   }
*/
?>
<script language="javascript">
<!-- history.go(-1);
close();

-->
</script> 
