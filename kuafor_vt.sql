-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Ara 2024, 10:54:18
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kuafor_vt`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekip`
--

CREATE TABLE `ekip` (
  `id` int(11) NOT NULL,
  `isim` varchar(100) NOT NULL,
  `unvan` varchar(100) NOT NULL,
  `aciklama` text NOT NULL,
  `resim` varchar(255) NOT NULL,
  `sosyal_instagram` varchar(255) DEFAULT NULL,
  `sosyal_facebook` varchar(255) DEFAULT NULL,
  `sosyal_twitter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `ekip`
--

INSERT INTO `ekip` (`id`, `isim`, `unvan`, `aciklama`, `resim`, `sosyal_instagram`, `sosyal_facebook`, `sosyal_twitter`) VALUES
(1, 'rgr', 'tbtb', 'btbtb', 'image/cilt.jpeg', 'tbt', 'btb', 'bttb'),
(2, 'Beyza YÄ±lmaz', 'yazÄ±lÄ±m', 'bbbbb', 'image/doktor.jpg', 'nn', 'nn', 'nn'),
(3, 'melike keskin', 'yazÄ±lÄ±m', 'bbb', 'image/estetisyen.jpg', 'vv', 'vv', 'vv'),
(4, 'damla yÄ±lmaz', 'yazÄ±lÄ±m', 'bbbb', 'image/kuafor.jpg', 'bb', 'b', 'bb'),
(5, 'ebru yÄ±lmaz', 'yazÄ±lÄ±m', 'xgtjxtjct', 'image/tÄ±rnakÃ§Ä±.jpg', 'v', 'v', 'v'),
(6, 'hth', 'tbtb', 'r4343g4g4g', 'image/kuafor.jpg', 'g', 'g', 'g'),
(7, 'egrrg', 'grgrg', 'rgregg', 'image/kesim.jpeg', 'g4g', '4eg4e', '4ge4');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE `hizmetler` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `aciklama` text NOT NULL,
  `fiyat` decimal(10,2) NOT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`id`, `baslik`, `aciklama`, `fiyat`, `resim`) VALUES
(5, 'asdsa', 'bbbbbbbbbbb', '23.00', 'image/kesim.jpeg'),
(10, 'fdgr', 'hrher', '0.00', 'image/cilt.jpeg'),
(11, 'dvdv', 'vrv', '152.00', 'image/boya.jpeg'),
(12, 'cvv', 'bbb', '85.00', 'image/kaÅŸ.jpeg'),
(14, 'hymtyum', 'Ã¶uuÃ¶', '74.00', 'image/lazer.jpg'),
(15, 'yn', 'juj', '41.00', 'image/tÄ±rnak2.jpeg'),
(16, '6h6h', '6hh6h', '41.00', 'image/cilt.jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kampanyalar`
--

CREATE TABLE `kampanyalar` (
  `kampanyaID` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `aciklama` text NOT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kampanyalar`
--

INSERT INTO `kampanyalar` (`kampanyaID`, `baslik`, `aciklama`, `resim`) VALUES
(7, 'dsadsad', 'EDEFDEFEF', 'image/cilt.jpeg'),
(9, 'fgfr', 'grgr', 'image/kesim.jpeg'),
(10, 't4ry4', '4y54y4', 'image/kesim.jpeg'),
(11, 'dsadsad', 'vvvv', 'image/kesim.jpeg'),
(12, 'dsadsad', 'nnnn', 'image/cilt.jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `musteriID` bigint(20) UNSIGNED NOT NULL,
  `ad_soyad` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `sifre` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`musteriID`, `ad_soyad`, `email`, `sifre`) VALUES
(1, 'Dener Denemez', 'denerim@denemezim.com', 'rastgelesifre123'),
(2, 'Selcan Dönmez', 'feak@b.c', '$2y$10$KdBj7ZR5XTBHYCAyJg7s5eds7U9xXQr0RXDmsuUd/l1DSCZASuNxi'),
(5, 'maykil jackson', 'maykil@jackson.co', '$2y$10$Cp0kUww.HytlhG3fh/zk3e75b3XoVg7umfuOjDzjPgRUEulMI5ANi'),
(6, 'Ben Deniz ', 'ben@deniz.com', '$2y$10$bg5b5DAvahzepJvbSdr6HeSL0WJUSIkEDE.YKSRjZ3qerCwnu1VIy'),
(7, 'safdsa gvfsxc', 'sad@mad.kad', '$2y$10$yTyzZRp61J/VVcSfb4xKI.oRmdlKYhJ/j5BZd3Zi0MES05Km6T6GC'),
(8, 'Beyza YÄ±lmaz', 'beyzayilmaz616161@gmail.com', '$2y$10$pPiq0OvgtFws5ePaJENK7efXdAZB3it3FcKck5OogNILT7myaaTw.'),
(9, 'Beyza YÄ±lmaz', 'beyzayilmaz61@gmail.com', '$2y$10$wS6cbELXiDZXCBIJ59ngk.7udSZYfwUJ/TMT8sqgsVvORSjtOw38.'),
(10, 'Beyza YÄ±lmaz', 'beyzayilmaz6161@gmail.com', '$2y$10$3f1LOSri80WDIP1cwfbP6O2bIi/UR3e35HrUP9MqS9OUZBQ.3lS3S'),
(11, 'sevim kurt', 'sevimceyda@gmail.com', '$2y$10$bPXeBr2GdeklFZ6lPUnZVejaK7vIQ2qUFRNuGx3iijQMK3YnIntZ6'),
(12, 'kenan kedek', 'kenankedek@gmail.com', '$2y$10$68XtIG2X7pN4yJTUFPgAwe6HhqkaR9Hb9Qeo3dU5HJGxvp.rBDf/C'),
(13, 'sa as', 'dsadas@gmail.com', '$2y$10$vvZmHJCH8KPacVif8CP6UeyDEO.tpf/1HrZrUptoFyunyOcCDs7d6');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevular`
--

CREATE TABLE `randevular` (
  `randevuID` bigint(20) NOT NULL,
  `musteriID` bigint(20) UNSIGNED DEFAULT NULL,
  `tarih` varchar(12) NOT NULL,
  `saat` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `randevular`
--

INSERT INTO `randevular` (`randevuID`, `musteriID`, `tarih`, `saat`) VALUES
(25, 7, '2023-05-21', '17:00'),
(27, 2, '2023-05-20', '16:00'),
(28, 8, '2024-11-29', '15:30'),
(30, 8, '2024-11-27', '11:00'),
(32, 10, '2024-11-21', '19:30'),
(33, 11, '2024-11-29', '08:00'),
(34, 8, '2024-11-28', '17:00'),
(35, 8, '2024-11-29', '09:30'),
(36, 12, '2024-11-30', '11:30'),
(37, 13, '2024-11-23', '10:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `yoneticiID` bigint(20) NOT NULL,
  `ad_soyad` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `sifre` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `yoneticiler`
--

INSERT INTO `yoneticiler` (`yoneticiID`, `ad_soyad`, `email`, `sifre`) VALUES
(1, 'admin', 'admin@kuafor.com', '$2y$10$jL5mhoSox0ZBSQhWhT3hN.wzFrV3U170d9wqRjfsZ3ZKvejr3dkai');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ekip`
--
ALTER TABLE `ekip`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hizmetler`
--
ALTER TABLE `hizmetler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kampanyalar`
--
ALTER TABLE `kampanyalar`
  ADD PRIMARY KEY (`kampanyaID`);

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`musteriID`),
  ADD UNIQUE KEY `mail` (`email`);

--
-- Tablo için indeksler `randevular`
--
ALTER TABLE `randevular`
  ADD PRIMARY KEY (`randevuID`),
  ADD KEY `musteriID` (`musteriID`);

--
-- Tablo için indeksler `yoneticiler`
--
ALTER TABLE `yoneticiler`
  ADD PRIMARY KEY (`yoneticiID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ekip`
--
ALTER TABLE `ekip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `hizmetler`
--
ALTER TABLE `hizmetler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `kampanyalar`
--
ALTER TABLE `kampanyalar`
  MODIFY `kampanyaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `musteriID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `randevular`
--
ALTER TABLE `randevular`
  MODIFY `randevuID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `yoneticiler`
--
ALTER TABLE `yoneticiler`
  MODIFY `yoneticiID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `randevular`
--
ALTER TABLE `randevular`
  ADD CONSTRAINT `randevular_ibfk_1` FOREIGN KEY (`musteriID`) REFERENCES `musteriler` (`musteriID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
