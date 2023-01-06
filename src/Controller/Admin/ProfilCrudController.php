<?php

namespace App\Controller\Admin;

use App\Entity\Profil;
use App\Entity\Test;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntField;


class ProfilCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Profil::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('niveauEducation'),
            TextField::new('dernierDiplome'),
            TextField::new('domaineActivite'),
            TextField::new('situationProfessionnelle'),
            TextField::new('objectifUtilisation'),
            BooleanField::new('formationPayante'),
            TextField::new('connaissanceLinguistique'),
            IntegerField::new('user'),
            
        ];
    }
    
}
