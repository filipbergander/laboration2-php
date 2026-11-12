<?php
require_once("includes/config.php"); // Hämtar in konfigurationsfilen
initConfig(); // Kör konfigurationen
$title = "Bucketlist | PHP";
$headline = "Bucketlist";
include_once("includes/components/header.php");
include_once("includes/components/mainmenu.php");
$bucketlist = new Bucketlist(); // Skapar ett ny instans
$editMode = false;
if (isset($_GET['deleteid'])) {
    $deleteid = intval($_GET['deleteid']);

    if ($bucketlist->deleteBucketItem($deleteid)) {
        echo "<p class='text-green-700 font-semibold'>Bucketlist-posten med ID $deleteid har raderats.</p>";
    } else {
        echo "<p class='text-red-700 font-semibold'>Misslyckades med att radera bucketlist-posten med ID $deleteid.</p>";
    }
}
?>

<main class="w-full mx-auto max-w-7xl mt-5">
    <?php include_once("includes/components/headline.php"); ?>

    <section class="mx-auto max-w-3xl shadow-md my-4 max-w-lg p-2 rounded-lg p-3 md:p-10 bg-white">
        <h2 class="text-2xl font-bold mb-4">Min bucketlist</h2>
        <p class="text-left text-gray-600 mb-2">Vad drömmer du om att göra?</p>
        <button id="add-item-modal" class="bg-blue-700 hover:bg-green-700 text-white font-bold py-2 px-4 rounded cursor-pointer transition-colors duration-200 ease-in-out">Lägg till ny sak</button>
        <div id="modal" class="<?= isset($_POST['name']) ? '' : 'hidden' ?> fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 w-full">
            <div class="w-full max-w-2xl p-6">
                <?php include_once("includes/components/addform.php") ?>
            </div>
        </div>
    </section>

    <section class="mx-auto bg-gray-100 p-4 rounded-lg shadow-md max-w-5xl mt-5 mb-5">
        <h2 class="text-2xl font-bold mb-4">Tillagda drömmar och mål:</h2>
        <?php
        $bucketItems = $bucketlist->getBucketItems();
        if (!empty($bucketItems)) : ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <?php foreach ($bucketItems as $item) : ?>
                    <article class="bg-green-200 p-4 mb-4 rounded-md shadow-md">
                        <h3 class="text-lg font-bold mb-2"><?= htmlspecialchars($item['name']) ?></h3>
                        <p class="mb-2 text-pretty break-words"><?= htmlspecialchars($item['description']) ?></p>
                        <p class="text-sm text-gray-800">Prioritet: <?= htmlspecialchars($item['priority']) ?></p>
                        <p class="text-sm text-gray-800 mt-5">Tillagd: <?= date('Y-m-d', strtotime(htmlspecialchars($item['created_at']))) ?></p>
                        <div class="flex items-center justify-end gap-5 mt-4">
                            <a href="bucketlist.php?editid=<?= $item['id'] ?>" class="flex items-center text-black font-bold"><span class="material-symbols-outlined">
                                    edit
                                </span>Redigera</a>
                            <a href="bucketlist.php?deleteid=<?= $item['id'] ?>" class='flex items-center text-red-500 font-bold'><span class="material-symbols-outlined">
                                    delete
                                </span>Radera</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="text-red-700 font-semibold">Din bucketlist är tom. Lägg till en ny sak!</p>
        <?php endif; ?>
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