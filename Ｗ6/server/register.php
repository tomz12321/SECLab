<html>
<body>

<?php
	
	//Receive input from clint side
	$usrname = $_POST['usr'];
	$password = $_POST['pwd'];
	
	//check if the input exist
	$exist = 0;

//read the file line by line

	foreach(file('../database/users.txt') as $line) {
		list($usr,$pwd) = explode(",",$line);
		//compare the content of the input and the line
		if($usr == $usrname){
			$exist = 1;
			break;
		}
	}
	
	if($exist == 1){
		echo "The input is exist! <br/><br/>Please enter another one via <a href='../client/register.html'>register.html</a>";
	}else{
		//open a file named "users.txt"
		$file = fopen("../database/users.txt","a");
		//insert this input (plus a newline) into the database.txt
		fwrite($file,$usrname.",".$password."\n");
		//close the "$file"
		fclose($file);
		echo "The input is added to the users.txt. <br/><br/>Please try to enter the same input again via <a href='../client/register.html'>register.html</a>";
	}
?>

</body>
</html>
