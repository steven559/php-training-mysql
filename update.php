<?php
include"base.php";
$name = (isset($_REQUEST['name']) ? $_REQUEST['name'] : null);

$level = (isset($_REQUEST['difficulty']) ? $_REQUEST['difficulty'] : null);

$distance = (isset($_REQUEST['distance']) ? $_REQUEST['distance'] : null);
$duree=(isset($_REQUEST['duration']) ? $_REQUEST['duration'] : null);

$difference = (isset($_REQUEST['height_difference']) ? $_REQUEST['height_difference'] : null);
$id =(isset($_REQUEST['id']) ? $_REQUEST['id'] : null);

function chang($table,$nom, $level, $distance, $duree,$difference,$id)
{
    global $conn;

    $sql = "UPDATE $table set  `name`='$nom',`difficulty`='$level',`distance`='$distance',`duration`='$duree',`height_difference`='$difference' where id=$id";
    echo $sql;
    $conn->query($sql);
    echo $conn->error;
}
echo'<a href="read.php">Liste des données</a>';



$name= filter_var($name,FILTER_SANITIZE_STRING) ? $_REQUEST['name'] : '';
$level=filter_var($level,FILTER_SANITIZE_STRING) ?$_REQUEST['difficulty']:'Facile';
$distance=filter_var($distance,FILTER_SANITIZE_NUMBER_INT) ?  $_REQUEST['distance'] : null;
$duree=filter_var($duree,FILTER_SANITIZE_STRING) ? $_REQUEST['duration'] : null;
$difference=filter_var($difference,FILTER_SANITIZE_NUMBER_INT)? $_REQUEST['height_difference'] : null;
$id = filter_var($id,FILTER_SANITIZE_NUMBER_INT) ? $_REQUEST['id'] : null;

    chang('hiking', $name, $level, $distance, $duree, $difference, $id);













if($name != filter_var($name,FILTER_SANITIZE_STRING)) {
    ?>
    <style>
        #name {
            background-color: red;
        }
    </style>
    <?php
}

    if($distance != filter_var($distance,FILTER_SANITIZE_NUMBER_INT)) {
    ?>
    <style>
        #distance {
            background-color: red;
        }
    </style>
<?php
}

    if($duree != filter_var($duree,FILTER_SANITIZE_STRING)) {
    ?>
    <style>
        #duree {
            background-color: red;
        }
    </style>
<?php
}

    if($difference != filter_var($difference,FILTER_SANITIZE_NUMBER_INT)) {
    ?>
    <style>
        #difference {
            background-color: red;
        }
    </style>
<?php
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

	<h1>Ajouter</h1>
	<form action="update.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" id="name" value="<?=$name?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="tres facile" <?php echo ($level== 'Très facile') ? 'selected' :''?>>Trés facile</option>
				<option value="facile" <?php echo ($level== 'facile') ? 'selected' :' '?>>facile</option>
				<option value="moyen" <?php echo ($level== 'moyen') ? 'selected' :' '?>>moyen</option>
				<option value="difficile" <?php echo ($level== 'difficile') ? 'selected' :' '?>>difficile</option>
				<option value="" <?php echo ($level== 'tres difficile') ? 'selected' :' '?>>Trés difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" id="distance" value="<?=$distance?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="text" name="duration" id="duree" value="<?=$duree?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" id="difference" value="<?=$difference?>">

            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="action" value="update">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
<?php
