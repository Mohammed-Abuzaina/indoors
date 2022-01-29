-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2022 at 11:53 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `study-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'abuzaina', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `student_id` int NOT NULL,
  `subject` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `cart_ibfk_2` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=209435387 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `teacher_id`, `teacher_name`, `student_id`, `subject`) VALUES
(209435377, 38, 'ali', 20, 'Dolores consequatur'),
(209435378, 39, 'gogimuwiku', 20, 'Ea ullam sint quisqu'),
(209435379, 42, 'xuhem', 22, 'Amet minim providen'),
(209435380, 42, 'xuhem', 20, 'Amet minim providen'),
(209435381, 43, 'fedynit', 20, 'Science'),
(209435382, 41, 'wmox', 20, 'Debitis enim suscipi'),
(209435383, 40, 'wosabimox', 20, 'Debitis enim suscipi'),
(209435385, 43, 'fedynit', 20, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `rated`
--

DROP TABLE IF EXISTS `rated`;
CREATE TABLE IF NOT EXISTS `rated` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `number_ratings_ibfk_1` (`teacher_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rated`
--

INSERT INTO `rated` (`id`, `student_id`, `teacher_id`) VALUES
(339, 20, 42),
(340, 20, 38),
(341, 20, 43);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int NOT NULL,
  `university` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `password`, `email`, `phone_number`, `university`, `major`, `img`) VALUES
(20, 'Ahmed', 'Pa$$w0rd!', 'jacub@mailinator.com', 1, 'Quod obcaecati iusto', 'Et ducimus sed aspe', '219983.png'),
(21, 'Motaz', 'Pa$$w0rd!', 'hidat@mailinator.com', 1, 'Dolore ratione in es', 'Magni minus in in im', '219983.png'),
(22, 'Leen', 'Pa$$w0rd!', 'fikagaj@mailinator.com', 1, 'Voluptas et quibusda', 'Est esse velit nulla', '219983.png'),
(23, 'Amin', 'Pa$$w0rd!', 'xojex@mailinator.com', 1, 'Ea sed nisi ut molli', 'Dicta voluptatem vo', '219983.png'),
(24, 'ayham', 'A12345', 'ayham@gmail.com', 776806141, 'harford ', 'ph se', '219983.png'),
(25, 'Sa\'ad', 'Pa$$w0rd!', 'gujyxodyqa@mailinator.com', 1, 'Minus ab reiciendis ', 'Odio similique ut no', '219983.png'),
(26, 'Asma', 'Pa$$w0rd!', 'qavu@mailinator.com', 1, 'Voluptas qui sequi d', 'Error ut elit quo e', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int NOT NULL,
  `university` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `subject_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subject_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rating` float NOT NULL,
  `raters` int NOT NULL,
  `enrolls` int NOT NULL,
  `student_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `username`, `email`, `password`, `phone_number`, `university`, `price`, `major`, `img`, `subject_1`, `subject_2`, `rating`, `raters`, `enrolls`, `student_id`) VALUES
(38, 'ali', 'zudydewuc@mailinator.com', 'Pa$$w0rd!', 888, 'Minim elit laborum', '215', 'Reiciendis earum sun', '219983.png', 'fafaf', 'Voluptates eius dist', 0.15, 20, 2, 0),
(39, 'Waheed', 'cezykamak@mailinator.com', 'Pa$$w0rd!', 1, 'Eos ipsa dolor ipsu', '100', 'Excepteur esse solut', '219983.png', 'Ea ullam sint quisqu', 'Ab voluptas dolore e', 0.5, 2, 10, 0),
(40, 'Haneen', 'cume@mailinator.com', 'Pa$$w0rd!', 1, 'Corrupti qui culpa ', '75', 'Voluptatem earum ex', '219983.png', 'Debitis enim suscipi', 'Accusantium eos ips', 0.06, 50, 9, 0),
(41, 'Wla\'a', 'cume@mailinator.com', 'Pa$$w0rd!', 1, 'Corrupti qui culpa ', '55', 'Voluptatem earum ex', '219983.png', 'Debitis enim suscipi', 'Accusantium eos ips', 0.069, 53, 11, 0),
(42, 'Amal', 'xyny@mailinator.com', 'Pa$$w0rd!', 1, 'Amet Nam explicabo', '20', 'Minima ea nostrum se', '219983.png', 'Amet minim providen', '', 1.5, 2, 2, 0),
(43, 'Khaled', 'rinyga@mailinator.com', 'Pa$$w0rd!', 1, 'Laborum Ex pariatur', '89', 'Illo esse repellendu', '219983.png', 'Science', '', 1.5, 2, 3, 0),
(44, 'zojazalaly', 'napelyqu@mailinator.com', 'Pa$$w0rd!', 1, 'Ea eiusmod exercitat', '', 'Aspernatur magna pro', '219983.png', '', '', 0, 0, 0, 0),
(45, 'Asuid', 'tyfunew@mailinator.com', 'Pa$$w0rd!', 1, 'Natus omnis atque li', '', 'Cupiditate aliquid i', '219983.png', 'Enim ut accusantium ', '', 0, 0, 0, 0),
(46, 'Lian', 'derygaso@mailinator.com', 'Pa$$w0rd!', 1, 'Similique vel velit ', '31', 'Optio libero accusa', '219983.png', 'Aperiam voluptatem v', '', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int NOT NULL AUTO_INCREMENT,
  `video_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `video_url`, `description`, `subject`, `teacher_id`) VALUES
(111, 'video_61e3398a87b694.60559412.mp4', 'hello', 'Dolores consequatur', 38),
(112, 'video_61e339912624c2.50790743.mp4', 'hello', 'Dolores consequatur', 38),
(113, 'video_61e33997eaa8d6.65132105.mp4', 'f', 'Voluptates eius dist', 38),
(116, 'video_61ec925e618776.18434125.mp4', 'fdsafafsafsadfadsf', 'Amet minim providen', 42),
(117, 'video_61ec9266682d58.28882901.mp4', 'fasfasfaf', 'Amet minim providen', 42),
(118, 'video_61ec9c7c2fd2c6.76330325.mp4', 'hello', 'Amet minim providen', 42),
(119, 'video_61ee76b0e7c814.31843114.mp4', 'Brain', 'Magnam dolor aperiam', 43),
(120, 'video_61ee76bf5dab38.74562001.mp4', 'Candle-light', 'Magnam dolor aperiam', 43),
(121, 'video_61ee76cc0a2ca7.60166538.mp4', 'letters', 'Magnam dolor aperiam', 43),
(122, 'video_61eff4a8b1f3f2.54675757.mp4', 'hello', 'fafaf', 38);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rated`
--
ALTER TABLE `rated`
  ADD CONSTRAINT `rated_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rated_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
