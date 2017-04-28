<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Entity\Produits;
use Ecommerce\EcommerceBundle\Form\AddProduitFormType;
use Symfony\Component\HttpFoundation\Request;

class AdminProduitsController extends Controller
{

    public function adminProduitsAction(Request $request)
    {
        $produits = new Produits();
        $form = $this -> createForm('Ecommerce\EcommerceBundle\Form\AddProduitFormType', $produits);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            var_dump($produits);
            $em = $this->getDoctrine()->getManager();
            $em->persist($produits);
            $em->flush();

            return $this->render('EcommerceBundle:Administration:produits/layout/produits.html.twig', array('form' => $form->createView()));
        }
    return $this->render('EcommerceBundle:Administration:produits/layout/produits.html.twig', array('form' => $form->createView()));
    }
}
