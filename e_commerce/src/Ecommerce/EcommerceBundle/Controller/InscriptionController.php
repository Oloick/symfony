<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InscriptionController extends Controller
{
    public function inscriptionAction()
    {
        return $this->render('EcommerceBundle:Default:user/layout/inscription.html.twig');
    }
}
