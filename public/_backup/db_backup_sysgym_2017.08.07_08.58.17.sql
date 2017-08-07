SET FOREIGN_KEY_CHECKS=0;

-- System: SysGym
-- version 1.0
-- http://sysgym.com/
--
-- Host: 127.0.0.1
-- Generated by: Ailton Cabral Semedo Fortes
-- Generation Time: 2017-08-07 08:58:17

-- -------------------------------------------
-- Database `sysgym`
-- -------------------------------------------

-- -------------------------------------------
-- Table structure `branch_permission`
-- -------------------------------------------

DROP TABLE IF EXISTS `branch_permission`;
CREATE TABLE `branch_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned NOT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branch_permission_branch_id_index` (`branch_id`),
  KEY `branch_permission_tenant_id_index` (`tenant_id`),
  KEY `branch_permission_user_id_index` (`user_id`),
  CONSTRAINT `branch_permission_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `branch_permission_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  CONSTRAINT `branch_permission_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `branch_permission`
-- -------------------------------------------

INSERT INTO `branch_permission` (`id`,`branch_id`,`tenant_id`,`user_id`,`created_at`,`updated_at`) VALUES 
('2','1','1','1','2017-08-06 18:50:46','2017-08-06 18:50:46'),
('3','3','1','1','2017-08-06 18:50:46','2017-08-06 18:50:46');


-- -------------------------------------------
-- Table structure `branches`
-- -------------------------------------------

DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manager` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/round-logo.jpg',
  `latitude` decimal(8,2) DEFAULT NULL,
  `longitude` decimal(8,2) DEFAULT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `branches_email_unique` (`email`),
  KEY `branches_tenant_id_index` (`tenant_id`),
  KEY `branches_user_id_index` (`user_id`),
  CONSTRAINT `branches_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  CONSTRAINT `branches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `branches`
-- -------------------------------------------

INSERT INTO `branches` (`id`,`name`,`manager`,`address`,`email`,`city`,`phone`,`fax`,`status`,`avatar`,`latitude`,`longitude`,`tenant_id`,`user_id`,`created_at`,`updated_at`) VALUES 
('1','LET GO','Flameu Fortes','Palmarejo Grande','ailtonsemedo.2006@gmail.com','Praia','2235623','','1','img/round-logo.jpg','','','1','1','2017-08-06 15:43:16','2017-08-06 15:43:16'),
('3','Kagym Varzea','Joana Coelho','Varzea','Kagym@gmail.com','Praia','2232561','2265321','1','uploads/1502047453.png','','','1','1','2017-08-06 18:24:13','2017-08-06 18:51:04');


-- -------------------------------------------
-- Table structure `clients`
-- -------------------------------------------

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nif` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `civil_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `parents` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` int(11) NOT NULL DEFAULT '0',
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/avatar.png',
  `status` int(11) NOT NULL DEFAULT '1',
  `bar_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_email_unique` (`email`),
  KEY `clients_user_id_index` (`user_id`),
  KEY `clients_branch_id_index` (`branch_id`),
  KEY `clients_tenant_id_index` (`tenant_id`),
  CONSTRAINT `clients_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `clients_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `clients`
-- -------------------------------------------

INSERT INTO `clients` (`id`,`name`,`email`,`bi`,`nif`,`civil_state`,`genre`,`birthday`,`parents`,`nationality`,`address`,`city`,`phone`,`mobile`,`profession`,`work_phone`,`work_address`,`zip_code`,`website`,`facebook`,`note`,`avatar`,`status`,`bar_code`,`user_id`,`branch_id`,`tenant_id`,`created_at`,`updated_at`) VALUES 
('2','Ailton Cabral Semedo Fortes','ailtonsemedo.2006@gmail.com','','','single','male','1995-01-08','Ailton Cabral Semedo Fortes','Cabo Verde','Palmarejo Grande','Praia','9837724','9837724','','','','7602','Palmarejo Grande','','','uploads/1502097858.png','1','','1','1','1','2017-08-06 17:11:23','2017-08-07 08:24:18');


-- -------------------------------------------
-- Table structure `domains`
-- -------------------------------------------

DROP TABLE IF EXISTS `domains`;
CREATE TABLE `domains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dominio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `significado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `domains`
-- -------------------------------------------



-- -------------------------------------------
-- Table structure `employees`
-- -------------------------------------------

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nif` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `civil_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `parents` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/avatar.png',
  `start_work` date NOT NULL,
  `end_work` date DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `salary` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`),
  KEY `employees_user_id_index` (`user_id`),
  KEY `employees_category_id_index` (`category_id`),
  KEY `employees_branch_id_index` (`branch_id`),
  KEY `employees_tenant_id_index` (`tenant_id`),
  CONSTRAINT `employees_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `employees_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `employees_category` (`id`),
  CONSTRAINT `employees_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `employees`
-- -------------------------------------------

INSERT INTO `employees` (`id`,`name`,`email`,`bi`,`nif`,`civil_state`,`genre`,`birthday`,`parents`,`nationality`,`address`,`city`,`phone`,`mobile`,`zip_code`,`website`,`facebook`,`avatar`,`start_work`,`end_work`,`note`,`salary`,`status`,`created_at`,`updated_at`,`user_id`,`category_id`,`branch_id`,`tenant_id`) VALUES 
('1','Helena Patricia Teixeira Rodrigues','ailtonsemedo.2006@gmail.com','','','single','female','1996-03-24','Ailton Cabral Semedo Fortes','Cabo Verde','Palmarejo Grande','Praia','9837724','9837724','7602','Palmarejo Grande','','uploads/1502085131.png','2017-08-07','2018-08-07','Nice','12000','1','2017-08-07 04:25:37','2017-08-07 04:52:11','1','1','1','1');


-- -------------------------------------------
-- Table structure `employees_category`
-- -------------------------------------------

DROP TABLE IF EXISTS `employees_category`;
CREATE TABLE `employees_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salary_base` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_id` int(10) unsigned NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employees_category_user_id_index` (`user_id`),
  KEY `employees_category_branch_id_index` (`branch_id`),
  KEY `employees_category_tenant_id_index` (`tenant_id`),
  CONSTRAINT `employees_category_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `employees_category_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  CONSTRAINT `employees_category_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `employees_category`
-- -------------------------------------------

INSERT INTO `employees_category` (`id`,`name`,`salary_base`,`status`,`user_id`,`branch_id`,`tenant_id`,`created_at`,`updated_at`) VALUES 
('1','Secretaria','12000','1','1','1','1','2017-08-07 03:42:20','2017-08-07 03:59:23'),
('2','Personal Trainner','20000','1','1','1','1','2017-08-07 03:51:29','2017-08-07 03:51:29');


-- -------------------------------------------
-- Table structure `files`
-- -------------------------------------------

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_original` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_path` text COLLATE utf8_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `media_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `flag` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_user_id_foreign` (`user_id`),
  CONSTRAINT `files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `files`
-- -------------------------------------------



-- -------------------------------------------
-- Table structure `matriculation`
-- -------------------------------------------

DROP TABLE IF EXISTS `matriculation`;
CREATE TABLE `matriculation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `modality_id` int(10) unsigned NOT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `matriculation_modality_id_index` (`modality_id`),
  KEY `matriculation_tenant_id_index` (`tenant_id`),
  KEY `matriculation_branch_id_index` (`branch_id`),
  KEY `matriculation_client_id_index` (`client_id`),
  KEY `matriculation_user_id_index` (`user_id`),
  CONSTRAINT `matriculation_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `matriculation_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `matriculation_modality_id_foreign` FOREIGN KEY (`modality_id`) REFERENCES `modalities` (`id`),
  CONSTRAINT `matriculation_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  CONSTRAINT `matriculation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `matriculation`
-- -------------------------------------------



-- -------------------------------------------
-- Table structure `menus`
-- -------------------------------------------

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `level` tinyint(4) DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `menus`
-- -------------------------------------------

INSERT INTO `menus` (`id`,`parent_id`,`title`,`url`,`menu_order`,`status`,`level`,`icon`,`description`,`created_at`,`updated_at`) VALUES 
('1','0','home','home','1','1','','fa fa-home','','2017-08-06 01:32:18','2017-08-06 01:32:18'),
('2','0','dashboard','dashboard','2','1','','fa fa-dashboard','','2017-08-06 01:32:18','2017-08-06 01:32:18'),
('3','0','clients','clients','3','1','','fa fa-users','','2017-08-06 01:32:18','2017-08-06 15:02:41'),
('4','0','payments','payments','4','1','','fa fa-money','','2017-08-06 01:32:18','2017-08-06 01:32:18'),
('11','0','settings','#','7','1','','fa fa-gear','','2017-08-06 01:32:18','2017-08-06 01:32:18'),
('17','11','users','users','1','1','','fa fa-user','','2017-08-06 01:32:19','2017-08-06 15:03:05'),
('18','11','menus','menus','2','1','','','','2017-08-06 01:32:19','2017-08-06 01:32:19'),
('19','11','domains','domains','5','1','','','','2017-08-06 01:32:19','2017-08-06 01:32:19'),
('20','11','roles','roles','3','1','','','','2017-08-06 01:32:19','2017-08-06 01:32:19'),
('21','11','company','company','0','1','','','','2017-08-06 01:32:19','2017-08-06 05:35:22'),
('22','11','permissions','permissions','4','1','','','','2017-08-06 01:32:19','2017-08-06 01:32:19'),
('23','11','branches','branches','1','1','','','Branches Menu','2017-08-06 05:34:54','2017-08-06 05:39:19'),
('24','11','system','system','7','1','','','','2017-08-06 14:48:56','2017-08-06 14:48:56'),
('25','0','matriculation','matriculation','4','1','','fa fa-cube','Matriculation','2017-08-06 14:51:10','2017-08-06 15:01:17'),
('26','0','modalities','modalities','5','1','','fa fa-gamepad','','2017-08-06 14:53:15','2017-08-06 15:00:52'),
('27','11','backup','backups','7','1','','fa fa-database','Backup','2017-08-06 16:59:48','2017-08-06 16:59:48');


-- -------------------------------------------
-- Table structure `migrations`
-- -------------------------------------------

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `migrations`
-- -------------------------------------------

INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES 
('1','2014_10_12_000000_create_users_table','1'),
('2','2014_10_12_100000_create_password_resets_table','1'),
('3','2016_03_05_200113_create_dominios_table','1'),
('4','2016_09_21_234354_create_file_table','1'),
('5','2016_10_13_201014_create_tenants_table','1'),
('6','2016_10_13_204360_create_branch_table','1'),
('8','2016_10_15_082121_create_system_log_table','1'),
('9','2016_12_28_171640_create_schedules_table','1'),
('10','2017_01_30_233705_create_table_menu','1'),
('11','2017_04_03_221748_create_table_menu_tenant','1'),
('12','2017_04_04_145926_change_tanant_to_users_table','1'),
('13','2017_04_04_185302_create_roles_permissions_tables','1'),
('14','2017_04_05_145459_create_client_table','1'),
('16','2017_04_08_032156_create_table_matriculation','1'),
('17','2017_04_30_133640_create_payments_table','1'),
('18','2017_10_12_000000_create_table_system','1'),
('19','2017_10_14_115234_create_branch_permission_table','2'),
('20','2017_04_07_181557_create_modality_table','3'),
('22','2016_10_14_020424_create_table_employees','4');


-- -------------------------------------------
-- Table structure `modalities`
-- -------------------------------------------

DROP TABLE IF EXISTS `modalities`;
CREATE TABLE `modalities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/clinic/doctor_icon.png',
  `user_id` int(10) unsigned NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modalities_user_id_index` (`user_id`),
  KEY `modalities_branch_id_index` (`branch_id`),
  KEY `modalities_tenant_id_index` (`tenant_id`),
  CONSTRAINT `modalities_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `modalities_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  CONSTRAINT `modalities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `modalities`
-- -------------------------------------------

INSERT INTO `modalities` (`id`,`name`,`price`,`status`,`avatar`,`user_id`,`branch_id`,`tenant_id`,`created_at`,`updated_at`) VALUES 
('1','Musculação','2000','1','uploads/1502065936.png','1','1','1','2017-08-06 17:59:58','2017-08-06 23:32:16');


-- -------------------------------------------
-- Table structure `password_resets`
-- -------------------------------------------

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `password_resets`
-- -------------------------------------------



-- -------------------------------------------
-- Table structure `payments`
-- -------------------------------------------

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` double NOT NULL DEFAULT '0',
  `value_pay` double NOT NULL DEFAULT '0',
  `note` longtext COLLATE utf8_unicode_ci,
  `client_id` int(10) unsigned NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `month_id` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL DEFAULT '0',
  `item_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_client_id_index` (`client_id`),
  KEY `payments_branch_id_index` (`branch_id`),
  KEY `payments_user_id_index` (`user_id`),
  KEY `payments_tenant_id_index` (`tenant_id`),
  CONSTRAINT `payments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `payments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `payments`
-- -------------------------------------------



-- -------------------------------------------
-- Table structure `permissions`
-- -------------------------------------------

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `tenant_menu_id` int(10) unsigned NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_role_id_index` (`role_id`),
  KEY `permissions_tenant_menu_id_index` (`tenant_menu_id`),
  CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `permissions_tenant_menu_id_foreign` FOREIGN KEY (`tenant_menu_id`) REFERENCES `tenant_menu` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `permissions`
-- -------------------------------------------

INSERT INTO `permissions` (`id`,`type`,`role_id`,`tenant_menu_id`,`active`,`created_at`,`updated_at`) VALUES 
('1','MENU','1','1','1','2017-08-06 03:09:08','2017-08-06 03:09:08'),
('2','MENU','1','2','1','2017-08-06 03:09:08','2017-08-06 03:09:08'),
('3','MENU','1','3','1','2017-08-06 03:09:08','2017-08-06 03:09:08'),
('4','MENU','1','4','1','2017-08-06 03:09:09','2017-08-06 03:09:09'),
('5','MENU','1','5','1','2017-08-06 03:09:09','2017-08-06 03:09:09'),
('6','MENU','1','6','1','2017-08-06 03:09:09','2017-08-06 03:09:09'),
('7','MENU','1','7','1','2017-08-06 03:09:09','2017-08-06 03:09:09'),
('8','MENU','1','8','1','2017-08-06 03:09:09','2017-08-06 03:09:09'),
('9','MENU','1','9','1','2017-08-06 03:09:09','2017-08-06 03:09:09'),
('10','MENU','1','10','1','2017-08-06 03:09:09','2017-08-06 03:09:09'),
('11','MENU','1','11','1','2017-08-06 03:09:09','2017-08-06 03:09:09'),
('12','MENU','1','12','1','',''),
('13','MENU','1','13','1','',''),
('14','MENU','1','14','1','',''),
('15','MENU','1','15','1','',''),
('16','MENU','1','16','1','','');


-- -------------------------------------------
-- Table structure `role_user`
-- -------------------------------------------

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `role_user_user_id_index` (`user_id`),
  KEY `role_user_role_id_index` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `role_user`
-- -------------------------------------------



-- -------------------------------------------
-- Table structure `roles`
-- -------------------------------------------

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `roles`
-- -------------------------------------------

INSERT INTO `roles` (`id`,`name`,`display_name`,`description`,`tenant_id`,`created_at`,`updated_at`) VALUES 
('1','admin','Administrador','Administrador','1','2017-08-06 03:07:20','2017-08-06 03:07:20');


-- -------------------------------------------
-- Table structure `schedules`
-- -------------------------------------------

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE `schedules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `week_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `user_id` int(10) unsigned NOT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedules_user_id_index` (`user_id`),
  KEY `schedules_tenant_id_index` (`tenant_id`),
  CONSTRAINT `schedules_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`),
  CONSTRAINT `schedules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `schedules`
-- -------------------------------------------

INSERT INTO `schedules` (`id`,`week_day`,`start_time`,`end_time`,`flag`,`item_id`,`status`,`user_id`,`tenant_id`,`created_at`,`updated_at`) VALUES 
('1','monday','08:00:00','12:00:00','1','1','1','1','1','2017-08-06 15:58:08','2017-08-06 15:58:08'),
('2','monday','08:00:00','12:00:00','2','1','1','1','1','2017-08-06 17:49:12','2017-08-06 17:49:12'),
('3','thursday','10:00:00','15:00:00','2','1','1','1','1','2017-08-06 17:59:59','2017-08-06 17:59:59');


-- -------------------------------------------
-- Table structure `system`
-- -------------------------------------------

DROP TABLE IF EXISTS `system`;
CREATE TABLE `system` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `layout` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `background_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/background.jpg',
  `timezone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Atlantic/Cape_Verde',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `branch_id` int(10) unsigned NOT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_branch_id_index` (`branch_id`),
  KEY `system_tenant_id_index` (`tenant_id`),
  CONSTRAINT `system_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `system_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `system`
-- -------------------------------------------

INSERT INTO `system` (`id`,`name`,`theme`,`lang`,`currency`,`layout`,`background_image`,`timezone`,`status`,`branch_id`,`tenant_id`,`created_at`,`updated_at`) VALUES 
('1','SysGym','skin-blue','en','CVE','fixed','uploads/1502041793.png','Atlantic/Cape_Verde','1','1','1','2017-08-06 18:24:13','2017-08-06 16:49:53'),
('2','SysGym','skin-blue','en','CVE','fixed','img/background.jpg','Atlantic/Cape_Verde','1','3','1','2017-08-06 18:24:13','2017-08-06 18:24:13');


-- -------------------------------------------
-- Table structure `system_log`
-- -------------------------------------------

DROP TABLE IF EXISTS `system_log`;
CREATE TABLE `system_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_log_user_id_index` (`user_id`),
  CONSTRAINT `system_log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `system_log`
-- -------------------------------------------



-- -------------------------------------------
-- Table structure `tenant_menu`
-- -------------------------------------------

DROP TABLE IF EXISTS `tenant_menu`;
CREATE TABLE `tenant_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `tenant_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tenant_menu_menu_id_index` (`menu_id`),
  KEY `tenant_menu_tenant_id_index` (`tenant_id`),
  CONSTRAINT `tenant_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  CONSTRAINT `tenant_menu_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `tenant_menu`
-- -------------------------------------------

INSERT INTO `tenant_menu` (`id`,`menu_id`,`tenant_id`,`created_at`,`updated_at`) VALUES 
('1','1','1','2017-08-06 03:09:07','2017-08-06 03:09:07'),
('2','2','1','2017-08-06 03:09:07','2017-08-06 03:09:07'),
('3','3','1','2017-08-06 03:09:07','2017-08-06 03:09:07'),
('4','4','1','2017-08-06 03:09:08','2017-08-06 03:09:08'),
('5','11','1','2017-08-06 03:09:08','2017-08-06 03:09:08'),
('6','17','1','2017-08-06 03:09:08','2017-08-06 03:09:08'),
('7','18','1','2017-08-06 03:09:08','2017-08-06 03:09:08'),
('8','19','1','2017-08-06 03:09:08','2017-08-06 03:09:08'),
('9','20','1','2017-08-06 03:09:08','2017-08-06 03:09:08'),
('10','21','1','2017-08-06 03:09:08','2017-08-06 03:09:08'),
('11','22','1','2017-08-06 03:09:08','2017-08-06 03:09:08'),
('12','23','1','',''),
('13','24','1','',''),
('14','25','1','',''),
('15','26','1','',''),
('16','27','1','','');


-- -------------------------------------------
-- Table structure `tenants`
-- -------------------------------------------

DROP TABLE IF EXISTS `tenants`;
CREATE TABLE `tenants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `subdomain_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `address_1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/round-logo.jpg',
  `nif` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` decimal(8,2) DEFAULT NULL,
  `longitude` decimal(8,2) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tenants_company_name_unique` (`company_name`),
  UNIQUE KEY `tenants_subdomain_name_unique` (`subdomain_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `tenants`
-- -------------------------------------------

INSERT INTO `tenants` (`id`,`company_name`,`subdomain_name`,`address_1`,`address_2`,`country`,`country_code`,`state`,`state_code`,`phone`,`fax`,`logo`,`nif`,`city`,`zip_code`,`facebook`,`latitude`,`longitude`,`active`,`deleted_at`,`created_at`,`updated_at`,`website`) VALUES 
('1','SYSGYM COMPANY LDA','SISGYM MCSolution','Palmarejo Grande','','Cape Verde','CV','Santiago','','2302563','','img/round-logo.jpg','23562345','Praia','7602','MCSOlution','15.12','-23.61','1','','2017-08-06 03:07:20','2017-08-07 00:25:44','');


-- -------------------------------------------
-- Table structure `users`
-- -------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/avatar.png',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_button` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sign_out',
  `branch_default_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `token` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tenant_id` int(10) unsigned NOT NULL DEFAULT '0',
  `role_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_index` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -------------------------------------------
-- Extracting data from table `users`
-- -------------------------------------------

INSERT INTO `users` (`id`,`name`,`email`,`password`,`avatar`,`username`,`action_button`,`branch_default_id`,`status`,`branch_id`,`token`,`remember_token`,`created_at`,`updated_at`,`tenant_id`,`role_id`) VALUES 
('1','Ailton Cabral Semedo Fortes','ailtonsemedo.2006@gmail.com','$2y$10$4a56G6BH9el4BvQ665jv5.wzLMQ9eSGi61D8b2iNaJ8Wo4f0Mo2ES','uploads/1502046827.png','','sign_out','3','1','1','','oR8mhXqshPkt8NTZrP90Ls4lw0Z8wgWcjf6H8gaPpiN4X3JHjQSqTgr1aLHb','2017-08-06 03:07:20','2017-08-07 06:42:43','1','1');

