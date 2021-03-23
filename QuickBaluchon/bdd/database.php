<?php

function getDatabaseConnection(): PDO {
    $dbname = 'quickbaluchon';
    $port = 3306;
    $user = 'root';
    $pwd = 'root';
    $host = 'localhost';
    return new PDO("mysql:host=$host:$port;dbname=$dbname;charset=utf8", $user, $pwd);
}



function databaseFindOne(PDO $connection, string $sql, array $params): ?array {
    $statement = $connection->prepare($sql);
    if($statement !== false) {
        $success = $statement->execute($params);
        if($success) {
            $res = $statement->fetch(PDO::FETCH_ASSOC);
            if($res === false) {
                return null;
            }
            return $res;
        }
    }
    return null;
}

function databaseFindAll(PDO $connection, string $sql, array $params): ?array
{
    $statement = $connection->prepare($sql);
    if ($statement !== false) {
        $success = $statement->execute($params);
        if ($success) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    return null;
}