<?php

namespace App\Repository;

use App\Entity\WorkExperienceDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method WorkExperienceDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkExperienceDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkExperienceDetail[]    findAll()
 * @method WorkExperienceDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkExperienceDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkExperienceDetail::class);
    }

    // /**
    //  * @return WorkExperienceDetail[] Returns an array of WorkExperienceDetail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WorkExperienceDetail
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
