<?php

$db = new PDO('mysql:host=db; dbname=booker_winners', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `ID`, `prize_year`, `author_name`, `book_name`, `author_nationality` FROM `booker_winners`;');
$query->execute();
$result = $query->fetchAll();

?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <title>Booker Prize Winners</title>
</head>
<body>

<h1>Booker Prize Winners</h1>

<?php
function display_winners($result)
{
    foreach ($result as $winner) {
        echo '<h2>Prize year: ' . $winner['prize_year'] . '</h2>';
        echo '<span>Author: ' . $winner['author_name'] . '</span><br />';
        echo '<span>Title: ' . $winner['book_name'] . '</span><br />';
        echo '<span>Author nationality: ' . $winner['author_nationality'] . '</span><br />';
    }
}
display_winners($result);
?>




</body>
</html>