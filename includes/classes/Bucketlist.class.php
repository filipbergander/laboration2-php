<?php

class Bucketlist
{
    // Variabler
    private mysqli $db;
    private string $name;
    private string $description;
    private int $priority;

    // Initierar ett nytt objekt med konstruktorn
    function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($this->db->connect_errno > 0) {
            die("Anslutningen misslyckades: " . $this->db->connect_error);
        }
    }
    // Lägger till en ny bucketlist-post i databasen
    public function addBucketItem(string $name, string $description, int $priority): bool
    {
        // Validerar inputsen innan en ny post skapas
        if (!$this->setName($name)) return false;
        if (!$this->setDescription($description)) return false;
        if (!$this->setPriority($priority)) return false;

        // Lägger till den nya posten i databasen
        $sql = "INSERT INTO bucketlist (name, description, priority) VALUES ('" . $this->name . "', '" . $this->description . "', '" . $this->priority . "');";

        return mysqli_query($this->db, $sql);
    }
    // Hämtar alla bucketlist-poster från databasen
    public function getBucketItems(): string
    {
        return $this->name . " - " . $this->description . " - " . $this->priority;
    }
    // Hämtar en specifik bucketlist-post från databasen baserat på Id
    public function getBucketItemById(int $id): array {}
    // Tar bort en bucketlist-post från databasen
    public function deleteBucketItem(int $id): bool
    {
        return true;
    }
    // Uppdaterar en befintlig bucketlist-post i databasen
    public function updateBucketItem(int $id, string $name, string $description, int $priority): bool
    {
        return true;
    }

    // Sätter namnet om det är längre än 0 tecken, annars -> false
    public function setName(string $name): bool
    {
        if (strlen($name) > 0) {
            $this->name = $name;
            return true;
        } else {
            return false;
        }
    }
    // Sätter beskrivning för bucketlist-posten när användaren faktiskt skrivit något (string-length över 0), annars returneras false
    public function setDescription(string $description): bool
    {
        if (strlen($description) > 0) {
            $this->description = $description;
            return true;
        } else {
            return false;
        }
    }
    // Prioritet sätts endast om den är mellan 1 och 3, annars -> false
    public function setPriority(int $priority): bool
    {
        if ($priority > 0 && $priority <= 3) {
            $this->priority = $priority;
            return true;
        } else {
            return false;
        }
    }
    // Destructor som stänger databasanslutningen
    function __destruct()
    {
        mysqli_close($this->db);
    }
}
