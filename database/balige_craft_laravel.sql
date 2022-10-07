/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : balige_craft_laravel

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 06/10/2022 00:49:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Pahala Picauly Sagala', 'pahala.picauly12@gmail.com', '$2y$10$DK.mo9IztJML1K49uStTj.3C812Gh5aOusIMpyxaRbYn/J1bmj2R6', '', NULL, NULL);

-- ----------------------------
-- Table structure for berat_barang
-- ----------------------------
DROP TABLE IF EXISTS `berat_barang`;
CREATE TABLE `berat_barang`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `berat_barang` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of berat_barang
-- ----------------------------
INSERT INTO `berat_barang` VALUES (1, '1 KG', NULL, NULL);
INSERT INTO `berat_barang` VALUES (2, '2 KG', NULL, NULL);

-- ----------------------------
-- Table structure for biaya_pengiriman
-- ----------------------------
DROP TABLE IF EXISTS `biaya_pengiriman`;
CREATE TABLE `biaya_pengiriman`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kota_tujuan` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `totalberat` int(11) NULL DEFAULT NULL,
  `biaya` int(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of biaya_pengiriman
-- ----------------------------
INSERT INTO `biaya_pengiriman` VALUES (1, 1, 1, 20000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (2, 2, 1, 27000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (3, 3, 1, 28000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (4, 4, 1, 26000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (5, 5, 1, 27000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (6, 6, 1, 38000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (7, 7, 1, 38000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (8, 7, 1, 38000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (9, 9, 1, 47000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (10, 10, 1, 48000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (11, 1, 2, 24000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (12, 2, 2, 31000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (13, 3, 2, 32000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (14, 4, 2, 30000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (15, 5, 2, 32000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (16, 6, 2, 42000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (17, 7, 2, 42000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (18, 8, 2, 29000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (19, 9, 2, 51000, NULL, NULL);
INSERT INTO `biaya_pengiriman` VALUES (20, 10, 2, 52000, NULL, NULL);

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Aksesoris', '-', 1, NULL, NULL);
INSERT INTO `kategori` VALUES (2, 'Busana', '-', 1, NULL, NULL);
INSERT INTO `kategori` VALUES (3, 'Ulos', '', 1, NULL, NULL);

-- ----------------------------
-- Table structure for kota
-- ----------------------------
DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_provinsi` bigint(20) UNSIGNED NOT NULL,
  `nama_kota` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kota
-- ----------------------------
INSERT INTO `kota` VALUES (1, 1, 'Balige', NULL, NULL);
INSERT INTO `kota` VALUES (2, 1, 'Deli Serdang', NULL, NULL);
INSERT INTO `kota` VALUES (3, 1, 'Medan', NULL, NULL);
INSERT INTO `kota` VALUES (4, 1, 'Pematang Siantar', NULL, NULL);
INSERT INTO `kota` VALUES (5, 1, 'Sibolga', NULL, NULL);
INSERT INTO `kota` VALUES (6, 2, 'Agam', NULL, NULL);
INSERT INTO `kota` VALUES (7, 2, 'Bukittinggi', NULL, NULL);
INSERT INTO `kota` VALUES (8, 2, 'Padang', NULL, NULL);
INSERT INTO `kota` VALUES (9, 2, 'Pasaman', NULL, NULL);
INSERT INTO `kota` VALUES (10, 2, 'Solok', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_10_05_000001_create_admin_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_10_05_000001_create_berat_barang_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_10_05_000001_create_biaya_pengiriman_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_10_05_000001_create_kategori_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_10_05_000001_create_kota_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_10_05_000001_create_model_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_10_05_000001_create_orders_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_10_05_000001_create_payments_table', 1);
INSERT INTO `migrations` VALUES (11, '2020_10_05_000001_create_ulasan_table', 1);
INSERT INTO `migrations` VALUES (12, '2022_10_05_000000_create_orders_item_table', 1);
INSERT INTO `migrations` VALUES (13, '2022_10_05_000000_create_orders_ulos_table', 1);
INSERT INTO `migrations` VALUES (14, '2022_10_05_000000_create_penjual_table', 1);
INSERT INTO `migrations` VALUES (15, '2022_10_05_000000_create_produk_table', 1);
INSERT INTO `migrations` VALUES (16, '2022_10_05_000000_create_provinsi_table', 1);
INSERT INTO `migrations` VALUES (17, '2022_10_05_000000_create_resi_table', 1);
INSERT INTO `migrations` VALUES (18, '2022_10_05_000000_create_settings_table', 1);
INSERT INTO `migrations` VALUES (19, '2022_10_05_000000_create_user_verifikasi_table', 1);

-- ----------------------------
-- Table structure for model
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_model` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_model` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model
-- ----------------------------
INSERT INTO `model` VALUES (1, 'Polos', '10000', 1, NULL, NULL);
INSERT INTO `model` VALUES (2, 'Lampion', '25000', 1, NULL, NULL);
INSERT INTO `model` VALUES (3, 'Rumbai Panjang', '20000', 1, NULL, NULL);
INSERT INTO `model` VALUES (4, 'Bordir', '30000', 1, NULL, NULL);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `resi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` int(11) NOT NULL,
  `regency` int(11) NOT NULL,
  `courier` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_service` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `order_status` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pesanan_status` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `ongkir` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total_items` int(11) NULL DEFAULT NULL,
  `payment_method` int(11) NULL DEFAULT NULL,
  `delivery_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `link_pay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 161 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (153, 1, '0', '', 3, 457, 'jne', '', 'PKE3092230970', NULL, 0, '2022-09-30 15:58:47', '39000', '224000,00', 3, 1, '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', '', NULL, NULL);
INSERT INTO `orders` VALUES (154, 0, '0', '', 6, 153, 'jne', '', 'JHE3092230156', '', 0, '2022-09-30 16:13:43', '36000', '376000,00', 3, 1, '', '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', NULL, NULL);
INSERT INTO `orders` VALUES (155, 0, '0', '', 3, 455, 'pos', '', 'DNM3092230564', '', 0, '2022-09-30 16:34:32', '35500', '525500,00', 3, 1, '', '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', NULL, NULL);
INSERT INTO `orders` VALUES (156, 0, '0', '', 7, 130, 'jne', '', 'ERO3092230904', '', 0, '2022-09-30 16:36:11', '95000', '895000,00', 3, 1, '', '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', NULL, NULL);
INSERT INTO `orders` VALUES (157, 0, '0', '', 3, 402, 'jne', '', 'UCL3092230146', '', 0, '2022-09-30 16:37:42', '43000', '999999,99', 3, 1, '', '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', NULL, NULL);
INSERT INTO `orders` VALUES (158, 0, '0', '', 7, 130, 'tiki', '', 'HOP3092220796', '', 0, '2022-09-30 16:39:12', '97000', '967000,00', 2, 1, '', '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', NULL, NULL);
INSERT INTO `orders` VALUES (159, 0, '0', '', 7, 131, 'tiki', '', 'DFZ3092220980', '', 0, '2022-09-30 16:40:48', '110000', '410000,00', 2, 1, '', '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', NULL, NULL);
INSERT INTO `orders` VALUES (160, 0, '0', '', 14, 167, 'jne', '', 'IXQ3092210085', '', 0, '2022-09-30 16:41:48', '69000', '269000,00', 1, 1, '', '{\"user\":{\"nama_lengkap\":\"Pahala Picauly Sagala\",\"notelp\":\"081269791233\",\"alamat\":\"Jalan Aster 2 No 165\"},\"note\":\"\"}', NULL, NULL);

-- ----------------------------
-- Table structure for orders_item
-- ----------------------------
DROP TABLE IF EXISTS `orders_item`;
CREATE TABLE `orders_item`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `order_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 92 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders_item
-- ----------------------------
INSERT INTO `orders_item` VALUES (27, 88, 25, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (28, 89, 25, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (29, 90, 25, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (30, 91, 25, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (31, 92, 25, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (32, 100, 25, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (33, 101, 27, '2', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (34, 102, 26, '2', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (35, 103, 26, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (36, 104, 26, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (37, 105, 26, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (38, 106, 27, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (39, 107, 27, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (40, 108, 26, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (41, 109, 25, '3', '70000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (42, 110, 25, '1', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (43, 111, 25, '1', '80000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (44, 112, 26, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (45, 113, 27, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (46, 114, 28, '1', '90000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (47, 115, 28, '1', '85000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (48, 116, 28, '1', '85000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (49, 116, 29, '1', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (50, 0, 30, '1', '10000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (51, 132, 26, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (52, 133, 29, '1', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (53, 134, 29, '1', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (54, 135, 29, '1', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (55, 136, 29, '1', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (56, 137, 26, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (57, 138, 26, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (58, 139, 29, '2', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (59, 140, 29, '1', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (60, 141, 29, '1', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (61, 142, 25, '1', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (62, 143, 26, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (63, 144, 26, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (64, 145, 24, '1', '70000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (65, 146, 30, '1', '10000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (66, 147, 26, '1', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (67, 148, 24, '1', '70000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (68, 149, 24, '1', '70000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (69, 150, 24, '1', '70000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (70, 151, 26, '2', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (71, 152, 30, '1', '10000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (72, 153, 25, '2', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (73, 153, 29, '1', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (74, 153, 30, '1', '10000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (75, 154, 30, '1', '10000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (76, 154, 29, '2', '75000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (77, 154, 28, '3', '60000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (78, 155, 26, '3', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (79, 155, 24, '2', '70000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (80, 155, 27, '4', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (81, 156, 27, '4', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (82, 156, 24, '6', '70000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (83, 156, 28, '3', '60000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (84, 157, 28, '3', '60000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (85, 157, 27, '3', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (86, 157, 24, '11', '70000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (87, 158, 24, '11', '70000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (88, 158, 25, '2', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (89, 159, 25, '2', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (90, 159, 26, '4', '50000.00', NULL, NULL);
INSERT INTO `orders_item` VALUES (91, 160, 26, '4', '50000.00', NULL, NULL);

-- ----------------------------
-- Table structure for orders_ulos
-- ----------------------------
DROP TABLE IF EXISTS `orders_ulos`;
CREATE TABLE `orders_ulos`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_ulos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders_ulos
-- ----------------------------
INSERT INTO `orders_ulos` VALUES (4, '', 2, NULL, NULL);
INSERT INTO `orders_ulos` VALUES (5, '', 2, NULL, NULL);
INSERT INTO `orders_ulos` VALUES (6, '', 2, NULL, NULL);
INSERT INTO `orders_ulos` VALUES (7, '', 1, NULL, NULL);
INSERT INTO `orders_ulos` VALUES (8, '', 2, NULL, NULL);
INSERT INTO `orders_ulos` VALUES (9, '', 1, NULL, NULL);
INSERT INTO `orders_ulos` VALUES (10, '', 1, NULL, NULL);

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `picture_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` datetime NULL DEFAULT NULL,
  `payment_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES (1, 66, '100000,00', '2022-07-12', '5.png', '1', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (2, 67, '200000,00', '2022-07-12', '4_(2).png', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (3, 68, '100000,00', '2022-07-12', '4_(2)1.png', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (4, 68, '100000,00', '2022-07-12', '4_(2)1.png', '2', NULL, '');
INSERT INTO `payments` VALUES (5, 111, '108000,00', '2022-07-26', '4.png', '2', NULL, '{\"transfer_to\":\"bca\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (6, 113, '97000,00', '2022-07-26', 'WhatsApp_Image_2020-05-19_at_10_53_28.jpeg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (7, 109, '235000,00', '2022-07-26', 'MA.png', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (8, 114, '138000,00', '2022-07-26', 'WhatsApp_Image_2022-07-22_at_6_07_47_AM.jpeg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (9, 115, '113000,00', '2022-07-26', '193.jpg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');
INSERT INTO `payments` VALUES (10, 116, '188000,00', '2022-07-27', 'wallpapermotivasi_34.jpeg', '2', NULL, '{\"transfer_to\":\"mandiri\",\"source\":{\"bank\":\"Bank Mandiri\",\"name\":\"Pahala Picauly Sagala\",\"number\":\"12345678910\"}}');

-- ----------------------------
-- Table structure for penjual
-- ----------------------------
DROP TABLE IF EXISTS `penjual`;
CREATE TABLE `penjual`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `penjual_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjual
-- ----------------------------
INSERT INTO `penjual` VALUES (1, 'pahala.picauly67@gmail.com', '$2y$10$juudW8kzVMOr69X9xu.P.e5jmMqTr9vTPuuKwSx3uHTsBNijq4Gwq', 'Pahala123', 'Pahala Picauly Sagala', 'Medan', '2022-07-04', 'Jalan Aster 1 No.169', '082287928245', 'index.jpg', '20124', '-', '1');
INSERT INTO `penjual` VALUES (12, 'pahala.picauly345@gmail.com', '$2y$10$juudW8kzVMOr69X9xu.P.e5jmMqTr9vTPuuKwSx3uHTsBNijq4Gwq', 'Pahala12345', 'Pahala Picauly Sagala', 'Medan', '2022-07-04', 'Jalan Aster 1 No.169', '0822879282452', 'index.jpg', '20124', '-', '1');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_panjang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_pendek` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuantitas` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` bigint(20) UNSIGNED NOT NULL,
  `terbaik` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `produk_date` date NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (24, 'Asbak Kayu -1', '', '', '70000', 'Asbak_Kayu.png', '50', '5', 'Cokelat', 1, 1, 1, '2022-07-15', 12);
INSERT INTO `produk` VALUES (25, 'Ulos Sadum', '', '', '50000', 'ulos_sadum.jpeg', '5', '', '', 3, 0, 1, '2022-07-15', 12);
INSERT INTO `produk` VALUES (26, 'Sling Bag', '', '', '50000', 'sling_bag.png', '10', '', '', 2, 1, 1, '2022-07-15', 12);
INSERT INTO `produk` VALUES (27, 'Beach Hat', '', '', '50000', 'Beach_Hat.png', '5', '', '', 2, 0, 1, '2022-07-15', 12);
INSERT INTO `produk` VALUES (28, 'Ulos Ragihotang', '', '', '60000', 'ulos_ragihotang.png', '15', '', '', 3, 0, 1, '2022-07-26', 12);
INSERT INTO `produk` VALUES (29, 'Jam Tangan Kayu', '', '', '75000', 'Jam_tangan-removebg-preview.png', '10', '2', 'Cokelat muda', 1, 1, 1, '2022-07-26', 12);
INSERT INTO `produk` VALUES (30, 'Gantungan Kunci', '', '', '10000', 'Gantungan_Kunci-removebg-preview.png', '20', '', '', 1, 0, 1, '2022-07-26', 12);
INSERT INTO `produk` VALUES (32, 'Ulos Sirara', '-', '-', '20000', 'ulos_sirara.png', '0', '', '', 3, 1, 1, '2022-07-27', 12);

-- ----------------------------
-- Table structure for provinsi
-- ----------------------------
DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE `provinsi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of provinsi
-- ----------------------------
INSERT INTO `provinsi` VALUES (1, 'Sumatera Utara');
INSERT INTO `provinsi` VALUES (2, 'Sumatera Barat');

-- ----------------------------
-- Table structure for resi
-- ----------------------------
DROP TABLE IF EXISTS `resi`;
CREATE TABLE `resi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomor` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `resi_date` date NOT NULL,
  `resi_status` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resi
-- ----------------------------

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'min_shop_to_free_shipping_cost', '20000');
INSERT INTO `settings` VALUES (2, 'payment_banks', '{\"mandiri\":{\"bank\":\"Mandiri\",\"number\":\"1234567890\",\"name\":\"Balige Craft\"},\"bca\":{\"bank\":\"BCA\",\"number\":\"0987654321\",\"name\":\"Balige Craft\"}}');

-- ----------------------------
-- Table structure for ulasan
-- ----------------------------
DROP TABLE IF EXISTS `ulasan`;
CREATE TABLE `ulasan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_ulasan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ulasan
-- ----------------------------
INSERT INTO `ulasan` VALUES (24, 1, 'Pahala Picauly Sagala', 'pahala.picauly67@gmail.com', 'Produknya bagus', 'Produknya bagus', '0000-00-00', NULL, NULL);
INSERT INTO `ulasan` VALUES (29, 1, 'Pahala Picauly Sagala', 'pahalasagala772@gmail.com', 'Produknya bagus', 'Produkya bagusx', '0000-00-00', NULL, NULL);
INSERT INTO `ulasan` VALUES (30, 1, 'Pahala Picauly Sagala', 'pahalasagala772@gmail.com', 'Produknya bagus', 'sip', '0000-00-00', NULL, NULL);

-- ----------------------------
-- Table structure for user_verifikasi
-- ----------------------------
DROP TABLE IF EXISTS `user_verifikasi`;
CREATE TABLE `user_verifikasi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifikasi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_buat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_verifikasi
-- ----------------------------
INSERT INTO `user_verifikasi` VALUES (4, 'pahalapicauly12@gmail.com', 'hTaO04CQtdttK086O6pICAkSRO3aMcFW', 1648634721, NULL, NULL);
INSERT INTO `user_verifikasi` VALUES (5, 'arthapardede18@gmail.com', 'Quw11sKztf8T2CL7wEaX0RnlNfGfQYfP', 1648635060, NULL, NULL);
INSERT INTO `user_verifikasi` VALUES (8, 'arthapardede18@gmail.com', '31LHT9i5z6Me8PkR0iGhuAxJVmYiUwIU', 1648698142, NULL, NULL);
INSERT INTO `user_verifikasi` VALUES (9, 'diahsirait12@gmail.com', 'nEIMpjBLqb2SaGxxXoXpPEANdD9w8rES', 1648699204, NULL, NULL);
INSERT INTO `user_verifikasi` VALUES (10, 'arthapardede18@gmail.com', 'PhkgQJCIQUbUrkzJBQWPgQu3zuThuRRn', 1648699613, NULL, NULL);
INSERT INTO `user_verifikasi` VALUES (17, 'pahalapicauly12@gmail.com', 'mG2LQHhdh3MZdvbWrgQTkzf6z5rjfIas', 1650550313, NULL, NULL);
INSERT INTO `user_verifikasi` VALUES (57, 'pahalasagala772@gmail.com', 'Peve4x2dFcTtSS0Mb0vHxr1XNpE0Gszc', 1657639412, NULL, NULL);
INSERT INTO `user_verifikasi` VALUES (60, 'pahalasagala772@gmail.com', 'nw4slnwfiWsYNL6FFAELvHBdKJEDaYOr', 1657679118, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'sagala123', 'Pahala Picauly Sagala', 'Medan', '1999-11-12', 'pahalasagala772@gmail.com', '$2y$10$hoR5JpWq51qQjIhgEAha6uZxUotJJSrOggn6MTqPxPop8CKugYFGS', 'index3.jpg', 'Jalan Aster 2 No 165', '20224', '-', '081269791233', '1', NULL, NULL);
INSERT INTO `users` VALUES (7, 'sagala12345', '', '', '0000-00-00', 'pahala.picauly67@gmail.com', '$2y$10$2oKUHRJkgsCsqsS6MW4XfOUalCUBM/TJcg5t70G2X6SP2P/qsisxu', 'default.png', '', '', '', '', '1', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
