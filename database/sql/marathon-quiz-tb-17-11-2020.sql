/*
 Navicat Premium Data Transfer

 Source Server         : SA
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : marathon-quiz-tb

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 17/11/2020 00:25:12
 S utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for answers
-- ----------------------------
DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NULL DEFAULT NULL,
  `type_answers` int(11) NULL DEFAULT NULL COMMENT 'Loại câu trả lời',
  `url` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Nội dung câu trả l',
  `status` tinyint(4) NULL DEFAULT NULL COMMENT '1:câu trả lời đúng,0 câu trả lời sai,',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of answers
-- ----------------------------
INSERT INTO `answers` VALUES (22, 27, 2, 'storage/question-file/question-file-740130824hinh-nen-anime-cho-pc-dep_110747478.jpg', NULL, 1, '2020-11-15 12:31:38', '2020-11-15 12:31:38');

-- ----------------------------
-- Table structure for codes
-- ----------------------------
DROP TABLE IF EXISTS `codes`;
CREATE TABLE `codes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL COMMENT 'Id của game ',
  `code` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Mã code đăng nhập game',
  `status` tinyint(4) NULL DEFAULT NULL COMMENT 'Trạng thái mã code (1:Hoạt động,0: Ngừng hoạt động,-1:đã xóa)',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of codes
-- ----------------------------
INSERT INTO `codes` VALUES (1, 1, '123232', 1, '2020-11-13 18:00:12');
INSERT INTO `codes` VALUES (2, 1, '1232132', -1, '2020-11-13 18:00:24');

-- ----------------------------
-- Table structure for collaborators
-- ----------------------------
DROP TABLE IF EXISTS `collaborators`;
CREATE TABLE `collaborators`  (
  `id` int(11) NOT NULL COMMENT '		',
  `user_id` int(11) NULL DEFAULT NULL,
  `round_id` int(11) NULL DEFAULT NULL,
  `game_id` int(11) NULL DEFAULT NULL,
  `status` tinyint(4) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Trạng thái file tải lên(1:Hoạt động, 0:Ngừng hoạt động,-1:Đã xóa)',
  `url` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Đường dẫn file tải lên ',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES (1, 1, 'storage/question-text/question-text-a6d57c94f0300e6e5721 (1).jpg', '2020-11-15 08:40:29', '2020-11-15 08:40:29');
INSERT INTO `files` VALUES (2, 1, 'storage/question-text/question-text-a6d57c94f0300e6e5721 (1).jpg', '2020-11-15 08:40:40', '2020-11-15 08:40:40');
INSERT INTO `files` VALUES (3, 1, 'storage/question-text/question-text-769576998a6d57c94f0300e6e5721 (1).jpg', '2020-11-15 08:41:29', '2020-11-15 08:41:29');
INSERT INTO `files` VALUES (4, 1, 'storage/question-text/question-text-1515568753a6d57c94f0300e6e5721 (1).jpg', '2020-11-15 08:41:32', '2020-11-15 08:41:32');
INSERT INTO `files` VALUES (5, 1, 'storage/question-text/question-text-526793259a6d57c94f0300e6e5721 (1).jpg', '2020-11-15 08:41:43', '2020-11-15 08:41:43');
INSERT INTO `files` VALUES (6, 1, 'storage/question-text/question-text-371937590a6d57c94f0300e6e5721 (1).jpg', '2020-11-15 08:42:43', '2020-11-15 08:42:43');
INSERT INTO `files` VALUES (7, 1, 'storage/question-text/question-text-388740622a6d57c94f0300e6e5721 (1).jpg', '2020-11-15 08:43:10', '2020-11-15 08:43:10');
INSERT INTO `files` VALUES (8, 1, 'storage/question-text/question-text-2073528158af2a5467d8c3269d7fd2 (1).jpg', '2020-11-15 08:57:59', '2020-11-15 08:57:59');
INSERT INTO `files` VALUES (9, 1, 'storage/question-text/question-text-211678504775f3207f8481dad895 (1).jpg', '2020-11-15 09:04:16', '2020-11-15 09:04:16');
INSERT INTO `files` VALUES (10, 1, 'storage/question-text/question-text-2088485447a6d57c94f0300e6e5721 (1).jpg', '2020-11-15 09:05:29', '2020-11-15 09:05:29');
INSERT INTO `files` VALUES (11, 1, 'storage/question-text/question-text-932186540a6d57c94f0300e6e5721 (1).jpg', '2020-11-15 09:05:40', '2020-11-15 09:05:40');
INSERT INTO `files` VALUES (12, 1, 'storage/question-text/question-text-1266180778a6d57c94f0300e6e5721 (1).jpg', '2020-11-15 09:06:33', '2020-11-15 09:06:33');
INSERT INTO `files` VALUES (13, 1, 'storage/question-text/question-text-434321093a6d57c94f0300e6e5721 (1).jpg', '2020-11-15 09:06:46', '2020-11-15 09:06:46');
INSERT INTO `files` VALUES (14, 1, 'storage/question-text/question-text-1262765431af2a5467d8c3269d7fd2 (1).jpg', '2020-11-15 09:17:34', '2020-11-15 09:17:34');
INSERT INTO `files` VALUES (15, 1, 'storage/question-text/question-text-431207199af2a5467d8c3269d7fd2 (1).jpg', '2020-11-15 09:17:55', '2020-11-15 09:17:55');
INSERT INTO `files` VALUES (16, 1, 'storage/question-text/question-text-1705196998af2a5467d8c3269d7fd2 (1).jpg', '2020-11-15 09:18:02', '2020-11-15 09:18:02');
INSERT INTO `files` VALUES (17, 1, 'storage/question-text/question-text-723441694af2a5467d8c3269d7fd2 (1).jpg', '2020-11-15 09:19:05', '2020-11-15 09:19:05');
INSERT INTO `files` VALUES (18, 1, 'storage/question-text/question-text-596894476af2a5467d8c3269d7fd2 (1).jpg', '2020-11-15 09:19:16', '2020-11-15 09:19:16');
INSERT INTO `files` VALUES (19, 1, 'storage/question-text/question-text-1984238164hinh-nen-4k-3D-doc-dao-cho-laptop-1.jpg', '2020-11-15 09:43:23', '2020-11-15 09:43:23');
INSERT INTO `files` VALUES (20, 1, 'storage/question-text/question-text-321700853hinh-nen-anime-dep-co-gai-dang-khoc_112251673.jpg', '2020-11-15 10:21:28', '2020-11-15 10:21:28');
INSERT INTO `files` VALUES (21, 1, 'storage/question-text/question-text-2104885804hinh-nen-anime-dep-co-gai-dang-khoc_112251673.jpg', '2020-11-15 10:21:33', '2020-11-15 10:21:33');
INSERT INTO `files` VALUES (22, 1, 'storage/question-text/question-text-1510582976hinh-nen-anime-4k-dep-15.jpg', '2020-11-15 10:57:49', '2020-11-15 10:57:49');
INSERT INTO `files` VALUES (23, 1, 'storage/question-file/question-file-229123709hinh-nen-4k-3D-doc-dao-cho-laptop-1.jpg', '2020-11-15 11:01:17', '2020-11-15 11:01:17');
INSERT INTO `files` VALUES (24, 1, 'storage/question-file/question-file-1034656937hinh-nen-4k-3D-doc-dao-cho-laptop-1.jpg', '2020-11-15 11:06:25', '2020-11-15 11:06:25');
INSERT INTO `files` VALUES (25, 1, 'storage/question-file/question-file-1050748540hinh-nen-4k-3D-doc-dao-cho-laptop-1.jpg', '2020-11-15 11:12:28', '2020-11-15 11:12:28');
INSERT INTO `files` VALUES (26, 1, 'storage/question-text/question-text-1216859493hinh-nen-4k-3D-doc-dao-cho-laptop-1.jpg', '2020-11-15 12:18:04', '2020-11-15 12:18:04');
INSERT INTO `files` VALUES (27, 1, 'storage/question-text/question-text-1128797814hinh-nen-anime-dep-co-gai-dang-khoc_112251673.jpg', '2020-11-15 12:19:43', '2020-11-15 12:19:43');

-- ----------------------------
-- Table structure for games
-- ----------------------------
DROP TABLE IF EXISTS `games`;
CREATE TABLE `games`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'Tên người tạo game',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên game',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Mô tả game',
  `status` tinyint(4) NULL DEFAULT NULL COMMENT 'Trạng thái của game (1:Hoạt động,0:Ngừng hoạt động,-1:Đã xóa)',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of games
-- ----------------------------
INSERT INTO `games` VALUES (1, 1, 'game 1', 'mota1', 1, '2020-11-13 16:50:40', '2020-11-13 16:50:42');
INSERT INTO `games` VALUES (2, 1, 'game2', 'moto2', 1, '2020-11-13 17:16:40', '2020-11-13 17:16:43');

-- ----------------------------
-- Table structure for locations
-- ----------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `round_id` int(11) NULL DEFAULT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Tên địa điểm',
  `suggest` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Gợi ý cho địa ',
  `code` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Mã nhập tại địa điểm ',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Mô tả địa điểm ',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of locations
-- ----------------------------
INSERT INTO `locations` VALUES (1, 1, 'dia diem 1', 'goi y 1', '12345678', 'moto1', '2020-11-13 17:44:24', '2020-11-13 17:44:28');
INSERT INTO `locations` VALUES (2, 2, 'dia diem2', 'goi y 2', '12323123', 'mota2', '2020-11-13 17:46:08', '2020-11-13 17:46:12');
INSERT INTO `locations` VALUES (3, 3, 'Hà nội', '<p>Hà nội</p>', '1762701240', NULL, '2020-11-14 04:11:01', '2020-11-14 04:11:01');
INSERT INTO `locations` VALUES (4, 5, 'Hà nội', '<p>Hà nội</p>', '89212348', NULL, '2020-11-14 04:11:58', '2020-11-14 04:11:58');
INSERT INTO `locations` VALUES (5, 6, 'Hà nội', '<p>1232</p>', '2066814605', NULL, '2020-11-14 06:24:52', '2020-11-14 06:24:52');
INSERT INTO `locations` VALUES (6, 7, 'Hà nội', '<p>12321321</p>', '189278387', NULL, '2020-11-14 06:33:02', '2020-11-14 06:33:02');
INSERT INTO `locations` VALUES (7, 8, 'Hà nội', '<p>123213</p>', '333281324', NULL, '2020-11-14 06:35:01', '2020-11-14 06:35:01');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for players
-- ----------------------------
DROP TABLE IF EXISTS `players`;
CREATE TABLE `players`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `role` int(11) NULL DEFAULT NULL COMMENT 'Quyền người chơi trong team',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `round_id` int(11) NOT NULL COMMENT 'Id vòng đấu',
  `title` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Câu hỏi cho vòng đấu',
  `file_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Id của ảnh hoặc video tải lên',
  `point` int(11) NULL DEFAULT NULL COMMENT 'Điểm của câu hỏi',
  `status` tinyint(4) NULL DEFAULT NULL,
  `suggest` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Thời gian trả lời',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of questions
-- ----------------------------
INSERT INTO `questions` VALUES (27, 1, 'Học PHP', NULL, 222, 1, '213', '2020-11-15 12:31:38', '2020-11-15 12:31:38');

-- ----------------------------
-- Table structure for rounds
-- ----------------------------
DROP TABLE IF EXISTS `rounds`;
CREATE TABLE `rounds`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Tên vòng đấu',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Mô tả vòng đấu',
  `status` tinyint(4) NULL DEFAULT NULL,
  `time` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rounds
-- ----------------------------
INSERT INTO `rounds` VALUES (1, 1, 'round1', 'mota1', 1, '30', '2020-11-13 16:49:25', '2020-11-14 03:53:42');
INSERT INTO `rounds` VALUES (2, 1, 'round2', 'mota2', 1, '30', '2020-11-13 16:50:10', '2020-11-14 03:53:36');
INSERT INTO `rounds` VALUES (3, 1, 'round3', NULL, 1, '30', '2020-11-14 04:07:47', '2020-11-14 04:07:47');
INSERT INTO `rounds` VALUES (4, 1, 'round3', NULL, 1, '30', '2020-11-14 04:11:01', '2020-11-14 04:11:01');
INSERT INTO `rounds` VALUES (5, 1, 'round3', NULL, -1, '30', '2020-11-14 04:11:58', '2020-11-14 06:25:12');
INSERT INTO `rounds` VALUES (6, 1, 'round 5', NULL, -1, '22', '2020-11-14 06:24:52', '2020-11-14 06:25:04');
INSERT INTO `rounds` VALUES (7, 1, 'chido nguyen', NULL, -1, '222', '2020-11-14 06:33:02', '2020-11-14 07:02:22');
INSERT INTO `rounds` VALUES (8, 1, 'chido nguyen23', NULL, -1, '22', '2020-11-14 06:35:01', '2020-11-14 06:35:09');

-- ----------------------------
-- Table structure for team_answers
-- ----------------------------
DROP TABLE IF EXISTS `team_answers`;
CREATE TABLE `team_answers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NULL DEFAULT NULL COMMENT 'Id câu hỏi',
  `team_id` int(11) NULL DEFAULT NULL COMMENT 'Id team trả lời',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Nôi dung câu trả lời',
  `file_id` int(11) NULL DEFAULT NULL COMMENT 'Id ảnh gửi lên',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NULL DEFAULT NULL COMMENT 'Id game tham gia',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Tên đội tham gia',
  `file_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `point` int(11) NULL DEFAULT NULL COMMENT 'ĐIểm của dội ',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Mô tả đội ',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'user1', 'user2@gmail.com', '2020-11-10 16:30:11', '$2y$10$QHUCFB1JKoT1solsaY8zX.fbrd92.km.RjMDRSIHMFIm.4u46jS4K', 'abc', '2020-11-10 16:30:11', '2020-11-10 16:30:11');

SET FOREIGN_KEY_CHECKS = 1;
