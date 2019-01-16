<head>
    <style>
        .tt {

            border: solid black 1px;
        }

        th {
            color: grey;
            background-color: black;
            width: 10%;
            border: solid black 1px;
        }

        td {
            justify-content: center;
            text-align: center;
            width: 10%;
            padding: 2%;
            border: solid black 2px;
            background-color: lightgray;
        }

        table {

            text-shadow: -1px -1px #eee, 1px 1px black, black;
            font-family: "Segoe print", Arial, Helvetica, sans-serif;
            color: black;
            width:60%;
            font-weight: lighter;
            -moz-box-shadow: 2px 2px 6px #888;
            -webkit-box-shadow: 2px 2px 6px #888;
            box-shadow: 2px 2px 6px #888;
            text-align: center;

            line-height: 19px;
            margin: 0 auto;
        }
        h2{

        }

        h1 {

            font-size: 24px;
            text-shadow: -1px -1px #eee, 1px 1px #888, -3px 0 4px #000;
            font-family: "Segoe print", Arial, Helvetica, sans-serif;
            color: #ccc;
            padding: 16px;
            font-weight: lighter;
            -moz-box-shadow: 2px 2px 6px #888;
            -webkit-box-shadow: 2px 2px 6px #888;
            box-shadow: 2px 2px 6px #888;
            text-align: center;
            margin-left: 23%;

            width: 50%;
            line-height: 122px;
        }


    </style>
</head>





<?php


?>







<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<h1>Liste des randonnées</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reunion_island";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

} else {

    $conn->select_db($dbname);
}
function affiche()
{
?>

<tr>
    <th>id</th>
    <th>name</th>
    <th>difficulty</th>
    <th>distance</th>
    <th>duration</th>
    <th>height_difference</th></tr>
<?php

global $conn;

$sql = "SELECT *  from hiking where 1";

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {

?>

<tr>
  <?php
  echo '<td class="tt"><a href="delete.php?id='.$row['id'].'">sup</a> <a href="update.php?name=' . $row['name'] . '&id=' . $row['id'] . '&distance=' . $row['distance'] . '&duration=' . $row['duration'] . '&height_difference=' . $row['height_difference'] . '&difficulty=' .$row['difficulty'].'">maj</a></td>';

  ?>

    <td class="tt"><?=$row['name']; ?></td>

    <td class="tt"><?=$row['difficulty']; ?></td>
    <td class="tt"><?=$row['distance']; ?></td>
    <td class="tt"><?=$row['duration']; ?></td>
    <td class="tt"><?=$row['height_difference']; ?></td>


</tr>


</body>
</html>

<?php
}

}
echo'<a href="update.php">lien vers uptade</a>';

echo"<table>";
affiche();
echo"<table>";