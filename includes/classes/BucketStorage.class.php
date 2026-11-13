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
        $sql = "INSERT INTO bucketlist (name, description, priority) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssi", $name, $description, $priority);
        return $stmt->execute();
    }
    // Uppdaterar en befintlig bucketlist-post i databasen
    public function saveBucketItemChanges(int $id, string $name, string $description, int $priority): bool
    {
        $id = intval($id);

        $sql = "UPDATE bucketlist SET name = ?, description = ?, priority = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssii", $name, $description, $priority, $id);
        return $stmt->execute();
    }
    // Tar bort en bucketlist-post från databasen
    public function removeBucketItem(int $id): bool
    {
        $id = intval($id);

        $sql = "DELETE FROM bucketlist WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    // Hämtar alla bucketlist-poster från databasen
    public function fetchBucketItems(): array
    {
        $sql = "SELECT * FROM bucketlist ORDER BY priority ASC";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    // Hämtar en specifik bucketlist-post från databasen baserat på Id
    public function fetchBucketItemById(int $id): array
    {
        $id = intval($id);

        $sql = "SELECT * FROM bucketlist WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Destructor som stänger databasanslutningen
    public function __destruct()
    {
        mysqli_close($this->db);
    }
}
