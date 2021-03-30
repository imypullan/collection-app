<?

/*
 * Returns a new PDO connection
 *
 * @return PDO
 */
function getDb() :PDO {
    $db = new PDO('mysql:host=db;dbname=booker_winners', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

/* displays list of DB info
 *
 * @param $winners array
 *
 * returns string of all winners
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
        }
    }
    return $output;
}

/*
 * validates user input on server side
 *
 * @param string data by reference
 *
 * returns validated entries
 */
function validate_input(string $data) :string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
 * passes each field entry through validation function validate_input
 *
 * returns array of validated user input
 */
function test_input() :array
{
    if (count($_POST) > 0) {
        if ($_POST['prize_year'] > 1968 && $_POST['author_name'] != "" && $_POST['book_name'] != "" && $_POST['author_nationality'] != "") {
            $_POST['prize_year'] = validate_input($_POST['prize_year']);
            $_POST['author_name'] = validate_input($_POST['author_name']);
            $_POST['book_name'] = validate_input($_POST['book_name']);
            $_POST['author_nationality'] = validate_input($_POST['author_nationality']);
            return $_POST;
        }
        } return [];
}

/*
 * Inserts a new winner into the DB
 *
 * @param object DB of previous winners
 *
 * @return bool
 */
function add_winner(object $db) :bool
{
    if (!empty($_POST)) {
        if ($_POST['prize_year'] > 1968 && $_POST['author_name'] != "" && $_POST['book_name'] != "" && $_POST['author_nationality'] != "") {
            $query = $db->prepare('INSERT INTO `booker_winners` (`prize_year`, `author_name`, `book_name`, `author_nationality`) VALUES (:prize_year, :author_name, :book_name, :author_nationality);');
            $query->bindParam(':prize_year', $_POST['prize_year']);
            $query->bindParam(':author_name', $_POST['author_name']);
            $query->bindParam(':book_name', $_POST['book_name']);
            $query->bindParam(':author_nationality', $_POST['author_nationality']);
            $query->execute();
            echo 'Thanks for adding more winners.';
            return true;
          } else {
            echo "Please fill in all fields.";
            return false;
        }
    }
}