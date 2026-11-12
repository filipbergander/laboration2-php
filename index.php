<?php
$title = "Startsida | PHP";
$headline = "Information uppgift 2";
include_once("includes/components/header.php");
include_once("includes/components/mainmenu.php");
?>


<?php
include("includes/classes/Bucketlist.class.php");
//$bucketlist = new Bucketlist("Filip", "Lära mig PHP", 1);
//echo $bucketlist->getBucketList();
?>

<main class="container w-full mx-auto max-w-lg mt-5">
    <?php include_once("includes/components/headline.php"); ?>
    <section class="bg-amber-500 p-4">
        <h2 class="text-2xl font-bold mb-6">Reflektioner kring PHP-språket</h2>
        <article class="mb-2 bg-white p-2 rounded-md">
            <h3 class="text-lg font-bold">Hur upplever jag PHP?</h3>
            <p>Jag valde</p>
        </article>
        <article class="mb-2 bg-white p-2 rounded-md">
            <h3 class="text-lg font-bold">Fördelar och nackdelar med PHP</h3>
            <p>Testtest</p>
        </article>
        <article class="mb-2 bg-white p-2">
            <h3 class="text-lg font-bold">Test</h3>
            <p>test</p>
        </article>
    </section>
</main>
<?php include_once("includes/components/footer.php") ?>
</body>

</html>