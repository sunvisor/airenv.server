<?php
/**
 * User: sunvisor
 * Date: 2021/07/22
 *
 * Copyright (C) Sunvisor Lab. 2021.
 */

namespace App\airenv;


use DateTimeInterface;

interface Co2ValueInterface
{
    public function list(string $place, DateTimeInterface $from, DateTimeInterface $to): array;

    public function latest(string $place): array;
}
