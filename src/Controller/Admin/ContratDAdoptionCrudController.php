<?php

namespace App\Controller\Admin;

use App\Entity\ContratDAdoption;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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
}
