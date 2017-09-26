<HTML5>

<HEAD>
<title>ECAM AIRLINES</title>
</HEAD> 

<BODY>
<?php

	$action = htmlspecialchars($_GET['action']);
	$do = htmlspecialchars($_GET['do']);

	while($do > 0)
		{
			echo $action."<br>";
			$do -= 1;
		}
	
?>
</BODY>

</HTML5>