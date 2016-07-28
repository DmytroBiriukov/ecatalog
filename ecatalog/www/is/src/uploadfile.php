<?php
    $nfile_name=$HTTP_POST_VARS['n_file_name'];
    $nfile_path=$HTTP_POST_VARS['subdir'];
    $source=$_FILES['uploaded_file']['tmp_name'] ;
	
    $file_ext   = substr($_FILES['uploaded_file']['name'], strripos($_FILES['uploaded_file']['name'], '.'));
    $base_root=$_SERVER['DOCUMENT_ROOT']."/doc/".$nfile_path."/";
    $dest= $base_root.$nfile_name.$file_ext; 
    echo $source."<br>";
    echo $dest;

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

if ($_FILES['file']['error'] != UPLOAD_ERR_OK) echo  file_upload_error_message($_FILES['file']['error']); 


	if (is_uploaded_file($source))
	{
	
	
    if(move_uploaded_file($source, $dest)) 
    { 
?>     
		<p> 
           <a href="../../doc/<? echo $nfile_path."/".$nfile_name.$file_ext; ?>">Файл передано на сервер </a>
        </p>
<?
    }
	
	}

?>
