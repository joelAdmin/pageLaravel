-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2017 a las 21:33:07
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pebg_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id_Ban` int(10) UNSIGNED NOT NULL,
  `title_ban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_ban` longtext COLLATE utf8_unicode_ci NOT NULL,
  `url_ban` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_ban` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id_Ban`, `title_ban`, `content_ban`, `url_ban`, `status_ban`, `created_at`, `updated_at`) VALUES
(1, 'Jornada en Camaguan', '<p>Jornada de orientaci&oacute;n jur&iacute;dica en el Municipio Esteros de Camaguan, el 18 de Febrero de 2016.</p>', 'img_8523.png', 1, '2017-05-15 19:30:12', '2017-05-15 19:30:12'),
(2, 'Jornada en Altagracia', '<p>Personal de la Procuradur&iacute;a General del Edo. Bolivariano de Gu&aacute;rico particip&oacute; en la Jornada de Asesoramiento Jur&iacute;dico Integral realizada en la ciudad de Altagracia de Orituco el &nbsp;17 de marzo de 2016 .ggggggggg bbr5 v gbtnt tt bbb</p>\r\n', 'C:\\xampp\\tmp\\php5224.tmp', 1, '2017-05-15 19:32:42', '2017-06-02 17:29:48'),
(3, 'Participación del ejercicio militar.', 'El personal acudió durante los dos fines de semanas pasados, tanto Directivos como empleados y obreros asistieron a la capacitación y formación militar ...<a class=\\"font_submenu\\" id=\\"submenu_2\\" href=\\"index.php?controlador=Noticia&accion=leerMas&dato=9\\" onclick=\\"#\\"><i class=\\"fa fa-plus fa-fw\\"></i>Mas</a>', 'img_1767.png', 1, '2017-05-15 19:33:53', '2017-05-15 19:33:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_notices`
--

CREATE TABLE `category_notices` (
  `id_Cat` int(10) UNSIGNED NOT NULL,
  `name_cat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_cat` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `category_notices`
--

INSERT INTO `category_notices` (`id_Cat`, `name_cat`, `status_cat`, `created_at`, `updated_at`) VALUES
(1, 'Política', 1, '2017-04-01 05:04:32', '2017-04-01 05:04:32'),
(2, 'Religión', 1, '2017-04-01 05:04:32', '2017-04-01 05:04:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id_Img` int(10) UNSIGNED NOT NULL,
  `name_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_img` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id_Img`, `name_img`, `url_img`, `status_img`, `created_at`, `updated_at`) VALUES
(1, 'img_5188.png', 'img_5188.png', 1, '2017-04-01 05:55:43', '2017-04-01 05:55:43'),
(2, 'img_5188.png', 'img_5188.png', 1, '2017-04-07 18:42:15', '2017-04-07 18:42:15'),
(3, 'img_5188.png', 'img_5188.png', 1, '2017-04-07 19:37:41', '2017-04-07 19:37:41'),
(4, 'img_21661.png', 'img_21661.png', 1, '2017-04-26 23:03:55', '2017-04-26 23:03:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images_notices`
--

CREATE TABLE `images_notices` (
  `id_NotImg` int(10) UNSIGNED NOT NULL,
  `id_not` int(10) UNSIGNED NOT NULL,
  `id_img` int(10) UNSIGNED NOT NULL,
  `status_notImg` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `images_notices`
--

INSERT INTO `images_notices` (`id_NotImg`, `id_not`, `id_img`, `status_notImg`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 2, 2, 1, NULL, NULL),
(3, 3, 3, 1, NULL, NULL),
(4, 4, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id_Men` int(10) UNSIGNED NOT NULL,
  `etiqueta_men` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_men` longtext COLLATE utf8_unicode_ci,
  `position_men` int(11) DEFAULT NULL,
  `url_men` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_men` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_men` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active_men` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id_Men`, `etiqueta_men`, `content_men`, `position_men`, `url_men`, `class_men`, `event_men`, `active_men`, `created_at`, `updated_at`) VALUES
(1, 'atención ciudadana  ', '', 2, '#', '', '', 1, '2017-04-17 18:53:12', '2017-07-11 22:50:46'),
(2, 'contacto', '', 12, '#', '', '', 1, '2017-04-17 18:53:36', '2017-07-11 22:54:20'),
(3, 'insttitución', '', 1, '#', '', '', 1, '2017-04-17 23:35:36', '2017-07-11 22:49:39'),
(4, 'marco legal ', '<p>ccccccccccccccccc</p>\r\n', 3, '#', '', '', 1, '2017-04-21 21:53:18', '2017-07-11 22:54:21'),
(5, 'enlaces', '', 5, '#', '', '', 1, '2017-04-24 20:29:51', '2017-07-11 22:54:21'),
(6, 'galeria', '', 13, '#', '', '', 1, '2017-07-11 22:53:29', '2017-07-11 22:54:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2017_03_03_084827_create_category_notices_table', 1),
(32, '2017_03_03_084849_create_scope_notices_table', 1),
(33, '2017_03_03_084850_create_notices_table', 1),
(34, '2017_03_06_031138_create_images_table', 1),
(35, '2017_03_06_032554_create_images_notices_table', 1),
(36, '2017_04_14_191850_create_menus_table', 2),
(37, '2017_04_14_191911_create_submenus_table', 2),
(39, '2017_05_11_150406_create_banners_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notices`
--

CREATE TABLE `notices` (
  `id_Not` int(10) UNSIGNED NOT NULL,
  `id_cat` int(10) UNSIGNED NOT NULL,
  `id_sco` int(10) UNSIGNED NOT NULL,
  `anteater_not` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_not` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle_not` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_not` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source_not` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_source_not` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inlet_not` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content_not` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type_not` enum('normal','interest') COLLATE utf8_unicode_ci NOT NULL,
  `estatus_not` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `notices`
--

INSERT INTO `notices` (`id_Not`, `id_cat`, `id_sco`, `anteater_not`, `title_not`, `subtitle_not`, `author_not`, `source_not`, `url_source_not`, `inlet_not`, `content_not`, `type_not`, `estatus_not`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', 'Esta Constituyente que vamos a elegir el 30 de julio tiene varias misiones que cumplir. La primera de todas es la paz" sostuvo el presidente venezolano Nicolás Maduro', 'Esta Constituyente que vamos a elegir el 30 de julio .', 'Juan Peña', '', '', '<p><strong>Esta Constituyente que vamos a elegir el 30 de julio tiene varias misiones que cumplir. La primera de todas es la paz&quot; sostuvo el presidente venezolano Nicol&aacute;s Maduro.</strong></p>\r\n', '<h3>&nbsp;</h3>\r\n\r\n<div id="div-gpt-ad-1472165573407-0" style="margin: 0px; padding: 0px; outline: 0px; border: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; height: 1px; width: 1px;">&nbsp;</div>\r\n\r\n<div class="txt_newworld" style="margin: 0px; padding: 0px; outline: 0px; border: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 22px; clear: both; width: 518.344px; color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;">\r\n<p>La Asamblea Nacional Constituyente, cuyos miembros ser&aacute;n electos el pr&oacute;ximo 30 de julio, tendr&aacute; tres objetivos fundamentales para afianzar el bienestar del pa&iacute;s y del pueblo venezolano.</p>\r\n\r\n<p>&quot;La constituyente de&nbsp;2017 tiene tres objetivos.&nbsp;<strong>El primero, lograr la paz y la justicia</strong>, transformando el estado y cambiando todo lo que haya que cambiar.&nbsp;<strong>Lo segundo, establecer la seguridad jur&iacute;dica y social para el pueblo</strong>&nbsp;y&nbsp;<strong>el tercero perfeccionar y ampliar la Constituci&oacute;n</strong>&nbsp;pionera de 1999&quot;, explic&oacute; el mandatario.</p>\r\n\r\n<p>Desde el Complejo Francisco de Miranda, en el estado Bol&iacute;var, el mandatario venezolano enfatiz&oacute; que este proceso constituyente, establecido en la Carta Magna en su art&iacute;culo 347, tiene diferentes objetivos que cuando se cre&oacute; la Constituci&oacute;n pionera del pa&iacute;s, impulsada por el entonces presidente&nbsp;Hugo Ch&aacute;vez.&nbsp;</p>\r\n\r\n<p>&gt;&gt;&nbsp;<a href="http://s%C3%B3lo%20cne%20puede%20organizar%20procesos%20electorales%20en%20venezuela/" style="margin: 0px; padding: 0px; outline: none; background: transparent; text-decoration-line: none; color: rgb(16, 96, 147); transition: all 0.5s; font-weight: bold;">S&oacute;lo CNE puede organizar procesos electorales en Venezuela</a></p>\r\n\r\n<p>Sostuvo que esta nueva Carta Magna&nbsp;permitir&aacute; garantizar la paz y la estabilidad de la naci&oacute;n, atacada en los &uacute;ltimos meses por sectores de la oposici&oacute;n que han financiado y orquestados grupos &nbsp;violentos.</p>\r\n\r\n<p>&quot;Esta Constituyente que vamos a elegir el 30 de julio tiene varias misiones que cumplir. La primera de todas es la paz, lograr la paz a trav&eacute;s del di&aacute;logo, del entendimiento nacional&nbsp;de verdad, no con la &eacute;lite pol&iacute;tica de la MUD (Mesa de la Unidad Democr&aacute;tica). Con ellos hay que hablar, pero hay que hablar con el vecino del barrio, de la comunidad, un gran di&aacute;logo constituyente&quot;, detall&oacute;.&nbsp;</p>\r\n\r\n<p>Por otra parte, el jefe de Estado&nbsp;presentar&aacute; a la Asamblea Nacional Constituyente un proyecto ley constitucional para regularizar precios de bienes y servicios, &aacute;rea que es atacada como parte de la guerra econ&oacute;mica.</p>\r\n</div>\r\n', 'normal', 1, '2017-04-01 05:55:43', '2017-07-11 22:33:33'),
(2, 1, 1, '', 'contundentes a las necesidades del pueblo', 'contundentes a las necesidades del pueblo', 'perez guillermoss', 'lyks', '', '<p><span style="background-color:rgb(255, 255, 255); color:rgb(0, 0, 0); font-family:open_sansregular; font-size:12px">vinfo si estas interesado, podemos llegar a un acuerdo monetario con lo que has desarrollado ya que estoy haciendo un trabajo para un hospital y necesito algo como lo que tu estas ofreciendo, ya que estoy trabajando con un lector de huellas anviz ep300 y no he logrado hacer la comunicacion!.............</span></p>\r\n\r\n<p><span style="color:rgb(0, 0, 0); font-family:open_sansregular; font-size:12px">vinfo si estas interesado, podemos llegar a un acuerdo monetario con lo que has desarrollado ya que estoy haciendo un trabajo para un hospital y necesito algo como lo que tu estas ofreciendo, ya que estoy trabajando con un lector de huellas anviz ep300 y no he logrado hacer la comunicacion!.............</span></p>\r\n', '<p><span style="background-color:rgb(255, 255, 255); color:rgb(0, 0, 0); font-family:open_sansregular; font-size:12px">vinfo si estas interesado, podemos llegar a un acuerdo monetario con lo que has desarrollado ya que estoy haciendo un trabajo para un hospital y necesito algo como lo que tu estas ofreciendo, ya que estoy trabajando con un lector de huellas anviz ep300 y no he logrado hacer la comunicacion!vinfo si estas interesado, podemos llegar a un acuerdo monetario con lo que has desarrollado ya que estoy haciendo un trabajo para un hospital y necesito algo como lo que tu estas ofreciendo, ya que estoy trabajando con un lector de huellas anviz ep300 y no he logrado hacer la comunicacion!vinfo si estas interesado, podemos llegar a un acuerdo monetario con lo que has desarrollado ya que estoy haciendo un trabajo para un hospital y necesito algo como lo que tu estas ofreciendo, ya que estoy trabajando con un lector de huellas anviz ep300 y no he logrado hacer la comunicacion!vinfo si estas interesado, podemos llegar a un acuerdo monetario con lo que has desarrollado ya que estoy haciendo un trabajo para un hospital y necesito algo como lo que tu estas ofreciendo, ya que estoy trabajando con un lector de huellas anviz ep300 y no he logrado hacer la comunicacion!vinfo si estas interesado, podemos llegar a un acuerdo monetario con lo que has desarrollado ya que estoy haciendo un trabajo para un hospital y necesito algo como lo que tu estas ofreciendo, ya que estoy trabajando con un lector de huellas anviz ep300 y no he logrado hacer la comunicacion!</span></p>\r\n', 'normal', 1, '2017-04-07 18:42:15', '2017-05-17 23:30:33'),
(3, 1, 3, '', ' Tillerson viaja a Qatar para "buscar" salida a crisis regional', ' Tillerson viaja a Qatar ', 'perez guillermo', 'lyks', '', '<p><span style="color:rgb(0, 0, 0); font-family:open sans,sans-serif; font-size:14px">Rex Tillerson lleg&oacute; este martes a Catar para &quot;encontrar&quot; mecanismos que ayuden a finalizar la crisis diplom&aacute;tica entre Qatar y los cuatro pa&iacute;ses que le bloquean desde el pasado 5 de junio</span></p>\r\n', '<p><span style="color:rgb(0, 0, 0); font-family:open sans,sans-serif; font-size:14px">Rex Tillerson lleg&oacute; este martes a Catar para &quot;encontrar&quot; mecanismos que ayuden a finalizar la crisis diplom&aacute;tica entre Qatar y los cuatro pa&iacute;ses que le bloquean desde el pasado 5 de junio</span></p>\r\n', 'interest', 1, '2017-04-07 19:37:40', '2017-07-11 23:30:52'),
(4, 1, 1, '', 'Istúriz activó en Miranda el Plan 100 días para la Siembra Urbana: ', 'Istúriz activó en Miranda el Plan 100 ', 'Juan Peña', 'ssssssssssssssssss', '', '<p>yykykykyk</p>\r\n', '<p>ykykyk</p>\r\n', 'normal', 1, '2017-04-26 23:03:54', '2017-04-26 23:03:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scope_notices`
--

CREATE TABLE `scope_notices` (
  `id_Sco` int(10) UNSIGNED NOT NULL,
  `name_sco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_sco` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `scope_notices`
--

INSERT INTO `scope_notices` (`id_Sco`, `name_sco`, `status_sco`, `created_at`, `updated_at`) VALUES
(1, 'Local', 1, '2017-04-01 05:04:32', '2017-04-01 05:04:32'),
(2, 'Regional', 1, '2017-04-01 05:04:32', '2017-04-01 05:04:32'),
(3, 'Nacional', 1, '2017-04-01 05:04:32', '2017-04-01 05:04:32'),
(4, 'Internacional', 1, '2017-04-01 05:04:32', '2017-04-01 05:04:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenus`
--

CREATE TABLE `submenus` (
  `id_Sub` int(10) UNSIGNED NOT NULL,
  `id_men` int(10) UNSIGNED NOT NULL,
  `etiqueta_sub` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_sub` longtext COLLATE utf8_unicode_ci,
  `position_sub` int(11) DEFAULT NULL,
  `url_sub` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_sub` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_sub` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active_sub` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `submenus`
--

INSERT INTO `submenus` (`id_Sub`, `id_men`, `etiqueta_sub`, `content_sub`, `position_sub`, `url_sub`, `class_sub`, `event_sub`, `active_sub`, `created_at`, `updated_at`) VALUES
(1, 1, 'submgerg jj', '<p>fwffefefe</p>\r\n', 1, '#', '', 'showSubmenuAjax(this.id);', 1, '2017-04-25 17:02:45', '2017-05-02 22:23:41'),
(3, 1, 'fewfefef rg', '<p>j7j7j7j</p>\r\n', 2, '#', '', 'showSubmenuAjax(this.id);', 1, NULL, '2017-04-26 22:35:28'),
(4, 3, 'submenu 3.1', '<div class="question" id="question" style="margin: 0px; padding: 0px; border: 0px; clear: both; color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;">\r\n<table style="border-collapse:collapse; border-spacing:0px; border:0px; margin:0px; padding:0px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="vertical-align:top">\r\n			<div class="vote" style="margin: 0px; padding: 0px; border: 0px; text-align: center; min-width: 46px;">voto a favor<span style="color:rgb(106, 115, 124); font-size:20px">1</span>votar en contra<a class="star-off" href="https://es.stackoverflow.com/questions/48137/validar-tama%C3%B1o-de-un-archivo-laravel#" style="margin: 0px auto 2px; padding: 0px; border: 0px; font-size: 1px; color: rgb(0, 119, 204); text-decoration-line: none; cursor: pointer; background-image: url(&quot;img/sprites.svg?v=5ab37de095d9&quot;), none; background-size: initial; background-repeat: no-repeat; overflow: hidden; display: block; text-indent: -9999em; width: 40px; height: 30px; background-position: 0px -120px;">favorito</a>\r\n\r\n			<div class="favoritecount" style="margin: 0px; padding: 0px; border: 0px;">&nbsp;</div>\r\n			</div>\r\n			</td>\r\n			<td style="vertical-align:top">\r\n			<div style="margin: 0px; padding: 0px; border: 0px;">\r\n			<div class="post-text" style="margin: 0px 0px 5px; padding: 0px; border: 0px; font-size: 15px; width: 660px; word-wrap: break-word; line-height: 1.3;">\r\n			<p>Estoy cargando archivos desde el form al servidor de la siguiente manera:</p>\r\n\r\n			<pre>\r\n<code><span style="color:rgb(48, 51, 54)">$files </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(43, 145, 175)">Input</span><span style="color:rgb(48, 51, 54)">::</span><span style="color:rgb(48, 51, 54)">file</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(125, 39, 39)">&#39;archivoExamenMedicoDetalle&#39;</span><span style="color:rgb(48, 51, 54)">);</span><span style="color:rgb(48, 51, 54)">\r\n</span><span style="color:rgb(16, 16, 148)">for</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">$i </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(125, 39, 39)">0</span><span style="color:rgb(48, 51, 54)">;</span><span style="color:rgb(48, 51, 54)"> $i </span><span style="color:rgb(48, 51, 54)">&lt;</span><span style="color:rgb(48, 51, 54)"> $contadorDetalle</span><span style="color:rgb(48, 51, 54)">;</span><span style="color:rgb(48, 51, 54)"> $i</span><span style="color:rgb(48, 51, 54)">++)</span><span style="color:rgb(48, 51, 54)">\r\n</span><span style="color:rgb(48, 51, 54)">{</span><span style="color:rgb(48, 51, 54)">\r\n   $file </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> $files</span><span style="color:rgb(48, 51, 54)">[</span><span style="color:rgb(48, 51, 54)">$i</span><span style="color:rgb(48, 51, 54)">]</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(48, 51, 54)">;</span><span style="color:rgb(48, 51, 54)">\r\n   $rutaImagen </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(125, 39, 39)">&#39;&#39;</span><span style="color:rgb(48, 51, 54)">;</span><span style="color:rgb(48, 51, 54)">\r\n   $destinationPath </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(125, 39, 39)">&#39;/carpetacontenedora/&#39;</span><span style="color:rgb(48, 51, 54)">;</span><span style="color:rgb(48, 51, 54)">\r\n   </span><span style="color:rgb(16, 16, 148)">if</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">isset</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">$file</span><span style="color:rgb(48, 51, 54)">))</span><span style="color:rgb(48, 51, 54)">\r\n   </span><span style="color:rgb(48, 51, 54)">{</span><span style="color:rgb(48, 51, 54)">\r\n       $filename </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> $destinationPath </span><span style="color:rgb(48, 51, 54)">.</span><span style="color:rgb(48, 51, 54)"> file</span><span style="color:rgb(48, 51, 54)">-&gt;</span><span style="color:rgb(48, 51, 54)">getClientOriginalName</span><span style="color:rgb(48, 51, 54)">();</span><span style="color:rgb(48, 51, 54)">\r\n       \\Storage</span><span style="color:rgb(48, 51, 54)">::</span><span style="color:rgb(48, 51, 54)">disk</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(125, 39, 39)">&#39;local&#39;</span><span style="color:rgb(48, 51, 54)">)-&gt;</span><span style="color:rgb(48, 51, 54)">put</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">$filename</span><span style="color:rgb(48, 51, 54)">,</span><span style="color:rgb(48, 51, 54)"> \\File</span><span style="color:rgb(48, 51, 54)">::</span><span style="color:rgb(16, 16, 148)">get</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">$file</span><span style="color:rgb(48, 51, 54)">));</span><span style="color:rgb(48, 51, 54)">\r\n       $rutaImagen </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(125, 39, 39)">&#39;carpetacontenedora/&#39;</span><span style="color:rgb(48, 51, 54)">.</span><span style="color:rgb(48, 51, 54)">$file</span><span style="color:rgb(48, 51, 54)">-&gt;</span><span style="color:rgb(48, 51, 54)">getClientOriginalName</span><span style="color:rgb(48, 51, 54)">();</span><span style="color:rgb(48, 51, 54)">\r\n\r\n\r\n       $data</span><span style="color:rgb(48, 51, 54)">[</span><span style="color:rgb(125, 39, 39)">&#39;fotoExamenMedicoDetalle&#39;</span><span style="color:rgb(48, 51, 54)">]</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)">  $rutaImagen</span><span style="color:rgb(48, 51, 54)">;</span><span style="color:rgb(48, 51, 54)">\r\n\r\n   </span><span style="color:rgb(48, 51, 54)">}</span><span style="color:rgb(48, 51, 54)">\r\n   </span><span style="color:rgb(16, 16, 148)">else</span><span style="color:rgb(48, 51, 54)">\r\n   </span><span style="color:rgb(48, 51, 54)">{</span><span style="color:rgb(48, 51, 54)">\r\n       $rutaImagen </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> $request</span><span style="color:rgb(48, 51, 54)">[</span><span style="color:rgb(125, 39, 39)">&#39;fotoExamenMedicoDetalle&#39;</span><span style="color:rgb(48, 51, 54)">][</span><span style="color:rgb(48, 51, 54)">$i</span><span style="color:rgb(48, 51, 54)">];</span><span style="color:rgb(48, 51, 54)">\r\n   </span><span style="color:rgb(48, 51, 54)">}</span><span style="color:rgb(48, 51, 54)">\r\n</span><span style="color:rgb(48, 51, 54)">}</span></code></pre>\r\n\r\n			<p>Seg&uacute;n lo que estuve consultando, validar el tama&ntilde;o de un archivo desde java script no es posible, s&oacute;lo se puede hacer directamente desde el servidor, as&iacute; que supuse que hacer lo siguiente podr&iacute;a validar que si el archivo supera el l&iacute;mite permitido no dejara continuar y se quedara en el formulario.</p>\r\n\r\n			<pre>\r\n<code><span style="color:rgb(16, 16, 148)">if</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">isset</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">$file</span><span style="color:rgb(48, 51, 54)">))</span><span style="color:rgb(48, 51, 54)">\r\n   </span><span style="color:rgb(48, 51, 54)">{</span><span style="color:rgb(48, 51, 54)">\r\n       $filename </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> $destinationPath </span><span style="color:rgb(48, 51, 54)">.</span><span style="color:rgb(48, 51, 54)"> file</span><span style="color:rgb(48, 51, 54)">-&gt;</span><span style="color:rgb(48, 51, 54)">getClientOriginalName</span><span style="color:rgb(48, 51, 54)">();</span><span style="color:rgb(48, 51, 54)">\r\n\r\n       $tama</span><span style="color:rgb(48, 51, 54)">&ntilde;</span><span style="color:rgb(48, 51, 54)">oArchivoByte </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> filesize</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">$file</span><span style="color:rgb(48, 51, 54)">);</span><span style="color:rgb(48, 51, 54)">\r\n\r\n       $tama</span><span style="color:rgb(48, 51, 54)">&ntilde;</span><span style="color:rgb(48, 51, 54)">oArchivoKbyte </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> $tama</span><span style="color:rgb(48, 51, 54)">&ntilde;</span><span style="color:rgb(48, 51, 54)">oArchivoByte</span><span style="color:rgb(48, 51, 54)">/</span><span style="color:rgb(125, 39, 39)">1024</span><span style="color:rgb(48, 51, 54)">;</span><span style="color:rgb(48, 51, 54)">\r\n\r\n       </span><span style="color:rgb(16, 16, 148)">if</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">$tama</span><span style="color:rgb(48, 51, 54)">&ntilde;</span><span style="color:rgb(48, 51, 54)">oArchivoKbyte </span><span style="color:rgb(48, 51, 54)">&gt;</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(125, 39, 39)">2</span><span style="color:rgb(48, 51, 54)">)</span><span style="color:rgb(48, 51, 54)">           \r\n       </span><span style="color:rgb(48, 51, 54)">{</span><span style="color:rgb(48, 51, 54)">\r\n         </span><span style="color:rgb(16, 16, 148)">return</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(125, 39, 39)">&#39;Supera el tama&ntilde;o m&aacute;ximo permitido.&#39;</span><span style="color:rgb(48, 51, 54)">);</span><span style="color:rgb(48, 51, 54)">\r\n       </span><span style="color:rgb(48, 51, 54)">}</span><span style="color:rgb(48, 51, 54)">\r\n       </span><span style="color:rgb(16, 16, 148)">else</span><span style="color:rgb(48, 51, 54)">\r\n       </span><span style="color:rgb(48, 51, 54)">{</span><span style="color:rgb(48, 51, 54)">\r\n          \\Storage</span><span style="color:rgb(48, 51, 54)">::</span><span style="color:rgb(48, 51, 54)">disk</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(125, 39, 39)">&#39;local&#39;</span><span style="color:rgb(48, 51, 54)">)-&gt;</span><span style="color:rgb(48, 51, 54)">put</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">$filename</span><span style="color:rgb(48, 51, 54)">,</span><span style="color:rgb(48, 51, 54)"> \\File</span><span style="color:rgb(48, 51, 54)">::</span><span style="color:rgb(16, 16, 148)">get</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">$file</span><span style="color:rgb(48, 51, 54)">));</span><span style="color:rgb(48, 51, 54)">\r\n          $rutaImagen </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(125, 39, 39)">&#39;carpetacontenedora/&#39;</span><span style="color:rgb(48, 51, 54)">.</span><span style="color:rgb(48, 51, 54)">$file</span><span style="color:rgb(48, 51, 54)">-&gt;</span><span style="color:rgb(48, 51, 54)">getClientOriginalName</span><span style="color:rgb(48, 51, 54)">();</span><span style="color:rgb(48, 51, 54)">\r\n          $data</span><span style="color:rgb(48, 51, 54)">[</span><span style="color:rgb(125, 39, 39)">&#39;fotoExamenMedicoDetalle&#39;</span><span style="color:rgb(48, 51, 54)">]</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)">  $rutaImagen</span><span style="color:rgb(48, 51, 54)">;</span><span style="color:rgb(48, 51, 54)">\r\n       </span><span style="color:rgb(48, 51, 54)">}</span><span style="color:rgb(48, 51, 54)">\r\n\r\n   </span><span style="color:rgb(48, 51, 54)">}</span></code></pre>\r\n\r\n			<p>El problema es que siempre se est&aacute; yendo por el else aun cuando el tama&ntilde;o del archivo supera el supuesto permitido. No s&eacute; si lo estoy validando de la manera correcta (teniendo en cuenta que estoy en el store del controlador) o se puede hacer en el request de laravel.</p>\r\n			</div>\r\n\r\n			<div class="post-taglist" style="margin: 0px 0px 10px; padding: 0px; border: 0px; clear: both;"><a class="post-tag js-gps-track" href="https://es.stackoverflow.com/questions/tagged/laravel-5" rel="tag" style="margin: 2px 2px 2px 0px; padding: 0.4em 0.5em; border: 1px solid transparent; font-size: 12px; color: rgb(57, 115, 157); text-decoration-line: none; cursor: pointer; position: relative; display: inline-block; line-height: 1; white-space: nowrap; text-align: center; border-radius: 0px; transition: all 0.15s ease-in-out; background-color: rgb(225, 236, 244);" title="mostrar preguntas con la etiqueta &quot;laravel-5&quot;">laravel-5</a>&nbsp;<a class="post-tag js-gps-track" href="https://es.stackoverflow.com/questions/tagged/laravel" rel="tag" style="margin: 2px 2px 2px 0px; padding: 0.4em 0.5em; border: 1px solid transparent; font-size: 12px; color: rgb(57, 115, 157); text-decoration-line: none; cursor: pointer; position: relative; display: inline-block; line-height: 1; white-space: nowrap; text-align: center; border-radius: 0px; transition: all 0.15s ease-in-out; background-color: rgb(225, 236, 244);" title="mostrar preguntas con la etiqueta &quot;laravel&quot;">laravel</a></div>\r\n\r\n			<table class="fw" style="border-collapse:collapse; border-spacing:0px; border:0px; margin:0px 0px 4px; padding:0px; width:660px">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align:top">\r\n						<div class="post-menu" style="margin: 0px; padding: 2px 0px 0px; border: 0px;"><a class="short-link" href="https://es.stackoverflow.com/q/48137" id="link-post-48137" style="margin: 0px; padding: 0px 3px 2px; border: 0px; color: rgb(132, 141, 149); text-decoration-line: none; cursor: pointer; display: inline-block;" title="enlace permanente corto a esta pregunta">compartir</a><a class="suggest-edit-post" href="https://es.stackoverflow.com/posts/48137/edit" style="margin: 0px; padding: 0px 3px 2px; border: 0px; color: rgb(132, 141, 149); text-decoration-line: none; cursor: pointer; display: inline-block;" title="">mejorar esta pregunta</a></div>\r\n						</td>\r\n						<td style="background-color:rgb(224, 234, 241); vertical-align:top; width:200px">\r\n						<div class="user-info " style="margin: 0px; padding: 5px 6px 7px 7px; border: 0px; box-sizing: border-box; width: 200px; color: rgb(106, 115, 124);">\r\n						<div class="user-action-time" style="margin: 1px 0px 4px; padding: 0px; border: 0px; font-size: 12px; white-space: nowrap;">formulada&nbsp;el 7 feb. a las 13:24</div>\r\n\r\n						<div class="user-gravatar32" style="margin: 0px; padding: 0px; border: 0px; float: left; width: 32px; height: 32px; border-radius: 1px;">\r\n						<div class="gravatar-wrapper-32" style="margin: 0px; padding: 0px; border: 0px; overflow: hidden; width: 32px; height: 32px;"><a href="https://es.stackoverflow.com/users/8930/santiago-mu%c3%b1oz" style="margin: 0px; padding: 0px; border: 0px; color: rgb(0, 119, 204); text-decoration-line: none; cursor: pointer;"><img alt="" src="https://lh4.googleusercontent.com/-06z4ho0yzCI/AAAAAAAAAAI/AAAAAAAABUQ/RyHI-pgdTtM/photo.jpg?sz=32" style="border-radius:1px; border:0px; height:32px; margin:0px auto; padding:0px; width:32px" /></a></div>\r\n						</div>\r\n\r\n						<div class="user-details" style="margin: 0px 0px 0px 8px; padding: 0px; border: 0px; line-height: 17px; word-wrap: break-word; float: left; width: calc(100% - 40px);"><a href="https://es.stackoverflow.com/users/8930/santiago-mu%c3%b1oz" style="margin: 0px; padding: 0px; border: 0px; color: rgb(0, 119, 204); text-decoration-line: none; cursor: pointer;">Santiago Mu&ntilde;oz</a>\r\n\r\n						<div class="-flair" style="margin: 0px; padding: 0px; border: 0px;"><strong>169</strong><span style="font-size:12px">8</span></div>\r\n						</div>\r\n						</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="vertical-align:top">&nbsp;</td>\r\n			<td>\r\n			<div class="comments " id="comments-48137" style="margin: 10px 0px 0px; padding: 0px 0px 10px; border-width: 1px 0px 0px; border-top-style: solid; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-top-color: rgb(228, 230, 232); border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; width: 660px; -webkit-tap-highlight-color: rgba(255, 255, 255, 0);">\r\n			<table style="border-collapse:collapse; border-spacing:0px; border:0px; margin:0px; padding:0px; width:660px">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align:top">\r\n						<table style="border-collapse:collapse; border-spacing:0px; border:0px; margin:0px; padding:0px">\r\n							<tbody>\r\n								<tr>\r\n									<td>&nbsp;&nbsp;</td>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<td style="vertical-align:top">\r\n						<div class="comment-body" style="margin: 0px; padding: 0px; border: 0px;">de que tama&ntilde;o en bytes debe ser tu validaci&oacute;n?, &iquest;has usado Validator?&nbsp;&ndash;&nbsp;<a class="comment-user" href="https://es.stackoverflow.com/users/9874/miguel-osorio" style="margin: 0px; padding: 0px; border: 0px; color: rgb(0, 119, 204); text-decoration-line: none; cursor: pointer; white-space: nowrap;" title="678 reputation">Miguel Osorio</a>&nbsp;<span dir="ltr" style="color:rgb(145, 153, 161)"><a class="comment-link" href="https://es.stackoverflow.com/questions/48137/validar-tama%C3%B1o-de-un-archivo-laravel#comment84279_48137" style="margin: 0px; padding: 0px; border-top: 0px; border-right: 0px; border-bottom: none; border-left: 0px; border-image: initial; color: rgb(0, 89, 153); text-decoration-line: none; cursor: pointer;">el 7 feb. a las 13:30</a></span></div>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style="vertical-align:top">\r\n						<table style="border-collapse:collapse; border-spacing:0px; border:0px; margin:0px; padding:0px">\r\n							<tbody>\r\n								<tr>\r\n									<td>&nbsp;&nbsp;</td>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<td style="vertical-align:top">\r\n						<div class="comment-body" style="margin: 0px; padding: 0px; border: 0px;">De 2560 bytes. No, no lo he usado, hasta ahora lo estoy intentando hacer de una manera &quot;tradicional&quot;&nbsp;&ndash;&nbsp;<a class="comment-user owner" href="https://es.stackoverflow.com/users/8930/santiago-mu%c3%b1oz" style="margin: 0px; padding: 1px 5px; border: 0px; color: rgb(0, 119, 204); text-decoration-line: none; cursor: pointer; background-color: rgb(224, 234, 241); white-space: nowrap;" title="169 reputation">Santiago Mu&ntilde;oz</a>&nbsp;<span dir="ltr" style="color:rgb(145, 153, 161)"><a class="comment-link" href="https://es.stackoverflow.com/questions/48137/validar-tama%C3%B1o-de-un-archivo-laravel#comment84280_48137" style="margin: 0px; padding: 0px; border-top: 0px; border-right: 0px; border-bottom: none; border-left: 0px; border-image: initial; color: rgb(0, 89, 153); text-decoration-line: none; cursor: pointer;">el 7 feb. a las 13:31</a></span>&nbsp;</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</div>\r\n\r\n			<div id="comments-link-48137" style="margin: 0px; padding: 0px; border: 0px;">a&ntilde;ade un comentario</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<div id="answers" style="margin: 0px; padding: 10px 0px 0px; border: 0px; clear: both; width: 728px; color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;"><a name="tab-top"></a>\r\n\r\n<div id="answers-header" style="margin: 10px 0px 0px; padding: 0px; border: 0px; width: 728px;">\r\n<div class="subheader answers-subheader" style="margin: 0px 0px 10px; padding: 0px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(228, 230, 232); border-left-color: initial; border-image: initial; clear: both; height: 40px;">\r\n<h2>1 respuesta</h2>\r\n\r\n<div style="margin: 0px; padding: 0px; border: 0px;">\r\n<div id="tabs" style="margin: 0px; padding: 0px; border: 0px; float: right;"><a href="https://es.stackoverflow.com/questions/48137/validar-tama%c3%b1o-de-un-archivo-laravel?answertab=active#tab-top" style="margin: 0px 8px 0px 0px; padding: 13px 10px; border: 1px solid transparent; font-size: 12px; color: rgb(132, 141, 149); text-decoration-line: none; cursor: pointer; float: left; line-height: 1; transition: all 0.15s ease-in-out; position: relative;" title="Respuestas con la actividad más reciente primero">activas</a><a href="https://es.stackoverflow.com/questions/48137/validar-tama%c3%b1o-de-un-archivo-laravel?answertab=oldest#tab-top" style="margin: 0px 8px 0px 0px; padding: 13px 10px; border: 1px solid transparent; font-size: 12px; color: rgb(132, 141, 149); text-decoration-line: none; cursor: pointer; float: left; line-height: 1; transition: all 0.15s ease-in-out; position: relative;" title="Respuestas en el orden en que fueron proporcionadas">m&aacute;s antiguas</a><a class="youarehere" href="https://es.stackoverflow.com/questions/48137/validar-tama%c3%b1o-de-un-archivo-laravel?answertab=votes#tab-top" style="margin: 0px; padding: 13px 10px 14px; border-width: 1px; border-style: solid; border-color: rgb(228, 230, 232) rgb(228, 230, 232) transparent; border-image: initial; font-size: 12px; color: rgb(36, 39, 41); text-decoration-line: none; cursor: pointer; float: left; line-height: 1; transition: all 0.15s ease-in-out; position: relative;" title="Respuestas con la puntuación más alta primero">votos</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n<a name="48140"></a>\r\n\r\n<div class="answer" id="answer-48140" style="margin: 0px; padding: 20px 0px; border-width: 0px 0px 1px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(228, 230, 232); border-left-color: initial; border-image: initial; width: 728px;">\r\n<table style="border-collapse:collapse; border-spacing:0px; border:0px; margin:0px; padding:0px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="vertical-align:top">\r\n			<div class="vote" style="margin: 0px; padding: 0px; border: 0px; text-align: center; min-width: 46px;">voto a favor<span style="color:rgb(106, 115, 124); font-size:20px">0</span>votar en contra</div>\r\n			</td>\r\n			<td style="vertical-align:top">\r\n			<div class="post-text" style="margin: 0px 0px 5px; padding: 0px; border: 0px; font-size: 15px; width: 660px; word-wrap: break-word; line-height: 1.3;">\r\n			<p>Una de las formas de validaci&oacute;n que puede usar es&nbsp;<code>Validator</code></p>\r\n\r\n			<p>debes de importar&nbsp;<code>use Validator;</code></p>\r\n\r\n			<pre>\r\n<code><span style="color:rgb(48, 51, 54)">$validacion </span><span style="color:rgb(48, 51, 54)">=</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(43, 145, 175)">Validator</span><span style="color:rgb(48, 51, 54)">::</span><span style="color:rgb(48, 51, 54)">make</span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">$inputs</span><span style="color:rgb(48, 51, 54)">-&gt;</span><span style="color:rgb(48, 51, 54)">all</span><span style="color:rgb(48, 51, 54)">(),</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(48, 51, 54)">[</span><span style="color:rgb(48, 51, 54)">\r\n        </span><span style="color:rgb(125, 39, 39)">&#39;archivoExamenMedicoDetalle&#39;</span><span style="color:rgb(48, 51, 54)">=&gt;</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(125, 39, 39)">&#39;max:2560&#39;</span><span style="color:rgb(48, 51, 54)">,</span><span style="color:rgb(133, 140, 147)">//indicamos el valor maximo</span><span style="color:rgb(48, 51, 54)">\r\n</span><span style="color:rgb(48, 51, 54)">]);</span><span style="color:rgb(48, 51, 54)">\r\n\r\n</span><span style="color:rgb(16, 16, 148)">if</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(48, 51, 54)">$validacion</span><span style="color:rgb(48, 51, 54)">-&gt;</span><span style="color:rgb(48, 51, 54)">fails</span><span style="color:rgb(48, 51, 54)">())</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(48, 51, 54)">{</span><span style="color:rgb(48, 51, 54)">\r\n   </span><span style="color:rgb(16, 16, 148)">return</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(48, 51, 54)">(</span><span style="color:rgb(125, 39, 39)">&#39;Supera el tama&ntilde;o m&aacute;ximo permitido.&#39;</span><span style="color:rgb(48, 51, 54)">);</span><span style="color:rgb(48, 51, 54)"> \r\n</span><span style="color:rgb(48, 51, 54)">}</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(16, 16, 148)">else</span><span style="color:rgb(48, 51, 54)"> </span><span style="color:rgb(48, 51, 54)">{</span><span style="color:rgb(48, 51, 54)">\r\n  </span><span style="color:rgb(133, 140, 147)">//aqu&iacute; en el caso de que este todo bien</span></code></pre>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n', 6, '#', '', '#', 1, '2017-04-26 00:07:23', '2017-05-15 22:33:57'),
(5, 1, 'fefer', '', 5, '#', '', '#', 1, '2017-04-26 22:51:05', '2017-04-26 22:52:09'),
(6, 1, '33f g4g 4g', '', 7, '', '', '', 1, '2017-04-26 22:51:31', '2017-04-26 22:53:19'),
(7, 3, 'submenu 2.2', '', 8, '#', '', '#', 1, '2017-05-02 17:16:13', '2017-05-02 17:16:13'),
(8, 3, 'submenu 2.3', '', 9, '#', '', '#', 1, '2017-05-02 17:21:35', '2017-05-02 17:21:35'),
(9, 3, 'submenu 2.4', '', 10, '#', '', '#', 1, '2017-05-02 17:21:56', '2017-05-02 17:21:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$I4rvuDhzk9pY821GgI/nTedEBk/DGJ6vPSJODuy6bFz3W.Mui4/Re', 'ZSrFmcU3IRZwcHr17PaXpVuS7U9OvwCGc7c0YZ3uYAfNTd1id9tnxn4J36pN', '2017-04-01 05:50:32', '2017-06-01 00:48:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id_Ban`);

--
-- Indices de la tabla `category_notices`
--
ALTER TABLE `category_notices`
  ADD PRIMARY KEY (`id_Cat`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_Img`);

--
-- Indices de la tabla `images_notices`
--
ALTER TABLE `images_notices`
  ADD PRIMARY KEY (`id_NotImg`),
  ADD KEY `images_notices_id_not_foreign` (`id_not`),
  ADD KEY `images_notices_id_img_foreign` (`id_img`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_Men`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id_Not`),
  ADD KEY `notices_id_cat_foreign` (`id_cat`),
  ADD KEY `notices_id_sco_foreign` (`id_sco`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `scope_notices`
--
ALTER TABLE `scope_notices`
  ADD PRIMARY KEY (`id_Sco`);

--
-- Indices de la tabla `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id_Sub`),
  ADD KEY `submenus_id_men_foreign` (`id_men`);

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
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id_Ban` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `category_notices`
--
ALTER TABLE `category_notices`
  MODIFY `id_Cat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id_Img` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `images_notices`
--
ALTER TABLE `images_notices`
  MODIFY `id_NotImg` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id_Men` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `notices`
--
ALTER TABLE `notices`
  MODIFY `id_Not` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `scope_notices`
--
ALTER TABLE `scope_notices`
  MODIFY `id_Sco` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id_Sub` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `images_notices`
--
ALTER TABLE `images_notices`
  ADD CONSTRAINT `images_notices_id_img_foreign` FOREIGN KEY (`id_img`) REFERENCES `images` (`id_Img`),
  ADD CONSTRAINT `images_notices_id_not_foreign` FOREIGN KEY (`id_not`) REFERENCES `notices` (`id_Not`);

--
-- Filtros para la tabla `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_id_cat_foreign` FOREIGN KEY (`id_cat`) REFERENCES `category_notices` (`id_Cat`),
  ADD CONSTRAINT `notices_id_sco_foreign` FOREIGN KEY (`id_sco`) REFERENCES `scope_notices` (`id_Sco`);

--
-- Filtros para la tabla `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_id_men_foreign` FOREIGN KEY (`id_men`) REFERENCES `menus` (`id_Men`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
