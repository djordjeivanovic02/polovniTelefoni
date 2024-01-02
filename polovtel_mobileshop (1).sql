-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 02:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polovtel_mobileshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ocene`
--

CREATE TABLE `ocene` (
  `ocena_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `ocena` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ocene`
--

INSERT INTO `ocene` (`ocena_id`, `user_id`, `ad_id`, `ocena`, `created_at`) VALUES
(1, 8, 44, 2, '2023-12-09 10:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `oglasi`
--

CREATE TABLE `oglasi` (
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `stateRange` float DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `old_price` float DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `approved` int(11) NOT NULL DEFAULT 0,
  `new_price` varchar(255) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `damage` varchar(255) DEFAULT NULL,
  `accessories` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oglasi`
--

INSERT INTO `oglasi` (`ad_id`, `user_id`, `brand`, `model`, `title`, `state`, `stateRange`, `description`, `price`, `old_price`, `images`, `creation_date`, `approved`, `new_price`, `views`, `availability`, `damage`, `accessories`) VALUES
(44, 8, 'Apple', 'iPhone 15 Pro', 'Prodajem Iphone 15pro 128GB', 1, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 1200, 1250, '8_654ff6f1075ad', '2023-11-11 22:49:37', 0, NULL, 120, 1, NULL, 'Slusalice, Silikonska maska, Zastitno stakolo, Originalna kutija'),
(57, 36, 'Apple', 'iPhone 15 Pro Max', 'Na prodaju Apple iPhone 15 Pro Max', 0, 9.9, 'sajhdbjasbjhb jhsbaj bjadsbjh bdjasbj bdjsabjh dbjsba jhbdsd bs', 1300, NULL, '36_6581a7004c6b8', '2023-12-19 15:21:52', 0, NULL, NULL, 1, 'Oštećen ekran,Oštećeno kućište,Zamrzavanje ili rušenje sistema,', 'Punjač,Zaštitna maska,Zaštitno staklo,Slušalice,'),
(58, 36, 'Apple', 'iPhone 15 Pro Max', 'Na prodaju Apple iPhone 15 Pro Max', 0, 9.9, 'sakdjksjandkna kjnsdksa<div>dsakjdkjasnk bjdsab&nbsp;</div><div><ol><li>jhdbsajbdjbasd</li><li>g</li><li>dsfdsgbfdbgj fd</li><li>fgdsgjdfjg</li></ol></div>', 2000, NULL, '36_6581a7218d356', '2023-12-19 15:22:25', 0, NULL, NULL, 1, 'Oštećen ekran,Oštećeno kućište,Zamrzavanje ili rušenje sistema,', 'Punjač,Zaštitna maska,Zaštitno staklo,Slušalice,'),
(59, 36, 'Xiaomi', 'Redmi Note 12', 'Na prodaju Apple iPhone 15 Pro Max', 0, 9.9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1700, NULL, '36_6581ad6b0942d', '2023-12-19 15:49:15', 0, NULL, NULL, 1, 'Problem s baterijom,Oštećeno kućište,', 'Power bank,Originalna kutija,'),
(60, 36, 'Apple', 'iPhone 15 Pro Max', 'dnsajkbfdjkb jhkbdasdasjhb jdbsjh bdjsb jhabd basjhjh bdjhsb jhdbshjsajhbf kjdbsjk b', 0, 7.5, '<b>sahbd ksbadhj bashjb kdhbsa hjksba jkhdbsakhuj bdsa asd sa dsa dasd sa&nbsp; asd sa dsa as&nbsp;</b>', NULL, NULL, '36_65840833a0045', '2023-12-21 10:41:07', 0, NULL, NULL, 1, 'Oštećen ekran,Oštećeno kućište,Zamrzavanje ili rušenje sistema,Kontakt s tečnostima,', 'Slušalice,Zaštitna folija,Dodatni objektivi,'),
(61, 36, 'Samsung', 'Galaxy A54', 'dasdas sa dsa dsa', 0, 10, '3213 12 dsa sa das dsa&nbsp;', 700, NULL, '36_65840858bf01b', '2023-12-21 10:41:44', 0, NULL, NULL, 1, 'Zamrzavanje ili rušenje sistema,Oštećen ekran,WiFi/Bluetooth ne radi,', 'Slušalice,Zaštitna maska,Power bank,'),
(62, 36, 'Apple', 'iPhone 15 Pro Max', 'dasdas sa dsa dsa', 0, 10, '3213 12 dsa sa das dsa&nbsp;', NULL, NULL, '36_6584087a508eb', '2023-12-21 10:42:18', 0, NULL, NULL, 1, 'Zamrzavanje ili rušenje sistema,Oštećen ekran,WiFi/Bluetooth ne radi,', 'Slušalice,Zaštitna maska,Power bank,'),
(63, 36, 'Apple', 'iPhone 15 Pro Max', 'dasdas sa dsa dsa', 0, 10, '3213 12 dsa sa das dsa&nbsp;', NULL, NULL, '36_6584089e0a61a', '2023-12-21 10:42:54', 0, NULL, NULL, 1, 'Zamrzavanje ili rušenje sistema, Oštećen ekran, WiFi/Bluetooth ne radi, ', 'Slušalice, Zaštitna maska, Power bank, '),
(68, 39, 'LG', 'G5', 'Prodajem LG G5 Kao nov', 0, 9.7, '<b>&nbsp;dsa </b>dsasad das sa dsa <b>sa dsa dsa ds&nbsp;<u>&nbsp;dsa dsa dsa a</u></b><div><b><u><i>asdsad sa ds</i></u></b></div><div><u style=\"\"><i style=\"\"><b>dsadsadsad</b>dsadsadsd</i></u></div><div><u style=\"\"><i style=\"\"><br></i></u></div><div><ol><li><u style=\"\"><i style=\"\">dsadasdsa</i></u></li></ol><i><ul><li><i><u>dsadasdas</u></i></li><li style=\"text-align: center;\"><i><u>dsadsadsd</u></i></li></ul></i></div>', 230, NULL, '39_658f11f004864', '2023-12-29 19:37:36', 0, NULL, NULL, 1, '', 'Punjač, Zaštitna maska, Slušalice, '),
(69, 39, 'Huawei', 'P30', 'Huawei Premium Pakovanje ne koriscen', 1, 0, 'Novo ne otpakovano sve&nbsp; se sija.baterija ko nova.baba koristila', 450, NULL, '39_658f1380ccdd9', '2023-12-29 19:44:16', 0, NULL, NULL, 1, '', 'Punjač, Zaštitna maska, Zaštitno staklo, Originalna kutija, Zaštitna folija, Zaštitna futrola, Bežični punjač, Dodatni objektivi, Power bank, Slušalice, SIM free, '),
(70, 39, 'Huawei', 'P30', 'Huawei Premium Pakovanje ne koriscen', 1, 0, 'Novo ne otpakovano sve&nbsp; se sija.baterija ko nova.baba koristila', 450, NULL, '39_658f13af75954', '2023-12-29 19:45:03', 0, NULL, NULL, 1, '', 'Punjač, Zaštitna maska, Zaštitno staklo, Originalna kutija, Zaštitna folija, Zaštitna futrola, Bežični punjač, Dodatni objektivi, Power bank, Slušalice, SIM free, '),
(71, 39, 'Huawei', 'P30', 'Huawei Premium Pakovanje ne koriscen', 1, 0, 'Novo ne otpakovano sve&nbsp; se sija.baterija ko nova.baba koristila', 450, NULL, '39_658f13bdaa1f8', '2023-12-29 19:45:17', 0, NULL, NULL, 1, '', 'Punjač, Zaštitna maska, Zaštitno staklo, Originalna kutija, Zaštitna folija, Zaštitna futrola, Bežični punjač, Dodatni objektivi, Power bank, Slušalice, SIM free, '),
(72, 39, 'Huawei', 'P30', 'Huawei Premium Pakovanje ne koriscen', 1, 0, 'Novo ne otpakovano sve&nbsp; se sija.baterija ko nova.baba koristila', 450, NULL, '39_658f13c4c1288', '2023-12-29 19:45:24', 0, NULL, NULL, 1, '', 'Punjač, Zaštitna maska, Zaštitno staklo, Originalna kutija, Zaštitna folija, Zaštitna futrola, Bežični punjač, Dodatni objektivi, Power bank, Slušalice, SIM free, '),
(73, 39, 'Samsung', 'Galaxy S8', 'Samsung Galaxy S8', 0, 2.5, 'Samsung Galaxy S8 za delove. Napukao ekran, slomljena zadnje staklo', 121, NULL, '39_658f18aa50641', '2023-12-29 20:06:18', 0, NULL, NULL, 1, 'Oštećen ekran, Oštećeno kućište, ', 'Punjač, '),
(74, 39, 'Samsung', 'Galaxy S8', 'Samsung Galaxy S8', 0, 2.5, 'Samsung Galaxy S8 za delove. Napukao ekran, slomljena zadnje staklo', NULL, NULL, '39_658f1a478a756', '2023-12-29 20:13:11', 0, NULL, NULL, 1, 'Oštećen ekran, Oštećeno kućište, ', 'Punjač, ');

-- --------------------------------------------------------

--
-- Table structure for table `sacuvani_oglasi`
--

CREATE TABLE `sacuvani_oglasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sacuvani_oglasi`
--

INSERT INTO `sacuvani_oglasi` (`id`, `user_id`, `ad_id`, `created_at`) VALUES
(1, 36, 63, '2023-12-22 11:57:42'),
(4, 38, 61, '2023-12-27 11:18:26'),
(5, 38, 61, '2023-12-27 11:18:39'),
(6, 38, 61, '2023-12-27 11:18:46'),
(8, 38, 58, '2023-12-27 17:40:43'),
(9, 38, 60, '2023-12-27 17:41:01'),
(10, 38, 58, '2023-12-27 17:46:05'),
(1059, 39, 44, '2023-12-29 23:38:32'),
(1060, 39, 57, '2023-12-29 23:38:36'),
(1061, 39, 58, '2023-12-29 23:38:39'),
(1065, 8, 57, '2023-12-29 23:44:19'),
(1066, 8, 44, '2023-12-29 23:44:21'),
(1067, 0, 36, '2023-12-30 19:08:46'),
(1071, 36, 57, '2023-12-30 19:26:54'),
(1072, 8, 59, '2023-12-31 09:25:05'),
(0, 41, 63, '2024-01-01 13:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `member_since` datetime NOT NULL DEFAULT current_timestamp(),
  `verified` int(11) NOT NULL DEFAULT 0,
  `admin` int(11) NOT NULL DEFAULT 0,
  `oauth_uid` varchar(50) DEFAULT NULL,
  `oauth_provider` enum('google','facebook') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `lastname`, `username`, `email`, `password`, `phone`, `city`, `address`, `member_since`, `verified`, `admin`, `oauth_uid`, `oauth_provider`) VALUES
(8, 'Leke', 'Jovanovic', 'leke', 'jaleksa388@gmail.com', NULL, '063347054', 'Vlasotince', 'Mije MIlenkovica 125', '2023-12-29 23:31:49', 1, 0, '103705837406608572515', 'google'),
(36, 'Djordje', 'Ivanovic', 'djordje.ivanovic', 'idjordje63@gmail.com', NULL, '0637303883', 'Aleksandrovac', 'Stara Zeleznicka Kolonija 5a', '2023-12-11 08:14:02', 1, 0, '108049589444437804544', 'google'),
(39, 'Predrag', 'Rajkovic', 'lekeleke', 'lekeofficial06@gmail.com', '$2y$10$WyGx2aTciaUtgJTRjOsSWeGb7ccQ1mq5Nu2BixnY7QIwQ2qf5LtuO', '0648273723', 'Aleksandrovac', 'Blacanska ulica 15/23', '2023-12-29 19:11:17', 1, 0, '103767345196033611752', 'google'),
(41, 'Đorđe', 'Ivanović', 'djokicaa', 'idjordje02@gmail.com', '$2y$10$A.BqWoCE/LgkwEfwjHY3z.xLVvZV4GCvz0T2UcmFLb//CusrS9pGO', '0637303883', 'leskovac', 'Stara Zeleznicka Kolonija 5a', '2023-12-29 23:11:59', 1, 0, '106292482581203059345', 'google');

-- --------------------------------------------------------

--
-- Table structure for table `verifikacioni_kodovi`
--

CREATE TABLE `verifikacioni_kodovi` (
  `code_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `changepw_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verifikacioni_kodovi`
--

INSERT INTO `verifikacioni_kodovi` (`code_id`, `user_id`, `verification_code`, `changepw_code`) VALUES
(1, 8, '123456', '0'),
(12, 32, 'rBkfOJkHRNp3FUr9EB3Wgfl4', NULL),
(13, 33, 'kkyb3P3dEBFHJuFSV5Dla9vj', NULL),
(14, 38, 'tPNWymIKHTkH71m8aNIhRabE', NULL),
(15, 39, 'PpS8vs5uRXpVmZUwBhJEQA42', NULL),
(16, 40, 'lh4DbCYE2rSkdyXFDCHZMiAk', NULL),
(17, 41, 'p0XF0x69v5vsVUWV75nBmDoL', 'Q4xSdPB1uLQEQ4J3lCsiTbch');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visit_id` int(11) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `visit_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
