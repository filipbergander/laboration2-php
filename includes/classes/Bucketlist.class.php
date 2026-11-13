<?php
class Bucketlist
{
    // Variabler
    private BucketStorage $storage;
    private string $name;
    private string $description;
    private int $priority;

    // Initierar ett nytt Bucketstorage-objekt med konstruktorn
    function __construct(BucketStorage $storage)
    {
        $this->storage = $storage;
    }
    // Lägger till en ny bucketlist-post
    public function addBucketItem(string $name, string $description, int $priority): bool
    {
        // Validerar inputsen med set-metoderna innan en ny post skapas
        if (!$this->setName($name)) return false;
        if (!$this->setDescription($description)) return false;
        if (!$this->setPriority($priority)) return false;

        return $this->storage->insertBucketItem($this->name, $this->description, $this->priority);
    }
    // Hämtar alla bucketlist-poster
    public function getBucketItems(): array
    {
        return $this->storage->fetchBucketItems();
    }
    // Hämtar en specifik bucketlist-post baserat på Id
    public function getBucketItemById(int $id): array
    {
        $id = intval($id);
        return $this->storage->fetchBucketItemById($id);
    }
    // Tar bort en bucketlist-post
    public function deleteBucketItem(int $id): bool
    {
        $id = intval($id);
        return $this->storage->removeBucketItem($id);
    }
    // Uppdaterar en befintlig bucketlist-post
    public function updateBucketItem(int $id, string $name, string $description, int $priority): bool
    {
        // Validerar inputsen med set-metoderna innan en ny post uppdateras
        if (!$this->setName($name)) return false;
        if (!$this->setDescription($description)) return false;
        if (!$this->setPriority($priority)) return false;

        $id = intval($id);

        return $this->storage->saveBucketItemChanges($id, $this->name, $this->description, $this->priority);
    }

    // Sätter namnet om det är längre än 0 tecken, annars -> false
    public function setName(string $name): bool
    {
        if (strlen($name) >= 3 && strlen($name) < 40) {
            $this->name = $name;
            return true;
        } else {
            return false;
        }
    }
    // Sätter beskrivning för bucketlist-posten när användaren faktiskt skrivit något (string-length över 0), annars returneras false
    public function setDescription(string $description): bool
    {
        if (strlen($description) > 0 && strlen($description) < 400) {
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
}
