-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2019 a las 23:08:58
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
  `registro_id` int(10) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave_carrera` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `descripcion`, `clave_carrera`, `created_at`, `updated_at`) VALUES
(1, 'COMPUTACION E INFORMATICA', 'es una carrera sobre computadoras', 'COMP', '2019-03-16 03:05:09', '2019-03-16 03:05:09'),
(2, 'ADMINISTRACION', 'es un curso teorico de mucha importancia', 'ADMI', '2019-03-16 03:05:09', '2019-03-16 03:05:09'),
(3, 'CONTABILIDAD', 'es un curso teorico de mucha importancia', 'CONT', '2019-03-16 03:05:09', '2019-03-16 03:05:09'),
(4, 'LABORATORIO CLINICO', 'es un curso teorico de mucha importancia', 'LAB', '2019-03-16 03:05:09', '2019-03-16 03:05:09'),
(5, 'ELECTRONICA', 'es un curso teorico de mucha importancia', 'ELE', '2019-03-16 03:05:09', '2019-03-16 03:05:09'),
(6, 'ELECTRICIDAD', 'es un curso teorico de mucha importancia', 'ELD', '2019-03-16 03:05:09', '2019-03-16 03:05:09'),
(7, 'MECANICA AUTOMOTRIZ', 'es un curso teorico de mucha importancia', 'MEC', '2019-03-16 03:05:09', '2019-03-16 03:05:09'),
(8, 'MECANICA DE PRODUCCION', 'es un curso teorico de mucha importancia', 'MEP', '2019-03-16 03:05:09', '2019-03-16 03:05:09'),
(9, 'METALURGIA', 'es un curso teorico de mucha importancia', 'MET', '2019-03-16 03:05:09', '2019-03-16 03:05:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

CREATE TABLE `ciclos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciclos`
--

INSERT INTO `ciclos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'III', '2019-03-16 03:08:24', '2019-03-16 03:08:24'),
(2, 'IV', '2019-03-16 03:08:24', '2019-03-16 03:08:24'),
(3, 'V', '2019-03-18 00:33:42', '2019-03-18 00:33:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'INGLES', 'es un curso teorico de mucha importancia', '2019-03-16 02:32:01', '2019-03-16 02:32:01');

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
(1, 5, 1, 1, 'fff', '1551926648buenas practicas.docx', '2019-03-16 03:15:01', '2019-03-16 03:15:01'),
(2, 8, 1, 2, 'ssss', '15522545741 (1).docx', '2019-03-16 03:15:01', '2019-03-16 03:15:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_final` datetime NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `fecha_inicio`, `fecha_final`, `color`, `created_at`, `updated_at`) VALUES
(2, 'Prueba 1', '2019-03-06 01:03:00', '2019-03-06 06:03:00', '#000000', NULL, NULL),
(3, 'Prueba 2', '2019-03-16 04:03:00', '2019-03-23 23:03:00', '#000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '1-2014_10_12_100000_create_password_resets_table', 1),
(2, '2-2014_10_12_000000_create_users_table', 1),
(3, '2-2014_10_12_1100000_create_roles_table', 1),
(4, '2-2014_10_12_1200000_add_rol_id_to_users', 1),
(5, '3-2019_02_03_174335_create_carreras_table', 1),
(6, '4-2019_02_03_174535_create_cursos_table', 1),
(7, '5-2019_02_03_174556_create_ciclos_table', 1),
(8, '6-2019_02_03_174650_create_periodos_table', 1),
(9, '7-2019_02_03_174426_create_silabuses_table', 1),
(10, '8-2019_02_03_174722_registro_table', 1),
(11, '9-2019_02_03_174449_create_asistencias_table', 1),
(12, '98-2019_02_03_174616_create_notas_table', 1),
(13, '99-2019_02_03_174515_create_documentos_table', 1),
(14, '2019_03_15_224421_add_carrera_id_to_users_table', 2),
(15, '2019_03_16_001611_create_eventos_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(10) UNSIGNED NOT NULL,
  `registro_id` int(10) UNSIGNED NOT NULL,
  `nota1` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota2` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota3` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota4` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota5` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota6` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota7` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota8` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_nota` tinyint(1) NOT NULL,
  `estado_periodo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `registro_id`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nota6`, `nota7`, `nota8`, `estado_nota`, `estado_periodo`, `created_at`, `updated_at`) VALUES
(2, 2, '0', '0', '0', '0', '0', '0', '0', '0', 1, 1, '2019-03-16 03:29:15', '2019-03-16 03:29:15'),
(5, 5, '13', '12', '12', '14', '12', '0', '0', '0', 1, 1, '2019-03-17 23:37:43', '2019-03-18 02:26:04');

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
  `fecha_final` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id`, `nombre`, `fecha_inicio`, `fecha_final`, `created_at`, `updated_at`) VALUES
(1, '2019-I', '2019-01-01', '2019-07-31', '2019-03-16 02:41:04', '2019-03-16 02:41:04'),
(2, '2019-II', '2019-08-01', '2019-12-31', '2019-03-16 02:41:04', '2019-03-16 02:41:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(10) UNSIGNED NOT NULL,
  `carrera_id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `ciclo_id` int(10) UNSIGNED NOT NULL,
  `periodo_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `carrera_id`, `curso_id`, `ciclo_id`, `periodo_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 7, 1, 1, 1, 2, '2019-03-16 03:24:28', '2019-03-16 03:24:28'),
(5, 2, 1, 1, 1, 1, '2019-03-17 23:37:43', '2019-03-17 23:37:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'estudiante', '2019-03-16 02:54:33', '2019-03-16 02:54:33'),
(2, 'profesor', '2019-03-16 02:54:33', '2019-03-16 02:54:33'),
(3, 'administrador', '2019-03-16 02:54:33', '2019-03-16 02:54:33');

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
(1, 5, 1, 2, 1, 'wwww', '1551925288ESQUEMA-DE-PLAN-DE-EDUCACIÓN-AMBIENTAL.docx', '2019-03-16 03:38:02', '2019-03-16 03:38:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clave_carrera` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `carrera_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `nick`, `dni`, `clave_carrera`, `foto`, `estado`, `remember_token`, `created_at`, `updated_at`, `rol_id`, `carrera_id`) VALUES
(1, 'christian', 'diaz', 'chris@gmail.com', '$2y$10$004R7x.YYWCUtYeccDOVau1.xIsay/Oh3yATybQ9MrOODyeHiO0/.', 'CD', '75008475', '123', '1552690558logo oficial.png', 1, 'IFUhuZZW1MXNiAtXvkIVd8p0jRIiZ1UZOmt6ZRP2nVxVbwMhAxcoRPW6D8QJ', '2019-03-16 03:54:18', '2019-03-16 03:55:58', 1, 2),
(2, 'Juan', 'perez', 'juan@gmail.com', '$2y$10$SwHDwrSrSiJrcdgoQJVUdekhA0eTTI6cVsK7DIy8EkI3z9oyvweBG', 'JP', '78002478', '123', 'hola.jpg', 1, NULL, '2019-03-16 03:54:18', '2019-03-16 03:54:18', 1, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asistencias_registro_id_foreign` (`registro_id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documentos_carrera_id_foreign` (`carrera_id`),
  ADD KEY `documentos_curso_id_foreign` (`curso_id`),
  ADD KEY `documentos_ciclo_id_foreign` (`ciclo_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `notas_registro_id_foreign` (`registro_id`);

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
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registros_carrera_id_foreign` (`carrera_id`),
  ADD KEY `registros_curso_id_foreign` (`curso_id`),
  ADD KEY `registros_ciclo_id_foreign` (`ciclo_id`),
  ADD KEY `registros_periodo_id_foreign` (`periodo_id`),
  ADD KEY `registros_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rol_id_foreign` (`rol_id`),
  ADD KEY `users_carrera_id_foreign` (`carrera_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ciclos`
--
ALTER TABLE `ciclos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `silabus`
--
ALTER TABLE `silabus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_registro_id_foreign` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `notas_registro_id_foreign` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registros_ciclo_id_foreign` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registros_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registros_periodo_id_foreign` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registros_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `silabus`
--
ALTER TABLE `silabus`
  ADD CONSTRAINT `silabus_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `silabus_ciclo_id_foreign` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `silabus_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `silabus_periodo_id_foreign` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
