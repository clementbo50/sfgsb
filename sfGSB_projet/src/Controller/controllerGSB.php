<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Inscription;
use Symfony\Component\Validator\Constraints\NotBlank;



class controllerGSB extends AbstractController{
    /**
     * @Route("/gsb/Accueil", name="Accueil")
     */
    
    public function Accueil(): Response
    {
        return $this->render('gsb/Accueil.html.twig', [
            
        ]);
    }
    /**
     * @Route("/gsb/GestionInformatique", name="GestionInformatique")
     */
    public function GestionInformatique(){
        return $this->render('gsb/GestionInformatique.html.twig', 
                []);
    }
     /**
     * @Route("/gsb/Equipements", name="Equipements")
     */
    public function Equipements(){
        return $this->render('gsb/Equipement.html.twig', 
                []);
    }
    /**
     * @Route("/gsb/RepartitionServices", name="RepartitionServices")
     */
    public function RepartitionService(){
        return $this->render('gsb/RepartitionServices.html.twig', 
                []);
    }
    /**
     * @Route("/gsb/Segmentation", name="Segmentation")
     */
    public function Segmentation(){
        return $this->render('gsb/Segmentation.html.twig', 
                []);
    }
    /**
     * @Route("/gsb/Utilisateurs", name="Utilisateurs")
     */
    public function voirUtilisateur():Response
    {
      
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Utilisateur::class);
        $users = $repo->laFonction();
        $compteur = $repo->compteurUtilisateur();
        return $this->render('gsb/Utilisateurs.html.twig' ,['listeUtilisateurs' => $users, 'Lecompteur' => $compteur]);
    }
    /**
     * @Route("/gsb/UtilisateursCadurciens", name="UtilisateursCadurciens")
     */
    public function voirUtilisateurCadurcien():Response
    {
     $repo = $this->getDoctrine()->getRepository(\App\Entity\Utilisateur::class);
     $users = $repo->fonctionCadurcien();
     return $this->render('gsb/UtilisateursCadurcien.html.twig' ,['listeUtilisateursCadurciens' => $users]);
     
    }
    /**
     * @Route("/gsb/UtilisateursAyantFrais", name="UtilisateursAyantFrais")
     */
    public function voirUtilisateurAyantFrais():Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $liste = $repo->UtilisateurAyantFrais();
        return $this->render('gsb/UtilisateursAyantDesFrais.html.twig',['listeUserAyantFrais' => $liste]);
    }
    /**
     * @Route("/gsb/UtilisateursNAyantPasDeFrais", name="UtilisateursNAyantPasDeFrais")
     */
    public function voirUtilisateurNAyantPasDeFrais():Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $liste = $repo->UtilisateurNayantPasFrais();
        return $this->render('gsb/UtilisateursNayantPasDesFrais.html.twig', ['listeUserNayantPasFrais' => $liste]);
    }
    /**
     * @Route("/gsb/UtilisateursNombreFrais", name="UtilisateursNombreFrais")
     */
    public function voirUtilisateurNombreFrais()
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $liste = $repo->UtilisateurAyantFraisNombre();
        return $this->render('gsb/UtilisateurNombreFrais.html.twig', ['listeUserNombreFrais' => $liste]);
    }
    /**
     * @Route("/gsb/NomDomaineCategorie", name="NomDomaineCategorie")
     */
    public function voirNomDomaineCategorie()
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Categorie::class);
        $liste = $repo->findAll();
        return $this->render('gsb/nomCategorieDomaine.html.twig', ['listeNomDomaineCategorie' => $liste]);
    }
    /**
     * @Route("/gsb/UtilisateurSecondaireNiveauFichefrais", name="UtilisateurSecondaireNiveauFichefrais")
     */
    public function voirUtilisateurFraisNiveaux(){
        $repo = $this->getDoctrine()->getRepository(\App\Entity\UtilisateurSecondaire::class);
        $liste = $repo->findAll();
        return $this->render('gsb/UtilisateurSecondaireNiveauFichefrais.html.twig', ['listeNomUtilisateurSecondaire' => $liste]);
    }
}
