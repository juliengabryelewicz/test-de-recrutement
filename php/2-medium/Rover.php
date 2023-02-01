<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private int $x;
    private int $y;
    private string $direction;
    
    /**
     * __construct
     *
     * @param  int $x
     * @param  int $y
     * @param  string $direction
     * @return void
     */
    public function __construct(int $x, int $y, string $direction)
    {
        $this->x = $x;
        $this->y = $y;
        // On vérifie que l'on reçoit bien une direction valide
        if(in_array($direction, ["N","E","S","W"])) {
            $this->direction = $direction;
        } else {
            throw new \Exception("Invalid direction, please use N,E,S or W instead");
        }
    }

    public function __toString()
    {
        return "X: {$this->x}, Y: {$this->y}, Direction: {$this->direction} \n";
    }
    
    /**
     * Récupération de la liste d'instruction et exécution des demandes en fonction de la lettre
     *
     * @param  string $commandsSequence
     * @return void
     */
    public function receive(string $commandsSequence) : void
    {
        foreach (str_split(trim($commandsSequence)) as $index => $command) {
            switch ($command) {
                case "b":
                    $this->backward();
                    break;
                case "f":
                    $this->forward();
                    break;
                case "l":
                    $this->left();
                    break;
                case "r":
                    $this->right();
                    break;
                // Au cas où une lettre ne correspond pas, nous alertons d'un message d'erreur
                default:
                    throw new \Exception("Invalid command at letter number ".($index+1).", please use b,f,l or r instead");
            }
        }
    }

    /**
     * fonction si la commande consiste à reculer le véhicule
     *
     * @return void
    */
    private function backward() : void
    {
        switch ($this->direction) {
            case "N":
                $this->y--;
                break;
            case "E":
                $this->x--;
                break;
            case "S":
                $this->y++;
                break;
            case "W":
                $this->x++;
                break;
        }
    }

    /**
     * fonction si la commande consiste à avancer le véhicule
     *
     * @return void
    */
    private function forward() : void
    {
        switch ($this->direction) {
            case "N":
                $this->y++;
                break;
            case "E":
                $this->x++;
                break;
            case "S":
                $this->y--;
                break;
            case "W":
                $this->x--;
                break;
        }
    }
    
    /**
     * fonction si la commande consiste à tourner à gauche
     *
     * @return void
     */
    private function left() : void
    {
        switch ($this->direction) {
            case "N":
                $this->direction = "W";
                break;
            case "E":
                $this->direction = "N";
                break;
            case "S":
                $this->direction = "E";
                break;
            case "W":
                $this->direction = "S";
                break;
        }
    }

    /**
     * fonction si la commande consiste à tourner à droite
     *
     * @return void
    */
    private function right() : void
    {
        switch ($this->direction) {
            case "N":
                $this->direction = "E";
                break;
            case "E":
                $this->direction = "S";
                break;
            case "S":
                $this->direction = "W";
                break;
            case "W":
                $this->direction = "N";
                break;
        }
    }
}