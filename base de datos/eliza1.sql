-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2019 a las 03:05:43
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eliza1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `user_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-02-04 09:23:02', '2019-02-04 09:23:02'),
(2, 1, 1, '2019-02-04 09:23:19', '2019-02-04 09:23:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'informatica y computacion', '2019-02-04 09:14:23', '2019-02-04 09:14:23'),
(2, 'administracion', '2019-02-04 09:14:23', '2019-02-04 09:14:23'),
(3, 'electricidad', '2019-02-04 09:14:54', '2019-02-04 09:14:54'),
(4, 'mecatronica', '2019-02-04 09:14:54', '2019-02-04 09:14:54'),
(5, 'social y argumentos', '2019-02-06 06:37:52', '2019-02-09 01:52:49'),
(7, 'COMUNICACION INTEGRAL', '2019-02-06 06:38:28', '2019-02-06 06:38:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

CREATE TABLE `ciclos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `carrera_id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciclos`
--

INSERT INTO `ciclos` (`id`, `user_id`, `carrera_id`, `curso_id`, `nombre`, `created_at`, `updated_at`) VALUES
(12, 2, 1, 1, 'III', '2019-02-20 05:24:04', '2019-02-20 05:24:04'),
(13, 4, 2, 1, 'IV', '2019-02-22 04:32:05', '2019-02-22 04:32:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `carrera_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `carrera_id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 2, 'ingles administracion', 'curso de ingles de la carrera administracion', '2019-02-04 09:16:16', '2019-02-04 09:16:16'),
(2, 3, 'ingles electricidad', 'curso de ingles de la carrera de electricidad', '2019-02-04 09:16:16', '2019-02-04 09:16:16'),
(3, 1, 'ingles informatica y computacion', 'curso de ingles de la carrera de informatica y computacion', NULL, NULL),
(4, 4, 'ingles mecatronica', 'curso de ingles de la carrera de mecatronica', NULL, NULL),
(5, 1, 'ingles y miercoles', 'es un curso teorico de mucha importancia', '2019-02-07 05:59:56', '2019-02-07 05:59:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `carrera_id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `ciclo_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `carrera_id`, `curso_id`, `ciclo_id`, `nombre`, `archivo`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12, 'dasd', '1550789977INFORME  de practicas.docx', '2019-02-22 03:59:37', '2019-02-22 03:59:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '1-2014_10_12_100000_create_password_resets_table', 1),
(2, '2-2014_10_12_000000_create_users_table', 1),
(3, '3-2019_02_03_174335_create_carreras_table', 1),
(4, '4-2019_02_03_174535_create_cursos_table', 1),
(5, '5-2019_02_03_174556_create_ciclos_table', 1),
(6, '6-2019_02_03_174650_create_periodos_table', 1),
(7, '7-2019_02_03_174426_create_silabuses_table', 1),
(8, '8-2019_02_03_174449_create_asistencias_table', 1),
(9, '9-2019_02_03_174616_create_notas_table', 1),
(10, '99-2019_02_03_174515_create_documentos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(10) UNSIGNED NOT NULL,
  `carrera_id` int(10) UNSIGNED DEFAULT NULL,
  `curso_id` int(10) UNSIGNED DEFAULT NULL,
  `ciclo_id` int(10) UNSIGNED DEFAULT NULL,
  `periodo_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `nota1` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota2` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota3` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota4` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota5` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota6` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota7` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota8` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_nota` tinyint(1) DEFAULT NULL,
  `estado_periodo` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `carrera_id`, `curso_id`, `ciclo_id`, `periodo_id`, `user_id`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nota6`, `nota7`, `nota8`, `estado_nota`, `estado_periodo`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 12, 1, 2, '12', '0', '0', '0', '0', '0', '0', '0', 0, 1, '2019-02-20 05:24:04', '2019-02-20 05:24:04'),
(6, 2, 1, 13, 1, 4, '0', '0', '0', '0', '0', '0', '0', '0', 1, 1, '2019-02-22 04:32:05', '2019-02-22 04:32:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fechafinal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id`, `nombre`, `fecha_inicio`, `fechafinal`, `created_at`, `updated_at`) VALUES
(1, 'primer periodo', '2017-01-01', '2017-06-01', '2019-02-04 09:28:27', '2019-02-04 09:28:27'),
(2, 'segundo Periodo', '2019-02-07', '2019-03-07', '2019-02-07 01:16:20', '2019-02-07 01:16:20'),
(3, '9 pwer', '2019-04-17', '2019-06-28', '2019-02-09 02:03:07', '2019-02-09 02:11:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `silabus`
--

CREATE TABLE `silabus` (
  `id` int(10) UNSIGNED NOT NULL,
  `carrera_id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `ciclo_id` int(10) UNSIGNED NOT NULL,
  `periodo_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `silabus`
--

INSERT INTO `silabus` (`id`, `carrera_id`, `curso_id`, `ciclo_id`, `periodo_id`, `nombre`, `archivo`, `created_at`, `updated_at`) VALUES
(13, 1, 1, 12, 1, 'yty', '1550783637FICHA DEL VOLUNTARIO DE LA ONG VJG.docx', '2019-02-22 02:13:57', '2019-02-22 02:13:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave_registro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `email`, `password`, `nick`, `dni`, `clave_registro`, `foto`, `estado`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Sidi Farid', 'Aguirre', 'asesor.pedro@gmail.com', '$2y$10$DTGKAnJCpmJoHw0Ij7pwaO1Ed0UadKWqIhr7O73uZzjpcqHGfzICG', 'Gambito', '963852741', 'asdfghjklñ', NULL, NULL, NULL, '2019-02-04 14:13:23', '2019-02-04 14:13:23'),
(2, 'admin', 'renato arturo', 'guerra caceres', '5364609@gmail.com', '$2y$10$ImvEQ9gnjZ0o6y1ghMlZ1ub4TqZrviVSCZIqbCyGhpg72CHjJPPk.', 'LOLO', '74647062', '123', '1550616585muser2-160x160.jpg', NULL, '6yYaQCrcRU1ZLCz3W48rLjbZMniVDiKR8HFMpKbTUIcUaC6ohmejGhYiyr4A', '2019-02-06 04:58:55', '2019-02-20 03:49:45'),
(4, 'user', 'ffsrf', 'fdsfdsf', '53646091@gmail.com', '$2y$10$M7HoVcadR1pXFF1es9JhEOZusYb8SkLb8DbVgdVI7OWCCDJY9KNUe', 'LOLO', '74647062', '123', '1550789573user2-160x160.jpg', NULL, NULL, '2019-02-22 03:12:00', '2019-02-22 03:52:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asistencias_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciclos_user_id_foreign` (`user_id`),
  ADD KEY `ciclos_carrera_id_foreign` (`carrera_id`),
  ADD KEY `ciclos_curso_id_foreign` (`curso_id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_carrera_id_foreign` (`carrera_id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documentos_carrera_id_foreign` (`carrera_id`),
  ADD KEY `documentos_curso_id_foreign` (`curso_id`),
  ADD KEY `documentos_ciclo_id_foreign` (`ciclo_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_carrera_id_foreign` (`carrera_id`),
  ADD KEY `notas_curso_id_foreign` (`curso_id`),
  ADD KEY `notas_ciclo_id_foreign` (`ciclo_id`),
  ADD KEY `notas_periodo_id_foreign` (`periodo_id`),
  ADD KEY `notas_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `silabus`
--
ALTER TABLE `silabus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `silabus_carrera_id_foreign` (`carrera_id`),
  ADD KEY `silabus_curso_id_foreign` (`curso_id`),
  ADD KEY `silabus_ciclo_id_foreign` (`ciclo_id`),
  ADD KEY `silabus_periodo_id_foreign` (`periodo_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `silabus`
--
ALTER TABLE `silabus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD CONSTRAINT `ciclos_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ciclos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ciclos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documentos_ciclo_id_foreign` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documentos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_ciclo_id_foreign` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_periodo_id_foreign` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `silabus`
--
ALTER TABLE `silabus`
  ADD CONSTRAINT `silabus_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `silabus_ciclo_id_foreign` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `silabus_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `silabus_periodo_id_foreign` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
