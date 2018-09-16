<?php
include('rsa.php');
?>
<html>
<body>
<?php
       	
//Receive user input from clint side
$message = $_POST['message'];

// Get the private Key
$privateKey = get_rsa_privatekey('private.key');

// compute the decrypted value
$recovered_message = rsa_decryption($message, $privateKey);

echo "Received encrypted Message: " . $message . "<br/><br/>";


echo "Recovered plaintext message: " . $recovered_message . "<br/><br/>";
            
   	
//access to database/database.txt
$file = fopen("../database/database.txt","a");
//insert this user into the users.txt file
fwrite($file,$recovered_message."\n");
//close the "$file"
fclose($file);
echo "The recovered message has been added to <a href='../database/database.txt'>Database.txt</a>";
      
?>
</body>
</html>
