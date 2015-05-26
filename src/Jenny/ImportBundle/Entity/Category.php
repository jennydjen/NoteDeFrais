<?php

namespace Jenny\ImportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jenny\ImportBundle\Entity\CategoryRepository")
 */
class Category {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;
    
    /**
     *
     * @var type 
     * 
     *  @ORM\Column(name="sum", type="boolean")
     */
    private $sum;

    public function init($category) {
        $this->id = $category->id;
        $this->nom = $category->nom;
        $this->parent = $category->parent;
    }

    /*
     * @return l'id
     */

    public function getId() {
        return $this->id;
    }

    /**
     * @return le nom
     */
    public function getNom() {
        return $this->nom;
    }

    public function setNom($n) {
        $this->nom = $n;
    }

    public function getParent() {
        return $this->parent;
    }

    public function setParent($p) {
        $this->parent = $p;
    }

    public function getNum(){
        return $this->sum;
    }

    public function setNum($n){
        $this->sum = $n;
    }
}
