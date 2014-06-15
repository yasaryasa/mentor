-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 15 Haz 2014, 23:32:27
-- Sunucu sürümü: 5.6.16
-- PHP Sürümü: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `city_of_mentor`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `auth_roles`
--

CREATE TABLE IF NOT EXISTS `auth_roles` (
  `role_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `role_parent` int(3) unsigned DEFAULT NULL,
  `role_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_level` int(1) unsigned NOT NULL DEFAULT '1',
  `auth_role_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_id` (`role_id`,`role_title`),
  KEY `Role_Parent` (`role_parent`),
  KEY `auth_role_owner` (`auth_role_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `auth_roles`
--

INSERT INTO `auth_roles` (`role_id`, `role_parent`, `role_title`, `role_description`, `role_level`, `auth_role_owner`) VALUES
(1, NULL, 'admin', 'Administrator', 0, 1),
(2, 1, 'user', 'Standart User', 1, 1),
(3, 1, 'admin_user', 'middle user', 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `auth_role_capabilities`
--

CREATE TABLE IF NOT EXISTS `auth_role_capabilities` (
  `role_capability_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_capability_role_id` int(3) unsigned NOT NULL,
  `role_capability_module_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_capability_see_all` tinyint(1) DEFAULT '0',
  `role_capability_see_others` tinyint(1) DEFAULT '0',
  `role_capability_show` tinyint(1) DEFAULT '0',
  `role_capability_create` tinyint(1) DEFAULT '0',
  `role_capability_read` tinyint(1) DEFAULT '0',
  `role_capability_update` tinyint(1) DEFAULT '0',
  `role_capability_delete` tinyint(1) DEFAULT '0',
  `auth_role_capability_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`role_capability_id`),
  KEY `Role_Capability_Role_ID` (`role_capability_role_id`),
  KEY `Role_Capability_module_name` (`role_capability_module_name`),
  KEY `auth_role_capability_owner` (`auth_role_capability_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Tablo döküm verisi `auth_role_capabilities`
--

INSERT INTO `auth_role_capabilities` (`role_capability_id`, `role_capability_role_id`, `role_capability_module_name`, `role_capability_see_all`, `role_capability_see_others`, `role_capability_show`, `role_capability_create`, `role_capability_read`, `role_capability_update`, `role_capability_delete`, `auth_role_capability_owner`) VALUES
(1, 1, 'auth_role_capabilities', 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 'auth_roles', 1, 1, 1, 1, 1, 1, 1, 1),
(3, 1, 'auth_user_logs', 1, 1, 1, 1, 1, 1, 1, 1),
(4, 1, 'auth_users', 1, 1, 1, 1, 1, 1, 1, 1),
(5, 1, 'blob_images', 1, 1, 1, 1, 1, 1, 1, 1),
(6, 1, 'categories', 1, 1, 1, 1, 1, 1, 1, 1),
(7, 1, 'category_entries', 1, 1, 1, 1, 1, 1, 1, 1),
(8, 1, 'entries', 1, 1, 1, 1, 1, 1, 1, 1),
(9, 1, 'gen_image_setting_types', 1, 1, 1, 1, 1, 1, 1, 1),
(10, 1, 'gen_image_settings', 1, 1, 1, 1, 1, 1, 1, 1),
(11, 1, 'gen_labels', 1, 1, 1, 1, 1, 1, 1, 1),
(12, 1, 'gen_languages', 1, 1, 1, 1, 1, 1, 1, 1),
(13, 1, 'gen_module_groups', 1, 1, 1, 1, 1, 1, 1, 1),
(14, 1, 'gen_module_positions', 1, 1, 1, 1, 1, 1, 1, 1),
(15, 1, 'gen_modules', 1, 1, 1, 1, 1, 1, 1, 1),
(16, 1, 'gen_specifications', 1, 1, 1, 1, 1, 1, 1, 1),
(17, 1, 'images', 1, 1, 1, 1, 1, 1, 1, 1),
(18, 2, 'categories', 1, 1, 1, 1, 1, 1, 1, 1),
(19, 2, 'category_entries', 1, 1, 1, 1, 1, 1, 1, 1),
(21, 2, 'entries', 1, 1, 1, 1, 1, 1, 1, 1),
(22, 2, 'blob_images', 1, 1, 1, 1, 1, 1, 1, 1),
(23, 1, 'notifications', 1, 1, 1, 1, 1, 1, 1, 1),
(24, 2, 'notifications', 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `auth_users`
--

CREATE TABLE IF NOT EXISTS `auth_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_role_id` int(3) unsigned NOT NULL,
  `user_language_id` int(2) unsigned DEFAULT '1',
  `user_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `user_surname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `user_username` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_profile_image` longblob,
  `auth_user_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_username` (`user_username`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `User_Role` (`user_role_id`),
  KEY `auth_user_owner` (`auth_user_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `auth_users`
--

INSERT INTO `auth_users` (`user_id`, `user_role_id`, `user_language_id`, `user_name`, `user_surname`, `user_username`, `user_password`, `user_email`, `user_registered`, `user_profile_image`, `auth_user_owner`) VALUES
(1, 1, 1, 'Super', 'Admin', 'admin', '00276377be55cdc1fb38b51154a5c524c4622f06', 'admin@site.com', '2014-04-23 12:13:02', NULL, 1),
(2, 2, 1, 'Nasir', 'Yilmaz', 'Nasir', '67b535c0f3bd0ad3eeccb7eadfbfb41d9607a847', 'user@site.com', '2014-04-23 12:13:02', NULL, 1),
(3, 3, 0, 'Nasir', 'Yilmaz', 'nsr_ylmz', '1234', 'nsr', '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `auth_user_logs`
--

CREATE TABLE IF NOT EXISTS `auth_user_logs` (
  `user_log_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_log_ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `user_log_activity` text COLLATE utf8_unicode_ci NOT NULL,
  `user_log_user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `user_log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auth_user_log_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`user_log_id`),
  KEY `auth_user_log_owner` (`auth_user_log_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=346 ;

--
-- Tablo döküm verisi `auth_user_logs`
--

INSERT INTO `auth_user_logs` (`user_log_id`, `user_log_ip_address`, `user_log_activity`, `user_log_user_agent`, `user_log_time`, `auth_user_log_owner`) VALUES
(1, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:37:53', 1),
(2, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:38:53', 2),
(3, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:39:06', 1),
(4, '127.0.0.1', 'gen_module_group nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:40:24', 1),
(5, '127.0.0.1', 'gen_module_position nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:40:53', 1),
(6, '127.0.0.1', 'gen_module_position nesnesi silindi [ id : 3 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:40:58', 1),
(7, '127.0.0.1', 'gen_module nesnesi güncellendi [ id : 8 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:41:55', 1),
(8, '127.0.0.1', 'gen_module nesnesi güncellendi [ id : 8 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:42:14', 1),
(9, '127.0.0.1', 'auth_role_capability nesnesi oluşturuldu [ id : 18 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:43:17', 1),
(10, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:43:24', 2),
(11, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:43:36', 1),
(12, '127.0.0.1', 'auth_role_capability nesnesi oluşturuldu [ id : 19 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:44:07', 1),
(13, '127.0.0.1', 'auth_role_capability nesnesi oluşturuldu [ id : 20 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:44:42', 1),
(14, '127.0.0.1', 'auth_role_capability nesnesi oluşturuldu [ id : 21 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:44:57', 1),
(15, '127.0.0.1', 'gen_module_position nesnesi oluşturuldu [ id : 4 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:45:20', 1),
(16, '127.0.0.1', 'gen_module_group nesnesi güncellendi [ id : 3 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:46:36', 1),
(17, '127.0.0.1', 'gen_module nesnesi güncellendi [ id : 8 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:47:01', 1),
(18, '127.0.0.1', 'gen_module nesnesi güncellendi [ id : 6 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:47:17', 1),
(19, '127.0.0.1', 'gen_module nesnesi güncellendi [ id : 5 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:47:29', 1),
(20, '127.0.0.1', 'gen_module nesnesi güncellendi [ id : 7 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:47:37', 1),
(21, '127.0.0.1', 'gen_module nesnesi güncellendi [ id : 17 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:47:49', 1),
(22, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:48:16', 2),
(23, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:48:50', 1),
(24, '127.0.0.1', 'gen_language nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:49:07', 1),
(25, '127.0.0.1', 'gen_label nesnesi güncellendi [ id : 54 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 12:53:41', 1),
(26, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 216 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:23:05', 1),
(27, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 217 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:23:21', 1),
(28, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 218 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:23:44', 1),
(29, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 220 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:24:25', 1),
(30, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 221 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:25:36', 1),
(31, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 222 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:26:16', 1),
(32, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 223 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:26:46', 1),
(33, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 225 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:27:27', 1),
(34, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 226 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:27:50', 1),
(35, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 227 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:28:19', 1),
(36, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 228 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:28:59', 1),
(37, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 229 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:29:21', 1),
(38, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 230 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:29:41', 1),
(39, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 231 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:30:05', 1),
(40, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 233 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:30:44', 1),
(41, '127.0.0.1', 'category nesnesi oluşturuldu [ id : 0 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:31:36', 1),
(42, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 234 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:32:05', 1),
(43, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 236 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:32:49', 1),
(44, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 238 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:33:27', 1),
(45, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 239 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:34:05', 1),
(46, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 241 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:34:37', 1),
(47, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 242 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:35:02', 1),
(48, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 244 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:35:45', 1),
(49, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 245 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:36:09', 1),
(50, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 246 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:36:28', 1),
(51, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 247 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:36:50', 1),
(52, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 248 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:37:17', 1),
(53, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 249 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 13:37:45', 1),
(54, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 250 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:20:51', 1),
(55, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 251 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:21:10', 1),
(56, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 252 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:21:35', 1),
(57, '127.0.0.1', 'gen_label nesnesi güncellendi [ id : 59 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:22:05', 1),
(58, '127.0.0.1', 'gen_label nesnesi güncellendi [ id : 69 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:22:31', 1),
(59, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 253 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:22:54', 1),
(60, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 254 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:23:20', 1),
(61, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 255 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:23:38', 1),
(62, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 256 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:24:03', 1),
(63, '127.0.0.1', 'gen_module nesnesi güncellendi [ id : 17 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:24:39', 1),
(64, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:24:52', 2),
(65, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:25:13', 1),
(66, '127.0.0.1', 'auth_role_capability nesnesi oluşturuldu [ id : 22 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:25:47', 1),
(67, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:26:45', 2),
(68, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:26:58', 1),
(69, '127.0.0.1', 'auth_role_capability nesnesi silindi [ id : 20 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:27:20', 1),
(70, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 14:27:26', 2),
(71, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 17:07:50', 1),
(72, '127.0.0.1', 'gen_image_setting nesnesi oluşturuldu [ id : 1 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 17:09:42', 1),
(73, '127.0.0.1', 'gen_image_setting nesnesi oluşturuldu [ id : 2 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 17:10:00', 1),
(74, '127.0.0.1', 'category nesnesi silindi [ id : 0 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 18:59:51', 1),
(75, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 19:00:01', 2),
(76, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 20:12:36', 1),
(77, '127.0.0.1', 'gen_image_setting nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 20:23:25', 1),
(78, '127.0.0.1', 'gen_image_setting nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 20:23:34', 1),
(79, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 20:25:57', 1),
(80, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 257 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 20:26:19', 1),
(81, '127.0.0.1', 'gen_label nesnesi oluşturuldu [ id : 258 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 20:26:33', 1),
(82, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 20:29:32', 2),
(83, '127.0.0.1', 'category nesnesi oluşturuldu [ id : 0 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 20:29:57', 2),
(84, '127.0.0.1', 'entry nesnesi oluşturuldu [ id : 0 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 20:36:13', 2),
(85, '127.0.0.1', 'category_entry nesnesi oluşturuldu [ id : 0 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 20:43:22', 2),
(86, '127.0.0.1', 'blob_image nesnesi oluşturuldu [ id : 0 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 20:44:20', 2),
(87, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-23 23:13:10', 2),
(88, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-24 19:08:10', 2),
(89, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-25 21:32:01', 2),
(90, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-25 21:32:12', 1),
(91, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-25 23:14:44', 1),
(92, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-25 23:34:57', 2),
(93, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-27 10:31:43', 1),
(94, '127.0.0.1', 'blob_image nesnesi güncellendi [ id : 0 ]', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-27 11:12:26', 1),
(95, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', '2014-04-28 19:26:06', 1),
(96, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36', '2014-05-12 21:21:31', 1),
(97, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36', '2014-05-12 21:21:49', 2),
(98, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36', '2014-05-13 20:03:38', 2),
(99, '127.0.0.1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36', '2014-05-13 20:20:16', 2),
(100, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 10:03:27', 2),
(101, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 15:08:47', 1),
(102, '::1', 'gen_label nesnesi güncellendi [ id : 42 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 15:54:27', 1),
(103, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:23:41', 1),
(104, '::1', 'gen_label nesnesi güncellendi [ id : 207 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:30:16', 1),
(105, '::1', 'gen_label nesnesi oluşturuldu [ id : 259 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:32:35', 1),
(106, '::1', 'gen_label nesnesi güncellendi [ id : 259 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:32:56', 1),
(107, '::1', 'gen_label nesnesi güncellendi [ id : 259 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:33:17', 1),
(108, '::1', 'gen_label nesnesi güncellendi [ id : 259 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:33:28', 1),
(109, '::1', 'gen_module_group nesnesi güncellendi [ id : 3 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:43:01', 1),
(110, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:43:22', 2),
(111, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:44:48', 1),
(112, '::1', 'auth_user nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:45:12', 1),
(113, '::1', 'auth_user nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:47:22', 1),
(114, '::1', 'auth_user nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:50:45', 1),
(115, '::1', 'gen_label nesnesi oluşturuldu [ id : 260 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:52:25', 1),
(116, '::1', 'gen_label nesnesi silindi [ id : 260 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:52:49', 1),
(117, '::1', 'gen_label nesnesi güncellendi [ id : 43 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:53:00', 1),
(118, '::1', 'gen_label nesnesi oluşturuldu [ id : 261 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:54:34', 1),
(119, '::1', 'gen_label nesnesi güncellendi [ id : 259 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:55:16', 1),
(120, '::1', 'gen_label nesnesi oluşturuldu [ id : 262 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:55:55', 1),
(121, '::1', 'gen_label nesnesi oluşturuldu [ id : 263 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:56:18', 1),
(122, '::1', 'gen_label nesnesi güncellendi [ id : 263 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:57:05', 1),
(123, '::1', 'gen_label nesnesi oluşturuldu [ id : 264 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:59:42', 1),
(124, '::1', 'gen_label nesnesi oluşturuldu [ id : 265 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 18:59:57', 1),
(125, '::1', 'gen_label nesnesi oluşturuldu [ id : 266 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:00:08', 1),
(126, '::1', 'gen_label nesnesi oluşturuldu [ id : 267 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:00:24', 1),
(127, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:31:42', 1),
(128, '::1', 'gen_label nesnesi oluşturuldu [ id : 268 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:35:23', 1),
(129, '::1', 'gen_label nesnesi güncellendi [ id : 45 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:36:31', 1),
(130, '::1', 'gen_label nesnesi güncellendi [ id : 45 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:36:40', 1),
(131, '::1', 'gen_label nesnesi güncellendi [ id : 46 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:36:52', 1),
(132, '::1', 'gen_label nesnesi güncellendi [ id : 47 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:37:05', 1),
(133, '::1', 'gen_label nesnesi güncellendi [ id : 48 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:37:41', 1),
(134, '::1', 'blob_image nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:40:55', 1),
(135, '::1', 'blob_image nesnesi silindi [ id : 3 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:41:02', 1),
(136, '::1', 'blob_image nesnesi oluşturuldu [ id : 4 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:44:01', 1),
(137, '::1', 'blob_image nesnesi silindi [ id : 4 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:44:06', 1),
(138, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 19:51:46', 2),
(139, '::1', 'category nesnesi oluşturuldu [ id : 2 ]', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-18 20:12:25', 2),
(140, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-19 06:28:14', 2),
(141, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 16:24:15', 2),
(142, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 16:29:47', 1),
(143, '::1', 'auth_user nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 16:30:00', 1),
(144, '::1', 'auth_user nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 16:30:16', 1),
(145, '::1', 'auth_user nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 16:30:26', 1),
(146, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 16:30:48', 1),
(147, '::1', 'gen_label nesnesi oluşturuldu [ id : 269 ]', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 16:31:50', 1),
(148, '::1', 'gen_label nesnesi güncellendi [ id : 269 ]', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 16:32:10', 1),
(149, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 16:36:22', 1),
(150, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-19 16:36:56', 2),
(151, '::1', 'auth_role nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 16:40:20', 1),
(152, '::1', 'gen_module_group nesnesi güncellendi [ id : 3 ]', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 16:58:51', 1),
(153, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-19 16:59:39', 2),
(154, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-19 17:00:07', 1),
(155, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 17:00:24', 2),
(156, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', '2014-05-19 20:38:17', 2),
(157, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko', '2014-05-19 21:51:44', 1),
(158, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; rv:29.0) Gecko/20100101 Firefox/29.0', '2014-05-19 21:56:25', 2),
(159, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; rv:29.0) Gecko/20100101 Firefox/29.0', '2014-05-22 18:53:36', 2),
(160, '::1', 'Logged In', 'Mozilla/5.0 (Windows NT 6.3; rv:29.0) Gecko/20100101 Firefox/29.0', '2014-05-22 19:07:37', 2),
(161, '::1', 'category nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Windows NT 6.3; rv:29.0) Gecko/20100101 Firefox/29.0', '2014-05-22 19:26:16', 2),
(162, '::1', 'category nesnesi silindi [ id : 3 ]', 'Mozilla/5.0 (Windows NT 6.3; rv:29.0) Gecko/20100101 Firefox/29.0', '2014-05-22 19:26:21', 2),
(163, '::1', 'category nesnesi oluşturuldu [ id : 4 ]', 'Mozilla/5.0 (Windows NT 6.3; rv:29.0) Gecko/20100101 Firefox/29.0', '2014-05-22 19:26:29', 2),
(164, '::1', 'category nesnesi silindi [ id : 4 ]', 'Mozilla/5.0 (Windows NT 6.3; rv:29.0) Gecko/20100101 Firefox/29.0', '2014-05-22 19:26:32', 2),
(165, '::1', 'category nesnesi oluşturuldu [ id : 5 ]', 'Mozilla/5.0 (Windows NT 6.3; rv:29.0) Gecko/20100101 Firefox/29.0', '2014-05-22 19:27:12', 2),
(166, '::1', 'category nesnesi silindi [ id : 5 ]', 'Mozilla/5.0 (Windows NT 6.3; rv:29.0) Gecko/20100101 Firefox/29.0', '2014-05-22 19:27:14', 2),
(167, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-24 12:33:27', 2),
(168, '::1', 'category nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-24 12:33:58', 2),
(169, '::1', 'category nesnesi silindi [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-24 12:34:00', 2),
(170, '::1', 'category_entry nesnesi oluşturuldu [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-24 12:35:42', 2),
(171, '::1', 'category_entry nesnesi silindi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-24 12:35:53', 2),
(172, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-24 12:39:26', 1),
(173, '::1', 'blob_image nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-24 12:43:46', 1),
(174, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-24 12:44:35', 2),
(175, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 10:41:29', 1),
(176, '::1', 'category nesnesi silindi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 10:47:43', 1),
(177, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 10:52:51', 2),
(178, '::1', 'category nesnesi oluşturuldu [ id : 4 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 10:57:24', 2),
(179, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 11:17:57', 1),
(180, '::1', 'gen_label nesnesi oluşturuldu [ id : 270 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 11:18:13', 1),
(181, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 11:18:51', 2),
(182, '::1', 'blob_image nesnesi silindi [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 11:22:45', 2),
(183, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 15:46:01', 1),
(184, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 16:10:39', 2),
(185, '::1', 'category nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 16:10:46', 2),
(186, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 18:11:08', 2),
(187, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:23:08', 1),
(188, '::1', 'auth_user nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:23:42', 1),
(189, '::1', 'auth_user nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:23:56', 1),
(190, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:24:06', 2),
(191, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:28:56', 1),
(192, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:31:56', 2),
(193, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:33:20', 1),
(194, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:41:42', 2),
(195, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:43:26', 1),
(196, '::1', 'category nesnesi güncellendi [ id : 4 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:55:03', 1),
(197, '::1', 'category nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:55:12', 1),
(198, '::1', 'category nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 21:56:49', 1),
(199, '::1', 'category nesnesi güncellendi [ id : 4 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:07:54', 1),
(200, '::1', 'category nesnesi güncellendi [ id : 4 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:08:23', 1),
(201, '::1', 'category nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:08:30', 1),
(202, '::1', 'category nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:08:36', 1),
(203, '::1', 'category nesnesi güncellendi [ id : 4 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:08:40', 1),
(204, '::1', 'category nesnesi oluşturuldu [ id : 5 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:16:23', 1),
(205, '::1', 'category nesnesi güncellendi [ id : 5 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:16:29', 1),
(206, '::1', 'category nesnesi güncellendi [ id : 5 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:16:35', 1),
(207, '::1', 'category nesnesi silindi [ id : 5 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:16:36', 1),
(208, '::1', 'gen_label nesnesi oluşturuldu [ id : 271 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:17:13', 1),
(209, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:17:34', 2),
(210, '::1', 'category nesnesi oluşturuldu [ id : 6 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:17:47', 2),
(211, '::1', 'category nesnesi silindi [ id : 6 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-25 22:17:51', 2),
(212, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-27 19:54:57', 2),
(213, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-27 19:55:26', 1),
(214, '::1', 'auth_role nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-27 19:56:57', 1),
(215, '::1', 'auth_user nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-27 19:59:13', 1),
(216, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-27 21:03:33', 2),
(217, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-05-27 22:36:20', 1),
(218, '::1', 'device nesnesi oluşturuldu [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-28 19:44:55', 0),
(219, '::1', 'device nesnesi güncellendi [ id :  ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-28 19:45:21', 0),
(220, '::1', 'device nesnesi güncellendi [ id : 123456 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-28 19:46:53', 0),
(221, '::1', 'device nesnesi oluşturuldu [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-28 19:47:12', 0),
(222, '::1', 'device nesnesi güncellendi [ id : 123456 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-28 19:47:32', 0),
(223, '::1', 'device nesnesi güncellendi [ id : 123456 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-05-28 19:48:07', 0),
(224, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-01 07:58:18', 2),
(225, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-02 19:07:50', 1),
(226, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-02 19:08:39', 1),
(227, '::1', 'entry nesnesi oluşturuldu [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-02 19:11:23', 1),
(228, '::1', 'category_entry nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-02 19:11:42', 1),
(229, '::1', 'category_entry nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-02 19:11:49', 1),
(230, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-04 19:01:57', 2),
(231, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-08 17:15:26', 2),
(232, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-08 18:15:40', 1),
(233, '::1', 'gen_module nesnesi oluşturuldu [ id : 18 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-08 18:16:03', 1),
(234, '::1', 'gen_module nesnesi güncellendi [ id : 18 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-08 18:16:55', 1),
(235, '::1', 'gen_module nesnesi güncellendi [ id : 18 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-08 18:17:03', 1),
(236, '::1', 'auth_role_capability nesnesi oluşturuldu [ id : 23 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-08 18:18:02', 1),
(237, '::1', 'gen_label nesnesi oluşturuldu [ id : 272 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-08 18:18:25', 1),
(238, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-08 18:18:38', 2),
(239, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-08 18:18:56', 1),
(240, '::1', 'auth_role_capability nesnesi oluşturuldu [ id : 24 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-08 18:19:40', 1),
(241, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-08 18:19:44', 2),
(242, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 16:36:35', 2),
(243, '::1', 'entry nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 16:36:57', 2),
(244, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:51:22', 2),
(245, '::1', 'entry nesnesi oluşturuldu [ id : 4 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:52:05', 2),
(246, '::1', 'entry nesnesi silindi [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:52:24', 2),
(247, '::1', 'entry nesnesi silindi [ id : 4 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:52:32', 2),
(248, '::1', 'entry nesnesi oluşturuldu [ id : 5 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:54:25', 2),
(249, '::1', 'entry nesnesi silindi [ id : 5 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:54:29', 2),
(250, '::1', 'entry nesnesi oluşturuldu [ id : 6 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:55:20', 2),
(251, '::1', 'entry nesnesi silindi [ id : 6 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:55:24', 2),
(252, '::1', 'entry nesnesi oluşturuldu [ id : 7 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:56:18', 2),
(253, '::1', 'entry nesnesi oluşturuldu [ id : 8 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:57:21', 2),
(254, '::1', 'entry nesnesi silindi [ id : 8 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:57:26', 2),
(255, '::1', 'entry nesnesi silindi [ id : 7 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 18:57:28', 2),
(256, '::1', 'entry nesnesi oluşturuldu [ id : 9 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:00:56', 2),
(257, '::1', 'entry nesnesi oluşturuldu [ id : 10 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:03:08', 2),
(258, '::1', 'entry nesnesi oluşturuldu [ id : 11 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:03:36', 2),
(259, '::1', 'entry nesnesi oluşturuldu [ id : 12 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:04:31', 2),
(260, '::1', 'entry nesnesi silindi [ id : 12 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:04:44', 2),
(261, '::1', 'entry nesnesi silindi [ id : 11 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:04:44', 2),
(262, '::1', 'entry nesnesi silindi [ id : 10 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:04:45', 2),
(263, '::1', 'entry nesnesi silindi [ id : 9 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:04:46', 2),
(264, '::1', 'entry nesnesi oluşturuldu [ id : 13 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:06:31', 2),
(265, '::1', 'entry nesnesi oluşturuldu [ id : 14 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:06:58', 2),
(266, '::1', 'entry nesnesi silindi [ id : 14 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:07:05', 2),
(267, '::1', 'entry nesnesi oluşturuldu [ id : 15 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:08:05', 2),
(268, '::1', 'entry nesnesi oluşturuldu [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 19:08:18', 2),
(269, '::1', 'entry nesnesi silindi [ id : 13 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-10 20:53:17', 2),
(270, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 19:40:04', 2),
(271, '::1', 'category_entry nesnesi oluşturuldu [ id : 4 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 19:43:46', 2),
(272, '::1', 'category_entry nesnesi silindi [ id : 4 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 19:43:59', 2),
(273, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:11:31', 2),
(274, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:12:22', 2),
(275, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:13:29', 2);
INSERT INTO `auth_user_logs` (`user_log_id`, `user_log_ip_address`, `user_log_activity`, `user_log_user_agent`, `user_log_time`, `auth_user_log_owner`) VALUES
(276, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:14:36', 2),
(277, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:15:11', 2),
(278, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:16:10', 2),
(279, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:17:42', 2),
(280, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:18:40', 2),
(281, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:19:45', 2),
(282, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:23:46', 2),
(283, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:26:57', 2),
(284, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:27:08', 2),
(285, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:27:24', 2),
(286, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:28:06', 2),
(287, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:28:19', 2),
(288, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:28:29', 2),
(289, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:29:26', 2),
(290, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:29:54', 2),
(291, '::1', 'entry nesnesi güncellendi [ id : 15 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:30:26', 2),
(292, '::1', 'entry nesnesi güncellendi [ id : 15 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:30:47', 2),
(293, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:31:23', 2),
(294, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:31:33', 2),
(295, '::1', 'entry nesnesi güncellendi [ id : 15 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:33:27', 2),
(296, '::1', 'entry nesnesi güncellendi [ id : 15 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:33:36', 2),
(297, '::1', 'entry nesnesi güncellendi [ id : 15 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:33:47', 2),
(298, '::1', 'entry nesnesi güncellendi [ id : 15 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:38:30', 2),
(299, '::1', 'entry nesnesi güncellendi [ id : 15 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 21:39:04', 2),
(300, '::1', 'entry nesnesi güncellendi [ id : 15 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-11 22:01:39', 2),
(301, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 13:15:58', 1),
(302, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-14 13:18:16', 2),
(303, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-14 13:53:12', 2),
(304, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', '2014-06-14 13:53:33', 2),
(305, '::1', 'blob_image nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:02:37', 1),
(306, '::1', 'blob_image nesnesi silindi [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:02:39', 1),
(307, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:07:41', 1),
(308, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:08:16', 1),
(309, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:08:37', 1),
(310, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:09:03', 1),
(311, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:09:20', 1),
(312, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:17:21', 1),
(313, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:17:26', 1),
(314, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:17:31', 1),
(315, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:17:46', 1),
(316, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:21:03', 1),
(317, '::1', 'blob_image nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:21:54', 1),
(318, '::1', 'blob_image nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.76.4 (KHTML, like Gecko) Version/7.0.4 Safari/537.76.4', '2014-06-14 14:24:33', 1),
(319, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 17:46:56', 1),
(320, '::1', 'blob_image nesnesi oluşturuldu [ id : 3 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 17:54:18', 1),
(321, '::1', 'entry nesnesi oluşturuldu [ id : 17 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 19:59:35', 1),
(322, '::1', 'entry nesnesi oluşturuldu [ id : 18 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 20:19:24', 1),
(323, '::1', 'entry nesnesi güncellendi [ id : 17 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 20:37:43', 1),
(324, '::1', 'entry nesnesi güncellendi [ id : 17 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 20:38:14', 1),
(325, '::1', 'entry nesnesi güncellendi [ id : 17 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 20:39:28', 1),
(326, '::1', 'entry nesnesi güncellendi [ id : 17 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 20:41:40', 1),
(327, '::1', 'entry nesnesi güncellendi [ id : 17 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 20:42:15', 1),
(328, '::1', 'entry nesnesi güncellendi [ id : 17 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 20:42:49', 1),
(329, '::1', 'entry nesnesi güncellendi [ id : 2 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 20:43:38', 1),
(330, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:06:30', 1),
(331, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:09:22', 1),
(332, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:12:55', 1),
(333, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:19:16', 1),
(334, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:19:53', 1),
(335, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:21:24', 1),
(336, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:25:39', 1),
(337, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:29:42', 1),
(338, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:30:47', 1),
(339, '::1', 'entry nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:32:56', 1),
(340, '::1', 'entry nesnesi güncellendi [ id : 1 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:36:16', 1),
(341, '::1', 'entry nesnesi güncellendi [ id : 16 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:36:47', 1),
(342, '::1', 'entry nesnesi güncellendi [ id : 15 ]', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-14 21:37:12', 1),
(343, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-15 09:53:03', 2),
(344, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '2014-06-15 09:53:14', 1),
(345, '::1', 'Logged In', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.3', '2014-06-15 20:55:19', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blob_images`
--

CREATE TABLE IF NOT EXISTS `blob_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(1000) DEFAULT NULL,
  `entry_id` int(11) DEFAULT NULL,
  `blob_image_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_blob_img_entry_id` (`entry_id`),
  KEY `blob_image_owner` (`blob_image_owner`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `blob_images`
--

INSERT INTO `blob_images` (`id`, `name`, `path`, `entry_id`, `blob_image_owner`) VALUES
(1, 'Perfect view', './uploads/2/2/NZP7oCTgQGPiNhbl.jpeg', 1, 2),
(2, 'Mountain', './uploads/1/1/s043eHIEtXx0e9ey.jpeg', 1, 2),
(3, 'win', './uploads/1/1/CdQda9il87rwkwoZ.jpeg', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_key` varchar(255) DEFAULT NULL,
  `category_title` varchar(255) DEFAULT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `category_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category_owner` (`category_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `category_key`, `category_title`, `deletable`, `category_owner`) VALUES
(2, 'city_events', 'City Events', 0, 2),
(4, 'city_info', 'City Info', 0, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_entries`
--

CREATE TABLE IF NOT EXISTS `category_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `category_entry_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_entry_id` (`entry_id`),
  KEY `fk_tag_id` (`category_id`),
  KEY `category_entry_owner` (`category_entry_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `category_entries`
--

INSERT INTO `category_entries` (`id`, `entry_id`, `category_id`, `category_entry_owner`) VALUES
(2, 1, 4, 2),
(3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` varchar(255) NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `device_id` (`device_id`),
  KEY `device_id_2` (`device_id`),
  KEY `device_id_3` (`device_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `devices`
--

INSERT INTO `devices` (`id`, `device_id`, `last_update`) VALUES
(1, 'd2c6f39b3bf1dded1070354455555dc2905790ab2f97d457ccf885d1567f0fb9', '2014-05-28 21:48:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `website` varchar(1000) DEFAULT NULL,
  `map_title` varchar(1000) DEFAULT NULL,
  `map_lat` varchar(255) DEFAULT NULL,
  `map_long` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(1000) DEFAULT NULL,
  `twitter_link` varchar(1000) DEFAULT NULL,
  `posted_date` datetime DEFAULT NULL,
  `from_date` datetime DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `cost` varchar(100) DEFAULT NULL,
  `entry_owner` int(11) unsigned DEFAULT '1',
  `notified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `entry_owner` (`entry_owner`),
  KEY `notified` (`notified`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Tablo döküm verisi `entries`
--

INSERT INTO `entries` (`id`, `title`, `description`, `email`, `phone_number`, `website`, `map_title`, `map_lat`, `map_long`, `facebook_link`, `twitter_link`, `posted_date`, `from_date`, `to_date`, `cost`, `entry_owner`, `notified`) VALUES
(1, 'City Info Entry 1', 'Default text message<br><ol><li>message 1</li><li>message 2</li></ol>', 'ahdiblack@hotmail.com', 1212344, 'www.muzikfon.com', 'map title 1', '40.45200091943327', '-75.42755563476567', 'facebook.com/yasaryasa', NULL, '2014-04-02 00:00:00', NULL, NULL, '$20', 2, 1),
(2, 'City Events New', 'Decsription for new<br><ul><li>title 1</li><li>title 2</li></ul><br><br>', 'yasaryasa@gmail.com', 1213456, 'example.com', 'map title', NULL, NULL, 'facebook.com/test', 'twitter.com/tweet', '2014-06-09 00:00:00', '2014-06-01 00:00:00', '2014-06-30 05:58:00', '30$', 1, 1),
(15, 'Another entry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-06-12 00:00:00', NULL, NULL, NULL, 2, 1),
(16, 'test 55', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2014-06-02 00:00:00', NULL, NULL, NULL, 2, 1),
(17, 'time deneme', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-06-14 00:00:00', '2014-06-02 22:02:00', '2014-06-23 13:00:04', '23', 1, 0),
(18, 'time deneme 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-06-14 22:01:13', '2014-06-02 23:01:14', '2014-06-02 19:02:14', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gen_image_settings`
--

CREATE TABLE IF NOT EXISTS `gen_image_settings` (
  `setting_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `setting_module_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `setting_type_id` int(1) unsigned NOT NULL DEFAULT '0',
  `setting_image_width` mediumint(1) DEFAULT '1366',
  `setting_image_height` mediumint(1) DEFAULT '768',
  `gen_image_setting_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`setting_id`),
  KEY `Setting_table_module_name` (`setting_module_name`),
  KEY `Setting_Type` (`setting_type_id`),
  KEY `gen_image_setting_owner` (`gen_image_setting_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `gen_image_settings`
--

INSERT INTO `gen_image_settings` (`setting_id`, `setting_module_name`, `setting_type_id`, `setting_image_width`, `setting_image_height`, `gen_image_setting_owner`) VALUES
(1, 'blob_images', 1, 640, 400, 1),
(2, 'blob_images', 2, 320, 200, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gen_image_setting_types`
--

CREATE TABLE IF NOT EXISTS `gen_image_setting_types` (
  `type_id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `type_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gen_image_setting_type_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`type_id`),
  KEY `gen_image_setting_type_owner` (`gen_image_setting_type_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `gen_image_setting_types`
--

INSERT INTO `gen_image_setting_types` (`type_id`, `type_title`, `gen_image_setting_type_owner`) VALUES
(1, 'Big', 1),
(2, 'Small', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gen_labels`
--

CREATE TABLE IF NOT EXISTS `gen_labels` (
  `label_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `label_language_id` int(2) unsigned DEFAULT '1',
  `label_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gen_label_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`label_id`),
  KEY `label_language` (`label_language_id`),
  KEY `gen_label_owner` (`gen_label_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=273 ;

--
-- Tablo döküm verisi `gen_labels`
--

INSERT INTO `gen_labels` (`label_id`, `label_language_id`, `label_name`, `label_value`, `gen_label_owner`) VALUES
(1, 1, 'auth_role_capabilities', '*auth_role_capabilities*', 1),
(2, 1, 'new_auth_role_capability', '*new_auth_role_capability*', 1),
(3, 1, 'role_capability_id', '*role_capability_id*', 1),
(4, 1, 'role_capability_role_id', '*role_capability_role_id*', 1),
(5, 1, 'role_capability_role_id', '*role_capability_role_id*', 1),
(6, 1, 'select_role_capability_role_id', '*select_role_capability_role_id*', 1),
(7, 1, 'role_capability_module_name', '*role_capability_module_name*', 1),
(8, 1, 'role_capability_module_name', '*role_capability_module_name*', 1),
(9, 1, 'select_role_capability_module_name', '*select_role_capability_module_name*', 1),
(10, 1, 'role_capability_see_all', '*role_capability_see_all*', 1),
(11, 1, 'role_capability_see_others', '*role_capability_see_others*', 1),
(12, 1, 'role_capability_show', '*role_capability_show*', 1),
(13, 1, 'role_capability_create', '*role_capability_create*', 1),
(14, 1, 'role_capability_read', '*role_capability_read*', 1),
(15, 1, 'role_capability_update', '*role_capability_update*', 1),
(16, 1, 'role_capability_delete', '*role_capability_delete*', 1),
(17, 1, 'auth_role_capability_owner', '*auth_role_capability_owner*', 1),
(18, 1, 'auth_role_capability_owner', '*auth_role_capability_owner*', 1),
(19, 1, 'select_auth_role_capability_owner', '*select_auth_role_capability_owner*', 1),
(20, 1, 'auth_roles', '*auth_roles*', 1),
(21, 1, 'new_auth_role', '*new_auth_role*', 1),
(22, 1, 'role_id', '*role_id*', 1),
(23, 1, 'role_parent', '*role_parent*', 1),
(24, 1, 'role_parent', '*role_parent*', 1),
(25, 1, 'select_role_parent', '*select_role_parent*', 1),
(26, 1, 'role_title', '*role_title*', 1),
(27, 1, 'role_description', '*role_description*', 1),
(28, 1, 'role_level', '*role_level*', 1),
(29, 1, 'auth_role_owner', '*auth_role_owner*', 1),
(30, 1, 'auth_role_owner', '*auth_role_owner*', 1),
(31, 1, 'select_auth_role_owner', '*select_auth_role_owner*', 1),
(32, 1, 'auth_user_logs', '*auth_user_logs*', 1),
(33, 1, 'new_auth_user_log', '*new_auth_user_log*', 1),
(34, 1, 'user_log_id', '*user_log_id*', 1),
(35, 1, 'user_log_ip_address', '*user_log_ip_address*', 1),
(36, 1, 'user_log_activity', '*user_log_activity*', 1),
(37, 1, 'user_log_user_agent', '*user_log_user_agent*', 1),
(38, 1, 'user_log_time', '*user_log_time*', 1),
(39, 1, 'auth_user_log_owner', '*auth_user_log_owner*', 1),
(40, 1, 'auth_user_log_owner', '*auth_user_log_owner*', 1),
(41, 1, 'select_auth_user_log_owner', '*select_auth_user_log_owner*', 1),
(42, 1, 'auth_users', 'Users', 1),
(43, 1, 'new_auth_user', 'New User', 1),
(44, 1, 'user_id', '*user_id*', 1),
(45, 1, 'user_role_id', 'User Role', 1),
(46, 1, 'user_role_id', 'User Role', 1),
(47, 1, 'select_user_role_id', 'Select User Role', 1),
(48, 1, 'user_language_id', 'User Language', 1),
(49, 1, 'user_name', 'User Name', 1),
(50, 1, 'user_surname', 'User Surname', 1),
(51, 1, 'user_username', 'User Username', 1),
(52, 1, 'user_password', 'User Password', 1),
(53, 1, 'user_email', 'User Email', 1),
(54, 1, 'user_registered', 'User Registered', 1),
(55, 1, 'user_profile_image', 'User Profile Image', 1),
(56, 1, 'auth_user_owner', '*auth_user_owner*', 1),
(57, 1, 'auth_user_owner', '*auth_user_owner*', 1),
(58, 1, 'select_auth_user_owner', '*select_auth_user_owner*', 1),
(59, 1, 'blob_images', 'Images', 1),
(60, 1, 'new_blob_image', 'New Image', 1),
(61, 1, 'id', '*id*', 1),
(62, 1, 'name', 'Name', 1),
(63, 1, 'data', '*data*', 1),
(64, 1, 'entry_id', 'Entry', 1),
(65, 1, 'entry_id', 'Entry', 1),
(66, 1, 'select_entry_id', 'Select Entry', 1),
(67, 1, 'blob_image_owner', '*blob_image_owner*', 1),
(68, 1, 'blob_image_owner', '*blob_image_owner*', 1),
(69, 1, 'select_blob_image_owner', '-Select User-', 1),
(70, 1, 'entries', 'Entries', 1),
(71, 1, 'new_entry', 'New Entry', 1),
(72, 1, 'id', 'Id', 1),
(73, 1, 'title', 'Title', 1),
(74, 1, 'description', 'Description', 1),
(75, 1, 'email', 'Email', 1),
(76, 1, 'phone_number', 'Phone Number', 1),
(77, 1, 'website', 'Website', 1),
(78, 1, 'map_title', 'Map Title', 1),
(79, 1, 'map_lat', 'Latitude', 1),
(80, 1, 'map_long', 'Longtitude', 1),
(81, 1, 'facebook_link', 'Facebook', 1),
(82, 1, 'twitter_link', 'Twitter', 1),
(83, 1, 'posted_date', 'Posted Date', 1),
(84, 1, 'from_date', 'From Date', 1),
(85, 1, 'to_date', 'To Date', 1),
(86, 1, 'cost', 'Cost', 1),
(87, 1, 'entry_owner', 'Entry Owner', 1),
(88, 1, 'entry_owner', 'Entry Owner', 1),
(89, 1, 'select_entry_owner', '*select_entry_owner*', 1),
(90, 1, 'gen_image_setting_types', '*gen_image_setting_types*', 1),
(91, 1, 'new_gen_image_setting_type', '*new_gen_image_setting_type*', 1),
(92, 1, 'type_id', '*type_id*', 1),
(93, 1, 'type_title', '*type_title*', 1),
(94, 1, 'gen_image_setting_type_owner', '*gen_image_setting_type_owner*', 1),
(95, 1, 'gen_image_setting_type_owner', '*gen_image_setting_type_owner*', 1),
(96, 1, 'select_gen_image_setting_type_owner', '*select_gen_image_setting_type_owner*', 1),
(97, 1, 'gen_image_settings', '*gen_image_settings*', 1),
(98, 1, 'new_gen_image_setting', '*new_gen_image_setting*', 1),
(99, 1, 'setting_id', '*setting_id*', 1),
(100, 1, 'setting_module_name', '*setting_module_name*', 1),
(101, 1, 'setting_module_name', '*setting_module_name*', 1),
(102, 1, 'select_setting_module_name', '*select_setting_module_name*', 1),
(103, 1, 'setting_type_id', '*setting_type_id*', 1),
(104, 1, 'setting_type_id', '*setting_type_id*', 1),
(105, 1, 'select_setting_type_id', '*select_setting_type_id*', 1),
(106, 1, 'setting_image_width', '*setting_image_width*', 1),
(107, 1, 'setting_image_height', '*setting_image_height*', 1),
(108, 1, 'gen_image_setting_owner', '*gen_image_setting_owner*', 1),
(109, 1, 'gen_image_setting_owner', '*gen_image_setting_owner*', 1),
(110, 1, 'select_gen_image_setting_owner', '*select_gen_image_setting_owner*', 1),
(111, 1, 'gen_labels', 'Labels', 1),
(112, 1, 'new_gen_label', 'New Label', 1),
(113, 1, 'label_id', '*label_id*', 1),
(114, 1, 'label_language_id', 'Label Language', 1),
(115, 1, 'label_language_id', 'Label Language', 1),
(116, 1, 'select_label_language_id', '*select_label_language_id*', 1),
(117, 1, 'label_name', 'Label Name', 1),
(118, 1, 'label_value', 'Label Value', 1),
(119, 1, 'gen_label_owner', '*gen_label_owner*', 1),
(120, 1, 'gen_label_owner', '*gen_label_owner*', 1),
(121, 1, 'select_gen_label_owner', '*select_gen_label_owner*', 1),
(122, 1, 'gen_languages', '*gen_languages*', 1),
(123, 1, 'new_gen_language', 'New Label Language', 1),
(124, 1, 'language_id', '*language_id*', 1),
(125, 1, 'language_title', '*language_title*', 1),
(126, 1, 'language_short', '*language_short*', 1),
(127, 1, 'language_created', '*language_created*', 1),
(128, 1, 'language_modified', '*language_modified*', 1),
(129, 1, 'gen_language_owner', '*gen_language_owner*', 1),
(130, 1, 'gen_language_owner', '*gen_language_owner*', 1),
(131, 1, 'select_gen_language_owner', '*select_gen_language_owner*', 1),
(132, 1, 'gen_module_groups', '*gen_module_groups*', 1),
(133, 1, 'new_gen_module_group', '*new_gen_module_group*', 1),
(134, 1, 'module_group_id', '*module_group_id*', 1),
(135, 1, 'module_group_title', '*module_group_title*', 1),
(136, 1, 'module_group_order', '*module_group_order*', 1),
(137, 1, 'module_group_position', '*module_group_position*', 1),
(138, 1, 'module_group_position', '*module_group_position*', 1),
(139, 1, 'select_module_group_position', '*select_module_group_position*', 1),
(140, 1, 'gen_module_group_owner', '*gen_module_group_owner*', 1),
(141, 1, 'gen_module_group_owner', '*gen_module_group_owner*', 1),
(142, 1, 'select_gen_module_group_owner', '*select_gen_module_group_owner*', 1),
(143, 1, 'gen_module_positions', '*gen_module_positions*', 1),
(144, 1, 'new_gen_module_position', '*new_gen_module_position*', 1),
(145, 1, 'module_position_id', '*module_position_id*', 1),
(146, 1, 'module_position_title', '*module_position_title*', 1),
(147, 1, 'gen_module_position_owner', '*gen_module_position_owner*', 1),
(148, 1, 'gen_module_position_owner', '*gen_module_position_owner*', 1),
(149, 1, 'select_gen_module_position_owner', '*select_gen_module_position_owner*', 1),
(150, 1, 'gen_modules', '*gen_modules*', 1),
(151, 1, 'new_gen_module', 'New Module', 1),
(152, 1, 'module_id', '*module_id*', 1),
(153, 1, 'module_title', '*module_title*', 1),
(154, 1, 'module_order', '*module_order*', 1),
(155, 1, 'module_group_id', '*module_group_id*', 1),
(156, 1, 'module_group_id', '*module_group_id*', 1),
(157, 1, 'select_module_group_id', '*select_module_group_id*', 1),
(158, 1, 'gen_module_owner', '*gen_module_owner*', 1),
(159, 1, 'gen_module_owner', '*gen_module_owner*', 1),
(160, 1, 'select_gen_module_owner', '*select_gen_module_owner*', 1),
(161, 1, 'gen_specifications', '*gen_specifications*', 1),
(162, 1, 'new_gen_specification', '*new_gen_specification*', 1),
(163, 1, 'specification_id', '*specification_id*', 1),
(164, 1, 'main_table', '*main_table*', 1),
(165, 1, 'main_column', '*main_column*', 1),
(166, 1, 'referenced_table', '*referenced_table*', 1),
(167, 1, 'referenced_column', '*referenced_column*', 1),
(168, 1, 'referenced_value_column', '*referenced_value_column*', 1),
(169, 1, 'gen_specification_owner', '*gen_specification_owner*', 1),
(170, 1, 'gen_specification_owner', '*gen_specification_owner*', 1),
(171, 1, 'select_gen_specification_owner', '*select_gen_specification_owner*', 1),
(172, 1, 'images', 'Images', 1),
(173, 1, 'new_image', 'New Image', 1),
(174, 1, 'id', 'Id', 1),
(175, 1, 'name', 'Name', 1),
(176, 1, 'path', 'Path', 1),
(177, 1, 'entry_id', 'Entry Id', 1),
(178, 1, 'entry_id', 'Entry Id', 1),
(179, 1, 'select_entry_id', 'Select Entry', 1),
(180, 1, 'image_owner', '*image_owner*', 1),
(181, 1, 'image_owner', '*image_owner*', 1),
(182, 1, 'select_image_owner', '*select_image_owner*', 1),
(183, 1, 'tag_entries', 'Tag - Entry Relation', 1),
(184, 1, 'new_tag_entry', 'New Tag - Entry Relation', 1),
(185, 1, 'id', '*id*', 1),
(186, 1, 'entry_id', '*entry_id*', 1),
(187, 1, 'entry_id', '*entry_id*', 1),
(188, 1, 'select_entry_id', 'Select Entry', 1),
(189, 1, 'tag_id', 'Tag', 1),
(190, 1, 'tag_id', '*tag_id*', 1),
(191, 1, 'select_tag_id', 'Select Tag', 1),
(192, 1, 'tag_entry_owner', '*tag_entry_owner*', 1),
(193, 1, 'tag_entry_owner', '*tag_entry_owner*', 1),
(194, 1, 'select_tag_entry_owner', '*select_tag_entry_owner*', 1),
(195, 1, 'tags', 'Tags', 1),
(196, 1, 'new_tag', 'New Tag', 1),
(197, 1, 'id', 'Id', 1),
(198, 1, 'tag_key', 'Tag Key', 1),
(199, 1, 'tag_title', 'Tag Title', 1),
(200, 1, 'tag_owner', '*tag_owner*', 1),
(201, 1, 'tag_owner', '*tag_owner*', 1),
(202, 1, 'select_tag_owner', '*select_tag_owner*', 1),
(203, 1, 'save', 'Save', 1),
(204, 1, 'select_entries_referenced', '-Select Entry-', 1),
(205, 1, 'select_tags_referenced', '-Select Tag-', 1),
(206, 1, 'home', 'Home', 1),
(207, 1, 'project_name', 'City Of Mentor', 1),
(208, 1, 'select_gen_languages_referenced', '-Select Language-', 1),
(209, 1, 'list_gen_labels', 'List Labels', 1),
(211, 1, 'list_tag_entries', 'List Tag Entries', 1),
(213, 1, 'search_in_entries', 'Search In Entries', 1),
(215, 1, 'list_entries', 'List Entries', 1),
(216, 1, 'category_key', 'Category Key', 1),
(217, 1, 'category_title', 'Category Title', 1),
(218, 1, 'categories', 'Categories', 1),
(220, 1, 'category_entries', 'Category Entries', 1),
(221, 1, 'new_category', 'New Category', 1),
(222, 1, 'list_categories', 'List Categories', 1),
(223, 1, 'select_category_auth_user', '-Select User-', 1),
(225, 1, 'no_record_warning', 'No Record Found', 1),
(226, 1, 'there_is_no_categories', 'There is no category', 1),
(227, 1, 'search_in_categories', 'Search in categories', 1),
(228, 1, 'select_category_entry_entry', '-Select Category Entry-', 1),
(229, 1, 'select_category_entry_category', '-Select Category-', 1),
(230, 1, 'select_category_entry_auth_user', '-Select User-', 1),
(231, 1, 'new_category_entry', 'New Category Entry', 1),
(233, 1, 'search_in_category_entries', 'Search In Categories', 1),
(234, 1, 'category_id', 'Category Title', 1),
(236, 1, 'select_categories_referenced', '-Select Category-', 1),
(238, 1, 'list_category_entries', 'List Category Entries', 1),
(239, 1, 'there_is_no_category_entries', 'There is no category entries', 1),
(241, 1, 'administration', 'Actions', 1),
(242, 1, 'select_entry_auth_user', '-Select User-', 1),
(244, 1, 'search_in_images', 'Search in images', 1),
(245, 1, 'select_image_auth_user', '-Select User-', 1),
(246, 1, 'select_image_entry', '-Select Entry-', 1),
(247, 1, 'there_is_no_images', 'There is no images', 1),
(248, 1, 'list_images', 'List Images', 1),
(249, 1, 'there_is_no_entries', 'There is no entries', 1),
(250, 1, 'blob_images', 'Images', 1),
(251, 1, 'list_blob_images', 'List Images', 1),
(252, 1, 'blob_images', 'Images', 1),
(253, 1, 'select_blob_image_entry', '-Select Entry-', 1),
(254, 1, 'select_blob_image_auth_user', '-Select User-', 1),
(255, 1, 'there_is_no_blob_images', 'There is no images', 1),
(256, 1, 'search_in_blob_images', 'Search in images', 1),
(257, 1, 'my_profile', 'My Profile', 1),
(258, 1, 'logout', 'Logout', 1),
(259, 1, 'select_auth_user_auth_user', '-Select User-', 1),
(261, 1, 'select_auth_user_auth_role', '-Select User Role-', 1),
(262, 1, 'search_in_auth_users', 'Search In Users', 1),
(263, 1, 'search_in_gen_labels', 'Search In Labels', 1),
(264, 1, 'first', 'First', 1),
(265, 1, 'prev', 'Prev', 1),
(266, 1, 'last', 'Last', 1),
(267, 1, 'next', 'Next', 1),
(268, 1, 'list_auth_users', 'List Users', 1),
(269, 1, 'invalid_username_or_password', 'Invalid Username or Password', 1),
(270, 1, 'search', 'Search', 1),
(271, 1, 'category_deletable', 'Is Deletable', 1),
(272, 1, 'notifications', 'Notifications', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gen_languages`
--

CREATE TABLE IF NOT EXISTS `gen_languages` (
  `language_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `language_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language_short` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language_created` date DEFAULT NULL,
  `language_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `gen_language_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`language_id`),
  KEY `gen_language_owner` (`gen_language_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `gen_languages`
--

INSERT INTO `gen_languages` (`language_id`, `language_title`, `language_short`, `language_created`, `language_modified`, `gen_language_owner`) VALUES
(1, 'Türkçe', 'TR', '2014-04-23', '2014-04-23 12:13:01', 1),
(2, 'English', 'EN', '2014-04-23', '2014-04-23 12:13:01', 1),
(3, 'Deutsch', 'DE', '2014-04-23', '2014-04-23 12:13:01', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gen_modules`
--

CREATE TABLE IF NOT EXISTS `gen_modules` (
  `module_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_order` int(1) unsigned DEFAULT '1',
  `module_group_id` int(1) unsigned NOT NULL DEFAULT '1',
  `gen_module_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`module_id`),
  UNIQUE KEY `module_title` (`module_title`),
  KEY `Gen_Module_Group` (`module_group_id`),
  KEY `gen_module_owner` (`gen_module_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Tablo döküm verisi `gen_modules`
--

INSERT INTO `gen_modules` (`module_id`, `module_title`, `module_order`, `module_group_id`, `gen_module_owner`) VALUES
(1, 'auth_role_capabilities', 1, 1, 1),
(2, 'auth_roles', 1, 1, 1),
(3, 'auth_user_logs', 1, 1, 1),
(4, 'auth_users', 1, 1, 1),
(5, 'categories', 1, 3, 1),
(6, 'entries', 1, 3, 1),
(7, 'blob_images', 1, 3, 1),
(8, 'category_entries', 1, 3, 1),
(9, 'gen_image_setting_types', 1, 1, 1),
(10, 'gen_image_settings', 1, 1, 1),
(11, 'gen_labels', 1, 1, 1),
(12, 'gen_languages', 1, 1, 1),
(13, 'gen_module_groups', 1, 1, 1),
(14, 'gen_module_positions', 1, 1, 1),
(15, 'gen_modules', 1, 1, 1),
(16, 'gen_specifications', 1, 1, 1),
(17, 'images', 1, 1, 1),
(18, 'notifications', 1, 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gen_module_groups`
--

CREATE TABLE IF NOT EXISTS `gen_module_groups` (
  `module_group_id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `module_group_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `module_group_order` int(1) unsigned NOT NULL DEFAULT '0',
  `module_group_position` int(1) unsigned NOT NULL DEFAULT '1',
  `gen_module_group_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`module_group_id`),
  KEY `Module_Group_Postition` (`module_group_position`),
  KEY `gen_module_group_owner` (`gen_module_group_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `gen_module_groups`
--

INSERT INTO `gen_module_groups` (`module_group_id`, `module_group_title`, `module_group_order`, `module_group_position`, `gen_module_group_owner`) VALUES
(1, 'Left', 1, 1, 1),
(2, 'Top', 1, 2, 1),
(3, 'Contents', 1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gen_module_positions`
--

CREATE TABLE IF NOT EXISTS `gen_module_positions` (
  `module_position_id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `module_position_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gen_module_position_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`module_position_id`),
  KEY `gen_module_position_owner` (`gen_module_position_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `gen_module_positions`
--

INSERT INTO `gen_module_positions` (`module_position_id`, `module_position_title`, `gen_module_position_owner`) VALUES
(1, 'Left Menu', 1),
(2, 'Top Menu', 1),
(4, 'Contents', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gen_specifications`
--

CREATE TABLE IF NOT EXISTS `gen_specifications` (
  `specification_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `main_table` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `main_column` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referenced_table` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referenced_column` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referenced_value_column` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gen_specification_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`specification_id`),
  KEY `gen_specification_owner` (`gen_specification_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Tablo döküm verisi `gen_specifications`
--

INSERT INTO `gen_specifications` (`specification_id`, `main_table`, `main_column`, `referenced_table`, `referenced_column`, `referenced_value_column`, `gen_specification_owner`) VALUES
(1, 'auth_role_capabilities', 'auth_role_capability_owner', 'auth_users', 'user_id', 'user_name', 1),
(2, 'auth_role_capabilities', 'role_capability_module_name', 'gen_modules', 'module_title', 'module_title', 1),
(3, 'auth_role_capabilities', 'role_capability_role_id', 'auth_roles', 'role_id', 'role_title', 1),
(4, 'auth_roles', 'auth_role_owner', 'auth_users', 'user_id', 'user_name', 1),
(5, 'auth_roles', 'role_parent', 'auth_roles', 'role_id', 'role_title', 1),
(6, 'auth_user_logs', 'auth_user_log_owner', 'auth_users', 'user_id', 'user_name', 1),
(7, 'auth_users', 'auth_user_owner', 'auth_users', 'user_id', 'user_name', 1),
(8, 'auth_users', 'user_role_id', 'auth_roles', 'role_id', 'role_title', 1),
(9, 'blob_images', 'blob_image_owner', 'auth_users', 'user_id', 'user_name', 1),
(10, 'blob_images', 'entry_id', 'entries', 'id', 'title', 1),
(11, 'categories', 'category_owner', 'auth_users', 'user_id', 'user_name', 1),
(12, 'category_entries', 'category_entry_owner', 'auth_users', 'user_id', 'user_name', 1),
(13, 'category_entries', 'category_id', 'categories', 'id', 'category_title', 1),
(14, 'category_entries', 'entry_id', 'entries', 'id', 'title', 1),
(15, 'entries', 'entry_owner', 'auth_users', 'user_id', 'user_name', 1),
(16, 'gen_image_setting_types', 'gen_image_setting_type_owner', 'auth_users', 'user_id', 'user_name', 1),
(17, 'gen_image_settings', 'gen_image_setting_owner', 'auth_users', 'user_id', 'user_name', 1),
(18, 'gen_image_settings', 'setting_module_name', 'gen_modules', 'module_title', 'module_title', 1),
(19, 'gen_image_settings', 'setting_type_id', 'gen_image_setting_types', 'type_id', 'type_title', 1),
(20, 'gen_labels', 'gen_label_owner', 'auth_users', 'user_id', 'user_name', 1),
(21, 'gen_labels', 'label_language_id', 'gen_languages', 'language_id', 'language_title', 1),
(22, 'gen_languages', 'gen_language_owner', 'auth_users', 'user_id', 'user_name', 1),
(23, 'gen_module_groups', 'gen_module_group_owner', 'auth_users', 'user_id', 'user_name', 1),
(24, 'gen_module_groups', 'module_group_position', 'gen_module_positions', 'module_position_id', 'module_position_title', 1),
(25, 'gen_module_positions', 'gen_module_position_owner', 'auth_users', 'user_id', 'user_name', 1),
(26, 'gen_modules', 'gen_module_owner', 'auth_users', 'user_id', 'user_name', 1),
(27, 'gen_modules', 'module_group_id', 'gen_module_groups', 'module_group_id', 'module_group_title', 1),
(28, 'gen_specifications', 'gen_specification_owner', 'auth_users', 'user_id', 'user_name', 1),
(29, 'images', 'image_owner', 'auth_users', 'user_id', 'user_name', 1),
(30, 'images', 'entry_id', 'entries', 'id', 'title', 1),
(31, 'auth_role_capabilities', 'auth_role_capability_owner', 'auth_users', 'user_id', 'user_name', 1),
(32, 'auth_role_capabilities', 'role_capability_module_name', 'gen_modules', 'module_title', 'module_title', 1),
(33, 'auth_role_capabilities', 'role_capability_role_id', 'auth_roles', 'role_id', 'role_title', 1),
(34, 'auth_roles', 'auth_role_owner', 'auth_users', 'user_id', 'user_name', 1),
(35, 'auth_roles', 'role_parent', 'auth_roles', 'role_id', 'role_title', 1),
(36, 'auth_user_logs', 'auth_user_log_owner', 'auth_users', 'user_id', 'user_name', 1),
(37, 'auth_users', 'auth_user_owner', 'auth_users', 'user_id', 'user_name', 1),
(38, 'auth_users', 'user_role_id', 'auth_roles', 'role_id', 'role_title', 1),
(39, 'blob_images', 'blob_image_owner', 'auth_users', 'user_id', 'user_name', 1),
(40, 'blob_images', 'entry_id', 'entries', 'id', 'title', 1),
(41, 'categories', 'category_owner', 'auth_users', 'user_id', 'user_name', 1),
(42, 'category_entries', 'category_entry_owner', 'auth_users', 'user_id', 'user_name', 1),
(43, 'category_entries', 'category_id', 'categories', 'id', 'category_title', 1),
(44, 'category_entries', 'entry_id', 'entries', 'id', 'title', 1),
(45, 'entries', 'entry_owner', 'auth_users', 'user_id', 'user_name', 1),
(46, 'gen_image_setting_types', 'gen_image_setting_type_owner', 'auth_users', 'user_id', 'user_name', 1),
(47, 'gen_image_settings', 'gen_image_setting_owner', 'auth_users', 'user_id', 'user_name', 1),
(48, 'gen_image_settings', 'setting_module_name', 'gen_modules', 'module_title', 'module_title', 1),
(49, 'gen_image_settings', 'setting_type_id', 'gen_image_setting_types', 'type_id', 'type_title', 1),
(50, 'gen_labels', 'gen_label_owner', 'auth_users', 'user_id', 'user_name', 1),
(51, 'gen_labels', 'label_language_id', 'gen_languages', 'language_id', 'language_title', 1),
(52, 'gen_languages', 'gen_language_owner', 'auth_users', 'user_id', 'user_name', 1),
(53, 'gen_module_groups', 'gen_module_group_owner', 'auth_users', 'user_id', 'user_name', 1),
(54, 'gen_module_groups', 'module_group_position', 'gen_module_positions', 'module_position_id', 'module_position_title', 1),
(55, 'gen_module_positions', 'gen_module_position_owner', 'auth_users', 'user_id', 'user_name', 1),
(56, 'gen_modules', 'gen_module_owner', 'auth_users', 'user_id', 'user_name', 1),
(57, 'gen_modules', 'module_group_id', 'gen_module_groups', 'module_group_id', 'module_group_title', 1),
(58, 'gen_specifications', 'gen_specification_owner', 'auth_users', 'user_id', 'user_name', 1),
(59, 'images', 'image_owner', 'auth_users', 'user_id', 'user_name', 1),
(60, 'images', 'entry_id', 'entries', 'id', 'title', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(1000) DEFAULT NULL,
  `entry_id` int(11) DEFAULT NULL,
  `image_owner` int(11) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_img_entry_id` (`entry_id`),
  KEY `image_owner` (`image_owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `auth_role_capabilities`
--
ALTER TABLE `auth_role_capabilities`
  ADD CONSTRAINT `auth_role_capabilities_ibfk_1` FOREIGN KEY (`auth_role_capability_owner`) REFERENCES `auth_users` (`user_id`),
  ADD CONSTRAINT `Role_Capability_module_name` FOREIGN KEY (`role_capability_module_name`) REFERENCES `gen_modules` (`module_title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Role_Capability_Role_ID` FOREIGN KEY (`role_capability_role_id`) REFERENCES `auth_roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
