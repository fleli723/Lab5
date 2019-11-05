<?php
session_start();


require_once("./classes/Template.php");
$page = new Template("Confirmation Page");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

print '<form action="go.php" method="POST">
Email: <input type="text" name="email"><br />
CC Number: <input type="text" name="num"><br />
<input type="submit" name="submit">
</form> ';

//$_SESSION['num'] = $creditNum;\
$creditNum = $_SESSION['num'];
print $creditNum;

print $page->getBottomSection();


?>