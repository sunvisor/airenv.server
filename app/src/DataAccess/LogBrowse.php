<?php
/**
 * User: sunvisor
 * Date: 2021/07/22
 *
 * Copyright (C) Sunvisor Lab. 2021.
 */

namespace App\DataAccess;


use App\airenv\entity\Co2;
use App\airenv\LogBrowseInterface;
use App\Repository\AirenvLogRepository;
use DateTimeInterface;

class LogBrowse implements LogBrowseInterface
{
    private AirenvLogRepository $logRepository;

    /**
     * LogBrowse constructor.
     * @param AirenvLogRepository $logRepository
     */
    public function __construct(AirenvLogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function latest(string $place): Co2
    {
        $result = $this->logRepository->findOneBy(
            [
                'place'     => $place,
                'item_name' => 'co2'
            ],
            [
                'created_at' => 'DESC'
            ]
        );
        return Co2::create($result->getCreatedAt(), $result->getPlace(), $result->getItemValue());
    }

    /**
     * @inheritDoc
     */
    public function list(string $place, DateTimeInterface $from, DateTimeInterface $to): array
    {
        $qb = $this->logRepository->createQueryBuilder('t');
        $qb->where('t.created_at BETWEEN :from AND :to')
           ->setParameter('from', $from->format('Y-m-d H:i:s'))
           ->setParameter('to', $to->format('Y-m-d H:i:s'));
        $query = $qb->getQuery();
        $result = $query->getResult();
        return array_map(function ($item) {
            return Co2::create($item->getCreatedAt(), $item->getPlace(), $item->getItemValue());
        }, $result);
    }
}
