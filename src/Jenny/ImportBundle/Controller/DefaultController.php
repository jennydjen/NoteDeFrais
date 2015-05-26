<?php

namespace Jenny\ImportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\component\HTTPfoundation\Response;
use Jenny\ImportBundle\Entity\ReadFile;


class DefaultController extends Controller {

    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name) {
        return array('name' => $name);
    }
    
    /**
     * @Route("/import", name="_import")
     * @Template()
     */
    public function importAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($user == 'anon.') {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
        
        $error = '';
        $type = '';
        $message = '';
        $warning = '';
        if ($request->getMethod() == 'POST') {
            $result = $_FILES['fileToUpload']['name'];
            $type = $_FILES['fileToUpload']['type'];

            if (substr_count($type, 'sheet') > 0 || substr_count($type, 'excel') > 0) {
                $loadFile = new ReadFile();
                $result = $loadFile->loadFile($_FILES['fileToUpload']['tmp_name']);
                if ($result == "ERROR FILE") {
                    $error = "Ce fichier n'est pas un fichier EXCEL.";
                } else {
                    $isCorrect = $loadFile->checkData($result);
                    if ($isCorrect) {
                        $emUser = $this->getDoctrine()->getManager()->getRepository('JennyUserBundle:User');
                        $tmp = explode(" ", $result[4]['C']);
                        $userBase = $emUser->isExist($tmp[0], $tmp[1]);
                        $user = $this->container->get('security.context')->getToken()->getUser();
                        if ($loadFile->isUserData($userBase, $user)) {
                            // Sauvegarde du fichier importer
                            if (!file_exists($user->getId())) {
                                mkdir($user->getId());
                            }
                            $nameFileCopy = $user->getId() . "/" . date("YmdGis") . "-" . $_FILES['fileToUpload']['name'];
                            copy($_FILES['fileToUpload']['tmp_name'], $nameFileCopy);

                            // sauvegarde des données dans la base de donnée. 
                            $isSaving = $this->saveData($loadFile, $result, $user);
                            if (!$isSaving) {
                                if (count($loadFile->searchDoublon($result, $this->getDoctrine()->getManager()->getRepository('JennyImportBundle:Category'), $this->getDoctrine()->getManager()->getRepository('JennyImportBundle:LigneFrais'), $user)) > 0) {
                                    $_SESSION['fileToUpload'] = $nameFileCopy;
                                    return $this->redirect($this->generateUrl('_check', array()));
                                } else {
                                    $warning = "Les informations que vous voulez importer sont déjà dans la base.";
                                }
                            } else {
                                $message = "L'importation des données a été effectué.";
                            }
                        } else {
                            $error = "L'utilisateur connecté n'est pas celui du fichier.";
                        }
                    } else {
                        $error = "Les données du fichier ne sont pas conformes.";
                    }
                }
            } else {
                $error = "Ce n'est pas un format attendu (xlsx, xls, csv, ods).";
            }
        } else {
            $message = isset($_SESSION['update']) ? 'Mise a jour effectuée' : '';
            unset($_SESSION['update']);
        }


        return $this->render('JennyImportBundle:import:import.html.twig', array(
                    'error' => $error,
                    'message' => $message,
                    'warning' => $warning,
        ));
    }

    /**
     * @Route("/import/check", name="_check")
     * @Template()
     */
    public function checkAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $choix = $request->get("choix");
            if ($choix == "nothing") {
                unset($_SESSION['fileToUpload']);
                return $this->redirect($this->generateUrl('_import', array()));
            } else {
                return $this->redirect($this->generateUrl('_update', array()));
            }
        }

        return $this->render('JennyImportBundle:import:check.html.twig', array(
        ));
    }

    /**
     * @Route("/import/update", name="_update")
     * @Template()
     */
    public function updateAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $nameFile = $_SESSION['fileToUpload'];
        $loadFile = new ReadFile();
        $result = $loadFile->loadFile($nameFile);
        $doublon = $loadFile->searchDoublon($result, $this->getDoctrine()->getManager()->getRepository('JennyImportBundle:Category'), $this->getDoctrine()->getManager()->getRepository('JennyImportBundle:LigneFrais'), $user);
        $em = $this->getDoctrine()->getManager();
        foreach ($doublon as $row => $array) {
            foreach ($array as $column => $ligne) {
                $ligne->setMontant($result[$row][$column]);
                $em->persist($ligne);
            }
        }
        $em->flush();
        unset($_SESSION['fileToUpload']);
        $_SESSION['update'] = '';
        return $this->redirect($this->generateUrl('_import', array()));
    }

    /**
     * @Route("/category")
     * @Template()
     */
    public function viewCategoryAction() {
        $em = $this->getDoctrine()->getManager()->getRepository('JennyImportBundle:Category');
        $liste_category = $em->findAll();

        $message = "Liste des catégories utilisé : <br>";
        foreach ($liste_category as $c) {
            if (!$c->getParent()) {
                $message .= "Catégorie mère : '" . $c->getNom() . "'<br>";
            } else {
                $cParent = $em->find($c->getParent());
                $message .= "La catégorie '" . $c->getNom() . "' est sous catégorie de '" . $cParent->getNom() . "'<br>";
            }
        }

        return new Response($message);
    }

    private function saveData($loadFile, $array_data, $user) {
        $em = $this->getDoctrine()->getManager()->getRepository('JennyImportBundle:Category');
        $lignes = $loadFile->createLigneFrais($array_data, $em, $user);

        $emLigne = $this->getDoctrine()->getManager()->getRepository('JennyImportBundle:LigneFrais');

        $em = $this->getDoctrine()->getManager();
        $isExist = false;
        foreach ($lignes as $ligne) {
            if ($emLigne->isExist($ligne->getCategory(), $ligne->getDate(), $user)) {
                $isExist = true;
            }
        }
        if ($isExist) {
            return false;
        } else {
            foreach ($lignes as $ligne) {
                $em->persist($ligne);
            }
            $em->flush();
            return true;
        }
    }

}
