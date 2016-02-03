/*
Navicat MySQL Data Transfer

Source Server         : Me
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : domain_jump

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2016-02-02 14:35:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jp_domain
-- ----------------------------
DROP TABLE IF EXISTS `jp_domain`;
CREATE TABLE `jp_domain` (
  `domain_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(100) NOT NULL COMMENT '网站名称',
  `domain` varchar(255) NOT NULL COMMENT '域名',
  `jump_domain` varchar(255) NOT NULL COMMENT '跳转至域名',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '域名跳转开始时间',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '域名跳转结束时间',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `edit_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '编辑时间',
  PRIMARY KEY (`domain_id`),
  UNIQUE KEY `domain` (`domain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='域名列表';

-- ----------------------------
-- Records of jp_domain
-- ----------------------------

-- ----------------------------
-- Table structure for jp_log
-- ----------------------------
DROP TABLE IF EXISTS `jp_log`;
CREATE TABLE `jp_log` (
  `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增日志ID',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户ID',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `log_msg` varchar(255) NOT NULL COMMENT '日志信息',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统日志表';

-- ----------------------------
-- Records of jp_log
-- ----------------------------

-- ----------------------------
-- Table structure for jp_user
-- ----------------------------
DROP TABLE IF EXISTS `jp_user`;
CREATE TABLE `jp_user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `user_passwd` varchar(32) NOT NULL COMMENT '密码',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jp_user
-- ----------------------------
INSERT INTO `jp_user` VALUES ('1', 'yusure', 'e10adc3949ba59abbe56e057f20f883e');
