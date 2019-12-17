<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "antigomobilistabd";
    $connection = mysqli_connect($hostname,$user,$password,$database);

    if(!$connection) {
        print "Falha na conexão com o banco de dados!";
    }
?>