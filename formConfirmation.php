<?php
session_start();

require_once("./classes/Template.php");
$page = new Template("Confirmation Page");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

if (isset($_POST['num']) && isset($_POST['email'])) 
{
	$_SESSION['num'] = $_POST['num'];
	$_SESSION['email'] = $_POST['email'];
}

if (strlen($_SESSION['num']) == 16)//16 chars for cc and valid email
{
$lastFour = substr($_SESSION['num'], -4);
$printNum = 'xxxxxxxxxxxx' . $lastFour;

print ' <form action="formPlaceOrder.php" method="POST">
			Email: ' . $_SESSION['email'] . '<br/>
			CC Number: ' . $printNum . '<br/>
			
			<input type="submit" name="Place Order">
			
	    </form>';
		
}
else {
print '<p> enter valid stuff pls</p>';
		
}

print $page->getBottomSection();


?>