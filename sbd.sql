/*
 Navicat Premium Data Transfer

 Source Server         : Main
 Source Server Type    : MySQL
 Source Server Version : 50718
 Source Host           : localhost:3306
 Source Schema         : sbd

 Target Server Type    : MySQL
 Target Server Version : 50718
 File Encoding         : 65001

 Date: 27/11/2017 17:14:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sbd_admin
-- ----------------------------
DROP TABLE IF EXISTS `sbd_admin`;
CREATE TABLE `sbd_admin`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shopPhone` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sbd_admin
-- ----------------------------
INSERT INTO `sbd_admin` VALUES (19, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin.qq.com', '11111111111');

-- ----------------------------
-- Table structure for sbd_order
-- ----------------------------
DROP TABLE IF EXISTS `sbd_order`;
CREATE TABLE `sbd_order`  (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `userHome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `userPhone` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pay` int(1) NULL DEFAULT NULL,
  `orderTime` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shopId` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shopName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `receivedTime` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `received` int(1) NULL DEFAULT NULL,
  `proName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 116 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sbd_order
-- ----------------------------
INSERT INTO `sbd_order` VALUES (94, '电讯 24-6-15', 'wkd', '50', '15523924863', 1, '1511773521', '1001', '洪湖藕王', '1511773621', 1, '毛血旺');
INSERT INTO `sbd_order` VALUES (95, '电讯 24-6-15', 'wkd', '50', '15523924863', 1, '1511773540', '1001', '洪湖藕王', '1511773640', 1, '毛血旺');
INSERT INTO `sbd_order` VALUES (96, '电讯 24-6-15', 'wkd', '60', '15523924863', 1, '1511773540', '1002', '川湘鱼庄', '1511773640', 1, '石锅鱼');
INSERT INTO `sbd_order` VALUES (97, '电讯 24-6-15', 'wkd', '12', '15523924863', 1, '1511773540', '1002', '川湘鱼庄', '1511773640', 1, '劲酒35°');
INSERT INTO `sbd_order` VALUES (98, '电讯 24-6-15', 'wkd', '10', '15523924863', 1, '1511773540', '1002', '川湘鱼庄', '1511773640', 1, '山城啤酒');
INSERT INTO `sbd_order` VALUES (99, '电讯 24-6-15', 'wkd', '50', '15523924863', 1, '1511773540', '1002', '川湘鱼庄', '1511773640', 1, '剁椒鱼头');
INSERT INTO `sbd_order` VALUES (100, '电讯 24-6-15', 'wkd', '50', '15523924863', 1, '1511773540', '1002', '川湘鱼庄', '1511773640', 1, '剁椒鱼头');
INSERT INTO `sbd_order` VALUES (101, '电讯 24-6-15', 'wkd', '80', '15523924863', 1, '1511773554', '1003', '重庆潼南太安鱼', '1511773654', 1, '豆腐太安鱼');
INSERT INTO `sbd_order` VALUES (102, '电讯 24-6-15', 'wkd', '100', '15523924863', 1, '1511773554', '1003', '重庆潼南太安鱼', '1511773654', 1, '川味太安鱼');
INSERT INTO `sbd_order` VALUES (103, '电讯 24-6-15', 'wkd', '80', '15523924863', 1, '1511773566', '1003', '重庆潼南太安鱼', '1511773666', 1, '豆腐太安鱼');
INSERT INTO `sbd_order` VALUES (104, '电讯 24-6-15', 'wkd', '100', '15523924863', 1, '1511773566', '1003', '重庆潼南太安鱼', '1511773666', 1, '川味太安鱼');
INSERT INTO `sbd_order` VALUES (105, '电讯 24-6-15', 'wkd', '10', '15523924863', 1, '1511773566', '1005', '熊熊家常菜', '1511773666', 1, '西红柿蛋汤');
INSERT INTO `sbd_order` VALUES (106, '电讯 24-6-15', 'wkd', '20', '15523924863', 1, '1511773566', '1005', '熊熊家常菜', '1511773666', 1, '单身20年手速卤鸡爪');
INSERT INTO `sbd_order` VALUES (107, '电讯 24-6-15', 'wkd', '40', '15523924863', 1, '1511773566', '1005', '熊熊家常菜', '1511773666', 1, '片牛肉');
INSERT INTO `sbd_order` VALUES (108, '电讯 24-6-15', 'wkd', '10', '15523924863', 1, '1511773580', '1006', '程序猿', '1511773680', 1, '不要404油条');
INSERT INTO `sbd_order` VALUES (109, '电讯 24-6-15', 'wkd', '30', '15523924863', 1, '1511773580', '1006', '程序猿', '1511773680', 1, '回滚代码糖醋鱼柳');
INSERT INTO `sbd_order` VALUES (110, '521', '100200', '10', '13983378069', 1, '1511773849', '1006', '程序猿', '1511773949', 1, '不要404油条');
INSERT INTO `sbd_order` VALUES (111, '521', '100200', '30', '13983378069', 1, '1511773850', '1006', '程序猿', '1511773950', 1, '回滚代码糖醋鱼柳');
INSERT INTO `sbd_order` VALUES (112, '521', '100200', '50', '13983378069', 1, '1511773850', '1002', '川湘鱼庄', '1511773950', 1, '剁椒鱼头');
INSERT INTO `sbd_order` VALUES (113, '521', '100200', '10', '13983378069', 1, '1511773850', '1002', '川湘鱼庄', '1511773950', 1, '山城啤酒');
INSERT INTO `sbd_order` VALUES (114, '521', '100200', '12', '13983378069', 1, '1511773850', '1002', '川湘鱼庄', '1511773950', 1, '劲酒35°');
INSERT INTO `sbd_order` VALUES (115, '521', '100200', '40', '13983378069', 1, '1511773850', '1004', '龙凤关东煮', '1511773950', 1, '关东煮大杂烩');

-- ----------------------------
-- Table structure for sbd_pro
-- ----------------------------
DROP TABLE IF EXISTS `sbd_pro`;
CREATE TABLE `sbd_pro`  (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `pSn` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pName` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `adminName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shopId` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `icon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pubTime` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `username`(`adminName`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 139 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sbd_pro
-- ----------------------------
INSERT INTO `sbd_pro` VALUES (98, '1511770635845', '剁椒太安鱼', 'admin', '1003', '80', '1511770635845.png', '1511770636');
INSERT INTO `sbd_pro` VALUES (99, '1511770741051', '豆腐太安鱼', 'admin', '1003', '80', '1511770741051.png', '1511770741');
INSERT INTO `sbd_pro` VALUES (100, '1511770903045', '川味太安鱼', 'admin', '1003', '100', '1511770903045.png', '1511770903');
INSERT INTO `sbd_pro` VALUES (101, '1511771269014', '煲大虾(量足)', 'admin', '1000', '50', '1511771269014.jpg', '1511771269');
INSERT INTO `sbd_pro` VALUES (102, '1511771425968', '煲肥肠(味多增)', 'admin', '1000', '60', '1511771425968.png', '1511771425');
INSERT INTO `sbd_pro` VALUES (103, '1511771559499', '片牛肉', 'admin', '1005', '40', '1511771559499.png', '1511771559');
INSERT INTO `sbd_pro` VALUES (104, '1511771720552', '小瓶雪碧(冰)', 'admin', '1003', '3', '1511771720552.png', '1511771720');
INSERT INTO `sbd_pro` VALUES (105, '1511771814582', '家庭装大瓶雪碧', 'admin', '1003', '15', '1511771814582.png', '1511771814');
INSERT INTO `sbd_pro` VALUES (106, '1511772194364', '油炸产品经理', 'admin', '1006', '404', '1511772194364.png', '1511772194');
INSERT INTO `sbd_pro` VALUES (107, '1511772281356', '不要404油条', 'admin', '1006', '10', '1511772281356.png', '1511772281');
INSERT INTO `sbd_pro` VALUES (108, '1511772342722', '回滚代码糖醋鱼柳', 'admin', '1006', '30', '1511772342722.png', '1511772342');
INSERT INTO `sbd_pro` VALUES (109, '1511772443526', '关东煮大杂烩', 'admin', '1004', '40', '1511772443526.jpg', '1511772443');
INSERT INTO `sbd_pro` VALUES (110, '1511772488386', '鸡公煲', 'admin', '1000', '50', '1511772488386.jpg', '1511772488');
INSERT INTO `sbd_pro` VALUES (111, '1511772525142', '单身20年手速卤鸡爪', 'admin', '1005', '20', '1511772525142.jpg', '1511772525');
INSERT INTO `sbd_pro` VALUES (112, '1511772546161', '麻辣香锅', 'admin', '1005', '40', '1511772546161.jpg', '1511772546');
INSERT INTO `sbd_pro` VALUES (113, '1511772576635', '水煮设计师', 'admin', '1006', '60', '1511772576635.jpg', '1511772576');
INSERT INTO `sbd_pro` VALUES (114, '1511772600619', '永不宕机养生鸡汤', 'admin', '1006', '70', '1511772600619.jpg', '1511772600');
INSERT INTO `sbd_pro` VALUES (115, '1511772643334', '黑糖莲藕凉糕', 'admin', '1001', '20', '1511772643334.jpg', '1511772643');
INSERT INTO `sbd_pro` VALUES (116, '1511772663134', '莲藕饼', 'admin', '1001', '20', '1511772663134.jpg', '1511772663');
INSERT INTO `sbd_pro` VALUES (117, '1511772681965', '莲藕茶', 'admin', '1001', '30', '1511772681965.jpg', '1511772681');
INSERT INTO `sbd_pro` VALUES (118, '1511772695245', '凉拌藕片', 'admin', '1001', '15', '1511772695245.jpg', '1511772695');
INSERT INTO `sbd_pro` VALUES (119, '1511772717844', '柳橙藕粉凉冻', 'admin', '1001', '35', '1511772717844.jpg', '1511772717');
INSERT INTO `sbd_pro` VALUES (120, '1511772728987', '藕香小排粥', 'admin', '1001', '45', '1511772728987.jpg', '1511772728');
INSERT INTO `sbd_pro` VALUES (121, '1511772750085', '黄瓜皮蛋汤', 'admin', '1005', '20', '1511772750085.jpg', '1511772750');
INSERT INTO `sbd_pro` VALUES (122, '1511772763817', '肉片汤', 'admin', '1005', '25', '1511772763817.jpg', '1511772763');
INSERT INTO `sbd_pro` VALUES (123, '1511772779457', '西红柿蛋汤', 'admin', '1005', '10', '1511772779457.jpg', '1511772779');
INSERT INTO `sbd_pro` VALUES (124, '1511772790872', '小菜豆腐汤', 'admin', '1005', '10', '1511772790872.jpg', '1511772790');
INSERT INTO `sbd_pro` VALUES (125, '1511772801426', '紫菜蛋花汤', 'admin', '1005', '10', '1511772801426.jpg', '1511772801');
INSERT INTO `sbd_pro` VALUES (126, '1511772867840', '红烧肉', 'admin', '1006', '50', '1511772867840.jpg', '1511772867');
INSERT INTO `sbd_pro` VALUES (127, '1511772878410', '代码回锅', 'admin', '1006', '50', '1511772878410.jpg', '1511772878');
INSERT INTO `sbd_pro` VALUES (128, '1511772887904', '酱牛肉', 'admin', '1006', '50', '1511772887904.jpg', '1511772887');
INSERT INTO `sbd_pro` VALUES (129, '1511772900511', '毛血旺', 'admin', '1001', '50', '1511772900511.jpg', '1511772900');
INSERT INTO `sbd_pro` VALUES (130, '1511772911527', '烧白', 'admin', '1006', '100', '1511772911527.jpg', '1511772911');
INSERT INTO `sbd_pro` VALUES (131, '1511772923776', '蒜泥白肉', 'admin', '1005', '40', '1511772923776.jpg', '1511772923');
INSERT INTO `sbd_pro` VALUES (132, '1511773043436', '山城啤酒', 'admin', '1002', '10', '1511773043436.png', '1511773043');
INSERT INTO `sbd_pro` VALUES (133, '1511773127788', '劲酒35°', 'admin', '1002', '12', '1511773127788.png', '1511773127');
INSERT INTO `sbd_pro` VALUES (134, '1511773178290', '国宾', 'admin', '1003', '10', '1511773178290.jpg', '1511773178');
INSERT INTO `sbd_pro` VALUES (135, '1511773217759', '江小白40°', 'admin', '1003', '30', '1511773217759.jpg', '1511773217');
INSERT INTO `sbd_pro` VALUES (136, '1511773278591', '剁椒鱼头', 'admin', '1002', '50', '1511773278591.jpg', '1511773278');
INSERT INTO `sbd_pro` VALUES (137, '1511773292379', '石锅鱼', 'admin', '1002', '60', '1511773292379.jpg', '1511773292');
INSERT INTO `sbd_pro` VALUES (138, '1511773337544', '钵钵鱼', 'admin', '1002', '55', '1511773337544.jpg', '1511773337');

-- ----------------------------
-- Table structure for sbd_shop
-- ----------------------------
DROP TABLE IF EXISTS `sbd_shop`;
CREATE TABLE `sbd_shop`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shopId` int(9) NOT NULL,
  `shopName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shopTip` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shopState` int(1) NULL DEFAULT NULL,
  `shopIcon` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shopBlock` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shopFloor` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 62 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sbd_shop
-- ----------------------------
INSERT INTO `sbd_shop` VALUES (55, 'admin', 1000, '汉食坊-金刚煲王', '新开张，一律九折！', 1, '1000.png', '电讯一食堂', '1-01');
INSERT INTO `sbd_shop` VALUES (56, 'admin', 1001, '洪湖藕王', '电讯连锁店，店长倾力推荐，巴适的很！', 1, '1001.png', '电讯二食堂', '2-11');
INSERT INTO `sbd_shop` VALUES (57, 'admin', 1002, '川湘鱼庄', '每客10元，加鱼加菜不加价！', 1, '1002.png', '双福晶彩城', '5-11');
INSERT INTO `sbd_shop` VALUES (58, 'admin', 1003, '重庆潼南太安鱼', '绝对正宗桥头太安鱼', 1, '1003.png', '太安桥头，街边边', '一楼');
INSERT INTO `sbd_shop` VALUES (59, 'admin', 1004, '龙凤关东煮', '好吃的都在小店铺', 1, '1004.png', '重庆龙凤街', '32-51');
INSERT INTO `sbd_shop` VALUES (60, 'admin', 1005, '熊熊家常菜', '本店承诺不使用地沟油', 1, '1005.png', '电讯一食堂', '1-18');
INSERT INTO `sbd_shop` VALUES (61, 'admin', 1006, '程序猿', '本店专属程序员', 1, '1006.png', '电讯四食堂', '1024');

-- ----------------------------
-- Table structure for sbd_user
-- ----------------------------
DROP TABLE IF EXISTS `sbd_user`;
CREATE TABLE `sbd_user`  (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `regTime` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `userPhone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `userHome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sbd_user
-- ----------------------------
INSERT INTO `sbd_user` VALUES (55, 'wkd', '202cb962ac59075b964b07152d234b70', '1511765555', '15523924863', '电讯职业学院 24-615 ');
INSERT INTO `sbd_user` VALUES (58, '100200', '33814acc0b112f9c4a7d49a407321729', '1511773914', '13983378069', '521');

SET FOREIGN_KEY_CHECKS = 1;
