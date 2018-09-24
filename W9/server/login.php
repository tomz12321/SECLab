<?PHP
	include("rsa.php");
?>

<html>
<body>

<?php
	if(isset($_POST['username']) == FALSE){
		header('Location: ../client/login.html');
	}
	
	//Receive username from clint side
	$received_username = $_POST['username'];
	//Receive password from client side
	$received_password = $_POST['password'];

	if($received_username!="" & $received_password != ""){
		$find = 0;
		//read users.txt line by line
		foreach(file('../database/users.txt') as $line) {
			//split each line as two parts
			list($username, $hashed_password) = explode(",",$line);
			//verify if an exist user with the same username
			if($username == $received_username){
				$find = 1;
				echo "Find the user: ".$username."<br/><br/>";
				//verify the password		
				$privateKey = get_rsa_privatekey('private.key');
				$decrypted = rsa_decryption($received_password, $privateKey);
				
				echo "Decrypted received_password: ".$decrypted."<br/><br/>";
				// $decrypted should be 'hashed_password + & + timestamp
				$split_value = explode("&", $decrypted);
				// $split_value[0] should be hashed_password
				// $split_value[1] should be timestamp
				
				echo "Split decrypted value as 2 parts: ";
				echo "<br/>".$split_value[0];
				echo "<br/>".$split_value[1]."<br/><br/>";
				//get current timestamp on server-side
				$timestamp = time();
				echo "Get current timestamp: ".$timestamp."<br/><br/>";

				echo "if the timestamp on server side is not greater 150 seconds than the client submitted timestamp, <br/>";
				echo "we can compare the client-side submitted hashed_password and the Server-side stored hashed_password <br/>";
				echo "otherwise, the server should treat the login request as invalid.<br/><br/>";
					
				// campare the timestamp, to make sure the submitted information did not be copied and used later
				if($timestamp - (int)$split_value[1] <= 150 ){
					// compare the submitted hashed password and the server stored hashed password
					if($hashed_password == $split_value[0]."\n"){
						
						echo "login successful.";
						$login = 1;
						break;
					}else{
						echo "Wrong Password.";
					}
				}else{
					echo "<br/><br/>The difference between the client-side submitted timestamp and the current server-side timestamp is greater than 150 seconds. Invalid login request!<br/><br/>";
				}
				break;
			}
		}
		
		if($find==0){
			echo "<br/>Cannot find the user ->".$received_username."<- in the database<br/>";
		}
		
		echo "<br/>Go <a href='../client/login.html'>back</a> to login or <a href='../client/register.html'>register</a>, or check the <a href='../database/users.txt'>users.txt</a>";
	}else{
		echo "Username and Password cannot be empty!";
		echo "<br/>Go <a href='../client/login.html'>back</a> to login or <a href='../client/register.html'>register</a>, or check the <a href='../database/users.txt'>users.txt</a>";
	}
?>


</body>
</html>

