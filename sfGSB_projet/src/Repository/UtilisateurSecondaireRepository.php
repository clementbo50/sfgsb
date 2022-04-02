<?php

namespace App\Repository;

use App\Entity\UtilisateurSecondaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UtilisateurSecondaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method UtilisateurSecondaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method UtilisateurSecondaire[]    findAll()
 * @method UtilisateurSecondaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurSecondaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UtilisateurSecondaire::class);
    }

    // /**
    //  * @return UtilisateurSecondaire[] Returns an array of UtilisateurSecondaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('us')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UtilisateurSecondaire
    {
        return $this->createQueryBuilder('us')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    
    public function voirUtilisateurSecondaire(){
        //SELECT c.nom, c.prenom, b.id, a.niveaux FROM utilisateur_secondaire a INNER JOIN fichefrais b ON a.id_fiche_frais_id = b.id  INNER JOIN utilisateur c ON a.id_user_id = c.id
     $em = $this->getEntityManager();
     $query = $em->createQuery("SELECT u.prenom, u.nom, us.niveaux, f.id, f.idutilisateur FROM App\Entity\UtilisateurSecondaire us INNER JOIN App\Entity\FicheFrais f   
      WITH f.id = us.idFicheFrais INNER JOIN App\Entity\Utilisateur u WITH us.idUser = u.id");
     $laListe = $query->getResult();
     return $laListe;
    }
}
