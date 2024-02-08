<?php

    $host = 'postgres';
    $user = 'db_user';
    $pass = 'db_password';
    $db = 'livro';

    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);

    if (!$conn) {
        die("Connection failed");
    }

    echo "Connected to PostgreSQL successfully";

    // Your PHP code for PostgreSQL interactions goes here

    $conn = null;