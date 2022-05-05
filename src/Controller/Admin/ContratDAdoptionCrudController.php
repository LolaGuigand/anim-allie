<?php

namespace App\Controller\Admin;

use App\Entity\ContratDAdoption;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class ContratDAdoptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContratDAdoption::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    public function configureCrud(Crud $crud): Crud
    {
        return $crud

            ->setEntityLabelInSingular('Contrat d\'adoption')
            ->setEntityLabelInPlural('Contrats d\'adoption')

            ->setPageTitle('index', 'Liste des %entity_label_plural%');
    }
}
