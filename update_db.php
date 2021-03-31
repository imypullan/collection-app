<?php
require 'functions.php';
$db = get_db();
$winner = $_POST;
$acceptable = is_entry_acceptable($winner);
add_winner($db, $winner, $acceptable);
/*
* Inserts new entry into the DB
*
* @param object DB of previous winners
* @param validated array
 * @param bool
*
* @return void
*/
function add_winner(object $db, array $winner, bool $acceptable) :void
{
    if (!empty($_POST)) {
        if ($acceptable == true) {
            $winner = test_input();
            $query = $db->prepare('UPDATE `booker_winners` SET `prize_year` = :prize_year, `author_name` = :author_name, `book_name` = :book_name, `author_nationality` = :author_nationality WHERE `id` = :id;');
            $query->bindParam(':id', $winner['id']);
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