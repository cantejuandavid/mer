-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2017 a las 10:46:16
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`id`, `codigo`, `nombre`, `created_at`, `updated_at`) VALUES
(1, '555', 'cocina', '2017-06-20 06:46:29', '2017-06-20 06:46:29'),
(2, '478', 'ventas', '2017-06-20 06:47:16', '2017-06-20 06:47:16'),
(3, '83838', 'neiva', '2017-06-20 08:40:10', '2017-06-20 08:40:10'),
(4, '2333', 'Bogota', '2017-06-20 09:56:35', '2017-06-20 09:56:35'),
(5, '333', 'pereira', '2017-06-20 09:58:48', '2017-06-20 09:58:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_fisico`
--

CREATE TABLE `inventario_fisico` (
  `id` int(10) UNSIGNED NOT NULL,
  `idAlmacen` int(10) UNSIGNED NOT NULL,
  `idProducto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inventario_fisico`
--

INSERT INTO `inventario_fisico` (`id`, `idAlmacen`, `idProducto`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 9, '2017-06-20 13:17:22', '2017-06-20 13:33:25'),
(2, 2, 5, 2, '2017-06-20 13:17:22', '2017-06-20 13:17:22'),
(3, 2, 7, 2, '2017-06-20 13:17:22', '2017-06-20 13:17:22'),
(4, 3, 3, 10, '2017-06-20 13:22:02', '2017-06-20 13:22:02'),
(5, 2, 4, 6, '2017-06-20 13:33:25', '2017-06-20 13:33:25'),
(6, 5, 3, 100, '2017-06-20 13:36:17', '2017-06-20 13:36:17');

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2017_06_19_131605_create_proveedores_table', 1),
(7, '2017_06_19_132452_create_productoss_table', 1),
(8, '2017_06_19_133137_create_almacenes_table', 1),
(9, '2017_06_19_134504_create_inventarioFisico_table', 2),
(10, '2017_06_19_135422_create_remisionEntrada_table', 3),
(11, '2017_06_19_135816_create_remision_entrada_detalle_table', 4),
(12, '2017_06_19_235706_create_unidad_column', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_venta` decimal(18,0) NOT NULL,
  `StockMinimo` int(11) NOT NULL,
  `StockMaximo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `descripcion`, `precio_venta`, `StockMinimo`, `StockMaximo`, `created_at`, `updated_at`, `unidad`) VALUES
(3, '181', 'harina', 'harina fortificado del huila', '100', 1, 100, '2017-06-20 04:55:12', '2017-06-20 05:18:52', 'libra'),
(4, '456', 'arroz', 'arroz blanco fino', '150', 1, 100, '2017-06-20 04:55:27', '2017-06-20 04:55:27', 'libra'),
(5, '3939', 'papa', 'papa negra', '5', 1, 100, '2017-06-20 05:20:47', '2017-06-20 05:30:04', 'arroba'),
(6, '38938439', 'papaya', 'dulce color rosa', '77', 3, 100, '2017-06-20 08:43:05', '2017-06-20 08:43:05', 'unidad'),
(7, '33839', 'cuaderno', 'cuadriculado de 100 páginas', '23', 1, 104, '2017-06-20 09:59:27', '2017-06-20 09:59:27', 'unidad'),
(8, '55', 'azucar', 'morena', '33', 1, 100, '2017-06-20 10:14:13', '2017-06-20 10:14:13', 'unidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `codigo`, `nombre`, `direccion`, `telefono`, `created_at`, `updated_at`) VALUES
(2, '158', 'levapan', 'cra 7 #85 - 8999', '3052693366', '2017-06-19 21:42:24', '2017-06-20 00:34:35'),
(3, '147', 'Organización ROA - Florhuilaa', 'km 1 23 11', '8725899', '2017-06-19 21:44:09', '2017-06-20 03:38:00'),
(4, '558', 'Producto 1A', 'Calle 58 78- 89', '360 25 85', '2017-06-19 21:46:27', '2017-06-19 21:46:27'),
(5, '654', 'Plasticos del sur', 'Av toma 5 89', '8712588', '2017-06-19 21:47:43', '2017-06-19 21:47:43'),
(6, '655', 'Pinturas tito pabon', 'cll 8 5 9', '8569966', '2017-06-20 03:55:32', '2017-06-20 03:55:32'),
(7, '204', 'Propan x2', 'Cll 12 14 - 25', '8756699', '2017-06-20 10:00:26', '2017-06-20 10:00:55'),
(8, '458', 'Comercializadora', 'calle 3 3 3', '383838', '2017-06-20 10:08:34', '2017-06-20 10:08:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remision_entrada`
--

CREATE TABLE `remision_entrada` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proveedor_id` int(10) UNSIGNED NOT NULL,
  `almacen_id` int(10) UNSIGNED NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `remision_entrada`
--

INSERT INTO `remision_entrada` (`id`, `codigo`, `proveedor_id`, `almacen_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, '234', 5, 2, 2, '2017-06-20 07:03:54', '2017-06-20 13:33:06'),
(2, '333', 4, 2, 2, '2017-06-20 07:24:24', '2017-06-20 13:33:25'),
(3, '4485', 3, 5, 2, '2017-06-20 08:24:16', '2017-06-20 13:36:17'),
(5, '568', 5, 2, 1, '2017-06-20 08:38:12', '2017-06-20 09:13:27'),
(6, '4545', 4, 3, 1, '2017-06-20 09:13:46', '2017-06-20 10:29:16'),
(7, '45', 2, 1, 1, '2017-06-20 09:43:53', '2017-06-20 13:02:02'),
(8, '587', 3, 2, 2, '2017-06-20 09:55:12', '2017-06-20 13:17:22'),
(9, '3333', 4, 2, 2, '2017-06-20 09:57:07', '2017-06-20 13:20:31'),
(10, '5454', 3, 3, 2, '2017-06-20 10:37:59', '2017-06-20 13:22:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remision_entrada_detalle`
--

CREATE TABLE `remision_entrada_detalle` (
  `id` int(10) UNSIGNED NOT NULL,
  `idRemisionEntrada` int(10) UNSIGNED NOT NULL,
  `idProducto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `remision_entrada_detalle`
--

INSERT INTO `remision_entrada_detalle` (`id`, `idRemisionEntrada`, `idProducto`, `cantidad`, `created_at`, `updated_at`) VALUES
(2, 2, 3, 1, '2017-06-20 12:24:38', '2017-06-20 12:30:16'),
(3, 2, 4, 6, '2017-06-20 12:26:53', '2017-06-20 12:26:53'),
(4, 8, 3, 3, '2017-06-20 12:32:59', '2017-06-20 12:32:59'),
(5, 8, 5, 2, '2017-06-20 12:38:06', '2017-06-20 12:38:06'),
(6, 8, 7, 2, '2017-06-20 12:38:12', '2017-06-20 12:38:12'),
(7, 7, 4, 2, '2017-06-20 12:59:30', '2017-06-20 12:59:30'),
(8, 7, 5, 7, '2017-06-20 12:59:37', '2017-06-20 12:59:37'),
(9, 7, 7, 6, '2017-06-20 12:59:44', '2017-06-20 12:59:44'),
(10, 7, 8, 3, '2017-06-20 12:59:54', '2017-06-20 12:59:54'),
(11, 9, 3, 2, '2017-06-20 13:18:24', '2017-06-20 13:18:24'),
(12, 10, 3, 10, '2017-06-20 13:21:23', '2017-06-20 13:21:23'),
(13, 1, 3, 3, '2017-06-20 13:23:18', '2017-06-20 13:23:18'),
(14, 3, 3, 100, '2017-06-20 13:36:00', '2017-06-20 13:36:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'juan david vargas cante', 'cantejuandavid@gmail.com', '$2y$10$5ZZdY/i7p.g6O41Mn9UeduNmazv.aFUlkqPCfPMcwFimbLkB3/8Ee', 'jKCL245Tl9Dj1fl5gqmdTA2yw5zEzEF7cfabqYowll0uxodD7BWzpgyIP563', '2017-06-20 10:56:40', '2017-06-20 10:56:40'),
(2, 'camilo cante', 'conquista2010@hotmail.com', '$2y$10$vtMTVOpZOa5w9J5wXAD5L.YMQn8OI6/XT079SCgcMLCYIlxOFtQlS', NULL, '2017-06-20 11:05:22', '2017-06-20 11:05:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario_fisico`
--
ALTER TABLE `inventario_fisico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventario_fisico_idalmacen_foreign` (`idAlmacen`),
  ADD KEY `inventario_fisico_idproducto_foreign` (`idProducto`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `remision_entrada`
--
ALTER TABLE `remision_entrada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `remision_entrada_idproveedor_foreign` (`proveedor_id`),
  ADD KEY `remision_entrada_idalmacen_foreign` (`almacen_id`);

--
-- Indices de la tabla `remision_entrada_detalle`
--
ALTER TABLE `remision_entrada_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `remision_entrada_detalle_idremisionentrada_foreign` (`idRemisionEntrada`),
  ADD KEY `remision_entrada_detalle_idproducto_foreign` (`idProducto`);

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
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `inventario_fisico`
--
ALTER TABLE `inventario_fisico`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `remision_entrada`
--
ALTER TABLE `remision_entrada`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `remision_entrada_detalle`
--
ALTER TABLE `remision_entrada_detalle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario_fisico`
--
ALTER TABLE `inventario_fisico`
  ADD CONSTRAINT `inventario_fisico_idalmacen_foreign` FOREIGN KEY (`idAlmacen`) REFERENCES `almacenes` (`id`),
  ADD CONSTRAINT `inventario_fisico_idproducto_foreign` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `remision_entrada`
--
ALTER TABLE `remision_entrada`
  ADD CONSTRAINT `remision_entrada_idalmacen_foreign` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`id`),
  ADD CONSTRAINT `remision_entrada_idproveedor_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `remision_entrada_detalle`
--
ALTER TABLE `remision_entrada_detalle`
  ADD CONSTRAINT `remision_entrada_detalle_idproducto_foreign` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `remision_entrada_detalle_idremisionentrada_foreign` FOREIGN KEY (`idRemisionEntrada`) REFERENCES `remision_entrada` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
