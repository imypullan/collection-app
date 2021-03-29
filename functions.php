<?
/* displays list of DB info
 *
 * @param $winners array
 *
 * echoes list by field, no return
 */
function display_winners(array $winners)
{
foreach ($winners as $winner) {
echo '<h2>Prize year: ' . $winner['prize_year'] . '</h2>';
echo '<span>Author: ' . $winner['author_name'] . '</span><br />';
echo '<span>Title: ' . $winner['book_name'] . '</span><br />';
echo '<span>Author nationality: ' . $winner['author_nationality'] . '</span><br />';
}
}

