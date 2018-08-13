<html>
	<body>

		We assume there is a table in the database, named text.txt
		<br/><br/>

		<?php
			//open a file named "text.txt"
			$file = fopen("test.txt","a"); //"a"=apppend
			$anything = "\nhello world!";
			//write into the users.txt file
			fwrite($file,$anything);
			//close the "$file"
			fclose($file);
		?>

		Done! Check the test.txt file.

		<!-- Think about fopen(), fwrite() and fclose() functions -->
	</body>
</html>