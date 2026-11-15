<?php
// Visar komponenter i UI
$title = "Startsida | PHP";
$headline = "Hem";
include_once("includes/components/header.php");
include_once("includes/components/mainmenu.php");
?>


<?php
// Hämtar in klass-filen
include("includes/classes/Bucketlist.class.php");
?>

<main class="container w-full mx-auto max-w-lg mt-5">
    <?php
    // Visar rubrik
    include_once("includes/components/headline.php"); ?>
    <section class="bg-amber-500 p-4 mb-5">
        <h2 class="text-2xl font-bold mb-6">Information Uppgift 2</h2>
        <article class="mb-2 bg-white p-2 rounded-md">
            <h3 class="text-lg font-bold">Hur upplever jag PHP?</h3>
            <p>Uppgiften går ut på att skapa en webbplats med PHP och en MYSQL-databas. På sidan <b>Hem</b> visas information om uppgiften och min reflektion kring PHP-språket.<br><br> På sidan <b>AI</b> visas information om hur jag använt AI-verktyg som stöd i webbplatsens utformning.<br><br>På sidan <b>Bucketlist</b> visas min lista över saker som jag vill göra, kan handla om drömmar och mål. Däremot valde jag att enbart lägga till två saker hittills.. Det finns möjlighet att lägga till fler saker genom ett formulär, sedan kan man även ta bort eller uppdatera saker från befintliga poster. <br><br>Jag valde att skapa databasen genom objektorienterad PHP med klasser och metoder, samt "mysqli" för att ansluta till databasen.<br><br> ER- och UML-diagram skapades för att visa databasens struktur och klasserna med metoder.</p>
        </article>
    </section>
    <section class="bg-amber-500 p-4 mb-5">
        <h2 class="text-2xl font-bold mb-6">Reflektioner kring PHP-språket</h2>
        <article class="mb-2 bg-white p-2 rounded-md">
            <h3 class="text-lg font-bold">Hur upplever jag PHP?</h3>
            <p>PHP upplevs som ett ganska enkelt språk att komma igång med, särskilt när man kan integrera HTML-kod tillsammans med PHP-kod. Däremot upplevde jag syntaxen som lite krånglig ibland, särskilt när man arbetar med interpolation och variabler. Till exempel med alla punkter och citiationstecken, "" och '', som ibland kan behövas. <br><br> Att bara infoga en variabel i HTML-koden var dock simpelt.</p>
        </article>
        <article class="mb-2 bg-white p-2 rounded-md">
            <h3 class="text-lg font-bold">Fördelar och nackdelar med PHP</h3>
            <p><b>Fördel:</b> Kändes smidigt att skapa egna komponenter och återanvända koden på olika sidor i webbplatsen. Hanteringen av hela webbplatsen blev mer strukturerad genom komponenterna. Det var också enkelt att hantera databasanslutningar och utföra databasoperationer samt ändra dem i efterhand. Felmeddelanden som visas är tydliga och hjälpsamma, jag använde "var_dump" för att felsöka mycket av min kod.<br><br>
                <b>Nackdel:</b> Det var dock lite längre syntax jämfört med C# för att skapa databasanslutningar, exempelvis när SQL-kommandon behövde skrivas i koden. Å andra sidan är SQL-koden tydlig i vad den gör, men att i C# är det mer förenklat. Tycker även att i C# är det smidigare att skriva getters och setters.
            </p>
        </article>
    </section>
</main>
<?php
// Visar footer
include_once("includes/components/footer.php") ?>
</body>

</html>