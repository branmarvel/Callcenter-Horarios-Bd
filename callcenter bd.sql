-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2022 a las 22:27:41
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `callcenter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_reportes`
--

CREATE TABLE `area_reportes` (
  `idArea_Reportes` int(11) NOT NULL,
  `recomendaciones_supervisor` varchar(100) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `idConsultas_Denuncias` int(11) NOT NULL,
  `idEmpleados` int(11) NOT NULL,
  `idCargo_Empleado` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_horas_extras`
--

CREATE TABLE `asignacion_horas_extras` (
  `idAsignacion_Horas_Extras` int(11) NOT NULL,
  `asignacion` varchar(45) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `dia` varchar(45) NOT NULL,
  `idEmpleados` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignacion_horas_extras`
--

INSERT INTO `asignacion_horas_extras` (`idAsignacion_Horas_Extras`, `asignacion`, `motivo`, `dia`, `idEmpleados`, `idHorario`) VALUES
(46, '16:14', '', '2022-07-03T21:14:48', 11, 25),
(47, '15:17', '', '2022-07-03T21:14:54', 11, 25),
(48, '15:17', '', '2022-07-03T21:14:54', 11, 25),
(49, '15:17', '', '2022-07-03T21:14:54', 11, 25),
(51, '15:19', 'dasdasad', '2022-07-03T21:16:04', 13, 29),
(52, '2022-07-03T21:38:00', 'sd', '2022-07-03T21:38:00', 11, 25),
(53, '2022-07-03T21:38:00', 'sd', '2022-07-03T21:38:00', 11, 25),
(54, '2022-07-03T21:38:00', 'sd', '2022-07-03T21:38:00', 11, 25),
(55, '2022-07-03T21:38:00', 'sd', '2022-07-03T21:38:00', 11, 25),
(56, '2022-07-03T21:38:00', 'sd', '2022-07-03T21:38:00', 11, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_recomendacion`
--

CREATE TABLE `asignacion_recomendacion` (
  `idAsignacion_Recomendacion` int(11) NOT NULL,
  `idRecomendaciones` int(11) NOT NULL,
  `idDesempeño_Laboral` int(11) NOT NULL,
  `idDescripcion_Recomendacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `idAsistencia` int(11) NOT NULL,
  `QR_emplado` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `idEmpleados` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `idAsignacion_Horas_Extras` int(11) NOT NULL,
  `idTipo_Asistencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_empleado`
--

CREATE TABLE `cargo_empleado` (
  `idCargo_Empleado` int(11) NOT NULL,
  `tipo_cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo_empleado`
--

INSERT INTO `cargo_empleado` (`idCargo_Empleado`, `tipo_cargo`) VALUES
(1, 'Empleado'),
(2, 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL,
  `idConsultas_Denuncias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas_denuncias`
--

CREATE TABLE `consultas_denuncias` (
  `idConsultas_Denuncias` int(11) NOT NULL,
  `motivo_llamada` enum('...') NOT NULL,
  `detalle_llamada` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idEmpleados` int(11) NOT NULL,
  `idCargo_Empleado` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre_departamento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre_departamento`) VALUES
(1, 'Departamento 1'),
(2, 'Departamento 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_recomendacion`
--

CREATE TABLE `descripcion_recomendacion` (
  `idDescripcion_Recomendacion` int(11) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `Descripcion_Recomendacion` varchar(45) NOT NULL,
  `idRecomendaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desempeño_laboral`
--

CREATE TABLE `desempeño_laboral` (
  `idDesempeño_Laboral` int(11) NOT NULL,
  `idArea_Reportes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleados` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `cedula` int(20) NOT NULL,
  `fecha_ingreso` varchar(45) NOT NULL,
  `fecha_egreso` varchar(45) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `estado_laboral` varchar(45) NOT NULL,
  `idCargo_Empleado` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleados`, `nombre`, `apellido`, `cedula`, `fecha_ingreso`, `fecha_egreso`, `direccion`, `telefono`, `estado_laboral`, `idCargo_Empleado`, `idDepartamento`) VALUES
(11, 'Kaseem', 'Wallace', 2690971, 'Dec 22, 2022', 'Mar 29, 2023', '118-6099 Id, Rd.', '1-517-728-8977', 'est', 1, 1),
(12, 'Patrick', 'Turner', 24566464, 'Sep 21, 2021', 'Sep 30, 2022', 'Ap #117-3268 Eu Road', '1-784-810-7678', 'ipsum', 1, 1),
(13, 'Mark', 'Boyd', 6423289, 'Jun 24, 2022', 'Feb 25, 2022', '645-1636 In Rd.', '(628) 821-4238', 'porttitor', 2, 1),
(14, 'Elton', 'Mcclain', 17186272, 'Apr 24, 2022', 'Feb 3, 2022', '398-1990 Dui. Ave', '1-374-341-1342', 'sed', 2, 1),
(15, 'Cody', 'Williams', 2051085, 'Mar 24, 2023', 'Oct 28, 2022', '713-6461 Integer Rd.', '1-270-136-5142', 'quis,', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_horario`
--

CREATE TABLE `empleado_horario` (
  `idEmpleados` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `fecha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado_horario`
--

INSERT INTO `empleado_horario` (`idEmpleados`, `idHorario`, `fecha`) VALUES
(11, 25, '2022-06-24T22:37'),
(13, 29, '2022-07-07T11:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generador_respuestas_consultas`
--

CREATE TABLE `generador_respuestas_consultas` (
  `idGenerador_Respuestas_Consultas` int(11) NOT NULL,
  `repuesta_consulta` enum('...') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generador_soluciones_denuncias`
--

CREATE TABLE `generador_soluciones_denuncias` (
  `idGenerador_Soluciones_Denuncias` int(11) NOT NULL,
  `soluciones_denuncias` enum('...') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` int(20) NOT NULL,
  `hora_inicio` varchar(45) NOT NULL,
  `tiempo_descanso` varchar(45) NOT NULL,
  `hora_final` varchar(45) NOT NULL,
  `dia_libre_1` varchar(45) NOT NULL,
  `dia_libre_2` varchar(45) NOT NULL,
  `fecha_reg` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `hora_inicio`, `tiempo_descanso`, `hora_final`, `dia_libre_1`, `dia_libre_2`, `fecha_reg`) VALUES
(25, '17:50', '16:51', '16:53', 'Lunes', 'Martes', '2022-06-23T16:50'),
(29, '19:53', '19:53', '18:56', 'Martes', 'Miercoles', '2022-06-17T18:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitoreo_asistencia`
--

CREATE TABLE `monitoreo_asistencia` (
  `idAsistencia` int(11) NOT NULL,
  `idEmpleados` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `idAsignacion_Horas_Extras` int(11) NOT NULL,
  `idVacaciones` int(11) NOT NULL,
  `idReposos` int(11) NOT NULL,
  `idPermisos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `periodo` datetime NOT NULL,
  `cantidad_asistencias` int(11) NOT NULL,
  `cantidad_inasistencias` int(11) NOT NULL,
  `horas_trabajadas` time NOT NULL,
  `horas_extras_trabajadas` time NOT NULL,
  `observaciones_(retardos)` varchar(45) NOT NULL,
  `sanciones` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitoreo_atencion_cliente`
--

CREATE TABLE `monitoreo_atencion_cliente` (
  `idConsultas_Denuncias` int(11) NOT NULL,
  `Cantidad_llamadas_mismo_cliente` int(11) NOT NULL,
  `Grabaciones` varchar(100) NOT NULL,
  `idRespuesta_Soluciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo`
--

CREATE TABLE `motivo` (
  `idMotivo` int(11) NOT NULL,
  `descrpcion` varchar(100) NOT NULL,
  `idReposos` int(11) NOT NULL,
  `idPermisos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idPermisos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_reintegro` date NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `cantidad_dias` int(11) NOT NULL,
  `idEmpleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendaciones`
--

CREATE TABLE `recomendaciones` (
  `idRecomendaciones` int(11) NOT NULL,
  `Recomendacion` varchar(45) NOT NULL,
  `idDesempeño_Laboral` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reposos`
--

CREATE TABLE `reposos` (
  `idReposos` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_reintegro` date NOT NULL,
  `medico` varchar(45) NOT NULL,
  `centro` varchar(45) NOT NULL,
  `tiempo_invalidez` time NOT NULL,
  `diagnostico` varchar(45) NOT NULL,
  `idEmpleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_soluciones`
--

CREATE TABLE `respuesta_soluciones` (
  `idRespuesta_Soluciones` int(11) NOT NULL,
  `consulta_a_responder` varchar(45) NOT NULL,
  `denuncia_a_solucionar` varchar(45) NOT NULL,
  `estatus_final_cliente` enum('...') NOT NULL,
  `idConsultas_Denuncias` int(11) NOT NULL,
  `idGenerador_Soluciones_Denuncias` int(11) NOT NULL,
  `idGenerador_Respuestas_Consultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas_intermedias`
--

CREATE TABLE `salidas_intermedias` (
  `idSalidas_Intermedias` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idAsistencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_asistencia`
--

CREATE TABLE `tipo_asistencia` (
  `idTipo_Asistencia` int(11) NOT NULL,
  `Asistencia_QR` varchar(45) NOT NULL,
  `Asistencia_Extraordinaria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE `vacaciones` (
  `idVacaciones` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_reintegro` date NOT NULL,
  `periodo_vacacional` enum('...') NOT NULL,
  `idEmpleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area_reportes`
--
ALTER TABLE `area_reportes`
  ADD PRIMARY KEY (`idArea_Reportes`,`idConsultas_Denuncias`,`idEmpleados`,`idCargo_Empleado`,`idDepartamento`),
  ADD KEY `fk_Area_Reportes_Consultas_Denuncias1_idx` (`idConsultas_Denuncias`,`idEmpleados`,`idCargo_Empleado`,`idDepartamento`);

--
-- Indices de la tabla `asignacion_horas_extras`
--
ALTER TABLE `asignacion_horas_extras`
  ADD PRIMARY KEY (`idAsignacion_Horas_Extras`,`idEmpleados`,`idHorario`),
  ADD KEY `fk_Asignacion_Horas_Extras_Empleado_Horario1_idx` (`idEmpleados`,`idHorario`);

--
-- Indices de la tabla `asignacion_recomendacion`
--
ALTER TABLE `asignacion_recomendacion`
  ADD PRIMARY KEY (`idAsignacion_Recomendacion`,`idRecomendaciones`,`idDesempeño_Laboral`,`idDescripcion_Recomendacion`),
  ADD KEY `fk_Asignacion_Recomendacion_Recomendaciones1_idx` (`idRecomendaciones`,`idDesempeño_Laboral`),
  ADD KEY `fk_Asignacion_Recomendacion_Descripcion_Recomendacion1_idx` (`idDescripcion_Recomendacion`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idAsistencia`,`idEmpleados`,`idHorario`,`idAsignacion_Horas_Extras`,`idTipo_Asistencia`),
  ADD KEY `fk_Asistencia_Empleado_Horario1_idx` (`idEmpleados`,`idHorario`),
  ADD KEY `fk_Asistencia_Asignacion_Horas_Extras1_idx` (`idAsignacion_Horas_Extras`),
  ADD KEY `fk_Asistencia_Tipo_Asistencia1_idx` (`idTipo_Asistencia`);

--
-- Indices de la tabla `cargo_empleado`
--
ALTER TABLE `cargo_empleado`
  ADD PRIMARY KEY (`idCargo_Empleado`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`,`idConsultas_Denuncias`),
  ADD KEY `fk_Cliente_Consultas_Denuncias1_idx` (`idConsultas_Denuncias`);

--
-- Indices de la tabla `consultas_denuncias`
--
ALTER TABLE `consultas_denuncias`
  ADD PRIMARY KEY (`idConsultas_Denuncias`,`idEmpleados`,`idCargo_Empleado`,`idDepartamento`),
  ADD KEY `fk_Consultas_Denuncias_Empleados1_idx` (`idEmpleados`,`idCargo_Empleado`,`idDepartamento`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `descripcion_recomendacion`
--
ALTER TABLE `descripcion_recomendacion`
  ADD PRIMARY KEY (`idDescripcion_Recomendacion`,`idRecomendaciones`),
  ADD KEY `fk_Descripcion_Recomendacion_Recomendaciones1_idx` (`idRecomendaciones`);

--
-- Indices de la tabla `desempeño_laboral`
--
ALTER TABLE `desempeño_laboral`
  ADD PRIMARY KEY (`idDesempeño_Laboral`,`idArea_Reportes`),
  ADD KEY `fk_Desempeño_Laboral_Area_Reportes1_idx` (`idArea_Reportes`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleados`,`idCargo_Empleado`,`idDepartamento`),
  ADD UNIQUE KEY `cedula_UNIQUE` (`cedula`),
  ADD KEY `fk_Empleados_Cargo_Empleado_idx` (`idCargo_Empleado`),
  ADD KEY `fk_Empleados_Departamento1_idx` (`idDepartamento`);

--
-- Indices de la tabla `empleado_horario`
--
ALTER TABLE `empleado_horario`
  ADD PRIMARY KEY (`idEmpleados`,`idHorario`),
  ADD KEY `fk_Empleado_Horario_Horario1_idx` (`idHorario`);

--
-- Indices de la tabla `generador_respuestas_consultas`
--
ALTER TABLE `generador_respuestas_consultas`
  ADD PRIMARY KEY (`idGenerador_Respuestas_Consultas`);

--
-- Indices de la tabla `generador_soluciones_denuncias`
--
ALTER TABLE `generador_soluciones_denuncias`
  ADD PRIMARY KEY (`idGenerador_Soluciones_Denuncias`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `monitoreo_asistencia`
--
ALTER TABLE `monitoreo_asistencia`
  ADD PRIMARY KEY (`idAsistencia`,`idEmpleados`,`idHorario`,`idAsignacion_Horas_Extras`,`idVacaciones`,`idReposos`,`idPermisos`),
  ADD KEY `fk_Monitoreo_Asistencia_Asistencia1_idx` (`idAsistencia`,`idEmpleados`,`idHorario`,`idAsignacion_Horas_Extras`),
  ADD KEY `fk_Monitoreo_Asistencia_Vacaciones1_idx` (`idVacaciones`),
  ADD KEY `fk_Monitoreo_Asistencia_Reposos1_idx` (`idReposos`),
  ADD KEY `fk_Monitoreo_Asistencia_Permisos1_idx` (`idPermisos`);

--
-- Indices de la tabla `monitoreo_atencion_cliente`
--
ALTER TABLE `monitoreo_atencion_cliente`
  ADD PRIMARY KEY (`idConsultas_Denuncias`,`idRespuesta_Soluciones`),
  ADD KEY `fk_Monitoreo_Atencion_Cliente_Consultas_Denuncias1_idx` (`idConsultas_Denuncias`),
  ADD KEY `fk_Monitoreo_Atencion_Cliente_Respuesta_Soluciones1_idx` (`idRespuesta_Soluciones`);

--
-- Indices de la tabla `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`idMotivo`,`idReposos`,`idPermisos`),
  ADD KEY `fk_Motivo_Reposos1_idx` (`idReposos`),
  ADD KEY `fk_Motivo_Permisos1_idx` (`idPermisos`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idPermisos`,`idEmpleados`),
  ADD KEY `fk_Permisos_Empleados1_idx` (`idEmpleados`);

--
-- Indices de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD PRIMARY KEY (`idRecomendaciones`,`idDesempeño_Laboral`),
  ADD KEY `fk_Recomendaciones_Desempeño_Laboral1_idx` (`idDesempeño_Laboral`);

--
-- Indices de la tabla `reposos`
--
ALTER TABLE `reposos`
  ADD PRIMARY KEY (`idReposos`,`idEmpleados`),
  ADD KEY `fk_Reposos_Empleados1_idx` (`idEmpleados`);

--
-- Indices de la tabla `respuesta_soluciones`
--
ALTER TABLE `respuesta_soluciones`
  ADD PRIMARY KEY (`idRespuesta_Soluciones`,`idConsultas_Denuncias`,`idGenerador_Soluciones_Denuncias`,`idGenerador_Respuestas_Consultas`),
  ADD KEY `fk_Respuesta_Soluciones_Consultas_Denuncias1_idx` (`idConsultas_Denuncias`),
  ADD KEY `fk_Respuesta_Soluciones_Generador_Soluciones_Denuncias1_idx` (`idGenerador_Soluciones_Denuncias`),
  ADD KEY `fk_Respuesta_Soluciones_Generador_Respuestas_Consultas1_idx` (`idGenerador_Respuestas_Consultas`);

--
-- Indices de la tabla `salidas_intermedias`
--
ALTER TABLE `salidas_intermedias`
  ADD PRIMARY KEY (`idSalidas_Intermedias`,`idAsistencia`),
  ADD KEY `fk_Salidas_Intermedias_Asistencia1_idx` (`idAsistencia`);

--
-- Indices de la tabla `tipo_asistencia`
--
ALTER TABLE `tipo_asistencia`
  ADD PRIMARY KEY (`idTipo_Asistencia`);

--
-- Indices de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD PRIMARY KEY (`idVacaciones`,`idEmpleados`),
  ADD KEY `fk_Vacaciones_Empleados1_idx` (`idEmpleados`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area_reportes`
--
ALTER TABLE `area_reportes`
  MODIFY `idArea_Reportes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignacion_horas_extras`
--
ALTER TABLE `asignacion_horas_extras`
  MODIFY `idAsignacion_Horas_Extras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `asignacion_recomendacion`
--
ALTER TABLE `asignacion_recomendacion`
  MODIFY `idAsignacion_Recomendacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `idAsistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo_empleado`
--
ALTER TABLE `cargo_empleado`
  MODIFY `idCargo_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consultas_denuncias`
--
ALTER TABLE `consultas_denuncias`
  MODIFY `idConsultas_Denuncias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `descripcion_recomendacion`
--
ALTER TABLE `descripcion_recomendacion`
  MODIFY `idDescripcion_Recomendacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `desempeño_laboral`
--
ALTER TABLE `desempeño_laboral`
  MODIFY `idDesempeño_Laboral` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `generador_respuestas_consultas`
--
ALTER TABLE `generador_respuestas_consultas`
  MODIFY `idGenerador_Respuestas_Consultas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generador_soluciones_denuncias`
--
ALTER TABLE `generador_soluciones_denuncias`
  MODIFY `idGenerador_Soluciones_Denuncias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHorario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `motivo`
  MODIFY `idMotivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idPermisos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  MODIFY `idRecomendaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reposos`
--
ALTER TABLE `reposos`
  MODIFY `idReposos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuesta_soluciones`
--
ALTER TABLE `respuesta_soluciones`
  MODIFY `idRespuesta_Soluciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salidas_intermedias`
--
ALTER TABLE `salidas_intermedias`
  MODIFY `idSalidas_Intermedias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_asistencia`
--
ALTER TABLE `tipo_asistencia`
  MODIFY `idTipo_Asistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  MODIFY `idVacaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area_reportes`
--
ALTER TABLE `area_reportes`
  ADD CONSTRAINT `fk_Area_Reportes_Consultas_Denuncias1` FOREIGN KEY (`idConsultas_Denuncias`,`idEmpleados`,`idCargo_Empleado`,`idDepartamento`) REFERENCES `consultas_denuncias` (`idConsultas_Denuncias`, `idEmpleados`, `idCargo_Empleado`, `idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignacion_horas_extras`
--
ALTER TABLE `asignacion_horas_extras`
  ADD CONSTRAINT `fk_Asignacion_Horas_Extras_Empleado_Horario1` FOREIGN KEY (`idEmpleados`,`idHorario`) REFERENCES `empleado_horario` (`idEmpleados`, `idHorario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignacion_recomendacion`
--
ALTER TABLE `asignacion_recomendacion`
  ADD CONSTRAINT `fk_Asignacion_Recomendacion_Descripcion_Recomendacion1` FOREIGN KEY (`idDescripcion_Recomendacion`) REFERENCES `descripcion_recomendacion` (`idDescripcion_Recomendacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Asignacion_Recomendacion_Recomendaciones1` FOREIGN KEY (`idRecomendaciones`,`idDesempeño_Laboral`) REFERENCES `recomendaciones` (`idRecomendaciones`, `idDesempeño_Laboral`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_Asistencia_Asignacion_Horas_Extras1` FOREIGN KEY (`idAsignacion_Horas_Extras`) REFERENCES `asignacion_horas_extras` (`idAsignacion_Horas_Extras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Asistencia_Empleado_Horario1` FOREIGN KEY (`idEmpleados`,`idHorario`) REFERENCES `empleado_horario` (`idEmpleados`, `idHorario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Asistencia_Tipo_Asistencia1` FOREIGN KEY (`idTipo_Asistencia`) REFERENCES `tipo_asistencia` (`idTipo_Asistencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_Cliente_Consultas_Denuncias1` FOREIGN KEY (`idConsultas_Denuncias`) REFERENCES `consultas_denuncias` (`idConsultas_Denuncias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `consultas_denuncias`
--
ALTER TABLE `consultas_denuncias`
  ADD CONSTRAINT `fk_Consultas_Denuncias_Empleados1` FOREIGN KEY (`idEmpleados`,`idCargo_Empleado`,`idDepartamento`) REFERENCES `empleados` (`idEmpleados`, `idCargo_Empleado`, `idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `descripcion_recomendacion`
--
ALTER TABLE `descripcion_recomendacion`
  ADD CONSTRAINT `fk_Descripcion_Recomendacion_Recomendaciones1` FOREIGN KEY (`idRecomendaciones`) REFERENCES `recomendaciones` (`idRecomendaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `desempeño_laboral`
--
ALTER TABLE `desempeño_laboral`
  ADD CONSTRAINT `fk_Desempeño_Laboral_Area_Reportes1` FOREIGN KEY (`idArea_Reportes`) REFERENCES `area_reportes` (`idArea_Reportes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_Empleados_Cargo_Empleado` FOREIGN KEY (`idCargo_Empleado`) REFERENCES `cargo_empleado` (`idCargo_Empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleados_Departamento1` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado_horario`
--
ALTER TABLE `empleado_horario`
  ADD CONSTRAINT `fk_Empleado_Horario_Empleados1` FOREIGN KEY (`idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empleado_Horario_Horario1` FOREIGN KEY (`idHorario`) REFERENCES `horario` (`idHorario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `monitoreo_asistencia`
--
ALTER TABLE `monitoreo_asistencia`
  ADD CONSTRAINT `fk_Monitoreo_Asistencia_Asistencia1` FOREIGN KEY (`idAsistencia`,`idEmpleados`,`idHorario`,`idAsignacion_Horas_Extras`) REFERENCES `asistencia` (`idAsistencia`, `idEmpleados`, `idHorario`, `idAsignacion_Horas_Extras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Monitoreo_Asistencia_Permisos1` FOREIGN KEY (`idPermisos`) REFERENCES `permisos` (`idPermisos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Monitoreo_Asistencia_Reposos1` FOREIGN KEY (`idReposos`) REFERENCES `reposos` (`idReposos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Monitoreo_Asistencia_Vacaciones1` FOREIGN KEY (`idVacaciones`) REFERENCES `vacaciones` (`idVacaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `monitoreo_atencion_cliente`
--
ALTER TABLE `monitoreo_atencion_cliente`
  ADD CONSTRAINT `fk_Monitoreo_Atencion_Cliente_Consultas_Denuncias1` FOREIGN KEY (`idConsultas_Denuncias`) REFERENCES `consultas_denuncias` (`idConsultas_Denuncias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Monitoreo_Atencion_Cliente_Respuesta_Soluciones1` FOREIGN KEY (`idRespuesta_Soluciones`) REFERENCES `respuesta_soluciones` (`idRespuesta_Soluciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `motivo`
--
ALTER TABLE `motivo`
  ADD CONSTRAINT `fk_Motivo_Permisos1` FOREIGN KEY (`idPermisos`) REFERENCES `permisos` (`idPermisos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Motivo_Reposos1` FOREIGN KEY (`idReposos`) REFERENCES `reposos` (`idReposos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_Permisos_Empleados1` FOREIGN KEY (`idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD CONSTRAINT `fk_Recomendaciones_Desempeño_Laboral1` FOREIGN KEY (`idDesempeño_Laboral`) REFERENCES `desempeño_laboral` (`idDesempeño_Laboral`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reposos`
--
ALTER TABLE `reposos`
  ADD CONSTRAINT `fk_Reposos_Empleados1` FOREIGN KEY (`idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta_soluciones`
--
ALTER TABLE `respuesta_soluciones`
  ADD CONSTRAINT `fk_Respuesta_Soluciones_Consultas_Denuncias1` FOREIGN KEY (`idConsultas_Denuncias`) REFERENCES `consultas_denuncias` (`idConsultas_Denuncias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Respuesta_Soluciones_Generador_Respuestas_Consultas1` FOREIGN KEY (`idGenerador_Respuestas_Consultas`) REFERENCES `generador_respuestas_consultas` (`idGenerador_Respuestas_Consultas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Respuesta_Soluciones_Generador_Soluciones_Denuncias1` FOREIGN KEY (`idGenerador_Soluciones_Denuncias`) REFERENCES `generador_soluciones_denuncias` (`idGenerador_Soluciones_Denuncias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salidas_intermedias`
--
ALTER TABLE `salidas_intermedias`
  ADD CONSTRAINT `fk_Salidas_Intermedias_Asistencia1` FOREIGN KEY (`idAsistencia`) REFERENCES `asistencia` (`idAsistencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD CONSTRAINT `fk_Vacaciones_Empleados1` FOREIGN KEY (`idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
