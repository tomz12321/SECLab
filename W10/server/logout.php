<?php
	session_start();
	
	unset($_SESSION['user']);
	
	header('Location: http://titan.csit.rmit.edu.au/~s3613252/Lab10/client/register.html');
?>