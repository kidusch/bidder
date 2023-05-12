<?php

namespace App\Controller\Admin;

use App\Entity\Tender;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class TenderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tender::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            DateField::new('deadline'),
            TextEditorField::new('description'),
            AssociationField::new('category'),
            AssociationField::new('tendertype')
        ];
    }
    
}
