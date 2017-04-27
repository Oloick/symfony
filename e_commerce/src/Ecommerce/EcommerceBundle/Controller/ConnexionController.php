<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnexionController extends Controller
{
    public function connexionAction()
    {
        return $this->render('EcommerceBundle:Default:user/layout/connexion.html.twig');
    }
}
