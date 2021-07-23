<?php
/**
 * User: sunvisor
 * Date: 2021/07/22
 *
 * Copyright (C) Sunvisor Lab. 2021.
 */

namespace App\airenv;


use App\airenv\entity\Co2;

interface LogPersistenceInterface
{
    public function save(Co2 $co2);
}
