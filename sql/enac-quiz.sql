-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : mer. 26 avr. 2023 à 15:23
-- Version du serveur : 8.0.32
-- Version de PHP : 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `enac-quiz`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `user` varchar(32) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `user`, `pwd`) VALUES
(1, 'nchevall', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'Hardware'),
(2, 'Software'),
(3, 'Network'),
(4, 'Programming'),
(5, 'General knowledge'),
(6, 'Security');

-- --------------------------------------------------------

--
-- Structure de la table `difficulty`
--

CREATE TABLE `difficulty` (
  `id_difficulty` int NOT NULL,
  `difficulty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `difficulty`
--

INSERT INTO `difficulty` (`id_difficulty`, `difficulty`) VALUES
(1, 'Easy'),
(2, 'Normal'),
(3, 'Hard');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id_question` int NOT NULL,
  `question_fr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `question_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rep_1_fr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rep_1_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rep_2_fr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rep_2_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rep_3_fr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rep_3_en` varchar(255) NOT NULL,
  `rep_4_fr` varchar(255) NOT NULL,
  `rep_4_en` varchar(255) NOT NULL,
  `rep_true` int NOT NULL,
  `media` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fk_category` int NOT NULL,
  `fk_difficulty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `question_fr`, `question_en`, `rep_1_fr`, `rep_1_en`, `rep_2_fr`, `rep_2_en`, `rep_3_fr`, `rep_3_en`, `rep_4_fr`, `rep_4_en`, `rep_true`, `media`, `fk_category`, `fk_difficulty`) VALUES
(1, 'Quelle est la différence entre un CPU et un GPU ?', 'What is the difference between a CPU and a GPU ?', 'Ces deux termes sont interchangeables et désignent le processeur', 'These two terms are interchangeable and refer to the CPU', 'Le CPU est conçu pour faire des calculs graphiques, et le GPU des calculs de nombres entier', 'The CPU is designed to do graphical calculations, and the GPU to do integer calculations', 'Le CPU est le processeur d’un ordinateur, alors qu’un GPU est sa carte graphique', 'The CPU is the processor of a computer, while a GPU is its graphics card', 'Le CPU est le processeur de l’ordinateur, tandis que le GPU est un type de socket de carte mère', 'The CPU is the computer\'s processor, while the GPU is a type of motherboard socket', 3, NULL, 1, 1),
(2, 'Quel est le nom de ce composant ? ', 'What is the name of this component ?', 'GPU', 'GPU', 'Processeur', 'Processor', 'Alimentation', 'Power supply', 'Refroidisseur', 'Cooler', 1, 'medias/img1.jpg', 1, 1),
(3, 'Quel est le nom de ce composant ?', 'What is the name of this component ?', 'Mémoire vive', 'RAM', 'SSD M.2', 'SSD M.2', 'Chipset', 'Chipset', 'Refroidissement à eau', 'Watercooling', 1, 'medias/img2.jpg', 1, 1),
(4, 'Quel est le nom de ce composant ? ', 'What is the name of this component ?', 'Radiateur', 'Heatsink', 'Barette de RAM', 'RAM stick', 'SSD', 'SSD', 'Clé SATA', 'SATA key', 3, 'medias/img3.jpg', 1, 1),
(5, 'Qu\'est ce que signifie l\'acronyme USB ?', 'What does the acronym USB stand for ?', 'Ultrafast System Bandwidth', 'Ultrafast System Bandwidth', 'Universal Serial Bus', 'Universal Serial Bus', 'Unified Security Barrier', 'Unified Security Barrier', 'Unique System Backup', 'Unique System Backup', 2, NULL, 1, 1),
(6, 'Quel est le nom du navigateur web le plus utilisé dans le monde ?', 'What is the name of the most used web browser in the world ?', 'Apple Safari', 'Apple Safari', 'Mozilla Firefox', 'Mozilla Firefox', 'Microsoft Edge', 'Microsoft Edge', 'Google Chrome', 'Google Chrome', 4, NULL, 2, 1),
(7, 'Quel est le nom du fondateur de Microsoft ?', 'What is the name of the founder of Microsoft ?', 'Steve Jobs', 'Steve Jobs', 'Bill Gates', 'Bill Gates', 'Mark Zuckerberg', 'Mark Zuckerberg', 'Jeff Besos', 'Jeff Besos', 2, NULL, 5, 1),
(8, 'Que signifie l\'acronyme « CPU » en informatique ?', 'What does the acronym \"CPU\" stand for in computing ?', 'Central Processing Unit', 'Central Processing Unit', 'Central Program Unit', 'Central Program Unit', 'Central Power Unit', 'Central Power Unit', 'Central Print Unit', 'Central Print Unit', 1, NULL, 1, 1),
(9, 'Quel est le nom du langage de programmation utilisé pour créer des pages web interactives ?', 'What is the name of the programming language used to create interactive web pages ?', 'HTML', 'HTML', 'C++', 'C++', 'Python', 'Python', 'PHP', 'PHP', 4, NULL, 4, 1),
(10, 'Que signifie l\'acronyme \"VPN\" en informatique ?', 'What does the acronym \"VPN\" mean in computing?', 'Virtual Personal Network', 'Virtual Personal Network', 'Virtual Private Network', 'Virtual Private Network', 'Visible Public Network', 'Visible Public Network', 'Visual Private Network', 'Visual Private Network', 2, NULL, 5, 1),
(11, 'Quel est le nom de l\'assistant personnel intelligent développé par Amazon ?', 'What is the name of the intelligent personal assistant developed by Amazon ?', 'Siri', 'Siri', 'Assistant', 'Assistant', 'Alexa', 'Alexa', 'Cortana', 'Cortana', 3, NULL, 5, 1),
(12, 'Quel est le nom du réseau social fondé par Mark Zuckerberg ?', 'What is the name of the social network founded by Mark Zuckerberg ?', 'Twitter', 'Twitter', 'Facebook', 'Facebook', 'Instagram', 'Instagram', 'Snapchat', 'Snapchat', 2, NULL, 5, 1),
(13, 'Quel est le nom de la suite bureautique développée par Microsoft ?', 'What is the name of the office suite developed by Microsoft ?', 'iWork', 'iWork', 'LibreOffice', 'LibreOffice', 'Docs', 'Docs', 'Office', 'Office', 4, NULL, 2, 1),
(14, 'Quel est le nom du navigateur web développé par Mozilla ?', 'What is the name of the web browser developed by Mozilla ?', 'Chrome', 'Chrome', 'Firefox', 'Firefox', 'Brave', 'Brave', 'Explorer', 'Explorer', 2, NULL, 2, 1),
(15, 'Quel est ce composant ?', 'What is this component ?', 'Processeur', 'Processor', 'Alimentation', 'Power supply', 'Chipset', 'Chipset', 'GPU', 'GPU', 1, 'medias/img4.jpg', 1, 1),
(16, 'A quoi sert cet objet ?', 'What is this object used for ?', 'Bien fixer les composants entre eux', 'Fixing the components together', 'Fluidifier le liquide du radiateur à eau', 'Fluidify the watercooling liquid', 'Aider le refroidissement entre le CPU et le système de refroidissement', 'Helping the cooling between the CPU and the cooling system', 'Chauffer les composants', 'Heating components', 3, 'medias/img5.jpg', 1, 1),
(17, 'Quel est le nom de ce composant ?', 'What is the name of this component ?', 'CPU', 'CPU', 'Alimentation', 'Power supply', 'Boîtier', 'Case', 'Pompe à eau', 'Watercooling pump', 2, 'medias/img6.jpg', 1, 1),
(18, 'Quel composant est le \"cerveau\" de l’ordinateur ?', 'Which component is the \"brain\" of the computer ?', 'La carte-mère', 'The motherboard', 'Le disque dur', 'The hard disk', 'Le processeur', 'The processor', 'La carte graphique', 'The graphics card', 3, NULL, 1, 1),
(19, 'Quel est le composant qui va être le plus sollicité pour jouer à des jeux vidéo récents ?', 'Which component is going to be the most requested to play recent video games ?', 'Le CPU', 'The CPU', 'Le GPU', 'The GPU', 'La carte mère', 'The motherboard', 'La RAM', 'The RAM', 2, NULL, 1, 1),
(20, 'Qu\'est-ce que l\'authentification à deux facteurs (2FA) ?', 'What is two-factor authentication (2FA) ?', 'Un système de sécurité permettant de renforcer l\'authentification en demandant une seconde forme d\'identification, généralement un code envoyé par SMS', 'A security system to strengthen authentication by requiring a second form of identification, usually a code sent by SMS', 'Un système de sécurité permettant de filtrer les accès à un réseau ou à un ordinateur en autorisant ou en bloquant les connexions en fonction de règles prédéfinies', 'A security system allowing to filter access to a network or a computer by allowing or blocking connections according to predefined rules', 'Un système de sécurité permettant de protéger les données stockées sur un ordinateur en les cryptant à l\'aide d\'une clé', 'A security system to protect data stored on a computer by encrypting it with a key', 'Un système de sécurité où l’on demande de se connecter 2 fois de suite', 'A security system where you are asked to connect twice in a row', 1, NULL, 5, 1),
(21, 'A quoi sert un routeur ?', 'What is a router for ?', 'Stocker des données sur le réseau local', 'Store data on the local network', 'Protéger le reseau des attaques', 'Protect the network from attacks', 'Augmenter la bande passante d’un réseau déjà en place', 'Increase the bandwidth of an existing network', 'Diriger les paquets entre les ordinateurs connecté à un réseau afin d’assurer la communication et le transfert de données', 'Direct packets between computers connected to a network to ensure communication and data transfer', 4, NULL, 3, 1),
(22, 'Qu\'est-ce qu\'un VPN ?', 'What is a VPN ?', 'Un protocole de sécurité permettant de protéger les données transitant sur un réseau en les cryptant à l\'aide d\'une clé', 'A security protocol to protect data passing through a network by encrypting it with a key', 'Un système de sécurité permettant de filtrer les accès à un réseau ou à un ordinateur en autorisant ou en bloquant les connexions en fonction de règles prédéfinies', 'A security system to filter access to a network or a computer by allowing or blocking connections according to predefined rules', 'Un service permettant de se connecter à internet en passant par un serveur distant, offrant ainsi une meilleure confidentialité et sécurité de la navigation web', 'A service that allows you to connect to the Internet through a remote server, thus offering better confidentiality and security for web browsing', 'Transférer des données à un serveur INTRANET', 'Transfer data to an INTRANET server', 3, NULL, 3, 1),
(23, 'Qu\'est-ce qu\'un cookie ?', 'What is a cookie ?', 'Un logiciel de tracement malveillant circulant sur internet', 'Malicious tracking software circulating on the Internet', 'Un service mémorisant les paramètres et l’activité d’un utilisateur afin de lui proposer du contenu plus pertinent par la suite', 'A service that remembers a user\'s settings and activity in order to offer them more relevant content later', 'Un fichier stocké sur des serveurs distants afin de faciliter le transit', 'A file stored on remote servers to facilitate transit', 'Une plateforme de stockage', 'A storage platform', 2, NULL, 5, 1),
(24, 'A quoi sert une carte mère ?', 'What is a motherboard used for ?', 'Faire des calculs élémentaires', 'Doing elementary calculations', 'Connecter tous les composants entre eux', 'Connecting all components together', 'A améliorer les performances graphiques en reliant notamment la carte graphique à la mémoire vive, etc...', 'To improve the graphic performances by connecting the graphic card to the RAM, etc...', 'Transiter les données entre le disque dur et la RAM', 'Transfer data between the hard drive and the RAM', 2, NULL, 1, 1),
(25, 'Qu\'est qu\'un \"white hat\" ?', 'What is a \"white hat\" ?', 'Un hackeur particulièrement dangereux', 'A particularly dangerous hacker', 'Une variante de la distribution Linux \"Red hat\"', 'A variant of the Linux distribution \"Red hat\"', 'Un hackeur engagé dans une entreprise', 'A hacker hired in a company', 'Un hackeur pas sérieux, qui fait quelques attaques pour s\'amuser', 'A hacker not serious, who makes some attacks for fun', 3, NULL, 6, 1),
(26, 'Qu\'est-ce que signifie l\'acronyme \"DNS\" en informatique ?', 'What does the acronym \"DNS\" mean in computer science ?', 'Domain Name Server', 'Domain Name Server', 'Data Network System', 'Data Network System', 'Digital Network Server', 'Digital Network Server', 'Direct Network System', 'Direct Network System', 1, NULL, 3, 2),
(27, 'Qu\'est-ce qu\'un LAN ?', 'What is a LAN ?', 'Type de réseau', 'Type of network', 'Cométition d\'Esport', 'Esport competition', 'Protocole réseau', 'Network protocol', 'Type d’attaque informatique', 'Type of computer attack', 1, NULL, 3, 2),
(28, 'Quelle est la différence entre un HDD et un SSD ?', 'What is the difference between an HDD and an SSD ?', 'Les HDD ont une plus grande capacité de stockage que les SSD', 'HDD have more storage capacity than SSD', 'Les HDD ont une capacité de stockage plus faible que les SSD', 'HDD have a lower storage capacity than SSD', 'Les SSD n’ont pas de disque alors que les HDD oui', 'SSD don\'t have a disk while HDD do', 'Les SSD sont plus durables que les HDD', 'SSD are more durable than HDD', 3, NULL, 1, 2),
(29, 'Qu\'es-ce que signifie l\'acronyme \"HTTP\" en informatique ?', '', 'Hyperspace Text Transfer Process', 'Hyperspace Text Transfer Process', 'Hypertext Text Transfer Protocol', 'Hypertext Text Transfer Protocol', 'Hypermedia Text Transfer Program', 'Hypermedia Text Transfer Program', 'Hyperlink Text Transfer Protocol', 'Hyperlink Text Transfer Protocol', 4, NULL, 3, 2),
(30, 'Qu\'est-ce que signifie l\'acronyme \"HTTPS\" en informatique ?', 'What does the acronym \"HTTPS\" mean in computing ?', 'Hyperlink Text Transfer Protocol Security', 'Hyperlink Text Transfer Protocol Security', 'Hyperspace Text Transfer Process Syntax', 'Hyperspace Text Transfer Process Syntax', 'Hypertext Text Transfer Program Sheet', 'Hypertext Text Transfer Program Sheet', 'Hyperlink Text Transfer Protocol Secure', 'Hyperlink Text Transfer Protocol Secure', 4, NULL, 3, 2),
(31, 'Qu\'est-ce qu\'une attaque par déni de service (DDoS) ?', 'What is a Denial of Service (DDoS) attack ?', 'Une attaque visant à rendre un site web ou un service indisponible en surchargeant les serveurs qui l\'hébergent avec une quantité énorme de trafic', 'An attack aimed at making a website or service unavailable by overloading the servers that host it with a huge amount of traffic', 'Une attaque visant à voler des informations sensibles en interceptant des communications entre deux points', 'An attack to steal sensitive information by intercepting communications between two points', 'Une attaque visant à obtenir un accès non autorisé à un système en exploitant une vulnérabilité connue', 'An attack to gain unauthorized access to a system by exploiting a known vulnerability', 'Une attaque visant à berner un utilisateur afin de lui voler des informations', 'An attack to trick a user into stealing information', 1, NULL, 3, 2),
(32, 'Quel est le système d’exploitation le plus utilisé pour faire du hacking ?', 'What is the most common operating system used for hacking ?', 'Arch Linux', 'Arch Linux', 'Windows', 'Windows', 'Kali Linux', 'Kali Linux', 'Debian', 'Debian', 3, NULL, 6, 2),
(33, 'Quelle est la différence entre une adresse IP statique et dynamique ?', 'What is the difference between a static and dynamic IP address ?', 'Une adresse IP statique est une adresse assignée par un administrateur réseau, alors qu’une adresse IP dynamique est une adresse IP assignée par un DHCP', 'A static IP address is an address assigned by a network administrator, while a dynamic IP address is an IP address assigned by DHCP', 'Une adresse IP fixe reste assignée à jamais, alors qu’une adresse IP dynamique peut changer à tout moment', 'A fixed IP address remains assigned forever, while a dynamic IP address can change at any time', 'Les adresse IP statiques sont utilisées pour des serveurs web et les adresses IP dynamiques pour des utilisateurs', 'Static IP addresses are used for web servers and dynamic IP addresses for users', 'Les adresses IP dynamiques sont plus sécurisées car elles sont plus difficiles à traquer', 'Dynamic IP addresses are more secure because they are harder to track', 2, NULL, 3, 2),
(34, 'Quelle est la différence entre un logiciel gratuit et un logiciel open source ?', 'What is the difference between free and open source software ?', 'Un logiciel gratuit peut être utilisé gratuitement, alors qu’un logiciel open source ne permet que d’utiliser une version limitée si l’on ne paie pas', 'Free software can be used for free, while open source software only allows you to use a limited version if you don\'t pay', 'Les logiciels gratuits sont souvent développé par des développeurs bénévoles, alors que les logiciels open source sont développé par des entreprises à but lucratif', 'Free software is often developed by volunteer developers, while open source software is developed by for-profit companies', 'Les logiciels open source sont distribués avec leur code, ce qui permet aux utilisateurs de le modifier, alors que les logiciels gratuits non', 'Open source software is distributed with its code, which allows users to modify it, while free software is not', 'les logiciels gratuits sont souvent débeloppés par des entreprises à but lucratif, alors que les logiciels open source sont développé par des développeurs bénévoles', 'Free software is often unpacked by for-profit companies, while open source software is developed by volunteer developers', 3, NULL, 2, 2),
(35, 'Qu\'est-ce que le phishing ?', 'What is phishing ?', 'Une technique utilisée pour voler des données personnelles en se faisant passer pour une entité de confiance', 'A technique used to steal personal data by posing as a trusted entity', 'Une méthode de chiffrement de données', 'A method of encrypting data', 'Un type de virus se basant sur une faille réseau', 'A type of virus based on a network vulnerability', 'Un dispositif de sécurité', 'A security feature', 1, NULL, 6, 2),
(36, 'Qu\'est-ce qu’un pare-feu ?', 'What is a firewall ?', 'Autre appellation pour un antivirus', 'Another name for an antivirus', 'Un système de sécurité qui surveille le trafic réseau et bloque si nécessaire les paquets malveillants', 'A security system that monitors network traffic and blocks malicious packets if necessary', 'Autre appellation pour un extincteur', 'Another name for extinguisher', 'Un service qui bloque et définit les délimitations d’un sous-réseau d’une entreprise', 'A service that blocks and defines the boundaries of a company\'s subnet', 2, NULL, 3, 2),
(37, 'Qu\'est-ce qu’un cheval de Troie ?', 'What is a Trojan horse ?', 'Un programme qui se fait passer pour bienveillant mais qui ne l’est en réalité pas', 'A program that pretends to be benevolent but is actually not', 'Un virus qui naviguent d’ordinateur en ordinateur sur le même réseau', 'A virus that travels from computer to computer on the same network', 'Un mail essayant d’usurper l’identité d’une personne de confiance', 'A mail trying to impersonate a trusted person', 'Un type de cookie', 'A type of cookie', 1, NULL, 6, 2),
(38, 'Laquelle de ces propositions n’est pas une attaque existante ?', 'Which of these is not an existing attack ?', 'Birthday attack', 'Birthday attack', 'XSS', 'XSS', 'Man in the Middle', 'Man in the Middle', 'PTFC attack', 'PTFC attack', 4, NULL, 6, 2),
(39, 'Qu\'est-ce que le brute force ?', 'What is brute force ?', 'Attaque consistant à se glisser au milieu d’une communication', 'An attack consisting of slipping into the middle of a communication', 'Attaque consistant à tester tous les mots de passes jusqu’à trouver le bon', 'An attack that tests all passwords until the correct one is found', 'Type de phishing', 'A type of phishing', 'Attaque consistant à saturer le réseau d’un service pour le faire tomber', 'Attack consisting in saturating the network of a service to bring it down', 2, NULL, 6, 2),
(40, 'Quel est le principal avantage des cryptomonnaies par rapport aux devises traditionnelles ?', 'What is the main advantage of cryptocurrencies over traditional currencies ?', 'Elles sont plus faciles à utiliser', 'They are easier to use', 'Elles sont plus stables', 'They are more stable', 'Elles sont plus sûres', 'They are more secure', 'Elles sont plus transparentes', 'They are more transparent', 3, NULL, 5, 2),
(41, 'Comment les cryptomonnaies sont-elles stockées ?', 'How are cryptocurrencies stored ?', 'Sur des disques durs', 'On hard drives', 'Sur des serveurs sécurisés', 'On secure servers', 'Sur des cartes mémoire', 'On memory cards', 'Dans des portefeuilles numériques', 'In digital wallets', 4, NULL, 5, 2),
(42, 'Quel est le type d’écran avec le plus de contraste ?', 'What type of screen has the most contrast ?', 'QLED', 'QLED', 'OLED', 'OLED', 'LCD', 'LCD', 'IPS', 'IPS', 2, NULL, 1, 2),
(43, 'Quel est le jeu vidéo le plus vendu de tous les temps ?', 'What is the best selling video game of all time ?', 'Minecraft', 'Minecraft', 'Tetris', 'Tetris', 'GTA 5', 'GTA 5', 'Call of duty: Modern Warfare 3', 'Call of duty: Modern Warfare 3', 2, NULL, 5, 2),
(44, 'Quel est le jeu qui n’est pas un FPS ?', 'What is the game that is not an FPS ?', 'Doom', 'Doom', 'Rainbow Six Siege', 'Rainbow Six Siege', 'Unrecord', 'Unrecord', 'Bloodborne', 'Bloodborne', 4, NULL, 5, 2),
(45, 'Quelle est la série de carte graphique la plus puissante aujourd’hui ?', 'What is the most powerful graphics card series today ?', 'RX 5700', 'RX 5700', 'RTX 4090', 'RTX 4090', 'RTX 5090', 'RTX 5090', 'RTX 6700', 'RTX 6700', 2, NULL, 1, 2),
(46, 'Quel est le nom du premier système d\'exploitation de Microsoft ?', 'What is the name of Microsoft\'s first operating system ?', 'MS-DOS', 'MS-DOS', 'Windows 1.0', 'Windows 1.0', 'Windows XP', 'Windows XP', 'Windows 95', 'Windows 95', 1, NULL, 5, 2),
(47, 'Quel est le nom du système de fichiers utilisé par Windows ?', 'What is the name of the file system used by Windows?', 'NTFS', 'NTFS', 'exFAT', 'exFAT', 'FAT32', 'FAT32', 'FAT', 'FAT', 1, NULL, 5, 2),
(48, 'Quel est le nom de la distribution Linux la plus populaire ?', 'What is the name of the most popular Linux distribution ?', 'Debian', 'Debian', 'Fedora', 'Fedora', 'Ubuntu', 'Ubuntu', 'Arch Linux', 'Arch Linux', 3, NULL, 5, 2),
(49, 'Quelle est la fonction de l\'adresse IP dans un réseau informatique ?', 'What is the function of the IP address in a computer network ?', 'Identifier les périphériques connectés au réseau', 'Identify devices connected to the network', 'Assurer la sécurité du réseau', 'Ensuring network security', 'Accélérer les transferts de données sur le réseau', 'Speed up data transfers over the network', 'Optimiser la qualité du signal sur le réseau', 'Optimize signal quality on the network', 1, NULL, 3, 2),
(50, 'Qu\'est-ce qu\'un \"port scan\" en hacking ?', 'What is a \"port scan\" in hacking ?', 'Une technique pour scanner les ports ouverts d\'un système', 'A technique for scanning open ports on a system', 'Une technique pour voler des informations confidentielles à distance', 'A technique to steal confidential information remotely', 'Une technique pour supprimer des fichiers système', 'A technique to delete system files', 'Une technique pour bloquer l\'accès à un système', 'A technique to block access to a system', 1, NULL, 3, 2),
(51, 'Quel est le premier ordinateur électronique à avoir été créé ?', 'What was the first electronic computer to be created ?', 'IBM PC', 'IBM PC', 'Apple Macintosh', 'Apple Macintosh', 'ENIAC', 'ENIAC', 'Commodore 64', 'Commodore 64', 3, NULL, 5, 3),
(52, 'Qui est considéré comme le \"père de l\'informatique\" ?', 'Who is considered the \"father of computing\" ?', 'Charles Babbage', 'Charles Babbage', 'Tim Berners-Lee', 'Tim Berners-Lee', 'Bill Gates', 'Bill Gates', 'Steve Jobs', 'Steve Jobs', 1, NULL, 5, 3),
(53, 'Quel événement important a conduit à la création du premier réseau informatique ?', 'What important event led to the creation of the first computer network ?', 'La création de l\'ARPANET', 'The creation of the ARPANET', 'La création d\'Internet', 'The creation of the Internet', 'La création du World Wide Web', 'The creation of the World Wide Web', 'La création du premier INTRANET', 'The creation of the first INTRANET', 1, NULL, 5, 3),
(54, 'Qu\'est-ce que signifie l\'acronyme \"FTP\" en informatique ?', 'What does the acronym \"FTP\" stand for in computing ?', 'Fast Transmission Protocol', 'Fast Transmission Protocol', 'Full Time Protocol', 'Full Time Protocol', 'Fast Track Protocol', 'Fast Track Protocol', 'File Transfer Protocol', 'File Transfer Protocol', 4, NULL, 5, 3),
(55, 'Quel est le nom du co-créateur de Microsoft avec Bill Gates ?', 'What is the name of the co-creator of Microsoft with Bill Gates ?', 'Steve Wozniak', 'Steve Wozniak', 'Paul Allen', 'Paul Allen', 'Larry Page', 'Larry Page', 'Evan Spiegel', 'Evan Spiegel', 2, NULL, 5, 3),
(56, 'Qu’est ce qu’un MCD ?', 'What is a DCM ?', 'Modèle commun de données (ensemble de règles qui définissent un format de fichier)', 'Common Data Model (set of rules that define a file format)', 'Mode commun de développement (méthode de développement spécifique)', 'Common development mode (specific development method)', 'Modèle conceptuel de données (sert pour faire un schéma d’une base de données)', 'Conceptual Data Model (used to make a schema of a database)', 'Module commun de driver (Plug-In que l’on peut ajouter à un pilote)', 'Common driver module (Plug-In that can be added to a driver)', 3, NULL, 5, 3),
(57, 'Qu\'est-ce que signifie l\'acronyme \"IMAP\" en informatique ?', 'What does the acronym \"IMAP\" stand for in computing ?', 'Internet Mail Access Protocol', 'Internet Mail Access Protocol', 'Instant Messaging Access Protocol', 'Instant Messaging Access Protocol', 'Internal Mail Administration Program', 'Internal Mail Administration Program', 'Internet Message Access Protocol', 'Internet Message Access Protocol', 4, NULL, 5, 3),
(58, 'Qu’est-ce que le modèle OSI ?', 'What is the OSI model ?', 'Language de programmation orienté objet', 'Object-oriented programming language', 'Modèle décrivant les différentes couches d’une communication réseau', 'Model describing the different layers of a network communication', 'Système d’exploitation basé sur Debian', 'Debian-based operating system', 'Protocole réseau servant à naviguer sur internet', 'Network protocol used to browse the internet', 2, NULL, 5, 3),
(59, 'A quoi sert ce composant ?', 'What is the purpose of this component ?', 'A donner de l’énergie à l’ordinateur afin de \"sauver l’ordinateur\" un instant si jamais l’alimentation lâche', 'To give energy to the computer in order to \"save the computer\" for a moment if the power fails', 'A donner l’heure', 'To give the time', 'A rediriger un bus sur la carte mère', 'To redirect a bus on the motherboard', 'Joindre plusieurs bus sur la carte mère', 'To join several buses on the motherboard', 2, 'https://centronik.ci/wp-content/uploads/2018/04/quartz.jpg', 1, 3),
(60, 'Quel était la capacité de stockage du tout premier disque dur, l’IBM RAMAC 305 ?', 'What was the storage capacity of the very first hard disk, the IBM RAMAC 305 ?', '5 Mo', '5 Mo', '3 Mo', '3 Mo', '10 Mo', '10 Mo', '1 Mo', '1 Mo', 1, NULL, 5, 3),
(61, 'Quelle est la première console qui a existé ?', 'What was the first console that existed ?', 'Philips Odyssey 2100', 'Philips Odyssey 2100', 'Atari 2600', 'Atari 2600', 'Atari Super Pong', 'Atari Super Pong', 'Magnavox Odyssey', 'Magnavox Odyssey', 4, NULL, 5, 3),
(62, 'Quelle est la fonction de la blockchain dans les cryptomonnaies ?', 'What is the function of the blockchain in cryptocurrencies ?', 'Assurer la confidentialité des transactions', 'Ensuring the confidentiality of transactions', 'Assurer la rapidité des transactions', 'Ensuring fast transactions', 'Assurer la sécurité des transactions', 'Ensuring the security of transactions', 'Assurer la gratuité des transactions', 'Ensuring free transactions', 3, NULL, 5, 3),
(63, 'Qu\'est-ce que l\'ICO (Initial Coin Offering) ?', 'What is an ICO (Initial Coin Offering) ?', 'Une forme de financement participatif utilisant des cryptomonnaies', 'A form of participatory financing using cryptocurrencies', 'Une nouvelle cryptomonnaie lancée sur le marché', 'A form of participatory financing using cryptocurrencies', 'Un investissement dans une entreprise spécialisée dans les cryptomonnaies', 'An investment in a company specializing in cryptocurrencies', 'Une forme de publicité pour les cryptomonnaies', 'A form of advertising for cryptocurrencies', 1, NULL, 5, 3),
(64, 'Qu\'est-ce qu\'un smart contract ?', 'What is a smart contract ?', 'Un contrat d\'assurance pour les cryptomonnaies', 'An insurance policy for cryptocurrencies', 'Un contrat de travail pour les développeurs de cryptomonnaies', 'An employment contract for cryptocurrency developers', 'Un contrat électronique auto-exécutable basé sur la blockchain', 'A self-executing electronic contract based on the blockchain', 'Un contrat de licence pour les utilisateurs de cryptomonnaies', 'A licensing agreement for cryptocurrency users', 3, NULL, 5, 3),
(65, 'Qu\'est-ce que le fork d\'une cryptomonnaie ?', 'What is the fork of a cryptocurrency ?', 'La création d\'une nouvelle cryptomonnaie à partir de la cryptomonnaie originale', 'The creation of a new cryptocurrency from the original one', 'La suppression d\'une cryptomonnaie du marché', 'The removal of a cryptocurrency from the market', 'La fusion de deux cryptomonnaies différentes', 'Merging two different cryptocurrencies', 'La mise à jour d\'une cryptomonnaie existante', 'Upgrading an existing cryptocurrency', 1, NULL, 5, 3),
(66, 'Qu\'est-ce que le halving dans le contexte du Bitcoin ?', 'What is halving in the context of Bitcoin ?', 'La division de la valeur du Bitcoin par deux', 'The division of the value of Bitcoin by two', 'La réduction de la récompense de minage par deux', 'The reduction of the mining reward by two', 'L\'augmentation de la difficulté de minage par deux', 'Increasing the difficulty of mining by two', 'La suppression de la limite maximale de Bitcoin qui peut être créé', 'The removal of the maximum limit of Bitcoin that can be created', 2, NULL, 5, 3),
(67, 'Qui est Jawed Karim ?', 'Who is Jawed Karim ?', 'Le co-fondateur de la première cryptomonnaie', 'The co-founder of the first crypto-currency', 'Le créateur de YouTube', 'The creator of YouTube', 'Le co-fondateur de Dell', 'Dell\'s co-founder', 'Le fondateur de Twitter', 'The founder of Twitter', 2, NULL, 5, 3),
(68, 'Quel est le record actuel pour la vente la plus élevée d\'un NFT ?', 'What is the current record for the highest sale of an NFT ?', '69 millions de dollars', '69 million dollars', '100 millions de dollars', '100 million dollars', '420 millions de dollars', '420 millions dollars', '1 milliard de dollars', '1 billion dollars', 3, NULL, 5, 3),
(69, 'Qu’est-ce que le minting dans les NFT ?', 'What is minting in NFT ?', 'Le processus de création d’un NFT', 'The process of creating an NFT', 'Le processus de suppression d’un NFT', 'The process of deleting an NFT', 'Le processus de transfert d’un NFT', 'The process of transfering an NFT', 'Le processus de stockage d’un NFT dans la blockchain', 'The process of storing an NFT in the blockchain', 1, NULL, 5, 3),
(70, 'Quel est le moteur graphique le plus puissant aujourd’hui ?', 'What is the most powerful graphics engine today ?', 'Unity', 'Unity', 'Unreal Engine 5', 'Unreal Engine 5', 'CryENGINE', 'CryENGINE', 'Godot', 'Godot', 2, NULL, 5, 3),
(71, 'Quelle est la fonction de l\'outil \"chkdsk\" sur Windows ?', 'What is the function of the \"chkdsk\" tool on Windows ?', 'Vérifier et corriger les erreurs de disque', 'Check and correct disk errors', 'Nettoyer le disque', 'Clean up the disk', 'Éliminer les virus et les logiciels malveillants', 'Eliminate viruses and malware', 'Gérer les processus en cours d\'exécution', 'Manage the running processes', 1, NULL, 5, 3),
(72, 'Qu\'est-ce que le registre de Windows ?', 'What is the Windows registry ?', 'Une base de données qui contient des informations sur les périphériques matériels', 'A database that contains information about hardware devices', 'Une base de données qui contient des informations sur les programmes installés', 'A database that contains information about installed programs', 'Une base de données qui contient des informations sur les utilisateurs', 'A database that contains information about users', 'Une base de données qui contient des informations sur les paramètres système', 'A database that contains information about system parameters', 4, NULL, 5, 3),
(73, 'Quelle est la différence entre un réseau local (LAN) et un réseau étendu (WAN) ?', 'What is the difference between a Local Area Network (LAN) and a Wide Area Network (WAN) ?', 'La portée géographique du réseau', 'The geographic range of the network', 'Le nombre de périphériques connectés au réseau', 'The number of devices connected to the network', 'Le type de câblage utilisé pour connecter les périphériques', 'The type of cabling used to connect devices', 'La vitesse de transfert des données sur le réseau', 'The speed of data transfer on the network', 1, NULL, 3, 3),
(74, 'Qu\'est-ce que la bande passante dans un réseau informatique ?', 'What is bandwidth in a computer network ?', 'La quantité de données qui peut être transférée sur le réseau en une seconde', 'The amount of data that can be transferred over the network in one second', 'Le nombre maximum de périphériques qui peuvent être connectés au réseau', 'The maximum number of devices that can be connected to the network', 'Le type de câble utilisé pour connecter les périphériques au réseau', 'The type of cable used to connect devices to the network', 'La distance maximale entre les périphériques connectés au réseau', 'The maximum distance between devices connected to the network', 1, NULL, 3, 3),
(75, 'Quelle commande permet de lister les fichiers dans un répertoire en affichant les détails de chaque fichier ?', 'What command lists the files in a directory, displaying the details of each file ?', 'cd -d', 'cd -d', 'mv -f', 'mv -f', 'ls -l', 'ls -l', 'rm -r', 'rm -r', 3, NULL, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `id_session` int NOT NULL,
  `pseudo` varchar(32) NOT NULL,
  `score` int NOT NULL,
  `quest_01` int NOT NULL,
  `rep_quest_01` int NOT NULL,
  `quest_02` int NOT NULL,
  `rep_quest_02` int NOT NULL,
  `quest_03` int NOT NULL,
  `rep_quest_03` int NOT NULL,
  `quest_04` int NOT NULL,
  `rep_quest_04` int NOT NULL,
  `quest_05` int NOT NULL,
  `rep_quest_05` int NOT NULL,
  `quest_06` int NOT NULL,
  `rep_quest_06` int NOT NULL,
  `quest_07` int NOT NULL,
  `rep_quest_07` int NOT NULL,
  `quest_08` int NOT NULL,
  `rep_quest_08` int NOT NULL,
  `quest_09` int NOT NULL,
  `rep_quest_09` int NOT NULL,
  `quest_10` int NOT NULL,
  `rep_quest_10` int NOT NULL,
  `quest_11` int NOT NULL,
  `rep_quest_11` int NOT NULL,
  `quest_12` int NOT NULL,
  `rep_quest_12` int NOT NULL,
  `quest_13` int NOT NULL,
  `rep_quest_13` int NOT NULL,
  `quest_14` int NOT NULL,
  `rep_quest_14` int NOT NULL,
  `quest_15` int NOT NULL,
  `rep_quest_15` int NOT NULL,
  `quest_16` int NOT NULL,
  `rep_quest_16` int NOT NULL,
  `quest_17` int NOT NULL,
  `rep_quest_17` int NOT NULL,
  `quest_18` int NOT NULL,
  `rep_quest_18` int NOT NULL,
  `quest_19` int NOT NULL,
  `rep_quest_19` int NOT NULL,
  `quest_20` int NOT NULL,
  `rep_quest_20` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`id_difficulty`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `fk_category` (`fk_category`),
  ADD KEY `fk_difficulty` (`fk_difficulty`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id_session`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `id_difficulty` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `id_session` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_category` FOREIGN KEY (`fk_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `question_difficulty` FOREIGN KEY (`fk_difficulty`) REFERENCES `difficulty` (`id_difficulty`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
