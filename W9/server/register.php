<html>
<body>

<?php
	
	if(isset($_POST['username']) == FALSE){
		header('Location: ../client/register.html');
	}
	
	
	//Receive username from clint side
	$entered_username = $_POST['username'];
	//Receive password from client side
	$entered_password = $_POST['password'];
	

	
	if($entered_username!="" & $entered_password != ""){
		$register = 0;
		//read users.txt line by line
		foreach(file('../database/users.txt') as $line) {
			//split each line as two parts
			list($username, $password) = explode(",",$line);
			//verify if an exist user with the same username
			if($username == $entered_username){
				$register = 1;
				break;
			}
		}
		
		if($register == 1){
			echo "The user is exist!";
		}else{
			//open a file named "text.txt"
			$file = fopen("../database/users.txt","a");
			//insert this user into the users.txt file
			fwrite($file,$entered_username.",".$entered_password."\n");
			//close the "$file"
			fclose($file);
			echo "The user has been added to the database/users.txt";
		}
		
		echo "<br/>Go <a href='../client/register.html'>back</a> to register or <a href='../client/login.html'>login</a>, or check the <a href='../database/users.txt'>users.txt</a>";
	}else{
		echo "Username and Password cannot be empty!";
		echo "<br/>Go <a href='../client/register.html'>back</a> to register or <a href='../client/login.html'>login</a>, or check the <a href='../database/users.txt'>users.txt</a>";
	}
?>

</body>
</html>

