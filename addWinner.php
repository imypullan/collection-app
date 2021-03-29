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
        <form action="addWinner.php" method="post">
            <h4>Add other winners:</h4>
            <div><label for="prize_year">Prize year</label></div>
            <div><input type="number" placeholder="Year" name="prize_year" min="1969" required/></div>
            <div><label for="author_name">Author's name</label></body>
            <div><input type="text" placeholder="Author's name" name="author_name" required/></div>
            <div><label for="book_name">Title</label></div>
            <div><input type="text" placeholder="Title" name="book_name" required/></div>
            <div><label for="author_nationality">Author's nationality</label></div>
            <div><input type="text" placeholder="Author's nationality" name="author_nationality" required/></div>
            <div><input type="submit" /></div>
        </form>

         <span></span><a href="index.php">Go back</a></span>
    </div>

<?php
    add_winner($db);
?>

</body>
</html>