-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2025 pada 10.00
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
('9e22b00d-3e0b-4a1f-b786-cee7c852a104', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'Real Betis', 'New Journey', '2025-02-04 11:16:37', '2025-02-04 11:16:37'),
('9e22bb54-8729-446c-a4d5-98eb7faf5bee', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'Friend', 'My Bestfriends', '2025-02-04 11:48:09', '2025-02-04 11:48:09'),
('9e22dcf6-4d6d-4b2b-9acc-972c4800736c', '9e22ae6d-0c04-47e8-a84f-2b620ff805cc', 'Liverpol', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda culpa ullam saepe quod eligendi nesciunt optio cumque iure dolore adipisci, ipsum velit hic id quasi veniam est libero dolor recusandae! In tempore velit ipsum alias nihil, ab officia magni suscipit impedit ex, praesentium at ipsam. Eos earum quisquam quos consequatur, sequi ea recusandae numquam assumenda illo quas, modi commodi beatae repudiandae ad quam facilis totam. Cumque dolorem, excepturi itaque commodi maiores necessitatibus nisi. Eum, pariatur? Suscipit quis deserunt earum magnam dolorum architecto dolores quam deleniti possimus, eos consequuntur porro vitae ullam alias voluptatum perspiciatis cumque autem soluta magni consequatur. Veniam soluta perferendis laudantium, doloribus voluptate voluptatem alias dolorum dolor magnam, iure aut consequatur, eius facilis ab natus deserunt quibusdam dignissimos explicabo repellat incidunt ullam error distinctio exercitationem quidem. Aspernatur minima dolorem repellendus eligendi et sequi commodi vel sapiente maiores vero corporis quasi consequatur recusandae, aliquam optio amet, vitae, qui dolores ex nemo. Explicabo expedita esse fugiat soluta possimus sequi saepe culpa enim vel, porro impedit molestiae sapiente, est, eum quae harum necessitatibus magni. Dicta officia labore doloribus enim est molestiae soluta aliquam ab. Itaque officiis natus voluptas adipisci illo praesentium optio sed nulla odit, quis, odio libero pariatur voluptate id minima cumque expedita inventore, vero laudantium temporibus corrupti ab atque esse. Ex enim quae ipsum facere ratione cum vel praesentium molestias eligendi est quibusdam, error ea impedit vero, animi at sapiente aliquam repellendus odit. Perspiciatis, neque? Non itaque aperiam explicabo eaque, dolores atque quod accusamus ad assumenda voluptatum, hic ipsum nobis mollitia? Iure quos, laboriosam illum vitae molestiae explicabo ut excepturi impedit dolorum neque error pariatur totam maxime aperiam numquam? Consectetur animi dolorem aliquid veritatis voluptas reprehenderit. Veritatis obcaecati iste illum cumque repellat! Rerum architecto itaque iusto aliquid sunt rem quod! Odit ipsam veritatis tenetur qui aliquid adipisci necessitatibus at?', '2025-02-04 13:22:12', '2025-02-04 16:46:42'),
('9e3dd544-706d-4e81-b95c-7c44bc320fc0', '9e22ae6d-637d-463d-8b4d-bc0a186518c2', 'Evos', 'Test', '2025-02-17 23:08:02', '2025-02-17 23:08:02'),
('9e3f6e5d-59ef-4e2b-998c-f7785ff40ad3', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'Test123', 'test album 123', '2025-02-19 01:11:57', '2025-02-19 01:12:10'),
('9e410137-3961-4ab4-8b1d-f27ff46ae31c', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'Stiker random', '-', '2025-02-19 19:58:24', '2025-02-19 19:58:24'),
('9e4104c9-c03c-412c-bc1c-3a543fa2bde2', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'wibu', 'foto animeh', '2025-02-19 20:08:23', '2025-02-19 20:08:23'),
('9e411c0d-d01a-40d9-b504-254099fd0da4', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'aaaa', 'aaa', '2025-02-19 21:13:27', '2025-02-19 21:13:27'),
('9e411c14-e9eb-46d2-9974-8af18bf17dba', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'aaaa', 'aaaaa', '2025-02-19 21:13:31', '2025-02-19 21:13:31');

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
('9e22d8fa-d551-4d7e-b07f-0bd93802a6c5', '9e22bddb-b8c5-455d-9069-3724eca03fcd', NULL, '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'test', '2025-02-04 13:11:03', '2025-02-04 13:11:03'),
('9e22daf1-f46b-4e10-81e0-f2a5163df657', '9e22bddb-b8c5-455d-9069-3724eca03fcd', '9e22d8fa-d551-4d7e-b07f-0bd93802a6c5', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'cihuyy', '2025-02-04 13:16:33', '2025-02-04 13:16:33'),
('9e3f7025-f622-4f4d-ba28-6ad53fda1b80', '9e22b8c4-5d26-40a7-bcad-108090f2add0', NULL, '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'test', '2025-02-19 01:16:56', '2025-02-19 01:16:56'),
('9e3f7366-483c-48a8-8e0c-3f919d8ac614', '9e22c5c7-ff31-47c8-85cd-9c11aee0ad9b', NULL, '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'cihuyy', '2025-02-19 01:26:02', '2025-02-19 01:26:02'),
('9e4126f0-7ba5-47bb-ba02-2381e9911acc', '9e22bddb-b8c5-455d-9069-3724eca03fcd', NULL, '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'test', '2025-02-19 21:43:53', '2025-02-19 21:43:53');

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
('9e22fb61-4c87-45ac-a1c2-a7d69bf918cd', '9e22ae6d-0c04-47e8-a84f-2b620ff805cc', '9e22c5c7-ff31-47c8-85cd-9c11aee0ad9b', '2025-02-04 14:47:15', '2025-02-04 14:47:15'),
('9e2318da-2508-4d4b-89fc-a1ee61862711', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', '9e22b8c4-5d26-40a7-bcad-108090f2add0', '2025-02-04 16:09:39', '2025-02-04 16:09:39'),
('9e3f2604-6292-4692-b1fe-d34d7caff2af', '9e22ae6d-637d-463d-8b4d-bc0a186518c2', '9e22c5c7-ff31-47c8-85cd-9c11aee0ad9b', '2025-02-18 21:49:39', '2025-02-18 21:49:39'),
('9e411fca-824f-4236-a678-dee0d93e2ea6', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', '9e41067d-9480-4608-9f80-b9cda21b9cbf', '2025-02-19 21:23:54', '2025-02-19 21:23:54'),
('9e41264c-e147-455a-800b-e053ab5e4126', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', '9e410198-e2d8-4573-96b4-ce23ca1c894c', '2025-02-19 21:42:06', '2025-02-19 21:42:06'),
('9e41269d-0f26-4366-b7df-6577c6353e11', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', '9e22bddb-b8c5-455d-9069-3724eca03fcd', '2025-02-19 21:42:58', '2025-02-19 21:42:58'),
('9e412b75-2c39-439d-8a57-e6df44ad752d', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', '9e4101db-e9bc-4abf-9a86-37699318d7c2', '2025-02-19 21:56:31', '2025-02-19 21:56:31');

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
(10, '2025_01_30_035832_create_roles_table', 1),
(11, '2025_02_19_031958_alter_table_user_define_relation', 1);

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
('234e496c-a43e-404e-9e90-fb7bce90a979', 'App\\Notifications\\NewLikeNotification', 'App\\Models\\User', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', '{\"message\":\"Okarun liked your photo\",\"liker_id\":\"9e22ae6d-b94c-41a9-9dea-e658c8012ac7\",\"photo_id\":\"9e22bddb-b8c5-455d-9069-3724eca03fcd\",\"photo_title\":\"Itulah duo trio\",\"type\":\"like\",\"time\":\"2025-02-20T04:42:58.913309Z\"}', NULL, '2025-02-19 21:42:58', '2025-02-19 21:42:58'),
('c04ade2f-444b-42ab-ba23-32058365b952', 'App\\Notifications\\NewLikeNotification', 'App\\Models\\User', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', '{\"message\":\"Darwin Nunez liked your photo\",\"liker_id\":\"9e22ae6d-0c04-47e8-a84f-2b620ff805cc\",\"photo_id\":\"9e22c5c7-ff31-47c8-85cd-9c11aee0ad9b\",\"photo_title\":\"Firts touch at LaLiga\",\"type\":\"like\",\"time\":\"2025-02-05T04:47:15.369033Z\"}', '2025-02-17 19:28:38', '2025-02-04 14:47:15', '2025-02-17 19:28:38'),
('d503ef4b-b42f-4d69-ba6d-848e5d482e4e', 'App\\Notifications\\NewCommentNotification', 'App\\Models\\User', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', '{\"message\":\"Okarun comment on your photo\",\"user_id\":\"9e22ae6d-b94c-41a9-9dea-e658c8012ac7\",\"photo_id\":\"9e22bddb-b8c5-455d-9069-3724eca03fcd\",\"photo_title\":\"Itulah duo trio\",\"type\":\"comment\",\"time\":\"2025-02-20T04:43:53.586671Z\"}', NULL, '2025-02-19 21:43:53', '2025-02-19 21:43:53'),
('ddd10a7e-b80d-409e-aa68-f4222e490926', 'App\\Notifications\\NewLikeNotification', 'App\\Models\\User', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', '{\"message\":\"Anthony Santos liked your photo\",\"liker_id\":\"9e22ae6c-b5f6-4512-90ee-24b8f17acc65\",\"photo_id\":\"9e41067d-9480-4608-9f80-b9cda21b9cbf\",\"photo_title\":\"yooo\",\"type\":\"like\",\"time\":\"2025-02-20T04:23:54.296713Z\"}', '2025-02-19 21:42:12', '2025-02-19 21:23:54', '2025-02-19 21:42:12'),
('fa05e11d-691c-4f24-b742-3ce148ad33c7', 'App\\Notifications\\NewLikeNotification', 'App\\Models\\User', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', '{\"message\":\"PT Tuma Epos liked your photo\",\"liker_id\":\"9e22ae6d-637d-463d-8b4d-bc0a186518c2\",\"photo_id\":\"9e22c5c7-ff31-47c8-85cd-9c11aee0ad9b\",\"photo_title\":\"Firts touch at LaLiga\",\"type\":\"like\",\"time\":\"2025-02-19T04:49:39.523833Z\"}', '2025-02-18 21:49:45', '2025-02-18 21:49:39', '2025-02-18 21:49:45');

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
('9e22b8c4-5d26-40a7-bcad-108090f2add0', '9e22b00d-3e0b-4a1f-b786-cee7c852a104', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'New Journey', 'Dukung GOAT bersama Real Betis 🙇‍♂️🙇‍♂️🙇‍♂️🙇‍♂️', 'images/H6Mcdx6N7XtOtZ2NE7gTUwzilFd7IPKv97zkQUFB.jpg', '2025-02-04 11:40:59', '2025-02-04 11:40:59'),
('9e22bddb-b8c5-455d-9069-3724eca03fcd', '9e22bb54-8729-446c-a4d5-98eb7faf5bee', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'Itulah duo trio', 'Kombo mematikan ☠☠☠', 'images/WpXJH380Ltn294fB3CemKche38TxY55TeQIR6r0l.jpg', '2025-02-04 11:55:13', '2025-02-04 11:55:13'),
('9e22c5c7-ff31-47c8-85cd-9c11aee0ad9b', '9e22b00d-3e0b-4a1f-b786-cee7c852a104', '9e22ae6c-b5f6-4512-90ee-24b8f17acc65', 'Firts touch at LaLiga', '🌪🌪🌪', 'images/hJqxCNEmpXs03WH5RtVlYzC7ce76HPmhZGH06w9F.jpg', '2025-02-04 12:17:22', '2025-02-04 12:17:22'),
('9e22de86-e1e3-462c-8374-8acc7fe2954e', '9e22dcf6-4d6d-4b2b-9acc-972c4800736c', '9e22ae6d-0c04-47e8-a84f-2b620ff805cc', 'Auuuuuu', '🐺🐺🐺🐺', 'images/2vQ8wPQRlMqGgjPtzuT2sF8ChKVwmFMKNjP1ED0i.jpg', '2025-02-04 13:26:34', '2025-02-04 13:26:34'),
('9e233751-a028-42f8-8e31-f215334daa24', '9e22dcf6-4d6d-4b2b-9acc-972c4800736c', '9e22ae6d-0c04-47e8-a84f-2b620ff805cc', 'Epos loal', 'aku fens epos sejak zigot', 'images/s2vlOy6vtBrP1LqGLLfKM3JvEPVxCkbYY3JUpaa0.jpg', '2025-02-04 17:34:51', '2025-02-04 17:34:51'),
('9e3dd679-c086-4964-83de-0e27cdd1bc3b', '9e3dd544-706d-4e81-b95c-7c44bc320fc0', '9e22ae6d-637d-463d-8b4d-bc0a186518c2', 'M1 World Champion', 'Hastag apa adick adick 🤪🤪🤪 ?', 'images/ykZ1yVVWgcpzyVbWHBlCNUFFbv6w2S5qwHPBF7nG.jpg', '2025-02-17 23:11:24', '2025-02-17 23:11:24'),
('9e3dd932-096c-466d-af07-8a50fd6f3895', '9e3dd544-706d-4e81-b95c-7c44bc320fc0', '9e22ae6d-637d-463d-8b4d-bc0a186518c2', 'Ayo Ayoi', 'Kita kedatangan tamu dari malaysia nih Fams', 'images/GNg4nmKgZlEcNw5AfTUyah6Na9anM7EqjdqdccsU.jpg', '2025-02-17 23:19:01', '2025-02-17 23:19:01'),
('9e3ddb1d-7cc8-4334-82b7-1b3062c05248', '9e3dd544-706d-4e81-b95c-7c44bc320fc0', '9e22ae6d-637d-463d-8b4d-bc0a186518c2', 'ANNOUNCEMENT!!!', 'Perkenalkan saudara baru kita EVOS INDIA.', 'images/1fh6bL3AamaCZAhhOyRxFM06ffRoODKJ4Rfk7LRa.jpg', '2025-02-17 23:24:23', '2025-02-17 23:24:23'),
('9e410152-8eea-45d5-a8f2-b58d84de20c1', '9e410137-3961-4ab4-8b1d-f27ff46ae31c', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'w', 'dfs', 'images/GBU0Rf7vNFPu9K3LdzKh36phC0na1cDF0Xok7Ejv.jpg', '2025-02-19 19:58:42', '2025-02-19 19:58:42'),
('9e41016a-92ec-4187-a0a5-ea33391c24d3', '9e410137-3961-4ab4-8b1d-f27ff46ae31c', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'ws', 'dfs', 'images/X4aU1byGU21RxRZWpjAJnlP2rmhIvt9159EMQsGh.jpg', '2025-02-19 19:58:58', '2025-02-19 19:58:58'),
('9e410178-5208-43b2-9cdb-f852b9b024bf', '9e410137-3961-4ab4-8b1d-f27ff46ae31c', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'wsa', 'dfss', 'images/SKjcXVfJt3ZTjSX590G0mDmq6xMkarAXsH87UVwx.jpg', '2025-02-19 19:59:07', '2025-02-19 19:59:07'),
('9e41018a-43f2-4587-b31a-afe92c139bac', '9e410137-3961-4ab4-8b1d-f27ff46ae31c', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'fdg', 'dfssdfgdf', 'images/nuGojcUriqLXEgdWG5CogSFwc3RwgyIb5dAkX3I7.jpg', '2025-02-19 19:59:19', '2025-02-19 19:59:19'),
('9e410198-e2d8-4573-96b4-ce23ca1c894c', '9e410137-3961-4ab4-8b1d-f27ff46ae31c', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'fdgg', 'dfssdfgdf', 'images/XgkvLRVjnyWwouUT9IEla5h5pPPo20BGr7dntJHA.jpg', '2025-02-19 19:59:28', '2025-02-19 19:59:28'),
('9e4101a6-c372-46f9-b20a-05a88e3e8de7', '9e410137-3961-4ab4-8b1d-f27ff46ae31c', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'fdgg', 'dfssdfgdf', 'images/o1n2sRbdRVU2OsE8dgB2mFfuHz7QApdVxdyKF3rR.jpg', '2025-02-19 19:59:37', '2025-02-19 19:59:37'),
('9e4101b4-e3b4-411f-9a50-0c223123b096', '9e410137-3961-4ab4-8b1d-f27ff46ae31c', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'fdgggg', 'dfssdfgdfdfgdf', 'images/mx4taof9gb4Wm31PUpSofkmoGvMpfL7pWLFdCzEn.jpg', '2025-02-19 19:59:46', '2025-02-19 19:59:46'),
('9e4101c0-bb2b-4ca9-8ce1-c2558efae63e', '9e410137-3961-4ab4-8b1d-f27ff46ae31c', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'fdgggg', 'dfssdfgdfdfgdf', 'images/owTYPX8HJRn1JAS3BLJ2QDCI43QSQ1DYrVSHnJMD.jpg', '2025-02-19 19:59:54', '2025-02-19 19:59:54'),
('9e4101cd-94d9-485a-8f78-f1f462dab144', '9e410137-3961-4ab4-8b1d-f27ff46ae31c', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'fdgggghh', 'dfssdfgdfdfgdf', 'images/kc5MTHCfofTwCmV8YpbiVWocGUNVofnl1EIcaD2z.jpg', '2025-02-19 20:00:03', '2025-02-19 20:00:03'),
('9e4101db-e9bc-4abf-9a86-37699318d7c2', '9e410137-3961-4ab4-8b1d-f27ff46ae31c', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'fdgggghhsdfsd', 'dfssdfgdfdfgdfdfsfsd', 'images/Ju2gYkO5R2AWoW7S33O2Qq9ilU8cmuRBM3aFqas9.jpg', '2025-02-19 20:00:12', '2025-02-19 20:00:12'),
('9e4105f4-ae53-4a59-9bd3-432995b58c2f', '9e4104c9-c03c-412c-bc1c-3a543fa2bde2', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'istri gwejh', 'dd', 'images/3HXsTVj1kCj5VfeEgFNmIb64HQmBSLrCcokbNiDu.jpg', '2025-02-19 20:11:39', '2025-02-19 20:11:39'),
('9e410629-0b18-468d-af67-84f6ed1cebc0', '9e4104c9-c03c-412c-bc1c-3a543fa2bde2', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'Gojo Walpaper', 'dd', 'images/A6gjBJT6iJnfWShyOr2NISmfz1bdBGPwlGYhMvam.jpg', '2025-02-19 20:12:14', '2025-02-19 20:12:14'),
('9e410643-4a26-4c67-9bb9-4a0f5feb4ccc', '9e4104c9-c03c-412c-bc1c-3a543fa2bde2', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'KNY full hd', 'dd', 'images/Gi3w3beEmGln0DeEsLOwsENuRpJiLXvBVZaTZOkq.jpg', '2025-02-19 20:12:31', '2025-02-19 20:12:31'),
('9e41065b-04f2-436d-a0f8-92353e1517b5', '9e4104c9-c03c-412c-bc1c-3a543fa2bde2', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'gw bgt', 'dd', 'images/iae5exhAGAUklOFWSl5AKTYPScnkxwU27I08oajW.jpg', '2025-02-19 20:12:46', '2025-02-19 20:12:46'),
('9e41067d-9480-4608-9f80-b9cda21b9cbf', '9e4104c9-c03c-412c-bc1c-3a543fa2bde2', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'yooo', 'dd', 'images/mAPTXJwlKGy5kHbxMRI9PxrXw9LPbVmR8gBKx2Rb.jpg', '2025-02-19 20:13:09', '2025-02-19 20:13:09'),
('9e4106b1-de83-4e02-be9c-5dea5e2d9a4e', '9e4104c9-c03c-412c-bc1c-3a543fa2bde2', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'dua tige domain', 'dd', 'images/etyDr6dm31c9e6xnTfejJuqqkRqFqxk8yCh2Ui64.jpg', '2025-02-19 20:13:43', '2025-02-19 20:13:43'),
('9e41177a-437d-4bb4-ba81-da85079e02a2', '9e4104c9-c03c-412c-bc1c-3a543fa2bde2', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'wsa', 'gg', 'images/2EpC55rIFTjImyz7FEGm4lw6jyTSWuUFWzS2IYP7.jpg', '2025-02-19 21:00:39', '2025-02-19 21:00:39'),
('9e4117f1-6d86-4083-a957-e280b9865ad9', '9e4104c9-c03c-412c-bc1c-3a543fa2bde2', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'hhh', 'hhh', 'images/xpZjyDuDTyEgjUYMTYhXz1aP292Z585womT5jhJL.jpg', '2025-02-19 21:01:57', '2025-02-19 21:01:57'),
('9e41198a-3d63-4558-b30c-e19076cf1d55', '9e4104c9-c03c-412c-bc1c-3a543fa2bde2', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'cat', 'asasa', 'images/2ns2LusypbB8pl6mC4rfRPerfVPU80E5sckchdDT.jpg', '2025-02-19 21:06:25', '2025-02-19 21:06:25'),
('9e411a9c-fb1e-432e-b2df-e1cfe290ef90', '9e4104c9-c03c-412c-bc1c-3a543fa2bde2', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', 'aa', 'aa', 'images/7bBPO7u0LMKOKB3BZTnPX8TM0W0nDbEa8zWFbyu7.jpg', '2025-02-19 21:09:25', '2025-02-19 21:09:25');

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

--
-- Dumping data untuk tabel `registration_requests`
--

INSERT INTO `registration_requests` (`id`, `name`, `username`, `email`, `password`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ujang', 'ererqiujang', 'jhgjhjhdsf@haha.com', '$2y$12$ZgIR4VlJW4G.LbIkq0U32OP0tPGGc.pzv9AwZTp7jjBhau08BCwna', 'mana aja', 'approved', '2025-02-18 21:38:20', '2025-02-18 21:38:20'),
(2, 'test', 'test', 'adihardian06s@gmail.com', '$2y$12$yfuzR9dLvChmwCudUy6E8eGrzlPPjXrucw/fClzlgG0KQEE0ltsVa', 'test', 'approved', '2025-02-19 21:38:46', '2025-02-19 21:38:46');

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
('9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'admin', '2025-02-04 11:12:03', '2025-02-04 11:12:03'),
('9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'user', '2025-02-04 11:12:03', '2025-02-04 11:12:03');

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
('dkgYzcWHtGCzO31cSwZMpxHC6o9Ey6wdVPzaTZXy', '9e22ae6c-5f7b-4190-8e07-d0eef6f3fe0a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUjF5MXg1dHY1d0h1ZmFoMEhaRVJCeFBVYk5tY1I0RDB6SHNIODJBaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtzOjM2OiI5ZTIyYWU2Yy01ZjdiLTQxOTAtOGUwNy1kMGVlZjZmM2ZlMGEiO30=', 1740038715),
('ZHuBTMyoaZR79qx70sxlgE17dColnXQlLjLeZcvH', '9e22ae6d-b94c-41a9-9dea-e658c8012ac7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiejZTeVp0NzdjeUk1S0lDbHZlYklXSktMeHluamhLWmZ4aW1rcHhYNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yZXBvcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7czozNjoiOWUyMmFlNmQtYjk0Yy00MWE5LTlkZWEtZTY1OGM4MDEyYWM3Ijt9', 1740038750);

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
('9e22ae6c-5f7b-4190-8e07-d0eef6f3fe0a', '9e22ae6c-01ac-40bb-a914-abc4e9d290f5', 'admin', 'admin', 'admin@hgallery.com', 'Hgallery', NULL, NULL, '$2y$12$INcEE6b5c8gmFslqPjgNn.gYEH9DeOwxD2iUQoIJnW3KYtmODMovO', NULL, '2025-02-04 11:12:04', '2025-02-04 11:12:04'),
('9e22ae6c-b5f6-4512-90ee-24b8f17acc65', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Anthony Santos', 'ElGasing', 'athony@example.com', 'Andalusia', 'avatars/uKgcEcDGQH8rqZT49bOidwzxQHoZFacSmcSNUBEe.jpg', NULL, '$2y$12$0z7.3B9kNp5po3ri/yqK0Ok3X8Mh4V.4XlbKgUQYQbZnGE8/Jh4A2', NULL, '2025-02-04 11:12:04', '2025-02-19 01:19:20'),
('9e22ae6d-0c04-47e8-a84f-2b620ff805cc', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Darwin Nunez', 'MarmutUruguay', 'marmut@example.com', 'Liverpool', 'avatars/Y7n5ZRbp7cLeVJagxucQhU1duChSSETfJkgE5VuV.jpg', NULL, '$2y$12$T2A7CJtbFhwoj9/zqxBtBuQmYTcjGGGWNc1aFXKO.D9Htx4SjHCZK', NULL, '2025-02-04 11:12:04', '2025-02-04 13:20:17'),
('9e22ae6d-637d-463d-8b4d-bc0a186518c2', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'PT Tuma Epos', 'evosloal', 'evos@evos.com', 'Jl. Diponegoro No. 15, Surabaya', 'avatars/i7ra7M2HFPEBD6ebZUt1cOp0SxqIUwb550s8rByX.png', NULL, '$2y$12$/1kEjLg2kTvNePfTtNOiPe26jy8BpQrK1o2RQ4XKtFb.UVu28ZS6y', NULL, '2025-02-04 11:12:04', '2025-02-18 12:49:44'),
('9e22ae6d-b94c-41a9-9dea-e658c8012ac7', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Okarun', 'okarun', 'dewilestari@example.com', 'Jl. Gatot Subroto No. 5, Medan', 'avatars/pw5bzoymfq12b7pslVEaCcC2H99kvGplphMoazYb.jpg', NULL, '$2y$12$MG7PHBADIT1X0gzvfhjdpOfBYKLf4acTsNHnWbbPIu1VAHKbM.LKy', NULL, '2025-02-04 11:12:05', '2025-02-19 20:02:48'),
('9e22ae6e-0f10-4de3-9ea3-b116cc6018ef', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Rizky Hidayat', 'rizkyhidayat', 'rizkyhidayat@example.com', 'Jl. Malioboro No. 30, Yogyakarta', NULL, NULL, '$2y$12$zgDnAJrKTVbg2im70.LNQ.aXAoRpHNPdVtQMP.4F/E4k7eS0pL0A6', NULL, '2025-02-04 11:12:05', '2025-02-04 11:12:05'),
('9e22ae6e-652f-48c9-9909-9f4039ad130d', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Fitri Handayani', 'fitrihandayani', 'fitrihandayani@example.com', 'Jl. Pemuda No. 8, Semarang', NULL, NULL, '$2y$12$DK/B4J3NPDbvufwOoTg6WOuePBgw4Me8KL9ZZVM6dGe0wA.k0ppfm', NULL, '2025-02-04 11:12:05', '2025-02-04 11:12:05'),
('9e22ae6e-baea-46ec-aaaa-56d482504eac', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Eko Saputra', 'ekosaputra', 'ekosaputra@example.com', 'Jl. Asia Afrika No. 12, Palembang', NULL, NULL, '$2y$12$Plf35eQ2rsUijIChnwSoNu3HSfayQJ37Yf3A2Ho7zFm2iXyOgqBRS', NULL, '2025-02-04 11:12:05', '2025-02-04 11:12:05'),
('9e22ae6f-10da-4a8e-bc61-f0fe628b710c', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Nur Aisyah', 'nuraisyah', 'nuraisyah@example.com', 'Jl. Ahmad Yani No. 17, Makassar', NULL, NULL, '$2y$12$FloggO1dmt0wwIAJKYu5cuskiHh9Apz38gx/lxN8i6pD098RS2.JK', NULL, '2025-02-04 11:12:05', '2025-02-04 11:12:05'),
('9e22ae6f-6700-48fe-8252-e19c6b8c30fa', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Dian Permana', 'dianpermana', 'dianpermana@example.com', 'Jl. Thamrin No. 25, Balikpapan', NULL, NULL, '$2y$12$WTjw.4szctO996b9.2ArWuUPcD4/PxOHWzbWR.60f4GFZJfsr.wKm', NULL, '2025-02-04 11:12:06', '2025-02-04 11:12:06'),
('9e22ae6f-bcd5-4d6e-b90f-0593e88cd516', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Hendra Wijaya', 'hendrawijaya', 'hendrawijaya@example.com', 'Jl. Pahlawan No. 33, Malang', NULL, NULL, '$2y$12$HeSBqKzTsNy0DcIbqTWTz.HzKqzIaTxiInHsiQ8QM/bl8eI5noM7e', NULL, '2025-02-04 11:12:06', '2025-02-04 11:12:06'),
('9e22ae70-12a9-49f9-8ae8-c4b624bd053f', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Yulia Sari', 'yuliasari', 'yuliasari@example.com', 'Jl. Veteran No. 44, Bogor', NULL, NULL, '$2y$12$XkufHMp/xRd4SOc/6hVh0.ErmkIV2MOikfzp1ur.sxoVD57CcNV96', NULL, '2025-02-04 11:12:06', '2025-02-04 11:12:06'),
('9e22ae70-6915-4dfa-9fb2-0d3153c97624', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Anton Suryadi', 'antonsuryadi', 'antonsuryadi@example.com', 'Jl. Ahmad Dahlan No. 9, Pekanbaru', NULL, NULL, '$2y$12$.GkubfnUWAVTly/lvNX8I.TMG42txHIn3WlYmRwM6NomOLdxNWIi2', NULL, '2025-02-04 11:12:06', '2025-02-04 11:12:06'),
('9e22ae70-bef1-4e17-8ee0-796cd86a8120', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Indah Pertiwi', 'indahpertiwi', 'indahpertiwi@example.com', 'Jl. Sisingamangaraja No. 22, Denpasar', NULL, NULL, '$2y$12$bjmj4FuM5xuUYRk.ds4.x.A8RRBqEe29S.o1s147SZdTWLqNaeKu.', NULL, '2025-02-04 11:12:07', '2025-02-04 11:12:07'),
('9e22ae71-1498-4d56-ae02-4d87881a6ee9', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Fajar Maulana', 'fajarmaulana', 'fajarmaulana@example.com', 'Jl. Cendrawasih No. 14, Pontianak', NULL, NULL, '$2y$12$djiBadmmQdQnnWncgfY2m.SM0AHlYaO1eXje8iMhLhKVytU3ket7y', NULL, '2025-02-04 11:12:07', '2025-02-04 11:12:07'),
('9e22ae71-6a74-417f-96bd-6d1049352a83', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Sri Hartati', 'srihartati', 'srihartati@example.com', 'Jl. Gajah Mada No. 7, Manado', NULL, NULL, '$2y$12$.zjIkINzSdmcUEb/iqiCVONHHCccO1iL/iescIERXFOYpsD8VzHIO', NULL, '2025-02-04 11:12:07', '2025-02-04 11:12:07'),
('9e22ae71-c058-4866-9dc4-293f10af94bc', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Arif Rahman', 'arifrahman', 'arifrahman@example.com', 'Jl. Teuku Umar No. 18, Palu', NULL, NULL, '$2y$12$RD71OhrHS3YlRF9GKakMx.3rTVoEEEMjfK8uVhCX5KdSzm8j.jsA.', NULL, '2025-02-04 11:12:07', '2025-02-04 11:12:07'),
('9e22ae72-164c-4b1c-9195-f646f9f5c556', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Lisa Oktaviani', 'lisaoktaviani', 'lisaoktaviani@example.com', 'Jl. Sultan Agung No. 20, Samarinda', NULL, NULL, '$2y$12$H9qbmdx5HSFVumnxuAZjzu.f7BIc.gzZl3Gg7BjPyDZwfn2/vuTT2', NULL, '2025-02-04 11:12:07', '2025-02-04 11:12:07'),
('9e22ae72-6c0f-4c7d-ad7b-56a74f0195e3', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Bayu Setiawan', 'bayusetiawan', 'bayusetiawan@example.com', 'Jl. Dr. Sutomo No. 11, Banjarmasin', NULL, NULL, '$2y$12$4jqwfL/BJAyptC91aYxReei7D6V2/7kh3SESYQxGQFgozkSW7az26', NULL, '2025-02-04 11:12:08', '2025-02-04 11:12:08'),
('9e22ae72-c1cf-4a06-baa1-ccf3116cab6a', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Rina Anggraini', 'rinaanggraini', 'rinaanggraini@example.com', 'Jl. K.H. Hasyim Ashari No. 16, Serang', NULL, NULL, '$2y$12$kq2CZQtSKOhDY1s2VTl1D.c62b3UOQ5HEbi.uRFQSd7GVVNv0Jot2', NULL, '2025-02-04 11:12:08', '2025-02-04 11:12:08'),
('9e22ae73-17b5-47ae-b995-b08afe924d7e', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Denny Firmansyah', 'dennyfirmansyah', 'dennyfirmansyah@example.com', 'Jl. Imam Bonjol No. 28, Jambi', NULL, NULL, '$2y$12$0wfkI7./.UDm5CKh0XBnru9TXhZLdtnWor1VVvev4t/chM.tp0aXC', NULL, '2025-02-04 11:12:08', '2025-02-04 11:12:08'),
('9e4129c0-8d13-49cb-9d03-c64ca8c7e00c', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'test', 'test', 'adihardian06s@gmail.com', NULL, NULL, NULL, '$2y$12$chPNWv5tuTWSAS2epGziM.oFikN8IyanzdUQf3gExtjJCrrrASUOe', NULL, '2025-02-19 21:51:45', '2025-02-19 21:51:45'),
('9e412a43-0c3f-4d82-88d1-f9bbead66b2a', '9e22ae6c-05b8-4282-8716-d7f1866f65d4', 'Ujang', 'ererqiujang', 'jhgjhjhdsf@haha.com', NULL, NULL, NULL, '$2y$12$nytFyF.b7Yk65.sXcxWyQ./viYL2yuGCU123wGX4F/iUWriAWQUmO', NULL, '2025-02-19 21:53:11', '2025-02-19 21:53:11');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_photo_id_foreign` (`photo_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_photo_id_foreign` (`photo_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_album_id_foreign` (`album_id`),
  ADD KEY `photos_user_id_foreign` (`user_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `registration_requests`
--
ALTER TABLE `registration_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
