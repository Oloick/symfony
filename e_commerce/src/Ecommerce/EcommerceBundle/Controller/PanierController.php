<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Entity\Paniers;
use Ecommerce\EcommerceBundle\Entity\Produits;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Model\User;

class PanierController extends Controller
{
    public function panierAfficheAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $panierFind = $em->getRepository('EcommerceBundle:Paniers')->findOneByUser($user);

        return $this->render('EcommerceBundle:Default:panier/layout/panier.html.twig', array(
            'panier' => $panierFind));
    }

    public function panierAction($id, Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $panierFind = $em->getRepository('EcommerceBundle:Paniers')->findOneByUser($user);

        if(!$panierFind){
            $panier = new Paniers();

            $em = $this->getDoctrine()->getManager();
            $produitToAdd = $em->getRepository('EcommerceBundle:Produits')->find($id);
            $prixProduit = $produitToAdd->getPrix();

            $panier->setUser($user);
            $panier->setProduits($id);
            $panier->setPrix($prixProduit);

            $em = $this->getDoctrine()->getManager();
            $em->persist($panier);
            $em->flush();
        } else{

            $em_Produit = $this->getDoctrine()->getManager();
            $produitToAdd = $em_Produit->getRepository('EcommerceBundle:Produits')->find($id);
            $prixProduit = $produitToAdd->getPrix();

            $lastProduits = $panierFind->getProduits();
            $lastPrix = $panierFind->getPrix();

            $prix = $lastPrix + $prixProduit;

            $panierFind->setProduits(array($lastProduits, $id));
            $panierFind->setPrix($prix);
            $em->persist($panierFind);
            $em->flush();
      }

        return $this->render('EcommerceBundle:Default:panier/layout/panier.html.twig', array(
            'panier' => $panierFind));
    }
}
