<?php

namespace Jenny\StatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Ob\HighchartsBundle\Highcharts\Highchart;

class DefaultController extends Controller {

    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name) {
        return array('name' => $name);
    }

    /**
     * @Route("/admin/stats", name="_adminstat")
     * @Template()
     */
    public function statsAction(Request $request) {
        $emUser = $this->getDoctrine()->getManager()->getRepository('JennyUserBundle:User');
        $emCategory = $this->getDoctrine()->getManager()->getRepository('JennyImportBundle:Category');
        $categories = $emCategory->findAll();
        $users = $emUser->findAll();

        $dateDebut = $request->getMethod() == 'POST' ? $request->get("dateDebut") : date("Y-m-d", $this->getLundiPrecedent(time()));
        $dateFin = $request->getMethod() == 'POST' ? $request->get("dateFin") : date("Y-m-d", $this->getDimanchePrecedent(time()));
        $idUser = $request->getMethod() == 'POST' ? $request->get("choixUser") : '';
        $idCategory = $request->getMethod() == 'POST' ? $request->get("choixCategory") : '';
        $typeCategory = $request->getMethod() == 'POST' ? $request->get("typeCategory") : 1;

        $seriesSur = $this->createSeries($dateDebut, $dateFin, $idUser, $idCategory, $typeCategory);

        $dates = array(
            "",
        );

        $tmpDebut = explode('-', $dateDebut);
        $tmpFin = explode('-', $dateFin);

        $title = "Statistiques sur la période du " . $tmpDebut[2] . "/" . $tmpDebut[1] . "/" . $tmpDebut[0] . " au " . $tmpFin[2] . "/" . $tmpFin[1] . "/" . $tmpFin[0];
        if ($idUser) {
            $user = $emUser->find($idUser);
            $title .= "<br>Utilisateur : " . $user->getPrenom() . ' ' . $user->getNom();
        }
        if ($idCategory) {
            $categorie = $emCategory->find($idCategory);
            $title .= "<br> Catégorie : " . $categorie->getNom();
        }

        $obSur = new Highchart();
        $obSur->chart->renderTo('barchart');
        $obSur->title->text($title);
        $obSur->chart->type('column');
        $obSur->yAxis->title(array('text' => "Montant (€)"));
        $obSur->xAxis->title(array('text' => ""));
        $obSur->xAxis->categories($dates);
        $obSur->series($seriesSur);

        return $this->render('JennyStatBundle:Stats:stats.html.twig', array(
                    'chart' => $obSur,
                    'width' => 25,
                    'dateDebut' => $dateDebut,
                    'dateFin' => $dateFin,
                    'idUser' => $idUser,
                    'idCategory' => $idCategory,
                    'typeCategory' => $typeCategory,
                    'users' => $users,
                    'categories' => $categories,
                    'connecter' => 'test',
        ));
    }
    
    /**
     * @Route("/stats", name="_stat")
     * @Template()
     */
    public function statUserAction(Request $request) {
        $emUser = $this->getDoctrine()->getManager()->getRepository('JennyUserBundle:User');
        $emCategory = $this->getDoctrine()->getManager()->getRepository('JennyImportBundle:Category');
        $categories = $emCategory->findAll();
        $user = $this->container->get('security.context')->getToken()->getUser();
        
        $dateDebut = $request->getMethod() == 'POST' ? $request->get("dateDebut") : date("Y-m-d", $this->getLundiPrecedent(time()));
        $dateFin = $request->getMethod() == 'POST' ? $request->get("dateFin") : date("Y-m-d", $this->getDimanchePrecedent(time()));
        $idUser = $user->getId();
        $idCategory = $request->getMethod() == 'POST' ? $request->get("choixCategory") : '';

        $seriesSur = $this->createSeries($dateDebut, $dateFin, $idUser, $idCategory, 2);

        $dates = array(
            "",
        );

        $tmpDebut = explode('-', $dateDebut);
        $tmpFin = explode('-', $dateFin);

        $title = "Statistiques sur la période du " . $tmpDebut[2] . "/" . $tmpDebut[1] . "/" . $tmpDebut[0] . " au " . $tmpFin[2] . "/" . $tmpFin[1] . "/" . $tmpFin[0];
        if ($idUser) {
            $user = $emUser->find($idUser);
            $title .= "<br>Utilisateur : " . $user->getPrenom() . ' ' . $user->getNom();
        }
        if ($idCategory) {
            $categorie = $emCategory->find($idCategory);
            $title .= "<br> Catégorie : " . $categorie->getNom();
        }

        $obSur = new Highchart();
        $obSur->chart->renderTo('barchart');
        $obSur->title->text($title);
        $obSur->chart->type('column');
        $obSur->yAxis->title(array('text' => "Montant (€)"));
        $obSur->xAxis->title(array('text' => ""));
        $obSur->xAxis->categories($dates);
        $obSur->series($seriesSur);

        return $this->render('JennyStatBundle:Stats:stats.html.twig', array(
                    'chart' => $obSur,
                    'width' => 25,
                    'dateDebut' => $dateDebut,
                    'dateFin' => $dateFin,
                    'idUser' => $idUser,
                    'idCategory' => $idCategory,
                    'typeCategory' => 2,
                    'users' => '',
                    'categories' => $categories,
                    'connecter' => 'test',
        ));
    }

    private function createSeries($dateDebut, $dateFin, $idUser, $idCategory, $typeCategory) {
        $emUser = $this->getDoctrine()->getManager()->getRepository('JennyUserBundle:User');
        $emCategory = $this->getDoctrine()->getManager()->getRepository('JennyImportBundle:Category');
        $emLigneFrais = $this->getDoctrine()->getManager()->getRepository('JennyImportBundle:LigneFrais');

        $seriesSur = array();
        if (!$idCategory) {
            $categories = $emCategory->findAll();
            $user = $emUser->find($idUser);
            foreach ($categories as $category) {
                if (!$category->getParent() && $category->getNum() && $typeCategory == 1) {
                    $serie = array();
                    $serie["name"] = $category->getNom();
                    $data = array();
                    $data[] = (float) $emLigneFrais->getStats($dateDebut, $dateFin, $user, $category, $typeCategory);
                    $serie["data"] = $data;
                    $seriesSur[] = $serie;
                } else if ($category->getParent() && $category->getNum() && $typeCategory == 2) {
                    $serie = array();
                    $serie["name"] = $category->getNom();
                    $data = array();
                    $data[] = (float) $emLigneFrais->getStats($dateDebut, $dateFin, $user, $category, $typeCategory);
                    $serie["data"] = $data;
                    $seriesSur[] = $serie;
                }
            }
        } else {
            $category = $emCategory->find($idCategory);
            if (!$idUser) {
                $users = $emUser->findAll();
                foreach ($users as $user) {
                    $serie = array();
                    $serie["name"] = $user->getPrenom() . " " . $user->getNom();
                    $data = array();
                    $data[] = (float) $emLigneFrais->getStats($dateDebut, $dateFin, $user, $category, $typeCategory);
                    $serie["data"] = $data;
                    $seriesSur[] = $serie;
                }
            } else {
                $user = $emUser->find($idUser);

                $serie = array();
                $serie["name"] = $category->getNom();
                $data = array();
                $data[] = (float) $emLigneFrais->getStats($dateDebut, $dateFin, $user, $category, $typeCategory);
                $serie["data"] = $data;
                $seriesSur[] = $serie;
            }
        }

        return $seriesSur;
    }

    private function getLundiPrecedent($TimeStampActuel) {
        if (date('w', $TimeStampActuel) == '0') {
            $joursAsoustraire = 6;
        } else {
            $joursAsoustraire = date('w', $TimeStampActuel) - 1;
        }
        return mktime(0, 0, 0, date("n", $TimeStampActuel), date("j", $TimeStampActuel) - $joursAsoustraire, date("Y", $TimeStampActuel));
    }

    private function getDimanchePrecedent($TimeStampActuel) {
        return mktime(0, 0, 0, date("n", $this->getLundiPrecedent($TimeStampActuel)), date("j", $this->getLundiPrecedent($TimeStampActuel)) + 6, date("Y", $this->getLundiPrecedent($TimeStampActuel)));
    }

}
