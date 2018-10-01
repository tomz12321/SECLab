<?php
	session_start();
?>

<html>
<body>

<?php
	if(isset($_POST['username']) == FALSE){
		header('Location: ../client/login.html');
	}
	
	//Receive username from clint side
	$entered_username = $_POST['username'];
	//Receive password from client side
	$entered_password = $_POST['password'];

	if($entered_username!="" & $entered_password != ""){
		$login = 0;
		//read users.txt line by line
		foreach(file('../database/users.txt') as $line) {
			//split each line as two parts
			list($username, $password) = explode(",",$line);
			//verify if an exist user with the same username
			if($username == $entered_username){
				//verify the password
				if($password == $entered_password."\n"){
					$login = 1;
					$_SESSION['user'] = $entered_username;
					header('Location: ../client/content.php');
				}
			}
		}
		
		if($login==0){
			echo "Wrong Username or Password!";
		}else{
			echo "Login successful!";
		}
		
		echo "<br/>Go <a href='../client/login.html'>back</a> to login or <a href='../client/register.html'>register</a>, or check the <a href='../database/users.txt'>users.txt</a>";
	}else{
		echo "Username and Password cannot be empty!";
		echo "<br/>Go <a href='../client/login.html'>back</a> to login or <a href='../client/register.html'>register</a>, or check the <a href='../database/users.txt'>users.txt</a>";
	}
?>


</body>
</html>

