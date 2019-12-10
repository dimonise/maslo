-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 10 2019 г., 09:46
-- Версия сервера: 5.7.25-log
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `maslo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_product` varchar(11) NOT NULL,
  `count_product` int(11) NOT NULL,
  `price` varchar(25) NOT NULL,
  `img` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id_cart`, `id_product`, `count_product`, `price`, `img`, `user`) VALUES
(1, 'A102', 1, '50', '/img/product/prod.png', '9pq2mu5ct12qqadt9ac0erbmcjir8p83'),
(3, 'A102', 4, '200', '/img/product/prod.png', 'ojemf2sr1cuqtlvuvsastqm3sfkk8fdl'),
(4, 'A101', 2, '100', '/img/product/prod.png', 'ojemf2sr1cuqtlvuvsastqm3sfkk8fdl'),
(5, 'A101', 1, '50', '/img/product/prod.png', '7u23miai0br0bdjmvrrva5n63m12urvm'),
(6, 'A103', 2, '100', '/img/product/prod.png', 'Дмитрий');

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0p9t4ieelp8fjt7q79k693c7k1qtrccp', '127.0.0.1', 1575410595, 0x5f63695f70726576696f75735f75726c7c733a32343a22687474703a2f2f6d61736c6f2e6c6f632f75612f63617274223b6e616d655f757365727c733a31343a22d094d0bcd0b8d182d180d0b8d0b9223b736e616d655f757365727c733a31323a22d0a5d0b8d182d180d18bd0b9223b656d61696c5f757365727c733a343a2274657374223b7569647c733a31353a22373935323438393833393038383938223b69645f757365727c733a313a2231223b747970657c733a313a2230223b6c616e677c733a323a227561223b),
('19v9v85u80302lb67ehv4fsfg2v2dfma', '127.0.0.1', 1574975645, 0x5f63695f70726576696f75735f75726c7c733a33313a22687474703a2f2f6d61736c6f2e6c6f632f75612f636174616c6f672f312f34223b),
('8f2ov8d82csqp8kcjccl1feau4lgu4fo', '127.0.0.1', 1575195744, 0x5f63695f70726576696f75735f75726c7c733a32323a22687474703a2f2f6d61736c6f2e6c6f632f61646d696e223b),
('dj2mfvd9vm282v14ogibql5pe79r3tca', '127.0.0.1', 1575494968, 0x5f63695f70726576696f75735f75726c7c733a32343a22687474703a2f2f6d61736c6f2e6c6f632f75612f63617274223b),
('ed6t4t4nlec5038qboa5usvlfsp2m86j', '127.0.0.1', 1574799352, 0x5f63695f70726576696f75735f75726c7c733a33313a22687474703a2f2f6d61736c6f2e6c6f632f75612f636174616c6f672f312f34223b),
('ehp2ksbavu722l5bct6lhhhtgfcj358b', '127.0.0.1', 1575321730, 0x5f63695f70726576696f75735f75726c7c733a31373a22687474703a2f2f6d61736c6f2e6c6f632f223b),
('hjr87gluajncn5agves81vc6btbpmbh3', '127.0.0.1', 1575116379, 0x5f63695f70726576696f75735f75726c7c733a31373a22687474703a2f2f6d61736c6f2e6c6f632f223b),
('os8fhmhc2m57dshh77672enkmfitfgti', '127.0.0.1', 1575582618, 0x5f63695f70726576696f75735f75726c7c733a33343a22687474703a2f2f6d61736c6f2e6c6f632f75612f636174616c6f673f706167653d31223b),
('ot2blk4q7plfi8pc3493b9nhq184r3e8', '127.0.0.1', 1575481292, 0x5f63695f70726576696f75735f75726c7c733a31373a22687474703a2f2f6d61736c6f2e6c6f632f223b);

-- --------------------------------------------------------

--
-- Структура таблицы `feature`
--

CREATE TABLE `feature` (
  `id_name_har` int(11) NOT NULL,
  `name_har_ua` varchar(255) NOT NULL,
  `name_har_ru` varchar(255) NOT NULL,
  `groupa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feature`
--

INSERT INTO `feature` (`id_name_har`, `name_har_ua`, `name_har_ru`, `groupa`) VALUES
(1, 'Виробник', 'Производитель', 0),
(2, 'SAE/В\'язкість', 'SAE/Вязкость', 1),
(3, 'Полярність', 'Полярность', 2),
(4, 'Виконання корпусу', 'Исполнение корпуса', 2),
(5, 'Об\'єм', 'Объем', 1),
(8, 'Вага', 'Вес', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `feature_val`
--

CREATE TABLE `feature_val` (
  `id` int(11) NOT NULL,
  `id_feature` int(11) NOT NULL,
  `val_feature_ua` varchar(255) NOT NULL,
  `val_feature_ru` varchar(255) NOT NULL,
  `groupa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feature_val`
--

INSERT INTO `feature_val` (`id`, `id_feature`, `val_feature_ua`, `val_feature_ru`, `groupa`) VALUES
(2, 2, '30W-50', '30W-50', 1),
(3, 5, '1Л', '1Л', 1),
(4, 5, '4Л', '4Л', 1),
(6, 2, '20W-50', '20W-50', 1),
(7, 2, '10W-30', '10W-30', 1),
(8, 4, 'Пластмаса', 'Пластмасса', 0),
(9, 4, 'Скло', 'Стекло', 0),
(12, 1, 'Addinol', 'Addinol', 1),
(13, 1, 'Xado', 'Xado', 1),
(16, 8, '1 кг', '1 кг', 2),
(17, 8, '2 кг', '2 кг', 2),
(18, 8, '3 кг', '3 кг', 2),
(19, 1, 'Mobil', 'Mobil', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `name_ru` varchar(255) NOT NULL,
  `name_ua` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `parent`, `name_ru`, `name_ua`) VALUES
(1, 0, 'Масло', 'Мастило'),
(2, 0, 'Аккумуляторы', 'Аккумулятори'),
(3, 1, 'Автомобильное масло', 'Автомобільне мастило'),
(4, 1, 'Мотоциклы', 'Мотоцикли'),
(5, 3, 'Моторное масло', 'Моторне мастило'),
(6, 3, 'Трансмиссионное масло', 'Трансміссійне мастило'),
(9, 8, 'Солидолище', 'Солидолка');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `keywords_news_ua` varchar(300) NOT NULL,
  `keywords_news_ru` varchar(300) NOT NULL,
  `description_news_ua` varchar(500) NOT NULL,
  `description_news_ru` varchar(500) NOT NULL,
  `title_news_ua` varchar(255) NOT NULL,
  `title_news_ru` varchar(255) NOT NULL,
  `img_news` varchar(255) NOT NULL,
  `text_news_ua` text NOT NULL,
  `text_news_ru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_news`, `keywords_news_ua`, `keywords_news_ru`, `description_news_ua`, `description_news_ru`, `title_news_ua`, `title_news_ru`, `img_news`, `text_news_ua`, `text_news_ru`) VALUES
(1, 'новина, перша новина ', 'новость, первая новость', 'перша новина на пробу', 'первая новость на пробу', 'перша новина', 'Первая новость', '', 'Текст першої новини Текст першої новини Текст першої новини Текст першої новини Текст першої новини Текст першої новини Текст першої новини Текст першої новини Текст першої новини Текст першої новини Текст першої новини Текст першої новини Текст першої новини Текст першої новини', 'Текст первой новости Текст первой новости Текст первой новости Текст первой новости Текст первой новости Текст первой новости Текст первой новости Текст первой новости Текст первой новости Текст первой новости Текст первой новости Текст первой новости Текст первой новости Текст первой новости');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `oem` varchar(100) NOT NULL,
  `product_name_ua` varchar(255) NOT NULL,
  `product_name_ru` varchar(255) NOT NULL,
  `product_key_ua` varchar(300) DEFAULT NULL,
  `product_desc_ua` text NOT NULL,
  `product_key_ru` varchar(255) DEFAULT NULL,
  `product_desc_ru` text NOT NULL,
  `price` int(11) NOT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warhouse` int(11) NOT NULL,
  `is_rekomm` int(11) DEFAULT '0',
  `is_akcii` int(11) DEFAULT '0',
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`product_id`, `oem`, `product_name_ua`, `product_name_ru`, `product_key_ua`, `product_desc_ua`, `product_key_ru`, `product_desc_ru`, `price`, `date_add`, `warhouse`, `is_rekomm`, `is_akcii`, `img`) VALUES
(1, 'A101', 'Агрінол 20W-50', 'Агринол 20W-50', '', 'Масло моторне малозольне синтетичне General Motors Dexos2 5W-30 - це мастильний матеріал преміум класу, який може бути використаний (з урахуванням рекомендацій виробника) в сучасних двигунах, які встановлюються як в автомобілях Опель, так і в інших автомобілях.', '', 'Масло моторное малозольное синтетическое General Motors Dexos2 5W-30 - это смазочный материал премиум класса, который может быть использован (с учетом рекомендаций производителя) в современных двигателях, которые устанавливаются как в автомобилях Опель, так и в других автомобилях.', 50, '2019-10-28 19:59:47', 5, 1, 1, '/img/product/Penguins.jpg'),
(2, 'A1022', 'Агрінол 30W-502', 'Агринол 30W-502', 'Агрінол 30W-502', 'мастило4', 'Агринол 30W-502', 'масло4', 504, '2019-11-27 19:17:08', 50, 1, 0, '/img/product/Jellyfish.jpg'),
(3, 'A103', 'Агрінол 40W-50', 'Агринол 40W-50', NULL, 'мастило', NULL, 'масло', 50, '2019-10-28 19:59:47', 5, 1, 1, '/img/product/prod.png'),
(41, 'A10229', 'Проба', 'Проба', '', '', '', '', 190, '2019-12-03 10:08:10', 50, 1, 0, '/img/product/prod.png'),
(43, 'A10', 'Проба 2', 'Проба 2', '', '', '', '', 1900, '2019-12-05 10:08:23', 50, NULL, NULL, '/img/product/Hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product_cat_link`
--

CREATE TABLE `product_cat_link` (
  `id_link` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_sub_cat` int(11) NOT NULL,
  `id_sub_sub_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_cat_link`
--

INSERT INTO `product_cat_link` (`id_link`, `id_prod`, `id_cat`, `id_sub_cat`, `id_sub_sub_cat`) VALUES
(1, 2, 1, 3, 9),
(2, 3, 1, 3, 6),
(4, 1, 1, 3, 9),
(17, 41, 1, 3, 6),
(18, 42, 1, 3, 5),
(19, 43, 1, 3, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `product_feature_val`
--

CREATE TABLE `product_feature_val` (
  `idd` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_feature` int(11) NOT NULL,
  `id_name_feature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_feature_val`
--

INSERT INTO `product_feature_val` (`idd`, `id_product`, `id_feature`, `id_name_feature`) VALUES
(2, 1, 6, 2),
(3, 2, 3, 0),
(4, 3, 3, 0),
(6, 1, 4, 5),
(8, 1, 9, 4),
(11, 2, 9, 0),
(42, 41, 1, 1),
(43, 42, 19, 1),
(44, 42, 7, 2),
(45, 42, 4, 5),
(46, 43, 19, 1),
(47, 43, 7, 2),
(48, 1, 1, 12),
(49, 2, 1, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `product_img`
--

CREATE TABLE `product_img` (
  `img_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_img`
--

INSERT INTO `product_img` (`img_id`, `prod_id`, `img`) VALUES
(1, 1, '/img/product/Penguins.jpg'),
(2, 2, '/img/product/Jellyfish.jpg'),
(3, 3, '/img/product/prod.png'),
(10, 32, '/img/product/Lighthouse.jpg'),
(11, 34, '/img/product/777.jpg'),
(13, 41, '/img/product/Penguins.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `sname_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type_user` int(11) NOT NULL DEFAULT '0',
  `date_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_phone_life` varchar(30) NOT NULL,
  `user_phone_mtc` varchar(30) NOT NULL,
  `user_phone_ks` varchar(30) NOT NULL,
  `user_phone_t` varchar(30) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) NOT NULL,
  `user_soc_id` varchar(255) NOT NULL,
  `money` varchar(25) NOT NULL DEFAULT '0',
  `factory` varchar(255) DEFAULT NULL,
  `edrpo` varchar(50) DEFAULT NULL,
  `char_fac` text,
  `pay_activ` int(11) NOT NULL DEFAULT '0',
  `data_pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `sname_user`, `email_user`, `password`, `type_user`, `date_reg`, `user_phone_life`, `user_phone_mtc`, `user_phone_ks`, `user_phone_t`, `active`, `activation_code`, `user_soc_id`, `money`, `factory`, `edrpo`, `char_fac`, `pay_activ`, `data_pay`) VALUES
(1, 'Дмитрий', 'Хитрый', 'test', '', 0, '2019-10-13 21:25:34', '', '', '', '', 1, 'NOPRSTUFIE', '795248983908898', '0', NULL, NULL, NULL, 0, 0),
(11, 'Васька', 'Пробный', 'test@test.com', '123456', 0, '2019-11-14 09:54:08', '+380933100200', '', '', '', 1, '', '', '1000', NULL, NULL, NULL, 0, 0),
(12, 'Ванька ', 'Добавленный', 'test3@test.com', '', 0, '2019-11-18 09:47:38', '', '', '', '', 1, '', '', '', NULL, NULL, NULL, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Индексы таблицы `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Индексы таблицы `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id_name_har`);

--
-- Индексы таблицы `feature_val`
--
ALTER TABLE `feature_val`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `oem` (`oem`),
  ADD KEY `product` (`product_name_ua`);

--
-- Индексы таблицы `product_cat_link`
--
ALTER TABLE `product_cat_link`
  ADD PRIMARY KEY (`id_link`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `cat` (`id_cat`),
  ADD KEY `sub_cat` (`id_sub_cat`);

--
-- Индексы таблицы `product_feature_val`
--
ALTER TABLE `product_feature_val`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `feature`
--
ALTER TABLE `feature`
  MODIFY `id_name_har` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `feature_val`
--
ALTER TABLE `feature_val`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `product_cat_link`
--
ALTER TABLE `product_cat_link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `product_feature_val`
--
ALTER TABLE `product_feature_val`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `product_img`
--
ALTER TABLE `product_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
