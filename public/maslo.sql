-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 13 2019 г., 23:10
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
(1, 'A104', 1, '50', '/img/product/prod.png', 'l0cgaitivuvk7gg8r8p2bhpglukem1hv'),
(2, 'A101', 2, '100', '/img/product/prod.png', 'l0cgaitivuvk7gg8r8p2bhpglukem1hv');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `name_cat_ru` varchar(255) NOT NULL,
  `desc_cat_ru` varchar(500) DEFAULT NULL,
  `name_cat_ua` varchar(255) NOT NULL,
  `desc_cat_ua` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_cat`, `name_cat_ru`, `desc_cat_ru`, `name_cat_ua`, `desc_cat_ua`) VALUES
(1, 'Масла', NULL, 'Мастила', NULL),
(2, 'Аккумуляторы', NULL, 'Акумулятори', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `feature`
--

CREATE TABLE `feature` (
  `id_name_har` int(11) NOT NULL,
  `name_har_ua` varchar(255) NOT NULL,
  `name_har_ru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feature`
--

INSERT INTO `feature` (`id_name_har`, `name_har_ua`, `name_har_ru`) VALUES
(1, 'Виробник', 'Производитель'),
(2, 'SAE/В\'язкість', 'SAE/Вязкость'),
(3, 'Полярність', 'Полярность'),
(4, 'Виконання корпусу', 'Исполнение корпуса'),
(5, 'Об\'єм', 'Объем');

-- --------------------------------------------------------

--
-- Структура таблицы `feature_val`
--

CREATE TABLE `feature_val` (
  `id` int(11) NOT NULL,
  `id_feature` int(11) NOT NULL,
  `val_feature_ua` varchar(255) NOT NULL,
  `val_feature_ru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feature_val`
--

INSERT INTO `feature_val` (`id`, `id_feature`, `val_feature_ua`, `val_feature_ru`) VALUES
(1, 1, 'ADDINOL', 'ADDINOL'),
(2, 2, '30W-50', '30W-50'),
(3, 5, '1Л', '1Л'),
(4, 5, '4Л', '4Л');

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
  `warhouse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`product_id`, `oem`, `product_name_ua`, `product_name_ru`, `product_key_ua`, `product_desc_ua`, `product_key_ru`, `product_desc_ru`, `price`, `date_add`, `warhouse`) VALUES
(1, 'A101', 'Агрінол 20W-50', 'Агринол 20W-50', NULL, 'Масло моторне малозольне синтетичне General Motors Dexos2 5W-30 - це мастильний матеріал преміум класу, який може бути використаний (з урахуванням рекомендацій виробника) в сучасних двигунах, які встановлюються як в автомобілях Опель, так і в інших автомобілях.', NULL, 'Масло моторное малозольное синтетическое General Motors Dexos2 5W-30 - это смазочный материал премиум класса, который может быть использован (с учетом рекомендаций производителя) в современных двигателях, которые устанавливаются как в автомобилях Опель, так и в других автомобилях.', 50, '2019-10-28 19:59:47', 5),
(2, 'A102', 'Агрінол 30W-50', 'Агринол 30W-50', NULL, 'мастило', NULL, 'масло', 50, '2019-10-28 19:59:47', 5),
(3, 'A103', 'Агрінол 40W-50', 'Агринол 40W-50', NULL, 'мастило', NULL, 'масло', 50, '2019-10-28 19:59:47', 5),
(4, 'A104', 'Агрінол 50W-50', 'Агринол 50W-50', NULL, 'мастило', NULL, 'масло', 50, '2019-10-28 19:59:47', 0);

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
(1, 2, 1, 1, 1),
(2, 3, 1, 2, NULL),
(3, 4, 1, 1, 2),
(4, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_feature_val`
--

CREATE TABLE `product_feature_val` (
  `idd` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_feature` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_feature_val`
--

INSERT INTO `product_feature_val` (`idd`, `id_product`, `id_feature`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 3, 3),
(6, 1, 4);

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
(1, 1, '/img/product/prod.png'),
(2, 2, '/img/product/prod.png'),
(3, 3, '/img/product/prod.png'),
(4, 4, '/img/product/prod.png');

-- --------------------------------------------------------

--
-- Структура таблицы `sub_cat`
--

CREATE TABLE `sub_cat` (
  `id_sub` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `sub_name_ua` varchar(100) NOT NULL,
  `sub_name_ru` varchar(100) NOT NULL,
  `sub_key_ua` varchar(300) DEFAULT NULL,
  `sub_key_ru` varchar(300) DEFAULT NULL,
  `sub_desc_ua` varchar(500) DEFAULT NULL,
  `sub_desc_ru` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sub_cat`
--

INSERT INTO `sub_cat` (`id_sub`, `id_cat`, `sub_name_ua`, `sub_name_ru`, `sub_key_ua`, `sub_key_ru`, `sub_desc_ua`, `sub_desc_ru`) VALUES
(1, 1, 'Автомобільні мастила', 'Автомобильные масла', NULL, NULL, NULL, NULL),
(2, 1, 'Мотоцикли/Скутери', 'Мотоциклы/Скутеры', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sub_sub_cat`
--

CREATE TABLE `sub_sub_cat` (
  `id_sub_sub` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `name_sub_sub_ua` varchar(100) NOT NULL,
  `name_sub_sub_ru` varchar(100) NOT NULL,
  `key_sub_sub_ua` varchar(255) DEFAULT NULL,
  `key_sub_sub_ru` varchar(255) DEFAULT NULL,
  `desc_sub_sub_ua` varchar(300) DEFAULT NULL,
  `desc_sub_sub_ru` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sub_sub_cat`
--

INSERT INTO `sub_sub_cat` (`id_sub_sub`, `id_sub`, `name_sub_sub_ua`, `name_sub_sub_ru`, `key_sub_sub_ua`, `key_sub_sub_ru`, `desc_sub_sub_ua`, `desc_sub_sub_ru`) VALUES
(1, 1, 'Моторні мастила', 'Моторные масла', NULL, NULL, NULL, NULL),
(2, 1, 'Трансмісійні мастила', 'Трансмиссионные масла', NULL, NULL, NULL, NULL);

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
(1, 'Дмитрий', 'Симцис', 'test', 'e36329e7e0179c57605f8ca4bca64684', 0, '2019-10-13 21:25:34', '', '', '', '', 1, 'NOPRSTUFIE', '795248983908898', '0', NULL, NULL, NULL, 0, 0),
(10, 'Dmytro', '', 'simtzis@gmail.com', '0dff62dd666a1c88bc6378ce8cdf67d8', 0, '2019-10-16 06:59:45', '', '', '', '', 1, 'GDEGZIYKLMNOPRSTUFIE', '', '0', NULL, NULL, NULL, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Индексы таблицы `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id_name_har`);

--
-- Индексы таблицы `feature_val`
--
ALTER TABLE `feature_val`
  ADD KEY `id_product` (`id`);

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
  ADD PRIMARY KEY (`img_id`);

--
-- Индексы таблицы `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`id_sub`);

--
-- Индексы таблицы `sub_sub_cat`
--
ALTER TABLE `sub_sub_cat`
  ADD PRIMARY KEY (`id_sub_sub`);

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
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `feature`
--
ALTER TABLE `feature`
  MODIFY `id_name_har` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `feature_val`
--
ALTER TABLE `feature_val`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `product_cat_link`
--
ALTER TABLE `product_cat_link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `product_feature_val`
--
ALTER TABLE `product_feature_val`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product_img`
--
ALTER TABLE `product_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `sub_sub_cat`
--
ALTER TABLE `sub_sub_cat`
  MODIFY `id_sub_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
