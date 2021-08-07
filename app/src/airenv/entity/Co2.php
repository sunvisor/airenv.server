<?php
/**
 * User: sunvisor
 * Date: 2021/07/22
 *
 * Copyright (C) Sunvisor Lab. 2021.
 */

namespace App\airenv\entity;


use App\airenv\exception\Co2Exception;
use DateTimeInterface;

class Co2
{
    private DateTimeInterface $date;
    private string            $place;
    private float             $value;

    /**
     * @param DateTimeInterface $date
     * @param string            $place
     * @param float             $value
     * @return Co2
     * @throws Co2Exception
     */
    static public function create(DateTimeInterface $date, string $place, float $value): Co2
    {
        if ($value > 5000 || $value < 400) {
            throw new Co2Exception('invalid value');
        }
        return new Co2($date, $place, $value);
    }

    /**
     * Co2 constructor.
     * @param DateTimeInterface $date
     * @param string            $place
     * @param float             $value
     */
    public function __construct(DateTimeInterface $date, string $place, float $value)
    {
        $this->date = $date;
        $this->place = $place;
        $this->value = $value;
    }

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    public function getPlace(): string
    {
        return $this->place;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getColor(): string
    {
        if ($this->value > 1200) return 'red';
        if ($this->value > 800) return 'yellow';
        return 'green';
    }

    public function toArray(): array
    {
        return [
            'date'  => $this->date->format('Y-m-d H:i:s'),
            'place' => $this->place,
            'value' => $this->value,
            'color' => $this->getColor(),
        ];
    }
}
