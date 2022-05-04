<?php

namespace App\Repository;

use App\Entity\ContratDAdoption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContratDAdoption>
 *
 * @method ContratDAdoption|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContratDAdoption|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContratDAdoption[]    findAll()
 * @method ContratDAdoption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratDAdoptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContratDAdoption::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ContratDAdoption $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ContratDAdoption $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ContratDAdoption[] Returns an array of ContratDAdoption objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContratDAdoption
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
