-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2018 at 05:33 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `meaning` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `relatedActors` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `title`, `meaning`, `image`, `relatedActors`) VALUES
(1, 'The Pope', 'Spiritual Father', NULL, ''),
(2, 'Patriarch', 'Spiritual Father', NULL, ''),
(3, 'Отец', 'Spritual Father', NULL, ''),
(4, 'Поп', 'Spritual Father', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `actors_quotes`
--

CREATE TABLE `actors_quotes` (
  `quote_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actors_quotes`
--

INSERT INTO `actors_quotes` (`quote_id`, `actor_id`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `dateAdded` datetime NOT NULL,
  `authorId` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `viewCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `dateAdded`, `authorId`, `image`, `viewCount`) VALUES
(2, '11.19.2018', 'Raffi1', '2018-11-19 19:57:31', 1, 'bcbbd028c1a47781f0f6dc9bcd3ecf2c.jpeg', 3),
(3, '11.19.2019', 'Raffi1', '2018-11-19 19:57:35', 1, 'c7eb381465c59fceae33d6bea38c0867.png', 31),
(7, 'dwadwa', 'gggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '2018-11-28 17:16:39', 1, 'd500aba43261040a16aca2321975bf22.jpeg', 4),
(8, 'pagination', 'hope it works', '2018-12-10 09:45:47', 1, '50060fb6601fa9b21f9d77d7e770c98c.jpeg', 1),
(9, 'test', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', '2018-12-11 13:22:45', 1, '', 3),
(10, 'test', 'gggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '2018-12-11 17:21:44', 1, '78b1de305bd8767a53cb62578db84bec.jpeg', 0),
(11, 'test', 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', '2018-12-11 17:27:57', 1, '', 0),
(12, 'dawda', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2018-12-11 18:34:06', 1, NULL, 0),
(13, 'test2', '34', '2018-12-13 08:47:54', 2, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `meaning` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quotes` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `actors` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `events` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `symbols` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `relatedCategories` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quotes` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `categories` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `symbols` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `relatedEvents` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `verse` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `meaning` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `relatedQuotes` longtext NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `author_id`, `verse`, `place`, `meaning`, `image`, `relatedQuotes`) VALUES
(2, 2, 'And call no man your father on the earth: for one is your Father, which is in heaven.', 'Matthew 23:9', 'Straight forward. We all have biological fathers and we should respect them. Our spiritual father is not on the Earth and is not human. Anyone that is using the title \"father\" is not following the this order.', '7d1ffc46fd1197e01ee10fd0c7491eed.jpeg', ''),
(4, 2, 'Who opposes and exalts himself against every so-called god or object of worship, so that he takes his seat in the temple of God, proclaiming himself to be God.', '2 Thessaloniki 2:4', 'The ethymology of the word \"Satan\" is the one that is \"in oppsition\". \"Temple of God\" in a biblical context should be the christian church. With other words - Satan will be called God and will be warshipped as such there.', '4ee171470870d06d666150d56c38c42a.jpeg', ''),
(6, 1, 'user1', 'test:test', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', NULL, ''),
(7, 1, 'test', 'test:test', 'test', '87df0931e23ed6f07ff2baf3a0108a16.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(2, 'ROLE_ADMIN'),
(1, 'ROLE_USER');

-- --------------------------------------------------------

--
-- Table structure for table `symbols`
--

CREATE TABLE `symbols` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meaning` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quotes` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `events` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `actors` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `categories` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `relatedSymbols` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullName`) VALUES
(1, 'test@test.com', '$2y$13$CrCEi8ifaHo67BBroFG87ezhZvwyfD5kTGJnUBOHNJtJidDM1ZlWW', 'dkrstev'),
(2, 'test2@abv.bg', '$2y$13$Ko8xvEKDStafwwkqnEqEe.ZI2ehU1LKhvNU9DuTvZqgatJsYAzm9u', 'Test'),
(3, 'test@tst.comqq', '$2y$13$v50SqcORVfuosTOR7KovweDZRM3lB6zf46gYwEJj5Oh5W0XTRmoFq', 'erewr'),
(6, 'vkutov@gmail.com', '$2y$13$SeDaO4Rs.JQvbV1E9r70rOgtP4KN9y79Bw1Mbu9FMWhMzK9JZWQAe', '44444444'),
(7, 'teste@test.net', '$2y$13$DZAdxM6H422nzOGDKdWJNu.XQpCFrmXdoToX/kjn1fuCP7DU8lFcW', 'dkrstev'),
(8, 'testes@test.net', '$2y$13$edyLWkIenpdWH1IZbjpPa.uuFvOsSv7/6fkhcgD46Oc6fAvXnj0yy', 'dkrstev'),
(9, 'testes@test1.net', '$2y$13$28WPazNFdnne.Pr6IfVxnOIa0SG5YPavOGel.w0aFNNrTtAFovmja', 'dkrstev'),
(10, 'test@test.netsdd', '$2y$13$pJ9lIb2wcteVwohiICfdaezejxK..w/E/YPIisge6SOcGiCA5Bpl.', 'dkrstev'),
(11, 'test@test.netsrr', '$2y$13$t7lGUKwCkexJpvjB/a0RieZHCxkwetioE2crTYA5/yARP2pCyTwiS', 'dkrstev');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(1, 2),
(2, 1),
(3, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actors_quotes`
--
ALTER TABLE `actors_quotes`
  ADD PRIMARY KEY (`quote_id`,`actor_id`),
  ADD KEY `IDX_D4AA4835DB805178` (`quote_id`),
  ADD KEY `IDX_D4AA483510DAF24A` (`actor_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BFDD3168A196F9FD` (`authorId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5F9E962A7294869C` (`article_id`),
  ADD KEY `IDX_5F9E962AF675F31B` (`author_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_posts_idx` (`user_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A1B588C5F675F31B` (`author_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B63E2EC75E237E06` (`name`);

--
-- Indexes for table `symbols`
--
ALTER TABLE `symbols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `IDX_51498A8EA76ED395` (`user_id`),
  ADD KEY `IDX_51498A8ED60322AC` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `symbols`
--
ALTER TABLE `symbols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actors_quotes`
--
ALTER TABLE `actors_quotes`
  ADD CONSTRAINT `FK_D4AA483510DAF24A` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `FK_D4AA4835DB805178` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`);

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `FK_BFDD3168A196F9FD` FOREIGN KEY (`authorId`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962A7294869C` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `FK_5F9E962AF675F31B` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_users_posts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `FK_A1B588C5F675F31B` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `FK_51498A8EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_51498A8ED60322AC` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
