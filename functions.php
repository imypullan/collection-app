<?php

/*
 * Returns a new PDO connection
 *
 * @return PDO
 */
function get_db() :PDO
{
    $db = new PDO('mysql:host=db;dbname=booker_winners', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

/*
 * retrieves list of winners from db
 *
 * @param object db
 *
 * @return array
 */
function get_winners(object $db) :array
{
    $query = $db->prepare('SELECT `id`, `prize_year`, `author_name`, `book_name`, `author_nationality` FROM `booker_winners` WHERE `deleted` = 0 ORDER BY `prize_year` DESC;');
    $query->execute();
    $winners = $query->fetchAll();
    return $winners;
}

/* displays list of DB info
 *
 * @param $winners array c
 *
 * @return string of all winners
 */
function display_winners(array $winners) :string
{
    $output = '';
    if(empty($winners)) {
        $output = 'There are no winners.';
    } else {
        foreach ($winners as $winner) {
            $output .= '<div class="winner"><h2>Prize year: ' . $winner['prize_year'] . '</h2>';
            $output .= '<div><span class="category_title">Author:</span><span> ' . $winner['author_name'] . '</span></div>';
            $output .= '<div><span class="category_title">Title:</span><span> ' . $winner['book_name'] . '</span></div>';
            $output .= '<div><span class="category_title">Nationality:</span><span> ' . $winner['author_nationality'] . '</span></div>';
            $output .= '<div class="delete_edit"><form method="post" action="delete.php"><input type="submit" name="delete" value="Delete" class="delete_edit">
                        <input type="hidden" name="id" value="' . $winner['id'] . '"/></form>';
            $output .= '<form method="post" action="edit.php"><input type="submit" name="edit" value="Edit" class="delete_edit">
                        <input type="hidden" name="id" value="' . $winner['id'] . '"/></form></div></div>';
        }
    }
    return $output;
}

/*
 * validates user input on server side
 *
 * @param string data by reference
 *
 * @return validated entries
 */
function validate_input(string $data) :string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
 * if input received, passes each field entry through validation function
 *
 * @return array of validated user input
 */
function test_input() :array
{
    if (count($_POST) > 0) {
      {
          $winner['id'] = validate_input($_POST['id']);
          $winner['prize_year'] = validate_input($_POST['prize_year']);
          $winner['author_name'] = validate_input($_POST['author_name']);
          $winner['book_name'] = validate_input($_POST['book_name']);
          $winner['author_nationality'] = validate_input($_POST['author_nationality']);
          return $winner;
      }
    } return [];
}

/*
 * guards against unacceptable entries
 *
 * @param array winner
 *
 * @return boolean
 */
function is_entry_acceptable(array $winner) :bool
{
    if (($winner['prize_year'] > 1968 && $winner['prize_year'] <= date("Y"))
        && ($winner['author_name'] != "" && $winner['book_name'] != "" && $winner['author_nationality'] != "")
        && (strlen($winner['author_name']) > 6 && strlen($winner['author_name']) < 200)
        && (strlen($winner['book_name']) > 6 && strlen($winner['book_name']) < 300)
        && (strlen($winner['author_nationality']) > 2 && strlen($winner['author_nationality']) < 50))
    {
        return $acceptable = true;
    } else
    {
        return $acceptable = false;
    }
}

/**
 * finds the entry to edit
 *
 * @param object $db
 *
 * @return array
 */
function get_winner_info(object $db)
{
    $query = $db->prepare('SELECT `id`, `prize_year`, `author_name`, `book_name`, `author_nationality` FROM `booker_winners` WHERE `id` = :id;');
    $query->bindParam(':id', $_POST['id']);
    $query->execute();
    $winner = $query->fetch();
    return $winner;
}

/*
 * shows any GET messages
 */
function show_messages()
{
    if (isset($_GET['error'])) {
        echo '<p>' . $_GET['error'] . '</p>';
    }
    if (isset($_GET['success'])) {
        echo '<p>' . $_GET['success'] . '</p>';
    }
}
