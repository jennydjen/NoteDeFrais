INSERT INTO `category`(`id`, `nom`, `sum`) VALUES (1, "Transport", 1);
INSERT INTO `category`(`id`, `nom`, `sum`) VALUES (2, "Hébergement et repas", 1);
INSERT INTO `category`(`id`, `nom`, `sum`) VALUES (3, "Divers", 1);
INSERT INTO `category`(`id`, `nom`, `sum`) VALUES (21, "Avance", 0);
INSERT INTO `category`(`id`, `nom`, `sum`) VALUES (22, "BaremeKilo", 0);


INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (4, 1, "Kilomètre parcourus", 0);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (5, 1, "Remboursement des kilomètres", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (6, 1, "Parking et péages", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (7, 1, "Location de voiture", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (8, 1, "Taxi/limousine", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (9, 1, "Autre (train ou bus)", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (10, 1, "Billets d'avion", 1);

INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (11, 2, "Hébergement", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (12, 2, "Petit-déjeuner", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (13, 2, "Déjeuner", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (14, 2, "Dîner", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (15, 2, "Collation", 1);

INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (16, 3, "Fournitures", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (17, 3, "Equipement", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (18, 3, "Téléphone, télécopie, internet", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (19, 3, "Autres*", 1);
INSERT INTO `category`(`id`, `parent_id`, `nom`, `sum`) VALUES (20, 3, "Divertissements*", 1);