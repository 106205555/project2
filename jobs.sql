-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2025 at 10:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` varchar(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `brief_desc` varchar(200) DEFAULT NULL,
  `salary` varchar(10) DEFAULT NULL,
  `responsibilities` varchar(400) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `knowledge` varchar(100) DEFAULT NULL,
  `soft_skills` varchar(100) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `name`, `brief_desc`, `salary`, `responsibilities`, `education`, `knowledge`, `soft_skills`, `experience`) VALUES
('DV201', 'Software Developer', 'As a Software Developer, you are responsible for maintaining and improving the company’s <strong>GrandTech Hub</strong> application.', '$400-900', '<li>Find and fix bugs in the app.</li> <li>Improve app performance, security, and scalability.</li> <li>Update existing features when requirements change.</li> <li>Participate in code reviews to ensure quality.</li>', 'Bachelor’s degree in IT, computer science, or related fields.', 'JavaScript and C/C++ knowledge.', 'Problem-solving, logical thinking, teamwork, adaptability.', '1+ year of related work experience.'),
('SC302', 'Cybersecurity Specialist', 'As a Cybersecurity Specialist, you are responsible for protecting computer systems, networks, and data from cyber threats such as hacking, malware, data breaches, and insider threats.', '$400-700', '<li>Track network traffic for unusual or malicious activity.</li> <li>Respond to real-time threats (e.g. intrusion attempts, ransomware).</li> <li>Manage access controls.</li> <li>Identify vulnerabilities in systems and applications.</li>', 'Bachelor’s degree in IT, computer science, or related fields.', 'Networking basics, security tools, risk assessment and incident response skills.', 'Analytical thinking, problem-solving under pressure, communication, adaptability.', '2+ years of related work experience.'),
('SP101', 'IT Support Technician', 'As an IT Support Technician, you are expected to provide aid to users and organizations technically and make sure their computer systems, software, and devices run smoothly.', '$350-550', '<li>Respond to support requests via phone, email, chat, or in person.</li> <li>Install, configure, and repair desktops, laptops, and peripherals (printers, scanners, monitors).</li> <li>Update and patch software.</li> <li>Check and fix basic network issues.</li> <li>Stay patient and professional, even with frustrated users.</li>', 'Bachelor’s degree in IT, computer science, or related fields.', 'Hardware, software and networking basics.', 'Communication, problem-solving, patience, time management.', '1+ year of related work experience.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
