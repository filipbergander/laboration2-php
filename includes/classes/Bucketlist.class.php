<?php

class Bucketlist
{
    // Variabler
    private $name;
    private $description;
    private $priority;

    // Initierar ett nytt objekt
    function __construct(string $name, string $description, int $priority)
    {
        $this->name = $name;
        $this->description = $description;
        $this->priority = $priority;
    }

    public function getBucketList(): string
    {
        return $this->name . " - " . $this->description . " - " . $this->priority;
    }
}
