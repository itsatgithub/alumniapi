-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: irbsvr3
-- Generation Time: Feb 05, 2015 at 11:01 AM
-- Server version: 5.0.26
-- PHP Version: 5.2.0
-- 
-- Database: `irbdb_development`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `alumni_communications`
-- 

CREATE TABLE `alumni_communications` (
  `alumni_communicationscode` varchar(255) NOT NULL,
  `description` varchar(255) default NULL,
  `short_description` varchar(100) default NULL,
  `order_number` int(11) default NULL,
  `version` int(11) NOT NULL,
  `deleted` bit(1) default NULL,
  PRIMARY KEY  (`alumni_communicationscode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `alumni_external_job_positions`
-- 

CREATE TABLE `alumni_external_job_positions` (
  `alumni_external_job_positionscode` varchar(255) NOT NULL,
  `job_position_types` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `short_description` varchar(100) default NULL,
  `order_number` int(11) default NULL,
  `version` int(11) NOT NULL,
  `deleted` bit(1) default NULL,
  PRIMARY KEY  (`alumni_external_job_positionscode`),
  KEY `fk_irb_external_job_positions_alumni_job_position_types1` (`job_position_types`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `alumni_external_job_sectors`
-- 

CREATE TABLE `alumni_external_job_sectors` (
  `alumni_external_job_sectorscode` varchar(255) NOT NULL,
  `description` varchar(255) default NULL,
  `short_description` varchar(100) default NULL,
  `order_number` int(11) default NULL,
  `version` int(11) NOT NULL,
  `deleted` bit(1) default NULL,
  PRIMARY KEY  (`alumni_external_job_sectorscode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `alumni_external_jobs`
-- 

CREATE TABLE `alumni_external_jobs` (
  `alumni_external_jobscode` varchar(255) NOT NULL,
  `personal` varchar(255) default NULL,
  `start_date` datetime default NULL,
  `end_date` datetime default NULL,
  `external_job_positions` varchar(255) default NULL,
  `comments` varchar(255) default NULL,
  `external_job_sectors` varchar(255) default NULL,
  `institution` varchar(100) default NULL,
  `address` varchar(255) default NULL,
  `postcode` varchar(45) default NULL,
  `city` varchar(45) default NULL,
  `country` varchar(255) default NULL,
  `telephone` varchar(45) default NULL,
  `current` bit(1) default NULL,
  `version` int(11) NOT NULL,
  `deleted` bit(1) default NULL,
  PRIMARY KEY  (`alumni_external_jobscode`),
  KEY `fk_alumni_external_jobs_irb_external_job_positions1` (`external_job_positions`),
  KEY `fk_alumni_external_jobs_alumni_external_job_sectors1` (`external_job_sectors`),
  KEY `fk_alumni_external_jobs_alumni_personal1` (`personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `alumni_irb_job_positions`
-- 

CREATE TABLE `alumni_irb_job_positions` (
  `alumni_irb_job_positionscode` varchar(255) NOT NULL,
  `job_position_types` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `short_description` varchar(100) default NULL,
  `order_number` int(11) default NULL,
  `version` int(11) NOT NULL,
  `deleted` bit(1) default NULL,
  PRIMARY KEY  (`alumni_irb_job_positionscode`),
  KEY `fk_irb_job_positions_alumni_job_position_types1` (`job_position_types`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `alumni_irb_jobs`
-- 

CREATE TABLE `alumni_irb_jobs` (
  `alumni_irb_jobscode` varchar(255) NOT NULL,
  `personal` varchar(255) default NULL,
  `start_date` datetime default NULL,
  `end_date` datetime default NULL,
  `unit` varchar(255) default NULL,
  `unit_2` varchar(255) default NULL,
  `research_group` varchar(255) default NULL,
  `research_group_2` varchar(255) default NULL,
  `irb_job_positions` varchar(255) default NULL,
  `version` int(11) NOT NULL,
  `deleted` bit(1) default NULL,
  PRIMARY KEY  (`alumni_irb_jobscode`),
  KEY `fk_alumni_irb_jobs_irb_job_positions1` (`irb_job_positions`),
  KEY `fk_alumni_irb_jobs_alumni_personal1` (`personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `alumni_job_position_types`
-- 

CREATE TABLE `alumni_job_position_types` (
  `alumni_job_position_typescode` varchar(255) NOT NULL,
  `description` varchar(255) default NULL,
  `short_description` varchar(100) default NULL,
  `order_number` int(11) default NULL,
  `version` int(11) NOT NULL,
  `deleted` bit(1) default NULL,
  PRIMARY KEY  (`alumni_job_position_typescode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `alumni_params`
-- 

CREATE TABLE `alumni_params` (
  `alumni_paramscode` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` varchar(255) default NULL,
  PRIMARY KEY  (`alumni_paramscode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `alumni_personal`
-- 

CREATE TABLE `alumni_personal` (
  `alumni_personalcode` varchar(255) NOT NULL,
  `external` tinyint(4) NOT NULL default '1',
  `titles` varchar(255) default NULL,
  `firstname` varchar(100) default NULL,
  `surname` varchar(100) default NULL,
  `irb_surname` varchar(100) default NULL,
  `gender` varchar(255) default NULL,
  `nationality` varchar(255) default NULL,
  `nationality_2` varchar(255) default NULL,
  `birth` datetime default NULL,
  `email` varchar(100) default NULL,
  `url` varchar(100) default NULL,
  `facebook` varchar(100) default NULL,
  `linkedin` varchar(100) default NULL,
  `twitter` varchar(100) default NULL,
  `keywords` varchar(255) default NULL,
  `biography` varchar(2550) default NULL,
  `awards` varchar(2550) default NULL,
  `ORCIDID` varchar(100) default NULL,
  `researcherid` varchar(100) default NULL,
  `pubmedid` varchar(100) default NULL,
  `verified` tinyint(4) default '0',
  `show_data` tinyint(4) default '0',
  `version` int(11) NOT NULL default '1',
  `deleted` bit(1) default '\0',
  PRIMARY KEY  (`alumni_personalcode`),
  KEY `fk_alumni_personal_alumni_titles1` (`titles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `alumni_personal_communications`
-- 

CREATE TABLE `alumni_personal_communications` (
  `alumni_personalcode` varchar(255) NOT NULL,
  `alumni_communicationscode` varchar(255) NOT NULL,
  PRIMARY KEY  (`alumni_personalcode`,`alumni_communicationscode`),
  KEY `fk_alumni_personal_has_alumni_communications_alumni_person1` (`alumni_personalcode`),
  KEY `fk_alumni_personal_has_alumni_communications_alumni_commun1` (`alumni_communicationscode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `alumni_titles`
-- 

CREATE TABLE `alumni_titles` (
  `alumni_titlescode` varchar(255) NOT NULL,
  `description` varchar(255) default NULL,
  `short_description` varchar(100) default NULL,
  `order_number` int(11) default NULL,
  `version` int(11) NOT NULL,
  `deleted` bit(1) default NULL,
  PRIMARY KEY  (`alumni_titlescode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


