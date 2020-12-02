-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2018 at 10:31 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(100) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_type` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`, `user_type`, `status`) VALUES
(1, 'James Chang', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2018-11-12 16:03:24', 'admin', 1),
(2, 'Alex Ng', 'admin2@gmail.com', 'admin2', 'c84258e9c39059a89ab77d846ddab909', '2018-06-21 18:33:34', 'admin', 1),
(3, 'Irene Chon', 'admin3@gmail.com', 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6', '2018-06-21 18:33:33', 'admin', 1),
(4, 'Min Jie', 'minjie@gmail.com', 'admin4', '202cb962ac59075b964b07152d234b70', '2018-07-03 16:59:41', 'admin', 1),
(5, 'Leo Hao', 'adminl@gmail.com', 'admin6', 'c6b853d6a7cc7ec49172937f68f446c8', '2018-06-21 18:33:27', 'admin', 1),
(6, 'Alan Chong', 'alan@gmail.com', 'admin7', '788073cefde4b240873e1f52f5371d7d', '2018-06-21 18:33:14', 'admin', 1),
(7, 'Aisha ', 'aisha@gmail.com', 'admin8', '0cc175b9c0f1b6a831c399e269772661', '2018-06-22 03:38:20', 'admin', 1),
(9, 'Fong Hao', 'fh@gmail.com', 'admin9', 'eed57216df3731106517ccaf5da2122d', '2018-09-15 04:21:08', 'admin', 1),
(10, 'hueywen', 'hueywen@example.com', 'hueywen', '32d8be54541c11642fda656784c63024', '2018-10-16 13:39:05', 'admin', 1),
(11, 'tim berg', 'pizza@example.com', 'pizza', '7cf2db5ec261a0fa27a502d3196a6f60', '2018-10-18 22:43:54', 'admin', 1),
(12, 'jason mraz', 'jason@example.com', 'jason', '2b877b4b825b48a9a0950dd5bd1f264d', '2018-11-07 13:56:07', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(11) NOT NULL,
  `awardName` varchar(500) NOT NULL,
  `conferringBody` varchar(500) NOT NULL,
  `awardType` varchar(255) NOT NULL,
  `awardDetails` text NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `awardName`, `conferringBody`, `awardType`, `awardDetails`, `user_ID`) VALUES
(1, 'hlffifpqhf', 'hfoie oyer', 'nlccciofe9ur', 'hflsldfjv', '100001'),
(2, 'hlffifpqhf', 'hfoie oyer', 'nlccciofe9ur', 'hflsldfjv', '100001'),
(3, 'hlffifpqhf', 'hfoie oyer', 'nlccciofe9ur', 'hflsldfjv', '100001'),
(4, 'hlffifpqhf', 'hfoie oyer', 'nlccciofe9ur', 'hflsldfjv', '100001'),
(5, 'gem', 'gem', 'typw', 'details', '100001'),
(6, 'dance', 'sunway', 'gold', 'laravel', '100001'),
(7, 'Most talented', 'MTV', 'Recognition', '-', '100021'),
(8, 'Sunway University ', 'Jeffery Cheah\'s Foundation', 'Platinum', 'Most hardworking award', '100028'),
(9, 'award', 'sunway', 'recognition', 'invention', '100028'),
(10, 'Advisory Board Member	', 'Special Economic Committee (JKE), Malaysia	', 'Stewardship', 'details', '100001'),
(11, 'Fullbright Fellowship	', 'Fullbright	', 'Fellowship', 'Fullbright Fellowship\n', '100001'),
(12, 'Morton Medal Institution of Chemical Engineers Global Award for Excellent in Chemical Engineering Education	', 'Institution of Chemical Engineering (ICE)	', 'Recognition', 'Invention Title: Indoor Air Quality Monitoring Portable Design\n', '100001'),
(13, 'Gold	', 'Malaysian Association Research Scientist (MARS)	', 'Invention Award	', 'Invention Title: Indoor Air Quality Monitoring Portable Design\n', '100001'),
(14, 'Advisory Board Member	', 'Special Economic Committee (JKE), Malaysia	', 'Stewardship', 'stewardship', '100001'),
(15, 'rqiwourq0', 'woeyrowyroq', 'reowihfwoe', 'hfowieyroewhew foi hoihoiwe', '100001'),
(16, 'rqiwourq0', 'woeyrowyroq', 'reowihfwoe', 'hfowieyroewhew foi hoihoiwe', '100001'),
(17, 'heoffhoiew', 'jfejwqijfq', 'jocjeof', 'newihfe', '100001'),
(18, 'Eg. Fullbright Fellowship	', 'Fullbright', 'Fellowship	', 'Fullbright Fellowship\n', '100001'),
(19, 'q', 'w', 'e', 't', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `books-chaps`
--

CREATE TABLE `books-chaps` (
  `id` int(11) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `chapTitle` varchar(255) NOT NULL,
  `bookTitle` varchar(255) NOT NULL,
  `bookEditor` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `isbn_no` varchar(255) NOT NULL,
  `pageStart` int(11) NOT NULL,
  `pageEnd` int(11) NOT NULL,
  `otherInfo_url` varchar(255) NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books-chaps`
--

INSERT INTO `books-chaps` (`id`, `authors`, `chapTitle`, `bookTitle`, `bookEditor`, `publisher`, `isbn_no`, `pageStart`, `pageEnd`, `otherInfo_url`, `user_ID`) VALUES
(1, '1', '1', '1', '11', '1', '1', 1, 1, '1', '100001'),
(2, '2', '2', '2', '2', '2', '2', 2, 2, '2', '100001'),
(3, 'huey', 'chap', 'book', 'editor', 'sunway', '2343', 2, 40, 'hehwfoq', '100001'),
(5, 'jennifer', 'contrator', 'QS', 'QS', 'taylor\'s', 'hd932847', 20, 80, 'other info', '100001'),
(6, 'Abdeel Aziz', 'Chapter tutle', 'book title ', 'editor name ', 'pub;isher', '231084', 123, 321, 'facebook.com', '100028'),
(7, 'wee', 'chap', 'book', 'editor ', 'publisher', '1382018', 100, 200, '', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `eduDetails`
--

CREATE TABLE `eduDetails` (
  `id` int(11) NOT NULL,
  `eduLevel` varchar(255) NOT NULL,
  `degreeName` varchar(255) NOT NULL,
  `memberRegNo` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eduDetails`
--

INSERT INTO `eduDetails` (`id`, `eduLevel`, `degreeName`, `memberRegNo`, `year`, `institute`, `country`, `user_ID`) VALUES
(1, 'Certificates', 'fia', '1234567', '2004-2005', 'sunway', 'Malaysia', '100001'),
(2, 'Bachelors Degrees', 'rger', 'erger', '2006-2010', 'lancaster', 'uk', '100001'),
(3, 'Bachelors Degrees', 'music', '740328402', '2011-2015', 'Oxford', 'uk', '100001'),
(4, 'Professional Qualification', 'acca', '1234567', '2015-2018', 'sunway', 'Malaysia', '100001'),
(6, 'Bachelors Degrees', 'computer science', '0987651', '2015-2018', 'lancaster', 'uk', '100001'),
(7, 'Certificates', 'A-levels', '-', '2008', 'Cambridge', 'UK', '100021'),
(8, 'Certificates', 'comp ', '', '2001', 'goeifew', 'malaysia', '100028'),
(9, 'Certificates', 'qwerer', '', '2003', 'foqeifoqe', 'uk', '100028'),
(10, 'Bachelors Degrees', 'comp sc', '', '2005', 'sunway', 'malaysia', '100028'),
(11, 'Masters', 'master in business administration', '', '2020-2022', 'Oxford', 'UK', '100001'),
(12, 'Doctoral Degrees', 'xx', '', '2025-2028', 'abd', 'malaysia', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `ips`
--

CREATE TABLE `ips` (
  `id` int(11) NOT NULL,
  `nameIP` varchar(255) NOT NULL,
  `IPtype` varchar(255) NOT NULL,
  `creators` varchar(255) NOT NULL,
  `dateReg` date NOT NULL,
  `refNo` varchar(255) NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ips`
--

INSERT INTO `ips` (`id`, `nameIP`, `IPtype`, `creators`, `dateReg`, `refNo`, `user_ID`) VALUES
(1, 'qwertyuiop', '1', '1', '2018-10-01', '1', '100001'),
(2, 'title of creation ', 'software', 'Ong Huey Wen', '2018-11-14', '239379274', '100028'),
(3, 'Sun-U Experts', 'Software', 'Ong Huey Wen, Sunway University', '2018-08-01', '732070248', '100028'),
(4, 'creation', 'software', 'name', '2018-11-16', 'xxxxx', '100001'),
(5, 'creation', 'software', 'creator name', '2018-11-16', 'xxxxxx', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` int(11) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `publicationTitle` varchar(255) NOT NULL,
  `journalName` varchar(255) NOT NULL,
  `issueVol` int(11) NOT NULL,
  `startPage` int(11) NOT NULL,
  `endPage` int(11) NOT NULL,
  `issn` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `authors`, `publicationTitle`, `journalName`, `issueVol`, `startPage`, `endPage`, `issn`, `url`, `user_ID`) VALUES
(1, '1', 'q', 'q', 2, 23, 44, '43253', 'http://www.huefgowefo.com', '100001'),
(2, '1', '1', '1', 1, 88, 128, '1', 'https://youtube.com', '100001'),
(3, 'HHueywen', 'qwertyuiop', 'journal', 2, 38, 88, '1234567890', 'https://facebook.com', '100001'),
(4, 'authors', 'title of publucation', 'name of journal', 2, 23, 44, '42914y12', 'fhioeqrfqe', '100028'),
(5, 'authors', 'publication', 'name', 12, 123, 321, '123232', 'http://facebook.com', '100001'),
(6, 'Ryan Tedder', 'title of publication', 'journal', 123, 11, 22, '42434', 'sunway.edu.my', '100001'),
(7, 'qwertyuiop', 'title', 'name', 12, 12, 33, '122344', '', '100001'),
(8, 'authors', 'title ', 'name', 12, 123, 150, 'ryuiwyeroqw', '', '100001'),
(9, 'qwerty', 'title', 'name', 12, 123, 130, 'qwerty', '', '100001'),
(10, 'authors', 'title', 'name', 3, 12, 30, 'yiuwyrir', '', '100001'),
(11, 'qwerty', 'title', 'name', 12, 123, 130, 'qwerty', '', '100001'),
(12, 'authors', 'publication', 'journal', 1, 123, 130, 'weqwrh', '', '100001'),
(13, 'q`', 'w', 'e', 1, 12, 12, '238923', '', '100001'),
(14, 'authors ', 'title ', 'name', 12, 12, 33, 'hoehf', '', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `memberType` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `position` varchar(255) NOT NULL,
  `appointmentStart` date NOT NULL,
  `appointmentEnd` date NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `name`, `memberType`, `startDate`, `endDate`, `position`, `appointmentStart`, `appointmentEnd`, `user_ID`) VALUES
(1, 'name', 'Senior', '2011-02-01', '2013-03-15', 'Chair', '2011-02-01', '2013-03-15', '100001'),
(2, 'hueywen', 'Life', '2018-10-19', '2018-12-31', 'NA', '2018-10-20', '2018-10-11', '100001'),
(4, 'ngos', 'Senior', '2018-10-07', '2018-10-31', 'Committee Member', '2018-10-21', '2018-10-31', '100001'),
(5, 'NGO', 'Ordinary', '2018-11-13', '2018-11-30', 'Committee Member', '2018-11-22', '2018-11-22', '100028'),
(6, 'association', 'Ordinary', '2018-11-22', '2022-12-31', 'Committee Member', '2018-11-13', '2022-12-31', '100028'),
(7, 'association', 'Ordinary', '2018-11-14', '2030-01-01', 'Committee Member', '0000-00-00', '0000-00-00', '100028'),
(8, 'BoDy', 'Ordinary', '2018-11-15', '2018-11-15', 'NA', '0000-00-00', '0000-00-00', '100028'),
(9, 'association of something', 'Ordinary', '2018-11-05', '2022-12-31', 'Chair', '2018-11-16', '2022-12-31', '100001'),
(10, 'fef', 'Senior', '2018-11-16', '2018-11-16', 'Chair', '2018-11-16', '2018-11-16', '100001'),
(11, 'qwe', 'Ordinary', '0000-00-00', '0000-00-00', 'NA', '0000-00-00', '0000-00-00', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `other_publications`
--

CREATE TABLE `other_publications` (
  `id` int(11) NOT NULL,
  `authors` text NOT NULL,
  `docType` varchar(255) NOT NULL,
  `articleTitle` varchar(255) NOT NULL,
  `sourceName` varchar(255) NOT NULL,
  `vol` int(11) NOT NULL,
  `pageNo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `issn_ibsn` varchar(255) NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_publications`
--

INSERT INTO `other_publications` (`id`, `authors`, `docType`, `articleTitle`, `sourceName`, `vol`, `pageNo`, `url`, `issn_ibsn`, `user_ID`) VALUES
(1, 'alice qwerty', 'w', 'elmo and frienda', 'r', 9, '0', 'http://www.lol.com', '283272', '100001'),
(2, 'anna beckham', 's', 'bunny ', 'g', 3, '0', 'https://www.tumblr.com', '864298', '100001'),
(3, 'Emma wilson', 'newsletter', 'turbo ', 'wieuweu', 12, '324', 'http://facebook.com', '27492874', '100028'),
(4, 'amir', 'policy', 'Turbo-machinery Project Execution For CO2 Gas Field: Challenges and Obstacles	', 'International of Journal Social Science and Humanity	', 12, '56-60', 'facebook.com', '20103646', '100028'),
(5, 'author', 'doctype', 'article', 'sunway', 1, '12', '', '8740ue224', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `patents`
--

CREATE TABLE `patents` (
  `id` int(11) NOT NULL,
  `patentID` varchar(255) NOT NULL,
  `yearGranted` int(4) NOT NULL,
  `investors` varchar(255) NOT NULL,
  `patentName` varchar(255) NOT NULL,
  `countryFiled` varchar(255) NOT NULL,
  `dateFiled` date NOT NULL,
  `dateGranted` date NOT NULL,
  `dateObtainCert` date NOT NULL,
  `expiryDate` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patents`
--

INSERT INTO `patents` (`id`, `patentID`, `yearGranted`, `investors`, `patentName`, `countryFiled`, `dateFiled`, `dateGranted`, `dateObtainCert`, `expiryDate`, `status`, `user_ID`) VALUES
(1, 'etetwetwet', 2001, 'foeiwfw', 'ngwgnw', 'new zealand', '2018-10-19', '2018-10-12', '2018-10-19', '2020-01-01', 'Granted', '100001'),
(2, '2354354', 2000, 'moooo', 'pdmasm', 'fmlewf', '2018-10-19', '2018-10-19', '2018-10-19', '2018-10-19', 'Pending', '100001'),
(3, 'wewqwr', 0, 'name', 'name', 'malaysia', '2018-11-14', '0000-00-00', '0000-00-00', '0000-00-00', 'Pending', '100028'),
(4, 'wuqur', 0, 'hueywen', 'Method for Preparing Spherical Shaped Polous Ceramic Microcarrier using Sago as Porgens	', 'malaysia', '2018-11-14', '0000-00-00', '0000-00-00', '0000-00-00', 'Pending', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `proceedings`
--

CREATE TABLE `proceedings` (
  `id` int(11) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `paperTitle` varchar(255) NOT NULL,
  `proceedingsTitle` varchar(255) NOT NULL,
  `issueVol` int(11) NOT NULL,
  `pageNo` int(11) NOT NULL,
  `articleID` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `issn_ibsn` varchar(255) NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proceedings`
--

INSERT INTO `proceedings` (`id`, `authors`, `paperTitle`, `proceedingsTitle`, `issueVol`, `pageNo`, `articleID`, `url`, `issn_ibsn`, `user_ID`) VALUES
(1, 'kate spade', 'paper bag', '1', 1, 111, '1', '1', '1', '100001'),
(2, 'keith chan', '2', '2', 2, 2, '2', '2', '2', '100001'),
(3, 'amber rose', '3', '3', 3, 3, '3', '3', '3', '100001'),
(4, 'john doe, jane doe', '8', '8', 8, 8, '8', '8', '8', '100001'),
(5, 'sean paul', '9', '9', 9, 9, '9', '99', '9', '100001'),
(6, 'jessie tan, ryan tedder', '1', '1', 1, 1, '1', '1', '1', '100001'),
(7, 'chris martin', 'weee', 'e', 0, 0, 'y', 'u', 'p', '100001'),
(8, 'ali, abu , akau', 'paper title', 'proceedings', 123, 123, 'erur23', 'tumblr.com', 'r38r03', '100028'),
(9, 'a', 's', 'f', 1, 13, '18', 'jdwjwq', 'fewfoew', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `projName` varchar(255) NOT NULL,
  `communityName` varchar(255) NOT NULL,
  `relatedProj` varchar(255) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `sponsorship` varchar(11) NOT NULL,
  `description` varchar(20000) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projName`, `communityName`, `relatedProj`, `organizer`, `sponsorship`, `description`, `startDate`, `endDate`, `user_ID`) VALUES
(1, 'new project', 'community name', 'related project', 'adidas', '10000', 'helloworld', '2018-10-19', '2018-10-24', '100001'),
(2, 'spotify', 'spotify team', 'music player', 'funder', '200000', 'music speak', '2018-02-09', '2018-12-31', '100001'),
(3, 'new project', 'community name', 'related project', 'adidas', '10000', 'helloworld', '2018-10-19', '2018-10-25', '100001'),
(4, 'new project', 'community name', 'related project', 'adidas', '1000', 'helloworld', '2018-10-01', '2018-10-31', '100001'),
(5, 'hello world this is really really really long shit', 'community name', 'related project', 'nike', '10000', 'description goes here', '2018-11-13', '2018-11-20', '100028'),
(6, 'project name ', 'community name\n', 'project related are bla', 'sponsor', '30000', 'description goes here', '2018-11-01', '2018-11-30', '100028'),
(7, 'Community Project in Cambodia	', 'KHLEANG SBEK Village, KANDAL Territory, Cambodia	', 'KTP Project	', 'UTM', '30000', 'UTM and NGO developed a commercial centre worth 30,000 through Pembanguanan Lestari Komuniti ASEAN program. The centre, equipped with a hostel, vehicle workshop, sewing centre, supermart and cyber centre is expected to complete 2016. Project is sponsored by NGO/Women\'s Welfare Association of Sakinah, Pasir Gudang.	', '2018-11-01', '2019-05-31', '100028'),
(8, 'Community Project in Cambodia	', 'KHLEANG SBEK Village, KANDAL Territory, Cambodia	', 'KTP Project	', 'UTM', '30,000	', 'UTM and NGO developed a commercial centre worth 30,000 through Pembanguanan Lestari Komuniti ASEAN program. The centre, equipped with a hostel, vehicle workshop, sewing centre, supermart and cyber centre is expected to complete 2016. Project is sponsored by NGO/Women\'s Welfare Association of Sakinah, Pasir Gudang.	', '2018-11-16', '2018-11-16', '100001'),
(9, 'q', 'e', 'r', 'y', '100,000', 'description', '2018-11-16', '2018-11-30', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `researchArea`
--

CREATE TABLE `researchArea` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `areas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researchArea`
--

INSERT INTO `researchArea` (`id`, `category`, `areas`) VALUES
(1, 'Pure Science', 'ps_chemistry'),
(2, 'Pure Science', 'ps_physics'),
(3, 'Pure Science', 'ps_biology'),
(4, 'Pure Science', 'ps_biochemistry'),
(5, 'Pure Science', 'ps_materials_science'),
(6, 'Pure Science', 'ps_mathematics_and_statistics'),
(7, 'Applied Science', 'as_chemistry'),
(8, 'Applied Science', 'as_physics'),
(9, 'Applied Science', 'as_biology'),
(10, 'Applied Science', 'as_mathematics_and_statistics'),
(11, 'Applied Science', 'as_biotechnology'),
(12, 'Applied Science', 'as_materials_science'),
(13, 'Technology and Engineering', 'mechanical_and_manufacturing'),
(14, 'Technology and Engineering', 'electrical_and_electronic'),
(15, 'Technology and Engineering', 'material_and_polymer'),
(16, 'Technology and Engineering', 'chemical_engineering_and_processing'),
(17, 'Technology and Engineering', 'energy_and_green_technology'),
(18, 'Technology and Engineering', 'infrastructure_and_transportation'),
(19, 'Technology and Engineering', 'construction_and_construction_materials'),
(20, 'Technology and Engineering', 'mineral_and_geoscience'),
(21, 'Technology and Engineering', 'aerospace_and_geophysics'),
(22, 'Information and Communication Technology', 'Software_and_Information_System'),
(23, 'Information and Communication Technology', 'computer_networking'),
(24, 'Information and Communication Technology', 'information_security'),
(25, 'Information and Communication Technology', 'multimedia'),
(26, 'Information and Communication Technology', 'computer_engineering'),
(27, 'Information and Communication Technology', 'computer_science'),
(28, 'Clinical and Health Sciences', 'basic_medical_sciences'),
(29, 'Clinical and Health Sciences', 'pharmacy'),
(30, 'Clinical and Health Sciences', 'pharmacology'),
(31, 'Clinical and Health Sciences', 'medical_microbiology'),
(32, 'Clinical and Health Sciences', 'parasitology'),
(33, 'Clinical and Health Sciences', 'pathology'),
(34, 'Clinical and Health Sciences', 'community_medical_prevention'),
(35, 'Clinical and Health Sciences', 'clinical_surgical'),
(36, 'Clinical and Health Sciences', 'clinical_medical_associate_health_science'),
(37, 'Clinical and Health Sciences', 'dental'),
(38, 'Clinical and Health Sciences', 'nursing_science'),
(39, 'Social Sciences', 'anthropology'),
(40, 'Social Sciences', 'psychology'),
(41, 'Social Sciences', 'sociology'),
(42, 'Social Sciences', 'political_science'),
(43, 'Social Sciences', 'management_business'),
(44, 'Social Sciences', 'geography'),
(45, 'Social Sciences', 'economics'),
(46, 'Social Sciences', 'human_ecology'),
(47, 'Social Sciences', 'communication'),
(48, 'Social Sciences', 'tourism'),
(49, 'Arts and Applied Arts', 'language_and_linguistic'),
(50, 'Arts and Applied Arts', 'literature'),
(51, 'Arts and Applied Arts', 'religion'),
(52, 'Arts and Applied Arts', 'philosophy'),
(53, 'Arts and Applied Arts', 'civilazation'),
(54, 'Arts and Applied Arts', 'history'),
(55, 'Arts and Applied Arts', 'art_and_design'),
(56, 'Arts and Applied Arts', 'arts_culture'),
(57, 'Arts and Applied Arts', 'education'),
(58, 'Arts and Applied Arts', 'principle_and_law'),
(59, 'Arts and Applied Arts', 'arts_built_environment'),
(60, 'Arts and Applied Arts', 'arts_environment'),
(61, 'Natural Sciences and National Heritage', 'environment'),
(62, 'Natural Sciences and National Heritage', 'forestry'),
(63, 'Natural Sciences and National Heritage', 'agriculture'),
(64, 'Natural Sciences and National Heritage', 'Marine'),
(65, 'Natural Sciences and National Heritage', 'Archaeology'),
(66, 'Natural Sciences and National Heritage', 'Geology'),
(67, 'Natural Sciences and National Heritage', 'Ethnography'),
(68, 'Natural Sciences and National Heritage', 'Built_Environment'),
(69, 'Natural Sciences and National Heritage', 'Culture'),
(70, 'Natural Sciences and National Heritage', 'Various_Biology');

-- --------------------------------------------------------

--
-- Table structure for table `researcharea_details`
--

CREATE TABLE `researcharea_details` (
  `id` int(11) NOT NULL,
  `user_ID` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researcharea_details`
--

INSERT INTO `researcharea_details` (`id`, `user_ID`, `area`, `category`) VALUES
(74, '100028', 'mechanical_and_manufacturing', 'Technology and Engineering'),
(75, '100028', 'electrical_and_electronic', 'Technology and Engineering'),
(76, '100028', 'material_and_polymer', 'Technology and Engineering'),
(77, '100028', 'chemical_engineering_and_processing', 'Technology and Engineering'),
(78, '100028', 'energy_and_green_technology', 'Technology and Engineering'),
(79, '100028', 'infrastructure_and_transportation', 'Technology and Engineering'),
(80, '100028', 'construction_and_construction_materials', 'Technology and Engineering'),
(81, '100028', 'mineral_and_geoscience', 'Technology and Engineering'),
(82, '100028', 'aerospace_and_geophysics', 'Technology and Engineering'),
(159, '100001', 'mechanical_and_manufacturing', 'Technology and Engineering'),
(160, '100001', 'electrical_and_electronic', 'Technology and Engineering'),
(161, '100001', 'material_and_polymer', 'Technology and Engineering'),
(162, '100001', 'chemical_engineering_and_processing', 'Technology and Engineering'),
(163, '100001', 'energy_and_green_technology', 'Technology and Engineering'),
(164, '100001', 'infrastructure_and_transportation', 'Technology and Engineering'),
(165, '100001', 'construction_and_construction_materials', 'Technology and Engineering'),
(166, '100001', 'mineral_and_geoscience', 'Technology and Engineering'),
(167, '100001', 'aerospace_and_geophysics', 'Technology and Engineering'),
(168, '100001', 'software_and_information_system', 'Information and Communication Technology'),
(169, '100001', 'computer_networking', 'Information and Communication Technology'),
(170, '100001', 'information_security', 'Information and Communication Technology'),
(171, '100001', 'multimedia', 'Information and Communication Technology'),
(172, '100001', 'computer_engineering', 'Information and Communication Technology'),
(173, '100001', 'computer_science', 'Information and Communication Technology'),
(174, '100001', 'environment', 'Natural Sciences and National Heritage'),
(175, '100001', 'forestry', 'Natural Sciences and National Heritage'),
(176, '100001', 'agriculture', 'Natural Sciences and National Heritage'),
(177, '100001', 'marine', 'Natural Sciences and National Heritage'),
(178, '100001', 'archaeology', 'Natural Sciences and National Heritage'),
(179, '100001', 'geology', 'Natural Sciences and National Heritage'),
(180, '100001', 'ethnography', 'Natural Sciences and National Heritage'),
(181, '100001', 'built_environment', 'Natural Sciences and National Heritage'),
(182, '100001', 'culture', 'Natural Sciences and National Heritage'),
(183, '100001', 'various_biology', 'Natural Sciences and National Heritage');

-- --------------------------------------------------------

--
-- Table structure for table `research_activities`
--

CREATE TABLE `research_activities` (
  `id` int(11) NOT NULL,
  `researchTitle` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `collabName` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `moa_loa` varchar(255) NOT NULL,
  `fundingBody` varchar(255) NOT NULL,
  `fundingAmount` varchar(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_activities`
--

INSERT INTO `research_activities` (`id`, `researchTitle`, `country`, `collabName`, `position`, `moa_loa`, `fundingBody`, `fundingAmount`, `startDate`, `endDate`, `user_ID`) VALUES
(1, '1', 'Malaysia', 'efwf', 'Leader', '1', '1', '1', '2018-10-18', '2018-10-19', '100001'),
(2, '1', 'UK', '3', 'Leader', 'q', 'w', '0', '2018-10-15', '2018-10-19', '100001'),
(3, 'qwt', 'Malaysia', 'dwqodhq, monash', 'Member', 'q', 'hdwqoid', '100', '2018-10-25', '2018-10-31', '100001'),
(4, 'title', 'malaysia', 'linda, albert, Newcastle', 'Leader', 'MoA', 'Adidas', '2000', '2018-11-15', '2018-11-21', '100028'),
(5, 'Q', 'Q', 'Q', 'Leader', 'Q', 'Q', '23000', '2018-11-16', '2018-11-16', '100001'),
(6, 'q', 'e', 'r', 'Leader', 'q', 'e', '0', '2018-11-16', '2018-11-23', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffs`
--

CREATE TABLE `tbl_staffs` (
  `id` int(10) NOT NULL,
  `StaffId` varchar(6) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `position` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `summary` varchar(50000) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `profile_picture` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staffs`
--

INSERT INTO `tbl_staffs` (`id`, `StaffId`, `firstName`, `lastName`, `nationality`, `dob`, `email`, `startDate`, `position`, `faculty`, `department`, `summary`, `password`, `status`, `profile_picture`, `created_on`, `updated_on`, `user_type`, `api_key`) VALUES
(1, '100001', 'Ryan', '   Tedder', 'Malaysian', '1993-03-15', 'ryan@example.com', '2018-01-02', 'Professor', 'School of Arts', 'Department of Performance and Media', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating autistic students.', 'e2a6a1ace352668000aed191a817d143', '1', 'uploads/profileImage-5bdac8c61e9b02.83058417.jpg', '2018-10-17 19:47:54', '2018-10-17 19:47:54', 'user', 'Fv0BI6UwCkbwCPfxvGJ6rtXkNcVbeSYcLBURGTNAiK6mxoEIY6JhyBARkd5xLcztRLgQDiDw'),
(2, '100002', 'Shane', '  Fillan', 'UK', '1993-03-15', 'shane@example.com', '2018-10-10', 'Professor', 'School of Arts', 'Department of Marketing', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', 'bb36c34eb6644ab9694315af7d68e629', '1', 'uploads/profileImage-5bdb229c23ef98.77547865.jpg', '2018-10-17 19:49:39', '2018-10-17 19:49:39', 'user', 'y5z16fYRrCiMO90M2bWiNfUzlQRqHSfGILcrYGhP14ziKZ6lPneWHIEgsI2pdTIdnPx3hJHv'),
(3, '100003', 'Chiara', ' Ferragni', 'Malaysian', '1993-03-15', 'chiara@example.com', '2018-10-10', 'Professor', 'School of Hospitality', 'Department of Hospitality', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '3dc81e3f2c523fb5955761bbe2d150f2', '1', 'uploads/profileImage-5bdb23c3da37d1.42470225.jpg', '2018-10-17 19:52:02', '2018-10-17 19:52:02', 'user', 'yxWZVzOMAGF6yFT2XgtQQ6FXNg6WdkjaLLjJOo3kp0ooVKKgM4AlfeJMA7lFucahzoKnvCq8'),
(4, '100004', 'Jennifer', ' Lawrence', 'Malaysian', '1993-03-15', 'kate@example.com', '2018-10-10', 'Professor', 'School of Science and Technology', 'Department of Computing and Information System', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '1ea85063355fbfad3de73ab038261d62', '1', 'uploads/profileImage-5bdf578d1d0ad6.39995200.jpg', '2018-10-30 14:59:01', '2018-10-30 14:59:01', 'user', ''),
(5, '100005', 'Martin', ' Garrix', 'Malaysian', '1993-03-15', 'martin@example.com', '2018-10-10', 'Professor', 'School of Science and Technology', 'Department of Biological Sciences', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', 'efd1a2f9b0b5f14b1fac70a7f8e8a9e7', '1', 'uploads/profileImage-5bdb2ae38a10a0.52387104.jpg', '2018-10-30 14:59:45', '2018-10-30 14:59:45', 'user', ''),
(6, '100006', 'Tereza', '  Kaceravá', 'Malaysian', '1993-03-15', 'tereza@example.com', '2018-10-10', 'Professor', 'School of Science and Technology', 'Department of Psychology', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '758691fdf7ae3403db0d3bd8ac3ad585', '1', 'uploads/profileImage-5bdb2c293c9be2.01733233.jpeg', '2018-10-30 15:09:53', '2018-10-30 15:09:53', 'user', ''),
(7, '100007', 'Calvin', '  Harris', 'Malaysian', '1993-03-15', 'calvin@example.com', '2018-10-10', 'Professor', 'School of Hospitality', 'Department of Hospitality', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '9e3fc2a6d0f45c7a999ab01ebcacaf94', '1', 'uploads/profileImage-5bdb2cb43dca87.41580675.jpg', '2018-10-30 15:24:36', '2018-10-30 15:24:36', 'user', ''),
(8, '100008', 'Tim', ' Berg', 'Malaysian', '1993-03-15', 'tim@example.com', '2018-10-10', 'Professor', 'School of Mathematical Science', 'Department of Applied Statistics', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', 'ab24c2fe5b396a574095a73b1ad23356', '1', 'uploads/profileImage-5bdb2da61602d7.76127111.jpg', '2018-10-30 15:25:55', '2018-10-30 15:25:55', 'user', ''),
(9, '100009', 'Ruby', '  Rose', 'Malaysian', '1993-03-15', 'ruby@example.com', '2018-10-10', 'Professor', 'School of Mathematical Science', 'Department of Actuarial Science and Risks', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '795202367b2120e77b231d4d2b98e2b9', '1', 'uploads/profileImage-5bdb2ea0c3fff0.74613364.jpeg', '2018-10-30 15:26:41', '2018-10-30 15:26:41', 'user', '5COdbgGwLLY3GhOUAwQJGDJ4FbjkGEL1Gz0Xmi9N72pMOYPteqTLUE0VtlvDgiCNY4agl3JU'),
(10, '100010', 'Adam', ' Levine', 'Malaysian', '1993-03-15', 'adam@example.com', '2018-10-10', 'Professor', 'School of Mathematical Science', 'Department of Pure and Applied Maths', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', 'daa28096f9e8879ab3a02b90aa0e2f83', '1', 'uploads/profileImage-5bdb2f28defaa0.07986000.jpg', '2018-10-30 15:27:40', '2018-10-30 15:27:40', 'user', 'xVqRZBYamYU8tTdq3dg2VmL6CLt8AiZi8u82LF2wkOC6rReeiefq27kUFQYaH5tG9o03tzFV'),
(11, '100011', 'Sam', '  Smith', 'Malaysian', '1993-03-15', 'sam@example.com', '2018-10-10', 'Professor', 'School of Healthcare and Medical Science', 'Department of Nursing', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '09a146c8d1cfdbdb54ceb60ede93cdab', '1', 'uploads/profileImage-5bdb31b73ecb70.98661586.jpg', '2018-10-30 15:28:18', '2018-10-30 15:28:18', 'user', 'VgwJ2XcF49Fte4aLe8dCaYTuBJRA4d0B1RpM3MOiANCIp8Glt2w0WsqA5pvrgN785BQ33BZU'),
(12, '100012', 'Nicky', '  Romero', 'Malaysian', '1993-03-15', 'nicky@example.com', '2018-10-10', 'Professor', 'School of Healthcare and Medical Science', 'Department of Medical Sciences', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '21bf043d935e1499b3749c2f483df890', '1', 'uploads/profileImage-5bdb32b0e395e9.31085350.jpg', '2018-10-30 15:29:15', '2018-10-30 15:29:15', 'user', ''),
(13, '100013', 'Shawn', '   Yue', 'Malaysian', '1993-03-15', 'shawn@example.com', '2018-10-10', 'Professor', 'School of Arts', 'Department of Accounting', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '33932d50e450ef3ccfbcf69ac9ba04e5', '1', 'uploads/profileImage-5bdb349b2d0ab6.91032221.jpeg', '2018-10-30 15:30:21', '2018-10-30 15:30:21', 'user', 'RCCCAzJLuNsk8EZuoRSnTg6H4jjBlVHMQmN4TZ7EjbzcUwWkIAP9vLMmfEpE8D6UTM4m86DU'),
(14, '100014', 'Emma', '      Watson', 'Malaysian', '1993-03-15', 'emma@example.com', '2018-10-10', 'Professor', 'School of Arts', 'Department of Business Analytics', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', 'a3c3a95f3e42519d7ba5284cffcd4e25', '1', 'uploads/profileImage-5bdb363b4d3025.51030461.jpg', '2018-10-30 15:32:10', '2018-10-30 15:32:10', 'user', ''),
(15, '100015', 'Nichole', ' Ciotti', 'Malaysian', '1993-03-15', 'nichole@example.com', '2018-10-10', 'Professor', 'School of Arts', 'Department of Economics and Finance', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', 'e025b5159bba8890d4f936973d0bcb2f', '1', 'uploads/profileImage-5bdb36b2f31ca1.87462516.jpg', '2018-10-30 15:33:56', '2018-10-30 15:33:56', 'user', 'vOsYPjSVNDqbvLmUyjdSD4Kh8Kc7BdyKRYFzUVkmfvhUPHkibmrzmanktgQiK81M2TWry0jg'),
(16, '100016', 'Avril', ' Lavigne', 'Malaysian', '1993-03-15', 'avril@example.com', '2018-10-10', 'Professor', 'School of Arts', 'Department of Art and Design', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '89deb442ec0592fb5fc8b4908cbf1580', '1', 'uploads/profileImage-5bdb3794832843.63028191.jpg', '2018-10-30 15:34:45', '2018-10-30 15:34:45', 'user', 'OVRt3VlDdIY2mB2GQIwZeMONHhsJELST2vaA78wNRIn5E5RlVexsYyFpdD505yLagNf2J6eP'),
(17, '100017', 'Chrissy', '  Teigen', 'Malaysian', '1993-03-15', 'chrissy@example.com', '2018-10-10', 'Professor', 'School of Arts', 'Department of Performance and Media', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '07986d41d4c01c67d4b91cdcf10cb777', '1', 'uploads/profileImage-5bdb38e95baa45.36545954.jpg', '2018-10-30 15:35:30', '2018-10-30 15:35:30', 'user', ''),
(18, '100018', 'Katy', ' Perry', 'Malaysian', '1993-03-15', 'katy@example.com', '2018-10-10', 'Professor', 'School of Arts', 'Department of Management', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '1be1ef5ef17c532b377b5238c07adf78', '1', 'uploads/profileImage-5bdb3960abbe72.67258185.jpg', '2018-10-30 17:29:57', '2018-10-30 17:29:57', 'user', ''),
(19, '100019', 'Victoria', ' Beckham', 'Malaysian', '1993-03-15', 'victoria@example.com', '2018-10-10', 'Professor', 'School of Arts', 'Department of Art and Design', 'Degree in English Literature with four years experience teaching high school literature, creative writing, and grammar. Certification in teaching English as a Second Language and educating mentally disabled high school students.', '8a8eac8eaeca4d75f0cafc20319c06af', '1', 'uploads/profileImage-5bdb39d1d2f904.91799311.jpg', '2018-10-30 17:45:10', '2018-10-30 17:45:10', 'user', 'frSCLRubJjly8UWDKMSNkR0pntu6cl9FLLHMk069wrOWEmXNzmziTaqc1D92xsmvlMUEU0b1'),
(20, '100020', 'Eddie', '     Peng', 'Taiwan', '1988-07-01', 'eddie@example.com', '2013-01-01', 'Senior Lecturer', 'School of Science and Technology', 'Department of Computing and Information System', 'hello word', '6372b5b816b700cbb03a54c7859c416c', '1', 'uploads/profileImage-5bdff8682d0d64.58322607.jpeg', '2018-11-04 20:58:10', '2018-11-04 20:58:10', 'user', ''),
(21, '100021', 'Gigi', ' Hadid', 'American', '1898-01-23', 'gigi@example.com', '2016-01-01', 'Senior Lecturer', 'School of Science and Technology', 'Department of Computing and Information System', 'Gigi style', '10e54ab2f0c23c9be1e5e5c20e8b1d8b', '1', 'uploads/profileImage-5be1d399c14112.62639521.jpg', '2018-11-06 17:35:24', '2018-11-06 17:35:24', 'user', 'OwBUc7qETkNqPTcLr5yAV5sEEULubMkS1HvLJ2emw0CdGo6Dl55YK842ZZlzNTZGnUGp6C2w'),
(22, '100022', 'John', 'Doe', '', '0000-00-00', 'john@example.com', '0000-00-00', '', 'School of Science and Technology', 'Department of Computing and Information System', '', '70314ca6c279ed0aa1d108f91c088ca5', '1', NULL, '2018-11-12 04:03:26', '2018-11-12 04:03:26', 'user', ''),
(23, '100023', 'Jane', 'Doe', '', '0000-00-00', 'jane@example.com', '0000-00-00', '', 'School of Science and Technology', 'Department of Computing and Information System', '', '65feb6b8c9726133b18ac2f2ac26e8bc', '1', NULL, '2018-11-12 04:37:21', '2018-11-12 04:37:21', 'user', ''),
(24, '100024', 'Thomas', 'Philippe', '', '0000-00-00', 'thomas@example.com', '0000-00-00', '', 'School of Science and Technology', 'Department of Computing and Information System', '', 'a6b83cd033881e4b7e0ade6add26a17b', '1', NULL, '2018-11-12 04:44:48', '2018-11-12 04:44:48', 'user', ''),
(25, '100025', 'Jimmy', 'Lin', '', '0000-00-00', 'jimmy@example.com', '0000-00-00', '', 'School of Science and Technology', 'Department of Computing and Information System', '', 'e55a28b1bf2a323456ea0b7e759d6108', '1', NULL, '2018-11-12 05:57:24', '2018-11-12 05:57:24', 'user', ''),
(26, '100026', 'Godfrey', 'Gao', '', '0000-00-00', 'godfrey@example.com', '0000-00-00', '', 'School of Science and Technology', 'Department of Computing and Information System', '', '808d45ab3ba50fe7576f6974f18244d3', '1', NULL, '2018-11-12 06:16:18', '2018-11-12 06:16:18', 'user', ''),
(27, '100027', 'Rachel', 'Platten', '', '0000-00-00', 'rachel@example.com', '0000-00-00', '', 'School of Science and Technology', 'Department of Computing and Information System', '', 'f9a595bbc8de0c52cd25e6ad538533db', '1', NULL, '2018-11-12 06:21:28', '2018-11-12 06:21:28', 'user', ''),
(28, '100028', 'Zyan', '  Malik', '', '0000-00-00', 'zyan@example.com', '2018-11-01', 'Lecturer', 'School of Science and Technology', 'Department of Computing and Information System', '', '5a09496f31a51dc9d90b26b31b05cc18', '1', NULL, '2018-11-12 08:16:48', '2018-11-12 08:16:48', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `programmeName` varchar(255) NOT NULL,
  `institute_location` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `leaveType` varchar(255) NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `programmeName`, `institute_location`, `startDate`, `endDate`, `leaveType`, `user_ID`) VALUES
(1, 'fhdh', 'grhshrh', '2018-10-18', '2018-10-25', 'Research', '100001'),
(2, 'hfhwfw', 'nfslnfpe', '2018-10-18', '2018-10-25', 'Training', '100001'),
(3, 'vjpdowuod', 'wooohooo', '2018-09-27', '2018-10-04', 'Sabbatical', '100001'),
(6, 'training', 'taylor\'s, lakeside campus', '2018-10-22', '2018-10-29', 'Training', '100001'),
(7, 'programme', 'sunway, selangor', '2018-10-31', '2018-11-07', 'Research', '100001'),
(8, 'Arts for life', 'Lancaster, UK', '2018-10-28', '2018-11-05', 'Training', '100021'),
(9, 'LU-SU research collab', 'Lancaster University', '2018-11-15', '2018-11-22', 'Research', '100028'),
(10, 'q', 'w', '2018-11-16', '2018-11-16', 'Research', '100001'),
(11, 'q', 'w', '2018-11-16', '2018-11-16', 'Research', '100001'),
(12, 'a', 's', '2018-11-16', '2018-11-22', 'Research', '100001'),
(13, 'z', 'x', '2018-11-07', '2018-11-20', 'Research', '100001'),
(14, 'mN', 'N', '2018-11-15', '2018-11-21', 'Research', '100001'),
(15, 'LU-SU research collaboration meeting	', 'Lancaster University, UK	', '2018-11-16', '2018-11-16', 'Research', '100001');

-- --------------------------------------------------------

--
-- Table structure for table `workingXp`
--

CREATE TABLE `workingXp` (
  `id` int(11) NOT NULL,
  `jobPosition` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `startYear` varchar(255) NOT NULL,
  `endYear` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workingXp`
--

INSERT INTO `workingXp` (`id`, `jobPosition`, `company`, `startYear`, `endYear`, `description`, `user_ID`) VALUES
(1, 'engineer', 'intel', '2006', '2012', 'helloworld', '100001'),
(2, 'lecturer', 'sunway', '2013', 'present', 'teach OOP and course coordinator', '100001'),
(3, 'Programmer ', 'Framemotion', '2018', '2018', 'backend programmer', '100028'),
(4, 'Clerk', 'company', 'Jan - 2014', 'Jun - 2014', 'payroll and stuffs', '100028'),
(5, 'position', 'company', '2020', '2023', 'details', '100028'),
(6, 'barista', 'chatto', 'dec-2018', 'mar-2019', 'make bubba tea', '100001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `AdminEmail` (`AdminEmail`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `books-chaps`
--
ALTER TABLE `books-chaps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `eduDetails`
--
ALTER TABLE `eduDetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `ips`
--
ALTER TABLE `ips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `other_publications`
--
ALTER TABLE `other_publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `patents`
--
ALTER TABLE `patents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `proceedings`
--
ALTER TABLE `proceedings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `researchArea`
--
ALTER TABLE `researchArea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `researcharea_details`
--
ALTER TABLE `researcharea_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `research_activities`
--
ALTER TABLE `research_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StaffId` (`StaffId`),
  ADD KEY `StaffId_2` (`StaffId`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `workingXp`
--
ALTER TABLE `workingXp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `books-chaps`
--
ALTER TABLE `books-chaps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `eduDetails`
--
ALTER TABLE `eduDetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ips`
--
ALTER TABLE `ips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `other_publications`
--
ALTER TABLE `other_publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patents`
--
ALTER TABLE `patents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `proceedings`
--
ALTER TABLE `proceedings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `researchArea`
--
ALTER TABLE `researchArea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `researcharea_details`
--
ALTER TABLE `researcharea_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `research_activities`
--
ALTER TABLE `research_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `workingXp`
--
ALTER TABLE `workingXp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books-chaps`
--
ALTER TABLE `books-chaps`
  ADD CONSTRAINT `books-chaps_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eduDetails`
--
ALTER TABLE `eduDetails`
  ADD CONSTRAINT `edudetails_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ips`
--
ALTER TABLE `ips`
  ADD CONSTRAINT `ips_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journals`
--
ALTER TABLE `journals`
  ADD CONSTRAINT `journals_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_publications`
--
ALTER TABLE `other_publications`
  ADD CONSTRAINT `other_publications_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patents`
--
ALTER TABLE `patents`
  ADD CONSTRAINT `patents_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proceedings`
--
ALTER TABLE `proceedings`
  ADD CONSTRAINT `proceedings_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `researcharea_details`
--
ALTER TABLE `researcharea_details`
  ADD CONSTRAINT `researcharea_details_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `research_activities`
--
ALTER TABLE `research_activities`
  ADD CONSTRAINT `research_activities_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workingXp`
--
ALTER TABLE `workingXp`
  ADD CONSTRAINT `workingxp_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_staffs` (`StaffId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
