<?
/* displays list of DB info
 *
 * @param $winners array
 *
 * returns string of all winners
 */
function display_winners(array $winners) :string
{
    $output = '';
foreach ($winners as $winner) {
    $output .= '<h2>Prize year: ' . $winner['prize_year'] . '</h2>';
    $output .= '<span>Author: ' . $winner['author_name'] . '</span><br />';
    $output .= '<span>Title: ' . $winner['book_name'] . '</span><br />';
    $output .= '<span>Author nationality: ' . $winner['author_nationality'] . '</span><br />';
}
    return $output;
}


