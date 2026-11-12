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
        <button id="add-item-modal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">Lägg till ny sak</button>
        <div id="modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 w-full">
            <div class="w-full max-w-2xl p-6">
                <?php include_once("includes/components/addform.php") ?>
            </div>
        </div>
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