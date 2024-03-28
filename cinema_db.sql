-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 11:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable`
--

CREATE TABLE `bookingtable` (
  `bookingID` int(11) NOT NULL,
  `movieID` int(11) DEFAULT NULL,
  `bookingTheatre` varchar(100) NOT NULL,
  `bookingType` varchar(100) DEFAULT NULL,
  `bookingDate` varchar(50) NOT NULL,
  `bookingTime` varchar(50) NOT NULL,
  `bookingFName` varchar(100) NOT NULL,
  `bookingEmail` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `ORDERID` varchar(255) NOT NULL,
  `DATE-TIME` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `no_seats` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`bookingID`, `movieID`, `bookingTheatre`, `bookingType`, `bookingDate`, `bookingTime`, `bookingFName`, `bookingEmail`, `amount`, `ORDERID`, `DATE-TIME`, `user_id`, `no_seats`) VALUES
(116, 4, 'vip-hall', '3d', '07-28-2023', '18-00', 'simon', 'oyungesimonobadiah@gmail.com', 'Paid', 'ARVR96557271', '2023-07-27 14:33:06', 13, 0),
(117, 2, 'main-hall', '3d', '07-28-2023', '24-00', 'hhhelo', 'jack@gmail.com', 'Paid', 'ARVR63141442', '2023-07-27 21:55:29', 0, 0),
(120, 1, 'vip-hall', 'imax', '07-29-2023', '24-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR90390866', '2023-07-27 23:59:00', 19, 0),
(129, 1, 'vip-hall', 'imax', '07-29-2023', '24-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR93598176', '2023-07-28 00:05:16', 19, 0),
(130, 1, 'vip-hall', 'imax', '07-29-2023', '24-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR27317336', '2023-07-28 00:05:26', 19, 0),
(131, 1, 'vip-hall', 'imax', '07-29-2023', '24-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR51060908', '2023-07-28 00:05:35', 19, 0),
(132, 1, 'vip-hall', 'imax', '07-29-2023', '24-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR53514259', '2023-07-28 00:05:55', 19, 0),
(133, 1, 'vip-hall', 'imax', '07-29-2023', '24-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR77498935', '2023-07-28 00:06:53', 19, 0),
(134, 1, 'vip-hall', 'imax', '07-29-2023', '24-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR12591550', '2023-07-28 00:07:15', 19, 0),
(135, 2, 'main-hall', '7d', '07-31-2023', '24-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR12359805', '2023-07-28 01:53:27', 19, 0),
(136, 2, 'main-hall', '2d', '07-31-2023', '21-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR28189486', '2023-07-28 01:54:10', 19, 0),
(137, 4, 'private-hall', 'imax', '07-28-2023', '21-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR70688956', '2023-07-28 01:54:56', 19, 0),
(138, 2, 'main-hall', '2d', '', '09-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR61110607', '2023-07-28 11:14:56', 19, 0),
(139, 2, 'main-hall', '3d', '07-28-2023', '09-00', 'Demo', 'jackmutiso37@gmail.com', 'Paid', 'ARVR95398425', '2023-07-28 11:16:10', 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktable`
--

CREATE TABLE `feedbacktable` (
  `msgID` int(12) NOT NULL,
  `senderfName` varchar(50) NOT NULL,
  `senderlName` varchar(50) DEFAULT NULL,
  `sendereMail` varchar(100) NOT NULL,
  `senderfeedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedbacktable`
--

INSERT INTO `feedbacktable` (`msgID`, `senderfName`, `senderlName`, `sendereMail`, `senderfeedback`) VALUES
(7, 'jack', 'mutiso', 'jackmutiso37@gmail.com', 'Testing lorem ipsum'),
(8, 'guru', 'mutiso', 'aj@gmail.com', 'Testing 2');

-- --------------------------------------------------------

--
-- Table structure for table `movietable`
--

CREATE TABLE `movietable` (
  `movieID` int(11) NOT NULL,
  `movieImg` varchar(150) NOT NULL,
  `movieTitle` varchar(100) NOT NULL,
  `movieGenre` varchar(50) NOT NULL,
  `movieDuration` int(11) NOT NULL,
  `movieRelDate` date NOT NULL,
  `movieDirector` varchar(50) NOT NULL,
  `movieActors` varchar(150) NOT NULL,
  `mainhall` int(11) NOT NULL,
  `viphall` int(11) NOT NULL,
  `privatehall` int(11) NOT NULL,
  `trailerLink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `movietable`
--

INSERT INTO `movietable` (`movieID`, `movieImg`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`, `mainhall`, `viphall`, `privatehall`, `trailerLink`) VALUES
(1, 'img/movie-poster-1.jpg', 'Captain Marvel', ' Action, Adventure, Sci-Fi ', 220, '2018-10-18', 'Anna Boden, Ryan Fleck', 'Brie Larson, Samuel L. Jackson, Ben Mendelsohn', 0, 0, 0, 'https://www.youtube.com/watch?v=Z1BCujX3pw8&t=7s'),
(2, 'img/movie-poster-2.jpg', 'Qarmat Bitamrmat  ', 'Comedy', 110, '2018-10-18', 'Assad Fouladkar', 'Ahmed Adam, Bayyumy Fouad, Salah Abdullah , Entsar, Dina Fouad ', 0, 0, 0, 'https://www.youtube.com/watch?v=GIRmWfyzk50'),
(3, 'img/movie-poster-3.jpg', 'The Lego Movie', 'Animation, Action, Adventure', 110, '2014-02-07', 'Phil Lord, Christopher Miller', 'Chris Pratt, Will Ferrell, Elizabeth Banks', 0, 0, 0, 'https://www.youtube.com/watch?v=fZ_JOBCLF-I'),
(4, 'img/movie-poster-4.jpg', 'Nadi Elregal Elserri ', 'Comedy', 105, '2019-01-23', ' Ayman Uttar', 'Karim Abdul Aziz, Ghada Adel, Maged El Kedwany, Nesreen Tafesh, Bayyumy Fouad, Moataz El Tony ', 0, 0, 0, 'https://www.youtube.com/watch?v=Ze5YA4mkzhI'),
(5, 'img/movie-poster-5.jpg', 'VICE', 'Biography, Comedy, Drama', 132, '2018-12-25', 'Adam McKay', 'Christian Bale, Amy Adams, Steve Carell', 0, 0, 0, 'https://www.youtube.com/watch?v=g09a9laLh0k'),
(6, 'img/movie-poster-6.jpg', 'The Vanishing', 'Crime, Mystery, Thriller', 107, '2019-01-04', 'Kristoffer Nyholm', 'Gerard Butler, Peter Mullan, Connor Swindells', 0, 0, 0, 'https://www.youtube.com/watch?v=RyFlfN4dD14'),
(70, 'img/cherry.jpg', 'Cherry', 'Cherry', 142, '2021-03-12', 'Joe Russo', 'Jack reynor,Tom Holland', 600, 1000, 1200, 'https://www.youtube.com/watch?v=H5bH6O0bErk'),
(71, 'img/black.jpg', 'Black Adam ', 'Adventure,Action,Fantasy', 125, '2022-10-21', 'Jaume', 'The Rock', 300, 600, 800, 'https://www.youtube.com/watch?v=X0tOpBuYasI'),
(72, 'img/tim.jpg', 'The Invisible Man', 'Drama,Horror', 124, '2022-04-06', 'Leigh', 'Elisabeth Moss', 300, 500, 700, 'https://www.youtube.com/watch?v=WO_FJdiY9dA&t=69s'),
(74, 'img/hypnotic.jpg', 'Hypnotic', 'Thriller,Mystrey', 88, '2022-10-21', 'Matt Angel', 'Jason O\'mara', 700, 1400, 1800, 'https://www.youtube.com/watch?v=eHsWYmnXk1o&t=40s'),
(91, 'img/tim.jpg', 'The Oringinals', 'series', 2, '2023-07-27', 'Kelvin', 'jack guru', 300, 600, 1000, 'https://application--jarrdim.repl.co/'),
(106, 'img/1690529198api.png', 'new', 'delete', 9, '2023-07-21', 'Kelvin', 'test', 300, 600, 1000, 'https://application--jarrdim.repl.co/'),
(107, 'img/169052921537.png', 'new', 'delete', 9, '2023-07-21', 'Kelvin', 'test', 300, 600, 1000, 'https://application--jarrdim.repl.co/'),
(108, 'img/1690529222api.png', 'new', 'delete', 9, '2023-07-21', 'Kelvin', 'test', 300, 600, 1000, 'https://application--jarrdim.repl.co/');

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`id`, `name`) VALUES
(2, 'Theater 1'),
(4, 'vip'),
(5, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `theater_settings`
--

CREATE TABLE `theater_settings` (
  `id` int(30) NOT NULL,
  `theater_id` int(30) NOT NULL,
  `seat_group` varchar(250) NOT NULL,
  `seat_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theater_settings`
--

INSERT INTO `theater_settings` (`id`, `theater_id`, `seat_group`, `seat_count`) VALUES
(2, 2, 'Box 1', 20),
(3, 2, 'Box 2', 30),
(4, 1, 'Box 1', 30),
(5, 1, 'Box 2', 30);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `role`, `email`, `phone`, `age`, `gender`, `password`) VALUES
(19, 'Demo', 'admin', 'jackmutiso37@gmail.com', '0101480109', 21, 'gender', '12345'),
(20, 'Glo', 'user', 'jack@gmail.com', '254745378674', 21, 'gender', '12345'),
(21, 'manager2', 'user', 'abby@gmail.com', '254745378674', 21, 'gender', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID` (`bookingID`),
  ADD KEY `foreign_key_movieID` (`movieID`),
  ADD KEY `foreign_key_ORDERID` (`ORDERID`);

--
-- Indexes for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD PRIMARY KEY (`msgID`),
  ADD UNIQUE KEY `msgID` (`msgID`);

--
-- Indexes for table `movietable`
--
ALTER TABLE `movietable`
  ADD PRIMARY KEY (`movieID`),
  ADD UNIQUE KEY `movieID` (`movieID`);

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theater_settings`
--
ALTER TABLE `theater_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  MODIFY `msgID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `movietable`
--
ALTER TABLE `movietable`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `theater`
--
ALTER TABLE `theater`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `theater_settings`
--
ALTER TABLE `theater_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD CONSTRAINT `foreign_key_movieID` FOREIGN KEY (`movieID`) REFERENCES `movietable` (`movieID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
