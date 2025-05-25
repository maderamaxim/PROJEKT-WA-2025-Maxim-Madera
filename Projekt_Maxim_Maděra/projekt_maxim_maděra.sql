-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 25. kvě 2025, 20:41
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `projekt_maxim_maděra`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'test', 'test', '2025-05-03 22:39:27', '2025-05-03 22:39:27', 1),
(2, 'test2', 'test2\r\n', '2025-05-03 22:50:57', '2025-05-03 22:50:57', 1),
(3, 'test3', 'test3\r\n', '2025-05-04 19:10:48', '2025-05-04 19:10:48', 1),
(4, 'test4', 'test4\r\n', '2025-05-14 16:18:30', '2025-05-14 16:18:30', 1),
(5, 'test5', 'test5', '2025-05-14 16:24:54', '2025-05-22 16:15:15', 1),
(6, 'test6', 'test6\r\nzkouška test\r\npp\r\n', '2025-05-14 16:27:02', '2025-05-22 16:34:01', 1),
(8, 'zkouška admin', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Fusce wisi. Pellentesque arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Fusce aliquam vestibulum ipsum. Praesent vitae arcu tempor neque lacinia pretium. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Curabitur bibendum justo non orci. Maecenas aliquet accumsan leo. Vestibulum fermentum tortor id mi. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Mauris dictum facilisis augue. Integer in sapien. Aliquam erat volutpat.', '2025-05-22 17:03:55', '2025-05-25 10:49:54', 2),
(15, '3333333333333333', '11111111111111111111111\r\n', '2025-05-25 11:48:21', '2025-05-25 11:50:27', 9),
(16, 'test hmm', 'test hmm\r\nawdaw', '2025-05-25 11:57:01', '2025-05-25 11:57:44', 10);

-- --------------------------------------------------------

--
-- Struktura tabulky `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `user_id`, `content`, `created_at`) VALUES
(1, 8, 1, 'Zkouška komentu', '2025-05-22 19:04:24'),
(2, 4, 2, 'testuju', '2025-05-22 19:06:05'),
(3, 4, 1, 'taky zkouška', '2025-05-25 12:38:12'),
(4, 8, 3, 'test', '2025-05-25 12:39:16'),
(5, 8, 5, 'DROP TABLE comments;', '2025-05-25 12:53:08'),
(6, 8, 9, '1', '2025-05-25 13:47:37'),
(7, 16, 10, 'ysdevf', '2025-05-25 13:57:48'),
(8, 6, 10, 'edfs', '2025-05-25 13:57:52'),
(9, 16, 9, 'sdxgse', '2025-05-25 13:59:11');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `role`, `name`, `surname`, `created_at`, `updated_at`) VALUES
(1, 'mmadera', NULL, '$2y$10$9oR.iPWopp7yuiTScjXkL.OnQmtO/eMme4MVzrG6XiRpSCSUzdbh6', 'user', NULL, NULL, '2025-05-02 19:52:02', NULL),
(2, 'zkouska', NULL, '$2y$10$pMj3Ltrd9ccFuLQpFEWBq.ITBGYl0EPdZ2vUguv4F8kuPQAkUgSVG', 'user', NULL, NULL, '2025-05-22 17:03:13', NULL),
(3, 'tgm', NULL, '$2y$10$E9jhzP1lCc9h6wwrO5uJDeZ1tjA2SD4caht9ao63aPhzBCiqPNW0W', 'admin', NULL, NULL, '2025-05-25 10:38:59', NULL),
(4, 'admin', NULL, '$2y$10$HA5knRFO95y4BQiLe1kVA.IQ2VilmnwbdIrIKd63sVGN.es1DtEZS', 'admin', NULL, NULL, '2025-05-25 10:49:00', NULL),
(5, 'mmm', NULL, '$2y$10$a/OB53hSgNcDpIcl0ymXFetM67bxwbUigsMe6ypbXfzFG35vHxHGS', 'user', NULL, NULL, '2025-05-25 10:52:21', NULL),
(6, 'test\'); DROP TABLE users; --', NULL, '$2y$10$etfP88rgDr2koS0hK1haE.rYBTtoaNO/LRsNRbQ5ijNUqZnHbrbWe', 'user', NULL, NULL, '2025-05-25 10:56:49', NULL),
(7, 'pop', NULL, '$2y$10$4u0mUMAPtlsuUun8w8/UUO7mJcXPb9yUvcsXo68N2PVUOfJCjWrci', 'user', NULL, NULL, '2025-05-25 11:26:27', NULL),
(8, 'poi', NULL, '$2y$10$GoBEn/nRBQJEOvVuXzHTs.OigIk.xoV8UeD92HOQlQf6Ngng3a6p2', 'user', NULL, NULL, '2025-05-25 11:27:23', NULL),
(9, '1', NULL, '$2y$10$Nem8mHZbDjxJsKxb71PiWOPOVRkh3YDmWOVVctQI/1JAU9Fajw5cO', 'admin', NULL, NULL, '2025-05-25 11:47:19', NULL),
(10, 'hmm', NULL, '$2y$10$OPx1CkYEsBCvneiIcyvVh.4JR9K/zMTPfLAYAZkCt8kXGul9rxuA2', 'user', NULL, NULL, '2025-05-25 11:53:16', NULL),
(11, 'gg', NULL, '$2y$10$VDc3auakmxbXyoFNKLucVOtncFPSCpt0dc7QOBhrxQLsBVVLzsgCW', 'user', NULL, NULL, '2025-05-25 12:00:31', NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articles_user` (`user_id`);

--
-- Indexy pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pro tabulku `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
