<?php
require "functions.php";
$db = getDb();
function delete_winner($db) {
    $winner = $_POST['id'];
    $query=$db->prepare('UPDATE `booker_winners` SET `deleted` = 1 WHERE `id` = :id;');
    $query->bindParam(':id', $winner);
    $query->execute();
    header('Location: index.php');
    exit;
}
delete_winner($db);
