<?php


$host = 'db.suwhiehlvdqercqmgemk.supabase.co';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
$password = 'sidequestDB123';

if (!in_array('pgsql', PDO::getAvailableDrivers())) {
    echo "❌ PDO PostgreSQL driver (pdo_pgsql) is niet geïnstalleerd of geactiveerd!\n";
    echo "💡 Tip: zie https://www.php.net/manual/en/ref.pdo-pgsql.php\n";
    exit;
}

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "✅ Verbinding met Supabase database '$dbname' is succesvol!\n";
} catch (PDOException $e) {
    echo "❌ Fout bij verbinden: " . $e->getMessage() . "\n";
    exit;
}
