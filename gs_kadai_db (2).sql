-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 19 日 16:28
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_kadai_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` varchar(128) NOT NULL,
  `comment` text DEFAULT NULL,
  `img` varchar(256) DEFAULT NULL,
  `date` datetime NOT NULL,
  `del_flg` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `img`, `date`, `del_flg`) VALUES
(7, 'がちゃがちゃドンドン', 'https://www.fukuinkan.co.jp/book/?id=520', 'いつくがリピート', NULL, '2023-01-05 00:28:55', 0),
(11, 'test1', 'http://eee', 'aaa', NULL, '2023-01-05 02:09:49', 0),
(13, 'test3', 'http://eee', 'ccc', NULL, '2023-01-05 02:10:03', 0),
(18, 'だるまさんの', 'https://www.ehonnavi.net/ehon/21696/%E3%81%A0%E3%82%8B%E3%81%BE%E3%81%95%E3%82%93%E3%81%AE/', 'め！け！', NULL, '2023-01-06 00:56:08', 0),
(21, 'ケロケロ', '', '', NULL, '2023-01-10 00:30:45', 0),
(22, 'ててて', '', 'tetete', NULL, '2023-01-10 00:37:57', 0),
(24, 'おっととっと', '', 'かちこちつみきのそうちゃんが', NULL, '2023-01-12 23:47:41', 0),
(25, 'waa', 'r', 'aa', NULL, '2023-01-18 22:15:26', 0),
(26, 'ww', '', '', NULL, '2023-01-19 21:48:35', 0),
(28, 'teeest', '', '', NULL, '2023-01-19 22:07:10', 0),
(30, 'たこ', '', '', NULL, '2023-01-19 22:14:30', 0),
(31, 'えええ', '', '', NULL, '2023-01-19 22:31:11', 0),
(36, 'たくう', 'ff', 'aaaaaaaaa', '20230119153105_dora_14.png', '2023-01-19 23:31:05', 0),
(37, 'あかあかくろくろ', '', '', '20230119155734_dora_16.png', '2023-01-19 23:57:34', 0),
(38, 'ぴーぴーばっくしまーす', '', '', '20230119160536_dora_6.png', '2023-01-20 00:05:36', 0),
(39, 'うさこちゃん', '', '', '20230119161535_dora_15.png', '2023-01-20 00:15:35', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL DEFAULT 0,
  `life_flg` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', 'test1', 1, 0),
(2, 'テスト2一般', 'test2', 'test2', 0, 0),
(3, 'テスト３', 'test3', 'test3', 0, 0),
(4, 'たこ', '', '', 1, 1),
(5, 'test', 'ttt', 'ttt', 1, 1),
(6, '田中', '111', '111', 0, 0),
(7, 'がちゃがちゃ', 'どんどん', 'pipi', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
