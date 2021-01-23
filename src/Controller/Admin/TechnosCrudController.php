<?php

namespace App\Controller\Admin;

use App\Entity\Technos;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TechnosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Technos::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }
    
}
