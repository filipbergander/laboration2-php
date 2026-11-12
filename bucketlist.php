<?php
require_once("includes/config.php"); // Hämtar in konfigurationsfilen
initConfig(); // Kör konfigurationen
$title = "Bucketlist | PHP";
$headline = "Bucketlist";
include_once("includes/components/header.php");
include_once("includes/components/mainmenu.php");
include_once("includes/components/headline.php");
$notification = false;
$bucketlist = new Bucketlist();
if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $priority = $_POST["priority"];

    if ($bucketlist->addBucketItem($name, $description, $priority)) {
        $notification = true;
    } else {
        $notification = false;
        return;
    }
}
?>
<?php
/*
echo "<pre>";
var_dump($bucketlist->getBucketItemById(9));
echo "</pre>"
echo "<pre>";
var_dump($bucketlist->updateBucketItem(8, "Provar!!!!", "provar att uppdatera", 2));
echo "</pre>";
/*var_dump($bucketlist->addBucketItem("Test", "Provar", 1));
echo "<pre>";
var_dump($bucketlist->deleteBucketItem(1));
echo "</pre>";
echo "<pre>";
var_dump($bucketlist->getBucketItems());
echo "</pre>";*/
?>

<main class="w-full px-4 py-8">
    <section class="mx-auto max-w-3xl shadow-md my-4 max-w-lg p-2 rounded-lg p-3 md:p-10 bg-white">
        <h1>Min bucketlist</h1>
        <p class="text-left text-gray-600 mb-2">Vad drömmer du om att göra?</p>
        <form method="post" class="rounded-xl bg-green-200 shadow-md p-6">
            <fieldset class="space-y-5">
                <legend class="mb-4 text-xl font-semibold">Lägg till en ny sak</legend>
                <div>
                    <label for="name" class="block text-md font-medium mb-1">Skriv namn:</label>
                    <input type="text" id="name" name="name" class="bg-white rounded-md p-2 w-full" placeholder="Vad vill du göra?">
                </div>
                <div>
                    <label class="block text-md font-medium mb-1" for="description">Skriv beskrivning:</label>
                    <textarea name="description" class="w-full p-2 resize-y bg-white rounded-md focus:border-green-300" rows="10" placeholder="Beskriv vad du vill uppleva" required id="description"></textarea>
                </div>
                <div class="mb-6">
                    <label for="priority" class="block text-md font-medium mb-1">Välj prioritet:</label>

                    <select id="priority" name="priority" class="rounded-md bg-white border p-2 cursor-pointer">
                        <option value="1">1 - Hög</option>
                        <option value="2">2 - Medel</option>
                        <option value="3">3 - Låg</option>
                    </select>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-full bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 mt-4 text-center rounded cursor-pointer">Lägg till sak</button>
                </div>
            </fieldset>
        </form>
    </section>
    <?php if ($notification): ?>
        <div id="notification" class="flex items-center gap-1 bg-green-300 p-6 right-5 fixed bottom-5 z-50 w-full max-w-48 text-center shadow-lg "><span class="material-symbols-outlined">
                add_task
            </span>
            <p class="font-bold whitespace-nowrap">Ny sak tillagd!</p>
        </div>
    <?php endif; ?>
</main>

<?php include_once("includes/components/footer.php") ?>
</body>

</html>