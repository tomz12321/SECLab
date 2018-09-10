<?php
include('des.php');
?>
<html>
<body>
<?php
       	
       	//Receive user input from client side
       	$message = $_POST['message'];
       	//set up a key by yourself
       	$key = $_POST['DES_Encryption_Key'];
       	
              $pre_key = "this is the key";
              //Tom
              //
              
              if ($pre_key == $key)
              {
                     $encrypted_message = php_des_encryption($key, $message);

              	//decrypt the received message using the key and PHP des decrytion API
              	$recovered_message = php_des_decryption($key, $encrypted_message);
              	
              	echo "Message: " . $message . "<br/><br/>";
              	echo "Received encrypted Message: " . $encrypted_message . "<br/><br/>";
              	echo "Decryption key: " . $key . "<br/><br/>";
              	echo "Recovered plaintext message: " . $recovered_message . "<br/><br/>";
              	
              	//access to database/database.txt
              	$file = fopen("../database/database.txt","a");
              	//insert this user into the users.txt file
              	fwrite($file,$recovered_message."\n");
              	//close the "$file"
              	fclose($file);
              	echo "The recovered message has been added to <a href='../database/database.txt'>Database.txt</a>";
              }else
              {
                     echo "The key are not match!";
              }
?>
</body>
</html>
