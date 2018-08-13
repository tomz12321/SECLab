<html>
	<body>

	<?php

	//open a file named "text.txt"
				//$file = fopen("test.txt","a"); //"a"=apppend
				//$anything = "\nhello world!";
				//write into the users.txt file
				//fwrite($file,$anything);
				//close the "$file"
				//fclose($file);

				$file = fopen("database.txt","a");
				$anything = "\ntest";
				//write into the database.txt
				fwrite($file, $anything);
				//close($file);
				fclose($file);

	?>
	
	</body>
</html>