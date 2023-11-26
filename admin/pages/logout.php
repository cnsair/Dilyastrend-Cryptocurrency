<?php

require_once("../../appfunctions/appfunctions.php");

/*
========================================================
log to audit trail
========================================================
*/
// $ccrud = new Crud($connect);
// $ccrud->auditTrail('2', //logout
// 				 	$_SESSION["dfirstname"] . " " . $_SESSION["dsurname"] . " just logged out", 
// 				 	$_SERVER["REMOTE_ADDR"],
// 				 	date('Y-m-d'),
// 				 	date('H:i:s'), 
// 				 	$_SESSION['duid'] 
// 				  );


session_destroy();
header("Location: ../../signin");


 ?>