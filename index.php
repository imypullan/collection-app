<?php

$db = new PDO('mysql:host=db; dbname=booker_winners', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `prize_year`, `author_name`, `book_name`, `author_nationality` FROM `booker_winners`;');
$query->execute();
$winners = $query->fetchAll();

require_once 'functions.php';

?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <title>Booker Prize Winners</title>
</head>
<body>

<h1>Booker Prize Winners</h1>

<form action="addWinner.php">
    <h4>Add other winners:</h4>
    <label for="prize_year">Prize year</label><br />
    <input type="number" placeholder="Year" /><br />
    <label for="author_name">Author's name</label><br />
    <input type="text" placeholder="Author's name" /><br />
    <label for="book_title">Title</label><br />
    <input type="text" placeholder="Title" /><br />
    <label for="author_nationality">Author's nationality</label><br />
    <input type="text" placeholder="Author's nationality" /><br />
    <input type="submit" />
</form>

<?php
display_winners($winners);
?>




</body>
</html>