-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 04:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcqbes`
--

-- --------------------------------------------------------

--
-- Table structure for table `entrance`
--

CREATE TABLE `entrance` (
  `eid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `totalquestion` int(11) NOT NULL,
  `passmarks` int(11) NOT NULL,
  `description` varchar(150) NOT NULL DEFAULT '4 Options for a question'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entrance`
--

INSERT INTO `entrance` (`eid`, `name`, `totalquestion`, `passmarks`, `description`) VALUES
(1, 'BCA', 10, 0, '4 Options for a question'),
(2, 'MBBS', 100, 40, '4 Options for a question'),
(3, 'CMAT', 100, 45, '4 Options for a question'),
(5, 'Numerical Method', 10, 0, 'Numerical Method Questions'),
(6, 'Math', 10, 0, 'MATH QUESTIONS');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `examid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `marks` int(11) NOT NULL DEFAULT 0,
  `examdate` datetime NOT NULL DEFAULT current_timestamp(),
  `attempts` int(11) NOT NULL DEFAULT 0,
  `entrance_name` varchar(100) NOT NULL DEFAULT 'General Test',
  `totalquestion` int(3) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examid`, `eid`, `userid`, `marks`, `examdate`, `attempts`, `entrance_name`, `totalquestion`) VALUES
(1, 1, 2, 7, '2022-08-04 07:52:27', 9, 'BCA', 10),
(2, 2, 2, 5, '2022-08-04 08:01:25', 10, 'MBBS', 10);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `userfeedback` varchar(1500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `username`, `userfeedback`) VALUES
(18, 'Rabin', 'Hello'),
(19, 'Sanchita', 'Hello there was error in privacy page'),
(20, 'Sanchita', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `usertype` varchar(10) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`userid`, `username`, `email`, `password`, `cpassword`, `usertype`) VALUES
(2, 'Rabin', 'rabin@gmail.com', 'rabin@mcqbes', 'rabin@mcqbes', 'student'),
(5, 'Sanchita', 'Sanchita234@gmail.com', 'sanchita@mcqbes', 'sanchita@mcqbes', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `rid` int(100) NOT NULL,
  `examid` int(100) NOT NULL,
  `id` int(11) NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`rid`, `examid`, `id`, `score`) VALUES
(1, 1, 113, 0),
(2, 1, 74, 0),
(3, 1, 72, 1),
(4, 1, 44, 1),
(5, 1, 53, 1),
(6, 1, 78, 1),
(7, 1, 76, 1),
(8, 1, 125, 1),
(9, 1, 110, 1),
(10, 2, 118, 0),
(11, 2, 88, 0),
(12, 2, 102, 0),
(13, 2, 85, 1),
(14, 2, 107, 1),
(15, 2, 86, 0),
(16, 2, 106, 1),
(17, 2, 92, 1),
(18, 2, 115, 1),
(19, 2, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `option1` varchar(300) NOT NULL,
  `option2` varchar(300) NOT NULL,
  `option3` varchar(300) NOT NULL,
  `option4` varchar(300) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `eid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `eid`) VALUES
(3, 'what is result of echo(\"1\"*\"2\");', '12', '1 3', '11', '22', '12', 1),
(44, 'What is the correct JavaScript synatx to write \"Hello\" World? ', 'pritnln(\"Hello World\")', 'document.write(\"Hello world\")', 'response.write(\"Hello World\")', 'document.write(\"Hello World\");', 'document.write(\"Hello World\");', 1),
(46, 'which Key is uesd to link two tables in MYSQL?', 'Primary Key', 'Foreign Key', 'Both a) and b)', 'None of the metioned', 'Both a) and b)', 1),
(47, 'Which is the correct sytanx of php?', '<?php>', '<php>', '?php?', '<?php ?>', '<?php ?>', 1),
(49, 'Which of Them is no the looping Structures in JavaScript?', 'for ', 'while', 'forwhich', 'dowhile', 'forwhich', 1),
(50, 'Var a=10; var b=0; documnet.write(a/b); What is the output?', 'Nothing', '0', 'Infinity', 'Some garbage Value', 'Infinity', 1),
(51, 'Full of PHP is', 'Hypertext Preprocessor', 'Hypertext Multiprocessor', 'Hypertext Markup Language', 'Hypertune Preprocessor', 'Hypertext Preprocessor', 1),
(52, 'Why Should we use functions?', 'Reusability', 'Easier Error Detection', 'Easily Mainttained', 'All of the above', 'All of the above', 1),
(53, 'How many types of array are there in PHP?', '1', '2', '3', '4', '3', 1),
(54, 'What is WordPress?', 'FrameWork', 'CMS', 'Programming Langugae', 'Operating System', 'CMS', 1),
(55, 'What Does OOP stand for?', 'Object Over Passage', 'Object Oriented Passage', 'Object Object Programming', 'Object Oreinted Programming', 'Object Oreinted Programming', 1),
(56, 'MVC Stands for', 'Media View Content', 'Model View Controller', 'Most Viewed Content', 'Media Video Content', 'Model View Controller', 1),
(57, 'CMS stands for', 'Content Management System', 'Content Migration System ', 'Copyright Mainteinance System', 'Code Management System', 'Content Management System', 1),
(58, 'if A={a,b,c,d} no of proper subset is', '15', '31', '16', '32', '32', 3),
(59, 'In a group of 130 people, 80 people like football, 20 people like both football and cricket.How many like cricket and not football?', '50', '40', '30', '15', '50', 3),
(60, 'Where is the headquarter of UNESCO?', 'New York', 'New Delhi', 'Nairobi', 'Paris', 'Paris', 3),
(61, 'The longest river in the world is', 'Indus', 'Nile', 'Ganga', 'Amazon', 'Amazon', 3),
(62, 'The simplest interest on Rs 600 at 6% for six months is', 'Rs 218 ', ' Rs 21.80  ', 'Rs 36', ' Rs 18', ' Rs 18', 3),
(63, 'If 8x + 4 = 32, then 2x ? 1 = ?', '9', '8', '6', '5', '6', 3),
(64, 'The average of x and y is 40. If z = 10, what is the average of x, y and z?', '30', '20', '25', '16.6', '30', 3),
(65, 'Which of the following numbers is divisible by 12 but not by 8?', '72', '88', '108', '120', '108', 3),
(66, '60 is 80% of which number?', '72', '60', '75', '80', '75', 3),
(67, 'If 6 is 24% of a number, what is 40% of the same number?', '8', '10', '15', '20', '10', 3),
(68, 'A vendor bought toffees at 6 for a rupee. How many for a rupee must he sell to gain 20%?', '3', '4', '5', '6', '5', 3),
(69, 'Which of the following number is a perfect square?', '7744', '7755', '7766', '7799', '7744', 3),
(70, 'Bulls and bears are the terms associated with', 'Parliamentary affairs', 'Stock exchange', 'Bull fights', 'Racing', 'Stock exchange', 3),
(71, 'If A is  a square matrix then A+A^T is a ', 'diagonal; matrix', 'scalar matrix', 'symmetric matrix', 'Skew-symmetric matrix', 'symmetric matrix', 3),
(72, 'Where is the headquarter of UNESCO?', 'New York', 'New Delhi', 'Nairobi', 'Paris', 'Paris', 1),
(73, 'The longest river in the world is', 'Indus', 'Nile', 'Ganga', 'Amazon', 'Amazon', 1),
(74, 'The simplest interest on Rs 600 at 6% for six months is', 'Rs 218 ', ' Rs 21.80  ', 'Rs 36', ' Rs 18', ' Rs 18', 1),
(75, 'If 8x + 4 = 32, then 2x ? 1 = ?', '9', '8', '6', '5', '6', 1),
(76, 'The average of x and y is 40. If z = 10, what is the average of x, y and z?', '30', '20', '25', '16.6', '30', 1),
(77, 'Which of the following numbers is divisible by 12 but not by 8?', '72', '88', '108', '120', '108', 1),
(78, '60 is 80% of which number?', '72', '60', '75', '80', '75', 1),
(79, 'If 6 is 24% of a number, what is 40% of the same number?', '8', '10', '15', '20', '10', 1),
(80, 'A vendor bought toffees at 6 for a rupee. How many for a rupee must he sell to gain 20%?', '3', '4', '5', '6', '5', 1),
(81, 'Which of the following number is a perfect square?', '7744', '7755', '7766', '7799', '7744', 1),
(82, 'Bulls and bears are the terms associated with', 'Parliamentary affairs', 'Stock exchange', 'Bull fights', 'Racing', 'Stock exchange', 1),
(83, 'If A is  a square matrix then A+A^T is a ', 'diagonal; matrix', 'scalar matrix', 'symmetric matrix', 'Skew-symmetric matrix', 'symmetric matrix', 1),
(85, 'Where is the headquarter of UNESCO?', 'New York', 'New Delhi', 'Nairobi', 'Paris', 'Paris', 2),
(86, 'The longest river in the world is', 'Indus', 'Nile', 'Ganga', 'Amazon', 'Amazon', 2),
(87, 'The simplest interest on Rs 600 at 6% for six months is', 'Rs 218 ', ' Rs 21.80  ', 'Rs 36', ' Rs 18', ' Rs 18', 2),
(88, 'If 8x + 4 = 32, then 2x ? 1 = ?', '9', '8', '6', '5', '6', 2),
(89, 'The average of x and y is 40. If z = 10, what is the average of x, y and z?', '30', '20', '25', '16.6', '30', 2),
(90, 'Which of the following numbers is divisible by 12 but not by 8?', '72', '88', '108', '120', '108', 2),
(91, '60 is 80% of which number?', '72', '60', '75', '80', '75', 2),
(92, 'If 6 is 24% of a number, what is 40% of the same number?', '8', '10', '15', '20', '10', 2),
(93, 'A vendor bought toffees at 6 for a rupee. How many for a rupee must he sell to gain 20%?', '3', '4', '5', '6', '5', 2),
(94, 'Which of the following number is a perfect square?', '7744', '7755', '7766', '7799', '7744', 2),
(95, 'Bulls and bears are the terms associated with', 'Parliamentary affairs', 'Stock exchange', 'Bull fights', 'Racing', 'Stock exchange', 2),
(96, 'If A is  a square matrix then A+A^T is a ', 'diagonal; matrix', 'scalar matrix', 'symmetric matrix', 'Skew-symmetric matrix', 'symmetric matrix', 2),
(97, 'Where is the headquarter of UNESCO?', 'New York', 'New Delhi', 'Nairobi', 'Paris', 'Paris', 2),
(98, 'The longest river in the world is', 'Indus', 'Nile', 'Ganga', 'Amazon', 'Amazon', 2),
(99, 'The simplest interest on Rs 600 at 6% for six months is', 'Rs 218 ', ' Rs 21.80  ', 'Rs 36', ' Rs 18', ' Rs 18', 2),
(100, 'If 8x + 4 = 32, then 2x ? 1 = ?', '9', '8', '6', '5', '6', 2),
(101, 'The average of x and y is 40. If z = 10, what is the average of x, y and z?', '30', '20', '25', '16.6', '30', 2),
(102, 'Which of the following numbers is divisible by 12 but not by 8?', '72', '88', '108', '120', '108', 2),
(103, '60 is 80% of which number?', '72', '60', '75', '80', '75', 2),
(104, 'If 6 is 24% of a number, what is 40% of the same number?', '8', '10', '15', '20', '10', 2),
(105, 'A vendor bought toffees at 6 for a rupee. How many for a rupee must he sell to gain 20%?', '3', '4', '5', '6', '5', 2),
(106, 'Which of the following number is a perfect square?', '7744', '7755', '7766', '7799', '7744', 2),
(107, 'Bulls and bears are the terms associated with', 'Parliamentary affairs', 'Stock exchange', 'Bull fights', 'Racing', 'Stock exchange', 2),
(108, 'If A is  a square matrix then A+A^T is a ', 'diagonal; matrix', 'scalar matrix', 'symmetric matrix', 'Skew-symmetric matrix', 'symmetric matrix', 2),
(109, 'question', 'option1', 'option2', 'option3', 'option4', 'answer', 0),
(110, '100!/( 98! * 2! )', '9900', '4950', '3300', '2475', '4950', 1),
(111, '(11!-10!)/10', '10', '10!', '11', '11!', '10!', 1),
(112, 'In how many ways 7 letters be posted in 3 letter boxes?', '3^7', '21', '7^3', '42', '3^7', 1),
(113, 'The number of ways the letters of the word ELMENT be arranged?', '420', '840', '210', '1680', '840', 1),
(114, 'The number of ways six different beads be arranged in a round neckalce?', '120', '60', '30', '15', '60', 1),
(115, '100!/( 98! * 2! )', '9900', '4950', '3300', '2475', '4950', 2),
(116, '(11!-10!)/10', '10', '10!', '11', '11!', '10!', 2),
(117, 'In how many ways 7 letters be posted in 3 letter boxes?', '3^7', '21', '7^3', '42', '3^7', 2),
(118, 'The number of ways the letters of the word ELMENT be arranged?', '420', '840', '210', '1680', '840', 2),
(119, 'The number of ways six different beads be arranged in a round neckalce?', '120', '60', '30', '15', '60', 2),
(120, '100!/( 98! * 2! )', '9900', '4950', '3300', '2475', '4950', 3),
(121, '(11!-10!)/10', '10', '10!', '11', '11!', '10!', 3),
(122, 'In how many ways 7 letters be posted in 3 letter boxes?', '3^7', '21', '7^3', '42', '3^7', 3),
(123, 'The number of ways the letters of the word ELMENT be arranged?', '420', '840', '210', '1680', '840', 3),
(124, 'The number of ways six different beads be arranged in a round neckalce?', '120', '60', '30', '15', '60', 3),
(125, 'Match the following: where a=4 b=3', 'a-b=5\na+b=7', 'a-b=1\na+b=7', 'a-b= -1\na+b=7', 'a-b=1\na+b= -7', 'a-b=1\na+b=7', 1),
(126, 'In which Year was the first world cup held?', '1930', '1931', '1929', '1928', '1930', 1),
(127, 'What is the Capital City Of Norway?', 'Stockholm', 'New York', 'Oslo', 'Asker', 'Oslo', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entrance`
--
ALTER TABLE `entrance`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examid`),
  ADD KEY `eid` (`eid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entrance`
--
ALTER TABLE `entrance`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `examid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `rid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `entrance` (`eid`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `registration` (`userid`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`username`) REFERENCES `registration` (`username`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`id`) REFERENCES `test` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
