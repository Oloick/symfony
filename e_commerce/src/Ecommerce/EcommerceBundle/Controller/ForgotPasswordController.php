<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ForgotPasswordController extends Controller
{
    public function forgotPasswordAction()
    {
        return $this->render('EcommerceBundle:Default:user/layout/forgotPassword.html.twig');
    }
}
