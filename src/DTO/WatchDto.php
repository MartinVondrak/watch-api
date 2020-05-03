<?php

namespace App\DTO;

class WatchDto
{
    public int $identification;
    public string $title;
    public int $price;
    public string $description;

    public function __construct(int $identification, string $title, int $price, string $description)
    {
        $this->identification = $identification;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
    }
}
