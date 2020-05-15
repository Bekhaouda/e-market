<?php

namespace App\Repository\Catalog;

use App\Entity\Catalog\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
     /**
     * 
     */
    public function findProductsByCategory($id) : array {

        /* $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT u FROM App\Entity\Catalog\Product u WHERE u.age > 20');
        $users = $query->getResult(); */
          
        $em = $this->getEntityManager();
        
            $query = $em->createQuery('SELECT u FROM App\Entity\Catalog\Product u where u.categoryId = 1 ');
           // ->setParameter('p',$id); 
        $products =  $query->getResult();
        return $products;
      }








}
