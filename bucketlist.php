<?php
require_once("includes/config.php"); // Hämtar in konfigurationsfilen
initConfig(); // Kör konfigurationen
$title = "Bucketlist | PHP";
$headline = "Bucketlist";
include_once("includes/components/header.php");
include_once("includes/components/mainmenu.php");
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

<main class="w-full mx-auto max-w-lg mt-5">
    <?php include_once("includes/components/headline.php"); ?>
    <section class="mx-auto max-w-3xl shadow-md my-4 max-w-lg p-2 rounded-lg p-3 md:p-10 bg-white">
        <h1>Min bucketlist</h1>
        <p class="text-left text-gray-600 mb-2">Vad drömmer du om att göra?</p>
        <button id="add-item-modal" class="bg-blue-700 hover:bg-green-700 text-white font-bold py-2 px-4 rounded cursor-pointer transition-colors duration-200 ease-in-out">Lägg till ny sak</button>
        <div id="modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 w-full">
            <div class="w-full max-w-2xl p-6">
                <?php include_once("includes/components/addform.php") ?>
            </div>
        </div>
    </section>
    <section class="mx-auto bg-gray-100 p-4 rounded-lg shadow-md max-w-lg mb-5">
        <h2 class="text-2xl font-bold mb-4">Saker i min bucketlist</h2>
        <?php
        $bucketItems = $bucketlist->getBucketItems();
        if (!empty($bucketItems)) {
            foreach ($bucketItems as $post) {
                echo '<div class="bg-green-200 p-4 mb-4 rounded-md shadow-md">';
                echo '<h2 class="text-lg font-bold mb-2">' . htmlspecialchars($post['name']) . '</h2>';
                echo '<p class="mb-2">' . htmlspecialchars($post['description']) . '</p>';
                echo '<p class="text-sm text-gray-600">Prioritet: ' . htmlspecialchars($post['priority']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-gray-600">Din bucketlist är tom. Lägg till en ny sak!</p>';
        }
        ?>
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