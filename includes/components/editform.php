    <?php
    $notification = false;
    $errors = [];
    $editMode = true;

    if (isset($_POST["editid"])) {
        $editId = intval($_POST['editid']);
        $name = trim($_POST["editname"]);
        $description = trim($_POST["editdescription"]);
        $priority = $_POST["editpriority"];
        $success = true;

        $editName = $name;
        $editDescription = $description;
        $editPriority = $priority;

        // Lägg till felmeddelande i arrayen
        if (!$bucketlist->setName($editName)) {
            $success = false;
            $errors[] = "Namnet måste vara mellan 3 och 40 tecken.";
        }
        if (!$bucketlist->setDescription($editDescription)) {
            $success = false;
            $errors[] = "Beskrivningen måste vara mellan 1 och 400 tecken.";
        }
        if (!$bucketlist->setPriority($editPriority)) {
            $success = false;
            $errors[] = "Prioritet måste vara mellan 1 och 3.";
        }
        // Om inga felmeddelanden har lagts till i arrayen, fortsätt med att spara ändringarna
        if ($success) {
            $result = $bucketlist->updateBucketItem($editId, $name, $description, $priority);

            if ($result) {
                echo "<script>window.location.href = 'bucketlist.php?action=edited';</script>";
                exit;
                $notification = true;
                $notificationMsg = "Ändringarna sparades!";
                $notificationIcon = "work_update";
                $notificationError = false;
                $editMode = false; // Stänger formuläret efter att ändringarna har sparats
            } else {
                $errors[] = "Fel när saken skulle lagras...";
                $notification = true;
                $notificationMsg = "Misslyckades med att spara ändringarna.";
                $notificationIcon = "error";
                $notificationError = true;
            }
        }
    }
    ?>
    <?php if ($editMode): ?>
        <form method="post" action="bucketlist.php" id="bucketlist-edit-form" class="rounded-xl bg-green-200 shadow-md p-6 backdrop-blur-3xl">
            <fieldset class="space-y-5">
                <legend class="mb-4 text-xl font-semibold">Redigera sak</legend>
                <input type="hidden" name="editid" value="<?= htmlspecialchars($editId ?? '') ?>">
                <div>
                    <label for="editname" class="block text-md font-medium mb-1">Redigera namn:</label>
                    <input type="text" id="editname" name="editname" class="bg-white rounded-md p-2 w-full"
                        maxLength="40" placeholder="Vad vill du göra?" value="<?= htmlspecialchars($editName ?? '') ?>">
                </div>
                <div>
                    <label class="block text-md font-medium mb-1" for="editdescription">Redigera beskrivning:</label>
                    <textarea name="editdescription" class="w-full p-2 resize-y bg-white rounded-md focus:border-green-300" rows="10" placeholder="Beskriv vad du vill uppleva" maxlength="400" id="editdescription"><?= htmlspecialchars($editDescription ?? '') ?></textarea>
                </div>
                <div class="mb-6">
                    <label for="editpriority" class="block text-md font-medium mb-1">Ändra prioritet:</label>
                    <select id="editpriority" name="editpriority" class="rounded-md bg-white border p-2 cursor-pointer">
                        <option value="1" <?= $editPriority == 1 ? 'selected' : '' ?>>1 - Hög</option>
                        <option value="2" <?= $editPriority == 2 ? 'selected' : '' ?>>2 - Medel</option>
                        <option value="3" <?= $editPriority == 3 ? 'selected' : '' ?>>3 - Låg</option>
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
                <!-- <div class="flex justify-center w-full mt-6">
                <button
                    id="reset-btn"
                    type="button"
                    class="flex items-center gap-1 w-fit p-2 bg-gray-200 border-2 hover:bg-white text-gray-800 rounded-md transition-colors duration-200 ease-in-out cursor-pointer">
                    <span class="material-symbols-outlined">
                        refresh
                    </span>
                    Återställ formulär
                </button>
            </div>-->
                <div class="flex justify-center gap-5">
                    <button type="submit" id="edit-submit-btn" class="flex items-center gap-1 w-fit bg-blue-700 hover:bg-green-800 text-white font-bold py-4 px-4 mt-4 text-center rounded cursor-pointer transition-colors duration-200 ease-in-out"><span class="material-symbols-outlined">
                            add
                        </span>Spara ändringar</button>
                    <button type="button" id="edit-cancel-btn" class="flex items-center gap-1 w-fit bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 mt-4 text-center rounded cursor-pointer transition-colors duration-200 ease-in-out"><span class="material-symbols-outlined">
                            hide
                        </span>Stäng formulär</button>
                </div>
                <button type="button" aria-label="Stäng formulär" id="edit-close-modal" class="absolute top-0 right-0 p-2 cursor-pointer"><span class="material-symbols-outlined text-4xl">
                        close
                    </span></button>
            </fieldset>
        </form>
    <?php else: ?>
        <script>
            document.getElementById('modal').classList.add('hidden');
            window.history.replaceState({}, document.title, window.location.pathname);
        </script>
    <?php endif; ?>