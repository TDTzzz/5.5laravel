/*
Navicat MySQL Data Transfer

Source Server         : Homestead
Source Server Version : 50719
Source Host           : 127.0.0.1:33060
Source Database       : homestead

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-09-11 22:50:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lessons
-- ----------------------------
DROP TABLE IF EXISTS `lessons`;
CREATE TABLE `lessons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lesson_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_credit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lessons
-- ----------------------------
INSERT INTO `lessons` VALUES ('1', '计算机网络', '4', null, null);
INSERT INTO `lessons` VALUES ('2', '数据库', '4', null, null);
INSERT INTO `lessons` VALUES ('3', '数据结构', '5', '2017-09-06 15:08:08', '2017-09-06 15:08:08');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('10', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('11', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('12', '2017_09_04_121717_create_lessons_table', '1');
INSERT INTO `migrations` VALUES ('13', '2017_09_04_121739_create_students_table', '1');
INSERT INTO `migrations` VALUES ('14', '2017_09_05_003335_create_student_lesson_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for student_lesson
-- ----------------------------
DROP TABLE IF EXISTS `student_lesson`;
CREATE TABLE `student_lesson` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `lesson_id` int(10) unsigned NOT NULL,
  `grade` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_lesson_student_id_index` (`student_id`),
  KEY `student_lesson_lesson_id_index` (`lesson_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of student_lesson
-- ----------------------------
INSERT INTO `student_lesson` VALUES ('1', '1', '1', '59', null, null);
INSERT INTO `student_lesson` VALUES ('2', '1', '2', '49', null, null);
INSERT INTO `student_lesson` VALUES ('3', '2', '1', '40', null, null);
INSERT INTO `student_lesson` VALUES ('4', '2', '2', '70', null, null);
INSERT INTO `student_lesson` VALUES ('5', '1', '3', '100', null, null);
INSERT INTO `student_lesson` VALUES ('6', '2', '3', '55', null, null);
INSERT INTO `student_lesson` VALUES ('7', '3', '1', '55', null, null);
INSERT INTO `student_lesson` VALUES ('8', '6', '1', '80', null, null);
INSERT INTO `student_lesson` VALUES ('9', '6', '3', '70', null, null);

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_sex` tinyint(4) NOT NULL DEFAULT '0',
  `student_age` int(11) NOT NULL,
  `student_dept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', 'TT', '0', '18', '信息', null, null);
INSERT INTO `students` VALUES ('2', 'pp', '0', '19', '金融', null, null);
INSERT INTO `students` VALUES ('3', 'zz', '0', '21', '信息系', '2017-09-06 07:10:31', '2017-09-06 07:10:31');
INSERT INTO `students` VALUES ('4', 'ww', '1', '22', '建筑系', '2017-09-06 07:12:48', '2017-09-06 07:12:48');
INSERT INTO `students` VALUES ('5', 'qq', '0', '19', '信息系', '2017-09-06 07:13:55', '2017-09-06 08:07:56');
INSERT INTO `students` VALUES ('6', 'ss', '0', '22', '计算机', '2017-09-07 06:06:28', '2017-09-07 06:06:28');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'TT', '1150976163@qq.com', '$2y$10$/vLR.G2O8A5WDzMPs3rpl.cuubkeSeSgvtgMez7JrZc5cApihxisi', '0', 'oCsrJUDMpt7Gr0xxTm9tHTJLsHFXTfbVnv8M2Q5amFCPgbKq2WxT52p8N2jK', '2017-09-05 01:33:32', '2017-09-11 15:45:15');
INSERT INTO `users` VALUES ('2', 'TT', 'ttforcoder@gmail.com', '$2y$10$1Qiq1FJh2l0oHEnsamTFSeQlAXaegGleEnP2bMI1HS.bO9/QZ09JS', '0', null, '2017-12-19 14:36:08', '2017-12-19 14:36:08');
INSERT INTO `users` VALUES ('3', 'TT', 'tt1150976163@outlook.com', '$2y$10$3pZ2c1ovN8U7AqfibD0XA.vDnoWshzinN6ie2AKf1YcHAf.FjJl2e', '0', null, '2018-09-11 13:20:54', '2018-09-11 13:20:54');
