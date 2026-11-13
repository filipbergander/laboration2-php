    <!-- Komponent som visar formuläret för att lägga till en ny sak i bucketlistan -->
    <?php
    if (!isset($notification)) $notification = false;
    if (!isset($errors)) $errors = [];
    if (!isset($bucketlist)) $bucketlist = new Bucketlist();
    $name = "";
    $description = "";
    $priority = 1;

    // När användaren skapar en ny post i bucketlistan, valideras inputsen och läggs till i databasen
    if (isset($_POST["name"])) {
        $name = trim($_POST["name"]);
        $description = trim($_POST["description"]);
        $priority = $_POST["priority"];
        $success = true;

        // Lägger till felmeddelanden när inputs inte valideras korrekt
        if (!$bucketlist->setName($name)) {
            $success = false;
            $errors[] = "Namnet måste vara mellan 3 och 40 tecken.";
        }
        if (!$bucketlist->setDescription($description)) {
            $success = false;
            $errors[] = "Beskrivningen måste vara mellan 1 och 400 tecken.";
        }
        if (!$bucketlist->setPriority($priority)) {
            $success = false;
            $errors[] = "Prioritet måste vara mellan 1 och 3.";
        }
        // Om inga felmeddelanden finns -> lägg till en ny post
        if ($success) {
            $result = $bucketlist->addBucketItem($name, $description, $priority);
            // Om det gick bra att lägga till en ny post
            if ($result) {
                // Skickar med action i url:en för att visa ett meddelande om att posten har lagts till
                echo "<script>window.location.href = 'bucketlist.php?action=added';</script>";
                exit;
                /*$notification = true;
                $name = "";
                $description = "";
                $priority = 1;
                $errors = [];*/
            }
            // Annars visa felmeddelande
            else {
                $errors[] = "Fel när saken skulle lagras...";
                $notification = false;
                $notificationMsg = "Kunde inte lägga till saken...";
                $notificationIcon = "error";
                $notificationError = true;
            }
        }
    }
    ?>
    <form method="post" action="bucketlist.php" id="bucketlist-form" class="w-full max-w-full min-w-0 rounded-xl bg-green-200 shadow-md p-2 sm:p-6 backdrop-blur-3xl">
        <fieldset class="space-y-5">
            <legend class="block w-full mb-4 text-xl hyphens-auto font-semibold wrap-break-word"><?= $editMode ? "Redigera sak" : "Lägg till ny sak" ?></legend>
            <div class="w-full min-w-0">
                <label for="name" class="block text-md font-medium mb-1">Skriv namn:</label>
                <input type="text" id="name" name="name" class="block w-full min-w-0 bg-white rounded-md p-2"
                    maxLength="40" placeholder="Vad vill du göra?" value="<?= htmlspecialchars($name ?? '') ?>">
            </div>
            <div class="w-full min-w-0">
                <label class="block text-md font-medium mb-1" for="description">Skriv beskrivning: </label>
                <textarea name="description" class="block w-full min-w-0 max-w-full box-border p-2 resize-y bg-white rounded-md focus:border-green-300" rows="8" placeholder="Beskriv vad du vill uppleva" maxlength="400" id="description"><?= htmlspecialchars($description ?? '') ?></textarea>
            </div>
            <div class="w-full min-w-0 mb-6">    
                <label for="priority" class="block text-md font-medium mb-1">Välj prioritet:</label>
                <select id="priority" name="priority" class="rounded-md bg-white border p-2 cursor-pointer">
                    <option value="1" <?= $priority == 1 ? 'selected' : '' ?>>1 - Hög</option>
                    <option value="2" <?= $priority == 2 ? 'selected' : '' ?>>2 - Medel</option>
                    <option value="3" <?= $priority == 3 ? 'selected' : '' ?>>3 - Låg</option>
                </select>
            </div>
            <div id="error-messages">
                <?php if (!empty($errors)) : ?>
                    <ul class="list-disc list-inside">
                        <!-- Skriver ut felmeddelanden -->
                        <?php foreach ($errors as $error) : ?>
                            <li class="text-red-700 font-semibold mb-1">
                                <?= htmlspecialchars($error) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="flex justify-center w-end sm:w-full mt-6">
                <button
                    id="reset-btn"
                    type="button"
                    class="flex items-center gap-1 w-fit p-2 bg-gray-200 border-2 hover:bg-white text-gray-800 rounded-md transition-colors duration-200 ease-in-out cursor-pointer">
                    <span class="material-symbols-outlined">
                        refresh
                    </span>
                    Återställ formulär
                </button>
            </div>
            <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-5 w-full min-w-0 text-center">
                <button type="submit" class="flex items-center justify-center gap-1 w-full sm:w-fit bg-blue-700 hover:bg-green-800 text-white text-center font-bold py-4 px-4 mt-4 rounded cursor-pointer transition-colors duration-200 ease-in-out"><span class="material-symbols-outlined">
                        add
                    </span><?= $editMode ? "Spara ändringar" : "Lägg till sak" ?></button>
                <button type="button" id="cancel-btn" class="flex items-center justify-center gap-1 w-full sm:w-fit bg-gray-600 hover:bg-gray-800 text-white font-bold py-4 px-4 mt-4 text-center rounded cursor-pointer transition-colors duration-200 ease-in-out"><span class="material-symbols-outlined">
                        hide
                    </span>Stäng formulär</button>
            </div>
            <button type="button" aria-label="Stäng formulär" id="close-modal" class="absolute top-0 right-0 p-2 cursor-pointer"><span class="material-symbols-outlined text-4xl">
                    close
                </span></button>
        </fieldset>
    </form>