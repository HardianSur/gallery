-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2025 pada 09.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `albums`
--

CREATE TABLE `albums` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `albums`
--

INSERT INTO `albums` (`id`, `user_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
('9e22b00d-3e0b-4a1f-b786-cee7c852a104', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'Real Betis', 'New Journey', '2025-02-04 18:16:37', '2025-02-04 18:16:37'),
('9e22bb54-8729-446c-a4d5-98eb7faf5bee', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'Friend', 'My Bestfriends', '2025-02-04 18:48:09', '2025-02-04 18:48:09'),
('9e22dcf6-4d6d-4b2b-9acc-972c4800736c', '9e22ae6d-0c04-47e8-a84f-2b620ff805cc', 'Liverpol', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda culpa ullam saepe quod eligendi nesciunt optio cumque iure dolore adipisci, ipsum velit hic id quasi veniam est libero dolor recusandae! In tempore velit ipsum alias nihil, ab officia magni suscipit impedit ex, praesentium at ipsam. Eos earum quisquam quos consequatur, sequi ea recusandae numquam assumenda illo quas, modi commodi beatae repudiandae ad quam facilis totam. Cumque dolorem, excepturi itaque commodi maiores necessitatibus nisi. Eum, pariatur? Suscipit quis deserunt earum magnam dolorum architecto dolores quam deleniti possimus, eos consequuntur porro vitae ullam alias voluptatum perspiciatis cumque autem soluta magni consequatur. Veniam soluta perferendis laudantium, doloribus voluptate voluptatem alias dolorum dolor magnam, iure aut consequatur, eius facilis ab natus deserunt quibusdam dignissimos explicabo repellat incidunt ullam error distinctio exercitationem quidem. Aspernatur minima dolorem repellendus eligendi et sequi commodi vel sapiente maiores vero corporis quasi consequatur recusandae, aliquam optio amet, vitae, qui dolores ex nemo. Explicabo expedita esse fugiat soluta possimus sequi saepe culpa enim vel, porro impedit molestiae sapiente, est, eum quae harum necessitatibus magni. Dicta officia labore doloribus enim est molestiae soluta aliquam ab. Itaque officiis natus voluptas adipisci illo praesentium optio sed nulla odit, quis, odio libero pariatur voluptate id minima cumque expedita inventore, vero laudantium temporibus corrupti ab atque esse. Ex enim quae ipsum facere ratione cum vel praesentium molestias eligendi est quibusdam, error ea impedit vero, animi at sapiente aliquam repellendus odit. Perspiciatis, neque? Non itaque aperiam explicabo eaque, dolores atque quod accusamus ad assumenda voluptatum, hic ipsum nobis mollitia? Iure quos, laboriosam illum vitae molestiae explicabo ut excepturi impedit dolorum neque error pariatur totam maxime aperiam numquam? Consectetur animi dolorem aliquid veritatis voluptas reprehenderit. Veritatis obcaecati iste illum cumque repellat! Rerum architecto itaque iusto aliquid sunt rem quod! Odit ipsam veritatis tenetur qui aliquid adipisci necessitatibus at?', '2025-02-04 20:22:12', '2025-02-04 23:46:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` char(36) NOT NULL,
  `photo_id` char(36) NOT NULL,
  `head_id` char(36) DEFAULT NULL,
  `user_id` char(36) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `head_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
('9e22d8fa-d551-4d7e-b07f-0bd93802a6c5', '9e22bddb-b8c5-455d-9069-3724eca03fcd', NULL, '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'test', '2025-02-04 20:11:03', '2025-02-04 20:11:03'),
('9e22daf1-f46b-4e10-81e0-f2a5163df657', '9e22bddb-b8c5-455d-9069-3724eca03fcd', '9e22d8fa-d551-4d7e-b07f-0bd93802a6c5', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'cihuyy', '2025-02-04 20:16:33', '2025-02-04 20:16:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `likes`
--

CREATE TABLE `likes` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `photo_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `photo_id`, `created_at`, `updated_at`) VALUES
('9e22fb61-4c87-45ac-a1c2-a7d69bf918cd', '9e22ae6d-0c04-47e8-a84f-2b620ff805cc', '9e22c5c7-ff31-47c8-85cd-9c11aee0ad9b', '2025-02-04 21:47:15', '2025-02-04 21:47:15'),
('9e2318da-2508-4d4b-89fc-a1ee61862711', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', '9e22b8c4-5d26-40a7-bcad-108090f2add0', '2025-02-04 23:09:39', '2025-02-04 23:09:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_15_073603_create_albums_table', 1),
(5, '2025_01_21_140908_create_photos_table', 1),
(6, '2025_01_21_140957_create_comments_table', 1),
(7, '2025_01_21_141833_create_likes_table', 1),
(8, '2025_01_29_104247_create_notifications_table', 1),
(9, '2025_01_30_035131_create_registration_requests_table', 1),
(10, '2025_01_30_035832_create_roles_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` char(36) NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('c04ade2f-444b-42ab-ba23-32058365b952', 'App\\Notifications\\NewLikeNotification', 'App\\Models\\User', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', '{\"message\":\"Darwin Nunez liked your photo\",\"liker_id\":\"9e22ae6d-0c04-47e8-a84f-2b620ff805cc\",\"photo_id\":\"9e22c5c7-ff31-47c8-85cd-9c11aee0ad9b\",\"photo_title\":\"Firts touch at LaLiga\",\"type\":\"like\",\"time\":\"2025-02-05T04:47:15.369033Z\"}', NULL, '2025-02-04 21:47:15', '2025-02-04 21:47:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `photos`
--

CREATE TABLE `photos` (
  `id` char(36) NOT NULL,
  `album_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `photos`
--

INSERT INTO `photos` (`id`, `album_id`, `user_id`, `title`, `description`, `path`, `created_at`, `updated_at`) VALUES
('9e22b8c4-5d26-40a7-bcad-108090f2add0', '9e22b00d-3e0b-4a1f-b786-cee7c852a104', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'New Journey', 'Dukung GOAT bersama Real Betis 🙇‍♂️🙇‍♂️🙇‍♂️🙇‍♂️', 'images/H6Mcdx6N7XtOtZ2NE7gTUwzilFd7IPKv97zkQUFB.jpg', '2025-02-04 18:40:59', '2025-02-04 18:40:59'),
('9e22bddb-b8c5-455d-9069-3724eca03fcd', '9e22bb54-8729-446c-a4d5-98eb7faf5bee', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'Itulah duo trio', 'Kombo mematikan ☠☠☠', 'images/WpXJH380Ltn294fB3CemKche38TxY55TeQIR6r0l.jpg', '2025-02-04 18:55:13', '2025-02-04 18:55:13'),
('9e22c5c7-ff31-47c8-85cd-9c11aee0ad9b', '9e22b00d-3e0b-4a1f-b786-cee7c852a104', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'Firts touch at LaLiga', '🌪🌪🌪', 'images/hJqxCNEmpXs03WH5RtVlYzC7ce76HPmhZGH06w9F.jpg', '2025-02-04 19:17:22', '2025-02-04 19:17:22'),
('9e22de86-e1e3-462c-8374-8acc7fe2954e', '9e22dcf6-4d6d-4b2b-9acc-972c4800736c', '9e22ae6d-0c04-47e8-a84f-2b620ff805cc', 'Auuuuuu', '🐺🐺🐺🐺', 'images/2vQ8wPQRlMqGgjPtzuT2sF8ChKVwmFMKNjP1ED0i.jpg', '2025-02-04 20:26:34', '2025-02-04 20:26:34'),
('9e233751-a028-42f8-8e31-f215334daa24', '9e22dcf6-4d6d-4b2b-9acc-972c4800736c', '9e22ae6d-0c04-47e8-a84f-2b620ff805cc', 'Epos loal', 'aku fens epos sejak zigot', 'images/s2vlOy6vtBrP1LqGLLfKM3JvEPVxCkbYY3JUpaa0.jpg', '2025-02-05 00:34:51', '2025-02-05 00:34:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registration_requests`
--

CREATE TABLE `registration_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
('9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'admin', '2025-02-04 18:12:03', '2025-02-04 18:12:03'),
('9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'user', '2025-02-04 18:12:03', '2025-02-04 18:12:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ol207ZvSLhNyVVgIfMa50miTcyHK9aaPsxVOzOWK', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMU1HbXZaYWpURzdsQ0Z0dHVhYUFla29wTjRSb1dmQmFxVmx6V0NOSCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hbGJ1bS9kZXRhaWwvOWUyMmRjZjYtNGQ2ZC00YjJiLTlhY2MtOTcyYzQ4MDA3MzZjIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MzY6IjllMjJhZTZjLWI1ZjYtNDUxMi05MGVlLTI0YjhmMTdhY2M2NSI7fQ==', 1738741315),
('unT589xB5LGCU41fYwhbYnGuyVcZwJeErRX2l4og', '9e22ae6d-0c04-47e8-a84f-2b620ff805cc', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiREV4TUVGSjdNclNHU2JoMzZuMUpTVDQzTzE5eEFBb3R2YTZ4aWc5UyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hbGJ1bS9kZXRhaWwvOWUyMmRjZjYtNGQ2ZC00YjJiLTlhY2MtOTcyYzQ4MDA3MzZjIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MzY6IjllMjJhZTZkLTBjMDQtNDdlOC1hODRmLTJiNjIwZmY4MDVjYyI7fQ==', 1738742243);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `role_id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `email`, `address`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('9e22ae6c-5f7b-4190-8e07-d0eef6f3fe0a', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'admin', 'admin', 'admin@hgallery.com', 'Hgallery', NULL, NULL, '$2y$12$INcEE6b5c8gmFslqPjgNn.gYEH9DeOwxD2iUQoIJnW3KYtmODMovO', NULL, '2025-02-04 18:12:04', '2025-02-04 18:12:04'),
('9e22ae6c-b5f6-4512-90ee-24b8f17acc65', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Anthony Santos', 'ElGasing', 'athony@example.com', 'Andalusia', 'avatars/IUKWxU8WfFWaWK8XkXwc1khZY1ApXrb1WhDwFJrs.png', NULL, '$2y$12$0z7.3B9kNp5po3ri/yqK0Ok3X8Mh4V.4XlbKgUQYQbZnGE8/Jh4A2', NULL, '2025-02-04 18:12:04', '2025-02-04 18:15:10'),
('9e22ae6d-0c04-47e8-a84f-2b620ff805cc', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Darwin Nunez', 'MarmutUruguay', 'marmut@example.com', 'Liverpool', 'avatars/Y7n5ZRbp7cLeVJagxucQhU1duChSSETfJkgE5VuV.jpg', NULL, '$2y$12$T2A7CJtbFhwoj9/zqxBtBuQmYTcjGGGWNc1aFXKO.D9Htx4SjHCZK', NULL, '2025-02-04 18:12:04', '2025-02-04 20:20:17'),
('9e22ae6d-637d-463d-8b4d-bc0a186518c2', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Agus Pratama', 'aguspratama', 'aguspratama@example.com', 'Jl. Diponegoro No. 15, Surabaya', NULL, NULL, '$2y$12$/1kEjLg2kTvNePfTtNOiPe26jy8BpQrK1o2RQ4XKtFb.UVu28ZS6y', NULL, '2025-02-04 18:12:04', '2025-02-04 18:12:04'),
('9e22ae6d-b94c-41a9-9dea-e658c8012ac7', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Dewi Lestari', 'dewilestari', 'dewilestari@example.com', 'Jl. Gatot Subroto No. 5, Medan', NULL, NULL, '$2y$12$MG7PHBADIT1X0gzvfhjdpOfBYKLf4acTsNHnWbbPIu1VAHKbM.LKy', NULL, '2025-02-04 18:12:05', '2025-02-04 18:12:05'),
('9e22ae6e-0f10-4de3-9ea3-b116cc6018ef', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Rizky Hidayat', 'rizkyhidayat', 'rizkyhidayat@example.com', 'Jl. Malioboro No. 30, Yogyakarta', NULL, NULL, '$2y$12$zgDnAJrKTVbg2im70.LNQ.aXAoRpHNPdVtQMP.4F/E4k7eS0pL0A6', NULL, '2025-02-04 18:12:05', '2025-02-04 18:12:05'),
('9e22ae6e-652f-48c9-9909-9f4039ad130d', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Fitri Handayani', 'fitrihandayani', 'fitrihandayani@example.com', 'Jl. Pemuda No. 8, Semarang', NULL, NULL, '$2y$12$DK/B4J3NPDbvufwOoTg6WOuePBgw4Me8KL9ZZVM6dGe0wA.k0ppfm', NULL, '2025-02-04 18:12:05', '2025-02-04 18:12:05'),
('9e22ae6e-baea-46ec-aaaa-56d482504eac', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Eko Saputra', 'ekosaputra', 'ekosaputra@example.com', 'Jl. Asia Afrika No. 12, Palembang', NULL, NULL, '$2y$12$Plf35eQ2rsUijIChnwSoNu3HSfayQJ37Yf3A2Ho7zFm2iXyOgqBRS', NULL, '2025-02-04 18:12:05', '2025-02-04 18:12:05'),
('9e22ae6f-10da-4a8e-bc61-f0fe628b710c', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Nur Aisyah', 'nuraisyah', 'nuraisyah@example.com', 'Jl. Ahmad Yani No. 17, Makassar', NULL, NULL, '$2y$12$FloggO1dmt0wwIAJKYu5cuskiHh9Apz38gx/lxN8i6pD098RS2.JK', NULL, '2025-02-04 18:12:05', '2025-02-04 18:12:05'),
('9e22ae6f-6700-48fe-8252-e19c6b8c30fa', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Dian Permana', 'dianpermana', 'dianpermana@example.com', 'Jl. Thamrin No. 25, Balikpapan', NULL, NULL, '$2y$12$WTjw.4szctO996b9.2ArWuUPcD4/PxOHWzbWR.60f4GFZJfsr.wKm', NULL, '2025-02-04 18:12:06', '2025-02-04 18:12:06'),
('9e22ae6f-bcd5-4d6e-b90f-0593e88cd516', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Hendra Wijaya', 'hendrawijaya', 'hendrawijaya@example.com', 'Jl. Pahlawan No. 33, Malang', NULL, NULL, '$2y$12$HeSBqKzTsNy0DcIbqTWTz.HzKqzIaTxiInHsiQ8QM/bl8eI5noM7e', NULL, '2025-02-04 18:12:06', '2025-02-04 18:12:06'),
('9e22ae70-12a9-49f9-8ae8-c4b624bd053f', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Yulia Sari', 'yuliasari', 'yuliasari@example.com', 'Jl. Veteran No. 44, Bogor', NULL, NULL, '$2y$12$XkufHMp/xRd4SOc/6hVh0.ErmkIV2MOikfzp1ur.sxoVD57CcNV96', NULL, '2025-02-04 18:12:06', '2025-02-04 18:12:06'),
('9e22ae70-6915-4dfa-9fb2-0d3153c97624', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Anton Suryadi', 'antonsuryadi', 'antonsuryadi@example.com', 'Jl. Ahmad Dahlan No. 9, Pekanbaru', NULL, NULL, '$2y$12$.GkubfnUWAVTly/lvNX8I.TMG42txHIn3WlYmRwM6NomOLdxNWIi2', NULL, '2025-02-04 18:12:06', '2025-02-04 18:12:06'),
('9e22ae70-bef1-4e17-8ee0-796cd86a8120', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Indah Pertiwi', 'indahpertiwi', 'indahpertiwi@example.com', 'Jl. Sisingamangaraja No. 22, Denpasar', NULL, NULL, '$2y$12$bjmj4FuM5xuUYRk.ds4.x.A8RRBqEe29S.o1s147SZdTWLqNaeKu.', NULL, '2025-02-04 18:12:07', '2025-02-04 18:12:07'),
('9e22ae71-1498-4d56-ae02-4d87881a6ee9', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Fajar Maulana', 'fajarmaulana', 'fajarmaulana@example.com', 'Jl. Cendrawasih No. 14, Pontianak', NULL, NULL, '$2y$12$djiBadmmQdQnnWncgfY2m.SM0AHlYaO1eXje8iMhLhKVytU3ket7y', NULL, '2025-02-04 18:12:07', '2025-02-04 18:12:07'),
('9e22ae71-6a74-417f-96bd-6d1049352a83', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Sri Hartati', 'srihartati', 'srihartati@example.com', 'Jl. Gajah Mada No. 7, Manado', NULL, NULL, '$2y$12$.zjIkINzSdmcUEb/iqiCVONHHCccO1iL/iescIERXFOYpsD8VzHIO', NULL, '2025-02-04 18:12:07', '2025-02-04 18:12:07'),
('9e22ae71-c058-4866-9dc4-293f10af94bc', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Arif Rahman', 'arifrahman', 'arifrahman@example.com', 'Jl. Teuku Umar No. 18, Palu', NULL, NULL, '$2y$12$RD71OhrHS3YlRF9GKakMx.3rTVoEEEMjfK8uVhCX5KdSzm8j.jsA.', NULL, '2025-02-04 18:12:07', '2025-02-04 18:12:07'),
('9e22ae72-164c-4b1c-9195-f646f9f5c556', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Lisa Oktaviani', 'lisaoktaviani', 'lisaoktaviani@example.com', 'Jl. Sultan Agung No. 20, Samarinda', NULL, NULL, '$2y$12$H9qbmdx5HSFVumnxuAZjzu.f7BIc.gzZl3Gg7BjPyDZwfn2/vuTT2', NULL, '2025-02-04 18:12:07', '2025-02-04 18:12:07'),
('9e22ae72-6c0f-4c7d-ad7b-56a74f0195e3', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Bayu Setiawan', 'bayusetiawan', 'bayusetiawan@example.com', 'Jl. Dr. Sutomo No. 11, Banjarmasin', NULL, NULL, '$2y$12$4jqwfL/BJAyptC91aYxReei7D6V2/7kh3SESYQxGQFgozkSW7az26', NULL, '2025-02-04 18:12:08', '2025-02-04 18:12:08'),
('9e22ae72-c1cf-4a06-baa1-ccf3116cab6a', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Rina Anggraini', 'rinaanggraini', 'rinaanggraini@example.com', 'Jl. K.H. Hasyim Ashari No. 16, Serang', NULL, NULL, '$2y$12$kq2CZQtSKOhDY1s2VTl1D.c62b3UOQ5HEbi.uRFQSd7GVVNv0Jot2', NULL, '2025-02-04 18:12:08', '2025-02-04 18:12:08'),
('9e22ae73-17b5-47ae-b995-b08afe924d7e', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'Denny Firmansyah', 'dennyfirmansyah', 'dennyfirmansyah@example.com', 'Jl. Imam Bonjol No. 28, Jambi', NULL, NULL, '$2y$12$0wfkI7./.UDm5CKh0XBnru9TXhZLdtnWor1VVvev4t/chM.tp0aXC', NULL, '2025-02-04 18:12:08', '2025-02-04 18:12:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `registration_requests`
--
ALTER TABLE `registration_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_requests_username_unique` (`username`),
  ADD UNIQUE KEY `registration_requests_email_unique` (`email`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `registration_requests`
--
ALTER TABLE `registration_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
