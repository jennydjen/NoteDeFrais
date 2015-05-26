<?php

namespace Jenny\ImportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneFrais
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jenny\ImportBundle\Entity\LigneFraisRepository")
 */
class LigneFrais {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var double
     * 
     * @ORM\Column(type="decimal", scale=2)
     */
    private $montant;

    /**
     * @var date 
     * 
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="Jenny\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    public function init($ligne) {
        $this->id = $ligne->id;
        $this->montant = $ligne->montant;
        $this->date = $ligne->date;
        $this->category = $ligne->category;
        $this->user = $ligne->user;
    }

    public function getId() {
        return $this->id;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function setMontant($m) {
        $this->montant = $m;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($d) {
        $this->date = $d;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($c) {
        $this->category = $c;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($u) {
        $this->user = $u;
    }

    public function updateLigne() {
        
    }

    public function deleteLigne() {
        
    }

}
