<?php

namespace App\Repository;

use App\Entity\Record;
use App\Entity\Department;
use App\Entity\Region;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
/**
 * @method Record|null find($id, $lockMode = null, $lockVersion = null)
 * @method Record|null findOneBy(array $criteria, array $orderBy = null)
 * @method Record[]    findAll()
 * @method Record[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecordRepository extends ServiceEntityRepository
{
    /*
     * This method fetches and returns records in cache if they exist,
     * execute DB query and caches results if they don't exist
     */
    public function findRecordsMapSort($townId) {
        $result = $this->findBy([
            'town' => $townId
        ]);
        return $result;
    }


    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Record::class);
    }

    // /**
    //  * @return Record[] Returns an array of Record objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Record
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}
