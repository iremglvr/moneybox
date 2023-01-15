-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Oca 2023, 00:12:16
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `moneybox`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `expenses`
--

CREATE TABLE `expenses` (
  `expenses_id` int(15) NOT NULL,
  `expenses_price` float(9,2) DEFAULT NULL,
  `expenses_category` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `expenses_date` date DEFAULT NULL,
  `expenses_timedate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `expenses`
--

INSERT INTO `expenses` (`expenses_id`, `expenses_price`, `expenses_category`, `expenses_date`, `expenses_timedate`) VALUES
(2, 456.00, 'Faturalar', '0000-00-00', '2023-01-15 08:39:21'),
(3, 456.00, 'Market', '0000-00-00', '2023-01-15 08:39:46'),
(4, 34534.00, 'Market', '0000-00-00', '2023-01-15 18:26:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `income`
--

CREATE TABLE `income` (
  `income_id` int(15) NOT NULL,
  `income_price` float(9,2) DEFAULT NULL,
  `income_category` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `income_date` date DEFAULT NULL,
  `income_timedate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `income`
--

INSERT INTO `income` (`income_id`, `income_price`, `income_category`, `income_date`, `income_timedate`) VALUES
(1, 132423.00, 'Maaş', '0000-00-00', '2023-01-15 05:59:02'),
(2, 132423.00, 'Maaş', '0000-00-00', '2023-01-15 06:04:35'),
(3, 123.00, 'Maaş', '0000-00-00', '2023-01-15 06:04:53'),
(4, 3434.00, 'Telif', '0000-00-00', '2023-01-15 06:05:13'),
(5, 3434.00, 'Telif', '0000-00-00', '2023-01-15 06:08:06'),
(6, 123.00, 'Maaş', '0000-00-00', '2023-01-15 06:23:05'),
(7, 1233.00, 'Maaş', '0000-00-00', '2023-01-15 06:25:51'),
(8, 2323.00, 'Maaş', '0000-00-00', '2023-01-15 06:43:08'),
(9, 123.00, 'Maaş', '0000-00-00', '2023-01-15 07:22:01'),
(11, 456.00, 'Telif', '0000-00-00', '2023-01-15 08:39:36'),
(12, 43435.00, 'Maaş', '0000-00-00', '2023-01-15 18:26:08'),
(13, 3534.00, 'Telif', '0000-00-00', '2023-01-15 18:26:36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `slider_image_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_image`, `slider_image_order`) VALUES
(1, 'slider01.png', 1),
(2, 'slider02.png', 2),
(3, 'slider03.png', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `users_id` int(5) NOT NULL,
  `users_name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `users_nickname` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `users_password` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `users_datetime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_nickname`, `users_password`, `users_datetime`) VALUES
(1, 'İrem Gülver', 'iremglvr', '123654', 2147483647),
(2, 'Ezgi Gülver', 'ezglvr', '123654', 2147483647);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expenses_id`);

--
-- Tablo için indeksler `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_nickname` (`users_nickname`),
  ADD KEY `users_name` (`users_name`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenses_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
