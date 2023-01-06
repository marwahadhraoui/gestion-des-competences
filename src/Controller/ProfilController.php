<?php

namespace App\Controller;

use App\Entity\Profil;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        $session = new Session();
        $idU=$session->get('id');
        dump($idU);
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    #[Route('/checkprofil', name: 'app_checkprofil')]
    public function checkProfil(ManagerRegistry $doctrine): Response
    {
        
        
            $session = new Session();
            $idU=$session->get('id');
    
            $entityManager = $doctrine->getManager();
            
            $profile = new Profil();
            $profile->setNiveauEducation($_GET['niveaueducation']);
            $profile->setDernierDiplome($_GET['diplome']);
            $profile->setSituationProfessionnelle($_GET['situationpro']);
            $profile->setDomaineActivite($_GET['domaineactivite']);
            $profile->setObjectifUtilisation($_GET['objectifutilisation']);
            $profile->setFormationPayante($_GET['formationpayante']);
            $profile->setConnaissanceLinguistique($_GET['connaissancelinguistique']);
            
    
            $entityManager->persist($profile);
            $entityManager->flush();
    
            
            return $this->redirectToRoute('app_home');
    }
}

