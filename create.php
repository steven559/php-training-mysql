<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="text" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
<?php
include "base.php";
include"read.php";


$level = (isset($_POST['difficulty']) ? $_POST['difficulty'] : null);
$nom = (isset($_POST['name']) ? $_POST['name'] : null);
$distance=(isset($_POST['distance']) ? $_POST['distance'] : null);
$dure=(isset($_POST['duration']) ? $_POST['duration'] : null);
$difference=(isset($_POST['height_difference']) ? $_POST['height_difference'] : null);

function ajouteRand($table,$nom,$level,$distance,$dure,$difference)
{
    global $conn;

    $associer = $conn->prepare("INSERT INTO $table (`name`,`difficulty`,`distance`,`duration`,`height_difference`)  VALUES  (?,?,?,?,?)");





    $associer->bind_param("ssisi", $nom,$level,$distance,$dure,$difference);

    $associer->execute();

    $associer->close();

}
if(isset($_REQUEST['action']) and filter_var($nom,FILTER_SANITIZE_STRING) and filter_var($level,FILTER_SANITIZE_STRING) and filter_var($distance,FILTER_SANITIZE_NUMBER_INT) and filter_var($dure,FILTER_SANITIZE_STRING) and filter_var($difference,FILTER_SANITIZE_NUMBER_INT)) {
    ajouteRand('hiking', $nom, $level, $distance, $dure, $difference);
}
affiche();