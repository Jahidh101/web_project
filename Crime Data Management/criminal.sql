-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 09:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criminal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` varchar(20) NOT NULL,
  `NID` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `NID`, `Password`) VALUES
('1010', '101101101101101', '1');

-- --------------------------------------------------------

--
-- Table structure for table `case_access`
--

CREATE TABLE `case_access` (
  `SerialNo` int(20) NOT NULL,
  `CaseNumber` varchar(20) NOT NULL,
  `Police_ID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_access`
--

INSERT INTO `case_access` (`SerialNo`, `CaseNumber`, `Police_ID`) VALUES
(2, '6666', '22'),
(5, '354353453', '65546'),
(6, '354353453', '22');

-- --------------------------------------------------------

--
-- Table structure for table `case_file`
--

CREATE TABLE `case_file` (
  `CaseNumber` varchar(20) NOT NULL,
  `CrimeCategory` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `CrimePlace` varchar(20) NOT NULL,
  `TimeDate` datetime NOT NULL,
  `Weapon` varchar(30) NOT NULL,
  `CaseStatus` varchar(10) NOT NULL,
  `ReportingPoliceID` varchar(20) NOT NULL,
  `Privacy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_file`
--

INSERT INTO `case_file` (`CaseNumber`, `CrimeCategory`, `Description`, `CrimePlace`, `TimeDate`, `Weapon`, `CaseStatus`, `ReportingPoliceID`, `Privacy`) VALUES
('10101010101', 'burglary', 'hthtfrgfgjhgf  ', 'reyeyr', '2021-05-04 00:18:00', 'jgjfgjfgjjgjfj', 'open', 'admin', 'public'),
('2222222222', 'murder', 'fhdf', 'fhfdhdf', '2021-04-25 23:25:00', 'fhfdhfd', 'open', '22', 'public'),
('354353453', 'manslaughter', 'sxvcsdgfdhd  ', 'gfdgdg', '2021-04-30 23:09:00', 'fgdgdgdg', 'solved', '11', 'public'),
('4543', 'kidnapping', 'fdgfdghfd   ', 'hgghg', '2021-05-05 11:31:03', 'gg', 'open', '11', 'private'),
('6537543646', 'murder', 'tertre', 'hgfh', '2021-05-02 01:19:00', 'nhgjng', 'closed', '11', 'public'),
('6666', 'assault', 'jhgkghkjhkh   ', 'rrrr', '2021-05-10 06:11:00', '11111', 'solved', '11', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `convicted_criminal`
--

CREATE TABLE `convicted_criminal` (
  `Criminal_ID` varchar(20) NOT NULL,
  `NID` varchar(30) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `CaseNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `convicted_criminal`
--

INSERT INTO `convicted_criminal` (`Criminal_ID`, `NID`, `Description`, `CaseNumber`) VALUES
('657463332', '98959643737', '', '6666'),
('789696780978', '43634765867896', 'gfhjfgfghfhf', '354353453'),
('98786456345', '844675463433', '', '10101010101');

-- --------------------------------------------------------

--
-- Table structure for table `permission_request`
--

CREATE TABLE `permission_request` (
  `ID` int(11) NOT NULL,
  `CaseNumber` varchar(30) NOT NULL,
  `Police_ID` varchar(30) NOT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_request`
--

INSERT INTO `permission_request` (`ID`, `CaseNumber`, `Police_ID`, `Type`) VALUES
(2, '4543', '22', 'r'),
(4, '2222222222', '11', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `NID` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`NID`, `Name`, `DateOfBirth`, `Gender`, `Address`, `PhoneNo`) VALUES
('101101101101101', 'Tim Humble', '1988-01-15', 'Male', 'Uttara', '01987654323'),
('343534654745', 'dagahshj', '0000-00-00', 'female', 'sgsdhgsdfsh', ''),
('43634765867896', ',klhgfd', '2021-04-25', 'male', 'thrdhfh', '24378354535'),
('454364565467', 'Abid', '2021-04-25', 'male', 'Khulna', '7765555547'),
('5664', 'gfhf', '2021-05-02', 'male', '7uy', '767575767'),
('57687978087', '57655858', '2021-04-27', 'female', '7uy', '4656456477'),
('65645645456', 'fghfdhh', '2021-05-20', 'female', '756', '44546546455'),
('76588798769', 'fgdhy', '0000-00-00', 'male', '', '5676766887'),
('767352523534', '', '0000-00-00', '', '', ''),
('844675463433', 'fdasfag', '0000-00-00', 'female', '', ''),
('85684688888', 'djhjdjddghjgdh', '2021-05-02', 'female', 'vnvcnxnxv', 'vnvcn'),
('8778786854545', 'Anika', '2021-04-28', 'female', 'Dhaka', '0987654333'),
('897693534543', 'jgh', '0000-00-00', '', '', ''),
('9090000000', 'Alam', '2021-04-25', 'male', 'Gazipur', '09876543'),
('98959643737', '', '0000-00-00', '-', '', ''),
('estset', '', '0000-00-00', '', '', ''),
('fdh', '', '0000-00-00', '', '', ''),
('fdh65', '5464', '2021-04-27', 'female', 'ty', '546464656'),
('fhddhdhdhdhfh', 'hfhfffhf', '0000-00-00', 'female', '', ''),
('gjfjfgj', 'gjfjfjgjfjgfj', '2021-04-26', '', '756', '76576575454'),
('tgjuytdutryr', 'tytryyrt', '2021-05-11', '', '', ''),
('trutrutuurturtu', '', '0000-00-00', '', '', ''),
('ttrtty', 'tytyrytr', '2021-04-26', 'female', '756', '5654756767'),
('yrtyry', 'ytryrtyrt', '0000-00-00', '-', '', '2432535545');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `Police_ID` varchar(20) NOT NULL,
  `NID` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Rank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`Police_ID`, `NID`, `Password`, `Rank`) VALUES
('11', '9090000000', '2', 'Constable'),
('22', '454364565467', '3', 'Sub Inspector'),
('65546', '8778786854545', '2345678@', 'Sergent');

-- --------------------------------------------------------

--
-- Table structure for table `suspect`
--

CREATE TABLE `suspect` (
  `Suspect_ID` varchar(20) NOT NULL,
  `NID` varchar(30) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `CaseNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect`
--

INSERT INTO `suspect` (`Suspect_ID`, `NID`, `Description`, `CaseNumber`) VALUES
('57574574', '57687978087', 'gdfhgdhthrth', '354353453'),
('675474838684', '85684688888', 'cnxvncvn', '10101010101'),
('fdhdfhhhd', 'fhddhdhdhdhfh', '', '2222222222');

-- --------------------------------------------------------

--
-- Table structure for table `victim`
--

CREATE TABLE `victim` (
  `Victim_ID` varchar(30) NOT NULL,
  `NID` varchar(30) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `CaseNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `victim`
--

INSERT INTO `victim` (`Victim_ID`, `NID`, `Description`, `CaseNumber`) VALUES
('4354356', '897693534543', '', '6666'),
('4564364', '65645645456', '', '354353453'),
('4636754754', '767352523534', '', '6537543646'),
('545444', '76588798769', '', '4543'),
('567854', '343534654745', '', '10101010101'),
('gnfjg', 'gjfjfgj', '', '2222222222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD KEY `admin_person_nid` (`NID`);

--
-- Indexes for table `case_access`
--
ALTER TABLE `case_access`
  ADD PRIMARY KEY (`SerialNo`),
  ADD KEY `caseNumber` (`CaseNumber`),
  ADD KEY `policeID` (`Police_ID`);

--
-- Indexes for table `case_file`
--
ALTER TABLE `case_file`
  ADD PRIMARY KEY (`CaseNumber`);

--
-- Indexes for table `convicted_criminal`
--
ALTER TABLE `convicted_criminal`
  ADD PRIMARY KEY (`Criminal_ID`),
  ADD KEY `convicted_criminal_case_file_caseNumber` (`CaseNumber`);

--
-- Indexes for table `permission_request`
--
ALTER TABLE `permission_request`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`NID`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`Police_ID`),
  ADD KEY `police_person_nid` (`NID`);

--
-- Indexes for table `suspect`
--
ALTER TABLE `suspect`
  ADD PRIMARY KEY (`Suspect_ID`),
  ADD KEY `suspect_case_file_caseNumber` (`CaseNumber`);

--
-- Indexes for table `victim`
--
ALTER TABLE `victim`
  ADD PRIMARY KEY (`Victim_ID`),
  ADD KEY `victim_case_file_caseNumber` (`CaseNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_access`
--
ALTER TABLE `case_access`
  MODIFY `SerialNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permission_request`
--
ALTER TABLE `permission_request`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_person_nid` FOREIGN KEY (`NID`) REFERENCES `person` (`NID`);

--
-- Constraints for table `case_access`
--
ALTER TABLE `case_access`
  ADD CONSTRAINT `caseNumber` FOREIGN KEY (`CaseNumber`) REFERENCES `case_file` (`CaseNumber`),
  ADD CONSTRAINT `policeID` FOREIGN KEY (`Police_ID`) REFERENCES `police` (`Police_ID`);

--
-- Constraints for table `convicted_criminal`
--
ALTER TABLE `convicted_criminal`
  ADD CONSTRAINT `convicted_criminal_case_file_caseNumber` FOREIGN KEY (`CaseNumber`) REFERENCES `case_file` (`CaseNumber`);

--
-- Constraints for table `police`
--
ALTER TABLE `police`
  ADD CONSTRAINT `police_person_nid` FOREIGN KEY (`NID`) REFERENCES `person` (`NID`);

--
-- Constraints for table `suspect`
--
ALTER TABLE `suspect`
  ADD CONSTRAINT `suspect_case_file_caseNumber` FOREIGN KEY (`CaseNumber`) REFERENCES `case_file` (`CaseNumber`);

--
-- Constraints for table `victim`
--
ALTER TABLE `victim`
  ADD CONSTRAINT `victim_case_file_caseNumber` FOREIGN KEY (`CaseNumber`) REFERENCES `case_file` (`CaseNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
