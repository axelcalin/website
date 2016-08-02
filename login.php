<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta  name = "viewport"  content = "width = dispositif de largeur, initiale échelle = 1" >
	<meta  name = "viewport"  content = "width = dispositif de largeur, initiale échelle = 1, maximum de l' échelle = 1, évolutive utilisateur = no" >

	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="icon" href="logo_15.ico" type="image/x-icon">
	
	<title>Exia</title>
</head>
<body class="grey lighten-5">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.js"></script>

	<div class="container" style="margin-top:90px;">
	<div class="row">
	<div class="col s12 m6 offset-m3">
	<div class="col s12 m12">
        <div class="card-panel z-depth-5">
        	<h4 class="center">Connexion</h4>
			<form method="post" action="checkConnexion.php">
				<div class="row">
					<div class="input-field col s12">
						<input type="email" name="email" id="email"  class="validate">
						<label for="email" class="light-blue-text text-darken-4">Adresse mél</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
       					<input type="password" name="password" id="password" class="light-blue-text text-darken-4"/>
       					<label for="password" class="light-blue-text text-darken-4">Mot de passe</label>
       				</div>
       			</div>

      	 		<div class="row card-action center-align">
       				<button type="submit" class="btn waves-effect waves-light valign-wrapper light-blue darken-4">Sign up
       				<i class="material-icons right">input</i>
       				</button>
       			</div>
			</form>

		</div><!--card-->
	</div><!--col-->
	</div><!--col-->
	</div><!--row-->
	</div><!--conatiner-->

</body>
</html>