    <?php
    $notification = false;
    $errors = [];
    $bucketlist = new Bucketlist();
    $name = "";
    $description = "";
    $priority = 1;
    if (isset($_POST["name"])) {
        $name = trim($_POST["name"]);
        $description = trim($_POST["description"]);
        $priority = $_POST["priority"];
        $success = true;

        if (!$bucketlist->setName($name)) {
            // Lägg till felmeddelande i arrayen
            $success = false;
            $errors[] = "Namnet måste vara mellan 3 och 40 tecken.";
        }
        if (!$bucketlist->setDescription($description)) {
            // Lägg till felmeddelande i arrayen
            $success = false;
            $errors[] = "Beskrivningen måste vara mellan 1 och 400 tecken.";
        }
        if (!$bucketlist->setPriority($priority)) {
            // Lägg till felmeddelande i arrayen
            $success = false;
            $errors[] = "Prioritet måste vara mellan 1 och 3.";
        }

        if ($success) {
            if ($bucketlist->addBucketItem($name, $description, $priority)) {
                $notification = true;
                $name = "";
                $description = "";
                $priority = 1;
                $errors = [];
            } else {
                $errors[] = "Fel när saken skulle lagras...";
                $notification = false;
            }
        } else {
            echo "<p class='error-msg'>Saken kunde inte lagras... Kontrollera inmatade värden.</p>";
            $errors[] = "Fel när saken skulle lagras...";
            $notification = false;
        }
    }
    ?>
    <form method="post" action="" class="rounded-xl bg-green-200 shadow-md p-6 backdrop-blur-3xl">
        <fieldset class="space-y-5">
            <legend class="mb-4 text-xl font-semibold">Lägg till en ny sak i din Bucketlist</legend>
            <div>
                <label for="name" class="block text-md font-medium mb-1">Skriv namn:</label>
                <input type="text" id="name" name="name" class="bg-white rounded-md p-2 w-full"
                    maxLength="40" placeholder="Vad vill du göra?" value="<?= htmlspecialchars($name) ?>">
            </div>
            <div>
                <label class="block text-md font-medium mb-1" for="description">Skriv beskrivning: </label>
                <textarea name="description" class="w-full p-2 resize-y bg-white rounded-md focus:border-green-300" rows="10" placeholder="Beskriv vad du vill uppleva" maxlength="400" id="description"><?= htmlspecialchars($description) ?></textarea>
            </div>
            <div class="mb-6">
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
                        <?php foreach ($errors as $error) : ?>
                            <li class="text-red-700 font-semibold mb-1">
                                <?= htmlspecialchars($error) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="flex justify-center w-full mt-6">
                <button
                    id="reset-btn"
                    type="reset"
                    class="flex items-center gap-1 w-fit p-2 bg-gray-200 border-2 hover:bg-white text-gray-800 rounded-md transition-colors duration-200 ease-in-out cursor-pointer">
                    <span class="material-symbols-outlined">
                        refresh
                    </span>
                    Återställ formulär
                </button>
            </div>
            <div class="flex justify-center gap-5">
                <button type="submit" class="flex items-center gap-1 w-fit bg-blue-700 hover:bg-green-800 text-white font-bold py-4 px-4 mt-4 text-center rounded cursor-pointer transition-colors duration-200 ease-in-out"><span class="material-symbols-outlined">
                        add
                    </span>Lägg till sak</button>
                <button type="button" id="cancel-btn" class="flex items-center gap-1 w-fit bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 mt-4 text-center rounded cursor-pointer transition-colors duration-200 ease-in-out"><span class="material-symbols-outlined">
                        hide
                    </span>Stäng formulär</button>
            </div>
            <button type="button" aria-label="Stäng formulär" id="close-modal" class="absolute top-0 right-0 p-2 cursor-pointer"><span class="material-symbols-outlined text-4xl">
                    close
                </span></button>
        </fieldset>
    </form>