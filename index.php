<?php

$db = new PDO('mysql:host=db; dbname=booker_winners', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare('SELECT `ID`, `prize_year`, `author_name`, `book_name`, `author_nationality` FROM `booker_winners`;');
$query->execute();
$result = $query->fetchAll();

echo '<pre>';
var_dump($result);
echo '</pre>';