<?php
/**
 * User: sunvisor
 * Date: 2021/07/22
 *
 * Copyright (C) Sunvisor Lab. 2021.
 */

namespace App\airenv;

use App\airenv\exception\Co2Exception;

interface Co2LogInterface
{
    /**
     * @param array $params
     * @throws Co2Exception
     */
    public function log(array $params);
}
