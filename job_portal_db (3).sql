-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2026 at 09:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_permission`
--

CREATE TABLE `action_permission` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `delete_data` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'o = no and 1= yes',
  `edit_data` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'o = no and 1= yes',
  `add_data` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'o = no and 1= yes',
  `activate_deactivate_data` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'o = no and 1= yes',
  `assigned_role` tinyint NOT NULL DEFAULT '0' COMMENT 'o = no and 1= yes',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `action_permission`
--

INSERT INTO `action_permission` (`id`, `user_id`, `delete_data`, `edit_data`, `add_data`, `activate_deactivate_data`, `assigned_role`, `created_at`, `updated_at`) VALUES
(2, 12, 0, 1, 0, 1, 0, '2026-06-23 09:42:57', '2026-06-24 06:49:55'),
(3, 29, 0, 0, 0, 0, 0, '2026-06-24 06:54:33', '2026-06-24 09:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `admit_cards`
--

CREATE TABLE `admit_cards` (
  `id` int NOT NULL,
  `application_id` int DEFAULT NULL,
  `exam_id` int DEFAULT NULL,
  `admit_number` varchar(50) DEFAULT NULL,
  `issue_date` datetime DEFAULT NULL,
  `download_count` int DEFAULT '0',
  `qr_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int NOT NULL,
  `job_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `resume_id` int DEFAULT NULL,
  `previous_salary` decimal(10,2) DEFAULT NULL,
  `expected_salary` decimal(10,2) DEFAULT NULL,
  `cover_letter` text,
  `status` enum('pending','reviewed','shortlisted','rejected','accepted') DEFAULT 'pending',
  `admit_card_sts` tinyint NOT NULL DEFAULT '0' COMMENT '1 is active 0 inactive',
  `applied_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `user_id`, `resume_id`, `previous_salary`, `expected_salary`, `cover_letter`, `status`, `admit_card_sts`, `applied_at`) VALUES
(14, 17, 6, 4, 25000.00, 35000.00, 'I am interested in applying for the position at your company and believe my skills and dedication make me a strong candidate.\r\nI would appreciate the opportunity to contribute to your team and discuss my qualifications further.', 'pending', 0, '2026-05-13 06:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `bachelor_degrees`
--

CREATE TABLE `bachelor_degrees` (
  `id` int NOT NULL,
  `degree_name` varchar(100) NOT NULL,
  `duration_year` int NOT NULL,
  `degree_level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bachelor_degrees`
--

INSERT INTO `bachelor_degrees` (`id`, `degree_name`, `duration_year`, `degree_level`) VALUES
(2, 'BSc in Engineering', 4, 3),
(3, 'BSc in Agricultural Science', 4, 3),
(4, 'B.D.S', 4, 3),
(5, 'Bachelor in Science\r\n', 4, 3),
(6, 'Bachelor in Business Administration', 4, 3),
(7, 'Bachelor in Arts\r\n', 4, 3),
(17, 'Fazil', 4, 3),
(25, 'LLB', 4, 3),
(31, 'Alim', 2, 2),
(32, 'dakhil', 2, 1),
(33, 'SSC', 2, 1),
(34, 'HSC', 2, 2),
(35, 'Diploma in Engineering', 3, 2),
(36, 'Diploma in Pharmacy', 3, 2),
(37, 'Dakhil Vocational', 2, 1),
(38, 'SSC Vocational', 2, 1),
(39, 'O Level/Cambridge', 2, 1),
(40, 'SSC Equivalent', 2, 1),
(41, 'Business Management', 2, 2),
(42, 'Diploma in Medical Technology', 3, 2),
(43, 'Pass Course', 3, 3),
(44, 'Master of Science (MSc)', 2, 4),
(45, 'Master of Arts (MA)', 2, 4),
(46, 'Master of Business Administration (MBA)', 2, 4),
(47, 'Master of Computer Applications (MCA)', 2, 4),
(48, 'Master of Engineering (MEng)', 2, 4),
(49, 'Master of Technology (MTech)', 2, 4),
(50, 'Master of Public Administration (MPA)', 2, 4),
(51, 'Master of Social Work (MSW)', 2, 4),
(52, 'Doctor of Philosophy (PhD)', 4, 5),
(53, 'Doctor of Business Administration (DBA)', 3, 5),
(54, 'Doctor of Engineering (DEng)', 4, 5),
(55, 'Doctor of Education (EdD)', 3, 5),
(56, 'Doctor of Medicine (MD)', 4, 5),
(57, 'MBBS', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bachelor_departments`
--

CREATE TABLE `bachelor_departments` (
  `id` int NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `degree_id` int DEFAULT NULL,
  `sub_category` enum('ssc_science','hsc_science','gra_science','Msc','ssc_humanities','hsc_humanities','gra_arts','MA','ssc_business','hsc_business','gra_business','MBA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bachelor_departments`
--

INSERT INTO `bachelor_departments` (`id`, `department_name`, `degree_id`, `sub_category`) VALUES
(8, 'Urban Planning', 29, 'gra_business'),
(11, 'Finance', 10, 'gra_business'),
(12, 'Marketing', 11, 'gra_business'),
(13, 'Economics', 12, 'gra_business'),
(14, 'Sociology', 13, 'gra_science'),
(15, 'Political Science', 14, 'gra_science'),
(16, 'Psychology', 15, 'gra_science'),
(17, 'English', 16, 'gra_arts'),
(18, 'History', 17, 'gra_arts'),
(19, 'Philosophy', 18, 'gra_science'),
(20, 'Mathematics', 19, 'gra_science'),
(21, 'Physics', 20, 'gra_science'),
(22, 'Chemistry', 21, 'gra_science'),
(23, 'Biology', 22, 'gra_science'),
(24, 'Environmental Science', 23, 'gra_science'),
(25, 'Statistics', 24, 'gra_science'),
(26, 'Law', 25, 'gra_arts'),
(27, 'International Relations', 26, 'gra_arts'),
(28, 'Public Administration', 27, 'gra_arts'),
(29, 'Pharmacy', 30, 'gra_science'),
(30, 'Nursing', 30, 'gra_science'),
(31, 'Data Science', 5, 'gra_science'),
(32, 'Artificial Intelligence', 5, 'gra_science'),
(33, 'Cyber Security', 5, 'gra_science'),
(34, 'Web Development', 5, 'gra_science'),
(35, 'Mobile App Development', 6, 'gra_science'),
(36, 'Cloud Computing', 7, 'gra_science'),
(39, 'Aerospace Engineering', 1, 'gra_science'),
(42, 'Human Resource', 8, 'gra_science'),
(43, 'Supply Chain Management', 8, 'gra_science'),
(44, 'Banking', 10, 'gra_science'),
(45, 'Insurance', 10, 'gra_science'),
(46, 'Development Studies', 12, 'gra_science'),
(47, 'Anthropology', 13, 'gra_science'),
(48, 'Media and Communication', 16, 'gra_science'),
(49, 'Film Studies', 16, 'MA'),
(50, 'Geography', 23, 'MA'),
(52, 'Science', 33, 'ssc_science'),
(53, 'Business studies', 33, 'ssc_business'),
(54, 'Humanities', 33, 'ssc_humanities'),
(55, 'Science', 34, 'hsc_science'),
(56, 'Business studies', 34, 'hsc_business'),
(57, 'Humanities', 34, 'hsc_humanities'),
(58, 'Electrical Telecomunation Engineering', 2, 'gra_science'),
(59, 'Civil Engineering', 2, 'gra_science'),
(60, 'Mechanical Engineering', 2, 'gra_science'),
(61, 'Electrical and Electronic Engineering (EEE)', 2, 'gra_science'),
(62, 'Computer Science and Engineering (CSE)', 2, 'gra_science'),
(63, 'Chemical Engineering', 2, 'gra_science'),
(64, 'Industrial and Production Engineering (IPE)', 2, 'gra_science'),
(65, 'Textile Engineering', 2, 'gra_science'),
(66, 'Architecture Engineering', 2, 'gra_science'),
(67, 'Biomedical Engineering', 2, 'gra_science'),
(68, 'Environmental Engineering', 2, 'gra_science'),
(69, 'Aeronautical Engineering', 2, 'gra_science'),
(70, 'Aerospace Engineering', 2, 'gra_science'),
(71, 'Automobile Engineering', 2, 'gra_science'),
(72, 'Naval Architecture and Marine Engineering', 2, 'gra_science'),
(73, 'Petroleum Engineering', 2, 'gra_science'),
(74, 'Mining Engineering', 2, 'gra_science'),
(75, 'Nuclear Engineering', 2, 'gra_science'),
(76, 'Materials and Metallurgical Engineering', 2, 'gra_science'),
(77, 'Mechatronics Engineering', 2, 'gra_science'),
(78, 'Robotics Engineering', 2, 'gra_science'),
(79, 'Software Engineering', 2, 'gra_science'),
(80, 'Information and Communication Engineering (ICE)', 2, 'gra_science'),
(81, 'Telecommunication Engineering', 2, 'gra_science'),
(82, 'Electronics Engineering', 2, 'gra_science'),
(83, 'Power Engineering', 2, 'gra_science'),
(84, 'Energy Engineering', 2, 'gra_science'),
(85, 'Water Resources Engineering', 2, 'gra_science'),
(86, 'Agricultural Engineering', 2, 'gra_science'),
(87, 'Food Engineering', 2, 'gra_science'),
(88, 'Ceramic Engineering', 2, 'gra_science'),
(89, 'Leather Engineering', 2, 'gra_science'),
(90, 'Glass Engineering', 2, 'gra_science'),
(91, 'Construction Engineering', 2, 'gra_science'),
(92, 'Structural Engineering', 2, 'gra_science'),
(93, 'Transportation Engineering', 2, 'gra_science'),
(94, 'Geotechnical Engineering', 2, 'gra_science'),
(95, 'Surveying Engineering', 2, 'gra_science'),
(96, 'Marine Engineering', 2, 'gra_science'),
(97, 'Ocean Engineering', 2, 'gra_science'),
(98, 'Instrumentation Engineering', 2, 'gra_science'),
(99, 'Control Engineering', 2, 'gra_science'),
(100, 'Systems Engineering', 2, 'gra_science'),
(101, 'Manufacturing Engineering', 2, 'gra_science'),
(102, 'Production Engineering', 2, 'gra_science'),
(103, 'Engineering Physics', 2, 'gra_science'),
(104, 'Engineering Mathematics', 2, 'gra_science'),
(105, 'Computer Engineering', 2, 'gra_science'),
(106, 'Network Engineering', 2, 'gra_science'),
(107, 'Cyber Security Engineering', 2, 'gra_science'),
(108, 'Artificial Intelligence Engineering', 2, 'gra_science'),
(109, 'Data Engineering', 2, 'gra_science'),
(110, 'Renewable Energy Engineering', 2, 'gra_science'),
(111, 'Smart Grid Engineering', 2, 'gra_science'),
(112, 'Biochemical Engineering', 2, 'gra_science'),
(113, 'Genetic Engineering and Biotechnology', 2, 'gra_science'),
(114, 'Agriculture', 3, 'gra_science'),
(115, 'Agricultural Science', 3, 'gra_science'),
(116, 'Agronomy', 3, 'gra_science'),
(117, 'Horticulture', 3, 'gra_science'),
(118, 'Crop Science', 3, 'gra_science'),
(119, 'Plant Breeding', 3, 'gra_science'),
(120, 'Plant Pathology', 3, 'gra_science'),
(121, 'Soil Science', 3, 'gra_science'),
(122, 'Agricultural Chemistry', 3, 'gra_science'),
(123, 'Agricultural Physics', 3, 'gra_science'),
(124, 'Agricultural Botany', 3, 'gra_science'),
(125, 'Agricultural Biotechnology', 3, 'gra_science'),
(126, 'Agricultural Genetics', 3, 'gra_science'),
(127, 'Seed Science and Technology', 3, 'gra_science'),
(128, 'Crop Botany', 3, 'gra_science'),
(129, 'Crop Protection', 3, 'gra_science'),
(130, 'Weed Science', 3, 'gra_science'),
(131, 'Entomology', 3, 'gra_science'),
(132, 'Agricultural Entomology', 3, 'gra_science'),
(133, 'Agricultural Extension', 3, 'gra_science'),
(134, 'Agricultural Economics', 3, 'gra_science'),
(135, 'Agribusiness Management', 3, 'gra_science'),
(136, 'Agricultural Marketing', 3, 'gra_science'),
(137, 'Agricultural Finance', 3, 'gra_science'),
(138, 'Agricultural Statistics', 3, 'gra_science'),
(139, 'Agricultural Informatics', 3, 'gra_science'),
(140, 'Agricultural Systems Management', 3, 'gra_science'),
(141, 'Farm Management', 3, 'gra_science'),
(142, 'Farm Power and Machinery', 3, 'gra_science'),
(143, 'Agricultural Engineering', 3, 'gra_science'),
(144, 'Irrigation and Water Management', 3, 'gra_science'),
(145, 'Water Resources Management', 3, 'gra_science'),
(146, 'Land and Water Management', 3, 'gra_science'),
(147, 'Forestry', 3, 'gra_science'),
(148, 'Social Forestry', 3, 'gra_science'),
(149, 'Agroforestry', 3, 'gra_science'),
(150, 'Forest Management', 3, 'gra_science'),
(151, 'Forest Engineering', 3, 'gra_science'),
(152, 'Environmental Science', 3, 'gra_science'),
(153, 'Environmental Management', 3, 'gra_science'),
(154, 'Climate Change and Agriculture', 3, 'gra_science'),
(155, 'Sustainable Agriculture', 3, 'gra_science'),
(156, 'Organic Agriculture', 3, 'gra_science'),
(157, 'Precision Agriculture', 3, 'gra_science'),
(158, 'Protected Agriculture', 3, 'gra_science'),
(159, 'Food Science', 3, 'gra_science'),
(160, 'Food Technology', 3, 'gra_science'),
(161, 'Food Engineering', 3, 'gra_science'),
(162, 'Postharvest Technology', 3, 'gra_science'),
(163, 'Food Safety and Quality Management', 3, 'gra_science'),
(164, 'Nutrition and Food Science', 3, 'gra_science'),
(165, 'Dairy Science', 3, 'gra_science'),
(166, 'Poultry Science', 3, 'gra_science'),
(167, 'Animal Science', 3, 'gra_science'),
(168, 'Animal Husbandry', 3, 'gra_science'),
(169, 'Livestock Science', 3, 'gra_science'),
(170, 'Veterinary Science', 3, 'gra_science'),
(171, 'Veterinary Medicine', 3, 'gra_science'),
(172, 'Animal Breeding and Genetics', 3, 'gra_science'),
(173, 'Animal Nutrition', 3, 'gra_science'),
(174, 'Aquaculture', 3, 'gra_science'),
(175, 'Fisheries', 3, 'gra_science'),
(176, 'Fisheries Biology', 3, 'gra_science'),
(177, 'Fish Genetics and Biotechnology', 3, 'gra_science'),
(178, 'Fish Nutrition', 3, 'gra_science'),
(179, 'Fish Health Management', 3, 'gra_science'),
(180, 'Marine Fisheries', 3, 'gra_science'),
(181, 'Coastal Aquaculture', 3, 'gra_science'),
(182, 'Agricultural Biotechnology', 3, 'gra_science'),
(183, 'Biotechnology and Genetic Engineering', 3, 'gra_science'),
(184, 'Plant Biotechnology', 3, 'gra_science'),
(185, 'Microbiology', 3, 'gra_science'),
(186, 'Agricultural Microbiology', 3, 'gra_science'),
(187, 'Agricultural Ecology', 3, 'gra_science'),
(188, 'Rural Development', 3, 'gra_science'),
(189, 'Rural Sociology', 3, 'gra_science'),
(190, 'Rural Economics', 3, 'gra_science'),
(191, 'Agroecology', 3, 'gra_science'),
(192, 'Natural Resource Management', 3, 'gra_science'),
(193, 'Bioresource Management', 3, 'gra_science'),
(194, 'Agricultural Education', 3, 'gra_science'),
(195, 'Tropical Agriculture', 3, 'gra_science'),
(196, 'Plantation Management', 3, 'gra_science'),
(197, 'Tea Science', 3, 'gra_science'),
(198, 'Sericulture', 3, 'gra_science'),
(199, 'Apiculture', 3, 'gra_science'),
(200, 'Floriculture', 3, 'gra_science'),
(201, 'Pomology', 3, 'gra_science'),
(202, 'Olericulture', 3, 'gra_science'),
(203, 'Landscape Agriculture', 3, 'gra_science'),
(204, 'Agricultural Resource Economics', 3, 'gra_science'),
(205, 'Agricultural Meteorology', 3, 'gra_science'),
(206, 'Agricultural Geology', 3, 'gra_science'),
(207, 'Agricultural Hydrology', 3, 'gra_science'),
(208, 'Agricultural Waste Management', 3, 'gra_science'),
(209, 'Agricultural Technology', 3, 'gra_science'),
(210, 'Smart Agriculture', 3, 'gra_science'),
(211, 'Digital Agriculture', 3, 'gra_science'),
(212, 'Business Administration', 6, 'gra_business'),
(213, 'Accounting', 6, 'gra_business'),
(214, 'Finance', 6, 'gra_business'),
(215, 'Marketing', 6, 'gra_business'),
(216, 'Management', 6, 'gra_business'),
(217, 'Human Resource Management', 6, 'gra_business'),
(218, 'International Business', 6, 'gra_business'),
(219, 'Banking', 6, 'gra_business'),
(220, 'Insurance and Risk Management', 6, 'gra_business'),
(221, 'Management Information Systems (MIS)', 6, 'gra_business'),
(222, 'Operations Management', 6, 'gra_business'),
(223, 'Supply Chain Management', 6, 'gra_business'),
(224, 'Logistics and Transportation Management', 6, 'gra_business'),
(225, 'Entrepreneurship', 6, 'gra_business'),
(226, 'Business Economics', 6, 'gra_business'),
(227, 'Business Studies', 6, 'gra_business'),
(228, 'Strategic Management', 6, 'gra_business'),
(229, 'Project Management', 6, 'gra_business'),
(230, 'Retail Management', 6, 'gra_business'),
(231, 'Hospitality Management', 6, 'gra_business'),
(232, 'Tourism Management', 6, 'gra_business'),
(233, 'E-Commerce', 6, 'gra_business'),
(234, 'Digital Marketing', 6, 'gra_business'),
(235, 'Corporate Management', 6, 'gra_business'),
(236, 'Investment Management', 6, 'gra_business'),
(237, 'Financial Management', 6, 'gra_business'),
(238, 'Taxation', 6, 'gra_business'),
(239, 'Cost and Management Accounting', 6, 'gra_business'),
(240, 'Auditing', 6, 'gra_business'),
(241, 'Treasury Management', 6, 'gra_business'),
(242, 'Business Analytics', 6, 'gra_business'),
(243, 'Data Analytics for Business', 6, 'gra_business'),
(244, 'Business Intelligence', 6, 'gra_business'),
(245, 'Consumer Behavior', 6, 'gra_business'),
(246, 'Advertising and Promotion Management', 6, 'gra_business'),
(247, 'Sales Management', 6, 'gra_business'),
(248, 'Brand Management', 6, 'gra_business'),
(249, 'Public Relations', 6, 'gra_business'),
(250, 'Organizational Behavior', 6, 'gra_business'),
(251, 'Leadership and Governance', 6, 'gra_business'),
(252, 'Industrial Relations', 6, 'gra_business'),
(253, 'Compensation and Benefits Management', 6, 'gra_business'),
(254, 'Training and Development', 6, 'gra_business'),
(255, 'Procurement Management', 6, 'gra_business'),
(256, 'Quality Management', 6, 'gra_business'),
(257, 'Business Communication', 6, 'gra_business'),
(258, 'Corporate Finance', 6, 'gra_business'),
(259, 'Financial Engineering', 6, 'gra_business'),
(260, 'Islamic Banking and Finance', 6, 'gra_business'),
(261, 'Microfinance', 6, 'gra_business'),
(262, 'Real Estate Management', 6, 'gra_business'),
(263, 'Agribusiness Management', 6, 'gra_business'),
(264, 'Fashion Merchandising and Management', 6, 'gra_business'),
(265, 'Event Management', 6, 'gra_business'),
(266, 'Sports Management', 6, 'gra_business'),
(267, 'Health Care Management', 6, 'gra_business'),
(268, 'Nonprofit Management', 6, 'gra_business'),
(269, 'Corporate Governance', 6, 'gra_business'),
(270, 'Business Law', 6, 'gra_business'),
(271, 'Economic Policy and Planning', 6, 'gra_business'),
(272, 'International Trade', 6, 'gra_business'),
(273, 'Import and Export Management', 6, 'gra_business'),
(274, 'Commercial Banking', 6, 'gra_business'),
(275, 'Investment Banking', 6, 'gra_business'),
(276, 'Wealth Management', 6, 'gra_business'),
(277, 'Financial Technology (FinTech)', 6, 'gra_business'),
(278, 'Customer Relationship Management', 6, 'gra_business'),
(279, 'Service Management', 6, 'gra_business'),
(280, 'Innovation Management', 6, 'gra_business'),
(281, 'Knowledge Management', 6, 'gra_business'),
(282, 'Business Research', 6, 'gra_business'),
(283, 'Decision Sciences', 6, 'gra_business'),
(284, 'Actuarial Science', 6, 'gra_business'),
(285, 'Accounting Information Systems', 6, 'gra_business'),
(286, 'Global Business Management', 6, 'gra_business'),
(287, 'Retail and Distribution Management', 6, 'gra_business'),
(288, 'Luxury Brand Management', 6, 'gra_business'),
(289, 'Procurement and Supply Management', 6, 'gra_business'),
(290, 'Business Development', 6, 'gra_business'),
(291, 'Corporate Strategy', 6, 'gra_business'),
(292, 'Bangla', 7, 'gra_arts'),
(293, 'English', 7, 'gra_arts'),
(294, 'Arabic', 7, 'gra_arts'),
(295, 'Persian', 7, 'gra_arts'),
(296, 'Urdu', 7, 'gra_arts'),
(297, 'Sanskrit', 7, 'gra_arts'),
(298, 'Philosophy', 7, 'gra_arts'),
(299, 'History', 7, 'gra_arts'),
(300, 'Islamic History and Culture', 7, 'gra_arts'),
(301, 'World Religions and Culture', 7, 'gra_arts'),
(302, 'Islamic Studies', 7, 'gra_arts'),
(303, 'Comparative Religion', 7, 'gra_arts'),
(304, 'Political Science', 7, 'gra_arts'),
(305, 'Public Administration', 7, 'gra_arts'),
(306, 'International Relations', 7, 'gra_arts'),
(307, 'Economics', 7, 'gra_arts'),
(308, 'Sociology', 7, 'gra_arts'),
(309, 'Social Work', 7, 'gra_arts'),
(310, 'Anthropology', 7, 'gra_arts'),
(311, 'Population Science', 7, 'gra_arts'),
(312, 'Mass Communication and Journalism', 7, 'gra_arts'),
(313, 'Journalism and Media Studies', 7, 'gra_arts'),
(314, 'Communication Studies', 7, 'gra_arts'),
(315, 'Library and Information Science', 7, 'gra_arts'),
(316, 'Information Science and Library Management', 7, 'gra_arts'),
(317, 'Linguistics', 7, 'gra_arts'),
(318, 'Applied Linguistics', 7, 'gra_arts'),
(319, 'Folklore', 7, 'gra_arts'),
(320, 'Folklore and Cultural Studies', 7, 'gra_arts'),
(321, 'Theatre and Performance Studies', 7, 'gra_arts'),
(322, 'Drama and Dramatics', 7, 'gra_arts'),
(323, 'Fine Arts', 7, 'gra_arts'),
(324, 'Drawing and Painting', 7, 'gra_arts'),
(325, 'Graphic Design', 7, 'gra_arts'),
(326, 'Printmaking', 7, 'gra_arts'),
(327, 'Sculpture', 7, 'gra_arts'),
(328, 'Oriental Art', 7, 'gra_arts'),
(329, 'Music', 7, 'gra_arts'),
(330, 'Dance', 7, 'gra_arts'),
(331, 'Film and Television', 7, 'gra_arts'),
(332, 'Film Studies', 7, 'gra_arts'),
(333, 'Women and Gender Studies', 7, 'gra_arts'),
(334, 'Gender Studies', 7, 'gra_arts'),
(335, 'Development Studies', 7, 'gra_arts'),
(336, 'Peace and Conflict Studies', 7, 'gra_arts'),
(337, 'Human Rights', 7, 'gra_arts'),
(338, 'Archaeology', 7, 'gra_arts'),
(339, 'Heritage Studies', 7, 'gra_arts'),
(340, 'Museology', 7, 'gra_arts'),
(341, 'Geography and Environment', 7, 'gra_arts'),
(342, 'Regional Studies', 7, 'gra_arts'),
(343, 'Urban and Regional Studies', 7, 'gra_arts'),
(344, 'Cultural Studies', 7, 'gra_arts'),
(345, 'Language and Literature', 7, 'gra_arts'),
(346, 'Creative Writing', 7, 'gra_arts'),
(347, 'English Literature', 7, 'gra_arts'),
(348, 'Bangla Literature', 7, 'gra_arts'),
(349, 'Modern Languages', 7, 'gra_arts'),
(350, 'Chinese Language and Culture', 7, 'gra_arts'),
(351, 'Japanese Studies', 7, 'gra_arts'),
(352, 'Korean Studies', 7, 'gra_arts'),
(353, 'French Language and Culture', 7, 'gra_arts'),
(354, 'German Language and Literature', 7, 'gra_arts'),
(355, 'Spanish Language and Culture', 7, 'gra_arts'),
(356, 'Russian Language and Literature', 7, 'gra_arts'),
(357, 'Middle Eastern Studies', 7, 'gra_arts'),
(358, 'South Asian Studies', 7, 'gra_arts'),
(359, 'Islamic Culture and Civilization', 7, 'gra_arts'),
(360, 'Ethics and Governance', 7, 'gra_arts'),
(361, 'Rural Development', 7, 'gra_arts'),
(362, 'Community Development', 7, 'gra_arts');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`) VALUES
(1, 'IT & Software', '2026-04-27 15:34:37'),
(2, 'Accounting & Finance', '2026-04-27 15:34:37'),
(3, 'Marketing & Sales', '2026-04-27 15:34:37'),
(4, 'Human Resources', '2026-04-27 15:34:37'),
(5, 'Customer Support', '2026-04-27 15:34:37'),
(6, 'Engineering', '2026-04-27 15:34:37'),
(7, 'Healthcare', '2026-04-27 15:34:37'),
(8, 'Education & Training', '2026-04-27 15:34:37'),
(9, 'Banking & Insurance', '2026-04-27 15:34:37'),
(10, 'Construction', '2026-04-27 15:34:37'),
(11, 'Garments & Textile', '2026-04-27 15:34:37'),
(12, 'Telecommunication', '2026-04-27 15:34:37'),
(13, 'Design & Creative', '2026-04-27 15:34:37'),
(14, 'Media & Journalism', '2026-04-27 15:34:37'),
(15, 'Law & Legal', '2026-04-27 15:34:37'),
(16, 'Administration', '2026-04-27 15:34:37'),
(17, 'Supply Chain & Logistics', '2026-04-27 15:34:37'),
(18, 'Hospitality & Tourism', '2026-04-27 15:34:37'),
(19, 'Security Services', '2026-04-27 15:34:37'),
(20, 'Real Estate', '2026-04-27 15:34:37'),
(21, 'Research & Development', '2026-04-27 15:34:37'),
(22, 'Agriculture', '2026-04-27 15:34:37'),
(23, 'Government Jobs', '2026-04-27 15:34:37'),
(24, 'NGO & Development', '2026-04-27 15:34:37'),
(25, 'Pharmaceutical', '2026-04-27 15:34:37'),
(26, 'E-commerce', '2026-04-27 15:34:37'),
(27, 'Retail & Wholesale', '2026-04-27 15:34:37'),
(28, 'Automobile', '2026-04-27 15:34:37'),
(29, 'Data Entry & Operator', '2026-04-27 15:34:37'),
(30, 'Call Center', '2026-04-27 15:34:37'),
(31, 'Electrical & Electronics', '2026-04-27 15:34:37'),
(32, 'Mechanical Jobs', '2026-04-27 15:34:37'),
(33, 'Civil Engineering', '2026-04-27 15:34:37'),
(34, 'Architecture', '2026-04-27 15:34:37'),
(35, 'Event Management', '2026-04-27 15:34:37'),
(36, 'Freelancing', '2026-04-27 15:34:37'),
(37, 'Content Writing', '2026-04-27 15:34:37'),
(38, 'Digital Marketing', '2026-04-27 15:34:37'),
(39, 'SEO & SEM', '2026-04-27 15:34:37'),
(40, 'Software Development', '2026-04-27 15:34:37'),
(41, 'Web Design', '2026-04-27 15:34:37'),
(42, 'Mobile App Development', '2026-04-27 15:34:37'),
(43, 'AI & Machine Learning', '2026-04-27 15:34:37'),
(44, 'Cyber Security', '2026-04-27 15:34:37'),
(45, 'Networking', '2026-04-27 15:34:37'),
(46, 'Technical Support', '2026-04-27 15:34:37'),
(47, 'QA & Testing', '2026-04-27 15:34:37'),
(48, 'UI/UX Design', '2026-04-27 15:34:37'),
(49, 'Business Development', '2026-04-27 15:34:37'),
(50, 'Project Management', '2026-04-27 15:34:37'),
(51, 'Android Development', '2026-05-21 14:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `company_name` varchar(150) NOT NULL,
  `description` text,
  `website` varchar(150) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `company_type` enum('gov','non_gov') NOT NULL DEFAULT 'non_gov'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `company_name`, `description`, `website`, `logo`, `location`, `company_type`) VALUES
(1, NULL, 'Bangladesh Teletalk ltd ', 'টেলিটক বাংলাদেশ লিমিটেড বাংলাদেশের একমাত্র রাষ্ট্রীয় মালিকানাধীন মোবাইল নেটওয়ার্ক অপারেটর। টেলিটক বাংলাদেশ লিমিটেড “রেজিস্টারার অফ জয়েন্ট স্টক কোম্পানি”-এর অধীনে নিবন্ধিত একটি পাবলিক কোম্পানি। ডাক, টেলিযোগাযোগ ও তথ্যপ্রযুক্তি মন্ত্রণালয়ের শতভাগ মালিকানায় এবং উক্ত মন্ত্রণালয়ের ডাক ও টেলিযোগাযোগ বিভাগের নিয়ন্ত্রণে থাকা টেলিটক-এর প্রকৃত মালিক এই দেশের জনগণ। টেলিটক বাংলাদেশের সাধারণ মানুষের ফোন, টেলিটক আমাদের ফোন।', 'www.teletalk.com', 'monir1@gmail.com-file_6a029fb8f2f608.41559297.png', 'Chattogram', 'gov'),
(2, NULL, 'Qbittech ', 'Welcome to QBit Tech, one of the fastest-growing IT firms in Bangladesh, known for our expertise in software development, web solutions, and digital transformation. Since our inception, we have been committed to delivering high-quality, customized solutions that drive business success. With a team of over 40 skilled developers and 10+ dedicated support staff, we have successfully served 150+ clients across various industries. What sets us apart is our passion for innovation and continuous learning', 'www.qubit-tech.com', 'monir1@gmail.com-file_6a02a1394f9c02.13939967.png', 'Shahajanpur,Dhaka, Bangladesh', 'non_gov'),
(3, NULL, 'TechSoft Ltd.', 'Software development company', 'https://techsoft.com', 'monir1@gmail.com-file_6a02a47e425482.82448868.png', 'Dhaka', 'non_gov'),
(4, NULL, 'NextGen IT', 'IT solutions and services', 'https://nextgenit.com', 'nextgen.png', 'Chittagong', 'non_gov'),
(5, NULL, 'DataCore', 'Data analytics and AI solutions', 'https://datacore.com', 'datacore.png', 'Dhaka', 'gov'),
(6, NULL, 'WebNest', 'Web design and development', 'https://webnest.com', 'webnest.png', 'Khulna', 'non_gov'),
(7, NULL, 'CloudNet', 'Cloud computing services', 'https://cloudnet.com', 'monir1@gmail.com-file_6a0e7e1b3a0cb5.83369140.jpeg', 'Sylhet', 'non_gov'),
(8, NULL, 'CyberTech', 'Cybersecurity services', 'https://cybertech.com', 'cybertech.png', 'Rajshahi', 'non_gov'),
(9, NULL, 'AppStudio', 'Mobile app development company', 'https://appstudio.com', 'appstudio.png', 'Dhaka', 'gov'),
(10, NULL, 'InnovateX', 'Startup innovation hub', 'https://innovatex.com', 'innovatex.png', 'Barisal', 'non_gov'),
(11, NULL, 'SoftSolutions', 'Enterprise software solutions', 'https://softsolutions.com', 'softsolutions.png', 'Dhaka', 'non_gov'),
(12, NULL, 'NetSystems', 'Networking and infrastructure services', 'https://netsystems.com', 'netsystems.png', 'Mymensingh', 'non_gov'),
(13, NULL, 'Chittagong Online Limited', 'Chittagong Online Limited (COL) - a registered trade name - is a Licensed ISP & IPTSP by Bangladesh Telecommunication Regulatory Commission providing Internet, Internet Telephony and many other IT related services and solutions.', 'https://colbd.com/', 'monir1@gmail.com-file_6a0191c2bb40e1.21933651.png', 'Chattogram', 'non_gov');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int NOT NULL,
  `circular_id` int NOT NULL,
  `exam_posts_title` varchar(200) DEFAULT NULL,
  `exam_type` enum('Written','MCQ','Practical','Viva') DEFAULT 'Written',
  `exam_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `instructions` text,
  `status` enum('Draft','Published','Completed','Cancelled') DEFAULT 'Draft',
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `circular_id`, `exam_posts_title`, `exam_type`, `exam_date`, `start_time`, `end_time`, `duration`, `instructions`, `status`, `created_by`, `created_at`) VALUES
(1, 15, 'UI/UX Designer', 'MCQ', '2026-07-20', '10:00:00', '12:00:00', '2 houres 0 minute', 'Candidates must arrive at the examination venue at least 30 minutes before the scheduled start time.\r\nBring your admit card and a valid photo ID for verification.\r\nMobile phones, smartwatches, calculators (unless permitted), headphones, and other electronic devices are strictly prohibited inside the examination hall.\r\nCandidates must occupy only their assigned seats.\r\nRead all instructions carefully before starting the examination.\r\nDo not communicate with other candidates or engage in any unfair practices during the examination.\r\nUse only the permitted stationery. Sharing materials with other candidates is not allowed.\r\nMaintain silence and follow all instructions given by the invigilators.\r\nCandidates arriving after the examination has started may not be allowed to enter, subject to the examination authoritys policy.\r\nNo candidate is permitted to leave the examination hall before the minimum required time has elapsed.\r\nEnsure that your answer script contains all required information before submitting it.\r\nAny form of cheating, impersonation, or misconduct will result in immediate disqualification and may lead to further disciplinary action.\r\nSubmit all examination materials to the invigilator before leaving the examination hall.\r\nThe decision of the examination authority shall be final and binding in all matters related to the examination.', 'Draft', 12, '2026-07-01 09:06:49'),
(2, 15, 'web developer', 'Written', '2026-07-22', '10:30:00', '00:30:00', '10 houres 0 minute', 'Candidates must arrive at the examination venue at least 30 minutes before the scheduled start time.\r\nBring your admit card and a valid photo ID for verification.\r\nMobile phones, smartwatches, calculators (unless permitted), headphones, and other electronic devices are strictly prohibited inside the examination hall.\r\nCandidates must occupy only their assigned seats.\r\nRead all instructions carefully before starting the examination.\r\nDo not communicate with other candidates or engage in any unfair practices during the examination.\r\nUse only the permitted stationery. Sharing materials with other candidates is not allowed.\r\nMaintain silence and follow all instructions given by the invigilators.\r\nCandidates arriving after the examination has started may not be allowed to enter, subject to the examination authority policy.\r\nNo candidate is permitted to leave the examination hall before the minimum required time has elapsed.\r\nEnsure that your answer script contains all required information before submitting it.\r\nAny form of cheating, impersonation, or misconduct will result in immediate disqualification and may lead to further disciplinary action.\r\nSubmit all examination materials to the invigilator before leaving the examination hall.\r\nThe decision of the examination authority shall be final and binding in all matters related to the examination.', 'Draft', 12, '2026-07-01 09:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `exam_centers`
--

CREATE TABLE `exam_centers` (
  `id` int NOT NULL,
  `center_name` varchar(200) DEFAULT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(30) DEFAULT NULL,
  `total_rooms` int DEFAULT NULL,
  `status` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_rooms`
--

CREATE TABLE `exam_rooms` (
  `id` int NOT NULL,
  `center_id` int DEFAULT NULL,
  `room_name` varchar(100) DEFAULT NULL,
  `capacity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_seats`
--

CREATE TABLE `exam_seats` (
  `id` int NOT NULL,
  `exam_id` int DEFAULT NULL,
  `application_id` int DEFAULT NULL,
  `room_id` int DEFAULT NULL,
  `seat_no` varchar(20) DEFAULT NULL,
  `roll_no` varchar(30) DEFAULT NULL,
  `attendance` enum('Pending','Present','Absent') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int NOT NULL,
  `company_id` int DEFAULT NULL,
  `circular_id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text,
  `requirements` text,
  `salary` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `job_type` enum('gov','non_gov') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'gov',
  `jsc_active` tinyint DEFAULT NULL,
  `jsc_required` tinyint DEFAULT NULL,
  `ssc_active` tinyint DEFAULT NULL,
  `ssc_required` tinyint DEFAULT NULL,
  `hsc_active` tinyint DEFAULT NULL,
  `hsc_required` tinyint DEFAULT NULL,
  `gra_active` tinyint DEFAULT NULL,
  `gra_required` tinyint DEFAULT NULL,
  `mas_active` tinyint DEFAULT NULL,
  `mas_required` tinyint DEFAULT NULL,
  `mph_active` tinyint DEFAULT NULL,
  `mph_required` tinyint DEFAULT NULL,
  `mph_running` tinyint DEFAULT NULL,
  `phd_active` tinyint DEFAULT NULL,
  `phd_required` tinyint DEFAULT NULL,
  `phd_running` tinyint DEFAULT NULL,
  `job_exp_active` tinyint DEFAULT NULL,
  `job_exp_required` tinyint DEFAULT NULL,
  `min_job_exp_year` int DEFAULT NULL,
  `app_start_time` datetime DEFAULT NULL,
  `app_end_time` datetime DEFAULT NULL,
  `vacancy` int DEFAULT NULL,
  `min_age` int DEFAULT NULL,
  `max_age` int DEFAULT NULL,
  `comp_benifits` text,
  `emp_status` enum('Full time','Contractual') DEFAULT 'Full time',
  `emp_work_place` enum('Work on office','Remote') DEFAULT 'Work on office',
  `category_id` int DEFAULT NULL,
  `post_active` tinyint NOT NULL DEFAULT '1' COMMENT '1 is active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `circular_id`, `title`, `description`, `requirements`, `salary`, `location`, `deadline`, `job_type`, `jsc_active`, `jsc_required`, `ssc_active`, `ssc_required`, `hsc_active`, `hsc_required`, `gra_active`, `gra_required`, `mas_active`, `mas_required`, `mph_active`, `mph_required`, `mph_running`, `phd_active`, `phd_required`, `phd_running`, `job_exp_active`, `job_exp_required`, `min_job_exp_year`, `app_start_time`, `app_end_time`, `vacancy`, `min_age`, `max_age`, `comp_benifits`, `emp_status`, `emp_work_place`, `category_id`, `post_active`, `created_at`) VALUES
(11, 8, 0, 'Mobile App Developer', 'Android apps', 'Java/Kotlin', '45000', 'Rajshahi', '2026-11-10', 'non_gov', 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 2, '2026-03-10 00:00:00', '2026-09-01 00:00:00', NULL, NULL, NULL, NULL, 'Full time', 'Work on office', NULL, 1, '2026-04-22 23:19:37'),
(12, 9, 0, 'UI/UX Designer', 'Design interfaces', 'Figma, Adobe XD', '28000', 'Dhaka', '2026-10-05', 'non_gov', 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2026-01-20 00:00:00', '2026-05-15 00:00:00', NULL, NULL, NULL, NULL, 'Full time', 'Work on office', NULL, 1, '2026-04-22 23:19:37'),
(13, 10, 0, 'System Administrator', 'Maintain servers', 'Linux, Networking', '42000', 'Barisal', '2026-09-01', 'non_gov', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 3, '2026-02-15 00:00:00', '2026-07-10 00:00:00', NULL, NULL, NULL, NULL, 'Full time', 'Work on office', NULL, 1, '2026-04-22 23:19:37'),
(17, 2, 0, 'Data Entry Operator', 'The ideal candidate will play an important role in maintaining accurate digital records and supporting daily administrative activities. This position requires a person who is organized, focused, and comfortable working with computer-based data management systems.The Data Entry Operator will work in a professional environment where accuracy, efficiency, and consistency are highly valued.', 'Candidates must possess a Bachelor’s degree from a recognized university. Applicants should have a minimum typing speed of 25 words per minute in Bangla and 35 words per minute in English. Candidates must also have practical knowledge of Microsoft Office applications.', '15000', 'Chattogram', '2026-05-31', 'non_gov', 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 32, 'Selected candidates will be provided with house rent facilities. Free lunch will be available at the office. And a mobile bill allowance will also be provided.', 'Full time', 'Work on office', 2, 1, '2026-05-10 13:00:38'),
(18, 2, 2, 'web Developer', 'A Web Developer is responsible for designing, developing, and maintaining websites and web applications. They work with front-end and back-end technologies to create responsive, user-friendly, and high-performing digital solutions. The role involves coding, troubleshooting, optimizing website functionality, and ensuring a seamless user experience across different devices and browsers.', 'Bachelors degree in Computer Science, Software Engineering, or a related field (preferred).\r\nProficiency in HTML, CSS, JavaScript, and modern web development frameworks.\r\nExperience with back-end technologies such as PHP, Node.js, Python, or similar.\r\nKnowledge of database management systems such as MySQL, PostgreSQL, or MongoDB.\r\nUnderstanding of responsive design principles and cross-browser compatibility.\r\nFamiliarity with version control systems such as Git.\r\nStrong problem-solving and debugging skills.\r\nAbility to work independently and collaboratively in a team environment.\r\nGood communication and time-management skills.\r\nExperience with web security best practices is an advantage.', '80000', 'Shahajanpur,Dhaka, Bangladesh', '2026-07-17', 'non_gov', 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 4, '2026-06-30 00:00:00', '2026-07-31 23:59:00', 2, 18, 40, 'Competitive salary and performance-based bonuses.\r\nHealth and medical insurance coverage.\r\nPaid annual leave, sick leave, and public holidays.\r\nFlexible working hours and remote work opportunities.\r\nProfessional development and training programs.\r\nCareer growth and promotion opportunities.\r\nFriendly and collaborative work environment.\r\nAccess to the latest tools and technologies.\r\nEmployee recognition and reward programs.\r\nProvident fund, gratuity, and other benefits as per company policy.', 'Full time', 'Work on office', 1, 1, '2026-06-17 11:03:25'),
(19, 1, 15, 'web developer', 'assadasdaa', 'asdasdsdss', '35000', 'Or Nizam Road, Golpahar Mor, Chittagong', '2026-08-06', 'gov', 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2026-06-30 10:00:00', '2026-08-06 17:00:00', 6, 18, 32, 'jhvhbjkbjkbknkl.hgcghcghcghcgcg.hfghhgghgvgvg', 'Full time', 'Work on office', 1, 1, '2026-06-29 11:12:17'),
(20, 1, 15, 'ui ux designer', 'asdfghjklkjhgfdsdfghjkjhgfd.wertygfdsassdfghjhgfdsasdfgh.rghfhfddscdvfbgfvdcsvb.', 'sadfgbnhmjkdesfghj.efdrgthyjuio.egrhtyjukil.fsdgfhgyjkuli.', '25000', 'Or Nizam Road, Golpahar Mor, Chittagong', '2026-08-06', 'gov', 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2026-06-30 10:00:00', '2026-08-06 17:00:00', 4, 18, 32, 'sdfgtyhuijokghjbmkl;ml,lukjgb.yhtdhtdytjfmyfkfkuygvl.cghtfkvhvjhbhjblujbhjbhjb.yyvhvkhbhjbkjuhjjk', 'Full time', 'Work on office', 1, 1, '2026-06-29 11:32:13'),
(21, 1, 15, 'UI/UX Designer', 'asddfasfdfaa', 'asfsffasfasfasf', '35000', 'Dhaka, ', '2026-08-06', 'gov', 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2026-05-29 10:00:00', '2026-08-06 17:00:00', 7, 18, 32, 'cnjdsd;usfdfogoijgijfgiohdghfoh', 'Full time', 'Work on office', 1, 1, '2026-06-29 11:35:53'),
(22, 1, 15, 'Assistant Manager', 'assadasdaa', 'asdasdsdss', '50000', 'Or Nizam Road, Golpahar Mor, Chittagong', '2026-08-06', 'gov', 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2026-06-30 10:00:00', '2026-08-06 17:00:00', 6, 18, 32, 'jhvhbjkbjkbknkl.hgcghcghcghcgcg.hfghhgghgvgvg', 'Full time', 'Work on office', 1, 1, '2026-06-29 11:12:17'),
(23, 1, 15, 'Assistant Programmer', 'asdfghjklkjhgfdsdfghjkjhgfd.wertygfdsassdfghjhgfdsasdfgh.rghfhfddscdvfbgfvdcsvb.', 'sadfgbnhmjkdesfghj.efdrgthyjuio.egrhtyjukil.fsdgfhgyjkuli.', '25000', 'Or Nizam Road, Golpahar Mor, Chittagong', '2026-08-06', 'gov', 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2026-06-30 10:00:00', '2026-08-06 17:00:00', 4, 18, 32, 'sdfgtyhuijokghjbmkl;ml,lukjgb.yhtdhtdytjfmyfkfkuygvl.cghtfkvhvjhbhjblujbhjbhjb.yyvhvkhbhjbkjuhjjk', 'Full time', 'Work on office', 1, 1, '2026-06-29 11:32:13'),
(24, 1, 15, 'Android Developer\r\n', 'asddfasfdfaa', 'asfsffasfasfasf', '35000', 'Dhaka, ', '2026-08-06', 'gov', 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2026-05-29 10:00:00', '2026-08-06 17:00:00', 7, 18, 32, 'cnjdsd;usfdfogoijgijfgiohdghfoh', 'Full time', 'Work on office', 1, 1, '2026-06-29 11:35:53'),
(25, 1, 15, 'junior web developer', 'assadasdaa', 'asdasdsdss', '35000', 'Or Nizam Road, Golpahar Mor, Chittagong', '2026-08-06', 'gov', 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2026-06-30 10:00:00', '2026-08-06 17:00:00', 6, 18, 32, 'jhvhbjkbjkbknkl.hgcghcghcghcgcg.hfghhgghgvgvg', 'Full time', 'Work on office', 1, 1, '2026-06-29 11:12:17'),
(26, 1, 15, 'front end developer', 'asdfghjklkjhgfdsdfghjkjhgfd.wertygfdsassdfghjhgfdsasdfgh.rghfhfddscdvfbgfvdcsvb.', 'sadfgbnhmjkdesfghj.efdrgthyjuio.egrhtyjukil.fsdgfhgyjkuli.', '25000', 'Or Nizam Road, Golpahar Mor, Chittagong', '2026-08-06', 'gov', 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2026-06-30 10:00:00', '2026-08-06 17:00:00', 4, 18, 32, 'sdfgtyhuijokghjbmkl;ml,lukjgb.yhtdhtdytjfmyfkfkuygvl.cghtfkvhvjhbhjblujbhjbhjb.yyvhvkhbhjbkjuhjjk', 'Full time', 'Work on office', 1, 1, '2026-06-29 11:32:13'),
(27, 1, 15, 'Senior Programmer', 'asddfasfdfaa', 'asfsffasfasfasf', '35000', 'Dhaka, ', '2026-08-06', 'gov', 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2026-05-29 10:00:00', '2026-08-06 17:00:00', 7, 18, 32, 'cnjdsd;usfdfogoijgijfgiohdghfoh', 'Full time', 'Work on office', 1, 1, '2026-06-29 11:35:53'),
(28, 1, 15, 'Project Manager', 'assadasdaa', 'asdasdsdss', '50000', 'Or Nizam Road, Golpahar Mor, Chittagong', '2026-08-06', 'gov', 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2026-05-29 10:00:00', '2026-08-06 17:00:00', 7, 18, 32, 'cnjdsd;usfdfogoijgijfgiohdghfoh', 'Full time', 'Work on office', 1, 1, '2026-06-29 11:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `job_circulars`
--

CREATE TABLE `job_circulars` (
  `id` int NOT NULL,
  `company_id` int NOT NULL,
  `circular_reference` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('active','inactive','draft','expired') DEFAULT 'draft',
  `published_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `expected_activation_date` datetime DEFAULT NULL,
  `apply_last_date` datetime(6) DEFAULT NULL,
  `circular_doc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_circulars`
--

INSERT INTO `job_circulars` (`id`, `company_id`, `circular_reference`, `status`, `published_date`, `expected_activation_date`, `apply_last_date`, `circular_doc`) VALUES
(12, 1, 'tbl-23-06-2026', 'expired', '2026-06-23 09:31:00', '2026-06-23 10:00:00', '2026-06-23 11:00:00.000000', 'monir1@gmail.com-file_6a39fe14837356.33940234.pdf'),
(13, 2, 'QT-20009-QC09', 'expired', '2026-06-23 09:31:00', '2026-06-23 09:35:00', '2026-06-25 10:00:00.000000', 'monir1@gmail.com-file_6a39fe51b5c8c1.64342826.pdf'),
(15, 1, 'WBN-20062026-1', 'active', '2026-06-23 12:33:00', '2026-06-23 12:34:00', '2026-07-11 18:00:00.000000', 'monir1@gmail.com-file_6a3a28ef79d816.25741222.pdf'),
(16, 1, 'dataco-22062026-1', 'expired', '2026-06-23 12:34:00', '2026-06-23 10:00:00', '2026-06-30 22:00:00.000000', 'monir1@gmail.com-file_6a3a292a479c85.06359351.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `job_post_edu`
--

CREATE TABLE `job_post_edu` (
  `id` int NOT NULL,
  `job_code` int NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `jsc_allowed_exam` varchar(100) DEFAULT NULL,
  `ssc_allowed_exam` varchar(100) DEFAULT NULL,
  `hsc_allowed_exam` varchar(100) DEFAULT NULL,
  `gra_allowed_exam` varchar(100) DEFAULT NULL,
  `mas_allowed_exam` varchar(100) DEFAULT NULL,
  `mph_allowed_exam` varchar(100) DEFAULT NULL,
  `phd_allowed_exam` varchar(100) DEFAULT NULL,
  `ssc_allowed_sub` varchar(200) DEFAULT NULL,
  `hsc_allowed_sub` varchar(200) DEFAULT NULL,
  `gra_allowed_sub` varchar(800) DEFAULT NULL,
  `mas_allowed_sub` varchar(800) DEFAULT NULL,
  `mph_allowed_sub` varchar(800) DEFAULT NULL,
  `phd_allowed_sub` varchar(800) DEFAULT NULL,
  `ssc_min_result_eq` int DEFAULT NULL,
  `hsc_min_result_eq` int DEFAULT NULL,
  `gra_min_result_eq` int DEFAULT NULL,
  `mas_min_result_eq` int DEFAULT NULL,
  `mph_min_result_eq` int DEFAULT NULL,
  `phd_min_result_eq` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_post_edu`
--

INSERT INTO `job_post_edu` (`id`, `job_code`, `job_title`, `jsc_allowed_exam`, `ssc_allowed_exam`, `hsc_allowed_exam`, `gra_allowed_exam`, `mas_allowed_exam`, `mph_allowed_exam`, `phd_allowed_exam`, `ssc_allowed_sub`, `hsc_allowed_sub`, `gra_allowed_sub`, `mas_allowed_sub`, `mph_allowed_sub`, `phd_allowed_sub`, `ssc_min_result_eq`, `hsc_min_result_eq`, `gra_min_result_eq`, `mas_min_result_eq`, `mph_min_result_eq`, `phd_min_result_eq`) VALUES
(2, 12, 'UI/UX Designer', NULL, '32, 33, 37, 40', '31, 34, 35', '5', '44, 47, 48', NULL, NULL, 'ssc_science', 'hsc_science', 'gra_science', 'MSc', NULL, NULL, 2, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `skills` text,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `skills`, `file_path`, `uploaded_at`) VALUES
(1, 7, 'JavaScript,Bootstrap,React,Vue.js,Angular,Node.js,Express.js,MySQL,Git,REST API', 'monir@gmail.com-file_69e5df95ee7912.59402688.pdf', '2026-04-20 08:11:01'),
(2, 8, 'CSS,Bootstrap,Express.js,MySQL', 'sakibal@gmail.com-file_69e9ab046d4884.06697525.pdf', '2026-04-23 05:15:48'),
(3, 11, 'Node.js,Express.js,PHP,Laravel,MongoDB,REST API', 'imranchy@gmail.com-file_69ef3159c2b622.06434578.pdf', '2026-04-27 09:50:17'),
(4, 6, 'CSS,Bootstrap,React,PHP,Laravel,MySQL,Git', 'admin123456@gmail.com-file_6a040e3169cd01.88933819.pdf', '2026-05-13 05:37:53'),
(5, 13, 'Git,REST API', 'shanaj@gmail.com-file_6a044374f19168.58791341.pdf', '2026-05-13 09:25:09'),
(6, 20, 'JavaScript,Bootstrap,Tailwind CSS,React,Vue.js,Angular', 'sakib75@gmail.com-file_6a2685e59d5081.79476297.pdf', '2026-06-08 09:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `created_at`) VALUES
(1, 'CSS', '2026-04-20 05:27:19'),
(2, 'JavaScript', '2026-04-20 05:27:19'),
(3, 'Bootstrap', '2026-04-20 05:27:19'),
(4, 'Tailwind CSS', '2026-04-20 05:27:19'),
(5, 'React', '2026-04-20 05:27:19'),
(6, 'Vue.js', '2026-04-20 05:27:19'),
(7, 'Angular', '2026-04-20 05:27:19'),
(8, 'Node.js', '2026-04-20 05:27:19'),
(9, 'Express.js', '2026-04-20 05:27:19'),
(10, 'PHP', '2026-04-20 05:27:19'),
(11, 'Laravel', '2026-04-20 05:27:19'),
(12, 'MySQL', '2026-04-20 05:27:19'),
(13, 'MongoDB', '2026-04-20 05:27:19'),
(14, 'Git', '2026-04-20 05:27:19'),
(15, 'REST API', '2026-04-20 05:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('job_seeker','employer','admin') DEFAULT 'job_seeker',
  `profile_image` varchar(255) DEFAULT NULL,
  `signature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1=> active ,0=> not active',
  `ban_user` tinyint NOT NULL DEFAULT '0' COMMENT '0=> not baned & 1=> baned',
  `pass_reset_token` varchar(100) DEFAULT NULL,
  `pass_token_exp` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `profile_image`, `signature`, `status`, `ban_user`, `pass_reset_token`, `pass_token_exp`, `created_at`) VALUES
(3, 'Rakib Hasan ', 'rakibhasan@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', 'employer', 'rakibhasan@gmail.com-file_6a02cfdf67fa47.55271161.jpg', '', 0, 0, NULL, NULL, '2026-04-15 14:39:28'),
(4, 'Rakib Hasan ', 'rakibhasan444@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 'employer', NULL, '', 0, 0, '04d5dd4079d4e9eab133e7a47fcbde0d9bfbbcc19ad91ba446768ecbbe71b62c', '2026-06-15 05:20:07', '2026-04-15 14:43:20'),
(6, 'Md Ashraful Islam Chowdhury', 'admin123456@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01865452896', 'job_seeker', 'admin123456@gmail.com-file_6a040e060063c7.35553684.jpg', 'admin123456@gmail.com-file_6a040e0600c729.33024118.png', 0, 0, NULL, NULL, '2026-04-15 17:14:07'),
(7, 'sabbir', 'sabbir@gmail.com', '1bbd886460827015e5d605ed44252251', NULL, 'job_seeker', NULL, '', 0, 0, NULL, NULL, '2026-04-15 17:24:19'),
(8, 'sakib al hasan', 'sakibal@gmail.com', '25d55ad283aa400af464c76d713c07ad', '01834815169', 'job_seeker', 'sakibal@gmail.com-file_69edb07c81be54.98227764.jpg', 'sakibal@gmail.com-file_69edb0930a57f1.14639341.png', 1, 0, NULL, NULL, '2026-04-17 05:44:33'),
(11, 'imran chowdhury', 'imranchy@gmail.com', 'a4627483db9717bbd22cfd911b72f37d', NULL, 'job_seeker', NULL, NULL, 0, 0, NULL, NULL, '2026-04-27 09:42:46'),
(12, 'sakib al hasan', 'monir1@gmail.com', 'e1fce07029fb7231738d5b09ba00d478', '01861017724', 'admin', 'monir1@gmail.com-file_69f6d2058b5904.89040861.jpg', 'monir1@gmail.com-file_69f6d2058b8e96.08327210.png', 1, 0, NULL, NULL, '2026-04-28 08:20:35'),
(13, 'Shanaj Akter', 'shanaj@gmail.com', '25f9e794323b453885f5181f1b624d0b', '01856234897', 'job_seeker', 'shanaj@gmail.com-file_6a0442914cfe27.92982498.jpeg', 'shanaj@gmail.com-file_6a0442914dd8f6.08819196.jpeg', 0, 0, NULL, NULL, '2026-05-13 08:54:11'),
(14, 'MD. RUBEL AHMMED', 'rubel@m.m', '25f9e794323b453885f5181f1b624d0b', NULL, 'job_seeker', NULL, NULL, 0, 0, NULL, NULL, '2026-05-23 04:06:50'),
(16, 'sakib al Hasan', 'ashraf@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 'job_seeker', NULL, NULL, 1, 0, NULL, NULL, '2026-05-23 06:29:11'),
(17, 'sabbir Rahman', 'sabbirrahman@gmail.com', '554dd95779b5991c75c2589f8e49173a', NULL, 'job_seeker', NULL, NULL, 1, 0, NULL, NULL, '2026-06-02 04:33:03'),
(20, 'sakib al Hasan', 'sakib75@gmail.com', '91a5091a4621067f9082fa41b63a0bb9', '01834815263', 'job_seeker', 'sakib75@gmail.com-file_6a2683ec8e7225.34863154.jpeg', 'sakib75@gmail.com-file_6a2683ec8f7362.81782328.jpeg', 1, 0, NULL, NULL, '2026-06-02 08:51:37'),
(21, 'Ashraful islam Chowdhury', 'Ashraful7724@gmail.com', 'cbbbb4440e228a2c06d4b26c442ff96a', NULL, 'job_seeker', NULL, NULL, 1, 0, NULL, NULL, '2026-06-07 05:13:18'),
(24, 'Akber Ali Khan', 'aakhan@gmail.com', '012d374e8e1984a8dfaf9bc8d5472529', NULL, 'job_seeker', NULL, NULL, 1, 0, NULL, NULL, '2026-06-08 05:30:32'),
(26, 'Shahadat Hossain', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', NULL, 'admin', NULL, NULL, 1, 0, NULL, NULL, '2026-06-09 04:49:23'),
(27, 'Ashraf Nafiz', 'nafizashraaf@gmail.com', '503c7e8f6b373d9918b14a90c3116d5a', NULL, 'job_seeker', NULL, NULL, 1, 0, 'd589fff3f912b44fc9d912a93abf1077a8e51e19622895387d5f46fa603eb05d', '2026-06-14 10:52:12', '2026-06-14 09:10:24'),
(28, 'Sahafa Thamar', 'sahafathamar@gmail.com', 'b4144f2c0aa822666ff816e2d945cb34', NULL, 'job_seeker', NULL, NULL, 1, 0, '330ae01a2937bfd0a36552f25611a54b957fd70015fac681ea5de96e8e685884', '2026-06-16 04:55:59', '2026-06-15 06:20:59'),
(29, 'MD. RUBEL AHMMED', 'ashraful.chowdhury@teletalk.com', '83b25fc8c8f40ea66a6dccad03353bec', NULL, 'employer', NULL, NULL, 1, 0, NULL, NULL, '2026-06-24 06:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `father_name` varchar(150) NOT NULL,
  `mother_name` varchar(150) NOT NULL,
  `dob` date DEFAULT NULL,
  `nationality` varchar(50) NOT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `nid` varchar(50) NOT NULL,
  `birth_registration` varchar(50) NOT NULL,
  `passport_no` varchar(50) NOT NULL,
  `marital_status` enum('single','married','other') DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `father_name`, `mother_name`, `dob`, `nationality`, `religion`, `gender`, `nid`, `birth_registration`, `passport_no`, `marital_status`, `address`, `created_at`) VALUES
(1, 8, 'Hossain', 'Hasina Begum', '1999-01-23', 'Bangladeshi', 'Islam', 'male', '9561247586', '1999021900004578', 'A-1510326', 'single', 'khandakia, Hathazari, Chattogram', '2026-04-18 15:35:17'),
(2, 11, 'Aminul Islam Chowdhury', 'Mukta begum', '2003-02-12', 'Bangladeshi ', 'Islam', 'male', '1910014651', '20041215222322', 'A-1011615', 'single', 'Aman Bazar, Gudhara Ghat, Middle Badda', '2026-04-27 09:45:07'),
(4, 3, 'sahadat hossain', 'minuara hossain', '1996-02-14', 'Bangladeshi', 'Islam', 'female', '4546263411', '1996021400004544', 'A-1013641', 'single', 'satkania, chattogram\r\n', '2026-05-12 06:58:19'),
(5, 6, 'sahadat hossain', 'minuara hossain', '1996-02-14', 'Bangladeshi', 'Islam', 'female', '4546263411', '1996021400004544', 'A-1013641', 'married', 'sadatpur, kurmitala, chattogrram', '2026-05-13 05:35:03'),
(6, 13, 'Ashraful Alam Khan', 'Mahia Kabir khan', '1996-06-03', 'Bangladeshi', 'Islam', 'female', '4546263411', '1996061400004689', 'A-1013781', 'married', 'Altaf Naggar, Road No-5, Khadarkhali,Bakalia, Chattogram, ', '2026-05-13 08:56:22'),
(8, 20, 'Sakib Al Kadan', 'Shanas hasan', '2001-01-29', 'Bangladeshi', 'Islam', 'male', '4546263411', '1996061400004689', 'A-1013781', 'single', 'AK R Society, Akbar Sha Road, Akbar Sha, Chattogram ', '2026-06-04 05:35:23'),
(9, 12, 'Rahaman Afjal Karim', 'Rahima Akter', '2000-02-22', 'Bangladeshi', 'Islam', 'male', '4546263411', '1996021400004544', 'A-1013641', 'single', 'Afjal Nagar, Shantibag, Noakhali', '2026-06-11 09:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `exam_level` tinyint NOT NULL,
  `exam_name` varchar(50) NOT NULL,
  `uni_board` varchar(50) NOT NULL,
  `roll_id` varchar(50) DEFAULT NULL,
  `subject` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  `passing_year` year DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_education`
--

INSERT INTO `user_education` (`id`, `user_id`, `exam_level`, `exam_name`, `uni_board`, `roll_id`, `subject`, `result`, `passing_year`, `created_at`) VALUES
(1, 8, 1, 'SSC', 'Chattogram', '107245', 'science', '4.44', '2016', '2026-04-18 10:33:36'),
(2, 8, 2, 'HSC', 'Chattogram', '113422', 'science', '3.67', '2018', '2026-04-18 10:33:36'),
(3, 11, 1, 'SSC', 'Chattogram', '107228', 'science', '3.68', '2016', '2026-04-27 09:45:42'),
(4, 11, 2, 'HSC', 'Chattogram', '114578', 'science', '3.54', '2018', '2026-04-27 09:47:05'),
(5, 8, 3, '1', 'East Delta University', '191001412', '40', '3.42', '2023', '2026-04-28 06:51:58'),
(6, 6, 1, '33', 'Chattogram', '114455', '53', '4.00', '2018', '2026-05-13 05:35:33'),
(7, 6, 2, '34', 'Chattogram', '117845', '56', '4.30', '2020', '2026-05-13 05:35:59'),
(8, 6, 3, '9', 'Chattogram', '191001412', '10', '3.41', '2024', '2026-05-13 05:36:23'),
(13, 20, 1, '33', 'Chattogram', '107245', '52', '4.00', '2016', '2026-06-03 05:05:20'),
(14, 20, 2, '34', 'Chattogram', '113422', '55', '3.67', '2018', '2026-06-03 08:35:53'),
(17, 20, 3, '5', 'East Delta University', '191001412', '32', '3.42', '2022', '2026-06-03 09:01:26'),
(21, 21, 1, '33', 'Chattogram', '107245', '52', '4.00', '2016', '2026-06-07 06:22:40'),
(22, 21, 2, '34', 'Chattogram', '113422', '55', '4.00', '2018', '2026-06-07 09:26:56'),
(24, 12, 1, '33', 'Chattogram', '107245', '52', '3.42', '2018', '2026-06-11 09:49:50'),
(25, 12, 2, '34', 'Chattogram', '132896', '55', '4.00', '2020', '2026-06-11 09:50:13'),
(26, 12, 3, '7', 'East Delta University', '2011132896', '3', '4.00', '2024', '2026-06-11 09:50:58'),
(27, 28, 1, '33', 'Chattogram', '107245', '52', '3.42', '2016', '2026-06-16 05:03:40'),
(28, 28, 2, '34', 'Chattogram', '107245', '55', '3.67', '2018', '2026-06-16 05:04:00'),
(29, 28, 3, '2', 'East Delta University', '191001412', '58', '3.42', '2023', '2026-06-16 05:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_experience`
--

CREATE TABLE `user_experience` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_type` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `is_current` tinyint(1) DEFAULT '0',
  `description` text,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_experience`
--

INSERT INTO `user_experience` (`id`, `user_id`, `company_name`, `company_type`, `job_title`, `start_date`, `end_date`, `is_current`, `description`, `location`, `created_at`, `updated_at`) VALUES
(1, 7, 'Foundation For Autism Research and Education', 'Private', 'ICT Instructor', '2025-10-05', '2026-03-30', 0, 'Teaching Student ICT and Creating Digital Files', 'Road-2, South Khulshi, Chattogram', '2026-04-21 06:40:39', '2026-04-21 06:40:39'),
(2, 8, 'Foundation For Autism Research and Education', 'Private', 'ICT Instructor', '2025-10-05', '2026-03-30', 0, 'doing Nothing just chill', 'Road-2, South Khulshi, Chattogram', '2026-04-23 06:36:23', '2026-04-23 06:36:23'),
(3, 6, 'Chittagong Online Limited', 'Private', 'front Desk officers', '2025-02-02', '2026-02-19', 0, '', 'Shahajanpur,Chattogram, Bangladesh', '2026-05-13 05:51:14', '2026-05-13 05:51:14'),
(4, 13, 'P2P', 'Construction Company(Pivate)', 'Assistant Engineer Civil', '2023-01-13', '2025-12-24', 0, 'Assisting Senior Civil Engineer on Side Construction', 'Or Nizam Road, Golpahar Mor, Chittagong', '2026-05-13 09:24:35', '2026-05-13 09:24:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_permission`
--
ALTER TABLE `action_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_action_permission_user` (`user_id`);

--
-- Indexes for table `admit_cards`
--
ALTER TABLE `admit_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `resume_id` (`resume_id`);

--
-- Indexes for table `bachelor_degrees`
--
ALTER TABLE `bachelor_degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bachelor_departments`
--
ALTER TABLE `bachelor_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `degree_id` (`degree_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `circular_id` (`circular_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `exam_centers`
--
ALTER TABLE `exam_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_rooms`
--
ALTER TABLE `exam_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `center_id` (`center_id`);

--
-- Indexes for table `exam_seats`
--
ALTER TABLE `exam_seats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_id` (`application_id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `job_circulars`
--
ALTER TABLE `job_circulars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_job_circulars_company` (`company_id`);

--
-- Indexes for table `job_post_edu`
--
ALTER TABLE `job_post_edu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_job_post_edu_job_code` (`job_code`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_experience`
--
ALTER TABLE `user_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_permission`
--
ALTER TABLE `action_permission`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admit_cards`
--
ALTER TABLE `admit_cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bachelor_degrees`
--
ALTER TABLE `bachelor_degrees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `bachelor_departments`
--
ALTER TABLE `bachelor_departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_centers`
--
ALTER TABLE `exam_centers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_rooms`
--
ALTER TABLE `exam_rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_seats`
--
ALTER TABLE `exam_seats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `job_circulars`
--
ALTER TABLE `job_circulars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `job_post_edu`
--
ALTER TABLE `job_post_edu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_education`
--
ALTER TABLE `user_education`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_experience`
--
ALTER TABLE `user_experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action_permission`
--
ALTER TABLE `action_permission`
  ADD CONSTRAINT `fk_action_permission_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admit_cards`
--
ALTER TABLE `admit_cards`
  ADD CONSTRAINT `admit_cards_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  ADD CONSTRAINT `admit_cards_ibfk_2` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`circular_id`) REFERENCES `job_circulars` (`id`),
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `exam_rooms`
--
ALTER TABLE `exam_rooms`
  ADD CONSTRAINT `exam_rooms_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `exam_centers` (`id`);

--
-- Constraints for table `exam_seats`
--
ALTER TABLE `exam_seats`
  ADD CONSTRAINT `exam_seats_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `exam_seats_ibfk_2` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`),
  ADD CONSTRAINT `exam_seats_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `exam_rooms` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_circulars`
--
ALTER TABLE `job_circulars`
  ADD CONSTRAINT `fk_job_circulars_company` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_post_edu`
--
ALTER TABLE `job_post_edu`
  ADD CONSTRAINT `fk_job_post_edu_job_code` FOREIGN KEY (`job_code`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `resumes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_education`
--
ALTER TABLE `user_education`
  ADD CONSTRAINT `user_education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
