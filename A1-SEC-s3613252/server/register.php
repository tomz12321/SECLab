<html>
<body>

<?php
	
	
	$entered_username = $_POST['usr'];
	$entered_password = $_POST['pwd'];
	

	if($entered_username!="" & $entered_password != ""){
		$find = 0;
		
		foreach(file('../database/users.txt') as $line) {
			//split each line as two parts
			list($usr, $pwd) = explode(",",$line);
			//verify if an exist user with the same username
			if($usr == $entered_username){
				$find = 1;
				break;
			}
		}
		
		if($find == 1){
			echo "The user is exist!";
		}else{
			$file = fopen("../database/users.txt","a");
			fwrite($file,$entered_username.",".$entered_password."\n");
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

