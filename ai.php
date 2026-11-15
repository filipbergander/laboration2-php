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
    <section class="bg-indigo-300 p-4 mb-5">
        <h2 class="text-2xl font-bold mb-6">AI-verktyg</h2>
        <article class="mb-2 bg-white p-2 rounded-md">
            <h3 class="text-lg font-bold">Stöd i uppgiften</h3>
            <p>Jag använde OpenAI och Google Gemini för att få hjälp med hur jag skulle kunna få till ett smidigt formulär för att lägga till saker i min bucketlista. Sedan använde jag ett likadant formulär, men som en annan komponent, för att uppdatera en redan tillagd sak. <br><br> AI-verktygen gav stöd i hur jag kunde få till en prydlig övergång när formuläret skulle skickas. Jag valde först att inte stänga formuläret när en användare ska lägga till en sak och skicka in datan, eftersom det då blev enklare att lägga till fler saker samtidigt i sin Bucketlist. Däremot valde jag i slutändan att stänga formuläret direkt efter att användaren klickat på knappen "Lägg till sak". Jag tänkte att det var mer tydligt och gynnade användarupplevelse.<br><br> Inför och under laborationen studerade jag igenom kursföreläsningar under moduler på Canvas samt <a href="https://www.phptutorial.net/" target="_blank" rel="noopener noreferrer" class=" text-purple-700 underline hover:text-black">PHP Tutorial</a>, dessa var till stor hjälp för att skapa databasen. Jag valde sedan att göra förändringar tillsammans med AI-verktygen och den faktiska PHP-hemsidan: <a href="https://www.php.net" target="_blank" rel="noopener noreferrer" class=" text-purple-700 underline hover:text-black">PHP Prepared Statements</a>. Till exempel genom att lägga till prepared statements efter SQL-frågor.</p>
        </article>
        <article class="mb-2 bg-white p-2 rounded-md">
            <h3 class="text-lg font-bold">Slutsatser av AI som stöd</h3>
            <p>Genom AI-verktygen blev mitt arbete mer effektivt, dock kände jag som helhet att det tog längre tid än vad jag trodde i denna uppgift. Jag la ner mycket tid på design och flöde i bucketlist-hanteringen. Exempelvis för validering och i en funktion som visar ett dynamiskt notifikationsmeddelande när en användare lägger till, tar bort eller uppdaterar en sak i sin bucketlista.<br><br> Trots all möjlighet att använda AI-verktygen, var det fortfarande jag som skulle skapa webbplatsen, och det var jag som behövde förstå flödet för användaren. AI kan inte testa min webbplats för felmeddelanden och inte heller se hur användaren faktiskt interagerar med den eller hur exempelvis formuläret uppfattas i verkligheten. </p>
        </article>
    </section>
</main>
<?php
// Visar footer
include_once("includes/components/footer.php") ?>
</body>

</html>