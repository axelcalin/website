<?php
	session_start();

	if(isset($_POST['exPassword']) AND isset($_POST['newPassword']) AND isset($_POST['checkNewPassword']))
	{
		$_POST['exPassword'] = htmlspecialchars($_POST['exPassword']);
		$_POST['newPassword'] = htmlspecialchars($_POST['newPassword']);
		$_POST['checkNewPassword'] = htmlspecialchars($_POST['checkNewPassword']);
		$_POST['exPassword'] = sha1($_POST['exPassword']);
		$_POST['newPassword'] = sha1($_POST['newPassword']);
		$_POST['checkNewPassword'] = sha1($_POST['checkNewPassword']);
	}
	else
	{
		header('Location: newPassword.php');
	}


		$bdd = new PDO('mysql:host=localhost;dbname=projet e;charset=utf8', 'root', '');		//verifie le mot de passe

		$password = $bdd ->prepare('call checkConnection(?)');
		$password ->execute(array($_SESSION['id']));
		$donnees = $password->fetch();

		if ($donnees['Password'] != $_POST['exPassword'])
		{
			echo "string1";
			//header('Location: newPassword.php');
			exit();
		}


		if ($_POST['newPassword'] == $_POST['exPassword'])										//verifie si l'ancienne est different du nouveau
		{
			echo "string2";
			//header('Location: newPassword.php');
			exit();
		}


		if ($_POST['newPassword'] != $_POST['checkNewPassword'])								//verifie si le nouveau mot de passe est bon
		{
			echo "string3";
			//header('Location: newPassword.php');
			exit();
		}


		$bdd = new PDO('mysql:host=localhost;dbname=projet e;charset=utf8', 'root', '');		//changement du mot de passe dans la bdd
		
		$newPassword = $bdd ->prepare('call newPassword(?,?)');
		$newPassword ->execute(array($_SESSION['id'], $_POST['newPassword']));
		echo $_POST['newPassword'];

?>