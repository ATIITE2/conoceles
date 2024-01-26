-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2024 a las 17:12:00
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `conoceles_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_areas_ite`
--

CREATE TABLE `cat_areas_ite` (
  `id` int(10) NOT NULL,
  `nom_cor` varchar(50) NOT NULL,
  `nom_com` varchar(200) NOT NULL,
  `status` int(10) NOT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cat_areas_ite`
--

INSERT INTO `cat_areas_ite` (`id`, `nom_cor`, `nom_com`, `status`, `fecha_reg`) VALUES
(1, 'Presidencia', 'Lic. Emmanuel Ávila González', 1, '2023-09-18 16:46:47'),
(2, 'Consejeria_YMP', 'Lic. Yedith Martinez Pinillo', 1, '2023-09-18 16:29:00'),
(3, 'Consejeria_EPR', 'Lic. Erika Periañez Rodríguez', 1, '2023-09-14 17:46:47'),
(4, 'Consejeria_JCA', 'Lic. Janet Cervantes Ahuatzi', 1, '2023-09-14 17:49:20'),
(5, 'Consejeria_JCMM', 'Mtro. Juan Carlos Minor Márquez', 1, '2023-10-27 19:18:22'),
(6, 'Consejeria_EAAA', 'Lic. Edgar Alfonso Aldave Aguilar', 1, '2023-12-06 19:45:48'),
(7, 'Consejeria_HNC', 'Lic. Hermenegildo Neria Carreño', 1, '2023-09-14 17:59:36'),
(8, 'SE', 'Secretaria Ejecutiva', 1, '2023-09-14 17:59:49'),
(9, 'UTCE', 'Unidad Técnica de lo Contencioso Electoral', 1, '2023-09-14 18:00:09'),
(10, 'ATTAI', 'Área Técnica de Transparencia y Acceso a la Información ', 1, '2023-09-21 19:47:59'),
(11, 'ATCC', 'Área Técnica de Consulta Ciudadana', 1, '2023-11-10 21:28:29'),
(12, 'ATI', 'Área Técnica de Informática', 1, '2023-09-14 18:16:20'),
(13, 'ATCSyP', 'Área Técnica de Comunicación Social y Prensa', 1, '2023-11-10 21:28:27'),
(14, 'DAJ', 'Dirección de Asuntos Juridicos', 1, '2023-12-06 19:45:49'),
(15, 'DPAF', 'Dirección de Prerrogativas, Administración y Fiscalización', 1, '2023-09-14 18:17:23'),
(16, 'DOECyEC', 'Dirección de Organización Electoral, Capacitación y Educación Civica', 1, '2023-11-10 21:28:23'),
(17, 'SP', 'Secretaria Particular', 1, '2023-09-14 18:18:29'),
(18, 'OIC', 'Órgano Interno de Control', 1, '2023-09-14 18:18:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_ayuntamientos`
--

CREATE TABLE `cat_ayuntamientos` (
  `id` int(11) NOT NULL,
  `nombre_municipio` varchar(256) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cat_ayuntamientos`
--

INSERT INTO `cat_ayuntamientos` (`id`, `nombre_municipio`, `status`) VALUES
(1, 'Amaxac de Guerrero', 1),
(2, 'Apetatitlán de Antonio Carvajal', 1),
(3, 'Atlangatepec', 1),
(4, 'Atltzayanca', 1),
(5, 'Apizaco', 1),
(6, 'Calpulalpan', 1),
(7, 'El Carmen Tequexquitla', 1),
(8, 'Cuapiaxtla', 1),
(9, 'Cuaxomulco', 1),
(10, 'Chiautempan', 1),
(11, 'Muñoz de Domingo Arenas', 1),
(12, 'Españita', 1),
(13, 'Huamantla', 1),
(14, 'Hueyotlipan', 1),
(15, 'Ixtacuixtla de Mariano Matamoros', 1),
(16, 'Ixtenco', 1),
(17, 'Mazatecochco de José María Morelos', 1),
(18, 'Contla de Juan Cuamatzi', 1),
(19, 'Tepetitla de Lardizábal', 1),
(20, 'Sanctórum de Lázaro Cárdenas', 1),
(21, 'Nanacamilpa de Mariano Arista', 1),
(22, 'Acuamanala de Miguel Hidalgo', 1),
(23, 'Natívitas', 1),
(24, 'Panotla', 1),
(25, 'San Pablo del Monte', 1),
(26, 'Santa Cruz Tlaxcala	', 1),
(27, 'Tenancingo', 1),
(28, 'Teolocholco', 1),
(29, 'Tepeyanco', 1),
(30, 'Terrenate', 1),
(31, 'Tetla de la Solidaridad	', 1),
(32, 'Tetlatlahuca	', 1),
(33, 'Tlaxcala	', 1),
(34, 'Tlaxco	', 1),
(35, 'Tocatlán	', 1),
(36, 'Totolac	', 1),
(37, 'Ziltlaltépec de Trinidad Sánchez Santos	', 1),
(38, 'Tzompantepec	', 1),
(39, 'Xaloztoc	', 1),
(40, 'Xaltocan	', 1),
(41, 'Papalotla de Xicohténcatl	', 1),
(42, 'Xicohtzinco	', 1),
(43, 'Yauhquemehcan	', 1),
(44, 'Zacatelco	', 1),
(45, 'Benito Juárez	', 1),
(46, 'Emiliano Zapata	', 1),
(47, 'Lázaro Cárdenas	', 1),
(48, 'La Magdalena Tlaltelulco	', 1),
(49, 'San Damián Texóloc	', 1),
(50, 'San Francisco Tetlanohcan	', 1),
(51, 'San Jerónimo Zacualpan	', 1),
(52, 'San José Teacalco	', 1),
(53, 'San Juan Huactzinco	', 1),
(54, 'San Lorenzo Axocomanitla	', 1),
(55, 'San Lucas Tecopilco	', 1),
(56, 'Santa Ana Nopalucan	', 1),
(57, 'Santa Apolonia Teacalco	', 1),
(58, 'Santa Catarina Ayometla	', 1),
(59, 'Santa Cruz Quilehtla	', 1),
(60, 'Santa Isabel Xiloxoxtla	', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_charts`
--

CREATE TABLE `cat_charts` (
  `id` int(11) NOT NULL,
  `nom_cor` varchar(255) NOT NULL,
  `nom_resp` varchar(100) NOT NULL,
  `nom_com` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `recha_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cat_charts`
--

INSERT INTO `cat_charts` (`id`, `nom_cor`, `nom_resp`, `nom_com`, `tipo`, `status`, `recha_reg`) VALUES
(1, 'Registro candidatos', 'Reg. Candidatos', 'Registro candidatos', 1, 1, '2023-07-28 21:34:05'),
(2, 'Grado Académico', 'Grad. Académico', 'Registro de candidaturas por grado académico', 4, 1, '2023-07-28 21:34:05'),
(3, 'Rangos de Edad', 'Edad', 'Registro de candidaturas por rangos de edad', 1, 1, '2023-07-28 21:34:05'),
(4, 'Género', 'Género', 'Registro de candidaturas por Género', 3, 1, '2023-07-28 21:34:05'),
(5, 'Nivel de Ingresos', 'Niv. de Ingresos', 'Registro de candidaturas por nivel de ingreso mensual', 2, 1, '2023-07-28 21:34:05'),
(6, 'Candidaturas Indígenas', 'C. Indígenas', 'Del total de las candidaturas que respondieron el cuestionario identidad, se identifican como personas indígenas', 4, 1, '2023-07-28 21:34:05'),
(7, 'Candidaturas de Discapacidad', 'C. de Discapacidad', 'Del total de las candidaturas que respondieron el cuestionario identidad, se identifican con alguna discapacidad', 4, 1, '2023-07-28 21:34:05'),
(8, 'Candidaturas Afromexicanas', 'C. Afromexicanas', 'Del total de las candidaturas que respondieron el cuestionario identidad, se identifican como personas afromexicanas', 4, 1, '2023-07-28 21:34:05'),
(9, 'Candidaturas de la Diversidad Sexual', 'C. Diversidad Sexual', 'Del total de las candidaturas que respondieron el cuestionario identidad, se identifican como parte de la comunidad LGBTTTIQ+', 4, 1, '2023-07-28 21:34:05'),
(10, 'Candidaturas Migrantes', 'C. Migrantes', 'Del total de las candidaturas que respondieron el cuestionario identidad, se identifican como migrantes', 4, 0, '2023-07-28 21:34:05'),
(11, 'Candidaturas de Personas Jóvenes', 'C. Jóvenes', 'Del total de las candidaturas que respondieron el cuestionario identidad, se identifican como población joven', 4, 1, '2023-07-28 21:34:05'),
(12, 'Candidaturas de Personas Mayores', 'C. Mayores', 'Del total de las candidaturas que respondieron el cuestionario identidad, se identifican como población mayor', 4, 1, '2023-07-28 21:34:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_charts_estad`
--

CREATE TABLE `cat_charts_estad` (
  `id` int(11) NOT NULL,
  `nom_cor` varchar(255) NOT NULL,
  `nom_com` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `recha_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cat_charts_estad`
--

INSERT INTO `cat_charts_estad` (`id`, `nom_cor`, `nom_com`, `status`, `recha_reg`) VALUES
(1, 'Candidaturas Indígenas', 'Candidaturas Indígenas', 1, '2023-12-04 17:25:32'),
(2, 'Candidaturas de Discapacidad', 'Candidaturas de Discapacidad', 1, '2023-12-04 17:25:32'),
(3, 'Candidaturas Afromexicanas', 'Candidaturas Afromexicanas', 1, '2023-12-04 17:25:32'),
(4, 'Candidaturas de la Comunidad LGBTTTIQ+', 'Candidaturas de la Comunidad LGBTTTIQ+', 1, '2023-12-04 17:25:32'),
(5, 'Candidaturas Migrantes', 'Candidaturas Migrantes', 0, '2023-12-04 17:25:32'),
(6, 'Candidaturas Jóvenes', 'Candidaturas Jóvenes', 1, '2023-12-04 17:25:32'),
(7, 'Candidaturas de Personas Mayores', 'Candidaturas de Personas Mayores', 1, '2023-12-04 17:25:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_distritos_electorales`
--

CREATE TABLE `cat_distritos_electorales` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cabecera` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cat_distritos_electorales`
--

INSERT INTO `cat_distritos_electorales` (`id`, `nombre`, `cabecera`, `status`) VALUES
(1, 'Distrito 1', 'San Antonio Calpulalpan', 1),
(2, 'Distrito 2', 'Tlaxco de Morelos', 1),
(3, 'Distrito 3', 'Santiago Tetla', 1),
(4, 'Distrito 4', 'Apizaco', 1),
(5, 'Distrito 5', 'San Nicolás Panotla', 1),
(6, 'Distrito 6', 'Ixtacuixtla de Mariano Matamoros', 1),
(7, 'Distrito 7', 'Tlaxcala de Xicohténcatl', 1),
(8, 'Distrito 8', 'San Bernardino Contla', 1),
(9, 'Distrito 9', 'Santa Ana Chiautempan', 1),
(10, 'Distrito 10', 'Huamantla', 1),
(11, 'Distrito 11', 'Huamantla', 1),
(12, 'Distrito 12', 'San Luis Teolocholco', 1),
(13, 'Distrito 13', 'Zacatelco', 1),
(14, 'Distrito 14', 'San Francisco Papalotla', 1),
(15, 'Distrito 15', 'Vicente Guerrero', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_estados`
--

CREATE TABLE `cat_estados` (
  `id_edo` int(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `abreviatura` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cat_estados`
--

INSERT INTO `cat_estados` (`id_edo`, `nombre`, `abreviatura`) VALUES
(1, 'Aguascalientes', 'AGS'),
(2, 'Baja California', 'BCN'),
(3, 'Baja California Sur', 'BCS'),
(4, 'Campeche', 'CAMP'),
(5, 'Coahuila', 'COAH'),
(6, 'Colima', 'COL'),
(7, 'Chiapas', 'CHIS'),
(8, 'Chihuahua', 'CHIH'),
(9, 'Ciudad de México', 'CDMX'),
(10, 'Durango', 'DGO'),
(11, 'Guanajuato', 'GTO'),
(12, 'Guerrero', 'GRO'),
(13, 'Hidalgo', 'HGO'),
(14, 'Jalisco', 'JAL'),
(15, 'Estado de México', 'EDMX'),
(16, 'Michoacan', 'MICH'),
(17, 'Morelos', 'MOR'),
(18, 'Nayarit', 'NAY'),
(19, 'Nuevo León', 'NL'),
(20, 'Oaxaca', 'OAX'),
(21, 'Puebla', 'PUE'),
(22, 'Querétaro', 'QRO'),
(23, 'Quintana Roo', 'QROO'),
(24, 'San Luis Potosí', 'SLP'),
(25, 'Sinaloa', 'SIN'),
(26, 'Sonora', 'SON'),
(27, 'Tabasco', 'TBS'),
(28, 'Tamaulipas', 'TAMPS'),
(29, 'Tlaxcala', 'TLAX'),
(30, 'Veracruz', 'VER'),
(31, 'Yucatán', 'YUC'),
(32, 'Zacatecas', 'ZAC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_grad_academ`
--

CREATE TABLE `cat_grad_academ` (
  `id` int(10) NOT NULL,
  `nombre_cor` varchar(50) NOT NULL,
  `nombre_com` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cat_grad_academ`
--

INSERT INTO `cat_grad_academ` (`id`, `nombre_cor`, `nombre_com`, `status`) VALUES
(1, 'Ed. Básica', 'Educación Básica', 1),
(2, 'E. Med. Sup.', 'Educación Media Superior', 1),
(3, 'Prim.', 'Primaria', 1),
(4, 'Sec.', 'Secundaria', 1),
(5, 'E. S. T.', 'Técnica', 1),
(6, 'Prep.', 'Preparatoria', 1),
(7, 'Lic.', 'Licenciatura', 1),
(8, 'Esp.', 'Especialidad', 1),
(9, 'Mtr.', 'Maestría', 1),
(10, 'Dr.', 'Doctorado', 1),
(11, 'Ning.', 'Ninguno', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_pp`
--

CREATE TABLE `cat_pp` (
  `id` int(10) NOT NULL,
  `nom_cor` varchar(50) NOT NULL,
  `nom_com` varchar(100) NOT NULL,
  `url_img` varchar(200) NOT NULL,
  `url_web` varchar(200) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cat_pp`
--

INSERT INTO `cat_pp` (`id`, `nom_cor`, `nom_com`, `url_img`, `url_web`, `status`, `fecha_reg`) VALUES
(1, 'PAN', 'Partido Acción Nacional', 'assets/img/pp/pan.png', 'algo', 1, '2024-01-25 18:51:18'),
(2, 'PRI', 'Partido Revolucionario Institucional', 'assets/img/pp/pri.png', 'algo', 1, '2024-01-25 18:51:20'),
(3, 'PRD', 'Partido de la Revolución Democrática', 'assets/img/pp/prd.png', 'algo', 1, '2024-01-25 18:51:31'),
(4, 'PT', 'Partido del Trabajo', 'assets/img/pp/pt.png', 'algo', 1, '2024-01-25 18:51:33'),
(5, 'PVEM', 'Partido Verde Ecologista de México', 'assets/img/pp/pvem.png', 'algo', 1, '2024-01-25 18:51:36'),
(6, 'MC', 'Movimiento Ciudadano', 'assets/img/pp/mc.png', 'algo', 1, '2024-01-25 18:51:38'),
(7, 'PAC', 'Partido Alianza Ciudadana', 'assets/img/pp/pac.png', 'algo', 1, '2024-01-25 18:51:40'),
(8, 'MORENA', 'Movimiento de Regeneración Nacional', 'assets/img/pp/morena.png', 'algo', 1, '2024-01-25 18:51:42'),
(9, 'NA', 'Partido Nueva Alianza Tlaxcala', 'assets/img/pp/na.png', 'algo', 1, '2024-01-25 18:51:44'),
(10, 'RSP', 'Redes Sociales Progresistas Tlaxcala', 'assets/img/pp/rsp.png', 'algo', 1, '2024-01-25 18:51:46'),
(11, 'FxM', 'Fuerza por México Tlaxcala', 'assets/img/pp/fxm.png', 'algo', 1, '2024-01-25 18:51:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_puestos_ite`
--

CREATE TABLE `cat_puestos_ite` (
  `id` int(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cat_puestos_ite`
--

INSERT INTO `cat_puestos_ite` (`id`, `nombre`, `status`) VALUES
(1, 'Auxiliar General B', 1),
(2, 'Auxiliar General A', 1),
(3, 'Auxiliar Electoral B', 1),
(4, 'Auxiliar Electoral A', 1),
(5, 'Jefe de Area', 1),
(6, 'Super Auxiliar A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_roles`
--

CREATE TABLE `cat_roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cat_roles`
--

INSERT INTO `cat_roles` (`id`, `nombre`, `status`, `fecha_reg`) VALUES
(1, 'Super Administrador/a', 1, '2023-08-15 17:33:10'),
(2, 'Administrador/a', 1, '2023-08-15 17:33:10'),
(3, 'Candidata/o', 1, '2023-08-15 17:47:02'),
(4, 'Validador/a', 1, '2023-08-15 17:55:41'),
(5, 'Verificador/a', 1, '2023-09-04 16:28:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_sexo`
--

CREATE TABLE `cat_sexo` (
  `id` int(2) NOT NULL,
  `nombre` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cat_sexo`
--

INSERT INTO `cat_sexo` (`id`, `nombre`, `status`) VALUES
(1, 'Femenino', 1),
(2, 'Masculino', 1),
(3, 'No Binario', 1),
(4, 'Otro Género', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_tipo_cand`
--

CREATE TABLE `cat_tipo_cand` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cat_tipo_cand`
--

INSERT INTO `cat_tipo_cand` (`id`, `nombre`, `status`, `fecha`) VALUES
(1, 'Gobernatura del Estado', 0, '2024-01-25 23:40:40'),
(2, 'Presidencia del Ayuntamiento', 1, '2023-10-26 17:56:08'),
(3, 'Presidencia de Comunidad', 0, '2024-01-26 00:18:25'),
(4, 'Diputación por Mayoría Relativa', 1, '2023-10-26 18:01:36'),
(5, 'Diputación por Representación Proporcional', 1, '2023-10-26 18:01:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador_visitas`
--

CREATE TABLE `contador_visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `fechahora` datetime NOT NULL,
  `conteo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contador_visitas`
--

INSERT INTO `contador_visitas` (`id`, `ip`, `fechahora`, `conteo`) VALUES
(1, '::1', '2024-01-25 19:06:25', 41),
(2, '::1', '2024-01-26 10:02:50', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuest_curricular`
--

CREATE TABLE `cuest_curricular` (
  `id` int(10) NOT NULL,
  `id_user_cand` int(10) NOT NULL,
  `ing_mensual` double DEFAULT NULL,
  `id_grad_acad` int(10) DEFAULT NULL,
  `status_grad_acad` varchar(100) DEFAULT NULL,
  `otra_form_acad` text DEFAULT NULL,
  `historia_prof` longtext DEFAULT NULL,
  `tray_politica` longtext DEFAULT NULL,
  `por_que_ocupar` longtext DEFAULT NULL,
  `prop_1` longtext DEFAULT NULL,
  `prop_2` longtext DEFAULT NULL,
  `prop_gen` longtext DEFAULT NULL,
  `status` int(10) DEFAULT 4,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuest_curricular`
--

INSERT INTO `cuest_curricular` (`id`, `id_user_cand`, `ing_mensual`, `id_grad_acad`, `status_grad_acad`, `otra_form_acad`, `historia_prof`, `tray_politica`, `por_que_ocupar`, `prop_1`, `prop_2`, `prop_gen`, `status`, `fecha_reg`) VALUES
(1, 5, 4000, 7, 'titulado', 'curso prueba', 'pruebas 1', '	\npruebas 1', '	\npruebas 1', '	\npruebas 1', '	\npruebas 1', '	\npruebas 1', 1, '2024-01-25 16:48:07'),
(2, 6, 5000, 7, 'titulado', 'curso prueba 2', 'pruebas 2', '	\npruebas 2', 'pruebas 2', 'pruebas 2', 'pruebas 2', 'pruebas 2', 3, '2024-01-25 16:48:39'),
(3, 7, 20000, 7, 'titulado', NULL, 'pruebas 3', 'pruebas 3', 'pruebas 3', 'pruebas 3', 'pruebas 3', 'pruebas 3', 3, '2024-01-25 16:48:52'),
(4, 8, 21000, 2, 'Constancia', 'Curso de cocina', 'Me he desempeñado en la comunidada LABORAL', 'Me he desempeñado en la comunidada  TRAYECTORIA', 'Me he desempeñado en la comunidada  POR QUE', 'Me he desempeñado en la comunidada P1', 'Me he desempeñado en la comunidada P2', 'Me he desempeñado en la comunidada PG', 3, '2024-01-25 16:59:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuest_curricular_foto`
--

CREATE TABLE `cuest_curricular_foto` (
  `id` int(2) NOT NULL,
  `id_user_cand` int(5) NOT NULL,
  `nombre_foto` text DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 4,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuest_curricular_foto`
--

INSERT INTO `cuest_curricular_foto` (`id`, `id_user_cand`, `nombre_foto`, `ruta`, `status`, `fecha`) VALUES
(1, 5, 'CAND_AYUN_CUPA960604_foto.png', '/perfiles/CAND_AYUN_CUPA960604_foto.png', 1, '2024-01-25 06:00:00'),
(2, 6, NULL, NULL, 4, '2024-01-25 06:00:00'),
(3, 7, NULL, NULL, 4, '2024-01-25 06:00:00'),
(4, 8, NULL, NULL, 4, '2024-01-25 06:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuest_curricular_mc`
--

CREATE TABLE `cuest_curricular_mc` (
  `id` int(2) NOT NULL,
  `id_user_cand` int(4) NOT NULL,
  `face_op` tinyint(1) NOT NULL,
  `face_tx` text DEFAULT NULL,
  `twit_op` tinyint(1) NOT NULL,
  `twit_tx` text DEFAULT NULL,
  `yout_op` tinyint(1) NOT NULL,
  `yout_tx` text DEFAULT NULL,
  `inst_op` tinyint(1) NOT NULL,
  `inst_tx` text DEFAULT NULL,
  `tikt_op` tinyint(1) NOT NULL,
  `tikt_tx` text DEFAULT NULL,
  `otra_op` tinyint(1) NOT NULL,
  `otra_tx` text DEFAULT NULL,
  `pagina_w` text DEFAULT NULL,
  `mail_1` text DEFAULT NULL,
  `mail_2` text DEFAULT NULL,
  `mail_3` text DEFAULT NULL,
  `tel_1` decimal(15,0) NOT NULL,
  `tel_2` decimal(15,0) NOT NULL,
  `tel_3` decimal(15,0) NOT NULL,
  `dire_1` text DEFAULT NULL,
  `dire_2` text DEFAULT NULL,
  `dire_3` text DEFAULT NULL,
  `status` int(2) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuest_curricular_mc`
--

INSERT INTO `cuest_curricular_mc` (`id`, `id_user_cand`, `face_op`, `face_tx`, `twit_op`, `twit_tx`, `yout_op`, `yout_tx`, `inst_op`, `inst_tx`, `tikt_op`, `tikt_tx`, `otra_op`, `otra_tx`, `pagina_w`, `mail_1`, `mail_2`, `mail_3`, `tel_1`, `tel_2`, `tel_3`, `dire_1`, `dire_2`, `dire_3`, `status`, `fecha`) VALUES
(1, 5, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 1, '2024-01-25 10:41:36'),
(2, 6, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 4, '2024-01-25 10:43:19'),
(3, 7, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 4, '2024-01-25 10:44:51'),
(4, 8, 1, 'www.facebook.com', 2, '0', 2, '0', 2, '0', 2, '0', 1, 'www.vk.com/id123', 'www.paginaweb.com', 'correo1@gmail.com', 'correo2@gmail.com', 'No existe respuesta.', 2411000000, 0, 0, 'Direccion 1', 'No existe respuesta.', 'No existe respuesta.', 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuest_identidad`
--

CREATE TABLE `cuest_identidad` (
  `id` int(10) NOT NULL,
  `id_user_cand` int(10) NOT NULL,
  `indigena_p1` int(2) NOT NULL,
  `indigena_p2` int(2) NOT NULL,
  `discapacidad_p1` int(2) NOT NULL,
  `discapacidad_p2` int(2) NOT NULL,
  `discapacidad_p3` int(2) NOT NULL,
  `discapacidad_p4` text NOT NULL,
  `discapacidad_p5` int(2) NOT NULL,
  `discapacidad_p6` text NOT NULL,
  `afromexicano_p1` int(2) NOT NULL,
  `lgbt_p1` int(2) NOT NULL,
  `lgbt_p2` int(2) NOT NULL,
  `lgbt_p3` text NOT NULL,
  `migrante_p1` int(2) NOT NULL,
  `migrante_p2` int(2) NOT NULL,
  `migrante_p3` text NOT NULL,
  `migrante_p4` int(2) NOT NULL,
  `migrante_p5` int(2) NOT NULL,
  `migrante_p6` text NOT NULL,
  `migrante_p7` int(11) NOT NULL,
  `joven_mayor` tinyint(1) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 4,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuest_identidad`
--

INSERT INTO `cuest_identidad` (`id`, `id_user_cand`, `indigena_p1`, `indigena_p2`, `discapacidad_p1`, `discapacidad_p2`, `discapacidad_p3`, `discapacidad_p4`, `discapacidad_p5`, `discapacidad_p6`, `afromexicano_p1`, `lgbt_p1`, `lgbt_p2`, `lgbt_p3`, `migrante_p1`, `migrante_p2`, `migrante_p3`, `migrante_p4`, `migrante_p5`, `migrante_p6`, `migrante_p7`, `joven_mayor`, `status`, `fecha_reg`) VALUES
(1, 5, 2, 2, 2, 0, 0, '0', 0, '0', 2, 1, 3, '0', 2, 0, '0', 0, 0, '0', 0, 1, 1, '2024-01-25 16:52:33'),
(2, 6, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, 4, '2024-01-25 16:43:19'),
(3, 7, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, 4, '2024-01-25 16:44:51'),
(4, 8, 2, 2, 2, 0, 0, '0', 0, '0', 2, 2, 0, '0', 2, 0, '0', 0, 0, '0', 0, 0, 3, '2024-01-25 16:58:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_administradores`
--

CREATE TABLE `c_administradores` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `a_pate` varchar(100) NOT NULL,
  `a_mate` varchar(100) NOT NULL,
  `id_area` int(10) NOT NULL,
  `id_puesto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `c_administradores`
--

INSERT INTO `c_administradores` (`id`, `id_user`, `nombre`, `a_pate`, `a_mate`, `id_area`, `id_puesto`) VALUES
(1, 1, 'Área', 'Tecnica de', 'Informatica', 12, 0),
(2, 2, 'Francisco', 'Ceron', 'Guevara', 12, 3),
(3, 3, 'Diana Saidi', 'Ortiz', 'Conde', 5, 3),
(4, 4, 'Braulio', 'Mejia', 'Manilla', 13, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_candidatos`
--

CREATE TABLE `c_candidatos` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_tipo_cand` int(10) NOT NULL,
  `id_administrador` int(10) NOT NULL,
  `fecha_admin` datetime NOT NULL DEFAULT current_timestamp(),
  `id_verificador` int(10) DEFAULT NULL,
  `fehca_veri` datetime DEFAULT current_timestamp(),
  `id_validador` int(10) DEFAULT NULL,
  `fecha_vali` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `c_candidatos`
--

INSERT INTO `c_candidatos` (`id`, `id_user`, `id_tipo_cand`, `id_administrador`, `fecha_admin`, `id_verificador`, `fehca_veri`, `id_validador`, `fecha_vali`) VALUES
(1, 5, 2, 2, '2024-01-25 10:41:36', NULL, '2024-01-25 10:41:36', NULL, '2024-01-25 10:41:36'),
(2, 6, 2, 2, '2024-01-25 10:43:19', NULL, '2024-01-25 10:43:19', NULL, '2024-01-25 10:43:19'),
(3, 7, 2, 2, '2024-01-25 10:44:51', NULL, '2024-01-25 10:44:51', NULL, '2024-01-25 10:44:51'),
(4, 8, 2, 3, '2024-01-25 10:55:25', NULL, '2024-01-25 10:55:25', NULL, '2024-01-25 10:55:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_cand_ayun`
--

CREATE TABLE `c_cand_ayun` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nombre` text NOT NULL,
  `a_pate` text NOT NULL,
  `a_mate` text NOT NULL,
  `sobrenombre` varchar(50) NOT NULL,
  `curp` text NOT NULL,
  `sexo` int(10) NOT NULL,
  `f_nacimiento` date NOT NULL DEFAULT current_timestamp(),
  `l_nacimiento` text NOT NULL,
  `t_residencia` text NOT NULL,
  `pp` int(10) NOT NULL,
  `id_municipio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `c_cand_ayun`
--

INSERT INTO `c_cand_ayun` (`id`, `id_user`, `nombre`, `a_pate`, `a_mate`, `sobrenombre`, `curp`, `sexo`, `f_nacimiento`, `l_nacimiento`, `t_residencia`, `pp`, `id_municipio`) VALUES
(1, 5, 'Juan', 'Perez', 'Flores', '', 'PEFJ990101HTLRRL01', 2, '1999-01-01', 'Tlaxcala', '10-10', 1, 11),
(2, 6, 'Pedro', 'Molina', 'Gutierrez', '', 'MOGP200202HTLRRL02', 2, '2002-02-20', 'Tlaxcala', '10-10', 1, 7),
(3, 7, 'Maria', 'Magdalena', 'Olivarez', '', 'MAOM101080MTLRRL03', 1, '1980-10-10', 'Tlaxcala', '20-10', 5, 44),
(4, 8, 'Gabriela', 'Macias', 'Muñoz', '', 'MAMG040696MTLFFL03', 1, '1996-06-04', 'Tlaxcala', '20-7', 6, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_cand_dip_mr`
--

CREATE TABLE `c_cand_dip_mr` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nombre` text NOT NULL,
  `a_pate` text NOT NULL,
  `a_mate` text NOT NULL,
  `sobrenombre` varchar(20) NOT NULL,
  `curp` text NOT NULL,
  `sexo` int(10) NOT NULL,
  `seccion` int(6) NOT NULL,
  `distrito` int(6) NOT NULL,
  `f_nacimiento` date NOT NULL DEFAULT current_timestamp(),
  `l_nacimiento` text NOT NULL,
  `t_residencia` text NOT NULL,
  `pp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_cand_dip_rp`
--

CREATE TABLE `c_cand_dip_rp` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nombre` text NOT NULL,
  `a_pate` text NOT NULL,
  `a_mate` text NOT NULL,
  `sobrenombre` varchar(20) NOT NULL,
  `curp` text NOT NULL,
  `sexo` int(10) NOT NULL,
  `seccion` int(6) NOT NULL,
  `distrito` int(6) NOT NULL,
  `f_nacimiento` date NOT NULL DEFAULT current_timestamp(),
  `l_nacimiento` text NOT NULL,
  `t_residencia` text NOT NULL,
  `pp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_usuarios`
--

CREATE TABLE `c_usuarios` (
  `id_user` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `id_rol` int(10) NOT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `c_usuarios`
--

INSERT INTO `c_usuarios` (`id_user`, `user_name`, `password`, `status`, `id_rol`, `fecha_reg`) VALUES
(1, 'SUPER_ADMINISTRADOR', 'aba0bd3f', 1, 1, '2024-01-17 17:27:03'),
(2, 'ADMIN_FRAN_CER_GUE', '79fdf543', 1, 2, '2024-01-25 16:37:37'),
(3, 'ADMIN_DIAN_ORT_CON', 'd67da78d', 1, 2, '2024-01-25 16:38:35'),
(4, 'ADMIN_BRAU_MEJ_MAN', 'ab4f4556', 1, 2, '2024-01-25 16:39:40'),
(5, 'CAND_AYUN_PEFJ990101', '5096e8e3', 1, 3, '2024-01-25 16:41:36'),
(6, 'CAND_AYUN_MOGP200202', '4923f224', 1, 3, '2024-01-25 16:43:19'),
(7, 'CAND_AYUN_MAOM101080', '2a00bcd6', 1, 3, '2024-01-25 16:44:51'),
(8, 'CAND_AYUN_MAMG040696', 'a9b6d5eb', 1, 3, '2024-01-25 16:55:24'),
(9, 'VALID_MIGUE_MAR_RAM', '3614afec', 1, 4, '2024-01-25 18:56:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_validadores`
--

CREATE TABLE `c_validadores` (
  `id` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nombre` text NOT NULL,
  `a_pate` text NOT NULL,
  `a_mate` text NOT NULL,
  `pp` int(5) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 4,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `c_validadores`
--

INSERT INTO `c_validadores` (`id`, `id_user`, `nombre`, `a_pate`, `a_mate`, `pp`, `status`, `fecha_reg`) VALUES
(1, 9, 'Miguel', 'Martinez', 'Ramos', 0, 4, '2024-01-25 18:56:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_verificadores`
--

CREATE TABLE `c_verificadores` (
  `id` int(2) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nombre` text NOT NULL,
  `a_pate` text NOT NULL,
  `a_mate` text NOT NULL,
  `id_area` int(2) NOT NULL,
  `id_puesto` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visits_info`
--

CREATE TABLE `visits_info` (
  `id` int(11) NOT NULL,
  `id_cont_visitas` int(11) NOT NULL,
  `user_agent` varchar(100) NOT NULL,
  `navegador` varchar(100) NOT NULL,
  `nav_version` varchar(100) NOT NULL,
  `sis_op` varchar(100) NOT NULL,
  `pattern` varchar(100) NOT NULL,
  `dispositivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `visits_info`
--

INSERT INTO `visits_info` (`id`, `id_cont_visitas`, `user_agent`, `navegador`, `nav_version`, `sis_op`, `pattern`, `dispositivo`) VALUES
(1, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Sa', 'Chrome', '120.0.0.0', 'windows', '#(?<browser>Version|Chrome|other)[/ ]+(?<version>[0-9.|a-zA-Z.]*)#', 'Desktop'),
(2, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Sa', 'Chrome', '120.0.0.0', 'windows', '#(?<browser>Version|Chrome|other)[/ ]+(?<version>[0-9.|a-zA-Z.]*)#', 'Desktop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `v_avisopriv`
--

CREATE TABLE `v_avisopriv` (
  `id` int(10) NOT NULL,
  `id_user_cand` int(10) NOT NULL,
  `aviso_1` tinyint(1) DEFAULT 0,
  `fecha_a_1` timestamp NULL DEFAULT NULL,
  `aviso_2` tinyint(1) DEFAULT 0,
  `fecha_a_2` timestamp NULL DEFAULT NULL,
  `aviso_3` tinyint(1) DEFAULT 0,
  `fecha_a_3` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `v_avisopriv`
--

INSERT INTO `v_avisopriv` (`id`, `id_user_cand`, `aviso_1`, `fecha_a_1`, `aviso_2`, `fecha_a_2`, `aviso_3`, `fecha_a_3`) VALUES
(1, 5, 1, '2024-01-25 17:43:23', 1, '2024-01-25 17:43:23', 0, NULL),
(2, 6, 1, '2024-01-25 17:45:58', 1, '2024-01-25 17:45:58', 0, NULL),
(3, 7, 0, NULL, 0, NULL, 0, NULL),
(4, 8, 1, '2024-01-25 16:55:54', 1, '2024-01-25 16:55:54', 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_areas_ite`
--
ALTER TABLE `cat_areas_ite`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_ayuntamientos`
--
ALTER TABLE `cat_ayuntamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_charts`
--
ALTER TABLE `cat_charts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_charts_estad`
--
ALTER TABLE `cat_charts_estad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_distritos_electorales`
--
ALTER TABLE `cat_distritos_electorales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_estados`
--
ALTER TABLE `cat_estados`
  ADD PRIMARY KEY (`id_edo`);

--
-- Indices de la tabla `cat_grad_academ`
--
ALTER TABLE `cat_grad_academ`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_pp`
--
ALTER TABLE `cat_pp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_puestos_ite`
--
ALTER TABLE `cat_puestos_ite`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_roles`
--
ALTER TABLE `cat_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_sexo`
--
ALTER TABLE `cat_sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_tipo_cand`
--
ALTER TABLE `cat_tipo_cand`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contador_visitas`
--
ALTER TABLE `contador_visitas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuest_curricular`
--
ALTER TABLE `cuest_curricular`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuest_curricular_foto`
--
ALTER TABLE `cuest_curricular_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuest_curricular_mc`
--
ALTER TABLE `cuest_curricular_mc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuest_identidad`
--
ALTER TABLE `cuest_identidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `c_administradores`
--
ALTER TABLE `c_administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `c_candidatos`
--
ALTER TABLE `c_candidatos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `c_cand_ayun`
--
ALTER TABLE `c_cand_ayun`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `c_cand_dip_mr`
--
ALTER TABLE `c_cand_dip_mr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `c_cand_dip_rp`
--
ALTER TABLE `c_cand_dip_rp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `c_usuarios`
--
ALTER TABLE `c_usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `c_validadores`
--
ALTER TABLE `c_validadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `c_verificadores`
--
ALTER TABLE `c_verificadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visits_info`
--
ALTER TABLE `visits_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `v_avisopriv`
--
ALTER TABLE `v_avisopriv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_areas_ite`
--
ALTER TABLE `cat_areas_ite`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `cat_ayuntamientos`
--
ALTER TABLE `cat_ayuntamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `cat_charts`
--
ALTER TABLE `cat_charts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cat_charts_estad`
--
ALTER TABLE `cat_charts_estad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cat_distritos_electorales`
--
ALTER TABLE `cat_distritos_electorales`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cat_estados`
--
ALTER TABLE `cat_estados`
  MODIFY `id_edo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `cat_grad_academ`
--
ALTER TABLE `cat_grad_academ`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cat_pp`
--
ALTER TABLE `cat_pp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cat_puestos_ite`
--
ALTER TABLE `cat_puestos_ite`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cat_roles`
--
ALTER TABLE `cat_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cat_sexo`
--
ALTER TABLE `cat_sexo`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cat_tipo_cand`
--
ALTER TABLE `cat_tipo_cand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contador_visitas`
--
ALTER TABLE `contador_visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cuest_curricular`
--
ALTER TABLE `cuest_curricular`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cuest_curricular_foto`
--
ALTER TABLE `cuest_curricular_foto`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cuest_curricular_mc`
--
ALTER TABLE `cuest_curricular_mc`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cuest_identidad`
--
ALTER TABLE `cuest_identidad`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `c_administradores`
--
ALTER TABLE `c_administradores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `c_candidatos`
--
ALTER TABLE `c_candidatos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `c_cand_ayun`
--
ALTER TABLE `c_cand_ayun`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `c_cand_dip_mr`
--
ALTER TABLE `c_cand_dip_mr`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `c_cand_dip_rp`
--
ALTER TABLE `c_cand_dip_rp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `c_usuarios`
--
ALTER TABLE `c_usuarios`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `c_validadores`
--
ALTER TABLE `c_validadores`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `c_verificadores`
--
ALTER TABLE `c_verificadores`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visits_info`
--
ALTER TABLE `visits_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `v_avisopriv`
--
ALTER TABLE `v_avisopriv`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
