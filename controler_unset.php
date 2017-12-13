<?php
//Unsets all the session data used in this project and shows the indexView

unset($_SESSION['reservation']);
unset($_SESSION['usererror']);
unset($_SESSION['TravelerIndex']);
unset($_SESSION['maxAge']);

require "IndexView.php";

?>