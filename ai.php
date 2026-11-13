<?php
// Visar komponenter i UI
$title = "AI för utveckling | PHP";
$headline = "AI för utveckling";
include_once("includes/components/header.php");
include_once("includes/components/mainmenu.php");
?>
<main class="w-full mx-auto max-w-lg mt-5">
    <?php
    // Visar rubrik
    include_once("includes/components/headline.php"); ?>
    <section class="bg-indigo-300 p-4">
        <h2 class="text-2xl font-bold mb-6">AI-verktyg</h2>
        <article class="mb-2 bg-white p-2 rounded-md">
            <h3 class="text-lg font-bold">Stöd i uppgiften</h3>
            <p>Jag valde</p>
        </article>
        <article class="mb-2 bg-white p-2 rounded-md">
            <h3 class="text-lg font-bold">Slutsatser av AI som stöd</h3>
            <p>Testtest</p>
        </article>
        <article class="mb-2 bg-white p-2">
            <h3 class="text-lg font-bold">Test</h3>
            <p>test</p>
        </article>
    </section>
</main>
<?php
// Visar footer
include_once("includes/components/footer.php") ?>
</body>

</html>