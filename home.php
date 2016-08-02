<?php 
	session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="icon" href="logo_15.ico" type="image/x-icon">

	<title>Exia</title>
</head>
<body>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.js"></script>   

	<!--Barre de navigation-->
	<!-- Dropdown year -->
	<ul id="dropdown_year" class="dropdown-content">
  		<li><a href="#!">A1</a></li>
  		<li><a href="#!">A2</a></li>
  		<li class="divider"></li>
		<li><a href="#!">A3</a></li>
		<li><a href="#!">A4</a></li>
		<li><a href="#!">A5</a></li>
	</ul>

		<!-- mDropdown year -->
	<ul id="mdropdown_year" class="dropdown-content">
  		<li><a href="#!">A1</a></li>
  		<li><a href="#!">A2</a></li>
  		<li class="divider"></li>
		<li><a href="#!">A3</a></li>
		<li><a href="#!">A4</a></li>
		<li><a href="#!">A5</a></li>
	</ul>

  	<nav class="blue darken-4">
    	<div class="nav-wrapper">
    	<div class="container">
    		<a href="home.php" class="brand-logo">Logo</a>
      		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      		<ul class="right hide-on-med-and-down">
        		<li><a href="tu.php">Unité d'enseignement</a></li>
        		
        		<li><a class="dropdown-button" href="#!" data-activates="dropdown_year">Année<i class="material-icons right">arrow_drop_down</i></a></li>
        		<li><a href="class.php">La classe</a></li>
        		<li><a href="account.php">Mon compte</a></li>
      		</ul>
      		<ul class="side-nav" id="mobile-demo">
        		<li><a href="tu.php">Unité d'enseignement</a></li>
        		<li><a class="dropdown-button" href="#!" data-activates="mdropdown_year">Année<i class="material-icons right">arrow_drop_down</i></a></li>
        		<li><a href="class.php">La classe</a></li>
        		<li><a href="account.php">Mon compte</a></li>
      		</ul>
    	</div><!--container-->
    	</div>
  	</nav>

	<script type="text/javascript">
		$(".button-collapse").sideNav();
		$(".dropdown-button").dropdown();
	</script>


	<?php 
	//include("menu.php");
	//echo $_SESSION['id'];
	echo "</br>";
	//echo $_SERVER["REMOTE_ADDR"];
	//echo session_id();
	//echo session_unregister();

	?>


	<div class="container">

		<table>
		<thead>
			<tr>
				<th data-field="tu">UE:</th>
				<th data-field="test_name">Nom du test:</th>
				<th data-field="result">Résultats:</th>
				<th data-field="coefficient">Coéfficient:</th>
			</tr>
		</thead>

        <tbody>
			<tr>
            

			</tr>


	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projet e;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}

	$last_result = $bdd->prepare('call lastResult(?)');
	$last_result ->execute(array($_SESSION['id']));

	echo "string";

	while ($donnees = $last_result->fetch())
	{
		echo "<tr>";
		echo '<td>' . $donnees['TU'] . '</td>';
		echo '<td>' . $donnees['TestName'] . '</td>';
		echo '<td>' . $donnees['Result'] . '</td>';
		echo '<td>' . $donnees['Coefficient'] . '</td>';
		echo "</tr>";
	}

	//$last_result->closeCursor();

	?>
		</tbody>
	</table>




	</div><!--Container-->


	<!--Barre de navigation-->
	<footer class="page-footer  blue darken-4">
		<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">Footer Content</h5>
				<p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
			</div>
			<div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
				<ul>
					<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
				</ul>
			</div>
		</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
            	© 2016 Copyright
            	<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
			</div>
		</div>
	</footer>
	

</body>
</html>