<?php

declare(strict_types=1);

$dsn = sprintf(
    'pgsql:host=%s;port=%s;dbname=%s',
    $_ENV['POSTGRES_HOST'],
    $_ENV['POSTGRES_PORT'],
    $_ENV['POSTGRES_DB']
);

$pdo = new PDO($dsn, $_ENV['POSTGRES_USER'], $_ENV['POSTGRES_PASSWORD']);
$version = $pdo->query('SELECT version()')->fetchColumn();

echo "Database Version: " . $version;