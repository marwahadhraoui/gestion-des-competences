<?php

namespace App\Controller;

use App\Entity\Test;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $repository = $doctrine->getRepository(Test::class);
      
        $tests =$repository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'tests' => $tests,
        ]);
    }
}
