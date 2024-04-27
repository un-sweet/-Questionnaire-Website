-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2023 at 08:53 AM
-- Server version: 8.0.18-9
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `donation` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `habit` text NOT NULL,
  `reason` text NOT NULL,
  `education` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`donation`, `income`, `habit`, `reason`, `education`, `timestamp`) VALUES
(940, 1057, 'Yes', '1057', ' Elementary school (incomplete/graduated)', '2023-07-13 01:59:37'),
(710, 1057, 'Yes', 'Supporting their daily living expenses', 'Junior high school (incomplete/graduated)', '2023-07-13 01:59:37'),
(280, 426, 'Yes', 'Nurturing street performers\' dreams (e.g., talent enhancement)', 'Junior high school (incomplete/graduated)', '2023-07-13 02:01:19'),
(860, 1106, 'Yes', ' I haven\'t made any donations', 'Junior high school (incomplete/graduated)', '2023-07-13 02:06:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
