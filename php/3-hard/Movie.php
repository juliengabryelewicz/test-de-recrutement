<?php

declare(strict_types=1);

namespace App;

class Movie
{
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;
    public const CHILDREN = 2;

    private string $title;
    private int $priceCode;
    
    /**
     * __construct
     *
     * @param  string $title
     * @param  int $priceCode
     * @return void
     */
    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }
    
    /**
     * getTitle
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * getPriceCode
     *
     * @return int
     */
    public function getPriceCode(): int
    {
        return $this->priceCode;
    }
}