-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 03 2023 г., 18:47
-- Версия сервера: 5.7.39-log
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kinosaytLaravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actors`
--

CREATE TABLE `actors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `actors`
--

INSERT INTO `actors` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shvarnegr', '2023-09-28 13:03:07', '2023-09-28 13:22:06', '2023-09-28 13:22:06'),
(2, 'Shvarcnegr', '2023-09-28 13:22:41', '2023-09-28 13:22:41', NULL),
(3, 'Rafael', '2023-09-28 13:28:50', '2023-09-28 13:28:50', NULL),
(4, 'Stathem', '2023-09-28 13:29:12', '2023-09-28 13:29:12', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `movie_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 5, 8, 'asdasda', '2023-10-03 12:10:42', '2023-10-03 12:43:50'),
(2, 5, 8, 'asdasdasd', '2023-10-03 12:16:22', '2023-10-03 12:16:22'),
(3, 5, 8, 'laksjdlkasjlkasjld', '2023-10-03 12:16:26', '2023-10-03 12:16:26'),
(4, 5, 9, 'comment one', '2023-10-03 12:43:32', '2023-10-03 12:43:32');

-- --------------------------------------------------------

--
-- Структура таблицы `directors`
--

CREATE TABLE `directors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `directors`
--

INSERT INTO `directors` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Steven Spielberg', '2023-09-28 13:26:17', '2023-09-28 13:26:17', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `genre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Comedy', NULL, '2023-09-28 13:15:16', NULL),
(2, 'Triller', '2023-09-28 12:07:05', '2023-09-28 12:24:34', '2023-09-28 12:24:34'),
(3, 'Triller', '2023-09-28 13:28:56', '2023-09-28 13:28:56', NULL),
(4, 'Boevik', '2023-09-28 13:29:04', '2023-09-28 13:29:04', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_26_132107_create_directors_table', 1),
(6, '2023_09_27_153215_create_movies_table', 1),
(7, '2023_09_28_140319_add_column_years_to_movies_table', 1),
(8, '2023_09_28_143436_create_genres_table', 1),
(9, '2023_09_28_144414_add_soft_deletes_to_directors_table', 1),
(10, '2023_09_28_145034_create_movie_genres_table', 2),
(11, '2023_09_28_150103_add_soft_deletes_to_genres_table', 3),
(12, '2023_09_28_152729_create_actors_table', 4),
(13, '2023_09_28_153040_create_movie_actors_table', 5),
(14, '2023_09_28_160242_add_soft_deletes_to_actors_table', 6),
(15, '2023_09_29_154131_add_soft_deletes_to_movies_table', 7),
(16, '2023_09_22_154640_add_soft_deleted_to_users_table', 8),
(17, '2023_09_22_155715_add_column_role_to_users_table', 8),
(18, '2014_10_12_100000_create_password_resets_table', 9),
(19, '2023_10_03_142936_create_movie_user_likes_table', 10),
(20, '2023_10_03_142948_create_comments_table', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` bigint(20) UNSIGNED NOT NULL,
  `director_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `image`, `year`, `director_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'fnekherhgier edited asdasdasd', 'fejghejfhguerhgoue edited asdasd asdasdasd', 'images/Bz3giSirXGE3BMiDCdEQiqtbGLIkalsRNx8C7Jij.jpg', 1345, 1, '2023-09-28 14:07:07', '2023-09-29 12:45:17', '2023-09-29 12:45:17'),
(8, 'Teremnator', 'Some <b>decriptionnn about Teremnator fucking <u><i><sup>SHVARCNEGR</sup></i></u></b>', 'images/mtzmMFVoE3oIVfQwRPZ08LSIU9c2GihvRbcPvrZq.jpg', 1999, 1, '2023-10-02 13:51:48', '2023-10-02 13:51:48', NULL),
(9, 'You', 'Fuck You', 'images/oVOTvVUVeOMTDhLPQlK1DM6rsmS1x6MCyOoZBFdB.png', 2000, 1, '2023-10-02 13:52:12', '2023-10-02 13:52:12', NULL),
(10, 'Witcher', 'dec of Witcher', 'images/RyqLKJBMnvW5HG0GuA5JG7LK3ybK2VYqC9hnSdKO.png', 2800, 1, '2023-10-02 14:00:50', '2023-10-02 14:00:50', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `movie_actors`
--

CREATE TABLE `movie_actors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `actor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `movie_actors`
--

INSERT INTO `movie_actors` (`id`, `movie_id`, `actor_id`, `created_at`, `updated_at`) VALUES
(9, 5, 2, NULL, NULL),
(10, 5, 3, NULL, NULL),
(12, 8, 2, NULL, NULL),
(13, 8, 3, NULL, NULL),
(14, 9, 3, NULL, NULL),
(15, 9, 4, NULL, NULL),
(16, 10, 2, NULL, NULL),
(17, 10, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `movie_genres`
--

CREATE TABLE `movie_genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `movie_genres`
--

INSERT INTO `movie_genres` (`id`, `movie_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, NULL),
(2, 5, 3, NULL, NULL),
(3, 5, 4, NULL, NULL),
(4, 8, 1, NULL, NULL),
(5, 8, 3, NULL, NULL),
(6, 9, 3, NULL, NULL),
(7, 9, 4, NULL, NULL),
(8, 10, 3, NULL, NULL),
(9, 10, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `movie_user_likes`
--

CREATE TABLE `movie_user_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `movie_user_likes`
--

INSERT INTO `movie_user_likes` (`id`, `movie_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 8, 5, NULL, NULL),
(7, 8, 3, NULL, NULL),
(8, 8, 4, NULL, NULL),
(9, 9, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `role`) VALUES
(1, 'asdasd', 'asdasdasd@asdasdasd', NULL, '$2y$10$dRbCftkLULPzkIafk.uvauaAJxs/bmo8JUbX/LnyUn6LdCb87ijeu', NULL, '2023-09-29 13:45:55', '2023-09-29 13:46:16', '2023-09-29 13:46:16', NULL),
(2, 'user edited', 'userpage edited@gmail.com', NULL, '$2y$10$Owi3DKCP5r18hX8QHY/DsuBCAzXEH/QBuLfEShJBRx5/SOO5XHpte', NULL, '2023-09-29 13:46:46', '2023-10-02 11:56:00', '2023-10-02 11:56:00', 1),
(3, 'Samvel', 'sam.arzo998@gmail.com', NULL, '$2y$10$sPPaKOys9UoZDXN3wucUHeUm1DY95MWzrSJofrfH8FliQ/MkuqeA6', NULL, '2023-09-29 13:51:32', '2023-10-02 11:56:02', '2023-10-02 11:56:02', 1),
(4, 'Shvarnegr edited', 'sam.arzo999@gmail.com', NULL, '$2y$10$IVrJesV669wsS4W0thdt7.WOSGDXzwYjtQKiNN5oCI/IhNeqPgE8O', NULL, '2023-09-29 13:52:25', '2023-10-02 11:56:05', '2023-10-02 11:56:05', 0),
(5, 'Samvel', 'sam@gmail.com', NULL, '$2y$10$CdN1ywjJlJ7z3/masHyPm.2sSz6k3HmYLkERNVbWC5VOKbMu1jNJy', 'RkEiPgO6WqXMx45snoDyqE29r81vThqPWA11xDD89ErltAuPYrMCs7JbT3BF', '2023-09-29 14:16:07', '2023-09-29 14:16:07', NULL, 0),
(6, 'SamvelUser', 'samus@gmail.com', NULL, '$2y$10$mgLt6Tg.l13WhdLTwE2Um.zjhivcj3yawnOWc0.7wxfdbBh8.54FG', NULL, '2023-09-29 14:25:12', '2023-10-02 11:56:07', '2023-10-02 11:56:07', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_movie_idx` (`movie_id`),
  ADD KEY `comment_user_idx` (`user_id`);

--
-- Индексы таблицы `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_director_idx` (`director_id`);

--
-- Индексы таблицы `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_actor_movie_idx` (`movie_id`),
  ADD KEY `movie_actor_actor_idx` (`actor_id`);

--
-- Индексы таблицы `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_genre_movie_idx` (`movie_id`),
  ADD KEY `movie_genre_genre_idx` (`genre_id`);

--
-- Индексы таблицы `movie_user_likes`
--
ALTER TABLE `movie_user_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pul_movie_idx` (`movie_id`),
  ADD KEY `pul_user_idx` (`user_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actors`
--
ALTER TABLE `actors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `directors`
--
ALTER TABLE `directors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `movie_actors`
--
ALTER TABLE `movie_actors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `movie_genres`
--
ALTER TABLE `movie_genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `movie_user_likes`
--
ALTER TABLE `movie_user_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_movie_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `comment_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `post_director_fk` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`);

--
-- Ограничения внешнего ключа таблицы `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD CONSTRAINT `movie_actor_actor_fk` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `movie_actor_movie_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Ограничения внешнего ключа таблицы `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD CONSTRAINT `movie_genre_genre_fk` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `movie_genre_movie_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Ограничения внешнего ключа таблицы `movie_user_likes`
--
ALTER TABLE `movie_user_likes`
  ADD CONSTRAINT `pul_movie_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `pul_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
