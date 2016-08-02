	<?php
	if(isset($_POST['email']) AND isset($_POST['password']))									//verifie si les variable "mél" et un "mot de passe" existe bien
	{
		$_POST['email'] = htmlspecialchars($_POST['email']);
		$_POST['password'] = htmlspecialchars($_POST['password']);
		$_POST['password'] = sha1($_POST['password']);
	}
	else
	{
		header('Location: index.php');
	}

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projet e;charset=utf8', 'root', '');		//verifie si l'adresse existe

		$check = $bdd ->prepare('call checkEmail(?)');
		$check ->execute(array($_POST['email']));
		$donnees = $check->fetch();
		if ($donnees['Check'] == 0)
		{
			header('Location: index.php');
			exit();
		}


		$bdd = new PDO('mysql:host=localhost;dbname=projet e;charset=utf8', 'root', '');		//recupere ID et creer la session
		
		$id = $bdd ->prepare('call getID(?)');
		$id ->execute(array($_POST['email']));
		$donnees = $id->fetch();

		session_start();
		$_SESSION['id'] = $donnees['IDStudent'];


		$bdd = new PDO('mysql:host=localhost;dbname=projet e;charset=utf8', 'root', '');		//verifie si le statue de l'etudiant est a jour

		$status = $bdd ->prepare('call getStatus(?)');
		$status ->execute(array($_SESSION['id']));
		$donnees = $status->fetch();

		if ($donnees['Status'] == '3')
		{
			header('Location: index.php');
			exit();
		}


		$bdd = new PDO('mysql:host=localhost;dbname=projet e;charset=utf8', 'root', '');		//verifie le mot de passe

		$password = $bdd ->prepare('call checkConnection(?)');
		$password ->execute(array($_SESSION['id']));
		$donnees = $password->fetch();

		if ($donnees['Password'] == $_POST['password'])
		{
			header('Location: home.php');
			exit();
		}
		else
		{
			header('Location: index.php');
			exit();
		}
		
		
		$bdd = new PDO('mysql:host=localhost;dbname=projet e;charset=utf8', 'root', '');		//ajoute la derniere date de connexin a jour dans la bdd
		$date = $bdd ->prepare('call lastConnection(?)');
		$date ->execute(array($_SESSION['id']));


		$_SERVER["REMOTE_ADDR"] = $_SESSION["IP"];												//enregistre l'adresse IP utilisé pour la connection

	}
	catch(Exception $e)
	{
		header ('Location: index.php');
	}
	
?>