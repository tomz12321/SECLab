<?php

	session_start();	
	include("rsa.php");	
	include('des.php');
?>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 400px;
}

td, th {
    width:100px;
    text-align: center;
    padding: 8px;
}

th {
    background-color: black;
    color: white;
}
</style>
</head>
<body>
<?php

	$Server_RSA_PrivateKey = get_rsa_privatekey('private.key');
	$Decrypted_DES_key = rsa_decryption($_POST['DES_key'], $Server_RSA_PrivateKey);
	$Decrypted_credit_card_number = php_des_decryption($Decrypted_DES_key, $_POST['cardNumber']);
	$Decrypted_productAquantity = php_des_decryption($Decrypted_DES_key, $_POST['ProductAquantityE']);
	$Decrypted_productBquantity = php_des_decryption($Decrypted_DES_key, $_POST['ProductBquantityE']);
	$Decrypted_productCquantity = php_des_decryption($Decrypted_DES_key, $_POST['ProductCquantityE']);
	
	
	$order_information = "********************************************\nClient: ".$_SESSION['usr']."\n";
	$order_information = $order_information . "Ordered quantity information: \n";
	if($_POST["ProductAquantity"] > 0){
		$order_information = $order_information . $_POST["ProductA"] . ": " . $_POST["ProductAquantity"] . " ($".$_POST["ProductAprice"]." each)\n";
	}
	if($_POST["ProductBquantity"] > 0){
		$order_information = $order_information . $_POST["ProductB"] . ": " . $_POST["ProductBquantity"] . " ($".$_POST["ProductBprice"]." each)\n";
	}
	if($_POST["ProductCquantity"] > 0){
		$order_information = $order_information . $_POST["ProductC"] . ": " . $_POST["ProductCquantity"] . " ($".$_POST["ProductCprice"]." each)\n";
	}
	$order_information = $order_information . "Total price: " . $_POST["totalPrice"] . "\n";
	$order_information = $order_information . "Credit card number: " . $Decrypted_credit_card_number . "\n";
	
?>
<h1>Information of your order</h1>

<table>
  <tr>
    <th>Products</th>
    <th>Price</th>
	<th>Quantity</th>
	<th>Subtotal</th>
  </tr>
  <tr>
    <td><?php echo $_POST["ProductA"]; ?></td>
    <td><?php echo $_POST["ProductAprice"]; ?></td>
	<td><?php echo $_POST["ProductAquantity"]; ?></td>
	<td><?php echo $_POST["ProductAtotal"]; ?></td>
  </tr>
  <tr>
    <td><?php echo $_POST["ProductB"]; ?></td>
    <td><?php echo $_POST["ProductBprice"]; ?></td>
	<td><?php echo $_POST["ProductBquantity"]; ?></td>
	<td><?php echo $_POST["ProductBtotal"]; ?></td>
  </tr>
  <tr>
    <td><?php echo $_POST["ProductC"]; ?></td>
    <td><?php echo $_POST["ProductCprice"]; ?></td>
	<td><?php echo $_POST["ProductCquantity"]; ?></td>
	<td><?php echo $_POST["ProductCtotal"]; ?></td>
  </tr>
  <tr>
    <th></th>
    <th>Total</th>
	<th><?php echo $_POST["totalQuantity"]; ?></th>
	<th><?php echo $_POST["totalPrice"]; ?></th>
  </tr>
</table>


<?php 

	echo "<br/><br/>Received encrypted DES key: ".$_POST['DES_key'];

	echo "<br/><br/>Recovered DES key: ".$Decrypted_DES_key;
 
	echo "<br/><br/>Received encrypted credit card number: ".$_POST['cardNumber']; 
 
	echo "<br/><br/>Recovered credit card number: ".$Decrypted_credit_card_number;

	echo "<br/><br/>Received encrypted productA quantity: ".$_POST['ProductAquantityE'];
 
	echo "<br/><br/>Recovered productA quantity: shown as aboved table. ";

	echo "<br/><br/>Received encrypted productB quantity: ".$_POST['ProductBquantityE']; 
 
	echo "<br/><br/>Recovered productB quantity: shown as aboved table. ";

	echo "<br/><br/>Received encrypted productC quantity: ".$_POST['ProductCquantityE']; 
 
	echo "<br/><br/>Recovered productC quantity: shown as aboved table. ";
	

	
	/***********************************
	/
	/  Save the ordering information to the database
	/  for this demo code, the ordering information is saved into the orders.txt file.
	/  you should submit a shopping cart using student's page, and go to check if the information is stored any where
	/
	************************************/
	$order = fopen("../database/orders.txt", "a") or die("<br/><br/>File don't exist!");
	fwrite($order, $order_information);
	fclose($order);
	
 
	echo "<br/><br/> You can go <a href='../database/orders.txt'>database</a> to check this order"
 ?>

</body>
 
</html>