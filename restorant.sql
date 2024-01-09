-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Oca 2024, 22:37:28
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `restorant`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `kategori_id` int(11) NOT NULL,
  `kategori_adi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_adi`) VALUES
(1, 'Yemekler'),
(2, 'Alkolsüz İçecekler'),
(3, 'Alkollü İçecekler'),
(4, 'Ev Yemekleri'),
(5, 'Tatlılar'),
(6, 'Pizza'),
(7, 'Hamburger'),
(9, 'Çıtır Lezzetler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `masalar`
--

CREATE TABLE `masalar` (
  `masa_id` int(11) NOT NULL,
  `masa_adi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `masalar`
--

INSERT INTO `masalar` (`masa_id`, `masa_adi`) VALUES
(1, 'Masa 1'),
(2, 'Masa 2'),
(3, 'Masa 3'),
(4, 'Masa 4'),
(5, 'Masa 5'),
(6, 'Masa 6'),
(7, 'Masa 7'),
(8, 'Masa 8'),
(9, 'Masa 9'),
(10, 'Masa 10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisdetay`
--

CREATE TABLE `siparisdetay` (
  `siparis_detay_id` int(11) NOT NULL,
  `siparis_id` int(11) DEFAULT NULL,
  `urun_id` int(11) DEFAULT NULL,
  `miktar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `siparisdetay`
--

INSERT INTO `siparisdetay` (`siparis_detay_id`, `siparis_id`, `urun_id`, `miktar`) VALUES
(39, 18, 2, 1),
(42, 22, 4, 2),
(43, 18, 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `siparis_id` int(11) NOT NULL,
  `masa_id` int(11) DEFAULT NULL,
  `siparis_tarihi` datetime DEFAULT NULL,
  `siparis_durum` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `siparisler`
--

INSERT INTO `siparisler` (`siparis_id`, `masa_id`, `siparis_tarihi`, `siparis_durum`) VALUES
(18, 1, '2024-01-09 00:00:00', 'Masa 1'),
(22, 2, '2024-01-10 00:00:00', 'Masa 2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(150) DEFAULT NULL,
  `urun_fiyat` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_adi`, `urun_fiyat`, `kategori_id`) VALUES
(1, 'Patates Kızartması', 85, 9),
(2, 'Sulu Köfte', 120, 4),
(3, 'Bira', 85, 3),
(4, 'Kola', 30, 2),
(5, 'Brownie', 90, 5),
(6, 'Sıcak Sepet', 70, 9);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `masalar`
--
ALTER TABLE `masalar`
  ADD PRIMARY KEY (`masa_id`);

--
-- Tablo için indeksler `siparisdetay`
--
ALTER TABLE `siparisdetay`
  ADD PRIMARY KEY (`siparis_detay_id`),
  ADD KEY `siparis_id` (`siparis_id`),
  ADD KEY `urun_id` (`urun_id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`siparis_id`),
  ADD KEY `masa_id` (`masa_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `masalar`
--
ALTER TABLE `masalar`
  MODIFY `masa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `siparisdetay`
--
ALTER TABLE `siparisdetay`
  MODIFY `siparis_detay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `siparisdetay`
--
ALTER TABLE `siparisdetay`
  ADD CONSTRAINT `siparisdetay_ibfk_1` FOREIGN KEY (`siparis_id`) REFERENCES `siparisler` (`siparis_id`),
  ADD CONSTRAINT `siparisdetay_ibfk_2` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`urun_id`);

--
-- Tablo kısıtlamaları `siparisler`
--
ALTER TABLE `siparisler`
  ADD CONSTRAINT `siparisler_ibfk_1` FOREIGN KEY (`masa_id`) REFERENCES `masalar` (`masa_id`);

--
-- Tablo kısıtlamaları `urunler`
--
ALTER TABLE `urunler`
  ADD CONSTRAINT `urunler_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriler` (`kategori_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
