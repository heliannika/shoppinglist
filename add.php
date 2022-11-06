<?php

require_once 'inc/header.php';
require_once 'inc/functions.php';

try {
    $db = openDb();

    $query = $db->prepare('insert into item(description,amount) values ("Second test item", 3), ("Third test item", 5), ("Fourth test item", 7)');
    $query->execute();

    header('HTTP/1.1 200 OK');
    $data = array('id'=> $db->lastInsertId(), 'description', 'amount');
    return $data;
} catch (PDOException $pdoex) {
    returnError($pdoex);
}