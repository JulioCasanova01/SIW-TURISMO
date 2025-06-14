-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2025 a las 18:08:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_siw_turismo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion_clientes`
--

CREATE TABLE `atencion_clientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` enum('PE','RE') DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `telefono` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `atencion_clientes`
--

INSERT INTO `atencion_clientes` (`id`, `nombre`, `mensaje`, `fecha`, `estado`, `correo`, `telefono`) VALUES
(3, 'Julio Andrés ', 'DFKNVNÑ SDKFH V KEFHBVPJHEBFIVHBERF IPEHFBVUHFBVIBF´PVI FIVHBIERBFVPIDHFBP0IUGYB RIPBG0RTPIWRBY', '2025-06-14 13:34:33', 'PE', 'julio@gmail.com', 3102366157),
(4, 'Juan Manuel', 'Hola mundo', '2025-06-07 20:37:37', 'RE', 'JuanManuelSena@gmail.com', 3227097033),
(22, 'Julio Andrés ', 'Este es un mensaje de prueba', '2025-06-07 19:40:59', 'PE', 'juan@gmail.com', 3227097033),
(23, 'Julio Andrés ', 'Mensaje de prueba', '2025-06-11 16:24:27', 'RE', 'julio@gmail.com', 3102366157);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Paquetes Turísticos', 'Un paquete turístico es un servicio turístico que combina varios elementos o servicios en una sola oferta, diseñada para facilitar la organización y experiencia del viaje para el turista. Estos paquetes suelen incluir transporte, alojamiento, comidas, excursiones, y a veces actividades especiales o entradas a atracciones.'),
(2, 'Planes Individuales', 'Los planes individuales son opciones de viaje o servicios turísticos diseñados para un solo viajero, que buscan ofrecer una experiencia personalizada y flexible. A diferencia de los paquetes turísticos grupales, estos planes se adaptan a las necesidades, gustos y tiempos particulares de una persona.'),
(3, 'Tours Guiados', 'Los tours guiados son recorridos turísticos organizados y dirigidos por un guía experto que acompaña a un grupo o a viajeros individuales para mostrarles un destino, monumentos, atractivos naturales o culturales, brindando información, historia y datos relevantes durante la experiencia.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `tipo_documento` enum('CC','TI','RC','PASAPORTE','CE') DEFAULT NULL,
  `numero_documento` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `correo` varchar(150) NOT NULL,
  `contacto_1` varchar(15) DEFAULT NULL,
  `contacto_2` varchar(15) DEFAULT NULL,
  `clave` varchar(100) NOT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `tipo_documento`, `numero_documento`, `fecha_registro`, `fecha_nacimiento`, `correo`, `contacto_1`, `contacto_2`, `clave`, `direccion`) VALUES
(15, 'Julio Andrés ', 'TI', 1075252762, '2025-05-26 04:24:21', '2009-05-01', 'julio@gmail.com', '3102366157', '3208653588', '$2y$10$EO.zWhcbY.V.2Ac2QmvE/OKEzQp0uXC9quCJqDESDmGajBg0AWz6C', 'Teruel, Cra 3E #5-13'),
(18, 'Juan Esteban', 'TI', 1084923574, '2025-05-25 23:53:04', '2008-08-16', 'juan@gmail.com', '3123456789', '32123456789', '$2y$10$CSU4/MBvhNtk7peVOcNMHOYjaOD0eNSATY2P5so8ePreXiCnSBt0K', 'Teruel, Cra 1 #4E-30'),
(19, 'Vrenda Galindo', 'TI', 1084923524, '2025-05-27 01:58:57', '2008-10-17', 'vrenda@gmail.com', '3213456789', '', '$2y$10$2ZmzeEgmMU3SLEL78jPweez7jUDg1jKXCWA.OO2UKANorT9tr4hGq', 'Cra 4 #3-01'),
(20, 'juan', 'TI', 21988982, '2025-06-04 20:42:44', '2001-02-23', 'juacho@silva.com', '310236623', '', '$2y$10$Ns/JcV1vHbUYNdspAMl5wOQwNNJDqI1lMTVKCVTS/UzjqKYOrryui', 'Teruel, Cra 1 #4E-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `nombre`, `imagen`, `descripcion`, `precio`) VALUES
(1, 1, 'CARTAGENA', '684d9631a1aeb-ejecafetero.jpg', '12344556 erjbjgbihbihbihb i ihbiibh  i  h  i vihr virwbwribgirbtbh tb wru btuh 0rub wr0ubh 0uwr tuwt u', 15000000),
(2, 2, 'Santa Marta', '684d9639399ba-gif.gif', 'jerginr wr  iw rit iwrtught tg ewjnfgiw rigtirh gti ri tbihr ibribir brbi ir bi wri bi rhb r irntiugnri rigtirungtr th riwtnig hiruginr ', 5000000),
(7, 2, 'nuevo', '684d965a83b54-playa.jpeg', 'djfmk9', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `correo` varchar(150) NOT NULL,
  `rol` enum('ADMIN','AGENTE','ATENCION_CLIENTE') NOT NULL,
  `contacto_1` varchar(15) NOT NULL,
  `contacto_2` varchar(15) DEFAULT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `rol`, `contacto_1`, `contacto_2`, `clave`) VALUES
(3, 'Juan Cerquera', 'juan@gmail.com', 'ADMIN', '312345662', '3213456789', '$2y$10$nIrnWA4SllFnKRyr3.umNOlgGpEDvh/hjrKHajt58ZgObhfb/OW/q'),
(5, 'Julio Andrés ', 'julio@gmail.com', 'ADMIN', '320658535', '3125849964', '$2y$10$xIXKjfc7u.vNDtJ2N5z1NeRH2TFCs1VbkgQakNtUrpcm.0h.4PViW'),
(6, 'Vrenda Galindo', 'vrenda@gmail.com', 'ATENCION_CLIENTE', '3125854562', '31023447895', '$2y$10$AdUSxJ8uqI5D76Lc2zfdk.atjehfJkv9kvHGN5OT/QNQj1NKAenjC'),
(14, '', '', 'ADMIN', '', '', '$2y$10$MjCsz1eZXPgXRPcewKnNluShN4dJXUgRYRuSKOzzSw3exuaQJ9qYW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(11) NOT NULL,
  `codigo` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_orden` enum('solicitado','atendido','entregado','rechazado') DEFAULT NULL,
  `tipo_venta` enum('local','online') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_productos`
--

CREATE TABLE `ventas_productos` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajeros`
--

CREATE TABLE `viajeros` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `tipo_de_documento` enum('CC','TI','RC','PASAPORTE','CE') NOT NULL,
  `numero_de_documento` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_nacimiento` date DEFAULT NULL,
  `contacto_1` varchar(15) DEFAULT NULL,
  `contacto_2` varchar(15) DEFAULT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajeros`
--

INSERT INTO `viajeros` (`id`, `nombre`, `tipo_de_documento`, `numero_de_documento`, `fecha_registro`, `fecha_nacimiento`, `contacto_1`, `contacto_2`, `direccion`) VALUES
(3, 'Julio Andrés ', 'CC', 1075252762, '2025-06-04 21:55:34', '2009-05-01', '3102366157', '3208653588', 'Teruel, Cra 3E #5-13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atencion_clientes`
--
ALTER TABLE `atencion_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`) USING HASH;

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `ventas_productos`
--
ALTER TABLE `ventas_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`,`id_venta`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `viajeros`
--
ALTER TABLE `viajeros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atencion_clientes`
--
ALTER TABLE `atencion_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas_productos`
--
ALTER TABLE `ventas_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `viajeros`
--
ALTER TABLE `viajeros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas_productos`
--
ALTER TABLE `ventas_productos`
  ADD CONSTRAINT `ventas_productos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_productos_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
