<?php
require 'functions.php';
$db = get_db();
$winners = get_winners($db);
$winner = get_winner_info($db);
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
    <title>Booker Prize Winners</title>
</head>

<body>

    <h1 class="title">Edit Entries</h1>

         <div class="add_db_entry">
             <form action="update_db.php" method="post">
                 <h3>Edit winner:</h3>
                <div class="entry_field"><label for="prize_year">Prize year:</label>
                     <input type="number" name="prize_year" value="<?php echo $winner['prize_year'] ?>"/></div>
                <div class="entry_field"><label for="author_name">Author's name:</label>
                     <input type="text" name="author_name" value="<?php echo $winner['author_name'] ?>"/></div>
                <div class="entry_field"><label for="book_name">Title:</label>
                    <input type="text" name="book_name" value="<?php echo $winner['book_name'] ?>"/></div>
                <div class="entry_field"><label for="author_nationality">Author's nationality:</label>
                     <input type="text" name="author_nationality" value="<?php echo $winner['author_nationality'] ?>"></div>
                <div class="entry_field"><input type="submit" class="entry_field submit"/>
                <input type="hidden" name="id" value="<?php echo $winner['id'] ?>" /></div>
                 <div class="go_back"><span class="return"><a href="index.php">go back.</a></span></div>
             </form>
         </div>


</body>
</html>
