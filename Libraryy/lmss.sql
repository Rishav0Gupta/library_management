-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 05:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `adminid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminid`, `name`, `email`, `phone`, `password`) VALUES
(1, 'SN10', 'Rishu', 'rishu@gmail.com', '1234', '789');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `bookid` varchar(50) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `pub_name` varchar(50) NOT NULL,
  `pub_year` varchar(50) NOT NULL,
  `copies` varchar(50) NOT NULL,
  `books_image` varchar(500) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookid`, `book_name`, `author_name`, `pub_name`, `pub_year`, `copies`, `books_image`, `c_name`) VALUES
(1, '100', 'Java', 'Herbert Schildt', 'McGraw-Hill', '2018', '9', 'books_image/c18c439e370b7208bd15c47206d32589java.jpg', 'CSE'),
(2, '110', 'Computer Networking', 'Kurose James F. , Ross Keith W.', 'Pearson', 'June 2017', '14', 'books_image/9cf7d8531c0c4c928d5039970647ddd0cn.jpg', 'CSE'),
(3, '130', 'Fundamentals of Database Systems', 'Shamkant B. Navathe', 'Pearson', '2017', '10', 'books_image/9f9ad23cf7cf69da1bd70502ee26bf49dbms.jpg', 'CSE'),
(5, '200', 'Harry Potter and the Sorcerers Stone', 'J. K. Rowling', 'Bloomsbury Publishing', '1997', '5', 'books_image/cecd95d1266e0ad2506d5108ae52d3ebHP1.png', 'Fiction');

--
-- Triggers `books`
--
DELIMITER $$
CREATE TRIGGER `deletedbook` AFTER DELETE ON `books` FOR EACH ROW INSERT INTO deleted_book VALUES(old.bookid,old.book_name,old.author_name,old.pub_name)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(50) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `bookid` varchar(50) NOT NULL,
  `book_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `c_name`, `bookid`, `book_name`) VALUES
(1, 'CSE', '100', 'Java'),
(2, 'CSE', '110', 'Computer Networking'),
(3, 'CSE', '130', 'Fundamentals of Database Systems'),
(4, 'Fiction', '200', 'Harry Potter and the Sorcerers Stone'),
(6, 'ECE', '900', 'abv');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_book`
--

CREATE TABLE `deleted_book` (
  `bookid` int(5) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `pub_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deleted_book`
--

INSERT INTO `deleted_book` (`bookid`, `book_name`, `author_name`, `pub_name`) VALUES
(900, 'abv', 'gfds', 'jhgf');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(50) NOT NULL,
  `usn` varchar(50) NOT NULL,
  `bookid` varchar(50) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `usn`, `bookid`, `issue_date`, `return_date`) VALUES
(4, '1234', '100', '2022-02-07', '2022-02-07'),
(5, '123', '100', '2022-02-07', '2022-02-07'),
(6, '83', '200', '2022-02-07', '0000-00-00'),
(7, '83', '110', '2022-02-07', '2022-02-07'),
(8, '83', '110', '2022-02-07', '2022-02-07'),
(9, '1234', '100', '2022-02-07', '0000-00-00');

--
-- Triggers `issue_book`
--
DELIMITER $$
CREATE TRIGGER `decr_copies` BEFORE INSERT ON `issue_book` FOR EACH ROW update books set copies=copies-1 where bookid=new.bookid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `request_book`
--

CREATE TABLE `request_book` (
  `id` int(50) NOT NULL,
  `usn` varchar(50) NOT NULL,
  `bookid` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_book`
--

INSERT INTO `request_book` (`id`, `usn`, `bookid`, `status`, `issue_date`, `due_date`) VALUES
(6, '83', '200', 'Approved', '2022-02-07', '2022-02-22'),
(9, '1234', '100', 'Approved', '2022-02-07', '2022-02-22');

--
-- Triggers `request_book`
--
DELIMITER $$
CREATE TRIGGER `incr_copies` BEFORE DELETE ON `request_book` FOR EACH ROW update books set copies=copies+1 where bookid=old.bookid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `usn` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `usn`, `branch`, `sem`, `phone`, `email`, `password`, `status`) VALUES
(1, 'Sanjana', '1234', 'is', '5', '123456', 'snjna1809@gmail.com', '123456', 'Active'),
(2, 'Riya', '123', 'CSE', '5', '123456', 'riya@gmail.com', '798', 'Active'),
(3, 'Sahil Kumar', '83', 'ISE', '5', '67890', 'singhsahil2023@gmail.com', '123', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_book`
--
ALTER TABLE `request_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request_book`
--
ALTER TABLE `request_book`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
