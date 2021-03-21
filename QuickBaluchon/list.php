<?php

require_once __DIR__.'/bdd/database.php';

function getStaffByUsername(string $username): ?array {
    $connection = getDatabaseConnection();
    $sql = "SELECT username, password FROM staff WHERE username = ?";
    $params = [$username];
    return databaseFindOne($connection, $sql, $params);
}

function searchStaff(?string $username, ?string $password): ?array {
    $connection = getDatabaseConnection();
    $where = [];
    $params = [];
    if($username !== null) {
        array_push($where, 'Username ?');
        $params[] = "%". $username . "%"; // eq array_push
    }
    if($password !== null) {
        $where[] = 'Password -> ?';
        $params[] = $password;
    }
    $sql = "SELECT username, password FROM staff";
    if(count($where) > 0) {
        $whereClause = join(" AND ", $where);
        $sql .= " WHERE " . $whereClause;
    }
    return databaseFindAll($connection, $sql, $params);
}


$username = isset($_GET['username']) ? $_GET['username'] : null;
$password = isset($_GET['password']) ? $_GET['password'] : null;

$staff = searchStaff($username, $password);
if($staff !== null) {
    $json = json_encode($staff);
    header('Content-Type: application/json');
    echo $json;
} else {
    http_response_code(500);
}