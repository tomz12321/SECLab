<html>
	<body>

	<?//php echo var_dump($_POST); ?>
	<?//php echo $_POST['inputText']; ?>
	
	<?php

	//open a file named "text.txt"
				//$file = fopen("test.txt","a"); //"a"=apppend
				//$anything = "\nhello world!";
				//write into the users.txt file
				//fwrite($file,$anything);
				//close the "$file"
				//fclose($file);

				$file = fopen("database.txt","a");
				//write into the users.txt file
				$anything = $_POST['inputText'];
				echo $anything;
				//write into the database.txt
				fwrite($file, $anything);
				//write "\n" into the database.txt
				fwrite($file, "\n");
				//close($file);
				fclose($file);

	?>

	</body>
</html>