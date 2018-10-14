<?php
	session_start();
?>

<html>
<body>

<?php

	unset($_SESSION['usr']);
	header('Location: ../');
?>
  
</body>
</html>