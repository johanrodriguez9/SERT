-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-05-2023 a las 20:10:27
-- Versión del servidor: 8.0.27
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sert`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dp_auth_groups`
--

DROP TABLE IF EXISTS `dp_auth_groups`;
CREATE TABLE IF NOT EXISTS `dp_auth_groups` (
  `id` mediumint UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `dp_auth_groups`
--

INSERT INTO `dp_auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'encargado', 'Encargado'),
(3, 'marketing', 'Marketing');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dp_auth_login_attempts`
--

DROP TABLE IF EXISTS `dp_auth_login_attempts`;
CREATE TABLE IF NOT EXISTS `dp_auth_login_attempts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dp_auth_users`
--

DROP TABLE IF EXISTS `dp_auth_users`;
CREATE TABLE IF NOT EXISTS `dp_auth_users` (
  `id` int UNSIGNED NOT NULL,
  `id_persona` int NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int UNSIGNED NOT NULL,
  `last_login` int UNSIGNED DEFAULT NULL,
  `active` tinyint UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `u_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `carrera_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_persona_2` (`id_persona`),
  KEY `id_persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `dp_auth_users`
--

INSERT INTO `dp_auth_users` (`id`, `id_persona`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `imagen`, `u_update`, `carrera_id`) VALUES
(1, 24505, '', 'sert', '$2y$08$ce.TpyK/sVKMgf6mo.J2j.ScZcCtFldkmfTcANMH7touRyNmlN4xO', NULL, 'richard@gmail.com', NULL, NULL, NULL, NULL, 0, 1683576347, 1, 'MARIO', 'CHOQUE', 'TECH', NULL, 'user_1682676317.jpg', '2023-05-08 16:05:47', 1),
(2, 2, '', 'carlos', '$2y$08$g2BGeMjrVbhlLve6KMQZWOmhArNB6Z9.i2DZwdWh.1aiY8H.LOaMC', NULL, '', NULL, NULL, NULL, NULL, 0, 1683571945, 1, 'CARLOS', 'calle', 'DeenReed', NULL, '', '2023-05-08 14:52:25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dp_auth_users_groups`
--

DROP TABLE IF EXISTS `dp_auth_users_groups`;
CREATE TABLE IF NOT EXISTS `dp_auth_users_groups` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group_id` mediumint UNSIGNED NOT NULL,
  KEY `dp_auth_users_groups_ibfk_1` (`user_id`),
  KEY `dp_auth_users_groups_ibfk_2` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `dp_auth_users_groups`
--

INSERT INTO `dp_auth_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dp_ci_sessions`
--

DROP TABLE IF EXISTS `dp_ci_sessions`;
CREATE TABLE IF NOT EXISTS `dp_ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tech_comunidad`
--

DROP TABLE IF EXISTS `tech_comunidad`;
CREATE TABLE IF NOT EXISTS `tech_comunidad` (
  `comunidad_id` int NOT NULL AUTO_INCREMENT,
  `comunidad_nombre` varchar(75) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `comunidad_logo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `comunidad_descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `comunidad_mision` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `comunidad_vision` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `comunidad_objetivo` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `comunidad_telefono1` int DEFAULT NULL,
  `comunidad_telefono2` int DEFAULT NULL,
  `comunidad_correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `comunidad_facebook` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `comunidad_youtube` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `comunidad_twiter` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `comunidad_direccion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `comunidad_api_google_map` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `dp_auth_users_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`comunidad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tech_comunidad`
--

INSERT INTO `tech_comunidad` (`comunidad_id`, `comunidad_nombre`, `comunidad_logo`, `comunidad_descripcion`, `comunidad_mision`, `comunidad_vision`, `comunidad_objetivo`, `comunidad_telefono1`, `comunidad_telefono2`, `comunidad_correo`, `comunidad_facebook`, `comunidad_youtube`, `comunidad_twiter`, `comunidad_direccion`, `comunidad_api_google_map`, `dp_auth_users_id`) VALUES
(1, 'TIENDA SERT', 'comunidad_logo_1683572665.jpg', '			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        			                        Tejidos del sistema industrial textil			                      			                      			                      			                      			                      			                      			                      			                      			                      			                      			                      			                      			                      ', '<h4><span style=\"font-family: Arial;\" courier=\"\" new\";=\"\" font-size:=\"\" 13px;=\"\" text-align:=\"\" justify;\"=\"\"><font color=\"#000000\" style=\"\">REALIZAR PRODUCTOS DE TEJIDO TEXTIL DE ALTA CALIDAD</font></span></h4>', '<h4><font color=\"#000000\">SER LA EMPRESA BOLIVIANA TEXTIL PIONERA EN LA MANUFACTURA DE PRODUCTOS TEXTILES DE ALTA CALIDAD</font></h4>', '<font color=\"#cec6ce\">OFRECER PRODUCTOS TEXTILES CON ALTOS ESTÁNDARES DE CALIDAD</font>', 22304700, 22304700, 'Sert@gmail.com', 'https://www.facebook.com/sert', '', '', 'AV. RAMOS GAVILAN C/ 15 ZONA ACHACHICALA', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tech_hashconfirmemail`
--

DROP TABLE IF EXISTS `tech_hashconfirmemail`;
CREATE TABLE IF NOT EXISTS `tech_hashconfirmemail` (
  `id_confirm` int NOT NULL AUTO_INCREMENT,
  `hash_` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_persona` int DEFAULT NULL,
  PRIMARY KEY (`id_confirm`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tech_hashconfirmemail`
--

INSERT INTO `tech_hashconfirmemail` (`id_confirm`, `hash_`, `email`, `id_persona`) VALUES
(1, '11', 'asdaaa@gmail.com', 19),
(2, '6073148', 'ximen4din@gmail.com', 22),
(3, '5223567', 'christiantusco@gmail.com', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tech_tienda`
--

DROP TABLE IF EXISTS `tech_tienda`;
CREATE TABLE IF NOT EXISTS `tech_tienda` (
  `tienda_id` int NOT NULL AUTO_INCREMENT,
  `tienda_titulo` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tienda_imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tienda_imagen_2` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `tienda_descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `tienda_fin_fecha_oferta` date DEFAULT NULL,
  `tienda_costo` float DEFAULT NULL,
  `tienda_referencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tienda_oferta_costo` float DEFAULT NULL,
  `tienda_estado` tinyint NOT NULL,
  `id_user` int NOT NULL,
  `tech_categoria_id` int NOT NULL,
  PRIMARY KEY (`tienda_id`),
  KEY `fk_tech_tienda_tech_categoria1_idx` (`tech_categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tech_tienda`
--

INSERT INTO `tech_tienda` (`tienda_id`, `tienda_titulo`, `tienda_imagen`, `tienda_imagen_2`, `tienda_descripcion`, `tienda_fin_fecha_oferta`, `tienda_costo`, `tienda_referencia`, `tienda_oferta_costo`, `tienda_estado`, `id_user`, `tech_categoria_id`) VALUES
(1, 'IMPRESORA 3D CREALITY ENDER 3 PRO ', 'tien_1640103323.jpg', 'tien1_1640103323.jpg', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 30px; padding: 0px; list-style-position: initial; list-style-image: initial; color: rgb(51, 51, 51);\"><li><span style=\"font-family: verdana, geneva;\">Kit impresora 3D.&nbsp;</span></li><li><span style=\"font-family: verdana, geneva;\">Modelo: Ender 3 Pro</span></li><li><span style=\"font-family: verdana, geneva;\">Dimensiones: 200 x 220 x 250mm&nbsp;</span></li><li><span style=\"font-family: verdana, geneva;\">Material: marco de aluminio</span></li><li><span style=\"font-family: verdana, geneva;\">Diámetro: 1.75mm</span></li><li><span style=\"font-family: verdana, geneva;\">Nozzle: 0.4mm&nbsp;</span></li><li><span style=\"font-family: verdana, geneva;\">Temperatura máxima boquilla: 255ºC</span></li><li><span style=\"font-family: verdana, geneva;\">Velocidad de impresión: 80 mm/s (velocidad normal) pero puede alcanzar 180 mm/s</span></li><li><span style=\"font-family: verdana, geneva;\">Hotend y extrusor: MK8</span></li><li><span style=\"font-family: verdana, geneva;\">Extrusor tipo: Bowden</span></li><li><span style=\"font-family: verdana, geneva;\">Cama caliente: puede alcanzar hasta 90ºC</span></li><li><span style=\"font-family: verdana, geneva;\">Pantalla: LCD</span></li><li><span style=\"font-family: verdana, geneva;\">Dimensiones de la cama caliente: 220 x 220 x 250 mm (22 x 22 x 25 cm) (medidas aproximadas)</span></li><li><span style=\"font-family: verdana, geneva;\">Materiales que puede imprimir: ABS / PLA / WOOD / TPU (no recomendamos subir el hotend a mas de&nbsp; 240 ºC).&nbsp;</span></li><li><span style=\"font-family: verdana, geneva;\">Se pueden usar filamentos de cualquier fabricante&nbsp;</span></li><li><span style=\"font-family: verdana, geneva;\">Formato de los archivos: STL, OBJ, G-Code</span></li><li><span style=\"font-family: verdana, geneva;\">Fácil montaje</span></li><li><span style=\"font-family: verdana, geneva;\">Peso: 8.6 Kgs</span></li><li><span style=\"font-family: verdana, geneva;\">Tamaño de la impresora: 440 * 410 * 465 mm (Aproximadamente)</span></li><li><span style=\"font-family: verdana, geneva;\">Marca: Creality 3D</span></li></ul>', '2021-08-15', 3200, '62380880', 2700, 1, 0, 3),
(2, 'IMPRESORA 3D--LD-002R', 'tien_1633811281.png', 'tien1_1633811281.png', '<div>ESPECIFICACIONES DEL PRODUCTO:</div><div><br></div><div>Modelo: LD-002R.</div><div><br></div><div>Idioma del software: Ingles</div><div><br></div><div>Resolución del eje X/Y: 1440 x 2560</div><div><br></div><div>Precisión del eje Z: 0.002 in-0.002 in (grosor de capa).</div><div><br></div><div>Velocidad de impresión: 6-18S/altura de capa.</div><div><br></div><div>Filamentos especiales: Resina fotosensible rígida común, Resina estándar, Alta elasticidad, Alta dureza, Alta dureza, Resina modelo de rodadura de rodadura.</div><div><br></div><div>Configuración de la fuente de luz: cuenta UV integrada (longitud de onda 405 nm).</div><div><br></div><div>Sistema operativo:Windows XP y sistemas superiores - Windows XP</div><div><br></div><div>Potencia nominal: 72 W.</div><div><br></div><div>Tamaño de impresión: 4.685 x 2.559 x 6.299 in (longitud, ancho y altura).</div><div><br></div><div>Tamaño de la máquina: 8.701 x 8.701 x 15.984 in.</div><div><br></div><div>Tamaño del paquete: 11.614 x 11.614 x 21.457 in.</div><div><br></div><div>Peso de la maquina: 15.4 lbs.</div><div><br></div><div>Peso bruto: 19.8 lbs.</div><div><br></div><div>Pantalla: 3.5 in.</div>', '2021-08-21', 4900, '62380880', 4500, 1, 0, 3),
(3, 'FILAMENTO PLA  CRALITY', 'tien_1656996493.jpg', 'tien1_1656996493.jpg', '<p>CREALITY 3D ST-PLA, es un filamento termoplástico biodegradable fácil de extruir, altamente versátil, no genera olor y no es tóxico.</p><p>Utiliza filamento de calidad para evitar problemas en tus proyectos como en tu impresora 3D.\r\n- Alta resistencia.\r\n- Gran flexibilidad.\r\n- Buena fluidez.\r\n- Libre de burbujas.</p>', '2021-08-31', 250, '62380880', 200, 1, 0, 3),
(4, 'IMPRESORA 3D FDM', 'tien_1631152181.png', 'tien1_1633810951.jpg', '<p>Extrusor de alta calidad\r\nAnycubic i3 Mega S posee un extrusor de Titán de alta calidad que permite una resolución de capa de entre 0.05mm y 0.3mm, con una velocidad de impresión de 20mm/s – 100mm/s dependiendo del material y la temperatura utilizada.</p><p>La temperatura máxima de la boquilla es 275 grados, por lo que es ideal para utilizar con los materiales PLA, ABS, Nylon y otros filamentos nuevos como el de madera flexible.\r\nRobusta y estable\r\nSu base está hecha de chapa de aluminio plegada.</p><p>Los marcos son metal rígido para reducir las vibraciones durante la impresión y mejorar así su calidad de acabado.</p><p>También tiene anclado a la impresora un soporte para el filamento.\r\nPuesta en marcha fácil\r\nAnycubic i3 Mega S viene parcialmente preensamblada. </p><p>Su diseño modular permite un montaje rápido en menos de media hora. La calibración no es automática pero es fácil siguiendo las instrucciones.\r\n</p><p>Cama caliente excelente\r\nLa cama caliente Ultrabase tiene excelente adhesión y una vez que se ha enfriado se despega todo con facilidad. Además cuenta con un sensor de nivelación automática incorporado.</p><p>\r\nPantalla táctil TFT LCD a todo color\r\nAnycubic i3 Mega S incorpora una pantalla táctil de 3,5 pulgadas con una interfaz para modificar los parámetros de impresión de forma fácil e intuitiva.\r\n</p><p>Muestra todos los detalles de funcionamiento, como las temperaturas de trabajo del cabezal o extrusor, el tiempo de impresión, etc.</p><p>Modo de trabajo\r\nPuedes enviar los archivos para imprimir por USB tipo B o desde la tarjeta SD (ambos incluidos). </p><p>También tiene memoria para poder retomar la impresión en caso de que se vaya la luz y o se acabe el filamento.\r\n</p>', '2021-10-09', 5200, '62380880', 4590, 1, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_categoria`
--

DROP TABLE IF EXISTS `tienda_categoria`;
CREATE TABLE IF NOT EXISTS `tienda_categoria` (
  `categoria_id` int NOT NULL AUTO_INCREMENT,
  `categoria_nombre` varchar(150) DEFAULT NULL,
  `categoria_descripcion` text,
  PRIMARY KEY (`categoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tienda_categoria`
--

INSERT INTO `tienda_categoria` (`categoria_id`, `categoria_nombre`, `categoria_descripcion`) VALUES
(1, 'PELERAS A CUADROS', 'una cada prenda se presta\r\n'),
(2, 'ABRIGOS', 'sdf'),
(3, 'CAMISOLAS', 'sdf ,,,'),
(4, 'PELERAS', 'negro\r\n\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_estrella`
--

DROP TABLE IF EXISTS `tienda_estrella`;
CREATE TABLE IF NOT EXISTS `tienda_estrella` (
  `tienda_estrella_id` int NOT NULL AUTO_INCREMENT,
  `tienda_nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_fecha_registro` datetime NOT NULL,
  `tienda_fecha_modificacion` datetime NOT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`tienda_estrella_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_galeria`
--

DROP TABLE IF EXISTS `tienda_galeria`;
CREATE TABLE IF NOT EXISTS `tienda_galeria` (
  `galeria_id` int NOT NULL AUTO_INCREMENT,
  `galeria_imagen` varchar(100) DEFAULT NULL,
  `producto_id` int NOT NULL,
  PRIMARY KEY (`galeria_id`),
  KEY `bfk_tienda_galeria` (`producto_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tienda_galeria`
--

INSERT INTO `tienda_galeria` (`galeria_id`, `galeria_imagen`, `producto_id`) VALUES
(14, 'mini_21683574652.jpg', 10),
(12, 'mini_11683573421.jpg', 9),
(10, 'mini_11683573087.jpg', 1),
(11, 'mini_21683573087.jpg', 1),
(13, 'mini_21683573421.jpg', 9),
(15, 'mini_31683574652.jpg', 10),
(16, 'mini_41683574652.jpg', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_inventario`
--

DROP TABLE IF EXISTS `tienda_inventario`;
CREATE TABLE IF NOT EXISTS `tienda_inventario` (
  `tienda_inventario_id` int NOT NULL AUTO_INCREMENT,
  `tienda_inventario_nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_inventario_stock` int DEFAULT NULL,
  `tienda_inventario_precio_unitario` float DEFAULT NULL,
  `tienda_inventario_precio_moneda` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_inventario_precio_venta` float DEFAULT NULL,
  `tienda_inventario_venta_moneda` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_inventario_talla` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_inventario_genero` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_inventario_fecha_registro` datetime DEFAULT NULL,
  `tienda_inventario_fecha_modificado` timestamp NULL DEFAULT NULL,
  `producto_id` int DEFAULT NULL,
  `tienda_inventario_id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`tienda_inventario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tienda_inventario`
--

INSERT INTO `tienda_inventario` (`tienda_inventario_id`, `tienda_inventario_nombre`, `tienda_inventario_stock`, `tienda_inventario_precio_unitario`, `tienda_inventario_precio_moneda`, `tienda_inventario_precio_venta`, `tienda_inventario_venta_moneda`, `tienda_inventario_talla`, `tienda_inventario_genero`, `tienda_inventario_fecha_registro`, `tienda_inventario_fecha_modificado`, `producto_id`, `tienda_inventario_id_usuario`) VALUES
(1, 'ROPA -CAMISA ', 15, 150, 'Bolivianos', 180, 'Bolivianos', NULL, NULL, '2022-07-19 11:49:15', '2022-07-19 16:49:16', NULL, 1),
(2, 'SDF', 25, 250, 'Bolivianos', 270, NULL, NULL, NULL, '2022-07-19 13:21:26', '2022-07-19 18:21:26', NULL, 1),
(3, 'AFAF', 10, 10, 'Dolares', 3, NULL, NULL, NULL, '2022-07-24 13:55:21', '2022-07-24 18:55:21', NULL, 1),
(4, 'SFSDFSDF', 15, 200, 'Bolivianos', 10, 'Bolivianos', NULL, NULL, '2022-07-24 14:58:17', '2022-07-24 19:58:17', NULL, 1),
(5, '', NULL, NULL, NULL, 1, 'Bolivianos', NULL, NULL, '2022-07-24 16:05:15', '2022-07-24 21:05:15', NULL, 1),
(6, '', NULL, NULL, NULL, 87, NULL, NULL, NULL, '2022-08-18 14:54:57', '2022-08-18 19:54:57', NULL, 1),
(7, '', NULL, NULL, NULL, 4, 'Bolivianos', NULL, NULL, '2022-09-24 04:33:29', '2022-09-24 09:33:29', NULL, 1),
(8, '', NULL, NULL, NULL, 4, 'Bolivianos', NULL, NULL, '2023-03-13 07:06:06', '2023-03-13 11:06:06', NULL, 1),
(9, 'MMMM', 10, NULL, NULL, NULL, 'Bolivianos', NULL, NULL, '2023-03-13 07:08:39', '2023-03-13 11:08:39', NULL, 1),
(10, '', NULL, NULL, NULL, 4, 'Bolivianos', NULL, NULL, '2023-03-13 07:10:18', '2023-03-13 11:10:18', NULL, 1),
(11, 'WE', 10, NULL, NULL, NULL, 'Bolivianos', NULL, NULL, '2023-03-15 09:42:29', '2023-03-15 13:42:29', NULL, 1),
(12, '', NULL, NULL, NULL, 150, 'Bolivianos', NULL, NULL, '2023-04-26 22:55:43', '2023-04-27 02:55:43', NULL, 1),
(13, 'MANU', 15, NULL, NULL, NULL, 'Bolivianos', NULL, NULL, '2023-04-27 13:51:18', '2023-04-27 17:51:18', NULL, 1),
(14, 'QWWWW', 20, NULL, NULL, NULL, 'Bolivianos', NULL, NULL, '2023-04-27 13:53:52', '2023-04-27 17:53:52', NULL, 1),
(15, 'mesa 2', 0, 0, 'Moneda', 0, 'Seleccionar tip', 'M', 'Genero', '2023-04-27 18:07:02', '2023-04-27 22:07:02', 1, 1),
(16, 'chompas', 10, 15, 'Bolivianos', 17, 'Bolivianos', 'M', 'Masculino', '2023-04-27 18:07:22', '2023-04-27 22:07:22', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_portada`
--

DROP TABLE IF EXISTS `tienda_portada`;
CREATE TABLE IF NOT EXISTS `tienda_portada` (
  `portada_id` int NOT NULL AUTO_INCREMENT,
  `portada_imagen` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `portada_titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `portada_subtitulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`portada_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tienda_portada`
--

INSERT INTO `tienda_portada` (`portada_id`, `portada_imagen`, `portada_titulo`, `portada_subtitulo`) VALUES
(1, 'port_11683572390.jpg', 'Champas', 'una version mejor de vos'),
(2, 'port_21683572390.jpg', 'Camisas', 'solo tu puedes vestir asi'),
(3, 'port_31683572391.jpg', 'Solo tu', 'No lo dudes estate seguro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_producto`
--

DROP TABLE IF EXISTS `tienda_producto`;
CREATE TABLE IF NOT EXISTS `tienda_producto` (
  `producto_id` int NOT NULL AUTO_INCREMENT,
  `producto_titulo` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `producto_descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `producto_referencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `producto_costo` float DEFAULT NULL,
  `producto_estado` enum('A','I') NOT NULL,
  `producto_fin_fecha_registro` datetime DEFAULT NULL,
  `producto_fin_fecha_modificacion` timestamp NULL DEFAULT NULL,
  `producto_imagen` varchar(150) DEFAULT NULL,
  `tienda_inventario_id` int DEFAULT NULL,
  `id_user` int NOT NULL,
  `categoria_id` int NOT NULL,
  `temporada_id` int DEFAULT NULL,
  `temporada_genero_id` int DEFAULT NULL,
  PRIMARY KEY (`producto_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tienda_producto`
--

INSERT INTO `tienda_producto` (`producto_id`, `producto_titulo`, `producto_descripcion`, `producto_referencia`, `producto_costo`, `producto_estado`, `producto_fin_fecha_registro`, `producto_fin_fecha_modificacion`, `producto_imagen`, `tienda_inventario_id`, `id_user`, `categoria_id`, `temporada_id`, `temporada_genero_id`) VALUES
(1, 'POLERA', 'Este producto tiene un diseño con una proteccion de seguridad que duradera.', '65414544', 50, 'A', '2023-03-13 08:17:02', '2023-05-08 20:07:47', 'user_1683573087.jpg', NULL, 1, 1, 1, 1),
(10, 'PELERA A CUADROS', 'Este producto tiene un diseño con una proteccion de seguridad que duradera.', '65416541', 10, 'A', '2023-03-13 12:09:15', '2023-05-08 20:08:49', 'user_1683574652.jpg', NULL, 1, 1, 1, 2),
(9, 'DEPORTIVO', 'Este producto tiene un diseño con una proteccion de seguridad que duradera.', '54614161', 22, 'A', '2023-03-13 12:04:28', '2023-05-08 19:17:11', 'user_1683573421.jpg', NULL, 1, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_producto_adquirido`
--

DROP TABLE IF EXISTS `tienda_producto_adquirido`;
CREATE TABLE IF NOT EXISTS `tienda_producto_adquirido` (
  `tienda_producto_adquirido_id` int NOT NULL AUTO_INCREMENT,
  `tienda_producto_adquirido_cantidad` int DEFAULT NULL,
  `tienda_producto_adquirido_precio` float DEFAULT NULL,
  `tienda_producto_adquirido_moneda` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_producto_adquirido_oferta` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_producto_adquirido_fecha_registro` datetime DEFAULT NULL,
  `tienda_producto_adquirido_fecha_modificado` timestamp NULL DEFAULT NULL,
  `tienda_producto_adquirido_id_usuario` int DEFAULT NULL,
  `tienda_producto_adquirido_producto_id` int DEFAULT NULL,
  `tienda_producto_adquirido_inventario_id` int DEFAULT NULL,
  PRIMARY KEY (`tienda_producto_adquirido_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tienda_producto_adquirido`
--

INSERT INTO `tienda_producto_adquirido` (`tienda_producto_adquirido_id`, `tienda_producto_adquirido_cantidad`, `tienda_producto_adquirido_precio`, `tienda_producto_adquirido_moneda`, `tienda_producto_adquirido_oferta`, `tienda_producto_adquirido_fecha_registro`, `tienda_producto_adquirido_fecha_modificado`, `tienda_producto_adquirido_id_usuario`, `tienda_producto_adquirido_producto_id`, `tienda_producto_adquirido_inventario_id`) VALUES
(1, 1, 200, 'Bolivianos', '0%', '2022-07-21 13:39:00', '2022-07-21 18:39:00', 1, 2, 1),
(2, 1, 200, 'Bolivianos', '20%', '2022-07-12 13:39:52', '2022-07-13 18:39:52', 1, 2, 2),
(3, 1, 210, 'Bolivianos', '10%', '2022-07-21 13:39:52', '2022-07-21 18:39:52', 1, 1, 1),
(4, 1, 200, 'Bolivianos', '20%', '2022-07-12 13:39:52', '2022-07-13 18:39:52', 1, 2, 2),
(5, 1, 210, 'Bolivianos', '10%', '2022-07-21 13:39:52', '2022-07-21 18:39:52', 1, 1, 1),
(6, 1, 200, 'Bolivianos', '20%', '2022-07-12 13:39:52', '2022-07-13 18:39:52', 1, 3, 3),
(7, 1, 200, 'Bolivianos', '20%', '2022-07-12 13:39:52', '2022-07-13 18:39:52', 1, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_producto_oferta`
--

DROP TABLE IF EXISTS `tienda_producto_oferta`;
CREATE TABLE IF NOT EXISTS `tienda_producto_oferta` (
  `tienda_oferta_id` int NOT NULL AUTO_INCREMENT,
  `tienda_oferta_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_oferta_costo` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_oferta_moneda` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_oferta_fecha_inicio` date DEFAULT NULL,
  `tienda_oferta_fecha_fin` date DEFAULT NULL,
  `tienda_oferta_fecha_registro` datetime DEFAULT NULL,
  `tienda_oferta_fecha_modificado` timestamp NULL DEFAULT NULL,
  `tienda_oferta_estado` enum('A','I') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tienda_oferta_producto_id` int DEFAULT NULL,
  `tienda_oferta_id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`tienda_oferta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tienda_producto_oferta`
--

INSERT INTO `tienda_producto_oferta` (`tienda_oferta_id`, `tienda_oferta_nombre`, `tienda_oferta_costo`, `tienda_oferta_moneda`, `tienda_oferta_fecha_inicio`, `tienda_oferta_fecha_fin`, `tienda_oferta_fecha_registro`, `tienda_oferta_fecha_modificado`, `tienda_oferta_estado`, `tienda_oferta_producto_id`, `tienda_oferta_id_usuario`) VALUES
(1, 'oferta 1', '15%', 'bolivianos', '2022-07-24', '2022-07-24', '2022-07-24 14:59:03', '2022-07-24 19:59:03', 'A', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_producto_top`
--

DROP TABLE IF EXISTS `tienda_producto_top`;
CREATE TABLE IF NOT EXISTS `tienda_producto_top` (
  `tienda_top_id` int NOT NULL AUTO_INCREMENT,
  `tienda_top_producto_id` int NOT NULL,
  `tienda_id_estrellas` int NOT NULL,
  `tienda_fecha_registro` datetime NOT NULL,
  `tienda_fecha_modificacion` datetime NOT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`tienda_top_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_temporada`
--

DROP TABLE IF EXISTS `tienda_temporada`;
CREATE TABLE IF NOT EXISTS `tienda_temporada` (
  `temporada_id` int NOT NULL AUTO_INCREMENT,
  `temporada_nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`temporada_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tienda_temporada`
--

INSERT INTO `tienda_temporada` (`temporada_id`, `temporada_nombre`) VALUES
(1, 'PRIMAVERA'),
(2, 'VERANO'),
(3, 'OTOÑO'),
(4, 'INVIERNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_temporada_genero`
--

DROP TABLE IF EXISTS `tienda_temporada_genero`;
CREATE TABLE IF NOT EXISTS `tienda_temporada_genero` (
  `temporada_genero_id` int NOT NULL AUTO_INCREMENT,
  `temporada_genero_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`temporada_genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tienda_temporada_genero`
--

INSERT INTO `tienda_temporada_genero` (`temporada_genero_id`, `temporada_genero_nombre`) VALUES
(1, 'HOMBRE'),
(2, 'MUJER'),
(3, 'NIÑO'),
(4, 'NIÑA');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dp_auth_users_groups`
--
ALTER TABLE `dp_auth_users_groups`
  ADD CONSTRAINT `dp_auth_users_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `dp_auth_users` (`id`),
  ADD CONSTRAINT `dp_auth_users_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `dp_auth_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
