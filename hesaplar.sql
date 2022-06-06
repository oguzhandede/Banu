-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Haz 2022, 19:45:45
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `banu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hesaplar`
--

CREATE TABLE `hesaplar` (
  `id` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `host` varchar(20) NOT NULL,
  `kullaniciadi` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `parola` varchar(200) NOT NULL,
  `zaman` varchar(10) NOT NULL,
  `kayit_tarihi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `hesaplar`
--

INSERT INTO `hesaplar` (`id`, `ip`, `host`, `kullaniciadi`, `email`, `parola`, `zaman`, `kayit_tarihi`) VALUES
(79, '::1', 'DESKTOP-47BIUR1', 'oguz', 'asdas@asd', '123', '', '0000-00-00 00:00:00'),
(80, '::1', 'DESKTOP-47BIUR1', 'OguzDEde123qweqw', 'osi1907dede@gmail.com', '123', '', '0000-00-00 00:00:00'),
(81, '::1', 'DESKTOP-47BIUR1', 'oguz', 'osi1907dede@gmail.com', '$2y$10$/5VItsYeXo/xyzxavXsxtOazg25bXVNNDRXIiXaH8k2uzgA9eY9g.', '', '0000-00-00 00:00:00'),
(82, '::1', 'DESKTOP-47BIUR1', 'mymphpdede', 'osi1907dede@gmail.com', '$2y$10$23GoHVr97vQsFdx/7umq3.0fEms4vp.yS1MMsXIw5NJm0sISpMdA6', '', '0000-00-00 00:00:00'),
(83, '::1', 'DESKTOP-47BIUR1', 'asddas', '123213@asdasd', '$2y$10$lCG0hcoRwKcX6flJx1JKC.jPS7oQ51FYDHHqN01CL78Qm8sfLwZKC', '', '0000-00-00 00:00:00'),
(84, '::1', 'DESKTOP-47BIUR1', '<h1>asdasd</h1>', 'trinvertorunity@gmail.com', '$2y$10$kWI47J3ny5dtuya5pRoW.uuVehc82Y88rrmTbAVwgewC1bB5N8ydC', '', '0000-00-00 00:00:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `hesaplar`
--
ALTER TABLE `hesaplar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `hesaplar`
--
ALTER TABLE `hesaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
