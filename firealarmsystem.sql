USE firealarm;

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fire_alarm_sensors`
--

CREATE TABLE `fire_alarm_sensors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `smoke` int(11) NOT NULL,
  `co2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fire_alarm_sensors`
--

INSERT INTO `fire_alarm_sensors` (`id`, `name`, `detail`, `user_id`, `smoke`, `co2`, `created_at`, `updated_at`) VALUES
(1, 'asd', NULL, 1, 0, 0, '2020-04-15 19:26:21', '2020-04-15 19:26:21'),
(2, NULL, NULL, 1, 0, 0, '2020-04-15 19:26:51', '2020-04-15 19:26:51'),
(3, NULL, NULL, 1, 0, 0, '2020-04-15 19:31:20', '2020-04-15 19:31:20'),
(4, NULL, NULL, 1, 0, 0, '2020-04-15 19:32:53', '2020-04-15 19:32:53'),
(5, NULL, NULL, 1, 0, 0, '2020-04-15 19:36:05', '2020-04-15 19:36:05'),
(6, NULL, NULL, 1, 0, 0, '2020-04-15 19:37:02', '2020-04-15 19:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `no`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '2020-04-15 19:25:42', '2020-04-15 19:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_15_213812_create_floors_table', 1),
(4, '2020_04_15_213959_create_rooms_table', 1),
(5, '2020_04_15_214020_create_fire_alarm_sensors_table', 1),
(6, '2020_04_15_220333_create_room_has_fire_alarm_systems_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `floor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `no`, `user_id`, `floor_id`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 1, '2020-04-15 19:26:04', '2020-04-15 19:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `room_has_fire_alarm_systems`
--

CREATE TABLE `room_has_fire_alarm_systems` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `fire_alarm_sensor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_has_fire_alarm_systems`
--

INSERT INTO `room_has_fire_alarm_systems` (`id`, `room_id`, `fire_alarm_sensor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-04-15 19:57:18', '2020-04-15 19:57:18'),
(2, 1, 1, '2020-04-15 19:57:30', '2020-04-15 19:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `mobileno`, `usertype`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'abc@gmail.com', '$2y$10$5U3aPUtu/VLERnGIlNzT6OGP0J98ltprzbqwQtiwPoL/khZGdu1XO', '07779778269', 1, '2020-04-15 19:25:36', '2020-04-15 19:25:36'),
(2, 'abdur', 'abdur@gmail.com', '$2y$10$ljy2/k8yCK/7O2/iU870oe5RjiKAYszhVA39WPrqpLl8n8SipW0ka', '07779778269', 1, '2020-04-15 19:25:40', '2020-04-15 19:25:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fire_alarm_sensors`
--
ALTER TABLE `fire_alarm_sensors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fire_alarm_sensors_user_id_foreign` (`user_id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `floors_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_user_id_foreign` (`user_id`),
  ADD KEY `rooms_floor_id_foreign` (`floor_id`);

--
-- Indexes for table `room_has_fire_alarm_systems`
--
ALTER TABLE `room_has_fire_alarm_systems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_has_fire_alarm_systems_room_id_foreign` (`room_id`),
  ADD KEY `room_has_fire_alarm_systems_fire_alarm_sensor_id_foreign` (`fire_alarm_sensor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fire_alarm_sensors`
--
ALTER TABLE `fire_alarm_sensors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_has_fire_alarm_systems`
--
ALTER TABLE `room_has_fire_alarm_systems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fire_alarm_sensors`
--
ALTER TABLE `fire_alarm_sensors`
  ADD CONSTRAINT `fire_alarm_sensors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `floors`
--
ALTER TABLE `floors`
  ADD CONSTRAINT `floors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`),
  ADD CONSTRAINT `rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `room_has_fire_alarm_systems`
--
ALTER TABLE `room_has_fire_alarm_systems`
  ADD CONSTRAINT `room_has_fire_alarm_systems_fire_alarm_sensor_id_foreign` FOREIGN KEY (`fire_alarm_sensor_id`) REFERENCES `fire_alarm_sensors` (`id`),
  ADD CONSTRAINT `room_has_fire_alarm_systems_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

