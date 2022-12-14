<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Formation;
use App\Entity\Profil;
use App\Entity\Test;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
      
          return $this->render('admin/dashboard.html.twig');
        //return parent::index();
       
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa-solid fa-users', User::class);
        yield MenuItem::linkToCrud('Tests', 'fas fa-list', Test::class);
        yield MenuItem::linkToCrud('Categories','fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Formation','fas fa-list', Formation::class);
        yield MenuItem::linkToCrud('Profil','fa fa-user', Profil::class);
    }
}
