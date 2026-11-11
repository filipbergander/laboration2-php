<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <!-- Milligram CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <script src="js/main.js" defer></script>
    <title>Uppgift 2 | PHP</title>
</head>

<body>
    <section>
        <h1>Bucketlist</h1>
        <?php
        if (isset($_POST["name"])) {
            $name = $_POST["name"];
            echo $name;
            $priority = $_POST["priority"];
            echo $priority;
        }
        ?>
    </section>
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
</body>

</html>