<?php
/**
 * User: sunvisor
 * Date: 2021/07/22
 *
 * Copyright (C) Sunvisor Lab. 2021.
 */

namespace App\airenv;


use App\airenv\entity\Co2;
use DateTimeInterface;

interface LogBrowseInterface
{
    public function latest(string $place): Co2;

    /**
     * @param string            $place
     * @param DateTimeInterface $from
     * @param DateTimeInterface $to
     * @return Co2[]
     */
    public function list(string $place, DateTimeInterface $from, DateTimeInterface $to): array;
}
