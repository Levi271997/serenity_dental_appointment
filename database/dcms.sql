-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 07:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_num` int(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`admin_id`, `admin_name`, `admin_num`, `admin_email`) VALUES
(1, 'admin', 123456789, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `app_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `statusID` int(50) NOT NULL DEFAULT 3,
  `dentistID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`app_id`, `date`, `time`, `statusID`, `dentistID`, `userID`, `price`) VALUES
(35, '2023-02-22', '11:53:00', 4, 41, 41, 2000),
(36, '2023-02-28', '21:12:00', 5, 31, 41, 3000),
(37, '2023-03-04', '06:10:00', 4, 31, 41, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tblappointmentdetails`
--

CREATE TABLE `tblappointmentdetails` (
  `id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblappointmentdetails`
--

INSERT INTO `tblappointmentdetails` (`id`, `app_id`, `service_id`) VALUES
(1, 35, 3),
(2, 35, 6),
(3, 36, 3),
(4, 36, 1),
(5, 37, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tblcredentials`
--

CREATE TABLE `tblcredentials` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcredentials`
--

INSERT INTO `tblcredentials` (`id`, `userid`, `username`, `password`, `role`) VALUES
(1, 1, 'admin', 'admin', 2),
(2, 41, 'user', '!Admin27', 1),
(3, 31, 'dentist', 'dentist', 4),
(4, 4, 'staff', 'staff', 3),
(7, 41, 'user', '!Admin27', 4),
(8, 42, 'sdd', 'sdsd', 4),
(9, 7, 'iamgsda', 'adadasdad', 3),
(12, 45, 'dentistko', 'dentistko', 4),
(13, 68, 'jannex', 'jannex', 1),
(14, 69, 'Jannex', '!Jannex27', 1),
(15, 70, 'Jannexjanjan', '!Jannex27', 1),
(16, 46, 'taps', 'pats', 4),
(17, 47, 'dan', 'dan', 4),
(18, 48, 'pa', 'pa', 4),
(19, 49, 'a', 'a', 4),
(20, 50, 'v', 'v', 4),
(21, 51, 'b', 'b', 4),
(22, 52, 'c', 'c', 4),
(23, 53, 'c', 'c', 4),
(24, 54, 'd', 'd', 4),
(25, 55, 'vv', 'vvv', 4),
(26, 56, 'vv', 'vvv', 4),
(27, 57, 'vv', 'vvv', 4),
(28, 58, 'vv', 'vvv', 4),
(29, 59, 'vv', 'vvv', 4),
(30, 60, 'vv', 'vvv', 4),
(31, 61, 'vv', 'vvv', 4),
(32, 62, 'jkj', 'kjkjk', 4),
(33, 63, 'jkj', 'kjkjk', 4),
(34, 64, 'fg', 'fg', 4),
(35, 65, 'fg', 'fg', 4),
(36, 66, 's', 's', 4),
(37, 67, 'cvcv', 'cvcv', 4),
(38, 68, 'cvcv', 'cvcv', 4),
(39, 69, 'DFDF', 'DFDF', 4),
(40, 70, 'd', 'd', 4),
(41, 71, 'gh', 'gh', 4),
(42, 72, 'dfgjdkjfgdfgfdgd', 'd', 4),
(43, 73, 'jkjlk', 'k;klkl', 4),
(44, 74, 'jkl', 'jkl', 4),
(45, 75, 'jl', 'jl', 4),
(46, 76, 'dentistone', 'dentistone', 4),
(47, 8, 'staffone', 'staffone', 3),
(48, 9, 'sdd', 'sd', 3),
(49, 10, 'sd', 'sd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbldentist`
--

CREATE TABLE `tbldentist` (
  `denlog_id` int(11) NOT NULL,
  `den_fname` varchar(100) NOT NULL,
  `den_gender` int(10) NOT NULL,
  `den_cnum` int(100) NOT NULL,
  `den_sp` int(10) NOT NULL,
  `den_emailAdd` varchar(100) NOT NULL,
  `den_age` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldentist`
--

INSERT INTO `tbldentist` (`denlog_id`, `den_fname`, `den_gender`, `den_cnum`, `den_sp`, `den_emailAdd`, `den_age`) VALUES
(31, 'juan de juan', 2, 555, 1, 'juan@gmail.com', 50),
(45, 'dentist', 1, 9434, 1, 'dentistko@test.com', 23),
(46, 'tapolano', 1, 9, 1, 'levijanmartz27@gmail.com', 2),
(47, 'dan', 1, 9, 1, 'jan@gmail', 34),
(48, 'pa', 1, 34, 1, 'pa@asd', 34),
(49, 'a', 1, 3, 1, 'a@a', 3),
(50, 'v', 1, 2, 1, 'v@v', 2),
(51, 'b', 1, 3, 1, 'b@', 2),
(52, 'c', 1, 3, 1, 'c@c', 2),
(53, 'c', 1, 3, 1, 'c@v', 2),
(54, 'd', 1, 2, 1, 'd@d', 2),
(55, 'vv', 1, 2, 1, 'vv@v', 2),
(56, 'vv', 1, 2, 1, 'vv@v', 2),
(57, 'vv', 1, 2, 1, 'vv@v', 2),
(58, 'vv', 1, 2, 1, 'vv@v', 2),
(59, 'vv', 1, 2, 1, 'vv@v', 2),
(60, 'vv', 1, 2, 1, 'vv@v', 2),
(61, 'vv', 1, 2, 1, 'vv@v', 2),
(62, 'jkjk', 1, 23, 1, 'gfgfg@sdsd', 23),
(63, 'jkjk', 1, 23, 1, 'gfgfg@sdsd', 23),
(64, 'fg', 1, 3, 1, 'fg@', 3),
(65, 'fg', 1, 3, 1, 'fg@', 3),
(66, 's', 1, 2, 1, 's@s', 2),
(67, 'cvcvcv', 1, 232, 1, 'cvcv@sd', 3),
(68, 'cvcvcv', 1, 232, 1, 'cvcv@sd', 3),
(69, 'DFDFDF', 1, 34, 1, 'DF@FDDF', 3),
(70, 'd', 1, 3, 1, 'd@f', 0),
(71, 'ghgh', 1, 4, 1, 'gh@fg', 45),
(72, 'sd', 1, 3, 1, 'd@dsd', 23),
(73, 'jk', 1, 3, 1, '123asd@hj', 23),
(74, 'hjkjk', 1, 34, 1, 'klj@jhj', 25),
(75, 'jkjl', 1, 5656, 1, 'jkl@uug', 25),
(76, 'dentistone', 1, 334, 1, 'dentist@test', 34);

-- --------------------------------------------------------

--
-- Table structure for table `tblemailotp`
--

CREATE TABLE `tblemailotp` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblemailotp`
--

INSERT INTO `tblemailotp` (`id`, `email`, `otp`) VALUES
(23, 'levijanmartz27@gmail.com', 6224),
(24, '', 3052);

-- --------------------------------------------------------

--
-- Table structure for table `tblgender`
--

CREATE TABLE `tblgender` (
  `gn_id` int(11) NOT NULL,
  `gn_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblgender`
--

INSERT INTO `tblgender` (`gn_id`, `gn_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'LGBTQ');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `srv_id` int(11) NOT NULL,
  `srv_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `srv_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`srv_id`, `srv_name`, `description`, `srv_price`) VALUES
(1, 'Oral Prophylaxi', 'Oral Prophylaxis Is A Cleaning Procedure Performed By A Dentist Or Oral Hygienist In Order To Thoroughly Clean The Teeth. In This Procedure Bacterial Plaque And Tartar Are Removed From Te Surface Of The Teeth With The Help Of Scaling And Polishing.', '1000.00'),
(2, ' Composite filling', 'Composite Fillings Are Strong, But May Not Be As Hard Wearing As Amalgam Fillings. Composite Fillings Are Tooth Coloured And Are Made From Powdered Glass Quartz, Silica Or Other Ceramic Particles Added To A Resin Base. After The Tooth Is Prepared, The Filling Is Bonded Onto The Area And A Light Shone Onto It To Set It. The Dentist Will Choose A Shade To Match Your Own Teeth, Although Over Time Staining Can Happen.', '1000.00'),
(3, 'Tooth Extraction', 'A Tooth Extraction Is A Procedure To Remove A Tooth From The Gum Socket. It Is Usually Done By A General Dentist, An Oral Surgeon, Or A Periodontist.', '1000.00'),
(4, 'Denture', 'An Artificial Replacement Of One Or Several Of The Teeth (Partial Denture ), Or All Of The Teeth (Full Denture ) Of Either Or Both Jaws; Dental Prosthesis.', '1000.00'),
(6, 'Teeth Whitening', 'Tooth whitening is any process that lightens the color of a tooth. Whitening may be accomplished by physical removal of the stain or a chemical reaction to lighten the tooth color.', '2000.00'),
(7, 'Veneers', 'A veneer is a thin layer of porcelain made to fit over the front surface of a tooth, like a false fingernail fits over a nail. Sometimes a natural-colour ‘composite\' material is used instead of porcelain.', '3000.00'),
(8, 'Root Canal Treatment', 'Root canal treatment (endodontics) is a dental procedure used to treat infection at the center of a tooth. Root canal treatment is not painful and can save a tooth that might otherwise have to be removed completely.', '2000.00'),
(9, 'Dental Implants', 'Dental Implants Are Medical Devices Surgically Implanted Into The Jaw To Restore A Person\'s Ability To Chew Or Their Appearance. They Provide Support For Artificial (Fake) Teeth, Such As Crowns, Bridges, Or Dentures.', '23000.00'),
(10, 'Orthodontics(Braces)', 'A Branch Of Dentistry Dealing With Irregularities Of The Teeth (Such As Malocclusion) And Their Correction (As By Braces) Also : The Treatment Provided By A Specialist In Orthodontics.', '34000.00'),
(14, 'sdsdsd', 'sdsdsd', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblspeciality`
--

CREATE TABLE `tblspeciality` (
  `sp_id` int(11) NOT NULL,
  `sp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblspeciality`
--

INSERT INTO `tblspeciality` (`sp_id`, `sp_name`) VALUES
(1, 'Orthodontist'),
(2, 'Cosmitics');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `staff_id` int(11) NOT NULL,
  `staff_fname` varchar(100) NOT NULL,
  `staff_cnum` int(100) NOT NULL,
  `staff_emailAdd` varchar(100) NOT NULL,
  `staff_age` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`staff_id`, `staff_fname`, `staff_cnum`, `staff_emailAdd`, `staff_age`) VALUES
(4, 'lore jane', 23, 'lorejane@gmail.com', 25),
(7, 'isda', 123, 'isda@test', 25),
(8, 'staffone', 9343, 'staff@staff', 34),
(9, 'sd', 0, 'sd', 0),
(10, 'sd', 0, 'sd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstaffids`
--

CREATE TABLE `tblstaffids` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `id_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstatus`
--

CREATE TABLE `tblstatus` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstatus`
--

INSERT INTO `tblstatus` (`status_id`, `status_name`) VALUES
(1, 'active'),
(2, 'inactive'),
(3, 'pending'),
(4, 'approve'),
(5, 'canceled');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `uID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uEmail` varchar(50) NOT NULL,
  `uPnum` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`uID`, `name`, `uEmail`, `uPnum`) VALUES
(41, 'cardo', 'levijanmartz27@gmail.com', 2),
(42, 'denze', 'levijanmartz27@gmail.com', 9089797),
(68, 'jannex', 'levijanmartz27@gmail.com', 23424),
(69, 'Jannex', 'levijanmartz27@gmail.com', 90),
(70, 'levi', 'levijanmartz27@gmail.com', 888);

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

CREATE TABLE `tblusertype` (
  `usertype_id` int(11) NOT NULL,
  `usertype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusertype`
--

INSERT INTO `tblusertype` (`usertype_id`, `usertype_name`) VALUES
(1, 'USER'),
(2, 'ADMIN'),
(3, 'STAFF'),
(4, 'DENTIST');

-- --------------------------------------------------------

--
-- Table structure for table `tblvalidphoto`
--

CREATE TABLE `tblvalidphoto` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `id_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvalidphoto`
--

INSERT INTO `tblvalidphoto` (`id`, `userid`, `id_path`) VALUES
(1, 47, 'validids/IMG-63efcb4b31cf37.35899817.'),
(2, 48, 'validids/IMG-63efcbaed7a263.93056088.'),
(3, 49, 'validids/IMG-63f071cc6b15c5.84827604.'),
(4, 50, 'validids/IMG-63f07292d14640.24069677.jpg'),
(5, 51, './validids/IMG-63f072e66eaba5.22131537.jpg'),
(6, 52, 'validids/IMG-63f074898c03b6.67406782.jpg'),
(7, 53, 'validids/IMG-63f075cc875662.60399838.jpg'),
(8, 54, 'validids/IMG-63f076b0aa9cd1.83916299.jpg'),
(9, 55, 'validids/IMG-63f07719a2a197.01502420.jpg'),
(10, 56, 'validids/IMG-63f0774e70db04.47803801.jpg'),
(11, 57, 'validids/IMG-63f077521cef85.50664119.jpg'),
(12, 58, 'validids/IMG-63f0775b0f5c11.35923894.jpg'),
(13, 59, 'validids/IMG-63f07776637821.96063266.jpg'),
(14, 60, 'validids/IMG-63f07841e2c2b3.68937060.jpg'),
(15, 61, 'validids/IMG-63f078d94bff43.21236860.jpg'),
(16, 62, 'validids/IMG-63f0794b387a58.23291455.jpg'),
(17, 63, 'validids/IMG-63f081440e75f7.47663531.jpg'),
(18, 64, 'validids/IMG-63f08160c396b2.92962835.jpg'),
(19, 65, 'validids/IMG-63f082f9d04362.06116700.jpg'),
(20, 66, 'validids/IMG-63f083082f4987.74473626.jpg'),
(21, 67, 'validids/IMG-63f0844d197d73.63456652.jpg'),
(22, 68, 'validids/IMG-63f08c90121796.90226292.jpg'),
(23, 69, 'validids/IMG-63f08ca3d5bf93.15380043.jpg'),
(24, 70, 'validids/IMG-63f08d358f4941.68864610.jpg'),
(25, 71, 'validids/IMG-63f08efc31dc56.16747304.jpg'),
(26, 72, 'validids/IMG-63f08f81d6acd0.96482913.jpg'),
(27, 73, 'validids/IMG-63f09030c58662.84168687.jpg'),
(28, 74, 'validids/IMG-63f09075eeb292.77528719.jpg'),
(29, 75, 'validids/IMG-63f090b03eb411.78079824.jpg'),
(30, 76, 'validids/IMG-63f2537605ccf4.98426194.jpg'),
(31, 8, 'validids/IMG-63f255f90966f3.14186841.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `tblappointmentdetails`
--
ALTER TABLE `tblappointmentdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcredentials`
--
ALTER TABLE `tblcredentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldentist`
--
ALTER TABLE `tbldentist`
  ADD PRIMARY KEY (`denlog_id`);

--
-- Indexes for table `tblemailotp`
--
ALTER TABLE `tblemailotp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgender`
--
ALTER TABLE `tblgender`
  ADD PRIMARY KEY (`gn_id`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`srv_id`);

--
-- Indexes for table `tblspeciality`
--
ALTER TABLE `tblspeciality`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tblstaffids`
--
ALTER TABLE `tblstaffids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstatus`
--
ALTER TABLE `tblstatus`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`uID`);

--
-- Indexes for table `tblusertype`
--
ALTER TABLE `tblusertype`
  ADD PRIMARY KEY (`usertype_id`);

--
-- Indexes for table `tblvalidphoto`
--
ALTER TABLE `tblvalidphoto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblappointmentdetails`
--
ALTER TABLE `tblappointmentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcredentials`
--
ALTER TABLE `tblcredentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbldentist`
--
ALTER TABLE `tbldentist`
  MODIFY `denlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tblemailotp`
--
ALTER TABLE `tblemailotp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblgender`
--
ALTER TABLE `tblgender`
  MODIFY `gn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `srv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblspeciality`
--
ALTER TABLE `tblspeciality`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblstaffids`
--
ALTER TABLE `tblstaffids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstatus`
--
ALTER TABLE `tblstatus`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tblusertype`
--
ALTER TABLE `tblusertype`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblvalidphoto`
--
ALTER TABLE `tblvalidphoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
