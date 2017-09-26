<?php

session_start();

if( !empty($_GET['page']) && is_file('controler_'.$_GET['page'].'.php') )
{
	//include controller
}

else
{
	include "controler_index.php";
}

?>