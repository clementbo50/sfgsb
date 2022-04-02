<?php

namespace App\Repository;

use App\Entity\Fichefrais;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fichefrais|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fichefrais|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fichefrais[]    findAll()
 * @method Fichefrais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FichefraisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fichefrais::class);
    }

    // /**
    //  * @return Fichefrais[] Returns an array of Fichefrais objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fichefrais
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        
    }
    */
    public function UtilisateurAyantFrais(){
  //SELECT SUM(A.montantValide), B.nom, B.prenom FROM fichefrais A INNER JOIN utilisateur B ON A.idUtilisateur = B.id GROUP BY b.id
     $em = $this->getEntityManager();
     $query = $em->createQuery("SELECT SUM(f.montantvalide), u.prenom, u.nom, u.id FROM App\Entity\FicheFrais f INNER JOIN App\Entity\Utilisateur u   
      WITH f.idutilisateur = u.id GROUP BY u.id");
     $laListe = $query->getResult();
     return $laListe;
    }
    
    public function UtilisateurNayantPasFrais(){
        //SELECT nom, prenom FROM Utilisateur WHERE id NOT IN(SELECT idUtilisateur FROM fichefrais)
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT u.id, u.nom, u.prenom FROM App\Entity\Utilisateur u    
     LEFT OUTER JOIN App\Entity\FicheFrais f WITH u.id=f.idutilisateur WHERE f.montantvalide IS NULL');
        $laListe = $query->getResult();
        return $laListe;    
    }
    public function UtilisateurAyantFraisNombre(){
        //SELECT  count(f.montantValide),u.prenom, u.nom FROM utilisateur u LEFT OUTER JOIN fichefrais f ON f.idutilisateur = u.id GROUP BY u.id
     $em = $this->getEntityManager();
     $query = $em->createQuery("SELECT COUNT(f.montantvalide), u.prenom, u.nom, u.id FROM App\Entity\Utilisateur u LEFT OUTER JOIN App\Entity\FicheFrais f   
      WITH f.idutilisateur = u.id GROUP BY u.id");
     $laListe = $query->getResult();
     return $laListe;
    }
//    
}   
    