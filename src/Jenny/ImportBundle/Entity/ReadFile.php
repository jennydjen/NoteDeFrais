<?php

namespace Jenny\ImportBundle\Entity;

use Symfony\Component\Debug\Exception\ContextErrorException;
use Symfony\Component\Debug\Exception\FatalErrorException;

/**
 * Description of LoadFile
 *
 * @author Jenny
 */
class ReadFile {

    public function __construct() {
        
    }

    public function loadFile($file) {
        try {
            $objPHPExcel = \PHPExcel_IOFactory::load($file);

            // get all the row of my file
            $rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();
            foreach ($rowIterator as $row) {
                $cellIterator = $row->getCellIterator();
                // Loop all cells, even if it is not set
                $cellIterator->setIterateOnlyExistingCells(false);
                $rowIndex = $row->getRowIndex();
                $array_data[$rowIndex] = array('A' => '', 'B' => '', 'C' => '', 'D' => '',
                    'E' => '', 'F' => '', 'G' => '', 'H' => '', 'I' => '', 'J' => '');
                foreach ($cellIterator as $cell) {
                    $array_data[$rowIndex][$cell->getColumn()] = $cell->getFormattedValue();
                }
            }

            return $array_data;
        } catch (ContextErrorException $e) {
            return "ERROR FILE";
        }
    }

    public function checkData($array_data) {
        $isCorrect = true;

        //$service = $array_data[5]['C'];

        $baremeKm = $array_data[7]['C'];
        //$autorisePar = $array_data[4]['H'];

        $avance = $array_data[40]['J'];

        if (!$this->isDoubleData($baremeKm)) {
            $isCorrect = false;
        }
        if (!$this->isDoubleData($avance)) {
            $isCorrect = false;
        }

        if (!$this->checkDate($array_data)) {
            $isCorrect = false;
        } else if (!$this->isGoodWeek($array_data)) {
            $isCorrect = false;
        }
        if (!$this->checkTransport($array_data)) {
            $isCorrect = false;
        }
        if (!$this->checkHebergementRepas($array_data)) {
            $isCorrect = false;
        }
        if (!$this->checkDivers($array_data)) {
            $isCorrect = false;
        }

        /*echo "Est ce que le fichier est correct : ";
        if ($isCorrect) {
            echo 'True <br>';
        } else {
            echo 'False <br>';
        }*/
        return $isCorrect;
    }

    private function checkDate($array_data) {
        $isCorrect = true;

        $dateFinSemaine = $array_data[6]['C'];
        if (!$this->isDateData($dateFinSemaine)) {
            $isCorrect = false;
        }
        $date = $array_data[6]['H'];
        if (!$this->isDateData($date)) {
            $isCorrect = false;
        }
        $lundiDate = $array_data[10]['C'];
        if (!$this->isDateData($lundiDate)) {
            $isCorrect = false;
        }
        $mardiDate = $array_data[10]['D'];
        if (!$this->isDateData($mardiDate)) {
            $isCorrect = false;
        }
        $mercrediDate = $array_data[10]['E'];
        if (!$this->isDateData($mercrediDate)) {
            $isCorrect = false;
        }
        $jeudiDate = $array_data[10]['F'];
        if (!$this->isDateData($jeudiDate)) {
            $isCorrect = false;
        }
        $vendrediDate = $array_data[10]['G'];
        if (!$this->isDateData($vendrediDate)) {
            $isCorrect = false;
        }
        $samediDate = $array_data[10]['H'];
        if (!$this->isDateData($samediDate)) {
            $isCorrect = false;
        }
        $dimancheDate = $array_data[10]['I'];
        if (!$this->isDateData($dimancheDate)) {
            $isCorrect = false;
        }

        /*if ($isCorrect) {
            echo "Dates Ok <br>";
        } else {
            echo "Dates Non <br>";
        }*/

        return $isCorrect;
    }

    private function isGoodWeek($array_data) {
        $isCorrect = true;
        if ($array_data[6]['C'] != $array_data[10]['I']) {
            $isCorrect = false;
        } else {
            $dateTime = $this->getDate($array_data[6]['C']);
            $dateTime->modify("-1 day");
            $dateTimeSamedi = $this->getDate($array_data[10]['H']);
            $dateSamedi = $dateTime->format("Y-m-d");
            if ($dateSamedi != $dateTimeSamedi->format("Y-m-d")) {
                $isCorrect = false;
            }

            $dateTime->modify("-1 day");
            $dateTimeVendredi = $this->getDate($array_data[10]['G']);
            $dateVendredi = $dateTime->format("Y-m-d");
            if ($dateVendredi != $dateTimeVendredi->format("Y-m-d")) {
                $isCorrect = false;
            }

            $dateTime->modify("-1 day");
            $dateTimeJeudi = $this->getDate($array_data[10]['F']);
            $dateJeudi = $dateTime->format("Y-m-d");
            if ($dateJeudi != $dateTimeJeudi->format("Y-m-d")) {
                $isCorrect = false;
            }

            $dateTime->modify("-1 day");
            $dateTimeMercredi = $this->getDate($array_data[10]['E']);
            $dateMercredi = $dateTime->format("Y-m-d");
            if ($dateMercredi != $dateTimeMercredi->format("Y-m-d")) {
                $isCorrect = false;
            }

            $dateTime->modify("-1 day");
            $dateTimeMardi = $this->getDate($array_data[10]['D']);
            $dateMardi = $dateTime->format("Y-m-d");
            if ($dateMardi != $dateTimeMardi->format("Y-m-d")) {
                $isCorrect = false;
            }

            $dateTime->modify("-1 day");
            $dateTimeLundi = $this->getDate($array_data[10]['C']);
            $dateLundi = $dateTime->format("Y-m-d");
            if ($dateLundi != $dateTimeLundi->format("Y-m-d")) {
                $isCorrect = false;
            }

            $lundiSemaine = date('Y-m-d', $this->getLundiPrecedent(time()));
            if ($dateLundi != $lundiSemaine) {
                $isCorrect = false;
            }
        }

        /*if ($isCorrect) {
            echo 'Week Ok <br>';
        } else {
            echo 'Week Non <br>';
        }*/

        return $isCorrect;
    }

    private function getLundiPrecedent($TimeStampActuel) {
        if (date('w', $TimeStampActuel) == '0') {
            $joursAsoustraire = 6;
        } else {
            $joursAsoustraire = date('w', $TimeStampActuel) - 1;
        }
        return mktime(0, 0, 0, date("n", $TimeStampActuel), date("j", $TimeStampActuel) - $joursAsoustraire, date("Y", $TimeStampActuel));
    }

    /**
     * Verifier la categorie Transport
     * @param type $array_data
     * @return boolean
     */
    private function checkTransport($array_data) {
        $isCorrect = true;
        // Verifier la sous categorie "Kilomètre parcourus"
        if (!$this->checkSousCategorie($array_data, 11, "Kilomètre parcourus")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Remboursement des kilometres"
        if (!$this->checkSousCategorie($array_data, 12, "Remboursement des kilomètres")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Parking et peages"
        if (!$this->checkSousCategorie($array_data, 13, "Parking et péages")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Location de voiture"
        if (!$this->checkSousCategorie($array_data, 14, "Location de voiture")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Taxi/limousine"
        if (!$this->checkSousCategorie($array_data, 15, "Taxi/limousine")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Autre (train ou bus)"
        if (!$this->checkSousCategorie($array_data, 16, "Autre (train ou bus)")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Billets d'avion"
        if (!$this->checkSousCategorie($array_data, 17, "Billets d'avion")) {
            $isCorrect = false;
        }

        /*if ($isCorrect) {
            echo "Transport Ok <br>";
        } else {
            echo "Transport Non <br>";
        }*/

        return $isCorrect;
    }

    /**
     * Verifier la categorie Hebergement et repas
     * @param type $array_data
     * @return boolean
     */
    private function checkHebergementRepas($array_data) {
        $isCorrect = true;
        // Verifier la sous categorie "Hébergement"
        if (!$this->checkSousCategorie($array_data, 21, "Hébergement")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Petit-déjeuner"
        if (!$this->checkSousCategorie($array_data, 22, "Petit-déjeuner")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Déjeuner"
        if (!$this->checkSousCategorie($array_data, 23, "Déjeuner")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Dîner"
        if (!$this->checkSousCategorie($array_data, 24, "Dîner")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Collation"
        if (!$this->checkSousCategorie($array_data, 25, "Collation")) {
            $isCorrect = false;
        }
       /* if ($isCorrect) {
            echo "Hebergement Ok <br>";
        } else {
            echo "Hebergement Non <br>";
        }*/
        return $isCorrect;
    }

    /**
     * Vérifier la categorie Divers
     * @param type $array_data
     * @return boolean
     */
    private function checkDivers($array_data) {
        $isCorrect = true;
        // Verifier la sous categorie "Fournitures"
        if (!$this->checkSousCategorie($array_data, 30, "Fournitures")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Equipement"
        if (!$this->checkSousCategorie($array_data, 31, "Equipement")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Téléphone, télécopie, internet"
        if (!$this->checkSousCategorie($array_data, 32, "Téléphone, télécopie, internet")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Autres*"
        if (!$this->checkSousCategorie($array_data, 33, "Autres*")) {
            $isCorrect = false;
        }
        // Verifier la sous categorie "Divertissements*"
        if (!$this->checkSousCategorie($array_data, 34, "Divertissements*")) {
            $isCorrect = false;
        }
       /* if ($isCorrect) {
            echo "divers Ok <br>";
        } else {
            echo "divers Non <br>";
        }*/
        return $isCorrect;
    }

    private function checkSousCategorie($array_data, $row, $nameCategorie) {
        return $this->checkCategorie($array_data[$row]['B'], $nameCategorie, $array_data[$row]['C'], $array_data[$row]['D'], $array_data[$row]['E'], $array_data[$row]['F'], $array_data[$row]['G'], $array_data[$row]['H'], $array_data[$row]['I'], $array_data[$row]['J']);
    }

    private function checkCategorie($nameCategorieFile, $nameCategorie, $valueLundi, $valueMardi, $valueMercredi, $valueJeudi, $valueVendredi, $valueSamedi, $valueDimanche, $totalFile) {
        $isCorrect = true;
        if ($nameCategorieFile == $nameCategorie) {
            if (!$this->isDoubleData($valueLundi)) {
                $isCorrect = false;
            }
            if (!$this->isDoubleData($valueMardi)) {
                $isCorrect = false;
            }
            if (!$this->isDoubleData($valueMercredi)) {
                $isCorrect = false;
            }
            if (!$this->isDoubleData($valueJeudi)) {
                $isCorrect = false;
            }
            if (!$this->isDoubleData($valueVendredi)) {
                $isCorrect = false;
            }
            if (!$this->isDoubleData($valueSamedi)) {
                $isCorrect = false;
            }
            if (!$this->isDoubleData($valueDimanche)) {
                $isCorrect = false;
            }

            if (!$this->isDoubleData($totalFile)) {
                $isCorrect = false;
            }

            if ($isCorrect) {
                $total = $valueLundi + $valueMardi + $valueMercredi + $valueJeudi + $valueVendredi + $valueSamedi + $valueDimanche;
                if ($totalFile != $total) {
                    $isCorrect = false;
                }
            }
        } else {
            $isCorrect = false;
        }
        return $isCorrect;
    }

    private function isDoubleData($data) {
        $isCorrect = true;
        if ($data != '' && $data != '0') {
            $data = str_replace(",", ".", $data);
            if (!is_numeric($data)) {
                $isCorrect = false;
            }
        }

        return $isCorrect;
    }

    private function getDate($data) {
        $tmp = explode('/', $data);
        if (count($tmp) == 3) {
            try {
                $format = "d/m/Y";
                $d = \DateTime::createFromFormat($format, $data);
                return $d;
            } catch (FatalErrorException $fee) {
                return false;
            }
        } else {
            $tmp = explode('-', $data);
            if (count($tmp) == 3) {
                try {
                    $annee = explode(" ", $tmp[2]);
                    $format = "d-M-y";
                    $tmpDate = $tmp[0] . "-" . $tmp[1] . "-" . $annee[0];

                    $d = \DateTime::createFromFormat($format, $tmpDate);

                    return $d;
                } catch (FatalErrorException $fee) {
                    return false;
                }
            }
        }
        return false;
    }

    private function isDateData($data) {
        $isCorrect = true;
        $tmp = explode('/', $data);
        if (count($tmp) == 3) {
            try {
                $format = "d/m/Y";
                $d = \DateTime::createFromFormat($format, $data);
                $isCorrect = $d && $d->format($format) == $data;
            } catch (FatalErrorException $fee) {
                $isCorrect = false;
            }
        } else if (count($tmp) == 1) {
            $tmp = explode('-', $data);
            if (count($tmp) == 3) {
                try {
                    $annee = explode(" ", $tmp[2]);
                    $format = "d-M-y";
                    $tmpDate = $tmp[0] . "-" . $tmp[1] . "-" . $annee[0];

                    $d = \DateTime::createFromFormat($format, $tmpDate);

                    $isCorrect = $d && $d->format($format) == $tmpDate;
                } catch (FatalErrorException $fee) {
                    $isCorrect = false;
                }
            } else {
                $isCorrect = false;
            }
        } else {
            $isCorrect = false;
        }
        return $isCorrect;
    }

    public function isUserData($user, $userConnected) {
        if ($user && $userConnected && $user[0]->getId() == $userConnected->getId()) {
            return true;
        }
        return false;
    }

    public function createLigneFrais($array_data, $emCategory, $user) {
        $columns = array('C' => '', 'D' => '',
            'E' => '', 'F' => '', 'G' => '', 'H' => '', 'I' => '');

        $lignes = array();
        for ($i = 11; $i < 35; $i ++) {
            if ($i != 18 && $i != 19 && $i != 20 && $i != 26 && $i != 27 && $i != 28 && $i != 29) {
                $nameCategory = $array_data[$i]['B'];
                $category = $emCategory->getCategoryByName($nameCategory);
                if ($category) {
                    $category = $emCategory->find($category[0]->getId());
                    foreach ($columns as $column => $value) {
                        if ($array_data[$i][$column]) {
                            $ligne = new LigneFrais();
                            $ligne->setCategory($category);
                            $ligne->setMontant($array_data[$i][$column]);
                            $ligne->setDate($this->getDate($array_data[10][$column]));
                            $ligne->setUser($user);

                            $lignes[] = $ligne;
                        }
                    }
                }
            }
        }

        if ($array_data[40]['J']) {
            $ligneAvance = new LigneFrais();
            $ligneAvance->setMontant($array_data[40]['J']);
            $ligneAvance->setDate($this->getDate($array_data[6]['C']));
            $ligneAvance->setUser($user);
            $category = $emCategory->getCategoryByName("Avance");
            $category = $emCategory->find($category[0]->getId());
            $ligneAvance->setCategory($category);
            $lignes[] = $ligneAvance;
        }

        if ($array_data[7]['C']) {
            $ligneBaremKilo = new LigneFrais();
            $ligneBaremKilo->setMontant($array_data[7]['C']);
            $ligneBaremKilo->setDate($this->getDate($array_data[6]['C']));
            $ligneBaremKilo->setUser($user);
            $category = $emCategory->getCategoryByName("BaremeKilo");
            $category = $emCategory->find($category[0]->getId());
            $ligneBaremKilo->setCategory($category);
            $lignes[] = $ligneBaremKilo;
        }

        return $lignes;
    }

    public function searchDoublon($array_data, $emCategory, $emLigneFrais, $user) {
        $columns = array('C' => '', 'D' => '',
            'E' => '', 'F' => '', 'G' => '', 'H' => '', 'I' => '');

        $dataBase = array();

        for ($i = 11; $i < 35; $i ++) {
            if ($i != 18 && $i != 19 && $i != 20 && $i != 26 && $i != 27 && $i != 28 && $i != 29) {
                $nameCategory = $array_data[$i]['B'];
                $category = $emCategory->getCategoryByName($nameCategory);
                if ($category) {
                    $category = $emCategory->find($category[0]->getId());
                    foreach ($columns as $column => $value) {
                        $ligne = $emLigneFrais->isExist($category, $this->getDate($array_data[10][$column]), $user);
                        if ($array_data[$i][$column] && $ligne && $ligne[0]->getMontant() != $array_data[$i][$column]) {
                            if (!isset($dataBase[$i])) {
                                $dataBase[$i] = array();
                            }
                            $dataBase[$i][$column] = $ligne[0];
                        }
                    }
                }
            }
        }

        if ($array_data[40]['J']) {
            $category = $emCategory->getCategoryByName("Avance");
            $category = $emCategory->find($category[0]->getId());

            $ligne = $emLigneFrais->isExist($category, $this->getDate($array_data[6]['C']), $user);
            if ($array_data[40]['J'] && $ligne && $ligne[0]->getMontant() != $array_data[40]['J']) {
                if (!isset($dataBase[40])) {
                    $dataBase[40] = array();
                }
                $dataBase[40]['J'] = $ligne[0];
            }
        }

        if ($array_data[7]['C']) {
            $category = $emCategory->getCategoryByName("BaremeKilo");
            $category = $emCategory->find($category[0]->getId());

            $ligne = $emLigneFrais->isExist($category, $this->getDate($array_data[6]['C']), $user);
            if ($array_data[7]['C'] && $ligne && $ligne[0]->getMontant() != $array_data[7]['C']) {
                if (!isset($dataBase[7])) {
                    $dataBase[7] = array();
                }

                $dataBase[7]['C'] = $ligne[0];
            }
        }
        return $dataBase;
    }

}
