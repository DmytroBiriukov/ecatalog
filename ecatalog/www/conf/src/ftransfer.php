<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Електронний каталог конференцій Київського університету</title>

</head>


<body>
<?php  
    include("../../is/src/evisnyk.php");
    $ID_paper=$HTTP_POST_VARS['n_file_name'];
    $source=$_FILES['paper_file']['tmp_name'];


function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}


 
	if (is_uploaded_file($source))
	{
	
	
	$subdir=$HTTP_POST_VARS['subdir'];
    $file_ext   = substr($_FILES['paper_file']['name'], strripos($_FILES['paper_file']['name'], '.'));
//   $base_root="/var/ftp/www/data.virtualhosts/evisnyk.unicyb.kiev.ua/doc/"; 
    $base_root=$_SERVER['DOCUMENT_ROOT']."/doc/".$subdir."/";
    $dest= $base_root.$ID_paper.$file_ext; 
    if(move_uploaded_file($source, $dest)) 
    { 
     ?> <p> 
           <a href="../../doc/<? echo $subdir."/".$ID_paper.$file_ext; ?>">Файл передано на сервер </a>
        </p>
     <?	 
	 $fieldValues4=array("file_ext"=>$file_ext);
	 $keyValues4=array("ID"=>$ID_paper);
	 sqlUpdateQuery("paper",  $fieldValues4, $keyValues4);
/**/	 
    }else
	{
    	if ($_FILES['file']['error'] != UPLOAD_ERR_OK)    echo $error_message = file_upload_error_message($_FILES['file']['error']); 
	}
	
	} else echo "<p>Файл не був переданий на сервер</p>";

	
/*
$currentdir=getcwd();
$target_path = $currentdir . "/2nddir/" . basename($_FILES['uploadedfile']['name']);

$temploc=$_FILES['uploadedfile']['tmp_name'];

if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded<br><br>";
} else {
    echo "There was an error uploading the file, please try again!<br><br>";
}
*/

?>
</body>
</html>
