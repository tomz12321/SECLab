<html>
<body>
 
<?php
            	
	//Receive input from clint side
	$usrname = $_POST['usr'];
	$password = $_POST['pwd'];
            	
    $login = 0;
    //read users.txt line by line
 	foreach(file('../database/users.txt') as $line) {
		list($usr,$pwd) = explode(",",$line);
    //verify if an exist user with the same username
    if($usr == $usrname){
    	//verify the password
    	if($pwd == $password."\n"){
			$login = 1;
			break;
                	}
            }
    }
            	
            	if($login==0){
                            	echo "Wrong Username or Password!";
            	}else{
                            	echo "Login successful!";
            	}
            	
            	echo "<br/>Go <a href='../client/login.html'>back</a> to register, login or check the users.txt";
 
?>
 
 
</body>
</html>
