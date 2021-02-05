<?php

$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$success = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '';

function get_query_string($keyword){
	return (isset($_GET[$keyword]) && $_GET[$keyword] != '') ? $_GET[$keyword] : '';
}





/* =====================================Functions===================================== */

/* Retrieve one record */
function uploadFile($uploadedFile){
	// Where the file is going to be placed
	$target_path = "../../media/";
	/* Add the original filename to our target path.
	Result is "uploads/filename.extension" */
	// $target_path = $target_path . basename( $uploadedFile['name']);
	$temp = explode(".", $uploadedFile["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);

	if(move_uploaded_file($uploadedFile['tmp_name'], $target_path . $newfilename)) {
			return $newfilename;
		}
		else{
			return 0;
		}
}



/* Retrieve one record */
function uploadMultipleFile($uploadedFile){

	$filenameList = array();

	$countfiles = count($uploadedFile['name']);

	if ($countfiles>0){
		for($i=0;$i<$countfiles;$i++){
			// File name
		   	$filename = $uploadedFile['name'][$i];
		   	// Get extension
	  		 $ext = explode(".", $filename);
			 	 $newfilename = round(microtime(true)*($i+1)) . '.' . end($ext);
			   if(move_uploaded_file($uploadedFile['tmp_name'][$i],'../../media/'.$newfilename)){
			   		$filenameList[] = $newfilename;
				}
				else{
			   		$filenameList['error'] = true;
				}
		}
			return $filenameList;
	}
	else{
			return false;
	}

}

?>
