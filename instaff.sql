-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2019 年 2 月 28 日 14:22
-- サーバのバージョン： 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instaff`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `login_list`
--

CREATE TABLE `login_list` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `login_list`
--

INSERT INTO `login_list` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'ono', 'aaa', 'aaa', 1, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `staff_list`
--

CREATE TABLE `staff_list` (
  `id` int(12) NOT NULL,
  `namae` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kana` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `youfrom` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` int(7) DEFAULT NULL,
  `add1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add2` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tels` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_flg` char(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `belong` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mynum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mem_flg` char(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grp` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `staff_list`
--

INSERT INTO `staff_list` (`id`, `namae`, `kana`, `gender`, `birth`, `youfrom`, `postcode`, `add1`, `add2`, `phone`, `tels`, `mail`, `mail_flg`, `belong`, `mynum`, `mem_flg`, `grp`, `comment`) VALUES
(1, '小野　里佳', 'おの　りか', '女性', '2000-07-28', '', 8900052, '鹿児島県', '鹿児島市上之園町0000', '090-9999-9999', '', 'ono@mail.com', 'checked', 'インスタッフ', '1111222233334444', NULL, 'アルバイト', 'テスト'),
(5, '新田　真剣佑', 'あらた　まっけんゆう', '男性', '1998-07-28', '東京都', 8920838, '鹿児島県', '鹿児島市新屋敷町', '090-5555-1234', '', '', '', '芸能人', '1111222233334444', 'checked', 'アルバイト', 'テスト'),
(6, '木村　拓也', 'きむら　たくや', '男性', '1975-11-22', '東京都', 8900003, '鹿児島県', '', '080-1234-5678', '', '', 'checked', '世界', '1111222233334444', '', 'パート', 'テスト〜'),
(9, 'リア　ディゾン', 'りあ　でぃぞん', '女性', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '松本　潤', 'まつもと　じゅん', '男性', '1983-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '北川　景子', 'きたがわ　けいこ', '女性', '1989-01-03', '島根県', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'バカ　リズム', 'ばか　りずむ', '男性', '1975-04-06', '北海道', 8900052, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '向井　理', 'むかい　おさむ', '男性', '1981-09-10', '福井県', 8900052, '鹿児島県', '鹿児島市上之園町12-34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '宇多田　ヒカル', 'うただ　ひかる', '女性', '1983-05-05', '神奈川県', 8800003, '宮崎県', 'えびの市適当', '090-1234-5678', '088-123-4567', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'ビート　たけし', 'びーと　たけし', '男性', '1950-09-23', '千葉県', 7891234, '福岡県', 'テキトー', '000-0000-0000', '99-9999-9999', 'takeshi@aaa.jp', NULL, NULL, NULL, NULL, NULL, NULL),
(16, '明石家　サンマ', 'あかしや　さんま', '男性', '1950-10-10', '新潟県', 1234567, '東京都', 'あとは適当', '000-0000-0001', '088-123-4560', 'sanma@omoroi.jp', 'checked', '', '', NULL, 'アルバイト', ''),
(17, '玉木　宏', 'たまき　ひろし', '男性', '1987-01-01', '福島県', 1090909, '千葉県', 'あと知らん', '090-5554-1234', '99-8888-9999', 'test@aiu.com', NULL, '芸能人', '111122223333', NULL, '正社員', 'test'),
(18, '福山　雅治', 'ふくやま　まさはる', '男性', '1988-11-11', '長崎県', 8888888, '東京都', '多分その辺', '000-0000-0002', '088-123-4569', 'fukuyama@daze.net', 'checked', '歌手', '2222333344445555', 'checked', '正社員', 'aaa'),
(19, '志村　けん', 'しむら　けん', '男性', '1963-03-03', '島根県', 8900000, '鹿児島県', '鹿児島市かな', '000-0000-0001', '088-123-0000', 'g@g.com', 'checked', '芸能人', '1234123412341234', NULL, '経営者', 'ああああああ'),
(20, '小林　愛香', 'こばやし　あいか', '女性', '2000-02-02', '和歌山県', 8900000, '福岡県', '福岡市', '', '', '', 'checked', '', '', NULL, 'アルバイト', ''),
(21, '高橋　一生', 'たかはし　いっせい', '男性', '1980-07-01', '東京都', 1000001, '東京都', '千代田区千代田', '000-0000-1111', '99-8888-0000', 'takahashi@issei.net', 'checked', 'イケメン', '1111222233332222', NULL, '契約社員', 'aaaaa'),
(22, '光浦　靖子', 'みつうら　やすこ', '女性', '1971-05-29', '兵庫県', 8800033, '宮崎県', '宮崎市神宮西', '', '', '', NULL, '', '', 'checked', 'その他', 'ccccc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_list`
--
ALTER TABLE `login_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_list`
--
ALTER TABLE `staff_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_list`
--
ALTER TABLE `login_list`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_list`
--
ALTER TABLE `staff_list`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
