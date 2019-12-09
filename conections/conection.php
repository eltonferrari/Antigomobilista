<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "antigomobilistabd";
    $conection = mysqli_connect($hostname,$user,$password,$database);

    if(!$conection) {
        print "Falha na conexão com o banco de dados!";
    }
?>