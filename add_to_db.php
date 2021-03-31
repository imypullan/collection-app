<?php
require 'functions.php';
$db = get_db();
$winner = $_POST;
test_input();
add_winner($db, $winner);
/*
* Inserts new entry into the DB
*
* @param object DB of previous winners
* @param validated array
*
* @return
*/
function add_winner(object $db, array $winner)
{
if (!empty($_POST)) {
if (($winner['prize_year'] > 1968 && $winner['prize_year'] <= date("Y"))
&& ($winner['author_name'] != "" && $winner['book_name'] != "" && $winner['author_nationality'] != "")
&& (strlen($winner['author_name']) > 6 && strlen($winner['author_name']) < 200)
&& (strlen($winner['book_name']) > 6 && strlen($winner['book_name']) < 300)
&& (strlen($winner['author_nationality']) > 2 && strlen($winner['author_nationality']) < 50)) {
$query = $db->prepare('INSERT INTO `booker_winners` (`prize_year`, `author_name`, `book_name`, `author_nationality`) VALUES (:prize_year, :author_name, :book_name, :author_nationality);');
$query->bindParam(':prize_year', $winner['prize_year']);
$query->bindParam(':author_name', $winner['author_name']);
$query->bindParam(':book_name', $winner['book_name']);
$query->bindParam(':author_nationality', $winner['author_nationality']);
$query->execute();
header('Location: index.php?success=Thanks for your submission.');
exit;
} else {
header('Location: index.php?error=Please note, your submission failed.');
exit;
}
}
}