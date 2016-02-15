/*
Navicat MySQL Data Transfer

Source Server         : Me
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : domain_jump

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2016-02-15 21:28:08
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
  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '域名跳转结束时间',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `edit_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '编辑时间',
  PRIMARY KEY (`domain_id`),
  UNIQUE KEY `domain` (`domain`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='域名列表';

-- ----------------------------
-- Records of jp_domain
-- ----------------------------
INSERT INTO `jp_domain` VALUES ('1', '宇哥哥', 'yusure.cn', 'http://zhenghaosj.b2b.huishangbao.com/', '1456675200', '1455442324', '0');
INSERT INTO `jp_domain` VALUES ('6', '宇哥哥', 'www.yusure.cn', 'http://zhenghaosj.b2b.huishangbao.com/', '1456675200', '1455446595', '0');
INSERT INTO `jp_domain` VALUES ('7', '宇哥哥', 'w1ww.yusure.cn', 'http://zhenghaosj.b2b.huishangbao.com/', '1456243200', '1455446918', '0');
INSERT INTO `jp_domain` VALUES ('8', '宇哥哥', 'w41ww.yusure.cn', 'http://zhenghaosj.b2b.huishangbao.com/', '1456243200', '1455446958', '0');
INSERT INTO `jp_domain` VALUES ('9', '于帅的', 'wwyusure.cn', 'http://zhenghaosj.b2b.huishangbao.com/', '1455379200', '1455452368', '0');
INSERT INTO `jp_domain` VALUES ('10', '于帅的', 'ww3yusure.cn', 'http://zhenghaosj.b2b.huishangbao.com/', '1455379200', '1455452368', '0');
INSERT INTO `jp_domain` VALUES ('11', '鹤山市龙超包装材有限公司', 'wuwenjin.com', 'http://zhenzhumian.b2b.huishangbao.com/', '1487088000', '1455502506', '0');
INSERT INTO `jp_domain` VALUES ('12', '沧州胜利印刷包装有限公司', 'shlbzys.com', 'http://bzyinshua.b2b.huishangbao.com/', '1487088000', '1455502575', '0');
INSERT INTO `jp_domain` VALUES ('13', '新乡市荣飞橡塑', 'rongfeixiangsu.com', 'http://zhuyupeng.b2b.huishangbao.com/', '1518624000', '1455502623', '0');
INSERT INTO `jp_domain` VALUES ('14', '新乡市荣飞橡塑', 'www.rongfeixiangsu.com', 'http://zhenghaosj.b2b.huishangbao.com/', '1582128000', '1455502659', '1455520149');
INSERT INTO `jp_domain` VALUES ('15', '沧州胜利印刷包装有限公司', 'www.shlbzys.com', 'http://zhenghaosj.b2b.huishangbao.com/', '1456243200', '1455502729', '1455523045');
INSERT INTO `jp_domain` VALUES ('16', '新乡市荣飞橡塑', 'rrryusure.cn', 'http://zhenghaosj.b2b.huishangbao.com/', '1487865600', '1455514613', '1455523225');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COMMENT='系统日志表';

-- ----------------------------
-- Records of jp_log
-- ----------------------------
INSERT INTO `jp_log` VALUES ('1', '1455514518', '1', 'yusure', '登陆系统');
INSERT INTO `jp_log` VALUES ('2', '1455514613', '1', 'yusure', '添加域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('3', '1455520210', '1', 'yusure', '编辑域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('4', '1455522298', '1', 'yusure', '编辑域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('5', '1455522459', '1', 'yusure', '编辑域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('6', '1455522513', '1', 'yusure', '编辑域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('7', '1455522948', '1', 'yusure', '编辑域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('8', '1455522992', '1', 'yusure', '编辑域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('9', '1455522997', '1', 'yusure', '编辑域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('10', '1455523011', '1', 'yusure', '编辑域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('11', '1455523035', '1', 'yusure', '编辑域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('12', '1455523040', '1', 'yusure', '编辑域名www.shlbzys.com');
INSERT INTO `jp_log` VALUES ('13', '1455523045', '1', 'yusure', '编辑域名www.shlbzys.com');
INSERT INTO `jp_log` VALUES ('14', '1455523139', '1', 'yusure', '编辑域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('15', '1455523225', '1', 'yusure', '编辑域名rrryusure.cn');
INSERT INTO `jp_log` VALUES ('16', '1455528060', '1', 'yusure', '修改密码');
INSERT INTO `jp_log` VALUES ('17', '1455528071', '1', 'yusure', '登陆系统');
INSERT INTO `jp_log` VALUES ('18', '1455528101', '1', 'yusure', '修改密码');
INSERT INTO `jp_log` VALUES ('19', '1455528134', '1', 'yusure', '登陆系统');
INSERT INTO `jp_log` VALUES ('20', '1455528206', '1', 'yusure', '修改密码');
INSERT INTO `jp_log` VALUES ('21', '1455528246', '1', 'yusure', '登陆系统');
INSERT INTO `jp_log` VALUES ('22', '1455528258', '1', 'yusure', '修改密码');
INSERT INTO `jp_log` VALUES ('23', '1455528289', '1', 'yusure', '登陆系统');
INSERT INTO `jp_log` VALUES ('24', '1455528301', '1', 'yusure', '修改密码');
INSERT INTO `jp_log` VALUES ('25', '1455528390', '1', 'yusure', '登陆系统');
INSERT INTO `jp_log` VALUES ('26', '1455528465', '1', 'yusure', '修改密码');
INSERT INTO `jp_log` VALUES ('27', '1455528478', '1', 'yusure', '登陆系统');
INSERT INTO `jp_log` VALUES ('28', '1455528508', '1', 'yusure', '修改密码');
INSERT INTO `jp_log` VALUES ('29', '1455528518', '1', 'yusure', '登陆系统');

-- ----------------------------
-- Table structure for jp_user
-- ----------------------------
DROP TABLE IF EXISTS `jp_user`;
CREATE TABLE `jp_user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `user_passwd` varchar(32) NOT NULL COMMENT '密码',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of jp_user
-- ----------------------------
INSERT INTO `jp_user` VALUES ('1', 'yusure', '96e79218965eb72c92a549dd5a330112');
INSERT INTO `jp_user` VALUES ('2', 'shadow', '3bf1114a986ba87ed28fc1b5884fc2f8');
INSERT INTO `jp_user` VALUES ('3', 'liushuzhen', 'e10adc3949ba59abbe56e057f20f883e');
