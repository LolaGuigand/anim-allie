<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Animal;
use App\Entity\Benevole;
use App\Entity\ContratDAdoption;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {


        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(AnimalCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<h1>Arrière-boutique</h1>')
            ->setFaviconPath('favicon.ico')
            ->renderContentMaximized()
            ;
            
        }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('<b>Tableau de Tirets</b>', 'fa fa-home');
         yield MenuItem::linkToCrud('Animaux', 'fas fa-paw', Animal::class);
         yield MenuItem::linkToCrud('Bénévoles', 'fas fa-person', Benevole::class);
         yield MenuItem::linkToCrud('Adoptions', 'fas fa-file', ContratDAdoption::class);
    }

}
