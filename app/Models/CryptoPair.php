<?php


namespace App\Models;

use Carbon\Carbon;

class CryptoPair
{
    private string $symbol;
    private float $price;
    private float $volume;
    private float $volumeChange;
    private float $percentChange;


    public function __construct(
        string $symbol,
        float $price,
        float $volume,
        float $volumeChange,
        float $percentChange

    )
    {
        $this->symbol = $symbol;
        $this->price = $price;
        $this->volume = $volume;
        $this->volumeChange = $volumeChange;
        $this->percentChange = $percentChange;

    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }


    public function getPercentChange(): float
    {
        return $this->percentChange;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }


    public function getVolumeChange(): float
    {
        return $this->volumeChange;
    }
}
