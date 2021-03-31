<?php
require 'functions.php';
$db = get_db();
$winners = get_winners($db);
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
    <title>Booker Prize Winners</title>
</head>
<body>

    <h1 class="title">Booker Prize Winners</h1>

    <div class="winner_list">
<?php
echo display_winners($winners);
?>
    </div>

    <div class="add_winners">
        <a href="addWinner.php"><button class="add_winners">Add other winners</button></a>
    </div>


</body>
</html>