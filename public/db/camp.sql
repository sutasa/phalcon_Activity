-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 11:23 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camp`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `idActivity` int(11) NOT NULL,
  `ActivityName` varchar(200) NOT NULL,
  `Detail` varchar(500) NOT NULL,
  `StartDate` datetime(6) NOT NULL,
  `EndDate` datetime(6) NOT NULL,
  `YearSTD` varchar(1) NOT NULL,
  `Location_idLocation` int(11) NOT NULL,
  `Teacher_idTeacher` int(11) NOT NULL,
  `Type_idType` int(11) NOT NULL,
  `YearOfEducation_semeter` int(11) NOT NULL,
  `YearOfEducation_Year` int(11) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`idActivity`, `ActivityName`, `Detail`, `StartDate`, `EndDate`, `YearSTD`, `Location_idLocation`, `Teacher_idTeacher`, `Type_idType`, `YearOfEducation_semeter`, `YearOfEducation_Year`, `picture`) VALUES
(1, 'ค่ายเขียนโปรแกรมหลักสูตรวิศวกรรมซอฟต์แวร์', 'เป็นค่ายที่จัดขึ้นเพื่อให้นักศึกษาหลักสูตรวิศวะกรรมซอฟต์เเวัตั้งเเต่ชั้นปีที่ 1 จนถึงชั้นปีที่ 4 เข้าร่วม เพื่อฝึกฝนการทำงาน', '2016-03-09 00:00:00.000000', '2016-03-10 00:00:00.000000', '1', 1, 5, 2, 3, 2559, '/phalcon_Activity/public/img/imgActivity/6.jpg'),
(2, 'Boom พี่บัณฑิต', 'ทางเมเจอร์ swe ได้จัดทำซุ้ม ฺBoom เพื่อทำการ Boom บัณฑิตที่จบใหม่ เเละเป็นการหารายได้เข้าเมเจอร์ เพื่อไว้ใช้จ่ายในกิจกรรมต่างๆ ', '2016-02-09 00:00:00.000000', '2016-02-10 00:00:00.000000', '2', 2, 5, 2, 3, 2559, '/phalcon_Activity/public/img/imgActivity/1.jpg'),
(3, 'การเเข่งขันกีฬา ITM ครั้งที่ 18', 'หลักสูตรวิศกรรมซอตฟ์เเวร์เข้าร่วมเเข่งขันกีฬา ITM ครั้งที่ 15 ณ มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตหาดใหญ่', '2016-01-01 00:00:00.000000', '2016-01-05 00:00:00.000000', '3', 3, 2, 2, 3, 2559, '/phalcon_Activity/public/img/imgActivity/2.jpg'),
(4, 'Meeting', 'นักศึกาาชั้นปีที่ 3 ทำการจัดงานเลี้ยงให้กับรุ้นพี่ที่ กำลังจบฝหม่โดยมีนีกศึกาาชั้นปีต่างๆมาเข้าร่วม', '2016-04-20 00:00:00.000000', '2016-04-21 00:00:00.000000', '2', 1, 1, 1, 3, 2559, '/phalcon_Activity/public/img/imgActivity/5\r\n.jpg'),
(5, 'รับน้องทะเลปี 59', 'นักศึกษาชั้นปีที่ 2 จัดการรับน้องทะเลโดยสถานที่คือชายหาดใกล้กับมหาวิทยาลัย', '2017-05-08 00:00:00.000000', '2017-05-11 00:00:00.000000', '2', 2, 4, 1, 3, 2559, '/phalcon_Activity/public/img/imgActivity/7\r\n.jpg'),
(6, 'การเเข่งขันกีฬา ITM ครั้งที่ 16', 'หลักสูตรวิศกรรมซอตฟ์เเวร์เข้าร่วมเเข่งขันกีฬา ITM ครั้งที่ 16 ณ มหาวิทยาลัยทักษิณ วิทยาเขตพัทลุง', '2017-04-02 00:00:00.000000', '2017-04-06 00:00:00.000000', '1', 3, 5, 2, 3, 2559, '\r\n/phalcon_Activity/public/img/imgActivity/3.jpg'),
(7, 'รับน้องทะเลปี 58', 'นักศึกษาชั้นปีที่ 2 จัดการรับน้องทะเลโดยสถานที่คือชายหาดใกล้กับมหาวิทยาลัย', '2016-05-07 00:00:00.000000', '2016-05-09 00:00:00.000000', '2', 3, 1, 1, 3, 2559, '\r\n/phalcon_Activity/public/img/imgActivity/8.jpg\r\n\r\n'),
(8, 'ค่าย Scrum', 'ทางหลักสูตรจัดการอบรมความรู้เรื่องการทำ Scrum ให้กับนักศึกษาเป็นเวลา 2 วัน', '2017-03-14 00:00:00.000000', '2017-03-15 00:00:00.000000', '2', 2, 2, 2, 3, 2559, '\r\n/phalcon_Activity/public/img/imgActivity/9.jpg\r\n\r\n'),
(9, 'Promote major', 'อาจารย์เเละตัวเเทนนักศึกษาจัดนิทัศการเเสดงรายละเอียด ของวิชา เเละสาขา เพื่อเชิญชวนให้มาสมัครเรียน', '2017-03-17 00:00:00.000000', '2017-03-19 00:00:00.000000', '3', 3, 4, 1, 3, 2559, '/phalcon_Activity/public/img/imgActivity/10.jpg'),
(10, 'จัดนิทัศการณ์ในงาน WalailakExpo', '26/3/60 หลักสูตรวิศวกรรมซอฟต์แวร์ ได้รับเกียรติจากอดีตนายกรัฐมนตรี \"ลุงชวน\" ชวน หลีกภัย และคุณเทพไท เสนพงศ์ แวะมาเยี่ยมชมผลงานนักศึกษา ณ โซน Digital Land อาคารวิชาการ 6 งาน #WalailakExpo ซึ่งจัดขึ้นในช่วง 24 มี.ค.-1 เม.ย. 60 \r\nนักศึกษาได้แนะนำผลงานและขอถ่ายภาพด้วย ท่านอดีตนายกใจดีและเป็นกันเองกับทุกคน\r\nขอบคุณภาพจาก อ.จงสุข อ.ขุนดี', '2016-03-24 00:00:00.000000', '2016-03-01 00:00:00.000000', '2', 5, 4, 1, 3, 2559, '/phalcon_Activity/public/img/imgActivity/11.jpg'),
(12, 'โครงการพัฒนา Software ร่วมกับบริษัทเทรนด์วีจี 3 จำกัด', 'ลักสูตรวิศวกรรมซอฟต์แวร์ มหาวิทยาลัยวลัยลักษณ์สร้างความร่วมมือกับบริษัทเทรนด์วีจี 3 จำกัด (ผลิตซอฟต์แวร์ให้บริการและดูแลเนื้อหาดิจิตัลในเครือไทยรัฐ) จัดทำโครงการพัฒนาซอฟต์แวร์ร่วมกัน โดยนำมาเป็นโจทย์จริงสำหรับวิชาโครงงานนักศึกษาชั้นปีที่ 4 ทำให้นักศึกษาได้ฝึกพัฒนาระบบตามความต้องการของผู้ใช้งานจริง ฝึกการใช้เครื่องมือและพัฒนางานตามกระบวนการผลิตซอฟต์แวร์ที่มีคุณภาพ ', '2017-02-04 00:00:00.000000', '2017-02-05 00:00:00.000000', '4', 4, 1, 1, 3, 2559, '/phalcon_Activity/public/img/imgActivity/12.jpg'),
(13, 'สวทชและมหาวิทยาลัยวลัยลักษณ์ ร่วมพัฒนามาตรฐานวิชาชีพไอทีสำหรับบุคคลากรด้านไอที', 'สวทชและมหาวิทยาลัยวลัยลักษณ์ ร่วมพัฒนามาตรฐานวิชาชีพไอทีสำหรับบุคคลากรด้านไอที และ Non-IT ของประเทศ ผ่านโครงการสอบ มาตรฐานวิชาชีพไอที - ITPE\r\nชมภาพบรรยากาศการสอบมาตรฐานวิชาชีพไอที - ITPE ได้ที่ศูนย์สอบมหาวิทยาลัยวลัยลักษณ์ จังหวัดนครศรีธรรมราช', '2016-10-16 00:00:00.000000', '2016-10-17 00:00:00.000000', '3', 1, 3, 1, 3, 2559, '/phalcon_Activity/public/img/imgActivity/13.jpg'),
(14, 'กิจกรรมหน่วยบ่มเพาะวิศวกรซอฟต์แวร์วลัยลักษณ์', 'กิจกรรมหน่วยบ่มเพาะวิศวกรซอฟต์แวร์วลัยลักษณ์ \"Soft Skills for Software Engineers\" จัดให้นักศึกษา SWE ชั้นปี 3 และ 4', '2015-09-13 00:00:00.000000', '2015-09-14 00:00:00.000000', '3', 1, 2, 2, 3, 2558, '/phalcon_Activity/public/img/imgActivity/14.jpg'),
(15, 'กิจกรรม SWE เรียนรู้และเข้าใจตนเอง (SWE Journey into Yourself)', 'กิจกรรม SWE เรียนรู้และเข้าใจตนเอง (SWE Journey into Yourself)\r\nเป็นกิจกรรมที่ช่วยให้นักศึกษาได้เรียนรู้เเละ ทำความเข้าใจในรายวิชา เเละสาขาที่ตนได้ทำการศึกษา', '2015-09-02 00:00:00.000000', '2015-09-03 00:00:00.000000', '2', 3, 4, 1, 3, 2558, '/phalcon_Activity/public/img/imgActivity/15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detailactivity`
--

CREATE TABLE `detailactivity` (
  `idDetailactivity` int(11) NOT NULL,
  `idStudent` varchar(8) NOT NULL,
  `idActivity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detailactivity`
--

INSERT INTO `detailactivity` (`idDetailactivity`, `idStudent`, `idActivity`) VALUES
(1, '56545321', 1),
(3, '56789000', 1),
(4, '58761121', 1),
(5, '58765741', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `idLocation` int(11) NOT NULL,
  `LocationName` varchar(45) DEFAULT NULL,
  `room` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`idLocation`, `LocationName`, `room`) VALUES
(1, 'มหาวิทยาลัยวลัยลักษณ์', 'อาคารวิจัย'),
(2, 'มหาวิทยาลัยวลัยลักษณ์', 'อาคารเรียนรวม 3'),
(3, 'มหาวิทยาลัยวลัยลักษณ์', 'นอกสถานที่'),
(4, 'มหาวิยาลัยวลัยลักษณื', 'อาคารนวัฒกรรม'),
(5, 'มหาวิยาลัยวลัยลักษณ์', 'อาคารวิชาการ 3');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `idStudent` varchar(8) NOT NULL,
  `NameTitle` varchar(45) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `Mail` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`idStudent`, `NameTitle`, `FirstName`, `LastName`, `Year`, `Phone`, `Mail`) VALUES
('56545321', 'นาย', 'รุจิภาส', 'ปันทโมรา', 5, '', ''),
('56789000', 'นางสาว', 'สาว', 'แล้วไง', 8, NULL, NULL),
('58149840', 'นาย', 'อลีฟ', 'รักไทรทอง', 2, '', ''),
('58761121', 'เด็กหญิง', 'อโออิ', 'อิไตโตะ', 2, '', ''),
('58765741', 'นางสาว', 'สมศักดิ์', 'หมั่นถอม', 2, NULL, NULL),
('59898881', 'เด็กชาย', 'พงศธร', 'จันด้วง', 3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `idTeacher` int(11) NOT NULL,
  `NameTitle` varchar(255) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `Mail` varchar(45) DEFAULT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`idTeacher`, `NameTitle`, `username`, `password`, `FirstName`, `LastName`, `Phone`, `Mail`, `admin`) VALUES
(1, 'ผู้ช่วยศาสตราจารย์', 'qwe', 'qwe', 'อุหมาด', 'หมัดอาด้ำ', '', '', 1),
(2, 'ผู้ช่วยศาสตราจารย์', '5', '5', 'เยาวเรศ', 'ศิริสถิตย์กุล', NULL, NULL, 0),
(3, 'อาจารย์', 'html@swe.com', 'zxczxc', 'ศิริภิญโญ', 'จันทมุณี', NULL, NULL, 0),
(4, 'ผู้ช่วยศาสตราจารย์ ดร.', 'intro.swe@coolmail.co.th', 'tyutyu', 'ฐิมาพร', 'เพชรแก้ว', NULL, NULL, 0),
(5, 'อาจารย์', 'charoenporn.bo@wu.ac.th', '55', 'เจริญพร', 'บัวเเย้ม', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `idType` int(11) NOT NULL,
  `TypeName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`idType`, `TypeName`) VALUES
(1, 'กิจกรรมหลักสูตร'),
(2, 'กิจกรรมสำนักวิชา');

-- --------------------------------------------------------

--
-- Table structure for table `yearofeducation`
--

CREATE TABLE `yearofeducation` (
  `semeter` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yearofeducation`
--

INSERT INTO `yearofeducation` (`semeter`, `Year`, `StartDate`, `EndDate`) VALUES
(3, 2559, '2001-01-01', '2001-02-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`idActivity`),
  ADD KEY `fk_Activity_Locaion_idx` (`Location_idLocation`),
  ADD KEY `fk_Activity_Teacher1_idx` (`Teacher_idTeacher`),
  ADD KEY `fk_Activity_Type1_idx` (`Type_idType`),
  ADD KEY `fk_Activity_YearOfEducation1_idx` (`YearOfEducation_semeter`,`YearOfEducation_Year`);

--
-- Indexes for table `detailactivity`
--
ALTER TABLE `detailactivity`
  ADD PRIMARY KEY (`idDetailactivity`),
  ADD KEY `idStudent` (`idStudent`),
  ADD KEY `idActivity` (`idActivity`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`idLocation`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idStudent`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`idTeacher`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idType`);

--
-- Indexes for table `yearofeducation`
--
ALTER TABLE `yearofeducation`
  ADD PRIMARY KEY (`semeter`,`Year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `idActivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `detailactivity`
--
ALTER TABLE `detailactivity`
  MODIFY `idDetailactivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `idLocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `idTeacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `fk_Activity_Location` FOREIGN KEY (`Location_idLocation`) REFERENCES `location` (`idLocation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Activity_Teacher` FOREIGN KEY (`Teacher_idTeacher`) REFERENCES `teacher` (`idTeacher`),
  ADD CONSTRAINT `fk_Activity_Type1` FOREIGN KEY (`Type_idType`) REFERENCES `type` (`idType`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Activity_YearOfEducation1` FOREIGN KEY (`YearOfEducation_semeter`) REFERENCES `yearofeducation` (`semeter`);

--
-- Constraints for table `detailactivity`
--
ALTER TABLE `detailactivity`
  ADD CONSTRAINT `idStudent` FOREIGN KEY (`idStudent`) REFERENCES `student` (`idStudent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
