<?

/*
 * Returns a new PDO connection
 *
 * @return PDO
 */
function getDb() :PDO
{
    $db = new PDO('mysql:host=db;dbname=booker_winners', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function getWinners($db)
{
    $query = $db->prepare('SELECT `id`, `prize_year`, `author_name`, `book_name`, `author_nationality` FROM `booker_winners` WHERE `deleted` = 0;');
    $query->execute();
    $winners = $query->fetchAll();
    return $winners;
}

/* displays list of DB info
 *
 * @param $winners array
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
            $output .= '<h2>Prize year: ' . $winner['prize_year'] . '</h2>';
            $output .= '<div><span>Author: ' . $winner['author_name'] . '</span></div>';
            $output .= '<div><span>Title: ' . $winner['book_name'] . '</span></div>';
            $output .= '<div><span>Author nationality: ' . $winner['author_nationality'] . '</span></div>';
            $output .= '<div><form method="post" action="delete.php"><input type="submit" name="delete" value="Delete">
                        <input type="hidden" name="id" value="' . $winner['id'] . '"/></form></div>';
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
            $winner = [];
            $winner['prize_year'] = validate_input($_POST['prize_year']);
            $winner['author_name'] = validate_input($_POST['author_name']);
            $winner['book_name'] = validate_input($_POST['book_name']);
            $winner['author_nationality'] = validate_input($_POST['author_nationality']);
            return $winner;
      }
    } return [];
}

/*
 * Inserts new entry into the DB
 *
 * @param object DB of previous winners
 * @param validated array
 *
 * @return bool
 */
function add_winner(object $db, array $winner) :bool
{
    if (!empty($_POST)) {
        if (($winner['prize_year'] > 1968 && $winner['prize_year'] <= date("Y"))
            && ($winner['author_name'] != "" && $winner['book_name'] != "" && $winner['author_nationality'] != "")
            && (strlen($winner['author_name']) > 6 && strlen($winner['author_name']) < 200)
                && (strlen($winner['book_name']) > 6 && strlen($winner['book_name']) < 300)
                    && (strlen($winner['author_nationality']) > 2 && strlen($winner['author_nationality']) < 50))
                    {
            $query = $db->prepare('INSERT INTO `booker_winners` (`prize_year`, `author_name`, `book_name`, `author_nationality`) VALUES (:prize_year, :author_name, :book_name, :author_nationality);');
            $query->bindParam(':prize_year', $winner['prize_year']);
            $query->bindParam(':author_name', $winner['author_name']);
            $query->bindParam(':book_name', $winner['book_name']);
            $query->bindParam(':author_nationality', $winner['author_nationality']);
            $query->execute();
            echo 'Thanks for adding more winners. Either add more winners or <span><a href="index.php">go back.</a></span>';
            return true;
          } else {
            echo "Please fill in all fields.";
            return false;
        }
    } else {
        return false;
    }
}
