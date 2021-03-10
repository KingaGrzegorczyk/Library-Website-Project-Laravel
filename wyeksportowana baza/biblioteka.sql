-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Sty 2021, 17:16
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availableAmount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `availableAmount`, `created_at`, `updated_at`) VALUES
(1, 'W pustyni i w puszczy', 'Henryk Sienkiewicz', 98, NULL, '2021-01-14 15:10:25'),
(2, 'Harry Potter i Kamień Filozoficzny', 'J.K. Rowling', 84, NULL, '2020-12-30 15:35:47'),
(3, 'Harry Potter i Komnata Tajemnic', 'J.K. Rowling', 72, NULL, '2021-01-19 12:07:40'),
(4, 'Harry Potter i Więzień Azkabanu', 'J.K. Rowling', 90, NULL, NULL),
(5, 'Harry Potter i Czara Ognia', 'J.K. Rowling', 70, NULL, NULL),
(6, 'Harry Potter i Zakon Feniksa', 'J.K. Rowling', 60, NULL, '2021-01-01 14:14:48'),
(7, 'Harry Potter i Książę Półkrwi', 'J.K. Rowling', 100, NULL, NULL),
(8, 'Harry Potter i Insygnia Śmierci', 'J.K. Rowling', 84, NULL, '2021-01-07 13:03:49'),
(9, 'Harry Potter und der Stein der Weisen', 'J.K. Rowling', 0, NULL, '2021-01-01 15:02:41');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `library`
--

CREATE TABLE `library` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `bookId` bigint(20) UNSIGNED NOT NULL,
  `expirationDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `library`
--

INSERT INTO `library` (`id`, `userId`, `bookId`, `expirationDate`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 1, '2021-02-10', '2020-12-30 15:32:44', '2021-01-05 15:58:39', 'Renewed'),
(2, 2, 3, '2021-01-27', '2020-12-30 15:33:08', '2020-12-31 15:19:28', 'Renewed'),
(3, 2, 2, '2021-01-13', '2020-12-30 15:35:47', '2020-12-30 15:35:47', 'Borrowed'),
(6, 2, 1, '2021-01-14', '2020-12-31 15:34:36', '2020-12-31 15:34:36', 'Borrowed'),
(7, 2, 9, '2021-01-14', '2020-12-31 15:38:16', '2020-12-31 15:40:11', 'Returned'),
(8, 2, 9, '2021-01-14', '2020-12-31 15:38:22', '2020-12-31 15:38:22', 'Borrowed'),
(9, 2, 9, '2021-01-15', '2021-01-01 15:02:41', '2021-01-01 15:02:41', 'Borrowed'),
(10, 2, 1, '2021-01-19', '2021-01-05 13:06:55', '2021-01-05 13:06:55', 'Borrowed'),
(11, 5, 8, '2021-01-21', '2021-01-07 13:03:49', '2021-01-07 13:03:49', 'Borrowed'),
(12, 6, 3, '2021-01-24', '2021-01-10 12:29:40', '2021-01-10 12:29:40', 'Borrowed'),
(13, 5, 1, '2021-01-28', '2021-01-14 15:10:25', '2021-01-14 15:10:25', 'Borrowed'),
(14, 7, 3, '2021-02-02', '2021-01-19 12:07:40', '2021-01-19 12:07:40', 'Borrowed');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_28_131916_create_books_table', 1),
(5, '2020_12_28_132656_create_library_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Prosiaczek', 'prosiaczek@stumilowylas.pl', NULL, '$2y$10$3/A.p39eb24oKB5fZ32oZ.lZIEjhYOD3GT.4T08thSE6WkelKmDJW', NULL, '2020-12-30 15:26:11', '2021-01-07 13:22:16'),
(5, 'Kangurzyca', 'kangurzyca@stumilowylas.pl', NULL, '$2y$10$cnPge0GFrXFKo1SJyYt6YeGRru9XEr40zXsPUHVN136nko5yYOqTS', NULL, '2021-01-07 13:03:27', '2021-01-07 13:03:27'),
(6, 'Kubuś', 'kubus@stumilowylas.pl', NULL, '$2y$10$jhvTS7v7KMVo0.sstxhQ8OZBMSoVr5XGdQhltURy8izAbLQh/IVla', NULL, '2021-01-10 12:29:24', '2021-01-10 12:29:24'),
(7, 'Tygrysek', 'tygrysek@stumilowylas.pl', NULL, '$2y$10$Xio3iVYx6SD1c1hW81KtduXseS21RNTEyaevgDj9HYdNtxNo5MbkW', NULL, '2021-01-19 11:53:55', '2021-01-19 11:53:55');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_userid_foreign` (`userId`),
  ADD KEY `library_bookid_foreign` (`bookId`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `library`
--
ALTER TABLE `library`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `library_bookid_foreign` FOREIGN KEY (`bookId`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
