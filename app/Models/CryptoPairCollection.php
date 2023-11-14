<?php

namespace App\Models;




class CryptoPairCollection
{
    private array $pairs = [];

    public function add(CryptoPair $pair): void
    {
        $this->pairs[] = $pair;
    }

    public function getPairs(): array
    {
        return $this->pairs;
    }

}
