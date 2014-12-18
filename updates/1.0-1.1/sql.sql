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