CREATE TABLE IF NOT EXISTS nal.`work` (
	`id` BIGINT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `work_name` VARCHAR(255) NOT NULL,
    `start_date` DATETIME NOT NULL,
    `end_date` DATETIME DEFAULT NULL,
    `status` TINYINT(2) NOT NULL DEFAULT '0',
    `createt_time` DATETIME,
	`update_time` DATETIME
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_unicode_ci;