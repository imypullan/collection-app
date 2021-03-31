<?php
require 'functions.php';
$db = getDb();
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
    <title>Booker Prize Winners</title>
</head>

<body>
    <div class="add_db_entry">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <h3>Add other winners:</h3>
            <div class="entry_field"><label for="prize_year">Prize year:</label>
            <input type="number" name="prize_year"/></div>
            <div class="entry_field"><label for="author_name">Author's name:</label>
            <input type="text" name="author_name"/></div>
            <div class="entry_field"><label for="book_name">Title:</label>
            <input type="text" name="book_name"/></div>
            <div class="entry_field"><label for="author_nationality">Author's nationality:</label>
            <input type="text" name="author_nationality"/></div>
            <div class="entry_field"><input type="submit" class="entry_field submit"/></div>
        </form>


<?php
if(isset($_POST))
{
    $winner = test_input();
    add_winner($db, $winner);
}
?>
    </div>
</body>
</html>