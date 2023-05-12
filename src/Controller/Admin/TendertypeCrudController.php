<?php

namespace App\Controller\Admin;

use App\Entity\Tendertype;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TendertypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tendertype::class;
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
