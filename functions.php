<?


/**
 * Returns a new PDO connection
 *
 * @return PDO
 */
function getDb() {
    $db = new PDO('mysql:host=db;dbname=booker_winners', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
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
 * Inserts a new winner into the DB
 *
 * @param DB of previous winners
 *
 * @return bool
 *
 */
function add_winner($db)
{
    if ($_POST) {
        $query = $db->prepare('INSERT INTO `booker_winners` (`prize_year`, `author_name`, `book_name`, `author_nationality`) VALUES (:prize_year, :author_name, :book_name, :author_nationality);');
        $query->bindParam(':prize_year', $_POST['prize_year']);
        $query->bindParam(':author_name', $_POST['author_name']);
        $query->bindParam(':book_name', $_POST['book_name']);
        $query->bindParam(':author_nationality', $_POST['author_nationality']);
        $query->execute();
        echo 'Thanks for adding more winners.';
        return true;
    }
}