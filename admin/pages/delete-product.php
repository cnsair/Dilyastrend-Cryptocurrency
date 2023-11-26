<?php 

require_once("../../appfunctions/appfunctions.php");


if (!isset($_GET["galid"])) {
	header("Location: dashboard");
}
else
{
    $galid = $_GET["galid"];

    $sql = "DELETE FROM product WHERE ID = '".$_GET["galid"]."' "; 
    $query = $connect->prepare($sql); 
    $query->execute();

    header("Location: dashboard?dil=my-product");
  
}



?>