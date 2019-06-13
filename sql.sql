CREATE TABLE `api_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ip',
  `action` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '访问方式',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '请求地址',
  `access_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '请求时间',
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '返回状态码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

CREATE TABLE `api_access_time` (
  `time` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '访问时间',
  `times` int(11) DEFAULT NULL COMMENT '次数',
  PRIMARY KEY (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
