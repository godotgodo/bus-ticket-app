-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Mar 2024, 21:03:26
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
-- Veritabanı: `busticketapp`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `buses`
--

CREATE TABLE `buses` (
  `bus_id` int(11) UNSIGNED NOT NULL,
  `plate` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `buses`
--

INSERT INTO `buses` (`bus_id`, `plate`, `created_at`, `updated_at`) VALUES
(1, '34HG0228', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(11) UNSIGNED NOT NULL,
  `starting_destination` varchar(255) NOT NULL,
  `ending_destination` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `destinations`
--

INSERT INTO `destinations` (`destination_id`, `starting_destination`, `ending_destination`, `created_at`, `updated_at`) VALUES
(1, 'istanbul', 'ankara', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ankara', 'istanbul', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(13, '2024-03-02-132333', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1710708969, 1),
(14, '2024-03-02-134032', 'App\\Database\\Migrations\\CreateDestinationsTable', 'default', 'App', 1710708969, 1),
(15, '2024-03-02-145747', 'App\\Database\\Migrations\\CreateTicketsTable', 'default', 'App', 1710708969, 1),
(16, '2024-03-02-151133', 'App\\Database\\Migrations\\AddBusesTable', 'default', 'App', 1710708969, 1),
(17, '2024-03-02-152243', 'App\\Database\\Migrations\\CreateWalletsTable', 'default', 'App', 1710708969, 1),
(18, '2024-03-02-153038', 'App\\Database\\Migrations\\CreateRoutesTable', 'default', 'App', 1710708969, 1),
(19, '2024-03-02-153515', 'App\\Database\\Migrations\\CreateRoutesTicketsTable', 'default', 'App', 1710708969, 1),
(20, '2024-03-02-155446', 'App\\Database\\Migrations\\CreateSeatsTable', 'default', 'App', 1710708969, 1),
(21, '2024-03-02-155952', 'App\\Database\\Migrations\\CreateReservationsTable', 'default', 'App', 1710708969, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(5) UNSIGNED NOT NULL,
  `route_id` int(5) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `route_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reservationseats`
--

CREATE TABLE `reservationseats` (
  `reservation_id` int(5) UNSIGNED NOT NULL,
  `seat_id` int(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `routes`
--

CREATE TABLE `routes` (
  `route_id` int(5) UNSIGNED NOT NULL,
  `arrival_date` datetime NOT NULL,
  `destination_id` int(5) UNSIGNED NOT NULL,
  `bus_id` int(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `routes`
--

INSERT INTO `routes` (`route_id`, `arrival_date`, `destination_id`, `bus_id`, `created_at`, `updated_at`) VALUES
(1, '2024-03-18 00:30:52', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2024-03-28 00:30:52', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `routestickets`
--

CREATE TABLE `routestickets` (
  `routestickets_id` int(5) UNSIGNED NOT NULL,
  `route_id` int(5) UNSIGNED NOT NULL,
  `ticket_id` int(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `routestickets`
--

INSERT INTO `routestickets` (`routestickets_id`, `route_id`, `ticket_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seatroutes`
--

CREATE TABLE `seatroutes` (
  `route_id` int(5) UNSIGNED NOT NULL,
  `seat_id` int(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(5) UNSIGNED NOT NULL,
  `ticket_id` int(11) UNSIGNED DEFAULT NULL,
  `reservation_id` int(11) UNSIGNED DEFAULT NULL,
  `route_id` int(11) UNSIGNED NOT NULL,
  `seat_no` int(5) UNSIGNED NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `gender` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `pnr_number` varchar(255) NOT NULL,
  `status` int(5) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_round_trip` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `user_id`, `pnr_number`, `status`, `price`, `is_round_trip`, `created_at`, `updated_at`) VALUES
(1, 1, '34ÖÖ22032024000720D34HG0228', 1, 300.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticketseats`
--

CREATE TABLE `ticketseats` (
  `ticket_id` int(5) UNSIGNED NOT NULL,
  `seat_id` int(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `identity_number` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `age` int(5) NOT NULL,
  `job` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `passport_number` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `identity_number`, `phone_number`, `gender`, `age`, `job`, `is_admin`, `passport_number`, `created_at`, `updated_at`) VALUES
(1, 'Yunus Emre Gül', 'yunussgul0@gmail.com', '$2y$10$cf.2wrxPj12rlakb6hXLbO5EE95WYSmtLhGttliUux6hWkUzrxhh2', '1', '1', 1, 20, 'adsa', 0, '529526', '2024-03-17 20:59:19', '2024-03-17 20:59:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `wallets`
--

CREATE TABLE `wallets` (
  `wallet_id` int(5) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `wallets`
--

INSERT INTO `wallets` (`wallet_id`, `user_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, 1, 0.00, '2024-03-17 17:59:19', '2024-03-17 17:59:19');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`bus_id`);

--
-- Tablo için indeksler `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservations_route_id_foreign` (`route_id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `reservationseats`
--
ALTER TABLE `reservationseats`
  ADD KEY `reservationseats_reservation_id_foreign` (`reservation_id`),
  ADD KEY `reservationseats_seat_id_foreign` (`seat_id`);

--
-- Tablo için indeksler `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_id`),
  ADD KEY `routes_destination_id_foreign` (`destination_id`),
  ADD KEY `routes_bus_id_foreign` (`bus_id`);

--
-- Tablo için indeksler `routestickets`
--
ALTER TABLE `routestickets`
  ADD PRIMARY KEY (`routestickets_id`),
  ADD KEY `routestickets_route_id_foreign` (`route_id`),
  ADD KEY `routestickets_ticket_id_foreign` (`ticket_id`);

--
-- Tablo için indeksler `seatroutes`
--
ALTER TABLE `seatroutes`
  ADD KEY `seatroutes_route_id_foreign` (`route_id`),
  ADD KEY `seatroutes_seat_id_foreign` (`seat_id`);

--
-- Tablo için indeksler `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`);

--
-- Tablo için indeksler `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `ticketseats`
--
ALTER TABLE `ticketseats`
  ADD KEY `ticketseats_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticketseats_seat_id_foreign` (`seat_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`wallet_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `buses`
--
ALTER TABLE `buses`
  MODIFY `bus_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `routes`
--
ALTER TABLE `routes`
  MODIFY `route_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `routestickets`
--
ALTER TABLE `routestickets`
  MODIFY `routestickets_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `wallets`
--
ALTER TABLE `wallets`
  MODIFY `wallet_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`route_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `reservationseats`
--
ALTER TABLE `reservationseats`
  ADD CONSTRAINT `reservationseats_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservationseats_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `routes_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`bus_id`),
  ADD CONSTRAINT `routes_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`destination_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `routestickets`
--
ALTER TABLE `routestickets`
  ADD CONSTRAINT `routestickets_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`route_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `routestickets_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `seatroutes`
--
ALTER TABLE `seatroutes`
  ADD CONSTRAINT `seatroutes_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`route_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seatroutes_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `ticketseats`
--
ALTER TABLE `ticketseats`
  ADD CONSTRAINT `ticketseats_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticketseats_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticket_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
