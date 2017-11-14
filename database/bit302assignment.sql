-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 05:27 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bit302assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `datePublished` datetime NOT NULL,
  `description` varchar(256) NOT NULL,
  `upVote` int(11) DEFAULT '0',
  `downVote` int(11) DEFAULT '0',
  `userId` int(11) DEFAULT NULL,
  `postId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `datePublished`, `description`, `upVote`, `downVote`, `userId`, `postId`) VALUES
(1, '2017-11-08 00:00:00', 'Helppppp', 0, 0, 8, 11),
(5, '2017-11-09 10:01:42', 'How long have you been encountering this situation?', 0, 0, 12, 11),
(6, '2017-11-09 10:02:18', 'It\'s the first time i got this problem', 0, 0, 8, 11),
(8, '2017-11-10 15:57:23', 'Have you tried reboot your laptop?â€', 0, 0, 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offerId` int(11) NOT NULL,
  `dateOffered` datetime NOT NULL,
  `dateCompleted` datetime NOT NULL,
  `priceOffered` decimal(10,2) NOT NULL,
  `postTitle` varchar(256) NOT NULL,
  `clientName` varchar(256) NOT NULL,
  `offerStatus` varchar(256) NOT NULL,
  `repairStatus` varchar(256) NOT NULL,
  `paymentStatus` varchar(256) NOT NULL,
  `clientId` int(11) NOT NULL,
  `technicianId` int(11) DEFAULT NULL,
  `postId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offerId`, `dateOffered`, `dateCompleted`, `priceOffered`, `postTitle`, `clientName`, `offerStatus`, `repairStatus`, `paymentStatus`, `clientId`, `technicianId`, `postId`) VALUES
(14, '2017-10-26 14:10:40', '0000-00-00 00:00:00', '6969.00', 'popo', 'Edward', 'Pending', 'Not Started', 'Not Paid', 8, 10, 19),
(15, '2017-10-26 14:20:42', '0000-00-00 00:00:00', '1234.00', 'popo', 'Edward', 'Declined', 'In Progress', 'Not Paid', 8, 9, 19),
(16, '2017-10-26 14:23:37', '2017-10-26 23:10:11', '5555.00', 'Laptop Freezes, Screen glitches', 'Edward', 'Accepted', 'Completed', 'Paid', 8, 9, 11),
(17, '2017-10-26 23:25:39', '0000-00-00 00:00:00', '4545.00', 'iphone screen cracked', 'test', 'Pending', 'Not Started', 'Not Paid', 14, 9, 18),
(18, '2017-10-26 23:25:55', '0000-00-00 00:00:00', '7776.00', 'popo', 'Edward', 'Accepted', 'In Progress', 'Not Paid', 8, 9, 13),
(19, '2017-11-09 16:53:56', '0000-00-00 00:00:00', '888.00', 'popo', 'Edward', 'Accepted', 'In Progress', 'Not Paid', 8, 12, 13),
(22, '2017-11-11 14:59:25', '0000-00-00 00:00:00', '120.00', 'Laptop Freezes, Screen glitches', 'Edward', 'Accepted', 'In Progress', 'Not Paid', 8, 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL,
  `postTitle` varchar(256) NOT NULL,
  `itemType` varchar(256) NOT NULL,
  `itemModal` varchar(256) NOT NULL,
  `problemType` varchar(25) NOT NULL,
  `repairMethodRequested` varchar(25) NOT NULL,
  `problemDescription` varchar(256) NOT NULL,
  `datePublished` date NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postTitle`, `itemType`, `itemModal`, `problemType`, `repairMethodRequested`, `problemDescription`, `datePublished`, `image`, `userId`) VALUES
(11, 'Laptop Freezes, Screen glitches', 'Computer', 'Lenovo Ideapad 310', 'Software', 'Onsite', 'Whenever I starts to play some video on my laptop browser it freezes and the screen glitches.', '2017-10-21', '20364-3201.vostro3550-glitch.jpeg-550x550.jpg', 8),
(12, 'fghfghgfh', 'Computer', 'fghfgh', 'Hardware', 'Onsite', 'fghfgh', '2017-10-24', '21572-parkering-e1441957508415-(1).jpg', 8),
(13, 'popo', 'Computer', 'lala', 'Hardware', 'Onsite', 'lolo', '2017-10-25', '', 8),
(14, 'lolo', 'Computer', 'lala', 'Hardware', 'Onsite', 'lili', '2017-10-25', '', 8),
(15, 'kiki', 'Computer', 'koko', 'Hardware', 'Onsite', 'kaka', '2017-10-25', '', 8),
(16, 'wewe', 'Computer', 'wowo', 'Hardware', 'Onsite', 'wawa', '2017-10-25', '16837-pngpix-com-smartphone-vector-png-transparent-image.png', 8),
(17, 'hoho', 'Computer', 'huhu', 'Hardware', 'Onsite', 'haha', '2017-10-25', '', 8),
(18, 'iphone screen cracked', 'Mobile', 'iphone X', 'Hardware', 'Onsite', 'the screen cracked', '2017-10-25', '93732-pngpix-com-smartphone-vector-png-transparent-image2.png', 14),
(19, 'popo', 'Computer', 'papa', 'Hardware', 'Onsite', 'pepe', '2017-10-25', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionId` int(11) NOT NULL,
  `transactionDate` datetime NOT NULL,
  `amountPaid` varchar(255) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `offerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionId`, `transactionDate`, `amountPaid`, `userId`, `offerId`) VALUES
(4, '0000-00-00 00:00:00', '5555.00', 8, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `contactNumber` varchar(25) DEFAULT NULL,
  `dateOfBirth` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `userType` varchar(256) NOT NULL,
  `userStatus` varchar(256) NOT NULL,
  `paypalId` varchar(256) DEFAULT NULL,
  `pointsCollected` decimal(11,0) DEFAULT NULL,
  `dateCreated` datetime NOT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `email`, `contactNumber`, `dateOfBirth`, `address`, `userType`, `userStatus`, `paypalId`, `pointsCollected`, `dateCreated`, `occupation`, `experience`) VALUES
(2, 'user1', '$2y$10$Gy0hT7P58KO914Ifu/uvN.kolwL5lcxTX.Es1w6M0bHrjAqrx5ZxW', 'user1@hotmail.com', 'asd', 'asd', 'asd', 'User', 'Offline', NULL, NULL, '2017-10-11 20:42:14', 'asd', 0),
(3, 'admin1', '$2y$10$fEkWl00y50PwFTavWWtWh.vZaxpGwK35.86TeWTT7EBvc/71PHeJu', 'admin1@hotmail.com', NULL, NULL, NULL, 'Admin', 'Online', NULL, NULL, '2017-10-11 20:49:34', NULL, NULL),
(4, 'technician1', '$2y$10$s1dZ7xiwDzys3nSAKAMsq.NvhL4L9fGv81plVO/HFuzhfR3/iZq5y', 'technician1@hotmail.com', NULL, NULL, NULL, 'Technician', 'Online', NULL, '0', '2017-10-13 22:45:03', NULL, NULL),
(5, 'user2', '$2y$10$MTPt.2LjoB4JFnEsIDNUeuXYt3umOZlVamsii8bsKC/uQOc2WGV96', 'user2@hotmail.com', NULL, NULL, NULL, 'User', '', NULL, NULL, '2017-10-21 14:34:40', NULL, NULL),
(6, 'user3', '$2y$10$DUpQRWRWLbVeMRuIlUO1Seq3FAcQ5dpVjHMvBBHKbbBNQ.LcHp/KC', 'user3@hotmail.com', NULL, NULL, NULL, 'User', 'Offline', NULL, NULL, '2017-10-21 16:35:03', NULL, NULL),
(8, 'Edward', '$2y$10$UY4tQC2cGVOSjl28uVuz2upro48u3.3z2KHuZLNW3hGMAyWrh4nVm', 'edward@hotmail.com', '016-1234567', '2017-10-19', '', 'User', 'Offline', NULL, NULL, '2017-10-21 16:48:12', '', 0),
(9, 'tech3', '$2y$10$uECXmcR4KkYVY/oXsVXlKuQ.tLNXMtMRBz5fL3o1om5dY3XIK5jR6', 'tech3@hotmail.com', '01234567', NULL, NULL, 'Technician', 'Online', 'tech3@paypal.com', '1703', '2017-10-24 23:45:54', NULL, NULL),
(10, 'tech4', '$2y$10$Q3XcXCC3./NXAi1LtkoY1uiwd60fc6XTr4F1Xz6SD1roDFi.P7eEK', 'tech4@hotmail.com', '01231234', NULL, NULL, 'Technician', 'Offline', 'tech4@paypal.com', '0', '2017-10-24 23:50:16', NULL, NULL),
(11, 'tech5', '$2y$10$7PTM.zB6/80bYdOYOJInbOvEkVTlFUkDxqjXm4iTHo7/J59YB3Jum', 'tech5@hotmail.com', NULL, NULL, NULL, 'Technician', 'Offline', NULL, '0', '2017-10-24 23:51:07', NULL, NULL),
(12, 'tech6', '$2y$10$W.qNtsFJsxSCMLIg8oD1muBscavxrS/Qesizc5eDj8A700ZRWGX.a', 'tech6@hotmail.com', NULL, NULL, NULL, 'Technician', 'Offline', NULL, '0', '2017-10-24 23:57:19', NULL, NULL),
(13, 'Ali', '$2y$10$Ggffv55ur7sKPYQfGkmVLeOCZcboWoDE8hXDUYA99366KJ/5z..c2', 'ali@hotmail.com', NULL, NULL, NULL, 'User', 'Offline', NULL, NULL, '2017-10-25 01:31:34', NULL, NULL),
(14, 'test', '$2y$10$f3rggemVovhnGLTndey1RemwaW.CUdd3BgJbcIO7eK.hy7TInd6k.', 'test@hotmail.com', NULL, NULL, NULL, 'User', 'Offline', NULL, NULL, '2017-10-25 12:31:00', NULL, NULL),
(15, 'tech9', '$2y$10$6fGoelYIjZG8WZiyJBWXMuOA5hRnST8EbmpW0KWzplvJa/VAtiahe', 'tech9@hotmail.com', NULL, NULL, NULL, 'Technician', 'Offline', NULL, '0', '2017-10-26 23:06:17', NULL, NULL),
(16, 'admin', '$2y$10$zDUlCykBRMqvQCzU55EO3un7AR3DfkYOG0vBduoRZTr4GHd52f88u', 'admin@hotmail.com', NULL, NULL, NULL, 'Admin', 'Online', NULL, '0', '2017-11-13 00:25:25', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `FK_userIdComment` (`userId`),
  ADD KEY `FK_postIdComment` (`postId`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offerId`),
  ADD KEY `FK_expertUserIdOffer` (`technicianId`),
  ADD KEY `FK_postIdOffer` (`postId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `FK_generalUserIdPost` (`userId`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `FK_generalUserIdTransaction` (`userId`),
  ADD KEY `FK_offerIdTransaction` (`offerId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_postIdComment` FOREIGN KEY (`postId`) REFERENCES `posts` (`postId`),
  ADD CONSTRAINT `FK_userIdComment` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `FK_expertUserIdOffer` FOREIGN KEY (`technicianId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `FK_postIdOffer` FOREIGN KEY (`postId`) REFERENCES `posts` (`postId`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_generalUserIdPost` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FK_generalUserIdTransaction` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `FK_offerIdTransaction` FOREIGN KEY (`offerId`) REFERENCES `offers` (`offerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
