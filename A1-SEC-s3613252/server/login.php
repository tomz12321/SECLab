<?php

	session_start();
	

	include("rsa.php");
?>

<html>
<body>

<?php

	$received_username = $_POST['usr'];
	$received_password = $_POST['pwd'];

	
	// if both of entered username and password are not empty
	if($received_username!="" & $received_password != ""){
		$loginflag = 0;
		
		foreach(file('../database/users.txt') as $line) {
			list($usr, $hashed_password) = explode(",",$line);
			if($usr == $received_username){
				$loginflag = 1;

				$privateKey = get_rsa_privatekey('private.key');
				$decrypted = rsa_decryption($received_password, $privateKey);

				$split_value = explode("&", $decrypted);

				$timestamp = time();

				if($timestamp - (int)$split_value[1] <= 150 ){

					if($hashed_password == $split_value[0]."\n"){
						
						echo "Login successful.";
						$_SESSION['usr'] = $usr;
						$login = 1;

						echo "<br/><br/>Now you can access to the <a href='../client/shopping_cart.php'>shopping cart page</a><br/>";
					}else{
						echo "Wrong Password.";
					}
				}else{
					echo "<br/><br/>The difference between the client-side submitted timestamp and the current server-side timestamp is greater than 150 seconds. Invalid login request!<br/><br/>";
				}
				break;
			}
		}
		
		if($loginflag==0){
			echo "<br/>Login fail, can not find the user name : ".$received_username."<br/>";
		}
		
		echo "<br/>Go <a href='../client/login.html'>back</a> to login or <a href='../client/register.html'>register</a>, or check the <a href='../database/users.txt'>users.txt</a>";
	}else{
		echo "Username and Password cannot be empty!";
		echo "<br/>Go <a href='../client/login.html'>back</a> to login or <a href='../client/register.html'>register</a>, or check the <a href='../database/users.txt'>users.txt</a>";
	}
?>

</body>
</html>

