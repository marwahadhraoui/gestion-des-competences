<?php

namespace App\Controller;

use App\Entity\Test;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $titreTest = $_GET['titre'];
        
       
        $repository = $doctrine->getRepository(Test::class);

        $quiz = $repository->findOneBy(['titre' => $titreTest]);

        $question =json_encode($quiz->getQuestion());

        

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'quiz' => $quiz,
            'question' => $question
        ]);
    }
}
