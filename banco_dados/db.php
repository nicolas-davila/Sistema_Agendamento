<?php 

    $host = "localhost";
    $user = "root";
    $pass = "012220";
    $db = "sistema_agendamento";

    $conn = mysqli_connect($host, $user, $pass, $db);

    if($conn->connect_error) {
        die("Falha na cocexão: " . $conn->connect_error);
    }


?>