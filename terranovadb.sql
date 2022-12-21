CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text DEFAULT ""
  `surname` int(10) UNSIGNED DEFAULT "",
  `username` varchar(10) NOT NULL,
  `mail` varchar(10) UNSIGNED NOT NULL,
  PRIMARY KEY(`id`, `username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
