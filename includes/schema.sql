CREATE TABLE `stripeCustomers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned NOT NULL,
  `status` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(10) unsigned NOT NULL,
  `publicKey` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `card` text COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) unsigned NOT NULL,
  `isDeliquent` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `openRecord` (`id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
