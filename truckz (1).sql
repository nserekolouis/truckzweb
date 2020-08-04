-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `agents`;
CREATE TABLE `agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `profile_picture` text NOT NULL,
  `identification_type` int(1) NOT NULL,
  `identification_number` text NOT NULL,
  `pin` int(5) DEFAULT NULL,
  `active` int(1) NOT NULL,
  `assigned` int(1) NOT NULL DEFAULT '0',
  `token` text,
  `change_pin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `agents` (`id`, `first_name`, `second_name`, `email`, `phonenumber`, `profile_picture`, `identification_type`, `identification_number`, `pin`, `active`, `assigned`, `token`, `change_pin`) VALUES
(13,	'Louis',	'Nsereko',	'louisnsereko7@gmail.com',	'+256773294701',	'b06977143e24a7eb7e4aa3aa76f85e84.jpeg',	1,	'123456789',	44444,	1,	0,	'fG2y-Xj041c:APA91bG3PkpRuGT61oRD-Zh1RWCE9K9CpupCw5ufRgXx0wUJ1w_ZEJvxMGeNwOTVG_kiQhJeaARy_a8DWPFkGAiiqFNhYheIPoxONaOZkhRqBsAU4vG85D6S87ATYm5cm3u0TiuvA47k',	1),
(14,	'Tuka',	'Marvin',	'tukamarvin@gmail.com',	'+256567784123',	'21e17af9bb024f09e49b3e3d13817b61.jpg',	1,	'1254789',	59114,	1,	0,	'',	0),
(15,	'Kyambade',	'Micheal',	'kyabandemicheal@gmail.com',	'+256677841236',	'4633ddf65cb73856ecd0b014a0ee9f55.jpg',	1,	'4569872',	18264,	1,	0,	'',	0),
(16,	'Mugerwa',	'Elvis',	'mugerwaelvis@gmail.com',	'+256775123478',	'f14263e63f048016cd0b72e7953e1b51.jpg',	2,	'784526',	19051,	0,	0,	'',	0),
(17,	'Tamale',	'Edmund',	'tamaleedmund@gmail.com',	'+256778369852',	'c3f143d652d35ad99b32c741739523b6.jpg',	2,	'789456',	12389,	1,	0,	'',	0),
(18,	'Ahamya',	'Sandra',	'ahamya41@gmail.com',	'+256773294701',	'645fa60ce5db9d92f75bd240d34799d2.jpg',	1,	'1234567890',	84733,	1,	0,	NULL,	0),
(19,	'Edie',	'Atha',	'edieatha@gmail.com',	'+256701102739',	'467839af2aeaa5966ea26e4f9c3065fa.jpeg',	3,	'CM012345679',	87874,	0,	0,	'dhpLWe1DXWs:APA91bF5UZrIWsfVROH7FuAC_HaTjy71Y9uPRm9FoH8N4PRl9VezpPmrcVgHdB64BOd9SAyiS3hIdN8iX8_gnsomcXdOWc3bKVGB9EsI7y319VavqubgFQPxquY-nnT1ORLuQGWQynXr',	1),
(20,	'Kaggwa',	'Martin',	'kagwamartin@gmail.com',	'+256773294701',	'5ef724254ae88.png',	1,	'123456',	33652,	0,	0,	NULL,	0),
(21,	'Kaggwa',	'Martin',	'kagwamartin@gmail.com',	'+256773294701',	'5ef725987d2da.png',	1,	'123456',	76079,	0,	0,	NULL,	0),
(22,	'Kaggwa',	'Martin',	'kagwamartin@gmail.com',	'+256773294701',	'5ef725c85c321.png',	1,	'123456',	74348,	0,	0,	NULL,	0),
(23,	'Kaggwa',	'Martin',	'kagwamartin@gmail.com',	'+256773294701',	'5ef725ec34b89.png',	1,	'123456',	53947,	0,	0,	NULL,	0),
(24,	'Lucas',	'Graham',	'lucasgraham@gmail.com',	'+256773294701',	'5ef84153ac998.png',	1,	'123',	68969,	0,	0,	NULL,	0),
(25,	'Kaggwa',	'Martin',	'kagwamartin@gmail.com',	'+256773294701',	'5ef845c3af5fd.png',	1,	'123456',	54533,	0,	0,	NULL,	0),
(26,	'Kaggwa',	'Martin',	'kagwamartin@gmail.com',	'+256773294701',	'5ef849209b93f.png',	1,	'123456',	NULL,	0,	0,	NULL,	0),
(27,	'Kaggwa',	'Martin',	'kagwamartin@gmail.com',	'+256773294702',	'5ef84ae292a28.png',	1,	'123456',	NULL,	0,	0,	NULL,	0),
(28,	'Ann',	'S',	'annes@gmail.com',	'+256773294703',	'5ef855353e940.png',	1,	'123456789',	44444,	1,	0,	'',	1),
(29,	'Moses ',	'Muhumuza',	'mmugim@gmail.com',	'+256701332108',	'5efccec8138d9.png',	3,	'N4367778888',	7719,	1,	0,	'',	1);

DROP TABLE IF EXISTS `agent_notifications`;
CREATE TABLE `agent_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agents` int(11) NOT NULL,
  `truck_owners` int(11) DEFAULT NULL,
  `trucks` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agents` (`agents`),
  KEY `truck_owners` (`truck_owners`),
  KEY `trucks` (`trucks`),
  CONSTRAINT `agent_notifications_ibfk_1` FOREIGN KEY (`agents`) REFERENCES `agents` (`id`),
  CONSTRAINT `agent_notifications_ibfk_2` FOREIGN KEY (`truck_owners`) REFERENCES `truck_owners` (`id`),
  CONSTRAINT `agent_notifications_ibfk_3` FOREIGN KEY (`trucks`) REFERENCES `trucks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `agent_notifications` (`id`, `agents`, `truck_owners`, `trucks`) VALUES
(31,	13,	85,	NULL);

DROP TABLE IF EXISTS `available_capacities`;
CREATE TABLE `available_capacities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `truck_categories` int(11) NOT NULL,
  `capacity` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `truck_categories` (`truck_categories`),
  CONSTRAINT `available_capacities_ibfk_1` FOREIGN KEY (`truck_categories`) REFERENCES `truck_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `capacity_type`;
CREATE TABLE `capacity_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `capacity_type` (`id`, `type`) VALUES
(1,	'CC'),
(2,	'Kg'),
(3,	'T');

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `phonenumber` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `avata` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `secondname` varchar(200) NOT NULL,
  `fcm_token` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `clients` (`id`, `phonenumber`, `code`, `password`, `avata`, `email`, `username`, `firstname`, `secondname`, `fcm_token`) VALUES
(23,	'+256773294701',	'9098',	'password',	'5ed0b455983be.png',	'',	'nserekolouis',	'Nsereko',	'Louis',	'fzCNJCGWZ_4:APA91bFyda8koXWoQjzATZiuhaJdtQYUzcRNPd1b2d_dLoWqJLTYYyN3YLzC8ft0k98FyPkMZEsFYPNE5bnRbSqqUscMN0QR7FqS1PQt93vZN7jJepKZG_973g12HavB5195QwLTtdgL'),
(24,	'+256701332108',	'7774',	'password',	'5e70fbded3e1f.png',	'',	'MosesM',	'Moses',	'Muhumuza',	'ch0ZVrMmzc0:APA91bEJ0Gv57bhwXDckSKXdeS0dBzT0iIhTyyy_smFBt4CRMvKOE--0i3D5Wg5Q7ikbdkqcPM2tj4ibPMHotgDWqxnG975NfssjtaJ4tZOOSPf5InKghc3KznCEOT53qziFEiip10TU'),
(25,	'+256779776956',	'3724',	'',	'5d0d069508e1e.png',	'',	'eli',	'',	'',	'f3VQ5Y9HUEY:APA91bHb6EZT2hIzAfN-Fn7G5nwwrpZvga8nrhaCO1uXZNCCtXgb6Vmeh1_fTrsCNKefFM6UtxktonpYz8xRz9K9Ro4Agz12Gpi0bklG4KbhC1wdIESS5TWzYEJLIWPiVi4_u20bf6ZX'),
(32,	'+256706096087',	'8773',	'',	'5dff1b4c4335b.png',	'',	'terry',	'',	'',	'cO6k5k3OFBc:APA91bGavOfuuCNOLYkT6xqFSO7i_DFaPUNyIvRRzlqmRE7duR3oVt8TCgH4NZ2JIgC-P6RlTBM3Y-wVEFXVaz-H9tIGhqVmAYyZdTijDbNzeFWh4HxzA_dsy1wrkoYEiNYH96seAPDd'),
(33,	'+256788190972',	'6094',	'',	'5e189bcc55ab3.png',	'',	'Edie',	'',	'',	'fgKi8YVon64:APA91bF1yWKPfKjeMe3zTf4NgFy2uNRm2tzqiQRKluD4_m1KRg2m_VNHb0_U06RD_By3NU0qZ8rlJfX9pg2F94k4Z8QZ5KRE52zTweNZQYaLDumzmOGEeMYwLe25r6_WOd0lCnjeKzP-'),
(36,	'+256701102739',	'7406',	'',	'5e70d8c917b75.png',	'',	'Edie ',	'',	'',	'dYPEEAy-Ryw:APA91bHz-2jhIksEIPS4Ngfgyw5FXrJGh3pihAdhA6pAGfc8WuPJSyicXTk8HgYUXLSiettJQFeWH7kCXHzKVUvCZ7gvKZwaH1Rm-qp0zCOMisrw70krA-R7FHS6MKPKfpadgEjmaaPf'),
(37,	'+25670102739',	'3287',	'',	'',	'',	'',	'',	'',	'dYPEEAy-Ryw:APA91bHz-2jhIksEIPS4Ngfgyw5FXrJGh3pihAdhA6pAGfc8WuPJSyicXTk8HgYUXLSiettJQFeWH7kCXHzKVUvCZ7gvKZwaH1Rm-qp0zCOMisrw70krA-R7FHS6MKPKfpadgEjmaaPf'),
(38,	'+256773294702',	'3546',	'',	'',	'',	'nserekolouis1',	'Nsereko',	'Louis',	''),
(39,	'+256773294703',	'2182',	'',	'',	'',	'nserekolouis3',	'N',	'L',	''),
(40,	'+256773294704',	'1467',	'password',	'5ede95289d250.png',	'',	'nserekolouis4',	'N',	'L',	'faR4ghg2eD0:APA91bF5kSjy2Ig2zvH3I92wV6DeggGumZuvyA3APpQFCtaH-vIRSMTnVihJFkMlG8BjV8cNB64N_Cmw7I67BKFV-EZKKt9Uuy9mVxGNlvUSS7CKmoYNh5Va_pK_qYhc7vgdzwCcfl8Q'),
(41,	'+256773294705',	'8031',	'password',	'5ede95ee8386f.png',	'',	'nserekolouis5',	'N',	'L',	'f6bFFSueRns:APA91bFMNXGfMtxvJYq_9Qcm1oapFx7ZFGK5kmokAxwfP7Dcs-nvSQcCDC1tFA0wlM2JGDUpE7N9s3NSIuZi-d1wsT5-ineYEBxWQebRU8C6qyf16WC6Ln1dSN0gYFnrKej21oKmqG-L');

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE `drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `driver_email` varchar(200) NOT NULL,
  `driver_ssn` varchar(100) NOT NULL,
  `permit_id` varchar(100) NOT NULL,
  `truck_owners` int(11) NOT NULL,
  `driver_image` text NOT NULL,
  `trucks` int(11) DEFAULT NULL,
  `code` int(4) NOT NULL,
  `token` text NOT NULL,
  `admin_verification` int(1) NOT NULL DEFAULT '0',
  `offline_status` int(1) NOT NULL DEFAULT '0',
  `job_status` int(1) NOT NULL DEFAULT '0',
  `change_code` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `truck_owners` (`truck_owners`),
  KEY `trucks` (`trucks`),
  CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`truck_owners`) REFERENCES `truck_owners` (`id`),
  CONSTRAINT `drivers_ibfk_2` FOREIGN KEY (`trucks`) REFERENCES `trucks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `drivers` (`id`, `first_name`, `second_name`, `phonenumber`, `driver_email`, `driver_ssn`, `permit_id`, `truck_owners`, `driver_image`, `trucks`, `code`, `token`, `admin_verification`, `offline_status`, `job_status`, `change_code`) VALUES
(65,	'Lutalo',	'David',	'+256706096087',	'davidlutalo@gmail.com',	'123',	'123',	85,	'5ef1a576dbd1e.png',	NULL,	9999,	'fGQoBDYuxdk:APA91bF6TXEzYLcA7-dEv4_xwXOjJ18G3g_w4vEXhcYhyZnVtlY-_Cz-8qevFLN2lfIkyTPyuoXN0VyaWaC_93oWRSm-T5b1c4isUxtFMxRXpcUF_t1zgkZQD2Z3Hh7gxsqEguARvO05',	1,	0,	0,	1);

DROP TABLE IF EXISTS `driver_location`;
CREATE TABLE `driver_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_id` (`driver_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `driver_location_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  CONSTRAINT `driver_location_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `driver_location` (`id`, `driver_id`, `order_id`, `lat`, `lng`, `datetime`) VALUES
(902,	65,	NULL,	'0.3520263',	'32.5910922',	'2020-06-23 10:51:41'),
(903,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 10:51:45'),
(904,	65,	NULL,	'0.3520272',	'32.5910919',	'2020-06-23 10:52:07'),
(905,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 10:52:23'),
(906,	65,	NULL,	'0.3520261',	'32.5910914',	'2020-06-23 10:52:45'),
(907,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 10:52:56'),
(908,	65,	NULL,	'0.3520262',	'32.5910921',	'2020-06-23 10:53:17'),
(909,	65,	NULL,	'0.3520259',	'32.591092',	'2020-06-23 10:53:38'),
(910,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 10:53:58'),
(911,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 10:54:20'),
(912,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 10:54:42'),
(913,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 10:55:01'),
(914,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 10:55:27'),
(915,	65,	NULL,	'0.352023',	'32.5910927',	'2020-06-23 10:55:48'),
(916,	65,	NULL,	'0.3520236',	'32.5910929',	'2020-06-23 10:56:09'),
(917,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 10:56:29'),
(918,	65,	NULL,	'0.352023',	'32.5910927',	'2020-06-23 10:56:50'),
(919,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 10:57:12'),
(920,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 10:57:32'),
(921,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 10:57:53'),
(922,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 10:58:15'),
(923,	65,	NULL,	'0.3520226',	'32.5910922',	'2020-06-23 10:58:35'),
(924,	65,	NULL,	'0.3520236',	'32.5910929',	'2020-06-23 10:58:56'),
(925,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 10:59:18'),
(926,	65,	NULL,	'0.3520226',	'32.5910922',	'2020-06-23 10:59:38'),
(927,	65,	NULL,	'0.3520226',	'32.5910922',	'2020-06-23 10:59:59'),
(928,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:00:20'),
(929,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 11:00:40'),
(930,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:01:02'),
(931,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:01:23'),
(932,	65,	NULL,	'0.3520253',	'32.5910929',	'2020-06-23 11:01:43'),
(933,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 11:02:05'),
(934,	65,	NULL,	'0.3520236',	'32.5910929',	'2020-06-23 11:02:26'),
(935,	65,	NULL,	'0.3520236',	'32.5910929',	'2020-06-23 11:02:46'),
(936,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:03:07'),
(937,	65,	NULL,	'0.3520253',	'32.5910929',	'2020-06-23 11:03:29'),
(938,	65,	NULL,	'0.3520253',	'32.5910929',	'2020-06-23 11:03:49'),
(939,	65,	NULL,	'0.352023',	'32.5910927',	'2020-06-23 11:04:10'),
(940,	65,	NULL,	'0.3520223',	'32.5910909',	'2020-06-23 11:04:32'),
(941,	65,	NULL,	'0.3520226',	'32.5910922',	'2020-06-23 11:04:52'),
(942,	65,	NULL,	'0.3520224',	'32.5910916',	'2020-06-23 11:05:13'),
(943,	65,	NULL,	'0.3520223',	'32.5910909',	'2020-06-23 11:05:34'),
(944,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 11:05:54'),
(945,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:06:16'),
(946,	65,	NULL,	'0.3520253',	'32.5910929',	'2020-06-23 11:06:37'),
(947,	65,	NULL,	'0.352023',	'32.5910927',	'2020-06-23 11:06:57'),
(948,	65,	NULL,	'0.3520236',	'32.5910929',	'2020-06-23 11:07:19'),
(949,	65,	NULL,	'0.352023',	'32.5910927',	'2020-06-23 11:07:40'),
(950,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:08:00'),
(951,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:08:22'),
(952,	65,	NULL,	'0.3520236',	'32.5910929',	'2020-06-23 11:08:43'),
(953,	65,	NULL,	'0.3520226',	'32.5910922',	'2020-06-23 11:09:03'),
(954,	65,	NULL,	'0.3520236',	'32.5910929',	'2020-06-23 11:09:24'),
(955,	65,	NULL,	'0.3520226',	'32.5910922',	'2020-06-23 11:09:46'),
(956,	65,	NULL,	'0.352023',	'32.5910927',	'2020-06-23 11:10:06'),
(957,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 11:10:27'),
(958,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:10:49'),
(959,	65,	NULL,	'0.352023',	'32.5910927',	'2020-06-23 11:11:08'),
(960,	65,	NULL,	'0.3520253',	'32.5910929',	'2020-06-23 11:11:30'),
(961,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 11:11:51'),
(962,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:12:11'),
(963,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:12:33'),
(964,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:12:54'),
(965,	65,	NULL,	'0.352023',	'32.5910927',	'2020-06-23 11:13:14'),
(966,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 11:13:35'),
(967,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:13:57'),
(968,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 11:14:17'),
(969,	65,	NULL,	'0.3520242',	'32.591093',	'2020-06-23 11:14:38'),
(970,	65,	NULL,	'0.3520248',	'32.591093',	'2020-06-23 11:15:00'),
(971,	65,	NULL,	'0.3520226',	'32.5910922',	'2020-06-23 11:15:20'),
(972,	65,	NULL,	'0.3520258',	'32.5910921',	'2020-06-23 11:15:41'),
(973,	65,	NULL,	'0.3520259',	'32.591092',	'2020-06-23 11:16:02'),
(974,	65,	NULL,	'0.3520258',	'32.5910921',	'2020-06-23 11:16:22'),
(975,	65,	NULL,	'0.3520256',	'32.5910926',	'2020-06-23 11:16:44'),
(976,	65,	NULL,	'0.3520261',	'32.5910921',	'2020-06-23 11:17:06'),
(977,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 11:17:25'),
(978,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 11:17:47'),
(979,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:18:08'),
(980,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:18:28'),
(981,	65,	NULL,	'0.3520263',	'32.5910922',	'2020-06-23 11:18:49'),
(982,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:19:11'),
(983,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 11:19:31'),
(984,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 11:19:52'),
(985,	65,	NULL,	'0.3520261',	'32.5910914',	'2020-06-23 11:20:13'),
(986,	65,	NULL,	'0.3520261',	'32.5910914',	'2020-06-23 11:20:34'),
(987,	65,	NULL,	'0.3520261',	'32.5910921',	'2020-06-23 11:20:55'),
(988,	65,	NULL,	'0.3520263',	'32.5910922',	'2020-06-23 11:21:16'),
(989,	65,	NULL,	'0.3520262',	'32.5910921',	'2020-06-23 11:21:36'),
(990,	65,	NULL,	'0.3520262',	'32.5910921',	'2020-06-23 11:21:58'),
(991,	65,	NULL,	'0.3520262',	'32.5910921',	'2020-06-23 11:22:19'),
(992,	65,	NULL,	'0.3520262',	'32.5910921',	'2020-06-23 11:22:39'),
(993,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:23:00'),
(994,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:23:22'),
(995,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:23:42'),
(996,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:24:04'),
(997,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 11:24:25'),
(998,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 11:24:45'),
(999,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:25:06'),
(1000,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 11:25:27'),
(1001,	65,	NULL,	'0.3520263',	'32.5910922',	'2020-06-23 11:25:47'),
(1002,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:26:09'),
(1003,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:26:30'),
(1004,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:26:50'),
(1005,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:27:12'),
(1006,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:27:33'),
(1007,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:27:53'),
(1008,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:28:14'),
(1009,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:28:36'),
(1010,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:28:56'),
(1011,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 11:29:17'),
(1012,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:29:38'),
(1013,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:29:58'),
(1014,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:30:20'),
(1015,	65,	NULL,	'0.3520261',	'32.5910915',	'2020-06-23 11:30:42'),
(1016,	65,	NULL,	'0.3520263',	'32.5910917',	'2020-06-23 11:31:02'),
(1017,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:31:23'),
(1018,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:31:44'),
(1019,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:32:04'),
(1020,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:32:26'),
(1021,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:32:47'),
(1022,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:33:07'),
(1023,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:33:28'),
(1024,	65,	NULL,	'0.3520263',	'32.5910922',	'2020-06-23 11:33:50'),
(1025,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 11:34:10'),
(1026,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:34:31'),
(1027,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 11:34:53'),
(1028,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:35:13'),
(1029,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:35:35'),
(1030,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:35:56'),
(1031,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 11:36:16'),
(1032,	65,	NULL,	'0.3520263',	'32.5910922',	'2020-06-23 11:36:37'),
(1033,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:36:58'),
(1034,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:37:18'),
(1035,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:37:41'),
(1036,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:38:01'),
(1037,	65,	NULL,	'0.3520263',	'32.5910922',	'2020-06-23 11:38:21'),
(1038,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:38:42'),
(1039,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:39:04'),
(1040,	65,	NULL,	'0.3520262',	'32.5910914',	'2020-06-23 11:39:24'),
(1041,	65,	NULL,	'0.3520262',	'32.5910921',	'2020-06-23 11:40:03'),
(1042,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 11:41:03'),
(1043,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 11:41:07'),
(1044,	65,	NULL,	'0.3520264',	'32.5910917',	'2020-06-23 11:41:12'),
(1045,	65,	NULL,	'0.3520264',	'32.5910917',	'2020-06-23 11:41:15'),
(1046,	65,	NULL,	'0.3520262',	'32.5910921',	'2020-06-23 11:41:29'),
(1047,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:41:51'),
(1048,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:42:12'),
(1049,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:42:33'),
(1050,	65,	NULL,	'0.3520264',	'32.5910921',	'2020-06-23 11:42:54'),
(1051,	65,	NULL,	'0.3520263',	'32.5910917',	'2020-06-23 11:43:15'),
(1052,	65,	NULL,	'0.3520263',	'32.5910917',	'2020-06-23 11:43:35'),
(1053,	65,	NULL,	'0.3520262',	'32.5910921',	'2020-06-23 11:43:56'),
(1054,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 11:44:18'),
(1055,	65,	NULL,	'0.3520261',	'32.5910915',	'2020-06-23 11:44:38'),
(1056,	65,	NULL,	'0.3520262',	'32.5910914',	'2020-06-23 11:44:59'),
(1057,	65,	NULL,	'0.3520262',	'32.5910914',	'2020-06-23 11:45:21'),
(1058,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 11:45:41'),
(1059,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:46:02'),
(1060,	65,	NULL,	'0.3520263',	'32.5910917',	'2020-06-23 11:46:24'),
(1061,	65,	NULL,	'0.3520261',	'32.5910915',	'2020-06-23 11:46:44'),
(1062,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:47:05'),
(1063,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:47:26'),
(1064,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:47:46'),
(1065,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:48:07'),
(1066,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:48:29'),
(1067,	65,	NULL,	'0.3520261',	'32.5910915',	'2020-06-23 11:48:50'),
(1068,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 11:49:10'),
(1069,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 11:49:32'),
(1070,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 11:49:52'),
(1071,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:50:13'),
(1072,	65,	NULL,	'0.3520263',	'32.5910917',	'2020-06-23 11:50:35'),
(1073,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 11:50:56'),
(1074,	65,	NULL,	'0.3520261',	'32.5910915',	'2020-06-23 11:51:16'),
(1075,	65,	NULL,	'0.3520261',	'32.5910915',	'2020-06-23 11:51:37'),
(1076,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:51:57'),
(1077,	65,	NULL,	'0.3520264',	'32.5910919',	'2020-06-23 11:52:19'),
(1078,	65,	NULL,	'0.3520264',	'32.5910922',	'2020-06-23 11:52:40'),
(1079,	65,	NULL,	'0.3520262',	'32.5910916',	'2020-06-23 11:53:00'),
(1080,	65,	NULL,	'0.3520261',	'32.5910915',	'2020-06-23 11:53:23'),
(1081,	65,	NULL,	'0.3520263',	'32.5910918',	'2020-06-23 11:53:43');

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1,	'admin',	'Administrator'),
(2,	'Agents',	'Register trucks'),
(3,	'Supervisors',	'Quality Control');

DROP TABLE IF EXISTS `job_shedules`;
CREATE TABLE `job_shedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drivers` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `drivers` (`drivers`),
  CONSTRAINT `job_shedules_ibfk_1` FOREIGN KEY (`drivers`) REFERENCES `drivers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  `drivers` int(11) DEFAULT NULL,
  `trucks` int(11) DEFAULT NULL,
  `truck_owners` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `drivers` (`drivers`),
  KEY `trucks` (`trucks`),
  KEY `truck_owners` (`truck_owners`),
  CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`drivers`) REFERENCES `drivers` (`id`),
  CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`trucks`) REFERENCES `trucks` (`id`),
  CONSTRAINT `notifications_ibfk_3` FOREIGN KEY (`truck_owners`) REFERENCES `truck_owners` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `notifications` (`id`, `type`, `drivers`, `trucks`, `truck_owners`) VALUES
(107,	'service_provider_added',	NULL,	NULL,	85),
(108,	'driver_added',	65,	NULL,	85),
(109,	'truck_added',	NULL,	60,	85);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(1) NOT NULL,
  `truck_type` int(11) NOT NULL,
  `service_provider` int(11) NOT NULL,
  `truck_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `when` datetime NOT NULL,
  `short_description` text NOT NULL,
  `size` varchar(50) NOT NULL,
  `pickup_address` varchar(100) NOT NULL,
  `pickup_latlng` varchar(100) NOT NULL,
  `dest_address` varchar(100) NOT NULL,
  `dest_latlng` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `time_stamp` datetime NOT NULL,
  `truck_category_name` varchar(500) NOT NULL,
  `number_days` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `truck_id` (`truck_id`),
  KEY `driver_id` (`driver_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`id`),
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rate` float(2,1) NOT NULL,
  `comment` text NOT NULL,
  `datetime` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders` (`orders`),
  CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`orders`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `sp_notified`;
CREATE TABLE `sp_notified` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders` int(11) NOT NULL,
  `truck_owners` int(11) NOT NULL,
  `trucks` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders` (`orders`),
  KEY `truck_owners` (`truck_owners`),
  KEY `trucks` (`trucks`),
  CONSTRAINT `sp_notified_ibfk_1` FOREIGN KEY (`orders`) REFERENCES `orders` (`id`),
  CONSTRAINT `sp_notified_ibfk_2` FOREIGN KEY (`truck_owners`) REFERENCES `truck_owners` (`id`),
  CONSTRAINT `sp_notified_ibfk_3` FOREIGN KEY (`trucks`) REFERENCES `trucks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `sp_transactions`;
CREATE TABLE `sp_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `truck_owners` int(11) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `read` int(1) NOT NULL,
  `secret_code` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `truck_owners` (`truck_owners`),
  CONSTRAINT `sp_transactions_ibfk_1` FOREIGN KEY (`truck_owners`) REFERENCES `truck_owners` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(1) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `read` int(1) NOT NULL,
  `secret_code` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client` (`client`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`client`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `trucks`;
CREATE TABLE `trucks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `truck_owners` int(11) NOT NULL,
  `number_plate` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `truck_image` text NOT NULL,
  `truck_categories` int(11) NOT NULL,
  `truck_size` varchar(50) NOT NULL,
  `service_point` text NOT NULL,
  `coordinates` varchar(50) NOT NULL,
  `drivers` int(11) NOT NULL,
  `comsumption` varchar(50) NOT NULL,
  `agents` int(11) DEFAULT NULL,
  `agent_verification` int(1) NOT NULL DEFAULT '0',
  `admin_verification` int(1) NOT NULL DEFAULT '0',
  `job_status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `truck_owners` (`truck_owners`),
  KEY `truck_categories` (`truck_categories`),
  KEY `agents` (`agents`),
  KEY `drivers` (`drivers`),
  CONSTRAINT `trucks_ibfk_1` FOREIGN KEY (`truck_owners`) REFERENCES `truck_owners` (`id`),
  CONSTRAINT `trucks_ibfk_2` FOREIGN KEY (`truck_categories`) REFERENCES `truck_categories` (`id`),
  CONSTRAINT `trucks_ibfk_3` FOREIGN KEY (`agents`) REFERENCES `agents` (`id`),
  CONSTRAINT `trucks_ibfk_4` FOREIGN KEY (`drivers`) REFERENCES `drivers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `trucks` (`id`, `truck_owners`, `number_plate`, `model`, `description`, `truck_image`, `truck_categories`, `truck_size`, `service_point`, `coordinates`, `drivers`, `comsumption`, `agents`, `agent_verification`, `admin_verification`, `job_status`) VALUES
(60,	85,	'UAF123A',	'2020',	'light goods carrier',	'5ef1a5ec282d3.png',	53,	'Light(below 10t)',	'Social Security House,Kampala, Uganda',	'lat/lng: (0.3137149,32.5883856)',	65,	'5/10',	13,	0,	0,	0);

DROP TABLE IF EXISTS `truck_categories`;
CREATE TABLE `truck_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `fuel_effeciency` varchar(10) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `truck_categories` (`id`, `name`, `image`, `image2`, `description`, `fuel_effeciency`, `type`) VALUES
(37,	'Dumper',	'96e114b96e5d233cc9dcb335d42e4dc4.jpg',	NULL,	'A dump truck, known also as a dumper truck or tipper truck is used for transporting loose material (such as sand, gravel, or demolition waste) for construction.',	'25',	0),
(38,	'Tractor truck',	'31bb0055f4cce503e933dec65009aba2.jpg',	NULL,	'',	'25',	0),
(40,	'Sprinkling Truck, Water Truck',	'6bdc03f83b6159709c09db0f44f233d6.png',	NULL,	'',	'25',	0),
(41,	'Tanker Truck, Oil Truck',	'12f125777349a656de094b4de3c051d9.png',	NULL,	'',	'25',	0),
(42,	'Concrete Mixer Truck',	'3b47d344f25cedd5278a295d02c7295d.jpg',	NULL,	'',	'25',	0),
(43,	' Cargo Truck',	'25d817875c478dea997739f9cec9fb48.png',	NULL,	'',	'25',	0),
(45,	'Special Truck',	'd2b8523d3eb26513ea5a3936e653f766.jpg',	NULL,	'',	'25',	0),
(46,	'Crane Truck',	'3e7ec5aeb9d40fbc6aeffef0106143de.jpg',	NULL,	'',	'25',	0),
(47,	'Whole wheel truck',	'd5b58c7c79f75927e6d1a8fa090a12a5.jpg',	NULL,	'',	'25',	0),
(48,	'Stake Truck',	'3e9f8c0567838fe2b80d6b17b02932ef.jpg',	NULL,	'',	'25',	0),
(49,	'Van Truck',	'0a81c2d1e816bdce1dff3ba185349b44.png',	NULL,	'',	'25',	0),
(50,	'Refuse Compactors Truck',	'b14ce8270dd034b3b133d9f5cd2e121e.jpg',	NULL,	'',	'25',	0),
(51,	'T5G',	'b7e2ada806a9e5ee68f6bc3ae64bc898.jpg',	NULL,	'',	'25',	0),
(52,	'Trucktor',	'd3f6fb370668a9227ed6a44995c06670.png',	NULL,	'',	'25',	1),
(53,	'Pickup',	'4d68675c64c9643d7e394dec7966e9a6.png',	NULL,	'',	'25',	1),
(54,	'Tanker',	'e35d52b544ca173ebc55447e26700578.png',	NULL,	'',	'25',	1),
(55,	'Flat Bed',	'8986ed672d6192bbfcb462da24d25305.png',	NULL,	'',	'25',	1),
(56,	'Stake',	'b580b6cd5cb98d4eca0854421c614ac2.png',	NULL,	'',	'25',	1),
(57,	'Crane',	'0263c8d9d928e9a5048966df41e33c1b.png',	NULL,	'',	'25',	1),
(58,	'Cargo',	'f1390b28f321ca790c20608876860669.png',	NULL,	'',	'25',	1),
(59,	'Tractor',	'5cb8f089297c08b3f47db9b5aa3bf4c0.png',	NULL,	'',	'0',	0),
(60,	'Tractor',	'838e907c61953c8193b2a7f4f101807c.png',	NULL,	'',	'0',	0),
(61,	'Tractor',	'72cf9dfced52c871be18e94e74e75bb6.png',	NULL,	'',	'0',	0),
(62,	'Tractor',	'bbc94372e62803ad7cad5a874e405a1c.png',	'f67e9489cadc584d1169d72f29dc566d.png',	'',	'25',	2),
(63,	'Pickup',	'74774d12ad2c9f77ee45244dca74844f.png',	'409b156c42e313372ef6135c742803e8.png',	'',	'25',	2),
(64,	'Tanker',	'2d9e6d4862360e7216b41bddccac881e.png',	'cc87959130951c21a800b7fdd9e0f255.png',	'',	'25',	2),
(68,	'Flat Bed',	'407d97ed793f59692289c5f2b0041659.png',	'0c4825caf3e62f474a832034ca7b4e25.png',	'',	'25',	2),
(69,	'Stake',	'9458f8423cba8a29720b5d7104f6b08d.png',	'78963385109919b31b949acf27f70f0a.png',	'',	'25',	2),
(70,	'Crane',	'c9145e8ae69943dd52cdcecafd0c97bc.png',	'259716269d5f6109df3e4b6d3caf7f06.png',	'',	'25',	2),
(71,	'Cargo',	'325c526364c979cc0880159ccb5e5d3c.png',	'071645f1c92aeec24b72df7f9352e624.png',	'',	'25',	2);

DROP TABLE IF EXISTS `truck_location`;
CREATE TABLE `truck_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `truck_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `truck_id` (`truck_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `truck_location_ibfk_1` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`id`),
  CONSTRAINT `truck_location_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `truck_owners`;
CREATE TABLE `truck_owners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `second_name` varchar(200) NOT NULL,
  `ssn` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `code` int(4) NOT NULL,
  `profile_picture` text NOT NULL,
  `iscompany` int(1) NOT NULL,
  `company` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `active` int(1) NOT NULL,
  `token` text NOT NULL,
  `agents` int(11) DEFAULT NULL,
  `agent_verification` int(1) NOT NULL DEFAULT '0',
  `admin_verification` int(1) NOT NULL DEFAULT '0',
  `all_trucks_verified` int(11) NOT NULL DEFAULT '0',
  `change_code` int(1) NOT NULL DEFAULT '0',
  `offline_status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `agents` (`agents`),
  CONSTRAINT `truck_owners_ibfk_1` FOREIGN KEY (`agents`) REFERENCES `agents` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `truck_owners` (`id`, `first_name`, `second_name`, `ssn`, `phonenumber`, `email`, `code`, `profile_picture`, `iscompany`, `company`, `position`, `active`, `token`, `agents`, `agent_verification`, `admin_verification`, `all_trucks_verified`, `change_code`, `offline_status`) VALUES
(85,	'King',	'Saha',	'123',	'+256773294701',	'kingsaha@gmail.com',	2222,	'5ef1a531d6d1b.png',	1,	'Ande Music',	'Director',	1,	'cZh9tsKHUzk:APA91bEd41q2xt7PXgNy7zf5rp5DFy2hGno00KYtiC_VyH1c2RnSXD1LidD_El3elFCLAfbkOKjpsnCP0L0hPGGB_QrbaEMjNhycl2ytPaxE-O2MUBnGjRkgseJanDtWu8NA-oWU1wsP',	13,	0,	0,	0,	1,	0),
(87,	'Nsereko',	'Louis',	'123',	'0773294701',	'nserekolouis@gmail.com',	0,	'5efafa83e8717.png',	0,	'',	'',	0,	'',	28,	1,	0,	0,	0,	0),
(88,	'Nsereko',	'Louis',	'123',	'+256773294701',	'nserekolouis@gmail.com',	0,	'5efb0508c9ab9.png',	0,	'',	'',	0,	'',	28,	1,	0,	0,	0,	0),
(89,	'Nsereko',	'Louis',	'123',	'+256773294701',	'nserekolouis@gmail.com',	0,	'5efb050ecd64d.png',	0,	'',	'',	0,	'',	28,	1,	0,	0,	0,	0),
(90,	'Nsereko',	'Louis',	'123',	'+256773294701',	'nserekolouis@gmail.com',	0,	'5efb05c1a96ff.png',	0,	'',	'',	0,	'',	28,	1,	0,	0,	0,	0),
(91,	' Grace',	' Bukenya',	' 123',	'+256773294701',	' nserekolouis@gmail.com',	3656,	'5efb0e2ea107e.png',	1,	' Stackraft',	' Director',	0,	'',	28,	1,	0,	0,	0,	0),
(92,	'Marvin',	'Kasule',	'123',	'+256773294701',	'marvinkasule@gmail.com',	0,	'5efb0ef5b6d45.png',	1,	'Stackraft',	'Dirrector',	0,	'',	28,	1,	0,	0,	0,	0);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1,	'127.0.0.1',	'administrator',	'$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',	'',	'admin@admin.com',	NULL,	'urSCV8AclFInuV.tptWeeu29de98671f0f3f06a1',	1565675653,	NULL,	1268889823,	1594546342,	1,	'Admin',	'istrator',	'ADMIN',	'0');

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1,	1,	1),
(2,	1,	2);

DROP TABLE IF EXISTS `wallet_clients`;
CREATE TABLE `wallet_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(1) NOT NULL,
  `credit` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client` (`client`),
  CONSTRAINT `wallet_clients_ibfk_1` FOREIGN KEY (`client`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wallet_clients` (`id`, `client`, `credit`, `timestamp`) VALUES
(2,	23,	'6204',	'2020-06-20 06:59:03'),
(3,	24,	'1000',	'2020-06-22 12:30:57'),
(4,	25,	'1000',	'2019-06-21 06:35:06'),
(5,	32,	'936',	'2019-12-06 08:39:19'),
(6,	33,	'100',	'2020-01-10 04:00:59'),
(7,	36,	'0',	'2020-03-14 09:10:37'),
(8,	41,	'1000',	'2020-06-08 08:37:34');

DROP TABLE IF EXISTS `wallet_service_providers`;
CREATE TABLE `wallet_service_providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `truck_owners` int(11) NOT NULL,
  `credit` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `truck_owners` (`truck_owners`),
  CONSTRAINT `wallet_service_providers_ibfk_1` FOREIGN KEY (`truck_owners`) REFERENCES `truck_owners` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wallet_service_providers` (`id`, `truck_owners`, `credit`, `timestamp`) VALUES
(19,	85,	'0',	'2020-06-23 06:46:09');

-- 2020-07-22 08:50:33
