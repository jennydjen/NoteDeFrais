<?php

namespace Jenny\ImportBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository {

    public function getCategoryByName($name) {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Jenny\ImportBundle\Entity\Category', 'c');
        $rsm->addFieldResult('c', 'id', 'id');

        $sql = 'SELECT c.id FROM category c WHERE c.nom = ?';

        $query = $this->_em->createNativeQuery($sql, $rsm);
        $query->setParameter(1, $name);

        $category = $query->getResult();
        return $category;
    }

}
