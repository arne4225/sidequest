<?php


$host = 'db.suwhiehlvdqercqmgemk.supabase.co';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
$password = 'sidequestDB123';

if (!in_array('pgsql', PDO::getAvailableDrivers())) {
    echo "PDO PostgreSQL driver (pdo_pgsql) is niet geïnstalleerd of geactiveerd!\n";
    exit;
}

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Fout bij verbinden: " . $e->getMessage() . "\n";
    exit;
}
