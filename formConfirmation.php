<?php
session_start();

require_once("./classes/Template.php");
$page = new Template("Confirmation Page");
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();


$validCC = false;
$validEmail = false;

if (isset($_POST['num']) && strlen($_POST['num']) == 16 && is_numeric($_POST['num']))
{
	$_SESSION['num'] = $_POST['num'];
	$validCC = true;
}
else
{
	$errors['num'] = "PHP - Please enter a valid credit card number";
}

if (isset($_POST['email']) && $_POST['email'] != '')
{
	if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	{
			$_SESSION['email'] = $_POST['email'];
			$validEmail = true;
	}
	else
	{
			$errors['email']= "PHP - Please enter a valid email address";
	}
}
else
{
		$errors['email'] = "PHP - The email is required";
}

if ($validCC == true && $validEmail == true)
{
$lastFour = substr($_SESSION['num'], -4);
$printNum = 'xxxxxxxxxxxx' . $lastFour;

print ' <form action="formPlaceOrder.php" method="POST">
			Email: ' . $_SESSION['email'] . '<br/>
			CC Number: ' . $printNum . '<br/>
			
			<input type="submit" name="Place Order">
			
	    </form>';	
}
else 
{
	if (isset($errors['email'])) 
	{
		print $errors['email'] . '<br>';
	}
	
	if (isset($errors['num']))
	{
		print $errors['num'];
	}
}

print $page->getBottomSection();


?>