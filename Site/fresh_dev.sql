/*
 Navicat Premium Data Transfer

 Source Server         : Fresh_Dev
 Source Server Type    : MySQL
 Source Server Version : 100130
 Source Host           : localhost:3306
 Source Schema         : fresh_dev

 Target Server Type    : MySQL
 Target Server Version : 100130
 File Encoding         : 65001

 Date: 08/04/2019 10:49:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `username` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  UNIQUE INDEX `username`(`username`(20)) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('Ivar', 'test123', '12321.post@gmail.com', 1);

SET FOREIGN_KEY_CHECKS = 1;
