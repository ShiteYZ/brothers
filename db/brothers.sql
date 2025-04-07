-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 05:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brothers`
--

-- --------------------------------------------------------

--
-- Table structure for table `ada`
--

CREATE TABLE `ada` (
  `ada_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `financial_year` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `lisiti` varchar(1000) NOT NULL,
  `referencenumber` varchar(200) NOT NULL,
  `approval` int(11) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ada`
--

INSERT INTO `ada` (`ada_id`, `user_id`, `amount`, `financial_year`, `month`, `lisiti`, `referencenumber`, `approval`, `remark`, `date`) VALUES
(1, 1, '1000', '2024', 'January', 'HISTORY FOR ORDINARY SECONDARY EDUCATION.pdf', '', 1, 'MALIPO YAMEPOKELEWA', '0000-00-00'),
(2, 2, '1000', '2025', 'January', 'gepgreceipt.pdf', '', 0, 'AMBATANISHA LISITI', '0000-00-00'),
(3, 3, '1000', '2024', 'January', '', '', 0, '', '0000-00-00'),
(4, 4, '1000', '2024', 'January', '', '', 0, '', '0000-00-00'),
(5, 5, '1000', '2024', 'January', '', '', 0, '', '0000-00-00'),
(6, 6, '1000', '2024', 'January', '', '', 0, '', '0000-00-00'),
(7, 1, '1000', '2024', 'February', '', '', 0, '', '0000-00-00'),
(8, 2, '1000', '2024', 'February', '', '', 0, '', '0000-00-00'),
(9, 1, '1000', '2024', 'March', '', '', 0, '', '0000-00-00'),
(10, 2, '1000', '2024', 'March', '', '', 0, '', '0000-00-00'),
(11, 3, '1000', '2024', 'February', '', '', 0, '', '0000-00-00'),
(12, 5, '1000', '2024', 'January', '', '', 0, '', '0000-00-00'),
(13, 1, '1000', '2024', 'April', '', '', 0, '', '0000-00-00'),
(14, 1, '1000', '2023', 'January', '', '', 0, '', '0000-00-00'),
(15, 1, '1000', '2025', 'January', '', '', 0, '', '0000-00-00'),
(16, 1, '1000', '2025', 'February', '', '', 0, '', '0000-00-00'),
(17, 6, '1000', '2025', 'January', '', '', 0, '', '0000-00-00'),
(18, 6, '1000', '2024', 'January', '', '', 0, '', '0000-00-00'),
(19, 1, '1000', '2024', 'June', '', '', 0, '', '0000-00-00'),
(20, 1, '', '2024', 'July', '', '', 0, '', '0000-00-00'),
(21, 1, '9000', '2024', 'August', '', '', 0, '', '0000-00-00'),
(22, 1, '1000', '2024', 'January', '', '', 0, '', '0000-00-00'),
(23, 1, '1000', '2024', 'December', 'Mtaala wa Elimu ya Sekondari Kidato cha I - IV.pdf', '', 0, '', '0000-00-00'),
(24, 2, '1000', '2024', 'December', 'TANGAZO LA AJIRA MPYA 2024-1.pdf', '', 0, '', '2024-12-22'),
(25, 1, '2000', '2024', 'November', 'TAARIFA KWA UMMA FINAL-6_1.pdf', '', 0, '', '2024-12-22'),
(26, 4, '2000', '2024', 'October', 'Mtaala wa Elimu ya Sekondari Kidato cha I - IV.pdf', '', 1, '', '2024-12-22'),
(27, 1, '2000', '2024', 'October', 'TANGAZO LA AJIRA MPYA 2024-1.pdf', '', 0, '', '2024-12-22'),
(28, 1, '3000', '2024', 'October', 'HISTORY FOR ORDINARY SECONDARY EDUCATION.pdf', '', 0, 'Malipo hayajasoma kwenye benk statement, lisit haionekani vizur', '2024-12-22'),
(29, 4, '2000', '2024', 'January', 'Mtaala wa Elimu ya Sekondari Kidato cha I - IV.pdf', '', 1, '', '2024-12-22'),
(30, 1, '2000', '2024', 'June', 'TANGAZO LA AJIRA MPYA 2024-1.pdf', '', 1, 'malipo yamepokelewa Hongera', '2024-12-22'),
(31, 1, '2000', '2024', 'June', 'MKATABA WA KUPANGISHA CHUMBA2.docx', '174651967', 1, 'Malipo yamepokelewa, Asante', '2024-12-22'),
(32, 4, '2000', '2024', 'January', 'TANGAZO LA AJIRA MPYA 2024-1.pdf', '844566243', 1, '', '2024-12-22'),
(33, 1, '2000', '2025', 'January', '20240311401848MABADILIKO  TAREHE ZA  USAILI TCRA.pdf', '1288677176', 0, '', '2025-01-13'),
(34, 2, '2000', '2025', 'March', 'NHIF Benefits package -Zonal & National Referral Level.pdf', '709996438', 1, '', '2025-01-14'),
(35, 1, '2000', '2025', 'March', 'gepgreceipt.pdf', '1605516815', 0, '', '2025-01-23'),
(36, 4, '2000', '2025', 'January', 'MILIKI-KIWANDA-MILIKI-UCHUMI_April-2020.pdf', '2046674687', 1, '', '2025-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'yusuph', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `family_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(100) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `passport` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`family_id`, `user_id`, `names`, `dob`, `contact`, `relation`, `passport`) VALUES
(1, 1, 'JANETH RASHID', '2024-12-05', '0652662718', 'MKE', '20240924_101712.jpg'),
(2, 1, 'KULWA MASOUD SHIJA', '2024-12-01', '0767388245', 'MTOTO', '20240912_103414.jpg'),
(3, 1, 'YUSTA MASOUD', '2024-12-04', '02776628282', 'MZAZI', '20240924_101633.jpg'),
(4, 9, 'KULWA RASHID', '2024-12-12', '07678655778', 'MKE', '20240924_101633.jpg'),
(5, 3, 'GIANNA YUSUPH', '2024-03-16', '07864678885', 'MTOTO', 'ABDALLAH SIMON PASSPORT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `marejesho`
--

CREATE TABLE `marejesho` (
  `rejesho_id` int(11) NOT NULL,
  `mkopo_id` int(11) NOT NULL,
  `jina` varchar(200) NOT NULL,
  `mkopojumla` int(100) NOT NULL,
  `rejesho` int(100) NOT NULL,
  `mkopobaki` int(11) NOT NULL,
  `tarehenextrejesho` date NOT NULL,
  `lisiti` varchar(1000) NOT NULL,
  `maliporeference` varchar(100) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `tarehe` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marejesho`
--

INSERT INTO `marejesho` (`rejesho_id`, `mkopo_id`, `jina`, `mkopojumla`, `rejesho`, `mkopobaki`, `tarehenextrejesho`, `lisiti`, `maliporeference`, `remark`, `tarehe`) VALUES
(1, 1, 'MASOUD SALUM RAMADHANI', 105000, 0, 105000, '0000-00-00', 'CERTIFICATES.pdf', '887685040', 'Zingatia mda wa marejesho', '2025-01-18'),
(2, 1, 'MASOUD SALUM RAMADHANI', 105000, 15000, 90000, '0000-00-00', 'MDA LGAs.pdf', '1387661179', '', '2025-01-20'),
(3, 1, 'MASOUD SALUM RAMADHANI', 90000, 90000, 0, '0000-00-00', 'MDA LGAs.pdf', '143408659', 'ok', '2025-01-20'),
(4, 2, 'MASOUD SALUM RAMADHANI', 1050000, 0, 1050000, '0000-00-00', 'gepgreceipt2.pdf', '1794419201', 'MKOPO AMELIPWA', '2025-01-23'),
(5, 2, 'MASOUD SALUM RAMADHANI', 1050000, 350000, 700000, '0000-00-00', 'January.pdf', '2094736709', 'MAREJESHO YA AWAMU YA KWANZA', '2025-01-23'),
(6, 2, 'MASOUD SALUM RAMADHANI', 700000, 700000, 0, '0000-00-00', 'gepgreceipt2.pdf', '790689723', 'NIIMELIPA YOTE', '2025-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `matukio`
--

CREATE TABLE `matukio` (
  `id` int(11) NOT NULL,
  `tukio` varchar(255) NOT NULL,
  `mwezi` varchar(100) NOT NULL,
  `tarehe_tukio` date NOT NULL,
  `eneo` varchar(200) NOT NULL,
  `tarehe_kutangaza` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matukio`
--

INSERT INTO `matukio` (`id`, `tukio`, `mwezi`, `tarehe_tukio`, `eneo`, `tarehe_kutangaza`, `status`) VALUES
(1, 'KUTEMBELEA WATOTO YATIMA', '', '2024-10-18', 'KITUO CHA MAKULU', '0000-00-00', 1),
(2, 'KIKAO CHA TATU', '', '2024-11-01', 'ROYAL VILLAGE', '0000-00-00', 0),
(3, 'KUTEMBELEA MIRADI', '', '2024-10-21', 'KOTE', '0000-00-00', 0),
(4, 'KIKAO CHA  NNE', '', '2024-10-25', 'DODOMA', '2024-10-17', 0),
(5, 'SAFARI YA DAR ES SALAAM', '', '2024-10-24', 'DAR ES SALAAM', '2024-10-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `nida` varchar(100) NOT NULL,
  `login_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `akaunti_benki` varchar(200) NOT NULL,
  `akaunti2` varchar(200) NOT NULL,
  `previlege` varchar(100) NOT NULL,
  `passport` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `fname`, `mname`, `lname`, `bday`, `gender`, `nida`, `login_name`, `password`, `address`, `contact`, `email`, `akaunti_benki`, `akaunti2`, `previlege`, `passport`) VALUES
(1, 'MASOUD', 'SALUM', 'RAMADHANI', '0000-00-00', '', '', 'MASOUD', '21232f297a57a5a743894a0e4a801fc3', 'IYUMBU', '0756176442', '', 'NMB - 121357678484', '', 'chairperson', ''),
(2, 'MARIAM', 'SALUM', 'RAMADHANI', '0000-00-00', '', '', 'MARIAM', '21232f297a57a5a743894a0e4a801fc3', 'NKONZE', '0656176442', '', 'CRDB - 1J859278291A', '', 'treasurer', ''),
(3, 'YUSUPH', 'ZACHARIA', 'SHITENGE', '0000-00-00', '', '', 'YUSUPH', '21232f297a57a5a743894a0e4a801fc3', 'MAKULU', '0756176442', '', '', '', 'member', ''),
(4, 'MAKOYE', 'MAJUTO', 'KITALENDA', '2024-09-30', 'Female', '1996182881773827', 'Makoye', 'admin', 'MAKOLE', '0756176442', 'makoye@gmail.com', '', '', '', ''),
(5, 'JUDY', 'MAIKO', 'MASELE', '2024-09-05', 'Female', '1996182881773827', 'judy', '21232f297a57a5a743894a0e4a801fc3', 'NKONZE', '0756176442', 'judy@gmail.com', '', '', '', ''),
(6, 'FLAVIANA', 'MATATA', 'KULWA', '2024-09-19', 'Female', '1996378191926', 'flavi', '21232f297a57a5a743894a0e4a801fc3', 'IHUMWA', '0621265632', 'flavina@gmail.com', '', '', 'Member', ''),
(7, 'HUSNA', 'HASSAN', 'MWENDA', '2024-10-10', 'Female', '51626178181916', 'husna', '21232f297a57a5a743894a0e4a801fc3', 'NKONZE', '0756176442', 'makoye@gmail.com', '', '', 'Member', ''),
(8, 'JANABI', 'JANABI', 'JANABI', '2024-12-07', 'Kike', '1888823774884948', '', '8188497a309e05fea7780e0c31799987', 'IYUMBU', '0677738383', 'makoye@gmail.com', 'NMB - 1J7384899303 (YUZU)', 'NMB - 3G838JRJJRJRJ (YUSUPH)', 'Mwanachama', '20240924_101712.jpg'),
(9, 'OWEN', 'OWEN', 'OWEN', '2024-12-05', 'Kike', '1888823774884948', '', '0bc4b7ec7f7aab862588b041f77f4df1', 'MAKOLE', '0756176442', 'judy@gmail.com', 'NMB - 1J7384899303 (YUZU)', 'NMB - 3G838JRJJRJRJ (YUSUPH)', 'Mwanachama', '20240912_103412.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mfukomaendeleo`
--

CREATE TABLE `mfukomaendeleo` (
  `mchango_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `financial_year` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `lisiti` varchar(1000) NOT NULL,
  `referencenumber` varchar(200) NOT NULL,
  `approval` int(11) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mfukomaendeleo`
--

INSERT INTO `mfukomaendeleo` (`mchango_id`, `user_id`, `amount`, `financial_year`, `month`, `lisiti`, `referencenumber`, `approval`, `remark`, `date`) VALUES
(1, 1, '2000', '2025', 'January', 'MILIKI-KIWANDA-MILIKI-UCHUMI_April-2020.pdf', '1056691028', 1, '', '2025-01-13'),
(2, 1, '2000', '2025', 'January', 'BMH-PHONE EXTENSION.pdf', '1408022399', 1, 'Malipo yamepokelewa', '2025-01-13'),
(3, 1, '2000', '2025', 'February', 'PRINT TIME_ 2024_12_17_13_19_29_241217_132001.pdf', '798771681', 1, '', '2025-01-14'),
(4, 2, '2000', '2025', 'March', 'NHIF Benefits package -Zonal & National Referral Level.pdf', '230019133', 1, '', '2025-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `miradi`
--

CREATE TABLE `miradi` (
  `id` int(11) NOT NULL,
  `jina` varchar(200) NOT NULL,
  `eneo` varchar(100) NOT NULL,
  `thamani` varchar(100) NOT NULL,
  `picha` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `miradi`
--

INSERT INTO `miradi` (`id`, `jina`, `eneo`, `thamani`, `picha`) VALUES
(1, 'UFUGAJI WA KUKU WA NYAMA', 'VIKONJE', 'MILIONI KUMI', 'ufugaji.jpg'),
(2, 'KILIMO CHA MAINDI', 'KONDOA', 'MILION TANO', 'kilimo.jpg'),
(3, 'KILIMO CHA NDIZI ', 'OMBORO', 'MILIONI MBILI', 'kilimo2.jpg'),
(4, 'BIASHARA - VITUNGUU', 'DODOMA - SOKONI', 'MILIONI KUMI', 'biashara.jpg'),
(5, 'UUZAJI WA VIWANJA', 'DODOMA', 'MILIONI 50', 'viwanja.jpg'),
(6, 'KIWANDA CHA WINE', 'OMBOLO', 'MILION MIA TANO', 'ufugaji.jpg'),
(7, 'MASOUD SALUM RAMADHANI', 'NMB - 121357678484', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mkopo`
--

CREATE TABLE `mkopo` (
  `mkopo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jina` varchar(200) NOT NULL,
  `kiasi_mkopo` varchar(100) NOT NULL,
  `riba` varchar(100) NOT NULL,
  `marejesho` varchar(100) NOT NULL,
  `tarehe_kuchukua` date NOT NULL,
  `tarehe_kurudisha` varchar(100) NOT NULL,
  `dhumuni` varchar(255) NOT NULL,
  `benki` varchar(100) NOT NULL,
  `sahihi_mwenyekiti` int(11) NOT NULL,
  `sahihi_katibu` int(11) NOT NULL,
  `sahihi_hazina` int(11) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `hali_malipo` int(11) NOT NULL,
  `tarehe` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mkopo`
--

INSERT INTO `mkopo` (`mkopo_id`, `user_id`, `jina`, `kiasi_mkopo`, `riba`, `marejesho`, `tarehe_kuchukua`, `tarehe_kurudisha`, `dhumuni`, `benki`, `sahihi_mwenyekiti`, `sahihi_katibu`, `sahihi_hazina`, `remark`, `hali_malipo`, `tarehe`) VALUES
(1, 1, 'MASOUD SALUM RAMADHANI', '100000', '5000', '105000', '2024-10-25', '0000-00-00', 'KUFUNGUA BIASHARA', 'NMB - 121357678484', 1, 1, 1, 'ok', 2, '2024-10-23'),
(2, 1, 'MASOUD SALUM RAMADHANI', '1000000', '50000', '1050000', '2024-10-25', '1/25/2025', 'KUFUNGUA BIASHARA', 'NMB - 121357678484', 1, 1, 1, 'ok', 2, '2024-10-23'),
(3, 1, 'MASOUD SALUM RAMADHANI', '1000000', '50000', '1050000', '2025-01-15', '4/15/2025', 'KUFUNGUA BIASHARA', 'NMB - 121357678484', 1, 0, 0, 'ok', 0, '2025-01-14'),
(4, 1, 'MASOUD SALUM RAMADHANI', '100000', '5000', '105000', '2025-01-25', '4/25/2025', 'ADA YA SHULE', 'NMB - 121357678484', 1, 0, 0, 'APEWE KAMA ALIVYOOMBA', 0, '2025-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `nukuuyavikao`
--

CREATE TABLE `nukuuyavikao` (
  `nukuu_id` int(11) NOT NULL,
  `tukio_id` int(11) NOT NULL,
  `tukio` varchar(200) NOT NULL,
  `mahudhurio` varchar(300) NOT NULL,
  `muhutasari` varchar(1000) NOT NULL,
  `matumizi` varchar(100) NOT NULL,
  `nukuuMatumizi` varchar(300) NOT NULL,
  `ambatanisho` varchar(1000) NOT NULL,
  `tarehe` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nukuuyavikao`
--

INSERT INTO `nukuuyavikao` (`nukuu_id`, `tukio_id`, `tukio`, `mahudhurio`, `muhutasari`, `matumizi`, `nukuuMatumizi`, `ambatanisho`, `tarehe`) VALUES
(1, 5, 'SAFARI YA DAR ES SALAAM', 'MASOUD SALUM RAMADHANI,YUSUPH ZACHARIA SHITENGE,JUDY MAIKO MASELE,HUSNA HASSAN MWENDA', 'KIKAO CHA KUMI,\r\nWAJUMBE WOTE WALILIDHIA NA KUAFIKI KUWA\r\n1. MJUMBE ATOKE\r\n2. ADHABU ITOLOEW\r\nKATIKA YOTR TUNAMSHUKURU MUNGU', '10000', '', '20240311401848MABADILIKO  TAREHE ZA  USAILI TCRA.pdf', '2025-02-02'),
(2, 1, 'KUTEMBELEA WATOTO YATIMA', 'MASOUD SALUM RAMADHANI,YUSUPH ZACHARIA SHITENGE', 'AJENDA\r\nSAFARI ENDELEVU,\r\nMKOA WA DODOMA,', '1000', 'TUMELIPA WAFANYAKAZI', 'BMH-PHONE EXTENSION.pdf', '2025-02-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ada`
--
ALTER TABLE `ada`
  ADD PRIMARY KEY (`ada_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`family_id`);

--
-- Indexes for table `marejesho`
--
ALTER TABLE `marejesho`
  ADD PRIMARY KEY (`rejesho_id`);

--
-- Indexes for table `matukio`
--
ALTER TABLE `matukio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `mfukomaendeleo`
--
ALTER TABLE `mfukomaendeleo`
  ADD PRIMARY KEY (`mchango_id`);

--
-- Indexes for table `miradi`
--
ALTER TABLE `miradi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mkopo`
--
ALTER TABLE `mkopo`
  ADD PRIMARY KEY (`mkopo_id`);

--
-- Indexes for table `nukuuyavikao`
--
ALTER TABLE `nukuuyavikao`
  ADD PRIMARY KEY (`nukuu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ada`
--
ALTER TABLE `ada`
  MODIFY `ada_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `family_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marejesho`
--
ALTER TABLE `marejesho`
  MODIFY `rejesho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `matukio`
--
ALTER TABLE `matukio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mfukomaendeleo`
--
ALTER TABLE `mfukomaendeleo`
  MODIFY `mchango_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `miradi`
--
ALTER TABLE `miradi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mkopo`
--
ALTER TABLE `mkopo`
  MODIFY `mkopo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nukuuyavikao`
--
ALTER TABLE `nukuuyavikao`
  MODIFY `nukuu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
