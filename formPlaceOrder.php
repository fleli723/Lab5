<?php
session_start();

require_once("./classes/Template.php");
$page = new Template("Order Page");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();



print ' <form action="formPlaceOrder.php" method="POST">
			Email: ' . $_SESSION['email'] . '<br/>
			CC Number: ' . $_SESSION['num'] . '<br/>

			
	    </form>';

//$_SESSION['num'] = $creditNum;\
//$creditNum = $_SESSION['num'];
//print $creditNum;

print $page->getBottomSection();


?>