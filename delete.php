<?php
require "functions.php";
$db = get_db();
/**
 * safe deletes the entry by id
 *
 * @param object $db
 */
function delete_winner(object $db) {
    $winner = $_POST['id'];
    $query=$db->prepare('UPDATE `booker_winners` SET `deleted` = 1 WHERE `id` = :id;');
    $query->bindParam(':id', $winner);
    $query->execute();
    header('Location: index.php');
    exit;
}
delete_winner($db);
