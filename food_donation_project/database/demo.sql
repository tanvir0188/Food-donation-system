-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 18, 2023, at 04:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `demo`

-- Table structure for table `admin`

CREATE TABLE `admin` (
  `Aid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` text NOT NULL,
  `location` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `admin`

INSERT INTO `admin` (`Aid`, `name`, `email`, `password`, `location`, `address`) VALUES
(1, 'Biddananddo Foundation', 'biddananddo@.com', '$2y$10$0aBbyDrlUyHxrrq5UrVSV.4.uZYyAMQM23xlA8spBJlMFM.atg6N.', 'Dhaka', 'Dhaka'),
(2, 'As Sunna Foundation', 'assunna@yahoo.co.in', '$2y$10$FqcIkuYEpCTF49O94LJAleKKIptLqYwhrtDMGO/BKOoKlOxp5KqiW', 'Banossree', 'Banossree Dhaka');

-- --------------------------------------------------------

-- Table structure for table `delivery_persons`

CREATE TABLE `delivery_persons` (
  `Did` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `delivery_persons`

INSERT INTO `delivery_persons` (`Did`, `name`, `email`, `password`, `city`) VALUES
(1, 'arnob', 'tanvir01882@gmail.com', '$2y$10$J3Xup3v5.yFxoftqqdeLxeEB/PPrDDScxJ.edxaw3lzid7tKOBSra', 'Dhaka'),
(2, 'arnob', 'ar0188@gmail.com', '$2y$10$cJCmdRLpRrhmmcTteCgPheBo/gBNkFVDH0e3YHvjYNxV4orBFZesW', 'Dhaka');

-- --------------------------------------------------------

-- Table structure for table `food_donations`

CREATE TABLE `food_donations` (
  `Fid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `food` varchar(50) NOT NULL,
  `type` text NOT NULL,
  `category` text NOT NULL,
  `quantity` text NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `phoneno` varchar(25) NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `delivery_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `food_donations`

INSERT INTO `food_donations` (`Fid`, `name`, `email`, `food`, `type`, `category`, `quantity`, `date`, `address`, `location`, `phoneno`, `assigned_to`, `delivery_by`) VALUES
(1, 'arnob', 'tanvir01882@gmail.com', 'rice', 'veg', 'raw-food', '2kg', '2023-09-28 21:48:28', '2 No officers quarter ', 'Dhaka', '01882671027', 2, NULL),
(2, 'arnob', 'ar0188@gmail.com', 'biryani', 'Non-veg', 'cooked-food', '10 ', '2023-09-28 10:58:22', '7 No road', 'Dhaka', '01882671027', NULL, 1);

-- --------------------------------------------------------

-- Table structure for table `donate_money`

CREATE TABLE `donate_money` (
  `Mid` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `amount` INT(6) NOT NULL,
  `date` DATE NULL,
  `address` TEXT NOT NULL,
  `location` VARCHAR(50) NOT NULL,
  `phoneno` VARCHAR(25) NOT NULL,
  `assigned_to` INT(11) NULL,
  PRIMARY KEY (`Fid`)  -- Define Fid as the primary key
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `donate_money`

INSERT INTO `donate_money` (`Mid`, `name`, `email`, `amount`, `date`, `address`, `location`, `phoneno`, `assigned_to`) VALUES
(1, 'arnob tanvir', 'arnob0188@gmail.com', 12000, '2023-09-09', 'pwd', 'Rajbari', '0188267102', NULL),
(2, 'tanvir', 'tanvir0188@gmail.com', 100, '2023-09-10', 'pwd', 'Tangail', '0188267102', NULL),
(3, 'arnob tanvir', 'arnob0188@gmail.com', 1200, '2023-09-15', 'pwd', 'Rajbari', '0188267102', NULL);

-- --------------------------------------------------------

-- Table structure for table `login`

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `login`

INSERT INTO `login` (`id`, `name`, `email`, `password`, `gender`) VALUES
(1, 'arnob', 'arnob01882@gmail.com', '$2y$10$Oist7EyzoYIkCs4lRZNVGuYx.oQQfxI64Py18okV2E7lKeZ.jYl/W', 'male'),
(2, 'tanvir', 'tanvir0188@gmail.com', '$2y$10$QeFfwa1unW81.evq7HIFfux.ZVLj7zs3APvrw/rw22Nf1u07sRiVS', 'male');

-- --------------------------------------------------------

-- Table structure for table `user_feedback`

CREATE TABLE `user_feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `user_feedback`

INSERT INTO `user_feedback` (`feedback_id`, `name`, `email`, `message`) VALUES
(1, 'arnob', 'arnob0188@gmail.com', 'this has been a good experience'),
(2, 'arnob', 'arnob0188@gmail.com', 'not bad'),
(3, 'sdf', 'arnob0188@gmail.com', 'testing');

-- Indexes for table `admin`

ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`),
  ADD UNIQUE KEY `email` (`email`);

-- Indexes for table `delivery_persons`

ALTER TABLE `delivery_persons`
  ADD PRIMARY KEY (`Did`),
  ADD UNIQUE KEY `email` (`email`);

-- Indexes for table `food_donations`

ALTER TABLE `food_donations`
  ADD PRIMARY KEY (`Fid`);

-- Indexes for table `donate_money`

ALTER TABLE `donate_money` ADD PRIMARY KEY (`Mid`);

-- Indexes for table `login`

ALTER TABLE `login`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

-- Indexes for table `user_feedback`

ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`feedback_id`);

-- AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `admin`

ALTER TABLE `admin`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- AUTO_INCREMENT for table `delivery_persons`

ALTER TABLE `delivery_persons`
  MODIFY `Did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- AUTO_INCREMENT for table `food_donations`

ALTER TABLE `food_donations`
  MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

-- current timestamp for donate_money

ALTER TABLE `donate_money` CHANGE `date` `date` DATE NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `donate_money` CHANGE `Fid` `Fid` INT(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `login`

ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

-- AUTO_INCREMENT for table `user_feedback`

ALTER TABLE `user_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

COMMIT;