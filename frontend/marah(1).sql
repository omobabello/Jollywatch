-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 08:27 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marah`
--

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `serial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `series` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `episode` int(11) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `filesize` float NOT NULL,
  `duration` varchar(100) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `upload_time` int(11) NOT NULL,
  `time_approved` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`serial`, `id`, `series`, `season`, `title`, `episode`, `thumbnail`, `link`, `filesize`, `duration`, `approved`, `upload_time`, `time_approved`) VALUES
(1, 31741777, 16710864, 1, 'The Pilot', 1, 'thumbnails/thumb_31741777.png', 'episodes/31741777.mkv', 77270.8, '20:51', 0, 1499130529, NULL),
(2, 32128592, 16710864, 1, 'The Glutton', 2, 'thumbnails/thumb_32128592.png', 'episodes/32128592.mkv', 77243.3, '20:48', 0, 1499130571, NULL),
(3, 49954193, 16710864, 1, 'The Affair', 3, 'thumbnails/thumb_49954193.png', 'episodes/49954193.mkv', 111283, '20:48', 0, 1499130591, NULL),
(4, 18149751, 16710864, 1, 'The Big Fight', 4, 'thumbnails/thumb_18149751.png', 'episodes/18149751.mkv', 77237.8, '20:49', 0, 1499130661, NULL),
(5, 19550570, 16710864, 1, 'The Big Travel', 5, 'thumbnails/thumb_19550570.png', 'episodes/19550570.mkv', 77273, '20:49', 0, 1499130687, NULL),
(6, 86178866, 14501885, 1, 'The Pilot', 1, 'thumbnails/thumb_86178866.png', 'episodes/86178866.mkv', 253770, '1:11:48', 0, 1499166765, NULL),
(7, 28560662, 14501885, 1, 'The Flair', 2, 'thumbnails/thumb_28560662.png', 'episodes/28560662.mkv', 143986, '42:13', 0, 1499166830, NULL),
(8, 18457796, 14501885, 1, 'ScotchLand', 3, 'thumbnails/thumb_18457796.png', 'episodes/18457796.mkv', 144018, '41:31', 0, 1499167005, NULL),
(9, 96944517, 14501885, 1, 'The Execution', 4, 'thumbnails/thumb_96944517.png', 'episodes/96944517.mkv', 143880, '42:50', 0, 1499167164, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `serial` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`serial`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Animated'),
(4, 'Biographical'),
(5, 'Comedy'),
(6, 'Crime'),
(7, 'Documentary'),
(8, 'Drama'),
(9, 'Historical'),
(10, 'Horror'),
(11, 'Musical'),
(12, 'Romance'),
(13, 'Science Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `serial` int(11) NOT NULL,
  `subscriber` int(11) DEFAULT NULL,
  `video` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date_stamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`serial`, `subscriber`, `video`, `user`, `date_stamp`) VALUES
(1, 60879175, 32636180, 0, 0),
(2, 60879175, 32636180, 0, 0),
(3, 60879175, 32636180, 2, 0),
(4, 60879175, 32636180, 0, 0),
(5, 60879175, 32636180, 2, 1499860234),
(6, 60879175, 20675413, 2, 1499890714);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `serial` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `lead_actor` varchar(50) NOT NULL,
  `other_actors` varchar(200) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `user` int(11) NOT NULL,
  `prod_year` int(11) NOT NULL,
  `language` varchar(100) NOT NULL,
  `cover` varchar(150) NOT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL,
  `filesize` double NOT NULL,
  `duration` varchar(100) NOT NULL,
  `view_rating` varchar(100) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `upload_time` int(11) NOT NULL,
  `time_approved` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`serial`, `id`, `title`, `description`, `lead_actor`, `other_actors`, `genre`, `user`, `prod_year`, `language`, `cover`, `thumbnail`, `link`, `filesize`, `duration`, `view_rating`, `approved`, `upload_time`, `time_approved`) VALUES
(1, '10806886', 'Gotham', 'Interesting movie on how a young billionare, who had his parents murdered became a super hero', 'La La Lu', 'Gerard Matino, Luis Messi', '2,5,11', 2, 2015, 'English', 'covers/cover_10806886.png', 'thumbnails/thumb_10806886.png', 'movies/10806886.mp4', 189787.734375, '42:49', 'Family', 0, 1499098449, NULL),
(2, '17772841', 'Arrow', 'Young billlonaire playboy went lost on the lianyu Island, he is back with something many would not have seen coming', 'Stephen Amell', 'Van Dyke, Islami Nailten', '1,6', 2, 2016, 'English', 'covers/cover_17772841.png', 'thumbnails/thumb_17772841.png', 'movies/17772841.mp4', 190047.34375, '41:49', 'PG 16', 0, 1499098691, NULL),
(3, '32636180', 'The Flash', 'A very interesting movie, that can sometimes be annoying, chill and enjoy', 'Barry Allen', 'Joshua Kimmich, Lindelof', '1,6,13', 2, 2011, 'English', 'covers/cover_32636180.png', 'thumbnails/thumb_32636180.png', 'movies/32636180.mp4', 189817.65625, '41:51', 'Family', 0, 1499099083, NULL),
(4, '14022991', 'The flash', 'A very Interesting movie that can be annoying sometimes, because of thier silly stunts they usually pull', 'Barry Allen', 'Iris West, Joe Allen', '3,5,6,13', 2, 2012, 'English', 'covers/cover_14022991.png', 'thumbnails/thumb_14022991.png', 'movies/14022991.mp4', 189817.65625, '41:51', 'Family', 0, 1499099421, NULL),
(5, '18909430', 'Markaq Lecture', 'Deep soul food for those who can relect', 'Habeeb', 'Ajanasi', '7', 12, 2013, 'Yoruba', 'covers/cover_18909430.png', 'thumbnails/thumb_18909430.png', 'movies/18909430.mp4', 223539.9375, '1:13:05', 'Family', 0, 1499219081, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reset_request`
--

CREATE TABLE `reset_request` (
  `serial` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reset_request`
--

INSERT INTO `reset_request` (`serial`, `user`, `hash`, `time`) VALUES
(1, 2, '007202cd557079168e39bf634035b549e434b299', 1497977698);

-- --------------------------------------------------------

--
-- Table structure for table `search_queries`
--

CREATE TABLE `search_queries` (
  `serial` int(11) NOT NULL,
  `query` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_queries`
--

INSERT INTO `search_queries` (`serial`, `query`) VALUES
(1, 'fif'),
(2, 'fif'),
(3, 'fif'),
(4, 'fif'),
(5, 'fif'),
(6, 'an'),
(7, 'an'),
(8, 'an'),
(9, 'an'),
(10, 'an'),
(11, 'an'),
(12, 'an'),
(13, 'an'),
(14, 'an'),
(15, 'an'),
(16, 'trick'),
(17, 'trick'),
(18, 'trick'),
(19, 'trick'),
(20, 'trick'),
(21, 'trick'),
(22, 'trick'),
(23, 'trick'),
(24, 'trick'),
(25, 'trick'),
(26, 'trick'),
(27, 'trick'),
(28, 'trick'),
(29, 'aug'),
(30, 'oun'),
(31, 'The suits'),
(32, 'father'),
(33, 'father'),
(34, 'father'),
(35, 'father'),
(36, 'ough'),
(37, 'og'),
(38, 'au'),
(39, 'a'),
(40, 'a'),
(41, 'a'),
(42, 'a'),
(43, 'ogunjeid'),
(44, 'ogunjeid'),
(45, 'a'),
(46, 'a'),
(47, 'a'),
(48, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `serial` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `view_rating` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `start_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`serial`, `user`, `id`, `title`, `description`, `genre`, `view_rating`, `cover`, `start_year`) VALUES
(1, 2, 16710864, 'Young and Hungry', 'A boss and his chef falll in love in a very mysterous way', '5,8,12', '', 'covers/cover_16710864', 2017),
(2, 9, 14501885, 'The Suits', 'A very smart who claims to be an Harvard Lawyer turns out to be a fraud', '1,5,8', '', 'covers/cover_14501885', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `skits`
--

CREATE TABLE `skits` (
  `serial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `filesize` float NOT NULL,
  `duration` varchar(20) NOT NULL,
  `view_rating` varchar(100) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `upload_time` int(11) NOT NULL,
  `time_approved` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skits`
--

INSERT INTO `skits` (`serial`, `id`, `user`, `title`, `description`, `thumbnail`, `link`, `filesize`, `duration`, `view_rating`, `approved`, `upload_time`, `time_approved`) VALUES
(2, 93357102, 2, 'Fifa Hack', 'Check out the new Hack for fifa points', '0.mkv', 'skits/93357102.mp4', 13454.5, '4:31', 'Family', 0, 1499097153, NULL),
(3, 77973288, 2, 'Father vs daughter', 'Father punishes daughter for disobedience by selling her precious iphone', '0.mkv', 'skits/77973288.mp4', 1952.17, '0:32', 'Family', 0, 1499121971, NULL),
(4, 20675413, 9, 'Naughty Skit', 'How to be a good banger', 'thumbnails/thumb_20675413.mkv', 'skits/20675413.mp4', 113232, '34:45', '18+', 0, 1499166347, NULL),
(5, 19349670, 9, 'BBC', 'Never underestimate the importance of the black', 'thumbnails/thumb_19349670.mkv', 'skits/19349670.mp4', 136919, '29:12', '18+', 0, 1499166416, NULL),
(6, 15897716, 9, 'The Good Nurse', 'She takes good care of her boy', 'thumbnails/thumb_15897716.mkv', 'skits/15897716.mp4', 47851, '8:05', '18+', 0, 1499166549, NULL),
(9, 11881012, 12, 'Copa Del Rey', 'Intersting Copa Del Rey Final', 'thumbnails/thumb_11881012.mkv', 'skits/11881012.mp4', 2275.06, '0:05', 'Family', 0, 1499218012, NULL),
(10, 20902673, 12, 'Ladder Dubbed', 'Funny mockery of original Ladder video', 'thumbnails/thumb_20902673.mkv', 'skits/20902673.mp4', 2630.72, '0:30', 'Family', 0, 1499218150, NULL),
(11, 36999670, 12, 'Dancing Adelakun', 'Dance away your sorrows', 'thumbnails/thumb_36999670.mkv', 'skits/36999670.mp4', 2500.99, '0:10', 'PG 16', 0, 1499218191, NULL),
(12, 79135829, 12, 'Fist Fight', 'Perverted teacher vs the Mr nice guy teacher', 'thumbnails/thumb_79135829.mkv', 'skits/79135829.mp4', 13887.3, '0:30', 'PG 16', 0, 1499218230, NULL),
(13, 64250498, 12, 'Shaytan\'s Trick', 'Tricks satan use to get you don\'t fall for it ever', 'thumbnails/thumb_64250498.mkv', 'skits/64250498.mp4', 570.56, '0:48', 'PG 13', 0, 1499218296, NULL),
(14, 21483904, 2, 'fgsfdsgd', 'fdsgdfgd', '0.mkv', 'skits/21483904.mkv.mp4', 98365.5, '19:00', 'Family', 0, 1501066112, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `serial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `package` int(11) NOT NULL,
  `sub_date` int(11) NOT NULL,
  `has_paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`serial`, `id`, `email`, `phone`, `password`, `hash`, `activated`, `package`, `sub_date`, `has_paid`) VALUES
(1, 60879175, 'orv.guson@gmail.com', '0268399793', '$2y$10$Ll/CsgSIDVKUDMr/vN1hqOntMobddKGZ3YL.f5PkKRpJu/VxCwv4y', 'b08bbce93f13b9aeddd4eea57bd288ebba5b4b4d', 0, 7, 1499880984, 0),
(2, 36206259, 'pgregoliu@auda.org.au', '351-(102)792-4746', '$2y$10$ufJlQnQ5TJy4NHfIidIFYOXNUGbJixysNEx9yGI.zYt2w6s7vI4g2', '8477f3a349688513eac68877ee4095ed1ffcc315', 1, 3, 1498720554, 1),
(3, 77848259, 'scottrell9@theglobeandmail.com', '55-(442)363-1969', '$2y$10$2D/Mk1TVuKRGB2YRl/hndu40Kt.qFaj.YaBh1pV3WyulDrvYo6YuK', 'f72014b8eeda6ec092a23b5bc35f83f15dc4f710', 1, 4, 1501362747, 0),
(4, 14155559, 'rshorteq@nsw.gov.au', '64-(306)376-0285', '$2y$10$od9ua/VzgCu/vh9Xf2cjverOGw74fQiBJ0Kx3gww2nPYz1/B5Cy3m', '0145867576994ec83444f03d78e9e8990f4fdc36', 0, 3, 1499013778, 1),
(5, 59647959, 'ajephson12@sitemeter.com', '62-(194)411-2153', '$2y$10$4KfolL/YpkG5ZGBfMHpEUOMT0QHIn/FT3hrV/oGgGgyAXptE2Psm6', 'ac1c2fae4da56abb1facc218e68769c0206c87e8', 0, 4, 1501207862, 0),
(6, 38443598, 'fpailin1c@merriam-webster.com', '7-(801)146-8008', '$2y$10$Q2fwc7icTsfy8Kqc8YL8kOad23I.dmay4u7agy6zrHFhnccYNUaqS', '82e279893c53131e8b54225af3016130eaff7ba0', 0, 3, 1498959228, 0),
(7, 85647459, 'crutigliano1b@bing.com', '62-(731)917-6545', '$2y$10$sS8lAV2cNYGkTMuv81fzlOmurRKErasbHLw.GdViXyFkxeLbeYFzC', '464d7188ef336abfae6203a73baa742e0ef487be', 0, 3, 1498674674, 0),
(8, 95004759, 'bmanuelev@ifeng.com', '48-(809)687-7880', '$2y$10$bnqh/Fb3uDmO9P42iiLFeeBspqu2doxQBafq5oEFm2e9S6B7NxVQe', '904977157f6a8df65230a52d30ff832fcd8e4129', 0, 2, 1500338796, 1),
(9, 31031598, 'esebert1d@smugmug.com', '359-(267)173-9850', '$2y$10$zJRFrRKK.PH7ocDP0cQ2BOVbjc3rEfcvWCLuk1KwmdB05WjoWSOX2', '74a43ffffafdeb97a63ab9383a7568a6b73f21a5', 0, 6, 1498439941, 0),
(10, 62703459, 'mmarioneau6@wikia.com', '86-(928)292-3265', '$2y$10$OlaIRf2XiEQrJuTMPBYQYO2RHUcrykeOdgD3wpRwrK57T3/VHB2Sa', '33bfb59ad9ec6c10cfb17438900ce6cd1614fe4c', 1, 1, 1501636093, 0),
(11, 34917859, 'bparmenteri@surveymonkey.com', '30-(270)386-1786', '$2y$10$49eQMV90QAMBkdDOqGyGUu7HSzHkoreQ.z..xrj1aRl8mCjtz0yXK', 'c3e48a6c0956fdb3c89e0ad2a4d75fab2e17e5a3', 1, 7, 1500478127, 0),
(12, 62411459, 'mmaginnm@sina.com.cn', '44-(129)323-7490', '$2y$10$w.KMBckS5ISiz2hkMq1OZeWQvUARqvZWwpv.TxU.QzNn4uM84MvBO', 'b7eaa0d72b1d7bcb7fe29459574a3c6168e89d1d', 0, 3, 1498411299, 1),
(13, 66150059, 'proofs@surveymonkey.com', '48-(661)963-7149', '$2y$10$I6NvAPtD7gm/wMAIx8T2eOfLQ0rvx4n9OE.K675p6GNMxE.agll4K', '7a949c4aa129e797b26859bbe10ace5448bfcc10', 1, 7, 1498469734, 1),
(14, 10040259, 'nadamiak3@mysql.com', '502-(592)261-3471', '$2y$10$VsUl5/HQDWJ0.wMepjbR8.g5uCOI1KyAEumdKGV0jn8rm3YgKMU7C', '0439e880ea7fdce8deeecafb75429a37ade13b60', 1, 1, 1500355032, 1),
(15, 45552759, 'rjacquemard19@state.gov', '358-(562)394-6470', '$2y$10$TeawerllO/uLHK7QnWhfluT4Mtl6UNWbxeHR/EqBCdl1QpSMFOALi', 'c4bc27854da517d75324740feeb6ecfa0c01ee3f', 1, 3, 1498592141, 0),
(16, 69430359, 'dgemmelle@pcworld.com', '1-(940)610-1655', '$2y$10$4Yzz9/j08Leg6UVqkexl7.hc1SZ/FoVHkEfdCaLdXbzndvORfnIuK', '57f1e05d758b1bd202138022f1769eafc82b363f', 0, 1, 1500700724, 0),
(17, 62115859, 'aohaire1@facebook.com', '7-(358)358-9954', '$2y$10$Np2UQr9zqTyk.oxDvrp.mewxW3veTwkR6nXjb7jynJRR/yx3G82dG', '8f7fb4747f7eb01bfc2a273ff569e43a9eb651c1', 0, 1, 1500149889, 1),
(18, 30689059, 'apetruf@apple.com', '48-(821)873-1288', '$2y$10$6mFZgEurvQaGEDtKBqmg.u3.OG8HdRbBdExgTxKRZnvoJ.XK5nyYi', '592652092a8719ba99d1e7c3b671a5be6bdc2b18', 1, 7, 1499332844, 0),
(19, 38719259, 'alye14@nhs.uk', '7-(536)548-9466', '$2y$10$QOviUJMsBf4jHSTIjQK0rOcu.al5wgWOH5FNkJyi4BZX01UFKGmAq', '79ffedcfc0d7dda1fb6c4bdb4189c7100638a31b', 1, 5, 1499064435, 0),
(20, 20831359, 'hdimelow15@ihg.com', '81-(299)749-8461', '$2y$10$QIn8FcGjMkf2VjjiJRk.jeIsLm2cP2SOdPpzHO7g1OipxxTBgqbmC', '67eb4d2b4636f4db8f229ef032b8238b314573fd', 1, 3, 1499494458, 0),
(21, 66081659, 'mamorx@e-recht24.de', '7-(141)285-9490', '$2y$10$ajgvWBTsv/uH3F8egXSF/.s.qcYiF40zKocvhRiq0L2wB27Fg/3kS', 'eaf600c1d6115b10f9711ad7bab84700f70ff3a3', 1, 4, 1500389597, 0),
(22, 54245859, 'ewallegeb@php.net', '380-(571)543-7524', '$2y$10$0rpRehLzO93OLhsuonwqnOTadC7/ZIh42LJQG76kxI5ADry/EGoDW', 'c34453daa05998855bd9f87c3b9f8959b95b760c', 0, 7, 1501711584, 1),
(23, 94332359, 'sham17@economist.com', '374-(321)661-1484', '$2y$10$FmqwKZIFaeCY3CeN4vOwH.H5YZGqqlSN/Sfr5fSGAAO9HHPT/jktG', '0c9945d809c33815a0502763fb9e02b198a71d04', 0, 7, 1500947637, 0),
(24, 65167859, 'dspeek10@wunderground.com', '502-(540)775-0168', '$2y$10$bkH3cOqk4zW7RRziDfwyc.HXqDM4OO5wXWXY0OrNoRzdQSw.cyH5u', 'f065eb171c6d20a0a08bf08efe54e704289b38c9', 1, 7, 1501718232, 1),
(25, 82670759, 'tarlett7@independent.co.uk', '267-(875)544-2153', '$2y$10$KhJo1QoEzxdOzY9IpCDhC.qYyPNf1zo.eUhGx741cu0159uX68hAG', '5e61ea7a636b0ad868a830359e3952b12b918754', 1, 1, 1501819873, 1),
(26, 46673959, 'bsanger4@yahoo.co.jp', '86-(887)224-1458', '$2y$10$lB4Qlco7Dpbgh2g6a5V36ub3txDbbHrzjy3nesarDqVoh9WA5ETr.', '854daee6c86a28db3de8a0298d2a6765637275a9', 0, 5, 1499311164, 0),
(27, 54775559, 'helpheep@weather.com', '86-(746)657-8376', '$2y$10$Kr1qlPKyrx6loWYxEoxCje0gAfPF6WHB1yd1Wa498HbyT/LEiFUBy', '07f00edd07c4d7bfe4294e3b449072ac1632154d', 0, 6, 1498806419, 1),
(28, 37416659, 'tlevecquet@meetup.com', '66-(248)672-2954', '$2y$10$rquykcDctxot/eeUXmQbCex2xtBl.h9mbAhD7lpSnEU8qYV/9XFpG', 'd54ef3124e21e13d44f9ae4d8e547c80f8a3b265', 0, 3, 1500931421, 1),
(29, 82542159, 'scrickettl@miibeian.gov.cn', '994-(498)911-5176', '$2y$10$Kd3FK1bsK7Kg8xqw.kNxFep.4G4EW7.OgiIWufIE.64t3ZyyH5jem', '2aefedfe7e614fa96d30fdb6155bb685bca4f482', 1, 3, 1498626240, 0),
(30, 37248559, 'dousleyw@hc360.com', '62-(821)232-5969', '$2y$10$hAKtOcf9gT8z4OPabkTbEODmos47rafIHfrsD75j29W01mVBwa2OG', 'c8c0099fa841358343bb4a1a082b1f731f8d73e6', 0, 6, 1499532653, 0),
(31, 58858759, 'dead8@pen.io', '63-(585)158-8863', '$2y$10$T.SZd1kikuTL5BjttF0fX.miadpjbBLWIbCO7aG8qhFMnqW.aAPpW', '98cf0b17b367fd8a2bb456c28d49739fc122017a', 1, 6, 1500140049, 1),
(32, 19237459, 'lchittocko@digg.com', '62-(700)689-6126', '$2y$10$kwE9D7IbmrqKNVVdA557E.wTrylcBrDfZpghwREEZn82/x0if30yy', 'be916ec4247724a78eb0e512eba384db409ca53a', 1, 3, 1501011964, 1),
(33, 75412159, 'ematskevichd@exblog.jp', '86-(683)274-9780', '$2y$10$N1xyOlc4Jrqm/zlftqoalemL4jEtpiCzGIHtnM79P4ssn/.dmB3uW', '46be1b1571e9143df5acf0f1f042225b0416cc03', 0, 5, 1498437737, 1),
(34, 55091159, 'rshasnan13@opera.com', '58-(786)804-8909', '$2y$10$8fk8iQIY.s4glRpcCzuQd.uRdxqRzRkG9Ws2rSLPCy0dEMTnjcY6O', '733a934c20d8c4c25c97ca0ba5ee05bd78f06620', 1, 2, 1498555230, 0),
(35, 41319659, 'cbootec@huffingtonpost.com', '62-(812)314-6883', '$2y$10$xzLij9MpSqe4l47HDRccJu9b/YBsbjZ7/.wd3wMmljAsi77O28LV2', '62b8237f85fa2976e3ce7e3804ff037c8b09b428', 1, 5, 1501630869, 0),
(36, 24464459, 'dmurdyj@gmpg.org', '380-(650)219-6136', '$2y$10$5oOi/LL4BgKtut8dyVzjeubd5V0b/AkueKMmAoVmEF0qufTtLF15W', '633e25c4ed98a8328550a65a299ef23bec5b9454', 1, 3, 1498169070, 0),
(37, 34581459, 'easlam18@weibo.com', '51-(520)668-0303', '$2y$10$KcJElc8oiBCRGWmtYqNDhepPftumzHNSqwuqbU7lcOda2WgWruDKK', 'ca5654b3c181a96b86a089dbf439e7517afcd0c5', 1, 7, 1500830907, 0),
(38, 47184559, 'isheeran16@fema.gov', '998-(341)309-1944', '$2y$10$w0G46sd.FOAD/RKOVIXPaeNW8WdkmMOvETns1OyMx4GPtvFxfB.Bm', 'fe0970eb35d062e11ecfd4753e0ead6ada2b8c61', 1, 3, 1499093599, 0),
(39, 63212759, 'lascough11@salon.com', '62-(312)238-8153', '$2y$10$v9nio.3xhuQBpFQxxnth6ezvWtg8/Mf/YXnBwZ79F9dpYoOG6IsJi', 'af71de9f28da2ebb8da5ce315c5efe2fa4d21655', 1, 3, 1500905612, 1),
(40, 23883659, 'oanstissg@joomla.org', '62-(274)392-5288', '$2y$10$mpKJ8TxsrpbJ86XZ7g1mtuDPTBtpB/NdHlJPTndWyXF5kaL59iJGO', 'a781483caae431de8e39a1e2c25236b0b477b8e2', 0, 1, 1501799641, 1),
(41, 49315959, 'sbernardin0@cyberchimps.com', '260-(204)523-4867', '$2y$10$FaUL4lHwRvLsSIUZCpK8W.XdQAE9B6jy83ZP49JK5VjsT8myE76fe', '37d7625654b3618f0064d6f01b3c5dedda2bd35a', 1, 7, 1498817716, 0),
(42, 82265359, 'ewestleyy@dmoz.org', '7-(261)588-5819', '$2y$10$aOZCYQR0QrjXlorkQ632v.nBk4wFnAOCaGhExA.zF9xdQU1v1sJVO', '1ad2dc9f1cd48e624de47573e5ddff3c5db6694a', 0, 4, 1501457148, 0),
(43, 90268059, 'lrodliff2@ask.com', '1-(901)441-9594', '$2y$10$FmfNNWE3M18/isHbDbNhC.taePdy2gp0.MgA8W3n0CTM/S5EMw1T2', 'c7d305b43e41e0635cb82615d30d2fe6bcfcc390', 0, 5, 1498680090, 1),
(44, 70237598, 'dlittefair1a@g.co', '46-(281)257-9871', '$2y$10$djhVJ.do.f3mmlquW/Nn.ecDvGqqNPmPwQjAh72e19RyLxg8Qba6y', 'b1453f8c07b2d64d5c09aefaee5b2334080e7e13', 1, 2, 1501882480, 1),
(45, 59430359, 'lmellodyh@yale.edu', '33-(245)536-4993', '$2y$10$/apmD7KAbWr8Y1caEOSxAOlZLyz/mLKpccShXyjpU5096pTd01zka', 'd01783c3567b6b0f1419841bbf92f453f4db5774', 1, 7, 1500845269, 1),
(46, 36537559, 'wklejnar@elegantthemes.com', '86-(585)267-4217', '$2y$10$qcbTqownp1U/VPE7cRa0uO1w88lsfzQ6Rrztjx5Mf6Wx9wMUnBWHK', 'c401e33ce6880b9be746a2027afba236106cb1ba', 1, 2, 1502050234, 1),
(47, 65161159, 'eaddlestonea@mtv.com', '380-(158)589-4942', '$2y$10$KtXm.z5yZ39fBfioR1wd3e.o2Uxgdu0Uq6Qk3AlG4X3JISENttqOy', '5092cbd562bcef72e75b9f128ef0304522bbf426', 1, 1, 1499628950, 0),
(48, 76180759, 'kgosalvezk@telegraph.co.uk', '55-(177)693-4295', '$2y$10$CbEERK7lW7O9oqt1HXgFu.vaVveFx9ZeA2l//4wxLmN9dbpqz/Dze', '6d0cdc5b58b4f4171959717160d6d1e41eb2264d', 1, 2, 1500886955, 0),
(49, 16563959, 'tkeoghanez@deviantart.com', '63-(264)788-1089', '$2y$10$CIkR6VDlQCsQn/gduzmVy.TFyL/1hwmQRyYArPoxIOxnRC5SMod2e', 'b1c6fb2d729ebb5fec48af92d5d4931e6531f320', 1, 5, 1499080888, 0),
(50, 31769059, 'ggoodwelln@census.gov', '967-(299)366-9635', '$2y$10$jrgWYUcSxo///WNVXPlKSuhRA57bjwicYQ390S/eHrj06ObVXOr.2', '8e04d726af9add394a3a6173a42e57f52bfd306a', 0, 1, 1498475066, 0),
(51, 94008959, 'jpilley5@china.com.cn', '86-(682)101-9485', '$2y$10$meIPQx.bp9BRRdaDXSKYouckJoJo5Co7J4yNttlTdegf4zeOKacw6', '50bec577842a816938a585d9b6fd788aa5c645e4', 0, 2, 1501212346, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subs_session`
--

CREATE TABLE `subs_session` (
  `serial` int(11) NOT NULL,
  `subscriber` int(11) NOT NULL,
  `login_time` int(11) NOT NULL,
  `logout_time` int(11) DEFAULT NULL,
  `ip_address` varchar(20) NOT NULL,
  `agent` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs_session`
--

INSERT INTO `subs_session` (`serial`, `subscriber`, `login_time`, `logout_time`, `ip_address`, `agent`) VALUES
(1, 60879175, 1499012974, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(2, 60879175, 1499013272, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(3, 60879175, 1499013417, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(4, 60879175, 1499013440, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(5, 60879175, 1499013680, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(6, 60879175, 1499202932, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(7, 60879175, 1499202985, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(8, 60879175, 1499203028, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(9, 60879175, 1499203130, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(10, 60879175, 1499203175, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(11, 60879175, 1499794489, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(12, 60879175, 1499857205, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(13, 60879175, 1499857359, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(14, 60879175, 1499890665, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(15, 60879175, 1499947288, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(16, 60879175, 1499963172, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(17, 60879175, 1500030525, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(18, 60879175, 1500032999, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(19, 60879175, 1500049544, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(20, 60879175, 1500507808, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(21, 60879175, 1500569242, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(22, 60879175, 1500902429, 1500902606, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(23, 60879175, 1500902970, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(24, 60879175, 1501499714, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(25, 60879175, 1501535686, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `hash` varchar(20) NOT NULL,
  `is_activated` tinyint(1) NOT NULL,
  `package` int(11) DEFAULT NULL,
  `sub_date` int(11) DEFAULT NULL,
  `has_paid` tinyint(1) NOT NULL,
  `date_joined` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`, `hash`, `is_activated`, `package`, `sub_date`, `has_paid`, `date_joined`) VALUES
(2, 'Bolaji Ventures', '+2332683979793', 'bolaji@gmail.com', '$2y$10$wytGHYQb1SPXh.eCSz2MuumYObZqnpzu/ReJzq6hU6Mi/IPeEv.z.', '76eaba18f6af2c2ea3be', 1, 7, NULL, 1, 1498814568),
(3, 'Pacocha LLC', '86-(274)831-1433', 'ptoffano0@ibm.com', '$2y$10$5r.l6Kt5K/OB7lYf7lcS0u3YJZTHxmpidPVPzT4fRZ1pynPgprA.C', '1bc3dd5bac995f36c4e0', 0, NULL, NULL, 0, 1498893677),
(4, 'Konopelski, McGlynn and Graham', '30-(544)423-3595', 'ftappin1@gov.uk', '$2y$10$3fgsrvNaw/QGf8tq6XwGce0glUxl8CZ1MqzkC5UnCQpxndVcSSZWi', '4a3fc5975d678f7162c3', 0, NULL, NULL, 0, 1498213682),
(5, 'Schultz-Stehr', '30-(685)573-7608', 'mriccelli2@mysql.com', '$2y$10$x9G6XkjQ4/AjwIqaerw7O.QdxhkbJgcg/N6F6y8TSn3kewmsP4UHe', '80fc289fde4f71f81148', 0, NULL, NULL, 1, 1498487823),
(6, 'Hammes, Abbott and Kovacek', '86-(302)595-2733', 'boades3@google.com.au', '$2y$10$wWYj5nZDc4T6BCTlf2T7EOwLo5A4tG1/wXmZuivNkL/Ycpx7B54oW', '4a1ac61d38a06cf63567', 1, NULL, NULL, 1, 1498651104),
(7, 'Bins, West and Blick', '86-(618)701-6257', 'aost4@ca.gov', '$2y$10$roEmf3q0YWoTENWQ93N1keIz.cMB.CfKkbZTi1idbxYf1rpHEfdeS', 'cdba8ec2294854ec9b4c', 1, NULL, NULL, 0, 1498230238),
(8, 'Lebsack LLC', '86-(128)374-0367', 'skahler5@themeforest.net', '$2y$10$Wo72ulYyx7eyPvsyAAN0dOAxXaMS4WkKHbmAPfYVKb1JIcYYc9oR2', '173d0a64b8162faba9d2', 1, NULL, NULL, 0, 1498543968),
(9, 'Balistreri-Parker', '351-(141)250-8660', 'wpharo6@marriott.com', '$2y$10$27jrY3DVjfjlhEypUlKkQO04vrBwQt6/Y66ie2yAJgCEYSuX2gKk6', '5f863d6c4be4cee430f0', 1, 6, 1498653487, 1, 1498464767),
(10, 'Mitchell, Parker and Hagenes', '86-(514)299-3448', 'mrysdale7@yelp.com', '$2y$10$kdc7O4LTfUPoAQmuFbELOO36/nCimaSoZmGTGFSE9SeLGE/6q9HHW', '8e260f00d9e8ba3cf172', 1, NULL, NULL, 1, 1498769982),
(11, 'Fritsch, Bosco and Mohr', '86-(353)592-8888', 'abratcher8@msn.com', '$2y$10$LqyVRtb1lbUK5WQvcBAGGuhDiqhii.xj8z1VHCuuGVN/3L4V28jIK', '7f23d11216ed2f19207f', 1, NULL, NULL, 0, 1498629763),
(12, 'Volkman and Sons', '20-(968)125-3616', 'djeune9@google.fr', '$2y$10$GqP.TBSNmSw4pLZX17CFKuYj.hR5V.9TmtUV10wm2Xz/rKTTix9Uu', 'e835b3e91ec82107d706', 1, 5, NULL, 1, 1498654379);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `serial` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `login_time` varchar(20) NOT NULL,
  `from_cookie` tinyint(1) NOT NULL,
  `logout_time` varchar(20) DEFAULT NULL,
  `ip_address` varchar(100) NOT NULL,
  `agent` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_session`
--

INSERT INTO `user_session` (`serial`, `user`, `login_time`, `from_cookie`, `logout_time`, `ip_address`, `agent`) VALUES
(10, 2, '1497907778', 1, NULL, '', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Geck'),
(11, 2, '1497908214', 1, '1497908214', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(12, 2, '1497908921', 0, '1497908921', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(13, 2, '1497908969', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(14, 2, '1497909062', 0, '1497909062', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(15, 2, '1497978145', 0, '1497978145', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(16, 2, '1498063728', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(17, 2, '1498076922', 0, '1498076922', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(18, 2, '1498079145', 0, '1498079145', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(19, 2, '1498079192', 0, '1498079198', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(20, 2, '1498169043', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(21, 2, '1498318287', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(22, 2, '1498405439', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(23, 2, '1498489918', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(24, 2, '1498564318', 0, '1498577170', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(25, 2, '1498577212', 0, '1498577375', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(26, 2, '1498577395', 0, '1498577438', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(27, 2, '1498577537', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(28, 9, '1498585076', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(29, 9, '1498652196', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(30, 2, '1499082142', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(31, 2, '1499121559', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(32, 9, '1499166190', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(33, 12, '1499217350', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(34, 2, '1499278285', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(35, 2, '1500905923', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(36, 2, '1500981940', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(37, 2, '1501064928', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(38, 2, '1501081882', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(39, 2, '1501491970', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(40, 2, '1501533868', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(41, 2, '1501588208', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0'),
(42, 2, '1501605037', 0, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `serial` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `video` int(11) NOT NULL,
  `view_type` int(11) NOT NULL,
  `date_stamp` int(11) NOT NULL,
  `subscriber` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`serial`, `user`, `video`, `view_type`, `date_stamp`, `subscriber`) VALUES
(5, 9, 19349670, 1, 1499274249, '0'),
(8, 9, 19349670, 2, 1499275082, 'N595D13B'),
(10, 12, 11881012, 2, 1499277462, 'N595D13B'),
(12, 12, 18909430, 1, 1499281271, '2'),
(13, 2, 77973288, 2, 1499589645, 'N595D13B'),
(17, 12, 79135829, 1, 1499890736, '60879175'),
(19, 12, 20902673, 1, 1499891136, '60879175'),
(25, 9, 86178866, 1, 1499949471, '60879175'),
(31, 2, 10806886, 1, 1500034827, '60879175'),
(70, 2, 93357102, 1, 1500509289, '60879175'),
(82, 9, 18457796, 1, 1500510544, '60879175'),
(86, 2, 19550570, 1, 1500510694, '60879175'),
(87, 2, 18149751, 1, 1500510728, '60879175'),
(88, 2, 31741777, 1, 1500510732, '60879175'),
(90, 2, 32128592, 1, 1500569254, '60879175'),
(91, 2, 49954193, 1, 1500569270, '60879175'),
(92, 9, 96944517, 1, 1500569278, '60879175'),
(93, 12, 11881012, 1, 1500569293, '60879175'),
(94, 2, 32636180, 1, 1500569732, '60879175'),
(95, 2, 77973288, 1, 1500569967, '60879175'),
(110, 2, 17772841, 1, 1500573529, '60879175'),
(112, 9, 20675413, 1, 1501499769, '60879175'),
(113, 9, 19349670, 1, 1501535702, '60879175'),
(114, 9, 28560662, 1, 1501535726, '60879175'),
(115, 11, 77973288, 1, 1499294994, 'N12320950'),
(116, 8, 49954193, 1, 1501588875, '77848259'),
(117, 3, 32636180, 2, 1500004312, '77848259'),
(118, 6, 17772841, 2, 1500746094, 'N12320950'),
(119, 9, 32128592, 1, 1499564656, 'NEWVIDE5'),
(120, 4, 11881012, 1, 1501704807, '38719259'),
(121, 9, 10806886, 1, 1499680344, '31031598'),
(122, 10, 86178866, 2, 1501703391, 'NEWVIDE5'),
(123, 6, 32636180, 2, 1500340384, 'N12320950'),
(124, 5, 77973288, 2, 1499906344, '31031598'),
(125, 2, 19349670, 1, 1501059713, '77848259'),
(126, 6, 28560662, 1, 1500159665, '38719259'),
(127, 2, 11881012, 2, 1499823014, 'NEWVIDE5'),
(128, 8, 32636180, 2, 1499867088, '38719259'),
(129, 10, 11881012, 2, 1502096027, '77848259'),
(130, 4, 96944517, 2, 1501587412, '31031598'),
(131, 6, 19550570, 1, 1501874608, '38719259'),
(132, 9, 18149751, 1, 1499409951, 'N8802096'),
(133, 8, 77973288, 2, 1500306353, '38719259'),
(134, 7, 20675413, 1, 1501459080, '38719259'),
(135, 3, 28560662, 2, 1499597764, 'N8802096'),
(136, 4, 28560662, 1, 1500352856, 'N12320950'),
(137, 7, 28560662, 1, 1501385850, '77848259'),
(138, 8, 11881012, 1, 1499503415, 'N12320950'),
(139, 5, 28560662, 1, 1499850645, '31031598'),
(140, 9, 86178866, 1, 1500655390, 'N8802096'),
(141, 4, 79135829, 2, 1499536359, 'N8802096'),
(142, 2, 31741777, 2, 1501264625, 'N8802096'),
(143, 10, 96944517, 2, 1499270231, '38719259'),
(144, 12, 19349670, 1, 1501960546, '31031598'),
(145, 8, 11881012, 2, 1500204283, 'N8802096'),
(146, 6, 86178866, 2, 1499496175, '77848259'),
(147, 3, 20675413, 2, 1501190332, '31031598'),
(148, 5, 86178866, 2, 1501670403, '38719259'),
(149, 4, 17772841, 2, 1499018691, '31031598'),
(150, 12, 18909430, 2, 1501206800, '77848259'),
(151, 7, 19349670, 1, 1501637070, 'N8802096'),
(152, 2, 93357102, 1, 1499763130, 'N12320950'),
(153, 3, 32128592, 1, 1501203914, '38719259'),
(154, 9, 20902673, 1, 1500677455, 'NEWVIDE5'),
(155, 4, 18457796, 2, 1500562331, '38719259'),
(156, 10, 20902673, 1, 1499912088, 'N12320950'),
(157, 4, 19550570, 1, 1500240674, '31031598'),
(158, 11, 18457796, 1, 1499452217, '31031598'),
(159, 3, 77973288, 1, 1500488136, 'N8802096'),
(160, 12, 79135829, 2, 1500060831, '31031598'),
(161, 11, 19550570, 1, 1502052539, '77848259'),
(162, 3, 77973288, 1, 1499857804, '77848259'),
(163, 4, 93357102, 2, 1500033508, 'N8802096'),
(164, 2, 96944517, 1, 1500182616, '77848259'),
(165, 3, 20675413, 2, 1499292420, 'NEWVIDE5'),
(166, 6, 28560662, 1, 1500487539, 'NEWVIDE5'),
(167, 8, 19349670, 2, 1501624611, 'NEWVIDE5'),
(168, 4, 77973288, 2, 1501480408, 'NEWVIDE5'),
(169, 7, 18149751, 1, 1499567663, '77848259'),
(170, 9, 10806886, 1, 1499782117, '38719259'),
(171, 4, 19349670, 1, 1500039539, '38719259'),
(172, 6, 96944517, 2, 1499149588, 'N8802096'),
(173, 9, 32128592, 1, 1501280207, '31031598'),
(174, 4, 32636180, 1, 1500396150, '31031598'),
(175, 8, 18909430, 1, 1500859630, '60879175'),
(176, 7, 17772841, 2, 1501299811, '38719259'),
(177, 6, 18457796, 1, 1501121405, '77848259'),
(178, 12, 18149751, 1, 1499678766, '31031598'),
(179, 2, 20675413, 2, 1500174882, '77848259'),
(180, 7, 32128592, 2, 1501366028, '77848259'),
(181, 11, 20902673, 1, 1499863512, '38719259'),
(182, 5, 20902673, 2, 1499886570, 'N8802096'),
(183, 11, 93357102, 1, 1499809152, '77848259'),
(184, 7, 93357102, 1, 1501686056, '38719259'),
(185, 4, 32636180, 2, 1501510292, 'N8802096'),
(186, 8, 32128592, 2, 1499192673, 'N8802096'),
(187, 6, 32128592, 2, 1499999473, 'N12320950'),
(188, 2, 19550570, 1, 1499902038, 'N8802096'),
(189, 3, 19349670, 2, 1499788520, '62115859'),
(190, 4, 18149751, 1, 1500974123, '62703459'),
(191, 6, 96944517, 1, 1499420540, '95004759'),
(192, 2, 10806886, 2, 1499804183, '62115859'),
(193, 11, 77973288, 2, 1499763921, '20831359'),
(194, 11, 49954193, 1, 1499580836, 'N2320982'),
(195, 4, 17772841, 2, 1499452991, '38443598'),
(196, 9, 19349670, 1, 1500015826, '95004759'),
(197, 4, 77973288, 2, 1500444253, 'N2320982'),
(198, 5, 31741777, 1, 1500198633, '38443598'),
(199, 11, 11881012, 1, 1500597838, '62703459'),
(200, 2, 19349670, 2, 1499737270, '20831359'),
(201, 8, 18457796, 2, 1501548198, '20831359'),
(202, 9, 77973288, 2, 1500798188, '62703459'),
(203, 12, 20902673, 2, 1501463054, '38443598'),
(204, 12, 86178866, 2, 1500832423, '95004759'),
(205, 6, 19349670, 2, 1499022315, 'N2320982'),
(206, 8, 11881012, 2, 1499178400, '95004759'),
(207, 3, 19550570, 1, 1500353522, 'N2320982'),
(208, 12, 32128592, 2, 1501409736, 'N2320982'),
(209, 4, 31741777, 1, 1499021828, '62703459'),
(210, 10, 86178866, 2, 1501185834, '38443598'),
(211, 5, 18149751, 1, 1500963288, '95004759'),
(212, 5, 20675413, 1, 1500373150, '95004759'),
(213, 12, 49954193, 1, 1501686539, '38443598'),
(214, 10, 28560662, 2, 1499096879, 'N2320982'),
(215, 6, 17772841, 1, 1500582594, '95004759'),
(216, 8, 20902673, 1, 1501790573, '62115859'),
(217, 12, 18457796, 2, 1500137014, '62115859'),
(218, 9, 28560662, 2, 1500477788, '62703459'),
(219, 3, 31741777, 1, 1499502078, '31031598'),
(220, 11, 93357102, 1, 1498918070, '95004759'),
(221, 7, 31741777, 1, 1501777148, 'N2320982'),
(222, 4, 32128592, 2, 1500523644, '38443598'),
(223, 10, 18457796, 2, 1501478857, '38443598'),
(224, 9, 19550570, 1, 1501049983, '62703459'),
(225, 5, 31741777, 2, 1501053488, '62115859'),
(226, 2, 19349670, 2, 1499808785, '62703459'),
(227, 9, 28560662, 1, 1501218990, '38443598'),
(228, 9, 11881012, 2, 1501232381, '62115859'),
(229, 10, 86178866, 1, 1499777758, '62115859'),
(230, 4, 86178866, 2, 1500563590, '20831359'),
(231, 12, 11881012, 2, 1501790081, '20831359'),
(232, 5, 32636180, 2, 1501038443, '20831359'),
(233, 6, 20902673, 2, 1502090404, 'N2320982'),
(234, 6, 10806886, 2, 1500461979, 'N2320982'),
(235, 10, 79135829, 2, 1500841345, '62115859'),
(236, 3, 19349670, 1, 1499355927, '38443598'),
(237, 2, 17772841, 2, 1501925731, '62115859'),
(238, 6, 18909430, 2, 1500904643, 'N2320982'),
(239, 10, 96944517, 1, 1501162423, '62115859'),
(240, 4, 19550570, 2, 1501557456, '62115859'),
(241, 7, 31741777, 1, 1500602186, '95004759'),
(242, 3, 93357102, 1, 1498973618, '31031598'),
(243, 12, 79135829, 2, 1498924691, '62703459'),
(244, 2, 11881012, 2, 1500235202, '38443598'),
(245, 12, 20902673, 1, 1500185589, '62703459'),
(246, 9, 49954193, 2, 1500473276, '95004759'),
(247, 6, 28560662, 2, 1499617407, '95004759'),
(248, 12, 77973288, 1, 1501885960, '95004759'),
(249, 11, 96944517, 2, 1499662967, '62703459'),
(250, 2, 18149751, 2, 1500904764, 'N2320982'),
(251, 4, 79135829, 1, 1499948397, 'N2320982'),
(252, 5, 32636180, 1, 1501121415, '62703459'),
(253, 5, 11881012, 2, 1499266138, 'N2320982'),
(254, 5, 18457796, 2, 1500981500, '95004759'),
(255, 5, 77973288, 1, 1501345826, '38443598'),
(256, 7, 20902673, 2, 1499559194, '20831359'),
(257, 8, 93357102, 1, 1499088641, 'N2320982'),
(258, 12, 96944517, 2, 1499115339, 'N2320982'),
(259, 12, 93357102, 2, 1500901736, '62703459'),
(260, 7, 20675413, 2, 1500035955, '36537559'),
(261, 6, 19349670, 2, 1498977146, '82265359'),
(262, 7, 93357102, 2, 1501051520, '75412159'),
(263, 11, 11881012, 2, 1500671220, '34581459'),
(264, 11, 18457796, 1, 1501748290, '63212759'),
(265, 7, 18149751, 2, 1500377263, '34581459'),
(266, 10, 19349670, 1, 1499530833, '75412159'),
(267, 6, 32636180, 2, 1500627868, '36537559'),
(268, 3, 18149751, 1, 1502088892, '16563959'),
(269, 12, 10806886, 2, 1499573279, '75412159'),
(270, 12, 28560662, 2, 1501389861, '82265359'),
(271, 6, 18909430, 2, 1500814462, '63212759'),
(272, 8, 19349670, 1, 1501197397, '16563959'),
(273, 6, 77973288, 1, 1500167100, '75412159'),
(274, 9, 93357102, 1, 1499023068, '63212759'),
(275, 2, 77973288, 1, 1499199512, '82265359'),
(276, 7, 28560662, 2, 1499852285, '75412159'),
(277, 6, 32636180, 2, 1500065907, '82265359'),
(278, 12, 20902673, 2, 1499484062, '34581459'),
(279, 4, 79135829, 2, 1501802790, '63212759'),
(280, 5, 96944517, 1, 1499288172, '82265359'),
(281, 4, 17772841, 2, 1501716259, '34581459'),
(282, 11, 19550570, 1, 1500032059, '75412159'),
(283, 8, 31741777, 2, 1501128934, '82265359'),
(284, 5, 17772841, 2, 1501620009, '63212759'),
(285, 10, 79135829, 2, 1500988958, '36537559'),
(286, 9, 96944517, 2, 1498953827, '63212759'),
(287, 6, 19349670, 1, 1501852644, '63212759'),
(288, 3, 32128592, 1, 1501363973, '82265359'),
(289, 11, 31741777, 2, 1501063295, '16563959'),
(290, 7, 32636180, 2, 1500185537, '34581459'),
(291, 11, 32128592, 2, 1499378188, '75412159'),
(292, 9, 86178866, 1, 1499723308, '36537559'),
(293, 12, 18909430, 2, 1500291804, '36537559'),
(294, 3, 19550570, 2, 1501101185, '16563959'),
(295, 7, 20675413, 1, 1501994832, '75412159'),
(296, 6, 86178866, 2, 1501210496, '34581459'),
(297, 10, 10806886, 1, 1499811324, '34581459'),
(298, 5, 77973288, 1, 1499399476, '34581459'),
(299, 12, 18149751, 2, 1501157525, '63212759'),
(300, 6, 11881012, 2, 1502070148, '75412159'),
(301, 10, 20902673, 1, 1501369069, '63212759'),
(302, 7, 11881012, 1, 1499313775, '82265359'),
(303, 5, 18457796, 2, 1499436532, '36537559'),
(304, 7, 28560662, 2, 1499255454, '34581459'),
(305, 2, 11881012, 1, 1501326733, '16563959'),
(306, 12, 20902673, 2, 1501923181, '36537559'),
(308, 5, 86178866, 1, 1499889686, '82265359');

-- --------------------------------------------------------

--
-- Table structure for table `view_request`
--

CREATE TABLE `view_request` (
  `serial` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `video` int(11) NOT NULL,
  `times_used` int(11) NOT NULL,
  `last_used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_request`
--

INSERT INTO `view_request` (`serial`, `code`, `video`, `times_used`, `last_used`) VALUES
(1, 'NEWVIDE5', 0, 0, 1499272083),
(2, 'N595D13B', 0, 2, 1499589645);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `series` (`series`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `subscriber` (`subscriber`),
  ADD KEY `video` (`video`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `genre` (`genre`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `reset_request`
--
ALTER TABLE `reset_request`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `search_queries`
--
ALTER TABLE `search_queries`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `skits`
--
ALTER TABLE `skits`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `subs_session`
--
ALTER TABLE `subs_session`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `subscriber` (`subscriber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `producer` (`user`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `video` (`video`,`subscriber`),
  ADD UNIQUE KEY `user_2` (`user`,`video`,`subscriber`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `view_request`
--
ALTER TABLE `view_request`
  ADD PRIMARY KEY (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reset_request`
--
ALTER TABLE `reset_request`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `search_queries`
--
ALTER TABLE `search_queries`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skits`
--
ALTER TABLE `skits`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `subs_session`
--
ALTER TABLE `subs_session`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;
--
-- AUTO_INCREMENT for table `view_request`
--
ALTER TABLE `view_request`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`series`) REFERENCES `series` (`id`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `reset_request`
--
ALTER TABLE `reset_request`
  ADD CONSTRAINT `reset_request_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `skits`
--
ALTER TABLE `skits`
  ADD CONSTRAINT `skits_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `subs_session`
--
ALTER TABLE `subs_session`
  ADD CONSTRAINT `subs_session_ibfk_1` FOREIGN KEY (`subscriber`) REFERENCES `subscribers` (`id`);

--
-- Constraints for table `user_session`
--
ALTER TABLE `user_session`
  ADD CONSTRAINT `user_session_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
