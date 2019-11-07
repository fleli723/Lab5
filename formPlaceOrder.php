<?php
session_start();

require_once("./classes/Template.php");
$page = new Template("Order Page");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

if(isset($_SESSION['email']) && isset($_SESSION['num']))
{
	print '<h1>Thank you for your order.</h1>';
	
	print ' <form action="formPlaceOrder.php" method="POST">
				Email: ' . $_SESSION['email'] . '<br>
				CC Number: ' . $_SESSION['num'] . '<br>
			</form>';

}else 
{
	print 'An error has occured, please submit your order again';
}




print $page->getBottomSection();


?>