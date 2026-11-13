<?php
// Hämtar in konfigurationsfilen och kör konfigurationen
require_once("includes/config.php");
initConfig();

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$storage = new BucketStorage($db);
// Skapar en ny instans av bucketlist och nollställer variabler för redigeringsläge
$bucketlist = new Bucketlist($storage);
$editId = "";
$editDescription = "";
$editName = "";
$editPriority = 1;
$editMode = false;

// Sätter standarvärden för notifkationsmeddelandet
$notification = false;
$notificationMsg = "Ny sak tillagd!";
$notificationIcon = "add_task";
$notificationError = false; // För att visa en röd eller grön meddelande ruta

// Funktion för visa ett meddelande när en sak har lagts till, uppdaterats eller raderats
function displayNotification(string $message, string $icon, bool $isError = false)
{
    $backgroundColor = $isError ? 'bg-red-300' : 'bg-green-300'; ?>
    <div id="notification" class="flex items-center justify-center gap-1 <?= $backgroundColor ?> p-6 right-5 fixed bottom-5 z-50 w-full max-w-fit px-8 text-center shadow-lg rounded-md">
        <span class="material-symbols-outlined">
            <?= htmlspecialchars($icon) ?>
        </span>
        <p class="font-bold whitespace-nowrap">
            <?= htmlspecialchars($message) ?>
        </p>
    </div>
<?php }


// Raderar en bucketlist-post om deleteid har skickats med i url:en
if (isset($_GET['deleteid'])) {
    $deleteid = intval($_GET['deleteid']);
    $notification = true;

    if ($bucketlist->deleteBucketItem($deleteid)) {
        $notificationMsg = "Saken raderades!";
        $notificationIcon = "delete";
        $notificationError = false;
        // Tar bort deleteid:et från url:en
        echo "<script>window.history.replaceState({}, document.title, window.location.pathname)</script>";
    } else {
        // Visar en röd bakgrundsfärg och annan text om raderingen skulle misslyckas
        $notificationMsg = "Misslyckades med att radera saken.";
        $notificationIcon = "error";
        $notificationError = true;
    }
}

// Om ett editid har skickats med i url:en, hämtar den specifika posten och fyller i formuläret med värdena
if (isset($_GET['editid'])) {
    $editId = intval($_GET['editid']);
    $item = $bucketlist->getBucketItemById($editId);
    $editName = $item['name'];
    $editDescription = $item['description'];
    $editPriority = $item['priority'];
    $editMode = true;
}
// När användaren sparar ändringarna 
else if (isset($_POST['editid'])) {
    $editId = intval($_POST['editid']);
    $editMode = true;
}

// Om en action har skickats med i url:en, visar den ett meddelande beroende på vad som har gjorts (added, edited, deleted)
if (isset($_GET['action'])) {
    $notification = true;
    $notificationError = false;

    if ($_GET['action'] === 'added') {
        $notificationMsg = "Ny sak tillagd!";
        $notificationIcon = "add_task";
    } elseif ($_GET['action'] === 'edited') {
        $notificationMsg = "Ändringarna sparades!";
        $notificationIcon = "work_update";
    } elseif ($_GET['action'] === 'deleted') {
        $notificationMsg = "Saken raderades!";
        $notificationIcon = "delete";
    }
    // Tar bort action-delens namn i url:en,
    echo "<script>window.history.replaceState({}, document.title, window.location.pathname)</script>";
}
?>
<?php
// Visar komponenter för header och huvudmenyn
$title = "Bucketlist | PHP";
$headline = "Bucketlist";
include_once("includes/components/header.php");
include_once("includes/components/mainmenu.php");
?>
<main class="w-full mx-auto max-w-7xl mt-5">
    <?php
    // Visar rubrik
    include_once("includes/components/headline.php"); ?>
    <section class="mx-auto shadow-md my-4 max-w-lg rounded-lg p-3 md:p-10 bg-white">
        <h2 class="text-2xl font-bold mb-4">Min bucketlist</h2>
        <p class="text-left text-gray-600 mb-2">Vad drömmer du om att göra?</p>
        <button id="add-item-modal" class="bg-blue-700 hover:bg-green-700 text-white font-bold py-2 px-4 rounded cursor-pointer transition-colors duration-200 ease-in-out">Lägg till ny sak</button>
        <div id="modal" class="<?= ($editMode || isset($_POST['name']) || isset($_POST['editid']) ? '' : 'hidden') ?> fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 w-full">
            <div class="w-full max-w-2xl p-6">
                <?php
                if ($editMode) {
                    include("includes/components/editform.php");
                }
                if (!$editMode) {
                    include("includes/components/addform.php");
                }
                ?>
            </div>
        </div>
    </section>
    <section class="mx-auto bg-gray-100 p-4 rounded-lg shadow-md max-w-5xl mt-5 mb-5">
        <h2 class="text-2xl font-bold mb-4">Tillagda drömmar och mål:</h2>
        <?php
        // Hämtar in alla bucketlist-poster
        $bucketItems = $bucketlist->getBucketItems();
        if (!empty($bucketItems)) : ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <?php
                // Skriver ut alla bucketlist-poster
                foreach ($bucketItems as $item) : ?>
                    <article class="bg-green-200 p-4 mb-4 rounded-md shadow-md">
                        <h3 class="text-lg font-bold mb-2"><?= htmlspecialchars($item['name']) ?></h3>
                        <p class="mb-2 text-pretty wrap-break-word"><?= htmlspecialchars($item['description']) ?></p>
                        <p class="text-sm text-gray-800">Prioritet: <?= htmlspecialchars($item['priority']) ?></p>
                        <p class="text-sm text-gray-800 mt-5">Tillagd: <?= date('Y-m-d', strtotime(htmlspecialchars($item['created_at']))) ?></p>
                        <div class="flex items-center justify-end gap-5 mt-4">
                            <a href="bucketlist.php?editid=<?= $item['id'] ?>" class="flex items-center text-black font-bold hover:text-gray-700"><span class="material-symbols-outlined">
                                    edit
                                </span>Redigera</a>
                            <a href="bucketlist.php?deleteid=<?= $item['id'] ?>" class='flex items-center text-red-500 font-bold hover:text-red-700'><span class="material-symbols-outlined">
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
    <!-- Ändrar notifikationsmeddelande beroende på radering, uppdatering eller lägga till ny sak i bucketlistan -->
    <?php
    if ($notification) {
        displayNotification($notificationMsg, $notificationIcon, $notificationError);
    }
    ?>
</main>
<?php
// Visar footern
include_once("includes/components/footer.php") ?>
</body>

</html>