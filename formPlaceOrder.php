<?php
session_start();

require_once("./classes/Template.php");
$page = new Template("Order Page");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

//use isset on session first, then print error / what should be shown

if(isset($_SESSION['email']) && isset($_SESSION['num']))
{
	print ' <form action="formPlaceOrder.php" method="POST">
				Email: ' . $_SESSION['email'] . '<br/>
				CC Number: ' . $_SESSION['num'] . '<br/>
			</form>';
}else 
{
	print 'An error has occured, please submit your order again';
}




print $page->getBottomSection();


?>