<?php
/**** Supprimer une randonnée ****/
$id = (isset($_GET['id']) ? $_GET['id'] : null);
include "base.php";

function sup($table,$id)
{
    global $conn;

    $sql = "DELETE from $table where id=$id";

    $conn->query($sql);
}
sup('hiking',$id);
header('location:read.php');





