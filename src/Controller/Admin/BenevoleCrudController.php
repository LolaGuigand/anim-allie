<?php

namespace App\Controller\Admin;

use App\Entity\Benevole;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class BenevoleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Benevole::class;
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

            ->setEntityLabelInSingular('Bénévole')
            ->setEntityLabelInPlural('Bénévoles')

            ->setPageTitle('index', 'Liste des %entity_label_plural%');
    }
}
