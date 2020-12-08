<?php

namespace App\Repository;

use App\Entity\Record;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Cache\PhpFileCache;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
/**
 * @method Record|null find($id, $lockMode = null, $lockVersion = null)
 * @method Record|null findOneBy(array $criteria, array $orderBy = null)
 * @method Record[]    findAll()
 * @method Record[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecordRepository extends ServiceEntityRepository
{
    public function findRecordsMapSort($town) {

        $cache = new FilesystemAdapter();
        $cacheResult = $cache->getItem('town'.$town);
        if ($cacheResult->isHit()) {
            return $cacheResult->get();
        } else {
            $result = $this->findBy([
                'town' => $town
            ]);
            $cacheResult->set($result);
            $cache->save($cacheResult);
            return $result;
        }
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
