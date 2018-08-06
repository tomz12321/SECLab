<html>
	<head>
		<style>
			table,
				td {
    				border: 1px solid #333;
				}

			thead
		</style>
	</head>
	<body>
		<?php echo var_dump($_POST); ?>
		<!-- ?php echo $_POST['entered']; -->
		<?//php $quantityA = $_POST["quantityA"]; ?>
		<?//php $resultA = $_POST["resultA"]; ?>
		<?//php $quantityB = $_POST["quantityB"]; ?>
		<?//php $resultB = $_POST["resultB"]; ?>
		<?//php $quantityC = $_POST["quantityC"]; ?>
		<?//php $resultC = $_POST["resultC"]; ?>
		<?//php $qTotal = $_POST["qTotal"]; ?>
		<?//php echo isset($qTotal) ;?>
		<?//php $pTotal = $_POST["pTotal"]; ?>

		<div class = "shopping-cart">
				<table>
					<thread>
						<tr>
							<th colspan="4"> Shopping-cart </th>
						</tr>
					</thread>

					<tbody>
						<tr>
								<td> <label for = "product"> Product </label> </td>
								<td> <label for = "price"> Price </label> </td>
								<td> <label for = "quantity"> Quantity </label> </td>
								<td> <label for = "subtotal"> Subtotal </label> </td>
						</tr>

						<tr>
							<td> <label for = "productA"> <p> Product A </p> </label> </td>
							<td> <label for = "priceA"> <p> $10 </p> </label> </td>
							<td> <?php echo $_POST['quantityA']; ?> </td>
							<td> <?php echo $_POST['subA']; ?> </td>
						</tr>

						<tr>
							<td> <label for = "productB"> <p> Product B </p> </label> </td>
							<td> <label for = "priceB"> <p> $15 </p> </label> </td>
							<td> <?php echo $_POST['quantityB']; ?>  </td>
							<td> <?php echo $_POST['subB']; ?>  </td>
						</tr>

						<tr>
							<td> <label for = "productC"> <p> Product C </p> </label> </td>
							<td> <label for = "priceC"> <p> $20 </p> </label> </td>
							<td> <?php echo $_POST['quantityC']; ?>  </td>
							<td> <?php echo $_POST['subC']; ?>  </td>
								
						</tr>

					</tbody>
					
					<tfoot>
						<tr>
							<td colspan="2"> Total </td>
							<td> <?php echo $_POST['totalQuantity']; ?>  </td>
							<td> <?php echo $_POST['totalPrice']; ?> </td>
						</tr>
					</tfoot>

				</table>
  			</div>
			</Form>
	</body>
</html>