<?php

namespace App\Controller\Admin;

use App\Entity\Bid;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class BidCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bid::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            IntegerField::new('price'),
            AssociationField::new('tender'),
            TextEditorField::new('status'),
        ];
    }
}
