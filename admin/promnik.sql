-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 11 Kwi 2018, 22:50
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `promnik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `coaches`
--

CREATE TABLE `coaches` (
  `coach_id` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `surname` text COLLATE utf8_polish_ci NOT NULL,
  `photo` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `coaches`
--

INSERT INTO `coaches` (`coach_id`, `name`, `surname`, `photo`) VALUES
(2, 'Marcin', 'CieÅ›la', '1443493626.jpg'),
(3, 'Jacek', 'CieÅ›la', '1050900143.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `fb_link` text COLLATE utf8_polish_ci NOT NULL,
  `author` text COLLATE utf8_polish_ci NOT NULL,
  `date` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `contact`
--

INSERT INTO `contact` (`id_contact`, `content`, `fb_link`, `author`, `date`) VALUES
(1, 'MA<br />\r\nt', 'https://www.facebook.com/UKSPromnik/', 'Mateusz Rusak', '2018-01-19');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery`
--

CREATE TABLE `gallery` (
  `picture_id` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `date` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gallery`
--

INSERT INTO `gallery` (`picture_id`, `name`, `date`) VALUES
(1, '3722328169.jpg', '16-12-2017');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `players`
--

CREATE TABLE `players` (
  `player_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `surname` text COLLATE utf8_polish_ci NOT NULL,
  `birth_date` text COLLATE utf8_polish_ci NOT NULL,
  `photo` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `players`
--

INSERT INTO `players` (`player_id`, `team_id`, `number`, `name`, `surname`, `birth_date`, `photo`) VALUES
(1, 1, 1, 'Lionel', 'Messi', '1998-06-21', '2055866212.jpg'),
(2, 1, 2, 'Anders ', 'Iniesta', '2000-07-18', '1969160047.jpg'),
(3, 1, 3, 'Luis', 'Suarez', '1971-12-08', '1139656321.jpg'),
(4, 1, 4, 'Gerard', 'Pique', '2000-03-31', '3637626087.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `author` text COLLATE utf8_polish_ci NOT NULL,
  `date` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id_post`, `title`, `content`, `author`, `date`) VALUES
(1, 'WesoÅ‚ych ÅšwiÄ…t i SzczÄ™Å›liwego Nowego Roku !!!!!!!!!', 'WesoÅ‚ych ÅšwiÄ…t oraz ÅšzczÄ™Å›liwego Nowego Roku\r\n\r\n Å¼yczy zarzÄ…d klubu oraz kadra trenerska!!!', 'Mateusz Rusak', '2017-12-27'),
(2, 'Treningi dla rocznika 2005', 'Od 4 grudnia do odwoÅ‚ania rocznik 2005 trenuje:\r\n\r\nponiedziaÅ‚ek 17.30-19.00 â€“ sala w ZS Samochodowych ,ul.Jana PawÅ‚a II 69\r\n\r\nwtorek 17.00-18.00 hala sportowa Reduta ,ul.Redutowa 37\r\n\r\nczwartek 19.00-20.30 sala Technikum Budowlane ul.KsiÄ™cia Janusza 45/47\r\n\r\ntrener JarosÅ‚aw Lewandowski', 'Mateusz Rusak', '2017-12-27'),
(3, 'Mecz z druÅ¼ynÄ… WAPN rocznik 2005', 'ZbiÃ³rka na mecz z druÅ¼ynÄ… WAPN -29.10 o godz.9.45 na boisku przy ul.Okopowej 55a .\r\n\r\nTrener JarosÅ‚aw Lewandowski\r\n', 'Mateusz Rusak', '2017-12-30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts_pictures`
--

CREATE TABLE `posts_pictures` (
  `id_picture` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posts_pictures`
--

INSERT INTO `posts_pictures` (`id_picture`, `id_post`, `name`) VALUES
(1, 1, '459250435.jpg'),
(2, 3, '846593310.jpg'),
(3, 3, '1910257879.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `queues`
--

CREATE TABLE `queues` (
  `queue_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `queues`
--

INSERT INTO `queues` (`queue_id`, `team_id`, `number`) VALUES
(2, 1, 1),
(3, 1, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `queue_id` int(11) NOT NULL,
  `hosts` text COLLATE utf8_polish_ci NOT NULL,
  `guests` text COLLATE utf8_polish_ci NOT NULL,
  `date` text COLLATE utf8_polish_ci NOT NULL,
  `hour` text COLLATE utf8_polish_ci NOT NULL,
  `score_hosts` varchar(3) COLLATE utf8_polish_ci NOT NULL,
  `score_guests` varchar(3) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `queue_id`, `hosts`, `guests`, `date`, `hour`, `score_hosts`, `score_guests`) VALUES
(1, 2, 'KS Promnik GoÅ„czyce', 'Legia Warszawa', '2018-01-18', '12:00', '3', '0'),
(4, 3, 'KS Promnik GoÅ„czyce', 'WRKS Olimpia Warszawa', '2018-01-21', '13:25', '2', '4'),
(6, 4, 'KS Promnik GoÅ„czyce', 'Promnik Åaskarzew', '2018-01-22', '15:00', '1', '0'),
(7, 2, 'KS Promnik GoÅ„czyce', 'SÄ™p Å»elechÃ³w', '2018-01-18', '14:00', '1', '1'),
(8, 3, 'KS Promnik GoÅ„czyce', 'Wilga Garwolin', '2018-01-29', '14:00', '-', '-');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sponsors`
--

CREATE TABLE `sponsors` (
  `id_sponsor` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `photo` text COLLATE utf8_polish_ci NOT NULL,
  `author` text COLLATE utf8_polish_ci NOT NULL,
  `date` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `sponsors`
--

INSERT INTO `sponsors` (`id_sponsor`, `name`, `photo`, `author`, `date`) VALUES
(1, 'sante', '1784181819.jpg', '3', '2018-02-04');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci NOT NULL,
  `link` text COLLATE utf8_polish_ci NOT NULL,
  `coach_id` int(11) DEFAULT NULL,
  `team_photo` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `teams`
--

INSERT INTO `teams` (`team_id`, `name`, `description`, `link`, `coach_id`, `team_photo`) VALUES
(1, 'KS Promnik GoÅ„czyce', '', 'http://wrksolimpiawarszawa.pl/', 2, '2104586247.jpg'),
(2, 'U12', '', '', 2, '2352840770.jpg'),
(3, 'U10', '', '', 2, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `name`, `email`) VALUES
(3, 'rusakkk', 'd90cc3ca2fc880f52c662d2dac3440a0', 'Mateusz Rusak', 'rusakkk@live.com'),
(4, 'rusio2121', 'd90cc3ca2fc880f52c662d2dac3440a0', 'Mateusz', 'mateusz.rusak2@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`coach_id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `posts_pictures`
--
ALTER TABLE `posts_pictures`
  ADD PRIMARY KEY (`id_picture`),
  ADD KEY `id_picture` (`id_picture`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `queues`
--
ALTER TABLE `queues`
  ADD PRIMARY KEY (`queue_id`),
  ADD KEY `queue_id` (`queue_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `queue_id` (`queue_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id_sponsor`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `coaches`
--
ALTER TABLE `coaches`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `gallery`
--
ALTER TABLE `gallery`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `posts_pictures`
--
ALTER TABLE `posts_pictures`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `queues`
--
ALTER TABLE `queues`
  MODIFY `queue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id_sponsor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `posts_pictures`
--
ALTER TABLE `posts_pictures`
  ADD CONSTRAINT `posts_pictures_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `queues`
--
ALTER TABLE `queues`
  ADD CONSTRAINT `queues_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`queue_id`) REFERENCES `queues` (`queue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`coach_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
