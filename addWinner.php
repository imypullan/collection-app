<?php
require 'functions.php';
$db = getDb();
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <title>Booker Prize Winners</title>
</head>

<body>
    <div class="addWinner">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <h3>Add other winners:</h3>
            <div><label for="prize_year">Prize year:</label></div>
            <div><input type="number" placeholder="Year" name="prize_year"/></div>
            <div><label for="author_name">Author's name:</label>
            <div><input type="text" placeholder="Author's name" name="author_name"/></div>
            <div><label for="book_name">Title:</label></div>
            <div><input type="text" placeholder="Title" name="book_name"/></div>
            <div><label for="author_nationality">Author's nationality:</label></div>
            <div><input type="text" placeholder="Author's nationality" name="author_nationality"/></div>
            <div><input type="submit" /></div>
        </form>

         <span><a href="index.php">Go back</a></span>
    </div>

<?php
if(isset($_POST))
{
    $winner = test_input();
    add_winner($db, $winner);
}
?>

</body>
</html>