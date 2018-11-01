-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-09-2018 a las 10:30:04
-- Versión del servidor: 5.7.22
-- Versión de PHP: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `share_files`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id_archivo` int(20) NOT NULL,
  `nombre_original` text NOT NULL,
  `nombre_sistema` varchar(50) NOT NULL,
  `encrypt` varchar(50) NOT NULL,
  `token_archivo` varchar(50) DEFAULT NULL,
  `fecha_carga` date NOT NULL,
  `id_usuario` int(20) DEFAULT NULL,
  `token_invitado` varchar(50) DEFAULT NULL,
  `size` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id_archivo`, `nombre_original`, `nombre_sistema`, `encrypt`, `token_archivo`, `fecha_carga`, `id_usuario`, `token_invitado`, `size`) VALUES
(7, 'Martha_Erika_Alonso_de_Moreno_Valle.jpg', 'php37gnd8', 'b6c82d7dea487307279a219b1b921ea22ce6212e', 'y33kb2cmzht78gofw58cbi45pl092suxn6d5aare59jvq149e', '2018-07-26', 20, NULL, 0),
(49, 'qvpro-app-278.pkg', 'php9FFxr1', 'a5e157f17bbe9411d74201a8c254bc8988852f7b', 'ls27gbqn39e81om90vdbdx42zaf9aj5h66wp8yt5kir3bceuf', '2018-08-07', 1, NULL, 0),
(53, 'google-chrome-stable_current_amd64.deb', 'phpo6jbKs', '72318793b02a060d76fa734825b0983f29af1ec0', '84cvdtb6m6587qickyl6n330o5ubpga0zdade92csrfbx1jwh', '2018-08-08', 21, NULL, 0),
(56, 'qvpro-app-278.pkg', 'phpa8e2Uz', 'a5e157f17bbe9411d74201a8c254bc8988852f7b', '7cvn05ba635uwmbtjchfagds492ypa240r11qx6ei8k1bbloz', '2018-08-08', 1, NULL, 18.43),
(57, '7_848.mp4', 'phpDNCPcz', '3098df43e2409bfe94c3b7364922c4f5bdcc435f', '024x5bro8gca5d3tnvb45kjweffmipbl66sh31729y8q36u3z', '2018-08-08', 1, NULL, 199.34),
(60, 'bitnami-lampstack-7.1.18-1-linux-x64-installer.run', 'phpUnyzWG', 'fc42fe85e23f2608c05900b6349f069629149048', '7cpzl3ckq1eyfbga5m2bxi0sjrtnc94vu50574h8c7d6woa96', '2018-08-09', 1, NULL, 201.55),
(61, 'netbeans-8.2-php-linux-x64.sh', 'phpIeJMU5', '1b2737601feba2653233fb19fc43357f5c360c71', '5ujc1kp7m9s6l4g63twedbrhc3024zbf2daon2v5xe867yqci', '2018-08-09', 21, NULL, 121.55),
(62, 'VPK.zip', 'phpjW9gLE', 'f8137149d22356e55ed0bdba1a1486a63f74ab26', 'rds5u3fx5am1gt768pzybcfb67v8k24ln0ciw6jb96e26ochq', '2018-08-09', 21, NULL, 7.17),
(64, 'netbeans-8.2-php-linux-x64.sh', 'phpSjuWi4', '1b2737601feba2653233fb19fc43357f5c360c71', '3n4xurma8gqf697oce05c3zs5hdy2k36j8v99pbewebi1tle4', '2018-08-09', 1, NULL, 121.55),
(65, 'DaedalusX64 [Beta R1909] (Unsigned & Signed Versions).7z', 'phpQJ7Sdy', 'e2e3cc438b5b4dcb23f4ffdbb66a56338e33528c', 'cep4biy3e1z3d10ofmqaa9r86ls46gwk55xvfj5bc27nhtuaf', '2018-08-09', 24, NULL, 44.76),
(66, 'sublime_text_3_build_3176_x64.tar.bz2', 'phpa4ZFCd', '9366ee1841fb555789cb8b54badbfdb0bfb71a8d', 'ecnsx5oyk65aaibm97fv1gdeu663rbafdt0z68wcch4l2p1qj', '2018-08-09', 24, NULL, 10.31),
(68, 'Dragon-Ball-Super-Wallpaper-For-Pc.png', 'phpLrtvmQ', '0e4c0b1b6220ab88493fd961bee579511bd7a80e', '9h445k9crc5ytvdbm8zbo7w1faje1sdu3x2bcg6npi2le086q', '2018-08-09', 24, NULL, 4.93),
(69, 'bootstrap-4.1.1-dist.zip', 'phpMkDlqn', '43db3b42e6877e76a7311b2566d2fb9c3e908fbd', '6grlvoyz59qhbec1cm1wfa896cd26jxsnkbc60itp73fdub45', '2018-08-09', 24, NULL, 0.62),
(71, 'camtasia-studio-8-4-1-es-en-fr-de-win.exe', 'phpTIXwhF', '1a707eb389e6b9e732360fafe69e59ed254b5c4e', '66yqec2ubw3j8cpfbz7x04v45619d1oanmtcl8gikb3hb58rs', '2018-08-09', 25, NULL, 257.28),
(73, 'unbr784613 By TolentinoRD.mkv', 'phpvbmJfZ', '37c2a30371d9b0b3eb62d39b15eaf92e6b293c5a', '1ifdg5pbheb7s33rwcd88kb456mnq5ltyoaucz0fv7j2296xa', '2018-08-09', 1, NULL, 1943.02),
(74, 'Archivos Necesarios BOS 01.rar', 'phpenH1rW', 'c1471dcd5780e259c583941c0f516cbdc06d3ba7', 'p0ecnb4o5rqbj8md32296si7fdz6kh8bxc6lyc9tga3vbuw51', '2018-08-09', 1, NULL, 0.77),
(75, 'share_files.sql', 'php1jBNgc', 'ed390f7b7e1747c4dd3c4b2f10db6419d3439327', 'aa8rbx3c060z7fbg1742onth55l4dvikqyc6cupwes59jbm56', '2018-08-09', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `id_invitado` int(10) NOT NULL,
  `token_invitado` varchar(50) NOT NULL,
  `usado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`id_invitado`, `token_invitado`, `usado`) VALUES
(5, '5v5xcq40ebr9azy0djkalif0bo2fcg3b1twd185shpum6bn75', 1),
(6, '2wxtlzy4qf6b9s5mpg85k572015bcd5nb76ieau3jhrdv6o4e', 1),
(7, 'cgmp92072jrkfeb53194cvdylboauzdt80qn5s6iw91637xh5', 1),
(15, 'mrp5l96bb24qofzjaec3a273niw1h7ax5v515tuy0b1dks8g4', 1),
(16, '971u1aoesw8bddrjibvfb146c875tn5k3f2mdy5h6xg3zql0p', 1),
(20, 'cvbdsbl6eu5hbfpja3rzmoaxbytn574wq219gfi837e006k01', 0),
(21, '7sem8fb6210vo56xu4b9lr159d4igcazn0ahqj9fpwktcf4y3', 0),
(22, 'hzar37e6dtoycipksl845c9q1w0dbm0252xj9afgn29v6u01b', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id_log` int(20) NOT NULL,
  `id_usuario` int(20) DEFAULT NULL,
  `token_invitado` varchar(50) DEFAULT NULL,
  `ip_ingreso` varchar(30) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id_log`, `id_usuario`, `token_invitado`, `ip_ingreso`, `fecha_ingreso`, `descripcion`) VALUES
(1, 1, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(2, NULL, '2wxtlzy4qf6b9s5mpg85k572015bcd5nb76ieau3jhrdv6o4e', '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(3, 1, NULL, '172.16.126.100', '2018-07-26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36'),
(4, 1, NULL, '::1', '2018-07-26', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36'),
(6, 1, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(7, 1, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(8, 1, NULL, '172.16.126.119', '2018-07-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36 OPR/54.0.2952.60'),
(9, 1, NULL, '172.16.126.119', '2018-07-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36 OPR/54.0.2952.60'),
(10, 1, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(11, 1, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(12, 1, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(13, 1, NULL, '172.16.126.119', '2018-07-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36 OPR/54.0.2952.60'),
(14, 1, NULL, '172.16.126.119', '2018-07-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36 OPR/54.0.2952.60'),
(15, 1, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(16, 1, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(17, 1, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(18, 1, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(19, 1, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(20, 1, NULL, '172.16.126.119', '2018-07-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36 OPR/54.0.2952.60'),
(21, 1, NULL, '172.16.126.119', '2018-07-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36 OPR/54.0.2952.60'),
(22, 20, NULL, '127.0.0.1', '2018-07-26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(23, 20, NULL, '172.16.126.119', '2018-07-26', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36 OPR/54.0.2952.60'),
(24, 1, NULL, '127.0.0.1', '2018-07-30', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(25, 1, NULL, '127.0.0.1', '2018-07-30', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(26, 1, NULL, '127.0.0.1', '2018-07-31', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(27, 1, NULL, '172.16.126.130', '2018-08-01', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36 OPR/54.0.2952.60'),
(28, 1, NULL, '::1', '2018-08-02', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(29, 1, NULL, '127.0.0.1', '2018-08-02', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(30, 1, NULL, '127.0.0.1', '2018-08-02', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(31, 1, NULL, '127.0.0.1', '2018-08-03', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(32, 1, NULL, '172.16.126.125', '2018-08-03', 'Mozilla/5.0 (Linux; Android 7.0; Moto G (5) Build/NPPS25.137-93-14) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36'),
(33, 1, NULL, '172.16.126.100', '2018-08-03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36'),
(34, 1, NULL, '172.16.126.125', '2018-08-03', 'Mozilla/5.0 (Linux; Android 7.0; Moto G (5) Build/NPPS25.137-93-14) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36'),
(35, 1, NULL, '::1', '2018-08-03', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(36, 1, NULL, '::1', '2018-08-03', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(37, 1, NULL, '127.0.0.1', '2018-08-06', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(38, 1, NULL, '172.16.126.125', '2018-08-06', 'Mozilla/5.0 (Linux; Android 7.0; Moto G (5) Build/NPPS25.137-93-14) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Mobile Safari/537.36'),
(39, 1, NULL, '172.16.126.100', '2018-08-06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(40, 1, NULL, '127.0.0.1', '2018-08-07', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(41, 1, NULL, '172.16.126.110', '2018-08-07', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36 OPR/54.0.2952.64'),
(42, 1, NULL, '127.0.0.1', '2018-08-07', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(43, 1, NULL, '::1', '2018-08-07', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(44, 1, NULL, '127.0.0.1', '2018-08-07', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(45, 1, NULL, '::1', '2018-08-07', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(46, 1, NULL, '127.0.0.1', '2018-08-07', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(47, 1, NULL, '127.0.0.1', '2018-08-08', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(48, 20, NULL, '::1', '2018-08-08', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(49, 1, NULL, '::1', '2018-08-08', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(51, 1, NULL, '127.0.0.1', '2018-08-08', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(52, 1, NULL, '127.0.0.1', '2018-08-08', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(53, 1, NULL, '127.0.0.1', '2018-08-08', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(54, 1, NULL, '127.0.0.1', '2018-08-08', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(55, 1, NULL, '172.16.126.114', '2018-08-08', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(56, 1, NULL, '127.0.0.1', '2018-08-08', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(57, 1, NULL, '127.0.0.1', '2018-08-09', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(60, 1, NULL, '127.0.0.1', '2018-08-09', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(62, 1, NULL, '127.0.0.1', '2018-08-09', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(63, 1, NULL, '172.16.126.100', '2018-08-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(64, 25, NULL, '172.16.126.100', '2018-08-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(65, 1, NULL, '172.16.126.100', '2018-08-09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(66, 1, NULL, '192.168.1.66', '2018-08-10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36'),
(67, 1, NULL, '192.168.1.66', '2018-08-10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36'),
(68, 1, NULL, '127.0.0.1', '2018-08-10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(69, 1, NULL, '127.0.0.1', '2018-08-10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(70, 1, NULL, '127.0.0.1', '2018-08-13', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(71, 1, NULL, '127.0.0.1', '2018-08-13', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0'),
(72, 1, NULL, '::1', '2018-08-13', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36'),
(73, NULL, 'cgmp92072jrkfeb53194cvdylboauzdt80qn5s6iw91637xh5', '::1', '2018-08-13', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_fallos`
--

CREATE TABLE `registro_fallos` (
  `id_falla` int(20) NOT NULL,
  `fecha_intento` date NOT NULL,
  `intento` mediumint(30) NOT NULL,
  `token_invitado` varchar(50) DEFAULT NULL,
  `ip_intento` varchar(30) NOT NULL,
  `descripcion_falla` varchar(100) NOT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_fallos`
--

INSERT INTO `registro_fallos` (`id_falla`, `fecha_intento`, `intento`, `token_invitado`, `ip_intento`, `descripcion_falla`, `usuario`, `pass`) VALUES
(1, '2018-07-24', 1, 'ssdfasv6546sdfsdf46d', '192.168.1.10', 'Falla comun', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(20) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `tipo_usuario` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `usuario`, `pass`, `nombre`, `correo`, `tipo_usuario`) VALUES
(1, 'admin', '1234', 'admin', 'admin@correo.com', 1),
(20, 'vtrujillo', 'on2uv2ap', 'vicente', 'vtrujillo@stargroup.com.mx', 0),
(25, 'lzavala', 'av6un2og6is6', 'lzavala', 'lzavala@stargroup.com.mx', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_archivo`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`id_invitado`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `registro_fallos`
--
ALTER TABLE `registro_fallos`
  ADD PRIMARY KEY (`id_falla`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id_archivo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `id_invitado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `registro_fallos`
--
ALTER TABLE `registro_fallos`
  MODIFY `id_falla` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
