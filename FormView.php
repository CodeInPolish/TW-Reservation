<HTML5>

<HEAD>
<title>ECAM AIRLINES</title>
</HEAD> 

<BODY>
	<form action=/TW-Reservation/router.php?page=Test method="POST">
		<div>
			<label for="Text to echo">Text :</label>
			<input type="text" id="params" />
		</div>
		
		<div class="button">
			<button type="submit">Send</button>
		</div>
	</form>
	
	
	<?php
	var_dump($_POST);
	?>
</BODY>

</HTML5>