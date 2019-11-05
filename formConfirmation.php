<?php
session_start();

require_once("./classes/Template.php");
$page = new Template("Confirmation Page");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

//split up the isset and for post num and post email 

if (isset($_POST['num']) && isset($_POST['email'])) 
{
	$_SESSION['num'] = $_POST['num'];

	

	$errors['email'] = "PHP - The email is required";
	if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
			$errors['email']= "PHP - Please enter a valid email address or CC number";
	}else{
			$_SESSION['email'] = $_POST['email'];
	}//endif
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
	print $errors['email'];	
}

print $page->getBottomSection();


?>