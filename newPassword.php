<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="newPassword.css">
	<title>Exia</title>
</head>
<body>

	<form method="post" action="checkPassword.php">
		<p>
			<input type="password" name="exPassword" id="exPassword" placeholder="Ancien mot de passe" />
			<br />
			<input type="password" name="newPassword" id="newPassword" placeholder="Nouveau mot de passe" />
			<br />
			<input type="password" name="checkNewPassword" id="checkNewPassword" placeholder="Nouveau mot de passe" />
			<br />
			<input type="submit" value="Envoyer" />
		</p>
	</form>

</body>
</html>