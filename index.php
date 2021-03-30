<?php
require 'functions.php';
$db = getDb();

$query = $db->prepare('SELECT `prize_year`, `author_name`, `book_name`, `author_nationality` FROM `booker_winners`;');
$query->execute();
$winners = $query->fetchAll();


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
echo display_winners($winners);
?>

    <div class="addWinner">
      <span><a href="addWinner.php">Add other winners:</a></span>
    </div>


</body>
</html>