<?php
session_start();
require_once '../config/database.php';
require_once '../config/Models.php';

$action = $_GET['action'];

switch ($action) {

	case 'sample-process' :
		sample_process();
		break;

	default :
}



function sample_process()
{

		$Id = $_GET["Id"];
		$value = $_GET["value"];
		$model = facility();
		$model->obj["isVerified"] = $value;
		$model->ceate();

		header('Location: ../');
}
