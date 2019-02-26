-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 10:05 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spolnici_walkadog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'linolada', '$2y$10$kNDOnrTWWIVMF.SuBfQinu/zWnxyi4f9DaWkpPbd2IuqtlrSTXjpG'),
(3, '', '$2y$10$5rwUbVAj8XYWDaZa4uX59.g/DoogtAlPVn1EQYTL3oVHqZvDVggti');

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `breed_id` int(11) NOT NULL,
  `breed` varchar(60) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`breed_id`, `breed`) VALUES
(1, 'Affenpinscher'),
(2, 'Afghan Hound'),
(3, 'Airedale Terrier'),
(4, 'Akita'),
(5, 'Alaskan Klee Kai'),
(6, 'Alaskan Malamute'),
(7, 'American Bulldog'),
(8, 'American English Coonhound'),
(9, 'American Eskimo Dog'),
(10, 'American Foxhound'),
(11, 'American Pit Bull Terrier'),
(12, 'American Staffordshire Terrier'),
(13, 'American Water Spaniel'),
(14, 'Anatolian Shepherd Dog'),
(15, 'Appenzeller Sennenhunde'),
(16, 'Australian Cattle Dog'),
(17, 'Australian Kelpie'),
(18, 'Australian Shepherd'),
(19, 'Australian Terrier'),
(20, 'Azawakh'),
(21, 'Barbet'),
(22, 'Basenji'),
(23, 'Basset Hound'),
(24, 'Beagle'),
(25, 'Bearded Collie'),
(26, 'Bedlington Terrier'),
(27, 'Belgian Malinois'),
(28, 'Belgian Sheepdog'),
(29, 'Belgian Tervuren'),
(30, 'Berger Picard'),
(31, 'Bernedoodle'),
(32, 'Bernese Mountain Dog'),
(33, 'Bichon Frise'),
(34, 'Black and Tan Coonhound'),
(35, 'Black Mouth Cur'),
(36, 'Black Russian Terrier'),
(37, 'Bloodhound'),
(38, 'Blue Lacy'),
(39, 'Bluetick Coonhound'),
(40, 'Boerboel'),
(41, 'Bolognese'),
(42, 'Border Collie'),
(43, 'Border Terrier'),
(44, 'Borzoi'),
(45, 'Boston Terrier'),
(46, 'Bouvier des Flandres'),
(47, 'Boxer'),
(48, 'Boykin Spaniel'),
(49, 'Bracco Italiano'),
(50, 'Briard'),
(51, 'Brittany'),
(52, 'Brussels Griffon'),
(53, 'Bull Terrier'),
(54, 'Bulldog'),
(55, 'Bullmastiff'),
(56, 'Cairn Terrier'),
(57, 'Canaan Dog'),
(58, 'Cane Corso'),
(59, 'Cardigan Welsh Corgi'),
(60, 'Catahoula Leopard Dog'),
(61, 'Caucasian Shepherd Dog'),
(62, 'Cavalier King Charles Spaniel'),
(63, 'Cesky Terrier'),
(64, 'Chesapeake Bay Retriever'),
(65, 'Chihuahua'),
(66, 'Chinese Crested'),
(67, 'Chinese Shar-Pei'),
(68, 'Chinook'),
(69, 'Chow Chow'),
(70, 'Clumber Spaniel'),
(71, 'Cockapoo'),
(72, 'Cocker Spaniel'),
(73, 'Collie'),
(74, 'Coton de Tulear'),
(75, 'Curly-Coated Retriever'),
(76, 'Dachshund'),
(77, 'Dalmatian'),
(78, 'Dandie Dinmont Terrier'),
(79, 'Doberman Pinscher'),
(80, 'Dogo Argentino'),
(81, 'Dogue de Bordeaux'),
(82, 'Dutch Shepherd'),
(83, 'English Cocker Spaniel'),
(84, 'English Foxhound'),
(85, 'English Setter'),
(86, 'English Springer Spaniel'),
(87, 'English Toy Spaniel'),
(88, 'Entlebucher Mountain Dog'),
(89, 'Field Spaniel'),
(90, 'Finnish Lapphund'),
(91, 'Finnish Spitz'),
(92, 'Flat-Coated Retriever'),
(93, 'Fox Terrier'),
(94, 'French Bulldog'),
(95, 'German Pinscher'),
(96, 'German Shepherd Dog'),
(97, 'German Shorthaired Pointer'),
(98, 'German Wirehaired Pointer'),
(99, 'Giant Schnauzer'),
(100, 'Glen of Imaal Terrier'),
(101, 'Goldador'),
(102, 'Golden Retriever'),
(103, 'Goldendoodle'),
(104, 'Gordon Setter'),
(105, 'Great Dane'),
(106, 'Great Pyrenees'),
(107, 'Greater Swiss Mountain Dog'),
(108, 'Greyhound'),
(109, 'Harrier'),
(110, 'Havanese'),
(111, 'Ibizan Hound'),
(112, 'Icelandic Sheepdog'),
(113, 'Irish Red and White Setter'),
(114, 'Irish Setter'),
(115, 'Irish Terrier'),
(116, 'Irish Water Spaniel'),
(117, 'Irish Wolfhound'),
(118, 'Italian Greyhound'),
(119, 'Jack Russell Terrier'),
(120, 'Japanese Chin'),
(121, 'Japanese Spitz'),
(122, 'Korean Jindo Dog'),
(123, 'Karelian Bear Dog'),
(124, 'Keeshond'),
(125, 'Kerry Blue Terrier'),
(126, 'Komondor'),
(127, 'Kooikerhondje'),
(128, 'Kuvasz'),
(129, 'Labradoodle'),
(130, 'Labrador Retriever'),
(131, 'Lagotto Romagnolo'),
(132, 'Lakeland Terrier'),
(133, 'Lancashire Heeler'),
(134, 'Leonberger'),
(135, 'Lhasa Apso'),
(136, 'Lowchen'),
(137, 'Maltese'),
(138, 'Maltese Shih Tzu'),
(139, 'Maltipoo'),
(140, 'Manchester Terrier'),
(141, 'Mastiff'),
(142, 'Miniature Pinscher'),
(143, 'Miniature Schnauzer'),
(144, 'Mudi'),
(145, 'Mutt'),
(146, 'Neapolitan Mastiff'),
(147, 'Newfoundland'),
(148, 'Norfolk Terrier'),
(149, 'Norwegian Buhund'),
(150, 'Norwegian Elkhound'),
(151, 'Norwegian Lundehund'),
(152, 'Norwich Terrier'),
(153, 'Nova Scotia Duck Tolling Retriever'),
(154, 'Old English Sheepdog'),
(155, 'Otterhound'),
(156, 'Papillon'),
(157, 'Peekapoo'),
(158, 'Pekingese'),
(159, 'Pembroke Welsh Corgi'),
(160, 'Petit Basset Griffon Vendeen'),
(161, 'Pharaoh Hound'),
(162, 'Plott'),
(163, 'Pocket Beagle'),
(164, 'Pointer'),
(165, 'Polish Lowland Sheepdog'),
(166, 'Pomeranian'),
(167, 'Pomsky'),
(168, 'Poodle'),
(169, 'Portuguese Water Dog'),
(170, 'Pug'),
(171, 'Puggle'),
(172, 'Puli'),
(173, 'Pyrenean Shepherd'),
(174, 'Rat Terrier'),
(175, 'Redbone Coonhound'),
(176, 'Rhodesian Ridgeback'),
(177, 'Rottweiler'),
(178, 'Saint Bernard'),
(179, 'Saluki'),
(180, 'Samoyed'),
(181, 'Schipperke'),
(182, 'Schnoodle'),
(183, 'Scottish Deerhound'),
(184, 'Scottish Terrier'),
(185, 'Sealyham Terrier'),
(186, 'Shetland Sheepdog'),
(187, 'Shiba Inu'),
(188, 'Shih Tzu'),
(189, 'Siberian Husky'),
(190, 'Silken Windhound'),
(191, 'Silky Terrier'),
(192, 'Skye Terrier'),
(193, 'Sloughi'),
(194, 'Small Munsterlander Pointer'),
(195, 'Soft Coated Wheaten Terrier'),
(196, 'Stabyhoun'),
(197, 'Staffordshire Bull Terrier'),
(198, 'Standard Schnauzer'),
(199, 'Sussex Spaniel'),
(200, 'Swedish Vallhund'),
(201, 'Tibetan Mastiff'),
(202, 'Tibetan Spaniel'),
(203, 'Tibetan Terrier'),
(204, 'Toy Fox Terrier'),
(205, 'Treeing Tennessee Brindle'),
(206, 'Treeing Walker Coonhound'),
(207, 'Vizsla'),
(208, 'Weimaraner'),
(209, 'Welsh Springer Spaniel'),
(210, 'Welsh Terrier'),
(211, 'West Highland White Terrier'),
(212, 'Whippet'),
(213, 'Wirehaired Pointing Griffon'),
(214, 'Xoloitzcuintli');

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `dog_id` int(11) NOT NULL,
  `owner_fk` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `breed` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `vaccinated` tinyint(1) DEFAULT '0',
  `trained` tinyint(1) DEFAULT '0',
  `aggression` tinyint(1) DEFAULT '0',
  `other` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`dog_id`, `owner_fk`, `name`, `age`, `breed`, `vaccinated`, `trained`, `aggression`, `other`) VALUES
(1, 1, 'Hektor', 21, 'German Shepherd', 1, 1, 0, 'he likes to play'),
(34, 76, 'Asdasd', 27, 'Italian Greyhound', 1, 1, 1, 'sadas'),
(35, 77, 'Doggo', 14, 'Chow Chow', 1, 1, 0, 'asdasdas'),
(36, 77, 'Dogie', 53, 'Cairn Terrier', 0, 1, 1, 'asdasd'),
(37, 79, 'Asdasd', 27, 'Cockapoo', 1, 1, 0, 'asdasd'),
(38, 80, 'Asdasd', 27, 'Clumber Spaniel', 1, 1, 0, ''),
(39, 80, 'Asfasfa', 53, 'Kerry Blue Terrier', 0, 0, 1, 'sasd'),
(40, 80, 'Asfasfasf', 14, 'Miniature Schnauzer', 1, 0, 0, 'asdasd'),
(41, 81, 'Asdasdas', 14, 'Irish Water Spaniel', 1, 0, 0, ''),
(42, 81, 'Fasfasfasf', 40, 'Cockapoo', 0, 0, 1, 'asdasdasd'),
(43, 82, 'Asdasdasd', 27, 'Bull Terrier', 1, 1, 0, 'sadasdasd'),
(44, 83, 'Minime', 64, 'Norwich Terrier', 1, 1, 0, 'good dog');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hashedMail` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `mail`, `hashedMail`) VALUES
(20, 'vullgaryt@gmail.com', '391275bdbb13f8f17bc55b6427976955'),
(21, 'miloslalic201@gmail.com', '79ead70d90f01168f0de3f779da0dff5'),
(22, 'gjdhgjfhg@sadas.com', 'f07504f5e0b07bf63c3df00c1caad355'),
(24, 'patarcic98@gmail.com', '86f95360481b6c05e6aa777d1f3f5e48'),
(25, 'testing123@gmail.com', 'd8d19ceab0b10bb04f8b4c2fe991a1b9');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `code_fk` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `code_fk`, `comment`, `verified`) VALUES
(1, '1234567890', 'Very good walks my dog is very pleased with ur services. He gives 10 paws out of 20', 1),
(24, '1353619172', 'asdasdsad', 0),
(28, '1338027348', 'Very cool backend Lukaku also nice frontend Gaspaku', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `hashed_email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `review_code` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `verification_code` char(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `hashed_email`, `address`, `phone`, `status`, `verified`, `review_code`, `verification_code`) VALUES
(1, 'Gaspatarcic Linolada', 'walkadog@secondsection.in.rs', '', 'Liloladaland 21', '0621653523', 1, 0, '1234567890', ''),
(72, 'Gdsjghjsdgh Hjghjshjghsj', 'dhgjsdhgjh@gaghjas.com', '4a7f5495cd9a7857d442951381854074', 'Gjhsdjghj 4', '+381 455454', 1, 0, '1115700161', '7r9i(eq56okfw,l@0^3j'),
(73, 'Bem Ti Misec', 'fhgdfhu@asd.com', '12fc290dcb51b6526d0ef927430d0ae7', 'Gjhdsjgh 4', '+381 5645456', 1, 0, '1167730690', 'bh(j.;)mku!q@*1t]x3y'),
(74, 'Asdasd Asfasfsa', 'fsafasf@sadas.com', '0a97cc79a56f326c7029feff8468ecba', 'Asfasfasf 9', '+381 545456', 1, 0, '1112844549', '[gz;a0@jh^_4r9*yf,(2'),
(75, 'Hdhughdfjghj Hdffjkghjkdfhgjhdjhg', 'jksdhjgkhsj@gmail.com', 'ace18a6bea25ea48689dd57915b06f2a', 'Asfgjdsgsdjg', '+381 64564545', 1, 0, '1174180906', '2tn9]z1vs5l!;ck,6fg_'),
(76, 'Safjkjsajfkajsf Jgiajisajf', 'dasdas4@sadas.com', '37d521fd15da4a833fe24f42c539e51e', 'Asfasf', '+381 45454231', 1, 0, '1353619172', '[^61p!b4mx])lh0ncquo'),
(77, 'Stefan Gasparic', 'stefi@gmail.com', '503fbc8269a97b104457a0ca9eb0e4b5', 'Somewhere 12', '+381 65153515', 1, 0, '1338027348', 'k7]_i1b(@dgm*;rf29qt'),
(78, 'test', 'email', 'hashedEmail', 'address', 'phone', 0, 0, 'reviewCode', 'verificationCode'),
(79, 'Asdasd Asdasfasf', 'asfasfasfasfas@asdasda.com', 'bb6cd26fb3d9dde4dd82d562001af2d9', 'Fasfasfasdas', '+381 23423423423', 1, 0, '1229404611', '6(vkwa*jme2tsy[.^,5_'),
(80, 'Safasfas Fasdasdasd', 'asdasdasd@sadasd.com', 'b6c558f98012fb9517171262425286bb', 'Saasdasda 5', '+381 4545423123', 1, 0, '1232561294', ']yu4ntl;638*wbsmfgo7'),
(81, 'Dfgdfgjdfkjgkdfj Sdjkfjsdkjfklj', 'asdasdjkjasd@asdjasjd.com', '813375caf9e177d4fcac1ac83e100f7b', 'Gjsdhgjshdjghjsd 3', '+381 454412424', 0, 0, '1359969032', '2of.!m@]_xd1s*ln9)cy'),
(82, 'Testing Again', 'likelol@gmail.com', '71bfa16f7e67ecf886ebf76f5bdbda7d', 'Asdasfasf', '+381 454212315', 0, 0, '1381016626', 'l2945ubodnh.rwsci@7a'),
(83, 'Baze Podataka', 'memere@gmail.com', '353455d7838b55e8bac3fb431a3c8bd2', 'Localhost 121', '+381 4544512424', 0, 0, '1163314983', 'ialct_6v8xp1orek;w4f');

-- --------------------------------------------------------

--
-- Table structure for table `walks`
--

CREATE TABLE `walks` (
  `walk_id` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `one_time_walk` datetime DEFAULT NULL,
  `weekly_walk_day` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weekly_walk_time` time DEFAULT NULL,
  `daily_walk_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `walks`
--

INSERT INTO `walks` (`walk_id`, `user_fk`, `type`, `one_time_walk`, `weekly_walk_day`, `weekly_walk_time`, `daily_walk_time`) VALUES
(1, 1, 'daily', '0000-00-00 00:00:00', NULL, NULL, NULL),
(2, 1, 'daily', '0000-00-00 00:00:00', NULL, NULL, NULL),
(3, 1, 'daily', '0000-00-00 00:00:00', NULL, NULL, NULL),
(4, 1, 'daily', '2019-01-04 19:00:00', NULL, NULL, NULL),
(47, 76, 'oneTime', '2019-01-16 01:00:00', NULL, NULL, NULL),
(48, 77, 'daily', NULL, NULL, NULL, '01:00:00'),
(49, 79, 'oneTime', '2019-01-23 01:00:00', NULL, NULL, NULL),
(50, 80, 'weekly', NULL, 'Tuesday', '01:00:00', NULL),
(51, 81, 'oneTime', '2019-01-23 02:00:00', NULL, NULL, NULL),
(52, 82, 'oneTime', '2019-01-17 01:00:00', NULL, NULL, NULL),
(53, 83, 'daily', NULL, NULL, NULL, '01:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`breed_id`);

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`dog_id`),
  ADD KEY `owner_fk` (`owner_fk`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `code_fk` (`code_fk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `code` (`review_code`);

--
-- Indexes for table `walks`
--
ALTER TABLE `walks`
  ADD PRIMARY KEY (`walk_id`),
  ADD KEY `user_fk` (`user_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `dog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `walks`
--
ALTER TABLE `walks`
  MODIFY `walk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dogs`
--
ALTER TABLE `dogs`
  ADD CONSTRAINT `user-dog` FOREIGN KEY (`owner_fk`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `walks`
--
ALTER TABLE `walks`
  ADD CONSTRAINT `walks-user_constraint` FOREIGN KEY (`user_fk`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
