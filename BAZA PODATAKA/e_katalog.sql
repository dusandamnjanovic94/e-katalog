/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : e_katalog

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-06-23 14:07:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for fotografija
-- ----------------------------
DROP TABLE IF EXISTS `fotografija`;
CREATE TABLE `fotografija` (
  `fotografija_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `laptop_id` int(10) unsigned NOT NULL,
  `fotografija` varchar(255) NOT NULL,
  PRIMARY KEY (`fotografija_id`),
  KEY `fk_fotografija_laptop_id` (`laptop_id`) USING BTREE,
  CONSTRAINT `fk_fotografija_laptop_id` FOREIGN KEY (`laptop_id`) REFERENCES `laptop` (`laptop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fotografija
-- ----------------------------
INSERT INTO `fotografija` VALUES ('1', '1', 'data/images/20200619125049000000-.jpg');
INSERT INTO `fotografija` VALUES ('2', '2', 'data/images/20200619125104000000-.jpg');
INSERT INTO `fotografija` VALUES ('3', '3', 'data/images/20200619125116000000-.jpg');
INSERT INTO `fotografija` VALUES ('4', '4', 'data/images/20200621020126000000-.jpg');
INSERT INTO `fotografija` VALUES ('5', '5', 'data/images/20200621020152000000-.jpg');
INSERT INTO `fotografija` VALUES ('6', '6', 'data/images/20200621020206000000-.jpg');
INSERT INTO `fotografija` VALUES ('7', '7', 'data/images/20200621020219000000-.jpg');
INSERT INTO `fotografija` VALUES ('8', '8', 'data/images/20200623135314000000-.jpg');

-- ----------------------------
-- Table structure for kategorija
-- ----------------------------
DROP TABLE IF EXISTS `kategorija`;
CREATE TABLE `kategorija` (
  `kategorija_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naziv_kategorije` varchar(128) NOT NULL,
  PRIMARY KEY (`kategorija_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kategorija
-- ----------------------------
INSERT INTO `kategorija` VALUES ('1', 'Gaming');
INSERT INTO `kategorija` VALUES ('2', 'Multimedia');
INSERT INTO `kategorija` VALUES ('3', 'Kancelarijski rad');
INSERT INTO `kategorija` VALUES ('5', 'Kancelarijski rad/Multimedia');

-- ----------------------------
-- Table structure for kontakt
-- ----------------------------
DROP TABLE IF EXISTS `kontakt`;
CREATE TABLE `kontakt` (
  `kontakt_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ime` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `naslov_poruke` varchar(64) NOT NULL,
  `poruka` text NOT NULL,
  PRIMARY KEY (`kontakt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kontakt
-- ----------------------------
INSERT INTO `kontakt` VALUES ('2', 'kontakt', 'kontakt@kontak.com', 'Kontak stranica', 'testiranje forme na kontakt stranici');

-- ----------------------------
-- Table structure for laptop
-- ----------------------------
DROP TABLE IF EXISTS `laptop`;
CREATE TABLE `laptop` (
  `laptop_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naziv_laptopa` varchar(128) NOT NULL,
  `kategorija_id` int(10) unsigned NOT NULL,
  `opis` text NOT NULL,
  `cena` varchar(16) NOT NULL,
  `slug` char(128) NOT NULL,
  PRIMARY KEY (`laptop_id`),
  KEY `fk_laptop_kategorija_id` (`kategorija_id`) USING BTREE,
  CONSTRAINT `fk_laptop_kategorija_id` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`kategorija_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of laptop
-- ----------------------------
INSERT INTO `laptop` VALUES ('1', 'Lenovo V15515API', '2', 'Lenovo V15515API modernog dizajna, nudi izuzetne performanse.', '43.457', 'lenovo-laptop-v155');
INSERT INTO `laptop` VALUES ('2', 'Dell NOT15139', '1', 'Dell NOT15139 modernog dizajna, nudi izuzetan doživljaj u gamingu.', '59.990', 'dell-laptop-inspiron');
INSERT INTO `laptop` VALUES ('3', 'Asus G731GU', '1', 'Asus G731GU modernog dizajna, nudi izuzetan doživljaj igra i multitaskinga.', '159.990', 'asus-laptop-g731');
INSERT INTO `laptop` VALUES ('4', 'Lenovo IdeapadS145', '2', 'Lenovo laptop koji će zadovoljiti sve Vaše potrebe! Elegantan, moćan dizajn-napravljen da traje! ', '75.800', 'lenovo-laptop-ideapad');
INSERT INTO `laptop` VALUES ('5', 'HP 7WE46EA', '1', 'HP 7WE46EA modernog dizajna, nudi izuzetan doživljaj igra i multitaskinga.', '89.990', 'lenovo-laptop-s145');
INSERT INTO `laptop` VALUES ('6', 'Lenovo 81NS005EYA', '3', 'Lenovo 81NS005EYA modernog dizajna, pravi izbor za kancelarijski računar.', '164.990', 'lenovo-laptop-81ns');
INSERT INTO `laptop` VALUES ('7', 'HP DB1129', '1', 'HP DB1129 modernog dizajna, nudi izuzetan doživljaj igra i multitaskinga.', '54.990', 'hp-laptop-db1129');
INSERT INTO `laptop` VALUES ('8', 'HP 8KU84EA', '1', 'Igraj u pokretu sa elegantnim računarom od metala. Ima manje od 2.5kg.', '69.990', 'hp-laptop-8KU84EA');

-- ----------------------------
-- Table structure for laptop_specifikacija
-- ----------------------------
DROP TABLE IF EXISTS `laptop_specifikacija`;
CREATE TABLE `laptop_specifikacija` (
  `laptop_specifikacija_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `laptop_id` int(10) unsigned NOT NULL,
  `specifikacija_id` int(10) unsigned NOT NULL,
  `vrednost` varchar(32) NOT NULL,
  PRIMARY KEY (`laptop_specifikacija_id`),
  UNIQUE KEY `un_laptop_id_specifikacija_id` (`laptop_id`,`specifikacija_id`) USING BTREE,
  KEY `fk_laptop_specifikacija_laptop_id` (`laptop_id`) USING BTREE,
  KEY `fk_laptop_specifikacija_specifikacija_id` (`specifikacija_id`) USING BTREE,
  CONSTRAINT `fk_laptop_specifikacija_laptop_id` FOREIGN KEY (`laptop_id`) REFERENCES `laptop` (`laptop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_laptop_specifikacija_specifikacija_id` FOREIGN KEY (`specifikacija_id`) REFERENCES `specifikacija` (`specifikacija_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of laptop_specifikacija
-- ----------------------------
INSERT INTO `laptop_specifikacija` VALUES ('1', '1', '1', 'Windows 10');
INSERT INTO `laptop_specifikacija` VALUES ('2', '1', '2', 'Intel N5000 Quad Core');
INSERT INTO `laptop_specifikacija` VALUES ('3', '1', '3', '4 jezgra');
INSERT INTO `laptop_specifikacija` VALUES ('4', '1', '4', '4GB DDR4');
INSERT INTO `laptop_specifikacija` VALUES ('5', '1', '5', '256GB SSD');
INSERT INTO `laptop_specifikacija` VALUES ('6', '1', '6', '15.6\"');
INSERT INTO `laptop_specifikacija` VALUES ('7', '1', '7', 'FullHD, LED');
INSERT INTO `laptop_specifikacija` VALUES ('8', '2', '1', 'Linux');
INSERT INTO `laptop_specifikacija` VALUES ('9', '2', '2', 'Intel Core i3-1005G1');
INSERT INTO `laptop_specifikacija` VALUES ('10', '2', '4', '8 GB DDR4');
INSERT INTO `laptop_specifikacija` VALUES ('12', '2', '5', '256 GB SSD');
INSERT INTO `laptop_specifikacija` VALUES ('13', '2', '6', '15,6\"');
INSERT INTO `laptop_specifikacija` VALUES ('14', '2', '7', 'LED Anti-Glare');
INSERT INTO `laptop_specifikacija` VALUES ('15', '3', '1', 'Windows 10');
INSERT INTO `laptop_specifikacija` VALUES ('16', '3', '2', 'Intel Core i5-9300H');
INSERT INTO `laptop_specifikacija` VALUES ('17', '3', '3', '4 jezgra');
INSERT INTO `laptop_specifikacija` VALUES ('18', '3', '4', '16GB DDR4');
INSERT INTO `laptop_specifikacija` VALUES ('19', '3', '5', '512GB SSD');
INSERT INTO `laptop_specifikacija` VALUES ('20', '3', '6', '17.3\"');
INSERT INTO `laptop_specifikacija` VALUES ('21', '3', '7', 'FullHD 16:9');
INSERT INTO `laptop_specifikacija` VALUES ('22', '4', '1', 'Windows 10 Home');
INSERT INTO `laptop_specifikacija` VALUES ('23', '4', '2', 'Intel Core i7-8565u');
INSERT INTO `laptop_specifikacija` VALUES ('24', '4', '4', '12GB DDR4');
INSERT INTO `laptop_specifikacija` VALUES ('25', '4', '5', '512GB SSD');
INSERT INTO `laptop_specifikacija` VALUES ('26', '4', '6', '15.6\"');
INSERT INTO `laptop_specifikacija` VALUES ('27', '5', '1', 'FreeDOS 2.0');
INSERT INTO `laptop_specifikacija` VALUES ('28', '5', '2', 'Intel Celeron N3060 Dual Core');
INSERT INTO `laptop_specifikacija` VALUES ('29', '5', '4', '4GB DDR3L');
INSERT INTO `laptop_specifikacija` VALUES ('30', '5', '5', '128GB SSD');
INSERT INTO `laptop_specifikacija` VALUES ('31', '5', '6', '15.6\"');
INSERT INTO `laptop_specifikacija` VALUES ('32', '6', '1', 'NEMA');
INSERT INTO `laptop_specifikacija` VALUES ('33', '6', '2', 'Intel Core i5');
INSERT INTO `laptop_specifikacija` VALUES ('34', '6', '4', '16GB DDR4');
INSERT INTO `laptop_specifikacija` VALUES ('35', '6', '5', '1TB SSD');
INSERT INTO `laptop_specifikacija` VALUES ('36', '6', '6', '15.6\"');
INSERT INTO `laptop_specifikacija` VALUES ('37', '7', '1', 'Windows 10 HOME');
INSERT INTO `laptop_specifikacija` VALUES ('38', '7', '2', 'AMD Ryzen 3 3200U');
INSERT INTO `laptop_specifikacija` VALUES ('39', '7', '3', '2 jezgra');
INSERT INTO `laptop_specifikacija` VALUES ('40', '7', '4', '8GB DDR4');
INSERT INTO `laptop_specifikacija` VALUES ('41', '7', '5', '512GB');
INSERT INTO `laptop_specifikacija` VALUES ('42', '7', '6', '15.6\"');
INSERT INTO `laptop_specifikacija` VALUES ('43', '7', '7', 'HD SVA BrightView');
INSERT INTO `laptop_specifikacija` VALUES ('44', '8', '1', 'Windows 10 HOME');
INSERT INTO `laptop_specifikacija` VALUES ('45', '8', '2', 'AMD Ryzen 7 3700U Quad Core');
INSERT INTO `laptop_specifikacija` VALUES ('46', '8', '4', '12 GB DDR4');
INSERT INTO `laptop_specifikacija` VALUES ('47', '8', '5', '512 GB SSD');
INSERT INTO `laptop_specifikacija` VALUES ('48', '8', '6', '15.6\"');
INSERT INTO `laptop_specifikacija` VALUES ('49', '8', '7', 'FHD SVA Anti-Glare');

-- ----------------------------
-- Table structure for specifikacija
-- ----------------------------
DROP TABLE IF EXISTS `specifikacija`;
CREATE TABLE `specifikacija` (
  `specifikacija_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naziv_specifikacije` varchar(64) NOT NULL,
  PRIMARY KEY (`specifikacija_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of specifikacija
-- ----------------------------
INSERT INTO `specifikacija` VALUES ('1', 'Operativni sistem');
INSERT INTO `specifikacija` VALUES ('2', 'Procesor');
INSERT INTO `specifikacija` VALUES ('3', 'Broj jezgara');
INSERT INTO `specifikacija` VALUES ('4', 'RAM memorija');
INSERT INTO `specifikacija` VALUES ('5', 'SSD');
INSERT INTO `specifikacija` VALUES ('6', 'Dijagonala ekrana');
INSERT INTO `specifikacija` VALUES ('7', 'Tip ekrana');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '06828b023332bf786263c93864ab9a173f8fdff44223d3a2c76d8487e6c93aaa3f99f251c08ed5a5ba1500fbda02af0719a4aac561302b4f0bd3eadfbae19082', '1');
DROP TRIGGER IF EXISTS `kategorija_triger`;
DELIMITER ;;
CREATE TRIGGER `kategorija_triger` BEFORE INSERT ON `kategorija` FOR EACH ROW BEGIN
IF NEW.naziv_kategorije NOT RLIKE BINARY '^[A-Za-z0-9]{6,}$' THEN 
SIGNAL SQLSTATE  "45000";
END IF;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `specifikacija_triger`;
DELIMITER ;;
CREATE TRIGGER `specifikacija_triger` BEFORE INSERT ON `specifikacija` FOR EACH ROW BEGIN
IF NEW.naziv_specifikacije NOT RLIKE BINARY '^[A-Za-z]{3,}$' THEN 
SIGNAL SQLSTATE  "45000";
END IF;
END
;;
DELIMITER ;
