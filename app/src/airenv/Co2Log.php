<?php
/**
 * User: sunvisor
 * Date: 2021/07/22
 *
 * Copyright (C) Sunvisor Lab. 2021.
 */

namespace App\airenv;


use App\airenv\entity\Co2;
use App\airenv\exception\Co2Exception;
use DateTimeImmutable;

class Co2Log implements Co2LogInterface
{
    private LogPersistenceInterface $logPersistence;

    /**
     * Log constructor.
     * @param LogPersistenceInterface $logPersistence
     */
    public function __construct(LogPersistenceInterface $logPersistence)
    {
        $this->logPersistence = $logPersistence;
    }

    /**
     * @param array $params
     * @throws Co2Exception
     */
    public function log(array $params)
    {
        $date = new DateTimeImmutable();
        $co2 = Co2::create($date, $params['place'], $params['value']);
        $this->logPersistence->save($co2);
    }
}
