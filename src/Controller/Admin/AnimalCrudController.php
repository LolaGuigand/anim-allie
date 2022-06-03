<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('petitNom', 'Nom de l\'animal')->setColumns(6),
            TextareaField::new('description', 'Description'),
            ImageField::new('photo', 'Photo')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[year]/[month]/[day]/[slug]-[contenthash].[extension]'),
            TextField::new('couleur', 'Couleur'),
            ChoiceField::new('isFemale', 'Sexe')
                ->setChoices([
                    'Mâle' => 'false',
                    'Femelle' => 'true',
                ])
                ->allowMultipleChoices(false)
                ->renderExpanded()
                ->autocomplete(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud

            ->setEntityLabelInSingular('Animal')
            ->setEntityLabelInPlural('Animaux')

            // the visible title at the top of the page and the content of the <title> element
            // it can include these placeholders:
            //   %entity_name%, %entity_as_string%,
            //   %entity_id%, %entity_short_id%
            //   %entity_label_singular%, %entity_label_plural%
            ->setPageTitle('index', 'Liste des %entity_label_plural%');
    }
}
