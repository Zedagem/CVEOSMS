-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 08:18 AM
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
-- Database: `cveosms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `AppointmentID` int(11) NOT NULL,
  `SchID` int(11) NOT NULL,
  `EmpID` varchar(10) NOT NULL,
  `Appdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `birthrequest`
--

CREATE TABLE `birthrequest` (
  id int AUTO_INCREMENT PRIMARY KEY,
  Rtype varchar(10) DEFAULT NULL,
  firstName varchar(50) NOT NULL,
  fatherName varchar(50) NOT NULL,
  grandFatherName varchar(50) NOT NULL,
  firstNameA varchar(50) NOT NULL,
  fatherNameA varchar(50) NOT NULL,
  grandFatherNameA varchar(50) NOT NULL,
  gender varchar(7) NOT NULL,
  weight float NOT NULL,
  nationality varchar(50) NOT NULL,
  GC date,
  EC date,
  POBregion  varchar(50) NOT NULL,
  POBzone  varchar(50) NOT NULL,
  POBcity  varchar(50) NOT NULL,
  POBworeda tinyint(4) NOT NULL,
  placeOccurrence varchar(50) NOT NULL,
  attendant varchar(50) NOT NULL,
  hospitalBirthCert varchar(255) NOT NULL,
  yellowCard varchar(255) NOT NULL,
  childPhoto varchar(255) NOT NULL,
  MfirstName varchar(50) NOT NULL,
  MfatherName varchar(50) NOT NULL,
  MgrandFatherName varchar(50) NOT NULL,
  MfirstNameA varchar(50) NOT NULL,
  MfatherNameA varchar(50) NOT NULL,
  MgrandFatherNameA varchar(50) NOT NULL,
  MGC date,
  MEC date,
  MPOBregion varchar(50) NOT NULL,
  MPOBzone varchar(50) NOT NULL,
  MPOBcity varchar(50) NOT NULL,
  MPOBworeda varchar(50) NOT NULL,
  MURregion varchar(50) NOT NULL,
  MURzone varchar(50) NOT NULL,
  MURcity varchar(50) NOT NULL,
  MURworeda tinyint(4) NOT NULL,
  MoccupationType varchar(50),
  MeducationalStatus varchar(50),
  Mreligion  varchar(50),
  Mnationality varchar(50) NOT NULL,
  MidNumber  varchar(50) NOT NULL,
  motherId  varchar(255) NOT NULL,
  FfirstName  varchar(50) NOT NULL,
  FfatherName  varchar(50) NOT NULL,
  FgrandFatherName  varchar(50) NOT NULL,
  FfirstNameA  varchar(50) NOT NULL,
  FfatherNameA varchar(50) NOT NULL,
  FgrandFatherNameA varchar(50) NOT NULL,
  FGC date,
  FEC date,
  FPOBregion varchar(50) NOT NULL,
  FPOBzone varchar(50) NOT NULL,
  FPOBcity varchar(50) NOT NULL,
  FPOBworeda varchar(50) NOT NULL,
  FURregion varchar(50) NOT NULL,
  FURzone varchar(50) NOT NULL,
  FURcity varchar(50) NOT NULL,
  FURworeda tinyint(4) NOT NULL,
  FoccupationType varchar(50),
  FeducationalStatus varchar(50),
  Freligion varchar(50),
  Fnationality varchar(50) NOT NULL,
  FidNumber varchar(50) NOT NULL,
  fatherId varchar(50) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` varchar(10) NOT NULL,
  `appointmentID` int(11) NOT NULL,
  `residentPhone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `civil_request`
--

CREATE TABLE `civil_request` (
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `House_Number` int(11) DEFAULT NULL,
  `Blood_Group_Certification` varchar(255) DEFAULT NULL,
  `Telephone_Number` int(11) DEFAULT NULL,
  `Recent_Passport_Size_Photo` varchar(255) DEFAULT NULL,
  `PORregion` varchar(50) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL,
  `Eduacational_Status` varchar(50) DEFAULT NULL,
  `Occupational_Status` varchar(50) DEFAULT NULL,
  `Emergencyfirstname` varchar(50) DEFAULT NULL,
  `Emergency_Contact_Phone` varchar(50) DEFAULT NULL,
  `Emergency_Contact_Blood_Type` varchar(255) DEFAULT NULL,
  `Police_Lost_ID_Certificate` varchar(255) DEFAULT NULL,
  `Rtype` varchar(10) DEFAULT NULL,
  `Middlename` varchar(30) NOT NULL,
  `amharicfirstname` varchar(50) NOT NULL,
  `amhariclastname` varchar(50) NOT NULL,
  `amharicmiddlename` varchar(50) NOT NULL,
  `Emergencylastname` varchar(50) NOT NULL,
  `emergencymiddlename` varchar(50) NOT NULL,
  `emergencyamhfirst` varchar(50) NOT NULL,
  `emergencyamhmidde` varchar(50) NOT NULL,
  `emergencyamhlast` varchar(50) NOT NULL,
  `PORzone` varchar(30) NOT NULL,
  `PORcity` varchar(30) NOT NULL,
  `PORworeda` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clerk`
--

CREATE TABLE `clerk` (
  `ClerkID` varchar(10) NOT NULL,
  `ReqStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deathrequest`
--

CREATE TABLE `deathrequest` (
  `Req_Type` varchar(10) NOT NULL,
  `dateofdeath` date NOT NULL,
  `deceasedFirstname` varchar(30) NOT NULL,
  `deceasedMiddlename` varchar(30) NOT NULL,
  `deceasedlastname` varchar(30) NOT NULL,
  `deceasedFNamharic` varchar(30) NOT NULL,
  `deceasedMNamharic` varchar(30) NOT NULL,
  `deceasedLNamharic` varchar(30) NOT NULL,
  `DOB` date DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `ethncity` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
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
  `rtype` varchar(10) DEFAULT NULL,
  `DPORzone` varchar(30) NOT NULL,
  `DPORcity` varchar(30) NOT NULL,
  `DPORworeda` tinyint(4) NOT NULL,
  `POOzone` varchar(30) NOT NULL,
  `POOcity` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `divorce_request`
--

CREATE TABLE `divorce_request` (
  `First_Name_of_Husband` varchar(50) DEFAULT NULL,
  `Last_Name_of_Husband` varchar(50) DEFAULT NULL,
  `First_Name_of_Wife` varchar(50) DEFAULT NULL,
  `Last_Name_of_Wife` varchar(50) DEFAULT NULL,
  `Date_of_Occurance` varchar(50) DEFAULT NULL,
  `Place_of_Occurance` varchar(50) DEFAULT NULL,
  `Place_of_Registration` varchar(50) DEFAULT NULL,
  `Place_of_Birth_of_Husband` varchar(50) DEFAULT NULL,
  `Place_of_Birth_of_Wife` varchar(50) DEFAULT NULL,
  `Place_of_Residence_of_Husband` varchar(50) DEFAULT NULL,
  `Place_of_Residence_of_Wife` varchar(50) DEFAULT NULL,
  `Ethnicity_of_Husband` varchar(50) DEFAULT NULL,
  `Ethnicity_of_Wife` varchar(50) DEFAULT NULL,
  `Religion_of_Husband` varchar(50) DEFAULT NULL,
  `Religion_of_Wife` varchar(50) DEFAULT NULL,
  `Occupational_Status_of_Husband` varchar(50) DEFAULT NULL,
  `Occupational_Status_of_Wife` varchar(50) DEFAULT NULL,
  `Educational_Status_of_Husband` varchar(50) DEFAULT NULL,
  `Educational_Status_of_wife` varchar(50) DEFAULT NULL,
  `Citizen_Ship_of_Husband` varchar(50) DEFAULT NULL,
  `Citizen_Ship_of_Wife` varchar(50) DEFAULT NULL,
  `ID_Number_of_Husband` int(11) DEFAULT NULL,
  `ID_Number_of_Wife` int(11) DEFAULT NULL,
  `Photo_of_Husband` varchar(255) DEFAULT NULL,
  `Photo_of_Wife` varchar(255) DEFAULT NULL,
  `childFirstName` varchar(30) DEFAULT NULL,
  `Name_of_Court` varchar(50) DEFAULT NULL,
  `Court_Registration_Number` int(11) DEFAULT NULL,
  `court_Issued_Certificate` varchar(255) DEFAULT NULL,
  `rtype` varchar(10) DEFAULT NULL,
  `husbandmiddlename` varchar(30) NOT NULL,
  `wifemiddlename` varchar(30) NOT NULL,
  `husbandFNamharic` varchar(30) NOT NULL,
  `husbandMNamharic` varchar(30) NOT NULL,
  `husbandLNamharic` varchar(30) NOT NULL,
  `wifeFNamharic` varchar(30) NOT NULL,
  `WifeMNamharic` varchar(30) NOT NULL,
  `WifeLNamharic` varchar(30) NOT NULL,
  `childmiddlename` varchar(30) NOT NULL,
  `childlastname` varchar(30) NOT NULL,
  `childFNamharic` varchar(30) NOT NULL,
  `childMNamharic` varchar(30) NOT NULL,
  `childLNamharic` varchar(30) NOT NULL,
  `POBregionhusband` varchar(30) NOT NULL,
  `POBzonehusband` varchar(30) NOT NULL,
  `POBcityhusband` varchar(30) NOT NULL,
  `POBworedahusband` varchar(30) NOT NULL,
  `POBregionwife` varchar(30) NOT NULL,
  `POBzonewife` varchar(30) NOT NULL,
  `POBcitywife` varchar(30) NOT NULL,
  `POBworedawife` varchar(30) NOT NULL,
  `DOBEChusband` date NOT NULL,
  `DOBGChusband` date NOT NULL,
  `DOBECwife` date NOT NULL,
  `DOBGCwife` date NOT NULL
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
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Sch_ID` int(11) NOT NULL,
  `ReqID` int(11) NOT NULL,
  `manager_ID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marriagerequest`
--

CREATE TABLE `marriagerequest` (
  `rtype` varchar(10) NOT NULL,
  `husbandFirstname` varchar(40) NOT NULL,
  `husbandmiddlename` varchar(40) NOT NULL,
  `husbandFNamharic` varchar(40) NOT NULL,
  `husbandMNamharic` varchar(40) NOT NULL,
  `husbandLNamharic` varchar(40) NOT NULL,
  `husbandlastname` varchar(40) NOT NULL,
  `wifeFirstname` varchar(40) NOT NULL,
  `WifeMiddlename` varchar(40) NOT NULL,
  `wifelastname` varchar(40) NOT NULL,
  `wifeFNamharic` varchar(40) NOT NULL,
  `wifeMNamharic` varchar(40) NOT NULL,
  `wifeLNamharic` varchar(40) NOT NULL,
  `dateofoccurance` varchar(30) NOT NULL,
  `placeofoccurance` varchar(40) NOT NULL,
  `placeofregistration` varchar(40) NOT NULL,
  `placeofbirthHusb` varchar(40) NOT NULL,
  `placeofbirthWife` varchar(40) NOT NULL,
  `placeofresidenceHusb` varchar(40) NOT NULL,
  `placeofresidenceWife` varchar(40) NOT NULL,
  `ethnicityhusband` varchar(40) NOT NULL,
  `ethnicitywife` varchar(40) NOT NULL,
  `religionhusband` varchar(40) NOT NULL,
  `occupationalStatushusband` varchar(40) NOT NULL,
  `occupationalstatuswife` varchar(40) NOT NULL,
  `premaritalstatushusband` varchar(40) NOT NULL,
  `premaritalstatuswife` varchar(40) NOT NULL,
  `educationalstatushusband` varchar(40) NOT NULL,
  `educationalstatuswife` varchar(40) NOT NULL,
  `citizenshipofhusband` varchar(40) NOT NULL,
  `citizenshipofwife` varchar(40) NOT NULL,
  `photoofhusband` varchar(40) NOT NULL,
  `photoofwife` varchar(40) NOT NULL,
  `certificatefrominstitution` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NotifictionID` int(11) NOT NULL,
  `ResPhone` varchar(10) NOT NULL,
  `AppID` int(11) NOT NULL,
  `notificationDate` date NOT NULL,
  `notificationContent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `RequestID` int(11) NOT NULL,
  `RequestType` varchar(10) NOT NULL,
  `RequestStatus` varchar(10) NOT NULL,
  `Payment` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requeststatus`
--

CREATE TABLE `requeststatus` (
  `Request_Status` varchar(10) NOT NULL,
  `ReqType` varchar(10) NOT NULL,
  `ReqID` int(11) NOT NULL,
  `EmployeeID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requesttype`
--

CREATE TABLE `requesttype` (
  `RequestType` varchar(10) NOT NULL,
  `RequestStatus` varchar(10) NOT NULL,
  `RequestID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `FirstName` varchar(30) NOT NULL,
  `MiddleName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `FNamharic` varchar(50) NOT NULL,
  `MNamharic` varchar(30) NOT NULL,
  `LNamharic` varchar(30) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Housenum` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scheduling`
--

CREATE TABLE `scheduling` (
  `ScheduleID` int(11) NOT NULL,
  `empID` varchar(10) NOT NULL,
  `reqStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `EmpID` (`EmpID`),
  ADD KEY `SchID` (`SchID`);

--
-- Indexes for table `birthrequest`
--
ALTER TABLE `birthrequest`
  ADD KEY `Rtype` (`Rtype`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD KEY `cashier_id` (`cashier_id`);

--
-- Indexes for table `civil_request`
--
ALTER TABLE `civil_request`
  ADD KEY `Rtype` (`Rtype`);

--
-- Indexes for table `clerk`
--
ALTER TABLE `clerk`
  ADD KEY `ClerkID` (`ClerkID`),
  ADD KEY `ReqStatus` (`ReqStatus`);

--
-- Indexes for table `deathrequest`
--
ALTER TABLE `deathrequest`
  ADD KEY `rtype` (`rtype`);

--
-- Indexes for table `divorce_request`
--
ALTER TABLE `divorce_request`
  ADD KEY `rtype` (`rtype`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD KEY `manager_ID` (`manager_ID`),
  ADD KEY `ReqID` (`ReqID`),
  ADD KEY `Sch_ID` (`Sch_ID`);

--
-- Indexes for table `marriagerequest`
--
ALTER TABLE `marriagerequest`
  ADD KEY `rtype` (`rtype`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NotifictionID`),
  ADD KEY `AppID` (`AppID`),
  ADD KEY `ResPhone` (`ResPhone`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `RequestStatus` (`RequestStatus`),
  ADD KEY `RequestType` (`RequestType`);

--
-- Indexes for table `requeststatus`
--
ALTER TABLE `requeststatus`
  ADD PRIMARY KEY (`Request_Status`),
  ADD KEY `ReqID` (`ReqID`),
  ADD KEY `ReqType` (`ReqType`);

--
-- Indexes for table `requesttype`
--
ALTER TABLE `requesttype`
  ADD PRIMARY KEY (`RequestType`),
  ADD KEY `RequestStatus` (`RequestStatus`),
  ADD KEY `RequestID` (`RequestID`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`Phone`);

--
-- Indexes for table `scheduling`
--
ALTER TABLE `scheduling`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `empID` (`empID`),
  ADD KEY `reqStatus` (`reqStatus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NotifictionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scheduling`
--
ALTER TABLE `scheduling`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `employee` (`EmployeeID`);

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmployeeID`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`SchID`) REFERENCES `scheduling` (`ScheduleID`);

--
-- Constraints for table `birthrequest`
--
ALTER TABLE `birthrequest`
  ADD CONSTRAINT `birthrequest_ibfk_1` FOREIGN KEY (`Rtype`) REFERENCES `requeststatus` (`Request_Status`);

--
-- Constraints for table `cashier`
--
ALTER TABLE `cashier`
  ADD CONSTRAINT `cashier_ibfk_1` FOREIGN KEY (`cashier_id`) REFERENCES `employee` (`EmployeeID`);

--
-- Constraints for table `civil_request`
--
ALTER TABLE `civil_request`
  ADD CONSTRAINT `civil_request_ibfk_1` FOREIGN KEY (`Rtype`) REFERENCES `requesttype` (`RequestType`);

--
-- Constraints for table `clerk`
--
ALTER TABLE `clerk`
  ADD CONSTRAINT `clerk_ibfk_1` FOREIGN KEY (`ClerkID`) REFERENCES `employee` (`EmployeeID`),
  ADD CONSTRAINT `clerk_ibfk_2` FOREIGN KEY (`ReqStatus`) REFERENCES `requeststatus` (`Request_Status`);

--
-- Constraints for table `deathrequest`
--
ALTER TABLE `deathrequest`
  ADD CONSTRAINT `deathrequest_ibfk_1` FOREIGN KEY (`rtype`) REFERENCES `requesttype` (`RequestType`);

--
-- Constraints for table `divorce_request`
--
ALTER TABLE `divorce_request`
  ADD CONSTRAINT `divorce_request_ibfk_1` FOREIGN KEY (`rtype`) REFERENCES `requesttype` (`RequestType`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`manager_ID`) REFERENCES `employee` (`EmployeeID`),
  ADD CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`ReqID`) REFERENCES `request` (`RequestID`),
  ADD CONSTRAINT `manager_ibfk_3` FOREIGN KEY (`Sch_ID`) REFERENCES `scheduling` (`ScheduleID`);

--
-- Constraints for table `marriagerequest`
--
ALTER TABLE `marriagerequest`
  ADD CONSTRAINT `marriagerequest_ibfk_1` FOREIGN KEY (`rtype`) REFERENCES `requesttype` (`RequestType`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`AppID`) REFERENCES `appointments` (`AppointmentID`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`ResPhone`) REFERENCES `resident` (`Phone`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`RequestStatus`) REFERENCES `requeststatus` (`Request_Status`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`RequestType`) REFERENCES `requesttype` (`RequestType`);

--
-- Constraints for table `requeststatus`
--
ALTER TABLE `requeststatus`
  ADD CONSTRAINT `requeststatus_ibfk_1` FOREIGN KEY (`ReqID`) REFERENCES `request` (`RequestID`),
  ADD CONSTRAINT `requeststatus_ibfk_2` FOREIGN KEY (`ReqType`) REFERENCES `requesttype` (`RequestType`);

--
-- Constraints for table `requesttype`
--
ALTER TABLE `requesttype`
  ADD CONSTRAINT `requesttype_ibfk_1` FOREIGN KEY (`RequestStatus`) REFERENCES `requeststatus` (`Request_Status`),
  ADD CONSTRAINT `requesttype_ibfk_2` FOREIGN KEY (`RequestID`) REFERENCES `request` (`RequestID`);

--
-- Constraints for table `scheduling`
--
ALTER TABLE `scheduling`
  ADD CONSTRAINT `scheduling_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employee` (`EmployeeID`),
  ADD CONSTRAINT `scheduling_ibfk_2` FOREIGN KEY (`reqStatus`) REFERENCES `requeststatus` (`Request_Status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
