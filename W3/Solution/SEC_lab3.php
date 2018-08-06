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
	background-color: #4CAF50;
	color: white;
}
 
</style>
</head>
<body>
 
<h1>Received Form (What the customer submitted)</h1>
 
 
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
 
</body>
 
</html>
