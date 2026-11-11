<?php
$title = "Bucketlist | PHP";
include_once("includes/header.php");
?>
    <?php include_once("includes/mainmenu.php") ?>
    <div>
        <h1>
            Bucketlist
        </h1>

    </div>
    <?php
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
        echo $name;
        $priority = $_POST["priority"];
        echo $priority;
    }
    ?>
    <main class="flex-grow container mx-auto px-4 py-8">
        <form method="post">
            <div>
                <label for="name">Skriv namn:</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="description">Skriv en beskrivning:</label>
                <input type="text" id="description" name="description">
            </div>
            <div>
                <label for="priority">Välj prioritet:</label>

                <select id="priority" name="priority">
                    <option value="one">Ett</option>
                    <option value="two">Två</option>
                    <option value="three">Tre</option>
                </select>
            </div>
            <button type="submit">Lägg till sak</button>
        </form>
    </main>
    <?php include_once("includes/footer.php") ?>
</body>

</html>