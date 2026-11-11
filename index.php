<!DOCTYPE html>
<html lang="sv">

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
    <div>
        <h1>
            Information om uppgift 2
        </h1>
        <?php include_once("includes/mainmenu.php") ?>
    </div>

    <main>
        <h2>Reflektioner kring PHP-språket</h2>
        <article>
            <h3>Fördelar och nackdelar med PHP</h3>
            <p></p>
        </article>
        <article>
            <h3></h3>
            <p></p>
        </article>
        <article>
            <h3></h3>
            <p></p>
        </article>

    </main>
    <?php
    echo "Hi!";
    $name = "Filip";
    echo "<p>$name</p>";
    ?>
    <button>Hi</button>
    <footer>
        <?= $name; ?>
    </footer>
</body>

</html>