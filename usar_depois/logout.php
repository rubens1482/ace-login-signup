<?php
	require_once('session.php');
	
	require_once('class.user.php');
	$user_logout = new USER();
	
	if($user_logout->is_loggedin()!="")
	{
		$user_logout->redirect('home.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->doLogout();
		$user_logout->redirect('index.php');
	}
	//=======================
	
	require_once('class.account.php');
	$account_logout = new ACCOUNT();
	
	if($account_logout->is_loggedin_c()!="")
	{
		$account_logout->redirect('home.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$account_logout->doLogout_c();
		$account_logout->redirect('index_c.php');
	}
?>