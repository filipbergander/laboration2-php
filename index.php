<?php
$title = "Startsida | PHP";
include_once("includes/header.php");
?>
<body>  
    <?php include_once("includes/mainmenu.php") ?>
    <div>
        <h1>
            Information om uppgift 2
        </h1>
    </div>
  
    
    <?php
    include("includes/classes/Bucketlist.class.php");
    $bucketlist = new Bucketlist("Filip", "Lära mig PHP", 1);
    echo $bucketlist->getBucketList();
    ?>

    <main class="container mt-4 mx-auto px-4 py-8">
        <h2>Reflektioner kring PHP-språket</h2>
        <article>
            <h3 class="mt-4">Fördelar och nackdelar med PHP</h3>
            <p></p>
        </article>
        <article>
            <h3></h3>
            <p></p>
        </article>
        <article>
            <h3></h3>
            <p></p>
        </article>

    </main>
    <?php include_once("includes/footer.php") ?>
</body>

</html>