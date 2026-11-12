<?php
require_once("../includes/config.php");
initConfig();
// Ansluter till databasen
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//$db = new mysqli("localhost", "bucketlist", "rootroot", "bucketlist");

// Kontrollerar om anslutningen lyckades eller inte
if ($db->connect_errno > 0) {
    die("Anslutningen misslyckades: " . $db->connect_error);
}

$sql = "Drop TABLE IF EXISTS bucketlist;";

$sql .= "
CREATE TABLE IF NOT EXISTS bucketlist(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    description TEXT NOT NULL,
    priority int NOT NULL CHECK (priority >= 1 AND priority <= 3),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    );
";

echo "<pre>$sql</pre>";

if ($db->multi_query($sql)) {
    echo "Tabellen bucketlist installerades!";
} else {
    echo "Fel när tabellen försökte skapas: " . $db->error;
}
