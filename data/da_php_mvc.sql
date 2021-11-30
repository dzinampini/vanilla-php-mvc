-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 05:27 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `da_php_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `question_number` varchar(11) NOT NULL,
  `guest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `question`, `answer`, `question_number`, `guest_id`) VALUES
(99, 'This is the third question', 'dfdf', '1', 276247),
(100, 'This is the fourth question', 'dfdf', '1', 392703),
(101, 'This is the first question', 'nhbn', '1', 788902),
(103, 'This is the third question', 'fghfgh', '1', 788902),
(104, 'This is the fourth question', 'sdfsdfsf', '1', 244956),
(105, 'This is the second question', 'dfsdf', '1', 761224),
(106, 'This is the third question', 'sdfsdf', '1', 761224),
(107, 'This is the first question', 'hghg', '1', 801337),
(108, 'This is the second question', 'hgh', '1', 801337),
(109, 'This is the third question', 'bghgh', '1', 801337),
(110, 'This is the fourth question', 'bhghghg', '1', 801337),
(111, 'This is the fifth question', 'gffgf', '1', 801337),
(112, 'This is the first question', 'fgdfg', '1', 811130),
(113, 'This is the second question', 'dfgdfg', '1', 811130),
(114, 'This is the third question', 'dfgdg', '1', 811130),
(115, 'This is the fourth question', 'dfgdfg', '1', 811130),
(116, 'This is the fifth question', 'dfgdgdg', '1', 811130),
(117, 'This is the second question', 'dgvcv', '1', 766210),
(118, 'This is the first question', 'dbcvb', '1', 402709),
(119, 'This is the second question', 'cbcb', '1', 402709),
(120, 'This is the third question', 'cvbcb', '1', 402709),
(121, 'This is the fourth question', 'cbcb', '1', 402709),
(122, 'This is the fifth question', 'cbcb', '1', 402709),
(123, 'This is the first question', 'dfdfdf', '1', 881656),
(124, 'This is the second question', 'dfdf', '1', 881656),
(125, 'This is the third question', 'dfdf', '1', 881656),
(126, 'This is the fourth question', 'dfdf', '1', 881656),
(127, 'This is the fifth question', 'dfdf', '1', 881656);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `surname`) VALUES
(1, 'victor@victor.com', 'password', 'victor', 'robles'),
(2, 'juan@juan.com', 'password', 'juan', 'lopez'),
(4, 'dadfa', '60f796a446e6577892b3cb1886d2a29e4c41226e', 'Antonio', 'Jose'),
(5, 'tgghhdfdfdffdfdsfsddfgg', '50057f95109f681331435a0ed1f01ae0ef8cf688', '400626', 'This is the first question'),
(6, 'tgghhdfdfdffdfdsfsddfgg', '0b628f42bdcda059a482571bce13fca8edda2a60', '912051', 'This is the first question'),
(7, 'tgghhdfdfdffdfdsfsddfgg', '0b628f42bdcda059a482571bce13fca8edda2a60', '912051', 'This is the first question'),
(8, 'answer', '1fece26aba6d4e6575fb276c0bbcf6ede52570d8', '258129', 'This is the first question'),
(9, 'answer2', '635b05bf05f01877dd17546488f420ade85cda4d', '305607', 'This is the first question'),
(10, 'answer2', '635b05bf05f01877dd17546488f420ade85cda4d', '305607', 'This is the first question'),
(11, 'answer2', '24bbd259ba2a25b352ee1a1e5c2bbd1ce3e39560', '369809', 'This is the first question'),
(12, 'answer2', '24bbd259ba2a25b352ee1a1e5c2bbd1ce3e39560', '369809', 'This is the first question'),
(13, 'answer2', '683176fcc3bb61cf26fc09743b80e9c5e868d22c', '822734', 'This is the first question'),
(14, 'answer2', 'e93153da6e259666b9c19f3d4c737418900a690b', '103388', 'This is the first question'),
(15, 'answer2', 'e12a6c6e7583c0637e79afde61c68e033cbcb1f8', '313138', 'This is the first question'),
(16, 'answer2', 'e12a6c6e7583c0637e79afde61c68e033cbcb1f8', '313138', 'This is the first question'),
(17, 'answer2', 'e12a6c6e7583c0637e79afde61c68e033cbcb1f8', '313138', 'This is the first question'),
(18, 'answer2', 'bf16c7d09c4ec99cc13ccabba0b8932e8900ed28', '693881', 'This is the first question'),
(19, 'dfdf', '834e23328bed1ba7279b2a51e677b26cb8884eac', '373293', 'This is the first question'),
(20, '3', 'f855a7192d827088e154cd55ba46dcb139845b1c', '502960', 'This is the first question'),
(21, '', 'b74ee261e8d53d6b075b8a67442806e2b0b184bf', '407516', 'This is the third question'),
(22, 'vcv', 'b74ee261e8d53d6b075b8a67442806e2b0b184bf', '407516', 'This is the third question'),
(23, 'vc', 'b74ee261e8d53d6b075b8a67442806e2b0b184bf', '407516', 'This is the third question'),
(24, '4', '8ee7adf3ff93f5c5c799d6ef365b12dd42fe8bbb', '439635', 'This is the third question'),
(25, '5', '8ee7adf3ff93f5c5c799d6ef365b12dd42fe8bbb', '439635', 'This is the third question'),
(26, '5', '8ee7adf3ff93f5c5c799d6ef365b12dd42fe8bbb', '439635', 'This is the fourth question'),
(27, '5', '8ee7adf3ff93f5c5c799d6ef365b12dd42fe8bbb', '439635', 'This is the fifth question'),
(28, 'fgfg', '8ee7adf3ff93f5c5c799d6ef365b12dd42fe8bbb', '439635', 'This is the second question'),
(29, 'dfg', '8ee7adf3ff93f5c5c799d6ef365b12dd42fe8bbb', '439635', 'This is the second question'),
(30, '34', '56f5fd92829d85eb07f642e162c733b06a794616', '415983', 'This is the first question'),
(31, '34', '56f5fd92829d85eb07f642e162c733b06a794616', '415983', 'This is the first question'),
(32, 'tytyty', 'f72f7aa6cc55eb4929c07e851bbb5f8dbe43dad1', '408943', 'This is the first question'),
(33, 'vcv', 'dece76d339ba2cef12dc7046334b8961905be055', '309196', 'This is the first question'),
(34, 'cvcv', 'dece76d339ba2cef12dc7046334b8961905be055', '309196', 'This is the second question'),
(35, 'cvcv', 'dece76d339ba2cef12dc7046334b8961905be055', '309196', 'This is the third question'),
(36, 'cxc', 'ca1d60cfd6cc09d15a8eb848e076b4cd6288112c', '314877', 'This is the fourth question'),
(37, 'fvbvb', '5eeca9cfbddc1708362f6297757e2f84eae8f331', '721625', 'This is the fifth question'),
(38, 'vbvb', '5eeca9cfbddc1708362f6297757e2f84eae8f331', '721625', 'This is the second question'),
(39, '', 'ab3995d0f55463b3c68ca425f8a2594735beff90', '104184', 'This is the second question'),
(40, 'fg', '89561dbf7294aa4f42189019b4ebe76e97570a4e', '794863', 'This is the first question'),
(41, 'dfg', '89561dbf7294aa4f42189019b4ebe76e97570a4e', '794863', 'This is the second question'),
(42, 'dfgdf', '89561dbf7294aa4f42189019b4ebe76e97570a4e', '794863', 'This is the third question'),
(43, 'dfgdfg', '89561dbf7294aa4f42189019b4ebe76e97570a4e', '794863', 'This is the fourth question'),
(44, 'dfgdfg', '89561dbf7294aa4f42189019b4ebe76e97570a4e', '794863', 'This is the fifth question'),
(45, 'dfgdfg', 'a72836cac9c7919cd9555e902ead520bddccb856', '460232', 'This is the second question');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
