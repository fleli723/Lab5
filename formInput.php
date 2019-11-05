<?php

session_start();

require_once("./classes/Template.php");
$page = new Template("Home Page");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

print '<form action="formConfirmation.php" method="POST">
Email: <input type="text" name="email"><br />
CC Number: <input type="text" name="num"><br />
<input type="submit" name="submit">
</form> ';

print $page->getBottomSection();


?>