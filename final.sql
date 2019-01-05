-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 11:14 AM
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
  `meaning` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `title`, `meaning`, `image`, `author_id`) VALUES
(1, 'The Pope', 'Spiritual Father', 'e84a8520a4b44eb295098b29d3704514.jpeg', 1),
(2, 'Patriarch', 'Spiritual Father', 'f8f69a65a0e5f1f4de3db49617bc2d50.jpeg', 1),
(3, 'Отец', 'Spritual Father', NULL, 1),
(4, 'Поп', 'Spritual Father', NULL, 1),
(9, 'Satan', '\"In opposition\"(to God)', 'eb55132accf3fcb833eea678aa8bd2d2.jpeg', 1),
(10, 'Devil', '\"lier\"', '714d51d8e127908d57412a9da1494ec0.jpeg', 1),
(11, 'Lucifer', 'Devil decrepits many by pretending to be an angel of light', 'afb9fec39bfc0e0ea7940712fc8724d9.jpeg', 1),
(12, 'Vicar of Christ', 'Vicar of Christ (from Latin Vicarius Christi) is a term used in different ways and with different theological connotations throughout history. The original notion of a vicar is as an \"earthly representative of Christ\", but it\'s also used in the sense of \"', '84202cc93b7f5e454709305d73b48eaa.jpeg', 1),
(13, 'Antichrist', 'Anti means \"against\" and \"instead of\". So he is against Christs teaching and replaces them with his own that do not come from the Bibile.', '11847173af483d000acf657f7cdbd78e.jpeg', 1),
(24, 'Saints', 'Dead people giving advices about war for example, performing miracles, receiving worship as gods, having temples as gods...', '1f7b4fffcd05de2d74f2b2a3a29a3fb1.jpeg', 1),
(25, 'Queen Of Heaven', 'Queen of Heaven was a title given to a number of ancient sky goddesses worshipped throughout the ancient Mediterranean and Near East during ancient times. Goddesses known to have been referred to by the title include Inanna, Anat, Isis, Astarte, and possi', 'f0ec25277b9071aeb7043f4d47cd6f7b.png', 1),
(26, 'Virgin Mary', 'Muslim religons does not value women even compared to Christian, Still they made a cult to the Queen Of Heaven via Virgin Mary. According to Vtitican she is not only that but a crescent as well. This is a cross reference between catholism, paganism, islam', 'd74d3c6c7b0786d5dff24d314bc1e046.jpeg', 1),
(27, 'Solar Deity', 'The Neolithic concept of a \"solar barge\" (also \"solar bark\", \"solar barque\", \"solar boat\" and \"sun boat\", a mythological representation of the sun riding in a boat) is found in the later myths of ancient Egypt, with Ra and Horus. Predynasty Egyptian belie', '5b5db9f0a7cb362cbb66b361feb21bcf.jpeg', 1),
(28, 'Artemis', 'Queen of Heaven was a title given to a number of ancient sky goddesses worshipped throughout the ancient Mediterranean and Near East during ancient times. Goddesses known to have been referred to by the title include Inanna, Anat, Isis, Astarte, and possi', '1afaaf38c98daf3fa873f6e5202e08b5.jpeg', 1),
(29, 'Babylon The Great', 'She is a powerful international entity like false religion. Rather than teaching people how to draw closer to the true God, false religion actually leads them to worship other gods. The Bible calls this “spiritual prostitution.” (Leviticus 20:6; Exodus 34', 'd8a7f59d78cffd5a6259e4c132925f84.jpeg', 1),
(31, 'test', 'vvvvvvvvvvvvvvvvv', NULL, 1);

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
(2, 2),
(2, 3),
(2, 4),
(2, 9),
(2, 12),
(2, 31),
(4, 2),
(4, 9),
(4, 12),
(4, 13),
(4, 29),
(25, 3),
(25, 4),
(25, 9),
(25, 10),
(26, 1),
(26, 2),
(26, 12),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(29, 10),
(29, 11),
(30, 9),
(30, 10),
(30, 11),
(30, 12),
(30, 13),
(33, 1),
(33, 2),
(33, 3),
(33, 4),
(33, 26),
(37, 9),
(44, 1),
(44, 2),
(44, 3),
(44, 4),
(44, 12),
(48, 12),
(48, 24),
(48, 28),
(50, 1),
(50, 2),
(50, 3),
(50, 4),
(50, 9),
(50, 24),
(52, 25),
(52, 28),
(53, 25),
(53, 28),
(54, 1),
(54, 2),
(54, 3),
(54, 4),
(54, 24),
(54, 27),
(55, 1),
(55, 2),
(55, 3),
(55, 4),
(55, 24),
(55, 25),
(55, 29),
(56, 1),
(56, 2),
(56, 3),
(56, 4),
(56, 29),
(57, 25),
(57, 29),
(58, 1),
(58, 2),
(58, 3),
(58, 4),
(58, 25),
(58, 29),
(59, 1),
(59, 2),
(59, 3),
(59, 4),
(59, 29),
(60, 29),
(61, 2);

-- --------------------------------------------------------

--
-- Table structure for table `actor_actor`
--

CREATE TABLE `actor_actor` (
  `actor_source` int(11) NOT NULL,
  `actor_target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actor_actor`
--

INSERT INTO `actor_actor` (`actor_source`, `actor_target`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 12),
(2, 3),
(2, 4),
(9, 10),
(9, 11),
(9, 12),
(9, 13),
(10, 9),
(10, 11),
(10, 12),
(10, 13),
(11, 9),
(11, 10),
(12, 1),
(12, 13),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 11),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(25, 1),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 24),
(26, 25),
(27, 1),
(27, 11),
(27, 12),
(27, 25),
(28, 25),
(29, 12),
(29, 13),
(29, 25),
(31, 1);

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
  `meaning` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `meaning`, `image`, `author_id`) VALUES
(1, 'Politics', 'Jesus avoided to get involved in politics. He even run away when the Israelites wanted to make him a king.', 'ffbced6faf0f0a24ea5b35af6d9f1dd4.png', 1),
(2, 'Paganism(historic)', 'Satan wants to move us away from God by making us disobedient and superstitious. False gods replace true worship. Spiritually, people are \"in the hands\" of those who they worship.', '88d69e3a4653a9c2cf496f3da98b66c5.jpeg', 1),
(4, 'Spiritism', 'The Bible is clear concerning attempts by the living to contact the dead—a practice that was common in ancient times. For example, God’s Law to the nation of Israel said: “There should not be found in you anyone . . . who consults a spirit medium', '75c5dc61cc0c2d3ef549e02e68bf0ff1.jpeg', 1),
(5, 'Magic and Witchcraft', 'Satan wants you to practice magic. Many make sacrifices to ancestors or spirits to protect themselves from harm. They do this because they fear the powers of the spirit world. They wear magical rings or bracelets to protect them.', '587d7d211021dab8956d158ca28a7a93.png', 1),
(6, 'Satanism', 'Satanists love symbols which could be seen in rites , literature, clothes. Take a look at the them-  crescent-1, penthagram-2,(star ), head of goat, body of man, breasts of female(4), snakes(3). Ruling over the world-5 and cross. Turning the cross up side', 'dac686f82e8641dbbbd314eaf0ab3a25.png', 1),
(7, 'State Church', 'Power union between two political forces-the kings and clergy. On a contrary Jesus was never involved in politics, war and so on. He did not try to fix it as it is pointless. The problem is when people start \"playing Gods\" and control other people. The st', 'f07398d3babd40dc7fd59883012b716f.png', 1),
(8, 'Non Christian religions(modern)', 'The Bible identifies JHWH as the only true God.', '5331f88ab3cf84bfd42b7b7980787a11.jpeg', 1),
(9, 'Idolatry', 'An idol is an image, a representation of anything, or a symbol that is an object of passionate devotion, whether material or imagined. Generally speaking, idolatry is the veneration, love, worship, or adoration of an idol. It is usually practiced toward a', '9714160e72ae629ee690618040df3e64.png', 1),
(10, 'Just Testing', 'ddddddddddddddddddddddddd', '3f6d11af8659cd65ad72a1d114cece8e.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_actors`
--

CREATE TABLE `cat_actors` (
  `actor_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_actors`
--

INSERT INTO `cat_actors` (`actor_id`, `cat_id`) VALUES
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 4),
(2, 7),
(2, 9),
(2, 10),
(3, 7),
(3, 9),
(4, 7),
(4, 9),
(9, 1),
(9, 2),
(9, 4),
(9, 5),
(9, 6),
(10, 1),
(10, 2),
(10, 4),
(10, 5),
(10, 6),
(11, 1),
(11, 2),
(11, 4),
(11, 5),
(11, 6),
(12, 1),
(12, 6),
(12, 7),
(13, 1),
(13, 2),
(13, 6),
(24, 1),
(24, 2),
(24, 4),
(24, 7),
(24, 9),
(25, 2),
(25, 6),
(25, 7),
(25, 8),
(25, 9),
(26, 2),
(26, 7),
(26, 8),
(27, 1),
(27, 2),
(28, 2),
(29, 2),
(29, 4),
(29, 5),
(29, 7),
(29, 8),
(29, 9),
(31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_events`
--

CREATE TABLE `cat_events` (
  `event_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_events`
--

INSERT INTO `cat_events` (`event_id`, `cat_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(5, 1),
(5, 5),
(5, 6),
(5, 7),
(5, 9),
(5, 10),
(6, 1),
(6, 6),
(6, 7),
(7, 5),
(7, 6),
(8, 7),
(8, 9),
(9, 6),
(9, 9),
(10, 6),
(10, 8),
(10, 9),
(11, 1),
(11, 6),
(11, 9);

-- --------------------------------------------------------

--
-- Table structure for table `cat_quotes`
--

CREATE TABLE `cat_quotes` (
  `quote_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cat_quotes`
--

INSERT INTO `cat_quotes` (`quote_id`, `cat_id`) VALUES
(2, 7),
(2, 8),
(2, 10),
(4, 7),
(4, 10),
(25, 1),
(28, 1),
(29, 1),
(29, 2),
(29, 4),
(29, 5),
(29, 6),
(29, 7),
(30, 1),
(33, 1),
(33, 2),
(33, 7),
(33, 8),
(33, 9),
(44, 2),
(44, 4),
(44, 7),
(44, 8),
(48, 1),
(48, 2),
(48, 4),
(50, 1),
(50, 5),
(50, 7),
(50, 9),
(52, 2),
(52, 7),
(52, 8),
(52, 9),
(53, 2),
(54, 2),
(54, 4),
(54, 5),
(54, 7),
(54, 9),
(55, 1),
(55, 2),
(55, 7),
(55, 9),
(56, 1),
(56, 2),
(56, 7),
(56, 8),
(57, 1),
(57, 2),
(57, 7),
(57, 8),
(58, 2),
(58, 7),
(58, 8),
(59, 4),
(59, 5),
(59, 7),
(59, 8),
(60, 4),
(60, 7),
(60, 8),
(60, 9),
(61, 2);

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
  `meaning` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `meaning`, `image`, `author_id`) VALUES
(1, 'Sun worship', 'A solar deity (also sun god or sun goddess) is a sky deity who represents the Sun, or an aspect of it, usually by its perceived power and strength. Solar deities and sun worship can be found throughout most of recorded history in various forms in Greek, E', '4ee9662f29c299f0425d0ef9f5159f0c.png', 1),
(5, 'Idols Worship', 'An idol is an image, a representation of anything, or a symbol that is an object of passionate devotion, whether material or imagined. Generally speaking, idolatry is the veneration, love, worship, or adoration of an idol. It is usually practiced toward a', '6b3c72e419524cfa52562e213ea55393.jpeg', 1),
(6, 'Money Worship', 'The love of money”—not money itself—causes “injurious things.” In the Bible, wealthy King Solomon identified three kinds of injurious things that often happen to people who love money', 'b5309507cc8679c8484fc17c819326a9.jpeg', 1),
(7, 'Birthdays', 'Actually, the Bible mentions birthday celebrations only in the cases of Egypt’s Pharaoh during the days of Joseph and Herod Antipas of the first century C.E. (Gen. 40:20; Matt. 14:6-11) These celebrations, however, appear in an unfavorable light, for both', 'f4ebe612fee8b58795564f96387e6952.gif', 1),
(8, 'Christmas', 'The most popular Christian holiday is not in the Bible! None bothered to say to give a date for the birth of the Missiah, and he did not ask to be honored like that. We know that it has been relatively warm as people slept outside so it is most probably n', 'faff51908da0a114dee3ad07c43fec39.jpeg', 1),
(9, 'Midsummer', 'Midsummer is the period of time centered upon the summer solstice, and more specifically the northern European celebrations that accompany the actual solstice or take place on a day between June 19 and June 25 and the preceding evening. The exact dates va', 'eea5444dc24fa8ff313ef6b3e3c04c89.jpeg', 1),
(10, 'Salah', 'Salah (\"prayer\", ‏صلاة‎; pl. ‏صلوات‎ ṣalawāt; also salat), or Namāz (Persian: نَماز‎) in some languages, is one of the Five Pillars in the faith of Islam and an obligatory religious duty for every Muslim . It is a physical, mental, and spiritual act of wo', 'ca9ee0eb10bba4c2a7f1ffa9a48d7e02.jpeg', 1),
(11, 'Worship of icons', 'They are just idols in pseudo Christian disguise', '041ab4eff4994cdccdb980933df13f54.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events_actors`
--

CREATE TABLE `events_actors` (
  `event_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events_actors`
--

INSERT INTO `events_actors` (`event_id`, `actor_id`) VALUES
(1, 1),
(5, 1),
(6, 1),
(8, 1),
(11, 1),
(8, 2),
(11, 2),
(8, 3),
(11, 3),
(8, 4),
(11, 4),
(8, 24),
(5, 25),
(11, 25),
(5, 26),
(11, 26),
(1, 27),
(5, 27),
(6, 27),
(8, 27),
(11, 27),
(5, 28),
(11, 28),
(5, 29),
(11, 29),
(1, 31),
(5, 31);

-- --------------------------------------------------------

--
-- Table structure for table `events_quotes`
--

CREATE TABLE `events_quotes` (
  `event_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events_quotes`
--

INSERT INTO `events_quotes` (`event_id`, `quote_id`) VALUES
(1, 30),
(1, 33),
(1, 44),
(1, 48),
(1, 53),
(1, 54),
(1, 61),
(5, 30),
(5, 44),
(5, 48),
(5, 50),
(5, 53),
(5, 54),
(5, 58),
(5, 59),
(5, 60),
(6, 30),
(6, 37),
(6, 44),
(6, 55),
(7, 33),
(7, 44),
(8, 37),
(8, 44),
(8, 54),
(8, 60),
(9, 44),
(10, 29),
(10, 44),
(11, 30),
(11, 33),
(11, 44),
(11, 54),
(11, 57),
(11, 58),
(11, 59),
(11, 60);

-- --------------------------------------------------------

--
-- Table structure for table `event_event`
--

CREATE TABLE `event_event` (
  `event_source` int(11) NOT NULL,
  `event_target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_event`
--

INSERT INTO `event_event` (`event_source`, `event_target`) VALUES
(1, 1),
(5, 1),
(5, 11),
(6, 5),
(6, 8),
(7, 6),
(8, 1),
(8, 5),
(8, 6),
(8, 7),
(9, 1),
(10, 1),
(10, 5),
(10, 9),
(11, 1),
(11, 7),
(11, 8);

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
  `meaning` mediumtext NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `author_id`, `verse`, `place`, `meaning`, `image`) VALUES
(2, 1, 'And call no man your father on the earth: for one is your Father, which is in heaven.', 'Matthew 23:9', 'Straight forward...We all have biological fathers and we should respect them. Our spiritual father is not on the Earth and is not human. Anyone that is using the title \"father\" not in a biological context is not following the this order.', '7a50965da6cfe75aa356fe260da949e3.jpeg'),
(4, 1, 'He will oppose and will exalt himself over everything that is called God or is worshiped, so that he sets himself up in God’s temple, proclaiming himself to be God.', '2 Thessalonians 2:4', 'The etymology of he ward \"Satan\" is \"in oppostion\". The temple of God in a Biblical context  is the christian church.', 'e9b4546de439d17db5357266ca826c23.jpeg'),
(25, 1, 'At this the serpent said to the woman: “You certainly will not die.+ 5  For God knows that in the very day you eat from it, your eyes will be opened and you will be  opened and you will be like God, knowing good and bad', 'Genesis 3:1-24', 'At that point only God rule over people. Good and evil were already  set-t.ex. lying is evil, truth is good.   Satan even accuses the Creator of being selfish and a lier. As a result of the fall rules over man and we live in a society where moral is a ver', '9eca296ae7db5f6dcb65e3f03ef7a5da.png'),
(26, 1, 'My kingdom is not of this world. If it were, my servants would fight to prevent my arrest by the Jewish leaders. But now my kingdom is from another place', 'John 18:36', 'Looks like Jesus did not want to get his hands dirty with human politics.', 'aae7e1b98add515ff25af0cc2cc03918.jpeg'),
(27, 1, 'Jesus, knowing that they intended to come and make him king by force, withdrew again to a mountain by himself.', 'John 18:36', 'Looks like Jesus did not want to get his hands dirty in politics...', '19ffb45bd6639990654fd62a148a113e.jpeg'),
(28, 1, 'All of this I have seen, and I applied my heart to every work that has been done under the sun, during the time that man has dominated man to his harm', 'Ecclesiastes 8:9', 'The idea of man dominating over man is not from Satan. it is not the original plan', 'c405cf29248fed575d427123269305b2.png'),
(29, 1, 'How you have fallen from heaven, morning star, son of the dawn! You have been cast down to the earth, you who once laid low the nations!', 'Isaiah 14:12', 'The Hebrew word translated “Lucifer” means “shining one.” The Septuagint uses the Greek word that means “bringer of dawn.” Hence, some translations render the original Hebrew “morning star” or “Daystar.” But Jerome’s Latin Vulgate uses “Lucifer” (light be', '365472a8bb43ac5a32bee4043d2f452c.jpeg'),
(30, 1, 'But woe to the earth and the sea,\r\n    because the devil has gone down to you!\r\nHe is filled with fury,\r\n    because he knows that his time is short', 'Relevation 12:12', 'Satan has little time left', 'e924a26744851beb6dc69d3a4ee34fba.jpeg'),
(33, 1, 'But Jesus said to her: “Woman, why is that of concern to me and to you? My hour has not yet come.”', 'John 2:4', 'Jesus Mother is not a God, she is a human. Many religions make her God which is wrong', 'f85019efe98b97a270997d19fa7a208b.jpeg'),
(34, 1, 'This means everlasting life,+ their coming to know you, the only true God,+ and the one whom you sent, Jesus Christ', 'John 17:3', 'There are many lies and only one truth.', '699beae43a7edab788929a8fd5e30285.jpeg'),
(37, 1, 'The love of money is a root of all sorts of injurious things', '1 Timothy 6:10.', 'Money also helps you to take care of your family. In fact, the Bible states: “If anyone does not provide for those who are his own, and especially for those who are members of his household, he has disowned the faith.”', NULL),
(44, 1, 'Therefore, my beloved ones, flee from idolatry', '1 Corinthians 10:14', 'self explanatory', 'd1bb296dc7924bb850b342aabd509a9a.jpeg'),
(48, 1, 'Let no one be found among you who sacrifices their son or daughter in the fire, who practices divination or sorcery, interprets omens, engages in witchcraft,  or casts spells, or who is a medium or spiritist or who consults the dead.', 'Deuteronomy 18:10-12', 'We should not try contact the dead or make magic. Yet there are saints nd celebrations in Christianity that do exactly the same...', '7de26827e6f96f3e3e30fd0fab26c51c.jpeg'),
(50, 1, 'You must not make for yourself a carved image or a form* like anything that is in the heavens above or on the earth below or in the waters under the earth.+ 5 You must not bow down to them nor be enticed to serve them', 'Exodus 20:4', 'God’s law not to form images did not rule out the making of all representations and statues.', '3bc55d5a3a0fa66a48267574bc395029.jpeg'),
(52, 1, 'Instead, we will surely carry out every word that our mouths have spoken, to make sacrifices to the Queen of Heaven* and to pour out drink offerings to her', 'Jeremiah 44:17', 'The women baked sacrificial cakes, the sons collected the firewood, and the fathers lit the fires.  Definitely an idol that God does not like!', '50b6af0c306e22f05547c66e5bb13d4a.jpeg'),
(53, 1, '“Great is Artemis of the Ephesians!', 'Acts 19:24-41', 'This is in modern Turkey where people shout \"Great is Allah\"', 'ea42d5c298aea477a63ca2490eff90ac.jpeg'),
(54, 1, 'Their idols are silver and gold,The work of human hands. A mouth they have, but they cannot speak;Eyes, but they cannot see;  Ears they have, but they cannot hear;... The people who make them will become just like them', 'Psalm 115 4:8', 'An idol is an image, a representation of anything, or a symbol that is an object of passionate devotion, whether material or imagined. Generally speaking, idolatry is the veneration, love, worship, or adoration of an idol. It is usually practiced toward a', 'a07b6017ae9d991f3fb04abfa00848a4.jpeg'),
(55, 1, 'Come, I will show you the judgment on the great prostitute who sits on many waters, with whom the kings of the earth committed sexual immorality', 'Revelation  17:1', 'Babylon the Great is a symbol. The Bible describes her as “a woman” and a “great prostitute,” having a name that is “a mystery: ‘Babylon the Great.’” (Revelation 17:​1, 3, 5) The book of Revelation is presented “in signs,” so it is reasonable to conclude that Babylon the Great is a symbol, not a literal woman. (Revelation 1:1) In addition, she “sits on many waters,” which represent “peoples and crowds and nations and tongues.” (Revelation 17:​1, 15) A literal woman could not do that.Rather than teaching people how to draw closer to the true God, false religion actually leads them to worship other gods. The Bible calls this “spiritual prostitution.” (Leviticus 20:6; Exodus 34:15, 16)', '65dae127bcfd0b4f8863cdadbd4b089a.jpeg'),
(56, 1, 'And the woman whom you saw means the great city that has a kingdom over the kings of the earth.', 'Revelation 17:18', 'Thus, she has international scope and influence.', '7f35fb1639680135f3052b883f9c5d5c.jpeg'),
(57, 1, 'And the kings of the earth who committed sexual immorality* with her and lived with her in shameless luxury will weep and beat themselves in grief over her when they see the smoke from her burning', 'Revelation 18:9', 'Babylon the Great cannot be a political entity, because “the kings of the earth” mourn her destruction.', '2f8d9aa19a3de0e9971cd80b0bdf3d56.png'),
(58, 1, 'Also, the merchants of the earth are weeping and mourning over her, because there is no one to buy their full cargo anymore', 'Revelation 18:11', 'Babylon the Great is not a commercial power, because the Bible distinguishes her from “the merchants of the earth.', 'edf0b0be2ca3dfa3cba2dfb4d0d879c1.jpeg'),
(59, 1, 'She has fallen! Babylon the Great has fallen, and she has become a dwelling place of demons and a place where every unclean spirit', 'Revelation 18:2', 'There are many practices that are spiritsm-talking to the dead, warshipping dead, idols, casting spells and so on...', 'b7d9e4830041c886f94a42261c4f8da7.jpeg'),
(60, 1, 'No light of a lamp will ever shine in you again, and no voice of a bridegroom and of a bride will ever be heard in you again; for your merchants were the top-ranking men of the earth, and by your spiritistic practices', 'Revelation 18:23', 'Meaning: There are many practices that are spirits-talking to the dead, worshipping dead, idols, casting spells and so on...', '56ca75b45b021d66a6bc9635a38600de.jpeg'),
(61, 1, 'testing', 'test:test', 'vvvvvvvvvvvvv', 'd749b680485b1810dc26a76cd3931783.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `quote_quote`
--

CREATE TABLE `quote_quote` (
  `quote_source` int(11) NOT NULL,
  `quote_target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quote_quote`
--

INSERT INTO `quote_quote` (`quote_source`, `quote_target`) VALUES
(25, 26),
(26, 34),
(27, 26),
(28, 25),
(28, 26),
(28, 27),
(29, 2),
(29, 4),
(29, 25),
(30, 26),
(33, 25),
(34, 26),
(44, 4),
(44, 48),
(44, 50),
(48, 4),
(50, 48),
(52, 44),
(52, 48),
(52, 50),
(53, 44),
(53, 52),
(54, 48),
(54, 50),
(54, 52),
(56, 26),
(56, 27),
(56, 28),
(56, 30),
(57, 55),
(58, 55),
(58, 56),
(58, 57),
(59, 4),
(59, 44),
(59, 48),
(59, 50),
(59, 56),
(60, 59),
(61, 4);

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
  `meaning` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `symbols`
--

INSERT INTO `symbols` (`id`, `meaning`, `image`, `author_id`, `name`) VALUES
(1, 'Pentagrams were used symbolically in ancient Greece and Babylonia, and are used today as a symbol of faith by many Wiccans, akin to the use of the cross by Christians and the Star of David by the Jews. The pentagram has magical associations. Many people w', '54df6ac3cf41542cfab5b0f52eecacfd.jpeg', 1, 'Pentagram(Star, Sun)'),
(2, 'Crescents appearing together with a star or stars are a common feature of Sumerian iconography, the crescent usually being associated with the moon god Sin (Nanna) and the star with Ishtar (Inanna, i.e. Venus), often placed alongside the sun disk of Shama', 'ddc190e9085680a85647ad571a9859b7.jpeg', 1, 'Crescent'),
(5, 'Political and religious symbol of islam, found in magic, paganism , satanism, catholic and so on,', '73dbd42c8db84e051047b30ff366c0ac.jpeg', 1, 'Star And Crescent'),
(6, 'Many view the cross as the most common symbol of Christianity. However, the Bible does not describe the instrument of Jesus’ death, so no one can know its shape with absolute certainty. Still, the Bible provides evidence that Jesus died, not on a cross, b', 'e35d2131b9e7eda64aad66136001e812.jpeg', 1, 'Cross'),
(7, 'Describing the laws that God gave to the nation of Israel, the New Catholic Encyclopedia notes: “From various Biblical accounts it is evident that the true worship of God was devoid of images.”', 'cdef5ab42f0c4ca91e02f02bddb6c9f9.jpeg', 1, 'Icons'),
(8, 'The stone was venerated at the Kaaba in pre-Islamic pagan times. According to Islamic tradition, it was set intact into the Kaaba\'s wall by the prophet Muhammad in 605 CE, five years before his first revelation. Since then it has been broken into fragment', 'c5e14d61e5117bc79f647b0685244640.jpeg', 1, 'Black Stone'),
(9, 'The Statue of Liberty is a figure of Libertas, a robed Roman liberty goddess. She holds a torch above her head with her right hand, and in her left hand carries a tabula ansata inscribed in Roman numerals with \"JULY IV MDCCLXXVI\" (July 4, 1776), the date', 'b28d089811e46628987297aa1075195f.jpeg', 1, 'Statue Of Liberty');

-- --------------------------------------------------------

--
-- Table structure for table `symbols_actors`
--

CREATE TABLE `symbols_actors` (
  `symbol_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `symbols_actors`
--

INSERT INTO `symbols_actors` (`symbol_id`, `actor_id`) VALUES
(1, 1),
(2, 1),
(5, 1),
(6, 1),
(7, 1),
(1, 2),
(6, 2),
(7, 2),
(1, 3),
(7, 3),
(1, 4),
(7, 4),
(1, 9),
(5, 9),
(1, 10),
(1, 12),
(6, 12),
(7, 12),
(1, 13),
(2, 13),
(5, 13),
(6, 13),
(5, 24),
(6, 24),
(2, 25),
(2, 26),
(1, 27),
(5, 27),
(2, 28),
(1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `symbols_cat`
--

CREATE TABLE `symbols_cat` (
  `symbol_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `symbols_cat`
--

INSERT INTO `symbols_cat` (`symbol_id`, `cat_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 9),
(1, 10),
(2, 1),
(2, 2),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(5, 1),
(5, 2),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(6, 6),
(6, 9),
(7, 9),
(8, 8),
(8, 9),
(9, 1),
(9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `symbols_events`
--

CREATE TABLE `symbols_events` (
  `symbol_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `symbols_events`
--

INSERT INTO `symbols_events` (`symbol_id`, `event_id`) VALUES
(1, 1),
(1, 8),
(2, 5),
(2, 11),
(5, 1),
(5, 5),
(5, 11),
(6, 1),
(6, 5),
(6, 7),
(6, 8),
(6, 9),
(7, 1),
(8, 10),
(9, 1),
(9, 5),
(9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `symbols_quotes`
--

CREATE TABLE `symbols_quotes` (
  `symbol_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `symbols_quotes`
--

INSERT INTO `symbols_quotes` (`symbol_id`, `quote_id`) VALUES
(8, 29),
(1, 30),
(2, 44),
(5, 44),
(6, 44),
(5, 48),
(6, 48),
(2, 50),
(5, 50),
(7, 50),
(9, 50),
(2, 52),
(2, 53),
(1, 54),
(2, 54),
(5, 54),
(6, 54),
(6, 58),
(7, 58),
(1, 59),
(2, 59),
(5, 59),
(6, 59),
(7, 59),
(8, 59),
(9, 59),
(2, 61);

-- --------------------------------------------------------

--
-- Table structure for table `symbol_symbol`
--

CREATE TABLE `symbol_symbol` (
  `symbol_source` int(11) NOT NULL,
  `symbol_target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `symbol_symbol`
--

INSERT INTO `symbol_symbol` (`symbol_source`, `symbol_target`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 5),
(5, 1),
(5, 2),
(6, 6),
(7, 5),
(7, 6),
(9, 1);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DF2BF0E5F675F31B` (`author_id`);

--
-- Indexes for table `actors_quotes`
--
ALTER TABLE `actors_quotes`
  ADD PRIMARY KEY (`quote_id`,`actor_id`),
  ADD KEY `IDX_D4AA4835DB805178` (`quote_id`),
  ADD KEY `IDX_D4AA483510DAF24A` (`actor_id`);

--
-- Indexes for table `actor_actor`
--
ALTER TABLE `actor_actor`
  ADD PRIMARY KEY (`actor_source`,`actor_target`),
  ADD KEY `IDX_60F1BD6DA8CCACC5` (`actor_source`),
  ADD KEY `IDX_60F1BD6DB129FC4A` (`actor_target`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3AF34668F675F31B` (`author_id`);

--
-- Indexes for table `cat_actors`
--
ALTER TABLE `cat_actors`
  ADD PRIMARY KEY (`actor_id`,`cat_id`),
  ADD KEY `IDX_12C159010DAF24A` (`actor_id`),
  ADD KEY `IDX_12C1590E6ADA943` (`cat_id`);

--
-- Indexes for table `cat_events`
--
ALTER TABLE `cat_events`
  ADD PRIMARY KEY (`event_id`,`cat_id`),
  ADD KEY `IDX_8D80B23F71F7E88B` (`event_id`),
  ADD KEY `IDX_8D80B23FE6ADA943` (`cat_id`);

--
-- Indexes for table `cat_quotes`
--
ALTER TABLE `cat_quotes`
  ADD PRIMARY KEY (`quote_id`,`cat_id`),
  ADD KEY `IDX_7FB26DB0DB805178` (`quote_id`),
  ADD KEY `IDX_7FB26DB0E6ADA943` (`cat_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5387574AF675F31B` (`author_id`);

--
-- Indexes for table `events_actors`
--
ALTER TABLE `events_actors`
  ADD PRIMARY KEY (`actor_id`,`event_id`),
  ADD KEY `IDX_D96C9D071F7E88B` (`event_id`),
  ADD KEY `IDX_D96C9D010DAF24A` (`actor_id`);

--
-- Indexes for table `events_quotes`
--
ALTER TABLE `events_quotes`
  ADD PRIMARY KEY (`event_id`,`quote_id`),
  ADD KEY `IDX_7308B1F071F7E88B` (`event_id`),
  ADD KEY `IDX_7308B1F0DB805178` (`quote_id`);

--
-- Indexes for table `event_event`
--
ALTER TABLE `event_event`
  ADD PRIMARY KEY (`event_source`,`event_target`),
  ADD KEY `IDX_7AB5BB8B6D130821` (`event_source`),
  ADD KEY `IDX_7AB5BB8B74F658AE` (`event_target`);

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
-- Indexes for table `quote_quote`
--
ALTER TABLE `quote_quote`
  ADD PRIMARY KEY (`quote_source`,`quote_target`),
  ADD KEY `IDX_668E46956532D130` (`quote_source`),
  ADD KEY `IDX_668E46957CD781BF` (`quote_target`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DF834D85F675F31B` (`author_id`);

--
-- Indexes for table `symbols_actors`
--
ALTER TABLE `symbols_actors`
  ADD PRIMARY KEY (`actor_id`,`symbol_id`),
  ADD KEY `IDX_C781A80CC0F75674` (`symbol_id`),
  ADD KEY `IDX_C781A80C10DAF24A` (`actor_id`);

--
-- Indexes for table `symbols_cat`
--
ALTER TABLE `symbols_cat`
  ADD PRIMARY KEY (`symbol_id`,`cat_id`),
  ADD KEY `IDX_77320605E6ADA943` (`cat_id`),
  ADD KEY `IDX_77320605C0F75674` (`symbol_id`);

--
-- Indexes for table `symbols_events`
--
ALTER TABLE `symbols_events`
  ADD PRIMARY KEY (`symbol_id`,`event_id`),
  ADD KEY `IDX_4B2D0FA3C0F75674` (`symbol_id`),
  ADD KEY `IDX_4B2D0FA371F7E88B` (`event_id`);

--
-- Indexes for table `symbols_quotes`
--
ALTER TABLE `symbols_quotes`
  ADD PRIMARY KEY (`quote_id`,`symbol_id`),
  ADD KEY `IDX_B91FD02CC0F75674` (`symbol_id`),
  ADD KEY `IDX_B91FD02CDB805178` (`quote_id`);

--
-- Indexes for table `symbol_symbol`
--
ALTER TABLE `symbol_symbol`
  ADD PRIMARY KEY (`symbol_source`,`symbol_target`),
  ADD KEY `IDX_73F2175AC0B05ED0` (`symbol_source`),
  ADD KEY `IDX_73F2175AD9550E5F` (`symbol_target`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `symbols`
--
ALTER TABLE `symbols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actors`
--
ALTER TABLE `actors`
  ADD CONSTRAINT `FK_DF2BF0E5F675F31B` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `actors_quotes`
--
ALTER TABLE `actors_quotes`
  ADD CONSTRAINT `FK_D4AA483510DAF24A` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `FK_D4AA4835DB805178` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`);

--
-- Constraints for table `actor_actor`
--
ALTER TABLE `actor_actor`
  ADD CONSTRAINT `FK_60F1BD6DA8CCACC5` FOREIGN KEY (`actor_source`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_60F1BD6DB129FC4A` FOREIGN KEY (`actor_target`) REFERENCES `actors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `FK_BFDD3168A196F9FD` FOREIGN KEY (`authorId`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_3AF34668F675F31B` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cat_actors`
--
ALTER TABLE `cat_actors`
  ADD CONSTRAINT `FK_12C159010DAF24A` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `FK_12C1590E6ADA943` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `cat_events`
--
ALTER TABLE `cat_events`
  ADD CONSTRAINT `FK_8D80B23F71F7E88B` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `FK_8D80B23FE6ADA943` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `cat_quotes`
--
ALTER TABLE `cat_quotes`
  ADD CONSTRAINT `FK_7FB26DB0DB805178` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`),
  ADD CONSTRAINT `FK_7FB26DB0E6ADA943` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962A7294869C` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `FK_5F9E962AF675F31B` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `FK_5387574AF675F31B` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events_actors`
--
ALTER TABLE `events_actors`
  ADD CONSTRAINT `FK_D96C9D071F7E88B` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `FK_events_actors_actors` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`);

--
-- Constraints for table `events_quotes`
--
ALTER TABLE `events_quotes`
  ADD CONSTRAINT `FK_7308B1F071F7E88B` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `FK_7308B1F0DB805178` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`);

--
-- Constraints for table `event_event`
--
ALTER TABLE `event_event`
  ADD CONSTRAINT `FK_7AB5BB8B6D130821` FOREIGN KEY (`event_source`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7AB5BB8B74F658AE` FOREIGN KEY (`event_target`) REFERENCES `events` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `quote_quote`
--
ALTER TABLE `quote_quote`
  ADD CONSTRAINT `FK_668E46956532D130` FOREIGN KEY (`quote_source`) REFERENCES `quotes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_668E46957CD781BF` FOREIGN KEY (`quote_target`) REFERENCES `quotes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `symbols`
--
ALTER TABLE `symbols`
  ADD CONSTRAINT `FK_DF834D85F675F31B` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `symbols_actors`
--
ALTER TABLE `symbols_actors`
  ADD CONSTRAINT `FK_C781A80C10DAF24A` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `FK_C781A80CC0F75674` FOREIGN KEY (`symbol_id`) REFERENCES `symbols` (`id`);

--
-- Constraints for table `symbols_cat`
--
ALTER TABLE `symbols_cat`
  ADD CONSTRAINT `FK_77320605C0F75674` FOREIGN KEY (`symbol_id`) REFERENCES `symbols` (`id`),
  ADD CONSTRAINT `FK_77320605E6ADA943` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `symbols_events`
--
ALTER TABLE `symbols_events`
  ADD CONSTRAINT `FK_4B2D0FA371F7E88B` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `FK_4B2D0FA3C0F75674` FOREIGN KEY (`symbol_id`) REFERENCES `symbols` (`id`);

--
-- Constraints for table `symbols_quotes`
--
ALTER TABLE `symbols_quotes`
  ADD CONSTRAINT `FK_B91FD02CC0F75674` FOREIGN KEY (`symbol_id`) REFERENCES `symbols` (`id`),
  ADD CONSTRAINT `FK_B91FD02CDB805178` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`);

--
-- Constraints for table `symbol_symbol`
--
ALTER TABLE `symbol_symbol`
  ADD CONSTRAINT `FK_73F2175AC0B05ED0` FOREIGN KEY (`symbol_source`) REFERENCES `symbols` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_73F2175AD9550E5F` FOREIGN KEY (`symbol_target`) REFERENCES `symbols` (`id`) ON DELETE CASCADE;

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
