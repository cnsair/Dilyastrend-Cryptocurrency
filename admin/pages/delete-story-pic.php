<?php 

require_once("../../appfunctions/appfunctions.php");


if (!isset($_GET["galid"])) {
	header("Location: dashboard");
}
else
{
    $galid = $_GET["galid"];
    $albid = $_GET["aid"];

    $sql = "DELETE FROM message_picture WHERE ID = '".$_GET["galid"]."' "; 
    $query = $connect->prepare($sql); 
    $query->execute();

    header("Location: dashboard?dil=story-album&aid=$albid");  
}



?>