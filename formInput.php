<?php
session_start();

require_once("./classes/Template.php");
$page = new Template("Home Page");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

print ' <form name="formInput" action="formConfirmation.php" method="POST">

			Email: <input type="text" name="email"><br/>
			CC Number: <input type="text" name="num" id="num"><br/>
			
			<input type="submit" name="submit" value="submit">

		</form>';

print $page->getBottomSection();


?>