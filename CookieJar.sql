-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2020 at 10:35 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CookieJar`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appNo` int(11) NOT NULL,
  `appTime` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `dentistID` int(11) NOT NULL,
  `dentistName` varchar(50) NOT NULL,
  `userContactNo` varchar(20) NOT NULL,
  `dentistContactNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dentist`
--

CREATE TABLE `dentist` (
  `dentistID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dentistImage` varchar(1000) NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dentist`
--

INSERT INTO `dentist` (`dentistID`, `fname`, `lname`, `contactNo`, `email`, `address`, `dentistImage`, `rate`) VALUES
(1, 'Tracy', 'Miranda', '388-855-3035', 'brandon03@thomas.net', 'Christopher Mountains Apt. 257, Port Tinahaven, WA 31380', 'https://www.thispersondoesnotexist.com/image', '233.22'),
(347, 'Brittney', 'Stone', '+1-926-079-6307', 'gbenjamin@andews-richards.com ', '043 Logan Burg Apt. 120, Warrenland', 'https://www.thispersondoesnotexist.com/image', '17917.90'),
(348, 'Brittney', 'Stone', '+1-926-079-6307', 'gbenjamin@andews-richards.com ', '043 Logan Burg Apt. 120, Warrenland', 'https://www.thispersondoesnotexist.com/image', '17917.90'),
(349, 'Amanda', 'Ross', '067-668-2411', 'malik55@gmail.com', '6121 Fuller Walk, Christophershire, GA', 'https://www.thispersondoesnotexist.com/image', '2389.87');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageid` int(11) NOT NULL,
  `message` text NOT NULL,
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageid`, `message`, `senderID`, `receiverID`, `createdAt`) VALUES
(1, 'Hello', 1, 2, '2020-04-10 06:39:42'),
(2, 'How are you doing?', 1, 2, '2020-04-10 06:40:02'),
(3, 'I am fine, Thank you', 2, 1, '2020-04-10 06:40:32'),
(5, 'dfgdfg', 1, 2, '2020-04-10 07:10:03'),
(6, 'fghfgh', 1, 3, '2020-04-10 07:19:56'),
(7, 'ghgh', 1, 3, '2020-04-10 07:20:02'),
(8, 'ghgh', 1, 3, '2020-04-10 07:20:36'),
(9, 'test', 3, 1, '2020-04-10 08:40:10'),
(10, 'Final Test', 3, 2, '2020-04-10 09:25:32'),
(11, 'All Good', 2, 3, '2020-04-10 09:26:33'),
(15, 'hello', 4, 2, '2020-04-10 10:14:11'),
(16, 'hello steven', 4, 2, '2020-04-10 10:14:22'),
(17, 'Hello Isala', 2, 4, '2020-04-10 10:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewID` int(11) NOT NULL,
  `dentistID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `starReviews` int(11) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewID`, `dentistID`, `userID`, `starReviews`, `message`) VALUES
(2, 1, 1, 3, 'I have a Headache'),
(5, 349, 3, 4, 'Hungry'),
(6, 349, 3, 4, 'Hiii'),
(8, 1, 3, 4, 'Hello another message');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userType` varchar(10) NOT NULL,
  `userFname` varchar(20) NOT NULL,
  `userSName` varchar(20) NOT NULL,
  `userAddress` varchar(100) NOT NULL,
  `userContactNo` varchar(20) NOT NULL,
  `userEmail` varchar(30) NOT NULL,
  `userPassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userType`, `userFname`, `userSName`, `userAddress`, `userContactNo`, `userEmail`, `userPassword`) VALUES
(1, 'Customer', 'Jamie', 'Lopez', '664 Jessica LakesPort Theresa, AR 90304', '0912523375', 'chapmanjohn@austin.net', 'h3SwvdQJ3'),
(2, 'Customer', 'Steven', 'Mitchell', '59361 Johnson Square, Latashaberg, CA 7565', '845-787-7636', 'gary80@bolton.com', 'JTaJ6zt52'),
(3, ' ', 'John', 'Lennon', 'fsdfasdf', '21432452', 'cat@gmail.com', '1234'),
(4, ' ', 'Isala', 'Piyarisi', 'Piyarisi, Mihiripenna', '0775399367', 'isala@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appNo`),
  ADD KEY `dentistID` (`dentistID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `dentist`
--
ALTER TABLE `dentist`
  ADD PRIMARY KEY (`dentistID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageid`),
  ADD KEY `senderID` (`senderID`),
  ADD KEY `receiverID` (`receiverID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `dentistID` (`dentistID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dentist`
--
ALTER TABLE `dentist`
  MODIFY `dentistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`dentistID`) REFERENCES `dentist` (`dentistID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `receiverID` FOREIGN KEY (`receiverID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `senderID` FOREIGN KEY (`senderID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`dentistID`) REFERENCES `dentist` (`dentistID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`dentistID`) REFERENCES `dentist` (`dentistID`),
  ADD CONSTRAINT `review_ibfk_4` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
