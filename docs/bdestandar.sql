-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2023 a las 21:35:43
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdestandar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casas`
--

CREATE TABLE `casas` (
  `id_casas` int(11) NOT NULL,
  `cas_descripcion` varchar(255) DEFAULT NULL,
  `cas_direccion` varchar(255) DEFAULT NULL,
  `casa12` varchar(255) DEFAULT NULL,
  `casa13` varchar(255) DEFAULT NULL,
  `casa14` varchar(255) DEFAULT NULL,
  `casa15` varchar(255) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `cas_est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `casas`
--

INSERT INTO `casas` (`id_casas`, `cas_descripcion`, `cas_direccion`, `casa12`, `casa13`, `casa14`, `casa15`, `id_cliente`, `cas_est`) VALUES
(1, 'CASA 01', 'Cesar Vallejo II', 'Ultimo paradero de Urbanitos', '', '', '', 1, 1),
(2, 'CASA 02', 'San Juan de Lurigancho', 'Estacion de Tren', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientesv1`
--

CREATE TABLE `clientesv1` (
  `cli_id` int(11) NOT NULL,
  `cli_fono` varchar(255) DEFAULT NULL,
  `cli_nombre` varchar(255) NOT NULL,
  `cli_apellido` varchar(255) DEFAULT NULL,
  `cli_fb` varchar(255) DEFAULT NULL,
  `cli_sexo` varchar(20) DEFAULT NULL,
  `cli_correo` varchar(255) DEFAULT NULL,
  `cli_dni` varchar(20) DEFAULT NULL,
  `cli_linkGooContac` varchar(255) DEFAULT NULL,
  `cli_linkGooFotoAparatos` varchar(255) DEFAULT NULL,
  `cli_direccion` varchar(255) DEFAULT NULL,
  `cliente12` varchar(255) DEFAULT NULL,
  `cliente13` varchar(255) DEFAULT NULL,
  `cliente14` varchar(255) DEFAULT NULL,
  `cliente15` varchar(255) DEFAULT NULL,
  `cliente16` varchar(255) DEFAULT NULL,
  `cliente17` varchar(255) DEFAULT NULL,
  `cliente18` varchar(255) DEFAULT NULL,
  `cliente19` varchar(255) DEFAULT NULL,
  `cliente20` varchar(255) DEFAULT NULL,
  `cli_est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientesv1`
--

INSERT INTO `clientesv1` (`cli_id`, `cli_fono`, `cli_nombre`, `cli_apellido`, `cli_fb`, `cli_sexo`, `cli_correo`, `cli_dni`, `cli_linkGooContac`, `cli_linkGooFotoAparatos`, `cli_direccion`, `cliente12`, `cliente13`, `cliente14`, `cliente15`, `cliente16`, `cliente17`, `cliente18`, `cliente19`, `cliente20`, `cli_est`) VALUES
(1, '928393730', 'Luis Angel', 'Salgueron Prado', 'Luis Angel SP', 'Masculino', 'salgueronprado18@gmail.com', '73808069', 'www.gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, '956', 'patricio', 'pato', 'aa', '', 'pato@gmail.com', '89567256', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(3, '859676255', 'maria', 'alarcon', 'aaa', 'Femenino', 'maria18@gmail.com', '59687456', '', '', '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id_contrato` int(11) NOT NULL,
  `contr_descripcion` varchar(255) DEFAULT NULL,
  `id_titular` int(11) DEFAULT NULL,
  `contr_tip_conexion` varchar(100) DEFAULT NULL,
  `contr_fech` date DEFAULT NULL,
  `contr_tarifa` decimal(8,2) DEFAULT NULL,
  `contr_fech_Inst` date DEFAULT NULL,
  `mapaCoordenadasUbicacion` varchar(255) DEFAULT NULL,
  `contr_direccion` varchar(255) DEFAULT NULL,
  `contrato14` varchar(255) DEFAULT NULL,
  `contrato15` varchar(255) DEFAULT NULL,
  `contrato16` varchar(255) DEFAULT NULL,
  `contrato17` varchar(255) DEFAULT NULL,
  `contrato18` varchar(255) DEFAULT NULL,
  `contrato19` varchar(255) DEFAULT NULL,
  `contrato20` varchar(255) DEFAULT NULL,
  `contr_est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decos`
--

CREATE TABLE `decos` (
  `id_deco` int(11) NOT NULL,
  `dec_descripcion` varchar(100) DEFAULT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  `dec_cas_id` varchar(100) DEFAULT NULL,
  `dec_proveedor` varchar(100) DEFAULT NULL,
  `dec_rayado` varchar(255) DEFAULT NULL,
  `dec_marca` varchar(100) DEFAULT NULL,
  `dec_modelo` varchar(100) DEFAULT NULL,
  `dec_serie` varchar(100) DEFAULT NULL,
  `deco_rout_nota` varchar(255) DEFAULT NULL,
  `deco_linkGooFotoAparatos` varchar(255) DEFAULT NULL,
  `datos_rescatados` varchar(255) DEFAULT NULL,
  `deco14` varchar(255) DEFAULT NULL,
  `deco15` varchar(255) DEFAULT NULL,
  `deco16` varchar(255) DEFAULT NULL,
  `deco17` varchar(255) DEFAULT NULL,
  `deco18` varchar(255) DEFAULT NULL,
  `deco19` varchar(255) DEFAULT NULL,
  `deco20` varchar(255) DEFAULT NULL,
  `dec_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modems`
--

CREATE TABLE `modems` (
  `id_modem` int(11) NOT NULL,
  `mod_descripcion` varchar(255) DEFAULT NULL,
  `mod_imagen` text DEFAULT NULL,
  `mod_codigo_acceso` varchar(100) DEFAULT NULL,
  `mod_marca` varchar(100) DEFAULT NULL,
  `mod_modelo` varchar(100) DEFAULT NULL,
  `mod_serie` varchar(100) DEFAULT NULL,
  `mod_wifi` varchar(100) DEFAULT NULL,
  `mod_password` varchar(100) DEFAULT NULL,
  `mod_wifi_default` varchar(100) DEFAULT NULL,
  `mod_pass_default` varchar(100) DEFAULT NULL,
  `mod_idaccess` varchar(255) DEFAULT NULL,
  `id_cli` varchar(255) DEFAULT NULL,
  `modem13` varchar(255) DEFAULT NULL,
  `modem14` varchar(255) DEFAULT NULL,
  `modem15` varchar(255) DEFAULT NULL,
  `modem16` varchar(255) DEFAULT NULL,
  `modem17` varchar(255) DEFAULT NULL,
  `modem18` varchar(255) DEFAULT NULL,
  `modem19` varchar(255) DEFAULT NULL,
  `modem20` varchar(255) DEFAULT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  `mod_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new_instalacion`
--

CREATE TABLE `new_instalacion` (
  `inst_id` int(11) NOT NULL,
  `cli_id` int(11) DEFAULT NULL,
  `serv_id` int(11) DEFAULT NULL,
  `inst_precio` decimal(8,2) DEFAULT NULL,
  `inst_observacion` varchar(255) DEFAULT NULL,
  `cantidad_metros_cable` varchar(255) DEFAULT NULL,
  `inst_fech` date DEFAULT NULL,
  `mod_id` int(11) DEFAULT NULL,
  `rout_id` int(11) DEFAULT NULL,
  `deco_id` int(11) DEFAULT NULL,
  `import_servicio` decimal(8,2) DEFAULT NULL,
  `lugar_conexion` text DEFAULT NULL,
  `id_casas` int(11) DEFAULT NULL,
  `cuenta_usuario` varchar(255) DEFAULT NULL,
  `contra_usuario` varchar(255) DEFAULT NULL,
  `perfil_usuario` varchar(255) DEFAULT NULL,
  `tipo_conexion` varchar(255) DEFAULT NULL,
  `velocidad_MB` varchar(255) DEFAULT NULL,
  `instalacion17` varchar(255) DEFAULT NULL,
  `instalacion18` varchar(255) DEFAULT NULL,
  `instalacion19` varchar(255) DEFAULT NULL,
  `instalacion20` varchar(255) DEFAULT NULL,
  `instalacion21` varchar(255) DEFAULT NULL,
  `instalacion22` varchar(255) DEFAULT NULL,
  `instalacion23` varchar(255) DEFAULT NULL,
  `instalacion24` varchar(255) DEFAULT NULL,
  `instalacion25` varchar(255) DEFAULT NULL,
  `inst_est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `new_instalacion`
--

INSERT INTO `new_instalacion` (`inst_id`, `cli_id`, `serv_id`, `inst_precio`, `inst_observacion`, `cantidad_metros_cable`, `inst_fech`, `mod_id`, `rout_id`, `deco_id`, `import_servicio`, `lugar_conexion`, `id_casas`, `cuenta_usuario`, `contra_usuario`, `perfil_usuario`, `tipo_conexion`, `velocidad_MB`, `instalacion17`, `instalacion18`, `instalacion19`, `instalacion20`, `instalacion21`, `instalacion22`, `instalacion23`, `instalacion24`, `instalacion25`, `inst_est`) VALUES
(1, 1, 1, '50.00', 'NINGUNA', '50', '2023-05-04', NULL, NULL, NULL, '70.00', 'SEGUNDO PISO', 1, NULL, NULL, NULL, 'Inalámbrica', '15 MB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routes`
--

CREATE TABLE `routes` (
  `id_route` int(11) NOT NULL,
  `rout_descripcion` varchar(255) NOT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  `rout_mac` varchar(100) DEFAULT NULL,
  `rout_marca` varchar(100) DEFAULT NULL,
  `rout_modelo` varchar(100) DEFAULT NULL,
  `rout_serie` varchar(100) DEFAULT NULL,
  `rout_wifi` varchar(100) DEFAULT NULL,
  `rout_pasword` varchar(100) DEFAULT NULL,
  `rout_wifidefault` varchar(100) DEFAULT NULL,
  `rout_passdefault` varchar(100) DEFAULT NULL,
  `rout_puertos` varchar(100) DEFAULT NULL,
  `passAdmin` varchar(255) DEFAULT NULL,
  `rout_nota` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `linkGooFotoAparatos` varchar(255) DEFAULT NULL,
  `prestado` varchar(255) DEFAULT NULL,
  `router17` varchar(255) DEFAULT NULL,
  `router18` varchar(255) DEFAULT NULL,
  `router19` varchar(255) DEFAULT NULL,
  `router20` varchar(255) DEFAULT NULL,
  `rout_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `serv_id` int(11) NOT NULL,
  `serv_nom` varchar(255) NOT NULL,
  `serv_obser` text NOT NULL,
  `serv_est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`serv_id`, `serv_nom`, `serv_obser`, `serv_est`) VALUES
(1, 'Internet', 'Conexión a internet de 10 megabits por segundo', 1),
(2, 'Cable TV', 'Conexión a internet de 20 megabits por segundo', 1),
(3, 'DirecTV', 'Servicio de televisión por cable con canales premium', 1),
(4, 'Netflix', 'Servicio de telefonía fija', 1),
(7, 'Telefonia', 'Llamadas a larga distancia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_casa`
--

CREATE TABLE `servicio_casa` (
  `inst_id` int(11) NOT NULL,
  `id_casas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulares`
--

CREATE TABLE `titulares` (
  `id_titular` int(11) NOT NULL,
  `titu_nom` varchar(100) DEFAULT NULL,
  `titu_apellido` varchar(100) DEFAULT NULL,
  `titu_fech_nac` date DEFAULT NULL,
  `titu_dni` varchar(20) DEFAULT NULL,
  `titu_fech_caducidad` date DEFAULT NULL,
  `titu_nom_mama` varchar(100) DEFAULT NULL,
  `titu_nom_papa` varchar(100) DEFAULT NULL,
  `titular11` varchar(255) DEFAULT NULL,
  `titular12` varchar(255) DEFAULT NULL,
  `titular13` varchar(255) DEFAULT NULL,
  `titular14` varchar(255) DEFAULT NULL,
  `titular15` varchar(255) DEFAULT NULL,
  `titular16` varchar(255) DEFAULT NULL,
  `titular17` varchar(255) DEFAULT NULL,
  `titular18` varchar(255) DEFAULT NULL,
  `titular19` varchar(255) DEFAULT NULL,
  `titular20` varchar(255) DEFAULT NULL,
  `titu_est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosv1`
--

CREATE TABLE `usuariosv1` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(255) NOT NULL,
  `usu_cedula` varchar(255) NOT NULL,
  `usu_cargo` varchar(255) NOT NULL,
  `usu_usuario` varchar(50) NOT NULL,
  `usu_password` varchar(50) NOT NULL,
  `usu_nivel` varchar(255) NOT NULL,
  `usu_fech_ingreso` date NOT NULL,
  `usu_est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuariosv1`
--

INSERT INTO `usuariosv1` (`usu_id`, `usu_nombre`, `usu_cedula`, `usu_cargo`, `usu_usuario`, `usu_password`, `usu_nivel`, `usu_fech_ingreso`, `usu_est`) VALUES
(1, 'Luis Angel', '123', 'PROGRAMADOR', 'admin', '123456', 'admin', '2023-04-03', 1),
(2, 'carlos', '123', 'admin', 'user1', 'user1-4065Cusco0631Temp', 'ADMINISTRADOR', '2017-03-13', 1),
(3, 'usuario', '123', 'admin', 'usuario', 'usuario123', 'ADMINISTRADOR', '2023-04-30', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casas`
--
ALTER TABLE `casas`
  ADD PRIMARY KEY (`id_casas`);

--
-- Indices de la tabla `clientesv1`
--
ALTER TABLE `clientesv1`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id_contrato`);

--
-- Indices de la tabla `decos`
--
ALTER TABLE `decos`
  ADD PRIMARY KEY (`id_deco`);

--
-- Indices de la tabla `modems`
--
ALTER TABLE `modems`
  ADD PRIMARY KEY (`id_modem`);

--
-- Indices de la tabla `new_instalacion`
--
ALTER TABLE `new_instalacion`
  ADD PRIMARY KEY (`inst_id`);

--
-- Indices de la tabla `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id_route`);

--
-- Indices de la tabla `titulares`
--
ALTER TABLE `titulares`
  ADD PRIMARY KEY (`id_titular`);

--
-- Indices de la tabla `usuariosv1`
--
ALTER TABLE `usuariosv1`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casas`
--
ALTER TABLE `casas`
  MODIFY `id_casas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientesv1`
--
ALTER TABLE `clientesv1`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `decos`
--
ALTER TABLE `decos`
  MODIFY `id_deco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modems`
--
ALTER TABLE `modems`
  MODIFY `id_modem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `new_instalacion`
--
ALTER TABLE `new_instalacion`
  MODIFY `inst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `routes`
--
ALTER TABLE `routes`
  MODIFY `id_route` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `titulares`
--
ALTER TABLE `titulares`
  MODIFY `id_titular` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuariosv1`
--
ALTER TABLE `usuariosv1`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
