<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminProduitsController extends Controller
{
    public function adminProduitsAction()
    {
        return $this->render('EcommerceBundle:Administration:produits/layout/produits.html.twig');
    }
}
