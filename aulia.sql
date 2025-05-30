/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : 127.0.0.1:3306
 Source Schema         : aulia

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 30/05/2025 13:05:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_barang` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `satuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_beli` decimal(15, 2) NULL DEFAULT NULL,
  `harga_jual` decimal(15, 2) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_barang`) USING BTREE,
  UNIQUE INDEX `kode_barang`(`kode_barang` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (1, 'SKU-0001', 'Indomie Goreng', 'Mie', 'Box', 50000.00, 60000.00, '2025-05-26 00:22:24', '2025-05-30 13:01:26');
INSERT INTO `barang` VALUES (4, 'SKU-0002', 'Attack', 'Sabun', 'pcs', 20000.00, 25000.00, '2025-05-30 10:09:35', '2025-05-30 13:01:43');

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `id_pengguna` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES (1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'admin');
INSERT INTO `pengguna` VALUES (4, 'Karyawan A', 'user', '6ad14ba9986e3615423dfca256d04e3f', 'user');

-- ----------------------------
-- Table structure for stok_keluar
-- ----------------------------
DROP TABLE IF EXISTS `stok_keluar`;
CREATE TABLE `stok_keluar`  (
  `id_keluar` int NOT NULL AUTO_INCREMENT,
  `id_barang` int NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL,
  `tujuan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_pengguna` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_keluar`) USING BTREE,
  INDEX `id_barang`(`id_barang` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `stok_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `stok_keluar_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stok_keluar
-- ----------------------------
INSERT INTO `stok_keluar` VALUES (2, 1, 4, '2025-05-30', 'aa', 'aa', 1);
INSERT INTO `stok_keluar` VALUES (5, 4, 1, '2025-05-30', 'Kasir Depan', 'Ke Kasr', 1);

-- ----------------------------
-- Table structure for stok_masuk
-- ----------------------------
DROP TABLE IF EXISTS `stok_masuk`;
CREATE TABLE `stok_masuk`  (
  `id_masuk` int NOT NULL AUTO_INCREMENT,
  `id_barang` int NOT NULL,
  `id_supplier` int NULL DEFAULT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `harga_beli` decimal(15, 2) NULL DEFAULT NULL,
  `id_pengguna` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_masuk`) USING BTREE,
  INDEX `id_barang`(`id_barang` ASC) USING BTREE,
  INDEX `id_supplier`(`id_supplier` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `stok_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `stok_masuk_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `stok_masuk_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stok_masuk
-- ----------------------------
INSERT INTO `stok_masuk` VALUES (6, 1, 2, 22, '2025-05-29', 'asdsada', 2500.00, 1);
INSERT INTO `stok_masuk` VALUES (9, 4, 2, 2, '2025-05-01', 'asdsadsadsa', 20000.00, 1);

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id_supplier` int NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_supplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (2, 'PT. ABC', 'Semarang\r\n', '121212122', '2025-05-26 00:05:33');
INSERT INTO `supplier` VALUES (3, 'PT. BCD', 'Semarang', '99293232', '2025-05-30 13:00:57');

-- ----------------------------
-- View structure for view_stok_keluar
-- ----------------------------
DROP VIEW IF EXISTS `view_stok_keluar`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_stok_keluar` AS select `stok_keluar`.`id_keluar` AS `id_keluar`,`stok_keluar`.`id_barang` AS `id_barang`,`stok_keluar`.`jumlah` AS `jumlah`,`stok_keluar`.`tanggal` AS `tanggal`,`stok_keluar`.`tujuan` AS `tujuan`,`stok_keluar`.`keterangan` AS `keterangan`,`stok_keluar`.`id_pengguna` AS `id_pengguna`,`barang`.`nama_barang` AS `nama_barang`,`barang`.`kode_barang` AS `kode_barang`,`barang`.`satuan` AS `satuan`,`pengguna`.`nama` AS `nama` from ((`stok_keluar` join `pengguna` on((`stok_keluar`.`id_pengguna` = `pengguna`.`id_pengguna`))) join `barang` on((`stok_keluar`.`id_barang` = `barang`.`id_barang`)));

-- ----------------------------
-- View structure for view_stok_masuk
-- ----------------------------
DROP VIEW IF EXISTS `view_stok_masuk`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_stok_masuk` AS select `stok_masuk`.`id_masuk` AS `id_masuk`,`stok_masuk`.`id_barang` AS `id_barang`,`stok_masuk`.`id_supplier` AS `id_supplier`,`stok_masuk`.`jumlah` AS `jumlah`,`stok_masuk`.`tanggal` AS `tanggal`,`stok_masuk`.`keterangan` AS `keterangan`,`barang`.`nama_barang` AS `nama_barang`,`barang`.`kode_barang` AS `kode_barang`,`barang`.`satuan` AS `satuan`,`supplier`.`nama_supplier` AS `nama_supplier`,`stok_masuk`.`harga_beli` AS `harga_beli`,`stok_masuk`.`id_pengguna` AS `id_pengguna`,`pengguna`.`nama` AS `nama` from (((`stok_masuk` join `barang` on((`stok_masuk`.`id_barang` = `barang`.`id_barang`))) join `supplier` on((`stok_masuk`.`id_supplier` = `supplier`.`id_supplier`))) join `pengguna` on((`stok_masuk`.`id_pengguna` = `pengguna`.`id_pengguna`)));

-- ----------------------------
-- View structure for view_stok_terkini
-- ----------------------------
DROP VIEW IF EXISTS `view_stok_terkini`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_stok_terkini` AS select `b`.`id_barang` AS `id_barang`,`b`.`kode_barang` AS `kode_barang`,`b`.`nama_barang` AS `nama_barang`,`b`.`satuan` AS `satuan`,ifnull(sum(`sm`.`jumlah`),0) AS `total_masuk`,ifnull(sum(`sk`.`jumlah`),0) AS `total_keluar`,(ifnull(sum(`sm`.`jumlah`),0) - ifnull(sum(`sk`.`jumlah`),0)) AS `stok_tersedia` from ((`barang` `b` left join `stok_masuk` `sm` on((`b`.`id_barang` = `sm`.`id_barang`))) left join `stok_keluar` `sk` on((`b`.`id_barang` = `sk`.`id_barang`))) group by `b`.`id_barang`,`b`.`kode_barang`,`b`.`nama_barang`,`b`.`satuan`;

SET FOREIGN_KEY_CHECKS = 1;
