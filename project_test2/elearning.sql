-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 29 jan. 2022 à 04:40
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `elearning`
--

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `owner_id`, `created_at`, `updated_at`) VALUES
(1, 'big data analytics', 'big data analytics big data analytics big data analytics', 1, NULL, NULL),
(2, 'data warehouse', 'data warehouse data warehouse data warehouse data warehouse', 1, NULL, NULL),
(3, 'database management system', 'database management system database management system', 1, NULL, NULL),
(4, 'programming languages', 'lyceehassan2', 7, NULL, NULL),
(5, 'business intelligence', 'business intelligence and big data analytics', 7, NULL, NULL),
(6, 'artificial intelligence', 'artificial intelligence and machine learning', 7, NULL, NULL),
(11, 'ddd', 'ddd', 12, NULL, NULL),
(13, 'test Title', 'test Description', 1, '2022-01-28 15:33:09', '2022-01-28 15:33:09'),
(16, 'course 2', 'course 2 course 2', 18, '2022-01-28 21:59:38', '2022-01-28 21:59:38');

-- --------------------------------------------------------

--
-- Structure de la table `course_user`
--

CREATE TABLE `course_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `course_user`
--

INSERT INTO `course_user` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, NULL, NULL),
(2, 1, 5, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 7, 2, NULL, NULL),
(6, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(12, 'data', NULL, NULL),
(13, 'machine learning', NULL, NULL),
(14, 'management system', NULL, NULL),
(19, 'EE', '2022-01-28 16:50:39', '2022-01-28 16:50:39'),
(21, 'data 2', '2022-01-28 22:39:46', '2022-01-28 22:39:46');

-- --------------------------------------------------------

--
-- Structure de la table `group_user`
--

CREATE TABLE `group_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `group_user`
--

INSERT INTO `group_user` (`id`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 12, NULL, NULL),
(2, 1, 13, NULL, NULL),
(3, 7, 14, NULL, NULL),
(6, 7, 19, NULL, NULL),
(8, 2, 12, NULL, NULL),
(9, 3, 12, NULL, NULL),
(10, 18, 12, NULL, NULL),
(11, 18, 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_01_27_210240_create-schools-table', 1),
(2, '2022_01_27_210527_create-groups-table', 1),
(3, '2022_01_27_214545_create-roles-table', 1),
(4, '2022_01_27_215428_create-users-table', 1),
(5, '2022_01_27_216502_create-courses-table', 1),
(6, '2022_01_27_216549_create-posts-table', 1),
(7, '2022_01_27_217604_create-group_user-table', 1),
(8, '2022_01_27_225530_create-course_user-table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `content`, `date`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'test post', '2022-01-28', 1, 12, '2022-01-28 18:07:16', '2022-01-28 18:07:16'),
(2, 'test 2 post', '2022-01-28', 1, 12, '2022-01-28 18:07:46', '2022-01-28 18:07:46'),
(3, 'Hello', '2022-01-28', 2, 12, '2022-01-28 18:31:55', '2022-01-28 18:31:55'),
(4, 'testo', '2022-01-28', 1, 12, '2022-01-28 18:56:36', '2022-01-28 19:08:19'),
(5, 'hello 2', '2022-01-28', 3, 12, '2022-01-28 19:28:20', '2022-01-28 19:28:26'),
(9, 'bla bla', '2022-01-28', 18, 12, '2022-01-28 22:42:47', '2022-01-28 22:42:47'),
(10, 'test', '2022-01-29', 18, 12, '2022-01-28 23:02:49', '2022-01-28 23:02:49'),
(11, '30', '2022-01-29', 2, 12, '2022-01-28 23:24:39', '2022-01-28 23:24:39'),
(13, '32', '2022-01-29', 18, 12, '2022-01-28 23:40:29', '2022-01-28 23:53:05'),
(14, 'hello', '2022-01-29', 7, 14, '2022-01-29 00:08:14', '2022-01-29 00:08:14');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Director', NULL, NULL),
(2, 'Teacher', NULL, NULL),
(3, 'Student', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `schools`
--

CREATE TABLE `schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `schools`
--

INSERT INTO `schools` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Lycée HASSAN II', 'lyceehassan2', NULL, NULL),
(2, 'Lycée Jaber Ibn Hayyan', 'lyceejaber', NULL, NULL),
(3, 'test test', 'test_test', '2022-01-28 21:38:01', '2022-01-28 21:38:01');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `school_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'mouad', 'mouad@gmail.com', '123456', 1, 2, NULL, NULL),
(2, 'hatim', 'hatim@gmail.com', '123456', 1, 2, NULL, NULL),
(3, 'farah', 'farah@gmail.com', '123456', 1, 3, NULL, NULL),
(4, 'youssef', 'youssef@gmail.com', '123456', 1, 3, NULL, NULL),
(5, 'sanaa', 'sanaa@gmail.com', '123456', 1, 3, NULL, NULL),
(6, 'houssam', 'houssam@gmail.com', '123456', 1, 3, NULL, NULL),
(7, 'hamza', 'hamza@gmail.com', '123456', 2, 2, NULL, NULL),
(8, 'imad', 'imad@gmail.com', '123456', 2, 2, NULL, NULL),
(9, 'isam', 'isam@gmail.com', '123456', 2, 3, NULL, NULL),
(10, 'nouhaila', 'nouhaila@gmail.com', '123456', 2, 3, NULL, NULL),
(11, 'said', 'said@gmail.com', '123456', 2, 3, NULL, NULL),
(12, 'ayoub', 'ayoub@gmail.com', '123456', 2, 3, NULL, NULL),
(13, 'younes', 'younes@gmail.com', '123456', 1, 3, NULL, NULL),
(14, 'yassin', 'yassin@gmail.com', '123456', 2, 3, NULL, NULL),
(15, 'director1', 'director1@gmail.com', '123456', 1, 1, NULL, NULL),
(16, 'director2', 'director2@gmail.com', '123456', 2, 1, NULL, NULL),
(18, 'mouad2', 'mouad2@gmail.com', '123456', 1, 2, '2022-01-28 20:49:19', '2022-01-28 20:49:19'),
(19, 'farah2', 'farah2@gmail.com', '123456', 1, 3, '2022-01-28 20:49:55', '2022-01-28 20:49:55'),
(21, 'director11', 'director11@gmail.com', '123456', 1, 1, '2022-01-28 21:29:02', '2022-01-28 21:29:02');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_title_unique` (`title`),
  ADD KEY `courses_owner_id_foreign` (`owner_id`);

--
-- Index pour la table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_user_user_id_foreign` (`user_id`),
  ADD KEY `course_user_course_id_foreign` (`course_id`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Index pour la table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_user_user_id_foreign` (`user_id`),
  ADD KEY `group_user_group_id_foreign` (`group_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_group_id_foreign` (`group_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Index pour la table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_slug_unique` (`slug`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_school_id_foreign` (`school_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
