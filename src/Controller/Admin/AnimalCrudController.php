<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
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
           // ImageField::new('photo', 'Photo')->setBasePath('uploads/images/')->setUploadDir('assets/images/')->setUploadedFileNamePattern('[year]/[month]/[day]/[slug]-[contenthash].[extension]'),
            TextField::new('couleur','Couleur'),
            ChoiceField::new('isFemale', 'Sexe')->setChoices([
                'Mâle' => false,
                'Femelle' => 'true',
            ])->allowMultipleChoices(false)->renderExpanded()->autocomplete(),

        ];
    }
}
