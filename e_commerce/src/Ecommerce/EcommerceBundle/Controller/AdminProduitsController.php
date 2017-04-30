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
            $em = $this->getDoctrine()->getManager();
            $em->persist($produits);
            $em->flush();
        }
        $em = $this->getDoctrine()->getManager();
        $produitsAffiches = $em->getRepository('EcommerceBundle:Produits')->findAll();
        return $this->render('EcommerceBundle:Administration:produits/layout/produits.html.twig', array(
            'produits' => $produitsAffiches,
            'form' => $form->createView()));
    }

    public function adminSuppProduitAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $produit = $em->getRepository('EcommerceBundle:Produits')->find($id);

        if (!$produit) {
            alert(" Erreur ");
        }

        $em->remove($produit);
        $em->flush();

        return $this->redirectToRoute('adminProduits');
    }
}
