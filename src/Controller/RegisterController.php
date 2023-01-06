<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController


{
    private UserPasswordHasherInterface $hasher;

    function __construct(UserPasswordHasherInterface $hasher){
       $this->hasher = $hasher;
   }
   

   
    #[Route('/', name: 'app_register')]
    public function index(): Response
    {
        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
        ]);
    }

    #[Route('/check', name: 'app_check')]
    public function check(ManagerRegistry $doctrine): Response
    {
       

    
       $entityManager = $doctrine->getManager();

       $user = new User();
       $user->setNom($_GET['nom']);
       $user->setPrenom($_GET['prenom']);
       $user->setAge($_GET['age']);
       $user->setProfession($_GET['profession']);
       $user->setUsername($_GET['username']);
       $user->setPassword($this->hasher->hashPassword($user,$_GET['password']));
       $user->setEmail($_GET['email']);
       $user->setLieuResidence($_GET['lieuResidence']);

       $entityManager->persist($user);
       $entityManager->flush();

       $id = $user->getId();
     
       $session = new Session();
       $session->start();
       $session->set('id', $id);


        return $this->redirectToRoute('app_login');
    }



}
