<?php

namespace Jenny\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller {

    /**
     * @Route("/", name="_accueil")
     * @Template()
     */
    public function indexAction() {
         $user = $this->container->get('security.context')->getToken()->getUser();
        if ($user == 'anon.') {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
        
        return $this->render('JennyUserBundle:Accueil:accueil.html.twig', array(
                    'user' => $user,
        ));
    }

}
