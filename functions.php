<?

function display_winners(array $winners) :string
{
foreach ($winners as $winner) {
echo '<h2>Prize year: ' . $winner['prize_year'] . '</h2>';
echo '<span>Author: ' . $winner['author_name'] . '</span><br />';
echo '<span>Title: ' . $winner['book_name'] . '</span><br />';
echo '<span>Author nationality: ' . $winner['author_nationality'] . '</span><br />';
}
}

