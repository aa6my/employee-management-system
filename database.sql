DROP TABLE IF EXISTS `activation_codes`;
CREATE TABLE IF NOT EXISTS `activation_codes` (
  `code` varchar(32) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `user_data` text,
  KEY `Index 1` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `assessments`;
CREATE TABLE IF NOT EXISTS `assessments` (
  `assessment_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `assessment_name` varchar(100) NOT NULL DEFAULT '0',
  `assessment_date` date NOT NULL,
  `assessment_department` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`assessment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `assessments_results`;
CREATE TABLE IF NOT EXISTS `assessments_results` (
  `assessment_id` smallint(4) unsigned DEFAULT NULL,
  `skill_id` smallint(4) unsigned DEFAULT NULL,
  `employee_id` smallint(4) unsigned DEFAULT NULL,
  `level` tinyint(4) unsigned DEFAULT '0',
  `comment` varchar(300) DEFAULT NULL,
  UNIQUE KEY `Index 1` (`employee_id`,`skill_id`,`assessment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `attachments`;
CREATE TABLE IF NOT EXISTS `attachments` (
  `attachment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `object` int(10) unsigned DEFAULT '0',
  `type` varchar(30) DEFAULT '',
  `file` varchar(150) DEFAULT '',
  `location` varchar(150) DEFAULT '',
  `extenstion` varchar(5) DEFAULT '',
  `uploaded` datetime DEFAULT NULL,
  `mime` varchar(150) DEFAULT '',
  PRIMARY KEY (`attachment_id`),
  KEY `Index 2` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) DEFAULT NULL,
  `is_active` tinyint(3) unsigned DEFAULT '1',
  `parent_department` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `discipline`;
CREATE TABLE IF NOT EXISTS `discipline` (
  `record_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `employee_id` smallint(5) unsigned DEFAULT NULL,
  `headline` varchar(100) DEFAULT NULL,
  `description` text,
  `taken_actions` text,
  `comment` text,
  PRIMARY KEY (`record_id`),
  KEY `Index 2` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `avatar` varchar(100) DEFAULT 'images/no_avatar.jpg',
  `ssn` varchar(50) DEFAULT '',
  `birth_date` date DEFAULT NULL,
  `email` varchar(100) DEFAULT '',
  `gender` enum('male','female') DEFAULT 'male',
  `address` varchar(100) DEFAULT '',
  `city` varchar(100) DEFAULT '',
  `state` varchar(100) DEFAULT '',
  `zip_code` varchar(10) DEFAULT '',
  `phone` varchar(100) DEFAULT '',
  `cell_phone` varchar(100) DEFAULT '',
  `status` enum('Active','Resigned') DEFAULT 'Active',
  `contacts` text,
  PRIMARY KEY (`employee_id`),
  KEY `Index 2` (`name`,`ssn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `employees_education`;
CREATE TABLE IF NOT EXISTS `employees_education` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `is_verified` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `Index 2` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `employees_employment`;
CREATE TABLE IF NOT EXISTS `employees_employment` (
  `employment_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `responsibilities` text,
  `employee_id` smallint(8) unsigned DEFAULT NULL,
  `is_verified` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`employment_id`),
  KEY `Index 2` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `employees_family`;
CREATE TABLE IF NOT EXISTS `employees_family` (
  `relative_id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `relative_name` varchar(100) DEFAULT '0',
  `employee_id` smallint(5) unsigned DEFAULT NULL,
  `relative_type` enum('partner','child') DEFAULT NULL,
  `birht_date` date DEFAULT NULL,
  `is_verified` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`relative_id`),
  KEY `Index 2` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `employees_licenses`;
CREATE TABLE IF NOT EXISTS `employees_licenses` (
  `license_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `license_name` varchar(100) DEFAULT NULL,
  `license_number` varchar(100) DEFAULT NULL,
  `license_expiry` date DEFAULT NULL,
  `is_verified` tinyint(3) unsigned DEFAULT '1',
  `employee_id` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`license_id`),
  KEY `Index 1` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `employees_positions`;
CREATE TABLE IF NOT EXISTS `employees_positions` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` smallint(10) unsigned DEFAULT NULL,
  `position_id` smallint(10) unsigned DEFAULT NULL,
  `department_id` tinyint(3) unsigned DEFAULT NULL,
  `is_current` tinyint(3) unsigned DEFAULT '1',
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `add_responsibilities` text,
  `move_reason` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index 1` (`position_id`,`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `employees_resign`;
CREATE TABLE IF NOT EXISTS `employees_resign` (
  `resign_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` smallint(5) unsigned DEFAULT '0',
  `last_position` mediumint(5) unsigned DEFAULT '0',
  `date` date DEFAULT NULL,
  `reason` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`resign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `employees_skills`;
CREATE TABLE IF NOT EXISTS `employees_skills` (
  `skill_id` smallint(10) unsigned DEFAULT NULL,
  `employee_id` smallint(3) unsigned DEFAULT NULL,
  `to_delete` tinyint(3) unsigned DEFAULT '0',
  UNIQUE KEY `Index 2` (`employee_id`,`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `performance_appraisal`;
CREATE TABLE IF NOT EXISTS `performance_appraisal` (
  `appraisal_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` smallint(8) unsigned NOT NULL DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `expectations` text,
  `results` text,
  `is_completed` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`appraisal_id`),
  KEY `Index 2` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `performance_criteria`;
CREATE TABLE IF NOT EXISTS `performance_criteria` (
  `criterion_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `criterion_name` varchar(100) DEFAULT NULL,
  `is_active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`criterion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `performance_log`;
CREATE TABLE IF NOT EXISTS `performance_log` (
  `log_id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `appraisal_id` smallint(10) unsigned DEFAULT '0',
  `date` date DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`log_id`),
  KEY `Index 2` (`appraisal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `performance_log_criteria`;
CREATE TABLE IF NOT EXISTS `performance_log_criteria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `criteria_id` tinyint(8) unsigned NOT NULL DEFAULT '0',
  `criteria_result` tinyint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Index 2` (`criteria_id`,`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `position_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `position_name` varchar(100) DEFAULT NULL,
  `responsibilities` text,
  `is_active` tinyint(3) unsigned DEFAULT '1',
  `department_id` tinyint(3) unsigned DEFAULT NULL,
  `is_head` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`position_id`),
  KEY `Index 2` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `positions_skills`;
CREATE TABLE IF NOT EXISTS `positions_skills` (
  `position_id` smallint(6) unsigned DEFAULT NULL,
  `skill_id` smallint(6) unsigned DEFAULT NULL,
  UNIQUE KEY `Index 1` (`position_id`,`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `resign_reasons`;
CREATE TABLE IF NOT EXISTS `resign_reasons` (
  `reason_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `reason_name` varchar(100) DEFAULT NULL,
  `is_active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`reason_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(200) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `setting_key` varchar(50) DEFAULT NULL,
  `setting_value` text,
  `setting_group` varchar(20) DEFAULT NULL,
  `startup` tinyint(3) unsigned DEFAULT '0',
  KEY `Index 1` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('company_name', '', 'company', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('company_phone', '', 'company', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('company_email', '', 'company', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('company_address', '', 'company', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('company_city', '', 'company', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('company_zip', '', 'company', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('company_state', '', 'company', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('smtp_server', '', 'email', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('smtp_username', '', 'email', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('email_method', 'smtp', 'email', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('smtp_password', '', 'email', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('current_version', '1.0', 'system', 0);

INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('timeZoneId', '', 'timezone', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('gmtAdjustment', '', 'timezone', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('useDaylightTime', '', 'timezone', 0);
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`, `startup`) VALUES ('value', '', 'timezone', 0);



DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `skill_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(100) DEFAULT NULL,
  `skill_requirements` text,
  `parent_category` tinyint(3) unsigned DEFAULT NULL,
  `is_active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `skills_categories`;
CREATE TABLE IF NOT EXISTS `skills_categories` (
  `category_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `is_active` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `timeoff`;
CREATE TABLE IF NOT EXISTS `timeoff` (
  `record_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` smallint(5) unsigned DEFAULT '0',
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `type` enum('vacation','sick','holidays','other') DEFAULT NULL,
  `status` enum('request','approved','denied') DEFAULT NULL,
  `employee_comment` text,
  `comment` text,
  PRIMARY KEY (`record_id`),
  KEY `Index 2` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '',
  `user_password` varchar(500) DEFAULT '',
  `password_salt` varchar(20) DEFAULT '',
  `permissions` text,
  `is_active` tinyint(3) unsigned DEFAULT '1',
  `employee_id` smallint(5) unsigned DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `Index 2` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `vacancies`;
CREATE TABLE IF NOT EXISTS `vacancies` (
  `vacancy_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` smallint(5) unsigned DEFAULT '0',
  `description` text,
  `status` enum('Active','Filled','Canceled') DEFAULT 'Active',
  PRIMARY KEY (`vacancy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `vacancies_applicants`;
CREATE TABLE IF NOT EXISTS `vacancies_applicants` (
  `applicant_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `vacancy_id` smallint(8) unsigned DEFAULT '0',
  `applicant_name` varchar(100) DEFAULT '0',
  `applicant_email` varchar(100) DEFAULT '0',
  `applicant_phone` varchar(100) DEFAULT '0',
  `birth_date` date DEFAULT NULL,
  `advantages` text,
  `disadvantages` text,
  `status` enum('Active','Enrolled','Ignored') DEFAULT 'Active',
  `employee_id` smallint(5) unsigned DEFAULT NULL,
  `hired_at` date DEFAULT NULL,
  PRIMARY KEY (`applicant_id`),
  KEY `Index 2` (`vacancy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `events`(
    `event_id` int(10) unsigned NOT NULL  auto_increment , 
    `event_type` varchar(30) COLLATE utf8_general_ci NULL  DEFAULT '0' , 
    `event_source` int(10) unsigned NULL  DEFAULT 0 , 
    `recipient_id` smallint(5) unsigned NULL  DEFAULT 0 , 
    `busy_by` tinyint(3) unsigned NULL  DEFAULT 0 , 
    `has_error` tinyint(3) unsigned NULL  DEFAULT 0 , 
    PRIMARY KEY (`event_id`) 
) ENGINE=InnoDB DEFAULT CHARSET='utf8';
CREATE TABLE `mailbox`(
    `thread_id` mediumint(8) unsigned NOT NULL  auto_increment , 
    `subject` varchar(100) COLLATE utf8_general_ci NULL  DEFAULT '0' , 
    `author_id` smallint(8) unsigned NULL  DEFAULT 0 , 
    `last_message` datetime NULL  , 
    PRIMARY KEY (`thread_id`) 
) ENGINE=InnoDB DEFAULT CHARSET='utf8';
CREATE TABLE `mailbox_employees`(
    `thread_id` mediumint(10) unsigned NULL  , 
    `employee_id` smallint(5) unsigned NULL  , 
    `new_message` tinyint(3) unsigned NULL  DEFAULT 0 , 
    UNIQUE KEY `Index 1`(`thread_id`,`employee_id`) 
) ENGINE=InnoDB DEFAULT CHARSET='utf8';
CREATE TABLE `mailbox_messages`(
    `message_id` int(10) unsigned NOT NULL  auto_increment , 
    `thread_id` mediumint(8) unsigned NULL  DEFAULT 0 , 
    `message` text COLLATE utf8_general_ci NULL  , 
    `author_id` smallint(5) unsigned NULL  , 
    `date` datetime NULL  , 
    PRIMARY KEY (`message_id`) , 
    KEY `Index 2`(`thread_id`) 
) ENGINE=InnoDB DEFAULT CHARSET='utf8';
CREATE TABLE `processing_errors`(
    `error_id` smallint(5) unsigned NOT NULL  auto_increment , 
    `error_text` text COLLATE utf8_general_ci NULL  , 
    `error_date` datetime NULL  , 
    `error_type` varchar(50) COLLATE utf8_general_ci NULL  , 
    PRIMARY KEY (`error_id`) 
) ENGINE=InnoDB DEFAULT CHARSET='utf8';
CREATE TABLE `punch_clock`(
    `record_id` mediumint(8) unsigned NOT NULL  auto_increment , 
    `employee_id` smallint(5) unsigned NULL  DEFAULT 0 , 
    `start_time` datetime NULL  , 
    `end_time` datetime NULL  , 
    `comments` text COLLATE utf8_general_ci NULL  , 
    PRIMARY KEY (`record_id`) 
) ENGINE=InnoDB DEFAULT CHARSET='utf8';
UPDATE `settings` SET `setting_value`='1.1' WHERE `setting_key`='current_version';

create table `ems_module` (
  `mod_id` varchar(36) DEFAULT NULL,
  `parent_mod_id` varchar(36) not null default '',
  `name` varchar(45) default null,
  `owner` varchar(45) default null,
  `owner_email` varchar(100) default null,
  `version` varchar(36) default null,
  `description` text,
  `sequence` tinyint(3) not null,
  `isallow` tinyint(3) not null default 0,
  KEY `Index 1` (`mod_id`)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

INSERT INTO `ems_module` VALUES ('MOD001','M0D000','Employees','EMS','info@segimidae.net','VER001','Employees',1,1);
INSERT INTO `ems_module` VALUES ('MOD002','M0D000','Skills','EMS','info@segimidae.net','VER001','Skills',2,1);
INSERT INTO `ems_module` VALUES ('MOD003','M0D000','Performance','EMS','info@segimidae.net','VER001','Performance',3,1);
INSERT INTO `ems_module` VALUES ('MOD004','M0D000','Discipline', 'EMS', 'info@segimidae.net', 'VER001', 'Discipline',4,1);
INSERT INTO `ems_module` VALUES ('MOD005','M0D000','Leave tracking', 'EMS', 'info@segimidae.net', 'VER001', 'Leave tracking',5,1);
INSERT INTO `ems_module` VALUES ('MOD006','M0D000','Recruiting', 'EMS', 'info@segimidae.net', 'VER001', 'Recruiting',6,1);
INSERT INTO `ems_module` VALUES ('MOD007','M0D006','Vacancies', 'EMS', 'info@segimidae.net', 'VER001', 'Vacancies',7,1);
INSERT INTO `ems_module` VALUES ('MOD008','M0D006','Applicants', 'EMS', 'info@segimidae.net', 'VER001', 'Applicants',8,1);
INSERT INTO `ems_module` VALUES ('MOD009','M0D000','Reports', 'EMS', 'info@segimidae.net', 'VER001', 'Reports',9,1);
INSERT INTO `ems_module` VALUES ('MOD010','M0D009','Skills', 'EMS', 'info@segimidae.net', 'VER001', 'Skills',10,1);
INSERT INTO `ems_module` VALUES ('MOD011','M0D009','Punch clock', 'EMS', 'info@segimidae.net', 'VER001', 'Punch clock',11,1);
INSERT INTO `ems_module` VALUES ('MOD012','M0D000','Attendance tracking', 'EMS', 'info@segimidae.net', 'VER001', 'Attendance tracking',12,1);
INSERT INTO `ems_module` VALUES ('MOD013','M0D000','TImesheet tracking', 'EMS', 'info@segimidae.net', 'VER001', 'Timesheet tracking',13,1);
INSERT INTO `ems_module` VALUES ('MOD014','M0D000','Location tracking', 'EMS', 'info@segimidae.net', 'VER001', 'Location tracking',14,1);
INSERT INTO `ems_module` VALUES ('MOD015','M0D000','Setting', 'EMS', 'info@segimidae.net', 'VER001', 'Setting',15,1);
INSERT INTO `ems_module` VALUES ('MOD016','M0D015','Company', 'EMS', 'info@segimidae.net', 'VER001', 'Company',16,1);
INSERT INTO `ems_module` VALUES ('MOD017','M0D015','Email', 'EMS', 'info@segimidae.net', 'VER001', 'Email',17,1);
INSERT INTO `ems_module` VALUES ('MOD018','M0D015','Position', 'EMS', 'info@segimidae.net', 'VER001', 'Position',18,1);
INSERT INTO `ems_module` VALUES ('MOD019','M0D015','Resign reasons', 'EMS', 'info@segimidae.net', 'VER001', 'Resgn reasons',19,1);
INSERT INTO `ems_module` VALUES ('MOD020','M0D015','Departments', 'EMS', 'info@segimidae.net', 'VER001', 'Departments',20,1);
INSERT INTO `ems_module` VALUES ('MOD021','M0D015','Processing errors', 'EMS', 'info@segimidae.net', 'VER001', 'Processing errors',21,1);