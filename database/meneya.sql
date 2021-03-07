-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 05 mars 2021 à 10:23
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `meneya`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

CREATE TABLE `acces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `acces`
--

INSERT INTO `acces` (`id`, `libelle`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Gestion des Arrivages', 'Enregistrer et valider les entrées de produits', NULL, NULL),
(2, 'Gestion de la Principale\r\n', 'Accès a l\'administration de la général', NULL, NULL),
(3, 'Gestion des Succursales\r\n', 'Création, validation des versement des succursales', NULL, NULL),
(4, 'Gestion des Ventes\r\n', 'Effectuer ventes, controller le stock, Edition de facture', NULL, NULL),
(5, 'Gestion des Utilisateur\r\n', 'Ajouter, suprimer, Privilège Utilisateurs', NULL, NULL),
(6, 'Gestion des Opérateurs\r\n', 'Enregistrements d\'opérateur,leurs opérations et transactions', NULL, NULL),
(7, 'Gestion des Fournisseurs\r\n', 'Ajout de fournisseur, Suivit de paiement fournisseur', NULL, NULL),
(8, 'Accès aux Prospects\r\n', 'Enregistrement prospect, analyse de besoin', NULL, NULL),
(9, 'Accès aux Campagnes Marketting\r\n', 'Enregistrement prospect, analyse de besoin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `approvisionnements`
--

CREATE TABLE `approvisionnements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `approvisionMat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `approvisionStatut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `approvisionMontant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `approvisionTotal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dateApro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `succursale_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `approvisionnements`
--

INSERT INTO `approvisionnements` (`id`, `approvisionMat`, `approvisionStatut`, `approvisionMontant`, `approvisionTotal`, `dateApro`, `succursale_id`, `created_at`, `updated_at`) VALUES
(1, 'APR#04/03/21#31', '0', '1531250', '30', '0', 2, '2021-03-04 11:31:18', '2021-03-04 11:31:19');

-- --------------------------------------------------------

--
-- Structure de la table `arrivages`
--

CREATE TABLE `arrivages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `arrivageLibelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrivagePrix` int(11) NOT NULL,
  `arrivageQte` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrivageDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatArvg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `arrivages`
--

INSERT INTO `arrivages` (`id`, `arrivageLibelle`, `arrivagePrix`, `arrivageQte`, `arrivageDate`, `MatArvg`, `statut`, `created_at`, `updated_at`) VALUES
(1, 'arrivage', 6735000, '110', '04/03/2021', 'Arr#11_22_42', 1, '2021-03-04 11:22:42', '2021-03-04 11:23:24');

-- --------------------------------------------------------

--
-- Structure de la table `arrivage_has_produits`
--

CREATE TABLE `arrivage_has_produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qteproduits` int(11) NOT NULL COMMENT 'Quantité du produits pris dans l''arrivage\\n',
  `coutachat` int(11) NOT NULL COMMENT 'le coût d''achat de la relation arrivage_has_produits définit le prix d''achat actuel du produit et met à jour le prix d''achat du produit dans la table produit\\n\\n',
  `prixvente` int(11) NOT NULL COMMENT 'le prix de vente de la relation arrivage_has_produits définit le prix de vente actuel du produit et met à jour le prix de vente  du produit dans la table produit\\n\\n',
  `arrivage_id` bigint(20) UNSIGNED NOT NULL,
  `produits_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `arrivage_has_produits`
--

INSERT INTO `arrivage_has_produits` (`id`, `qteproduits`, `coutachat`, `prixvente`, `arrivage_id`, `produits_id`, `created_at`, `updated_at`) VALUES
(1, 15, 50000, 62500, 1, 1, '2021-03-04 11:22:42', '2021-03-04 11:22:42'),
(2, 4, 15000, 18750, 1, 2, '2021-03-04 11:22:42', '2021-03-04 11:22:42'),
(3, 50, 57000, 71250, 1, 3, '2021-03-04 11:22:42', '2021-03-04 11:22:42'),
(4, 41, 75000, 93750, 1, 4, '2021-03-04 11:22:42', '2021-03-04 11:22:42');

-- --------------------------------------------------------

--
-- Structure de la table `avances`
--

CREATE TABLE `avances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refAvance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateAvance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montantAvance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusAvance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'status de l''avance soit :\\nSolde => 0\\nEn cours => 1\\n',
  `salarie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `besoins`
--

CREATE TABLE `besoins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dateV` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'date de validation',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `besoins`
--

INSERT INTO `besoins` (`id`, `nom`, `image`, `details`, `dateV`, `created_at`, `updated_at`) VALUES
(1, 'bannane', 'image', 'besoins clients', '04/03/2021', '2021-03-04 12:46:59', '2021-03-04 12:46:59');

-- --------------------------------------------------------

--
-- Structure de la table `bulletins`
--

CREATE TABLE `bulletins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateBuletin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lienpdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salarie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bulletin_has_rubriques`
--

CREATE TABLE `bulletin_has_rubriques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `montant` int(11) NOT NULL,
  `bulletin_id` bigint(20) UNSIGNED NOT NULL,
  `rubrique_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'Non classe', NULL, NULL),
(2, 'ORDINATEUR PORTABLE', '2021-03-04 11:12:08', '2021-03-04 11:12:08'),
(3, 'ORDINATEUR PORTABLE', '2021-03-04 11:12:09', '2021-03-04 11:12:09'),
(4, 'bureau', '2021-03-04 11:15:20', '2021-03-04 11:15:20'),
(5, 'telepephone', '2021-03-04 11:19:28', '2021-03-04 11:19:28');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `statutClt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'le statut du client défini s''il est un prospect donc pas encore d''achat et s''il est un client donc a  dejà effectué un achat.\\n\\nstatut = 0 => prospect \\nstaut = 1 =>  client\\n\\n',
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `statutClt`, `nom`, `contact`, `lieu`, `date`, `mail`, `created_at`, `updated_at`) VALUES
(1, '1', 'Client anonyme', '2250102205211', '', '', '', NULL, NULL),
(3, '0', 'ngue', '2250788833060', 'lieu', '04/03/2021', NULL, '2021-03-04 12:45:44', '2021-03-04 23:33:45');

-- --------------------------------------------------------

--
-- Structure de la table `clients_has_besoins`
--

CREATE TABLE `clients_has_besoins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clients_id` bigint(20) UNSIGNED NOT NULL,
  `besoins_id` bigint(20) UNSIGNED NOT NULL,
  `dateD` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'La date de demande\\n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients_has_besoins`
--

INSERT INTO `clients_has_besoins` (`id`, `clients_id`, `besoins_id`, `dateD`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '04/03/2121', '2021-03-04 12:46:59', '2021-03-04 12:46:59');

-- --------------------------------------------------------

--
-- Structure de la table `credits`
--

CREATE TABLE `credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creditEcheance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditMontant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditStatut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `factureavoir_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `credits_princips`
--

CREATE TABLE `credits_princips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creditEcheance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditMontant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditStatut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creditDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `princip_factu_avoirs_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devises`
--

CREATE TABLE `devises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbole` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devises`
--

INSERT INTO `devises` (`id`, `libelle`, `symbole`, `created_at`, `updated_at`) VALUES
(1, 'Francs CFA', 'CFA', NULL, NULL),
(2, 'Dollar Americain', '$', NULL, NULL),
(3, 'Euro', '£', NULL, NULL),
(4, 'Francs Suisse', 'XCHOF', NULL, NULL),
(5, 'Yen', 'yen', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dossier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

CREATE TABLE `dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomdossier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbrefichier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'la référence du dossier',
  `session` int(11) NOT NULL COMMENT 'L''utilisateur qu enregistre l''information',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `echeancehistoriques`
--

CREATE TABLE `echeancehistoriques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomAgent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montantPaye` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datePaiement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banque` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typepaiement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `echeance_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `echeancehistoriques`
--

INSERT INTO `echeancehistoriques` (`id`, `nomAgent`, `montantPaye`, `datePaiement`, `banque`, `typepaiement`, `echeance_id`, `created_at`, `updated_at`) VALUES
(1, 'MBO BOUA HUBERT', '5000', '05/03/21', 'ecobank', 'Banque', 1, '2021-03-04 12:41:23', '2021-03-04 12:41:23'),
(2, 'kouame ngues', '5000', '06/03/21', NULL, 'Espèce', 1, '2021-03-04 12:44:03', '2021-03-04 12:44:03');

-- --------------------------------------------------------

--
-- Structure de la table `echeances`
--

CREATE TABLE `echeances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `echeanceStatut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `echeanceMontant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `echeanceDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateAchat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fournisseurs_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `echeances`
--

INSERT INTO `echeances` (`id`, `echeanceStatut`, `echeanceMontant`, `echeanceDate`, `dateAchat`, `fournisseurs_id`, `created_at`, `updated_at`) VALUES
(1, 'Soldée', '10000', '05/03/2121', '04/03/2121', 1, '2021-03-04 12:40:52', '2021-03-04 12:44:04');

-- --------------------------------------------------------

--
-- Structure de la table `factureachats`
--

CREATE TABLE `factureachats` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Ici on enregistre le devis soldé ou la facture proformat soldée du client.\\nLa quantité du stock est déduite à partir de la quantité de la facture achat. ',
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datefacture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'La date d''édition de la facture',
  `dateecheance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'La date d''édition de la facture',
  `totalttc` int(11) NOT NULL,
  `totalhtc` int(11) NOT NULL,
  `paiementmode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` int(11) NOT NULL COMMENT 'La session de celui qui a enregistré la factureachat\\n',
  `ventes_succursales_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `factureavoirs`
--

CREATE TABLE `factureavoirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datefacturation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalht` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalttc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paiement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ventes_succursales_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fournisseurMat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fournisseurContact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fournisseurNom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fournisseurRespo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nom du responsable de l entreprise fournisseur',
  `fournisseurMail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `fournisseurMat`, `fournisseurContact`, `fournisseurNom`, `fournisseurRespo`, `fournisseurMail`, `created_at`, `updated_at`) VALUES
(1, '305537399F', '0102205211', 'SAPH', 'kone moussa', 'saph@gmail.com', '2021-03-04 12:40:27', '2021-03-04 12:40:27');

-- --------------------------------------------------------

--
-- Structure de la table `interesses`
--

CREATE TABLE `interesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `interesses`
--

INSERT INTO `interesses` (`id`, `nom`, `tel`, `lieu`, `created_at`, `updated_at`) VALUES
(1, 'SUCCURSALE LAHOU', '0542212552', 'Rivera', '2021-03-04 23:58:44', '2021-03-04 23:58:44'),
(2, 'c', '1', 'c', '2021-03-05 00:10:39', '2021-03-05 00:10:39'),
(3, 'c', '1', 'c', '2021-03-05 00:10:45', '2021-03-05 00:10:45'),
(4, 'c', '1', 'c', '2021-03-05 00:10:59', '2021-03-05 00:10:59'),
(5, 'z', '1', 'a', '2021-03-05 00:12:02', '2021-03-05 00:12:02'),
(6, 'a', '1', 'a', '2021-03-05 00:14:10', '2021-03-05 00:14:10'),
(7, 'a', '1', 'a', '2021-03-05 00:18:38', '2021-03-05 00:18:38'),
(8, 'a', '1', 'a', '2021-03-05 00:22:07', '2021-03-05 00:22:07');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_13_160036_create_arrivages_table', 1),
(5, '2020_11_13_160424_create_clients_table', 1),
(6, '2020_11_13_174525_create_besoins_table', 1),
(7, '2020_11_13_174824_create_fournisseurs_table', 1),
(8, '2020_11_13_174830_create_echeances_table', 1),
(9, '2020_11_13_181205_create_operateurs_table', 1),
(10, '2020_11_13_181500_create_operations_table', 1),
(11, '2020_11_13_181629_create_categories_table', 1),
(12, '2020_11_13_181812_create_produits_table', 1),
(13, '2020_11_13_182432_create_settings_table', 1),
(14, '2020_11_13_182739_create_sms_table', 1),
(15, '2020_11_13_183014_create_succursales_table', 1),
(16, '2020_11_13_183306_create_salaries_table', 1),
(17, '2020_11_13_183728_create_dossiers_table', 1),
(18, '2020_11_13_184039_create_documents_table', 1),
(19, '2020_11_13_184746_create_ventes_succursales_table', 1),
(20, '2020_11_13_193907_create_factureavoirs_table', 1),
(21, '2020_11_13_194910_create_credits_table', 1),
(22, '2020_11_13_195258_create_devises_table', 1),
(23, '2020_11_13_195359_create_roles_table', 1),
(24, '2020_11_13_195437_create_approvisionnements_table', 1),
(25, '2020_11_13_195600_create_operations_has_operateurs_table', 1),
(26, '2020_11_13_215436_create_sortie_ops_table', 1),
(27, '2020_11_13_215637_create_stock_operateurs_table', 1),
(28, '2020_11_13_220600_create_stock_principales_table', 1),
(29, '2020_11_13_220915_create_stock_succursales_table', 1),
(30, '2020_11_13_223704_create_vente_principales_table', 1),
(31, '2020_11_13_231644_create_arrivage_has_produits_table', 1),
(32, '2020_11_13_232218_create_produits_has_approvisionnements_table', 1),
(33, '2020_11_13_232447_create_produits_has_ventes_succursales_table', 1),
(34, '2020_11_13_234834_create_succursale_has_clients_table', 1),
(35, '2020_11_13_235013_create_produits_has_vente_principales_table', 1),
(36, '2020_11_13_235301_create_factureachats_table', 1),
(37, '2020_11_14_000059_create_role_has_users_table', 1),
(38, '2020_11_14_000311_create_echeancehistoriques_table', 1),
(39, '2020_11_14_000606_create_produits_has_sortie_ops_table', 1),
(40, '2020_11_14_001709_create_sms_has_clients_table', 1),
(41, '2020_11_14_001822_create_clients_has_besoins_table', 1),
(42, '2020_11_14_002035_create_bulletins_table', 1),
(43, '2020_11_14_002345_create_rubriques_table', 1),
(44, '2020_11_14_002439_create_prets_table', 1),
(45, '2020_11_14_002645_create_avances_table', 1),
(46, '2020_11_14_004420_create_bulletin_has_rubriques_table', 1),
(47, '2020_11_14_004842_create_super_admins_table', 1),
(48, '2020_11_14_005013_create_prospects_table', 1),
(49, '2020_11_14_022349_create_offres_table', 1),
(50, '2020_11_14_022505_create_prospect_has_offres_table', 1),
(51, '2020_11_14_080847_create_princip_factu_achats_table', 1),
(52, '2020_11_14_081347_create_princip_factu_avoirs_table', 1),
(53, '2020_11_14_081644_create_credits_princips_table', 1),
(54, '2021_02_18_200312_create_ressources_hums_table', 1),
(55, '2021_02_21_034249_create_acces_table', 1),
(56, '2021_02_21_034307_create_user_has_acces_table', 1),
(57, '2021_02_22_181056_create_versements_table', 1),
(58, '2021_02_25_142634_create_versement_historiques_table', 1),
(59, '2021_03_04_094141_create_interesse_table', 1),
(60, '2021_03_04_094243_create_sms_has_interesses_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libele` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'A travers la solution digitale Meneya nous disposons de trois types d''offre opérationnelles sur le marché:\\n- La version d''essaie\\n- La version d''abonnement\\n- La version premium\\n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `operateurs`
--

CREATE TABLE `operateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `operateurMat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operateurNom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operateurContact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operateurDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operateurLieu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `operateurs`
--

INSERT INTO `operateurs` (`id`, `operateurMat`, `operateurNom`, `operateurContact`, `operateurDate`, `operateurLieu`, `created_at`, `updated_at`) VALUES
(1, '6Ap', 'kouame ngues kouassi', '0102205211', '04/03/2121', 'Abobo', '2021-03-04 11:57:12', '2021-03-04 11:57:12');

-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

CREATE TABLE `operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `OperationLibele` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operationCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Operationcomt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `operations`
--

INSERT INTO `operations` (`id`, `OperationLibele`, `operationCode`, `Operationcomt`, `created_at`, `updated_at`) VALUES
(1, 'placement de ciment', '4A', 'déposer de l\'argent pour acheter du ciment', '2021-03-04 12:04:03', '2021-03-04 12:04:03'),
(2, 'placement de briques', '11A', 'operation de retrait debriques', '2021-03-04 12:04:46', '2021-03-04 12:04:46');

-- --------------------------------------------------------

--
-- Structure de la table `operation_has_operateurs`
--

CREATE TABLE `operation_has_operateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `operations_id` bigint(20) UNSIGNED NOT NULL,
  `operateurs_id` bigint(20) UNSIGNED NOT NULL,
  `montant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montantrestant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `operation_has_operateurs`
--

INSERT INTO `operation_has_operateurs` (`id`, `operations_id`, `operateurs_id`, `montant`, `montantrestant`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1600000', '975000', '04/03/2121', '2021-03-04 12:05:29', '2021-03-04 12:38:52');

-- --------------------------------------------------------

--
-- Structure de la table `operation_pay_historiques`
--

CREATE TABLE `operation_pay_historiques` (
  `id` int(11) NOT NULL,
  `nomAgent` varchar(200) NOT NULL,
  `montantPaye` int(11) NOT NULL,
  `datePaiement` varchar(200) NOT NULL,
  `typepaiement` varchar(200) NOT NULL,
  `optionOpteur_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `operation_pay_historiques`
--

INSERT INTO `operation_pay_historiques` (`id`, `nomAgent`, `montantPaye`, `datePaiement`, `typepaiement`, `optionOpteur_id`, `updated_at`, `created_at`) VALUES
(1, 'ADMIN', 500000, '04/03/20', 'Mobile money', 1, '2021-03-04 12:38:52', '2021-03-04 12:38:52');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prets`
--

CREATE TABLE `prets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `montant` int(11) NOT NULL,
  `refPret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datePret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remboursement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateEcheance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salarie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `princip_factu_achats`
--

CREATE TABLE `princip_factu_achats` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Ici on enregistre le devis soldé ou la facture proformat soldée du client.\\nLa quantité du stock est déduite à partir de la quantité de la facture achat. ',
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'la référence de la facture achat\\ncode de référence:\\nFA_ANNEE_MOIS_RANG\\n',
  `datefacture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateecheance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalttc` int(11) NOT NULL,
  `totalhtc` int(11) NOT NULL,
  `paiementmode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vente_principales_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `princip_factu_avoirs`
--

CREATE TABLE `princip_factu_avoirs` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Ici on enregistre le devis soldé ou la facture proformat soldée du client.\\nLa quantité du stock est déduite à partir de la quantité de la facture achat. ',
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'la référence de la facture achat\\ncode de référence:\\nFA_ANNEE_MOIS_RANG\\n',
  `datefacture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateecheance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalttc` int(11) NOT NULL,
  `totalhtc` int(11) NOT NULL,
  `paiementmode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vente_principales_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produitMat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'code de l''article',
  `produitLibele` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seuilAlert` int(11) NOT NULL DEFAULT '10',
  `produitPrix` int(11) NOT NULL COMMENT 'Prix de vente du produit',
  `produitPrixFour` int(11) NOT NULL COMMENT 'Cout d'' achat du produit',
  `description` text COLLATE utf8mb4_unicode_ci,
  `unite_mesure` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tva` int(11) NOT NULL DEFAULT '0',
  `autre_charge` int(11) NOT NULL DEFAULT '0',
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `produitMat`, `produitLibele`, `seuilAlert`, `produitPrix`, `produitPrixFour`, `description`, `unite_mesure`, `tva`, `autre_charge`, `categorie_id`, `created_at`, `updated_at`) VALUES
(1, 'Prd1#00', 'UNITE CENTRAL', 10, 62500, 50000, 'UNITE CENTRAL', 'ND', 0, 0, 4, '2021-03-04 11:17:22', '2021-03-04 11:17:22'),
(2, 'Prd2#010', 'LENEOVO THINKPAD', 10, 18750, 15000, 'LENEOVO THINKPAD', 'ND', 0, 0, 2, '2021-03-04 11:18:45', '2021-03-04 11:18:45'),
(3, 'Prd3#02', 'TECNO SPARK', 15, 71250, 57000, 'TECNO SPARK', 'ND', 0, 0, 5, '2021-03-04 11:19:57', '2021-03-04 11:19:57'),
(4, 'Prd4#02', 'ITEL P15', 2, 93750, 75000, 'ITEL P15', 'ND', 0, 0, 5, '2021-03-04 11:20:16', '2021-03-04 11:20:16');

-- --------------------------------------------------------

--
-- Structure de la table `produits_has_approvisionnements`
--

CREATE TABLE `produits_has_approvisionnements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qteproduits` int(11) NOT NULL,
  `coutachat` int(11) NOT NULL,
  `prixvente` int(11) NOT NULL,
  `produits_id` bigint(20) UNSIGNED NOT NULL,
  `approvisionnement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits_has_approvisionnements`
--

INSERT INTO `produits_has_approvisionnements` (`id`, `qteproduits`, `coutachat`, `prixvente`, `produits_id`, `approvisionnement_id`, `created_at`, `updated_at`) VALUES
(1, 15, 15000, 18750, 2, 1, '2021-03-04 11:31:18', '2021-03-04 11:31:18'),
(2, 5, 50000, 62500, 1, 1, '2021-03-04 11:31:19', '2021-03-04 11:31:19'),
(3, 10, 75000, 93750, 4, 1, '2021-03-04 11:31:19', '2021-03-04 11:31:19');

-- --------------------------------------------------------

--
-- Structure de la table `produits_has_sortie_ops`
--

CREATE TABLE `produits_has_sortie_ops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qte` int(11) NOT NULL,
  `prixvente` int(11) NOT NULL,
  `tva` int(11) DEFAULT NULL,
  `produits_id` bigint(20) UNSIGNED NOT NULL,
  `sortie_ops_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits_has_sortie_ops`
--

INSERT INTO `produits_has_sortie_ops` (`id`, `qte`, `prixvente`, `tva`, `produits_id`, `sortie_ops_id`, `created_at`, `updated_at`) VALUES
(4, 10, 62500, NULL, 1, 4, '2021-03-04 12:27:48', '2021-03-04 12:27:48');

-- --------------------------------------------------------

--
-- Structure de la table `produits_has_ventes_succursales`
--

CREATE TABLE `produits_has_ventes_succursales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prixvente` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `tva` int(11) NOT NULL COMMENT 'Le pourcentage de la tva, une addition sur le prix de vente',
  `produits_id` bigint(20) UNSIGNED NOT NULL,
  `ventes_succursales_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits_has_vente_principales`
--

CREATE TABLE `produits_has_vente_principales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produits_id` bigint(20) UNSIGNED NOT NULL,
  `vente_principales_id` bigint(20) UNSIGNED NOT NULL,
  `prixvente` int(11) NOT NULL COMMENT 'Le prix auquel a été vendu le produits',
  `qte` int(11) NOT NULL,
  `tva` int(11) NOT NULL COMMENT 'Le pourcentage de la tva, une addition sur le prix de vente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prospects`
--

CREATE TABLE `prospects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activite` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'le domaine d''activité dans lequel exerce le prospect\\n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prospect_has_offres`
--

CREATE TABLE `prospect_has_offres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prospect_id` bigint(20) UNSIGNED NOT NULL,
  `offres_id` bigint(20) UNSIGNED NOT NULL,
  `datetest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'La date de teste de la solution\\n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ressources_hums`
--

CREATE TABLE `ressources_hums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ressourcesMat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ressourcesHumMetier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ressourcesHumNom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ressourcesHEmba` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ressourcesHContact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ressourcesHumLieu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'gestionnaire', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role_has_users`
--

CREATE TABLE `role_has_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_users`
--

INSERT INTO `role_has_users` (`id`, `roles_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2021-03-04 11:51:37'),
(13, 1, 1, '2021-02-28 20:04:40', '2021-03-04 11:51:37'),
(18, 2, 6, '2021-03-04 11:45:16', '2021-03-04 11:51:46'),
(19, 2, 6, '2021-03-04 11:52:03', '2021-03-04 11:52:03');

-- --------------------------------------------------------

--
-- Structure de la table `rubriques`
--

CREATE TABLE `rubriques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libele` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `naissance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilité` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Madame  ou Monsieur',
  `fonction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `embauche` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'date d''embauche',
  `salaire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valeur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `cle`, `valeur`, `commentaire`, `created_at`, `updated_at`) VALUES
(1, 'dedouanement', '0', 'Frais du dedouanement que dois supporter chaque produits dans le calcul de son prix', '2020-10-05 23:00:00', '2020-10-21 09:23:02'),
(2, 'taxePort', '0', 'Les taxes du port que dois supporter chaque produits dans le calcul de son prix', '2020-10-05 23:00:00', '2020-10-08 23:12:09'),
(3, 'fraisAnnexe', '5', 'Frais anexe que dois supporter chaque produits dans le calcul de son prix', '0000-00-00 00:00:00', '2020-10-08 23:12:09'),
(4, 'margeVente', '20', 'Marge ajouter au prix brute du produit afin de geneer des benefices', '0000-00-00 00:00:00', '2020-10-08 23:12:09'),
(5, 'seuilPrd', '10', 'Niveaau critique du stock ou on doit etre alerter', NULL, NULL),
(6, 'alertTel', '53808065', 'Nuero de telephone recevant les alertes defin de stock', NULL, '2020-10-08 23:13:56'),
(7, 'alertMail', 'maattechnologie@gmail.com', 'Adresse mail recevant les alertes de fin de stock', NULL, '2020-10-08 23:13:56'),
(8, 'etatAlert', '1', '', NULL, '2020-10-06 19:32:07'),
(9, 'dateMiseEnligne', '05/10/2020', '', NULL, NULL),
(10, 'devise', '1', '', NULL, '2020-10-21 09:23:43'),
(11, 'mobileMoney', '0', '', NULL, '2020-10-16 13:14:19'),
(12, 'sender', 'connecticka', 'Le senderId lors de la réception des SMS', '2021-02-16 16:31:55', '2021-02-16 16:31:55'),
(13, 'about', 'Magasin de vêtement sise à cocdy', 'description de l\'entreprise', '2021-02-19 20:34:49', '2021-02-19 20:34:49'),
(14, 'whatsApp', '2250777718083', 'whatsApp de l\'entreprise', '2021-02-19 20:39:22', '2021-02-19 20:39:22'),
(15, 'facebook', 'WixShop', 'Nom de la page facebook', '2021-02-19 20:48:09', '2021-02-19 20:48:09'),
(16, 'fblink', 'wwww.meneya.com', 'Lien de la page facebook', '2021-02-19 20:50:05', '2021-02-19 20:50:05'),
(17, 'Entreprise', 'ALISHOP', 'Nom de votre entreprise', '2021-02-28 22:40:55', '2021-02-28 22:40:55'),
(18, 'local', 'Abobo derrière barrage', '', '2021-02-28 22:45:36', '2021-02-28 22:45:36'),
(19, 'contact', '225 01 02 20 52 11', 'Le numéro de l\'entreprise', '2021-02-28 22:52:14', '2021-02-28 22:52:14'),
(20, 'logo', 'asset(\'assets/img/team/logodimad.jpg\')', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datesms` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `prixold` int(11) DEFAULT NULL,
  `liv` int(11) DEFAULT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sms_has_clients`
--

CREATE TABLE `sms_has_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sms_id` bigint(20) UNSIGNED NOT NULL,
  `clients_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sms_has_interesses`
--

CREATE TABLE `sms_has_interesses` (
  `sms_id` int(11) NOT NULL,
  `interesse_id` int(11) NOT NULL,
  `qte` varchar(45) DEFAULT NULL COMMENT 'Quantite du produit',
  `montant` int(11) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL COMMENT 'code d''achat',
  `statut` varchar(45) DEFAULT '0' COMMENT 'statut d''achat:: 0=> nouveau | 1 => Achat |-1=>echec',
  `etat` int(11) NOT NULL COMMENT '0:nouvau | 1: livré',
  `dateCmd` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sortie_ops`
--

CREATE TABLE `sortie_ops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matSortie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelleSortie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montantS` int(11) DEFAULT NULL,
  `quantiteS` int(11) DEFAULT NULL,
  `dateSortie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charges` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chargesDesc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tva` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operationsOperateurs_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sortie_ops`
--

INSERT INTO `sortie_ops` (`id`, `matSortie`, `libelleSortie`, `montantS`, `quantiteS`, `dateSortie`, `charges`, `chargesDesc`, `tva`, `operationsOperateurs_id`, `created_at`, `updated_at`) VALUES
(4, 'SRT#04/03/2021#539', 'Sortie_placement de ciment (Matr: 1|100.000 CFA|04/03/2121 )', 625000, 10, '04/03/2021', NULL, 'aucun', NULL, 1, '2021-03-04 12:27:47', '2021-03-04 12:27:48');

-- --------------------------------------------------------

--
-- Structure de la table `stock_operateurs`
--

CREATE TABLE `stock_operateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `montant` int(11) NOT NULL,
  `operateurs_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock_principales`
--

CREATE TABLE `stock_principales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_Qte` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produits_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stock_principales`
--

INSERT INTO `stock_principales` (`id`, `stock_Qte`, `produits_id`, `created_at`, `updated_at`) VALUES
(1, '10', 1, '2021-03-04 11:23:24', '2021-03-04 11:42:57'),
(2, '3', 2, '2021-03-04 11:23:24', '2021-03-04 11:42:57'),
(3, '47', 3, '2021-03-04 11:23:24', '2021-03-04 11:42:57'),
(4, '39', 4, '2021-03-04 11:23:24', '2021-03-04 11:42:57');

-- --------------------------------------------------------

--
-- Structure de la table `stock_succursales`
--

CREATE TABLE `stock_succursales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_Qte` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produits_id` bigint(20) UNSIGNED NOT NULL,
  `succursale_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stock_succursales`
--

INSERT INTO `stock_succursales` (`id`, `stock_Qte`, `produits_id`, `succursale_id`, `created_at`, `updated_at`) VALUES
(1, '15', 2, 2, '2021-03-04 11:31:19', '2021-03-04 11:31:19'),
(2, '5', 1, 2, '2021-03-04 11:31:19', '2021-03-04 11:31:19'),
(3, '10', 4, 2, '2021-03-04 11:31:19', '2021-03-04 11:31:19');

-- --------------------------------------------------------

--
-- Structure de la table `succursales`
--

CREATE TABLE `succursales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `succursaleMat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `succursaleLibelle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `succursalLieu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `succursalContact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datesucu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `succursales`
--

INSERT INTO `succursales` (`id`, `succursaleMat`, `succursaleLibelle`, `succursalLieu`, `succursalContact`, `datesucu`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'SC001', 'Succursale PRINCIPALE', 'ABIDJAN', '+225 53 80 80 65', '10/03/21', 1, '2021-03-04 11:27:29', '2021-03-04 11:27:29'),
(2, 'SC002', 'Succursale meneya1', 'ANONO', '77718083', '04/03/21', 6, '2021-03-04 11:29:53', '2021-03-04 11:52:03');

-- --------------------------------------------------------

--
-- Structure de la table `succursale_has_clients`
--

CREATE TABLE `succursale_has_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `succursale_id` bigint(20) UNSIGNED NOT NULL,
  `clients_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `super_admins`
--

CREATE TABLE `super_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poste` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '+225 xxxxxxx',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `localite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `localite`) VALUES
(1, 'ADMIN', '53808065', 'admin@meneya.com', '2020-07-29 15:21:17', '$2y$10$.ZJ1edjAZb02mK0f0vHPsOIs802ao1txwIHShJYXbWcO/KSHDAi/u', '', NULL, '2021-03-04 11:51:37', 'meneya2020'),
(6, 'MBO BOUA HUBERT', '785412785', 'boua@meneya.com', NULL, '$2y$10$qB3skqwNxMtU8z8KnFjsKeqlAiBXW3SksyTi5e.b44cSWiAfhlZA6', NULL, '2021-03-04 11:45:16', '2021-03-04 11:51:46', 'user1234');

-- --------------------------------------------------------

--
-- Structure de la table `user_has_acces`
--

CREATE TABLE `user_has_acces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `acces_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_has_acces`
--

INSERT INTO `user_has_acces` (`id`, `user_id`, `acces_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, NULL, NULL),
(2, 1, 1, 1, '2021-02-22 13:08:30', '2021-02-22 13:08:30'),
(3, 1, 2, 1, '2021-02-22 13:08:30', '2021-02-22 13:08:30'),
(4, 1, 3, 1, '2021-02-22 13:08:30', '2021-02-22 13:08:30'),
(5, 1, 4, 1, '2021-02-22 13:08:30', '2021-02-22 13:08:30'),
(6, 1, 6, 1, '2021-02-22 13:08:30', '2021-02-22 13:10:23'),
(7, 1, 7, 1, '2021-02-22 13:08:30', '2021-02-22 14:11:15'),
(8, 1, 8, 1, '2021-02-22 13:08:30', '2021-02-22 14:11:15'),
(9, 1, 9, 1, '2021-02-22 13:08:30', '2021-02-22 14:11:15'),
(26, 6, 1, 1, '2021-03-04 11:49:09', '2021-03-04 11:49:09'),
(27, 6, 2, 1, '2021-03-04 11:49:09', '2021-03-04 11:49:09'),
(28, 6, 3, 0, '2021-03-04 11:49:09', '2021-03-04 11:49:09'),
(29, 6, 4, 1, '2021-03-04 11:49:09', '2021-03-04 11:49:09'),
(30, 6, 5, 1, '2021-03-04 11:49:09', '2021-03-04 11:49:09'),
(31, 6, 6, 0, '2021-03-04 11:49:09', '2021-03-04 11:49:09'),
(32, 6, 7, 0, '2021-03-04 11:49:09', '2021-03-04 11:49:09'),
(33, 6, 8, 0, '2021-03-04 11:49:09', '2021-03-04 11:49:09'),
(34, 6, 9, 0, '2021-03-04 11:49:09', '2021-03-04 11:49:09');

-- --------------------------------------------------------

--
-- Structure de la table `ventes_succursales`
--

CREATE TABLE `ventes_succursales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NumVente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qte` int(11) DEFAULT NULL,
  `dateV` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout_achat_total` int(11) DEFAULT NULL,
  `prix_vente_total` int(11) DEFAULT NULL,
  `mg_benef_brute` int(11) DEFAULT NULL,
  `mg_benef_rel` int(11) DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typevente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'TYPE DE VENTE:\\n- Dévis (Par défaut)\\n- Facture proformat\\n ',
  `succursale_id` bigint(20) UNSIGNED NOT NULL,
  `clients_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vente_principales`
--

CREATE TABLE `vente_principales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NumVente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qte` int(11) NOT NULL DEFAULT '0',
  `dateV` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cout_achat_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `prix_vente_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `mg_benef_brute` int(11) NOT NULL DEFAULT '0',
  `mg_benef_rel` int(11) NOT NULL DEFAULT '0',
  `charge` int(11) NOT NULL DEFAULT '0',
  `description_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `typevente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 => facture proformat / 1 => Vente',
  `clients_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `versements`
--

CREATE TABLE `versements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `versMat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `versStatu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'soldé => 1 , non solde => 0',
  `versMnt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateDebut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'La date de début de l''intervalle de temps concerné par le versement',
  `dateFin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'La date de début de l''intervalle de temps concerné par le versement',
  `succursale_id` bigint(20) UNSIGNED NOT NULL,
  `versDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'date de génération du versement',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `versement_historiques`
--

CREATE TABLE `versement_historiques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomAgent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montantPaye` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datePaiement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typepaiement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `versement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acces`
--
ALTER TABLE `acces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `approvisionnements`
--
ALTER TABLE `approvisionnements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approvisionnements_succursale_id_foreign` (`succursale_id`);

--
-- Index pour la table `arrivages`
--
ALTER TABLE `arrivages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `arrivage_has_produits`
--
ALTER TABLE `arrivage_has_produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arrivage_has_produits_arrivage_id_foreign` (`arrivage_id`),
  ADD KEY `arrivage_has_produits_produits_id_foreign` (`produits_id`);

--
-- Index pour la table `avances`
--
ALTER TABLE `avances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avances_salarie_id_foreign` (`salarie_id`);

--
-- Index pour la table `besoins`
--
ALTER TABLE `besoins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bulletins`
--
ALTER TABLE `bulletins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bulletins_salarie_id_foreign` (`salarie_id`);

--
-- Index pour la table `bulletin_has_rubriques`
--
ALTER TABLE `bulletin_has_rubriques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bulletin_has_rubriques_bulletin_id_foreign` (`bulletin_id`),
  ADD KEY `bulletin_has_rubriques_rubrique_id_foreign` (`rubrique_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients_has_besoins`
--
ALTER TABLE `clients_has_besoins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_has_besoins_clients_id_foreign` (`clients_id`),
  ADD KEY `clients_has_besoins_besoins_id_foreign` (`besoins_id`);

--
-- Index pour la table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credits_factureavoir_id_foreign` (`factureavoir_id`);

--
-- Index pour la table `credits_princips`
--
ALTER TABLE `credits_princips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credits_princips_princip_factu_avoirs_id_foreign` (`princip_factu_avoirs_id`);

--
-- Index pour la table `devises`
--
ALTER TABLE `devises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_dossier_id_foreign` (`dossier_id`);

--
-- Index pour la table `dossiers`
--
ALTER TABLE `dossiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `echeancehistoriques`
--
ALTER TABLE `echeancehistoriques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `echeancehistoriques_echeance_id_foreign` (`echeance_id`);

--
-- Index pour la table `echeances`
--
ALTER TABLE `echeances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `echeances_fournisseurs_id_foreign` (`fournisseurs_id`);

--
-- Index pour la table `factureachats`
--
ALTER TABLE `factureachats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factureachats_ventes_succursales_id_foreign` (`ventes_succursales_id`);

--
-- Index pour la table `factureavoirs`
--
ALTER TABLE `factureavoirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factureavoirs_ventes_succursales_id_foreign` (`ventes_succursales_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `interesses`
--
ALTER TABLE `interesses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operateurs`
--
ALTER TABLE `operateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operation_has_operateurs`
--
ALTER TABLE `operation_has_operateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operations_has_operateurs_operations_id_foreign` (`operations_id`),
  ADD KEY `operations_has_operateurs_operateurs_id_foreign` (`operateurs_id`);

--
-- Index pour la table `operation_pay_historiques`
--
ALTER TABLE `operation_pay_historiques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `prets`
--
ALTER TABLE `prets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prets_salarie_id_foreign` (`salarie_id`);

--
-- Index pour la table `princip_factu_achats`
--
ALTER TABLE `princip_factu_achats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `princip_factu_achats_vente_principales_id_foreign` (`vente_principales_id`);

--
-- Index pour la table `princip_factu_avoirs`
--
ALTER TABLE `princip_factu_avoirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `princip_factu_avoirs_vente_principales_id_foreign` (`vente_principales_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits_categorie_id_foreign` (`categorie_id`);

--
-- Index pour la table `produits_has_approvisionnements`
--
ALTER TABLE `produits_has_approvisionnements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits_has_approvisionnements_produits_id_foreign` (`produits_id`),
  ADD KEY `produits_has_approvisionnements_approvisionnement_id_foreign` (`approvisionnement_id`);

--
-- Index pour la table `produits_has_sortie_ops`
--
ALTER TABLE `produits_has_sortie_ops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits_has_sortie_ops_produits_id_foreign` (`produits_id`),
  ADD KEY `produits_has_sortie_ops_sortie_ops_id_foreign` (`sortie_ops_id`);

--
-- Index pour la table `produits_has_ventes_succursales`
--
ALTER TABLE `produits_has_ventes_succursales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits_has_ventes_succursales_produits_id_foreign` (`produits_id`),
  ADD KEY `produits_has_ventes_succursales_ventes_succursales_id_foreign` (`ventes_succursales_id`);

--
-- Index pour la table `produits_has_vente_principales`
--
ALTER TABLE `produits_has_vente_principales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits_has_vente_principales_produits_id_foreign` (`produits_id`),
  ADD KEY `produits_has_vente_principales_vente_principales_id_foreign` (`vente_principales_id`);

--
-- Index pour la table `prospects`
--
ALTER TABLE `prospects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prospect_has_offres`
--
ALTER TABLE `prospect_has_offres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prospect_has_offres_prospect_id_foreign` (`prospect_id`),
  ADD KEY `prospect_has_offres_offres_id_foreign` (`offres_id`);

--
-- Index pour la table `ressources_hums`
--
ALTER TABLE `ressources_hums`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_has_users`
--
ALTER TABLE `role_has_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_has_users_roles_id_foreign` (`roles_id`),
  ADD KEY `role_has_users_user_id_foreign` (`user_id`);

--
-- Index pour la table `rubriques`
--
ALTER TABLE `rubriques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sms_has_clients`
--
ALTER TABLE `sms_has_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sms_has_clients_sms_id_foreign` (`sms_id`),
  ADD KEY `sms_has_clients_clients_id_foreign` (`clients_id`);

--
-- Index pour la table `sms_has_interesses`
--
ALTER TABLE `sms_has_interesses`
  ADD PRIMARY KEY (`sms_id`,`interesse_id`),
  ADD KEY `fk_sms_has_interesse_interesse1_idx` (`interesse_id`),
  ADD KEY `fk_sms_has_interesse_sms_idx` (`sms_id`);

--
-- Index pour la table `sortie_ops`
--
ALTER TABLE `sortie_ops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sortie_ops_operationsoperateurs_id_foreign` (`operationsOperateurs_id`);

--
-- Index pour la table `stock_operateurs`
--
ALTER TABLE `stock_operateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_operateurs_operateurs_id_foreign` (`operateurs_id`);

--
-- Index pour la table `stock_principales`
--
ALTER TABLE `stock_principales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_principales_produits_id_foreign` (`produits_id`);

--
-- Index pour la table `stock_succursales`
--
ALTER TABLE `stock_succursales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_succursales_produits_id_foreign` (`produits_id`),
  ADD KEY `stock_succursales_succursale_id_foreign` (`succursale_id`);

--
-- Index pour la table `succursales`
--
ALTER TABLE `succursales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `succursales_user_id_foreign` (`user_id`);

--
-- Index pour la table `succursale_has_clients`
--
ALTER TABLE `succursale_has_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `succursale_has_clients_succursale_id_foreign` (`succursale_id`),
  ADD KEY `succursale_has_clients_clients_id_foreign` (`clients_id`);

--
-- Index pour la table `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `user_has_acces`
--
ALTER TABLE `user_has_acces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_has_acces_user_id_foreign` (`user_id`),
  ADD KEY `user_has_acces_acces_id_foreign` (`acces_id`);

--
-- Index pour la table `ventes_succursales`
--
ALTER TABLE `ventes_succursales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventes_succursales_succursale_id_foreign` (`succursale_id`),
  ADD KEY `ventes_succursales_clients_id_foreign` (`clients_id`);

--
-- Index pour la table `vente_principales`
--
ALTER TABLE `vente_principales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vente_principales_clients_id_foreign` (`clients_id`);

--
-- Index pour la table `versements`
--
ALTER TABLE `versements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `versements_succursale_id_foreign` (`succursale_id`);

--
-- Index pour la table `versement_historiques`
--
ALTER TABLE `versement_historiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `versement_historiques_versement_id_foreign` (`versement_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acces`
--
ALTER TABLE `acces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `approvisionnements`
--
ALTER TABLE `approvisionnements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `arrivages`
--
ALTER TABLE `arrivages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `arrivage_has_produits`
--
ALTER TABLE `arrivage_has_produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `avances`
--
ALTER TABLE `avances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `besoins`
--
ALTER TABLE `besoins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `bulletins`
--
ALTER TABLE `bulletins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bulletin_has_rubriques`
--
ALTER TABLE `bulletin_has_rubriques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients_has_besoins`
--
ALTER TABLE `clients_has_besoins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `credits_princips`
--
ALTER TABLE `credits_princips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devises`
--
ALTER TABLE `devises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dossiers`
--
ALTER TABLE `dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `echeancehistoriques`
--
ALTER TABLE `echeancehistoriques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `echeances`
--
ALTER TABLE `echeances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `factureachats`
--
ALTER TABLE `factureachats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Ici on enregistre le devis soldé ou la facture proformat soldée du client.\\nLa quantité du stock est déduite à partir de la quantité de la facture achat. ';

--
-- AUTO_INCREMENT pour la table `factureavoirs`
--
ALTER TABLE `factureavoirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `interesses`
--
ALTER TABLE `interesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `operateurs`
--
ALTER TABLE `operateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `operation_has_operateurs`
--
ALTER TABLE `operation_has_operateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `operation_pay_historiques`
--
ALTER TABLE `operation_pay_historiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `prets`
--
ALTER TABLE `prets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `princip_factu_achats`
--
ALTER TABLE `princip_factu_achats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Ici on enregistre le devis soldé ou la facture proformat soldée du client.\\nLa quantité du stock est déduite à partir de la quantité de la facture achat. ';

--
-- AUTO_INCREMENT pour la table `princip_factu_avoirs`
--
ALTER TABLE `princip_factu_avoirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Ici on enregistre le devis soldé ou la facture proformat soldée du client.\\nLa quantité du stock est déduite à partir de la quantité de la facture achat. ';

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produits_has_approvisionnements`
--
ALTER TABLE `produits_has_approvisionnements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produits_has_sortie_ops`
--
ALTER TABLE `produits_has_sortie_ops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produits_has_ventes_succursales`
--
ALTER TABLE `produits_has_ventes_succursales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits_has_vente_principales`
--
ALTER TABLE `produits_has_vente_principales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `prospects`
--
ALTER TABLE `prospects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prospect_has_offres`
--
ALTER TABLE `prospect_has_offres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ressources_hums`
--
ALTER TABLE `ressources_hums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `role_has_users`
--
ALTER TABLE `role_has_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `rubriques`
--
ALTER TABLE `rubriques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `sms_has_clients`
--
ALTER TABLE `sms_has_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sortie_ops`
--
ALTER TABLE `sortie_ops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `stock_operateurs`
--
ALTER TABLE `stock_operateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock_principales`
--
ALTER TABLE `stock_principales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `stock_succursales`
--
ALTER TABLE `stock_succursales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `succursales`
--
ALTER TABLE `succursales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `succursale_has_clients`
--
ALTER TABLE `succursale_has_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user_has_acces`
--
ALTER TABLE `user_has_acces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `ventes_succursales`
--
ALTER TABLE `ventes_succursales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vente_principales`
--
ALTER TABLE `vente_principales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `versements`
--
ALTER TABLE `versements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `versement_historiques`
--
ALTER TABLE `versement_historiques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `approvisionnements`
--
ALTER TABLE `approvisionnements`
  ADD CONSTRAINT `approvisionnements_succursale_id_foreign` FOREIGN KEY (`succursale_id`) REFERENCES `succursales` (`id`);

--
-- Contraintes pour la table `arrivage_has_produits`
--
ALTER TABLE `arrivage_has_produits`
  ADD CONSTRAINT `arrivage_has_produits_arrivage_id_foreign` FOREIGN KEY (`arrivage_id`) REFERENCES `arrivages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `arrivage_has_produits_produits_id_foreign` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `avances`
--
ALTER TABLE `avances`
  ADD CONSTRAINT `avances_salarie_id_foreign` FOREIGN KEY (`salarie_id`) REFERENCES `salaries` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `bulletins`
--
ALTER TABLE `bulletins`
  ADD CONSTRAINT `bulletins_salarie_id_foreign` FOREIGN KEY (`salarie_id`) REFERENCES `salaries` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `bulletin_has_rubriques`
--
ALTER TABLE `bulletin_has_rubriques`
  ADD CONSTRAINT `bulletin_has_rubriques_bulletin_id_foreign` FOREIGN KEY (`bulletin_id`) REFERENCES `bulletins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bulletin_has_rubriques_rubrique_id_foreign` FOREIGN KEY (`rubrique_id`) REFERENCES `rubriques` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `clients_has_besoins`
--
ALTER TABLE `clients_has_besoins`
  ADD CONSTRAINT `clients_has_besoins_besoins_id_foreign` FOREIGN KEY (`besoins_id`) REFERENCES `besoins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_has_besoins_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `credits`
--
ALTER TABLE `credits`
  ADD CONSTRAINT `credits_factureavoir_id_foreign` FOREIGN KEY (`factureavoir_id`) REFERENCES `factureavoirs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `credits_princips`
--
ALTER TABLE `credits_princips`
  ADD CONSTRAINT `credits_princips_princip_factu_avoirs_id_foreign` FOREIGN KEY (`princip_factu_avoirs_id`) REFERENCES `princip_factu_avoirs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_dossier_id_foreign` FOREIGN KEY (`dossier_id`) REFERENCES `dossiers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `echeancehistoriques`
--
ALTER TABLE `echeancehistoriques`
  ADD CONSTRAINT `echeancehistoriques_echeance_id_foreign` FOREIGN KEY (`echeance_id`) REFERENCES `echeances` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `echeances`
--
ALTER TABLE `echeances`
  ADD CONSTRAINT `echeances_fournisseurs_id_foreign` FOREIGN KEY (`fournisseurs_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `factureachats`
--
ALTER TABLE `factureachats`
  ADD CONSTRAINT `factureachats_ventes_succursales_id_foreign` FOREIGN KEY (`ventes_succursales_id`) REFERENCES `ventes_succursales` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `factureavoirs`
--
ALTER TABLE `factureavoirs`
  ADD CONSTRAINT `factureavoirs_ventes_succursales_id_foreign` FOREIGN KEY (`ventes_succursales_id`) REFERENCES `ventes_succursales` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `operation_has_operateurs`
--
ALTER TABLE `operation_has_operateurs`
  ADD CONSTRAINT `operations_has_operateurs_operateurs_id_foreign` FOREIGN KEY (`operateurs_id`) REFERENCES `operateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `operations_has_operateurs_operations_id_foreign` FOREIGN KEY (`operations_id`) REFERENCES `operations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `prets`
--
ALTER TABLE `prets`
  ADD CONSTRAINT `prets_salarie_id_foreign` FOREIGN KEY (`salarie_id`) REFERENCES `salaries` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `princip_factu_achats`
--
ALTER TABLE `princip_factu_achats`
  ADD CONSTRAINT `princip_factu_achats_vente_principales_id_foreign` FOREIGN KEY (`vente_principales_id`) REFERENCES `vente_principales` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `princip_factu_avoirs`
--
ALTER TABLE `princip_factu_avoirs`
  ADD CONSTRAINT `princip_factu_avoirs_vente_principales_id_foreign` FOREIGN KEY (`vente_principales_id`) REFERENCES `vente_principales` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `produits_has_approvisionnements`
--
ALTER TABLE `produits_has_approvisionnements`
  ADD CONSTRAINT `produits_has_approvisionnements_approvisionnement_id_foreign` FOREIGN KEY (`approvisionnement_id`) REFERENCES `approvisionnements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produits_has_approvisionnements_produits_id_foreign` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `produits_has_sortie_ops`
--
ALTER TABLE `produits_has_sortie_ops`
  ADD CONSTRAINT `produits_has_sortie_ops_produits_id_foreign` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produits_has_sortie_ops_sortie_ops_id_foreign` FOREIGN KEY (`sortie_ops_id`) REFERENCES `sortie_ops` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `produits_has_ventes_succursales`
--
ALTER TABLE `produits_has_ventes_succursales`
  ADD CONSTRAINT `produits_has_ventes_succursales_produits_id_foreign` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produits_has_ventes_succursales_ventes_succursales_id_foreign` FOREIGN KEY (`ventes_succursales_id`) REFERENCES `ventes_succursales` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `produits_has_vente_principales`
--
ALTER TABLE `produits_has_vente_principales`
  ADD CONSTRAINT `produits_has_vente_principales_produits_id_foreign` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produits_has_vente_principales_vente_principales_id_foreign` FOREIGN KEY (`vente_principales_id`) REFERENCES `vente_principales` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `prospect_has_offres`
--
ALTER TABLE `prospect_has_offres`
  ADD CONSTRAINT `prospect_has_offres_offres_id_foreign` FOREIGN KEY (`offres_id`) REFERENCES `offres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prospect_has_offres_prospect_id_foreign` FOREIGN KEY (`prospect_id`) REFERENCES `prospects` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_users`
--
ALTER TABLE `role_has_users`
  ADD CONSTRAINT `role_has_users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sms_has_clients`
--
ALTER TABLE `sms_has_clients`
  ADD CONSTRAINT `sms_has_clients_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sms_has_clients_sms_id_foreign` FOREIGN KEY (`sms_id`) REFERENCES `sms` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sortie_ops`
--
ALTER TABLE `sortie_ops`
  ADD CONSTRAINT `sortie_ops_operationsoperateurs_id_foreign` FOREIGN KEY (`operationsOperateurs_id`) REFERENCES `operation_has_operateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stock_operateurs`
--
ALTER TABLE `stock_operateurs`
  ADD CONSTRAINT `stock_operateurs_operateurs_id_foreign` FOREIGN KEY (`operateurs_id`) REFERENCES `operateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stock_principales`
--
ALTER TABLE `stock_principales`
  ADD CONSTRAINT `stock_principales_produits_id_foreign` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stock_succursales`
--
ALTER TABLE `stock_succursales`
  ADD CONSTRAINT `stock_succursales_produits_id_foreign` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_succursales_succursale_id_foreign` FOREIGN KEY (`succursale_id`) REFERENCES `succursales` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `succursales`
--
ALTER TABLE `succursales`
  ADD CONSTRAINT `succursales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `succursale_has_clients`
--
ALTER TABLE `succursale_has_clients`
  ADD CONSTRAINT `succursale_has_clients_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `succursale_has_clients_succursale_id_foreign` FOREIGN KEY (`succursale_id`) REFERENCES `succursales` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_has_acces`
--
ALTER TABLE `user_has_acces`
  ADD CONSTRAINT `user_has_acces_acces_id_foreign` FOREIGN KEY (`acces_id`) REFERENCES `acces` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_acces_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ventes_succursales`
--
ALTER TABLE `ventes_succursales`
  ADD CONSTRAINT `ventes_succursales_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ventes_succursales_succursale_id_foreign` FOREIGN KEY (`succursale_id`) REFERENCES `succursales` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `vente_principales`
--
ALTER TABLE `vente_principales`
  ADD CONSTRAINT `vente_principales_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `versements`
--
ALTER TABLE `versements`
  ADD CONSTRAINT `versements_succursale_id_foreign` FOREIGN KEY (`succursale_id`) REFERENCES `succursales` (`id`);

--
-- Contraintes pour la table `versement_historiques`
--
ALTER TABLE `versement_historiques`
  ADD CONSTRAINT `versement_historiques_versement_id_foreign` FOREIGN KEY (`versement_id`) REFERENCES `versements` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
