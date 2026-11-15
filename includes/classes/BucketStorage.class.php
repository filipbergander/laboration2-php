<?php

class BucketStorage
{
    private mysqli $db;

    // Initierar ett nytt objekt med konstruktorn
    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }
    // Lägger till en ny bucketlist-post i databasen
    public function insertBucketItem(string $name, string $description, int $priority): bool
    {
        try {
            $sql = "INSERT INTO bucketlist (name, description, priority) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("ssi", $name, $description, $priority);
            return $stmt->execute();
        } catch (mysqli_sql_exception) {
            return false;
        }
    }
    // Uppdaterar en befintlig bucketlist-post i databasen
    public function saveBucketItemChanges(int $id, string $name, string $description, int $priority): bool
    {
        $id = intval($id);
        try {
            $sql = "UPDATE bucketlist SET name = ?, description = ?, priority = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("ssii", $name, $description, $priority, $id);
            return $stmt->execute();
        } catch (mysqli_sql_exception) {
            return false;
        }
    }
    // Tar bort en bucketlist-post från databasen
    public function removeBucketItem(int $id): bool
    {
        $id = intval($id);
        try {
            $sql = "DELETE FROM bucketlist WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        } catch (mysqli_sql_exception) {
            return false;
        }
    }
    // Hämtar alla bucketlist-poster från databasen
    public function fetchBucketItems(): ?array
    {
        try {
            $sql = "SELECT * FROM bucketlist ORDER BY priority ASC";
            $result = $this->db->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (mysqli_sql_exception) {
            return null;
        }
    }
    // Hämtar en specifik bucketlist-post från databasen baserat på Id
    public function fetchBucketItemById(int $id): ?array
    {
        $id = intval($id);
        try {
            $sql = "SELECT * FROM bucketlist WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } catch (mysqli_sql_exception) {
            return null;
        }
    }

    // Destructor som stänger databasanslutningen
    public function __destruct()
    {
        mysqli_close($this->db);
    }
}
