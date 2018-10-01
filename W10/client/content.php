<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('Location: login.html');
	}
?>


<html>
<body>

<h2>Lab 10 answer: content</h2>

Hi! <?php echo $_SESSION['user']; ?>

<br/><br/>
Here is the content...
<br/><br/>


<form action="../server/logout.php" method="POST">
<button type="submit">Logout</button>
</form>


</body>
</html>