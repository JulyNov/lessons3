CREATE TABLE `Users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(64) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `age` tinyint(3) unsigned DEFAULT NULL,
  `description` text,
  `foto` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `Users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;