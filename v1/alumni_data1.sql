-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: irbsvr3
-- Generation Time: Feb 05, 2015 at 11:10 AM
-- Server version: 5.0.26
-- PHP Version: 5.2.0
-- 
-- Database: `irbdb_development`
-- 

-- 
-- Dumping data for table `alumni_communications`
-- 

INSERT INTO `alumni_communications` (`alumni_communicationscode`, `description`, `short_description`, `order_number`, `version`, `deleted`) VALUES 
('0000000000001', 'IRB Barcelona news releases (email only)', 'IRB Barcelona news releases (email only)', 1, 1, '\0'),
('0000000000002', 'In Vivo newsletter (hard copy and email)', 'In Vivo newsletter (hard copy and email)', 2, 1, '\0'),
('0000000000003', 'Annual Report (hard copy and email)', 'Annual Report (hard copy and email)', 3, 1, '\0'),
('0000000000004', 'Events announcements (poster and email notification)', 'Events announcements (poster and email notification)', 4, 1, '\0'),
('0000000000005', 'PhD and Postdoc call announcements (poster and email notification)', 'PhD and Postdoc call announcements (poster and email notification)', 5, 1, '\0'),
('0000000000006', 'Job openings at IRB Barcelona', 'Job openings at IRB Barcelona', 6, 1, '\0');

-- 
-- Dumping data for table `alumni_external_job_positions`
-- 

INSERT INTO `alumni_external_job_positions` (`alumni_external_job_positionscode`, `job_position_types`, `description`, `short_description`, `order_number`, `version`, `deleted`) VALUES 
('0000000000001', NULL, 'Administrative', 'Administrative', 1, 4, '\0'),
('0000000000002', NULL, 'Between jobs', 'Between jobs', 2, 1, '\0'),
('0000000000003', NULL, 'Retired', 'Retired', 3, 1, '\0'),
('0000000000004', NULL, 'Assistant professor', 'Assistant professor', 4, 1, '\0'),
('0000000000005', NULL, 'Associate professor', 'Associate professor', 5, 3, '\0'),
('0000000000006', NULL, 'Director', 'Director', 6, 1, '\0'),
('0000000000007', NULL, 'Group leader/Principal investigator', 'Group leader/Principal investigator', 7, 1, '\0'),
('0000000000008', NULL, 'Postdoc', 'Postdoc', 8, 2, '\0'),
('0000000000009', NULL, 'Predoc', 'Predoc', 9, 1, '\0'),
('0000000000010', NULL, 'Professor', 'Professor', 10, 1, '\0'),
('0000000000011', NULL, 'Team leader', 'Team leader', 11, 2, '\0'),
('0000000000012', NULL, 'Self-employed', 'Self-employed', 12, 1, '\0'),
('0000000000013', NULL, 'Technician', 'Technician', 13, 1, '\0'),
('0000000000014', NULL, 'Other', 'Other', 14, 1, '\0');

-- 
-- Dumping data for table `alumni_external_job_sectors`
-- 

INSERT INTO `alumni_external_job_sectors` (`alumni_external_job_sectorscode`, `description`, `short_description`, `order_number`, `version`, `deleted`) VALUES 
('0000000000001', 'Academia', 'Academia', 1, 3, '\0'),
('0000000000002', 'Industry', 'Industry', 2, 4, '\0'),
('0000000000003', 'Non-research scientific career (tech transfer, publishing, communications, education)', 'Non-research scientific career', 3, 3, '\0'),
('0000000000004', 'Non-scientific career (government, heath, finance, consultancy)', 'Non-scientific career', 4, 1, '\0');

-- 
-- Dumping data for table `alumni_external_jobs`
-- 


-- 
-- Dumping data for table `alumni_irb_job_positions`
-- 

INSERT INTO `alumni_irb_job_positions` (`alumni_irb_job_positionscode`, `job_position_types`, `description`, `short_description`, `order_number`, `version`, `deleted`) VALUES 
('00001', NULL, 'Group Leader', 'Group Leader', 1, 1, '\0'),
('00002', NULL, 'Research Director', 'Research Director', 2, 2, '\0'),
('00003', NULL, 'Research Associate', 'Research Associate', 3, 1, '\0'),
('00005', NULL, 'Postdoctoral Fellow', 'Postdoctoral Fellow', 4, 3, '\0'),
('00006', NULL, 'PhD Student', 'PhD Student', 5, 1, '\0'),
('00007', NULL, 'MSc Student', 'MSc Student', 6, 1, '\0'),
('00008', NULL, 'Lab Manager', 'Lab Manager', 7, 1, '\0'),
('00009', NULL, 'Lab Technician', 'Lab Technician', 8, 1, '\0'),
('00010', NULL, 'Administrative Assistant', 'Administrative Assistant', 9, 1, '\0'),
('00011', NULL, 'Programme Secretary', 'Programme Secretary', 10, 1, '\0'),
('00013', NULL, 'Visiting Scientist', 'Visiting Scientist', 11, 1, '\0'),
('00014', NULL, 'Visiting Student', 'Visiting Student', 12, 1, '\0'),
('00016', NULL, 'Core Facility Manager', 'Core Facility Manager', 13, 1, '\0'),
('00017', NULL, 'Administration Department Head', 'Administration Department Head', 14, 2, '\0'),
('00018', NULL, 'Administration Department Member', 'Administration Department Member', 15, 1, '\0'),
('00019', NULL, 'Director', 'Director', 16, 1, '\0'),
('00020', NULL, 'Adjunct Director', 'Adjunct Director', 17, 1, '\0'),
('00022', NULL, 'IRB Secretary', 'IRB Secretary', 18, 1, '\0'),
('00023', NULL, 'Managing Director', 'Managing Director', 19, 1, '\0'),
('00024', NULL, 'Research Assistant', 'Research Assistant', 20, 1, '\0'),
('00025', NULL, 'Lab Director', 'Lab Director', 21, 1, '\0'),
('00026', NULL, 'Programme Technician', 'Programme Technician', 22, 1, '\0'),
('00027', NULL, 'Facility Specialist', 'Facility Specialist', 23, 1, '\0'),
('00029', NULL, 'Visiting Professor', 'Visiting Professor', 24, 1, '\0'),
('00030', NULL, 'Technical Officer', 'Technical Officer', 25, 1, '\0'),
('00031', NULL, 'Technical Assistant', 'Technical Assistant', 26, 1, '\0'),
('00032', NULL, 'Practices', 'Practices', 27, 1, '\0'),
('00033', NULL, 'Project Manager', 'Project Manager', 28, 1, '\0'),
('00034', NULL, 'Research Officer', 'Research Officer', 29, 1, '\0'),
('00035', NULL, 'Senior Research Officer', 'Senior Research Officer', 30, 1, '\0'),
('00036', NULL, 'Research Technician', 'Research Technician', 31, 1, '\0'),
('00037', NULL, 'Interdisciplinary Postdoctoral Fellow', 'Interdisciplinary Postdoctoral Fellow', 32, 1, '\0'),
('00038', NULL, 'Research Specialist', 'Research Specialist', 33, 1, '\0'),
('00039', NULL, 'Acting Facility Manager', 'Acting Facility Manager', 34, 1, '\0'),
('00040', NULL, 'Joint Member', 'Joint Member', 35, 1, '\0'),
('00041', NULL, 'Scientific Investigator', 'Scientific Investigator', 36, 1, '\0'),
('00042', NULL, 'Directorate Secretary', 'Directorate Secretary', 37, 1, '\0'),
('00043', NULL, 'Head of Research and Academic Administration', 'Head of Research and Academic Administration', 38, 1, '\0'),
('00044', NULL, 'Academic Officer', 'Academic Officer', 39, 1, '\0'),
('00045', NULL, 'European Project Manager', 'European Project Manager', 40, 1, '\0'),
('00046', NULL, 'Project Officer', 'Project Officer', 41, 1, '\0'),
('00047', NULL, 'Research and Academic Administration Assistant', 'Research and Academic Administration Assistant', 42, 1, '\0'),
('00048', NULL, 'Head of Innovation and Strategic Projects and Acting Manager of Research and Academic Administration', 'Head of Innovation and Strategic Projects and Acting Manager of Research and Academic Administration', 43, 1, '\0'),
('00049', NULL, 'Technology Transfer Officer', 'Technology Transfer Officer', 44, 1, '\0'),
('00050', NULL, 'Head of Communications', 'Head of Communications', 45, 1, '\0'),
('00051', NULL, 'Media Relations Officer', 'Media Relations Officer', 46, 1, '\0'),
('00052', NULL, 'Conference and Event Coordinator', 'Conference and Event Coordinator', 47, 1, '\0'),
('00053', NULL, 'Editorial Support', 'Editorial Support', 48, 1, '\0'),
('00054', NULL, 'Information and Publications Officer', 'Information and Publications Officer', 49, 1, '\0'),
('00055', NULL, 'Trainee', 'Trainee', 50, 1, '\0'),
('00056', NULL, 'Head of Human Resources', 'Head of Human Resources', 51, 1, '\0'),
('00057', NULL, 'Personnel Management Officer', 'Personnel Management Officer', 52, 1, '\0'),
('00058', NULL, 'Human Resources Officer', 'Human Resources Officer', 53, 1, '\0'),
('00059', NULL, 'Human Resources Assistant', 'Human Resources Assistant', 54, 1, '\0'),
('00060', NULL, 'Work Safety and Environment Technician', 'Work Safety and Environment Technician', 55, 1, '\0'),
('00061', NULL, 'Head of ITS', 'Head of ITS', 56, 1, '\0'),
('00062', NULL, 'Systems Architect', 'Systems Architect', 57, 1, '\0'),
('00063', NULL, 'Systems Administrator', 'Systems Administrator', 58, 2, '\0'),
('00064', NULL, 'Service Desk Technician', 'Service Desk Technician', 59, 1, '\0'),
('00065', NULL, 'Head of Finance', 'Head of Finance', 60, 1, '\0'),
('00066', NULL, 'Accounting Officer', 'Accounting Officer', 61, 1, '\0'),
('00068', NULL, 'Finance Controller', 'Finance Controller', 62, 1, '\0'),
('00069', NULL, 'Finance Assistant', 'Finance Assistant', 63, 1, '\0'),
('00070', NULL, 'Head of Purchasing', 'Head of Purchasing', 64, 1, '\0'),
('00071', NULL, 'Purchasing Officer', 'Purchasing Officer', 65, 1, '\0'),
('00072', NULL, 'Buyer', 'Buyer', 66, 1, '\0'),
('00073', NULL, 'Purchasing Assistant', 'Purchasing Assistant', 67, 1, '\0'),
('00074', NULL, 'Communications Officer', 'Communications Officer', 68, 1, '\0'),
('00075', NULL, 'Head of Innovation', 'Head of Innovation', 69, 1, '\0'),
('00076', NULL, 'Research and Academic Administration and Innovation Assistant', 'Research and Academic Administration and Innovation Assistant', 70, 1, '\0'),
('00077', NULL, 'Joint Health and Safety Service Technician', 'Joint Health and Safety Service Technician', 71, 1, '\0'),
('00079', NULL, 'Content Manager', 'Content Manager', 72, 1, '\0'),
('00081', NULL, 'Scientific and Academic Officer', 'Scientific and Academic Officer', 73, 1, '\0'),
('00082', NULL, 'Human Resources and International Liaison Officer', 'Human Resources and International Liaison Officer', 74, 1, '\0'),
('00083', NULL, 'Purchasing Contracts Officer', 'Purchasing Contracts Officer', 75, 1, '\0'),
('00084', NULL, 'Academic and Scientific Coordinator', 'Academic and Scientific Coordinator', 76, 1, '\0'),
('00085', NULL, 'Research Grants Coordinator', 'Research Grants Coordinator', 77, 1, '\0'),
('00086', NULL, 'Research Grants Officer', 'Research Grants Officer', 78, 1, '\0'),
('00087', NULL, 'European Project Officer', 'European Project Officer', 79, 1, '\0'),
('00088', NULL, 'Industrial Liaison Officer', 'Industrial Liaison Officer', 80, 1, '\0'),
('00090', NULL, 'Controller', 'Controller', 81, 1, '\0'),
('00091', NULL, 'Coordinator', 'Coordinator', 82, 1, '\0'),
('00092', NULL, 'Histology Service Manager', 'Histology Service Manager', 83, 1, '\0'),
('00093', NULL, 'Academic Coordinator (acting)', 'Academic Coordinator (acting)', 84, 1, '\0');

-- 
-- Dumping data for table `alumni_job_position_types`
-- 

INSERT INTO `alumni_job_position_types` (`alumni_job_position_typescode`, `description`, `short_description`, `order_number`, `version`, `deleted`) VALUES 
('0000000000001', 'Senior', 'Senior', 1, 1, '\0'),
('0000000000002', 'Junior', 'Junior', 2, 1, '\0'),
('0000000000003', 'n/a', 'n/a', 3, 1, '\0');

-- 
-- Dumping data for table `alumni_params`
-- 

INSERT INTO `alumni_params` (`alumni_paramscode`, `title`, `value`) VALUES 
('EXPORT_MIN_DAYS', 'Minimum days at IRB to allow export to Alumni', '180');

-- 
-- Dumping data for table `alumni_personal_communications`
-- 


-- 
-- Dumping data for table `alumni_titles`
-- 

INSERT INTO `alumni_titles` (`alumni_titlescode`, `description`, `short_description`, `order_number`, `version`, `deleted`) VALUES 
('0000000000001', 'Ms.', 'Ms.', 1, 1, '\0'),
('0000000000002', 'Mr.', 'Mr.', 2, 3, '\0'),
('0000000000003', 'Dr.', 'Dr.', 3, 1, '\0'),
('0000000000004', 'Prof.', 'Prof.', 4, 2, '\0');
