-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2026 at 03:26 AM
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
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int NOT NULL,
  `job_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `resume_id` int DEFAULT NULL,
  `cover_letter` text,
  `status` enum('pending','reviewed','shortlisted','rejected','accepted') DEFAULT 'pending',
  `applied_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(1, 'BSc in Engineering', 4, 3),
(2, 'BSc in Electrical Engineering', 4, 3),
(3, 'BSc in Mechanical Engineering', 4, 3),
(4, 'BSc in Civil Engineering', 4, 3),
(5, 'BSc in Computer Science', 4, 3),
(6, 'BSc in Software Engineering', 4, 3),
(7, 'BSc in Information Technology', 4, 3),
(8, 'BBA', 4, 3),
(9, 'BSc in Accounting', 4, 3),
(10, 'BSc in Finance', 4, 3),
(11, 'BSc in Marketing', 4, 3),
(12, 'BA in Economics', 4, 3),
(13, 'BA in Sociology', 4, 3),
(14, 'BA in Political Science', 4, 3),
(15, 'BSc in Psychology', 4, 3),
(16, 'BA in English', 4, 3),
(17, 'BA in History', 4, 3),
(18, 'BA in Philosophy', 4, 3),
(19, 'BSc in Mathematics', 4, 3),
(20, 'BSc in Physics', 4, 3),
(21, 'BSc in Chemistry', 4, 3),
(22, 'BSc in Biology', 4, 3),
(23, 'BSc in Environmental Science', 4, 3),
(24, 'BSc in Statistics', 4, 3),
(25, 'LLB', 4, 3),
(26, 'BSc in International Relations', 4, 3),
(27, 'BSc in Public Administration', 4, 3),
(28, 'BArch', 5, 3),
(29, 'BURP (Urban Planning)', 4, 3),
(30, 'BPharm', 4, 3),
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
(43, 'Pass Course', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bachelor_departments`
--

CREATE TABLE `bachelor_departments` (
  `id` int NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `degree_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bachelor_departments`
--

INSERT INTO `bachelor_departments` (`id`, `department_name`, `degree_id`) VALUES
(1, 'Computer Science', 5),
(2, 'Software Engineering', 6),
(3, 'Information Technology', 7),
(4, 'Electrical Engineering', 2),
(5, 'Mechanical Engineering', 3),
(6, 'Civil Engineering', 4),
(7, 'Architecture', 28),
(8, 'Urban Planning', 29),
(9, 'Business Administration', 8),
(10, 'Accounting', 9),
(11, 'Finance', 10),
(12, 'Marketing', 11),
(13, 'Economics', 12),
(14, 'Sociology', 13),
(15, 'Political Science', 14),
(16, 'Psychology', 15),
(17, 'English', 16),
(18, 'History', 17),
(19, 'Philosophy', 18),
(20, 'Mathematics', 19),
(21, 'Physics', 20),
(22, 'Chemistry', 21),
(23, 'Biology', 22),
(24, 'Environmental Science', 23),
(25, 'Statistics', 24),
(26, 'Law', 25),
(27, 'International Relations', 26),
(28, 'Public Administration', 27),
(29, 'Pharmacy', 30),
(30, 'Nursing', 30),
(31, 'Data Science', 5),
(32, 'Artificial Intelligence', 5),
(33, 'Cyber Security', 5),
(34, 'Web Development', 5),
(35, 'Mobile App Development', 6),
(36, 'Cloud Computing', 7),
(37, 'Network Engineering', 2),
(38, 'Robotics', 3),
(39, 'Aerospace Engineering', 1),
(40, 'Marine Engineering', 1),
(41, 'Industrial Engineering', 1),
(42, 'Human Resource', 8),
(43, 'Supply Chain Management', 8),
(44, 'Banking', 10),
(45, 'Insurance', 10),
(46, 'Development Studies', 12),
(47, 'Anthropology', 13),
(48, 'Media and Communication', 16),
(49, 'Film Studies', 16),
(50, 'Geography', 23),
(51, 'Biotechnology', 22);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category_name` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `location` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `company_name`, `description`, `website`, `logo`, `location`) VALUES
(1, NULL, 'Bangladesh Teletalk ltd ', NULL, 'www.teletalk.com', NULL, NULL),
(2, NULL, 'Qbittech ', 'A well known IT company basically develop Android application, web Application.  ', 'www.qubittech.com', NULL, 'Dhaka'),
(3, NULL, 'TechSoft Ltd.', 'Software development company', 'https://techsoft.com', 'techsoft.png', 'Dhaka'),
(4, NULL, 'NextGen IT', 'IT solutions and services', 'https://nextgenit.com', 'nextgen.png', 'Chittagong'),
(5, NULL, 'DataCore', 'Data analytics and AI solutions', 'https://datacore.com', 'datacore.png', 'Dhaka'),
(6, NULL, 'WebNest', 'Web design and development', 'https://webnest.com', 'webnest.png', 'Khulna'),
(7, NULL, 'CloudNet', 'Cloud computing services', 'https://cloudnet.com', 'cloudnet.png', 'Sylhet'),
(8, NULL, 'CyberTech', 'Cybersecurity services', 'https://cybertech.com', 'cybertech.png', 'Rajshahi'),
(9, NULL, 'AppStudio', 'Mobile app development company', 'https://appstudio.com', 'appstudio.png', 'Dhaka'),
(10, NULL, 'InnovateX', 'Startup innovation hub', 'https://innovatex.com', 'innovatex.png', 'Barisal'),
(11, NULL, 'SoftSolutions', 'Enterprise software solutions', 'https://softsolutions.com', 'softsolutions.png', 'Dhaka'),
(12, NULL, 'NetSystems', 'Networking and infrastructure services', 'https://netsystems.com', 'netsystems.png', 'Mymensingh');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int NOT NULL,
  `company_id` int DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `description` text,
  `requirements` text,
  `salary` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `job_type` enum('gov','non_gov') NOT NULL,
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
  `post_active` tinyint DEFAULT NULL,
  `app_start_time` datetime DEFAULT NULL,
  `app_end_time` datetime DEFAULT NULL,
  `vacancy` int DEFAULT NULL,
  `min_age` int DEFAULT NULL,
  `comp_benifits` text,
  `emp_status` enum('Full time','Contractual') DEFAULT 'Full time',
  `emp_work_place` enum('Work on office','Remote') DEFAULT 'Work on office',
  `category_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `title`, `description`, `requirements`, `salary`, `location`, `deadline`, `job_type`, `jsc_active`, `jsc_required`, `ssc_active`, `ssc_required`, `hsc_active`, `hsc_required`, `gra_active`, `gra_required`, `mas_active`, `mas_required`, `mph_active`, `mph_required`, `mph_running`, `phd_active`, `phd_required`, `phd_running`, `job_exp_active`, `job_exp_required`, `min_job_exp_year`, `post_active`, `app_start_time`, `app_end_time`, `vacancy`, `min_age`, `comp_benifits`, `emp_status`, `emp_work_place`, `category_id`, `created_at`) VALUES
(1, 1, 'web developer', 'We are looking for a skilled and motivated Web Developer to join our team.', ' Knowledge in html, css, java script, php, MySql\r\nBachelor in CSE from any Register University ', '30000-45000', 'Gulshan-1, Dhaka', '2026-05-01', 'gov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(2, 1, 'Junior Web developer', 'We are looking for a skilled and motivated Web Developer to join our team.', 'Bachelor in CSE from any University', '20000-30000', 'Dhaka', '2026-05-01', 'gov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(3, 1, 'Assistant Programmer', 'We are looking for a skilled and motivated Web Developer to join our team.', 'Bachelor in CSE from Any University\r\n1 year Experience in Relatable Position\r\nKnowledge in PHP, Laravel, Node.js', '45000-55000', 'Dhaka', '2026-05-01', 'gov', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(4, 1, 'Junior PHP Developer', 'Develop web apps', 'PHP, MySQL', '30000', 'Dhaka', '2026-12-31', 'gov', 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, '2026-01-01 00:00:00', '2026-06-30 00:00:00', NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(5, 2, 'Frontend Developer', 'Build UI', 'HTML, CSS, JS', '25000', 'Dhaka', '2026-11-30', 'gov', 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2026-02-01 00:00:00', '2026-07-30 00:00:00', NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(6, 3, 'Laravel Developer', 'Backend development', 'Laravel, API', '40000', 'Chittagong', '2026-10-15', 'gov', 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 2, 1, '2026-03-01 00:00:00', '2026-08-30 00:00:00', NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(7, 4, 'Software Engineer', 'Full stack dev', 'OOP, MVC', '50000', 'Dhaka', '2026-09-20', 'gov', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 3, 1, '2026-01-15 00:00:00', '2026-07-15 00:00:00', NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(8, 5, 'Data Analyst', 'Analyze data', 'SQL, Excel', '35000', 'Sylhet', '2026-08-30', 'gov', 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, '2026-02-10 00:00:00', '2026-06-20 00:00:00', NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(9, 6, 'QA Engineer', 'Testing software', 'Manual & Automation', '30000', 'Khulna', '2026-12-01', 'gov', 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, '2026-01-05 00:00:00', '2026-05-30 00:00:00', NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(10, 7, 'DevOps Engineer', 'Manage CI/CD', 'Docker, AWS', '60000', 'Dhaka', '2026-07-25', 'gov', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 4, 1, '2026-02-01 00:00:00', '2026-06-01 00:00:00', NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(11, 8, 'Mobile App Developer', 'Android apps', 'Java/Kotlin', '45000', 'Rajshahi', '2026-11-10', 'gov', 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 2, 1, '2026-03-10 00:00:00', '2026-09-01 00:00:00', NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(12, 9, 'UI/UX Designer', 'Design interfaces', 'Figma, Adobe XD', '28000', 'Dhaka', '2026-10-05', 'gov', 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2026-01-20 00:00:00', '2026-05-15 00:00:00', NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37'),
(13, 10, 'System Administrator', 'Maintain servers', 'Linux, Networking', '42000', 'Barisal', '2026-09-01', 'gov', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 3, 1, '2026-02-15 00:00:00', '2026-07-10 00:00:00', NULL, NULL, NULL, 'Full time', 'Work on office', NULL, '2026-04-22 23:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `skills` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `skills`, `file_path`, `uploaded_at`) VALUES
(1, 7, 'JavaScript,Bootstrap,React,Vue.js,Angular,Node.js,Express.js,MySQL,Git,REST API', 'monir@gmail.com-file_69e5df95ee7912.59402688.pdf', '2026-04-20 08:11:01');

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
  `signature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `profile_image`, `signature`, `created_at`) VALUES
(1, 'Md Ashraful Islam Chowdhury', 'admin@gmail.com', '$2y$10$kAgBoIIV5vLyZTcRDEht6Oq.7nou.fcIz.fi/550y4nsOrb8le.2.', NULL, 'job_seeker', NULL, '', '2026-04-07 04:48:51'),
(2, 'Md Sajjadul Hoque', 'sajjad@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 'employer', NULL, '', '2026-04-15 14:38:13'),
(3, 'Rakib Hasan ', 'rakibhasan@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 'employer', NULL, '', '2026-04-15 14:39:28'),
(4, 'Rakib Hasan ', 'rakibhasan444@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, 'employer', NULL, '', '2026-04-15 14:43:20'),
(6, 'Md Ashraful Islam Chowdhury', 'admin123456@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'job_seeker', NULL, '', '2026-04-15 17:14:07'),
(7, 'sabbir', 'sabbir@gmail.com', '1bbd886460827015e5d605ed44252251', NULL, 'job_seeker', NULL, '', '2026-04-15 17:24:19'),
(8, 'sakib al hasan', 'sakibal@gmail.com', '25d55ad283aa400af464c76d713c07ad', '01834815169', 'job_seeker', 'sakibal@gmail.com-file_69e787b7ed33e5.04186924.jpg', 'sakibal@gmail.com-file_69e787b7ed5cc1.55497570.jpeg', '2026-04-17 05:44:33');

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
(1, 8, 'MD Harun Chowdhury', 'Shimul Akter', '2026-04-02', 'Bangladeshi', 'Islam', 'male', '6915097429', '2001030900004568', 'A-1023561', 'married', 'Aman Bazar, Khandakia, Hathazari, Chattogram', '2026-04-18 15:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
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

INSERT INTO `user_education` (`id`, `user_id`, `exam_name`, `uni_board`, `roll_id`, `subject`, `result`, `passing_year`, `created_at`) VALUES
(1, 8, 'SSC', 'Chattogram', '107245', 'science', '4.44', '2016', '2026-04-18 10:33:36'),
(2, 8, 'HSC', 'Chattogram', '113422', 'science', '3.67', '2018', '2026-04-18 10:33:36');

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
(1, 7, 'Foundation For Autism Research and Education', 'Private', 'ICT Instructor', '2025-10-05', '2026-03-30', 0, 'Teaching Student ICT and Creating Digital Files', 'Road-2, South Khulshi, Chattogram', '2026-04-21 06:40:39', '2026-04-21 06:40:39');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `category_id` (`category_id`);

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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bachelor_degrees`
--
ALTER TABLE `bachelor_degrees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `bachelor_departments`
--
ALTER TABLE `bachelor_departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_education`
--
ALTER TABLE `user_education`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_experience`
--
ALTER TABLE `user_experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
