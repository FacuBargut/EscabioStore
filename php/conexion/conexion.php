<?php
$mysqli = new mysqli("localhost", "root", "1234578", "scabio");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}