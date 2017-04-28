<?php

namespace Ecommerce\EcommerceBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Util\LegacyFormHelper;
use Ecommerce\EcommerceBundle\Entity\Produits;

class AddProduitFormType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
      //formulaire
      $builder
      ->add('Nom', null, array('label' => 'nom',
        'label_attr' => array('class' => 'sr-only'),
        'attr'  => array('class' => 'form-control' , 'placeholder' => 'nom')))

      ->add('Description', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\TextareaType'), array(
        'label' => 'Description',
        'label_attr' => array('class' => 'sr-only'),
        'attr'  => array('class' => 'form-control' , 'placeholder' => 'Description')
      ))

      ->add('Prix', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\NumberType'), array(
        'label' => 'Prix',
        'label_attr' => array('class' => 'sr-only'),
        'attr'  => array('class' => 'form-control' , 'placeholder' => 'Prix')
      ))

      ->add('Categorie', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\ChoiceType'), array(
        'choices' => array(
              'Pizza' => 'Pizza',
              'Burger' => 'Burger',
              'Accompagnement' => 'Accompagnement',
              'Dessert' => 'Dessert',
              'Menu' => 'Menu'
          ),
        'label_attr' => array('class' => 'sr-only'),
        'attr'  => array('class' => 'form-control' , 'placeholder' => 'disponniblite')))

      ->add('Image',null, array('label' => 'Image',
        'label_attr' => array('class' => 'sr-only'),
        'attr'  => array('class' => 'form-control' , 'placeholder' => 'Image')));
  }

  public function getName(){
    return 'ecommerce_ecommercebundle_produits';
  }
}
