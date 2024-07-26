-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2024 a las 02:24:57
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
-- Base de datos: `sistema_hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `informacion_adicional` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `tipo_cita_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `estado_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `paciente_id`, `doctor_id`, `tipo_cita_id`, `fecha`, `hora`, `estado`, `estado_id`) VALUES
(11, 2, 3, 2, '2024-07-17', '21:08:00', NULL, 2),
(12, 2, 3, 1, '2024-07-17', '21:36:00', NULL, 2),
(13, 2, 3, 1, '2024-07-17', '22:01:00', NULL, 2),
(15, 2, 7, 1, '2024-07-20', '09:36:00', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta_examenes`
--

CREATE TABLE `consulta_examenes` (
  `id` int(11) NOT NULL,
  `consulta_id` int(11) NOT NULL,
  `examen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta_examenes`
--

INSERT INTO `consulta_examenes` (`id`, `consulta_id`, `examen_id`) VALUES
(1, 6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `informacion_adicional` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_consulta`
--

CREATE TABLE `estado_consulta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_consulta`
--

INSERT INTO `estado_consulta` (`id`, `nombre`) VALUES
(1, 'pendiente de atender'),
(2, 'atendida'),
(3, 'cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes_medicos`
--

CREATE TABLE `examenes_medicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `examenes_medicos`
--

INSERT INTO `examenes_medicos` (`id`, `nombre`) VALUES
(1, 'Hemograma completo'),
(2, 'Análisis de orina'),
(3, 'Radiografía de tórax'),
(4, 'Electrocardiograma'),
(5, 'Ecografía abdominal'),
(6, 'Tomografía computarizada'),
(7, 'Resonancia magnética'),
(8, 'Prueba de función hepática'),
(9, 'Prueba de función renal'),
(10, 'Prueba de esfuerzo cardiovascular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_clinico`
--

CREATE TABLE `historial_clinico` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `diagnostico` varchar(255) DEFAULT NULL,
  `tratamiento` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `cita_id` int(11) NOT NULL,
  `motivo` varchar(500) NOT NULL,
  `medicinas` int(11) NOT NULL,
  `estado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_clinico`
--

INSERT INTO `historial_clinico` (`id`, `paciente_id`, `fecha`, `diagnostico`, `tratamiento`, `observaciones`, `doctor_id`, `cita_id`, `motivo`, `medicinas`, `estado_id`) VALUES
(5, 2, '2024-07-17', NULL, 'Ibuprofeno', 'Dolor de cabeza por golpe ', 3, 7, '1', 0, NULL),
(6, 2, '2024-07-17', NULL, 'Ibuprofeno ', 'Dollor en la cabeza por un golpe', 3, 8, '1', 0, NULL),
(7, 2, '2024-07-18', NULL, 'joder mas', 'Jode mucho ', 3, 9, '1', 0, NULL),
(8, 2, '2024-07-17', NULL, 'Pastas', 'Esto paso ', 3, 11, '11', 0, NULL),
(9, 2, '2024-07-17', NULL, 'tratamiento', 'paso esto', 3, 12, '3', 0, NULL),
(10, 2, '2024-07-17', NULL, 'Dolor', 'Dolor', 3, 13, '1', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicinas`
--

CREATE TABLE `medicinas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `disponibilidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicinas`
--

INSERT INTO `medicinas` (`id`, `nombre`, `disponibilidad`) VALUES
(1, 'Paracetamol', 50),
(2, 'Ibuprofeno', 100),
(3, 'Amoxicilina', 30),
(4, 'Metformina', 40),
(5, 'Aspirina', 80),
(6, 'Simvastatina', 60),
(7, 'Loratadina', 90),
(8, 'Omeprazol', 70),
(9, 'Losartan', 50),
(10, 'Metoprolol', 20),
(11, 'Enalapril', 35),
(12, 'Clonazepam', 25),
(13, 'Cetirizina', 60),
(14, 'Furosemida', 45),
(15, 'Salbutamol', 70),
(16, 'Ranitidina', 30),
(17, 'Dexametasona', 50),
(18, 'Diclofenaco', 65),
(19, 'Levotiroxina', 40),
(20, 'Bromazepam', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivos_consulta`
--

CREATE TABLE `motivos_consulta` (
  `id` int(11) NOT NULL,
  `motivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motivos_consulta`
--

INSERT INTO `motivos_consulta` (`id`, `motivo`) VALUES
(1, 'Dolor de cabeza'),
(2, 'Fiebre'),
(3, 'Dolor de estómago'),
(4, 'Tos'),
(5, 'Mareos'),
(6, 'Problemas respiratorios'),
(7, 'Dolor en el pecho'),
(8, 'Dolor de espalda'),
(9, 'Alergia'),
(10, 'Dolor de garganta'),
(11, 'Daño de estomago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `informacion_adicional` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'admin'),
(2, 'paciente'),
(3, 'doctor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_citas`
--

CREATE TABLE `tipos_citas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_citas`
--

INSERT INTO `tipos_citas` (`id`, `nombre`) VALUES
(1, 'Consulta General'),
(2, 'Especialidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `tipo_documento`, `numero_documento`, `correo_electronico`, `contrasena`, `rol_id`) VALUES
(1, 'Farley Piedrahita Orozco', 'CC', '1000534117', 'farley@gmail.com', '$2y$10$5Ezwovjz5VsqaYgQtClkPOzQ8etktlPcwZL6UQsHP9BNN71Y5aZqy', 1),
(2, 'Sara Yeraldine Osorio Quiceno', 'CC', '1000752184', 'sara@gmail.com', '$2y$10$aViFxKfOE1uKl9xugJUny..hvg5F6UifdnxucjaRApp7ThPBynakq', 2),
(3, 'Santiago Rojas Pinilla', 'CC', '43818278', 'santiagorojas@gmail.com', '$2y$10$psf0sd7wND2tA2CutC9jJ.5spnmx/yNdoVTVvuF6kNI3PYDHzgZ/a', 3),
(7, 'Daniela Torres Ramirez', 'C.C', '7127865', 'daniela@gmail.com', '$2y$10$gbqA9b5321Fvm5bvdBXFles7eql9oVD7T1bKASBG/ThTThVTYpMma', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_id` (`paciente_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `tipo_cita_id` (`tipo_cita_id`);

--
-- Indices de la tabla `consulta_examenes`
--
ALTER TABLE `consulta_examenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consulta_id` (`consulta_id`),
  ADD KEY `examen_id` (`examen_id`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `estado_consulta`
--
ALTER TABLE `estado_consulta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `examenes_medicos`
--
ALTER TABLE `examenes_medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_clinico`
--
ALTER TABLE `historial_clinico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_id` (`paciente_id`);

--
-- Indices de la tabla `medicinas`
--
ALTER TABLE `medicinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `motivos_consulta`
--
ALTER TABLE `motivos_consulta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_citas`
--
ALTER TABLE `tipos_citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `consulta_examenes`
--
ALTER TABLE `consulta_examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_consulta`
--
ALTER TABLE `estado_consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `examenes_medicos`
--
ALTER TABLE `examenes_medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `historial_clinico`
--
ALTER TABLE `historial_clinico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `medicinas`
--
ALTER TABLE `medicinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `motivos_consulta`
--
ALTER TABLE `motivos_consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipos_citas`
--
ALTER TABLE `tipos_citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`tipo_cita_id`) REFERENCES `tipos_citas` (`id`);

--
-- Filtros para la tabla `consulta_examenes`
--
ALTER TABLE `consulta_examenes`
  ADD CONSTRAINT `consulta_examenes_ibfk_1` FOREIGN KEY (`consulta_id`) REFERENCES `historial_clinico` (`id`),
  ADD CONSTRAINT `consulta_examenes_ibfk_2` FOREIGN KEY (`examen_id`) REFERENCES `examenes_medicos` (`id`);

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `historial_clinico`
--
ALTER TABLE `historial_clinico`
  ADD CONSTRAINT `historial_clinico_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
