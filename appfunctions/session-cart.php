<?php 

/*
====================
START SESSION
====================
*/

	if(!isset($_SESSION))
	{
		session_start();
	}


/*
====================
DESTROY SESSION
====================
*/
	
	//destroy session [Empty Cart]
	//session_start() == "NULL" ? session_destroy() : "";

?>