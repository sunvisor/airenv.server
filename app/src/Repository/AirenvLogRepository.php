<?php

namespace App\Repository;

use App\airenv\entity\Co2;
use App\airenv\LogPersistenceInterface;
use App\Entity\AirenvLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AirenvLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method AirenvLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method AirenvLog[]    findAll()
 * @method AirenvLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AirenvLogRepository extends ServiceEntityRepository implements LogPersistenceInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AirenvLog::class);
    }

    public function save(Co2 $co2)
    {
        $entity = new AirenvLog();
        $entity->setCreatedAt($co2->getDate())
            ->setItemName('co2')
            ->setPlace($co2->getPlace())
            ->setItemValue($co2->getValue());
        $this->_em->persist($entity);
        $this->_em->flush();
    }
}
