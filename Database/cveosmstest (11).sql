-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 12:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cveosmstest`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthrequest`
--

CREATE TABLE `birthrequest` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `fatherName` varchar(50) DEFAULT NULL,
  `grandFatherName` varchar(50) DEFAULT NULL,
  `firstNameA` tinytext DEFAULT NULL,
  `fatherNameA` tinytext DEFAULT NULL,
  `grandFatherNameA` tinytext DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `nationality` tinytext DEFAULT NULL,
  `GC` date DEFAULT NULL,
  `EC` date DEFAULT NULL,
  `POBregion` tinytext DEFAULT NULL,
  `POBzone` tinytext DEFAULT NULL,
  `POBcity` tinytext DEFAULT NULL,
  `POBworeda` tinyint(4) DEFAULT NULL,
  `placeOccurrence` tinytext DEFAULT NULL,
  `attendant` tinytext DEFAULT NULL,
  `hospitalBirthCert` varchar(255) DEFAULT NULL,
  `yellowCard` varchar(255) DEFAULT NULL,
  `childPhoto` varchar(255) DEFAULT NULL,
  `MfirstName` varchar(50) DEFAULT NULL,
  `MfatherName` varchar(50) DEFAULT NULL,
  `MgrandFatherName` varchar(50) DEFAULT NULL,
  `MfirstNameA` tinytext DEFAULT NULL,
  `MfatherNameA` tinytext DEFAULT NULL,
  `MgrandFatherNameA` tinytext DEFAULT NULL,
  `MGC` date DEFAULT NULL,
  `MEC` date DEFAULT NULL,
  `MPOBregion` tinytext DEFAULT NULL,
  `MPOBzone` tinytext DEFAULT NULL,
  `MPOBcity` tinytext DEFAULT NULL,
  `MPOBworeda` tinytext DEFAULT NULL,
  `MURregion` tinytext DEFAULT NULL,
  `MURzone` tinytext DEFAULT NULL,
  `MURcity` tinytext DEFAULT NULL,
  `MURworeda` tinyint(4) DEFAULT NULL,
  `MoccupationType` tinytext DEFAULT NULL,
  `MeducationalStatus` tinytext DEFAULT NULL,
  `Mreligion` tinytext DEFAULT NULL,
  `Mnationality` tinytext DEFAULT NULL,
  `MidNumber` varchar(50) DEFAULT NULL,
  `motherId` varchar(255) DEFAULT NULL,
  `FfirstName` varchar(50) DEFAULT NULL,
  `FfatherName` varchar(50) DEFAULT NULL,
  `FgrandFatherName` varchar(50) DEFAULT NULL,
  `FfirstNameA` tinytext DEFAULT NULL,
  `FfatherNameA` tinytext DEFAULT NULL,
  `FgrandFatherNameA` tinytext DEFAULT NULL,
  `FGC` date DEFAULT NULL,
  `FEC` date DEFAULT NULL,
  `FPOBregion` tinytext DEFAULT NULL,
  `FPOBzone` tinytext DEFAULT NULL,
  `FPOBcity` tinytext DEFAULT NULL,
  `FPOBworeda` tinytext DEFAULT NULL,
  `FURregion` tinytext DEFAULT NULL,
  `FURzone` tinytext DEFAULT NULL,
  `FURcity` tinytext DEFAULT NULL,
  `FURworeda` tinyint(4) DEFAULT NULL,
  `FoccupationType` tinytext DEFAULT NULL,
  `FeducationalStatus` tinytext DEFAULT NULL,
  `Freligion` tinytext DEFAULT NULL,
  `Fnationality` tinytext DEFAULT NULL,
  `FidNumber` varchar(50) DEFAULT NULL,
  `fatherId` varchar(255) DEFAULT NULL,
  `applierId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `civilrequest`
--

CREATE TABLE `civilrequest` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fatherName` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grandFatherName` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstNameA` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fatherNameA` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grandFatherNameA` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `dobEC` date DEFAULT NULL,
  `dateGC` date DEFAULT NULL,
  `PURregion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PURzone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PURcity` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PURworeda` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `occupation` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bloodGroup` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Blood_Group_Certification` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EfirstName` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EfatherName` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EgrandFatherName` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EfirstNameA` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EfatherNameA` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EgrandFatherNameA` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EbloodGroup` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EphoneNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `applierId` int(11) DEFAULT NULL,
  `policeReport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lost` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `civilrequest`
--

INSERT INTO `civilrequest` (`id`, `firstName`, `fatherName`, `grandFatherName`, `firstNameA`, `fatherNameA`, `grandFatherNameA`, `sex`, `dobEC`, `dateGC`, `PURregion`, `PURzone`, `PURcity`, `PURworeda`, `occupation`, `education`, `religion`, `nationality`, `bloodGroup`, `Blood_Group_Certification`, `photo`, `EfirstName`, `EfatherName`, `EgrandFatherName`, `EfirstNameA`, `EfatherNameA`, `EgrandFatherNameA`, `EbloodGroup`, `EphoneNumber`, `applierId`, `policeReport`, `lost`) VALUES
(70, 'shiferaw', 'demelash', 'jembere', 'ሽፈራው', 'ደምመላሽ', 'ጀምበረ', 'Male', '1953-10-03', '1963-06-10', 'Addis Ababa', 'Addis Ababa', 'Bole', '6', 'Employed', 'Bachelors Degree', 'Christian', 'Ethiopian', 'B+', 'files/civil/1631803138blood.jpg', 'files/civil/1631803138shif.jpg', 'Eden ', 'Kifle', 'abay', 'አደን', 'ክፍል', 'አባይ', 'A+', '0912501772', 11, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deathrequest`
--

CREATE TABLE `deathrequest` (
  `id` int(11) NOT NULL,
  `dateofdeath` date NOT NULL,
  `deceasedFirstname` varchar(30) NOT NULL,
  `deceasedMiddlename` varchar(30) NOT NULL,
  `deceasedlastname` varchar(30) NOT NULL,
  `deceasedFNamharic` varchar(30) NOT NULL,
  `deceasedMNamharic` varchar(30) NOT NULL,
  `deceasedLNamharic` varchar(30) NOT NULL,
  `DOBgc` date NOT NULL,
  `DOBec` date DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `maritalStatus` varchar(30) DEFAULT NULL,
  `Educationalstatus` varchar(30) DEFAULT NULL,
  `religion` varchar(30) DEFAULT NULL,
  `DPORregion` varchar(30) NOT NULL,
  `POOworeda` tinyint(4) NOT NULL,
  `POOregion` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `cause` varchar(30) NOT NULL,
  `certifier` varchar(30) NOT NULL,
  `placeofburial` varchar(30) DEFAULT NULL,
  `DPORzone` varchar(30) NOT NULL,
  `DPORcity` varchar(30) NOT NULL,
  `DPORworeda` tinyint(4) NOT NULL,
  `POOzone` varchar(30) NOT NULL,
  `POOcity` varchar(30) NOT NULL,
  `Nationality` varchar(30) NOT NULL,
  `dodgc` date NOT NULL,
  `dodec` date NOT NULL,
  `Doccupation` varchar(30) NOT NULL,
  `DIDnum` int(11) NOT NULL,
  `ProofOfCause` varchar(30) NOT NULL,
  `certFromInst` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `applierId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `divorcerequest`
--

CREATE TABLE `divorcerequest` (
  `id` int(11) NOT NULL,
  `FNWife` varchar(30) DEFAULT NULL,
  `MNwife` varchar(30) DEFAULT NULL,
  `LNWife` varchar(30) DEFAULT NULL,
  `wifeFNamharic` varchar(30) DEFAULT NULL,
  `wifeMNamharic` varchar(30) DEFAULT NULL,
  `wifeLNamharic` varchar(30) DEFAULT NULL,
  `DOBGCwife` date DEFAULT NULL,
  `DOBECwife` date DEFAULT NULL,
  `POBregionwife` varchar(30) DEFAULT NULL,
  `POBzonewife` varchar(30) DEFAULT NULL,
  `POBcitywife` varchar(30) DEFAULT NULL,
  `POBworedawife` varchar(30) DEFAULT NULL,
  `OccupationWife` varchar(30) DEFAULT NULL,
  `RelWife` varchar(30) DEFAULT NULL,
  `EducationWife` varchar(30) DEFAULT NULL,
  `Wnationality` varchar(30) DEFAULT NULL,
  `IDNumWife` varchar(30) DEFAULT NULL,
  `FNHusband` varchar(30) DEFAULT NULL,
  `MNHusband` varchar(30) DEFAULT NULL,
  `LNHusband` varchar(30) DEFAULT NULL,
  `husbandFNamharic` varchar(30) DEFAULT NULL,
  `husbandMNamharic` varchar(30) DEFAULT NULL,
  `husbandLNamharic` varchar(30) DEFAULT NULL,
  `DOBGChusband` date DEFAULT NULL,
  `DOBEChusband` date DEFAULT NULL,
  `POBregionhusband` varchar(30) DEFAULT NULL,
  `POBzonehusband` varchar(30) DEFAULT NULL,
  `POBcityhusband` varchar(30) DEFAULT NULL,
  `POBworedahusband` varchar(30) DEFAULT NULL,
  `OccupationHusband` varchar(30) DEFAULT NULL,
  `EducationHusband` varchar(30) DEFAULT NULL,
  `RelHusband` varchar(30) DEFAULT NULL,
  `Hnationality` varchar(30) DEFAULT NULL,
  `IDNumHusband` varchar(30) DEFAULT NULL,
  `CourtName` varchar(30) DEFAULT NULL,
  `CourtRegNum` varchar(30) DEFAULT NULL,
  `husbandIdPhoto` varchar(255) NOT NULL,
  `wifeIdPhoto` varchar(255) NOT NULL,
  `wifePhoto` varchar(255) NOT NULL,
  `husbandPhoto` varchar(255) NOT NULL,
  `courtCert` varchar(255) NOT NULL,
  `applierId` int(11) DEFAULT NULL,
  `dateofoccurance` date DEFAULT NULL,
  `dateOccuranceEC` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` varchar(10) NOT NULL,
  `EmployeeType` varchar(10) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `MiddleName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `HouseNumber` int(11) NOT NULL,
  `Pword` varchar(255) NOT NULL,
  `sex` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `EmployeeType`, `Phone`, `Email`, `FirstName`, `MiddleName`, `LastName`, `DOB`, `Photo`, `HouseNumber`, `Pword`, `sex`) VALUES
('adm/59743', 'Admin', '0933713899', 'zedshif123@gmail.com', 'zedagem', 'shiferaw', 'demelash', '1999-09-24', 'files/employee/1630614753zedagem.jpg', 1871, '$2y$10$WfWt3aIVAPceWb.zY6bfdON5mhNMOYuuGmnBM1WiU0OX0K6VFQLJm', 'male'),
('cas/75254', 'Cashier', '0946696316', 'askual@gmail.com', 'Askual', 'Assefa ', 'Melese', '2000-06-02', 'files/employee/1630929822Askual.jpg', 789, '$2y$10$zkuqPAkKQBFGVyB54.Efa.2/kYqMHQba/ZGzkSMlip921XUIWjbSm', 'female'),
('cle/58155', 'Clerk', '0943058334', 'abel@gmail.com', 'Abel', 'Moges', 'Gebrehiwet', '1999-09-24', 'files/employee/1630611418Abel.jpg', 8000, '$2y$10$Wztp89TztkjLDpjlUJtF4OaiayGB7S7mJcoDifUG3xXCuJ0n6lMCq', 'male'),
('cle/64763', 'Clerk', '0944721682', 'pandanigussie0231@gmail.com', 'Adonias', 'Nigussie', 'Woldekidan', '1999-05-06', 'files/employee/1630928832panda.jpg', 651, '$2y$10$k4ZWF1TORgR7fYX0eWbFBevPoSRd.bFGq2b4iXB1ww7rUqfh3VU7m', 'male'),
('man/15228', 'Manager', '0942180456', 'zerubabeleshetu@yahoo.com', 'Zerubabel', 'Eshetu', 'Admasu', '1997-10-17', 'files/employee/1631009414zeru.jpg', 1340, '$2y$10$GHHceTrbaog9TjjcHVkhJOqITUUKb4UDHrG1CV9hK/3tsj8Y2MSKy', 'male'),
('man/76823', 'Manager', '0947940979', 'solomon@gmail.com', 'Solomon', 'Desta', 'Buzayehu', '1999-09-24', 'files/employee/1630615227sele.jpg', 9000, '$2y$10$/PpmOgMpte0nB.mISPCtRuPLNlF.V68aVsNwDFMJcTS2xzGta.N9W', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE `household` (
  `id` int(11) NOT NULL,
  `memberType` varchar(10) DEFAULT NULL,
  `houseNumber` int(11) DEFAULT NULL,
  `phoneNumber` int(11) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `fnameA` varchar(50) DEFAULT NULL,
  `mnameA` varchar(50) DEFAULT NULL,
  `lnameA` varchar(50) DEFAULT NULL,
  `fatherLastName` varchar(50) DEFAULT NULL,
  `motherName` varchar(50) DEFAULT NULL,
  `motherLastName` varchar(50) DEFAULT NULL,
  `sex` varchar(7) DEFAULT NULL,
  `dobEC` date DEFAULT NULL,
  `dobGC` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `titleCert` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`id`, `memberType`, `houseNumber`, `phoneNumber`, `fname`, `mname`, `lname`, `fnameA`, `mnameA`, `lnameA`, `fatherLastName`, `motherName`, `motherLastName`, `sex`, `dobEC`, `dobGC`, `email`, `photo`, `titleCert`) VALUES
(11, 'OWNER', 1871, 911209786, 'SHIFERAW', 'DEMELASH', 'JEMBERE', 'ሽፈራው', 'ደመላሽ', 'ጀምበር', 'JEMBERE', 'ADANECH', 'DEMELASH', 'MALE', '1953-10-03', '1963-06-10', 'shiferawD@africa-union.org', 'files/household/1631786167shif.jpg', 'files/household/1631786167tc 1.jpg'),
(20, 'OWNER', 1871, 912501772, 'EDEN', 'KIFLE', 'abay', 'አደን', 'ክፍል', 'አባይ', 'LEGESE', 'HADAS', 'TSGEYESUS', 'FEMALE', '1962-09-05', '1972-05-13', 'edenkifle@yahoo.com', 'files/household/1631788397eden.jpg', ' '),
(21, 'DEPENDENT', 1871, 933713899, 'ZEDAGEM', 'SHIFERAW', 'demelash', 'ዘዳግም', 'ሽፈራው', 'ደመላሽ', 'JEMBERE', 'EDEN', 'KIFLE', 'MALE', '1992-01-14', '1999-09-24', 'zedshif123@gmail.com', 'files/household/1631789215zed3x4.jpg', ' '),
(22, 'DEPENDENT', 1871, 0, 'MIRIAM', 'SHIFERAW', 'demelash', 'ሚሪያም', 'ሽፈራው', 'ደመላሽ', 'JEMBERE', 'EDEN', 'KIFLE', 'FEMALE', '1999-01-22', '2006-10-02', '', 'files/household/1631789337miriam.jpg', ' '),
(23, 'DEPENDENT', 1871, 0, 'SOPHONIAS', 'SHIFERAW', 'demelash', 'ሶፎንያስ', 'ሽፈራው', 'ደመላሽ', 'JEMBERE', 'EDEN', 'KIFLE', 'FEMALE', '2006-11-02', '2012-01-12', '', 'files/household/1631789414sofo.jpg', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `marriagerequest`
--

CREATE TABLE `marriagerequest` (
  `id` int(11) NOT NULL,
  `wifeFirstname` varchar(30) DEFAULT NULL,
  `WifeMiddlename` varchar(30) DEFAULT NULL,
  `wifelastname` varchar(30) DEFAULT NULL,
  `wifeFNamharic` varchar(30) DEFAULT NULL,
  `wifeMNamharic` varchar(30) DEFAULT NULL,
  `wifeLNamharic` varchar(30) DEFAULT NULL,
  `Wnationality` varchar(30) DEFAULT NULL,
  `DOBwifeGC` date DEFAULT NULL,
  `DOBwifeEC` date DEFAULT NULL,
  `POBWiferegion` varchar(30) DEFAULT NULL,
  `POBWifeZone` varchar(30) DEFAULT NULL,
  `POBWifeCity` varchar(30) DEFAULT NULL,
  `POBWifeWoreda` varchar(30) DEFAULT NULL,
  `occupationalstatuswife` varchar(30) DEFAULT NULL,
  `educationalstatuswife` varchar(30) DEFAULT NULL,
  `ReligionWife` varchar(30) DEFAULT NULL,
  `premaritalstatuswife` varchar(30) DEFAULT NULL,
  `WifeID` varchar(30) DEFAULT NULL,
  `husbandFirstname` varchar(30) DEFAULT NULL,
  `husbandmiddlename` varchar(30) DEFAULT NULL,
  `husbandlastname` varchar(30) DEFAULT NULL,
  `husbandFNamharic` varchar(30) DEFAULT NULL,
  `husbandMNamharic` varchar(30) DEFAULT NULL,
  `husbandLNamharic` varchar(30) DEFAULT NULL,
  `DOBhusbandGC` date DEFAULT NULL,
  `DOBhusbandEC` date DEFAULT NULL,
  `POBHusbandRegion` varchar(30) DEFAULT NULL,
  `POBHusbandZone` varchar(30) DEFAULT NULL,
  `POBHusbandCity` varchar(30) DEFAULT NULL,
  `POBHusbandWoreda` varchar(30) DEFAULT NULL,
  `occupationalStatushusband` varchar(30) DEFAULT NULL,
  `educationalstatushusband` varchar(30) DEFAULT NULL,
  `religionhusband` varchar(30) DEFAULT NULL,
  `premaritalstatushusband` varchar(30) DEFAULT NULL,
  `HusbandID` varchar(30) DEFAULT NULL,
  `dateofoccurance` date DEFAULT NULL,
  `dateOccuranceEC` date DEFAULT NULL,
  `officiatingInstitution` varchar(30) DEFAULT NULL,
  `Hnationality` varchar(30) NOT NULL,
  `wifeIdPhoto` varchar(255) DEFAULT NULL,
  `husbandIdPhoto` varchar(255) DEFAULT NULL,
  `wifePhoto` varchar(255) NOT NULL,
  `husbandPhoto` varchar(255) NOT NULL,
  `certificatefrominstitution` varchar(255) DEFAULT NULL,
  `applierId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Nid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `notificationDate` date NOT NULL,
  `notificationContent` varchar(255) NOT NULL,
  `sender` varchar(10) NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`Nid`, `id`, `notificationDate`, `notificationContent`, `sender`, `is_read`) VALUES
(46, 11, '2021-09-16', 'For your CIVIL requst ,you have been Scheduleded for : 2021-09-16', 'Clerk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `applierID` int(11) DEFAULT NULL,
  `empid` varchar(10) DEFAULT NULL,
  `paiddate` date DEFAULT NULL,
  `reqtype` varchar(10) DEFAULT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `applierID`, `empid`, `paiddate`, `reqtype`, `fname`, `mname`, `lname`) VALUES
(17, 11, 'cas/75254', '2021-09-16', 'CIVIL', 'SHIFERAW', 'DEMELASH', 'JEMBERE');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `applierId` int(11) DEFAULT NULL,
  `requestType` varchar(10) DEFAULT NULL,
  `appliedDate` date DEFAULT NULL,
  `readEmp` int(1) DEFAULT 0,
  `readManager` int(1) DEFAULT 0,
  `readCash` int(1) DEFAULT 0,
  `stat` int(1) DEFAULT 0,
  `scheduled` int(1) NOT NULL DEFAULT 0,
  `scheduledDate` date DEFAULT NULL,
  `cashID` varchar(10) DEFAULT NULL,
  `managerId` varchar(10) DEFAULT NULL,
  `clerkId` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `applierId`, `requestType`, `appliedDate`, `readEmp`, `readManager`, `readCash`, `stat`, `scheduled`, `scheduledDate`, `cashID`, `managerId`, `clerkId`) VALUES
(70, 11, 'CIVIL', '2021-09-16', 1, 1, 1, 0, 1, '2021-09-16', 'cas/75254', 'man/76823 ', 'cle/58155 ');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Housenum` int(11) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `userName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `FirstName`, `MiddleName`, `LastName`, `Phone`, `email`, `password`, `DOB`, `Housenum`, `Photo`, `userName`) VALUES
(11, 'SHIFERAW', 'DEMELASH', 'JEMBERE', 911209786, 'shiferawd@africa-union.org', '$2y$10$jgSZRp7tTFGckcTvjtPc.uzqfuV4QO.fO/5SUaRTyCcEYW4oWVP5O', '1963-06-10', 1871, 'files/resident/1631802813shif.jpg', 'shif'),
(21, 'ZEDAGEM', 'SHIFERAW', 'DEMELASH', 933713899, 'zedshif123@gmail.com', '$2y$10$IxEf3LNkt2IepRJoqk7JWOgPHYNAurh23jArSFBffYxSdRFR1YsJy', '1999-09-24', 1871, 'files/resident/1631790382zed3x4.jpg', 'zed');

-- --------------------------------------------------------

--
-- Table structure for table `sch`
--

CREATE TABLE `sch` (
  `id` int(11) NOT NULL,
  `requestType` varchar(20) DEFAULT NULL,
  `currentDate` date DEFAULT NULL,
  `schDate` date DEFAULT NULL,
  `applierId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sch`
--

INSERT INTO `sch` (`id`, `requestType`, `currentDate`, `schDate`, `applierId`) VALUES
(34, 'CIVIL', '2021-09-16', '2021-09-16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthrequest`
--
ALTER TABLE `birthrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applierId` (`applierId`);

--
-- Indexes for table `civilrequest`
--
ALTER TABLE `civilrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applierId` (`applierId`);

--
-- Indexes for table `deathrequest`
--
ALTER TABLE `deathrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applierId` (`applierId`);

--
-- Indexes for table `divorcerequest`
--
ALTER TABLE `divorcerequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applierId` (`applierId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marriagerequest`
--
ALTER TABLE `marriagerequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applierId` (`applierId`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Nid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applierID` (`applierID`),
  ADD KEY `empid` (`empid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applierId` (`applierId`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sch`
--
ALTER TABLE `sch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applierId` (`applierId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `civilrequest`
--
ALTER TABLE `civilrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `household`
--
ALTER TABLE `household`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `marriagerequest`
--
ALTER TABLE `marriagerequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `Nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `sch`
--
ALTER TABLE `sch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `birthrequest`
--
ALTER TABLE `birthrequest`
  ADD CONSTRAINT `birthrequest_ibfk_1` FOREIGN KEY (`applierId`) REFERENCES `household` (`id`),
  ADD CONSTRAINT `birthrequest_ibfk_2` FOREIGN KEY (`id`) REFERENCES `request` (`id`);

--
-- Constraints for table `civilrequest`
--
ALTER TABLE `civilrequest`
  ADD CONSTRAINT `civilrequest_ibfk_1` FOREIGN KEY (`applierId`) REFERENCES `household` (`id`),
  ADD CONSTRAINT `civilrequest_ibfk_2` FOREIGN KEY (`id`) REFERENCES `request` (`id`);

--
-- Constraints for table `deathrequest`
--
ALTER TABLE `deathrequest`
  ADD CONSTRAINT `deathrequest_ibfk_1` FOREIGN KEY (`applierId`) REFERENCES `household` (`id`),
  ADD CONSTRAINT `deathrequest_ibfk_2` FOREIGN KEY (`id`) REFERENCES `request` (`id`);

--
-- Constraints for table `divorcerequest`
--
ALTER TABLE `divorcerequest`
  ADD CONSTRAINT `divorcerequest_ibfk_1` FOREIGN KEY (`applierId`) REFERENCES `household` (`id`),
  ADD CONSTRAINT `divorcerequest_ibfk_2` FOREIGN KEY (`id`) REFERENCES `request` (`id`);

--
-- Constraints for table `marriagerequest`
--
ALTER TABLE `marriagerequest`
  ADD CONSTRAINT `marriagerequest_ibfk_1` FOREIGN KEY (`applierId`) REFERENCES `household` (`id`),
  ADD CONSTRAINT `marriagerequest_ibfk_2` FOREIGN KEY (`id`) REFERENCES `request` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id`) REFERENCES `household` (`id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`applierID`) REFERENCES `household` (`id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`empid`) REFERENCES `employee` (`EmployeeID`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`applierId`) REFERENCES `household` (`id`);

--
-- Constraints for table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`id`) REFERENCES `household` (`id`);

--
-- Constraints for table `sch`
--
ALTER TABLE `sch`
  ADD CONSTRAINT `sch_ibfk_1` FOREIGN KEY (`applierId`) REFERENCES `household` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
