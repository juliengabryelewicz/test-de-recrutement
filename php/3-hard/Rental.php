<?php

declare(strict_types=1);

namespace App;

class Rental
{

    private Movie $movie;
    private int $daysRented;
    
    /**
     * __construct
     *
     * @param  Movie $movie
     * @param  int $daysRented
     * @return void
     */
    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }
    
    /**
     * getMovie
     *
     * @return Movie
     */
    public function getMovie(): Movie
    {
        return $this->movie;
    }
    
    /**
     * getDaysRented
     *
     * @return int
     */
    public function getDaysRented(): int
    {
        return $this->daysRented;
    }
    
    /**
     * Calcul du prix en fonction du type de location ainsi que du nombre de jours
     *
     * @return float
     */
    public function calculateRentalAmount(): float
    {
        $rentalAmount = 0.0;

        switch($this->movie->getPriceCode()) {
            case Movie::REGULAR:
                $rentalAmount += 2;
                if($this->daysRented > 2)
                    $rentalAmount += ($this->daysRented - 2) * 1.5;
                break;
            case Movie::NEW_RELEASE:
                $rentalAmount += $this->daysRented * 3;
                break;
            case Movie::CHILDREN:
                $rentalAmount += 1.5;
                if($this->daysRented > 3)
                    $rentalAmount += ($this->daysRented - 3) * 1.5;
                break;
             default:
                throw new \Exception("false Price Code sent for ".$this->movie->getTitle());
        }

        return $rentalAmount;
    }
    
    /**
     * Calcul des renter points avec une condition spécifique pour les nouvelles sorties
     *
     * @param  float $frequentRenterPoints
     * @return void
     */
    public function calculateRenterPoints(float &$frequentRenterPoints): void
    {
        $frequentRenterPoints++;

        if($this->movie->getPriceCode() == Movie::NEW_RELEASE
             && $this->daysRented > 1)
            $frequentRenterPoints++;
    }

}