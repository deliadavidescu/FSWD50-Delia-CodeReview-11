-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2018 at 03:49 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_delia_travelmatic`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(11) NOT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ZIP` int(11) DEFAULT NULL,
  `fk_restID` int(11) DEFAULT NULL,
  `fk_eventID` int(11) DEFAULT NULL,
  `fk_placeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `street`, `city`, `country`, `ZIP`, `fk_restID`, `fk_eventID`, `fk_placeID`) VALUES
(1, 'Karlsplatz 1', 'Vienna', 'Austria', 1010, NULL, NULL, 1),
(2, 'Maxingstrasse 13b', 'Vienna', 'Austria', 1030, NULL, NULL, 2),
(3, 'Schonbrunner Schlosstrase 47', 'Vienna', 'Austria', 1130, NULL, NULL, 3),
(4, 'Bocklinstrasse 72', 'Vienna', 'Austria', 1020, NULL, NULL, 4),
(5, 'Kettenbruckengasse 19', 'Vienna', 'Austria', 1050, 1, NULL, NULL),
(6, 'Wiener Stadthalle 1', 'Vienna', 'Austria', 1050, 2, NULL, NULL),
(7, 'Kettenbruckengasse 17', 'Vienna', 'Austria', 1050, 14, NULL, NULL),
(8, 'Wiener Stadthalle 1', 'Vienna', 'Austria', 1050, 15, NULL, NULL),
(9, 'Siebensterngasse 46/1/44', 'Vienna', 'Austria', 1070, NULL, 3, NULL),
(10, 'Fleischmarkt 20', 'Vienna', 'Austria', 110, NULL, 1, NULL),
(11, 'Schubertring 5-7', 'Vienna', 'Austria', 1010, NULL, 2, NULL),
(12, 'Fleischmarkt 20', 'Vienna', 'Austria', 1010, NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `categoryID` int(11) NOT NULL,
  `categegory_name` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`categoryID`, `categegory_name`) VALUES
(1, 'restaurant'),
(2, 'event'),
(3, 'place');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `event_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `website` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `fk_typeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `event_name`, `event_date`, `event_time`, `website`, `price`, `fk_typeID`) VALUES
(1, 'Kris Kristofferson', '2018-11-13', '21:03:13', 'http://kriskristofferson.com/', 58, 8),
(2, 'Lenny Kravitz', '2018-11-19', '23:12:15', 'http://www.lennykravitz.com/', 45, 6),
(3, 'Contemporary Dance', '2018-12-17', '21:03:13', 'http://vdc.at', 58, 8),
(4, 'Party', '2018-11-19', '23:12:15', 'https://www.events.at/c/wien/party', 60, 7);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `photo_name` blob,
  `fk_user_profileID` int(11) DEFAULT NULL,
  `fk_restID` int(11) DEFAULT NULL,
  `fk_eventID` int(11) DEFAULT NULL,
  `fk_placesID` int(11) DEFAULT NULL,
  `url` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageID`, `photo_name`, `fk_user_profileID`, `fk_restID`, `fk_eventID`, `fk_placesID`, `url`) VALUES
(3, NULL, NULL, NULL, NULL, 3, 'https://cache-graphicslib.viator.com/graphicslib/thumbs674x446/3585/SITours/skip-the-line-schonbrunn-palace-guided-tour-and-vienna-historical-in-vienna-585003.jpg'),
(4, NULL, NULL, NULL, NULL, 4, 'https://www.wien.info/media/images/1223-prater-riesenrad-19to1.jpeg'),
(5, NULL, NULL, NULL, NULL, 2, 'https://www.wien.info/media/images/zoo-tiergarten-maehnenrobben-fuetterung-2017-3to2.jpeg/image_gallery'),
(6, NULL, NULL, NULL, NULL, 1, 'https://www.vienna.at/2017/09/karlskirche_APA-16-9-017650366-650x366.jpg'),
(9, NULL, NULL, 15, NULL, NULL, 'https://www.jasna.sk/fileadmin/_processed_/csm_PWH_7635_2bcb7ca580.jpg'),
(10, NULL, NULL, 1, NULL, NULL, 'http://www.realdetroitweekly.com/wp-content/uploads/2017/06/Restaurants.jpg'),
(11, NULL, NULL, 14, NULL, NULL, 'https://media-cdn.tripadvisor.com/media/photo-s/0e/cc/0a/dc/restaurant-chocolat.jpg'),
(12, NULL, NULL, 2, NULL, NULL, 'https://www.wien.info/media/images/41993-das-loft-sofitel-so-vienna-3to2.jpeg/image_gallery'),
(13, NULL, NULL, NULL, 1, NULL, 'https://cdn.viagogo.net/img/cat/8250/1/37.jpg'),
(14, NULL, NULL, NULL, 2, NULL, 'https://www.wheremilan.com/wp-content/uploads/2018/09/lenny_kravitz.jpg'),
(15, NULL, NULL, NULL, 3, NULL, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgwUPAXG_5UxC0Y7p-kZfwNlD06NmyUB6RRmZOcirr32fI7Wenzg'),
(16, NULL, NULL, NULL, 4, NULL, 'https://www.chepstow-racecourse.co.uk/images/upload/xmas-party-50-50.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `fk_adressID` int(60) DEFAULT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `fk_adressID`, `lat`, `lng`, `type`) VALUES
(1, 1, 48.201607, 16.369160, 'attraction'),
(2, 2, 48.183105, 16.300045, 'attraction'),
(4, 3, 48.184982, 16.311602, 'attraction');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `placeID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_typeID` int(11) DEFAULT NULL,
  `fk_imageID` int(11) DEFAULT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`placeID`, `name`, `fk_typeID`, `fk_imageID`, `description`) VALUES
(1, 'St. Charles Church', 4, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa'),
(2, 'Zoo Vienna', 5, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa'),
(3, 'Schonbrunn Palace', 4, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa'),
(4, 'Prater', 5, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restID` int(11) NOT NULL,
  `rest_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` int(55) DEFAULT NULL,
  `rest_description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_typeID` int(11) DEFAULT NULL,
  `website` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restID`, `rest_name`, `phone_number`, `rest_description`, `fk_typeID`, `website`) VALUES
(1, 'Lemon Leaf Thai Restaurant', 42287542, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. ', 2, 'wwww.lemon.com'),
(2, 'Steirereck Restaurant', 387235278, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. ', 1, 'www.steirereck.com'),
(14, 'Basic Kneads Pizza', 31765361, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. ', 3, 'www.basicpizza.com'),
(15, 'A Salt & Battery', 31763167, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. ', 1, 'www.salty.com');

-- --------------------------------------------------------

--
-- Table structure for table `Type`
--

CREATE TABLE `Type` (
  `typeID` int(11) NOT NULL,
  `type_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `fk_categoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Type`
--

INSERT INTO `Type` (`typeID`, `type_name`, `fk_categoryID`) VALUES
(1, 'chinese', 1),
(2, 'indian', 1),
(3, 'italian', 1),
(4, 'museum', 3),
(5, 'historical site', 3),
(6, 'concert', 2),
(7, 'party', 2),
(8, 'dance', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `fk_user_roleID` int(11) DEFAULT NULL,
  `fk_profileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `user_email`, `password`, `fk_user_roleID`, `fk_profileID`) VALUES
(13, 'delia', 'alina@gmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 1, 0),
(14, 'delia', 'delia@gmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `historyID` int(11) NOT NULL,
  `fk_userID` int(11) DEFAULT NULL,
  `fk_restID` int(11) DEFAULT NULL,
  `fk_eventID` int(11) DEFAULT NULL,
  `fk_placeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `profileID` int(11) NOT NULL,
  `first_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `fk_userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `roleID` int(11) NOT NULL,
  `user_role` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`roleID`, `user_role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `address_ibfk_1` (`fk_restID`),
  ADD KEY `address_ibfk_2` (`fk_eventID`),
  ADD KEY `address_ibfk_3` (`fk_placeID`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `fk_typeID` (`fk_typeID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `fk_restID` (`fk_restID`),
  ADD KEY `fk_eventID` (`fk_eventID`),
  ADD KEY `fk_placesID` (`fk_placesID`),
  ADD KEY `fk_user_profileID` (`fk_user_profileID`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_adressID` (`fk_adressID`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`placeID`),
  ADD KEY `fk_typeID` (`fk_typeID`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restID`),
  ADD KEY `fk_typeID` (`fk_typeID`);

--
-- Indexes for table `Type`
--
ALTER TABLE `Type`
  ADD PRIMARY KEY (`typeID`),
  ADD KEY `fk_categoryID` (`fk_categoryID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `user_ibfk_1` (`fk_user_roleID`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`historyID`),
  ADD KEY `fk_userID` (`fk_userID`),
  ADD KEY `fk_restID` (`fk_restID`),
  ADD KEY `fk_eventID` (`fk_eventID`),
  ADD KEY `fk_placeID` (`fk_placeID`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`profileID`),
  ADD KEY `fk_userID` (`fk_userID`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `placeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Type`
--
ALTER TABLE `Type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`fk_restID`) REFERENCES `restaurants` (`restID`) ON DELETE CASCADE,
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`fk_eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE,
  ADD CONSTRAINT `address_ibfk_3` FOREIGN KEY (`fk_placeID`) REFERENCES `places` (`placeID`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`fk_typeID`) REFERENCES `Type` (`typeID`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`fk_restID`) REFERENCES `restaurants` (`restID`),
  ADD CONSTRAINT `images_ibfk_2` FOREIGN KEY (`fk_eventID`) REFERENCES `events` (`eventID`),
  ADD CONSTRAINT `images_ibfk_3` FOREIGN KEY (`fk_placesID`) REFERENCES `places` (`placeID`),
  ADD CONSTRAINT `images_ibfk_6` FOREIGN KEY (`fk_user_profileID`) REFERENCES `user_profile` (`profileID`);

--
-- Constraints for table `markers`
--
ALTER TABLE `markers`
  ADD CONSTRAINT `markers_ibfk_1` FOREIGN KEY (`fk_adressID`) REFERENCES `address` (`addressID`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`fk_typeID`) REFERENCES `Type` (`typeID`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`fk_typeID`) REFERENCES `Type` (`typeID`);

--
-- Constraints for table `Type`
--
ALTER TABLE `Type`
  ADD CONSTRAINT `Type_ibfk_1` FOREIGN KEY (`fk_categoryID`) REFERENCES `Category` (`categoryID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`fk_user_roleID`) REFERENCES `user_role` (`roleID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_history`
--
ALTER TABLE `user_history`
  ADD CONSTRAINT `user_history_ibfk_1` FOREIGN KEY (`fk_userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `user_history_ibfk_2` FOREIGN KEY (`fk_restID`) REFERENCES `restaurants` (`restID`),
  ADD CONSTRAINT `user_history_ibfk_3` FOREIGN KEY (`fk_eventID`) REFERENCES `events` (`eventID`),
  ADD CONSTRAINT `user_history_ibfk_4` FOREIGN KEY (`fk_placeID`) REFERENCES `places` (`placeID`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`fk_userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
