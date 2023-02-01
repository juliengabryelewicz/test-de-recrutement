<?php

declare(strict_types=1);

namespace App;

class Customer
{

    private string $name;
    private array $rentals = [];
    
    /**
     * __construct
     *
     * @param  string $name
     * @return void
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    
    /**
     * Ajout d'une location liée au client
     *
     * @param  Rental $rental
     * @return void
     */
    public function addRental(Rental $rental): void
    {
        $this->rentals[] = $rental;
    }
    
    /**
     * Affichage de la fiche client avec ses points gagnés et ce qu'il doit
     *
     * @return string
     */
    public function statement(): string 
    {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->name . "\n";

        foreach ($this->rentals as $rental){
           $rentalAmount = $rental->calculateRentalAmount();
           $rental->calculateRenterPoints($frequentRenterPoints);

            $result .= "\t" . $rental->getMovie()->getTitle() . "\t"
                . number_format($rentalAmount, 1) . "\n";
            $totalAmount += $rentalAmount;
        }

        $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }
}