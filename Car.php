<?php 
require_once 'Vehicle.php';

class Car extends Vehicle
    {

    const ALLOWED_ENERGIES = [
        'fuel',
        'electric',
    ];
    /**
    * @var boolean
    */
    private $hasParkBrake;

    private $energy;

    private $energyLevel;


public function getEnergy(): int
{
    return $this->energy;
}

public function setEnergy(string $energy) : Car
{
    if (in_array($energy, self::ALLOWED_ENERGIES)) {
        $this->energy = $energy;
    }
    return $this;
}

public function getEnergyLevel(): int
{
    return $this->energyLevel;
}

public function setEnergyLevel(string $energyLevel) : void
{
    $this->energyLevel = $energyLevel;
}

public function setParkBrake(): void
    {
        $this->hasParkBrake = !($this->hasParkBrake);
    }

    public function start()
    {
        try {
            if ($this->hasParkBrake)
            {
                throw new Exception();
            }
        }
        catch (Exception $e)
            {
                $this->setParkBrake();
            } finally {
                return "Ma voiture roule comme un donut";
            }
    }

public function __construct(string $color, int $nbSeats, string $energy)
{
    parent::__construct($color, $nbSeats);
    $this->setEnergy($energy);
}


}
