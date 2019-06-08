-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2019 a las 19:38:32
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `berexpress`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consignements`
--

CREATE TABLE `consignements` (
  `id` int(11) NOT NULL,
  `document` varchar(100) NOT NULL,
  `line01` int(11) NOT NULL,
  `line02` int(11) NOT NULL,
  `line03` int(11) NOT NULL,
  `line04` int(11) DEFAULT NULL,
  `line05` int(11) DEFAULT NULL,
  `total_price` double(10,2) DEFAULT NULL,
  `status` enum('Creado','Asignado','En viaje a Origen','Retirado','En viaje a Destino','Entregado','Completado') NOT NULL DEFAULT 'Creado',
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `number` int(10) DEFAULT NULL,
  `town` varchar(250) DEFAULT NULL,
  `postal_code` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `latitude` double(10,2) DEFAULT NULL,
  `longitude` double(10,2) DEFAULT NULL,
  `atention_hour` varchar(200) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`id`, `description`, `address`, `number`, `town`, `postal_code`, `country`, `latitude`, `longitude`, `atention_hour`, `users_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Banco Galicia', 'Av. 14 Pres. Juan Domingo Perón', 5169, 'Berazategui', '1880', 'Argentina', NULL, NULL, NULL, 4, '2019-05-26 19:52:27', '2019-05-26 19:55:38', NULL),
(2, 'Inmobiliaria', 'Av Belgrano', 1370, 'Caba', '1093', 'Argentina', NULL, NULL, NULL, 4, '2019-05-26 21:18:02', '2019-05-26 21:18:02', NULL),
(3, 'Berexpress', 'Avenida Valentin Vergara  Esquina 14', NULL, 'Berazategui', '1884', 'Argentina', NULL, NULL, NULL, 4, '2019-05-26 22:26:56', '2019-05-26 22:26:56', NULL),
(4, 'Municipalidad de Berazategui', 'Calle 13', 131, 'Berazategui', '1892', 'Argentina', NULL, NULL, 'de 8 a 17 hs', 4, '2019-06-08 15:57:52', '2019-06-08 15:57:52', NULL),
(5, 'Casa', 'San Martin', 3456, 'Avellaneda', NULL, NULL, NULL, NULL, '24 hs', 16, '2019-06-08 16:15:37', '2019-06-08 16:15:37', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_05_26_134739_berexpress', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `move_tasks`
--

CREATE TABLE `move_tasks` (
  `id` int(11) NOT NULL,
  `consignement_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL COMMENT 'Cadete Asignado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `services_id` int(11) NOT NULL,
  `origin` int(11) NOT NULL,
  `destination` int(11) NOT NULL,
  `distance` double(10,2) DEFAULT NULL COMMENT 'distancia de originen a destino',
  `contact_name` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(100) DEFAULT NULL,
  `takes` time DEFAULT NULL,
  `rain` enum('Si','No') DEFAULT 'No',
  `bulk` int(10) DEFAULT '0',
  `priority` enum('Normal','Urgente') DEFAULT NULL,
  `observations` longtext,
  `subtotal` double(10,2) DEFAULT NULL COMMENT 'calculo de distancia en km * price',
  `status` enum('Creado','Asignado','En viaje a Origen','Retirado','En viaje a Destino','Entregado','Completado') NOT NULL DEFAULT 'Creado',
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `date`, `services_id`, `origin`, `destination`, `distance`, `contact_name`, `contact_phone`, `takes`, `rain`, `bulk`, `priority`, `observations`, `subtotal`, `status`, `users_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2019-05-26', 1, 3, 1, NULL, NULL, '01133245456', NULL, NULL, 1, NULL, NULL, NULL, 'Creado', 4, '2019-05-27 02:46:47', '2019-05-27 02:46:47', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` float(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `description`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PAGO', 0.99, NULL, NULL, NULL),
(2, 'COBRANZA', 0.99, NULL, NULL, NULL),
(3, 'DEPOSITO X VENTANILLA', 0.99, NULL, NULL, NULL),
(4, 'DEPOSITO X AUTOSERVICIO', 0.99, NULL, NULL, NULL),
(5, 'ENTREGA DE SOBRES CON ACUSE', 14.00, NULL, NULL, NULL),
(6, 'ENTREGA DE SOBRES SIN ACUSE', 18.00, NULL, NULL, NULL),
(7, 'RETIRO SOBRES', 4.00, NULL, NULL, NULL),
(8, 'LEGALIZACIONES O CERTIFICACIONES', 14.00, NULL, NULL, NULL),
(9, 'COMPRAS', 13.00, NULL, NULL, NULL),
(10, 'PATENTAMIENTOS (INGRESOS)', 9.00, NULL, NULL, NULL),
(11, 'PATENTAMIENTOS (RETIROS)', 13.00, NULL, NULL, NULL),
(12, 'CAMBIOS DE MERCADERIA', 14.00, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL COMMENT 'Password para ingresar al sistema.',
  `remember_token` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `number` int(10) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `role` enum('SuperUser','Administrador','Cadete','Cliente','Invitado') DEFAULT NULL,
  `image` varchar(500) DEFAULT 'default.jpg' COMMENT 'Imagen del usuario guardada en formato BASE64',
  `visibility` enum('Habilitado','Deshabilitado') DEFAULT NULL COMMENT '1: HABILITADO2: DESHABILITADO',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `address`, `number`, `state`, `phone`, `role`, `image`, `visibility`, `updated_at`, `created_at`, `deleted_at`) VALUES
(4, 'Jorge Oscar Gamez', 'jorgeoscargamez@gmail.com', '$2y$10$.2LvmSNRYdE1R0D39hq1zuD24M8BIz93FOz.17IZaQxp0WFyO.SKy', '75lZHdhag0S7MsW1Ono0dGaRau3IJRvYFY2Udcw2Lo9Ypm2aRmSbpenjC21F', NULL, NULL, NULL, NULL, 'Administrador', '1540259467.png', 'Habilitado', '2018-10-23 01:51:07', '2018-06-02 01:34:17', NULL),
(5, 'Antonella Resgiszewski', 'antoresg@gmail.com', '$2y$10$/xFdKVsUzbWzpr0VYVq4..5XNw2YAv5lb0qYEHJEDpH9KyfJQP6L2', 'XJ0xsRqLZ8XE4tPACAjpTQrtlirxpkr0G9KvGB9eS06CNNRso5S14Lrpdnxv', NULL, NULL, NULL, NULL, 'Administrador', 'https://scontent.faep13-1.fna.fbcdn.net/v/t31.0-8/10714508_773777939349562_924903737270818261_o.jpg?_nc_cat=0&oh=ff21dc3b44c0c3f11c7ab747237e0a16&oe=5B84466B', 'Habilitado', '2018-06-02 18:31:55', '2018-06-02 02:18:52', NULL),
(6, 'Gonzalo Leguizamon', 'gonzalouriel32@gmail.com', '$2y$10$V3EEKeTNZJy9PvJDCeCpV.akap.YWCVoKFePS642Itwjb7KuvNJES', 'VWEXOPAe2wfdzUXGVl3nLm6q76LNWBlH2P83mhaKHwnCX90cwdZMWBpdWt18', NULL, NULL, NULL, NULL, 'Administrador', 'https://scontent.faep13-1.fna.fbcdn.net/v/t31.0-8/20729155_10210222207007248_9194040084612685150_o.jpg?_nc_cat=0&oh=52cfa640283932cce30e731bfe092d7f&oe=5BB9BAF8', 'Habilitado', '2018-06-04 06:21:33', '2018-06-02 02:22:43', NULL),
(7, 'Ezequiel Mendez Alejandro', 'mendezalejandro.e@gmail.com', '$2y$10$PMiXxVtr3hvOC1YbetJXv.7sjsvlkAuXj11zag.iwIOEYo4Ui5Khe', 'zFNgtWoGf9rJt7jZzAex2eUOuufdieFj4rvfDRzjPfwZsucIPQniseCYFPhl', NULL, NULL, NULL, NULL, 'Administrador', 'https://media.licdn.com/dms/image/C4D03AQF5PLp7hEPW3w/profile-displayphoto-shrink_800_800/0?e=1533168000&v=beta&t=KON3Z-WYwa6zBWa6d3KjrUqjo8On8bB8VMOwsbPMLWo', 'Habilitado', '2018-06-02 18:34:32', '2018-06-02 02:52:40', NULL),
(8, 'Lilian Silva', 'silvalilian662@gmail.com', '$2y$10$.xnmF7C6AYz3r3xNVEOq.O9PdiXTILXNHkGclULPflMxW8C8SXivi', 'l9vcljtbkuHViuqyLNunjRMjJwjrrsXlCCfbsgDRuM6wxApWhF9r34wBIh1I', NULL, NULL, NULL, NULL, 'Administrador', 'https://media.licdn.com/dms/image/C4D03AQGCAmspiKR7PQ/profile-displayphoto-shrink_800_800/0?e=1533168000&v=beta&t=hfvV1rT0A6Ujn78g93nKr8eIyTPNsHBMVqLvV9tcIk0', 'Habilitado', '2018-06-02 19:02:46', '2018-06-02 18:27:28', NULL),
(9, 'Gabriel Navarro', 'gabriel.navarro@hotmail.es', '$2y$10$Kq27qEYv9d7YrQMwdh2E3eEtHZLnFSoIVra/oVWu/HCud35rbZT6O', 'sSkBfjZfzElyt7TgPVOBJOeeG3KuyUtctzZxdlxqw9Gq6FOQsvyvdDx45KNE', NULL, NULL, NULL, NULL, 'Administrador', 'https://scontent.faep13-1.fna.fbcdn.net/v/t1.0-9/17425138_1279102522155982_2619310394529241686_n.jpg?_nc_cat=0&oh=6dd6997dfc9cd2146a87289b47db287c&oe=5BC25750', 'Habilitado', '2018-06-04 06:44:27', '2018-06-02 19:18:33', NULL),
(10, 'Julian Cabral', 'julian_cabral1994@hotmail.com', '$2y$10$l6J1DzJ3NIbNVWt0Pya3L.47xYQ4Isoonyg.fQR4b.sC0xqaoMguK', 'IABW6sPUsqnFViGTgatOHDHg2m0TunkxAq671wuXhe7W2HIdFpQy2A9XTI39', NULL, NULL, NULL, NULL, 'Administrador', 'https://scontent.faep13-1.fna.fbcdn.net/v/t1.0-9/15390735_777487619075740_6322307867770270066_n.jpg?_nc_cat=0&oh=34c841df400ad420f826927a6fb76cd8&oe=5BBDDE56', 'Habilitado', '2018-06-04 06:52:26', '2018-06-02 20:45:56', NULL),
(11, 'Aldo Ariel Rodriguez', 'aldoarielro@gmail.com', '$2y$10$IK4nEcd0LkEOh0Q8ND/KLOp6u4IPZfPYMMB5SjYSJ17nlcp1sgN7O', 'shBJ4ddsUO1yO6BFMQtGGEERSD9wWn3OwWDD7wPyK60uv62zXE6BKetYNfwh', NULL, NULL, NULL, NULL, 'Cadete', 'https://scontent.faep13-1.fna.fbcdn.net/v/t31.0-8/29873166_552978335095518_7419653301981592115_o.jpg?_nc_cat=0&oh=a07e9df6a375f3fbebe9f18c7679e5cd&oe=5BB7F2B6', 'Deshabilitado', '2019-06-06 22:54:28', '2018-06-04 06:19:00', NULL),
(12, 'Marcelo Mansilla', 'marce_quilmes_27@hotmail.com', '$2y$10$JuxYKs2746N2oO8Tesu7kujrivcfDwZCQyW7kUSqA.owvDMfs74rW', 'lR4Q0glduiLLtabhmn3QMj4eHRqDYNm7amhTrACJZXlKvAk7MXNet7ECenf0', NULL, NULL, NULL, NULL, 'Administrador', 'https://scontent.faep13-1.fna.fbcdn.net/v/t1.0-9/17361943_1332959543416331_3319468999959301148_n.jpg?_nc_cat=0&oh=cbf25e1f12b6a2b257829db92c2c713c&oe=5BB94EEC', 'Habilitado', '2018-06-04 06:44:43', '2018-06-04 06:25:22', NULL),
(13, 'Leonardo Moreyra', 'leonardo.moreyara@gmail.com', '$2y$10$bLdI2.8aP3nDmZtoN3gtm.YfYLmp.2hXKjSCrn.qrqpTtgENnPp/C', 'fASwQA8R7zaM982agSGbS53fjSNniBE5vgZlmLiimJTTKGlNS67QR94YTa8i', NULL, NULL, NULL, NULL, 'Administrador', 'https://scontent.faep13-1.fna.fbcdn.net/v/t31.0-1/22791725_1611277168937213_8375350438908705103_o.jpg?_nc_cat=0&oh=30d5d57c784daf5d1e1022bbbd7bec23&oe=5B7BC265', 'Habilitado', '2018-06-04 06:44:35', '2018-06-04 06:43:51', NULL),
(14, 'Leonardo Garcia', 'garcialeonardogabriel@gmail.com', '$2y$10$AvYzFX.zW5g2rTNb7qjBcOqEod.1lPAyYf8RUYfs53z8L2eR31oYG', 'g2YDl4PpW9rwLbwXUUX9FCpmYxv5fyzdz7cHoNCKHnQhZUo4uB6HaxEmfCIy', NULL, NULL, NULL, NULL, 'Administrador', 'https://scontent.faep13-1.fna.fbcdn.net/v/t1.0-9/18620204_10209718185057632_5754075484567062905_n.jpg?_nc_cat=0&oh=c9de41a04136c6af2b325eb38c28685d&oe=5BBE7FE5', 'Habilitado', '2018-06-04 06:48:05', '2018-06-04 06:47:37', NULL),
(15, 'Leonel Cabado', 'leonelcabado7@gmail.com', '$2y$10$eROtuCRnVgQ/1aBcAIz6xOjKRJZdhTnUDBscxfte7Oawwp/De9jY.', 'tirf5C6rp4tljsaRos13x3tttYPCKv1ijUmBrg352krBUbatRScxadsMAqxQ', NULL, NULL, NULL, NULL, NULL, NULL, 'Habilitado', '2018-06-05 22:18:50', '2018-06-04 07:59:25', NULL),
(16, 'Test', 'test@test.com', '$2y$10$RZKOMJdN1rLD3AKuq8NKNeQ/GWE48XwEBs97v7mNise3zSFuSMziO', 'NicbVWo9gYr9bcmZKifc7Jl3h1vunaTzF6OaP0fcXjSidWLeHxUNHR5CZ62T', NULL, NULL, NULL, NULL, NULL, 'default.jpg', NULL, '2019-06-08 16:06:19', '2019-06-08 16:06:19', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consignements`
--
ALTER TABLE `consignements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `line04` (`line04`),
  ADD KEY `line05` (`line05`),
  ADD KEY `line01` (`line01`),
  ADD KEY `line02` (`line02`),
  ADD KEY `line03` (`line03`),
  ADD KEY `users_id` (`users_id`);

--
-- Indices de la tabla `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `move_tasks`
--
ALTER TABLE `move_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id` (`consignement_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_id` (`services_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `locations_id` (`origin`),
  ADD KEY `destination` (`destination`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pass_UNIQUE` (`password`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `move_tasks`
--
ALTER TABLE `move_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consignements`
--
ALTER TABLE `consignements`
  ADD CONSTRAINT `consignements_ibfk_11` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consignements_ibfk_12` FOREIGN KEY (`line01`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consignements_ibfk_13` FOREIGN KEY (`line02`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consignements_ibfk_14` FOREIGN KEY (`line03`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consignements_ibfk_15` FOREIGN KEY (`line04`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consignements_ibfk_16` FOREIGN KEY (`line05`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `move_tasks`
--
ALTER TABLE `move_tasks`
  ADD CONSTRAINT `move_tasks_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `move_tasks_ibfk_3` FOREIGN KEY (`consignement_id`) REFERENCES `consignements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`origin`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`destination`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
