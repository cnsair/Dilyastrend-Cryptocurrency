<?php 

require_once("../../appfunctions/appfunctions.php");


if (!isset($_GET["galid"])) {
	header("Location: dashboard");
}
else
{
    $galid = $_GET["galid"];

    $sql = "DELETE FROM worker_slide WHERE ID = '".$_GET["galid"]."' "; 
    $query = $connect->prepare($sql); 
    $query->execute();

    header("Location: dashboard?dil=worker-slide");
  
}



?>