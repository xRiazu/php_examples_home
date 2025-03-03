-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 12:57 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_um`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `bID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `context` text NOT NULL,
  `uID` int(11) NOT NULL,
  `bStatus` enum('pending','published','rejected','deleted','locked') NOT NULL DEFAULT 'pending',
  `image_url` varchar(128) NOT NULL,
  `audio_url` varchar(128) DEFAULT NULL,
  `spotify_embed` varchar(128) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blogs` (`bID`, `title`, `context`, `uID`, `bStatus`, `image_url`, 'audio_url', `spotify_embed`, `created_at`) VALUES
(14, 'The Rise of Indie Pop', 'Exploring the journey of indie pop music and its influence on mainstream culture.', 2, 'published', 'indie.jpg', 'audio1.mp3', 'https://open.spotify.com/embed/track/1', '2025-02-17 22:23:46'),
(15, 'Hip-Hop Evolution', 'Hip-hop is more than just a genre of music—it’s a cultural movement that has influenced fashion, language, politics, and global music trends. Since its inception in the 1970s, hip-hop has evolved from a grassroots artistic expression in the Bronx to a worldwide phenomenon shaping generations. This deep dive will explore the origins of hip-hop, its transformation over the decades, and the impact it continues to have on music and society.', 2, 'published', 'hip-hop.jpg', 'audio2.mp3', 'https://open.spotify.com/embed/track/2', '2025-02-17 22:23:46'),
(16, 'Jazz in the Modern Era', 'How jazz continues to shape contemporary music across genres.', 2, 'published', 'jazz.jpg', 'audio3.mp3', 'https://open.spotify.com/embed/track/3', '2025-02-17 22:23:46'),
(17, 'The Best Rock Albums of 2024', 'Ranking the top rock albums released this year.', 2, 'published', 'rock.jpg', 'audio4.mp3', 'https://open.spotify.com/embed/track/4', '2025-02-17 22:23:46'),
(18, 'Electronic Music Trends', 'A look at the latest trends in electronic music and festival culture.', 2, 'published', 'electronic.jpg', 'audio5.mp3', 'https://open.spotify.com/embed/track/5',  '2025-02-17 22:23:46'),
(19, 'The Revival of Vinyl Records', 'Why vinyl records are making a huge comeback among music lovers.', 2, 'published', 'vinyl.jpg', 'audio6.mp3', 'https://open.spotify.com/embed/track/6', '2025-02-17 22:23:46'),
(20, 'Classical Music in Film', 'How classical compositions continue to elevate cinematic storytelling.', 2, 'published', 'classical.jpg', 'audio7.mp3', 'https://open.spotify.com/embed/track/7', '2025-02-17 22:23:46'),
(21, 'Music Production Tips', 'Essential tips for aspiring music producers looking to make an impact.', 2, 'published', 'music_production.jpg', 'audio8.mp3', 'https://open.spotify.com/embed/track/8', '2025-02-17 22:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `cID` int(11) NOT NULL,
  `blogID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uID` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `username` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(9) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `pfp` varchar(64) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` ('uID', 'firstname', 'lastname', 'username', 'email', 'password', 'role', 'pfp', 'created_at') VALUES
(2, 'Uzair', 'Mohammed', 'xRiazu', 'uzairmohammed@email.com', 'seventeencaratno1', 'user', '2025-02-11 00:09:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`bID`),
  ADD KEY `uID` (`uID`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`cID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `blogID` (`blogID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `users` (`uID`);

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`uID`),
  ADD CONSTRAINT `blog_comments_ibfk_2` FOREIGN KEY (`blogID`) REFERENCES `blogs` (`uID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
