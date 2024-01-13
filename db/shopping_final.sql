-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 09:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Plantillas Calzado'),
(2, 'Protectores Pie Plano y Calzado'),
(3, 'Protectores Dedos y Metatarso'),
(4, 'Protectores Juanete'),
(5, 'Cuidado del pie'),
(6, 'Separadores Dedos'),
(7, 'Medias Salud y Relax'),
(9, 'Ortesis Deporte y Terapia'),
(10, 'Correctores Fractura y Postura'),
(11, 'Belleza EstÃ©tica'),
(12, 'Elementos Deportes y Terapia'),
(13, 'RehabilitaciÃ³n'),
(14, 'Bienestar'),
(15, 'Fajas Reductoras'),
(16, 'Bienestar Diario'),
(17, 'Cordones y Limpieza');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `or_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `representative` varchar(255) NOT NULL,
  `nit` varchar(255) NOT NULL,
  `mail_address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `desc_order` text NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`or_id`, `f_name`, `representative`, `nit`, `mail_address`, `contact`, `phone`, `address`, `city`, `department`, `desc_order`, `amount`, `payment_status`, `status`, `order_time`) VALUES
(7, 'M J H Nahid', 'Claudia Cedeno', '123242343546', 'mjhnahid2019@gmail.com', 'M J H Nahid', '1234567894', 'Dighaprotiya Natore', 'Natore', 'CSE', '<b>3</b> units <b>1498</b> <br/>', 67050, 1, 0, '2024-01-12 20:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `serial_num` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `measure_unit` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `cat` int(11) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `ivaPercent` varchar(255) NOT NULL,
  `iva` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `serial_num`, `name`, `reference`, `description`, `p_image`, `measure_unit`, `material`, `brand`, `size`, `color`, `cat`, `cost`, `ivaPercent`, `iva`, `subtotal`) VALUES
(4, 1, 'Plantillas Recortables Punto Azul', '2464', 'Postura Fascitis Metatarso', '65987683be4d5.jpg', '1 Par', 'Silicona', 'Pura+', '34-39', 'Blanco', 1, '27909', '19', 5302, 33211),
(5, 2, 'Plantillas Recortables Sport', '2594,2600', 'Postura Fascitis Metatarso', '65985628ce658.jpg', '1 Par', 'Silicon Gel', 'Pura+', '35-39,40-43', 'Gris', 1, '26013', '19', 4942, 30955),
(8, 3, 'Plantillas Ultra Flex', '4963', 'OrtopÃ©dica, Confort, Ergonomica', '659857475eb0f.jpg', '1 Par', 'Pu-PoliÃ©ster', 'Pura+', '35-41', 'Gris', 1, '10212', '19', 1940, 12152),
(9, 4, 'Plantillas Sport Hydrotech', '4970', 'Mejor adaptaciÃ³n al calzado', '6598575c38bfd.jpg', '1 Par', 'Eva-PoliÃ©ster', 'Pura+', '36-40', 'Verde', 1, '28330', '19', 5383, 33713),
(10, 5, 'Plantillas Enteras Stark', '1443,1450,1467,1474,1481', 'EconÃ³micas', '659857701decc.jpg', '1 Par', 'Foamy', 'Pura+', '34-35,36-37,38-39,40-41,42-43', 'Negro', 1, '2109', '19', 400, 2510),
(16, 6, 'Plantillas Taloneras Gradual Masaje', '1498', 'Ayuda a combatir fatiga y cansancio', '65985782df75c.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Naranja', 1, '18782', '19', 3568, 22350),
(20, 7, 'Plantillas Recortables Memory', '0248', 'OrtopÃ©dica, Confort, Ergonomica', '659857e83408e.jpg', '1 Par', 'Ruprene', 'Pura+', '34-44', 'Negro', 1, '8425', '19', 1600, 10025),
(21, 8, 'Plantillas Taloneras Punto Azul', '0309', 'EspolÃ³n, CalcÃ¡neo, Postura', '659857fa2aa62.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Blanco', 1, '18431', '19', 3501, 21931),
(22, 9, 'Plantillas Taloneras Sport', '0132,0170', 'EspolÃ³n, CalcÃ¡neo, Postura', '659876b4a1728.jpg', '1 Par', 'ElastÃ³mero', 'Pura+', '34-40,38-43', 'Gris', 1, '11206', '19', 2129, 13335),
(25, 10, 'Plantillas 3/4 Pro II', '4345', 'Estabilidad, confort, Postura', '658aeffd75776.jpg', '1 Par', 'ElastÃ³mero', 'Pura+', 'XS-S', 'Negro', 1, '16901', '19', 3211, 20112),
(26, 11, 'Plantillas 3/4 Pro II', '4352', 'Estabilidad, confort, Postura', '658af0d620d4f.jpg', '1 Par', 'ElastÃ³mero', 'Pura+', 'M-L', 'Negro', 1, '16901', '19', 3211, 20112),
(27, 12, 'Plantillas Taloneras Aumenta estatura', '0088,0095,0101', 'Doble altura +3,5cm / +1,5cm =5cm', '659876eb286c5.jpg', '1 Par', 'Poliuretano', 'Pura+', 'Universal', 'Negro', 1, '14644', '19', 2782, 17426),
(28, 13, 'Plantillas Taloneras Aumenta estatura', '0095', 'Doble altura +3,5cm / +1,5cm =5cm', '658af1b32b515.jpg', '1 Par', 'Poliuretano', 'Pura+', 'Universal', 'Fucsia', 1, '14644', '19', 2782, 17426),
(29, 14, 'Plantillas Taloneras Aumenta estatura', '0101', 'Doble altura +3,5cm / +1,5cm =5cm', '658af242f16e6.jpg', '1 Par', 'Poliuretano', 'Pura+', 'Universal', 'Guerpano', 1, '14644', '19', 2782, 17426),
(30, 15, 'Plantillas Punteras', '0293', 'Metatarso, Fascitis, Callos', '658af2b2a20dc.jpg', '1 Par', 'Latex', 'Pura+', 'Universal', 'Beige', 2, '6339', '19', 1204, 7543),
(31, 16, 'Plantillas Punteras', '0149', 'Metatarso, Fascitis, Callos', '658af32302ac7.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Transparente', 2, '7342', '19', 1394, 8736),
(32, 17, 'Punteras Gamuza', '4956', 'Metatarso, Fascitis, Callos', '658af39188a8a.jpg', '1 Par', 'Eva, PoliÃ©ster', 'Pura+', 'Universal', 'Beige', 2, '9378', '19', 1781, 11159),
(33, 18, 'PLantilla Metatarso', '0361', 'Metatarso, Fascitis, Callos', '658af3ff3b6a6.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Blanco', 3, '11206', '19', 2129, 13335),
(35, 19, 'Almohadilla Metatarso Confort', '5526', 'Metatarso, Fascitis, Callos', '658af4692696c.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Beige', 3, '11206', '19', 2129, 13335),
(36, 20, 'Plantilla Dedo Garra', '4567', 'Alinea los dedos en garra', '658af4da277de.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Blanco', 3, '11206', '19', 2129, 13335),
(37, 21, 'Puntera BudÃ­n', '6349', 'Alinea los dedos en garra', '658af5337aa0a.jpg', '1 Par', 'Eva, PoliÃ©ster', 'Pura+', 'Universal', 'Beige', 3, '10464', '19', 1988, 12452),
(38, 22, 'Plantilla Pie Plano', '1863', 'Arco Longitudinal postura', '658af5a24bb67.jpg', '1 Par', 'ElastÃ³mero', 'Pura+', 'Universal', 'Blanco', 2, '12723', '19', 2417, 15140),
(39, 23, 'Protector Arco Pie Plano', '6059', 'Arco Longitudinal postura', '658af6181eb34.jpg', '1 Par', 'SintÃ©tico', 'Pura+', 'Universal', 'Negro', 2, '14063', '19', 2671, 16734),
(40, 24, 'Protector Arco Neo', '6295', 'Arco Longitudinal postura', '658af6867884e.jpg', '1 Par', 'Neoprene', 'Pura+', 'Universal', 'Negro', 2, '14063', '19', 2671, 16734),
(41, 25, 'Protector Juanete', '0125', 'Juanete, Hallus valgus', '658af6eca7a57.jpg', '1 Par', 'Silicona', 'Pura+', 'L', 'Blanco', 4, '10673', '19', 2027, 12700),
(42, 26, 'Protector Juanete', '0330', 'Juanete, Hallus valgus', '658af7e6870ce.jpg', '1 Par', 'Silicona', 'Pura+', 'S', 'Blanco', 4, '10673', '19', 2027, 12700),
(43, 27, 'Protector Juanete Noche', '0316', 'Juanete, Hallus valgus', '658af886a5e7f.jpg', '1 Par', 'Poliuretano', 'Pura+', 'Universal', 'Blanco', 4, '18210', '19', 0, 18210),
(44, 28, 'Protector Juanete Noche', '4383', 'Juanete, Hallus valgus', '658af9058e211.jpg', '1 Par', 'Neoprene', 'Pura+', 'Universal', 'Negro', 4, '20296', '19', 0, 20296),
(45, 29, 'Protector Juanete Premium', '11206', 'Juanete, Hallus valgus', '658afa2430b4c.jpg', '1 Par', 'Poliuretano', 'Pura+', 'Universal', 'Blanco', 5, '148122', '19', 0, 148122),
(46, 30, 'Separador Protector Juanete', '0941P', 'Juanete, Hallus valgus', '658afa8a66d01.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Blanco', 4, '12561', '19', 2386, 14947),
(47, 31, 'Separador Protector Pies Lateral PequeÃ±o', '5519', 'Juanete, Hallus valgus', '658afae786264.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Blanco', 4, '11420', '19', 2169, 13589),
(48, 32, 'Separador Protector Dedo Textil', '6097', 'Juanete, Hallus valgus', '658afb4628382.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Beige', 4, '14945', '19', 2839, 17784),
(49, 33, 'Protector Separador Dos Dedos', '6103', 'Juanete, Hallus valgus', '658afb93a5bbf.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Blanco', 4, '12561', '19', 2386, 14947),
(50, 34, 'Protector Separador Tes Dedos', '6110', 'Juanete, Hallus valgus', '658afbeea227d.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Blanco', 4, '11419', '19', 2169, 13589),
(51, 35, 'Juanete Gym Ejercicio', '6080', 'Juanete, Hallus valgus', '658afc57eb0e2.jpg', '2 Und', 'Neoprene', 'Pura+', 'Universal', 'Negro', 4, '8736', '19', 1659, 10395),
(52, 36, 'Separador Dedos', '0118', 'Callos, Hiperqueratosis', '658afcb1be407.jpg', '1 Par', 'Silicona', 'Pura+', 'S', 'Blanco', 6, '10673', '19', 2027, 12700),
(53, 37, 'Separador Dedos', '0323', 'Callos, Hiperqueratosis', '658afd0b14c30.jpg', '1 Par', 'Silicona', 'Pura+', 'L', 'Blanco', 6, '10673', '19', 2027, 12700),
(54, 38, 'Separador Dedos Plano', '0651P', 'Callos, Hiperqueratosis', '658afd6eb8c82.jpg', '1 Par', 'Silicona', 'Pura+', 'S', 'Blanco', 6, '10673', '19', 2027, 12700),
(55, 39, 'Separador Dedos Plano', '0668', 'Callos, Hiperqueratosis', '658afdc786b3a.jpg', '1 Par', 'Silicona', 'Pura+', 'M', 'Blanco', 6, '10673', '19', 2027, 12700),
(56, 40, 'Separador Dedos Plano', '0675P', 'Callos, Hiperqueratosis', '658afe1664b8a.jpg', '1 Par', 'Silicona', 'Pura+', 'L', 'Blanco', 6, '10673', '19', 2027, 12700),
(57, 41, 'Separador Dedos Pie', '4550', 'Callos, Hiperqueratosis', '658afe9a00dd0.jpg', '1 Par', 'ElastÃ³mero', 'Pura+', 'Universal', 'Celeste', 6, '13669', '19', 2597, 16266),
(58, 42, 'Separador Cinco Dedos', '5533', 'Callos, Hiperqueratosis', '658afef0df747.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Blanco', 6, '12105', '19', 2299, 14404),
(59, 43, 'Protector Dedos Pies Ovales', '0200', 'Callos, Hiperqueratosis', '658aff45ef1f1.jpg', '8 UND', 'Latex', 'Pura+', 'S', 'Beige', 2, '7044', '19', 1338, 8382),
(60, 44, 'Protector Dedo Abierto', '0354', 'Callos, Hiperqueratosis', '658affb7e7a0c.jpg', '3 Und', 'Silicona', 'Pura+', 'Universal', 'Blanco', 6, '11420', '19', 2169, 13589),
(61, 45, 'Anillo Separador Dedo Gel', '4888', 'Callos, Hiperqueratosis', '658b000fa4aa8.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Blanco', 6, '11420', '19', 2169, 13589),
(62, 46, 'Junta Dedos', '4895', 'Callos, Hiperqueratosis', '658b008e39125.jpg', '1 Par', 'Varios', 'Pura+', 'Universal', 'Beige', 3, '9529', '19', 1810, 11339),
(63, 47, 'Protector Zapatos TalÃ³n', '0279', 'Partes IncÃ³modas Zapatos', '658b00f071071.jpg', '1 Par', 'Latex', 'Pura+', 'Universal', 'Gris', 2, '6820', '19', 1295, 8115),
(64, 48, 'Protector Puntera Silicona', '4925', 'Evita la apariciÃ³n de ampollas y callos', '658b0144f4211.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Blanco', 3, '12742', '19', 2420, 15162),
(65, 49, 'Almohadilla Entera Confort', '5816', 'Evita la apariciÃ³n de ampollas y callos', '658b019ae9fb9.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Blanco-Beige', 5, '14644', '19', 2782, 17426),
(66, 50, 'Protector TalÃ³n  Silicona', '6066', 'Partes IncÃ³modas Zapatos', '658b01f8895fc.jpg', '1 Par', 'Silicona', 'Pura+', 'Universal', 'Beige', 3, '12743', '19', 2421, 15164),
(67, 51, 'Protector Zapatos Cojines', '0163', 'Partes IncÃ³modas Zapatos', '658b024f0ffd4.jpg', '4 Und', 'Silicona', 'Pura+', 'Universal', 'Transparente', 2, '7044', '19', 1338, 8382),
(68, 52, 'UÃ±a Recta', '5540', 'Alinea la uÃ±a', '658b02d22734c.jpg', '1 Und', 'Mixtos', 'Pura+', 'Universal', 'Acero inoxidable', 3, '9735', '19', 1849, 11584),
(69, 53, 'Medias Taloneras Diabetes', '1023', 'Aptas diabetes, celiacos, veggies', '658b0327095d7.jpg', '1 Par', 'AlgodÃ³n, Elastano', 'Pura+', 'M', 'Blanco', 7, '5286', '19', 1004, 6290),
(71, 54, 'Medias Varices Grad 8-15mmHg', '2211,2208', 'CompresiÃ³n, Graduada varices trombosis', '658b09c3b83cc.jpg', '1 Par', 'Poliamidas-Spandex', 'Pura+', 'S-M', 'Azul oscuro,Negro', 7, '18701', '19', 3553, 22254),
(72, 55, 'Medias Varices Grad 8-15mmHg', '2235,2228', 'CompresiÃ³n, Graduada varices trombosis', '658b0a4eeea1b.jpg', '1 Par', 'Poliamidas-Spandex', 'Pura+', 'L-XL', 'Azul oscuro,Negro', 7, '18701', '19', 3553, 22254),
(73, 56, 'Medias Varices Grad 8-15mmHg', '3607,3614', 'CompresiÃ³n, Graduada varices trombosis', '658b0ac73c170.jpg', '1 Par', 'Poliamidas-Spandex', 'Pura+', 'S-M,L-XL', 'Blanco', 7, '18701', '19', 3553, 22254),
(74, 57, 'Medias Varices Grad 8-15mmHg', '3447', 'CompresiÃ³n, Graduada varices trombosis', '658b0b3fe34bb.jpg', '1 Und', 'Poliamida-Spandex', 'Pura+', 'S-M', 'Beige', 7, '18701', '19', 3553, 22255),
(75, 58, 'Medias Varices Grad 15-20mmHg', '3461', 'CompresiÃ³n, Graduada varices trombosis', '658b0ba043134.jpg', '1 Und', 'Poliamida-Spandex', 'Pura+', 'Universal', 'Beige', 7, '25130', '19', 4774, 29905),
(76, 59, 'Medias Baletas', '2341,2358,2365,2372,2389,2396,2402,2419', 'Veladas Invisibles Relax', '658b0c4edfdcc.jpg', '1 Par', 'AlgodÃ³n,Lycra', 'Pura+', 'Universal', 'Blanco,Beige,MarrÃ³n,CafÃ©,Rosado,Azul oscuro,Negro,Celeste', 7, '2901', '19', 551, 3452),
(77, 60, 'Medias Puntera', '2662,2686,2693', 'Veladas Invisibles Relax', '658b0ccf1fdf8.jpg', '1 Par', 'AlgodÃ³n,Lycra', 'Pura+', 'Universal', 'Negro,Blanco,Beige', 8, '3540', '19', 672, 4212),
(78, 61, 'Medias Slacks', '2297,2327', 'Veladas Invisibles Relax', '658b0d344b089.jpg', '1 Par', 'AlgodÃ³n,Lycra', 'Pura+', 'Universal', 'Beige,Negro', 7, '3643', '19', 692, 4335),
(79, 62, 'Medias Panty Relax', '0262,0225', 'Veladas Invisibles Relax', '658b0da19c894.jpg', '1 Par', 'AlgodÃ³n,Lycra', 'Pura+', 'M', 'Beige,Negro', 7, '8294', '19', 1575, 9869),
(80, 63, 'Ortesis Tobillera', '2532,2556', 'Esguinces, Torceduras, Fisioterapia', '658b0e289477e.jpg', '1 Par', 'Latex', 'Pura+', 'S-M,L-XL', 'Negro', 9, '19668', '19', 0, 19668),
(81, 64, 'Ortesis Rodillera', '2518,2570', 'Esguinces, Torceduras, Fisioterapia', '658b0ea316608.jpg', '1 Par', 'Latex', 'Pura+', 'S-M,L-XL', 'Negro', 9, '21901', '19', 0, 21901),
(82, 65, 'Ortesis Rodillera Rotula', '2457', 'Esguinces, Torceduras, Fisioterapia', '658b0f1283849.jpg', '1 Und', 'Neoprene', 'Pura+', 'Universal', 'Negro', 9, '33759', '19', 0, 33759),
(83, 66, 'Ortesis Codera', '2525,2587', 'Esguinces, Torceduras, Fisioterapia', '658b0f82dc838.jpg', '1 Par', 'Latex', 'Pura+', 'S-M,L-XL', 'Negro', 9, '19668', '19', 0, 19668),
(84, 67, 'MuÃ±equera', '2563', 'Fisioterapia carpial', '658b0fef909dd.jpg', '1 Und', 'Neoprene', 'Pura+', 'Universal', 'Negro', 9, '22832', '19', 0, 22832),
(85, 68, 'Codo Tenista', '2860', 'Lesiones de codo', '658b104a8c630.jpg', '1 Und', 'Neoprene', 'Pura+', 'Universal', 'Negro', 9, '13527', '19', 0, 13527),
(86, 69, 'Inmobilizador Beisbolista', '4468', 'Fractura dedos, inmoviliza', '658b10a1d1600.jpg', '1 Und', 'Aluminio', 'Pura+', 'Universal', 'Gris', 10, '12875', '19', 0, 12875),
(87, 70, 'Inmobilizador Dedo Pulgar', '4437', 'Esguinces, artritis dedo pulgar', '658b10f517648.jpg', '1 Und', 'Neoprene', 'Pura+', 'Universal', 'Negro', 9, '18029', '19', 0, 18029),
(88, 71, 'Inmobilizador Dedo', '10964', 'Esguinces, artritis dedo', '658b1146de70d.jpg', '1 Und', 'Neoprene', 'Pura+', 'Universal', 'Azul', 13, '16162', '19', 0, 16162),
(89, 72, 'Cabestrillo Adulto Sencillo', '4413,4420', 'Lesiones de muÃ±eca, hombro, codo', '658b11b6c9dd8.jpg', '1 Und', 'Dril', 'Pura+', 'S-M,L-XL', 'Azul oscuro', 10, '16214', '19', 0, 16214),
(90, 73, 'Soporte Cabestrillo', '6035', 'Lesiones de muÃ±eca, hombro, codo', '658b120e84606.jpg', '1 Und', 'Neopreme', 'Pura+', 'Universal', 'Negro', 10, '28386', '19', 0, 28386),
(91, 74, 'Faja Mentonera', '6189', 'Ayuda a reafirmar la piel, ronquido', '658b128018bf4.jpg', '1 Und', 'Neopreme', 'Pura+', 'Universal', 'Negro', 11, '20449', '19', 0, 20449),
(92, 75, 'Banda Subrotuliana', '6196', 'Tendinitis e inestabilidad de la rotula', '658b12db9ece3.jpg', '1 Und', 'Neopreme', 'Pura+', 'Universal', 'Negro', 9, '13527', '19', 0, 13527),
(93, 76, 'Cuello Thomas', '4369', 'Artrosis Cervical, Desequilibrio del mÃºsculo', '658b1425b8bbc.jpg', '1 Und', 'Espuma', 'Pura+', 'Universal', 'Beige', 10, '14687', '19', 2790, 17477),
(94, 77, 'Pelota Fisio Gym', '1917', 'Fisioterapia Carpial', '658b147cae3b3.jpg', '1 Und', 'Espuma', 'Pura+', 'Universal', 'Amarillo', 12, '3828', '19', 727, 4555),
(95, 78, 'Extensor Dedos', '5809', 'Fisioterapia Carpial', '658b14cc17f81.jpg', '2 Und', 'Silicona', 'Pura+', 'Universal', 'Azul-Verde', 13, '15772', '19', 2996, 18768),
(96, 79, 'Dona Dedos', '5823', 'Fisioterapia Carpial', '658b15209f621.jpg', '2 Und', 'SintÃ©tico', 'Pura+', 'Universal', 'Verde-Rojo', 13, '156878', '19', 3206, 20084),
(97, 80, 'Banda Anclaje', '6264', 'Accesorio adaptador para bandas elÃ¡sticas', '658b15747be71.jpg', '1 Und', 'PoliÃ©ster', 'Pura+', 'Universal', 'Negro', 12, '10539', '19', 2002, 12541),
(98, 81, 'Agarradera Gym', '6271', 'Accesorio adaptador para bandas elÃ¡sticas', '658b15de9a4fe.jpg', '1 Par', 'Varios', 'Pura+', 'Universal', 'Negro', 12, '11797', '19', 2241, 14038),
(99, 82, 'Bandas ElÃ¡sticas', '5731', 'Desarrollo fuerza, Tonificar mÃºsculo', '658b164cd83a4.jpg', '3 Und', 'AlgodÃ³n, poliÃ©ster', 'Pura+', 'Universal', 'Mixtos', 14, '33623', '19', 6388, 40011),
(100, 83, 'Kit Bandas ElÃ¡sticas Con Anclaje', '1962', 'Fisioterapia, Postoperatorio, Tonificar', '658b16a259b8e.jpg', '4 Und', 'Varios', 'Pura+', 'Kit', 'Mixtos', 12, '33880', '19', 6437, 40317),
(101, 84, 'Bandas ElÃ¡sticas Fisio', '1931', 'Fisioterapia, Postoperatorio, Tonificar', '658b16f867712.jpg', '1 Und', 'Latex', 'Pura+', 'Suave', 'Verde', 12, '8986', '19', 1707, 10694),
(102, 85, 'Bandas ElÃ¡sticas Fisio', '1955', 'Fisioterapia, Postoperatorio, Tonificar', '658b17593f5d0.jpg', '1 Und', 'Latex', 'Pura+', 'Medio', 'Rojo', 12, '9473', '19', 1800, 11272),
(103, 86, 'Bandas ElÃ¡sticas Fisio', '1948', 'Fisioterapia, Postoperatorio, Tonificar', '658b17b433a18.jpg', '1 Und', 'Latex', 'Pura+', 'Fuerte', 'Azul', 12, '10885', '19', 2068, 12953),
(105, 87, 'Colchoneta', '4475,4482', 'Fisioterapia, pilates, yoga, gym', '658b186e2f297.jpg', '1 Und', 'NBR Nitrilo', 'Pura+', '1,73cm x 61cm', 'Negro,Morado', 12, '48702', '19', 9253, 57955),
(106, 88, 'Gancho Botella', '1825', 'Fisioterapia, pilates, yoga, gym', '658b18c472474.jpg', '1 Und', 'Mixtos', 'Pura+', 'Universal', 'Varios', 12, '2208', '19', 420, 2627),
(107, 89, 'Cuerda De Saltar', '1887', '2 metro con 20cm', '658b1917b2fc3.jpg', '1 Und', 'Mixtos', 'Pura+', 'Universal', 'Varios', 12, '14610', '19', 2776, 17386),
(108, 90, 'Bandas Kinesiologicas', '3096', '5m x 5cm', '658b1981cf139.jpg', '1 Und', 'Mixtos', 'Pura+', 'Universal', 'Varios', 12, '17545', '19', 0, 17545),
(109, 91, 'Corrector Postura Deluxe', '0378,0590', 'Postura Escoliosis Cifosis Lordosis', '658b19e3e56d5.jpg', '1 Und', 'Elastano, Polyester', 'Pura+', 'S-M', 'Blanco,Negro', 10, '27039', '19', 0, 27039),
(110, 92, 'Corrector Postura Deluxe', '1870,0606', 'Postura Escoliosis Cifosis Lordosis', '658b1a9eaf4b0.jpg', '1 Und', 'Elastano, Polyester', 'Pura+', 'L-XL', 'Blanco,Negro', 10, '28328', '19', 0, 28328),
(111, 93, 'Corrector Postura Premium', '5571,5588', 'Postura Escoliosis Cifosis Lordosis', '658b1af78755d.jpg', '1 Und', 'Elastano, Polyester', 'Pura+', 'S-M,L-XL', 'Negro', 10, '32912', '19', 0, 32912),
(112, 94, 'Corrector Postura Nrgy Loop', '0545,0569', 'Postura Escoliosis Cifosis Lordosis', '658b1bd65c7b0.jpg', '1 Und', 'Elastano, Polyester', 'Pura+', 'L-XL', 'Blanco,Negro', 10, '12664', '19', 2406, 15070),
(113, 95, 'Corrector Postura Nrgy Loop', '0552,0538', 'Postura Escoliosis Cifosis Lordosis', '658b1c3b41d53.jpg', '1 Und', 'Elastano, Polyester', 'Pura+', 'S-M', 'Blanco,Negro', 10, '12458', '19', 2367, 14825),
(114, 96, 'Camisilla Neopreno', '5977,5984,5991', 'Bajar de peso, Quemas grasa', '658b1cb558305.jpg', '1 Und', 'Neoprene', 'Pura+', 'S,M,S-M', 'Negro', 15, '42229', '19', 8024, 50252),
(115, 97, 'Camisilla Gafete', '5038,5021,5045', 'Bajar de peso, Quemas grasa', '658b1d967a02a.jpg', '1 Und', 'Neoprene', 'Pura+', 'S,M,L', 'Negro', 15, '52272', '19', 9932, 62203),
(116, 98, 'PantalÃ³n Neopreno', '6004,6011,6028', 'Bajar de peso, Quemas grasa', '658b1e24ce38e.jpg', '1 Und', 'Neoprene', 'Pura+', 'S,M,L', 'Negro', 15, '45757', '19', 8694, 54451),
(117, 99, 'Faja Reductora', '3300,3317,3324', 'Bajar de peso, Quemas grasa', '658b1eaa3c13f.jpg', '1 Und', 'Neoprene', 'Pura+', 'S,M,L', 'Negro', 15, '23595', '19', 4483, 28078),
(118, 100, 'Faja Cintura Gafete', '4994,5007,5014', 'Bajar de peso, Quemas grasa', '658b1f136142d.jpg', '1 Und', 'Neoprene', 'Pura+', 'S,M,L', 'Negro', 15, '31702', '19', 6023, 37725),
(119, 101, 'Pulsera Sudor Nrgy', '1986,1856', 'Fisioterapia, Yoga, Pilates, Gym', '658b1f76b3aa1.jpg', '2 Und', 'AlgodÃ³n, Elastano', 'Pura+', 'Unisex', 'Negro,Blanco', 12, '11842', '19', 2250, 14092),
(120, 102, 'Guantes Gym', '1894,4543', 'Fisioterapia, Yoga, Pilates, Gym', '658b1ffeb7352.jpg', '1 Par', 'AlgodÃ³n, Elastano', 'Pura+', 'M,L', 'Negro,Blanco', 12, '32440', '19', 6164, 38603),
(121, 103, 'Cinta MÃ©trica', '5960', 'MediciÃ³n cuerpo humano', '658b2058a6b43.jpg', '1 Und', 'Varios', 'Pura+', 'Universal', 'Blanco', 16, '4235', '19', 805, 5039),
(122, 104, 'Medidor Grasas', '2723', 'MediciÃ³n Grasa Corporal&quot;', '658b20b4b6493.jpg', '1 Und', 'Varios', 'Pura+', 'Universal', 'Beige', 16, '6575', '19', 1249, 7824),
(123, 105, 'Levanta Busto', '5939', 'Realza el busto desde la parte superior', '658b210940a57.jpg', '6 Und', 'Micropore', 'Pura+', 'Universal', 'Beige', 11, '8409', '19', 1598, 10007),
(124, 106, 'Cubre PezÃ³n', '5922', 'Ideales y discreto para blusas ajustadas', '658b2167c268e.jpg', '6 Und', 'Micropore', 'Pura+', 'Universal', 'Beige', 11, '3872', '19', 736, 4607),
(125, 107, 'Corrector Nariz', '2099', 'Respinga Nariz Nocturno', '658b21c5ea1f3.jpg', '1 Und', 'Poliuretano', 'Pura+', 'Unisex', 'Fucsia', 11, '9389', '19', 1784, 11173),
(126, 108, 'Corrector Nasal', '2037', 'Ronquido nasal, RespiraciÃ³n', '658b225cec302.jpg', '1 Par', 'Silicona', 'Pura+', 'Unisex', 'Transparente', 16, '12875', '19', 2446, 15321),
(127, 109, 'Perfilador Nariz', '4307', 'Ronquido nasal, RespiraciÃ³n', '658b22d470a0a.jpg', '1 Par', 'Poliuretano', 'Pura+', 'S,M,L', 'Negro', 11, '14830', '19', 17648, 17648),
(128, 110, 'Protector Bucal Externo', '2044', 'Ronquido bucal, Bruxismo', '658b235ac959b.jpg', '1 Par', 'Elastomero', 'Pura+', 'Unisex', 'Transparente', 16, '29983', '19', 5697, 35680),
(129, 111, 'Kit Protector Bucal Externo', '2679', 'Ronquido bucal, Bruxismo', '658b25315e290.jpg', '4 Und', 'Elastomero', 'Pura+', 'Unisex', 'Transparente', 16, '39349', '19', 7479, 46825),
(130, 112, 'Masajeador Skin Roll', '2051', 'Fisioterapia, Moldear, Tonificar', '658b25aa8492e.jpg', '1 Und', 'Polieuretano', 'Pura+', 'Unisex', 'Fucsia', 11, '10923', '19', 2076, 12999),
(131, 113, 'Masajeador Head Roll', '2068', 'Fisioterapia, Moldear, Tonificar', '658b25f965b29.jpg', '1 Und', 'Silicona', 'Pura+', 'Unisex', 'Verde', 16, '10923', '19', 2076, 12999),
(132, 114, 'Corta Pastillas', '4901', 'Corta Facilmente las pastillas', '658b2651f0cf7.jpg', '1 Und', 'Varios', 'Pura+', 'Unisex', 'Azul', 16, '9528', '19', 1810, 11339),
(133, 115, 'Porta Pastillas', '4918', 'Estuche Organizador', '658b26a92e488.jpg', '1 Und', 'Varios', 'Pura+', 'Unisex', 'Blanco-Azul', 16, '14399', '19', 2736, 17134),
(134, 116, 'CojÃ­n Confort', '5595', 'Alivia tensiones musculares', '658b26f646eb9.jpg', '1 Und', 'Espuma', 'Pura+', 'Unisex', 'Negro', 16, '53482', '19', 10162, 63643),
(135, 117, 'Antideslizante Rubin', '5564', 'Antideslizante para el calzado', '658b2748dcae3.jpg', '1 Par', 'Eva, PoliÃ©ster', 'Pura+', 'Unisex', 'Negro', 17, '6292', '19', 1195, 7487),
(136, 118, 'Lima Pie', '11213', 'Suavisar-Exfoliar', '658b279f8a83d.jpg', '1 Und', 'SintÃ©tico', 'Pura+', 'Universal', 'Mixtos', 17, '8793', '19', 1671, 10463),
(137, 119, 'Shampoo Zapatos', '2488', 'Limpia, Suaviza, Protege', '658b28085d26a.jpg', '1 Botella', 'Varios', 'Pura+', '150ml', 'Verde', 17, '13051', '19', 2480, 15530),
(138, 120, 'Crema Engrasante De Potro', '2501', 'Nures,Protege y Repara', '658b2858b3dda.jpg', '1 Frasco', 'Graso potros', 'Pura+', '80gr', 'Transparente', 17, '13051', '19', 2480, 15530),
(139, 121, 'Crema Limpiadora Gamuza Cuero Zapatos', '2495', 'Nures,Protege y Repara', '658b28b857812.jpg', '1 Botella', 'Varios', 'Pura+', '160ml', 'Beige', 17, '13051', '19', 2480, 15530),
(140, 122, 'Abrillantador Spray Cuero y Sintetico', '2471', 'Nures,Protege y Repara', '658b29bb03cb0.png', '1 Botella', 'Varios', 'Pura+', '150ml', 'Blanco', 17, '13051', '19', 2480, 15530),
(141, 123, 'Kit Limpieza Cuero Gamuza Tejido', '2709', 'Nures,Protege y Repara', '658b2a2a160b1.jpg', '4 Und', 'Varios', 'Pura+', 'Kit', 'Varios', 17, '43500', '19', 8265, 51765),
(142, 124, 'CordÃ³n ClÃ¡sico', '4185,4192', 'Sujeta el calzado', '658b2a9b66031.jpg', '1 Par', 'AlgodÃ³n, poliÃ©ster', 'Pura+', '60cm', 'Arena,Negro', 17, '3407', '19', 647, 4054),
(143, 125, 'CordÃ³n Plano', '4208,4215', 'Sujeta el calzado', '658b2afabc438.jpg', '1 Par', 'AlgodÃ³n, poliÃ©ster', 'Pura+', '110cm', 'Negro,Blanco', 17, '3794', '19', 721, 4515),
(144, 126, 'CordÃ³n Redondo', '4239,4222,4246', 'Sujeta el calzado', '658b2b6614339.jpg', '1 Par', 'AlgodÃ³n, poliÃ©ster', 'Pura+', '60cm', 'Negro,cafÃ©,Blanco', 17, '3794', '19', 647, 4054),
(145, 127, 'CordÃ³n Redondo', '4253,4260', 'Sujeta el calzado', '658b2bce835c3.jpg', '1 Par', 'AlgodÃ³n, poliÃ©ster', 'Pura+', '110cm', 'cafÃ©,Negro', 17, '3794', '19', 721, 4515),
(146, 128, 'CordÃ³n Elastico', '5861,5878,5885,5908', 'Sujeta el calzado', '658b2c5211359.jpg', '1 Par', 'AlgodÃ³n, poliÃ©ster', 'Pura+', '90cm', 'Negro,Blanco,Azul,Verde,Rojo', 17, '5885', '19', 1118, 7003),
(147, 129, 'Almohadilla Termogel', '5915,1948', 'Reduce el estrÃ©s, cÃ³licos', '658bd90c5257e.jpg', '1 Und', 'Gel', 'Pura+', 'Universal', 'Azul oscuro', 12, '14520', '19', 2759, 17278);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `email_address`, `pwd`, `status`) VALUES
(1, 'admin@gmail.com', 'af7e0928fcba501d8ed0385c794e690fe151bf16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `or_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
