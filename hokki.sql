-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 05 2022 г., 18:32
-- Версия сервера: 8.0.24
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hokki`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id_catalog` int NOT NULL,
  `name` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id_catalog`, `name`) VALUES
(1, 'Кухня'),
(2, 'Спальня'),
(3, 'Офис'),
(4, 'Жилая комната'),
(5, 'Туалет'),
(6, 'Прихожая'),
(7, 'Гостинная'),
(8, 'Ванная комната');

-- --------------------------------------------------------

--
-- Структура таблицы `orderingproducts`
--

CREATE TABLE `orderingproducts` (
  `id` int NOT NULL,
  `id_product` int NOT NULL,
  `id_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orderingproducts`
--

INSERT INTO `orderingproducts` (`id`, `id_product`, `id_order`) VALUES
(249, 17, 43),
(255, 17, 43),
(256, 17, 43),
(265, 17, 44),
(273, 17, 45),
(276, 17, 46),
(277, 17, 46),
(280, 17, 47),
(281, 17, 47),
(284, 17, 48),
(285, 17, 48),
(288, 17, 49),
(289, 17, 49),
(292, 17, 50),
(293, 17, 50),
(296, 17, 51),
(297, 17, 51),
(300, 17, 52),
(301, 17, 52),
(304, 17, 53),
(305, 17, 53),
(308, 17, 54),
(309, 17, 54),
(312, 17, 55),
(313, 17, 55),
(316, 17, 56),
(317, 17, 56),
(320, 17, 57),
(321, 17, 57),
(322, 17, 58),
(323, 17, 58),
(324, 17, 58),
(325, 17, 58),
(326, 17, 58),
(331, 17, 59),
(332, 17, 59),
(333, 17, 59),
(334, 17, 59),
(335, 17, 59),
(340, 17, 60),
(341, 17, 60),
(342, 17, 60),
(343, 17, 60),
(344, 17, 60),
(349, 17, 61),
(350, 17, 61),
(351, 17, 61),
(352, 17, 61),
(353, 17, 61),
(358, 17, 62),
(359, 17, 63),
(360, 17, 64),
(361, 17, 66),
(362, 17, 67),
(363, 14, 67),
(364, 15, 67),
(365, 17, 67),
(366, 17, 67),
(367, 17, 67),
(368, 14, 67),
(369, 14, 67),
(370, 14, 67),
(371, 14, 67),
(372, 14, 67),
(373, 17, 68),
(374, 14, 68),
(375, 15, 68),
(376, 17, 68),
(377, 17, 68),
(378, 17, 68),
(379, 14, 68),
(380, 14, 68),
(381, 14, 68),
(382, 14, 68),
(383, 14, 68),
(384, 17, 69),
(385, 14, 69),
(386, 15, 69),
(387, 17, 69),
(388, 17, 69),
(389, 17, 69),
(390, 14, 69),
(391, 14, 69),
(392, 14, 69),
(393, 14, 69),
(394, 14, 69),
(395, 17, 70),
(396, 14, 70),
(397, 15, 70),
(398, 17, 70),
(399, 17, 70),
(400, 17, 70),
(401, 14, 70),
(402, 14, 70),
(403, 14, 70),
(404, 14, 70),
(405, 14, 70),
(406, 17, 71),
(407, 14, 71),
(408, 15, 71),
(409, 17, 71),
(410, 17, 71),
(411, 17, 71),
(412, 14, 71),
(413, 14, 71),
(414, 14, 71),
(415, 14, 71),
(416, 14, 71),
(417, 17, 72),
(418, 14, 72),
(419, 15, 72),
(420, 17, 72),
(421, 17, 72),
(422, 17, 72),
(423, 14, 72),
(424, 14, 72),
(425, 14, 72),
(426, 14, 72),
(427, 14, 72),
(428, 17, 73),
(429, 14, 73),
(430, 15, 73),
(431, 17, 73),
(432, 17, 73),
(433, 17, 73),
(434, 14, 73),
(435, 14, 73),
(436, 14, 73),
(437, 14, 73),
(438, 14, 73),
(439, 17, 74),
(440, 14, 74),
(441, 15, 74),
(442, 17, 74),
(443, 17, 74),
(444, 17, 74),
(445, 14, 74),
(446, 14, 74),
(447, 14, 74),
(448, 14, 74),
(449, 14, 74),
(450, 17, 75),
(451, 14, 75),
(452, 15, 75),
(453, 17, 75),
(454, 17, 75),
(455, 17, 75),
(456, 14, 75),
(457, 14, 75),
(458, 14, 75),
(459, 14, 75),
(460, 14, 75),
(461, 17, 76),
(462, 14, 76),
(463, 15, 76),
(464, 17, 76),
(465, 17, 76),
(466, 17, 76),
(467, 14, 76),
(468, 14, 76),
(469, 14, 76),
(470, 14, 76),
(471, 14, 76),
(472, 17, 77),
(473, 14, 77),
(474, 15, 77),
(475, 17, 77),
(476, 17, 77),
(477, 17, 77),
(478, 14, 77),
(479, 14, 77),
(480, 14, 77),
(481, 14, 77),
(482, 14, 77),
(483, 22, 77),
(484, 26, 78),
(485, 26, 78),
(486, 26, 78),
(487, 26, 79),
(488, 26, 79),
(489, 26, 79),
(490, 26, 80),
(491, 26, 80),
(492, 26, 80),
(493, 26, 81),
(494, 26, 81),
(495, 26, 81),
(496, 26, 82),
(497, 26, 82),
(498, 26, 82),
(499, 26, 83),
(500, 26, 83),
(501, 26, 83),
(502, 26, 84),
(503, 26, 84),
(504, 26, 84),
(505, 26, 85),
(506, 26, 85),
(507, 26, 85),
(508, 26, 86),
(509, 26, 86),
(510, 26, 86),
(511, 26, 87),
(512, 26, 87),
(513, 26, 87),
(514, 26, 88),
(515, 26, 88),
(516, 26, 88),
(517, 26, 89),
(518, 26, 89),
(519, 26, 89),
(520, 26, 90),
(521, 26, 90),
(522, 26, 90),
(523, 26, 91),
(524, 26, 91),
(525, 26, 91),
(526, 26, 92),
(527, 26, 92),
(528, 26, 92),
(529, 26, 93),
(530, 26, 93),
(531, 26, 93),
(532, 26, 94),
(533, 26, 94),
(534, 26, 94),
(535, 26, 95),
(536, 26, 95),
(537, 26, 95),
(538, 26, 96),
(539, 26, 96),
(540, 26, 96),
(541, 26, 97),
(542, 26, 97),
(543, 26, 97),
(544, 26, 98),
(545, 26, 98),
(546, 26, 98),
(547, 26, 99),
(548, 26, 99),
(549, 26, 99),
(550, 26, 100),
(551, 26, 100),
(552, 26, 100),
(553, 26, 101),
(554, 26, 101),
(555, 26, 101),
(556, 26, 102),
(557, 26, 102),
(558, 26, 102),
(559, 26, 103),
(560, 26, 103),
(561, 26, 103),
(562, 26, 104),
(563, 26, 104),
(564, 26, 104),
(565, 26, 105),
(566, 26, 105),
(567, 26, 105),
(568, 26, 106),
(569, 26, 106),
(570, 26, 106),
(571, 26, 107),
(572, 26, 107),
(573, 26, 107),
(574, 26, 108),
(575, 26, 108),
(576, 26, 108),
(577, 26, 109),
(578, 26, 109),
(579, 26, 109),
(580, 26, 110),
(581, 26, 110),
(582, 26, 110),
(583, 26, 111),
(584, 26, 111),
(585, 26, 111),
(586, 26, 112),
(587, 26, 112),
(588, 26, 112),
(589, 26, 113),
(590, 26, 113),
(591, 26, 113),
(592, 26, 114),
(593, 26, 114),
(594, 26, 114),
(595, 26, 115),
(596, 26, 115),
(597, 26, 115),
(598, 26, 116),
(599, 26, 116),
(600, 26, 116),
(601, 26, 117),
(602, 26, 117),
(603, 26, 117),
(604, 26, 118),
(605, 26, 118),
(606, 26, 118),
(607, 26, 119),
(608, 26, 119),
(609, 26, 119),
(610, 26, 120),
(611, 26, 120),
(612, 26, 120),
(613, 26, 121),
(614, 26, 121),
(615, 26, 121),
(616, 26, 122),
(617, 26, 122),
(618, 26, 122),
(619, 26, 123),
(620, 26, 123),
(621, 26, 123),
(622, 26, 124),
(623, 26, 124),
(624, 26, 124),
(625, 21, 125),
(626, 19, 125),
(627, 21, 126),
(628, 19, 126);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `id_user` int NOT NULL,
  `name` varchar(21) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `name`, `phone`, `email`, `price`) VALUES
(19, 35, 'qwe', '123456789', 'qwe', 37213),
(20, 36, 'asdf', '1234', 'asdf', 12663),
(21, 36, 'asdf', '1234', 'asdf', 12663),
(22, 36, 'asdf', '1234', 'asdf', 12663),
(23, 36, 'asdf', '1234', 'asdf', 12663),
(24, 36, 'asdf', '1234', 'asdf', 12663),
(25, 36, 'asdf', '1234', 'asdf', 12663),
(26, 36, 'asdf', '1234', 'asdf', 12663),
(27, 36, 'asdf', '1234', 'asdf', 12663),
(28, 36, 'asdf', '1234', 'asdf', 12663),
(29, 36, 'asdf', '1234', 'asdf', 12663),
(30, 36, 'asdf', '1234', 'asdf', 39555),
(31, 33, 'Rodion', '89934543', 'asd', 2257),
(32, 37, 'Rodio', '89967567676', 'sdkf;dlfj@sdf.com', 24678),
(33, 37, 'Rodio', '89967567676', 'sdkf;dlfj@sdf.com', 24678),
(34, 37, 'Rodion', '89978764567', 'misterkiller002@gmail.com', 49826),
(35, 37, 'Rodion', '89978764567', 'misterkiller002@gmail.com', 49826),
(36, 37, 'Rodion', '89978764567', 'misterkiller002@gmail.com', 49826),
(37, 37, 'Rodion', '89978764567', 'misterkiller002@gmail.com', 49826),
(38, 37, 'Rodion', '89978764567', 'misterkiller002@gmail.com', 49826),
(39, 39, 'Дмитрий', '89625295546', 'dimanmitin@mail.ru', 1296936),
(40, 39, 'Дмитрий', '89625295546', 'dimanmitin@mail.ru', 1296936),
(41, 40, 'edfsdfqwe', '8776758545', 'rodja00@gmail.com', 14459),
(42, 40, 'edfsdfqwe', '8776758545', 'rodja00@gmail.com', 14459),
(43, 39, 'Дмитрий', '89625295546', 'dimanmitin@mail.ru', 68394),
(44, 35, 'qwe', '123456789', 'qwe', 43882),
(45, 33, 'Rodion', '89934543', 'asd', 24478),
(46, 39, 'Дмитрий', '89625295546', 'dimanmitin@mail.ru', 24512),
(47, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 24512),
(48, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 24512),
(49, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 24512),
(50, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 24512),
(51, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 24512),
(52, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 24512),
(53, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 24512),
(54, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 24512),
(55, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 24512),
(56, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 24512),
(57, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 24512),
(58, 37, 'Rodion', '89978764567', 'misterkiller002@gmail.com', 49058),
(59, 37, 'Rodion', '89978764567', 'misterkiller002@gmail.com', 49058),
(60, 37, 'Rodion', '89978764567', 'misterkiller002@gmail.com', 49058),
(61, 37, 'Rodion', '89978764567', 'misterkiller002@gmail.com', 49058),
(62, 40, 'edfsdfqwe', '8776758545', 'rodja00@gmail.com', 34),
(63, 40, 'edfsdfqwe', '8776758545', 'rodja00@gmail.com', 34),
(64, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 34),
(65, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 34),
(66, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 34),
(67, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 14307),
(68, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 14307),
(69, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 14307),
(70, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 14307),
(71, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 14307),
(72, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 14307),
(73, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 14307),
(74, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 14307),
(75, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 14307),
(76, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 14307),
(77, 39, 'Родион', ' 79985768756', 'rodjaolast002@gmail.com', 14538),
(78, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(79, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(80, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(81, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(82, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(83, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(84, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(85, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(86, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(87, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(88, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(89, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(90, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(91, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(92, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(93, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(94, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(95, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(96, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(97, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(98, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(99, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(100, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(101, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(102, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(103, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(104, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(105, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(106, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(107, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(108, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(109, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(110, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(111, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(112, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(113, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(114, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(115, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(116, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(117, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(118, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(119, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(120, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(121, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(122, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(123, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(124, 43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 96702),
(125, 47, 'dfsdf', ' 7996857545', 'rodjaolast002@gmail.com', 443),
(126, 47, 'dfsdf', ' 7996857545', 'rodjaolast002@gmail.com', 443);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` int NOT NULL,
  `id_catalog` int NOT NULL,
  `articul` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int NOT NULL,
  `img` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  `isPopular` int DEFAULT NULL,
  `sale` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `id_catalog`, `articul`, `name`, `price`, `img`, `description`, `isPopular`, `sale`) VALUES
(14, 2, 234324, 'dsfsadf', 2323, 'thumb_5630_963_557_0_0_auto.jpg', 'sdrfsdf', 1, NULL),
(15, 4, 3223, 'sdfsdf', 233, '1400978314433.jpeg', 'sdfsdf', 1, NULL),
(16, 4, 434, 'sdff', 232, 'stamford-kitchen-hugh-jefferson-randolph-architects-img_88d137380d1a3d77_4-1877-1-3a66bbf.jpg', 'sdfdsf', 1, NULL),
(17, 1, 3223, 'df', 34, 'thumb_5630_963_557_0_0_auto.jpg', 'dfdf', 1, NULL),
(18, 7, 123214124, 'товар', 212, 'pexels-scott-webb-2451264.jpg', 'ваыва ыва фываыва ыфваф ыва ыфв а', 1, NULL),
(19, 1, 324324, 'Стул необычный', 212, '1400978314433.jpeg', 'Подробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаие', 1, NULL),
(20, 1, 324324, 'Стул необычный', 212, '1400978314433.jpeg', 'Подробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаиеПодробное описаие', 1, NULL),
(21, 1, 123123, 'Что-то ещё', 231, 'istockphoto-900257448-612x612.jpg', 'описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание ', 1, NULL),
(22, 1, 123123, 'Что-то ещё', 231, 'istockphoto-900257448-612x612.jpg', 'описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание описание ', 1, NULL),
(23, 1, 123133, 'ывавава', 323, 'pexels-pixabay-280471.jpg', 'да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описан ', 1, NULL),
(24, 1, 123133, 'ывавава', 323, 'pexels-pixabay-280471.jpg', 'да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описание да это описан ', 1, NULL),
(25, 2, 223133, 'sdfasdfasfsdaf', 1232, '', 'sfasdfsadf asdf sadf sadf sadf sfd saf', NULL, NULL),
(26, 1, 323333, 'sdfasdf', 32234, 'stamford-kitchen-hugh-jefferson-randolph-architects-img_88d137380d1a3d77_4-1877-1-3a66bbf.jpg', 'sdfasdfas ddf asdf asfas fas dfadsf', NULL, NULL),
(27, 6, 212233, 'dfsom', 4234, 'pexels-pixabay-280471.jpg', '  fdgfgdfg fdgfgdfg fdgfgdfg fdgfgdfg fdgfgdfg fdgfgdfg fdgfgdfg fdgfgdfg fdgfgdfg fdgfgdfg fdgfgdfg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `is_admin` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `is_admin`) VALUES
(33, 'Rodion', '89934543', 'asd', 'asd', NULL),
(35, 'qwe', '123456789', 'qwe', 'qwe', NULL),
(36, 'asdf', '1234', 'asdf', 'asdf', NULL),
(37, 'Rodion', '89978764567', 'misterkiller002@gmail.com', 'Rodion2015', NULL),
(38, 'Rodion', '8997876764', 'misterkiller002@gmail.com', 'Rodion2015', NULL),
(39, 'Родион', ' 79985768756', 'rodjaolast002@gmail.com', 'Rodion', NULL),
(40, 'edfsdfqwe', '8776758545', 'rodja00@gmail.com', 'qweQWE123', NULL),
(42, NULL, '+45309045940', 'admin@gmail.com', 'admin123', 1),
(43, 'Rodion', ' 7998654856', 'rodjaolast002@gmail.com', 'Rodion2020', NULL),
(44, 'sdfdf', '4534534545', 'sdfksdlf@dfksd.ru', 'qweasd123', NULL),
(45, NULL, '+4868796905', 'testLogin', 'testPassword', NULL),
(46, 'Вася', ' 79986785765', 'pochta@gmail.com', 'Rodion2015', NULL),
(47, 'dfsdf', ' 7996857545', 'rodjaolast002@gmail.com', 'qweQWE123', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id_catalog`);

--
-- Индексы таблицы `orderingproducts`
--
ALTER TABLE `orderingproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_catalog` (`id_catalog`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id_catalog` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orderingproducts`
--
ALTER TABLE `orderingproducts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=629;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orderingproducts`
--
ALTER TABLE `orderingproducts`
  ADD CONSTRAINT `orderingproducts_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orderingproducts_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_catalog`) REFERENCES `catalog` (`id_catalog`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
