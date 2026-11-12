<?php
$title = "Laboration 2 | PHP";
?>
    <nav class=" flex items-center justify-between font-medium text-lg bg-gray-700 text-white p-5 ml-auto w-full">
        <a class="flex justify-start text-2xl text-yellow-200" href="index.php"> <?= $title ?> </a>
        <ul class="flex justify-end gap-4">
            <li><a href="index.php" class="hover:text-yellow-400 shadow-lg transition-colors duration-200 ease-in-out">Startsidan</a></li>
            <li><a href="bucketlist.php" class="hover:text-yellow-400 shadow-lg transition-colors duration-200 ease-in-out">Bucketlist</a></li>
            <li><a href="ai.php" class="hover:text-yellow-400 shadow-lg transition-colors duration-200 ease-in-out">AI-sidan</a></li>
        </ul>
    </nav>