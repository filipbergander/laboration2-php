<?php
require_once("includes/config.php"); // Hämtar in konfigurationsfilen
initConfig(); // Kör konfigurationen
$title = "Bucketlist | PHP";
include_once("includes/header.php");
include_once("includes/mainmenu.php")
?>
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
<?php
$bucketlist = new Bucketlist();

var_dump($bucketlist->addBucketItem("Test", "Provar", 0));
?>
<main class="flex-grow container mx-auto px-4 py-8">
    <form method="post">
        <div>
            <label for="name">Skriv namn:</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label class="mb-1 block font-medium" for="description">Skriv beskrivning:</label>
            <textarea name="description" class="w-lg p-2 resize-y bg-white rounded-md focus:border-green-300" rows="10" placeholder="Skriv en beskrivning här..." required id="description"></textarea>
        </div>
        <div>
            <label for="priority">Välj prioritet:</label>

            <select id="priority" name="priority">
                <option value="one">Ett</option>
                <option value="two">Två</option>
                <option value="three">Tre</option>
            </select>
        </div>
        <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded cursor-pointer" type="submit">Lägg till sak</button>
    </form>
</main>
<?php include_once("includes/footer.php") ?>
</body>

</html>