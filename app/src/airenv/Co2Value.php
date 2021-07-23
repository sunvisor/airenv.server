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

class Co2Value implements Co2ValueInterface
{
    private LogBrowseInterface $logBrowse;

    /**
     * Co2Value constructor.
     * @param LogBrowseInterface $logBrowse
     */
    public function __construct(LogBrowseInterface $logBrowse)
    {
        $this->logBrowse = $logBrowse;
    }

    public function list(string $place, DateTimeInterface $from, DateTimeInterface $to): array
    {
        $result = $this->logBrowse->list($place, $from, $to);
        return array_map(function ($item) {
            /** @var Co2 $item */
            return $item->toArray();
        }, $result);
    }

    public function latest(string $place): array
    {
        $result = $this->logBrowse->latest($place);
        return $result->toArray();
    }
}
