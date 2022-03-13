/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : mini_pos

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 13/03/2022 15:51:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `category_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `parent_id`(`parent_id`) USING BTREE,
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, NULL, 'Elektronik', NULL, NULL, NULL);
INSERT INTO `categories` VALUES (2, NULL, 'Kebersihan', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `customer_phone` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `customer_address` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, 'Bima Indra', '089650691537', 'Malang', '2022-03-13 07:43:02', '2022-03-13 07:43:02', NULL);
INSERT INTO `customers` VALUES (2, 'Gareth', '08212311423', 'Pasuruan', '2022-03-13 07:44:37', '2022-03-13 07:44:37', NULL);

-- ----------------------------
-- Table structure for detail_stock_order
-- ----------------------------
DROP TABLE IF EXISTS `detail_stock_order`;
CREATE TABLE `detail_stock_order`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_order_id` int(11) NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `quantity` int(11) NULL DEFAULT NULL,
  `subtotal` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `stock_order_id`(`stock_order_id`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE,
  CONSTRAINT `detail_stock_order_ibfk_1` FOREIGN KEY (`stock_order_id`) REFERENCES `stock_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_stock_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_stock_order
-- ----------------------------
INSERT INTO `detail_stock_order` VALUES (1, 1, 1, 30, 82500000, '2022-03-13 15:40:23', NULL, NULL);
INSERT INTO `detail_stock_order` VALUES (2, 2, 2, 40, 150000000, '2022-03-13 15:41:12', NULL, NULL);
INSERT INTO `detail_stock_order` VALUES (3, 3, 3, 10, 45000000, '2022-03-13 15:42:43', NULL, NULL);
INSERT INTO `detail_stock_order` VALUES (4, 4, 4, 5, 42150000, '2022-03-13 15:43:43', NULL, NULL);

-- ----------------------------
-- Table structure for detail_transaction
-- ----------------------------
DROP TABLE IF EXISTS `detail_transaction`;
CREATE TABLE `detail_transaction`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `quantity` int(3) NULL DEFAULT NULL,
  `subtotal` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_transaction
-- ----------------------------
INSERT INTO `detail_transaction` VALUES (1, 1, 1, 1, 2800000, '2022-03-13 07:43:02', '2022-03-13 07:43:02', NULL);
INSERT INTO `detail_transaction` VALUES (2, 2, 3, 3, 13800000, '2022-03-13 07:44:37', '2022-03-13 07:44:37', NULL);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NULL DEFAULT NULL,
  `product_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `price_sell` int(11) NULL DEFAULT NULL,
  `price_buy` int(11) NULL DEFAULT NULL,
  `product_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `stock` int(10) NULL DEFAULT NULL,
  `product_status` enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 1, 'majoo Pro', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', 2800000, 2750000, 'product/GW6vlarA2cr1qHIyErMaVG6HmY77qDiTTDimU2gp.png', 29, 'active', '2022-03-12 17:35:11', '2022-03-13 02:41:25', NULL);
INSERT INTO `products` VALUES (2, 1, 'majoo Advance', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', 3800000, 3750000, 'product/GrquDfABqfEK2xnS1Vmkbox8tayaK1BlotZ3JEBf.png', 40, 'active', '2022-03-12 17:35:42', '2022-03-13 02:42:06', NULL);
INSERT INTO `products` VALUES (3, 1, 'majoo Lifestyle', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', 4600000, 4500000, 'product/ELcrEumzZu3oEvE4hMvO4gxKTR0097vAoAPT9phx.png', 23, 'active', '2022-03-12 17:36:18', '2022-03-13 07:44:37', NULL);
INSERT INTO `products` VALUES (4, 1, 'majoo Desktop', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', 8500000, 8430000, 'product/NERHdxtYZgSbTFPxyjIFz9Xumjyk6bRTKYWwDBtB.png', 5, 'active', '2022-03-12 17:36:53', '2022-03-13 01:53:01', NULL);

-- ----------------------------
-- Table structure for stock_order
-- ----------------------------
DROP TABLE IF EXISTS `stock_order`;
CREATE TABLE `stock_order`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NULL DEFAULT NULL,
  `stock_order_date` datetime(0) NULL DEFAULT NULL,
  `pay` int(11) NULL DEFAULT NULL,
  `stock_order_status` enum('success','failed') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `supplier_id`(`supplier_id`) USING BTREE,
  CONSTRAINT `stock_order_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stock_order
-- ----------------------------
INSERT INTO `stock_order` VALUES (1, 2, '2022-03-01 15:39:10', 82500000, 'success', '2022-03-01 15:39:54', NULL, NULL);
INSERT INTO `stock_order` VALUES (2, 2, '2022-03-01 15:39:10', 150000000, 'success', '2022-03-13 15:40:56', NULL, NULL);
INSERT INTO `stock_order` VALUES (3, 2, '2022-03-05 15:42:14', 45000000, 'success', '2022-03-13 15:42:25', NULL, NULL);
INSERT INTO `stock_order` VALUES (4, 2, '2022-03-08 15:42:53', 42150000, 'success', '2022-03-08 15:43:17', NULL, NULL);

-- ----------------------------
-- Table structure for suppliers
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `supplier_address` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
INSERT INTO `suppliers` VALUES (2, 'Majoo Teknologi Indonesia', 'Malang', '2022-03-13 07:55:30', '2022-03-13 07:55:30', NULL);

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NULL DEFAULT NULL,
  `transaction_date` datetime(0) NULL DEFAULT NULL,
  `total_price` int(11) NULL DEFAULT NULL,
  `pay` int(11) NULL DEFAULT NULL,
  `transaction_status` enum('success','failed') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `customer_id`(`customer_id`) USING BTREE,
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (1, 1, '2022-03-13 00:00:00', 2800000, 3000000, 'success', '2022-03-13 07:43:02', '2022-03-13 07:43:02', NULL);
INSERT INTO `transactions` VALUES (2, 2, '2022-03-13 00:00:00', 13800000, 15000000, 'success', '2022-03-13 07:44:37', '2022-03-13 07:44:37', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin POSS', 'adminn', '$2a$12$/twatbZhS2VsErg0Y4NnceWGiGm.DiqpPYDKqKGMzlzjdEYPepUj6', '2022-03-12 13:18:57', '2022-03-13 03:46:01', NULL);

SET FOREIGN_KEY_CHECKS = 1;
