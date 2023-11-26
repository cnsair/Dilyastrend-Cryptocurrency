<?php 

require_once("../../appfunctions/appfunctions.php");


if (!isset($_GET["del"])) {
	header("Location: dashboard");
}
else
{
	$sql = "DELETE FROM product_title WHERE ID = '".$_GET["del"]."' ";
    $gg = $connect->prepare($sql);
    $gg->execute();
	header("Location: dashboard?dil=my-product");
}



?>