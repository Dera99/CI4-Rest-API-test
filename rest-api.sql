/*
 Navicat Premium Data Transfer

 Source Server         : db
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : rest-api

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 24/05/2023 15:52:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (3, '2023-05-24-044339', 'App\\Database\\Migrations\\Users', 'default', 'App', 1684905269, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `profile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'masterblade@mail.com', 'masterblats', '$2y$10$3/xzslVi9r1s9de9G4eCT.6zNgu4VXFioClaO.6xhCKqIpXL.fKwu', 'Untitled.jpg', '0000-00-00 00:00:00', '2023-05-24 08:32:24');
INSERT INTO `users` VALUES (2, 'admin@gmail.com', 'masterblad1', '$2y$10$m1srf.Q10MxFNLtk1HDihuyIGCyIHyftbxHx9LWSZ6Dp/dlIj0FLa', 'Untitled.jpg', '2023-05-24 06:19:57', '2023-05-24 08:32:14');
INSERT INTO `users` VALUES (3, 'admin@gmail.com', 'masterblad12', '$2y$10$PEIED/KQ9YSZa5wZ7W8Ms.alio5jmsW9EIc1jepAs7gjX8Iajaee6', 'Untitled.jpg', '2023-05-24 06:38:57', '2023-05-24 06:38:57');

SET FOREIGN_KEY_CHECKS = 1;
