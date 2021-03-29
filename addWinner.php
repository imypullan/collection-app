<?php
?>

<div class="addWinner">
    <form action="addWinner.php" method="post">
     <h4>Add other winners:</h4>
        <label for="prize_year">Prize year</label><br />
        <input type="number" placeholder="Year" name="prize_year"/><br />
        <label for="author_name">Author's name</label><br />
        <input type="text" placeholder="Author's name" name="author_name"/><br />
        <label for="book_title">Title</label><br />
        <input type="text" placeholder="Title" name="book_title" /><br />
        <label for="author_nationality">Author's nationality</label><br />
        <input type="text" placeholder="Author's nationality" name="author_nationality" /><br />
        <input type="submit" />
    </form>

    <span></span><a href="index.php">Go back</a></span>
</div>