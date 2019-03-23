-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Mar 2019, 23:22
-- Wersja serwera: 10.1.22-MariaDB
-- Wersja PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bookydoo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` bigint(20) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comedy` tinyint(1) NOT NULL DEFAULT '0',
  `fantasy` tinyint(1) NOT NULL DEFAULT '0',
  `for_kids` tinyint(1) NOT NULL DEFAULT '0',
  `history` tinyint(1) NOT NULL DEFAULT '0',
  `moral` tinyint(1) NOT NULL DEFAULT '0',
  `philosophy` tinyint(1) NOT NULL DEFAULT '0',
  `religious` tinyint(1) NOT NULL DEFAULT '0',
  `report` tinyint(1) NOT NULL DEFAULT '0',
  `romance` tinyint(1) NOT NULL DEFAULT '0',
  `thriller` tinyint(1) NOT NULL DEFAULT '0',
  `youth` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id`, `author_id`, `title`, `description`, `comedy`, `fantasy`, `for_kids`, `history`, `moral`, `philosophy`, `religious`, `report`, `romance`, `thriller`, `youth`, `created_at`, `updated_at`) VALUES
(1, 1, 'To forget', 'asdlkn asd ikln sad lkna asldksan zxcoij nqwoiiiio oasdash', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-04 20:08:43', '2019-01-04 20:08:43'),
(2, 1, 'Dobt forget', 'poajsdoih ilnjk ;oiqn lhjbx;ociuhqli nvkujhsbd viuljwnk', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-01-05 06:39:22', '2019-01-05 06:39:22'),
(3, 1, 'teścik', 'buauauspadij asale fajno wszystko może zacznie jakoś działać.', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-08 19:56:37', '2019-01-08 19:56:37'),
(4, 1, 'test 2', 'znowu testuję, hopl hopla i z dziopla lkasd as  fsafd', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-08 20:52:35', '2019-01-08 20:52:35'),
(5, 1, 'teset 3', 'sprawdzam czy przyjmuje dobre kategorii. Mam nadzieję, ze teraz już zadziała.', 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, '2019-01-08 21:03:09', '2019-01-08 21:03:09'),
(6, 1, 'nowa książka', 'BUahaha piszę przeto żey przetestować to co tu się robi w tym serwisie, buahahah', 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, '2019-03-09 07:09:35', '2019-03-09 07:09:35');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `chapters`
--

CREATE TABLE `chapters` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `chapter_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2018_08_25_092224_create_books_table', 1),
(12, '2018_08_25_092338_create_comments_table', 1),
(13, '2018_08_25_092409_create_chapters_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'michał', 'mszkadlubowicz@gmail.com', '$2y$10$4S9rVGy3oxztMye0nGz8MOu0zHgR0dUsv.NX9sA3JCxbNXZzkedyi', 'b1FWxDPtVEmWDQ3l8lZygDSHiXwvegbgqWufqce8IyOxcDtLnQiQyoCNnIPA', '2018-08-25 07:27:11', '2018-08-25 07:27:11');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
