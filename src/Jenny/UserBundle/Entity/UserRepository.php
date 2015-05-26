<?php

namespace Jenny\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class UserRepository extends EntityRepository {

    public function isExist($prenom, $nom) {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Jenny\UserBundle\Entity\User', 'u');
        $rsm->addFieldResult('u', 'id', 'id');

        $sql = 'SELECT u.id FROM fos_user u WHERE u.prenom = ? AND u.nom = ?';

        $query = $this->_em->createNativeQuery($sql, $rsm);
        $query->setParameter(1, $prenom);
        $query->setParameter(2, $nom);

        $user = $query->getResult();
        return $user;
    }

}
