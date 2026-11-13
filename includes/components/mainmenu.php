<?php // Komponent som visar huvudmenyn i webbplatsen
$title = "Laboration 2";
$currentPage = basename($_SERVER['PHP_SELF']); // Namn på den sidan som användaren befinner sig på
?>
<nav class=" flex items-center justify-between font-medium text-md md:text-lg lg:text-xl bg-gray-700 text-white p-5 ml-auto w-full">
    <a class="flex justify-start text-md md:text-xl lg:text-2xl text-yellow-200" href="index.php"> <?= $title ?> </a>
    <ul class="flex justify-end gap-2 md:gap-4 lg:gap-6">
        <li><a href="index.php" class="<?php if ($currentPage === 'index.php') {
                                            echo 'active';
                                        } ?> hover:text-yellow-400 shadow-lg transition-colors duration-200 ease-in-out">Hem</a></li>
        <li><a href="bucketlist.php" class="<?php if ($currentPage === 'bucketlist.php') {
                                                echo 'active';
                                            } ?> hover:text-yellow-400 shadow-lg transition-colors duration-200 ease-in-out">Bucketlist</a></li>
        <li><a href="ai.php" class="<?php if ($currentPage === 'ai.php') {
                                        echo 'active';
                                    } ?> hover:text-yellow-400 shadow-lg transition-colors duration-200 ease-in-out">AI</a></li>
    </ul>
</nav>