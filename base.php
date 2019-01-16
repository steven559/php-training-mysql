<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 15/01/2019
 * Time: 09:37
 */




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


