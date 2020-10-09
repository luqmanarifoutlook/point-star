-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 01:56 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `point-star`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(10) NOT NULL DEFAULT '0',
  `id_friend` int(10) NOT NULL DEFAULT '0',
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created`, `id_user`, `id_friend`, `message`) VALUES
(1, '2020-10-08 03:54:56', 2, 7, 'You might consider just not doing this in your query. This is formatting, not querying anymore. You get a clear true/false 1/0 in return which should do the trick.'),
(2, '2020-10-09 18:51:40', 1, 2, 'Hello there!');

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE `relation` (
  `id` int(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(10) NOT NULL DEFAULT '0',
  `id_friend` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`id`, `created`, `id_user`, `id_friend`) VALUES
(1, '2020-10-08 02:15:26', 2, 3),
(2, '2020-10-08 02:15:26', 2, 5),
(3, '2020-10-08 02:15:26', 3, 4),
(4, '2020-10-08 02:15:26', 3, 5),
(5, '2020-10-08 02:15:26', 4, 5),
(6, '2020-10-08 02:15:26', 5, 7),
(7, '2020-10-08 02:15:26', 6, 3),
(8, '2020-10-08 02:15:26', 6, 7),
(9, '2020-10-08 08:17:24', 1, 5),
(10, '2020-10-08 08:18:04', 1, 7),
(11, '2020-10-09 18:39:32', 1, 2),
(12, '2020-10-09 18:39:43', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `bio` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created`, `name`, `email`, `password`, `phone`, `avatar`, `bio`) VALUES
(1, '2020-10-08 00:50:56', 'Arifchenko', 'arifchenko@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '085691281375', 'c4ca4238a0b923820dcc509a6f75849b.jpg', 'Welcome to my profile!'),
(2, '2020-10-08 01:55:33', 'Ann Handley', 'ann_handley@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6281234567890', 'c81e728d9d4c2f636f067f89cc14862c.jpg', 'If you''re a marketer, you''ve likely heard of Ann Handley. Her list of credentials is lengthy, and if she really wanted to, she could go on and on and on about her accomplishments.'),
(3, '2020-10-08 01:55:33', 'Rebecca Bollwitt', 'rebecca_bollwitt@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6281234567890', 'eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg', 'Starting with a trophy emoji, Miss604 says she''s BC''s most award-winning blogger. I haven''t even looked at her pictures yet and the introduction of her bio has already sucked me in.'),
(4, '2020-10-08 01:57:45', 'Mark Gallion', 'mark_gallion@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6281234567890', 'a87ff679a2f3e71d9181a67b7542122c.jpg', 'As a venture capitalist and an executive at several start-ups, Mark Gallion has different versions of his bio all over the internet. You can imagine some are more formal than others. But when it comes to his Twitter bio, he carefully phrased his information in a way that helps him connect with his audience — specifically, through the use of humor.'),
(5, '2020-10-08 01:57:45', 'DJ Nexus', 'dj_nexus@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6281234567890', 'e4da3b7fbbce2345d7772b0674a318d5.jpg', 'Stage-named DJ Nexus, Jamerson''s professional bio makes use of nearly every Page field inside the About tab. Right away, his audience knows which genres he plays in, where he''s from, and who else he''s worked with. The latter — under "Affiliation," as shown in the screenshot below — is unique and seldom mentioned in professional bios today.'),
(6, '2020-10-08 01:59:50', 'Mark Levy', 'mark_levy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6281234567890', '1679091c5a880faf6fb5e6087eb1b2dc.jpg', 'Like Ann, Mark''s given his readers two different options. The first biography is a "short version," which includes a combination of bullet points listing his credentials and a few short paragraphs.\r\n\r\nThe second is the "long version," which is actually even more interesting than the first one. Why? Because it reads like a story — a compelling one, at that. In fact, it gets really funny at parts.\r\n\r\nThe second sentence of the bio reads: "He was frightened of public school, loved playing baseball and football, ran home to watch ape films on the 4:30 Movie, listened to The Jam and The Buzzcocks, and read magic trick books."'),
(7, '2020-10-08 01:59:50', 'Corey Wainwright', 'corey_wainwright@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6281234567890', '8f14e45fceea167a5a36dedd4bea2543.jpg', 'Corey Wainwright is the director of content here at HubSpot. She''s written content for HubSpot''s Marketing Blog for years, and her blog author bio has caught my eye since before I ever started working for HubSpot. (Back then, it started with, "Corey just took a cool vacation.")');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
