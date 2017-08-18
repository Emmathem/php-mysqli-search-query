<?php
session_start();
require_once __DIR__ . '/../lib/Classes/UserLibrary.php';
$user = new UserLibrary();

if(!$user->is_logged_in())
{
	$user->redirect('login');
}

if($user->is_logged_in()!="")
{
	$user->logout();	
	$user->redirect('./');
}
?>