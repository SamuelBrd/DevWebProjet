<?php

namespace App\Repository;

use App\Entity\Evenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Evenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evenement[]    findAll()
 * @method Evenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evenement::class);
    }

    // /**
    //  * @return Evenement[] Returns an array of Evenement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Evenement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
    * @return Evenement[]
    */
    public function searchEvent($criteria)
    {
        return $this->createQueryBuilder('e')
            ->where('e.typeEvent LIKE :name')
            ->andWhere('e.dateEvent >= :date')
            ->setParameter('name', '%'.$criteria['type_event'].'%')
            ->setParameter('date', $criteria['date_event'])
            ->orderBy('e.dateEvent', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    * @return Evenement[]
    */
    public function getEventNonExpires()
    {
        return $this->createQueryBuilder('e')
            ->where('e.dateEvent > :date')
            ->setParameter('date', new \DateTime())
            ->orderBy('e.dateEvent', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    * @return Evenement[]
    */
    public function getAllEvent()
    {
        return $this->createQueryBuilder('e')
            ->orderBy('e.dateEvent', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    * @return Evenement
    */
    public function getOneEvent()
    {
        return $this->createQueryBuilder('e')
            ->orderBy('e.dateEvent', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
}
