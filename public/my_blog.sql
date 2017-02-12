/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : my_blog

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-02-13 02:37:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for y_comm
-- ----------------------------
DROP TABLE IF EXISTS `y_comm`;
CREATE TABLE `y_comm` (
  `oid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `ctime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of y_comm
-- ----------------------------
INSERT INTO `y_comm` VALUES ('1', '1', '0', '1', '1', '12222222');
INSERT INTO `y_comm` VALUES ('2', '1', '1', '2', '2', '1222222222');
INSERT INTO `y_comm` VALUES ('3', '1', '2', '3', '3', '12222222222');
INSERT INTO `y_comm` VALUES ('5', '1', '2', '11111', '11111', '1486910211');
INSERT INTO `y_comm` VALUES ('6', '1', '2', '大师傅大师傅的事', '阿斯达法师的萨嘎达是否感到舒服', '1486910267');
INSERT INTO `y_comm` VALUES ('9', '1', '2', '大家更好的发挥', '124司法的说法', '1486910633');
INSERT INTO `y_comm` VALUES ('8', '1', '0', '爱对方大哥大说过', '撒范德萨分', '1486910487');
INSERT INTO `y_comm` VALUES ('10', '1', '2', '大家更好的发挥', '124司法的说法', '1486910674');
INSERT INTO `y_comm` VALUES ('11', '1', '2', '大家更好的发挥', '124司法的说法', '1486910693');
INSERT INTO `y_comm` VALUES ('12', '1', '2', '大家更好的发挥', '124司法的说法', '1486910723');
INSERT INTO `y_comm` VALUES ('13', '1', '2', '大家更好的发挥', '124司法的说法', '1486910724');
INSERT INTO `y_comm` VALUES ('14', '1', '2', '大家更好的发挥', '124司法的说法', '1486910739');
INSERT INTO `y_comm` VALUES ('15', '1', '2', '大家更好的发挥', '124司法的说法', '1486910740');
INSERT INTO `y_comm` VALUES ('16', '1', '2', '大家更好的发挥', '124司法的说法', '1486910746');
INSERT INTO `y_comm` VALUES ('17', '1', '2', '大家更好的发挥', '124司法的说法', '1486910747');
INSERT INTO `y_comm` VALUES ('18', '1', '2', '大家更好的发挥', '124司法的说法', '1486910763');
INSERT INTO `y_comm` VALUES ('19', '1', '2', '大家更好的发挥', '124司法的说法', '1486910778');
INSERT INTO `y_comm` VALUES ('20', '1', '2', '大家更好的发挥', '124司法的说法', '1486912795');
INSERT INTO `y_comm` VALUES ('21', '1', '2', '大家更好的发挥', '124司法的说法', '1486912832');
INSERT INTO `y_comm` VALUES ('22', '1', '2', '大家更好的发挥', '124司法的说法', '1486913262');
INSERT INTO `y_comm` VALUES ('23', '1', '2', '大家更好的发挥', '124司法的说法', '1486914022');
INSERT INTO `y_comm` VALUES ('24', '1', '2', '大家更好的发挥', '124司法的说法', '1486914022');
INSERT INTO `y_comm` VALUES ('25', '1', '2', '大家更好的发挥', '124司法的说法', '1486914210');
INSERT INTO `y_comm` VALUES ('26', '1', '2', '大家更好的发挥', '124司法的说法', '1486914269');
INSERT INTO `y_comm` VALUES ('27', '2', '0', '爱上对方大使馆看见了；啊', 'hjkkkkkkladsfjh就好看啦电视广告点击开始', '1486923795');
INSERT INTO `y_comm` VALUES ('28', '2', '0', '发达说法的说法', '大大方的说法', '1486924477');

-- ----------------------------
-- Table structure for y_topic
-- ----------------------------
DROP TABLE IF EXISTS `y_topic`;
CREATE TABLE `y_topic` (
  `aid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `ctime` varchar(255) DEFAULT NULL,
  `display` int(1) DEFAULT '1',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of y_topic
-- ----------------------------
INSERT INTO `y_topic` VALUES ('1', '1', '1', '1', '1');
INSERT INTO `y_topic` VALUES ('2', '21', '12412', '123123', '1');
INSERT INTO `y_topic` VALUES ('3', '4141', '312412', '2112313', '1');
INSERT INTO `y_topic` VALUES ('4', '123432', '13243', '213412312', '1');
INSERT INTO `y_topic` VALUES ('5', '', '', '1486923814', '1');
INSERT INTO `y_topic` VALUES ('6', '<p>爱的萨嘎达官合法的</p>', '', '1486923910', '1');
INSERT INTO `y_topic` VALUES ('7', '', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '1486923944', '1');
INSERT INTO `y_topic` VALUES ('8', '', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '1486923963', '1');
INSERT INTO `y_topic` VALUES ('9', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '1486923969', '1');
INSERT INTO `y_topic` VALUES ('10', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '1486924002', '1');
INSERT INTO `y_topic` VALUES ('11', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '1486924069', '1');
INSERT INTO `y_topic` VALUES ('12', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '1486924106', '1');
INSERT INTO `y_topic` VALUES ('13', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '1486924129', '1');
INSERT INTO `y_topic` VALUES ('14', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '1486924166', '1');
INSERT INTO `y_topic` VALUES ('15', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '1486924196', '1');
INSERT INTO `y_topic` VALUES ('16', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '<p>爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的爱的萨嘎达官合法的</p>', '1486924255', '1');
SET FOREIGN_KEY_CHECKS=1;
