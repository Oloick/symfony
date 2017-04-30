<?php
namespace Utilisateurs\UtilisateursBundle\Entity;

use Ecommerce\EcommerceBundle\Entity\Paniers;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateurs")
 */
class Utilisateurs extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->panier = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set Panier
     *
     * @param array $panier
     *
     * @return Utilisateurs
     */
    public function setPanier($panier)
    {
        $this->panier = $panier;

        return $this;
    }

    /**
     * Get Panier
     *
     * @return array
     */
    public function getPanier()
    {
        return $this->panier;
    }

    /**
       * @ORM\OneToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\Paniers" ,mappedBy="user", cascade={"persist","remove"})
       * @ORM\JoinColumn(nullable=true)
       */
    protected $panier;
}
