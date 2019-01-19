/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50721
Source Host           : 127.0.0.1:3306
Source Database       : db_pemesanan_makanan

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2019-01-19 23:34:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_makanan
-- ----------------------------
DROP TABLE IF EXISTS `tb_makanan`;
CREATE TABLE `tb_makanan` (
  `id_makanan` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_makanan
-- ----------------------------
INSERT INTO `tb_makanan` VALUES ('M0001', 'Nasi Goreng', '10000', 'Tersedia');

-- ----------------------------
-- Table structure for tb_minuman
-- ----------------------------
DROP TABLE IF EXISTS `tb_minuman`;
CREATE TABLE `tb_minuman` (
  `id_minuman` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_minuman`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_minuman
-- ----------------------------
INSERT INTO `tb_minuman` VALUES ('MN012', 'Es Teh', '2500', 'Tersedia');

-- ----------------------------
-- Table structure for tb_pesanan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pesanan`;
CREATE TABLE `tb_pesanan` (
  `id_pesanan` varchar(255) NOT NULL,
  `no_meja` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_pesanan
-- ----------------------------

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `level` enum('admin','pelayan','kasir') DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');
INSERT INTO `tb_user` VALUES ('kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir');
INSERT INTO `tb_user` VALUES ('pelayan', '511cc40443f2a1ab03ab373b77d28091', 'pelayan');
