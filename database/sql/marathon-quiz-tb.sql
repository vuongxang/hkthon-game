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

 Date: 14/11/2020 12:50:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for answers
-- ----------------------------
DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers`  (
  `id` int(11) NOT NULL,
  `question_id` int(11) NULL DEFAULT NULL,
  `type_answers` int(11) NULL DEFAULT NULL COMMENT 'Loại câu trả lời',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Nội dung câu trả l',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of locations
-- ----------------------------
INSERT INTO `locations` VALUES (1, 1, 'dia diem 1', 'goi y 1', '12345678', 'moto1', '2020-11-13 17:44:24', '2020-11-13 17:44:28');
INSERT INTO `locations` VALUES (2, 2, 'dia diem2', 'goi y 2', '12323123', 'mota2', '2020-11-13 17:46:08', '2020-11-13 17:46:12');
INSERT INTO `locations` VALUES (3, 3, 'Hà nội', '<p>Hà nội</p>', '1762701240', NULL, '2020-11-14 04:11:01', '2020-11-14 04:11:01');
INSERT INTO `locations` VALUES (4, 5, 'Hà nội', '<p>Hà nội</p>', '89212348', NULL, '2020-11-14 04:11:58', '2020-11-14 04:11:58');

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
  `answer_id` int(11) NULL DEFAULT NULL COMMENT 'Câu trả lời ',
  `title` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Câu hỏi cho vòng đấu',
  `file_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Id của ảnh hoặc video tải lên',
  `point` int(11) NULL DEFAULT NULL COMMENT 'Điểm của câu hỏi',
  `suggest` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Thời gian trả lời',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `time` time(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rounds
-- ----------------------------
INSERT INTO `rounds` VALUES (1, 1, 'round1', 'mota1', 1, '00:00:30', '2020-11-13 16:49:25', '2020-11-14 03:53:42');
INSERT INTO `rounds` VALUES (2, 1, 'round2', 'mota2', 1, '00:00:30', '2020-11-13 16:50:10', '2020-11-14 03:53:36');
INSERT INTO `rounds` VALUES (3, 1, 'round3', NULL, 1, '00:00:30', '2020-11-14 04:07:47', '2020-11-14 04:07:47');
INSERT INTO `rounds` VALUES (4, 1, 'round3', NULL, 1, '00:00:30', '2020-11-14 04:11:01', '2020-11-14 04:11:01');
INSERT INTO `rounds` VALUES (5, 1, 'round3', NULL, 1, '00:00:30', '2020-11-14 04:11:58', '2020-11-14 04:11:58');

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
