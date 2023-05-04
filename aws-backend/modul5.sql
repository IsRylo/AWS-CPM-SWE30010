-- Adminer 4.8.1 MySQL 5.5.5-10.4.19-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `phone`;
CREATE TABLE `phone` (
  `id_phone` varchar(100) NOT NULL,
  `name_phone` varchar(255) NOT NULL,
  `brand_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `phone` (`id_phone`, `name_phone`, `brand_phone`) VALUES
('09u45lk4j5',	'Galaksi Es 7',	'Samsnug'),
('61480a16738271.21833380',	'Aipon 7',	'Aipong'),
('61480a38ef5ea7.89852641',	'Galaksi Es Delapan',	'Sansnug'),
('61480b937417a5.78451455',	'asdfdfdf',	'dfdfdfdfd');

-- 2021-09-20 04:33:55
